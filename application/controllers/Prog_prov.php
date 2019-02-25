<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prog_prov extends CI_Controller {

    function __construct()
    {
		parent::__construct();
		// $this->load->library('datatables');
		if($this->session->userdata("nama")=== NULL){
            $url=site_url('Auth');
            redirect($url);
        }
        $this->load->model('Prog_prov_model');
    }

	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$now = date('Y-m-d');
		$data['countaday'] = $this->Prog_prov_model->getaday($now);
		$coba = $this->Prog_prov_model->getaday($now);
		$data['groups'] = $this->Prog_prov_model->getAllGroups();
		$data['provs'] = $this->Prog_prov_model->getAllProviders();
		$this->load->view('elements/header');
		$this->load->view('prog_prov/prog_prov_list',$data);
		$this->load->view('elements/footer');
		// var_dump($data['countaday']);

    }
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Prog_prov_model->json();
    }



    
    public function create_action() 
    {
		date_default_timezone_set('Asia/Jakarta');
        $now = date('y-m-d H:i:s');
		$id_prov = $this->input->post('provider');
		$nm_rumahsakit['info'] = $this->Prog_prov_model->getNmProviders($id_prov);
            $data = array(
		'id_stat' => $this->input->post('status',TRUE),
		'id_rumahsakit' => $this->input->post('provider',TRUE),
		'notes' => $this->input->post('catatan',TRUE),
		'nm_rs' => $nm_rumahsakit['info'],
		'created_date' => $now,
		'created_by' => $this->session->userdata('user_id'),
		'created_by_username' => $this->session->userdata('nama'),
	    );
		// var_dump($nm_rumahsakit);
            $this->Prog_prov_model->insert($data);
            redirect(site_url('Prog_prov'));
        }
    
    

    
    public function update_action() 
    {
		date_default_timezone_set('Asia/Jakarta');
        $now = date('y-m-d H:i:s');
		$id_prov = $this->input->post('provider');
		$nm_rumahsakit['info'] = $this->Prog_prov_model->getNmProviders($id_prov);
		$id = $this->input->post('id_main',TRUE);
            $data = array(
		'id_stat' => $this->input->post('status',TRUE),
		'id_rumahsakit' => $this->input->post('provider',TRUE),
		'notes' => $this->input->post('catatan',TRUE),
		'nm_rs' => $nm_rumahsakit['info'],
		'modify_date' => $now,
		'modify_by' => $this->session->userdata('user_id'),
	    );

		$this->Prog_prov_model->update($id,$data);
		redirect(site_url('Prog_prov'));
        }
    
    
    function delete() //delete record method
    {
        $this->Prog_prov_model->delete_log();
        redirect('Prog_prov');
    }

}
