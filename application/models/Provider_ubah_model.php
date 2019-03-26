<?php
class Provider_ubah_Model extends CI_Model{

   function data(){   
   
    $query = $this->db->query('select*from provider where deleted_status = 1');
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
    
    