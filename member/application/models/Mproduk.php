<?php
class Mproduk extends CI_Model
{
	function tampil()
	{
		$q = $this->db->get('produk');
		$d = $q->result_array();

		return $d;
	}

	function cari($keyword = "")
	{
		$this->db->like('nama_produk', $keyword, 'BOTH');
		$this->db->or_like('deskripsi_produk', $keyword, 'BOTH');
		$q = $this->db->get('produk');
		$d = $q->result_array();
		return $d;
	}


	function tampil_produk_terbaru()
	{
		$this->db->order_by('id_produk', 'desc');
		$q = $this->db->get('produk', 6, 0);
		$d = $q->result_array();

		return $d;
	}

	function produk_member($id_member)
	{
		$this->db->where('id_member', $id_member);
		$q = $this->db->get('produk');
		$d = $q->result_array();

		return $d;
	}

	function simpan($inputan)
	{
		//urusan upload foto
		$config['upload_path'] = $this->config->item("assets_produk");
		$config['allowed_types'] = 'jpg|png|jpeg|jpeg';

		$this->load->library('upload', $config);

		$ngupload = $this->upload->do_upload("foto_produk");
		if ($ngupload) {
			$inputan['foto_produk'] = $this->upload->data('file_name');
		}

		$inputan['id_member'] = $this->session->userdata("id_member");

		//query insert ke tabel produk
		$this->db->insert('produk', $inputan);
	}

	function detail($id_produk)
	{
		//query select ke tabel produk sesuaikan id_produk dan id_member yang login
		$this->db->where('id_member', $this->session->userdata("id_member"));
		$this->db->where('id_produk', $id_produk);
		$this->db->join('kategori', 'produk.id_kategori=kategori.id_kategori', 'left');
		$q = $this->db->get('produk');
		$d = $q->row_array();

		return $d;
	}

	function ubah($inputan, $id_produk)
	{
		//urusan upload foto
		$config['upload_path'] = $this->config->item("assets_produk");;
		$config['allowed_types'] = 'jpg|png|jpeg|jpeg';

		$this->load->library('upload', $config);

		$ngupload = $this->upload->do_upload("foto_produk");
		if ($ngupload) {
			$inputan['foto_produk'] = $this->upload->data('file_name');
		}

		$inputan['id_member'] = $this->session->userdata("id_member");

		//query update ke tabel produk sesuaikan id_produk dan id_member yang login
		$this->db->where('id_member', $this->session->userdata("id_member"));
		$this->db->where('id_produk', $id_produk);
		$this->db->update('produk', $inputan);
	}

	function hapus($id_produk)
	{
		//query delete ke tabel produk sesuaikan id_produk dan id_member yang login
		$this->db->where('id_member', $this->session->userdata("id_member"));
		$this->db->where('id_produk', $id_produk);
		$this->db->delete('produk');
	}
	function detail_umum($id_produk)
	{
		$this->db->where('id_produk', $id_produk);
		$this->db->join('kategori', 'produk.id_kategori=kategori.id_kategori', 'left');
		$q = $this->db->get('produk');
		$d = $q->row_array();

		return $d;
	}
	function laporan_terjual($tglm, $tgls, $status)
	{
		//dapatkan id member yang login karena dia yang jual dan butuh laporan
		$id_member_jual = $this->session->userdata("id_member");
		$kuery = "SELECT id_produk, nama_beli, SUM(jumlah_beli) as jumlah_terjual, SUM(harga_beli) as nominal_terjual  FROM `transaksi_detail` 
              LEFT JOIN transaksi ON transaksi_detail.id_transaksi=transaksi.id_transaksi
              WHERE id_member_jual='$id_member_jual' AND tanggal_transaksi BETWEEN '$tglm' AND '$tgls' AND status_transaksi='$status'
              GROUP BY nama_beli";

		$ambil = $this->db->query($kuery);
		$data = $ambil->result_array();

		return $data;
	}
}
