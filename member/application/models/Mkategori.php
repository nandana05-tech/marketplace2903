<?php

use PSpell\Config;

class Mkategori extends CI_Model
{
    function tampil()
    {
        //melakukan query
        $q = $this->db->get("kategori");

        //pecah ke array
        $d = $q->result_array();

        return $d;
    }

    function detail($id_kategori)
    {
        //query detail data kategori berdasarkan id_kategori
        $this->db->where('id_kategori', $id_kategori);
        $q = $this->db->get('kategori');

        //pecah ke array
        $d = $q->row_array();

        return $d;
    }
    function produk($id_kategori)
    {
        //query produk berdasarkan id_kategori
        $this->db->where('id_kategori', $id_kategori);
        $q = $this->db->get('produk');

        //pecah ke array
        $d = $q->result_array();

        return $d;
    }
}
