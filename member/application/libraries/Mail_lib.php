<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail_lib
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();

        // Autoload Composer
        require_once FCPATH . 'vendor/autoload.php';
    }

    public function send_email($to, $subject, $message)
    {
        $mail = new PHPMailer(true);

        try {
            // Konfigurasi SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Ganti sesuai penyedia email
            $mail->SMTPAuth   = true;
            $mail->Username   = 'natasaskaranandana@gmail.com'; // Ganti
            $mail->Password   = 'zglzirtxcbzojgmo';   // Ganti (gunakan App Password untuk Gmail)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Pengirim & Penerima
            $mail->setFrom('natasaskaranandana@gmail.com', 'Aktivasi Akun TokoKita'); // Ganti
            $mail->addAddress($to);

            // Konten Email
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
            return true;
        } catch (Exception $e) {
            log_message('error', 'Email gagal dikirim. Error: ' . $mail->ErrorInfo);
            return false;
        }
    }
}
