<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_etiket extends CI_Model
{
  function rawjal($kodepa = null)
  {
    if ($kodepa === null) {
      $this->db->select('ADPA_RAWJAL.MEDREC, ADPA_RAWJAL.NAMAPA, ADPA_RAWJAL.KODEPA, ADPA_MERMAS.TGLLAH');
      $this->db->from('ADPA_RAWJAL');
      $this->db->join('ADPA_MERMAS', 'ADPA_RAWJAL.MEDREC = ADPA_MERMAS.MEDREC');
      $this->db->where('ADPA_RAWJAL.MASUKI', '2023-05-20');
      $this->db->where('ADPA_RAWJAL.NOPERK', 'C04');
      $this->db->order_by('ADPA_RAWJAL.JAMCAT', 'desc');
      return $this->db->get()->result();
    } else {
      $this->db->select('ADPA_RAWJAL.MEDREC, ADPA_RAWJAL.NAMAPA, ADPA_RAWJAL.KODEPA, ADPA_MERMAS.TGLLAH');
      $this->db->from('ADPA_RAWJAL');
      $this->db->join('ADPA_MERMAS', 'ADPA_RAWJAL.MEDREC = ADPA_MERMAS.MEDREC');
      $this->db->where('ADPA_RAWJAL.MASUKI', '2023-05-20');
      $this->db->where('ADPA_RAWJAL.NOPERK', 'C04');
      $this->db->where('ADPA_RAWJAL.KODEPA', $kodepa);
      $this->db->order_by('ADPA_RAWJAL.JAMCAT', 'desc');
      return $this->db->get()->row();
    }
  }

  function rawjal_dokter($kodepa)
  {
    $this->db->select('NODOKU, NODOKU_MINTA, COUNT(NASUBK_TAGI) AS KODEPA');
    $this->db->from('BARASI1_APT');
    $this->db->where('KODE_TRANS', 'RJ');
    $this->db->where('NASUBK_TAGI', $kodepa);
    $this->db->group_by('NODOKU_MINTA, NODOKU');
    return $this->db->get()->result();
  }

  function rawjal_obat($kodepa)
  {
    $this->db->select('*');
    $this->db->from('BARASI1_APT');
    $this->db->where('KODE_TRANS', 'RJ');
    $this->db->where('NASUBK_TAGI', $kodepa);
    return $this->db->get()->result();
  }

  function rawina()
  {
    $this->db->select('*');
    $this->db->from('ADPA_RAWJAL');
    $this->db->where('MASUKI', date('Y-m-d'));
    $this->db->where('NOPERK', 'c04');
    return $this->db->get()->result_array();
  }
}

  /* End of file Etiket.php */;
