<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tes_award_certifikat extends CI_Controller {

	public function index()
	{
        // Auth check
        $this->load->model('user_model');
        if(!$this->user_model->authorize($this->config->item('auth_mode'))) {
            if($this->user_model->validate_session()) {
                $this->user_model->clear_session();
                show_error('Access denied<p>Click <a href="'.site_url('user/login').'">here</a> to log in as another user', 403);
            } else {
                redirect('user/login');
            }
        }
     $this->load->model('logbook_model');
    $call = $this->input->post('callsign');
	  $rows = $this->logbook_model->get_count_data_by_call($call);
    $data['jml'] = $rows;

		$data['page_title'] = "Search";
    $data['css'] = 'index.css';

    $this->load->view('layout/header', $data);
		$this->load->view('search/main',$data);
		$this->load->view('layout/footer');
	}

public function certificate()
{   $data['page_title'] = "Orari";
    $this->load->view('home/comeingsoon',$data);
}

public function card($id)
    {
        $this->load->model('logbook_model');
        

        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('pdf');
        $pdf = $this->pdf->load();  

        $rows = $this->logbook_model->get_by_primary_key($id);



        if (!empty($rows)){

            $data = array(
               'COL_TIME_ON' => $rows->COL_TIME_ON,
               'COL_TIME_OFF' => $rows->COL_TIME_OFF,
               'COL_CALL' => $rows->COL_CALL,
               'COL_BAND' => $rows->COL_BAND,
               'COL_FREQ' => $rows->COL_FREQ,
               'COL_MODE' => $rows->COL_MODE,
               'COL_RST_RCVD' =>$rows->COL_RST_RCVD,
               'COL_RST_SENT' => $rows->COL_RST_SENT,
               'COL_NAME' => $rows->COL_NAME,
               'COL_COMMENT' => $rows->COL_COMMENT,
               'COL_SAT_NAME' => $rows->COL_SAT_NAME,
               'COL_SAT_MODE' => $rows->COL_SAT_MODE,
               'COL_GRIDSQUARE' => $rows->COL_GRIDSQUARE,
               'COL_COUNTRY' => $rows->COL_COUNTRY,
               'COL_QTH' =>$rows->COL_QTH,
               'COL_PROP_MODE' => $rows->COL_PROP_MODE,
               'COL_DISTANCE' =>$rows->COL_DISTANCE,
               'COL_FREQ_RX' => $rows->COL_FREQ_RX,
               'COL_BAND_RX' => $rows->COL_BAND_RX,
               'COL_ANT_AZ' => $rows->COL_ANT_AZ,
               'COL_ANT_EL' => $rows->COL_ANT_EL,
               'COL_STX_STRING' =>$rows->COL_STX_STRING,
               'COL_SRX_STRING' =>$rows->COL_SRX_STRING,
               'COL_IOTA' => $rows->COL_IOTA,
               'COL_QSLRDATE' => $rows->COL_QSLRDATE,
               'COL_QSL_RCVD' => $rows->COL_QSL_RCVD,
               'COL_QSLSDATE' => $rows->COL_QSLSDATE,
               'COL_QSL_SENT' => $rows->COL_QSL_SENT,
               'COL_LOTW_QSL_SENT' => $rows->COL_LOTW_QSL_SENT,
               'COL_LOTW_QSL_RCVD' => $rows->COL_LOTW_QSL_RCVD,
               'COL_MY_RIG' => $rows->COL_MY_RIG,
               'COL_TX_PWR' => $rows->COL_TX_PWR,
               'COL_MY_GRIDSQUARE' => $rows->COL_MY_GRIDSQUARE,
               'CallSignImport' => $rows->CallSignImport,
               'title' => "QSL Card " . $rows->COL_CALL,   
            );
     

            $html = $this->load->view('user/qsl_card',$data, true);
            // render the view into HTML
            $pdf->WriteHTML($html);
            // write the HTML into the PDF
            $output = 'qsl_card' . date('Y_m_d_H_i_s') . '_.pdf';
            $pdf->Output("$output", 'I');
      }


         
    
    }

public function get_award()
{

        $this->load->model('logbook_model');
        
        $call = $this->input->post('callsign');
        $nama = $this->input->post('nama');

        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('pdf');
        $pdf = $this->pdf->load();  
       
        $calls = $this->logbook_model->get_callsign($call);
        if (!empty($calls)){

               $callssig = $calls->COL_CALL;
               $title = "Award " . $calls->COL_CALL;

                $rangking = $this->logbook_model->get_rangking($call);
                if (!empty($rangking)){
                  $rang = $rangking->rownum;

                }


        $data['qso']= $this->logbook_model->get_all_by_callsign($call);

        $rows = $this->logbook_model->getdata_by_call($call);



        if ($rows >='5' && $rows < '10'){

          $row = $this->db->get_where('certificate',array('callsign' =>$callssig,'type'=>'bronze' ))->row();



          $data['rangking'] = $rang;
          $data['c'] = $callssig;
          $data['nama'] = $nama;
          $data['action'] = site_url('search/bronze');
          $data['image'] = "assets/images/certificate_bronze_yb72ri.jpg";
          $data['jns'] = "Congratulations you got the Bronze certificate";
          $data['jml'] = $rows;

          $data['css'] = 'get_certificate.css';
          $this->load->view('layout/header',$data);
          $this->load->view('user/congratulations',$data);
          $this->load->view('layout/footer');
        

        

        }elseif($rows >= '5' && $rows < '10'){
            $data['rangking'] = $rang;
            $data['c'] = $callssig;
            $data['nama'] = $nama;
            $data['action'] = site_url('search/silver');
            $data['image'] = "assets/images/certificate_silver_yb72ri.jpg";
            $data['jns'] = "Congratulations you got the Silver certificate " ;
            $data['jml']= $rows;
            $data['css'] = 'get_certificate.css';
          /*  $this->load->view('user/congratulations',$data);*/
           $this->load->view('layout/header',$data);
          $this->load->view('user/congratulations',$data);
          $this->load->view('layout/footer');

         

        }elseif($rows >='10'){
           $data['rangking'] = $rang;
           $data['c'] = $callssig;
           $data['nama'] = $nama;
           $data['action'] = site_url('search/gold');
           $data['image'] = "assets/images/certificate_gold_yb72ri.jpg";
           $data['jns'] = "Congratulations you got the Gold certificate" ;
           $data['jml']= $rows;

           $data['css'] = 'get_certificate.css';
          $this->load->view('layout/header',$data);
          $this->load->view('user/congratulations',$data);
          $this->load->view('layout/footer');
          /* $this->load->view('user/congratulations',$data);*/

        }else{
           $data['action'] = "";
           $data['c'] = $callssig;
           $data['nama'] = $nama;
           $data['image'] = "assets/images/special_event_yb72ri.jpg";
           $data['jns'] = "Sorry you can not get any certificate yet" ;
           $data['jml']= $rows;

           $data['css'] = 'get_certificate.css';
          /*$this->load->view('user/congratulations',$data);*/
          $this->load->view('layout/header',$data);
          $this->load->view('user/congratulations',$data);
          $this->load->view('layout/footer');

        }

         }else{
              $data['jns'] = "Your CallSign Not Available" ;
              $data['css'] = 'get_certificate.css';
               $this->load->view('layout/header',$data);
         $this->load->view('user/sorry_nodata',$data);
          $this->load->view('layout/footer');
        }
     
    }

public function award()
{
        $this->load->model('logbook_model');
        $call = $this->input->post('callsign');
        $rows = $this->logbook_model->get_count_data_by_call($call);
        $data['qso']= $this->logbook_model->get_count_all_by_callsign($call);

        $data['cw'] = $this->logbook_model->get_all_cw($call);

        $data['callsign'] =  $call;

        $data['page_title'] = "Award";

        $data['image'] = "assets/images/certificate_bronze_yb72ri.jpg";
        
        $data['jml'] = $rows;



        if($rows >='5' && $rows <'10'){
            
            $data['action'] = site_url('search/bronze');
            $data['jns'] = "Congratulations you got the Bronze Awards";

              $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>'bronze'))->num_rows();

              if($exist != "0"){

                $nomor = $this->logbook_model->get_number_award_bronze($call);
              

              }else{
                   
               
               $kode = $this->logbook_model->code_otomatis();

               $isi= array( 'callsign' => $call ,
                              'date' => date('d-M-Y') ,
                              'number_certificate' =>  $kode,
                              'type_certificate' => 'bronze');

               $this->logbook_model->insert_certificate($isi); 
               }  
          
        }elseif($rows >='10' && $rows <'15'){
            
            $data['action'] = site_url('search/silver'); 
            $data['jns'] = "Congratulations you got the Silver Awards";  

             $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>'gold'))->num_rows();

            if($exist != "0"){

              $nomor = $this->logbook_model->get_number_award_silver($call);
            

            }else{
                 
             // $data['kodeunik'] = $this->model_admin->code_otomatis();
             $kode = $this->logbook_model->code_otomatis();

             $isi= array( 'callsign' => $call ,
                            'date' => date('d-M-Y') ,
                            'number_certificate' =>  $kode ,
                            'type_certificate' => 'silver');

             $this->logbook_model->insert_certificate($isi); 
             }     
        
        }elseif($rows >='15'){
                       
            $data['action'] = site_url('search/gold');
            $data['jns'] = "Congratulations you got the Gold Awards";

          //  $number_award = $this->logbook_model->cek_number_award_gold($call);

            $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>'gold'))->num_rows();

            if($exist != "0"){

              $nomor = $this->logbook_model->get_number_award_gold($call);
            

            }else{
                 
             // $data['kodeunik'] = $this->model_admin->code_otomatis();
             $kode = $this->logbook_model->code_otomatis();

             $isi= array( 'callsign' => $call ,
                            'date' => date('d-M-Y') ,
                            'number_certificate' =>  $kode,
                            'type_certificate' => 'gold');

             $this->logbook_model->insert_certificate($isi);
   

            }


        }else{
            $data['action'] = "";
            $data['jns'] = "Sorry you can not get any certificate yet";
        }
      
       
        /*$data['isi_award'] = $nomor;*/
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header',$data);
        $this->load->view('user/awards',$data);
        $this->load->view('layout/footer');

}



