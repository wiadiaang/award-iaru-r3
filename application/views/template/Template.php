<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php // echo $title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon icon -->
<link rel="icon" type="image/png" href="http://awards-iaru-r3.org/assets/img/icon.png">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>backend/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/icon/icofont/css/icofont.css">
    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/icon/simple-line-icons/css/simple-line-icons.css">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/css/bootstrap.min.css">
    <!-- Chartlist chart css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/charts/chartlist/css/chartlist.css" type="text/css" media="all">
    <!-- Weather css -->
    <link href="<?php echo base_url(); ?>backend/css/svg-weather.css" rel="stylesheet">
    <!-- Echart js -->
    <script src="<?php echo base_url(); ?>backend/plugins/charts/echarts/js/echarts-all.js"></script>
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/css/main.css">
    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/css/responsive.css">
    <!--color css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/css/color/color-1.css" id="color"/>

        <!-- Summernote CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/plugins/summernote/css/summernote.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/plugins/select2/css/s2-docs.css">

    <!-- Multi Select css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/multi-select/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/multi-select/css/multi-select.css" />
        <!-- Date Picker css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/datepicker/css/bootstrap-material-datetimepicker.css" />
        <!-- Bootstrap Date-Picker css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/bootstrap-datepicker/css/bootstrap-datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/plugins/bootstrap-datepicker/css/daterangepicker.css" />

       <!-- Nv chart css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/charts/nv-chart/css/nv.d3.css" type="text/css" media="all">

     <!-- Tour CSS -->
     <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/plugins/tour/css/enjoyhint.css">

      <!-- Sweetalert CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>backend/plugins/sweetalert/css/sweetalert.css">
