

<div id="container">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
	    <!-- Header starts -->
	    <div class="row">
	        <div class="main-header">
	            <h4>Backup</h4>
	            <p>Backup options.</p>
	        </div>
	    </div>
	    <!-- Header end -->
		<div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header"><h5 class="card-header-text">Backup</h5>
                    </div>
                    <div class="card-block button-list">
                        <!-- start Raised Button -->
                        <a href="<?php echo site_url('backup/adif'); ?>">
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-primary">Backup ADIF
                            </button>
                        </a>
                        <a href="<?php echo site_url('backup/notes'); ?>">
                            <button type="button" class="btn btn-success waves-effect waves-light " data-toggle="tooltip" data-placement="top" title=".btn-success">Backup Notes
                            </button>
                        </a>

                    </div>
                    <!-- end of Raised Button -->
                </div>
                <!-- end of card -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
	</div>
	<!-- Container-fluid ends -->
</div>