<div id="container">
<h1 style="margin-bottom: 40px">Award Summary</h1>
				 	<table style="width: 100% !important;" class="zebra-striped" id="dataTables">
		 		<thead>
		 			<tr class="titles">
		 				<th style="text-align: center;border:1px solid #DDDDDD;">No</th>
		 				<th  style="text-align: center;border:1px solid #DDDDDD;">Call Sign</th>
		 			<!-- 	<th  style="text-align: center;border:1px solid #DDDDDD;">Country</th> -->
		 				<th  style="text-align: center;border:1px solid #DDDDDD;">Detail</th>
		 				
		 			</tr>
		 			
		 		</thead>
		 		<tbody>
			 		<?php  $start = 0; foreach ($award as $row) { ?>
					<tr>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo  ++$start; ?></td>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo strtoupper($row->callsign); ?></td>
					
						<!-- <td style='border:1px solid #DDDDDD;'><?php echo $row->user_locator; ?></td> -->
						<td style='text-align: center;border:1px solid #DDDDDD;'><a href="<?php echo site_url();?>/home/award_summary_detail/<?php echo $row->callsign; ?>" >View</a></td>
						
					</tr>
					<?php  } ?>


		 		</tbody>

		 	</table>
</div>

