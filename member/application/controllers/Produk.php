<?php
class Produk extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		//cek session, jika tidak ada maka diarahkan ke halaman login
		if (!$this->session->userdata("id_member")) {
			$this->session->set_flashdata('pesan_gagal', 'Silahkan login terlebih dahulu');
			redirect('/', 'refresh');
		}
	}
	function index()
	{

		//panggil mmodel Mproduk dan fungsi tampil()
		$this->load->model("Mproduk");
		$data['produk'] = $this->Mproduk->tampil();

		$this->load->view('header');
		$this->load->view('produk_tampil', $data);
		$this->load->view('footer');
	}
	function detail($id_produk)
	{
		$this->load->model("Mproduk");
		$data["produk"] = $this->Mproduk->detail_umum($id_produk);

		$inputan = $this->input->post();
		if ($inputan) {
			$this->load->model("Mkeranjang");
			$this->Mkeranjang->simpan($inputan, $id_produk);

			$this->session->set_flashdata('pesan_sukses', 'produk masuk ke keranjang belanja');
			redirect('keranjang', 'refresh');
		}

		$this->load->view('header');
		$this->load->view('produk_detail', $data);
		$this->load->view('footer');
	}
	function cari()
	{
		$this->load->model('Mproduk');

		// dapatkan keyword
		$keyword = $this->input->get("keyword");

		$data["produk"] = $this->Mproduk->cari($keyword);

		$this->load->view('header');
		$this->load->view('produk_cari', $data);
		$this->load->view('footer');
	}
}
