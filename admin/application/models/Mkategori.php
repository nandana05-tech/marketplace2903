<?php

class Mkategori extends CI_Model {
    function tampil(){
        //melakukan query
        $q = $this->db->get("kategori");

        //pecah ke array
        $d = $q->result_array();

        return $d;  
    }
    function simpan($inputan){
        //kita urusi dulu upload foto_kategori
        $config['upload_path'] = $this->config->item("assets_kategori");
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        //adegan upload foto_kategori
        $ngupload = $this->upload->do_upload('foto_kategori');

        //jika ngupload, maka dapatkan nama fotonya untuk ditampung ke db
        if ($ngupload) {
            $inputan['foto_kategori'] = $this->upload->data("file_name");
        }

        //query simpan data ke tabel kategori
        //insert into kategori bla bla bla
        $this->db->insert('kategori', $inputan);
    }

    function hapus($id_kategori){
        //query hapus data kategori berdasarkan id_kategori
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }

    function detail ($id_kategori){
        //query detail data kategori berdasarkan id_kategori
        $this->db->where('id_kategori', $id_kategori);
        $q = $this->db->get('kategori');

        //pecah ke array
        $d = $q->row_array();

        return $d;
    }

    function edit($inputan, $id_kategori){
        //kita urusi dulu upload foto_kategori
        $config['upload_path'] = $this->config->item("assets_kategori");
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        //adegan upload foto_kategori
        $ngupload = $this->upload->do_upload('foto_kategori');

        //jika ngupload, maka dapatkan nama fotonya untuk ditampung ke db
        if ($ngupload) {
            $inputan['foto_kategori'] = $this->upload->data("file_name");
        }

        //query edit data kategori berdasarkan id_kategori
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $inputan);
    }
}