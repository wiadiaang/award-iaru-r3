<!-- <div id="container">
<h2>ADIF Export</h2>


<p>Exporting your log is simple you can either export the whole log or use the finer controls to set the date.</p>

<ul class="notes_list">
	<li><a href="<?php echo site_url('adif/exportall'); ?>" title="Export All" target="_blank">Export All QSOs</a></li>
</ul>

<h3>Export Options</h3>

<form method="post" action="<?php echo site_url('adif/export_custom');?>" >
<table>
 <?php  $user_name = $this->session->userdata('user_name'); echo $user_name;  ?>
	<tr>
		<td>Start Date</td>
		<td><input type="text" id="from" name="from"/></td>
	</tr>
	
	<tr>
		<td>End Date</td>
		<td><input type="text" id="to" name="to"/></td>
	</tr>
	
	<tr>
		<td></td>
		<td><input class="btn primary" type="submit" name="submit" value="Download" /></td>
	</tr>
</table>
</form>

</div> -->

<div id="container">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
	    <!-- Header starts -->
	    <div class="row">
	        <div class="main-header">
	            <h4>ADIF Export</h4>
	            <p>Exporting your log is simple you can either export the whole log or use the finer controls to set the date.</p>
	        </div>
	    </div>
	    <!-- Header end -->

	    <div class="row">
	        <div class="col-sm-12">
	            <div class="card">
	                <div class="card-block">
	                	<ul class="notes_list">
							<li><a href="<?php echo site_url('adif/exportall'); ?>" title="Export All" target="_blank">Export All QSOs</a></li>
						</ul>
	                	<h3>Export Options</h3>
	                	<form method="post" action="<?php echo site_url('adif/export_custom');?>" >
						<table>
						 <?php  $user_name = $this->session->userdata('user_name'); echo $user_name;  ?>
							<tr>
								<td>Start Date</td>
								<td>
									<div class="input-group date input-group-date-custom">
										<input type="text" class="form-control date" id="from" name="from" data-date-format="mm-dd-yy" >
										<span class="input-group-addon bg-primary">
											<i class="icofont icofont-clock-time"></i>
										</span>
									</div>
								</td>
							</tr>
							
							<tr>
								<td>End Date</td>
								<td>
									<div class="input-group date input-group-date-custom">
										<input type="text" class="form-control date" id="to" name="to" >
										<span class="input-group-addon bg-primary">
											<i class="icofont icofont-clock-time"></i>
										</span>
									</div>
								</td>
							</tr>
							
							<tr>
								<td></td>
								<td><input class="btn btn-primary waves-effect waves-light" type="submit" name="submit" value="Download" /></td>
							</tr>
						</table>
						</form>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- Row end -->
	</div>
	<!-- Container-fluid ends -->
</div>

<script>
	
	$(function() {
		var dates = $( "#from, #to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			dateFormat: "yy-mm-dd",
			onSelect: function( selectedDate ) {
				var option = this.id == "from" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
	});



</script>