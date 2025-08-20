<?php
class Artikel extends CI_Controller
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
        //panggil model Martikel
        $this->load->model("Martikel");
        $data["artikel"] = $this->Martikel->tampil();

        $this->load->view("header");
        $this->load->view("artikel_tampil", $data);
        $this->load->view('footer');
    }
    function tambah()
    {
        //mendapatkan inputan dari formulir pakai $this->input->post()
        $inputan = $this->input->post();

        //pasang form validasi
        $this->form_validation->set_rules('judul_artikel', 'Judul artikel', 'required');

        //atur pesan dalam bahasa indonesia
        $this->form_validation->set_message('required', '%s Wajib Diisi!');

        //jika ada inputan
        if ($this->form_validation->run() == TRUE) {
            //panggil model Martikel
            $this->load->model("Martikel");

            //jalankan fungsi simpan()
            $this->Martikel->simpan($inputan);

            //pesan dilayar
            $this->session->set_flashdata('pesan_sukses', 'Data artikel tersimpan');

            //redirect ke halaman artikel
            redirect('artikel', 'refresh');
        }

        $this->load->view("header");
        $this->load->view("artikel_tambah");
        $this->load->view('footer');
    }

    function hapus($id_artikel)
    {
        //panggil model Martikel
        $this->load->model("Martikel");

        //jalankan fungsi hapus()
        $this->Martikel->hapus($id_artikel);

        //pesan dilayar
        $this->session->set_flashdata('pesan_sukses', 'artikel telah terhapus');

        //redirect ke halaman artikel
        redirect('artikel', 'refresh');
    }

    function edit($id_artikel)
    {
        //panggil model Martikel
        $this->load->model("Martikel");

        $data["artikel"] = $this->Martikel->detail($id_artikel);

        $inputan = $this->input->post();

        //pasang form validasi
        //form validation ussername dan password wajib diisi
        $this->form_validation->set_rules('judul_artikel', 'Judul artikel', 'required');

        //atur pesan dalam bahasa indonesia
        $this->form_validation->set_message('required', '%s Wajib Diisi!');

        if ($this->form_validation->run()==TRUE) {
            $this->Martikel->edit($inputan, $id_artikel);
            $this->session->set_flashdata('pesan_sukses', 'Data artikel telah diubah');
            redirect('artikel', 'refresh');
        }

        $this->load->view("header");
        $this->load->view("artikel_edit", $data);
        $this->load->view('footer');
    }
}
