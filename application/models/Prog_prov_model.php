<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Prog_prov_model extends CI_Model{
    public $table = 'tbl_prov_log';
    public $id = 'id_log_prov';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_log_prov,id_stat,id_rumahsakit,nm_rs,notes,status,created_by_username, created_date');
        $this->datatables->from('tbl_prov_log');
		//add this line for join
		// $this->datatables->where('department', $this->session->userdata('id_users',TRUE));
        $this->datatables->join('tbl_prov_status', 'tbl_prov_log.id_stat = tbl_prov_status.id_status', 'left');
        // $this->datatables->join('tbl_user', 'tbl_prov_log.id_stat = tbl_prov_status.id_status', 'left');		
        //$this->datatables->join('table2', 'tbl_samutdep.field = table2.field');
        $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info btn-circle btn-xs" data-code="$1" data-stat="$2" data-idrs="$3" data-notes="$5"><i class="fas fa-edit"></i></a>  <a href="javascript:void(0);" class="delete_record btn btn-danger btn-circle btn-xs" data-code="$1"><i class="fas fa-trash"></i></a>','id_log_prov,id_stat,id_rumahsakit,nm_rs,notes');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function getAllGroups()
    {
        /*
        $query = $this->db->get('location');

        foreach ($query->result() as $row)
        {
            echo $row->description;
        }*/

        $query = $this->db->query('SELECT id_status,status FROM tbl_prov_status');


        return $query->result();

        //echo 'Total Results: ' . $query->num_rows();
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

    function getaday($id){
        // $id = '2019-02-19';
        $query = $this->db->query('SELECT * FROM tbl_prov_log where created_date like "'.$id.'%"');
        if($query->num_rows()>0)
        {
          return $query->num_rows();
        }
        else
        {
          return 0;
        }
    }

    function delete_log(){
        $product_code=$this->input->post('id_main');
        $this->db->where('id_log_prov',$product_code);
        $result=$this->db->delete('tbl_prov_log');
        return $result;
    }
}
