<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Production extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('General_model');
    }

    public function dept()
    {
        $data['title'] = 'Form Department';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['dept'] = $this->db->get('production_departement')->result_array();

        $this->form_validation->set_rules('dept_name1', 'From Departement', 'required');
        $this->form_validation->set_rules('dept_name2', 'To Departement', 'required');
        
        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('production/departement', $data);
            $this->load->view('templates/footer');
        } else {
            $dept_name1      = strtoupper($this->input->post('dept_name1',TRUE)); 
            $dept_name2      = strtoupper($this->input->post('dept_name2',TRUE));   

            $data = array(
                    'dept_name1' => $dept_name1,
                    'dept_name2' => $dept_name2,
                    'created_at' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('production_departement', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">New Departement is Added</div>');
                redirect('production/dept');
        }
    }    

    public function delete_dept($id)
    {
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }

        $deleted = $this->General_model->delete('production_departement', 'id_dept', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Departement deleted successfully.</div>');
                redirect('production/dept');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Departement not found.</div>');
            redirect('production/dept');
        }
    }

    public function progress()
    {
        $data['title'] = 'PRODUCTION PROGRESS';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['datanosj'] = $this->General_model->buat_dataterima_auto();
        $data['spk'] = $this->General_model->get('form_spk');
        $data['dept'] = $this->General_model->get('production_departement');
        $data['report'] = $this->General_model->get('production_progress_report');
        

        if (!$data['spk']) {
            show_error('SPK data not found for ID: ' . $id_spk);
        }

        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('no_pr', 'Nomor Surat Production', 'required');
        $this->form_validation->set_rules('dept_name1', 'From Departement', 'required');
        $this->form_validation->set_rules('dept_name2', 'To Departement', 'required');

        if($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('production/progress_report', $data);
            $this->load->view('templates/footer');
        } else {
            // 1. Capture inputs
            $insert_data = [
                'po_number'      => strtoupper($this->input->post('po_number', TRUE)),
                'brand_name'     => $this->input->post('brand_name', TRUE),
                'total_qty'      => $this->input->post('total_qty', TRUE),
                'no_pr'          => strtoupper($this->input->post('no_pr', TRUE)),
                'dept_name1'     => strtoupper($this->input->post('dept_name1', TRUE)),
                'dept_name2'     => strtoupper($this->input->post('dept_name2', TRUE)),
                'created_at'     => date('Y-m-d H:i:s'),
                'id_dept'        => $this->input->post('id_dept', TRUE),
                'id_spk'         => $this->input->post('id_spk', TRUE),
            ];


            // 2. Insert detail row (qty is per-item)
            $this->General_model->insert('production_progress_report', $insert_data);

            // 3. Update total in form_spk
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Jalan baru berhasil ditambahkan ke SPK!</div>');
            redirect('production/progress');
        }

    }

    public function delete_sj($id)
    {
        $this->load->model('General_model');

        if (!$id) {
            show_error("Missing brand ID");
            return;
        }

        $deleted = $this->General_model->delete('production_progress_report', 'id_pr', $id);

        if ($deleted > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Departement deleted successfully.</div>');
                redirect('production/progress');

        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Departement not found.</div>');
            redirect('production/progress');
        }
    }

    public function sj_detail_item($id_spk)
    {
        $spk = $this->General_model->get_data('production_progress_report', ['id_pr' => $id_spk])->row_array();

        if (!$spk) {
            redirect('production/progress');
        }

        $brand_name = $spk['brand_name'];

        // Redirect to the correct handler
        if ($brand_name === 'BLACK STONE') {
            redirect('production/td_item_blackstone/' . $id_spk);
        } elseif ($brand_name === 'ROSSI') {
            redirect('production/td_item_rossi/' . $id_spk);
        } elseif ($brand_name === 'ARIAT') {
            redirect('production/td_item_ariat/' . $id_spk);
        } else {
            redirect('production/progress');
        }
    }

    public function update_production_keterangan_blackstone($id_pr)
    {
        $keterangan = $this->input->post('keterangan');

        $data = [
            'keterangan' => $keterangan
        ];

        $this->db->where('id_pr', $id_pr);
        $this->db->update('production_progress_report', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Keterangan updated successfully!</div>');
        redirect('production/td_item_blackstone/' . $id_pr);
    }

    public function update_production_keterangan_ariat($id_pr)
    {
        $keterangan = $this->input->post('keterangan');

        $data = [
            'keterangan' => $keterangan
        ];

        $this->db->where('id_pr', $id_pr);
        $this->db->update('production_progress_report', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Keterangan updated successfully!</div>');
        redirect('production/td_item_ariat/' . $id_pr);
    }

    public function update_production_keterangan_rossi($id_pr)
    {
        $keterangan = $this->input->post('keterangan');

        $data = [
            'keterangan' => $keterangan
        ];

        $this->db->where('id_pr', $id_pr);
        $this->db->update('production_progress_report', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Keterangan updated successfully!</div>');
        redirect('production/td_item_rossi/' . $id_pr);
    }

    public function td_item_blackstone($id) // $id = id_pr
    {
        $data['title'] = 'Black Stone Tanda Terima View';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['spk']   = $this->General_model->get_data('production_progress_report', ['id_pr' => $id])->result_array();
        $data['in']    = $this->General_model->get_data('production_progress_blackstone', ['id_pr' => $id])->result_array();
        $data['id_pr'] = $id;

        // Validation rules
        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('total_qty', 'Total QTY', 'required');
        $this->form_validation->set_rules('no_pr', 'Nomor Surat Production', 'required');
        $this->form_validation->set_rules('dept_name1', 'From Departement', 'required');
        $this->form_validation->set_rules('dept_name2', 'To Departement', 'required');

        for ($i = 36; $i <= 50; $i++) {
            $this->form_validation->set_rules('size_' . $i, 'Size ' . $i, 'numeric|greater_than_equal_to[0]');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('production/td_item_blackstone', $data);
            $this->load->view('templates/footer');
        } else {
            $id_pr     = $this->input->post('id_pr');
            $id_dept   = $this->input->post('id_dept');

            // ✅ Get correct id_spk from the report
            $report = $this->General_model->get_data('production_progress_report', ['id_pr' => $id_pr])->row();
            if (!$report) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Invalid SPK reference. Data not saved.</div>');
                redirect('production/td_item_blackstone/' . $id);
            }
            $id_spk = $report->id_spk;

            $insertData = [
                'po_number'   => strtoupper($this->input->post('po_number', TRUE)),
                'brand_name'  => $this->input->post('brand_name', TRUE),
                'total_qty'   => $this->input->post('total_qty', TRUE),
                'no_pr'       => strtoupper($this->input->post('no_pr', TRUE)),
                'dept_name1'  => strtoupper($this->input->post('dept_name1', TRUE)),
                'dept_name2'  => strtoupper($this->input->post('dept_name2', TRUE)),
                'tgl_pr'  => date('Y-m-d H:i:s'),
                'id_dept'     => $id_dept,
                'id_spk'      => $id_spk, // ✅ correct one now
                'id_pr'       => $id_pr,
            ];

            $final_qty = 0;
            for ($i = 36; $i <= 50; $i++) {
                $sizeQty = (int) $this->input->post('size_' . $i);
                $insertData['size_' . $i] = $sizeQty;
                $final_qty += $sizeQty;
            }
            $insertData['qty'] = $final_qty;


            // ✅ Insert or Update report table
            $exists = $this->db->get_where('production_progress_report_blackstone', [
                'id_spk' => $id_spk,
                'id_dept' => $id_dept
            ])->row();

            if ($exists) {
                for ($i = 36; $i <= 50; $i++) {
                    $field = 'size_' . $i;
                    $sizeQty = (int) $this->input->post($field);
                    $this->db->set($field, "$field + $sizeQty", FALSE);
                }
                $this->db->set('qty', "qty + $final_qty", FALSE);
                $this->db->where(['id_spk' => $id_spk, 'id_dept' => $id_dept]);
                $this->db->update('production_progress_report_blackstone');
            } else {
                $this->General_model->insert('production_progress_report_blackstone', $insertData);
            }

            // ✅ Check if a row already exists for the same id_pr and id_spk
            $existing = $this->db->get_where('production_progress_blackstone', [
                'id_pr'  => $id_pr,
                'id_spk' => $id_spk
            ])->row();

            if ($existing) {
                // Replace (update) the existing row with new data
                $this->db->where(['id_pr' => $id_pr, 'id_spk' => $id_spk]);
                $this->db->update('production_progress_blackstone', $insertData);
            } else {
                // Insert new row if it doesn't exist
                $this->General_model->insert('production_progress_blackstone', $insertData);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved successfully.</div>');
            redirect('production/td_item_blackstone/' . $id_pr);
        }
    }

    public function export_progress_blackstone($id_spk)
    {
        $this->load->model('General_model'); // or your model name
        $data['title'] = 'Production Progress Blackstone';

        $data['spk'] = $this->General_model->get_data('production_progress_report', ['id_pr' => $id_spk])->row_array();
        $data['in'] = $this->General_model->get_data('production_progress_blackstone', ['id_pr' => $id_spk])->row_array();

        
        // Load view into HTML
        $html = $this->load->view('production/pdf_progress_blackstone', $data, TRUE);

        // Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output the PDF
        $dompdf->stream("progress_blackstone_$id_spk.pdf", ['Attachment' => false]); // true = force download
    }

    public function td_item_rossi($id) // $id = id_pr
    {
        $data['title'] = 'Rossi Tanda Terima View';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['spk']   = $this->General_model->get_data('production_progress_report', ['id_pr' => $id])->result_array();
        $data['in']    = $this->General_model->get_data('production_progress_rossi', ['id_pr' => $id])->result_array();
        $data['id_pr'] = $id;

        // Use Rossi size set
        $sizes = [
            '3', '3t', '4', '4t', '5', '5t', '6', '6t', '7', '7t',
            '8', '8t', '9', '9t', '10', '10t', '11', '11t', '12', '13', '14', '15'
        ];

        // Validation rules
        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('total_qty', 'Total QTY', 'required');
        $this->form_validation->set_rules('no_pr', 'Nomor Surat Production', 'required');
        $this->form_validation->set_rules('dept_name1', 'From Departement', 'required');
        $this->form_validation->set_rules('dept_name2', 'To Departement', 'required');

        foreach ($sizes as $size) {
            $this->form_validation->set_rules('size_' . $size, 'Size ' . $size, 'numeric|greater_than_equal_to[0]');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('production/td_item_rossi', $data);
            $this->load->view('templates/footer');
        } else {
            $id_pr   = $this->input->post('id_pr');
            $id_dept = $this->input->post('id_dept');

            // Get the correct id_spk from report
            $report = $this->db->get_where('production_progress_report', ['id_pr' => $id_pr])->row();
            if (!$report) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Data gagal disimpan karena ID PR tidak valid.</div>');
                redirect('production/td_item_rossi/' . $id);
            }
            $id_spk = $report->id_spk;

            // Base insert data
            $insertData = [
                'po_number'   => strtoupper($this->input->post('po_number', TRUE)),
                'brand_name'  => $this->input->post('brand_name', TRUE),
                'total_qty'   => $this->input->post('total_qty', TRUE),
                'no_pr'       => strtoupper($this->input->post('no_pr', TRUE)),
                'dept_name1'  => strtoupper($this->input->post('dept_name1', TRUE)),
                'dept_name2'  => strtoupper($this->input->post('dept_name2', TRUE)),
                'tgl_pr'  => date('Y-m-d H:i:s'),
                'id_dept'     => $id_dept,
                'id_spk'      => $id_spk,
                'id_pr'       => $id_pr,
            ];

            $final_qty = 0;
            foreach ($sizes as $size) {
                $qty = (int) $this->input->post('size_' . $size);
                $insertData['size_' . $size] = $qty;
                $final_qty += $qty;
            }
            $insertData['qty'] = $final_qty;

            // ✅ Check if a row already exists for the same id_pr and id_spk
            $existing = $this->db->get_where('production_progress_rossi', [
                'id_pr'  => $id_pr,
                'id_spk' => $id_spk
            ])->row();

            if ($existing) {
                // Replace (update) the existing row with new data
                $this->db->where(['id_pr' => $id_pr, 'id_spk' => $id_spk]);
                $this->db->update('production_progress_rossi', $insertData);
            } else {
                // Insert new row if it doesn't exist
                $this->General_model->insert('production_progress_rossi', $insertData);
            }

            // Insert or update report table
            $exists = $this->db->get_where('production_progress_report_rossi', [
                'id_spk' => $id_spk,
                'id_dept' => $id_dept
            ])->row();

            if ($exists) {
                foreach ($sizes as $size) {
                    $field = 'size_' . $size;
                    $qty = (int) $this->input->post($field);
                    $this->db->set($field, "$field + $qty", FALSE);
                }
                $this->db->set('qty', "qty + $final_qty", FALSE);
                $this->db->where(['id_spk' => $id_spk, 'id_dept' => $id_dept]);
                $this->db->update('production_progress_report_rossi');
            } else {
                $this->General_model->insert('production_progress_report_rossi', $insertData);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil disimpan.</div>');
            redirect('production/td_item_rossi/' . $id_pr);
        }
    }

    public function export_progress_rossi($id_spk)
    {
        $this->load->model('General_model'); // or your model name
        $data['title'] = 'Production Progress Rossi';

        $data['spk'] = $this->General_model->get_data('production_progress_report', ['id_pr' => $id_spk])->row_array();
        $data['in'] = $this->General_model->get_data('production_progress_rossi', ['id_pr' => $id_spk])->row_array();

        
        // Load view into HTML
        $html = $this->load->view('production/pdf_progress_rossi', $data, TRUE);

        // Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output the PDF
        $dompdf->stream("progress_rossi_$id_spk.pdf", ['Attachment' => false]); // true = force download
    }


    public function td_item_ariat($id) // $id = id_pr
    {
        $data['title'] = 'Rossi Tanda Terima View';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['spk']   = $this->General_model->get_data('production_progress_report', ['id_pr' => $id])->result_array();
        $data['in']    = $this->General_model->get_data('production_progress_ariat', ['id_pr' => $id])->result_array();
        $data['id_pr'] = $id;

        // Use Rossi size set
        $sizes = [
            '6d', '6_5d', '7d', '7_5d', '8d', '8_5d',
            '9d', '9_5d', '10d', '10_5d', '11d', '11_5d',
            '12d', '13d', '14d', '15d', '16d'
        ];

        // Validation rules
        $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        $this->form_validation->set_rules('total_qty', 'Total QTY', 'required');
        $this->form_validation->set_rules('no_pr', 'Nomor Surat Production', 'required');
        $this->form_validation->set_rules('dept_name1', 'From Departement', 'required');
        $this->form_validation->set_rules('dept_name2', 'To Departement', 'required');

        foreach ($sizes as $size) {
            $this->form_validation->set_rules('size_' . $size, 'Size ' . $size, 'numeric|greater_than_equal_to[0]');
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('production/td_item_ariat', $data);
            $this->load->view('templates/footer');
        } else {
            $id_pr   = $this->input->post('id_pr');
            $id_dept = $this->input->post('id_dept');

            // Get the correct id_spk from report
            $report = $this->db->get_where('production_progress_report', ['id_pr' => $id_pr])->row();
            if (!$report) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Data gagal disimpan karena ID PR tidak valid.</div>');
                redirect('production/td_item_ariat/' . $id);
            }
            $id_spk = $report->id_spk;

            // Base insert data
            $insertData = [
                'po_number'   => strtoupper($this->input->post('po_number', TRUE)),
                'brand_name'  => $this->input->post('brand_name', TRUE),
                'total_qty'   => $this->input->post('total_qty', TRUE),
                'no_pr'       => strtoupper($this->input->post('no_pr', TRUE)),
                'dept_name1'  => strtoupper($this->input->post('dept_name1', TRUE)),
                'dept_name2'  => strtoupper($this->input->post('dept_name2', TRUE)),
                'tgl_pr'  => date('Y-m-d H:i:s'),
                'id_dept'     => $id_dept,
                'id_spk'      => $id_spk,
                'id_pr'       => $id_pr,
            ];

            $final_qty = 0;
            foreach ($sizes as $size) {
                $qty = (int) $this->input->post('size_' . $size);
                $insertData['size_' . $size] = $qty;
                $final_qty += $qty;
            }
            $insertData['qty'] = $final_qty;

            // ✅ Check if a row already exists for the same id_pr and id_spk
            $existing = $this->db->get_where('production_progress_ariat', [
                'id_pr'  => $id_pr,
                'id_spk' => $id_spk
            ])->row();

            if ($existing) {
                // Replace (update) the existing row with new data
                $this->db->where(['id_pr' => $id_pr, 'id_spk' => $id_spk]);
                $this->db->update('production_progress_ariat', $insertData);
            } else {
                // Insert new row if it doesn't exist
                $this->General_model->insert('production_progress_ariat', $insertData);
            }

            // Insert or update report table
            $exists = $this->db->get_where('production_progress_report_ariat', [
                'id_spk' => $id_spk,
                'id_dept' => $id_dept
            ])->row();

            if ($exists) {
                foreach ($sizes as $size) {
                    $field = 'size_' . $size;
                    $qty = (int) $this->input->post($field);
                    $this->db->set($field, "$field + $qty", FALSE);
                }
                $this->db->set('qty', "qty + $final_qty", FALSE);
                $this->db->where(['id_spk' => $id_spk, 'id_dept' => $id_dept]);
                $this->db->update('production_progress_report_ariat');
            } else {
                $this->General_model->insert('production_progress_report_ariat', $insertData);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data berhasil disimpan.</div>');
            redirect('production/td_item_ariat/' . $id_pr);
        }
    }

    public function export_progress_ariat($id_spk)
    {
        $this->load->model('General_model'); // or your model name
        $data['title'] = 'Production Progress Ariat';

        $data['spk'] = $this->General_model->get_data('production_progress_report', ['id_pr' => $id_spk])->row_array();
        $data['in'] = $this->General_model->get_data('production_progress_ariat', ['id_pr' => $id_spk])->row_array();

        
        // Load view into HTML
        $html = $this->load->view('production/pdf_progress_ariat', $data, TRUE);

        // Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output the PDF
        $dompdf->stream("progress_ariat_$id_spk.pdf", ['Attachment' => false]); // true = force download
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

    public function production_report()
    {
        $data['title'] = 'PRODUCTION REPORT';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['artcolor'] = $this->db->get('form_ac')->result_array();
        $data['brand'] = $this->db->get('form_brand')->result_array();
        $data['spk'] = $this->db->get('production_spk_report')->result_array();
        $data['size'] = $this->General_model->get('form_spk_detail');

        // $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        // $this->form_validation->set_rules('xfd', 'xfd', 'required');
        // $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        // $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('production/production_report', $data);
        $this->load->view('templates/footer');
    }

    public function pr_detail_item($id_spk)
    {
        $spk = $this->General_model->get_data('production_spk_report', ['id_spk' => $id_spk])->row_array();

        if (!$spk) {
            redirect('production/production_report');
        }

        $brand_name = $spk['brand_name'];

        // Redirect to the correct handler
        if ($brand_name === 'BLACK STONE') {
            redirect('production/production_report_blackstone/' . $id_spk);
        } elseif ($brand_name === 'ROSSI') {
            redirect('production/production_report_rossi/' . $id_spk);
        } elseif ($brand_name === 'ARIAT') {
            redirect('production/production_report_ariat/' . $id_spk);
        } else {
            redirect('production/production_report');
        }
    }

    public function production_report_blackstone($id)
    {
        $data['title'] = 'Black Stone Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('production_progress_report_blackstone', ['id_spk' => $id]);

        // $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        // $this->form_validation->set_rules('xfd', 'xfd', 'required');
        // $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        // $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('production/td_report_blackstone', $data);
        $this->load->view('templates/footer');

    }

    public function production_report_rossi($id)
    {
        $data['title'] = 'Rossi Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('production_progress_report_rossi', ['id_spk' => $id]);

        // $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        // $this->form_validation->set_rules('xfd', 'xfd', 'required');
        // $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        // $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('production/td_report_rossi', $data);
        $this->load->view('templates/footer');

    }

    public function production_report_ariat($id)
    {
        $data['title'] = 'Ariat Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id])->result_array();
        $data['spkitem'] = $this->General_model->get('production_progress_report_ariat', ['id_spk' => $id]);

        // $this->form_validation->set_rules('po_number', 'Po Number', 'required');
        // $this->form_validation->set_rules('xfd', 'xfd', 'required');
        // $this->form_validation->set_rules('brand_name', 'Brand Name', 'required');
        // $this->form_validation->set_rules('artcolor_name', 'ArtColor Name', 'required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('production/td_report_ariat', $data);
        $this->load->view('templates/footer');

    }

    public function dept_detail_item($id_spk, $id_dept)
{
    $spk = $this->General_model->get_data('production_progress_report', [
        'id_spk' => $id_spk,
        'id_dept' => $id_dept
    ])->row_array();

    if (!$spk) {
        redirect('production/pr_detail_item/' . $id_spk);
    }

    $dept_name1 = $spk['dept_name1'];

    if ($dept_name1 === 'CUTTING') {
        redirect('production/production_detail_cutting/' . $id_spk . '/' . $id_dept);
    } elseif ($dept_name1 === 'SEWING') {
        redirect('production/production_detail_sewing/' . $id_spk . '/' . $id_dept);
    } elseif ($dept_name1 === 'SEMI WAREHOUSE') {
        redirect('production/production_detail_semi/' . $id_spk . '/' . $id_dept);
    } elseif ($dept_name1 === 'LASTING') {
        redirect('production/production_detail_lasting/' . $id_spk . '/' . $id_dept);
    } elseif ($dept_name1 === 'FINISHING') {
        redirect('production/production_detail_finishing/' . $id_spk . '/' . $id_dept);
    } elseif ($dept_name1 === 'PACKAGING') {
        redirect('production/production_detail_packaging/' . $id_spk . '/' . $id_dept);
    } else {
        redirect('production/pr_detail_item/' . $id_spk);
    }
}
    public function export_cutting_pdf($id_spk)
    { // Assuming Dompdf is aliased as 'pdf' in autoload or config

        // Fetch user and SPK data
        $data['title'] = 'Cutting Report';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['sp'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id_spk])->row_array();
        $data['dept'] = $this->General_model->get_data('production_departement', ['dept_name1' => 'Cutting'])->row_array();

        // Detect brand
        $brand = $data['sp']['brand_name'];

        // Load data based on brand
        if ($brand == 'BLACK STONE') {
            $data['size'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitem'] = $this->General_model->get_data('production_progress_report_blackstone', ['id_spk' => $id_spk])->result_array();
            $data['item'] = $this->General_model->get_data('production_progress_blackstone', ['id_spk' => $id_spk])->result_array();
        } elseif ($brand == 'ROSSI') {
            $data['sizeRossi'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitemRossi'] = $this->General_model->get_data('production_progress_report_rossi', ['id_spk' => $id_spk])->result_array();
            $data['itemRossi'] = $this->General_model->get_data('production_progress_rossi', ['id_spk' => $id_spk])->result_array();
        } elseif ($brand == 'ARIAT') {
            $data['sizeAriat'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitemAriat'] = $this->General_model->get_data('production_progress_report_ariat', ['id_spk' => $id_spk])->result_array();
            $data['itemAriat'] = $this->General_model->get_data('production_progress_ariat', ['id_spk' => $id_spk])->result_array();
        } else {
            show_error("Unknown brand: " . $brand);
            return;
        }

        // Load view into HTML
        $html = $this->load->view('production/pdf_production_cutting', $data, true);

        // Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output the PDF
        $dompdf->stream('Cutting_Report_' . $id_spk . '.pdf', ['Attachment' => false]);
        // Load Dompdf
    }

    public function export_sewing_pdf($id_spk)
    { // Assuming Dompdf is aliased as 'pdf' in autoload or config

        // Fetch user and SPK data
        $data['title'] = 'Sewwing Report';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['sp'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id_spk])->row_array();
        $data['dept'] = $this->General_model->get_data('production_departement', ['dept_name1' => 'Cutting'])->row_array();

        // Detect brand
        $brand = $data['sp']['brand_name'];

        // Load data based on brand
        if ($brand == 'BLACK STONE') {
            $data['size'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitem'] = $this->General_model->get_data('production_progress_report_blackstone', ['id_spk' => $id_spk])->result_array();
            $data['item'] = $this->General_model->get_data('production_progress_blackstone', ['id_spk' => $id_spk])->result_array();
        } elseif ($brand == 'ROSSI') {
            $data['sizeRossi'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitemRossi'] = $this->General_model->get_data('production_progress_report_rossi', ['id_spk' => $id_spk])->result_array();
            $data['itemRossi'] = $this->General_model->get_data('production_progress_rossi', ['id_spk' => $id_spk])->result_array();
        } elseif ($brand == 'ARIAT') {
            $data['sizeAriat'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitemAriat'] = $this->General_model->get_data('production_progress_report_ariat', ['id_spk' => $id_spk])->result_array();
            $data['itemAriat'] = $this->General_model->get_data('production_progress_ariat', ['id_spk' => $id_spk])->result_array();
        } else {
            show_error("Unknown brand: " . $brand);
            return;
        }

        // Load view into HTML
        $html = $this->load->view('production/pdf_production_sewing', $data, true);

        // Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output the PDF
        $dompdf->stream('Sewing_Report_' . $id_spk . '.pdf', ['Attachment' => false]);
        // Load Dompdf
    }

    public function export_semi_pdf($id_spk)
    { // Assuming Dompdf is aliased as 'pdf' in autoload or config

        // Fetch user and SPK data
        $data['title'] = 'Semi Warehouse Report';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['sp'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id_spk])->row_array();
        $data['dept'] = $this->General_model->get_data('production_departement', ['dept_name1' => 'Cutting'])->row_array();

        // Detect brand
        $brand = $data['sp']['brand_name'];

        // Load data based on brand
        if ($brand == 'BLACK STONE') {
            $data['size'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitem'] = $this->General_model->get_data('production_progress_report_blackstone', ['id_spk' => $id_spk])->result_array();
            $data['item'] = $this->General_model->get_data('production_progress_blackstone', ['id_spk' => $id_spk])->result_array();
        } elseif ($brand == 'ROSSI') {
            $data['sizeRossi'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitemRossi'] = $this->General_model->get_data('production_progress_report_rossi', ['id_spk' => $id_spk])->result_array();
            $data['itemRossi'] = $this->General_model->get_data('production_progress_rossi', ['id_spk' => $id_spk])->result_array();
        } elseif ($brand == 'ARIAT') {
            $data['sizeAriat'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitemAriat'] = $this->General_model->get_data('production_progress_report_ariat', ['id_spk' => $id_spk])->result_array();
            $data['itemAriat'] = $this->General_model->get_data('production_progress_ariat', ['id_spk' => $id_spk])->result_array();
        } else {
            show_error("Unknown brand: " . $brand);
            return;
        }

        // Load view into HTML
        $html = $this->load->view('production/pdf_production_semi', $data, true);

        // Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output the PDF
        $dompdf->stream('Semi_Report_' . $id_spk . '.pdf', ['Attachment' => false]);
        // Load Dompdf
    }

    public function export_lasting_pdf($id_spk)
    { // Assuming Dompdf is aliased as 'pdf' in autoload or config

        // Fetch user and SPK data
        $data['title'] = 'Lasting Report';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['sp'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id_spk])->row_array();
        $data['dept'] = $this->General_model->get_data('production_departement', ['dept_name1' => 'Cutting'])->row_array();

        // Detect brand
        $brand = $data['sp']['brand_name'];

        // Load data based on brand
        if ($brand == 'BLACK STONE') {
            $data['size'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitem'] = $this->General_model->get_data('production_progress_report_blackstone', ['id_spk' => $id_spk])->result_array();
            $data['item'] = $this->General_model->get_data('production_progress_blackstone', ['id_spk' => $id_spk])->result_array();
        } elseif ($brand == 'ROSSI') {
            $data['sizeRossi'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitemRossi'] = $this->General_model->get_data('production_progress_report_rossi', ['id_spk' => $id_spk])->result_array();
            $data['itemRossi'] = $this->General_model->get_data('production_progress_rossi', ['id_spk' => $id_spk])->result_array();
        } elseif ($brand == 'ARIAT') {
            $data['sizeAriat'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitemAriat'] = $this->General_model->get_data('production_progress_report_ariat', ['id_spk' => $id_spk])->result_array();
            $data['itemAriat'] = $this->General_model->get_data('production_progress_ariat', ['id_spk' => $id_spk])->result_array();
        } else {
            show_error("Unknown brand: " . $brand);
            return;
        }

        // Load view into HTML
        $html = $this->load->view('production/pdf_production_lasting', $data, true);

        // Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output the PDF
        $dompdf->stream('Lasting_Report_' . $id_spk . '.pdf', ['Attachment' => false]);
        // Load Dompdf
    }

    public function export_finishing_pdf($id_spk)
    { // Assuming Dompdf is aliased as 'pdf' in autoload or config

        // Fetch user and SPK data
        $data['title'] = 'Finishing Report';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['sp'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id_spk])->row_array();
        $data['dept'] = $this->General_model->get_data('production_departement', ['dept_name1' => 'Cutting'])->row_array();

        // Detect brand
        $brand = $data['sp']['brand_name'];

        // Load data based on brand
        if ($brand == 'BLACK STONE') {
            $data['size'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitem'] = $this->General_model->get_data('production_progress_report_blackstone', ['id_spk' => $id_spk])->result_array();
            $data['item'] = $this->General_model->get_data('production_progress_blackstone', ['id_spk' => $id_spk])->result_array();
        } elseif ($brand == 'ROSSI') {
            $data['sizeRossi'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitemRossi'] = $this->General_model->get_data('production_progress_report_rossi', ['id_spk' => $id_spk])->result_array();
            $data['itemRossi'] = $this->General_model->get_data('production_progress_rossi', ['id_spk' => $id_spk])->result_array();
        } elseif ($brand == 'ARIAT') {
            $data['sizeAriat'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitemAriat'] = $this->General_model->get_data('production_progress_report_ariat', ['id_spk' => $id_spk])->result_array();
            $data['itemAriat'] = $this->General_model->get_data('production_progress_ariat', ['id_spk' => $id_spk])->result_array();
        } else {
            show_error("Unknown brand: " . $brand);
            return;
        }

        // Load view into HTML
        $html = $this->load->view('production/pdf_production_finishing', $data, true);

        // Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output the PDF
        $dompdf->stream('Finishing_Report_' . $id_spk . '.pdf', ['Attachment' => false]);
        // Load Dompdf
    }

    public function export_packaging_pdf($id_spk)
    { // Assuming Dompdf is aliased as 'pdf' in autoload or config

        // Fetch user and SPK data
        $data['title'] = 'Packaging Report';
        $data['users'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['sp'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id_spk])->row_array();
        $data['dept'] = $this->General_model->get_data('production_departement', ['dept_name1' => 'Cutting'])->row_array();

        // Detect brand
        $brand = $data['sp']['brand_name'];

        // Load data based on brand
        if ($brand == 'BLACK STONE') {
            $data['size'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitem'] = $this->General_model->get_data('production_progress_report_blackstone', ['id_spk' => $id_spk])->result_array();
            $data['item'] = $this->General_model->get_data('production_progress_blackstone', ['id_spk' => $id_spk])->result_array();
        } elseif ($brand == 'ROSSI') {
            $data['sizeRossi'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitemRossi'] = $this->General_model->get_data('production_progress_report_rossi', ['id_spk' => $id_spk])->result_array();
            $data['itemRossi'] = $this->General_model->get_data('production_progress_rossi', ['id_spk' => $id_spk])->result_array();
        } elseif ($brand == 'ARIAT') {
            $data['sizeAriat'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id_spk])->result_array();
            $data['spkitemAriat'] = $this->General_model->get_data('production_progress_report_ariat', ['id_spk' => $id_spk])->result_array();
            $data['itemAriat'] = $this->General_model->get_data('production_progress_ariat', ['id_spk' => $id_spk])->result_array();
        } else {
            show_error("Unknown brand: " . $brand);
            return;
        }

        // Load view into HTML
        $html = $this->load->view('production/pdf_production_packaging', $data, true);

        // Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Output the PDF
        $dompdf->stream('Packaging_Report_' . $id_spk . '.pdf', ['Attachment' => false]);
        // Load Dompdf
    }



    public function production_detail_cutting($id, $id_dept)
    {
        $data['title'] = 'Cutting Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id])->row_array();
        $data['dept'] = $this->General_model->get_data('production_progress_report', ['id_spk' => $id])->row_array();
        $data['spkitem'] = $this->General_model->get('production_progress_report_blackstone', ['id_spk' => $id]);
        $data['item'] = $this->General_model->get('production_progress_blackstone', ['id_spk' => $id]);
        $data['size'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->result_array();
        $data['spkitemRossi'] = $this->General_model->get('production_progress_report_rossi', ['id_spk' => $id]);
        $data['itemRossi'] = $this->General_model->get('production_progress_rossi', ['id_spk' => $id]);
        $data['sizeRossi'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id])->result_array();
        $data['spkitemAriat'] = $this->General_model->get('production_progress_report_ariat', ['id_spk' => $id]);
        $data['itemAriat'] = $this->General_model->get('production_progress_ariat', ['id_spk' => $id]);
        $data['sizeAriat'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id])->result_array();
        $data['dept'] = ['id_dept' => $id_dept]; 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('production/td_detail_report_cutting', $data);
        $this->load->view('templates/footer');

    }

    public function production_detail_sewing($id, $id_dept)
    {
        $data['title'] = 'Sewing Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id])->row_array();
        $data['dept'] = $this->General_model->get_data('production_progress_report', ['id_spk' => $id])->row_array();
        $data['spkitem'] = $this->General_model->get('production_progress_report_blackstone', ['id_spk' => $id]);
        $data['item'] = $this->General_model->get('production_progress_blackstone', ['id_spk' => $id]);
        $data['size'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->result_array();
        $data['spkitemRossi'] = $this->General_model->get('production_progress_report_rossi', ['id_spk' => $id]);
        $data['itemRossi'] = $this->General_model->get('production_progress_rossi', ['id_spk' => $id]);
        $data['sizeRossi'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id])->result_array();
        $data['spkitemAriat'] = $this->General_model->get('production_progress_report_ariat', ['id_spk' => $id]);
        $data['itemAriat'] = $this->General_model->get('production_progress_ariat', ['id_spk' => $id]);
        $data['sizeAriat'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id])->result_array();
        $data['dept'] = ['id_dept' => $id_dept]; 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('production/td_detail_report_sewing', $data);
        $this->load->view('templates/footer');

    }

    public function production_detail_semi($id, $id_dept)
    {
        $data['title'] = 'Semi Warehouse Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id])->row_array();
        $data['dept'] = $this->General_model->get_data('production_progress_report', ['id_spk' => $id])->row_array();
        $data['spkitem'] = $this->General_model->get('production_progress_report_blackstone', ['id_spk' => $id]);
        $data['item'] = $this->General_model->get('production_progress_blackstone', ['id_spk' => $id]);
        $data['size'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->result_array();
        $data['spkitemRossi'] = $this->General_model->get('production_progress_report_rossi', ['id_spk' => $id]);
        $data['itemRossi'] = $this->General_model->get('production_progress_rossi', ['id_spk' => $id]);
        $data['sizeRossi'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id])->result_array();
        $data['spkitemAriat'] = $this->General_model->get('production_progress_report_ariat', ['id_spk' => $id]);
        $data['itemAriat'] = $this->General_model->get('production_progress_ariat', ['id_spk' => $id]);
        $data['sizeAriat'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id])->result_array();
        $data['dept'] = ['id_dept' => $id_dept]; 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('production/td_detail_report_semi', $data);
        $this->load->view('templates/footer');

    }

    public function production_detail_lasting($id, $id_dept)
    {
        $data['title'] = 'Lasting Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id])->row_array();
        $data['dept'] = $this->General_model->get_data('production_progress_report', ['id_spk' => $id])->row_array();
        $data['spkitem'] = $this->General_model->get('production_progress_report_blackstone', ['id_spk' => $id]);
        $data['item'] = $this->General_model->get('production_progress_blackstone', ['id_spk' => $id]);
        $data['size'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->result_array();
        $data['spkitemRossi'] = $this->General_model->get('production_progress_report_rossi', ['id_spk' => $id]);
        $data['itemRossi'] = $this->General_model->get('production_progress_rossi', ['id_spk' => $id]);
        $data['sizeRossi'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id])->result_array();
        $data['spkitemAriat'] = $this->General_model->get('production_progress_report_ariat', ['id_spk' => $id]);
        $data['itemAriat'] = $this->General_model->get('production_progress_ariat', ['id_spk' => $id]);
        $data['sizeAriat'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id])->result_array();
        $data['dept'] = ['id_dept' => $id_dept]; 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('production/td_detail_report_lasting', $data);
        $this->load->view('templates/footer');

    }

    public function production_detail_finishing($id, $id_dept)
    {
        $data['title'] = 'Finishing Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id])->row_array();
        $data['dept'] = $this->General_model->get_data('production_progress_report', ['id_spk' => $id])->row_array();
        $data['spkitem'] = $this->General_model->get('production_progress_report_blackstone', ['id_spk' => $id]);
        $data['item'] = $this->General_model->get('production_progress_blackstone', ['id_spk' => $id]);
        $data['size'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->result_array();
        $data['spkitemRossi'] = $this->General_model->get('production_progress_report_rossi', ['id_spk' => $id]);
        $data['itemRossi'] = $this->General_model->get('production_progress_rossi', ['id_spk' => $id]);
        $data['sizeRossi'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id])->result_array();
        $data['spkitemAriat'] = $this->General_model->get('production_progress_report_ariat', ['id_spk' => $id]);
        $data['itemAriat'] = $this->General_model->get('production_progress_ariat', ['id_spk' => $id]);
        $data['sizeAriat'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id])->result_array();
        $data['dept'] = ['id_dept' => $id_dept]; 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('production/td_detail_report_finishing', $data);
        $this->load->view('templates/footer');

    }

    public function production_detail_packaging($id, $id_dept)
    {
        $data['title'] = 'Packaging Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('production_spk_report', ['id_spk' => $id])->row_array();
        $data['dept'] = $this->General_model->get_data('production_progress_report', ['id_spk' => $id])->row_array();
        $data['spkitem'] = $this->General_model->get('production_progress_report_blackstone', ['id_spk' => $id]);
        $data['item'] = $this->General_model->get('production_progress_blackstone', ['id_spk' => $id]);
        $data['size'] = $this->General_model->get_data('tb_blackstone_size', ['id_spk' => $id])->result_array();
        $data['spkitemRossi'] = $this->General_model->get('production_progress_report_rossi', ['id_spk' => $id]);
        $data['itemRossi'] = $this->General_model->get('production_progress_rossi', ['id_spk' => $id]);
        $data['sizeRossi'] = $this->General_model->get_data('tb_rossi_size', ['id_spk' => $id])->result_array();
        $data['spkitemAriat'] = $this->General_model->get('production_progress_report_ariat', ['id_spk' => $id]);
        $data['itemAriat'] = $this->General_model->get('production_progress_ariat', ['id_spk' => $id]);
        $data['sizeAriat'] = $this->General_model->get_data('tb_ariat_size', ['id_spk' => $id])->result_array();
        $data['dept'] = ['id_dept' => $id_dept]; 

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('production/td_detail_report_packaging', $data);
        $this->load->view('templates/footer');

    }

    
}