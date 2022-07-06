<div id="container">
	<div class="row" style="margin-top: 10px;">
		<div class="span16">
		 	<table style="width: 100% !important;" class="zebra-striped">
		 		<thead>
		 			<tr class="titles">
		 				<th rowspan="2" style="text-align: center;border:1px solid #DDDDDD;">Mode</th>
		 				<th rowspan="2" style="text-align: center;border:1px solid #DDDDDD;">Band</th>
		 				<th colspan="10" style="text-align: center;border:1px solid #DDDDDD;">YB72RI</th>
		 				<th rowspan="2" style="text-align: center;border:1px solid #DDDDDD;">TOTAL</th>
		 			</tr>
		 			<tr class="titles">
						<td style="text-align: center;border:1px solid #DDDDDD;">/0</td>
						<td style="text-align: center;border:1px solid #DDDDDD;">/1</td>
						<td style="text-align: center;border:1px solid #DDDDDD;">/2</td>
						<td style="text-align: center;border:1px solid #DDDDDD;">/3</td>
			            <td style="text-align: center;border:1px solid #DDDDDD;">/4</td>
			            <td style="text-align: center;border:1px solid #DDDDDD;">/5</td>
			            <td style="text-align: center;border:1px solid #DDDDDD;">/6</td>
			            <td style="text-align: center;border:1px solid #DDDDDD;">/7</td>
			            <td style="text-align: center;border:1px solid #DDDDDD;">/8</td>	
			            <td style="text-align: center;border:1px solid #DDDDDD;">/9</td>
				    </tr>
		 		</thead>
		 		<tbody>
			 		<?php $i = 0; foreach ($dataqso as $row) { ?>
					<tr>
						<td><?php echo $row['COL_MODE']; ?></td>
						<td><?php echo $row['COL_BAND']; ?></td>
						<td><?php echo $row['YB72RI/0']; ?></td>
						<td><?php echo $row['YB72RI/1']; ?></td>
						<td><?php echo $row['YB72RI/2']; ?></td>
						<td><?php echo $row['YB72RI/3']; ?></td>
						<td><?php echo $row['YB72RI/4']; ?></td>
						<td><?php echo $row['YB72RI/5']; ?></td>
						<td><?php echo $row['YB72RI/6']; ?></td>
						<td><?php echo $row['YB72RI/7']; ?></td>
						<td><?php echo $row['YB72RI/8']; ?></td>
						<td><?php echo $row['YB72RI/9']; ?></td>
						<td><?php echo $row['total']; ?></td>
					</tr>
					<?php $i++; } ?>
					<tfoot class="titles">
				<tr>
				<td></td>
				<td></td>
				<td ><?php  echo $YB0; ?></td>
				<td ><?php  echo $YB1; ?></td>
				<td ><?php  echo $YB2; ?></td>
				<td > <?php  echo $YB3; ?></td>
				<td ><?php  echo $YB4; ?></td>
				<td ><?php  echo $YB5; ?></td>
				<td><?php  echo $YB6; ?></td>
				<td ><?php  echo $YB7; ?></td>
				<td ><?php  echo $YB8; ?></td>
				<td ><?php  echo $YB9; ?></td>
				<td ><?php  echo $total; ?></td>

				</tr>
				</tfoot>
		 		</tbody>
		 		
		 	</table>
		</div>
	</div>
</div>