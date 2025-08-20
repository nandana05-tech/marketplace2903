<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$inputan = $this->input->post();

		//form validation ussername dan password wajib diisi
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		//atur pesan dalam bahasa indonesia
		$this->form_validation->set_message('required', '%s Wajib Diisi!');

		//pakai valiadasinya

		if ($this->form_validation->run()==TRUE) {
			$this->load->model('Madmin');
			$output = $this->Madmin->login($inputan);

			if ($output == "ada") {
				$this->session->set_flashdata('pesan_sukses', 'Berhasil Login'.$this->session->userdata('nama'));
				redirect('home', 'refresh');
			} else {
				$this->session->set_flashdata('pesan_gagal', 'Gagal Login');
				redirect('/', 'refresh');
			}
		}
		$this->load->view('login');
	}
}
