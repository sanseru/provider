<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
 
		 $this->load->model('Welcome_model');
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
			'ambil_info' => $this->Welcome_model->Data(),
		);
		$this->load->view('elements/header');
		$this->load->view('main/utama',$data);
		$this->load->view('elements/footer');

	}

	public function update(){


		$id = $this->uri->segment(3);
		$this->Welcome_model->update_status_rs($id);
	
		redirect('Welcome');
	
	}

	public function history(){


		$id = $this->uri->segment(3);
		$data = array(
			'ambil_info' => $this->Welcome_model->history($id),
		);
		$this->load->view('elements/header');
		$this->load->view('main/history_prov',$data);
		$this->load->view('elements/footer');
	}
}