</head>
<body class="sidebar-mini fixed">
<div class="wrapper">
    <!-- Navbar-->
    <header class="main-header-top hidden-print" style="background: #fff;">
         <a href="#" class="logo"><img style="height: 40px;" class="img-fluid able-logo" src="http://awards-iaru-r3.org/assets/img/logo.png" alt="Theme-logo"></a> 
        <nav class="navbar navbar-static-top" style="background: #CC1B22;">
            <!-- Sidebar toggle button--><a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu">
                <ul class="top-nav">
                    <!--Notification Menu-->

                    <li class="dropdown notification-menu">

                    </li>

                    <!-- window screen -->
                    <li class="pc-rheader-submenu">
                        <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                            <i class="icon-size-fullscreen"></i>
                        </a>
                    </li>
                    <!-- User Menu-->
                    <li class="dropdown">
                        <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                            <span>

                                                   
                                                                     
                                                                <img class="img-circle " src="<?php echo base_url();?>backend/images/avatar-1.png"  style="width:40px; height:40px;" alt="User Image" >

                                                               


                           </span>
                            <span><?php echo $this->session->userdata('firstname');?></b> <i class=" icofont icofont-simple-down"></i></span>
                        </a>
                        <ul class="dropdown-menu settings-menu">
                           <!--  <li><a href="#!"><i class="icon-settings"></i> Settings</a></li> -->
                            <li><a  href="<?php echo site_url('user/profile');?>" ><i class="icon-user"></i> Profile</a></li>
                           <!--  <li><a href="message.html"><i class="icon-envelope-open"></i> My Messages</a></li> -->
                            <li class="p-0">
                                <div class="dropdown-divider m-0"></div> 
                            </li>
                           <!--  <li><a href="lock-screen.html"><i class="icon-lock"></i> Lock Screen</a></li> -->
                            <li><a href="<?php echo site_url('user/logout');?>"><i class="icon-logout"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- search -->
                <div id="morphsearch" class="morphsearch">

                    <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
                </div>
                <!-- search end -->
            </div>
        </nav>
    </header>
    <!-- Side-Nav-->
    <aside class="main-sidebar hidden-print " >
        <section class="sidebar" id="sidebar-scroll">
            <div class="user-panel">
                <div class="f-left image">

                                                           
                                                                     
                    <img  class="img-circle" src="<?php echo base_url();?>backend/images/avatar-1.png" alt="User Image"  style="width:40px; height:40px;">

                                                               

            
                </div>
                <div class="f-left info">
                    <p>Welcome </p>
                    <p class="designation">Logged in as <?php echo $this->session->userdata('user_callsign'); ?><i class="icofont icofont-caret-down m-l-5"></i></p>
                </div>
            </div>
            <!-- sidebar profile Menu-->
            <ul class="nav sidebar-menu extra-profile-list">
                <li>
                    <a class="waves-effect waves-dark"  href="<?php echo site_url('user/profile');?>" title="Profile">
                        <i class="icon-user"></i>
                        <span class="menu-text">View Profile</span>
                        <span class="selected"></span>
                    </a>
                </li>

                <li>
                 
                    <a class="waves-effect waves-dark" href="<?php echo site_url('user/logout');?>" title="Logout">
                        <i class="icon-logout"></i>
                        <span class="menu-text">Logout</span>
                        <span class="selected"></span>
                    </a>
                </li>
            </ul>
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
                <li class="nav-level">Navigation</li>
       <!--          <li class="active treeview">
                    <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/Dashboard">
                        <i class="icon-speedometer"></i><span> Dashboard</span> <i class="icon-arrow-down"></i> -->
                   <!-- </a>
                </li> -->
               
  
         

           

               

               

                 


                <li><a href="<?php echo site_url('logbook');?>"><i class="icon-docs"></i><span> Logbook </span></a> </li>
          
    <!--             <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-speech"></i><span>QSOs</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="<?php echo site_url('qso');?>"><i class="icon-arrow-right"></i> Live QSOs</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo site_url('qso/manual');?>"><i class="icon-arrow-right"></i> Post QSOs</a></li>
                    </ul>
                </li> -->

                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-speech"></i><span>Upload/Download</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                    <li><a class="waves-effect waves-dark" href="#"><i class="icon-arrow-right"></i>Upload Logbook</a></li>
                        <li><a class="waves-effect waves-dark" href="#"><i class="icon-arrow-right"></i>Upload Logbook Satellite</a></li>
                        <!-- <li><a class="waves-effect waves-dark" href="<?php echo site_url('adif/import');?>"><i class="icon-arrow-right"></i>Upload Logbook</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo site_url('adif/import_log_satelit');?>"><i class="icon-arrow-right"></i>Upload Logbook Satellite</a></li> -->
                        <!-- <li><a class="waves-effect waves-dark" href="<?php echo site_url('adif/export');?>"><i class="icon-arrow-right"></i>Download Logbook</a></li> -->
                        <!--  <li><a class="waves-effect waves-dark" href="<?php echo site_url('export');?>"><i class="icon-arrow-right"></i> DATA export</a></li>
                         <li><a class="waves-effect waves-dark" href="<?php echo site_url('eqsl/import');?>"><i class="icon-arrow-right"></i> eQSL Import</a></li>
                         <li><a class="waves-effect waves-dark" href="<?php echo site_url('eqsl/export');?>"><i class="icon-arrow-right"></i> eQSL Export</a></li>
                          <li><a class="waves-effect waves-dark" href="<?php echo site_url('lotw/import');?>"><i class="icon-arrow-right"></i> LoTW Import</a></li>
                          <li><a class="waves-effect waves-dark" href="<?php echo site_url('api/help');?>"><i class="icon-arrow-right"></i> API</a></li> -->
                    </ul>
                </li>

