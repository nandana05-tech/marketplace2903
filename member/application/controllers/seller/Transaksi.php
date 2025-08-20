<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //cek session, jika tidak ada maka diarahkan ke halaman login
        if (!$this->session->userdata("id_member")) {
            $this->session->set_flashdata('pesan_gagal', 'Anda harus login');
            redirect('/', 'refresh');
        }
    }
    public function index(){
        $id_member = $this->session->userdata("id_member");
        $this->load->model("Mtransaksi");
        $data['jual'] = $this->Mtransaksi->transaksi_member_jual($id_member);

        $this->load->view('header');
        $this->load->view('seller/transaksi_tampil', $data);
        $this->load->view('footer');
    }
    function detail($id_transaksi){

        //panggil model Mtransaksi
        $this->load->model("Mtransaksi");

        //panngil fungsi detail di model
        $data['transaksi'] = $this->Mtransaksi->detail($id_transaksi);

        if ($data["transaksi"]["id_member_jual"] !== $this->session->userdata("id_member")){
            $this->session->set_flashdata('pesan_gagal', 'Anda tidak berhak mengakses halaman ini');
            redirect('seller/transaksi', 'refresh');
        }

        //panggil fungsi transaksi_detail di model
        $data['transaksi_detail'] = $this->Mtransaksi->transaksi_detail($id_transaksi);

        $this->form_validation->set_rules('resi_ekspedisi', 'Resi', 'required');
        $this->form_validation->set_message('required', '%s Wajib diisi');
        if ($this->form_validation->run() == TRUE) {
            $resi = $this->input->post('resi_ekspedisi');
            $this->Mtransaksi->update_resi($resi, $id_transaksi);
            $this->session->set_flashdata('pesan_sukses', 'nomor resi telah terkirim');
            redirect('seller/transaksi/detail/' . $id_transaksi, 'refresh');
        }

        $this->load->view('header');
        $this->load->view('seller/transaksi_detail', $data);
        $this->load->view('footer');
    }
}
