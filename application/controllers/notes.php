<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notes extends CI_Controller {

	/* Displays all notes in a list */
	public function index()
	{
		$this->load->model('note');
		$data['notes'] = $this->note->list_all();
		$data['page_title'] = "Notes";


		$data['css'] = 'index.css';
		$data['main'] = 'notes/main';
		$this->load->view('template/Template', $data);

/*		$this->load->view('layout/header', $data);
		$this->load->view('notes/main');
		$this->load->view('layout/footer');*/
	}
	
	/* Provides function for adding notes to the system. */
	function add() {
	
		$this->load->model('note');
	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Note Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');


		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title'] = "Add Notes";
			$data['css'] = 'index.css';
		    $data['main'] = 'notes/add';
		    $this->load->view('template/Template', $data);
			
		}
		else
		{	
			$this->note->add();
			
			redirect('notes');
		}
	}
	
	/* View Notes */
	function view($id) {
		$this->load->model('note');
		
		$data['note'] = $this->note->view($id);
		
		// Display
		$data['page_title'] = "Note";



	    $data['css'] = 'index.css';
	    $data['main'] = 'notes/view';
	    $this->load->view('template/Template', $data);
		
	}
	
	/* Edit Notes */
	function edit($id) {
		$this->load->model('note');
		$data['id'] = $id;
		
		$data['note'] = $this->note->view($id);
			
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Note Title', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');


		if ($this->form_validation->run() == FALSE)
		{
			$data['page_title'] = "Edit Note";
		

			$data['css'] = 'index.css';
		    $data['main'] = 'notes/edit';
		    $this->load->view('template/Template', $data);
		}
		else
		{
			$this->note->edit();
			
			redirect('notes');
		}
	}
	
	/* Delete Note */
	function delete($id) {
		$this->load->model('note');
		$this->note->delete($id);
		
		redirect('notes');
	}
}