<!DOCTYPE html>

<html class="no-js">


<head>
      <title>The IARU Region 3  50th Anniversary </title>
	     <meta name="description" content="">
		 <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.ico"/>
        <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.ico"/>

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animations.css"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.css"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css" class="color-switcher-link"/>
		<script src="<?php echo base_url();?>assets/js/vendor/modernizr-2.6.2.min.js"></script>

		<style type="text/css">
			
			table {
				    width: 100%;
				    border: 1px solid #ddd;
				}

				th {
				    height: 10px;
				    text-align: center;
				    background-color: #CF1717;
                    color: #fff !important;
                 }
                 td {
				    height: 10px;
				    vertical-align: bottom;
				    text-align: center;
				    font-size: 14px;
				   /* border: 1px solid #ddd;*/
				}
				th, td {
				    border-bottom: 1px solid #ddd;
				}
			/*	tr:hover {background-color: #CF1717}*/
				tr:nth-child(even){background-color: #f2f2f2; height: 5px;}
		</style>
</head>

<body>

	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">
				<i class="rt-icon2-cross2"></i>
			</span>
		</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form form-inline" action="">
				<div class="form-group">
					<input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
				</div>
				<button type="submit" class="theme_button">Search</button>
			</form>
		</div>
	</div>

		<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls with_padding">


		</div>
	</div>

		<div id="canvas">
		<div id="box_wrapper">

			
			<!-- <?php $this->load->view('home/header') ?> -->
			<?php $this->load->view('home/menu') ?>

			

			<section id="services" class="ls ms overflow_hidden half_section section_padding_top_20 section_padding_bottom_20 columns_padding_20">
				<div class="container">
					<div class="row">

						<form action="<?php echo site_url('search/get_certificate/'); ?> " class="contact-form columns_margin_bottom_20" method="post" action="" target="_blank">
						<div class="col-md-4 text-center text-md-left">
							<h4>Check Certificate</h4>
							<div class="form-group">
								<label for="pickup-name">Check Certificate
									<span class="required">*</span>
								</label>
								<i class="fa fa-user highlight2" aria-hidden="true"></i>
								<input type="text" aria-required="true" value="" name="callsign" id="callsign" class="form-control" placeholder="Your Callsign">
							</div>
							<div class="contact-form-submit text-md-right">
								<button type="submit" id="" name="contact_submit" class="theme_button color1">Search</button>
							</div>
							<div style="margin-top: 20px;">
								<h4>QSO Summary</h4>
								<a style="width: 100%;" class="theme_button color1" href="http://awards-iaru-r3.org/index.php/result">CHECK</a>
							</div>
							<div style="margin-top: 20px;">
								<h4>World Ranking</h4>
								<a style="width: 100%;" class="theme_button color1" href="http://awards-iaru-r3.org/index.php/counting">CHECK</a>
							</div>
							<div style="margin-top: 20px;">
								<h4>Statistic</h4>
								<a style="width: 100%;" class="theme_button color1" href="http://awards-iaru-r3.org/index.php/statistics/show_cart">CHECK</a>
							</div>

							 <div style="margin-top: 20px;">
								<h4>Station Summary</h4>
								<table>
								<thead>
									<th>Station</th>
									<th>QSO</th>
									<th>Ranking</th>
								</thead>
								<tbody>
									
										<?php  $i = 0;  foreach ($rangking as $row) { ?>
										<tr>
											<td><?php echo $row->CallSignImport; ?></td>
											<td><?php echo $row->S; ?></td>
											<td style=""><?php echo $row->rownum; ?></td>
										</tr>
										<?php } ?>
								
								</tbody>
							
								</table>
							</div> 


			


							<div style="margin-top: 20px;">
								<img src="<?php echo base_url();?>assets/images/special_event_yb72ri.jpg">
							</div>
						</div>
						</form>

						<div class="col-md-8">
							<img src="<?php echo base_url();?>assets/images/yb72ri_rules.jpg" />
						</div>
					</div>
									<div class="row">

							 <div class="col-md-6 text-center text-md-left">
	                              <div style="margin-top: 20px;">
									<h4>Top 10 World Ranking</h4>
									<table>
									<thead>
									    <th>CallSign</th>
									    <th>QSO</th>
										<th>Ranking</th>
									
										
										
									</thead>
									<tbody>
										
											<?php  foreach ($callrangking as $row) { ?>
											<tr>
												<td><?php echo $row->COL_CALL; ?><!-- <a class="qsobox" href="<?php echo site_url('logbook/view')."/".$row->COL_PRIMARY_KEY; ?>"><?php echo $row->COL_CALL; ?></a> --></td>
												<td><?php echo $row->S; ?></td>
											    <td style=""><?php echo $row->rownum; ?></td>
											
											
												
											</tr>
											<?php } ?>
									
									</tbody>
								
									</table>
									<p><span style="margin-top: 20px; color: red;">QSO : only valid QSO will be counted, based on each band and each mode at different stations. No Duplication QSO is counted</span></p>
								</div> 
							</div>

						     <div class="col-md-6 text-center text-md-left">


                              <div style="margin-top: 20px;">
								<h4>Certificate Operator</h4>
								<table>
								<thead>
								    <th>No</th>
								    <th>CallSign</th>
								    <th>Operator Name</th>
								
								
									
									
								</thead>
								<tbody>
									
										<?php $start=0; foreach ($operator as $row) { ?>
										<tr>
										<td><?php echo ++$start; ?></td>
											<td>
											<?php $tes = str_replace("/", "-",$row->callsign );?>

											 <a class="qsobox" href="<?php echo site_url('search/operator')."/".$tes; ?>"><?php echo $row->callsign; ?></a> </td>
											<td><?php echo $row->nama_lengkap; ?></td>
										
										
										
											
										</tr>
										<?php } ?>
								
								</tbody>
							
								</table>
							
							</div> 
							</div>

							</div>
				</div>
			</section>

			<section id="services" class="ls ms overflow_hidden half_section section_padding_top_20 section_padding_bottom_20 columns_padding_20">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<img src="<?php echo base_url();?>assets/images/yb72ri_national_schedule.jpg" />
						</div>
					</div>
				</div>
			</section>

			<?php // include"static/box_latest_news.php"; ?>

			<section class="cs section_padding_top_30 section_padding_bottom_30">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-6 to_animate" data-animation="fadeInLeft">
							<div class="media small-teaser teaser inline-block">
								<div class="media-left media-middle">
									<div class="teaser_icon light_bg_color big_bg highlight round size_xsmall">
										<i class="fa fa-phone"></i>
									</div>
								</div>
								<div class="media-body media-middle">
									<span class="fontsize_20 medium black">01 123 456 789</span>
									<br>
									<span class="small-text small-spacing lightgrey">140 Horizon Circle, San Diego, CA</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 to_animate" data-animation="fadeInLeft">
							<div class="media small-teaser teaser inline-block">
								<div class="media-left media-middle">
									<div class="teaser_icon light_bg_color big_bg highlight round size_xsmall">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
								<div class="media-body media-middle">
									<span class="fontsize_20 medium black">Open Hours</span>
									<br>
									<span class="small-text small-spacing lightgrey">Weekdays 8.00-18.00, Sat: closed</span>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-6 col-sm-offset-3 col-md-offset-0 to_animate" data-animation="fadeInRight">
							<div class="widget widget_mailchimp">
								<form class="signup topmargin_10" action="http://webdesign-finder.com/html/aircool/" method="get">
									<!-- <div class="form-group-wrap"> -->
									<div class="form-group margin_0">
										<input class="mailchimp_email form-control" name="email" type="email" placeholder="Email Address">
									</div>
									<button type="submit" class="theme_button">Sign Up!</button>
									<!-- </div> -->
									<div class="response"></div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="ls page_copyright section_padding_15">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<p class="small-text regular grey">&copy; Copyright 2017 All Rights Reserved</p>
						</div>
					</div>
				</div>
			</section>

		</div>
		<!-- eof #box_wrapper -->
	</div>
<div>
	

</div>

<div id="container">

<!-- <h2>Search</h2>

<form method="post" action="" id="search_box" name="test">
	Callsign: <input type="text" id="callsign" name="callsign" value="" />
</form> -->

<div id="partial_view"></div>

</div>

<script type="text/javascript">
i=0;
$(document).ready(function(){

	$('#partial_view').load("logbook/search_result/<?php echo $this->input->post('callsign'); ?>", function() {
	      // after load trigger your fancybox 
			$(".qsobox").fancybox({
				'autoDimensions'	: false,
				'width'         	: 700,
				'height'        	: 300,
				'transitionIn'		: 'fade',
				'transitionOut'		: 'fade',
				'type'				: 'iframe'
			});

	      	$(".editbox").fancybox({
				'autoDimensions'	: false,
				'width'         	: 450,
				'height'        	: 550,
				'transitionIn'		: 'fade',
				'transitionOut'		: 'fade',
				'type'				: 'iframe',
			});
	});

  $("#callsign").keyup(function(){
	if ($(this).val()) {

		$('#partial_view').load("logbook/search_result/" + $(this).val(), function() {
				$(".qsobox").fancybox({
					'autoDimensions'	: false,
					'width'         	: 700,
					'height'        	: 300,
					'transitionIn'		: 'fade',
					'transitionOut'		: 'fade',
					'type'				: 'iframe'
				});
	 
		      // after load trigger your fancybox 
		      	$(".editbox").fancybox({
					'autoDimensions'	: false,
					'width'         	: 450,
					'height'        	: 550,
					'transitionIn'		: 'fade',
					'transitionOut'		: 'fade',
					'type'				: 'iframe',
				});
		});
	}

  });
});
</script>

	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

	<script src="<?php echo base_url();?>js/compressed.js"></script>
	<script src="<?php echo base_url();?>js/main.js"></script>

	<!-- Google Map Script -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTwYSMRGuTsmfl2z_zZDStYqMlKtrybxo"></script>
</body>
</html>
	