<!DOCTYPE html>

<html class="no-js">


<head>
      <title>YB72RI - ORARI</title>
	     <meta name="description" content="">
		 <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animations.css"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.css"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css" class="color-switcher-link"/>
		<script src="<?php echo base_url();?>assets/js/vendor/modernizr-2.6.2.min.js"></script>
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
					<center><h2>CERTIFICATE WILL BE AVAILABLE ON 18 AUG 2017</h2></center>
					</div>
				</div>
			</section>

		</div>
		<!-- eof #box_wrapper -->
	</div>

	<script src="<?php echo base_url();?>js/compressed.js"></script>
	<script src="<?php echo base_url();?>js/main.js"></script>

	<!-- Google Map Script -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTwYSMRGuTsmfl2z_zZDStYqMlKtrybxo"></script>
</body>
</html>
	