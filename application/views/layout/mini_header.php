<!DOCTYPE HTML>
<html>

	<head>

		<meta charset="UTF-8"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="mobile-web-app-capable" content="yes"/>
		<meta name="theme-color" content="#1a1a1a"/>
		<meta http-equiv="X-AU-Compatible" content="IE=edge, chrome=1"/>
		<meta name="title" content="IARU - 50th Anniversary"/>
		<meta name="description" content="IARU - 50th Anniversary"/>
		<meta name="author" content="Orari"/>
		<meta name="robots" content="index, follow"/>
		<meta name="googlebot" content="index, follow"/>
		<meta name="google" content="notranslate"/>
		<meta name="viewport" content="width=device-width, initial-scale=1,
									   maximum-scale=1, user-scalable=no"/>

		<title><?php echo $page_title; ?> - IARU The 50th Anniversary</title>

		<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/icon.png"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/normal.css"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/<?php echo $css ?>"/>

	</head>

	<body>

		<header>
			
			<div id="box">

				<div class="left">

					<img class="logo" src="<?php echo base_url();?>assets/img/logo.png"/>

					<span>

						<b>IARU Region 3 - 50<sup>th</sup> Anniversary</b>
						International Amateur<br/>
						Radio Union

					</span>

				</div>

				<div class="right">

	

					<ul>

						<li><a href="#">Statistic</a></li>
						<li><a href="#">QSO Summary</a></li>
						<li><a href="#">World Ranking</a></li>
						<li><a href="#">Station Summary</a></li>
						<li class="login">

							  <?php if(($this->config->item('use_auth')) && ($this->session->userdata('user_type') >= 2)) { ?>
							   <a href="#" class="dropdown-toggle"></a>
							  <ul>
						       <li><a href="<?php echo site_url('user/profile');?>" title="Profile">Profile</a></li>
				               <li><a href="<?php echo site_url('user/logout');?>" title="Logout">Logout</a></li>
				             </ul>
								 <?php } else { ?>
						 	<a href="http://awards-iaru-r3.org/index.php/user/login">Login</a>
						 	  <?php } ?>

						</li>

					</ul>

				</div>

			</div>

		</header>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>Web Logbook</title>
	<link rel="stylesheet" href="<?php echo base_url();?>css/reset.css" type="text/css" />
	<link type="text/css" href="<?php echo base_url(); ?>css/flick/jquery-ui-1.8.12.custom.css" rel="stylesheet" />	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/css/popup.css">

	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.5.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.12.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/global.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc_ua94UwHK1SXReD8YqnlFSiQaS1w7Ok"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc_ua94UwHK1SXReD8YqnlFSiQaS1w7Ok&callback=initMap" type="text/javascript"></script>
	
</head>

<body> -->
