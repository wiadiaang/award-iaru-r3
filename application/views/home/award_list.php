<div id="container">
<h1 style="margin-bottom: 40px">AWARD LIST</h1>
				 	<table style="width: 100% !important;" class="zebra-striped" id="dataTables">
		 		<thead>
		 			<tr class="titles">
		 				<th style="text-align: center;border:1px solid #DDDDDD;">No</th>
		 				<th  style="text-align: center;border:1px solid #DDDDDD;">Call Sign</th>
		 			<!-- 	<th  style="text-align: center;border:1px solid #DDDDDD;">Country</th> -->
		 				<th  style="text-align: center;border:1px solid #DDDDDD;">Award Number</th>
		 				
		 			</tr>
		 			
		 		</thead>
		 		<tbody>
			 		<?php  $start = 0; foreach ($award_list as $row) { ?>
					<tr>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo  ++$start; ?></td>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo strtoupper($row->callsign); ?></td>
					
						<!-- <td style='border:1px solid #DDDDDD;'><?php echo $row->user_locator; ?></td> -->
						<td style='text-align: center;border:1px solid #DDDDDD;'><span>No.<?php echo $row->number_certificate; ?>/IARU-R3-50th/2018</span></td>
						
					</tr>
					<?php  } ?>


		 		</tbody>

		 	</table>
</div>

