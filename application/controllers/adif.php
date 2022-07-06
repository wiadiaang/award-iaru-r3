<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adif extends CI_Controller {

	/* Controls ADIF Import/Export Functions */

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));

		$this->load->model('user_model');
		if(!$this->user_model->authorize(2)) { $this->session->set_flashdata('notice', 'You\'re not allowed to do that!'); redirect('dashboard'); }
	}

	/* Shows Export Views */
	public function export() {

		$data['page_title'] = "ADIF Export";

		/*$this->load->view('layout/header', $data);
		$this->load->view('adif/main');
		$this->load->view('layout/footer');*/

		$data['css'] = 'index.css';
		$data['main'] = 'adif/main';
		$this->load->view('template/Template', $data);
	}

	// Export all QSO Data in ASC Order of Date.
	public function exportall()
	{
		// Set memory limit to unlimited to allow heavy usage
		ini_set('memory_limit', '-1');

		$this->load->model('adif_data');

		$data['qsos'] = $this->adif_data->export_all();

		$this->load->view('adif/data/exportall', $data);
	}

	public function export_custom() {

		// Set memory limit to unlimited to allow heavy usage
		ini_set('memory_limit', '-1');

		$this->load->model('adif_data');

		$from = $this->input->post('from');
		$to = $this->input->post('to');

		echo $from;
		echo $to;

		$data['qsos'] = $this->adif_data->export_custom($from, $to);

		$this->load->view('adif/data/exportall', $data);

	}

	public function export_lotw()
	{
		// Set memory limit to unlimited to allow heavy usage
		ini_set('memory_limit', '-1');

		$this->load->model('adif_data');

		$data['qsos'] = $this->adif_data->export_lotw();

		$this->load->view('adif/data/exportall', $data);

		foreach ($data['qsos']->result() as $qso)
		{
			$this->adif_data->mark_lotw_sent($qso->COL_PRIMARY_KEY);
		}
	}

	public function import() {

	

		$data['page_title'] = "Import Logbook";

		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'adi|ADI|adif|ADIF';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
		    //print $this->upload->display_errors();
		    //exit(0);
			$data['error'] = $this->upload->display_errors();
			  $data['css'] = 'index.css';


		 

			
			$data['main'] = 'adif/import';
			$this->load->view('template/Template', $data);
		}
		else
		{

			$data = array('upload_data' => $this->upload->data());

			ini_set('memory_limit', '-1');
			set_time_limit(0);

			$this->load->model('logbook_model');

			$this->load->library('adif_parser');

			$this->adif_parser->load_from_file('./uploads/'.$data['upload_data']['file_name']);

			$this->adif_parser->initialize();

			while($record = $this->adif_parser->get_record())
			{
				if(count($record) == 0)
				{
					break;
				};

				$this->logbook_model->import($record);

			};

			unlink('./uploads/'.$data['upload_data']['file_name']);

			$data['page_title'] = "ADIF Imported";


			$data['css'] = 'index.css';
			$data['main'] = 'adif/import_success';
			$this->load->view('template/Template', $data);

		}
	}

	// import adif satelit
	public function import_log_satelit() {

	

		$data['page_title'] = "Import Logbook Satellite";

		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'adi|ADI|adif|ADIF';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
		    //print $this->upload->display_errors();
		    //exit(0);
			$data['error'] = $this->upload->display_errors();
			  $data['css'] = 'index.css';


		 

			
			$data['main'] = 'adif/import_satelit';
			$this->load->view('template/Template', $data);
		}
		else
		{

			$data = array('upload_data' => $this->upload->data());

			ini_set('memory_limit', '-1');
			set_time_limit(0);

			$this->load->model('logbook_model');

			$this->load->library('adif_parser');

			$this->adif_parser->load_from_file('./uploads/'.$data['upload_data']['file_name']);

			$this->adif_parser->initialize();

			while($record = $this->adif_parser->get_record())
			{
				if(count($record) == 0)
				{
					break;
				};

				$this->logbook_model->import_satelit($record);

			//	var_dump($record);

			};

			unlink('./uploads/'.$data['upload_data']['file_name']);

			$data['page_title'] = "Logbook Satelit Imported";


			$data['css'] = 'index.css';
			$data['main'] = 'adif/import_success';
			$this->load->view('template/Template', $data);

		}
	}
}

/* End of file adif.php */
