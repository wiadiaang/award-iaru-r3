<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	public function index()
	{
        ini_set('memory_limit', '-1');
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
        $data['css'] = '';

        $this->load->view('layout/header', $data);
		$this->load->view('search/main',$data);
		$this->load->view('layout/footer');
	}

    function get_log($call)
    {
        ini_set('memory_limit', '-1');
        // Auth check
        $this->load->model('user_model');
        // if(!$this->user_model->authorize($this->config->item('auth_mode'))) {
        //     if($this->user_model->validate_session()) {
        //         $this->user_model->clear_session();
        //         show_error('Access denied<p>Click <a href="'.site_url('user/login').'">here</a> to log in as another user', 403);
        //     } else {
        //         redirect('user/login');
        //     }
        // }
        $this->load->model('logbook_model');
        $call = $this->input->post('callsign');
        $rows = $this->logbook_model->get_count_data_by_call($call);
        $data['jml'] = $rows;

		$data['page_title'] = "Search";
        $data['css'] = '';

        $this->load->view('layout/header', $data);
		$this->load->view('search/main',$data);
		$this->load->view('layout/footer');
    }
    // public function certificate()
    // {   $data['page_title'] = "Orari";
    //     $this->load->view('home/comeingsoon',$data);
    // }

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
                'COL_STATION_CALLSIGN' =>$rows->COL_STATION_CALLSIGN,
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

    public function award_1()
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
            $data['jns'] = "Congratulations you got the Basic Certificate";

            $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>'bronze'))->num_rows();

            if($exist != "0"){

                //   $nomor = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
            

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
            $data['jns'] = "Congratulations you got the Silver Certificate";  

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
            $data['jns'] = "Congratulations you got the Gold Certificate";



            $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>'gold'))->num_rows();

            if($exist != "0"){

            // $nomor = $this->logbook_model->get_number_award_gold($call, $id_certifate);
            

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

    //Untuk Ke halaman Input nama certificate, bronze per mode dan band atau per Mode saja  
    // public function cek_awards_bronze($endorsment, $callsign, $id_certificate){
        public function cek_awards_bronze_all($callsign){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  


        $data['callsign'] = $callsign;
        $data['endorsment'] = "Mixed";
        $data['id_certificate'] = $id_certificate;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
        
        // var_dump($row_tgl);die();
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'id_certificate' => $id_certificate
        );
            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        $data['action'] = site_url('search/bronze/'.$endorsment.'');
        $data['jns'] = "Congratulations you got the Basic Certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }

    //Untuk Ke halaman Input nama certificate, silver per mode dan band atau per Mode saja  
    // public function cek_awards_silver($endorsment, $callsign, $id_certificate){
        public function cek_awards_silver_all($callsign){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  


        $data['callsign'] = $callsign;
        $data['endorsment'] = "Mixed";
        $data['id_certificate'] = $id_certificate;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_silver($call, $id_certificate);
        
        // var_dump($row_tgl);die();
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => "Mixed",
            'id_certificate' => $id_certificate
        );
            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        $data['action'] = site_url('search/silver/'.$endorsment.'');
        $data['jns'] = "Congratulations you got the Silver Certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }

    //Untuk Ke halaman Input nama certificate, gold per mode dan band atau per Mode saja  
    // public function cek_awards_gold($endorsment, $callsign, $id_certificate){
        public function cek_awards_gold_all($callsign){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  

        $data['callsign'] = $callsign;
        $data['endorsment'] = "Mixed";
        $data['id_certificate'] = $id_certificate;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_gold($call, $id_certificate);
        // var_dump($row_tgl);die();
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => "Mixed",
            'id_certificate' => $id_certificate
        );

            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        $data['action'] = site_url('search/gold/'.$endorsment.'');
        $data['jns'] = "Congratulations you got the Gold certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }


    //Untuk Ke halaman Input nama certificate, bronze per mode dan band atau per Mode saja  
    public function cek_awards_bronze($endorsment, $callsign, $id_certificate){
        // public function cek_awards_bronze($callsign){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  


        $data['callsign'] = $callsign;
        $data['endorsment'] = "Mixed";
        $data['id_certificate'] = $id_certificate;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
        
        // var_dump($row_tgl);die();
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'id_certificate' => $id_certificate
        );
            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        $data['action'] = site_url('search/bronze/'.$endorsment.'');
        $data['jns'] = "Congratulations you got the Basic Certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }

    //Untuk Ke halaman Input nama certificate, silver per mode dan band atau per Mode saja  
    public function cek_awards_silver($endorsment, $callsign, $id_certificate){
        // public function cek_awards_silver($callsign){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  


        $data['callsign'] = $callsign;
        $data['endorsment'] = "Mixed";
        $data['id_certificate'] = $id_certificate;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_silver($call, $id_certificate);
        
        // var_dump($row_tgl);die();
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => "Mixed",
            'id_certificate' => $id_certificate
        );
            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        $data['action'] = site_url('search/silver/'.$endorsment.'');
        $data['jns'] = "Congratulations you got the Silver Certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }

    //Untuk Ke halaman Input nama certificate, gold per mode dan band atau per Mode saja  
    public function cek_awards_gold($endorsment, $callsign, $id_certificate){
        // public function cek_awards_gold($callsign){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  

        $data['callsign'] = $callsign;
        $data['endorsment'] = "Mixed";
        $data['id_certificate'] = $id_certificate;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_gold($call, $id_certificate);
        // var_dump($row_tgl);die();
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => "Mixed",
            'id_certificate' => $id_certificate
        );

            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        $data['action'] = site_url('search/gold/'.$endorsment.'');
        $data['jns'] = "Congratulations you got the Gold certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }

    //Untuk Ke halaman Input nama certificate, bronze per mode dan band atau per Mode saja  
    public function cek_awards_bronze_mode($endorsment, $callsign, $id_certificate){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  


        $data['callsign'] = $callsign;
        $data['endorsment'] = $endorsment;
        $data['id_certificate'] = $id_certificate;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
        
        // var_dump($row_tgl);die();
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'id_certificate' => $id_certificate
        );
            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        $data['action'] = site_url('search/bronze_mode/'.$endorsment.'');
        $data['jns'] = "Congratulations you got the Basic Certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }

    //Untuk Ke halaman Input nama certificate, silver per mode dan band atau per Mode saja  
    public function cek_awards_silver_mode($endorsment, $callsign, $id_certificate){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  


        $data['callsign'] = $callsign;
        $data['endorsment'] = $endorsment;
        $data['id_certificate'] = $id_certificate;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_silver($call, $id_certificate);
        
        // var_dump($row_tgl);die();
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'id_certificate' => $id_certificate
        );
            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        $data['action'] = site_url('search/silver_mode/'.$endorsment.'');
        $data['jns'] = "Congratulations you got the Silver Certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }

    //Untuk Ke halaman Input nama certificate, gold per mode dan band atau per Mode saja  
    public function cek_awards_gold_mode($endorsment, $callsign, $id_certificate){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  

        $data['callsign'] = $callsign;
        $data['endorsment'] = $endorsment;
        $data['id_certificate'] = $id_certificate;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_gold($call, $id_certificate);
        // var_dump($row_tgl);die();
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'id_certificate' => $id_certificate
        );

            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        $data['action'] = site_url('search/gold_mode/'.$endorsment.'');
        $data['jns'] = "Congratulations you got the Gold certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }

    //Untuk Ke halaman Input nama certificate, bronze per band saja  
    public function cek_awards_bronze_band($endorsment, $callsign, $id_certificate){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  


        $data['callsign'] = $callsign;
        $data['endorsment'] = $endorsment;
        $data['id_certificate'] = $id_certificate;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
        
        // var_dump($row_tgl);die();
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'id_certificate' => $id_certificate
        );
            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        $data['action'] = site_url('search/bronze_band/'.$endorsment.'');
        $data['jns'] = "Congratulations you got the Basic Certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }

    //Untuk Ke halaman Input nama certificate, silver per band saja  
    public function cek_awards_silver_band($endorsment, $callsign, $id_certificate){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  


        $data['callsign'] = $callsign;
        $data['endorsment'] = $endorsment;
        $data['id_certificate'] = $id_certificate;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_silver($call, $id_certificate);
        
        // var_dump($row_tgl);die();
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'id_certificate' => $id_certificate
        );
            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        $data['action'] = site_url('search/silver_band/'.$endorsment.'');
        $data['jns'] = "Congratulations you got the Silver Certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }

    //Untuk Ke halaman Input nama certificate, gold per band saja  
    public function cek_awards_gold_band($endorsment, $callsign, $id_certificate){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  

        $data['callsign'] = $callsign;
        $data['endorsment'] = $endorsment;
        $data['id_certificate'] = $id_certificate;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_gold($call, $id_certificate);
        // var_dump($row_tgl);die();
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'id_certificate' => $id_certificate
        );

            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        $data['action'] = site_url('search/gold_band/'.$endorsment.'');
        $data['jns'] = "Congratulations you got the Gold certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }

    //Untuk Ke halaman Input nama certificate, bronze per frekuensi    
    public function cek_awards_bronze_freq($endorsment, $frequency, $callsign, $id_certificate){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  


        $data['callsign'] = $callsign;
        $data['endorsment'] = $endorsment;
        $data['frequency'] = $frequency;
        $data['id_certificate'] = $id_certificate;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_bronze($call, $id_certificate);


        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'id_certificate' => $id_certificate
            );
            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        // var_dump($row_tgl);die();
        $data['action'] = site_url('search/bronze_freq/'.$endorsment.'/'. $frequency . '/'. $callsign . '');
        $data['jns'] = "Congratulations you got the Basic certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }

    //Untuk Ke halaman Input nama certificate, silver per frekuensi    
    public function cek_awards_silver_freq($endorsment, $frequency, $callsign, $id_certificate){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  


        $data['callsign'] = $callsign;
        $data['endorsment'] = $endorsment;
        $data['frequency'] = $frequency;
        $data['id_certificate'] = $id_certificate;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_silver($call, $id_certificate);


        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'id_certificate' => $id_certificate
            );
            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        // var_dump($row_tgl);die();
        $data['action'] = site_url('search/silver_freq/'.$endorsment.'/'. $frequency . '/'. $callsign . '');
        $data['jns'] = "Congratulations you got the Silver certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }

    //Untuk Ke halaman Input nama certificate, gold per frekuensi    
    public function cek_awards_gold_freq($endorsment, $frequency, $callsign, $id_certificate){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  


        $data['callsign'] = $this->input->post('callsign');
        $data['endorsment'] = $endorsment;
        $data['frequency'] = $frequency;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $row_tgl = $this->logbook_model->get_number_award_gold($call, $id_certificate);

        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment
            );
            // $html = $this->load->view('user/cek_awards',$data, true);
                // render the view into HTML
        }
        $data['action'] = site_url('search/gold_freq/'.$endorsment.'/'. $frequency . '/'. $callsign . '');
        $data['jns'] = "Congratulations you got the Gold certificate";
        $data['css'] = 'get_certificate.css';
        $this->load->view('layout/header', $data);
        $this->load->view('user/cek_awards',$data);
        $this->load->view('layout/footer');

    }

    //Untuk cetak certificate Bronze per frekuensi    
    public function bronze_freq($endorsment,$frequency, $callsign){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  


        $data['callsign'] = $callsign;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $id_certificate =  $this->input->post('id_certificate');

        $numrows = $this->logbook_model->get_jumlah_baris($call);
        $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>$id_certificate))->num_rows();
        
        if($exist != "0"){

        $nomor = $this->logbook_model->get_number_award_bronze($call, $id_certificate);        

        }else{
            

        $kode = $this->logbook_model->code_otomatis();

        $isi= array( 'callsign' => $call ,
                        'date' => date('d-M-Y') ,
                        'number_certificate' =>  $kode,
                        'type_certificate' => $id_certificate);
        $this->logbook_model->insert_certificate($isi); 
        }  
        
        $row_tgl = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'freq' => $frequency,
            );
        // var_dump($data);die();

        $html = $this->load->view('user/certificate_bronze_freq',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
    }
    }

    //Untuk cetak certificate Silver per frekuensi
    public function silver_freq($endorsment,$frequency, $callsign){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  


        $data['callsign'] = $callsign;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $id_certificate =  $this->input->post('id_certificate');

        $numrows = $this->logbook_model->get_jumlah_baris($call);
        $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>$id_certificate))->num_rows();
        
        if($exist != "0"){

        $nomor = $this->logbook_model->get_number_award_silver($call, $id_certificate);        

        }else{
            

        $kode = $this->logbook_model->code_otomatis();

        $isi= array( 'callsign' => $call ,
                        'date' => date('d-M-Y') ,
                        'number_certificate' =>  $kode,
                        'type_certificate' => $id_certificate);
        $this->logbook_model->insert_certificate($isi); 
        }  
        
        $row_tgl = $this->logbook_model->get_number_award_silver($call, $id_certificate);
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'freq' => $frequency,
            );
        // var_dump($data);die();

        $html = $this->load->view('user/certificate_silver_freq',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
    }
    }
    
    //Untuk cetak certificate Gold per frekuensi
    public function gold_freq($endorsment,$frequency, $callsign){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  


        $data['callsign'] = $callsign;
        
        $call =  $callsign;
        $nama =  $this->input->post('nama');
        $id_certificate =  $this->input->post('id_certificate');

        $numrows = $this->logbook_model->get_jumlah_baris($call);
        $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>$id_certificate))->num_rows();
        
        if($exist != "0"){

        $nomor = $this->logbook_model->get_number_award_gold($call, $id_certificate);        

        }else{
            

        $kode = $this->logbook_model->code_otomatis();

        $isi= array( 'callsign' => $call ,
                        'date' => date('d-M-Y') ,
                        'number_certificate' =>  $kode,
                        'type_certificate' => $id_certificate);
        $this->logbook_model->insert_certificate($isi); 
        }  
        
        $row_tgl = $this->logbook_model->get_number_award_gold($call, $id_certificate);
        
        if ($row_tgl){
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'freq' => $frequency,
            );
        // var_dump($data);die();

        $html = $this->load->view('user/certificate_gold_freq',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
    }
    }

    //Untuk cetak certificate bronze per Band saja
    public function bronze_band($endorsment){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  

        $data['callsign'] = $this->input->post('callsign');
        $nama =  $this->input->post('nama');
        $id_certificate =  $this->input->post('id_certificate');
        /* $data['rangking'] = $this->input->post('rangking');*/
        $call =  $this->input->post('callsign');

        $numrows = $this->logbook_model->get_jumlah_baris($call);
        $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>$id_certificate))->num_rows();
                // var_dump($id_certificate);die();

        if($exist != "0"){

        $nomor = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
        
        
        }else{
            
        
        $kode = $this->logbook_model->code_otomatis();

        $isi= array( 'callsign' => $call ,
                        'date' => date('d-M-Y') ,
                        'number_certificate' =>  $kode,
                        'type_certificate' => $id_certificate);
        $this->logbook_model->insert_certificate($isi); 
        }  
        
        $row_tgl = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
        
        if($endorsment == 'Digi'){
            $endorsment = 'Digital';
        }else if($endorsment == 'SSB'){
            $endorsment = 'Phone';
        }else{
            $endorsment = $endorsment;
        }
        
        if ($row_tgl) {
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'band' => $row_tgl->type_certificate,
            );
        
    

        $html = $this->load->view('user/certificate_bronze_band',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
        } 

    }

    //Untuk cetak certificate silver per Band saja
    public function silver_band($endorsment){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  

        $data['callsign'] = $this->input->post('callsign');
        $nama =  $this->input->post('nama');
        $id_certificate =  $this->input->post('id_certificate');
        /* $data['rangking'] = $this->input->post('rangking');*/
        $call =  $this->input->post('callsign');

        $numrows = $this->logbook_model->get_jumlah_baris($call);
        $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>$id_certificate))->num_rows();
                // var_dump($id_certificate);die();

        if($exist != "0"){

        $nomor = $this->logbook_model->get_number_award_silver($call, $id_certificate);
        
        
        }else{
            
        
        $kode = $this->logbook_model->code_otomatis();

        $isi= array( 'callsign' => $call ,
                        'date' => date('d-M-Y') ,
                        'number_certificate' =>  $kode,
                        'type_certificate' => $id_certificate);
        $this->logbook_model->insert_certificate($isi); 
        }  
        
        $row_tgl = $this->logbook_model->get_number_award_silver($call, $id_certificate);
        
        if($endorsment == 'Digi'){
            $endorsment = 'Digital';
        }else if($endorsment == 'SSB'){
            $endorsment = 'Phone';
        }else{
            $endorsment = $endorsment;
        }
        
        if ($row_tgl) {
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'band' => $row_tgl->type_certificate,
            );
        
    

        $html = $this->load->view('user/certificate_silver_band',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
        } 

    }

    //Untuk cetak certificate gold per Band saja
    public function gold_band($endorsment){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  

        /*  $data['nama'] = $this->input->post('nama');*/
            $data['callsign'] = $this->input->post('callsign');
            $id_certificate =  $this->input->post('id_certificate');
            // var_dump($id_certificate);die();
            $nama =  $this->input->post('nama');
        /* $data['rangking'] = $this->input->post('rangking');*/
        $call =  $this->input->post('callsign');

        $numrows = $this->logbook_model->get_jumlah_baris($call);
        $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>$id_certificate))->num_rows();

        if($exist != "0"){

        $nomor = $this->logbook_model->get_number_award_gold($call, $id_certificate);
        // var_dump($nomor);die();
        
        
        }else{
            
        
        $kode = $this->logbook_model->code_otomatis();

        $isi= array( 'callsign' => $call ,
                        'date' => date('d-M-Y') ,
                        'number_certificate' =>  $kode,
                        'type_certificate' => $id_certificate);
        $this->logbook_model->insert_certificate($isi); 
        }  

        $row_tgl = $this->logbook_model->get_number_award_gold($call,$id_certificate);
        
        if($endorsment == 'Digi'){
            $endorsment = 'Digital';
        }else if($endorsment == 'SSB'){
            $endorsment = 'Phone';
        }else{
            $endorsment = $endorsment;
        }
        
        if ($row_tgl) {
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'id_certificate' => $id_certificate,
            'endorsment' => $endorsment,
            'band' => $row_tgl->type_certificate,
        );
        
    

        $html = $this->load->view('user/certificate_gold_band',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
        } 

    }

    //Untuk cetak certificate bronze per mode Dan Band
    public function bronze($endorsment){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  

        // var_dump($this->input->post('id_certificate'));die();
        /*  $data['nama'] = $this->input->post('nama');*/
        $data['callsign'] = $this->input->post('callsign');
        $nama =  $this->input->post('nama');
        $id_certificate =  $this->input->post('id_certificate');
        /* $data['rangking'] = $this->input->post('rangking');*/
        $call =  $this->input->post('callsign');

        $numrows = $this->logbook_model->get_jumlah_baris($call);
        $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>$id_certificate))->num_rows();
                // var_dump($id_certificate);die();

        if($exist != "0"){

        $nomor = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
        
        
        }else{
            
        
        $kode = $this->logbook_model->code_otomatis();

        $isi= array( 'callsign' => $call ,
                        'date' => date('d-M-Y') ,
                        'number_certificate' =>  $kode,
                        'type_certificate' => $id_certificate);
        $this->logbook_model->insert_certificate($isi); 
        }  
        

        if($endorsment == 'Digi'){
            $endorsment = 'Digital';
        }else if($endorsment == 'SSB'){
            $endorsment = 'Phone';
        }else{
            $endorsment = "Mixed";
        }
        $row_tgl = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
        
        if ($row_tgl) {
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'band' => $row_tgl->type_certificate
        );
        
    

        $html = $this->load->view('user/certificate_bronze',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
        } 

    }

    //Untuk cetak certificate silver per mode Dan Band
    public function silver($endorsment){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  

        // var_dump($this->input->post('id_certificate'));die();
        /*  $data['nama'] = $this->input->post('nama');*/
        $data['callsign'] = $this->input->post('callsign');
        $nama =  $this->input->post('nama');
        $id_certificate =  $this->input->post('id_certificate');
        /* $data['rangking'] = $this->input->post('rangking');*/
        $call =  $this->input->post('callsign');

        $numrows = $this->logbook_model->get_jumlah_baris($call);
        $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>$id_certificate))->num_rows();
                // var_dump($id_certificate);die();

        if($exist != "0"){

        $nomor = $this->logbook_model->get_number_award_silver($call, $id_certificate);
        
        
        }else{
            
        
        $kode = $this->logbook_model->code_otomatis();

        $isi= array( 'callsign' => $call ,
                        'date' => date('d-M-Y') ,
                        'number_certificate' =>  $kode,
                        'type_certificate' => $id_certificate);
        $this->logbook_model->insert_certificate($isi); 
        }  
        

        if($endorsment == 'Digi'){
            $endorsment = 'Digital';
        }else if($endorsment == 'SSB'){
            $endorsment = 'Phone';
        }else{
            $endorsment = $endorsment;
        }
        $row_tgl = $this->logbook_model->get_number_award_silver($call, $id_certificate);
        // var_dump($row_tgl);die();
        
        if ($row_tgl) {
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'band' => $row_tgl->type_certificate
        );
    

        $html = $this->load->view('user/certificate_silver',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
        } 

    }

    //Untuk cetak certificate gold per mode Dan Band
    public function gold($endorsment){
            ini_set('memory_limit', '256M');
            // load library
            $this->load->library('certificate');
            $this->load->model('logbook_model');
            $pdf = $this->certificate->load();  
    
        /*  $data['nama'] = $this->input->post('nama');*/
            $data['callsign'] = $this->input->post('callsign');
            $id_certificate =  $this->input->post('id_certificate');
            // var_dump($id_certificate);die();
            $nama =  $this->input->post('nama');
        /* $data['rangking'] = $this->input->post('rangking');*/
            $call =  $this->input->post('callsign');

            $numrows = $this->logbook_model->get_jumlah_baris($call);
            $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>$id_certificate))->num_rows();

            if($exist != "0"){

            $nomor = $this->logbook_model->get_number_award_gold($call, $id_certificate);
            // var_dump($nomor);die();
            
            
            }else{
                
            
            $kode = $this->logbook_model->code_otomatis();

            $isi= array( 'callsign' => $call ,
                            'date' => date('d-M-Y') ,
                            'number_certificate' =>  $kode,
                            'type_certificate' => $id_certificate);
            $this->logbook_model->insert_certificate($isi); 
            }  
            
            if($endorsment == 'Digi'){
                $endorsment = 'Digital';
            }else if($endorsment == 'SSB'){
                $endorsment = 'Phone';
            }else{
                $endorsment = $endorsment;
            }
            $row_tgl = $this->logbook_model->get_number_award_gold($call,$id_certificate);
            
            if ($row_tgl) {
                $data = array(
                'tgl' => $row_tgl->date,
                'nomor' => $row_tgl->number_certificate,
                'callsign' =>  $row_tgl->callsign,
                'nama' =>  $nama,
                'endorsment' => $endorsment,
                'id_certificate' => $id_certificate,
                'band' => $row_tgl->type_certificate
            );
            
        

            $html = $this->load->view('user/certificate_gold',$data, true);
                // render the view into HTML
            $pdf->WriteHTML($html);
                // write the HTML into the PDF
            $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
            $pdf->Output("$output", 'I');
            } 

    }

    //Untuk cetak certificate bronze per Mode saja
    public function bronze_mode($endorsment){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  

        // var_dump($this->input->post('id_certificate'));die();
        /*  $data['nama'] = $this->input->post('nama');*/
        $data['callsign'] = $this->input->post('callsign');
        $nama =  $this->input->post('nama');
        $id_certificate =  $this->input->post('id_certificate');
        /* $data['rangking'] = $this->input->post('rangking');*/
        $call =  $this->input->post('callsign');

        $numrows = $this->logbook_model->get_jumlah_baris($call);
        $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>$id_certificate))->num_rows();
                // var_dump($id_certificate);die();

        if($exist != "0"){

        $nomor = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
        
        
        }else{
            
        
        $kode = $this->logbook_model->code_otomatis();

        $isi= array( 'callsign' => $call ,
                        'date' => date('d-M-Y') ,
                        'number_certificate' =>  $kode,
                        'type_certificate' => $id_certificate);
        $this->logbook_model->insert_certificate($isi); 
        }  
        

        if($endorsment == 'Digi'){
            $endorsment = 'Digital';
        }else if($endorsment == 'SSB'){
            $endorsment = 'Phone';
        }else{
            $endorsment = $endorsment;
        }
        $row_tgl = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
        
        if ($row_tgl) {
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'id_certificate' => $id_certificate,
            'band' => $row_tgl->type_certificate
    );
        
    

        $html = $this->load->view('user/certificate_bronze_mode',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
        } 

    }
    
    //Untuk cetak certificate silver per Mode saja
    public function silver_mode($endorsment){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  

        // var_dump($this->input->post('id_certificate'));die();
        /*  $data['nama'] = $this->input->post('nama');*/
        $data['callsign'] = $this->input->post('callsign');
        $nama =  $this->input->post('nama');
        $id_certificate =  $this->input->post('id_certificate');
        /* $data['rangking'] = $this->input->post('rangking');*/
        $call =  $this->input->post('callsign');

        $numrows = $this->logbook_model->get_jumlah_baris($call);
        $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>$id_certificate))->num_rows();
                // var_dump($id_certificate);die();

        if($exist != "0"){

        $nomor = $this->logbook_model->get_number_award_silver($call, $id_certificate);
        
        
        }else{
            
        
        $kode = $this->logbook_model->code_otomatis();

        $isi= array( 'callsign' => $call ,
                        'date' => date('d-M-Y') ,
                        'number_certificate' =>  $kode,
                        'type_certificate' => $id_certificate);
        $this->logbook_model->insert_certificate($isi); 
        }  
        

        if($endorsment == 'Digi'){
            $endorsment = 'Digital';
        }else if($endorsment == 'SSB'){
            $endorsment = 'Phone';
        }else{
            $endorsment = $endorsment;
        }
        $row_tgl = $this->logbook_model->get_number_award_silver($call, $id_certificate);
        // var_dump($row_tgl);die();
        
        if ($row_tgl) {
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment,
            'id_certificate' => $id_certificate,
            'band' => $row_tgl->type_certificate
                );
    

        $html = $this->load->view('user/certificate_silver_mode',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output("$output", 'I');
        } 

    }

    //Untuk cetak certificate gold per Mode saja
    public function gold_mode($endorsment){
            ini_set('memory_limit', '256M');
            // load library
            $this->load->library('certificate');
            $this->load->model('logbook_model');
            $pdf = $this->certificate->load();  
    
        /*  $data['nama'] = $this->input->post('nama');*/
            $data['callsign'] = $this->input->post('callsign');
            $id_certificate =  $this->input->post('id_certificate');
            // var_dump($id_certificate);die();
            $nama =  $this->input->post('nama');
        /* $data['rangking'] = $this->input->post('rangking');*/
            $call =  $this->input->post('callsign');

            $numrows = $this->logbook_model->get_jumlah_baris($call);
            $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>$id_certificate))->num_rows();

            if($exist != "0"){

            $nomor = $this->logbook_model->get_number_award_gold($call, $id_certificate);
            // var_dump($nomor);die();
            
            
            }else{
                
            
            $kode = $this->logbook_model->code_otomatis();

            $isi= array( 'callsign' => $call ,
                            'date' => date('d-M-Y') ,
                            'number_certificate' =>  $kode,
                            'type_certificate' => $id_certificate);
            $this->logbook_model->insert_certificate($isi); 
            }  
            
            if($endorsment == 'Digi'){
                $endorsment = 'Digital';
            }else if($endorsment == 'SSB'){
                $endorsment = 'Phone';
            }else{
                $endorsment = $endorsment;
            }
            $row_tgl = $this->logbook_model->get_number_award_gold($call,$id_certificate);
            
            if ($row_tgl) {
                $data = array(
                'tgl' => $row_tgl->date,
                'nomor' => $row_tgl->number_certificate,
                'callsign' =>  $row_tgl->callsign,
                'nama' =>  $nama,
                'endorsment' => $endorsment,
                'id_certificate' => $id_certificate,
                'band' => $row_tgl->type_certificate
                );
            
        

            $html = $this->load->view('user/certificate_gold_mode',$data, true);
                // render the view into HTML
            $pdf->WriteHTML($html);
                // write the HTML into the PDF
            $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
            $pdf->Output("$output", 'I');
            } 

    }

    public function download_all($endorsment){
        ini_set('memory_limit', '256M');
        // load library
        $this->load->library('certificate');
        $this->load->model('logbook_model');
        $pdf = $this->certificate->load();  

        $data['callsign'] = $this->input->post('callsign');
        $nama =  $this->input->post('nama');
        $id_certificate =  $this->input->post('id_certificate');
        $call =  $this->input->post('callsign');

        $numrows = $this->logbook_model->get_jumlah_baris($call);
        $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>$id_certificate))->num_rows();

        if($exist != "0"){

        $nomor = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
        
        
        }else{
            
        
        $kode = $this->logbook_model->code_otomatis();

        $isi= array( 'callsign' => $call ,
                        'date' => date('d-M-Y') ,
                        'number_certificate' =>  $kode,
                        'type_certificate' => $id_certificate);
        $this->logbook_model->insert_certificate($isi); 
        }  
        

        if($endorsment == 'Digi'){
            $endorsment = 'Digital';
        }else if($endorsment == 'SSB'){
            $endorsment = 'Phone';
        }else{
            $endorsment = $endorsment;
        }
        $row_tgl = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
        
        if ($row_tgl) {
            $data = array(
            'tgl' => $row_tgl->date,
            'nomor' => $row_tgl->number_certificate,
            'callsign' =>  $row_tgl->callsign,
            'nama' =>  $nama,
            'endorsment' => $endorsment
        );
        
    

        $html = $this->load->view('user/certificate_bronze_mode',$data, true);
            // render the view into HTML
        $pdf->WriteHTML($html);
            // write the HTML into the PDF
        $output = 'certificate' . date('Y_m_d_H_i_s') . '_.pdf';
        $pdf->Output(FILE_PATH .$output,'F');

        $this->load->library('zip');
        $name = 'mydata1.txt';
        $data = 'A Data String!';
        $this->zip->read_file(FILE_PATH.$output, FALSE);
        
        // Write the zip file to a folder on your server. Name it "my_backup.zip"
        $unique = '4ts5yegq;';
        $text = 'I am zorro ...';
        $this->zip->archive(FILE_PATH.$unique.'certificate.zip'); 
        
        ob_end_clean();
        $this->zip->download($unique.'certificate.zip');
        } 

    }
    
    public function operator_old($call)
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

    public function award()
    {

        ini_set('memory_limit', -1);

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
                $data['jns'] = "Congratulations you got the Basic Certificate";

                $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>'bronze'))->num_rows();

                if($exist != "0"){

                 //   $nomor = $this->logbook_model->get_number_award_bronze($call, $id_certificate);
                

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
                $data['jns'] = "Congratulations you got the Silver Certificate";  

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
                $data['jns'] = "Congratulations you got the Gold Certificate";

   

                $exist = $this->db->get_where('certificate', array('callsign' =>$call,'type_certificate'=>'gold'))->num_rows();

                if($exist != "0"){

                // $nomor = $this->logbook_model->get_number_award_gold($call, $id_certifate);
                

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
            $this->load->view('layout/header2',$data);
            $this->load->view('user/awards2',$data);
            $this->load->view('layout/footer');

    }
    
public function certificate_operator()
{

    $this->load->model('logbook_model');
        
    $call = $this->input->post('callsign');

    $row = $this->db->get_where('operator', array('callsign' => $call))->row('callsign');

   
    if($row) {
        $data['action'] = site_url('search/certificate');
        $data['page_title'] = "Certificate";
        $data['callsign'] = $row ;
        $data['css'] = 'callsign.css';

        $this->load->view('layout/header', $data);
        $this->load->view('operator/congratulations',$data);
        $this->load->view('layout/footer');
      
      


      
      
     
    }else{
      
        $this->load->view('operator/no_data');
      
    }

  

}

public function certificate()
{
        ini_set('memory_limit', '256M');
         $this->load->model('logbook_model');
        // load library
        $this->load->library('certificate');

        $nama =  $this->input->post('nama');
        $call =  $this->input->post('callsign');

        $hasil = str_replace("-", "/",$call);

        $data = array(

            'callsign' =>  $hasil ,
            'nama' =>  $nama
        );

      
       $pdf = $this->certificate->load();  
         
        $html = $this->load->view('operator/certificate',$data, true);
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


public function opt_search()
{
    $action = $this->input->post('optSearch');

   // print_r($action);
    if($action =='1')
    {
        $call = $this->input->post('callsign');
       $this->get_log($call);

    }elseif($action =='2'){
        $call = $this->input->post('callsign');
        
        $this->award($call);
       // redirect(site_url() . "/search2/award/" . $call);
      //  redirect(base_url())search2/award/($call);
    }else{
        $call = $this->input->post('callsign');
        $this->certificate_operator($call);
    }
}

}
