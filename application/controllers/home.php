<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){

        parent::__construct();

    }

	public function index()
	{

		$this->load->model('logbook_model');

		$data['page_title'] = "Home";
		$data['css'] = 'index.css';

		$data['rangking'] = $this->logbook_model->rangking();
		$data['callrangking'] = $this->logbook_model->get_sepuluh_terbaik();
		$data['operator'] =  $this->logbook_model->get_all_operator();

		$this->load->view('layout/header',$data);
		$this->load->view('home/index2',$data);
		$this->load->view('layout/footer');
		
	}

	public function rules()
	{

		$this->load->model('logbook_model');

		$data['page_title'] = "Rules";
		$data['css'] = '';

		$data['rangking'] = $this->logbook_model->rangking();
		$data['callrangking'] = $this->logbook_model->get_sepuluh_terbaik();
		$data['operator'] =  $this->logbook_model->get_all_operator();

		$this->load->view('layout/header',$data);
		$this->load->view('home/index',$data);
		$this->load->view('layout/footer');
	}

	public function station_summary()
	{

		$this->load->model('logbook_model');

		$data['page_title'] = "Station Summary";
		$data['css'] = '';

		
		$data['Total_negara'] =  $this->logbook_model->get_total_negara_peserta();
		$data['Total_station'] =  $this->logbook_model->get_total_station();
		$data['Total_award'] =  $this->logbook_model->get_total_award();


		$data['station'] =  $this->logbook_model->get_all_station();

		$this->load->view('layout/header',$data);
		$this->load->view('home/station',$data);
		$this->load->view('layout/footer');

	}

	public function station_summary_detail($station)
	{

		$this->load->model('logbook_model');

		$data['page_title'] = "Home";
		$data['css'] = '';

		/*$data['rangking'] = $this->logbook_model->rangking();
		$data['callrangking'] = $this->logbook_model->get_sepuluh_terbaik();*/
		$data['results'] =  $this->logbook_model->get_all_by_callstation($station);

		$this->load->view('layout/header',$data);
		$this->load->view('home/station_detail',$data);
		$this->load->view('layout/footer');

	}

	public function award_summary()
	{

		$this->load->model('logbook_model');

		$data['page_title'] = "Station Summary";
		$data['css'] = '';

		/*$data['rangking'] = $this->logbook_model->rangking();
		$data['callrangking'] = $this->logbook_model->get_sepuluh_terbaik();*/
		$data['award'] =  $this->logbook_model->get_award_summary();

		$this->load->view('layout/header',$data);
		$this->load->view('home/award_summary',$data);
		$this->load->view('layout/footer');

	}

	public function award_summary_detail($station)
	{

		$this->load->model('logbook_model');

		$data['page_title'] = "Home";
		$data['css'] = '';

		/*$data['rangking'] = $this->logbook_model->rangking();
		$data['callrangking'] = $this->logbook_model->get_sepuluh_terbaik();*/
		$data['award_detail'] =  $this->logbook_model->get_award_summary_detail($station);

		$this->load->view('layout/header',$data);
		$this->load->view('home/award_summary_detail',$data);
		$this->load->view('layout/footer');

	}

	public function award_list()
	{

		$this->load->model('logbook_model');

		$data['page_title'] = "Home";
		$data['css'] = '';

		$data['award_list'] =  $this->logbook_model->get_award_list();

		$this->load->view('layout/header',$data);
		$this->load->view('home/award_list',$data);
		$this->load->view('layout/footer');

	}

	public function detail_country()
	{
		$this->load->model('logbook_model');

		$data['page_title'] = "Detail Country";
		$data['css'] = '';

		
		$data['country'] =  $this->logbook_model->get_negara_peserta();



	

		$this->load->view('layout/header',$data);
		$this->load->view('home/detail_country',$data);
		$this->load->view('layout/footer');
	}

}