<!DOCTYPE HTML>
<html>

	<head>

		<title>THE IARU REGION 3 50th Anniversary <?php echo $title; ?></title>

		<style>

			body {
				margin: 0;
				padding: 0;
				background-color: #eac35e;
			}
			.qsl {
				width: 100%;
			}
			.qsl img {
				width: 100%
			}
			.data {
				margin-top: -370px;
				z-index: 2000
			}
			.data-nama {
				color: #0000b3;
				text-align: center;
			}
			.data-nama span {
				font-size: 20px
				/*font-weight: bold;*/
			}
			.data-callsign {
				text-align: center
			}
			.data-callsign span {
				font-size: 27px;
				font-weight: bold;
			}
			.data-ranking {
				text-align: center;
				margin-top: 30px !important
				/*border:solid 10px;*/
			}
			.data-ranking span {
				font-size: 22px;
					margin-top: 220px;
				font-weight: bold;
				color: black;
			}

			.tanggal {
				position: absolute;
				margin-top: 135px;
				margin-bottom: -25px;
				margin-left: 703px;
				font-size: 15px;
				font-weight: bold;
				color: black;
				font-style: italic;
			}
			.nomor {
				margin-left: 220px;
				margin-top: -17px;
				font-size: 15px;
				font-weight: bold;
				color: black;
				font-style: italic;
			}

			.center {
				margin-left: 5px;
				margin-top:4px
			}

		</style>


	</head>

	<body>

		<div class="qsl">

			<img class="center" src="<?php echo base_url(); ?>assets/images/The_IARU_Region_3_50th_Anniversary_Award_Silver.jpg"/>

			<div class="data">

				<div class="data-callsign">

					
					<span><?php echo strtoupper(str_replace('0', 'Ø', $callsign));  ?></span>
						
				</div>

				<div class="data-nama">

					<span><b><?php echo strtoupper($nama); ?></b></span>

						
				</div>

					<div class="data-ranking">

					<?php
					$filearr = explode("-",$band);
					$filewithoutextension = $filearr[1];  
				?>
				<span><?php echo $filewithoutextension; ?></span>

						
				</div>


						<div class="tanggal">
					<span>Issued on <?php echo $tgl; ?></span>
				</div>

				<div class="nomor">
					<span>No.<?php echo $nomor; ?>/IARU-R3-50th/2018</span>
				</div>

			</div>

		</div>

	</body>

</html>

<!-- <!DOCTYPE html>
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
		margin-top: -450px;
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
</style>

	<div class="qsl">
		<img src="<?php echo base_url(); ?>assets/images/The_IARU_Region_3_50th_Anniversary_Award.jpg" />
		<div class="data">
			<div class="data-nama">
				<h1><?php  echo $nama ; ?></h1>
			</div>
			<div class="data-callsign">
				<span><?php   echo $callsign; ?></span>
			</div>
			<div class="data-ranking">
				<span>World Ranking #<?php   echo $rangking; ?></span>
			</div>
		</div>
	</div>
</body>
</html> -->