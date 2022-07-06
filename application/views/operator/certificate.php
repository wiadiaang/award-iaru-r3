<!DOCTYPE html>
<html>
<head><title><?php echo strtoupper(str_replace('0', 'Ø', $callsign)); ?></title></head>
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
		margin-top: -550px;
	}
	.data-nama {
		margin-top: -25px;
		color: #0000b3;
		text-align: center;
		font-weight: bold;
		font-size: 25px;
	}
	.data-nama h1 {
		font-size: 60px;
	}
	.data-callsign {
		text-align: center;
		margin-top: 40px !important;
	}
	.data-callsign span {
		font-size: 25px;
		font-weight: bold;
	}
	.data-ranking {
		text-align: center;
		margin-top: 15px !important;
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
		<img src="assets/images/Revisi.png" />
		<div class="data">

		    <div class="data-callsign">
				<h1><?php echo strtoupper(str_replace('0', 'Ø', $callsign)); ?></h1>
			
			</div>
			<div class="data-nama">
			<span><?php  echo $nama ; ?></span>
				
			</div>
		
			
		</div>
	</div>
</body>
</html>