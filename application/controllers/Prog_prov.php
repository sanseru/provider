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
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('Prog_prov'));
        }
    
    

    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_samutdept', TRUE));
        } else {
            $data = array(
		'pihak_kepentingan' => $this->input->post('pihak_kepentingan',TRUE),
		'kbthn_hrpn' => $this->input->post('kbthn_hrpn',TRUE),
		'peluang_ancaman' => $this->input->post('peluang_ancaman',TRUE),
		'main_proses' => $this->input->post('main_proses',TRUE),
		'sub_proses' => $this->input->post('sub_proses',TRUE),
		'sub_sub_proses' => $this->input->post('sub_sub_proses',TRUE),
		'input' => $this->input->post('input',TRUE),
		'proses_pdca' => $this->input->post('proses_pdca',TRUE),
		'quality_assurance' => $this->input->post('quality_assurance',TRUE),
		'quality_control' => $this->input->post('quality_control',TRUE),
		'output' => $this->input->post('output',TRUE),
		'penerima_output' => $this->input->post('penerima_output',TRUE),
		'samut' => $this->input->post('samut',TRUE),
		'kpi' => $this->input->post('kpi',TRUE),
		'pic' => $this->input->post('pic',TRUE),
		'jan' => $this->input->post('jan',TRUE),
		'feb' => $this->input->post('feb',TRUE),
		'mar' => $this->input->post('mar',TRUE),
		'apr' => $this->input->post('apr',TRUE),
		'may' => $this->input->post('may',TRUE),
		'jun' => $this->input->post('jun',TRUE),
		'jul' => $this->input->post('jul',TRUE),
		'aug' => $this->input->post('aug',TRUE),
		'sep' => $this->input->post('sep',TRUE),
		'oct' => $this->input->post('oct',TRUE),
		'nov' => $this->input->post('nov',TRUE),
		'dec' => $this->input->post('dec',TRUE),
		'rata_rata' => $this->input->post('rata_rata',TRUE),
		'created_date' => $this->input->post('created_date',TRUE),
		'created_by' => $this->input->post('created_by',TRUE),
		'modify_date' => $this->input->post('modify_date',TRUE),
		'modify_by' => $this->input->post('modify_by',TRUE),
		'department' => $this->input->post('department',TRUE),
		'tahun_samut' => $this->input->post('tahun_samut',TRUE),
	    );

            $this->All_samut_model->update($this->input->post('id_samutdept', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('all_samut'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->All_samut_model->get_by_id($id);

        if ($row) {
            $this->All_samut_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('all_samut'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('all_samut'));
        }
    }

}
