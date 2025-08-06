<?php

class General_model extends CI_Model
{
  
    public function data_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function get_data($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function get($table)
    {
        $this->db->select('*');
        $this->db->from($table);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_items_by_artcolor($artcolor_name) 
    {
    $this->db->select('item_name, unit_name, cons_rate');
    $this->db->from('form_consrate');
    $this->db->where('artcolor_name', $artcolor_name);
    $query = $this->db->get();

    return $query->result_array();
    }

    public function get_sort($table, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order_by, 'ASC');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_sort_where($table, $where, $order_by, $sort)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order_by, $sort);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_where_one($table, $where, $id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }


    public function get_one($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_one_date($table, $where, $field_between, $start, $end)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->where("$field_between BETWEEN '$start' AND '$end'");

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_one_sort($table, $where,$order_by, $sort)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order_by, $sort);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_ones($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->row();
    }

    public function get_one_many($table, $where, $id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_one_many_where($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_orderby_one($table, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order_by, 'DESC');

        return $this->db->get()->row();
    }

    public function get_orderby_many($table, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order_by, 'ASC');

        return $this->db->get()->result_array();
    }

    public function get_orderby_where_one($table, $where, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order_by, 'DESC');

        return $this->db->get()->row();
    }

    public function get_one_many_orderby($table, $where, $id, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where, $id);
        $this->db->order_by($order_by, 'DESC');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function insert($table, $data)
    {
        $this->db->insert($table,$data); 
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function insert_get_id($table, $data)
    {
        $this->db->insert($table,$data); 
        return $this->db->insert_id();
    }

    public function insert_batch($table, $data)
    {
       $insert =  $this->db->insert_batch($table,$data);
        return ($insert) ? true : false;
    }

    public function update_batch($table, $data, $where1)
    {
        $update = $this->db->update_batch($table, $data, $where1);
        $response = false;
        if ($update != null){
            $response = true;
        }else{
            $response = false;
        }
        return $response;
    }
    
    public function update_batch2($table, $data, $where1, $where2)
    {
        $this->db->where($where2, null, false); // Check for IS NULL

        $update = $this->db->update_batch($table, $data, $where1);
        return ($update != null) ? true : false;
    }

    function update($table,$data,$where,$id)
    {

        $this->db->trans_begin();

        $this->db->where($where,$id); 
        $this->db->update($table,$data);

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return FALSE;
        }
        else
        {
                $this->db->trans_commit();
                return TRUE;
        }
    }

