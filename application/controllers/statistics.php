<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistics extends CI_Controller {


	public function index()
	{
        $this->load->model('user_model');
        if(!$this->user_model->authorize($this->config->item('auth_mode'))) {
            if($this->user_model->validate_session()) {
                $this->user_model->clear_session();
                show_error('Access denied<p>Click <a href="'.site_url('user/login').'">here</a> to log in as another user', 403);
            } else {
                redirect('user/login');
            }
		}
				// Database connections
				$this->load->model('logbook_model');

		if($this->session->userdata('user_type') == '3') {

			$data['todays_qsos'] = $this->logbook_model->todays_qsos_byuser();
			$data['total_qsos'] = $this->logbook_model->total_qsos_user();
			$data['month_qsos'] = $this->logbook_model->month_qsos_by_user(); 
			$data['total_ssb'] = $this->logbook_model->total_ssb_bu_user();
			$data['total_cw'] = $this->logbook_model->total_cw_by_user();
			$data['totals_year'] = $this->logbook_model->totals_year_by_user();
			$data['total_bands'] = $this->logbook_model->total_bands_by_user();
			$data['total_fm'] = $this->logbook_model->total_fm_by_user();
			$data['total_digi'] = $this->logbook_model->total_digi_by_user(); 
			
			
			}else{
			 
						// Store info
		$data['todays_qsos'] = $this->logbook_model->todays_qsos();

		$data['total_qsos'] = $this->logbook_model->total_qsos();
	
		$data['month_qsos'] = $this->logbook_model->month_qsos(); 
	   
		$data['year_qsos'] = $this->logbook_model->year_qsos();
		

		$data['total_ssb'] = $this->logbook_model->total_ssb(); 


		$data['total_cw'] = $this->logbook_model->total_cw();
		$data['total_fm'] = $this->logbook_model->total_fm();
		
		$data['total_digi'] = $this->logbook_model->total_digi();
		
		$data['total_bands'] = $this->logbook_model->total_bands(); 
	
		$data['total_bands'] = $this->logbook_model->total_bands(); 
	
	
		$data['total_sat'] = $this->logbook_model->total_sat();
				
		$data['totals_year'] = $this->logbook_model->totals_year(); 
		
		
		
	

			
			  
		}
			

		$data['page_title'] = "Statistics"; 
	



		$data['css'] = 'index.css';
		$data['main'] = 'statistics/index';
		$this->load->view('template/Template', $data);
	}
	
	function custom() {
	
	    $this->load->model('user_model');
		if(!$this->user_model->authorize($this->config->item('auth_mode'))) {
			if($this->user_model->validate_session()) {
				$this->user_model->clear_session();
				show_error('Access denied<p>Click <a href="'.site_url('user/login').'">here</a> to log in as another user', 403);
			} else {
				redirect('user/login');
			}
		}
	
		$data['page_title'] = "Custom Statistics";
	
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('end_date', 'End Date', 'required');

		if ($this->form_validation->run() == FALSE)
		{
	/*		$this->load->view('layout/header', $data);
			$this->load->view('statistics/custom');
			$this->load->view('layout/footer');*/

			$data['css'] = 'index.css';
			$data['main'] = 'statistics/custom';
			$this->load->view('template/Template', $data);
		}
		else
		{
		
			$this->load->model('stats');
	
			$data['result'] = $this->stats->result();
		
			
			/*$this->load->view('layout/header', $data);
			$this->load->view('statistics/custom_result');
			$this->load->view('layout/footer');*/

			$data['css'] = 'index.css';
			$data['main'] = 'statistics/custom_result';
			$this->load->view('template/Template', $data);


	
		}
	
	}

	public function show_cart(){

			$this->load->model('logbook_model');
	        $data['js'] = $this->logbook_model->chart_station();

	       /* $category = array();
	        $category['name'] = 'Total_QSO';

	        $series1 = array();
	        $series1['name'] = 'QSO';

	        foreach ($data as $row)
	        {
	            $category['data'][] = $row->CallSignImport;
	            $series1['data'][] = $row->total;
	            $series2['data'][] = $row->COL_MODE;
	           
	        }

	        $result = array();
	        array_push($result,$category);
	        array_push($result,$series1);

	   

	       $a = json_encode($result, JSON_NUMERIC_CHECK);
       		$data['json'] = $a;*/

		    $data['page_title'] = "Statistics";
		//    echo $a;
		/*    $this->load->view('layout/header', $data);
			$this->load->view('chart/chart_statistik');
			$this->load->view('layout/footer');*/

			$data['css'] = 'index.css';
			$data['main'] = 'chart/chart_statistik';
			$this->load->view('template/Template', $data);
	}

	public function chart_qso()
	{
		
		$this->load->model('logbook_model');
		$data = $this->logbook_model->chart_qso();

		$category = array();
        $category['name'] = 'Total_QSO';

        $series1 = array();
        $series1['name'] = 'QSO';

        foreach ($data as $row)
        {
            $category['data'][] = $row->CallSignImport;
            $series1['data'][] = $row->total;
           
        }

        $result = array();
        array_push($result,$category);
        array_push($result,$series1);
   

        print json_encode($result, JSON_NUMERIC_CHECK);
	}

	public function chart_perstation()
	{
		$this->load->model('logbook_model');
		$data = $this->logbook_model->chart_station();
		$mode = $this->logbook_model->select_mode();


        $category = array();
        $category['name'] = 'Station';

        $series0 = array();
        $series0['name'] = 'CW';

        $series1 = array();
        $series1['name'] = 'FT8';

        $series2 = array();
        $series2['name'] = 'JT65';

        $series3 = array();
        $series3['name'] = 'PSK125';

        $series4 = array();
        $series4['name'] = 'PSK31';
        
         $series5 = array();
        $series5['name'] = 'PSK63';
        
         $series6 = array();
        $series6['name'] = 'RTTY';

        $series7 = array();
        $series7['name'] = 'SSB';

    

        foreach ($mode as $row)
        {
            $category['data'][] = $row->CallSignImport;
            $series0['data'][] = $row->CW;
            $series1['data'][] = $row->FT8;
            $series2['data'][] = $row->JT65;
            $series3['data'][] = $row->PSK125;
            $series4['data'][] = $row->PSK31;
            $series5['data'][] = $row->PSK63;
            $series6['data'][] = $row->RTTY;
            $series7['data'][] = $row->SSB;
           
        }

        $result = array();
        array_push($result,$category);
        array_push($result,$series0);
        array_push($result,$series1);
        array_push($result,$series2);
        array_push($result,$series3);
        array_push($result,$series4);
        array_push($result,$series5);
        array_push($result,$series6);
        array_push($result,$series7);
  

        print json_encode($result, JSON_NUMERIC_CHECK);
        
	}
}
