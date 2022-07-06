<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Counting extends CI_Controller {


	public function index()
	{
		$this->load->model('logbook_model');
		$data['terbanyak']=  $this->logbook_model->get_terbanyak();
		$data['page_title'] = "Top  100";
		$data['action'] = site_url('counting/show');
		$data['css'] = '';
        $this->load->view('layout/header', $data);
		$this->load->view('result/view_counting',$data);
		$this->load->view('layout/footer');
	}

	public function show(){
		
		$this->load->model('logbook_model');

		$var = $this->input->post('station');

		if($var=="0")
		{	$data['css'] = '';
			$data['terbanyak']=  $this->logbook_model->get_terbanyak();
			$data['page_title'] = "Top  World";
		    $data['action'] = site_url('counting/show');
			$this->load->view('layout/header', $data);
			$this->load->view('result/view_counting',$data);
			$this->load->view('layout/footer');
		}else{

			//echo $var;
			$data['css'] = '';
			$data['page_title'] = "Top  World";
		    $data['action'] = site_url('counting/show');
			$data['terbanyak']=  $this->logbook_model->get_terbayak_callsign($this->input->post('station'));
	        $this->load->view('layout/header', $data);
			$this->load->view('result/view_countyb',$data);
			$this->load->view('layout/footer');
		}


	}



}