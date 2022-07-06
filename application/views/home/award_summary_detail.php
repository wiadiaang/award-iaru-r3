<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<div id="container">
<h1>Award Summary Detail</h1>
		<div class="span14">
				 	<table style="width: 100% !important;" class="zebra-striped" id="dataTables">
		 		<thead>

                <tr>

                	<th>No</th>
                	<th>Call Sign</th>
					<th>Award Number</th>
					<th>Endorsement</th>

                </tr>

                </thead>
                <tbody>

                	<?php  $start = 0; foreach ($award_detail as $row) { ?>
					<tr>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo ++$start; ?></td>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo strtoupper($row->callsign); ?></td>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo "No.".$row->number_certificate."/IARU-R3-50th/2018"; ?></td>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php $data = str_replace("-"," ", $row->type_certificate);

							$filearr = explode(".",$data);
					$filewithoutextension = $filearr[0];

					$upp=  strtoupper($filewithoutextension);
					$tobasic = str_replace("BRONZE","BASIC",$upp);
					echo $tobasic;



						?></td>

					</tr>
						<?php } ?>
				
                </tbody>

		 	</table>
		 </div>
</div>

	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
		$('#dataTables').DataTable();
	} );
	</script>

