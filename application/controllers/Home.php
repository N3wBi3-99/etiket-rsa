<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
  public function index()
  {
    $data = [
      'judul' => 'E-Tiket Obat',
      'rajal' => base_url('obat/Rawat_jalan'),
      'ranap' => base_url('obat/Rawat_inap'),
      'ugd' => base_url('obat/Ugd'),
      'isi'   => 'home/v_home'
    ];

    $this->load->view('template/v_wrapper', $data);
  }
}

  /* End of file Home.php */;