    function update2($table, $data, $where)
    {
        $this->db->trans_begin();

        if (is_array($where)) {
            $this->db->where($where);
        } else {
            // fallback for existing usage
            $this->db->where('id', $where);
        }

        $this->db->update($table, $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    

    function delete($table, $where, $id)
    {
        $this->db->where($where,$id);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

    function delete_where($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
        return $this->db->affected_rows();
    }

    public function get_join($table,$table2, $join_id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_where($table,$table2, $join_id, $where, $where_id)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->where($where, $where_id);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_where_sort($table,$table2, $join_id, $where, $where_id, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->where($where, $where_id);
        $this->db->order_by($order_by, 'ASC');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_wheres($table,$table2, $join_id, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_dua($table,$table2, $table3, $join_id, $join_id2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->join($table3, $join_id2, 'JOIN');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_dua_where($table,$table2, $table3, $join_id, $join_id2, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->join($table3, $join_id2, 'JOIN');
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function get_join_tiga($table,$table2, $table3, $table4, $join_id, $join_id2, $join_id3)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->join($table3, $join_id2, 'JOIN');
        $this->db->join($table4, $join_id3, 'JOIN');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }
    
    public function get_join_empat($table,$table2, $table3, $table4, $table5, $join_id, $join_id2, $join_id3, $join_id4)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join($table2, $join_id, 'JOIN');
        $this->db->join($table3, $join_id2, 'JOIN');
        $this->db->join($table4, $join_id3, 'JOIN');
        $this->db->join($table5, $join_id4, 'JOIN');

        //die($this->db->get_compiled_select());
        return $this->db->get()->result_array();
    }

    public function count($table)
    {
        $this->db->select('*');
        $this->db->from($table);

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }

    public function count_where($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);

        //die($this->db->get_compiled_select());
        return $this->db->get()->num_rows();
    }


    public function get_forpagination($table,$limit, $start)
    {
        $query = $this->db->get($table, $limit, $start);
        return $query;
    }

    public function get_last_id($table, $order_by)
    {
        $query = $this->db->query("
            SELECT * FROM $table ORDER BY $order_by DESC LIMIT 1
            ")->row();
        return $query;
    }

    public function get_lastid_where($table, $where, $order_by)
    {
        $query = $this->db->query("
            SELECT * FROM $table WHERE $where ORDER BY $order_by DESC LIMIT 1
            ")->row();
        return $query;
    }

    public function last_id_where($table, $where, $order_by)
    {
        //$this->db->select('*');
        //$this->db->from($table);
        //$this->db->where($where);
        //$this->db->order_by($order_by, 'DESC');
        //$this->db->limit(1);

        //return $this->db->get()->row();

        $query = $this->db->query("SELECT * FROM $table WHERE $order_by = (SELECT MAX($order_by) FROM $table WHERE $where)")->row();
        return $query;
    }

    public function last_id_where_one($table, $where, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order_by, 'DESC');
        $this->db->limit(1);

        return $this->db->get()->row();

        // $query = $this->db->query("SELECT * FROM $table WHERE $order_by = (SELECT MAX($order_by) FROM $table WHERE $where)")->row();
        // return $query;
    }

    public function last_id_where_asc($table, $where, $order_by)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($order_by, 'ASC');
        //$this->db->limit(1);

        return $this->db->get()->row();
    }

    

    public function get_sum($table, $sum)
    {
        $query = $this->db->query("
            SELECT SUM($sum) AS jum_sum FROM $table")->row();
        return $query;
    }

    public function get_sum_where($table, $where, $sum)
    {
        $query = $this->db->query("
            SELECT SUM($sum) AS jum_sum_where FROM $table WHERE $where")->row();
        return $query;
    }

    public function get_koli_mms($where, $sum, $field_between, $start, $end)
    {
        $query = $this->db->query("
            SELECT SUM($sum) AS jum_sum_where FROM trx_surat_pengiriman INNER JOIN trx_surat_pengiriman_detail ON trx_surat_pengiriman.id_sp = trx_surat_pengiriman_detail.id_sp WHERE $where AND $field_between BETWEEN '$start' AND '$end'")->row();
        return $query;
    }

    public function get_sum_where_date($table, $where = "", $sum, $field_between, $start, $end)
    {
        if ($where != '' || $where != null){
            $query = $this->db->query("
            SELECT SUM($sum) AS jum_sum_where FROM $table WHERE $where AND $field_between BETWEEN '$start' AND '$end'")->row();
        }else{
            $query = $this->db->query("
            SELECT SUM($sum) AS jum_sum_where FROM $table WHERE $field_between BETWEEN '$start' AND '$end'")->row();
        }
        return $query;
    }

    public function get_sum_join_eceran_where($table, $where, $sum, $value1, $value2)
    {
        $get_eceran = $this->db->query("SELECT id_eceran FROM $table WHERE id_eceran = 0")->row();

        if ($get_eceran->id_eceran = 0){
            $query = $this->db->query("
                SELECT SUM($sum) AS jum_sum_where FROM $table WHERE $where AND tgl_terima BETWEEN '$value1' AND '$value2'")->row();
            return $query;
        }else{
            $query = $this->db->query("
                SELECT SUM($sum) AS jum_sum_where FROM $table INNER JOIN trx_eceran
                ON trx_khb.id_eceran = trx_eceran.id_eceran WHERE $where AND trx_eceran.tgl_eceran BETWEEN '$value1' AND '$value2'")->row();
            return $query;
        }
    }

    public function get_sum_khd_where($table, $where, $sum, $value1, $value2)
    {
        
            $query = $this->db->query("
                SELECT SUM($sum) AS jum_sum_where FROM $table WHERE $where AND tgl_terima BETWEEN '$value1' AND '$value2'")->row();
            return $query;
        
    }


    // public function get_sum_where_null($table, $kondisi1, $kondisi2, $field, $sum)
    // {
    //     $query = $this->db->query("
    //         SELECT SUM($sum) AS jum_sum_where FROM $table WHERE id_kantor=12 AND tanggal_laporan IS NOT NULL")->row();
    //     return $query;
    // }

    // public function get_sum_lk($table, $sum, $kondisi_1, $kondisi_2)
    // {
    //     $this->db->select_sum($sum);
    //     $this->db->from($table);
    //     $this->db->where('id_kantor', $kondisi_1);
    //     $this->db->where('status_bayar_kirim', $kondisi_2);
    //     $this->db->where('tanggal_laporan ==', "");

    //     //die($this->db->get_compiled_select());
    //     return $this->db->get()->row();
    // }

    function update_where($table,$data,$where)
    {

        $this->db->trans_begin();

        $this->db->where($where); 
        $this->db->update($table,$data);

        if ($this->db->trans_status() === FALSE)
        {
                $this->db->trans_rollback();
                return FALSE;
        }
        else
        {
                $this->db->trans_commit();
                return TRUE;
        }
    }

    public function get_sum_between_where($table, $where, $sum, $field_between, $start, $end)
    {
        $query = $this->db->query("
            SELECT SUM($sum) AS jum_sum_where FROM $table WHERE $where AND $field_between BETWEEN '$start' AND '$end'")->row();
        return $query;
    }

    public function get_between_where($table, $where, $field_between, $start, $end)
    {
        $query = $this->db->query("
            SELECT * FROM $table WHERE $where AND $field_between BETWEEN '$start' AND '$end'
            ")->result_array();
        return $query;
    }

    public function get_between($table, $field_between, $start, $end)
    {
        $query = $this->db->query("
            SELECT * FROM $table $field_between BETWEEN '$start' AND '$end'
            ")->result_array();
        return $query;
    }

    

    public function get_data_admin()
    {
        $query = $this->db->query("
            SELECT * FROM m_admin 
            INNER JOIN m_profile 
            ON m_admin.id_profile = m_profile.id_profile 
            WHERE m_admin.id_profile = 0 
            ")->result_array();
        return $query;
    }

    public function get_dm_story($id_admin)
    {
        $query = $this->db->query("
            SELECT * FROM trx_surat_pengiriman WHERE id_admin_dm = $id_admin AND status_sp = 4 GROUP BY tgl_sp")->result_array();
        return $query;
    }

    public function query_khb($id_kantor, $start, $end)
    {
        $query = $this->db->query("
            SELECT * FROM trx_khb WHERE id_dari = $id_kantor AND tgl_sp BETWEEN '$start' AND '$end'
            ")->result_array();
        return $query;
    }

    public function query_khb_where($id_kantor, $where, $start, $end)
    {
        $query = $this->db->query("
            SELECT * FROM trx_khb WHERE id_dari = $id_kantor AND $where AND tgl_sp BETWEEN '$start' AND '$end'
            ")->result_array();
        return $query;
    }

    public function query_count_khb($id_kantor, $where, $start, $end)
    {
        $query = $this->db->query("
            SELECT count(*) AS jumlah FROM trx_khb WHERE id_dari = $id_kantor AND $where AND tgl_sp BETWEEN '$start' AND '$end'
            ")->row();
        return $query;
    }

    public function query_count($table, $where, $start, $end)
    {
        $query = $this->db->query("
            SELECT count(*) AS jumlah FROM $table WHERE $where AND tgl_sp BETWEEN '$start' AND '$end'
            ")->row();
        return $query;
    }

    public function query_count_custom($table, $where, $date, $start, $end)
    {
        $query = $this->db->query("
            SELECT count(*) AS jumlah FROM $table WHERE $where AND $date BETWEEN '$start' AND '$end'
            ")->row();
        return $query;
    }

    public function query_sum_khb($id_kantor, $sum, $start, $end)
    {
        $query = $this->db->query("
            SELECT sum($sum) AS jum_sum_where FROM trx_khb WHERE id_dari = $id_kantor AND tgl_sp BETWEEN '$start' AND '$end'
            ")->row();
        return $query;
    }

    public function query_sum_rekapharian_where($id_kantor, $sum, $start, $end, $where = "")
    {
        if ($where != '' || $where != null){
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM rekap_harian WHERE $id_kantor AND $where AND tgl_dm BETWEEN '$start' AND '$end'
                ")->row();
        }else{
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM rekap_harian WHERE $id_kantor AND tgl_dm BETWEEN '$start' AND '$end'
                ")->row();
        }
        return $query;
    }

    public function query_sum_khb_where($id_kantor, $sum, $start, $end, $where = "")
    {
        if ($where != '' || $where != null){
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM trx_khb WHERE id_dari = $id_kantor AND $where AND tgl_sp BETWEEN '$start' AND '$end'
                ")->row();
        }else{
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM trx_khb WHERE id_dari = $id_kantor AND tgl_sp BETWEEN '$start' AND '$end'
                ")->row();
        }
        return $query;
    }

    public function query_sum_rekapkhb_where($sum, $start, $end, $where = "", $where2 = "")
    {
        
        if ($where != '' || $where != null){
            
                if($where2 != '' || $where2 != null)
                {
                    $query = $this->db->query("SELECT sum($sum) AS jum_sum_where FROM rekap_khb WHERE status_sp < 98 AND $where AND $where2 AND tgl_sp BETWEEN '$start' AND '$end'")->row();
                }
                else
                {
                    $query = $this->db->query("SELECT sum($sum) AS jum_sum_where FROM rekap_khb WHERE status_sp < 98 AND $where AND tgl_sp BETWEEN '$start' AND '$end'")->row();
                }
        }else{
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM rekap_khb WHERE status_sp < 98 AND tgl_sp BETWEEN '$start' AND '$end'
                ")->row();
        }
        return $query;
    }

    public function query_sum_omset_sms($start, $end, $where = '')
    {
        if ($where != ''){
            $query = $this->db->query("SELECT sum(if(biaya_sms>0, biaya_sms-650, 0))+sum(if(biaya_sms_nontunai>0, biaya_sms_nontunai-650, 0))+sum(if (biaya_sms_bb> 0, biaya_sms_bb-650, 0))+sum(if(biaya_sms_bt>0,biaya_sms_bt-650, 0)) as jum_sum_where FROM `rekap_khb` WHERE $where AND tgl_sp BETWEEN '$start' AND '$end'")->row();
        }else{
            $query = $this->db->query("SELECT sum(if(biaya_sms>0, biaya_sms-650, 0))+sum(if(biaya_sms_nontunai>0, biaya_sms_nontunai-650, 0))+sum(if (biaya_sms_bb> 0, biaya_sms_bb-650, 0))+sum(if(biaya_sms_bt>0,biaya_sms_bt-650, 0)) as jum_sum_where FROM `rekap_khb` WHERE tgl_sp BETWEEN '$start' AND '$end'")->row();
        }
       
        return $query;
    }

    public function query_sum_mms_where($id_kantor, $sum, $start, $end, $where = "")
    {
        if ($where != '' || $where != null){
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM trx_surat_pengiriman WHERE id_kantor = $id_kantor AND $where AND tgl_sp BETWEEN '$start' AND '$end'
                ")->row();
        }else{
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM trx_surat_pengiriman WHERE id_kantor = $id_kantor AND tgl_sp BETWEEN '$start' AND '$end'
                ")->row();
        }
        return $query;
    }

    public function query_sum_total_mms_where($sum, $start, $end, $where = "")
    {
        if ($where != '' || $where != null){
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM trx_surat_pengiriman WHERE $where AND tgl_sp BETWEEN '$start' AND '$end'
                ")->row();
        }else{
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM trx_surat_pengiriman WHERE tgl_sp BETWEEN '$start' AND '$end'
                ")->row();
        }
        return $query;
    }

    public function query_sum_total_khb_where($sum, $start, $end, $where = "")
    {
        if ($where != '' || $where != null){
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM trx_khb WHERE $where AND tgl_sp BETWEEN '$start' AND '$end'
                ")->row();
        }else{
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM trx_khb WHERE tgl_sp BETWEEN '$start' AND '$end'
                ")->row();
        }
        return $query;
    }

    public function query_sum_khb_voucher_where($id_kantor, $sum, $start, $end, $where = "")
    {
        if ($where != '' || $where != null){
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM sp_dan_khb WHERE id_dari = $id_kantor AND $where AND tgl_sp BETWEEN '$start' AND '$end'
                ")->row();
        }else{
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM sp_dan_khb WHERE id_dari = $id_kantor AND tgl_sp BETWEEN '$start' AND '$end'
                ")->row();
        }
        return $query;
    }

    public function query_sum_total_khb_voucher_where($sum, $start, $end, $where = "")
    {
        if ($where != '' || $where != null){
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM sp_dan_khb WHERE $where AND tgl_sp BETWEEN '$start' AND '$end'
                ")->row();
        }else{
            $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM sp_dan_khb WHERE tgl_sp BETWEEN '$start' AND '$end'
                ")->row();
        }
        return $query;
    }

    public function query_sum_total_diskon_where($table, $sum, $where, $tgl_sp, $start, $end)
    {
        $query = $this->db->query("
                SELECT sum($sum) AS jum_sum_where FROM $table WHERE $where AND $tgl_sp BETWEEN '$start' AND '$end'
                ")->row();
        
        return $query;
    }
    
    public function query_sum_total_sms_where($table, $select, $where)
    {
        $query = $this->db->query("
                SELECT $select FROM $table WHERE $where")->row();
        
        return $query;
    }

    public function query_khd($id_kantor, $start, $end)
    {
        $query = $this->db->query("
            SELECT * FROM trx_khb WHERE id_tujuan = $id_kantor AND status_ecer != 0 AND tgl_sp BETWEEN '$start' AND '$end'
            ")->result_array();
        return $query;
    }

    public function query_eceran($id_kantor, $start, $end)
    {
        $query = $this->db->query("
            SELECT * FROM trx_khb WHERE id_tujuan = $id_kantor AND tgl_sp BETWEEN '$start' AND '$end'
            ")->result_array();
        return $query;
    }

    public function query($sql)
    {
        $query = $this->db->query($sql)->result_array();
        return $query;
    }
    
    public function query_custom($sql)
    {
        $query = $this->db->query($sql)->row();
        return $query;
    }

    public function query_menu_laporankeuangan($role_id, $parent_id)
    {
        $query = $this->db->query("
            SELECT m_menu_user.id_menuuser, m_menu_user.role_id, m_menu.menu_id, m_menu.apps, m_menu.module, m_menu.parent_id, m_menu.menu, m_menu.menu_order, m_menu.menu_icon, m_menu.menu_link, m_menu.menu_icon FROM m_menu_user INNER JOIN m_menu ON m_menu_user.menu_id = m_menu.menu_id WHERE m_menu_user.role_id = $role_id AND m_menu.parent_id = $parent_id")->result_array();
        return $query;
    }

    public function query_menu_rekap($role_id, $parent_id)
    {
        $query = $this->db->query("
            SELECT m_menu_user.id_menuuser, m_menu_user.role_id, m_menu.menu_id, m_menu.apps, m_menu.module, m_menu.parent_id, m_menu.menu, m_menu.menu_order, m_menu.menu_icon, m_menu.menu_link, m_menu.menu_icon FROM m_menu_user INNER JOIN m_menu ON m_menu_user.menu_id = m_menu.menu_id WHERE m_menu_user.role_id = $role_id AND m_menu.parent_id = $parent_id")->result_array();
        return $query;
    }

    public function get_distinct($table, $distinct)
    {
        $query = $this->db->query("SELECT DISTINCT($distinct) FROM $table")->result_array();
        return $query;
    }

    public function hapus_data($table, $where){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function cronjoblkp($urut_1, $urut_2)
    {
        $query = $this->db->query("SELECT * FROM m_unit_perwakilan WHERE tipe_unit = 'PERWAKILAN' AND id_unit BETWEEN $urut_1 AND $urut_2")->result_array();
        return $query;
        
    }

    public function cronjoblka($urut_1, $urut_2)
    {
        $query = $this->db->query("SELECT * FROM m_unit_perwakilan WHERE tipe_unit = 'AGEN' AND id_unit BETWEEN $urut_1 AND $urut_2")->result_array();
        return $query;
        
    }

    public function cronjoblku($urut_1, $urut_2)
    {
        $query = $this->db->query("SELECT * FROM m_unit_perwakilan WHERE tipe_unit = 'UNIT' AND id_unit BETWEEN $urut_1 AND $urut_2")->result_array();
        return $query;
        
    }

    public function cronjoblkc()
    {
        $query = $this->db->query("SELECT * FROM m_unit_perwakilan WHERE tipe_unit = 'CABANG'")->result_array();
        return $query;
        
    }

    public function count_wheres($table, $where)
    {
        $query = $this->db->query("SELECT count(*) AS jumlah FROM $table WHERE $where")->row();
        return $query;
    }

    public function query_last_dm($table, $where)
    {
        $query = $this->db->query("SELECT CONCAT(SUBSTR(nomor_dm, 1, 5), max(SUBSTR(nomor_dm, 6))) AS nomor_dm FROM $table WHERE $where;")->row();
        return $query;
    }

    public function query_voucher($isi_kiriman)
    {
        $query = $this->db->query("SELECT * FROM m_voucher WHERE CURDATE() BETWEEN tanggal_mulai AND tanggal_selesai AND isi_kiriman = '$isi_kiriman' AND status_aktif = 'aktif'")->result_array();
        return $query;
    }

    public function query_lostandfound()
    {
        $query = $this->db->query("SELECT * FROM trx_surat_pengiriman WHERE status_sp = 8 OR status_sp = 5 AND tgl_sp <= DATE_SUB(CURDATE(), INTERVAL 100 DAY)")->result_array();
        return $query;
    }

    public function buat_sj_auto()   {

		$this->db->select('RIGHT(form_sj_checkout.no_sj,3) as no_sj', FALSE);
		$this->db->order_by('no_sj','DESC');    
		$this->db->limit(1);    
		$query = $this->db->get('form_sj_checkout');    
		if($query->num_rows() <> 0){          
			$data = $query->row();      
			$no_sj = intval($data->no_sj) + 1;    
		}
		else {          
			$no_sj = 1;    
		}
		
		$no_sjmax = str_pad($no_sj, 4, "0", STR_PAD_LEFT);
		$no_sjjadi = "WH-AI-".$no_sjmax;
		return $no_sjjadi;  
	}

    public function buat_do_auto()   {

		$this->db->select('RIGHT(form_sj.no_do,3) as no_do', FALSE);
		$this->db->order_by('no_do','DESC');
		$this->db->limit(1);
		$query = $this->db->get('form_sj');    
		if($query->num_rows() <> 0){          
			$data = $query->row();      
			$no_do = intval($data->no_do) + 1;    
		}
		else {          
			$no_do = 1;    
		}
		
		$no_domax = str_pad($no_do, 4, "0", STR_PAD_LEFT);
		$no_dojadi = "NEW-DO-AI-".$no_domax;
		return $no_dojadi;  
	}

    public function buat_dataterima_auto()   {

		$this->db->select('RIGHT(production_progress_report.no_pr,3) as no_pr', FALSE);
		$this->db->order_by('no_pr','DESC');
		$this->db->limit(1);
		$query = $this->db->get('production_progress_report');    
		if($query->num_rows() <> 0){          
			$data = $query->row();      
			$no_pr = intval($data->no_pr) + 1;    
		}
		else {          
			$no_pr = 1;    
		}
		
		$no_prmax = str_pad($no_pr, 4, "0", STR_PAD_LEFT);
		$no_prjadi = "OUTPUT-AI-".$no_prmax;
		return $no_prjadi;  
	}

    public function buat_dataitemreturn_auto()   {

		$this->db->select('RIGHT(return_sj.no_ir,3) as no_ir', FALSE);
		$this->db->order_by('no_ir','DESC');
		$this->db->limit(1);
		$query = $this->db->get('return_sj');    
		if($query->num_rows() <> 0){          
			$data = $query->row();      
			$no_ir = intval($data->no_ir) + 1;    
		}
		else {          
			$no_ir = 1;    
		}
		
		$no_irmax = str_pad($no_ir, 4, "0", STR_PAD_LEFT);
		$no_irjadi = "RETUR-AI-".$no_irmax;
		return $no_irjadi;  
	}

}