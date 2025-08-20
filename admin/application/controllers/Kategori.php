<?php
class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        //cek session, jika tidak ada maka diarahkan ke halaman login
        if (!$this->session->userdata("id_admin")) {
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
    function tambah()
    {
        //mendapatkan inputan dari formulir pakai $this->input->post()
        $inputan = $this->input->post();

        //pasang form validasi
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        //atur pesan dalam bahasa indonesia
        $this->form_validation->set_message('required', '%s Wajib Diisi!');

        //jika ada inputan
        if ($this->form_validation->run() == TRUE) {
            //panggil model Mkategori
            $this->load->model("Mkategori");

            //jalankan fungsi simpan()
            $this->Mkategori->simpan($inputan);

            //pesan dilayar
            $this->session->set_flashdata('pesan_sukses', 'Data kategori tersimpan');

            //redirect ke halaman kategori
            redirect('kategori', 'refresh');
        }

        $this->load->view("header");
        $this->load->view("kategori_tambah");
        $this->load->view('footer');
    }

    function hapus($id_kategori)
    {
        //panggil model Mkategori
        $this->load->model("Mkategori");

        //jalankan fungsi hapus()
        $this->Mkategori->hapus($id_kategori);

        //pesan dilayar
        $this->session->set_flashdata('pesan_sukses', 'kategori telah terhapus');

        //redirect ke halaman kategori
        redirect('kategori', 'refresh');
    }

    function edit($id_kategori)
    {
        //panggil model Mkategori
        $this->load->model("Mkategori");

        $data["kategori"] = $this->Mkategori->detail($id_kategori);

        $inputan = $this->input->post();

        //pasang form validasi
        //form validation ussername dan password wajib diisi
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        //atur pesan dalam bahasa indonesia
        $this->form_validation->set_message('required', '%s Wajib Diisi!');

        if ($this->form_validation->run()==TRUE) {
            $this->Mkategori->edit($inputan, $id_kategori);
            $this->session->set_flashdata('pesan_sukses', 'Data kategori telah diubah');
            redirect('kategori', 'refresh');
        }

        $this->load->view("header");
        $this->load->view("kategori_edit", $data);
        $this->load->view('footer');
    }
}
