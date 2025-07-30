<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;
class Warehouse extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('General_model');
    }

    public function index_checkin()
    {
        $data['title'] = 'Form Menu Check IN';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['artcolor'] = $this->db->get('form_ac')->result_array();
        $data['brand'] = $this->db->get('form_brand')->result_array();
        $data['spk'] = $this->db->get('form_spk_checkin')->result_array();
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
            $this->load->view('warehouse/index_checkin', $data);
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
            );
            $this->db->insert('form_spk_checkin', $data);
            $insert_id = $this->db->insert_id(); // Get ID for detail views

            $brand_lower = strtolower($brand);

            if ($brand_lower === 'black stone') {
                redirect('warehouse/checkin_blackstone/' . $insert_id);
            } elseif ($brand_lower === 'rossi') {
                redirect('warehouse/checkin_rossi/' . $insert_id);
            } elseif ($brand_lower === 'ariat') {
                redirect('warehouse/checkin_ariat/' . $insert_id);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Brand not recognized. Showing default view.</div>');
                redirect('warehouse/index_checkin');
            }
        }
    }

    public function update_spk_checkin_brand($id_spk)
    {
        $spk = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id_spk])->row_array();

    if (!$spk) {
        redirect('warehouse/index_checkin'); // fallback if not found
    }

    $brand_name = $spk['brand_name'];

    // Redirect to specific brand handler
    if ($brand_name === 'BLACK STONE') {
        redirect('warehouse/check_in_blackstone/' . $id_spk);
    } elseif ($brand_name === 'ROSSI') {
        redirect('warehouse/check_in_rossi/' . $id_spk);
    } elseif ($brand_name === 'ARIAT') {
        redirect('warehouse/check_in_ariat/' . $id_spk);
    } else {
        redirect('warehouse/index_checkin');
    }
    }

    public function transaksii()
    {
        $data['title'] = 'Transaction History';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('warehouse/transaksii', $data);
            $this->load->view('templates/footer');
       
    }

    public function surat_jalan_checkin()
    {
        $data['title'] = 'Surat Jalan CHECK IN';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['sj_checkin'] = $this->db->get('form_sj')->result_array();

        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('warehouse/surat_jalan_checkin', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('form_brand', [
                'brand_name' => strtoupper($this->input->post('brand_name'))]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru berhasil ditambahkan!</div>');
            redirect('form');
        }
    }

    public function surat_jalan_checkout()
    {
        $data['title'] = 'Surat Jalan CHECK OUT';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['sj_checkout'] = $this->db->get('form_sj_checkout')->result_array();

        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');

        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('warehouse/surat_jalan_checkout', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('form_brand', [
                'brand_name' => strtoupper($this->input->post('brand_name'))]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu baru berhasil ditambahkan!</div>');
            redirect('form');
        }
    }

    public function update_checkin_item($id){
    $data['title'] = 'Form Checkin Item';
    $data['users'] = $this->db->get_where('users', ['email' => 
    $this->session->userdata('email')])->row_array();

    $id_spk = $this->uri->segment(3);
    $where = ['id_spk' => $id_spk];
    $data['spk'] = $this->General_model->get_one('form_spk_checkin', $where);

    if (!$data['spk']) {
        show_error('SPK data not found for ID: ' . $id_spk);
    }
    $data['spkitem'] = $this->General_model->get('form_checkin_item', ['id_spk' => $id_spk]);
    $active_artcolor = $data['spk'];
    $data['item'] = $this->General_model->get('form_consrate', ['artcolor_name' => $active_artcolor]);

    $this->form_validation->set_rules('item_name', 'Item Name', 'required');
    $this->form_validation->set_rules('color_name', 'Color Name', 'required');
    $this->form_validation->set_rules('unit_name', 'Unit Name', 'required');
    $this->form_validation->set_rules('po_number', 'Po Number', 'required');
    $this->form_validation->set_rules('xfd', 'xfd', 'required');
    $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
    $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');
    $this->form_validation->set_rules('cons_rate', 'Consrate', 'required|numeric');

    if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('warehouse/menu_item_checkin', $data);
        $this->load->view('templates/footer');
    } else {
        // 1. Capture inputs
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

        $checkin_data = [
            'item_name'      => strtoupper($this->input->post('item_name', TRUE)),
            'unit_name'      => strtoupper($this->input->post('unit_name', TRUE)),
            'id_spk'         => $id_spk,
        ];


        // 2. Insert detail row (qty is per-item)
        $this->General_model->insert('form_spk_item', $insert_data);
        $this->General_model->insert('form_checkin_item', $checkin_data);

        // 3. Update total in form_spk
        $summary = $this->General_model->get_ones('form_spk', ['id_spk' => $id_spk]);
        $new_total = $summary->total_qty * $insert_data['cons_rate'];
        $this->General_model->update('form_spk_item', ['total_consrate' => $new_total], 'id_spk', $id_spk);
        $this->General_model->update('form_total_item', ['total_consrate' => $new_total], 'id_spk', $id_spk);
        // 4. Notify and redirect
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Size baru berhasil ditambahkan ke SPK!</div>');
        redirect('form/update_spk_item/'.$id_spk);
    }

    }

    public function check_in_blackstone($id)
    {
        $data['title'] = 'Black Stone Checkin View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id])->result_array();
        $data['in'] = $this->General_model->get_data('form_checkin_blackstone', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('form_checkin_item', ['id_spk' => $id]);
        $active_artcolor = $data['spk'];
        $data['item'] = $this->General_model->get('form_consrate', ['artcolor_name' => $active_artcolor]);

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
        $this->load->view('warehouse/checkin_blackstone', $data);
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

            redirect('form/view_spk_blackstone/' . $id);
        }
    }

    public function check_in_rossi($id)
    {
        $data['title'] = 'Rossi Checkin View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id])->result_array();
        $data['in'] = $this->General_model->get_data('form_checkin_rossi', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('form_checkin_item', ['id_spk' => $id]);
        $active_artcolor = $data['spk'];
        $data['item'] = $this->General_model->get('form_consrate', ['artcolor_name' => $active_artcolor]);
        // Define all size fields
        $sizes = [
            '3', '3t', '4', '4t', '5', '5t',
            '6', '6t', '7', '7t', '8', '8t',
            '9', '9t', '10', '10t', '11', '11t',
            '12', '13', '14', '15'
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
            $this->load->view('warehouse/checkin_rossi', $data); // ✅ Correct view
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

    public function check_in_ariat($id)
    {
        $data['title'] = 'Ariat Checkin View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id])->result_array();
        $data['in'] = $this->General_model->get_data('form_checkin_ariat', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('form_checkin_item', ['id_spk' => $id]);
        $active_artcolor = $data['spk'];
        $data['item'] = $this->General_model->get('form_consrate', ['artcolor_name' => $active_artcolor]);

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
            $this->load->view('warehouse/checkin_ariat', $data); // ← corrected view
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

    public function update_sj_item($id){
    $data['title'] = 'Form Add Item';
    $data['users'] = $this->db->get_where('users', ['email' => 
    $this->session->userdata('email')])->row_array();
    $data['datanosj'] = $this->General_model->buat_do_auto();

    $id_spk = $this->uri->segment(3);
    $where = ['id_spk' => $id_spk];
    $data['spk'] = $this->General_model->get_one('form_spk_checkin', $where);

    if (!$data['spk']) {
        show_error('SPK data not found for ID: ' . $id_spk);
    }
    $data['spkitem'] = $this->General_model->get('form_sj', ['id_spk' => $id_spk]);

    $this->form_validation->set_rules('po_number', 'Po Number', 'required');
    $this->form_validation->set_rules('xfd', 'xfd', 'required');
    $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
    $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');
    $this->form_validation->set_rules('no_do', 'Nomor DO', 'required');
    $this->form_validation->set_rules('tgl_checkin', 'tanggal checkin', 'required');
    $this->form_validation->set_rules('supplier_name', 'Nama Supplier', 'required');
    $this->form_validation->set_rules('no_plat', 'Nomor Plat', 'required');

    if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('warehouse/menu_item_checkin', $data);
        $this->load->view('templates/footer');
    } else {
        // 1. Capture inputs
        $insert_data = [
            'po_number'      => strtoupper($this->input->post('po_number', TRUE)),
            'xfd'            => $this->input->post('xfd', TRUE),
            'brand_name'     => $this->input->post('brand_name', TRUE),
            'artcolor_name'  => $this->input->post('artcolor_name', TRUE),
            'no_do'      => strtoupper($this->input->post('no_do', TRUE)),
            'no_sj'      => strtoupper($this->input->post('no_sj', TRUE)),
            'tgl_checkin'     => strtoupper($this->input->post('tgl_checkin', TRUE)),
            'supplier_name'      => strtoupper($this->input->post('supplier_name', TRUE)),
            'no_plat'      => strtoupper($this->input->post('no_plat', TRUE)),
            'created_at' => date('Y-m-d H:i:s'),
            'id_spk'         => $id_spk,
        ];


        // 2. Insert detail row (qty is per-item)
        $this->General_model->insert('form_sj', $insert_data);

        // 3. Update total in form_spk
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Jalan baru berhasil ditambahkan ke SPK!</div>');
        redirect('warehouse/update_sj_item/'.$id_spk);
    }

    }

    public function delete_sj($id){
    $this->load->model('General_model');

    if (!$id) {
        show_error("Missing SJ ID");
        return;
    }

    // 1. Get the SJ data before deletion
    $sjData = $this->General_model->get('form_sj', ['id_sj' => $id]);
    if (empty($sjData)) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">SJ data not found.</div>');
        redirect('warehouse/update_sj_item/'); // fallback if ID is invalid
        return;
    }

    $sj = $sjData[0];
    $id_spk = $sj['id_spk'];

    // 2. Delete the SJ entry
    $deleted = $this->General_model->delete('form_sj', 'id_sj', $id);

    if ($deleted > 0) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">SJ deleted successfully.</div>');
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to delete SJ.</div>');
    }

    // 3. Redirect back to the related SPK's SJ page
    redirect('warehouse/update_sj_item/' . $id_spk);
    }

    public function delete_sj_checkout($id){
    $this->load->model('General_model');

    if (!$id) {
        show_error("Missing SJ ID");
        return;
    }

    // 1. Get the SJ data before deletion
    $sjData = $this->General_model->get('form_sj_checkout', ['id_sj' => $id]);
    if (empty($sjData)) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">SJ data not found.</div>');
        redirect('warehouse/update_sj_checkout/'); // fallback if ID is invalid
        return;
    }

    $sj = $sjData[0];
    $id_spk = $sj['id_spk'];

    // 2. Delete the SJ entry
    $deleted = $this->General_model->delete('form_sj_checkout', 'id_sj', $id);

    if ($deleted > 0) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">SJ deleted successfully.</div>');
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to delete SJ.</div>');
    }

    // 3. Redirect back to the related SPK's SJ page
    redirect('warehouse/update_sj_checkout/' . $id_spk);
    }


    public function sj_detail_item($id_spk, $id_sj = null)
    {
        $spk = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id_spk])->row_array();

        if (!$spk) {
            redirect('warehouse/index_checkin');
        }

        $brand_name = $spk['brand_name'];

        // Get the latest or first SJ for this SPK
        if ($id_sj === null) {
        $sj = $this->General_model->get_data('form_sj', ['id_spk' => $id_spk], 1)->row_array();
        if (!$sj) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">No SJ found for this SPK.</div>');
            redirect('warehouse/index_checkin');
        }
        $id_sj = $sj['id_sj'];
    }

        // Redirect to the correct handler
        if ($brand_name === 'BLACK STONE') {
            redirect('warehouse/sj_item_blackstone/' . $id_spk . '/' . $id_sj);
        } elseif ($brand_name === 'ROSSI') {
            redirect('warehouse/sj_item_rossi/' . $id_spk . '/' . $id_sj);
        } elseif ($brand_name === 'ARIAT') {
            redirect('warehouse/sj_item_ariat/' . $id_spk . '/' . $id_sj);
        } else {
            redirect('warehouse/index_checkin');
        }
    }


    public function sj_item_blackstone($id, $id_sj)
    {
        $data['title'] = 'Black Stone SJ View';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id])->result_array();
        $data['in'] = $this->General_model->get_data('form_sjitem_blackstone', ['id_spk' => $id])->result_array();
        $data['uns'] = $this->General_model->get_data('form_checkin_item', ['id_spk' => $id])->result_array();
        $data['insj'] = $this->General_model->get_data('form_sj', ['id_sj' => $id_sj])->result_array();

         $data['spkitem'] = $this->General_model->get('form_sjitem_blackstone', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ]);
        $data['id_spk'] = $id;
        $data['id_sj']  = $id_sj;

        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'xfd', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');
        $this->form_validation->set_rules('no_do', 'NO DO', 'required');
        $this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required');
        $this->form_validation->set_rules('no_plat', 'No Plat', 'required');
        $this->form_validation->set_rules('tgl_checkin', 'Tanggal Checkin', 'required');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('unit_name', 'Unit Name', 'required');
        $this->form_validation->set_rules('id_sj', 'ID SJ', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('warehouse/sj_item_blackstone', $data);
            $this->load->view('templates/footer');
        } else {
            $item_name  = $this->input->post('item_name');
            $unit_name  = $this->input->post('unit_name');
            $item_type  = $this->input->post('item_type');

            // 🔍 Check if same item_name + unit_name already exists for this id_spk
            $exists = $this->General_model->get_one('form_sjitem_blackstone', [
                'id_spk'     => $id,
                'id_sj'     => $id_sj,
                'item_name'  => $item_name,
                'unit_name'  => $unit_name
            ]);

            if ($exists) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Data with the same Item and Unit already exists. No new entry added.</div>');
                redirect('warehouse/sj_item_blackstone/' . $id. '/' . $id_sj);
            } else {
                // ✅ Prepare base insert data
                $insertData = [
                    'id_spk'        => $id,
                    'po_number'     => $this->input->post('po_number'),
                    'xfd'           => $this->input->post('xfd'),
                    'brand_name'    => $this->input->post('brand_name'),
                    'artcolor_name' => $this->input->post('artcolor_name'),
                    'no_do'         => $this->input->post('no_do'),
                    'no_sj'         => $this->input->post('no_sj'),
                    'supplier_name' => $this->input->post('supplier_name'),
                    'no_plat'       => $this->input->post('no_plat'),
                    'tgl_checkin'   => $this->input->post('tgl_checkin'),
                    'id_sj'         => $this->input->post('id_sj'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'item_type'     => $item_type,
                    'item_name'     => $item_name,
                    'unit_name'     => $unit_name,
                ];

                $final_qty = 0;

                // ✅ Add conditional fields
                if ($item_type === 'GLOBAL') {
                    $final_qty =  $this->input->post('qty');
                    $insertData['qty'] = $final_qty;

                } elseif ($item_type === 'SIZERUN') {
                    for ($i = 36; $i <= 50; $i++) {
                        $sizeQty = $this->input->post('size_' . $i);
                        $insertData['size_' . $i] = $sizeQty;
                        $final_qty += $sizeQty;
                    }
                    $insertData['qty'] = $final_qty;
                }

                // ✅ Insert into sjitem table
                $this->General_model->insert('form_sjitem_blackstone', $insertData);

                $this->db->where([
                        'id_spk'     => $id,
                        'item_name'  => $item_name,
                        'unit_name'  => $unit_name
                    ]);
                    $existing = $this->db->get('form_checkin_item')->row_array();

                $existing_qty = isset($existing['qty']) && is_numeric($existing['qty']) ? (int)$existing['qty'] : 0;
                $new_total_qty = $existing_qty + $final_qty;

                $existing_checkin_qty = isset($existing['checkin_qty']) && is_numeric($existing['checkin_qty']) ? $existing['checkin_qty'] : 0;
                $total_consrate = isset($existing['total_consrate']) && is_numeric($existing['total_consrate']) ? $existing['total_consrate'] : 0;
                $adjusted_checkin_qty = $new_total_qty - $total_consrate;
                // Update with new total
                $this->General_model->update2(
                    'form_checkin_item',
                    ['qty' => $new_total_qty, 'checkin_balance' => $adjusted_checkin_qty, 'checkin_qty' => $new_total_qty],
                    ['id_spk' => $id, 'item_name' => $item_name, 'unit_name' => $unit_name]
                );

                $this->session->set_flashdata('message', '<div class="alert alert-success">Item added and quantity updated successfully.</div>');
                redirect('warehouse/sj_item_blackstone/' . $id. '/' . $id_sj);
            }
        }
    }
    
    public function sj_item_rossi($id_spk, $id_sj)
    {
        $data['title'] = 'Rossi SJ View';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
        // Get SPK detail
        $data['spk'] = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id_spk])->result_array();
        $data['in'] = $this->General_model->get_data('form_sjitem_rossi', ['id_spk' => $id_spk])->result_array();
        $data['uns'] = $this->General_model->get_data('form_checkin_item', ['id_spk' => $id_spk])->result_array();
        $data['insj'] = $this->General_model->get_data('form_sj', ['id_sj' => $id_sj])->result_array();

         $data['spkitem'] = $this->General_model->get('form_sjitem_rossi', [
            'id_spk' => $id_spk,
            'id_sj'  => $id_sj
        ]);
        $data['id_spk'] = $id_spk;
        $data['id_sj']  = $id_sj;


        // Validation rules
        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'xfd', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');
        $this->form_validation->set_rules('no_do', 'NO DO', 'required');
        $this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required');
        $this->form_validation->set_rules('no_plat', 'No Plat', 'required');
        $this->form_validation->set_rules('tgl_checkin', 'Tanggal Checkin', 'required');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('unit_name', 'Unit Name', 'required');
        $this->form_validation->set_rules('id_sj', 'ID SJ', 'required');

        // Defined sizes for SIZERUN
        $sizes = [
            '3', '3t', '4', '4t', '5', '5t', '6', '6t', '7', '7t',
            '8', '8t', '9', '9t', '10', '10t', '11', '11t', '12', '13', '14', '15'
        ];

        if ($this->form_validation->run() == false) {
            // Show view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('warehouse/sj_item_rossi', $data);
            $this->load->view('templates/footer');
        } else {
            // Handle form submission
            $item_name = $this->input->post('item_name');
            $unit_name = $this->input->post('unit_name');
            $item_type = $this->input->post('item_type');

            // ✅ Check if item already exists for the same SPK and unit
            $exists = $this->General_model->get_one('form_sjitem_rossi', [
                'id_spk' => $id_spk,
                'id_sj'     => $id_sj,
                'item_name' => $item_name,
                'unit_name' => $unit_name
            ]);

            if ($exists) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Data with the same Item and Unit already exists. No new entry added.</div>');
                redirect('warehouse/sj_item_rossi/' . $id_spk .'/' . $id_sj);
            } else {
                // Prepare insert data
                $insertData = [
                    'id_spk'        => $id_spk,
                    'po_number'     => $this->input->post('po_number'),
                    'xfd'           => $this->input->post('xfd'),
                    'brand_name'    => $this->input->post('brand_name'),
                    'artcolor_name' => $this->input->post('artcolor_name'),
                    'no_do'         => $this->input->post('no_do'),
                    'no_sj'         => $this->input->post('no_sj'),
                    'supplier_name' => $this->input->post('supplier_name'),
                    'no_plat'       => $this->input->post('no_plat'),
                    'tgl_checkin'   => $this->input->post('tgl_checkin'),
                    'id_sj'         => $this->input->post('id_sj'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'item_type'     => $item_type,
                    'item_name'     => $item_name,
                    'unit_name'     => $unit_name,
                ];

                $final_qty = 0;

                if ($item_type === 'GLOBAL') {
                    // GLOBAL type - single qty field
                    $final_qty = $this->input->post('qty');
                    $insertData['qty'] = $final_qty;
                } elseif ($item_type === 'SIZERUN') {
                    // SIZERUN type - multiple sizes
                    foreach ($sizes as $size) {
                        $value = $this->input->post('size_' . $size);
                        $insertData['size_' . $size] = $value;
                        $final_qty += $value;
                    }
                    $insertData['qty'] = $final_qty;
                }

                $this->General_model->insert('form_sjitem_rossi', $insertData);

                $this->db->where([
                        'id_spk'     => $id_spk,
                        'item_name'  => $item_name,
                        'unit_name'  => $unit_name
                    ]);
                    $existing = $this->db->get('form_checkin_item')->row_array();

                $existing_qty = isset($existing['qty']) && is_numeric($existing['qty']) ? (int)$existing['qty'] : 0;
                $new_total_qty = $existing_qty + $final_qty;

                $existing_checkin_qty = isset($existing['checkin_qty']) && is_numeric($existing['checkin_qty']) ? $existing['checkin_qty'] : 0;
                $total_consrate = isset($existing['total_consrate']) && is_numeric($existing['total_consrate']) ? $existing['total_consrate'] : 0;
                $adjusted_checkin_qty = $new_total_qty - $total_consrate;
                // Update with new total
                $this->General_model->update2(
                    'form_checkin_item',
                    ['qty' => $new_total_qty, 'checkin_balance' => $adjusted_checkin_qty, 'checkin_qty' => $new_total_qty],
                    ['id_spk' => $id_spk, 'item_name' => $item_name, 'unit_name' => $unit_name]
                );
                $this->session->set_flashdata('message', '<div class="alert alert-success">Item added and quantity updated successfully.</div>');
            }

            redirect('warehouse/sj_item_rossi/' . $id_spk .'/' . $id_sj);
        }
    }

    public function sj_item_ariat($id, $id_sj)
    {
        $data['title'] = 'Ariat SJ View';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id])->result_array();
        $data['in'] = $this->General_model->get_data('form_sjitem_ariat', ['id_spk' => $id])->result_array();
        $data['uns'] = $this->General_model->get_data('form_checkin_item', ['id_spk' => $id])->result_array();
        $data['insj'] = $this->General_model->get_data('form_sj', ['id_sj' => $id_sj])->result_array();

         $data['spkitem'] = $this->General_model->get('form_sjitem_ariat', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ]);
        $data['id_spk'] = $id;
        $data['id_sj']  = $id_sj;

        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'xfd', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');
        $this->form_validation->set_rules('no_do', 'NO DO', 'required');
        $this->form_validation->set_rules('supplier_name', 'Supplier Name', 'required');
        $this->form_validation->set_rules('no_plat', 'No Plat', 'required');
        $this->form_validation->set_rules('tgl_checkin', 'Tanggal Checkin', 'required');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('unit_name', 'Unit Name', 'required');
        $this->form_validation->set_rules('id_sj', 'ID SJ', 'required');

        $sizes = [
            '6d', '6_5d', '7d', '7_5d', '8d', '8_5d',
            '9d', '9_5d', '10d', '10_5d', '11d', '11_5d',
            '12d', '13d', '14d', '15d', '16d'
        ];

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('warehouse/sj_item_ariat', $data);
            $this->load->view('templates/footer');
        } else {
            $item_name  = $this->input->post('item_name');
            $unit_name  = $this->input->post('unit_name');
            $item_type  = $this->input->post('item_type');

            // Correct table name
            $exists = $this->General_model->get_one('form_sjitem_ariat', [
                'id_spk'     => $id,
                'id_sj'     => $id_sj,
                'item_name'  => $item_name,
                'unit_name'  => $unit_name
            ]);

            if ($exists) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Data with the same Item and Unit already exists. No new entry added.</div>');
                redirect('warehouse/sj_item_ariat/' . $id .'/' . $id_sj);
            } else {
                $insertData = [
                    'id_spk'        => $id,
                    'po_number'     => $this->input->post('po_number'),
                    'xfd'           => $this->input->post('xfd'),
                    'brand_name'    => $this->input->post('brand_name'),
                    'artcolor_name' => $this->input->post('artcolor_name'),
                    'no_do'         => $this->input->post('no_do'),
                    'no_sj'         => $this->input->post('no_sj'),
                    'supplier_name' => $this->input->post('supplier_name'),
                    'no_plat'       => $this->input->post('no_plat'),
                    'tgl_checkin'   => $this->input->post('tgl_checkin'),
                    'id_sj'         => $this->input->post('id_sj'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'item_type'     => $item_type,
                    'item_name'     => $item_name,
                    'unit_name'     => $unit_name,
                ];

                $final_qty = 0;

                if ($item_type === 'GLOBAL') {
                    $final_qty = $this->input->post('qty');
                    $insertData['qty'] = $final_qty;

                } elseif ($item_type === 'SIZERUN') {
                    foreach ($sizes as $size) {
                        $value = $this->input->post('size_' . $size);
                        $insertData['size_' . $size] = $value;
                        $final_qty += $value;
                    }
                    $insertData['qty'] = $final_qty;
                }

                $this->General_model->insert('form_sjitem_ariat', $insertData);

                $this->db->where([
                        'id_spk'     => $id,
                        'item_name'  => $item_name,
                        'unit_name'  => $unit_name
                    ]);
                    $existing = $this->db->get('form_checkin_item')->row_array();

                $existing_qty = isset($existing['qty']) && is_numeric($existing['qty']) ? (int)$existing['qty'] : 0;
                $new_total_qty = $existing_qty + $final_qty;

                $existing_checkin_qty = isset($existing['checkin_qty']) && is_numeric($existing['checkin_qty']) ? $existing['checkin_qty'] : 0;
                $total_consrate = isset($existing['total_consrate']) && is_numeric($existing['total_consrate']) ? $existing['total_consrate'] : 0;
                $adjusted_checkin_qty = $new_total_qty - $total_consrate;
                // Update with new total
                $this->General_model->update2(
                    'form_checkin_item',
                    ['qty' => $new_total_qty, 'checkin_balance' => $adjusted_checkin_qty, 'checkin_qty' => $new_total_qty],
                    ['id_spk' => $id, 'item_name' => $item_name, 'unit_name' => $unit_name]
                );
                $this->session->set_flashdata('message', '<div class="alert alert-success">Item added and quantity updated successfully.</div>');
            }

            redirect('warehouse/sj_item_ariat/' . $id .'/' . $id_sj);
        }
    }

    public function delete_sj_blackstone($id)
    {
    $this->load->model('General_model');

    if (!$id) {
        show_error("Missing ID");
        return;
    }

    // 1. Get the deleted item data first
    $item = $this->General_model->get('form_sjitem_blackstone', ['id_bsj' => $id]);
    if (!$item) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Item not found.</div>');
        redirect('warehouse/sj_item_blackstone'); // Or another fallback
        return;
    }

    $item = $item[0]; // Get the first record

    $id_spk   = $item['id_spk'];
    $id_sj    = $item['id_sj'];
   

    // 2. Delete the item
    $deleted = $this->General_model->delete('form_sjitem_blackstone', 'id_bsj', $id);

    if ($deleted > 0) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Size deleted successfully and stock updated.</div>');
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete failed.</div>');
    }

    redirect('warehouse/sj_item_blackstone/' . $id_spk . '/' . $id_sj);
    }

    public function delete_sj_rossi($id)
    {
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }
        $item = $this->General_model->get('form_sjitem_rossi', ['id_bsj' => $id]);
        if (!$item) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Item not found.</div>');
            redirect('warehouse/sj_item_rossi'); // Or another fallback
            return;
        }

        $item = $item[0]; // Get the first record

        $id_spk   = $item['id_spk'];
        $id_sj    = $item['id_sj'];

        $deleted = $this->General_model->delete('form_sjitem_rossi', 'id_bsj', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Size deleted successfully.</div>');
                redirect('warehouse/sj_item_rossi/' . $id_spk . '/' . $id_sj);

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Size not found.</div>');
            redirect('warehouse/sj_item_rossi/' . $id_spk . '/' . $id_sj);
        }
    }

    public function delete_sj_ariat($id)
    {
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }
        $item = $this->General_model->get('form_sjitem_ariat', ['id_bsj' => $id]);
        if (!$item) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Item not found.</div>');
            redirect('warehouse/sj_item_ariat'); // Or another fallback
            return;
        }

        $item = $item[0]; // Get the first record

        $id_spk   = $item['id_spk'];
        $id_sj    = $item['id_sj'];

        $deleted = $this->General_model->delete('form_sjitem_ariat', 'id_bsj', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Size deleted successfully.</div>');
                redirect('warehouse/sj_item_ariat/' . $id_spk . '/' . $id_sj);

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Size not found.</div>');
            redirect('warehouse/sj_item_ariat/' . $id_spk . '/' . $id_sj);
        }
    }

    public function delete_sj_checkout_blackstone($id)
    {
    $this->load->model('General_model');

    if (!$id) {
        show_error("Missing ID");
        return;
    }

    // 1. Get the deleted item data first
    $item = $this->General_model->get('form_sjitem_checkout_blackstone', ['id_bsj' => $id]);
    if (!$item) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Item not found.</div>');
        redirect('warehouse/sj_item_checkout_blackstone'); // Or another fallback
        return;
    }

    $item = $item[0]; // Get the first record

    $id_spk   = $item['id_spk'];
    $id_sj    = $item['id_sj'];
   

    // 2. Delete the item
    $deleted = $this->General_model->delete('form_sjitem_checkout_blackstone', 'id_bsj', $id);

    if ($deleted > 0) {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Size deleted successfully and stock updated.</div>');
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete failed.</div>');
    }

    redirect('warehouse/sj_item_checkout_blackstone/' . $id_spk . '/' . $id_sj);
    }

    public function delete_sj_checkout_rossi($id)
    {
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }
        $item = $this->General_model->get('form_sjitem_checkout_rossi', ['id_bsj' => $id]);
        if (!$item) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Item not found.</div>');
            redirect('warehouse/sj_item_checkout_rossi'); // Or another fallback
            return;
        }

        $item = $item[0]; // Get the first record

        $id_spk   = $item['id_spk'];
        $id_sj    = $item['id_sj'];

        $deleted = $this->General_model->delete('form_sjitem_checkout_rossi', 'id_bsj', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Size deleted successfully.</div>');
                redirect('warehouse/sj_item_checkout_rossi/' . $id_spk . '/' . $id_sj);

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Size not found.</div>');
            redirect('warehouse/sj_item_checkout_rossi/' . $id_spk . '/' . $id_sj);
        }
    }
    
    public function delete_sj_checkout_ariat($id)
    {
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }
        $item = $this->General_model->get('form_sjitem_checkout_ariat', ['id_bsj' => $id]);
        if (!$item) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Item not found.</div>');
            redirect('warehouse/sj_item_checkout_ariat'); // Or another fallback
            return;
        }

        $item = $item[0]; // Get the first record

        $id_spk   = $item['id_spk'];
        $id_sj    = $item['id_sj'];

        $deleted = $this->General_model->delete('form_sjitem_checkout_ariat', 'id_bsj', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Size deleted successfully.</div>');
                redirect('warehouse/sj_item_checkout_ariat/' . $id_spk . '/' . $id_sj);

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Size not found.</div>');
            redirect('warehouse/sj_item_checkout_ariat/' . $id_spk . '/' . $id_sj);
        }
    }

    public function export_sj_blackstone($id,$id_sj)
    {
        $data['title'] = 'Black Stone SJ Report';
        $data['spk'] = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id])->result_array();
        $data['insj'] = $this->General_model->get_data('form_sj', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ])->result_array();
        $data['spkitem'] = $this->General_model->get('form_sjitem_blackstone', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ]);

        // Load the HTML view
        $html = $this->load->view('warehouse/pdf_sj_blackstone', $data, TRUE);

        // Set options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        // Instantiate Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // Or portrait
        
        $dompdf->render();
        $no_do = !empty($data['insj']) ? $data['insj'][0]['no_do'] : $id;
        $dompdf->stream("sj_blackstone_{$no_do}.pdf", array("Attachment" => 0)); // 0 = view in browser
    }

    public function export_sj_ariat($id,$id_sj)
    {
        $data['title'] = 'Ariat SJ Report';
        $data['spk'] = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id])->result_array();
        $data['insj'] = $this->General_model->get_data('form_sj', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ])->result_array();
        $data['spkitem'] = $this->General_model->get('form_sjitem_ariat', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ]);

        // Load the HTML view
        $html = $this->load->view('warehouse/pdf_sj_ariat', $data, TRUE);

        // Set options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        // Instantiate Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // Or portrait
        
        $dompdf->render();
        $no_do = !empty($data['insj']) ? $data['insj'][0]['no_do'] : $id;
        $dompdf->stream("sj_ariat_{$no_do}.pdf", array("Attachment" => 0)); // 0 = view in browser
    }

    public function export_sj_rossi($id,$id_sj)
    {
        $data['title'] = 'Rossi SJ Report';
        $data['spk'] = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id])->result_array();
        $data['insj'] = $this->General_model->get_data('form_sj', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ])->result_array();
        $data['spkitem'] = $this->General_model->get('form_sjitem_rossi', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ]);

        // Load the HTML view
        $html = $this->load->view('warehouse/pdf_sj_rossi', $data, TRUE);

        // Set options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        // Instantiate Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // Or portrait
        
        $dompdf->render();
        $no_do = !empty($data['insj']) ? $data['insj'][0]['no_do'] : $id;
        $dompdf->stream("sj_rossi_{$no_do}.pdf", array("Attachment" => 0)); // 0 = view in browser
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

    public function index_checkout()
    {
        $data['title'] = 'Form Menu Check OUT';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['artcolor'] = $this->db->get('form_ac')->result_array();
        $data['brand'] = $this->db->get('form_brand')->result_array();
        $data['spk'] = $this->db->get('form_spk_checkout')->result_array();
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
            $this->load->view('warehouse/index_checkout', $data);
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
            );
            $this->db->insert('form_spk_checkin', $data);
            $insert_id = $this->db->insert_id(); // Get ID for detail views

            $brand_lower = strtolower($brand);

            if ($brand_lower === 'blackstone') {
                redirect('warehouse/checkout_blackstone/' . $insert_id);
            } elseif ($brand_lower === 'rossi') {
                redirect('warehouse/checkout_rossi/' . $insert_id);
            } elseif ($brand_lower === 'ariat') {
                redirect('warehouse/checkout_ariat/' . $insert_id);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Brand not recognized. Showing default view.</div>');
                redirect('warehouse/index_checkin');
            }
        }
    }

    public function update_spk_checkout_brand($id_spk)
    {
        $spk = $this->General_model->get_data('form_spk_checkout', ['id_spk' => $id_spk])->row_array();

    if (!$spk) {
        redirect('warehouse/index_checkout'); // fallback if not found
    }

    $brand_name = $spk['brand_name'];

    // Redirect to specific brand handler
    if ($brand_name === 'BLACK STONE') {
        redirect('warehouse/check_out_blackstone/' . $id_spk);
    } elseif ($brand_name === 'ROSSI') {
        redirect('warehouse/check_out_rossi/' . $id_spk);
    } elseif ($brand_name === 'ARIAT') {
        redirect('warehouse/check_out_ariat/' . $id_spk);
    } else {
        redirect('warehouse/index_checkout');
    }
    }

    public function update_sj_checkout_brand($id_spk)
    {
        $spk = $this->General_model->get_data('form_spk_checkout', ['id_spk' => $id_spk])->row_array();

    if (!$spk) {
        redirect('warehouse/index_checkout'); // fallback if not found
    }

    $brand_name = $spk['brand_name'];

    // Redirect to specific brand handler
    if ($brand_name === 'BLACKSTONE') {
        redirect('warehouse/sj_item_checkout_blackstone/' . $id_spk);
    } elseif ($brand_name === 'ROSSI') {
        redirect('warehouse/sj_item_checkout_rossi/' . $id_spk);
    } elseif ($brand_name === 'ARIAT') {
        redirect('warehouse/sj_item_checkout_ariat/' . $id_spk);
    } else {
        redirect('warehouse/index_checkout');
    }
    }

    public function check_out_blackstone($id)
    {
        $data['title'] = 'Black Stone CheckOUT View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk_checkout', ['id_spk' => $id])->result_array();
        $data['out'] = $this->General_model->get_data('form_checkin_blackstone', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('form_checkin_item', ['id_spk' => $id]);
        $active_artcolor = $data['spk'];
        $data['item'] = $this->General_model->get('form_consrate', ['artcolor_name' => $active_artcolor]);

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
        $this->load->view('warehouse/checkout_blackstone', $data);
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

            redirect('form/view_spk_blackstone/' . $id);
        }
    }

    public function check_out_rossi($id)
    {
        $data['title'] = 'ROSSI CheckOUT View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id])->result_array();
        $data['in'] = $this->General_model->get_data('form_checkin_rossi', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('form_checkin_item', ['id_spk' => $id]);
        $active_artcolor = $data['spk'];
        $data['item'] = $this->General_model->get('form_consrate', ['artcolor_name' => $active_artcolor]);

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
        $this->load->view('warehouse/checkout_rossi', $data);
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

            redirect('form/view_spk_blackstone/' . $id);
        }
    }

    public function check_out_ariat($id)
    {
        $data['title'] = 'ARIAT CheckOUT View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id])->result_array();
        $data['in'] = $this->General_model->get_data('form_checkin_ariat', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('form_checkin_item', ['id_spk' => $id]);
        $active_artcolor = $data['spk'];
        $data['item'] = $this->General_model->get('form_consrate', ['artcolor_name' => $active_artcolor]);

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
        $this->load->view('warehouse/checkout_ariat', $data);
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

            redirect('form/view_spk_blackstone/' . $id);
        }
    }

    public function update_sj_checkout($id){
    $data['title'] = 'Form Surat Jalan CheckOUT';
    $data['users'] = $this->db->get_where('users', ['email' => 
    $this->session->userdata('email')])->row_array();
    $data['datanosj'] = $this->General_model->buat_sj_auto();

    $id_spk = $this->uri->segment(3);
    $where = ['id_spk' => $id_spk];
    $data['spk'] = $this->General_model->get_one('form_spk_checkout', $where);

    if (!$data['spk']) {
        show_error('SPK data not found for ID: ' . $id_spk);
    }
    $data['spkitem'] = $this->General_model->get('form_sj_checkout', ['id_spk' => $id_spk]);

    $this->form_validation->set_rules('po_number', 'Po Number', 'required');
    $this->form_validation->set_rules('xfd', 'xfd', 'required');
    $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
    $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');
    $this->form_validation->set_rules('tgl_checkout', 'tanggal checkout', 'required');
    $this->form_validation->set_rules('from', 'From', 'required');
    $this->form_validation->set_rules('to_dept', 'TO Department', 'required');

    if($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('warehouse/menu_sj_checkout', $data);
        $this->load->view('templates/footer');
    } else {
        // 1. Capture inputs
        $insert_data = [
            'po_number'      => strtoupper($this->input->post('po_number', TRUE)),
            'xfd'            => $this->input->post('xfd', TRUE),
            'brand_name'     => $this->input->post('brand_name', TRUE),
            'artcolor_name'  => $this->input->post('artcolor_name', TRUE),
            'no_sj'          => strtoupper($this->input->post('no_sj', TRUE)),
            'tgl_checkout'   => strtoupper($this->input->post('tgl_checkout', TRUE)),
            'from'           => strtoupper($this->input->post('from', TRUE)),
            'to_dept'        => strtoupper($this->input->post('to_dept', TRUE)),
            'created_at'     => date('Y-m-d H:i:s'),
            'id_spk'         => $id_spk,
        ];


        // 2. Insert detail row (qty is per-item)
        $this->General_model->insert('form_sj_checkout', $insert_data);

        // 3. Update total in form_spk
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Jalan berhasil ditambahkan!</div>');
        redirect('warehouse/update_sj_checkout/'.$id_spk);
    }

    }

    public function sj_detail_item_checkout($id_spk, $id_sj = null)
    {
        $spk = $this->General_model->get_data('form_spk_checkout', ['id_spk' => $id_spk])->row_array();

        if (!$spk) {
            redirect('warehouse/index_checkout');
        }

        $brand_name = $spk['brand_name'];

        // Get the latest or first SJ for this SPK
        if ($id_sj === null) {
        $sj = $this->General_model->get_data('form_sj', ['id_spk' => $id_spk], 1)->row_array();
        if (!$sj) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">No SJ found for this SPK.</div>');
            redirect('warehouse/index_checkout');
        }
        $id_sj = $sj['id_sj'];
    }

        // Redirect to the correct handler
        if ($brand_name === 'BLACK STONE') {
            redirect('warehouse/sj_item_checkout_blackstone/' . $id_spk . '/' . $id_sj);
        } elseif ($brand_name === 'ROSSI') {
            redirect('warehouse/sj_item_checkout_rossi/' . $id_spk . '/' . $id_sj);
        } elseif ($brand_name === 'ARIAT') {
            redirect('warehouse/sj_item_checkout_ariat/' . $id_spk . '/' . $id_sj);
        } else {
            redirect('warehouse/index_checkout');
        }
    }

    public function sj_item_checkout_blackstone($id, $id_sj)
    {
        $data['title'] = 'BlackStone Checkout SJ View';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk_checkout', ['id_spk' => $id])->result_array();
        $data['out'] = $this->General_model->get_data('form_sjitem_checkout_blackstone', ['id_spk' => $id])->result_array();
        $data['uns'] = $this->General_model->get_data('form_checkin_item', ['id_spk' => $id])->result_array();
        $data['outsj'] = $this->General_model->get_data('form_sj_checkout', ['id_sj' => $id_sj])->result_array();

         $data['spkitem'] = $this->General_model->get('form_sjitem_checkout_blackstone', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ]);
        $data['id_spk'] = $id;
        $data['id_sj']  = $id_sj;

        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'xfd', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');
        $this->form_validation->set_rules('tgl_checkout', 'Tanggal Checkout', 'required');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('unit_name', 'Unit Name', 'required');
        $this->form_validation->set_rules('id_sj', 'ID SJ', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('warehouse/sj_item_checkout_blackstone', $data);
            $this->load->view('templates/footer');
        } else {
            $item_name  = $this->input->post('item_name');
            $unit_name  = $this->input->post('unit_name');
            $item_type  = $this->input->post('item_type');

            // 🔍 Check if same item_name + unit_name already exists for this id_spk
            $exists = $this->General_model->get_one('form_sjitem_checkout_blackstone', [
                'id_spk'     => $id,
                'id_sj'      => $id_sj,
                'item_name'  => $item_name,
                'unit_name'  => $unit_name
            ]);

            if ($exists) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Data with the same Item and Unit already exists. No new entry added.</div>');
                redirect('warehouse/sj_item_checkout_blackstone/' . $id. '/' . $id_sj);
            } else {
                // ✅ Prepare base insert data
                $insertData = [
                    'id_spk'        => $id,
                    'po_number'     => $this->input->post('po_number'),
                    'xfd'           => $this->input->post('xfd'),
                    'brand_name'    => $this->input->post('brand_name'),
                    'artcolor_name' => $this->input->post('artcolor_name'),
                    'no_sj'         => $this->input->post('no_sj'),
                    'from'          => $this->input->post('from'),
                    'to_dept'       => $this->input->post('to_dept'),
                    'tgl_checkout'  => $this->input->post('tgl_checkout'),
                    'id_sj'         => $this->input->post('id_sj'),
                    'item_type'     => $item_type,
                    'item_name'     => $item_name,
                    'unit_name'     => $unit_name,
                ];

                $final_qty = 0;

                // ✅ Add conditional fields
                if ($item_type === 'GLOBAL') {
                    $final_qty = $this->input->post('qty');
                    $insertData['qty'] = $final_qty;

                } elseif ($item_type === 'SIZERUN') {
                    for ($i = 36; $i <= 50; $i++) {
                        $sizeQty = $this->input->post('size_' . $i);
                        $insertData['size_' . $i] = $sizeQty;
                        $final_qty += $sizeQty;
                    }
                    $insertData['qty'] = $final_qty;
                }

                // ✅ Insert into sjitem table
                $this->General_model->insert('form_sjitem_checkout_blackstone', $insertData);

                $this->db->where([
                        'id_spk'     => $id,
                        'item_name'  => $item_name,
                        'unit_name'  => $unit_name
                    ]);
                    $existing = $this->db->get('form_checkin_item')->row_array();

                $existing_qty = isset($existing['qty']) && is_numeric($existing['qty']) ? $existing['qty'] : 0;
                $current_checkout_qty = isset($existing['checkout_qty']) && is_numeric($existing['checkout_qty']) ? $existing['checkout_qty'] : 0;
                $total_consrate = isset($existing['total_consrate']) && is_numeric($existing['total_consrate']) ? $existing['total_consrate'] : 0;

                $new_total_qty = $existing_qty - $final_qty;
                

                // ✅ Compute adjusted checkout_qty
                $checkout_qty_with_addition = $current_checkout_qty + $final_qty;
                $adjusted_checkout_qty = $final_qty - $total_consrate;

                // ✅ Update qty and checkout_qty in one go
                $this->General_model->update2(
                    'form_checkin_item',
                    [
                        'qty' => $new_total_qty,
                        'checkout_qty' => $checkout_qty_with_addition,
                        'checkout_balance' => $adjusted_checkout_qty,
                    ],
                    [
                        'id_spk' => $id,
                        'item_name' => $item_name,
                        'unit_name' => $unit_name
                    ]
                );

                $this->session->set_flashdata('message', '<div class="alert alert-success">Item added and quantity updated successfully.</div>');
                redirect('warehouse/sj_item_checkout_blackstone/' . $id. '/' . $id_sj);
            }
        }
    }

    public function sj_item_checkout_rossi($id_spk, $id_sj)
    {
        $data['title'] = 'Rossi Checkout SJ View';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        
        // Get SPK detail
        $data['spk'] = $this->General_model->get_data('form_spk_checkout', ['id_spk' => $id_spk])->result_array();
        $data['out'] = $this->General_model->get_data('form_sjitem_checkout_rossi', ['id_spk' => $id_spk])->result_array();
        $data['uns'] = $this->General_model->get_data('form_checkin_item', ['id_spk' => $id_spk])->result_array();
        $data['outsj'] = $this->General_model->get_data('form_sj_checkout', ['id_sj' => $id_sj])->result_array();

         $data['spkitem'] = $this->General_model->get('form_sjitem_checkout_rossi', [
            'id_spk' => $id_spk,
            'id_sj'  => $id_sj
        ]);
        $data['id_spk'] = $id_spk;
        $data['id_sj']  = $id_sj;


        // Validation rules
        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'xfd', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');
        $this->form_validation->set_rules('tgl_checkout', 'Tanggal Checkout', 'required');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('unit_name', 'Unit Name', 'required');
        $this->form_validation->set_rules('id_sj', 'ID SJ', 'required');

        // Defined sizes for SIZERUN
        $sizes = [
            '3', '3t', '4', '4t', '5', '5t', '6', '6t', '7', '7t',
            '8', '8t', '9', '9t', '10', '10t', '11', '11t', '12', '13', '14', '15'
        ];

        if ($this->form_validation->run() == false) {
            // Show view
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('warehouse/sj_item_checkout_rossi', $data);
            $this->load->view('templates/footer');
        } else {
            // Handle form submission
            $item_name = $this->input->post('item_name');
            $unit_name = $this->input->post('unit_name');
            $item_type = $this->input->post('item_type');

            // ✅ Check if item already exists for the same SPK and unit
            $exists = $this->General_model->get_one('form_sjitem_checkout_rossi', [
                'id_spk' => $id_spk,
                'id_sj'     => $id_sj,
                'item_name' => $item_name,
                'unit_name' => $unit_name
            ]);

            if ($exists) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Data with the same Item and Unit already exists. No new entry added.</div>');
                 redirect('warehouse/sj_item_checkout_rossi/' . $id. '/' . $id_sj);
            } else {
                // Prepare insert data
                $insertData = [
                    'id_spk'        => $id_spk,
                    'po_number'     => $this->input->post('po_number'),
                    'xfd'           => $this->input->post('xfd'),
                    'brand_name'    => $this->input->post('brand_name'),
                    'artcolor_name' => $this->input->post('artcolor_name'),
                    'no_sj'         => $this->input->post('no_sj'),
                    'from'          => $this->input->post('from'),
                    'to_dept'       => $this->input->post('to_dept'),
                    'tgl_checkout'  => $this->input->post('tgl_checkout'),
                    'id_sj'         => $this->input->post('id_sj'),
                    'item_type'     => $item_type,
                    'item_name'     => $item_name,
                    'unit_name'     => $unit_name,

                ];

                $final_qty = 0;

                if ($item_type === 'GLOBAL') {
                    // GLOBAL type - single qty field
                    $final_qty = $this->input->post('qty');
                    $insertData['qty'] = $final_qty;
                } elseif ($item_type === 'SIZERUN') {
                    // SIZERUN type - multiple sizes
                    foreach ($sizes as $size) {
                        $value = $this->input->post('size_' . $size);
                        $insertData['size_' . $size] = $value;
                        $final_qty += $value;
                    }
                    $insertData['qty'] = $final_qty;
                }

                $this->General_model->insert('form_sjitem_checkout_rossi', $insertData);

                $this->db->where([
                        'id_spk'     => $id_spk,
                        'item_name'  => $item_name,
                        'unit_name'  => $unit_name
                    ]);
                    $existing = $this->db->get('form_checkin_item')->row_array();

                    $existing_qty = isset($existing['qty']) && is_numeric($existing['qty']) ? $existing['qty'] : 0;
                    $current_checkout_qty = isset($existing['checkout_qty']) && is_numeric($existing['checkout_qty']) ? $existing['checkout_qty'] : 0;
                    $total_consrate = isset($existing['total_consrate']) && is_numeric($existing['total_consrate']) ? $existing['total_consrate'] : 0;

                    $new_total_qty = $existing_qty - $final_qty;
                    

                    // ✅ Compute adjusted checkout_qty
                    $checkout_qty_with_addition = $current_checkout_qty + $final_qty;
                    $adjusted_checkout_qty = $final_qty - $total_consrate;

                    // ✅ Update qty and checkout_qty in one go
                    $this->General_model->update2(
                        'form_checkin_item',
                        [
                            'qty' => $new_total_qty,
                            'checkout_qty' => $checkout_qty_with_addition,
                            'checkout_balance' => $adjusted_checkout_qty,
                        ],
                        [
                            'id_spk' => $id_spk,
                            'item_name' => $item_name,
                            'unit_name' => $unit_name
                        ]
                    );

                $this->session->set_flashdata('message', '<div class="alert alert-success">Item added and quantity updated successfully.</div>');
            }

            redirect('warehouse/sj_item_checkout_rossi/' . $id_spk .'/' . $id_sj);
        }
    }

    public function sj_item_checkout_ariat($id, $id_sj)
    {
        $data['title'] = 'Ariat Checkout SJ View';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk_checkout', ['id_spk' => $id])->result_array();
        $data['out'] = $this->General_model->get_data('form_sjitem_checkout_ariat', ['id_spk' => $id])->result_array();
        $data['uns'] = $this->General_model->get_data('form_checkin_item', ['id_spk' => $id])->result_array();
        $data['outsj'] = $this->General_model->get_data('form_sj_checkout', ['id_sj' => $id_sj])->result_array();

         $data['spkitem'] = $this->General_model->get('form_sjitem_checkout_ariat', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ]);
        $data['id_spk'] = $id;
        $data['id_sj']  = $id_sj;

        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('xfd', 'xfd', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');
        $this->form_validation->set_rules('tgl_checkout', 'Tanggal Checkout', 'required');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('unit_name', 'Unit Name', 'required');
        $this->form_validation->set_rules('id_sj', 'ID SJ', 'required');

        $sizes = [
            '6d', '6_5d', '7d', '7_5d', '8d', '8_5d',
            '9d', '9_5d', '10d', '10_5d', '11d', '11_5d',
            '12d', '13d', '14d', '15d', '16d'
        ];

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('warehouse/sj_item_checkout_ariat', $data);
            $this->load->view('templates/footer');
        } else {
            $item_name  = $this->input->post('item_name');
            $unit_name  = $this->input->post('unit_name');
            $item_type  = $this->input->post('item_type');

            // Correct table name
            $exists = $this->General_model->get_one('form_sjitem_checkout_ariat', [
                'id_spk'     => $id,
                'id_sj'     => $id_sj,
                'item_name'  => $item_name,
                'unit_name'  => $unit_name
            ]);

            if ($exists) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Data with the same Item and Unit already exists. No new entry added.</div>');
            } else {
                $insertData = [
                    'id_spk'        => $id,
                    'po_number'     => $this->input->post('po_number'),
                    'xfd'           => $this->input->post('xfd'),
                    'brand_name'    => $this->input->post('brand_name'),
                    'artcolor_name' => $this->input->post('artcolor_name'),
                    'no_sj'         => $this->input->post('no_sj'),
                    'from'          => $this->input->post('from'),
                    'to_dept'       => $this->input->post('to_dept'),
                    'tgl_checkout'  => $this->input->post('tgl_checkout'),
                    'id_sj'         => $this->input->post('id_sj'),
                    'item_type'     => $item_type,
                    'item_name'     => $item_name,
                    'unit_name'     => $unit_name,
                ];

                $final_qty = 0;

                if ($item_type === 'GLOBAL') {
                    $final_qty = $this->input->post('qty');
                    $insertData['qty'] = $final_qty;

                } elseif ($item_type === 'SIZERUN') {
                    foreach ($sizes as $size) {
                        $value = $this->input->post('size_' . $size);
                        $insertData['size_' . $size] = $value;
                        $final_qty += $value;
                    }
                    $insertData['qty'] = $final_qty;
                }

                $this->General_model->insert('form_sjitem_checkout_ariat', $insertData);

                $this->db->where([
                        'id_spk'     => $id,
                        'item_name'  => $item_name,
                        'unit_name'  => $unit_name
                    ]);
                    $existing = $this->db->get('form_checkin_item')->row_array();

                    $existing_qty = isset($existing['qty']) && is_numeric($existing['qty']) ? $existing['qty'] : 0;
                    $current_checkout_qty = isset($existing['checkout_qty']) && is_numeric($existing['checkout_qty']) ? $existing['checkout_qty'] : 0;
                    $total_consrate = isset($existing['total_consrate']) && is_numeric($existing['total_consrate']) ? $existing['total_consrate'] : 0;

                    $new_total_qty = $existing_qty - $final_qty;
                    

                    // ✅ Compute adjusted checkout_qty
                    $checkout_qty_with_addition = $current_checkout_qty + $final_qty;
                    $adjusted_checkout_qty = $final_qty - $total_consrate;

                    // ✅ Update qty and checkout_qty in one go
                    $this->General_model->update2(
                        'form_checkin_item',
                        [
                            'qty' => $new_total_qty,
                            'checkout_qty' => $checkout_qty_with_addition,
                            'checkout_balance' => $adjusted_checkout_qty,
                        ],
                        [
                            'id_spk' => $id,
                            'item_name' => $item_name,
                            'unit_name' => $unit_name
                        ]
                    );

                $this->session->set_flashdata('message', '<div class="alert alert-success">Item added and quantity updated successfully.</div>');
            }

            redirect('warehouse/sj_item_checkout_ariat/' . $id .'/' . $id_sj);
        }
    }

    public function export_sj_checkout_ariat_pdf($id,$id_sj)
    {
        $data['title'] = 'SURAT PENGELUARAN BARANG WAREHOUSE';
        $data['spk'] = $this->General_model->get_data('form_spk_checkout', ['id_spk' => $id])->result_array();
        $data['outsj'] = $this->General_model->get_data('form_sj_checkout', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ])->result_array();
        $data['spkitem'] = $this->General_model->get('form_sjitem_checkout_ariat', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ]);

        // Load the HTML view
        $html = $this->load->view('warehouse/pdf_sj_checkout_ariat', $data, TRUE);

        // Set options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        // Instantiate Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // Or portrait
        
        $dompdf->render();
        $no_sj = !empty($data['outsj']) ? $data['outsj'][0]['no_sj'] : $id;
        $dompdf->stream("sj_rossi_{$no_sj}.pdf", array("Attachment" => 0)); // 0 = view in browser
    }


    

    public function export_sj_checkout_blackstone_pdf($id,$id_sj)
    {
        $data['title'] = 'SURAT PENGELUARAN BARANG WAREHOUSE';
        $data['spk'] = $this->General_model->get_data('form_spk_checkout', ['id_spk' => $id])->result_array();
        $data['outsj'] = $this->General_model->get_data('form_sj_checkout', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ])->result_array();
        $data['spkitem'] = $this->General_model->get('form_sjitem_checkout_blackstone', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ]);

        // Load the HTML view
        $html = $this->load->view('warehouse/pdf_sj_checkout_blackstone', $data, TRUE);

        // Set options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        // Instantiate Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // Or portrait
        
        $dompdf->render();
        $no_sj = !empty($data['outsj']) ? $data['outsj'][0]['no_sj'] : $id;
        $dompdf->stream("sj_blackstone_{$no_sj}.pdf", array("Attachment" => 0)); // 0 = view in browser
    }

    public function export_sj_checkout_rossi_pdf($id,$id_sj)
    {
        $data['title'] = 'SURAT PENGELUARAN BARANG WAREHOUSE';
        $data['spk'] = $this->General_model->get_data('form_spk_checkout', ['id_spk' => $id])->result_array();
        $data['outsj'] = $this->General_model->get_data('form_sj_checkout', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ])->result_array();
        $data['spkitem'] = $this->General_model->get('form_sjitem_checkout_rossi', [
            'id_spk' => $id,
            'id_sj'  => $id_sj
        ]);

        // Load the HTML view
        $html = $this->load->view('warehouse/pdf_sj_checkout_rossi', $data, TRUE);

        // Set options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        // Instantiate Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape'); // Or portrait
        
        $dompdf->render();
        $no_sj = !empty($data['outsj']) ? $data['outsj'][0]['no_sj'] : $id;
        $dompdf->stream("sj_rossi_{$no_sj}.pdf", array("Attachment" => 0)); // 0 = view in browser
    }

    
    

    public function transaksi()
    {
        $data['title'] = 'TABEL TRANSAKSI';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        
        $data['transaksi'] = $this->db->get('form_transaksi')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('warehouse/transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function delete_checkin_blackstone($id)
    {
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing ID");
            return;
        }

        $deleted = $this->General_model->delete('form_checkin_blackstone', 'id_checkin', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Check IN BLACKSTONE Berhasil Dihapus.</div>');
                redirect('warehouse/check_in_blackstone');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID not found.</div>');
            redirect('warehouse/check_in_blackstone');
        }
    }


    public function delete_checkin_rossi($id)
    {
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing ID");
            return;
        }

        $deleted = $this->General_model->delete('form_checkin_rossi', 'id_checkin', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Check IN ROSSI Berhasil Dihapus deleted successfully.</div>');
                redirect('warehouse/check_in_rossi');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID not found.</div>');
            redirect('warehouse/check_in_rossi');
        }
    }

    public function delete_checkin_ariat($id)
    {
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing ID");
            return;
        }

        $deleted = $this->General_model->delete('form_checkin_ariat', 'id_checkin', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Check IN ARIAT Berhasil Dihapus.</div>');
                redirect('warehouse/check_in_ariat');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID not found.</div>');
            redirect('warehouse/check_in_ariat');
        }
    }
    


    public function update_checkout_rossi($id)
    {
        $data['title'] = 'Form Update Checkout';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $id_transaksi = $this->uri->segment(3);
        $where = ['id_transaksi' => $id_transaksi];

        $data['transaksi'] = $this->General_model->get_one('form_checkin_rossi', $where);
        $data['transaksi2'] = $this->General_model->get('form_checkout_rossi');

        $this->form_validation->set_rules('id_transaksi', 'ID Transaksi', 'required');
        $this->form_validation->set_rules('no_sj', 'No Surat Jalan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('warehouse/checkout_rossi', $data);
            $this->load->view('templates/footer');
        } else {
            // Build insert data
            $insert_data = [
                'id_transaksi'    => $id_transaksi,
                'brand'           => $this->input->post('brand', TRUE),
                'keterangan'      => $this->input->post('keterangan', TRUE),
                'no_sj'           => $this->input->post('no_sj', TRUE),
                'tanggal_masuk'   => $this->input->post('tanggal_masuk', TRUE),
                'tanggal_keluar'  => $this->input->post('tanggal_keluar', TRUE),
                'dept_tujuan'     => $this->input->post('dept_tujuan', TRUE),
                'supplier'        => strtoupper($this->input->post('supplier', TRUE)),
                'po_number'       => strtoupper($this->input->post('po_number', TRUE)),
                'art'             => $this->input->post('art', TRUE),
                'jenis_material'  => $this->input->post('jenis_material', TRUE),
                'kode_material'   => $this->input->post('kode_material', TRUE),
                'nama_material'   => $this->input->post('nama_material', TRUE),
                'unit'            => $this->input->post('unit', TRUE),
                'ket'             => $this->input->post('ket', TRUE),
                'qty'             => (int) $this->input->post('qty', TRUE),
            ];

            // Add size fields
            for ($i = 3; $i <= 15; $i++) {
                $field = 's' . $i;
                $insert_data[$field] = (int) $this->input->post($field, TRUE);
                if (in_array($i, range(3, 11))) {
                    $insert_data[$field . 't'] = (int) $this->input->post($field . 't', TRUE);
                }
            }

            // Insert to both tables
            $this->General_model->insert('form_checkout_rossi', $insert_data);
            $this->General_model->insert('form_transaksi', $insert_data);

            // Prepare updated values
            $summary = $this->General_model->get_ones('form_checkin_rossi', ['id_transaksi' => $id_transaksi]);

            $update_data = [
                'qty' => $summary->qty - $insert_data['qty'],
            ];

            for ($i = 3; $i <= 15; $i++) {
                $field = 's' . $i;
                $update_data[$field] = $summary->$field - $insert_data[$field];
                if (in_array($i, range(3, 11))) {
                    $update_data[$field . 't'] = $summary->{$field . 't'} - $insert_data[$field . 't'];
                }
            }

            $this->General_model->update('form_checkin_rossi', $update_data, 'id_transaksi', $id_transaksi);

            // Notify and redirect
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ROSSI berhasil di Check OUT!</div>');
            redirect('warehouse/checkout_rossi');
        }
    }

    public function update_checkout_ariat($id)
    {
        $data['title'] = 'Form Update Checkout';
        $data['users'] = $this->db->get_where('users', [
            'email' => $this->session->userdata('email')
        ])->row_array();

        $id_transaksi = $this->uri->segment(3);
        $where = ['id_transaksi' => $id_transaksi];

        $data['transaksi'] = $this->General_model->get_one('form_checkin_ariat', $where);
        $data['transaksi2'] = $this->General_model->get('form_checkout_ariat');

        $this->form_validation->set_rules('id_transaksi', 'ID Transaksi', 'required');
        $this->form_validation->set_rules('no_sj', 'No Surat Jalan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('warehouse/checkout_ariat', $data);
            $this->load->view('templates/footer');
        } else {
            // 1. Capture inputs
            $insert_data = [
                'id_transaksi'      => $id_transaksi,
                'brand'             => $this->input->post('brand', TRUE),
                'keterangan'        => $this->input->post('keterangan', TRUE),
                'no_sj'             => $this->input->post('no_sj', TRUE),
                'tanggal_masuk'     => $this->input->post('tanggal_masuk', TRUE),
                'tanggal_keluar'    => $this->input->post('tanggal_keluar', TRUE),
                'dept_tujuan'       => $this->input->post('dept_tujuan', TRUE),
                'supplier'          => strtoupper($this->input->post('supplier', TRUE)),
                'po_number'         => strtoupper($this->input->post('po_number', TRUE)),
                'art'               => $this->input->post('art', TRUE),
                'jenis_material'    => $this->input->post('jenis_material', TRUE),
                'kode_material'     => $this->input->post('kode_material', TRUE),
                'nama_material'     => $this->input->post('nama_material', TRUE),
                'unit'              => $this->input->post('unit', TRUE),
                'ket'               => $this->input->post('ket', TRUE),
                'qty'               => (int) $this->input->post('qty', TRUE),
            ];

            // Add size fields
            for ($i = 6; $i <= 15; $i++) {
                $field = 's' . $i . 'd';
                $insert_data[$field] = (int) $this->input->post($field, TRUE);
                if ($i <= 11) {
                    $field_td = $field . 't';
                    $insert_data[$field_td] = (int) $this->input->post($field_td, TRUE);
                }
            }

            // 2. Insert into checkout & transaction tables
            $this->General_model->insert('form_checkout_ariat', $insert_data);
            $this->General_model->insert('form_transaksi', $insert_data);

            // 3. Calculate and prepare updated values
            $summary = $this->General_model->get_ones('form_checkin_ariat', ['id_transaksi' => $id_transaksi]);

            $update_data = [
                'qty' => $summary->qty - $insert_data['qty']
            ];

            for ($i = 6; $i <= 15; $i++) {
                $field = 's' . $i . 'd';
                $update_data[$field] = $summary->$field - $insert_data[$field];
                if ($i <= 11) {
                    $field_td = $field . 't';
                    $update_data[$field_td] = $summary->$field_td - $insert_data[$field_td];
                }
            }

            // 4. Update form_checkin_ariat with new totals
            $this->General_model->update('form_checkin_ariat', $update_data, 'id_transaksi', $id_transaksi);

            // 5. Notify and redirect
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ARIAT berhasil di Check OUT!</div>');
            redirect('warehouse/checkout_ariat');
        }
    }



}