<div id="container">
 <div class="container-fluid">
    <div class="row">
        <div class="main-header">
            <h4>DX Cluster - <?php echo $band; ?>m</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><h5 class="card-header-text"><?php echo $band; ?>m</h5>
                </div>
                <div class="card-block button-list">
                    <a href="<?php echo site_url('dxcluster'); ?>">
                        <button type="button" class="btn btn-primary active waves-effect waves-light m-r-10" data-toggle="tooltip" data-placement="top" title=".btn-primary .active">DXCC
                        </button>
                    </a>
                    <a href="<?php echo site_url('dxcluster/custom/160'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">160m
	                    </button>
                    </a>
                    <a href="<?php echo site_url('dxcluster/custom/80'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">80m
	                    </button>
                    </a>
                    <a href="<?php echo site_url('dxcluster/custom/40'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">40m
	                    </button>
                    </a>
                    <a href="<?php echo site_url('dxcluster/custom/30'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">30m
	                    </button>
                    </a>
                    <a href="<?php echo site_url('dxcluster/custom/20'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">20m
	                    </button>
                    </a>
                    <a href="<?php echo site_url('dxcluster/custom/17'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">17m
	                    </button>
                    </a>
                    <a href="<?php echo site_url('dxcluster/custom/15'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">15m
	                    </button>
                    </a>
                    <a href="<?php echo site_url('dxcluster/custom/12'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">12m
	                    </button>
                    </a>
                    <a href="<?php echo site_url('dxcluster/custom/10'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">10m
	                    </button>
                    </a>
                    <a href="<?php echo site_url('dxcluster/custom/6'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">6m
	                    </button>
                    </a>
                    <a href="<?php echo site_url('dxcluster/custom/4'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">4m
	                    </button>
                    </a>
                    <a href="<?php echo site_url('dxcluster/custom/2'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">2m
	                    </button>
                    </a>
                    <a href="<?php echo site_url('dxcluster/custom/07'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">70m
	                    </button>
                    </a>
                    <a href="<?php echo site_url('dxcluster/custom/023'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">23m
	                    </button>
                    </a>

                </div>
                <div class="card-block">
                    <div class="data_table_main">
                    		<script type="text/javascript">

						  $(document).ready(function(){
							
							$('#load_spots').load('<?php echo site_url('dxcluster/custom_spots/'.$band);?>').fadeIn("slow");
							
						  });

						var auto_refresh = setInterval(
							function ()
							{
							$('#load_spots').load('<?php echo site_url('dxcluster/custom_spots/'.$band);?>').fadeIn("slow");
							}, 4000); // refresh every 10000 milliseconds
							</script>
                      <table id="simpletable" class="table dt-responsive table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>Date</th>
							<th>Callsign</th>
							<th>Freq</th>
							<th>DX Callsign</th>
							<th>Comment</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Date</th>
							<th>Callsign</th>
							<th>Freq</th>
							<th>DX Callsign</th>
							<th>Comment</th>
                        </tr>
                        </tfoot>
                        <tbody id="load_spots"></tbody>
                      </table>
                    </div>
                  </div>
            </div>
            <!-- end of card -->
        </div>
    </div>
 </div>
</div>

