<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<div id="container">
<h1>Station Summary Detail</h1>
		<div class="span14">
				 	<table style="width: 100% !important;" class="zebra-striped" id="dataTables">
		 		 <thead>
                <tr>
                	<th>Date</th>
					<th>Time</th>
					<th>Call</th>
					<th>Station </th>
					<th>Mode</th>
					<th>Sent</th>
					<th>Recv</th>
					<th>Band</th>
					<th>Country</th>
				   <!--  <th>Print</th> -->
					<?php if(($this->config->item('use_auth')) && ($this->session->userdata('user_type') >= 99)) { ?>
					<!--  <th>Edit</th> -->
					<?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php  $i = 0;  foreach ($results as $row) { ?>
					<?php  echo '<tr class="tr'.($i & 1).'">'; ?>
					<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('d/m/y', $timestamp); ?></td>
					<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('H:i', $timestamp); ?></td>
					<td><a class="qsobox" href="<?php echo site_url('logbook/view')."/".$row->COL_PRIMARY_KEY; ?>"><?php echo strtoupper($row->COL_CALL); ?></a></td>
					<td><?php echo $row->COL_STATION_CALLSIGN; ?></td>
					<td><?php echo $row->COL_MODE; ?></td>

					<td><?php echo $row->COL_RST_SENT; ?> </td>
					<td><?php echo $row->COL_RST_RCVD; ?> </td>
					<?php if($row->COL_SAT_NAME != null) { ?>
					<td><?php echo $row->COL_SAT_NAME; ?></td>
					<?php } else { ?>
					<td><?php echo strtolower($row->COL_BAND); ?></td>
					<?php } ?>
					<td><?php echo $row->COL_COUNTRY; ?></td>
					<!-- <td><a href="<?php echo site_url('search/card')."/".$row->COL_PRIMARY_KEY; ?>"><i class="print">Print</i></a>  -->
				</tr>
				<?php $i++; } ?>
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

