<?php
class Report_model extends CI_Model{
    public $table = 'tbl_prov_log';

   function data($date1,$date2){   
   
    $query = $this->db->query("select*from tbl_prov_log where created_date between '".$date1."' AND '".$date2."'");
    return $query->result();
  }
  

     // get all
    function get_all($date1,$date2)
    {
    $query = $this->db->query("select*from tbl_prov_log where created_date between '".$date1."' AND '".$date2."'");
    return $query->result();
    }

}
    
    