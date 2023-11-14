<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Coba extends CI_Controller
{     
  public function __construct(){

    parent::__construct();
    $this->load->helper('url');

    // Load model
    $this->load->model('M_coba');

  }

  public function index(){

    // load view
    $this->load->view('coba_v');
  }

  public function userList(){
    // POST data
    $postData = $this->input->post();

    // Get data
    $data = $this->M_coba->getUsers($postData);

    echo json_encode($data);
  }

}

  /* End of file Coba.php */;
