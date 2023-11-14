<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rawat_jalan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
    $this->load->model('M_etiket');
  }

  public function index()
  {
    $rawjal = $this->M_etiket->rawjal();
    echo "<pre>";
    print_r($rawjal);
    exit;

    $data = [
      'judul' => 'E-Tiket Obat',
      'rawjal' => $rawjal,
      'ajax' => '<script src="' . base_url() . 'assets/script/rawjal.js"></script>',
      'rajal' => base_url('obat/Rawat_jalan'),
      'ranap' => base_url('obat/Rawat_inap'),
      'isi' => 'etiket/v_rawat_jalan',
    ];

    $this->load->view('template/v_wrapper', $data);
  }

  function rawjal_data()
  {
    $id = $this->input->get('id');
    if ($id === null) {
      $rawjal = $this->M_etiket->rawjal();
      $data = array();
      $no = @$_POST['start'];
      foreach ($rawjal as $rj) {
        $no++;
        $row = array();
        $row[] = $no . ".";
        $row[] = $rj->MASUKI;
        $row[] = $rj->MEDREC;
        $row[] = $rj->dosenEmail;
        $row[] = $rj->dosenNohp;
        $row[] = $rj->dosenAlamat;
        $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm item_edit" title="Edit" data="' . $rj->dosenId . '"> <i class="fas fa-edit"></i></a> 
        <a href="javascript:;" class="btn btn-info btn-sm reset_password" title="Reset Password" data="' . $rj->dosenId . '"> <i class="fas fa-key"></i></a> 
        <a href="javascript:;" class="btn btn-danger btn-sm item_hapus" title="Delete" data="' . $rj->dosenId . '"> <i class="fas fa-trash"></i></a>';

        $data[] = $row;
      }
      $output = [
        "draw" => @$_POST['draw'],
        "data" => $data,
      ];
      echo json_encode($output);
    } else {
      $dosen = $this->Dosen_m->list($id);
      echo json_encode($dosen);
    }
  }
}

  /* End of file Rawat_jalan.php */;
