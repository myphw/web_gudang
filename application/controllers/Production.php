<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
        $data['title'] = 'Production Progress';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['datanosj'] = $this->General_model->buat_do_auto();
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

            // ✅ Insert to Blackstone
            $this->General_model->insert('production_progress_blackstone', $insertData);

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

            $this->session->set_flashdata('message', '<div class="alert alert-success">Data saved successfully.</div>');
            redirect('production/td_item_blackstone/' . $id_pr);
        }
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

            // Insert into production_progress_rossi
            $this->General_model->insert('production_progress_rossi', $insertData);

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

            // Insert into production_progress_rossi
            $this->General_model->insert('production_progress_ariat', $insertData);

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
        $data['title'] = 'Menu Production Report';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['artcolor'] = $this->db->get('form_ac')->result_array();
        $data['brand'] = $this->db->get('form_brand')->result_array();
        $data['spk'] = $this->db->get('production_spk_report')->result_array();
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
            $this->load->view('production/production_report', $data);
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
                redirect('production/td_report_blackstone/' . $insert_id);
            } elseif ($brand_lower === 'rossi') {
                redirect('production/td_report_rossi/' . $insert_id);
            } elseif ($brand_lower === 'ariat') {
                redirect('production/td_report_ariat/' . $insert_id);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Brand not recognized. Showing default view.</div>');
                redirect('production/production_report');
            }
        }
    }

    public function pr_detail_item($id_spk)
    {
        $spk = $this->General_model->get_data('production_spk_report', ['id_spk' => $id_spk])->row_array();

        if (!$spk) {
            redirect('production/progress_report');
        }

        $brand_name = $spk['brand_name'];

        // Redirect to the correct handler
        if ($brand_name === 'BLACK STONE') {
            redirect('production/td_report_blackstone/' . $id_spk);
        } elseif ($brand_name === 'ROSSI') {
            redirect('production/td_report_rossi/' . $id_spk);
        } elseif ($brand_name === 'ARIAT') {
            redirect('production/td_report_ariat/' . $id_spk);
        } else {
            redirect('production/progress_report');
        }
    }

    public function production_report_blackstone($id)
    {
        $data['title'] = 'Black Stone Report View';
        $data['users'] = $this->db->get_where('users', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['spk'] = $this->General_model->get_data('production_progress_report_blackstone', ['id_spk' => $id])->result_array();
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
}