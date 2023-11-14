<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rawat_inap extends CI_Controller
{

  public function index()
  {
    $data = [
      'judul' => 'E-Tiket Obat',
      'rajal' => base_url('obat/Rawat_jalan'),
      'ranap' => base_url('obat/Rawat_inap'),
      'isi' => 'etiket/v_rawat_inap',
    ];

    $this->load->view('template/v_wrapper', $data);
  }
}

  /* End of file Rawat_inap.php */;
