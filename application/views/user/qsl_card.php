<!DOCTYPE html>
<html>

	<head>

		<title><?php echo $title ; ?></title>

		<style type="text/css">

			.qsl {
				position: absolute;
				width: 100%;
				height: 100%;
				border: 1px solid red
			}
			.qsl img {
				object-fit: cover;
				object-position: 50% 50%;
				width: 100%;
				height: 100%;
				z-index: -9999;
				border: 1px solid red
			}
			.data {
				position: absolute;
				width:100%;
				padding-left: 10px;
				margin-top: -232px;
				background: rgba(255,255,255,0.8) !important
			}
			.data-left {
				width:13%;
				float: left;
				font-family: Verdana, Geneva, sans-serif;
				font-size: 14px;
				color: #333;
				text-align: center;
				padding-top: -70px
			}
			.data-right {
				width: 86%;
				float: right;
				padding-top: -70px
			}
			.data-item {
				font-weight: bold;
				font-family: Verdana, Geneva, sans-serif;
				font-size: 14px;
				width: 14%;
				float: left;
				color: #333;
				text-align: center
			}
			.data-item span {
				font-weight: normal !important;
				padding-bottom: 10px
			}

		</style>

	</head>

	<body style="padding: 0 !important; margin: 0 !important;">

		<div class="qsl">

			<img src="<?php echo base_url(); ?>assets/images/QSLCard2.png"/>

			<div class="data">

				<div class="data-left">

					<span>Callsign</span><br>
					<h4><?php echo $COL_CALL; ?></h4>

				</div>

				<div class="data-right">

		      		<?php $originalDate = $COL_TIME_ON;
		       		$newDate = date("d/m/y", strtotime($originalDate)); 
		       		$newTime = date("H:i",strtotime($originalDate)); ?>

					<div class="data-item">

						<span>Date</span><br>
						<h4><?php echo $newDate; ?></h4>

					</div>

					<div class="data-item">

						<span>Time</span><br>
						<h4><?php echo $newTime; ?></h4>

					</div>

					<div class="data-item">

						<span>Band</span><br>
						<h4><?php echo $COL_BAND; ?></h4>

					</div>

					<div class="data-item">

						<span>Mode</span><br>
						<h4><?php echo $COL_MODE; ?></h4>

					</div>

					<div class="data-item">

						<span>Received</span><br>
						<h4><?php echo $COL_RST_RCVD; ?></h4>

					</div>

					<div class="data-item">

						<span>Send</span><br>
						<h4><?php echo $COL_RST_SENT; ?></h4>

					</div>

					<div class="data-item">

						<span>Station</span><br>
						<h4><?php echo $COL_STATION_CALLSIGN; ?></h4>

					</div>

				</div>

			</div>

		</div>

	</body>

</html>