<!--                 <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-speech"></i><span>Contest</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="<?php echo site_url('awards');?>"><i class="icon-arrow-right"></i> Award</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo site_url('dxcluster');?>"><i class="icon-arrow-right"></i> Cluster </a></li>
                    </ul>
                </li> -->

                <!-- <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-speech"></i><span>Notes</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="<?php echo site_url('notes');?>"><i class="icon-arrow-right"></i> View Notes</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo site_url('notes/add');?>"><i class="icon-arrow-right"></i> Create Notes </a></li>
                    </ul>
                </li> -->
                <li><a href="<?php echo site_url('statistics');?>"><i class="icon-chart"></i><span> Statistics </span></a> </li>
                
                <?php 
              
                   if($this->session->userdata('user_type') == '3') {

                    $id_user = $this->db->get_where('users', array('user_name'=>$this->session->userdata('user_name')))->row()->user_id;
          
                 }else if($this->session->userdata('user_type') == '1'){
                    $id_user = $this->db->get_where('users', array('user_callsign'=>$this->session->userdata('user_callsign')))->row()->user_id;
                     
                     
                 }else{
                   
                    $id_user = $this->db->get_where('users', array('user_callsign'=>$this->session->userdata('user_callsign')))->row()->user_id;
                     
                     ?>
                    
                    
                <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-speech"></i><span>Admin</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="<?php echo site_url('user');?>"><i class="icon-arrow-right"></i> Users</a></li>

                        <li><a class="waves-effect waves-dark" href="<?php echo site_url('radio');?>"><i class="icon-arrow-right"></i> Radio</a></li>

                        <li><a class="waves-effect waves-dark" href="<?php echo site_url('backup');?>"><i class="icon-arrow-right"></i> Back up</a></li>

                        <li><a class="waves-effect waves-dark" href="<?php echo site_url('adif/import');?>"><i class="icon-arrow-right"></i> ADIF Import</a></li>
                        <li><a class="waves-effect waves-dark" href="<?php echo site_url('adif/export');?>"><i class="icon-arrow-right"></i> ADIF Export</a></li>
                         <li><a class="waves-effect waves-dark" href="<?php echo site_url('export');?>"><i class="icon-arrow-right"></i> DATA export</a></li>
                         <li><a class="waves-effect waves-dark" href="<?php echo site_url('eqsl/import');?>"><i class="icon-arrow-right"></i> eQSL Import</a></li>
                         <li><a class="waves-effect waves-dark" href="<?php echo site_url('eqsl/export');?>"><i class="icon-arrow-right"></i> eQSL Export</a></li>
                          <li><a class="waves-effect waves-dark" href="<?php echo site_url('lotw/import');?>"><i class="icon-arrow-right"></i> LoTW Import</a></li>
                          <li><a class="waves-effect waves-dark" href="<?php echo site_url('api/help');?>"><i class="icon-arrow-right"></i> API</a></li>
                    </ul>
                </li>
          
             <?php   }
                    
                  
                   
                    ?>

            <li class="jotour" ><a href="<?php echo site_url();?>/user/edit/<?php echo $id_user ;?>"><i class="icon-lock"></i><span> Change Password </span></a> </li>
            <li><a href="<?php echo site_url();?>/user/logout"><i class="icon-logout"></i><span> Logout </span></a> </li>

            </ul>
        </section>
    </aside>

    <div class="showChat_inner">
        <div class="media chat-inner-header">
            <a class="back_chatBox">
                <i class="icofont icofont-rounded-left"></i> Josephin Doe
            </a>
        </div>
        <div class="media chat-messages">
            <a class="media-left photo-table" href="#!">
                <img class="media-object img-circle m-t-5" src="backend/images/avatar-1.png" alt="Generic placeholder image">
                <div class="live-status bg-success"></div>
            </a>
            <div class="media-body chat-menu-content">
                <div class="">
                    <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                    <p class="chat-time">8:20 a.m.</p>
                </div>
            </div>
        </div>
        <div class="media chat-messages">
           <div class="media-body chat-menu-reply">
                <div class="">
                    <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                    <p class="chat-time">8:20 a.m.</p>
                </div>
            </div>
            <div class="media-right photo-table">
                <a href="#!">
                    <img class="media-object img-circle m-t-5" src="backend/images/avatar-2.png" alt="Generic placeholder image">
                    <div class="live-status bg-success"></div>
                </a>
            </div>
        </div>
        <div class="media chat-reply-box">
            <div class="md-input-wrapper">
                <input type="text" class="md-form-control" id="inputEmail" name="inputEmail" >
                <label>Share your thoughts</label>
                <span class="highlight"></span>
                <span class="bar"></span>
            </div>
        </div>
    </div>
    <!-- Sidebar chat end-->
    <div class="content-wrapper">
        <!-- Container-fluid starts -->
        <!-- Main content starts -->
       <?php $this->load->view($main); ?>
        <!-- Main content ends -->
        <!-- Container-fluid ends -->
    </div>
