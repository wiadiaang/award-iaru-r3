

	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

	<script type="text/javascript">

		$(document).ready(function() {
			$(".qsobox").fancybox({
				'width'				: '75%',
				'height'			: '50%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});


		});

	</script>

<div id="container">

<!-- <h2>Cloudlog Users</h2>

<div class="row show-grid" style="margin:30px">
	  <div class="span13">

<?php if($this->session->flashdata('notice')) { ?>
	<div id="message" >
    	<?php echo $this->session->flashdata('notice'); ?>
	</div>
<?php } ?>

	<table class="users" width="100%">
		<tr class="user_title titles">
			<td>User</td>
			<td>E-mail</td>
			<td>Type</td>
			<td>Options</td>
		</tr>

		<?php

		$i = 0;
		foreach ($results->result() as $row) { ?>
		<?php  echo '<tr class="tr'.($i & 1).'">'; ?>
			<td><a href="<?php echo site_url('user/edit')."/".$row->user_id; ?>"><?php echo $row->user_name; ?></a></td>
			<td><?php echo $row->user_email; ?></td>
			<td><?php $l = $this->config->item('auth_level'); echo $l[$row->user_type]; ?></td>
			<td><a href="<?php echo site_url('user/edit')."/".$row->user_id; ?>">Edit</a> <a href="<?php echo site_url('user/delete')."/".$row->user_id; ?>">Delete</a></td>
		</tr>
		<?php $i++; } ?>
	</table>
	  </div>
	  <div class="span2 offset1">
	  <a class="btn primary" href="<?php echo site_url('user/add'); ?>">Add user</a>
	  </div>
	</div> -->


<div class="container-fluid">
	<div class="row">
		&nbsp;
	</div>
 	<div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h3 class="card-header-text">Cloudlog Users</h3><br>
			<div class="f-right">
               <a class="btn btn-dropbox waves-effect waves-light" href="<?php echo site_url('user/add'); ?>"><span><li class="fa fa-plus"></li></span> Add user</a>
            </div>
          </div>
          
          <div class="card-block">
            <div class="data_table_main">
              <table id="simpletable" class="table dt-responsive table-striped table-bordered nowrap">
                <thead>
                <tr>
                  	<th>User</th>
					<th>E-mail</th>
					<th>Type</th>
					<th>Options</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                  	<th>User</th>
					<th>E-mail</th>
					<th>Type</th>
					<th>Options</th>
                </tr>
                </tfoot>
                <tbody>
                <?php

				$i = 0;
				foreach ($results->result() as $row) { ?>
				<?php  echo '<tr class="tr'.($i & 1).'">'; ?>
					<td><a href="<?php echo site_url('user/edit')."/".$row->user_id; ?>"><?php echo $row->user_name; ?></a></td>
					<td><?php echo $row->user_email; ?></td>
					<td><?php $l = $this->config->item('auth_level'); echo $l[$row->user_type]; ?></td>
					<td><a class="btn btn-primary waves-effect waves-light" href="<?php echo site_url('user/edit')."/".$row->user_id; ?>">Edit</a> <a class="btn btn-danger waves-effect waves-light" href="<?php echo site_url('user/delete')."/".$row->user_id; ?>">Delete</a></td>
				</tr>
				<?php $i++; } ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
</div>
</div>
