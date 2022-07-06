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

		<style>
			TD.qsl{
			    width: 20px;
			}
			TD.eqsl{
			    width: 33px;
			}
			.eqsl-green{
			    color: #00A000;
			    font-size: 1.1em;
			}
			.eqsl-red{
			    color: #F00;
			    font-size: 1.1em;
			}
			TD.lotw{
			    width: 33px;
			}
			.lotw-green{
			    color: #00A000;
			    font-size: 1.1em;
			}
			.lotw-red{
			    color: #F00;
			    font-size: 1.1em;
			}

			</style>
</head>

<body>

	<div id="canvas">
		<div id="box_wrapper">

			
		
         <section class="page_toplogo table_section table_section_md ls section_padding_top_30 section_padding_bottom_30" style="border-bottom: 5px solid #CF1717;">
				<div class="container">
					<div class="row">
						<div class="col-md-3 text-center text-md-left">
							<a href="<?php echo base_url();?>" class="logo top_logo" style="text-align: center;">
								<img style="width: 70%;" src="<?php echo base_url();?>assets/images/yb72ri.png" alt="">
							</a>
						</div>
						<div class="col-md-6">
							<div class="col-md-12" style="padding-top: 20px;">
								<h3></h3>
								<h4><?php echo $jns ; ?> In YB72RI.</h4>
							</div>
						
							<form class="contact-form columns_margin_bottom_20" method="post" action="<?php echo site_url('search'); ?> " target="_blank">
							<div class="row">
											<div class="col-md-10">
								<div class="form-group">
									<label for="pickup-name">Callsign to Check
										<span class="required">*</span>
									</label>
									<i class="fa fa-user highlight2" aria-hidden="true"></i>
									<input type="text" aria-required="true" value="" name="nama" id="nama" class="form-control" placeholder="input Your Name">
									<!-- <input type="text" aria-required="true" value="" name="callsign" id="callsign" class="form-control" value="<?php  echo $calls; ?>"> -->
								</div>
							</div>
				
							<div class="col-md-2">
								<div class="contact-form-submit">
									<button type="submit" id="pickup-_submit" name="contact_submit" class="theme_button color1">Submit</button>
								</div>
							</div>
							</div>
				
							</form>
						</div>
						<div class="col-md-3">
							<div class="logo top_logo" style="text-align: center;">


								<img style="width: 70%;" src="<?php echo base_url();?><?php echo $image;?>" alt="">
							</div>
						</div>
					</div>
				</div>
		</section>
			

			<section id="services" class="ls ms overflow_hidden half_section section_padding_top_20 section_padding_bottom_20 columns_padding_20">
				<div class="container">
					<div class="row">
					<center><h2>Your QSO <?php echo $jml; ?></h2></center>
						  <br>





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
	