</div>

<!-- Required Jqurey -->
<script src="<?php echo base_url(); ?>backend/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo base_url(); ?>backend/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>backend/js/tether.min.js"></script>
<!-- Required Fremwork -->
<script src="<?php echo base_url(); ?>backend/js/bootstrap.min.js"></script>
<!-- waves effects.js -->
<script src="<?php echo base_url(); ?>backend/plugins/waves/js/waves.min.js"></script>
<!-- Scrollbar JS-->
<script src="<?php echo base_url(); ?>backend/plugins/slimscroll/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/slimscroll/js/jquery.nicescroll.min.js"></script>
<!--classic JS-->
<script src="<?php echo base_url(); ?>backend/plugins/search/js/classie.js"></script>
<!-- notification -->
<script src="<?php echo base_url(); ?>backend/plugins/notification/js/bootstrap-growl.min.js"></script>
<!-- Sparkline charts -->
<script src="<?php echo base_url(); ?>backend/plugins/charts/sparkline/js/jquery.sparkline.js"></script>
<!-- Counter js  -->
<script src="<?php echo base_url(); ?>backend/plugins/countdown/js/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/countdown/js/jquery.counterup.js"></script>
<!-- custom js -->

    <!-- Tags css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>backend/plugins/tags/css/bootstrap-tagsinput.css" />
<!-- data-table js -->
<!-- Tags js -->


<script src="<?php echo base_url(); ?>backend/plugins/data-table/js/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url(); ?>backend/plugins/data-table/js/dataTables.buttons.min.js"></script>

<script src="<?php echo base_url(); ?>backend/plugins/data-table/js/jszip.min.js"></script>

<script src="<?php echo base_url(); ?>backend/plugins/data-table/js/pdfmake.min.js"></script>

<script src="<?php echo base_url(); ?>backend/plugins/data-table/js/vfs_fonts.js"></script>

<script src="<?php echo base_url(); ?>backend/plugins/data-table/js/buttons.print.min.js"></script>

<script src="<?php echo base_url(); ?>backend/plugins/data-table/js/buttons.html5.min.js"></script>

<script src="<?php echo base_url(); ?>backend/plugins/data-table/js/dataTables.bootstrap4.min.js"></script>

<script src="<?php echo base_url(); ?>backend/plugins/data-table/js/dataTables.responsive.min.js"></script>

<script src="<?php echo base_url(); ?>backend/plugins/data-table/js/responsive.bootstrap4.min.js"></script>


        <script src="<?php echo base_url(); ?>backend/plugins/select2/js/select2.full.min.js"></script>
        <script src="<?php echo base_url(); ?>backend/plugins/multi-select/js/bootstrap-multiselect.js"></script>
        <script src="<?php echo base_url(); ?>backend/plugins/multi-select/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>backend/plugins/multi-select/js/jquery.quicksearch.js"></script>

<script src="<?php echo base_url(); ?>backend/js/Moment.js"></script> 



    <!-- Bootstrap Datepicker js -->
      <script type="text/javascript" src="<?php echo base_url(); ?>backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="<?php echo base_url(); ?>backend/plugins/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js"></script>

        <!-- bootstrap range picker -->
        <script type="text/javascript" src="<?php echo base_url(); ?>backend/plugins/bootstrap-datepicker/js/daterangepicker.js"></script>

    <script src="<?php echo base_url(); ?>backend/plugins/tags/js/bootstrap-tagsinput.js"></script>
