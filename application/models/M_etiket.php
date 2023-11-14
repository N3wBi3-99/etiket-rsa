<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_etiket extends CI_Model
{
  function rawjal()
  {
    $this->db->select('*');
    $this->db->from('ADPA_RAWJAL');
    $this->db->where('MASUKI', date('Y-m-d'));
    $this->db->where('NOPERK', 'c04');
    return $this->db->get()->result_array();
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
