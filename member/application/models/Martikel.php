<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Martikel extends CI_Model {
    function tampil_artikel_terbaru(){
        //melakukan query
        $this->db->order_by('id_artikel', 'desc');
        $q = $this->db->get("artikel", 6, 0);

        //pecah ke array
        $d = $q->result_array();

        return $d;  
    }
}