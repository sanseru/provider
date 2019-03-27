<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	function __construct(){
		parent::__construct();
 
		 $this->load->model('Report_model');
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
		$date1 	= $this->input->post('date1');
		$date2 	= $this->input->post('date2');
		$data 	= array(
			'ambil_info' => $this->Report_model->Data($date1,$date2),

		);
		$this->load->view('elements/header');
		$this->load->view('report/report',$data);
		$this->load->view('elements/footer');

	}

	// public function update(){


	// 	$id = $this->uri->segment(3);
	// 	$this->Provider_ubah_model->update_status_rs($id);
	//       $this->session->set_flashdata('success', 'Silahkan lakukan Update Provider Di aplikasi yang lama. Provider Ini sudah di active kan');

	// 	redirect('Provider_ubah');
	
	// }


}
