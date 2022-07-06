
<?php echo validation_errors(); ?>
<?php

$this->load->helper('form');

?>



<div class="container-fluid">
	<div class="row">
		&nbsp;
	</div>
		<div class="row">
		    <!-- Form Control starts -->
		    <div class="col-lg-8">
		        <div class="card">
		            <div class="card-header"><h5 class="card-header-text">Edit Log QSO</h5>
		            </div>

		            <div class="card-block">
		            	<?php echo validation_errors(); ?>
						<?php

						$this->load->helper('form');

						?>
					<form method="post" action="<?php echo site_url('logbook/update_action');?>">
		                    <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">CALL </label>
		                    	</div>
								<div class="form-group col-lg-9">
								<input type="text" name="call" class = "form-control" value="<?php echo $COL_CALL;?>" />
								</div>
		                    </div>
		                    <br><br><br>
		                    <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">STATION </label>
		                    	</div>
								<div class="form-group col-lg-9">
								<input type="text" name="station" class = "form-control" value="<?php echo $COL_STATION_CALLSIGN;?>" />
								</div>
		                    </div>
		                    <br><br><br>
		                    <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">MODE </label>
		                    	</div>
								<div class="form-group col-lg-9">
								<input type="text" name="mode" class = "form-control" value="<?php echo $COL_MODE;?>" />
								</div>
		                    </div>
		                    <br><br><br>
		                    <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">SENT </label>
		                    	</div>
								<div class="form-group col-lg-9">
								<input type="text" name="sent" class = "form-control" value="<?php echo $COL_RST_SENT;?>" />
								</div>
		                    </div>
		                    <br><br><br>
		                    <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">RECV </label>
		                    	</div>
								<div class="form-group col-lg-9">
								<input type="text" name="recv" class = "form-control" value="<?php echo $COL_RST_RCVD;?>" />
								</div>
		                    </div>
		                    <br><br><br>
		                    <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">BAND </label>
		                    	</div>
								<div class="form-group col-lg-9">
								<input type="text" name="band" class = "form-control" value="<?php echo $COL_BAND;?>" />
								</div>
		                    </div>
							<br><br><br>
							<div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">FREQ </label>
		                    	</div>
								<div class="form-group col-lg-9">
								<input type="text" name="freq" class = "form-control" value="<?php echo $COL_FREQ;?>" />
								</div>
		                    </div>
		                    <br><br><br>
		                    <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">COUNTRY </label>
		                    	</div>
								<div class="form-group col-lg-9">
									<input type="text" name="country" class = "form-control" value="<?php echo $COL_COUNTRY;?>" />	
								</div>
		                    </div>
		                    <br><br><br>
		                    <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">DATE </label>
		                    	</div>
								<div class="form-group col-lg-9">
								    <input type="text" name="date" class = "form-control" value="<?php echo date("Y-m-d",strtotime($COL_TIME_ON));?>" />
								</div>
		                    </div>
		                    <br><br><br>
		                    <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">TIME </label>
		                    	</div>
								<div class="form-group col-lg-9">
										<input type="text" name="time" class = "form-control" value="<?php echo date("H:i:s",strtotime($COL_TIME_ON));  ?>" />
								</div>
		                    </div>

				
		                    <br><br><br>
		 
	
		                   
		                    
		                    <br><br><br>
		                    <div class="row">
								<div class="col-lg-3">
									
								</div>
								<div class="col-lg-9">
									<input type="hidden" name="id" value="<?php echo $id;?>" />
									<button type="submit" class="btn btn-primary waves-effect waves-light m-r-30">Update</button>
								</div>
							</div>
		                    
		                </form>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
</div>
