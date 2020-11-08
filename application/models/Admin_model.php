<?php
defined('BASEPATH') OR exit('No Direct Script Access Allowed');

class Admin_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get($table)
    {
        $res = $this->db->get($table);
        return $res->result_array();
    }
    
    public function Insert($table,$data)
    {
        $res = $this->db->insert($table, $data); 
        return $res; 
    }
 
    public function Update($table, $data, $where)
    {
        $res = $this->db->update($table, $data, $where);
        return $res;
    }
 
    public function Delete($table, $where)
    {
        $res = $this->db->delete($table, $where);
        return $res;
    }

    public function GetWhere($table, $data)
    {
        $res=$this->db->get_where($table, $data);
        return $res->result_array();
    }

    public function cetakLaporanHarianPdf($today)
    {
        $this->db->select('nama_produk, qty, total_harga, tanggal, nama_pembeli');
        $this->db->from('transaksi');
        $this->db->where('tanggal', $today);
        $res = $this->db->get();
        return $res->result_array();
    }

    public function cetakLaporanHarian($today)
    {
        $this->db->select('nama_produk, qty, total_harga, tanggal, nama_pembeli');
        $this->db->from('transaksi');
        $this->db->where('tanggal', $today);
        $res = $this->db->get();
        return $res->result();
    }

    public function user()
    {
        $this->db->from('user');
        $res = $this->db->get();
        return $res->result();
    }

    public function tes()
    {
        $this->db->from('transaksi');
        $this->db->where('MONTH(tanggal)',date('m'));
        $this->db->group_by('tanggal');
        $res = $this->db->get();
        return $res->result_array();
    }
}


?>