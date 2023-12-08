<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rawat_jalan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // date_default_timezone_set("Asia/Jakarta");
    $this->load->model('M_etiket');
  }

  public function index()
  {
    $rawjal = $this->M_etiket->rawjal();
    $data = [
      'judul' => 'E-Tiket Obat',
      'rawjal' => $rawjal,
      'js' => '<script src="' . base_url() . 'assets/script/rawjal.js"></script>',
      'rajal' => base_url('obat/Rawat_jalan'),
      'ranap' => base_url('obat/Rawat_inap'),
      'isi' => 'etiket/v_rawat_jalan',
    ];

    $this->load->view('template/v_wrapper', $data);
  }

  public function rawjal_data()
  {
    $id = $this->input->get('id');
    if ($id === null) {
      $rawjal = $this->M_etiket->rawjal();
      $data = array();
      $no = @$_POST['start'];
      foreach ($rawjal as $rj) {
        $tambahan = $this->M_etiket->rawjal_dokter($rj->KODEPA);
        foreach ($tambahan as $t) {
          $no++;
          $row = array();
          $row[] = $no . ".";
          $row[] = $rj->MEDREC;
          $row[] = $t->NODOKU;
          $row[] = $rj->NAMAPA;
          $row[] = date('d-m-Y', strtotime($rj->TGLLAH));
          $row[] = $t->NODOKU_MINTA;
          $row[] = '<a href="javascript:;" class="btn btn-primary btn-md lihat" data-toggle="tooltip" title="Lihat Obat" data="' . $rj->KODEPA . '"> <i class="fas fa-book-medical"></i></a> 
        ';

          $data[] = $row;
        }
      }
      $output = [
        "draw" => @$_POST['draw'],
        "data" => $data,
      ];
      echo json_encode($output);
    } else {
      $obat = $this->M_etiket->rawjal($id);
      echo json_encode($obat);
    }
  }

  public function getObat()
  {
    $id = $this->input->get('id');
    $pasien = $this->M_etiket->rawjal($id);
    $obat = $this->M_etiket->rawjal_obat($id);
    $data = array();
    $no = @$_POST['start'];
    foreach ($obat as $o) {
      $no++;
      $row = array();
      $row[] = $no . ".";
      $row[] = $o->NABARA;
      $row[] = $o->NABARA;
      $row[] = $o->NABARA;
      $row[] = $o->NABARA;
      $row[] = '<a href="javascript:;" class="btn btn-primary btn-md lihat" data-toggle="tooltip" title="Lihat Obat" data="' . $o->NABARA . '"> <i class="fas fa-book-medical"></i></a> 
        ';
      $data[] = $row;
    }
    $output = [
      "draw" => @$_POST['draw'],
      "data" => $data,
      "pasien" => $pasien,
    ];
    echo json_encode($output);
  }
}

  /* End of file Rawat_jalan.php */;
