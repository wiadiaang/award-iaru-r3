<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Handles Displaying of information for awards.
	
	These are taken from comments fields or ADIF fields 
*/

class Awards extends CI_Controller {

	public function index()
	{
		// Render Page
		$data['page_title'] = "Awards";

/*		$this->load->view('layout/header', $data);
		$this->load->view('awards/index');
		$this->load->view('layout/footer');*/

		$data['css'] = 'index.css';
		$data['main'] = 'awards/index';
		$this->load->view('template/Template', $data);
	}
	
	public function dxcc ()
	{
		//echo "Needs Developed";
		$this->load->model('dxcc');
		$data['dxcc'] = $this->dxcc->show_stats();

		// Render Page
		$data['page_title'] = "Awards - DXCC";

		/*$this->load->view('layout/header', $data);
		$this->load->view('awards/dxcc/index');
		$this->load->view('layout/footer');*/

		$data['css'] = 'index.css';
		$data['main'] = 'awards/dxcc/index';
		$this->load->view('template/Template', $data);

	}

	public function dxcc_details(){
        $a = $this->input->get();
        $q = "";
        foreach ($a as $key => $value) {
        	$q .= $key."=".$value.("&#40;and&#41;");
        }
        $q = substr($q, 0, strlen($q)-13);

        $arguments["query"] = $q;
        $arguments["fields"] = '';
        $arguments["format"] = "json";
        $arguments["limit"] = '';
        $arguments["order"] = '';

        // print_r($arguments);
        // return;

		// Load the API and Logbook models
		$this->load->model('api_model');
		$this->load->model('logbook_model');

		// Call the parser within the API model to build the query
		$query = $this->api_model->select_parse($arguments);

		// Execute the query, and retrieve the results
		$data = $this->logbook_model->api_search_query($query);

		// Render Page
		$data['page_title'] = "Log View - DXCC";
		$data['filter'] = $a["Country"] . " and " . $a["Band"];

	/*	$this->load->view('layout/header', $data);
		$this->load->view('awards/dxcc/details');
		$this->load->view('layout/footer');*/

		$data['css'] = 'index.css';
		$data['main'] = 'awards/dxcc/details';
		$this->load->view('template/Template', $data);
	}
	
	/*
		Handles Displaying of WAB Squares worked.
		Comment field - WAB:#
	*/
	public function wab() {
	
		// Grab all worked WABs
		$this->load->model('wab');
		$data['wab_all'] = $this->wab->get_all();
	
		// Render Page
		$data['page_title'] = "Awards - WAB";

		/*$this->load->view('layout/header', $data);
		$this->load->view('awards/wab/index');
		$this->load->view('layout/footer');*/

		$data['css'] = 'index.css';
		$data['main'] = 'awards/wab/index';
		$this->load->view('template/Template', $data);
	}
	
	/*
		Handles showing worked SOTAs
		Comment field - SOTA:#
	*/
	public function sota() {
	
		// Grab all worked sota stations
		$this->load->model('sota');
		$data['sota_all'] = $this->sota->get_all();
	
		// Render page
		$data['page_title'] = "Awards - SOTA";

		/*$this->load->view('layout/header', $data);
		$this->load->view('awards/sota/index');
		$this->load->view('layout/footer');*/

		$data['css'] = 'index.css';
		$data['main'] = 'awards/sota/index';
		$this->load->view('template/Template', $data);
	}
	
	/*
		Comment field - YB72RI:#
	*/
	public function yb72ri() {
	
		// Grab all worked yb72ri members
		$this->load->model('yb72ri');
		$data['yb72ri_all'] = $this->yb72ri->get_all();
	
		// Render page
		$data['page_title'] = "YB72RI";

/*		$this->load->view('layout/header', $data);
		$this->load->view('awards/yb72ri/index');
		$this->load->view('layout/footer');*/

		$data['css'] = 'index.css';
		$data['main'] = 'awards/yb72ri/index';
		$this->load->view('template/Template', $data);
	}
	
}
