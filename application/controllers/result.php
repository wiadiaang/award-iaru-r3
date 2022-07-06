<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Result extends CI_Controller {

	public function index()
	{
		$this->load->model('logbook_model');
		$data['dataqso'] = $this->logbook_model->get_results();
		
		$qso = $this->logbook_model->get_result_total();



  
         $data['YB0'] = $qso->yb0;
         $data['YB1'] = $qso->yb1;
         $data['YB2'] = $qso->yb2;
         $data['YB3'] = $qso->yb3;
         $data['YB4'] = $qso->yb4;
         $data['YB5'] = $qso->yb5;
         $data['YB6'] = $qso->yb6;
         $data['YB7'] = $qso->yb7;
         $data['YB8'] = $qso->yb8;
         $data['YB9'] = $qso->yb9;
         $data['total'] = $qso->TOTAL;


	  
	    $this->load->view('layout/header');
		$this->load->view('result/ViewResult',$data);
		$this->load->view('layout/footer');
	}
}