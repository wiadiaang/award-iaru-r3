	

	<table width="100%">
		<tr class="titles">
			<td>Date</td>
			<td>Time</td>
			<td>Call</td>
			<td>Station</td>
			<td>Mode</td>
			<td>Sent</td>
			<td>Recv</td>
			<td>Band</td>
			<td>Country </td>
			<!-- <td>Qsl Card </td> -->
			<?php if(($this->config->item('use_auth')) && ($this->session->userdata('user_type') >= 2)) { ?>
			<td>QSL</td>
			
			<?php if($this->session->userdata('user_eqsl_name') != "") { ?>
				<td>eQSL</td>
			<?php } else { ?>
				<td></td>
			<?php } ?>

			<?php if($this->session->userdata('user_lotw_name') != "") { ?>
				<td>LoTW</td>
			<?php } else { ?>
				<td></td>
			<?php } ?>

			<td></td>
			<?php } ?>
		</tr>
		
		<?php  $i = 0;  foreach ($results->result() as $row) { ?>
			<?php  echo '<tr class="tr'.($i & 1).'">'; ?>
			<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('d/m/y', $timestamp); ?></td>
			<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('H:i', $timestamp); ?></td>
			<td><a class="qsobox" href="<?php echo site_url('logbook/view')."/".$row->COL_PRIMARY_KEY; ?>"><?php echo strtoupper($row->COL_CALL); ?></a></td>
			<td><?php echo $row->CallSignImport; ?></td>
			<td><?php echo $row->COL_MODE; ?></td>

			<td><?php echo $row->COL_RST_SENT; ?> <?php if ($row->COL_STX_STRING) { ?><span class="label"><?php echo $row->COL_STX_STRING;?></span><?php } ?></td>
			<td><?php echo $row->COL_RST_RCVD; ?> <?php if ($row->COL_SRX_STRING) { ?><span class="label"><?php echo $row->COL_SRX_STRING;?></span><?php } ?></td>
			<?php if($row->COL_SAT_NAME != null) { ?>
			<td><?php echo $row->COL_SAT_NAME; ?></td>
			<?php } else { ?>
			<td><?php echo $row->COL_BAND; ?></td>
			<?php } ?>
			<td><?php echo $row->COL_COUNTRY; ?></td>
			<td><?php  ?></td>
		</tr>
		<?php $i++; } ?>
		
	</table>
<style>
TD.qsl{
    width: 20px;
}
TD.eqsl{
    width: 33px;
}
.eqsl-green{
    color: #00A000;
    font-size: 1.1em;
}
.eqsl-red{
    color: #F00;
    font-size: 1.1em;
}
TD.lotw{
    width: 33px;
}
.lotw-green{
    color: #00A000;
    font-size: 1.1em;
}
.lotw-red{
    color: #F00;
    font-size: 1.1em;
}

</style>