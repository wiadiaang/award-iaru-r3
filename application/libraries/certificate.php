<?php defined('BASEPATH') or exit('No direct script access allowed');

class certificate {
 
    function pdf()
    {
        $CI = & get_instance();
        log_message('Debug', 'mPDF class is loaded.');
    }
 
    function load($param=NULL)
    {
        include_once APPPATH.'/third_party/mpdf/mpdf.php';
 
   
           /* $param = "'utf-8','A4-L', 0, '', 0, 0, 0, 0, 0, 0";*/
           // $param = "'','', 0,'',15,15,16,16,9,9,'L'"; 

        return new mPDF('utf-8','A4-L', 0,0, 0, 0, 0, 0,'L');
       // return new mPDF('utf-8',array(1280,824));
        
    }
}