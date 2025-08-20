<?php
class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        //cek session, jika tidak ada maka diarahkan ke halaman login
        if (!$this->session->userdata("id_member")) {
            redirect('/', 'refresh');
        }
    }

    function index()
    {
        //panggil model Mkategori
        $this->load->model("Mkategori");
        $data["kategori"] = $this->Mkategori->tampil();

        $this->load->view("header");
        $this->load->view("kategori_tampil", $data);
        $this->load->view('footer');
    }

    function detail($id)
    {
        //panggil model Mkategori
        $this->load->model("Mkategori");
        $data["kategori"] = $this->Mkategori->detail($id);
        $data["produk"] = $this->Mkategori->produk($id);

        $this->load->view("header");
        $this->load->view("kategori_produk", $data);
        $this->load->view('footer');
    }
    
}
