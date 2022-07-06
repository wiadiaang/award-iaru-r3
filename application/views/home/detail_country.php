<div id="container">






<h1 style="margin-bottom: 40px">Country</h1>
				 	<table style="width: 100% !important;" class="zebra-striped" id="dataTables">
		 		<thead>
		 			<tr class="titles">

		 				<th>No</th>
		 				
		 				<th>Country</th>
		 				
		 			</tr>
		 			
		 		</thead>
		 		<tbody>
			 		<?php  $start = 0; foreach ($country as $row) { ?>
					<tr>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo  ++$start; ?></td>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo $row->name ; ?></td>
					

						
					</tr>
					<?php  } ?>


		 		</tbody>

		 	</table>
</div>

