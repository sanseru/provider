<?php
class Welcome_model extends CI_Model{

   function data(){   
   
    $query = $this->db->query('SELECT c1.*
    FROM tbl_prov_log c1 LEFT JOIN tbl_prov_log c2
     ON (c1.id_rumahsakit = c2.id_rumahsakit AND c1.created_date > c2.created_date)
    WHERE c2.id_rumahsakit IS NULL AND c1.status_rs = 0 OR c1.status_rs IS NULL group by c1.id_rumahsakit');
    return $query->result();
  }
  
  function history($id){   
    $this->db->select('tbl_prov_log.id_log_prov, tbl_prov_status.status, tbl_prov_log.nm_rs, provider.provider_name,tbl_prov_log.notes,tbl_prov_log.created_by_username,tbl_prov_log.created_date');
    $this->db->where('id_rumahsakit', $id);
    $this->db->join('tbl_prov_status', 'tbl_prov_status.id_status = tbl_prov_log.id_stat', 'left');
    $this->db->join('provider', 'provider.provider_id = tbl_prov_log.id_rumahsakit', 'left');
    $this->db->order_by('created_date', "DESC");
    return $this->db->get('tbl_prov_log')->result();
  }

  function update_status_rs($id){
    date_default_timezone_set('Asia/Jakarta');
    $now = date('y-m-d H:i:s');
    // $id = 
    $data=array(
'status_rs'        => 1,
);
$this->db->where('id_rumahsakit',$id);
$result=$this->db->update('tbl_prov_log', $data);
return $result;
}

function getprov(){
  // $id = '2019-02-19';
  $query = $this->db->query('select*from provider where deleted_status != 1');
  if($query->num_rows()>0)
  {
    return $query->num_rows();
  }
  else
  {
    return 0;
  }
}

function getprov_active(){
  // $id = '2019-02-19';
  $query = $this->db->query('select*from provider where deleted_status != 1 AND status_id = 1');
  if($query->num_rows()>0)
  {
    return $query->num_rows();
  }
  else
  {
    return 0;
  }
}

}
    
    