<!-- custom js -->


<script src="<?php echo base_url(); ?>backend/pages/data-table.js"></script>

<!-- Gallery js -->
<script src="<?php echo base_url(); ?>backend/plugins/gallery/js/lightgallery.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/gallery/js/lg-fullscreen.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/gallery/js/lg-thumbnail.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/gallery/js/lg-video.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/gallery/js/lg-autoplay.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/gallery/js/lg-zoom.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/gallery/js/lg-hash.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/gallery/js/lg-pager.js"></script>
<!-- Date picker.js -->
<script src="<?php echo base_url(); ?>backend/plugins/datepicker/js/moment-with-locales.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/datepicker/js/bootstrap-material-datetimepicker.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>backend/pages/social.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/pages/dashboard.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/pages/elements.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>backend/pages/advance-form.js"></script>
<script src="<?php echo base_url(); ?>backend/js/menu.js"></script>

<!-- SUMER NOTE -->
<script src="<?php echo base_url(); ?>backend/plugins/summernote/js/summernote.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/summernote/js/email-compose.js"></script>

<!--classic JS-->
<script type="text/javascript" src="<?php echo base_url(); ?>backend/plugins/search/js/classie.js"></script>

<!-- NV chart -->
<script src="<?php echo base_url(); ?>backend/plugins/charts/nv-chart/js/d3.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/charts/nv-chart/js/nv.d3.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/charts/nv-chart/js/stream_layers.js"></script>
<script src="<?php echo base_url(); ?>backend/pages/chart-nvd3.js"></script>

<!-- Tour js files-->
<script src="<?php echo base_url(); ?>backend/plugins/tour/js/kinetic-v5.1.0.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/tour/js/enjoyhint.min.js"></script>

        <!-- Sweetalert js -->
        <script src="<?php echo base_url(); ?>backend/plugins/sweetalert/js/sweetalert.js"></script>



<?php 


if($this->session->userdata('user_type') == '3') {

 
$up = $this->db->get_where('users',array('user_name'=>$this->session->userdata('user_name')))->row('up');

}else{
 
$up = $this->db->get_where('users',array('user_callsign'=>$this->session->userdata('user_callsign')))->row('up');
  
}
        if($up == 1 ){  // echo $up ; ?>


        <script src="<?php echo base_url(); ?>backend/pages/tour.js"></script>
            

       <?php }else{
       }

      // echo $up ;
        
        ?>

 <script type="text/javascript">



function confirmDelete(id){

	
	swal({
			title: "Are You Sure?",
			text: "Delete Merchant",
			type: "info",
			showCancelButton: true,
			confirmButtonText: 'OK',
			closeOnConfirm: true,
			showLoaderOnConfirm: true
		}, 


		function (isConfirm) {
			 if (isConfirm) {
			 	$.ajax({
				url: <?php base_url()?>"merchant/delete/" + id,
				type: "POST",

				success: function () {
						swal({
						title: "Done!",
						text: "It was succesfully deleted!",
						type: "success",
						showCancelButton: false,
						confirmButtonText: 'OK',
						closeOnConfirm: true,
						showLoaderOnConfirm: true
					},
					function (isConfirm) {

						 location.reload();
					});
                    //swal("Done!", "It was succesfully deleted!", "success");
                   
                },
                 error: function (xhr, ajaxOptions, thrownError) {
                    swal("Error deleting!", "Please try again", "error");
                }

			});
			 
			 }else {
			    swal("Cancelled", "Cancel Delete", "error");
			  }
			
        });
		
}



</script>


<script>
    
$( ".date" ).datepicker({
   format: 'yyyy-mm-dd'
});
</script>


</body>
</html>