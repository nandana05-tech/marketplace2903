<?php
class Slider extends CI_Controller
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
        //panggil model Mslider
        $this->load->model("Mslider");
        $data["slider"] = $this->Mslider->tampil();

        $this->load->view("header");
        $this->load->view("slider_tampil", $data);
        $this->load->view('footer');
    }
    function tambah()
    {
        //mendapatkan inputan dari formulir pakai $this->input->post()
        $inputan = $this->input->post();

        //pasang form validasi
        $this->form_validation->set_rules('caption_slider', 'Caption slider', 'required');

        //atur pesan dalam bahasa indonesia
        $this->form_validation->set_message('required', '%s Wajib Diisi!');

        //jika ada inputan
        if ($this->form_validation->run() == TRUE) {
            //panggil model Mslider
            $this->load->model("Mslider");

            //jalankan fungsi simpan()
            $this->Mslider->simpan($inputan);

            //pesan dilayar
            $this->session->set_flashdata('pesan_sukses', 'Data slider tersimpan');

            //redirect ke halaman slider
            redirect('slider', 'refresh');
        }

        $this->load->view("header");
        $this->load->view("slider_tambah");
        $this->load->view('footer');
    }

    function hapus($id_slider)
    {
        //panggil model Mslider
        $this->load->model("Mslider");

        //jalankan fungsi hapus()
        $this->Mslider->hapus($id_slider);

        //pesan dilayar
        $this->session->set_flashdata('pesan_sukses', 'slider telah terhapus');

        //redirect ke halaman slider
        redirect('slider', 'refresh');
    }

    function edit($id_slider)
    {
        //panggil model Mslider
        $this->load->model("Mslider");

        $data["slider"] = $this->Mslider->detail($id_slider);

        $inputan = $this->input->post();

        //pasang form validasi
        //form validation ussername dan password wajib diisi
        $this->form_validation->set_rules('caption_slider', 'Caption slider', 'required');

        //atur pesan dalam bahasa indonesia
        $this->form_validation->set_message('required', '%s Wajib Diisi!');

        if ($this->form_validation->run()==TRUE) {
            $this->Mslider->edit($inputan, $id_slider);
            $this->session->set_flashdata('pesan_sukses', 'Data slider telah diubah');
            redirect('slider', 'refresh');
        }

        $this->load->view("header");
        $this->load->view("slider_edit", $data);
        $this->load->view('footer');
    }
}
