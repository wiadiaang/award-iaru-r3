<script>
	$(function() {
		$( "#start_date" ).datepicker({ dateFormat: "yy-mm-dd" });
		$( "#end_date" ).datepicker({ dateFormat: "yy-mm-dd" });
	});
</script>

<div id="container">
 <div class="container-fluid">
	<div class="row">
        <div class="main-header">
            <h4><?php echo $page_title; ?></h4>
        </div>
    </div>
    <div class="row">
		<div class="col-lg-12">
	        <div class="card">
	            <div class="card-header"><h5 class="card-header-text"><?php echo $page_title; ?></h5>
	            </div>
	            <div class="card-block button-list">
	            	<ul class="nav nav-tabs tab-below tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() ;?>index.php/statistics/statistics" >
                            	<button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top">General
				                </button>
				            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="<?php echo base_url() ;?>index.php/statistics/statistics" >
                            	<button type="button" class="btn btn-primary active waves-effect waves-light" data-toggle="tooltip" data-placement="top" >Satellite Contacts
	                			</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url() ;?>index.php/statistics/custom" >
                            	<button type="button" class="btn btn-success active waves-effect waves-light" data-toggle="tooltip" data-placement="top">Custom
	                			</button>
                            </a>
	                	</button>
                        </li>
                    </ul>
	                <div class="tab-content tabs">
	                    <p>This is a work in-progress</p>
		
							<div id="filter_box">
							
								<h2>Options</h2>
								
								<?php echo validation_errors(); ?>

								<?php echo form_open('statistics/custom'); ?>
							
								<div class="type">
									<h3>Date</h3>
									<table>
										<tr>
											<td>Start</td>
											<td><input type="text" id="start_date" name="start_date" value="" /></td>
										</tr>
										
										<tr>
											<td>End</td>
											<td><input type="text" id="end_date" name="end_date" value="" /></td>
										</tr>
									</table>
								</div>
								
								<div class="type">
									<h3>Band</h3>
									<input type="checkbox" name="band_6m" value="6m" /> 6m
									<input type="checkbox" name="band_2m" value="2m" /> 2m
									<input type="checkbox" name="band_70cm" value="70cm" /> 70cm
									<input type="checkbox" name="band_23cm" value="23cm" /> 23cm
									<input type="checkbox" name="band_3cm" value="3cm" /> 3cm
									
									<h3>Mode</h3>
										<input type="checkbox" name="mode_ssb" value="ssb" /> SSB
										<input type="checkbox" name="mode_cw" value="cw" /> CW
										<input type="checkbox" name="mode_data" value="data" /> Data
										<input type="checkbox" name="mode_fm" value="FM" /> FM
										<input type="checkbox" name="mode_am" value="AM" /> AM
								</div>
								
								<div class="type">
									<p>Finished your selection? time to search!</p>
									<input type="submit" class="btn btn-primary" name="submit" value="Search" />		
								</div>
	                </div>
	            </div>
	            <!-- emd of card-block -->
	            <div class="results">
					<p>Results go here</p>
				</div>
	        </div>
	        <!-- end of card -->
	    </div>
    </div>
 </div>
</div>