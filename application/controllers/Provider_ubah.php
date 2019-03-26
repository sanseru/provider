<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provider_ubah extends CI_Controller {
	function __construct(){
		parent::__construct();
 
		 $this->load->model('Provider_ubah_model');
		       $this->load->library("session");

	 }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = array(
			'ambil_info' => $this->Provider_ubah_model->Data(),

		);
		$this->load->view('elements/header');
		$this->load->view('provider_ubah/home',$data);
		$this->load->view('elements/footer');

	}

	public function update(){


		$id = $this->uri->segment(3);
		$this->Provider_ubah_model->update_status_rs($id);
	      $this->session->set_flashdata('success', 'Silahkan lakukan Update Provider Di aplikasi yang lama. Provider Ini sudah di active kan');

		redirect('Provider_ubah');
	
	}


}
