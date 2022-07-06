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

		<meta name="viewport" content="width=1160"/>

		<title><?php echo $page_title ?> - IARU The 50th Anniversary</title>
		<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/icon.png"/>

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/swiper.css"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/normal.css"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/header.css"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/<?php echo $css ?>"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/table.css"/>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/footer.css"/>

		<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
		<script src="<?php echo base_url();?>assets/js/swiper.js"></script>
		<script src="<?php echo base_url();?>assets/js/index.js"></script>

		<style>
		.pdfobject-container {height: 500px}
		.pdfobject {border: 1px solid #666}
		</style>

	</head>

	<body>

		<main>

		<div id="centered">

		<header>
			
			<div id="box">
				<div class="left">

					<a href="<?php echo base_url();?>"><img class="logo" src="<?php echo base_url();?>assets/img/logo.png"/></a>

					<div>

						<span>

							<b>The IARU Region 3 - 50<sup>th</sup> Anniversary</b>
							International Amateur Radio Union<br/>
							Region 3 (Asia Pacific Region)
							

						</span>

						<ul>
							<!-- <li><a href="<?php echo base_url();?>">Home</a></li> -->
							<!-- <li><a href="#">Statistic</a></li> -->
							<!-- <li><a href="<?php echo site_url('result'); ?>">QSO Summary</a></li> -->
							<!-- <li><a href="#">QSO Summary</a></li> -->
							<li class="bLogin"><a target="_blank" href="<?php echo base_url();?>user/login">Login</a></li>
							<li><a href="<?php echo site_url('home/rules');?>">Award Rules</a></li>
							<li><a href="<?php echo site_url('counting');?>">World Ranking</a></li>
							<li><a href="<?php echo site_url('home/station_summary');?>">Station Summary</a></li>
							<li><a href="<?php echo site_url('home/award_list');?>">Award List</a></li>

						</ul>

					</div>

				</div>

				<div class="right">

					
					<form method="post" action="<?php echo site_url('search'); ?>" target="_blank">

						<label for="search2">Log Search</label>
						<img src="<?php echo base_url();?>assets/img/user.png"/>
						<input type="text" id="search2" required="true" value="" name="callsign" placeholder="your callsign"
						autocomplete="off" spellcheck="false"/>
						<button type="submit">Search</button>

					</form>

					<form action="<?php echo site_url('search2/award/');?>" method="POST">

						<label for="search1">Award Check</label>
						<img src="<?php echo base_url();?>assets/img/certificate.png"/>
						<input type="text" id="search1" name="callsign" placeholder="your callsign"
						autocomplete="off" spellcheck="false"/>
						<button type="submit">Search</button>

					</form>

					<form action="<?php echo site_url('search/certificate_operator/');?>" method="POST">

						<label for="search1">Certificate</label>
						<img src="<?php echo base_url();?>assets/img/certificate.png"/>
						<input type="text" id="search1" name="callsign" placeholder="operator callsign"
						autocomplete="off" spellcheck="false"/>
						<button type="submit">Search</button>

					</form>

				</div>

			</div>

		</header>