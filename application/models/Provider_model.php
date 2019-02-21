<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Provider_model extends CI_Model{

    public $table = 'provider';
    public $id = 'provider_id';
    function json() {
        $this->datatables->select('provider.provider_id,provider.provider_name,subscription_status.status,provider_category.provider_category_name');
        $this->datatables->from('provider');
		//add this line for join
		// $this->datatables->where('department', $this->session->userdata('id_users',TRUE));
        $this->datatables->join('provider_category', 'provider.provider_category_id = provider_category.provider_category_id', 'left');
        $this->datatables->join('subscription_status', 'provider.status_id = subscription_status.status_id', 'left');
		$this->datatables->where('provider.deleted_status !=', 1);
        // $this->datatables->join('tbl_user', 'tbl_prov_log.id_stat = tbl_prov_status.id_status', 'left');		
        //$this->datatables->join('table2', 'tbl_samutdep.field = table2.field');
        // $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-circle btn-xs" data-code="$1" data-stat="$2" data-idrs="$3" data-notes="$5"><i class="fas fa-edit"></i></a>  <a href="javascript:void(0);" class="delete_record btn btn-danger btn-circle btn-xs" data-code="$1"><i class="fas fa-trash"></i></a>','id_log_prov,id_stat,id_rumahsakit,nm_rs,notes');
        return $this->datatables->generate();
    }

    function getSubscriptionStatus()
    {
        /*
        $query = $this->db->get('location');

        foreach ($query->result() as $row)
        {
            echo $row->description;
        }*/

        $query = $this->db->query('SELECT status_id,status FROM subscription_status;');


        return $query->result();

        //echo 'Total Results: ' . $query->num_rows();
    }

    function Providercategory()
    {
        /*
        $query = $this->db->get('location');

        foreach ($query->result() as $row)
        {
            echo $row->description;
        }*/

        $query = $this->db->query('SELECT provider_category_id, provider_category_code FROM provider_category;');


        return $query->result();

        //echo 'Total Results: ' . $query->num_rows();
    }

    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
}