public function bronze(){



        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
         $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  

   
        $data['callsign'] = $this->input->post('callsign');
 
        $call =  $this->input->post('callsign');
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_bronze($call);

        $numrows = $this->logbook_model->get_jumlah_baris($call);


        if($numrows > '5'){
        	
        	$endorsment = "Mixed";

        }elseif($numrows == '1'){
        	
        	$endorsment = " `";
        	
        }	


        if ($row_tgl){
            $data = array(
              'tgl' => $row_tgl->date,
              'nomor' => $row_tgl->number_certificate,
              'callsign' =>  $row_tgl->callsign,
              'nama' =>  $nama,
              'endorsment' => $endorsment
          );
        $html = $this->load->view('user/certificate_bronze',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
    }
}
public function silver(){
        ini_set('memory_limit', '256M');
        // load library
       $this->load->library('certificate');
         $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  
        $data['nama'] = $this->input->post('nama');
        $data['callsign'] = $this->input->post('callsign');
        $data['rangking'] = $this->input->post('rangking');

                $call =  $this->input->post('callsign');
                $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_silver($call);

        $numrows = $this->logbook_model->get_jumlah_baris($call);

// var_dump($numrows);
        if($numrows > '5'){
        	
        	$endorsment = "Mixed";

        }elseif($numrows == '1'){
        	$endorsment = " `";
        	
        }

         if ($row_tgl) {
            $data = array(
              'tgl' => $row_tgl->date,
              'nomor' => $row_tgl->number_certificate,
               'callsign' =>  $row_tgl->callsign,
               'nama' =>  $nama,
               'endorsment' => $endorsment
                );
           
        $html = $this->load->view('user/certificate_silver',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
}
}
public function gold(){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
         $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  
  
      /*  $data['nama'] = $this->input->post('nama');*/
        $data['callsign'] = $this->input->post('callsign');
          $nama =  $this->input->post('nama');
       /* $data['rangking'] = $this->input->post('rangking');*/
        $call =  $this->input->post('callsign');
        $row_tgl = $this->logbook_model->get_number_award_gold($call);

        $numrows = $this->logbook_model->get_jumlah_baris($call);


        if($numrows > '5'){
        	
        	$endorsment = "Mixed";

        }elseif($numrows == '1'){
        	$endorsment = " ` ";
        	
        }

         if ($row_tgl) {
            $data = array(
              'tgl' => $row_tgl->date,
              'nomor' => $row_tgl->number_certificate,
               'callsign' =>  $row_tgl->callsign,
               'nama' =>  $nama,
               'endorsment' => $endorsment
                );
           
     

        $html = $this->load->view('user/certificate_gold',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
           } 

}


public function operator($call)
{
        ini_set('memory_limit', '256M');
         $this->load->model('logbook_model');
        // load library
        $this->load->library('certificate');

        $hasil = str_replace("-", "/",$call);
        $row = $this->logbook_model->get_certificate_operator($hasil);


        if($row) {
          $data =  array(
            'callsign' => $row->callsign,
            'nama_lengkap' => $row->nama_lengkap,
            'no' => $row->id, );
        }

       $pdf = $this->certificate->load();  
    
     /*   $data['nama'] = $this->input->post('nama');
        $data['callsign'] = $this->input->post('callsign');
        $data['rangking'] = $this->input->post('rangking');*/
       
        $html = $this->load->view('operator/certificate_gold',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');

}

public function cariop()
{
  $calls = $this->input->post('callsign');

   ini_set('memory_limit', '256M');
         $this->load->model('logbook_model');
        // load library
        $this->load->library('certificate');


        $row = $this->logbook_model->get_certificate_operator($calls);


        if($row) {
          $data =  array(
            'callsign' => $row->callsign,
            'nama_lengkap' => $row->nama_lengkap, );
        }

        $pdf = $this->certificate->load(); 

        $html = $this->load->view('operator/certificate_gold',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I'); 


}


}
