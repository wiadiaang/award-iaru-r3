<!-- JS -->

	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ;?>/js/jquery.jclock.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ;?>/js/radiohelpers.js"></script>

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

			$(function($) {
		      var options = {
		        utc: true
		      }
		      $('.input_time').jclock(options);
		    });
		});

	</script>

<div id="container">



<!-- <?php if($notice) { ?>
<div class="alert-message info">
        <?php echo $notice; ?>
</div>
<?php } ?>

<?php if(validation_errors()) { ?>
<div class="alert-message error">
        <?php echo validation_errors(); ?>
</div>
<?php } ?>

	<div class="row show-grid " style="margin: 20px">
	  <div class="span6">
	 
	  	<h2>Add QSO</h2>
		
		<form id="qso_input" method="post" action="<?php echo site_url('qso'); ?>" name="qsos">
			<input type="hidden" id="dxcc_id" name="dxcc_id" value=""/>
			<input type="hidden" id="cqz" name="cqz" value="" />

		<table style="margin-bottom: 0px;">

			<tr>
				<td class="title">Date</td>
				<td><input class="input_date" type="text" name="start_date" value="<?php echo date('d-m-Y'); ?>" size="10" /> <input class="input_time" type="text" name="start_time" value="" size="7" /></td>
			</tr>

			<tr>
				<td class="title">Callsign</td>
				<td><input size="10" id="callsign" type="text" name="callsign" value="" /></td>
			</tr>	

			<tr>
				<td class="title">Mode</td>
				<td>
			<select name="mode" class="mode">
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

				<span class="title">Band</span>
				<select name="band" class="band">
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
				</select></td>
			</tr>

			<tr>
				<td class="title">RST (S)</td>
				<td><input id="rst_sent" class="rst" name="rst_sent" type="text" size="3" value="59"> <span class="title">RST (R)</span> <input id="rst_recv" class="rst" name="rst_recv" type="text"  size="3"  value="59"></td>
			</tr>

			<tr>
				<td class="title">Name</td>
				<td><input id="name" type="text" name="name" value="" /></td>
			</tr>	

			<tr>
				<td class="title">Location</td>
				<td><input id="qth" type="text" name="qth" value="" /></td>
			</tr>

			<tr>
				<td class="title">Locator</td>
				<td><input id="locator" type="text" name="locator" value="" size="7" /></td>
			</tr>

			<tr>
				<td class="title">Comment</td>
				<td><input id="comment" type="text" name="comment" value="" /></td>
			</tr>
		</table>


		<div class="info">
			<input style="border: none; -webkit-box-shadow: none;" size="20" id="country" type="text" name="country" value="" /> <span id="locator_info"></span>
		</div>

		<ul class="tabs">
		  <li class="active"><a href="#home">Home</a></li>
		  <li><a href="#station">Station</a></li>
		  <li><a href="#satellite">Satellite</a></li>
		  <li><a href="#qsl">QSL</a></li>
		</ul>
		 
		<div class="pill-content">
		  <div class="active" id="home">
				<table>
					<tr>
						<td>Propagation Mode</td>
						<td>
							<select name="prop_mode">
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
						</td>
					</tr>
					<tr>
						<td>IOTA</td>
						<td><input id="iota_ref" type="text" name="iota_ref" value="" /> e.g: EU-005</td>
					</tr>
				</table>
		  </div>
		  <div id="station">
				<table>
					<tr>
						<td>Radio</td>
						<td>
							<select class="radios" name="radio">
							<option value="0" selected="selected">None</option>
							<?php foreach ($radios->result() as $row) { ?>
							<option value="<?php echo $row->id; ?>" <?php if($this->session->userdata('radio') == $row->id) { echo "selected=\"selected\""; } ?>><?php echo $row->radio; ?></option>
							<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Frequency</td>
						<td><input type="text" id="frequency" name="freq_display" value="" /></td>
					</tr>
				</table>
		  </div>
		  <div id="satellite">
				<table>
					<tr>
						<td>Sat Name</td>
						<td><input id="sat_name" type="text" name="sat_name" class="sat_name" value="<?php echo $this->session->userdata('sat_name'); ?>" /></td>
					</tr>
	
					<tr>
						<td>Sat Mode</td>
						<td><input id="sat_mode" type="text" name="sat_mode" class="sat_mode" value="<?php echo $this->session->userdata('sat_mode'); ?>" /></td>
					</tr>
				</table>
		  </div>
		  <div id="qsl">
				<table>
					<tr>
						<td>Sent</td>
						<td><select name="qsl_sent">
							<option value="N" selected="selected">No</option>
							<option value="Y">Yes</option>
							<option value="R">Requested</option>
						</select></td>
					<tr>
						<td>Method</td>
						<td><select name="qsl_sent_method">
							<option value="" selected="selected">Method</option>
							<option value="D">Direct</option>
							<option value="B">Bureau</option>
						</select></td>
					</tr>
					
					<tr>
						<td>Via</td>
						<td><input type="text" name="qsl_via" value="" /></td>
					</tr>
				</table>
		  </div>
		</div>

		<div class="actions"><input class="btn primary" type="submit" value="Add QSO" /> <input type="reset" value="Reset" class="btn" /></div>
		

		</form>
	  </div>
	  <div class="span9 offset1">

		 <div id="partial_view">
		 	<h2>Last 16 QSOs</h2>

		 	<table class="zebra-striped" width="100%">
				<tr class="log_title titles">
					<td>Date</td>
					<td>Time</td>
					<td>Call</td>
					<td>Mode</td>
					<td>Sent</td>
					<td>Recv</td>
					<td>Band</td>
				</tr>

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

			</table></div>

	  </div>
	</div>

</div> -->

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
            <div class="card-header"><h5 class="card-header-text">Add QSO</h5>
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

<script type="text/javascript">
	i=0;
	$(document).ready(function(){

	// Set the focus input to the callsign field
	$("#callsign").focus();
	/* Javascript for controlling rig frequency. */

	var updateFromCAT = function() {
		if($('select.radios option:selected').val() != '0') {
			// Get frequency
			$.get('radio/frequency/' + $('select.radios option:selected').val(), function(result) {

				if(result == "0") {
				} else {
					$('#frequency').val(result);
					$(".band").val(frequencyToBand(result));
				}
			});
			
			// Get Mode
			$.get('radio/mode/' + $('select.radios option:selected').val(), function(result) {
				if (result == "LSB" || result == "USB" || result == "SSB") {
					$(".mode").val('SSB');
				} else {
					$(".mode").val(result);	
				}
			});

			// Get SAT_Name
			$.get('radio/satname/' + $('select.radios option:selected').val(), function(result) {
					$(".sat_name").val(result);	
			});

			// Get SAT_Name
			$.get('radio/satmode/' + $('select.radios option:selected').val(), function(result) {
					$(".sat_mode").val(result);	
			});
		}
	};

	// Update frequency every second
	setInterval(updateFromCAT, 1000);

	// If a radios selected from drop down select radio update.
	$('.radios').change(updateFromCAT);

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
		
		$.get('qso/band_to_freq/' + $('.band').val() + '/' + $('.mode').val(), function(result) {
						$('#frequency').val(result);
		});	
	
		/* Calculate Frequency */
			/* on band change */
			$('.band').change(function() {
				$.get('qso/band_to_freq/' + $(this).val() + '/' + $('.mode').val(), function(result) {
						$('#frequency').val(result);
					});	
			});
			
			/* on mode change */
			$('.mode').change(function() {
				$.get('qso/band_to_freq/' + $('.band').val() + '/' + $('.mode').val(), function(result) {
						$('#frequency').val(result);
					});	
			});
	
		/* On Key up Calculate Bearing and Distance */
		$("#locator").keyup(function(){
			if ($(this).val()) {
				$('#locator_info').load("logbook/bearing/" + $(this).val()).fadeIn("slow");
			}
		});
	
		/* On Callsign Change */
		$("#callsign").focusout(function(){
			if ($(this).val()) {
				/* Find Callsign Matches */
				$('#partial_view').load("logbook/partial/" + $(this).val()).fadeIn("slow");
	
				/* Find and populate DXCC */
				$.get('logbook/find_dxcc/' + $(this).val(), function(result) {
					//$('#country').val(result);
					obj = JSON.parse(result);
					$('#country').val(convert_case(obj.Name));
					$('#dxcc_id').val(obj.DXCC);
					$('#cqz').val(obj.CQZ);

				});
	
				/* Find Locator if the field is empty */
				if($('#locator').val() == "") {
					$.get('logbook/callsign_qra/' + $(this).val(), function(result) {
						$('#locator').val(result);
						$('#locator_info').load("logbook/bearing/" + result).fadeIn("slow");
					});

				}
	
				/* Find Operators Name */
				if($('#name').val() == "") {
					$.get('logbook/callsign_name/' + $(this).val(), function(result) {
						$('#name').val(result);
					});
				}

				if($('#qth').val() == "") {
					$.get('logbook/callsign_qth/' + $(this).val(), function(result) {
						$('#qth').val(result);
					});
				}
		
				if($('#qth').val() == "") {
					$.get('logbook/callsign_iota/' + $(this).val(), function(result) {
						$('#iota_ref').val(result);
					});
				}

			}
		});
		
		
		// Change report based on mode
		$('.mode').change(function(){
		  if($(this).val() == 'JT65' || $(this).val() == 'JT65B' || $(this).val() == 'JT6C' || $(this).val() == 'JTMS' || $(this).val() == 'ISCAT' || $(this).val() == 'MSK144' || $(this).val() == 'JTMSK' || $(this).val() == 'QRA64'){
			$('#rst_sent').val('-5');
			$('#rst_recv').val('-5');
		  } else if ($(this).val() == 'FSK441' || $(this).val() == 'JT6M') {
		  	$('#rst_sent').val('26');
			$('#rst_recv').val('26');
		  } else if ($(this).val() == 'CW') {
		  	$('#rst_sent').val('599');
			$('#rst_recv').val('599');
		  } else {
		  	$('#rst_sent').val('59');
			$('#rst_recv').val('59');
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