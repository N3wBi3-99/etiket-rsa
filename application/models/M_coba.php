<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_coba extends CI_Model { 
  function getUsers($postData){
       $response = array();
       if(isset($postData['search']) ){
         // Select record
         $this->db->select('TOP (10) *');
         $this->db->where("code like '%".$postData['search']."%' ");
         $this->db->or_where("name_en like '%".$postData['search']."%' ");
         $records = $this->db->get('PKU.dbo.icds')->result();
         foreach($records as $row ){
            $response[] = array(
              "value"=>$row->code,
              "label"=>$row->name_en);
         }
       }
  
       return $response;
    }

}

/* End of file Coba_model.php */
;
?>