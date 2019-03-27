<?php
class Report_model extends CI_Model{

   function data($date1,$date2){   
   
    $query = $this->db->query('select*from tbl_prov_log where created_date between "$date1" AND "$date2" ');
    return $query->result();
  }
  
  function update_status_rs($id){
    date_default_timezone_set('Asia/Jakarta');
    $now = date('y-m-d H:i:s');
    // $id = 
    $data=array(
    'deleted_status'        => 0,
    'modified_time'         => $now,
    );
    $this->db->where('provider_id',$id);
    $result=$this->db->update('provider', $data);
    return $result;
    }


}
    
    