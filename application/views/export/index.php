<!-- <div id="container">
	<h2><?php echo $page_title; ?></h2>

	<p>Below are all the exportable data options available in Cloudlog</p>
	
	<h3>Data Types</h3>
	
	<ul>
		<li><a href="<?php echo site_url('kml'); ?>">All QSOs as a KML File</a></li>
		<li><a href="<?php echo site_url('adif/export'); ?>">ADIF Export</a></li>
	</ul>
</div> -->

<div id="container">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
	    <!-- Header starts -->
	    <div class="row">
	        <div class="main-header">
	            <h4><?php echo $page_title; ?></h4>
	            <p>Below are all the exportable data options available in Cloudlog</p>
	        </div>
	    </div>
	    <!-- Header end -->

	    <div class="row">
	        <div class="col-sm-12">
	            <div class="card">
	                <div class="card-block">
	                	<h3>Data Types</h3>
	                	<ul>
							<li><a href="<?php echo site_url('kml'); ?>">All QSOs as a KML File</a></li>
							<li><a href="<?php echo site_url('adif/export'); ?>">ADIF Export</a></li>
						</ul>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- Row end -->
	</div>
	<!-- Container-fluid ends -->
</div>