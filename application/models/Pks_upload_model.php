<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pks_upload_model extends CI_Model{

    public $_table = 'pks_provider';
    public $id = 'provider_id';
    function json() {
        $this->datatables->select('id_pks,id_provider,nm_provider,file_pks');
        $this->datatables->from('pks_provider');
		//add this line for join
		// $this->datatables->where('department', $this->session->userdata('id_users',TRUE));
        // $this->datatables->join('provider_category', 'provider.provider_category_id = provider_category.provider_category_id', 'left');
        // $this->datatables->join('subscription_status', 'provider.status_id = subscription_status.status_id', 'left');
		// $this->datatables->where('provider.deleted_status !=', 1);
        // $this->datatables->join('tbl_user', 'tbl_prov_log.id_stat = tbl_prov_status.id_status', 'left');		
        //$this->datatables->join('table2', 'tbl_samutdep.field = table2.field');
        // $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-circle btn-xs" data-code="$1" data-stat="$2" data-idrs="$3" data-notes="$5"><i class="fas fa-edit"></i></a>  <a href="javascript:void(0);" class="delete_record btn btn-danger btn-circle btn-xs" data-code="$1"><i class="fas fa-trash"></i></a>','id_log_prov,id_stat,id_rumahsakit,nm_rs,notes');
        return $this->datatables->generate();
    }

    function getAllProviders()
    {
        /*
        $query = $this->db->get('location');

        foreach ($query->result() as $row)
        {
            echo $row->description;
        }*/

        $query = $this->db->query('SELECT provider_id,provider_name FROM provider');


        return $query->result();

        //echo 'Total Results: ' . $query->num_rows();
    }

    function insert()
    {
        // $this->db->insert($this->table, $data);
        // $post = $this->input->post();
        // $this->pks_id = uniqid();
        // $this->id_provider = $post["provider"];
		// $this->nm_provider = $this->getNmProviders($post["provider"]);
		// $this->file_pks = $this->_uploadPks();
        // $this->db->insert($this->_table, $this);

        $data=array(
            'id_provider'        => $this->input->post('provider'),
            'nm_provider'        => $this->getNmProviders($this->input->post('provider')),
            'file_pks'            => $this->_uploadPks(),

          );

          $result=$this->db->insert('pks_provider', $data);
          return $result;
    }

    private function _uploadPks()
{
    $config['upload_path']          = FCPATH.'./upload/';
    $config['allowed_types']        = 'pdf';
    $config['file_name']            = uniqid();
    $config['overwrite']			= true;
    $config['max_size']             = 10024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('pks')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
}

function getNmProviders($id)
{
    /*
    $query = $this->db->get('location');

    foreach ($query->result() as $row)
    {
        echo $row->description;
    }*/

    $query = $this->db->query('SELECT provider_name FROM provider where provider_id ='.$id);
    $ret = $query->row();
    return $ret->provider_name;

    //echo 'Total Results: ' . $query->num_rows();
}
}


