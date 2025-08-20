<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // Muat semua yang dibutuhkan di sini agar lebih rapi
    $this->load->model('Mongkir');
    $this->load->model('Mmember');
    $this->load->library(['form_validation', 'session', 'mail_lib']); // Tambahkan mail_lib
    $this->load->helper('url');
  }

  public function index()
  {
    $data['distrik'] = $this->Mongkir->tampil_distrik();

    $this->form_validation->set_rules("email_member", "Email", "required|is_unique[member.email_member]");
    $this->form_validation->set_rules("password_member", "Password", "required");
    $this->form_validation->set_rules("nama_member", "Nama", "required");
    $this->form_validation->set_rules("alamat_member", "Alamat", "required");
    $this->form_validation->set_rules("wa_member", "WA", "required");
    $this->form_validation->set_rules("city_id", "Distrik", "required");

    $this->form_validation->set_message("required", "%s wajib diisi");
    $this->form_validation->set_message("is_unique", "%s yang sama sudah digunakan");

    if ($this->form_validation->run() == TRUE) {

      // Ambil detail distrik
      $city_id = $this->input->post("city_id");
      $detail = $this->Mongkir->detail_distrik($city_id);

      // Buat token unik
      $token = bin2hex(random_bytes(50));

      // Siapkan data untuk dimasukkan ke database
      $m['email_member']      = $this->input->post("email_member");
      // GANTI sha1() dengan password_hash() untuk keamanan
      $m['password_member']   = sha1($this->input->post("password_member")); //sha1($m['password_member']); //sha1($m['password_member']);
      $m['nama_member']       = $this->input->post("nama_member");
      $m['alamat_member']     = $this->input->post("alamat_member");
      $m['wa_member']         = $this->input->post("wa_member");
      $m['kode_distrik_member'] = $this->input->post("city_id");
      $m['nama_distrik_member'] = $detail['type'] . " " . $detail['city_name'] . " - " . $detail['province'];
      // Tambahkan data untuk verifikasi
      $m['is_verified']       = 0;
      $m['verification_token'] = $token;

      // Simpan data
      $this->Mmember->register($m);

      // Kirim Email Verifikasi
      $this->_send_verification_email($m['email_member'], $token);

      // Ubah pesan flashdata
      $this->session->set_flashdata("pesan_sukses", "Registrasi berhasil! Silakan cek email Anda untuk verifikasi akun.");
      redirect("/", "refresh");
    } else {
      // Jika validasi gagal, tampilkan form
      $this->load->view("header");
      $this->load->view("register", $data);
      $this->load->view("footer");
    }
  }

  private function _send_verification_email($email_penerima, $token)
  {
    $subjek = "Aktivasi Akun - TokoKita";
    $link_verifikasi = base_url() . 'register/verify/' . $token;
    $pesan = <<<HTML
<div style="margin: 3rem 0; padding: 0;">
  <div style="display: flex; justify-content: center;">
    <div style="width: 100%; max-width: 720px; padding: 0 1rem;">
      <div style="box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); border: none; border-radius: 1rem; overflow: hidden;">
        <div style="padding: 2rem 2.5rem;">
          <div style="text-align: center; margin-bottom: 1.5rem;">
            <h2 style="color: #0d6efd; font-weight: bold; margin: 0;">🎉 Terima Kasih Telah Mendaftar!</h2>
          </div>
          <p style="font-size: 1.25rem;">Halo,</p>
          <p>Terima kasih telah membuat akun di layanan kami. Untuk mulai menggunakan semua fitur, silakan aktifkan akun Anda melalui tombol di bawah ini:</p>
          <div style="text-align: center; margin: 2rem 0;">
            <a href="{$link_verifikasi}" style="display: inline-block; background-color: #0d6efd; color: #fff; text-decoration: none; font-weight: bold; font-size: 1rem; padding: 0.75rem 2rem; border-radius: 0.375rem;">🔒 Aktifkan Akun</a>
          </div>
          <p>Atau, salin dan tempel tautan berikut ke browser Anda:</p>
          <p style="word-break: break-all;">
            <a href="{$link_verifikasi}" style="color: #0d6efd; text-decoration: none;">{$link_verifikasi}</a>
          </p>
          <p>Jika Anda tidak merasa mendaftar di layanan kami, silakan abaikan email ini.</p>
          <p style="margin-top: 3rem;">Salam hangat,<br><strong style="font-weight: bold;">Tim Admin</strong></p>
        </div>
        <div style="text-align: center; color: #6c757d; font-size: 0.875rem; padding: 1rem;">
          2025 &copy; TokoKita. Semua hak dilindungi.
        </div>
      </div>
    </div> 
  </div>
</div>
HTML;

    // Panggil library email
    $this->mail_lib->send_email($email_penerima, $subjek, $pesan);
  }

  // METHOD BARU: Untuk menangani link verifikasi
  public function verify($token = null)
  {
    if (!$token) {
      show_404();
    }

    $member = $this->Mmember->find_by_token($token);

    if ($member) {
      // Jika token ditemukan, aktivasi akun
      $this->Mmember->activate_account($member->id_member); // Ganti 'id_member' jika nama primary key berbeda
      $this->session->set_flashdata("pesan_sukses", "Akun Anda berhasil diaktivasi. Silakan login.");
    } else {
      // Jika token tidak valid
      $this->session->set_flashdata("pesan_gagal", "Token verifikasi tidak valid atau sudah kedaluwarsa.");
    }
    redirect('/'); // Redirect ke halaman login/utama
  }
}
