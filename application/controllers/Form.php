<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;
class Form extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('General_model');
    }

    public function index()
    {
        $data['title'] = 'BRAND';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['brand'] = $this->db->get('form_brand')->result_array();

        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_brand', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('form_brand', [
                'brand_name' => strtoupper($this->input->post('brand_name'))]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru berhasil ditambahkan!</div>');
            redirect('form');
        }
    }

    public function update_brand($id){
        $data['title'] = 'Form Edit Brand';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $uri = $this->uri->segment(3);
        $id = $uri;
        $where = array('id_brand' => $id);
        $data['brand'] = $this->General_model->get_data('form_brand', $where);

        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_brand', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                    'brand_name' => $this->input->post('brand_name')
                );

                $updated = $this->General_model->update('form_brand', $data, 'id_brand', $id);

                if ($updated) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Brand baru berhasil diupdate!</div>');
                    redirect('form');
                } else {
                     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Brand gagal diupdate!</div>');
                    redirect('form');
                }
        }
    }

    public function delete_brand($id)
    {
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }

        $deleted = $this->General_model->delete('form_brand', 'id_brand', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Brand deleted successfully.</div>');
                redirect('form');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Brand not found.</div>');
            redirect('form');
        }
    }

    public function artColor(){
        $data['title'] = 'ART & COLOR';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $uri = $this->uri->segment(3);
        $id = $uri;
        $where = array('id_artcolor' => $id);
        $data['art'] = $this->General_model->get_data('form_artcolor', $where);
        $data['artcolor'] = $this->db->get('form_artcolor')->result_array();
        $data['a'] = $this->db->get('form_art')->result_array();
        $data['c'] = $this->db->get('form_color')->result_array();
        $data['ca'] = $this->db->get('form_ac')->result_array();

        $this->form_validation->set_rules('art_name', 'Art Name', 'required');
        $this->form_validation->set_rules('color_name', 'Color Name', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_artcolor', $data);
            $this->load->view('templates/footer');
        } else {
            $art      = $this->input->post('art_name',TRUE);
            $color      = $this->input->post('color_name',TRUE);       
            $art_color = $art." ".$color;       

            $data = array(
                    'artcolor_name'       => $art_color
            );
            $this->General_model->insert('form_artcolor', $data);
            $this->General_model->insert('form_ac', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Art&Color baru berhasil ditambahkan!</div>');
            redirect('form/artcolor');
        }
    }

    public function art(){
        $data['title'] = 'Form Menu Art&Color';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['art'] = $this->db->get('form_artcolor')->result_array();

        $this->form_validation->set_rules('art_name', 'Art Name', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_art&color', $data);
            $this->load->view('templates/footer');
        } else {
            $art      = $this->input->post('art_name',TRUE);       

            $data = array(
                    'art_name' => $art
            );
            $this->General_model->insert('form_artcolor', $data);
            $this->General_model->insert('form_art', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Art baru berhasil ditambahkan!</div>');
            redirect('form/artcolor');
        }
    }

    public function color(){
        $data['title'] = 'Form Menu Art&Color';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['color'] = $this->db->get('form_artcolor')->result_array();

        $this->form_validation->set_rules('color_name', 'Color Name', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_art&color', $data);
            $this->load->view('templates/footer');
        } else {
            $color      = $this->input->post('color_name',TRUE);       

            $data = array(
                    'color_name' => $color
            );
            $this->General_model->insert('form_artcolor', $data);
            $this->General_model->insert('form_color', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Color baru berhasil ditambahkan!</div>');
            redirect('form/artcolor');
        }
    }

    public function delete_artcolor($id){
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }

        $deleted = $this->General_model->delete('form_ac', 'id_ac', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Art & Color deleted successfully.</div>');
                redirect('form/artcolor');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Art & Color not found.</div>');
            redirect('form/artcolor');
        }
    }

    public function delete_art($id){
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }

        $deleted = $this->General_model->delete('form_art', 'id_art', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Art & Color deleted successfully.</div>');
                redirect('form/artcolor');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Art & Color not found.</div>');
            redirect('form/artcolor');
        }
    }

    public function delete_color($id){
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }

        $deleted = $this->General_model->delete('form_color', 'id_color', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Art & Color deleted successfully.</div>');
                redirect('form/artcolor');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Art & Color not found.</div>');
            redirect('form/artcolor');
        }
    }

    public function unit()
    {
        $data['title'] = 'UNIT';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['unit'] = $this->db->get('form_unit')->result_array();

        $this->form_validation->set_rules('unit_name', 'Unit Name', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_unit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('form_unit', [
                'unit_name' => strtoupper($this->input->post('unit_name'))]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Unit baru berhasil ditambahkan!</div>');
            redirect('form/unit');
        }
    }

    public function update_unit($id){
        $data['title'] = 'Form Edit Unit';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $uri = $this->uri->segment(3);
        $id = $uri;
        $where = array('id_unit' => $id);
        $data['unit'] = $this->General_model->get_data('form_unit', $where);

        $this->form_validation->set_rules('unit_name', 'Unit Name', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_unit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                    'unit_name' => $this->input->post('unit_name')
                );

                $updated = $this->General_model->update('form_unit', $data, 'id_unit', $id);

                if ($updated) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Unit baru berhasil diupdate!</div>');
                    redirect('form/unit');
                } else {
                     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Unit gagal diupdate!</div>');
                    redirect('form/unit');
                }
        }
    }

    public function delete_unit($id)
    {
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }

        $deleted = $this->General_model->delete('form_unit', 'id_unit', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Unit deleted successfully.</div>');
                redirect('form/unit');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Unit not found.</div>');
            redirect('form/unit');
        }
    }

    public function listitem()
    {
        $data['title'] = 'ITEM LIST';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['listitem'] = $this->db->get('form_listitem')->result_array();
        $data['unit'] = $this->db->get('form_unit')->result_array();

        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('unit_name', 'Unit Name', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_listitem', $data);
            $this->load->view('templates/footer');
        } else {
            $item      = strtoupper($this->input->post('item_name',TRUE)); 
            $unit      = $this->input->post('unit_name',TRUE);      

            $data = array(
                    'item_name' => $item,
                    'unit_name' => $unit
            );
            $this->General_model->insert('form_listitem', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">List Item baru berhasil ditambahkan!</div>');
            redirect('form/listitem');
        }
    }

    public function update_listitem($id){
        $data['title'] = 'Form Edit List Item';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $uri = $this->uri->segment(3);
        $id = $uri;
        $where = array('id_listitem' => $id);
        $data['listitem'] = $this->General_model->get_data('form_listitem', $where);
        $data['unit'] = $this->db->get('form_unit')->result_array();

        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('unit_name', 'Unit Name', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_listitem', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                    'item_name' => $this->input->post('item_name'),
                    'unit_name' => $this->input->post('unit_name')
                );

                $updated = $this->General_model->update('form_listitem', $data, 'id_listitem', $id);

                if ($updated) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">List Item baru berhasil diupdate!</div>');
                    redirect('form/listitem');
                } else {
                     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">List Item gagal diupdate!</div>');
                    redirect('form/listitem');
                }
        }
    }

    public function delete_listitem($id)
    {
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }

        $deleted = $this->General_model->delete('form_listitem', 'id_listitem', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">List Item deleted successfully.</div>');
                redirect('form/listitem');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">List Item not found.</div>');
            redirect('form/listitem');
        }
    }

    public function consumption()
    {
        $data['title'] = 'MATERIAL CONSUMPTION';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['listitem'] = $this->db->get('form_listitem')->result_array();
        $data['artcolor'] = $this->db->get('form_ac')->result_array();
        $data['a'] = $this->db->get('form_art')->result_array();
        $data['consumption'] = $this->db->get('form_consrate')->result_array();

        $this->form_validation->set_rules('artcolor_name', 'Art&Color Name', 'required');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('unit_name', 'Unit Name', 'required');
        $this->form_validation->set_rules('cons_rate', 'Cons rate', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_consumption', $data);
            $this->load->view('templates/footer');
        } else {
            $artcolor      = $this->input->post('artcolor_name',TRUE); 
            $item      = $this->input->post('item_name',TRUE); 
            $unit      = $this->input->post('unit_name',TRUE);
            $cons      = $this->input->post('cons_rate',TRUE);     

            $data = array(
                    'artcolor_name' => $artcolor,
                    'item_name' => $item,
                    'unit_name' => $unit,
                    'cons_rate' => $cons
            );
            $this->General_model->insert('form_consrate', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Consumption Rate baru berhasil ditambahkan!</div>');
            redirect('form/consumption');
        }
    }

    public function update_consumption($id)
    {
        $data['title'] = 'Form Edit Consumption';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $uri = $this->uri->segment(3);
        $id = $uri;
        $where = array('id_consrate' => $id);
        $data['consumption'] = $this->General_model->get_data('form_consrate', $where);
        $data['listitem'] = $this->db->get('form_listitem')->result_array();
        $data['artcolor'] = $this->db->get('form_ac')->result_array();
        $data['a'] = $this->db->get('form_art')->result_array();

        $this->form_validation->set_rules('artcolor_name', 'Art&Color Name', 'required');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('unit_name', 'Unit Name', 'required');
        $this->form_validation->set_rules('cons_rate', 'Cons rate', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_consumption', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                    'artcolor_name' => $this->input->post('artcolor_name'),
                    'item_name' => $this->input->post('item_name'),
                    'unit_name' => $this->input->post('unit_name'),
                    'cons_rate' => $this->input->post('cons_rate')
                );

                $updated = $this->General_model->update('form_consrate', $data, 'id_consrate', $id);

                if ($updated) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Consumption Rate baru berhasil diupdate!</div>');
                    redirect('form/consumption');
                } else {
                     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Consumption Rate gagal diupdate!</div>');
                    redirect('form/consumption');
                }
        }
    }

    public function delete_consumption($id)
    {
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }

        $deleted = $this->General_model->delete('form_consrate', 'id_consrate', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Consumption Rate deleted successfully.</div>');
                redirect('form/consumption');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Consumption Rate not found.</div>');
            redirect('form/consumption');
        }
    }

    public function size()
    {
        $data['title'] = 'Form Menu Unit';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['size'] = $this->db->get('form_size')->result_array();

        $this->form_validation->set_rules('size_name', 'Size Name', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_size', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('form_size', [
                'size_name' => $this->input->post('size_name')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Size baru berhasil ditambahkan!</div>');
            redirect('form/size');
        }
    }

    public function update_size($id){
        $data['title'] = 'Form Edit Unit';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $uri = $this->uri->segment(3);
        $id = $uri;
        $where = array('id_size' => $id);
        $data['size'] = $this->General_model->get_data('form_size', $where);

        $this->form_validation->set_rules('size_name', 'Size Name', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_size', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                    'size_name' => $this->input->post('size_name')
                );

                $updated = $this->General_model->update('form_size', $data, 'id_size', $id);

                if ($updated) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Size baru berhasil diupdate!</div>');
                    redirect('form/size');
                } else {
                     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Size gagal diupdate!</div>');
                    redirect('form/size');
                }
        }
    }

    public function delete_size($id)
    {
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }

        $deleted = $this->General_model->delete('form_size', 'id_size', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Size deleted successfully.</div>');
                redirect('form/size');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Size not found.</div>');
            redirect('form/size');
        }
    }

    public function spk()
    {
        $data['title'] = 'P.O. SPK';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['artcolor'] = $this->db->get('form_ac')->result_array();
        $data['brand'] = $this->db->get('form_brand')->result_array();
        $data['spk'] = $this->db->get('form_spk')->result_array();
        $data['size'] = $this->General_model->get('form_spk_detail');

        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'xfd', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_spk', $data);
            $this->load->view('templates/footer');
        } else {
            $po_number      = strtoupper($this->input->post('po_number',TRUE)); 
            $xfd      = $this->input->post('xfd',TRUE); 
            $brand      = strtoupper($this->input->post('brand_name',TRUE));
            $artcolor      = $this->input->post('artcolor_name',TRUE);    

            $data = array(
                    'po_number' => $po_number,
                    'xfd' => $xfd,
                    'brand_name' => $brand,
                    'artcolor_name' => $artcolor,
                    'created_at' => date('Y-m-d H:i:s')
            );
            $this->General_model->insert('form_spk', $data);
            $id_spk = $this->db->insert_id();  // Get the auto-increment ID from form_spk

            // Add id_spk to the data array before inserting into form_spk_checkin
            $data['id_spk'] = $id_spk;
            $this->db->insert('form_spk_checkin', $data);
            $this->db->insert('form_spk_checkout', $data);
            $this->db->insert('production_spk_report', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">SPK baru berhasil ditambahkan!</div>');
                redirect('form/spk');
        }
    }

    public function view_spk_blackstone($id)
    {
        $data['title'] = 'Black Stone SPK View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->result_array();

        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'xfd', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');
        for ($i = 36; $i <= 50; $i++) {
            $this->form_validation->set_rules('size_' . $i, 'Size ' . $i, 'numeric|greater_than_equal_to[0]');
        }

            

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('form/view_spk_blackstone', $data);
        $this->load->view('templates/footer');
        } else {
            // Prepare data
            $insertData = [
                'id_spk' => $id,
                'po_number' => $this->input->post('po_number'),
                'xfd' => $this->input->post('xfd'),
                'brand_name' => $this->input->post('brand_name'),
                'artcolor_name' => $this->input->post('artcolor_name'),
            ];

            for ($i = 36; $i <= 50; $i++) {
                $insertData['size_' . $i] = $this->input->post('size_' . $i);
            }

            $total_qty = $this->_sum_sizes();
            $insertData['total_qty'] = $total_qty;
            // Check if id_spk already exists in tb_blackstone_size
            $existing = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->row();

            if ($existing) {
                // Update existing
                $this->General_model->update('tb_blackstone_size', $insertData, ['id_spk' => $id], 'id_spk');
                $this->session->set_flashdata('message', '<div class="alert alert-success">SPK updated successfully.</div>');
            } else {
                // Insert new
                $this->General_model->insert('tb_blackstone_size', $insertData);
                $this->session->set_flashdata('message', '<div class="alert alert-success">SPK added successfully.</div>');
            }

            $this->General_model->update('form_spk', ['total_qty' => $total_qty], ['id_spk' => $id],'id_spk');
            $this->General_model->update('form_spk_checkin', ['total_qty' => $total_qty], ['id_spk' => $id],'id_spk');
            $this->General_model->update('form_spk_checkout', ['total_qty' => $total_qty], ['id_spk' => $id],'id_spk');
            $this->General_model->update('production_spk_report', ['total_qty' => $total_qty], ['id_spk' => $id],'id_spk');

            redirect('form/view_spk_blackstone/' . $id);
        }

    }

    public function view_report_blackstone($id)
    {
        $data['title'] = 'Black Stone Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get_data('form_spk_item', ['id_spk' => $id])->result_array();

        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'xfd', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');
        for ($i = 36; $i <= 50; $i++) {
            $this->form_validation->set_rules('size_' . $i, 'Size ' . $i, 'numeric|greater_than_equal_to[0]');
        }

            

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('form/view_report_blackstone', $data);
        $this->load->view('templates/footer');
        } else {
            // Prepare data
            $insertData = [
                'id_spk' => $id,
                'po_number' => $this->input->post('po_number'),
                'xfd' => $this->input->post('xfd'),
                'brand_name' => $this->input->post('brand_name'),
                'artcolor_name' => $this->input->post('artcolor_name'),
            ];

            for ($i = 36; $i <= 50; $i++) {
                $insertData['size_' . $i] = $this->input->post('size_' . $i);
            }

            $total_qty = $this->_sum_sizes();
            $insertData['total_qty'] = $total_qty;
            // Check if id_spk already exists in tb_blackstone_size
            $existing = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->row();

            if ($existing) {
                // Update existing
                $this->General_model->update('tb_blackstone_size', $insertData, ['id_spk' => $id], 'id_spk');
                $this->session->set_flashdata('message', '<div class="alert alert-success">SPK updated successfully.</div>');
            } else {
                // Insert new
                $this->General_model->insert('tb_blackstone_size', $insertData);
                $this->session->set_flashdata('message', '<div class="alert alert-success">SPK added successfully.</div>');
            }

            $this->General_model->update('form_spk', ['total_qty' => $total_qty], ['id_spk' => $id],'id_spk');
            $this->General_model->update('form_spk_checkin', ['total_qty' => $total_qty], ['id_spk' => $id],'id_spk');

            redirect('form/view_spk_blackstone/' . $id);
        }

    }

    

    public function export_blackstone_pdf($id)
    {
        // Load required data
        $data['title'] = 'Black Stone SPK Report';
        $data['spk'] = $this->General_model->get_data('form_spk', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get_data('form_spk_item', ['id_spk' => $id])->result_array();

        $po_number = isset($data['spk'][0]['po_number']) ? $data['spk'][0]['po_number'] : 'Unknown_PO';
        // Load the view into a variable
        $html = $this->load->view('form/pdf_blackstone_report', $data, TRUE);

        // Setup Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the PDF to browser
        $dompdf->stream("Blackstone_SPK_Report_{$po_number}.pdf", array("Attachment" => false));
    }


        private function _sum_sizes()
    {
        $total = 0;
        for ($i = 36; $i <= 50; $i++) {
            $qty = (int) $this->input->post('size_' . $i);
            $total += $qty;
        }
        return $total;
    }

    public function view_spk_rossi($id)
    {
        $data['title'] = 'Rossi SPK View';
        $data['users'] = $this->db->get_where('users', ['email' => 
            $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id])->result_array();

        // Define all size fields
        $sizes = [
            '3', '3t', '4', '4t', '5', '5t',
            '6', '6t', '7', '7t', '8', '8t',
            '9', '9t', '10', '10t', '11', '11t',
            '12', '12t', '13', '13t', '14', '15'
        ];

        // Required input rules
        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'XFD', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');

        foreach ($sizes as $size) {
            $this->form_validation->set_rules('size_' . $size, 'Size ' . strtoupper($size), 'required');
        }

        if ($this->form_validation->run() == false) {
            // Show view for validation errors
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/view_spk_rossi', $data); // ✅ Correct view
            $this->load->view('templates/footer');
        } else {
            // Prepare data for insertion/update
            $insertData = [
                'id_spk' => $id,
                'po_number' => $this->input->post('po_number'),
                'xfd' => $this->input->post('xfd'),
                'brand_name' => $this->input->post('brand_name'),
                'artcolor_name' => $this->input->post('artcolor_name'),
            ];

            // Sum all size fields and assign
            $total_qty = 0;
            foreach ($sizes as $size) {
                $value = (int) $this->input->post('size_' . $size);
                $insertData['size_' . $size] = $value;
                $total_qty += $value;
            }

            $insertData['total_qty'] = $total_qty;

            // Update or insert
            $existing = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id])->row();

            if ($existing) {
                $this->General_model->update('tb_rossi_size', $insertData, ['id_spk' => $id], 'id_spk');
                $this->session->set_flashdata('message', '<div class="alert alert-success">SPK updated successfully.</div>');
            } else {
                $this->General_model->insert('tb_rossi_size', $insertData);
                $this->session->set_flashdata('message', '<div class="alert alert-success">SPK added successfully.</div>');
            }

            // Update total_qty in main SPK table
            $this->General_model->update('form_spk', ['total_qty' => $total_qty], ['id_spk' => $id], 'id_spk');
            $this->General_model->update('form_spk_checkin', ['total_qty' => $total_qty], ['id_spk' => $id],'id_spk');
            $this->General_model->update('form_spk_checkout', ['total_qty' => $total_qty], ['id_spk' => $id],'id_spk');
            $this->General_model->update('production_spk_report', ['total_qty' => $total_qty], ['id_spk' => $id],'id_spk');

            // Redirect to the same view
            redirect('form/view_spk_rossi/' . $id);
        }
    }

    public function view_report_rossi($id)
    {
        $data['title'] = 'Rossi Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
            $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get_data('form_spk_item', ['id_spk' => $id])->result_array();

        // Define all size fields
        $sizes = [
            '3', '3t', '4', '4t', '5', '5t',
            '6', '6t', '7', '7t', '8', '8t',
            '9', '9t', '10', '10t', '11', '11t',
            '12', '12t', '13', '13t', '14', '15'
        ];

        // Required input rules
        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'XFD', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');

        foreach ($sizes as $size) {
            $this->form_validation->set_rules('size_' . $size, 'Size ' . strtoupper($size), 'required');
        }

        if ($this->form_validation->run() == false) {
            // Show view for validation errors
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/view_report_rossi', $data); // ✅ Correct view
            $this->load->view('templates/footer');
        } else {
            // Prepare data for insertion/update
            $insertData = [
                'id_spk' => $id,
                'po_number' => $this->input->post('po_number'),
                'xfd' => $this->input->post('xfd'),
                'brand_name' => $this->input->post('brand_name'),
                'artcolor_name' => $this->input->post('artcolor_name'),
            ];

            // Sum all size fields and assign
            $total_qty = 0;
            foreach ($sizes as $size) {
                $value = (int) $this->input->post('size_' . $size);
                $insertData['size_' . $size] = $value;
                $total_qty += $value;
            }

            $insertData['total_qty'] = $total_qty;

            // Update or insert
            $existing = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id])->row();

            if ($existing) {
                $this->General_model->update('tb_rossi_size', $insertData, ['id_spk' => $id], 'id_spk');
                $this->session->set_flashdata('message', '<div class="alert alert-success">SPK updated successfully.</div>');
            } else {
                $this->General_model->insert('tb_rossi_size', $insertData);
                $this->session->set_flashdata('message', '<div class="alert alert-success">SPK added successfully.</div>');
            }

            // Update total_qty in main SPK table
            $this->General_model->update('form_spk', ['total_qty' => $total_qty], ['id_spk' => $id], 'id_spk');
            $this->General_model->update('form_spk_checkin', ['total_qty' => $total_qty], ['id_spk' => $id],'id_spk');

            // Redirect to the same view
            redirect('form/view_spk_rossi/' . $id);
        }
    }

    public function export_rossi_pdf($id)
    {
        // Load required data
        $data['title'] = 'Rossi SPK Report';
        $data['spk'] = $this->General_model->get_data('form_spk', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get_data('form_spk_item', ['id_spk' => $id])->result_array();

        $po_number = isset($data['spk'][0]['po_number']) ? $data['spk'][0]['po_number'] : 'Unknown_PO';
        // Load the view into a variable
        $html = $this->load->view('form/pdf_rossi_report', $data, TRUE);

        // Setup Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the PDF to browser
        $dompdf->stream("Rossi_SPK_Report_{$po_number}.pdf", array("Attachment" => false));
    }

    public function view_spk_ariat($id)
    {
        $data['title'] = 'Ariat SPK View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id])->result_array();

    // Add validation rules
        $sizes = ['6d','6_5d','7d','7_5d','8d','8_5d','9d','9_5d','10d','10_5d','11d','11_5d','12d','13d','14d','15d','16d'];

        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'xfd', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');

        foreach ($sizes as $size) {
            $this->form_validation->set_rules('size_' . $size, strtoupper(str_replace('_', '.', $size)), 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/view_spk_ariat', $data); // ← corrected view
            $this->load->view('templates/footer');
        } else {
            // Prepare data
            $insertData = [
                'id_spk' => $id,
                'po_number' => $this->input->post('po_number'),
                'xfd' => $this->input->post('xfd'),
                'brand_name' => $this->input->post('brand_name'),
                'artcolor_name' => $this->input->post('artcolor_name'),
            ];

            foreach ($sizes as $size) {
                $insertData['size_' . $size] = $this->input->post('size_' . $size);
            }

            // Calculate total quantity from all size fields
            $total_qty = 0;
            foreach ($sizes as $size) {
                $total_qty += (int) $this->input->post('size_' . $size);
            }
            $insertData['total_qty'] = $total_qty;

            // Update or Insert
            $existing = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id])->row();

            if ($existing) {
                $this->General_model->update('tb_ariat_size', $insertData, ['id_spk' => $id], 'id_spk');
                $this->session->set_flashdata('message', '<div class="alert alert-success">SPK updated successfully.</div>');
            } else {
                $this->General_model->insert('tb_ariat_size', $insertData);
                $this->session->set_flashdata('message', '<div class="alert alert-success">SPK added successfully.</div>');
            }

            // Update total_qty in form_spk as well
            $this->General_model->update('form_spk', ['total_qty' => $total_qty], ['id_spk' => $id], 'id_spk');
            $this->General_model->update('form_spk_checkin', ['total_qty' => $total_qty], ['id_spk' => $id],'id_spk');
            $this->General_model->update('form_spk_checkout', ['total_qty' => $total_qty], ['id_spk' => $id],'id_spk');
            $this->General_model->update('production_spk_report', ['total_qty' => $total_qty], ['id_spk' => $id],'id_spk');

            redirect('form/view_spk_ariat/' . $id);
        }
    }

    public function view_report_ariat($id)
    {
        $data['title'] = 'Ariat Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get_data('form_spk_item', ['id_spk' => $id])->result_array();

    // Add validation rules
        $sizes = [
            '6_d', '6_5_d', '7_d', '7_5_d', '8_d', '8_5_d',
            '9_d', '9_5_d', '10_d', '10_5_d', '11_d', '11_5_d',
            '12_d', '13_d', '14_d', '15_d', '16_d'
        ];

        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'xfd', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');

        foreach ($sizes as $size) {
            $this->form_validation->set_rules('size_' . $size, strtoupper(str_replace('_', '.', $size)), 'required');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/view_report_ariat', $data); // ← corrected view
            $this->load->view('templates/footer');
        } else {
            // Prepare data
            $insertData = [
                'id_spk' => $id,
                'po_number' => $this->input->post('po_number'),
                'xfd' => $this->input->post('xfd'),
                'brand_name' => $this->input->post('brand_name'),
                'artcolor_name' => $this->input->post('artcolor_name'),
            ];

            foreach ($sizes as $size) {
                $insertData['size_' . $size] = $this->input->post('size_' . $size);
            }

            // Calculate total quantity from all size fields
            $total_qty = 0;
            foreach ($sizes as $size) {
                $total_qty += (int) $this->input->post('size_' . $size);
            }
            $insertData['total_qty'] = $total_qty;

            // Update or Insert
            $existing = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id])->row();

            if ($existing) {
                $this->General_model->update('tb_ariat_size', $insertData, ['id_spk' => $id], 'id_spk');
                $this->session->set_flashdata('message', '<div class="alert alert-success">SPK updated successfully.</div>');
            } else {
                $this->General_model->insert('tb_ariat_size', $insertData);
                $this->session->set_flashdata('message', '<div class="alert alert-success">SPK added successfully.</div>');
            }

            // Update total_qty in form_spk as well
            $this->General_model->update('form_spk', ['total_qty' => $total_qty], ['id_spk' => $id], 'id_spk');
            $this->General_model->update('form_spk_checkin', ['total_qty' => $total_qty], ['id_spk' => $id],'id_spk');

            redirect('form/view_spk_ariat/' . $id);
        }
    }

    public function export_ariat_pdf($id)
    {
        // Load required data
        $data['title'] = 'Ariat SPK Report';
        $data['spk'] = $this->General_model->get_data('form_spk', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get_data('form_spk_item', ['id_spk' => $id])->result_array();

        $po_number = isset($data['spk'][0]['po_number']) ? $data['spk'][0]['po_number'] : 'Unknown_PO';
        // Load the view into a variable
        $html = $this->load->view('form/pdf_ariat_report', $data, TRUE);

        // Setup Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Output the PDF to browser
        $dompdf->stream("Ariat_SPK_Report_{$po_number}.pdf", array("Attachment" => false));
    }

    public function update_spk($id){
        $data['title'] = 'Form Edit SPK';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $uri = $this->uri->segment(3);
        $id = $uri;
        $where = array('id_spk' => $id);
        $data['spk'] = $this->General_model->get_data('form_spk', $where)->result_array();

        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'xfd', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');
        $this->form_validation->set_rules('total_qty', 'Total Order', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Validation failed. Please fill in all required fields.</div>');
            redirect('form/spk'); // redirect back to the SPK list
        } else {
            $data = array(
                'po_number' => strtoupper($this->input->post('po_number')),
                'xfd' => $this->input->post('xfd'),
                'brand_name' => $this->input->post('brand_name'),
                'artcolor_name' => $this->input->post('artcolor_name'),
                'total_qty' => $this->input->post('total_qty')
            );

            $updated = $this->General_model->update('form_spk', $data, 'id_spk', $id);

            if ($updated) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">SPK successfully updated!</div>');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to update SPK!</div>');
            }

            $brand = strtolower($this->input->post('brand_name'));

            if ($brand === 'black stone') {
                redirect('form/view_spk_blackstone/'.$id);
            } elseif ($brand === 'rossi') {
                redirect('form/view_spk_rossi/'.$id);
            } elseif ($brand === 'ariat') {
                redirect('form/view_spk_ariat/'.$id);
            } else {
                redirect('form/spk'); // default fallback
            }
        }
    }

    public function update_spk_size_brand($id_spk)
    {
        $spk = $this->General_model->get_data('form_spk', ['id_spk' => $id_spk])->row_array();

    if (!$spk) {
        redirect('form/spk'); // fallback if not found
    }

    $brand_name = $spk['brand_name'];

    // Redirect to specific brand handler
    if ($brand_name === 'BLACK STONE') {
        redirect('form/view_spk_blackstone/' . $id_spk);
    } elseif ($brand_name === 'ROSSI') {
        redirect('form/view_spk_rossi/' . $id_spk);
    } elseif ($brand_name === 'ARIAT') {
        redirect('form/view_spk_ariat/' . $id_spk);
    } else {
        redirect('form/spk');
    }
    }

    public function view_report_spk_brand($id_spk)
    {
        $spk = $this->General_model->get_data('form_spk', ['id_spk' => $id_spk])->row_array();

    if (!$spk) {
        redirect('form/spk'); // fallback if not found
    }

    $brand_name = $spk['brand_name'];

    // Redirect to specific brand handler
    if ($brand_name === 'BLACK STONE') {
        redirect('form/view_report_blackstone/' . $id_spk);
    } elseif ($brand_name === 'ROSSI') {
        redirect('form/view_report_rossi/' . $id_spk);
    } elseif ($brand_name === 'ARIAT') {
        redirect('form/view_report_ariat/' . $id_spk);
    } else {
        redirect('form/spk');
    }
    }


    public function delete_spk($id)
    {
        $this->load->model('General_model');

        
        

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }

        $deleted = $this->General_model->delete('form_spk', 'id_spk', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">SPK deleted successfully.</div>');
                redirect('form/spk');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">SPK not found.</div>');
            redirect('form/spk');
        }
    }

    public function get_items_by_color()
        {
            $artcolor_name = $this->input->post('artcolor_name');
            $id_spk = $this->input->post('id_spk');

            $items = $this->db->get_where('form_spk_item', [
                'artcolor_name' => $artcolor_name,
                'id_spk' => $id_spk
            ])->result_array();

            echo json_encode($items);
        }


    public function update_spk_item($id_spk){
        $data['title'] = 'Form Add Item';
        $data['users'] = $this->db->get_where('users', ['email' => 
            $this->session->userdata('email')])->row_array();

        // ✅ Get SPK data directly from DB
        $query = $this->db->get_where('form_spk', ['id_spk' => $id_spk]);
        $data['spk'] = $query->row_array();

        if (!$data['spk']) {
            show_error('SPK data not found for ID: ' . $id_spk);
            return;
        }

        $artcolor_name = $data['spk']['artcolor_name'];

        // Get related items
        $data['item'] = $this->db->get_where('form_consrate', ['artcolor_name' => $artcolor_name])->result_array();

        $data['artcolor'] = $this->db->get_where('form_ac', ['artcolor_name' => $artcolor_name])->result_array();

        // Example of custom join if needed
        $this->db->where('artcolor_name', $artcolor_name);
        $data['spkitem'] = $this->General_model->get('form_spk_item', [
            'id_spk' => $id_spk,
        ]);


        // Form validation
        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('unit_name', 'Unit Name', 'required');
        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'xfd', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');
        $this->form_validation->set_rules('cons_rate', 'Consrate', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('form/menu_item_spk', $data);
            $this->load->view('templates/footer');
        } else {
            // Prepare insert data
            $insert_data = [
                'po_number'      => strtoupper($this->input->post('po_number', TRUE)),
                'xfd'            => $this->input->post('xfd', TRUE),
                'brand_name'     => $this->input->post('brand_name', TRUE),
                'artcolor_name'  => $this->input->post('artcolor_name', TRUE),
                'part_name'      => strtoupper($this->input->post('part_name', TRUE)),
                'item_name'      => strtoupper($this->input->post('item_name', TRUE)),
                'color_name'     => strtoupper($this->input->post('color_name', TRUE)),
                'mtrl_name'      => strtoupper($this->input->post('mtrl_name', TRUE)),
                'unit_name'      => strtoupper($this->input->post('unit_name', TRUE)),
                'cons_rate'      => $this->input->post('cons_rate', TRUE),
                'id_spk'         => $id_spk,
            ];

            // Insert into both tables
            $this->db->insert('form_spk_item', $insert_data);
            $this->db->insert('form_checkin_item', $insert_data);

            // Get total_qty from form_spk
            $spk = $this->db->get_where('form_spk', ['id_spk' => $id_spk])->row_array();
            $new_total = $spk['total_qty'] * $insert_data['cons_rate'];

            // Update total_consrate in both tables
            $this->db->where(['id_spk' => $id_spk, 'item_name' => $insert_data['item_name']])
                    ->update('form_spk_item', ['total_consrate' => $new_total]);

            $this->db->where(['id_spk' => $id_spk, 'item_name' => $insert_data['item_name']])
                    ->update('form_checkin_item', ['total_consrate' => $new_total]);

            // Redirect with success
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Size baru berhasil ditambahkan ke SPK!</div>');
            redirect('form/update_spk_item/' . $id_spk);
        }
    }



    public function delete_spk_item($id_spkitem)
    {
        $data['users'] = $this->db->get_where('users', ['email' => 
            $this->session->userdata('email')])->row_array();

        // Get the sizerun row to delete
        $spkitem_data = $this->General_model->get_one('form_spk_item', ['id_spkitem' => $id_spkitem]);

        if (!$spkitem_data || !isset($spkitem_data[0])) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Size data not found.</div>');
            redirect('form/spk');
        }

        $spkitem = $spkitem_data[0];
        $id_spk = $spkitem['id_spk']; // we use this to redirect later


        // Delete the actual record
        $this->General_model->delete('form_spk_item', 'id_spkitem', $id_spkitem);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Size run deleted and backed up successfully.</div>');
        redirect('form/update_spk_item/' . $id_spk);
    }

    public function import_consrate_csv()
{
    if (isset($_FILES['csv_file']['tmp_name'])) {
        $file = $_FILES['csv_file']['tmp_name'];

        if (($handle = fopen($file, "r")) !== FALSE) {
            $row = 0;
            $imported = 0;
            $skipped = 0;

            while (($data = fgetcsv($handle, 1000, ';')) !== FALSE) {
                if ($row == 0) { // Skip header
                    $row++;
                    continue;
                }

                $insert = [
                    'id_consrate'    => (int) trim($data[0]),
                    'artcolor_name'  => trim($data[1]),
                    'item_name'      => trim($data[2]),
                    'color_name'     => trim($data[3]),
                    'unit_name'      => trim($data[4]),
                    'cons_rate'      => floatval(str_replace(',', '.', $data[5]))
                ];

                // Validasi: Skip jika item_name + unit_name + artcolor_name sudah ada
                $this->db->where('item_name', $insert['item_name']);
                $this->db->where('unit_name', $insert['unit_name']);
                $this->db->where('artcolor_name', $insert['artcolor_name']);
                $exists = $this->db->get('form_consrate')->num_rows();

                if ($exists > 0) {
                    $skipped++;
                    continue; // Skip insert jika duplikat
                }

                $this->db->insert('form_consrate', $insert);
                $imported++;
                $row++;
            }

            fclose($handle);
            echo "✅ Import selesai.<br>";
            echo "✔️ Ditambahkan: $imported data<br>";
            echo "⚠️ Duplikat dilewati: $skipped data";
        } else {
            echo "❌ Gagal membuka file.";
        }
    } else {
        echo "❌ Tidak ada file yang diupload.";
    }
}




}