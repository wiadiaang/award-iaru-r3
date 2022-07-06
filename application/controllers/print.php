<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class print extends CI_Controller {

/*	 function __construct()
    {
        parent::__construct();
        $this->load->model('logbook_model');
    }*/

	public function index($id)
	{

		 $this->load->view('user/qsl_card');
		                
		/*//ini_set('memory_limit', '256M');
        // load library
        $this->load->library('pdf');
        $pdf = $this->pdf->load();  

        $data['card'] = $this->logbook_model->get_by_primary_key($id);
        $data['title'] = "QSL Card";                 

		
		// boost the memory limit if it's low ;)
        $html = $this->load->view('user/qsl_card',$data, true);
        // render the view into HTML
        $pdf->WriteHTML($html);
        // write the HTML into the PDF
        $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');*/
	
	}
}

?>