<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whatsapp {

    public function __construct()
    {
        // Load library HTTP Request untuk mengirim permintaan HTTP
        $this->load->library('httprequest');
    }

    public function send_message($phone, $message)
    {
        // Format nomor telepon
        $phone = str_replace(['+', ' '], '', $phone);

        // Buat URL API WhatsApp dengan parameter nomor telepon dan pesan
        $url = "https://api.whatsapp.com/send?phone={$phone}&text=" . urlencode($message);

        // Kirim permintaan HTTP GET ke URL API WhatsApp
        $response = $this->httprequest->get($url);

        // Jika permintaan berhasil, kembalikan true
        return $response->success;
    }

}
