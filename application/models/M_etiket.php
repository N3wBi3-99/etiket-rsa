<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_etiket extends CI_Model
{
  function rawjal($kodepa = null)
  {
    $today = date('Y-m-d');
    // $today = '2023-05-20';
    if ($kodepa === null) {
      $this->db->select('ADPA_RAWJAL.MEDREC, ADPA_RAWJAL.NAMAPA, ADPA_RAWJAL.KODEPA, ADPA_MERMAS.TGLLAH');
      $this->db->from('ADPA_RAWJAL');
      $this->db->join('ADPA_MERMAS', 'ADPA_RAWJAL.MEDREC = ADPA_MERMAS.MEDREC');
      $this->db->where('ADPA_RAWJAL.MASUKI', $today);
      $this->db->where('ADPA_RAWJAL.NOPERK', 'C04');
      $this->db->order_by('ADPA_RAWJAL.JAMCAT', 'desc');
      return $this->db->get()->result();
    } else {
      $this->db->select('ADPA_RAWJAL.MEDREC, ADPA_RAWJAL.NAMAPA, ADPA_RAWJAL.KODEPA, ADPA_MERMAS.TGLLAH');
      $this->db->from('ADPA_RAWJAL');
      $this->db->join('ADPA_MERMAS', 'ADPA_RAWJAL.MEDREC = ADPA_MERMAS.MEDREC');
      $this->db->where('ADPA_RAWJAL.MASUKI', $today);
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
    // $this->db->where('NAMA_CATAT', 'Apotek');
    $this->db->where('NASUBK_TAGI', $kodepa);
    $this->db->group_by('NODOKU_MINTA, NODOKU');
    return $this->db->get()->result();
  }

  function rawjal_obat($kodepa)
  {
    $this->db->select('*');
    $this->db->from('BARASI1_APT');
    $this->db->where('KODE_TRANS', 'RJ');
    // $this->db->where('NAMA_CATAT', 'Apotek');
    $this->db->where('NASUBK_TAGI', $kodepa);
    return $this->db->get()->result();
  }

  // ini batas rawat jalan
  // ini ugd
  function ugd_rawjal($kodepa = null)
  {
    $today = date('Y-m-d');
    if ($kodepa === null) {
      $this->db->select('ADPA_RAWJAL.MEDREC, ADPA_RAWJAL.NAMAPA, ADPA_RAWJAL.KODEPA, ADPA_MERMAS.TGLLAH');
      $this->db->from('ADPA_RAWJAL');
      $this->db->join('ADPA_MERMAS', 'ADPA_RAWJAL.MEDREC = ADPA_MERMAS.MEDREC');
      $this->db->where('ADPA_RAWJAL.MASUKI', $today);
      $this->db->where('ADPA_RAWJAL.NOPERK', 'C04');
      $this->db->order_by('ADPA_RAWJAL.JAMCAT', 'desc');
      return $this->db->get()->result();
    } else {
      $this->db->select('ADPA_RAWJAL.MEDREC, ADPA_RAWJAL.NAMAPA, ADPA_RAWJAL.KODEPA, ADPA_MERMAS.TGLLAH');
      $this->db->from('ADPA_RAWJAL');
      $this->db->join('ADPA_MERMAS', 'ADPA_RAWJAL.MEDREC = ADPA_MERMAS.MEDREC');
      $this->db->where('ADPA_RAWJAL.MASUKI', $today);
      $this->db->where('ADPA_RAWJAL.NOPERK', 'C04');
      $this->db->where('ADPA_RAWJAL.KODEPA', $kodepa);
      $this->db->order_by('ADPA_RAWJAL.JAMCAT', 'desc');
      return $this->db->get()->row();
    }
  }

  function ugd_rawjal_dokter($kodepa)
  {
    $this->db->select('NODOKU, NODOKU_MINTA, COUNT(NASUBK_TAGI) AS KODEPA');
    $this->db->from('BARASI1_APT');
    $this->db->where('KODE_TRANS', 'RJ');
    $this->db->where('NAMA_CATAT', 'ugd');
    $this->db->where('NASUBK_TAGI', $kodepa);
    $this->db->group_by('NODOKU_MINTA, NODOKU');
    return $this->db->get()->result();
  }

  function ugd_obat($kodepa)
  {
    $this->db->select('*');
    $this->db->from('BARASI1_APT');
    $this->db->where('KODE_TRANS', 'RJ');
    $this->db->where('NAMA_CATAT', 'ugd');
    $this->db->where('NASUBK_TAGI', $kodepa);
    return $this->db->get()->result();
  }

  // ini batas ugd

  function rawina($kodepa = null)
  {
    $today = date('Y-m-d');
    if ($kodepa === null) {
      $this->db->select('ADPA_RAWINA.MEDREC, ADPA_RAWINA.NAMAPA, ADPA_RAWINA.KODEPA, ADPA_MERMAS.TGLLAH');
      $this->db->from('ADPA_RAWINA');
      $this->db->join('ADPA_MERMAS', 'ADPA_RAWINA.MEDREC = ADPA_MERMAS.MEDREC');
      $this->db->where("KODEPA IN (SELECT KODEPA FROM ADPA_KAINSI WHERE TGLCAT = '$today' AND KODPRO = 'C04')", NULL, FALSE);
      $this->db->order_by('ADPA_RAWINA.JAMCAT', 'desc');
      return $this->db->get()->result();
    } else {
      $this->db->select('ADPA_KAINSI.MEDREC, ADPA_KAINSI.NAMAPA, ADPA_KAINSI.KODEPA, ADPA_MERMAS.TGLLAH');
      $this->db->from('ADPA_KAINSI');
      $this->db->join('ADPA_MERMAS', 'ADPA_KAINSI.MEDREC = ADPA_MERMAS.MEDREC');
      $this->db->where('ADPA_KAINSI.TGLCAT', $today);
      $this->db->where('ADPA_KAINSI.KODPRO', 'C04');
      $this->db->where('ADPA_KAINSI.KODEPA', $kodepa);
      $this->db->order_by('ADPA_KAINSI.JAMCAT', 'desc');
      return $this->db->get()->row();
    }
  }

  function rawina_dokter($kodepa)
  {
    $this->db->select('NODOKU, NODOKU_MINTA, COUNT(NASUBK_TAGI) AS KODEPA');
    $this->db->from('BARASI1_APT');
    $this->db->where('KODE_TRANS', 'RI');
    $this->db->where('NAGUDA', 'Apotek RI 2');
    $this->db->where('NASUBK_TAGI', $kodepa);
    $this->db->group_by('NODOKU_MINTA, NODOKU');
    return $this->db->get()->result();
  }

  function rawina_obat($kodepa, $nodoku)
  {
    $this->db->select('*');
    $this->db->from('BARASI1_APT');
    $this->db->where('KODE_TRANS', 'RI');
    $this->db->where('NAGUDA', 'Apotek RI 2');
    $this->db->where('NASUBK_TAGI', $kodepa);
    $this->db->where('NODOKU', $nodoku);
    return $this->db->get()->result();
  }
}

  /* End of file Etiket.php */;
