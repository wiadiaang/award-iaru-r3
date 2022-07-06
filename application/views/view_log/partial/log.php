<!-- 	<table width="100%">
		<tr class="titles">
			<td>Date</td>
			<td>Time</td>
			<td>Call</td>
			<td>Station </td>
			<td>Mode</td>
			<td>Sent</td>
			<td>Recv</td>
			<td>Band</td>
			<td>Country</td>
		    <td>Print</td>
			<?php if(($this->config->item('use_auth')) && ($this->session->userdata('user_type') >= 99)) { ?>
			 <td>Edit</td> -->
			<!--<?php if($this->session->userdata('user_eqsl_name') != "") { ?>
			<td>eQSL</td>
			<?php } ?>
			<?php if($this->session->userdata('user_lotw_name') != "") { ?>
			<td>LoTW</td>
			<?php } ?> -->
	<!-- 		<td></td>
			<?php } ?>
		</tr>
		
		<?php  $i = 0;  foreach ($results->result() as $row) { ?>
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
			<td><a href="<?php echo site_url('logbook/delete')."/".$row->COL_PRIMARY_KEY; ?>"><i class="print">Print</i></a> 
		</tr>
		<?php $i++; } ?>
		
	</table>

    <?php if (isset($this->pagination)){ ?>
	<div class="pagination">
		<?php echo $this->pagination->create_links(); ?>
	</div>
	<?php } ?>

</div>

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

</style> -->

<div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text">Logbook</h5><br>
          </div>
          <div class="card-block">
            <div class="data_table_main">

		  <form action="<?php echo site_url('logbook/index/'); ?>" method="post">
				<p>
			<input type="search" name="cari" placeholder="Search Keyword by Call Sign..."> <input type="submit" name="q" value="Search">
			</p>

              <table  class="table dt-responsive table-striped table-bordered nowrap">
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
				    <th>Action</th> 
					<?php if(($this->config->item('use_auth')) && ($this->session->userdata('user_type') >= 99)) { ?>
					<!--  <th>Edit</th> -->
					<?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php  $i = 0;  foreach ($results->result() as $row) { ?>
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
					<td><a onClick="return doconfirm();" href="<?php echo site_url('logbook/delete')."/".$row->COL_PRIMARY_KEY; ?>"><i class="print">Delete</i></a> || 
					<a  href="<?php echo site_url('logbook/edit')."/".$row->COL_PRIMARY_KEY; ?>"><i class="print">Edit</i></a></td>
				</tr>
				<?php $i++; } ?>
                </tbody>
              </table>
              <?php if (isset($this->pagination)){ ?>
              <div class="dataTables_paginate paging_simple_numbers" id="simpletable_paginate">
					<?php echo $this->pagination->create_links(); ?>
				</div>
				<?php } ?>
            </div>
          </div>
      </div>
    </div>

<script>
</form>
function doconfirm()
{
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}
</script>