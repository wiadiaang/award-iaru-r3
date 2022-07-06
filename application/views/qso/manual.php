
	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

	<script type="text/javascript">

		$(document).ready(function() {
			$(".qsobox").fancybox({
				'autoDimensions'	: false,
				'width'         	: 700,
				'height'        	: 300,
				'transitionIn'		: 'fade',
				'transitionOut'		: 'fade',
				'type'				: 'iframe'
			});
		});

	</script>

<div id="container">
<div class="container-fluid">
<?php if($notice) { ?>
<div class="alert-message info">
        <?php echo $notice; ?>
</div>
<?php } ?>

<?php if(validation_errors()) { ?>
<div class="alert-message error">
        <?php echo validation_errors(); ?>
</div>
<?php } ?>
<div class="row">
	&nbsp;
</div>
<!-- Row start -->
<div class="row">
    <!-- Form Control starts -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header"><h5 class="card-header-text">Manual QSO</h5>
            </div>

            <div class="card-block">
                <form>
                    <div class="form-inline">
                    	<div class="col-lg-3">
                    		<label class="m-r-15 form-control-label">Date </label>
                    	</div>
						<div class="form-group col-lg-5">
						    <input class="form-control" type="date" name="start_date" value="<?php echo date('Y-m-d'); ?>" >
						</div>
						<div class="form-group col-lg-4">
						    <input class="form-control" type="time"  name="start_time" value="" id="example-time-input">
						    
						</div>
                    </div>
                    <br><br><br>
                    <div class="form-inline">
                    	<div class="col-lg-3">
                    		<label class="m-r-15 form-control-label">Callsign </label>
                    	</div>
						<div class="form-group col-lg-9">
						    
						    <input type="text" class="form-control" id="callsign" name="callsign" value="" placeholder="Callsign">
						</div>
                    </div>
                    <br><br><br>
                    <div class="form-inline">
						<div class="form-group col-lg-6">
						    <label class="m-r-15 form-control-label">Email </label>
						    <select name="mode" class="form-control">
								<option value="SSB" <?php if($this->session->userdata('mode') == "" || $this->session->userdata('mode') == "SSB") { echo "selected=\"selected\""; } ?>>SSB</option>
								<option value="AM" <?php if($this->session->userdata('mode') == "AM") { echo "selected=\"selected\""; } ?>>AM</option>
								<option value="FM" <?php if($this->session->userdata('mode') == "FM") { echo "selected=\"selected\""; } ?>>FM</option>
								<option value="CW" <?php if($this->session->userdata('mode') == "CW") { echo "selected=\"selected\""; } ?>>CW</option>
								<option value="RTTY" <?php if($this->session->userdata('mode') == "RTTY") { echo "selected=\"selected\""; } ?>>RTTY</option>
								<option value="PSK31" <?php if($this->session->userdata('mode') == "PSK31") { echo "selected=\"selected\""; } ?>>PSK31</option>
								<option value="PSK63" <?php if($this->session->userdata('mode') == "PSK63") { echo "selected=\"selected\""; } ?>>PSK63</option>
								<option value="JT65" <?php if($this->session->userdata('mode') == "JT65") { echo "selected=\"selected\""; } ?>>JT65</option>
								<option value="JT65B" <?php if($this->session->userdata('mode') == "JT65B") { echo "selected=\"selected\""; } ?>>JT65B</option>
								<option value="JT6C" <?php if($this->session->userdata('mode') == "JT6C") { echo "selected=\"selected\""; } ?>>JT6C</option>
								<option value="JT6M" <?php if($this->session->userdata('mode') == "JT6M") { echo "selected=\"selected\""; } ?>>JT6M</option>
								<option value="JT9-1" <?php if($this->session->userdata('mode') == "JT9-1") { echo "selected=\"selected\""; } ?>>JT9-1</option>
								<option value="FSK441" <?php if($this->session->userdata('mode') == "FSK441") { echo "selected=\"selected\""; } ?>>FSK441</option>
								<option value="JTMS" <?php if($this->session->userdata('mode') == "JTMS") { echo "selected=\"selected\""; } ?>>JTMS</option>
								<option value="ISCAT" <?php if($this->session->userdata('mode') == "ISCAT") { echo "selected=\"selected\""; } ?>>ISCAT</option>
								<option value="MSK144" <?php if($this->session->userdata('mode') == "MSK144") { echo "selected=\"selected\""; } ?>>MSK144</option>
								<option value="JTMSK" <?php if($this->session->userdata('mode') == "JTMSK") { echo "selected=\"selected\""; } ?>>JTMSK</option>
								<option value="QRA64" <?php if($this->session->userdata('mode') == "QRA64") { echo "selected=\"selected\""; } ?>>QRA64</option>
								<option value="PKT" <?php if($this->session->userdata('mode') == "PKT") { echo "selected=\"selected\""; } ?>>PKT</option>
								<option value="SSTV" <?php if($this->session->userdata('mode') == "SSTV") { echo "selected=\"selected\""; } ?>>SSTV</option>
								<option value="HELL" <?php if($this->session->userdata('mode') == "HELL") { echo "selected=\"selected\""; } ?>>HELL</option>
								<option value="HELL80" <?php if($this->session->userdata('mode') == "HELL80") { echo "selected=\"selected\""; } ?>>HELL80</option>
								<option value="DSTAR" <?php if($this->session->userdata('mode') == "DSTAR") { echo "selected=\"selected\""; } ?>>DSTAR</option>
								<option value="DIGITALVOICE" <?php if($this->session->userdata('mode') == "DIGITALVOICE") { echo "selected=\"selected\""; } ?>>DIGITALVOICE</option>
							</select>
						</div>
						<div class="form-group col-lg-6">
						    <label class="m-r-15 form-control-label">Band </label>
						    <select name="band" class="form-control">
								<option value="160m" <?php if($this->session->userdata('band') == "160m") { echo "selected=\"selected\""; } ?>>160m</option>
								<option value="80m" <?php if($this->session->userdata('band') == "80m") { echo "selected=\"selected\""; } ?>>80m</option>
								<option value="60m" <?php if($this->session->userdata('band') == "60m") { echo "selected=\"selected\""; } ?>>60m</option>
								<option value="40m" <?php if($this->session->userdata('band') == "40m") { echo "selected=\"selected\""; } ?>>40m</option>
								<option value="30m" <?php if($this->session->userdata('band') == "30m") { echo "selected=\"selected\""; } ?>>30m</option>
								<option value="20m" <?php if($this->session->userdata('band') == "20m") { echo "selected=\"selected\""; } ?>>20m</option>
								<option value="17m" <?php if($this->session->userdata('band') == "17m") { echo "selected=\"selected\""; } ?>>17m</option>
								<option value="15m" <?php if($this->session->userdata('band') == "15m") { echo "selected=\"selected\""; } ?>>15m</option>
								<option value="12m" <?php if($this->session->userdata('band') == "12m") { echo "selected=\"selected\""; } ?>>12m</option>
								<option value="10m" <?php if($this->session->userdata('band') == "10m") { echo "selected=\"selected\""; } ?>>10m</option>
								<option value="6m" <?php if($this->session->userdata('band') == "6m") { echo "selected=\"selected\""; } ?>>6m</option>
								<option value="4m" <?php if($this->session->userdata('band') == "4m") { echo "selected=\"selected\""; } ?>>4m</option>
								<option value="2m" <?php if($this->session->userdata('band') == "2m") { echo "selected=\"selected\""; } ?>>2m</option>
								<option value="70cm" <?php if($this->session->userdata('band') == "70cm") { echo "selected=\"selected\""; } ?>>70cm</option>
								<option value="23cm" <?php if($this->session->userdata('band') == "23cm") { echo "selected=\"selected\""; } ?>>23cm</option>
								<option value="13cm" <?php if($this->session->userdata('band') == "14cm") { echo "selected=\"selected\""; } ?>>13cm</option>
								<option value="9cm" <?php if($this->session->userdata('band') == "9cm") { echo "selected=\"selected\""; } ?>>9cm</option>
								<option value="3cm" <?php if($this->session->userdata('band') == "3cm") { echo "selected=\"selected\""; } ?>>3cm</option>
							</select>
						</div>
                    </div>
                    <br><br><br>
                    <div class="form-inline">
						<div class="form-group col-lg-6">
						    <label class="m-r-15 form-control-label">RST (S) </label>
						    <input id="rst_sent"  class="form-control" name="rst_sent" type="text" size="3" value="59">
						</div>
						<div class="form-group col-lg-6">
						    <label class="m-r-15 form-control-label">RST (R)  </label>
						    <input id="rst_recv"  class="form-control" name="rst_recv" type="text"  size="3"  value="59">
						</div>
                    </div>
                    <br><br><br>
                    <div class="form-inline">
                    	<div class="col-lg-3">
                    		<label class="m-r-15 form-control-label">Name </label>
                    	</div>
						<div class="form-group col-lg-9">
						    <input id="name" class="form-control" type="text" name="name" value="" />
						</div>
                    </div>
                    <br><br><br>
                    <div class="form-inline">
                    	<div class="col-lg-3">
                    		<label class="m-r-15 form-control-label">Location </label>
                    	</div>
						<div class="form-group col-lg-9">
						    <input id="qth" class="form-control" type="text" name="qth" value="">
						</div>
                    </div>
                    <br><br><br>
                    <div class="form-inline">
                    	<div class="col-lg-3">
                    		<label class="m-r-15 form-control-label">Locator </label>
                    	</div>
						<div class="form-group col-lg-9">
						    <input id="locator" class="form-control" type="text" name="locator" value="" />
						</div>
                    </div>
                    <br><br><br>
                    <div class="form-inline">
                    	<div class="col-lg-3">
                    		<label class="m-r-15 form-control-label">Comment </label>
                    	</div>
						<div class="form-group col-lg-9">
						    <input id="comment" class="form-control" type="text" name="comment" value="" />
						</div>
                    </div>
                    <br><br><br>

                    <ul class="nav nav-tabs  tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home1" role="tab">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile1" role="tab">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#messages1" role="tab">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#settings1" role="tab">Settings</a>
                        </li>

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <div class="tab-pane active" id="home1" role="tabpanel">
                        	<br>
                           <div class="form-inline">
								<div class="col-lg-3">
									<label class="m-r-15 form-control-label">Propagation Mode </label>
								</div>
								<div class="form-group col-lg-9">
								    <select name="prop_mode" class="form-control">
										<option value="" selected="selected"></option>
										<option value="AUR">Aurora</option>
										<option value="AUE">Aurora-E</option>
										<option value="BS">Back scatter</option>
										<option value="ECH">EchoLink</option>
										<option value="EME">Earth-Moon-Earth</option>
										<option value="ES">Sporadic E</option>
										<option value="FAI">Field Aligned Irregularities</option>
										<option value="F2">F2 Reflection</option>
										<option value="INTERNET">Internet-assisted</option>
										<option value="ION">Ionoscatter</option>
										<option value="IRL">IRLP</option>
										<option value="MS">Meteor scatter</option>
										<option value="RPT">Terrestrial or atmospheric repeater or transponder</option>
										<option value="RS">Rain scatter</option>
										<option value="SAT">Satellite</option>
										<option value="TEP">Trans-equatorial</option>
										<option value="TR">Tropospheric ducting</option>
									</select>
								</div>
							</div>
							<br><br><br>
		                    <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">IOTA </label>
		                    	</div>
								<div class="form-group col-lg-9">
								    <input id="iota_ref" class="form-control" type="text" name="iota_ref" value="" >
								    <label> e.g: EU-005 </label>
								</div>
		                    </div>
                        </div>
                        <div class="tab-pane" id="profile1" role="tabpanel">
                        	<br>
                            <div class="form-inline">
								<div class="col-lg-3">
									<label class="m-r-15 form-control-label">Radio </label>
								</div>
								<div class="form-group col-lg-9">
								    <select class="form-control"  name="radio">
									<option value="0" selected="selected">None</option>
									<?php foreach ($radios->result() as $row) { ?>
									<option value="<?php echo $row->id; ?>" <?php if($this->session->userdata('radio') == $row->id) { echo "selected=\"selected\""; } ?>><?php echo $row->radio; ?></option>
									<?php } ?>
									</select>
								</div>
							</div>
							<br><br><br>
							<div class="form-inline">
								<div class="col-lg-3">
									<label class="m-r-15 form-control-label">Frequency	 </label>
								</div>
								<div class="form-group col-lg-9">
								    <input type="text" class="form-control" id="frequency" name="freq_display" value="" />
								</div>
							</div>
                        </div>
                        <div class="tab-pane" id="messages1" role="tabpanel">
                        	<br>
                           <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">Sat Mode </label>
		                    	</div>
								<div class="form-group col-lg-9">
								    <input id="sat_mode" type="text" name="sat_mode" class="form-control" value="<?php echo $this->session->userdata('sat_mode'); ?>" />
								</div>
		                    </div>
		                    <br><br><br>
		                    <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">Sat Name	 </label>
		                    	</div>
								<div class="form-group col-lg-9">
								    <input id="sat_name" type="text" name="sat_name" class="form-control" value="<?php echo $this->session->userdata('sat_name'); ?>" />
								</div>
		                    </div>
		                    <br><br><br>
		                    	
                        </div>
                        <div class="tab-pane" id="settings1" role="tabpanel">
                        	<br>
                            <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">Sat Name	 </label>
		                    	</div>
								<div class="form-group col-lg-9">
								    <input id="sat_name" type="text" name="sat_name" class="form-control" value="<?php echo $this->session->userdata('sat_name'); ?>" />
								</div>
		                    </div>
		                    <br><br><br>
		                    <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">Sent</label>
		                    	</div>
								<div class="form-group col-lg-9">
								    <select name="prop_mode" class="form-control">
										<option value="" selected="selected"></option>
										<option value="AUR">Aurora</option>
										<option value="AUE">Aurora-E</option>
										<option value="BS">Back scatter</option>
										<option value="ECH">EchoLink</option>
										<option value="EME">Earth-Moon-Earth</option>
										<option value="ES">Sporadic E</option>
										<option value="FAI">Field Aligned Irregularities</option>
										<option value="F2">F2 Reflection</option>
										<option value="INTERNET">Internet-assisted</option>
										<option value="ION">Ionoscatter</option>
										<option value="IRL">IRLP</option>
										<option value="MS">Meteor scatter</option>
										<option value="RPT">Terrestrial or atmospheric repeater or transponder</option>
										<option value="RS">Rain scatter</option>
										<option value="SAT">Satellite</option>
										<option value="TEP">Trans-equatorial</option>
										<option value="TR">Tropospheric ducting</option>
									</select>
								</div>
		                    </div>
		                    <br><br><br>
		                    <div class="form-inline">
		                    	<div class="col-lg-3">
		                    		<label class="m-r-15 form-control-label">Via </label>
		                    	</div>
								<div class="form-group col-lg-9">
								    <input type="text" name="qsl_via" value="" class="form-control" />
								</div>
		                    </div>
		                    <br><br><br>
                        </div>
                    </div>
                    <br><br><br>
                    
                    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-30">Submit</button>
                    <button type="submit" class="btn btn-default waves-effect waves-light m-r-30">reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header"><h5 class="card-header-text">Last 16 QSOs</h5><br>	
      </div>
      <div class="card-block">
        <div class="data_table_main">
          <table id="simpletable" class="table dt-responsive table-striped table-bordered nowrap">
            <thead>
            <tr>
              <th>Date</th>
              <th>Time</th>
			  <th>Call</th>
			  <th>Mode</th>
			  <th>Sent</th>
			  <th>Recv</th>
			  <th>Band</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
              <th>Date</th>
              <th>Time</th>
			  <th>Call</th>
			  <th>Mode</th>
			  <th>Sent</th>
			  <th>Recv</th>
			  <th>Band</th>
            </tr>
            </tfoot>
            <tbody>
            <?php $i = 0; 
		 foreach ($query->result() as $row) { ?>
				<?php  echo '<tr class="tr'.($i & 1).'">'; ?>
				<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('d/m/y', $timestamp); ?></td>
				<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('H:i', $timestamp); ?></td>
				<td><a class="qsobox" href="<?php echo site_url('logbook/view')."/".$row->COL_PRIMARY_KEY; ?>"><?php echo strtoupper($row->COL_CALL); ?></a></td>
				<td><?php echo $row->COL_MODE; ?></td>
				<td><?php echo $row->COL_RST_SENT; ?></td>
				<td><?php echo $row->COL_RST_RCVD; ?></td>
				<?php if($row->COL_SAT_NAME != null) { ?>
				<td><?php echo $row->COL_SAT_NAME; ?></td>
				<?php } else { ?>
				<td><?php echo $row->COL_BAND; ?></td>
				<?php } ?>
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
</div>

<script type="text/javascript">
	i=0;
	$(document).ready(function(){

	// Set the focus input to the callsign field
	$("#callsign").focus();

	/* Javascript for controlling rig frequency. */

	// Update frequency every second
	setInterval(function() {
		if($('select.radios option:selected').val() != '0') {
			// Get frequency
			$.get('<?php echo site_url('radio/frequency');?>/' + $('select.radios option:selected').val(), function(result) {
				$('#frequency').val(result);
				
				result = parseInt(result);
				
				if(result >= 14000000 && result <= 14400000) {
					$(".band").val('20m');
				}
				else if(result >= 18000000 && result <= 19000000) {
					$(".band").val('17m');
				}
				else if(result >= 1810000 && result <= 2000000) {
					$(".band").val('160m');
				}
				else if(result >= 3000000 && result <= 4000000) {
					$(".band").val('80m');
				}
				else if(result >= 5250000 && result <= 5450000) {
					$(".band").val('60m');
				}
				else if(result >= 7000000 && result <= 7500000) {
					$(".band").val('40m');
				}
				else if(result >= 10000000 && result <= 11000000) {
					$(".band").val('30m');
				}
				else if(result >= 21000000 && result <= 21600000) {
					$(".band").val('15m');
				}
				else if(result >= 24000000 && result <= 25000000) {
					$(".band").val('12m');
				}
				else if(result >= 28000000 && result <= 30000000) {
					$(".band").val('10m');
				}
				else if(result >= 50000000 && result <= 56000000) {
					$(".band").val('6m');
				}
				else if(result >= 144000000 && result <= 148000000) {
					$(".band").val('2m');
				}
				else if(result >= 430000000 && result <= 440000000) {
					$(".band").val('70cm');
				}
			});
			
			// Get Mode
			$.get('<?php echo site_url('radio/mode');?>/' + $('select.radios option:selected').val(), function(result) {
				if (result == "LSB" || result == "USB" || result == "SSB") {
					$(".mode").val('SSB');
				} else {
					$(".mode").val(result);	
				}
			});
		}			
	}, 1000);


	// If a radios selected from drop down select radio update.
	$('.radios').change(function() {
		if($('select.radios option:selected').val() != '0') {
		// Get frequency
			$.get('<?php echo site_url('radio/frequency');?>/' + $('select.radios option:selected').val(), function(result) {
				$('#frequency').val(result);
				result = parseInt(result);
				
				if(result >= 14000000 && result <= 14400000) {
					$(".band").val('20m');
				}
				else if(result >= 18000000 && result <= 19000000) {
					$(".band").val('17m');
				}
				else if(result >= 1810000 && result <= 2000000) {
					$(".band").val('160m');
				}
				else if(result >= 3000000 && result <= 4000000) {
					$(".band").val('80m');
				}
				else if(result >= 5250000 && result <= 5450000) {
					$(".band").val('60m');
				}
				else if(result >= 7000000 && result <= 7500000) {
					$(".band").val('40m');
				}
				else if(result >= 10000000 && result <= 11000000) {
					$(".band").val('30m');
				}
				else if(result >= 21000000 && result <= 21600000) {
					$(".band").val('15m');
				}
				else if(result >= 24000000 && result <= 25000000) {
					$(".band").val('12m');
				}
				else if(result >= 28000000 && result <= 30000000) {
					$(".band").val('10m');
				}
				else if(result >= 50000000 && result <= 56000000) {
					$(".band").val('6m');
				}
				else if(result >= 144000000 && result <= 148000000) {
					$(".band").val('2m');
				}
				else if(result >= 430000000 && result <= 440000000) {
					$(".band").val('70cm');
				}
			});	
			
			// Get Mode
			$.get('<?php echo site_url('radio/mode');?>/' + $('select.radios option:selected').val(), function(result) {
				if (result == "LSB" || result == "USB" || result == "SSB") {
					$(".mode").val('SSB');
				} else {
					$(".mode").val(result);	
				}
			});	
	
		}
	});

		/* On Page Load */
		var catcher = function() {
		  var changed = false;
		  $('form').each(function() {
		    if ($(this).data('initialForm') != $(this).serialize()) {
		      changed = true;
		      $(this).addClass('changed');
		    } else {
		      $(this).removeClass('changed');
		    }
		  });
		  if (changed) {
		    return 'Unsaved QSO!';
		  }
		};

		$(function() {
		  $('form').each(function() {
		    $(this).data('initialForm', $(this).serialize());
		  }).submit(function(e) {
		    var formEl = this;
		    var changed = false;
		    $('form').each(function() {
		      if (this != formEl && $(this).data('initialForm') != $(this).serialize()) {
		        changed = true;
		        $(this).addClass('changed');
		      } else {
		        $(this).removeClass('changed');
		      }
		    });
		    if (changed && !confirm('You have an unsaved QSO. Continue with QSO?')) {
		      e.preventDefault();
		    } else {
		      $(window).unbind('beforeunload', catcher);
		    }
		  });
		  $(window).bind('beforeunload', catcher);
		});
		
		$.get('<?php echo site_url('qso/band_to_freq'); ?>/' + $('.band').val() + '/' + $('.mode').val(), function(result) {
						$('#frequency').val(result);
		});	
	
		/* Calculate Frequency */
			/* on band change */
			$('.band').change(function() {
				$.get('<?php echo site_url('qso/band_to_freq'); ?>/' + $(this).val() + '/' + $('.mode').val(), function(result) {
						$('#frequency').val(result);
					});	
			});
			
			/* on mode change */
			$('.mode').change(function() {
				$.get('<?php echo site_url('qso/band_to_freq'); ?>/' + $('.band').val() + '/' + $('.mode').val(), function(result) {
						$('#frequency').val(result);
					});	
			});
	
		/* On Key up Calculate Bearing and Distance */
		$("#locator").keyup(function(){
			if ($(this).val()) {
				$('#locator_info').load("<?php echo site_url('logbook/bearing'); ?>/" + $(this).val()).fadeIn("slow");
			}
		});
	
		/* On Callsign Change */
		$("#callsign").focusout(function(){
			if ($(this).val()) {
				/* Find Callsign Matches */
				$('#partial_view').load("<?php echo site_url('logbook/partial'); ?>/" + $(this).val()).fadeIn("slow");
	
				/* Find and populate DXCC */
				$.get('<?php echo site_url('logbook/find_dxcc'); ?>/' + $(this).val(), function(result) {
					//$('#country').val(result);
					obj = JSON.parse(result);
					$('#country').val(convert_case(obj.Name));
					$('#dxcc_id').val(obj.DXCC);
					$('#cqz').val(obj.CQZ);
				});
	
				/* Find Locator if the field is empty */
				if($('#locator').val() == "") {
					$.get('<?php echo site_url('logbook/callsign_qra'); ?>/' + $(this).val(), function(result) {
						$('#locator').val(result);
						$('#locator_info').load("<?php echo site_url('logbook/bearing'); ?>/" + result).fadeIn("slow");
					});

				}
	
				/* Find Operators Name */
				if($('#name').val() == "") {
					$.get('<?php echo site_url('logbook/callsign_name'); ?>/' + $(this).val(), function(result) {
						$('#name').val(result);
					});
				}

				if($('#qth').val() == "") {
					$.get('<?php echo site_url('logbook/callsign_qth'); ?>/' + $(this).val(), function(result) {
						$('#qth').val(result);
					});
				}

			}
		});
	});

	function convert_case(str) {
	  var lower = str.toLowerCase();
	  return lower.replace(/(^| )(\w)/g, function(x) {
	    return x.toUpperCase();
	  });
	}
</script>