<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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

        //dapatkan id member yang login
        $id_member = $this->session->userdata("id_member");

        //panggil model Mtransaksi dan fungsi transaksi_member_beli(id_member yang login)
        $this->load->model("Mtransaksi");
        $data['transaksi'] = $this->Mtransaksi->transaksi_member_beli($id_member);

        $this->load->view('header');
        $this->load->view('transaksi_tampil', $data);
        $this->load->view('footer');
    }

    function detail($id_transaksi)
    {

        //panggil model Mtransaksi
        $this->load->model("Mtransaksi");

        //panngil fungsi detail di model
        $data['transaksi'] = $this->Mtransaksi->detail($id_transaksi);

        if ($data["transaksi"]["id_member_beli"] !== $this->session->userdata("id_member")) {
            $this->session->set_flashdata('pesan_gagal', 'Anda tidak berhak mengakses halaman ini');
            redirect('transaksi', 'refresh');
        }

        //panggil fungsi transaksi_detail di model
        $data['transaksi_detail'] = $this->Mtransaksi->transaksi_detail($id_transaksi);
        $snapToken = "";
        $data["cekmidtrans"] = array();
        if ($data['transaksi']['status_transaksi'] == "pesan") {

            include 'midtrans-php/Midtrans.php';

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = 'SB-Mid-server-Wn_laYT5to4xrK6tR2BDFIhk';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => 10000,
                )
            );

            $params['transaction_details']['order_id'] = $data["transaksi"]["kode_transaksi"];
            $params['transaction_details']['gross_amount'] = $data["transaksi"]["total_transaksi"];

            try {
                $snapToken = \Midtrans\Snap::getSnapToken($params);
            } catch (Exception $e) {
            }

            $data['snapToken'] = $snapToken;


            //cek ke midtrans apakah transaksi sudah dibayar
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.sandbox.midtrans.com/v2/" . $data["transaksi"]["kode_transaksi"] . "/status",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "accept: application/json",
                    "Authorization: Basic U0ItTWlkLXNlcnZlci1Xbl9sYVlUNXRvNHhySzZ0UjJCREZJaGs6"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                // echo $response;
                $responsi = json_decode($response, true);
                if (isset($responsi['status_code']) && in_array($responsi['status_code'], [200, 201])) {
                    // jika status_code 201, berarti transaksi sudah dibayar
                    $data["cekmidtrans"] = $responsi;

                    if ($responsi['transaction_status'] == 'settlement') {
                        // jika status transaksi settlement, update status transaksi di database
                        $this->Mtransaksi->set_lunas($id_transaksi);
                        redirect('transaksi/detail/' . $id_transaksi, 'refresh');
                    }
                }
            }
        }

        if ($this->input->post()) {
            $this->Mtransaksi->kirim_rating($this->input->post());
            $this->session->set_flashdata('pesan_sukses', 'Ulasan telah terkirim');
            redirect('transaksi/detail/' . $id_transaksi, 'refresh');
        }



        $this->load->view('header');
        $this->load->view('transaksi_detail', $data);
        $this->load->view('footer');
    }
}
