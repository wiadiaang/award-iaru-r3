<!DOCTYPE html>
<html>
<head><title>YB72RI <?php echo $title ; ?></title></head>
<body style="padding: 0 !important;margin: 0 !important;">

<style type="text/css">
	.qsl {
		width: 100%;
	}
	.qsl img {
		width: 100%;
		height: auto;
		z-index: -9999;
	}
	.data {
		width:100%;
		margin-top: -560px;
	}
	.data-nama {
		color: #0000b3;
		text-align: center;
	}
	.data-nama h1 {
		font-size: 35px;
	}
	.data-callsign {
		text-align: center;
		margin-top: -20px !important;
	}
	.data-callsign span {
		font-size: 30px;
		font-weight: bold;
	}
	.data-ranking {
		text-align: center;
		margin-top: 20px !important;
	}
	.data-ranking span {
		font-size: 20px;
		font-weight: bold;
		color: #E6212A;
	}
	.data-no {
		margin-top: 248px !important;
		margin-left: 185px !important;
	}
	.data-no span {
		font-size: 20px;
		font-weight: bold;
		color: black;
	}
</style>

	<div class="qsl">
		<img src="<?php echo base_url(); ?>assets/images/YB72RI_OPERATOR.jpg" />
		<div class="data">
			<div class="data-nama">
				<h1><?php  echo $nama_lengkap ; ?></h1>
			</div>
			<div class="data-callsign">
				<span><?php   echo $callsign; ?></span>
			</div>
			<div class="data-no">
				<span><?php   echo $no; ?></span>
			</div> 
		</div>
	</div>
</body>
</html>