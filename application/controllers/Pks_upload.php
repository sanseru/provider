<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pks_upload extends CI_Controller {

		function __construct(){
        parent::__construct();	
        if($this->session->userdata("nama")=== NULL){
            $url=site_url('Auth');
            redirect($url);
        }	
		$this->load->model('Pks_upload_model');
		}

        public function index()
        {
            $data['provs'] = $this->Pks_upload_model->getAllProviders();

            $this->load->view('elements/header');
            $this->load->view('pks_upload/pks_upload',$data);
            $this->load->view('elements/footer');
        }

        public function json() {
            header('Content-Type: application/json');
            echo $this->Pks_upload_model->json();
        }

        public function create_action() 
        {
            $insert_e = $this->Pks_upload_model->insert();

                // $this->Provider_model->insert($data);
                // $this->session->set_flashdata('message', 'Create Record Success 2');
                redirect(site_url('Pks_upload'));
        }
    }
?>