<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provider extends CI_Controller {

		function __construct(){
        parent::__construct();		
        if($this->session->userdata("nama")=== NULL){
            $url=site_url('Auth');
            redirect($url);
        }
		$this->load->model('Provider_model');
		}

        public function index()
        {
            $data['sub'] = $this->Provider_model->getSubscriptionStatus();
            $data['provs'] = $this->Provider_model->Providercategory();

            $this->load->view('elements/header');
            $this->load->view('Provider/provider_list',$data);
            $this->load->view('elements/footer');
        }

        public function json() {
            header('Content-Type: application/json');
            echo $this->Provider_model->json();
        }

        public function create_action() 
        {
            date_default_timezone_set('Asia/Jakarta');
            $now = date('y-m-d H:i:s');
            // $id_prov = $this->input->post('provider');
            // $nm_rumahsakit['info'] = $this->Prog_prov_model->getNmProviders($id_prov);
                $data = array(
            'status_id' => $this->input->post('status',TRUE),
            'provider_category_id' => $this->input->post('provider_category',TRUE),
            'provider_name' => $this->input->post('nm_provider',TRUE),
            'telephone' => $this->input->post('contact',TRUE),
            'longitude' => $this->input->post('longitude',TRUE),
            'latitude' => $this->input->post('latitude',TRUE),
            'address' => $this->input->post('alamat',TRUE),
            'deleted_status' => 1,
            'created_time' => $now,
            'created_by' => $this->session->userdata('user_id'),
            // 'created_by_username' => $this->session->userdata('nama'),
            );
            // var_dump($nm_rumahsakit);
                $this->Provider_model->insert($data);
                // $this->session->set_flashdata('message', 'Create Record Success 2');
                redirect(site_url('Provider'));
        }
    }
?>