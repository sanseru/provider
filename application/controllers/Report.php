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
		$date4 	= $this->input->post('date1');
		$date5 	= $this->input->post('date2');
		$date1 =  date("Y-m-d H:i:s", strtotime($date4 . '00:00:00'));
		$date2 =  date("Y-m-d H:i:s", strtotime($date5 . '23:59:59'));

		$data 	= array(
			'ambil_info' => $this->Report_model->Data($date1,$date2),
			'date1' => $date4,
			'date2' => $date5,
		);
		$this->load->view('elements/header');
		$this->load->view('report/report',$data);
		$this->load->view('elements/footer');

	}

function excel()
  {
     $this->load->helper('exportexcel');
     $date4 = $this->uri->segment(3); // 1stsegment
	 $date5 =$this->uri->segment(4); // 2ndsegment

	 $date1 =  date("Y-m-d H:i:s", strtotime($date4 . '00:00:00'));
	 $date2 =  date("Y-m-d H:i:s", strtotime($date5 . '23:59:59'));

        $namaFile = "Report Provider.xlsx";
        $judul = "tbl_client";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        // header("Pragma: public");
        // header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-type: application/vnd-ms-excel");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Rumah Sakit");
    xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
    xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Pembuatan");
    xlsWriteLabel($tablehead, $kolomhead++, " Di Buat Oleh");


    foreach ($this->Report_model->get_all($date1,$date2) as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->nm_rs);
        xlsWriteLabel($tablebody, $kolombody++, $data->notes);
        xlsWriteLabel($tablebody, $kolombody++, $data->created_date);
        xlsWriteLabel($tablebody, $kolombody++, $data->created_by_username);

        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

  


}
