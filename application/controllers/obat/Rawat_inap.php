<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rawat_inap extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    // date_default_timezone_set("Asia/Jakarta");
    $this->load->model('M_etiket');
  }

  public function index()
  {
    $rawina = $this->M_etiket->rawina();
    $data = [
      'judul' => 'E-Tiket Obat',
      'rawina' => $rawina,
      'js' => '<script src="' . base_url() . 'assets/script/rawina.js"></script>',
      'ugd' => base_url('obat/Ugd'),
      'rajal' => base_url('obat/Rawat_jalan'),
      'ranap' => base_url('obat/Rawat_inap'),
      'isi' => 'etiket/v_rawat_inap',
    ];

    $this->load->view('template/v_wrapper', $data);
  }

  public function rawina_data()
  {
    $id = $this->input->get('id');
    if ($id === null) {
      $rawina = $this->M_etiket->rawina();
      $data = array();
      $no = @$_POST['start'];
      foreach ($rawina as $ri) {
        $tambahan = $this->M_etiket->rawina_dokter($ri->KODEPA);
        foreach ($tambahan as $t) {
          $no++;
          $row = array();
          $row[] = $no . ".";
          $row[] = $ri->MEDREC;
          $row[] = $t->NODOKU;
          $row[] = $ri->NAMAPA;
          $row[] = date('d-m-Y', strtotime($ri->TGLLAH));
          $row[] = $t->NODOKU_MINTA;
          $row[] = '<a href="javascript:;" class="btn btn-primary btn-sm lihat" data-toggle="tooltip" title="Lihat Obat" data-obat="' . $t->NODOKU . '" data="' . $ri->KODEPA . '"> <i class="fas fa-book-medical"></i></a> 
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
      $obat = $this->M_etiket->rawina($id);
      echo json_encode($obat);
    }
  }

  public function getObat()
  {
    $id = $this->input->post('id');
    $nodoku = $this->input->post('nodoku');
    $obat = $this->M_etiket->rawina_obat($id, $nodoku);
    $data = array();
    $no = @$_POST['start'];
    foreach ($obat as $o) {
      $no++;
      $row = array();
      $row[] = '<div class="custom-checkbox custom-control">
                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-' . $no . '">
                <label for="checkbox-' . $no . '" class="custom-control-label">&nbsp;</label>
                </div>';
      $row[] = $o->NABARA;
      $row[] = '<select class="form-control select2" name="aturan">
                  <option>- Pilih salah satu -</option>
                  <option value="1">Ambulans</option>
                  <option value="2">Mobil</option>
                  <option value="3">Motor</option>
                  <option value="4">Lain - Lain</option>
                </select>';
      $row[] = '<select class="form-control select2bs4" name="waktu">
                  <option>- Pilih salah satu -</option>
                  <option value="Sebelum Makan">Sebelum Makan</option>
                  <option value="Setelah Makan">Setelah Makan</option>
                </select>';
      $row[] = '<input type="text" name="keterangan" class="form-control" value="">';
      $row[] = '<a href="javascript:;" class="btn btn-primary btn-sm lihat" data-toggle="tooltip" title="Lihat Obat" data="' . $o->NABARA . '"> <i class="fas fa-book-medical"></i></a> 
        ';
      $data[] = $row;
    }
    $output = [
      "draw" => @$_POST['draw'],
      "data" => $data,
    ];
    echo json_encode($output);
  }
}

  /* End of file Rawat_inap.php */;
