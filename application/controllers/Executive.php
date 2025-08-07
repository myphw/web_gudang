<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;
class Executive extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('General_model');
    }

    public function index()
    {
        $data['title'] = 'P.O. SPK';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['artcolor'] = $this->db->get('form_ac')->result_array();
        $data['brand'] = $this->db->get('form_brand')->result_array();
        $data['spk'] = $this->db->get('form_spk')->result_array();
        $data['size'] = $this->General_model->get('form_spk_detail');
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('executive/spk', $data);
        $this->load->view('templates/footer');
    }

    public function view_spk_size_brand($id_spk)
    {
        $spk = $this->General_model->get_data('form_spk', ['id_spk' => $id_spk])->row_array();

    if (!$spk) {
        redirect('executive'); // fallback if not found
    }

    $brand_name = $spk['brand_name'];

    // Redirect to specific brand handler
    if ($brand_name === 'BLACK STONE') {
        redirect('executive/view_size_blackstone/' . $id_spk);
    } elseif ($brand_name === 'ROSSI') {
        redirect('executive/view_size_rossi/' . $id_spk);
    } elseif ($brand_name === 'ARIAT') {
        redirect('executive/view_size_ariat/' . $id_spk);
    } else {
        redirect('executive');
    }
    }

    public function view_size_blackstone($id_spk)
    {
        $data['title'] = 'Black Stone Size View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk', ['id_spk' => $id_spk])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id_spk])->result_array();
        $data['spkitem'] = $this->General_model->get_data('form_spk_item', ['id_spk' => $id_spk])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('executive/view_size_blackstone', $data);
        $this->load->view('templates/footer');
    }

    public function view_size_rossi($id_spk)
    {
        $data['title'] = 'Rossi Size View';
        $data['users'] = $this->db->get_where('users', ['email' => 
            $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk', ['id_spk' => $id_spk])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id_spk])->result_array();
        $data['spkitem'] = $this->General_model->get_data('form_spk_item', ['id_spk' => $id_spk])->result_array();

        // Define all size fields
        $sizes = [
            '3', '3t', '4', '4t', '5', '5t',
            '6', '6t', '7', '7t', '8', '8t',
            '9', '9t', '10', '10t', '11', '11t',
            '12', '12t', '13', '13t', '14', '15'
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('executive/view_size_rossi', $data);
        $this->load->view('templates/footer');
    }

    public function view_size_ariat($id_spk)
    {
        $data['title'] = 'Ariat SPK View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk', ['id_spk' => $id_spk])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id_spk])->result_array();
        $data['spkitem'] = $this->General_model->get_data('form_spk_item', ['id_spk' => $id_spk])->result_array();

    // Add validation rules
        $sizes = ['6d','6_5d','7d','7_5d','8d','8_5d','9d','9_5d','10d','10_5d','11d','11_5d','12d','13d','14d','15d','16d'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('executive/view_size_ariat', $data);
        $this->load->view('templates/footer');
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

    public function stock()
    {
        $data['title'] = 'WAREHOUSE';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['artcolor'] = $this->db->get('form_ac')->result_array();
        $data['brand'] = $this->db->get('form_brand')->result_array();
        $data['spk'] = $this->db->get('form_spk_checkin')->result_array();
        $data['size'] = $this->General_model->get('form_spk_detail');
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('executive/stock', $data);
        $this->load->view('templates/footer');
        
    }

    public function stock_spk_brand($id_spk)
    {
        $spk = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id_spk])->row_array();

    if (!$spk) {
        redirect('executive/stock'); // fallback if not found
    }

    $brand_name = $spk['brand_name'];

    // Redirect to specific brand handler
    if ($brand_name === 'BLACK STONE') {
        redirect('executive/stock_blackstone/' . $id_spk);
    } elseif ($brand_name === 'ROSSI') {
        redirect('executive/stock_rossi/' . $id_spk);
    } elseif ($brand_name === 'ARIAT') {
        redirect('executive/stock_ariat/' . $id_spk);
    } else {
        redirect('executive/stock');
    }
    }

    public function stock_blackstone($id)
    {
        $data['title'] = 'Black Stone Stock View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id])->result_array();
        $data['in'] = $this->General_model->get_data('form_checkin_blackstone', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('form_checkin_item', ['id_spk' => $id]);
        $active_artcolor = $data['spk'];
        $data['item'] = $this->General_model->get('form_consrate', ['artcolor_name' => $active_artcolor]);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('executive/stock_blackstone', $data);
        $this->load->view('templates/footer');

    }

    public function stock_rossi($id)
    {
        $data['title'] = 'Rossi Stock View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id])->result_array();
        $data['in'] = $this->General_model->get_data('form_checkin_rossi', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('form_checkin_item', ['id_spk' => $id]);
        $active_artcolor = $data['spk'];
        $data['item'] = $this->General_model->get('form_consrate', ['artcolor_name' => $active_artcolor]);
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('executive/stock_rossi', $data); // ✅ Correct view
        $this->load->view('templates/footer');
    }

    public function stock_ariat($id)
    {
        $data['title'] = 'Ariat Stock View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('form_spk_checkin', ['id_spk' => $id])->result_array();
        $data['in'] = $this->General_model->get_data('form_checkin_ariat', ['id_spk' => $id])->result_array();
        $data['spkall'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('form_checkin_item', ['id_spk' => $id]);
        $active_artcolor = $data['spk'];
        $data['item'] = $this->General_model->get('form_consrate', ['artcolor_name' => $active_artcolor]);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('executive/stock_ariat', $data); // ← corrected view
        $this->load->view('templates/footer');
    }

    public function production()
    {
        $data['title'] = 'PRODUCTION REPORT';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['artcolor'] = $this->db->get('form_ac')->result_array();
        $data['brand'] = $this->db->get('form_brand')->result_array();
        $data['spk'] = $this->db->get('production_spk_report')->result_array();
        $data['size'] = $this->General_model->get('form_spk_detail');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('executive/production', $data);
        $this->load->view('templates/footer');
    }

    public function pr_detail_item($id_spk)
    {
        $spk = $this->General_model->get_data('production_spk_report', ['id_spk' => $id_spk])->row_array();

        if (!$spk) {
            redirect('executive/production');
        }

        $brand_name = $spk['brand_name'];

        // Redirect to the correct handler
        if ($brand_name === 'BLACK STONE') {
            redirect('executive/production_report_blackstone/' . $id_spk);
        } elseif ($brand_name === 'ROSSI') {
            redirect('executive/production_report_rossi/' . $id_spk);
        } elseif ($brand_name === 'ARIAT') {
            redirect('executive/production_report_ariat/' . $id_spk);
        } else {
            redirect('executive/production');
        }
    }

    public function production_report_blackstone($id)
    {
        $data['title'] = 'Black Stone Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('production_progress_report_blackstone', ['id_spk' => $id]);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('executive/dept_report_blackstone', $data);
        $this->load->view('templates/footer');

    }

    public function production_report_rossi($id)
    {
        $data['title'] = 'Rossi Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('production_progress_report_rossi', ['id_spk' => $id]);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('executive/dept_report_rossi', $data);
        $this->load->view('templates/footer');

    }

    public function production_report_ariat($id)
    {
        $data['title'] = 'Ariat Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('production_progress_report_ariat', ['id_spk' => $id]);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('executive/dept_report_rossi', $data);
        $this->load->view('templates/footer');

    }

}