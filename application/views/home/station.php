<div id="container">

	<table style="width: 100% !important;" class="zebra-striped" id="dataTables">
		 		<thead>
		 			<tr class="titles">

		 			
		 				<th>Total Country</th>
		 				<th>Total Station</th>
		 				<th>Total Award</th>
		 			</tr>
		 			
		 		</thead>
		 		<tbody>
			 		
					<tr>
						<td style='text-align: center;border:1px solid #DDDDDD;'><a href="<?php echo site_url();?>/home/detail_country/" data-toggle="tooltip" title="Click For Detail" ><?php echo  $Total_negara; ?></a></td>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo $Total_station ; ?></td>
					
						<td style='border:1px solid #DDDDDD;'><?php echo $Total_award; ?></td>
	
						
					</tr>
				


		 		</tbody>

		 	</table>




<h1 style="margin-bottom: 40px">Station Summary</h1>
				 	<table style="width: 100% !important;" class="zebra-striped" id="dataTables">
		 		<thead>
		 			<tr class="titles">

		 				<th>No</th>
		 				<th>Society</th>
		 				<th>Country</th>
						<th>Station</th>
		 				<th>Detail Qso</th>
		 			</tr>
		 			
		 		</thead>
		 		<tbody>
			 		<?php  $start = 0; foreach ($station as $row) { ?>
					<tr>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo  ++$start; ?></td>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo $row->user_name ; ?></td>
					
						<td style='border:1px solid #DDDDDD;'><?php echo $row->user_locator; ?></td>
						<td style='border:1px solid #DDDDDD;'><?php echo $row->user_callsign; ?></td>
						<td style='text-align: center;border:1px solid #DDDDDD;'>
							<?php  $qso = $this->db->get_where('TABLE_HRD_CONTACTS_V01',array('CallSignImport' =>$row->user_name))->num_rows();
								 if($qso != 0){ ?>

								 <a href="<?php echo site_url();?>/home/station_summary_detail/<?php echo $row->user_name; ?>" >View Detail</a>

							<?php	 }else{

							} ?>
							

						</td>
						
					</tr>
					<?php  } ?>


		 		</tbody>

		 	</table>
</div>

