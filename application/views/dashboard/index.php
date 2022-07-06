	<!-- <script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" /> -->

	<!-- <script type="text/javascript">

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

	</script> -->
	
	<!-- <script type="text/javascript">
	  function create_map() {
	  
	  	<?php if($qra == "set") { ?>
		var latlng = new google.maps.LatLng(<?php echo $qra_lat; ?>, <?php echo $qra_lng; ?>);	
		<?php } else { ?>
		var latlng = new google.maps.LatLng(106.665221, -6.090138);
		<?php } ?>
	  
	    var myOptions = {
	      zoom: 3,
	      center: latlng,
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	    };
	    var infowindow = new google.maps.InfoWindow();

	    var marker, i;

	    /* Get QSO points via json*/
		 $.getJSON("<?php echo site_url('dashboard/map'); ?>", function(data) {
		 	
			$.each(data.markers, function(i, val) {
				/* Create Markers */
			    marker = new google.maps.Marker({
		        	position: new google.maps.LatLng(this.lat, this.lng),
		        	map: map
		   		});
		   		
		   		/* Store Popup Text */
		   		var content = this.html;
		   	
		   		/* Create Popups */
		   		google.maps.event.addListener(marker, 'click', (function(marker, i) {
		        	return function() {
		        		infowindow.setContent(content);
		          		infowindow.open(map, marker);
		        	}
				})(marker, i));
			});
		 });

	    var map = new google.maps.Map(document.getElementById("map"),
	        myOptions);
	  }

	    $(document).ready(function(){
			create_map();
	  });
	</script> -->

<div id="container">

<!-- <?php if(($this->config->item('use_auth') && ($this->session->userdata('user_type') >= 2)) || $this->config->item('use_auth') === FALSE) { ?>
<div class="alert-message success">
	  <p>You have had <strong><?php echo $todays_qsos; ?></strong> QSOs Today!</p>
</div>
<?php } ?> -->

<!-- Map -->
<!-- <div style="position: absolute; z-index: -1; top: 0; left: 0; width: 100%; height: 300px"><img src="/uploads/bg1.jpg" alt="DIRGAHAYU RI 72" title="DIRGAHAYU RI 72"></div> -->

<!-- <div style="width: 100%; height: 300px"><img src="/uploads/bg1.jpg" alt="DIRGAHAYU RI 72" title="DIRGAHAYU RI 72"></div>

 -->
<!-- Log Data -->

<div class="container-fluid">
	<div class="row">
		&nbsp;
	</div>
 	<div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h5 class="card-header-text">DASHBOARD</h5><br>
				<?php if(($this->config->item('use_auth') && ($this->session->userdata('user_type') >= 2)) || $this->config->item('use_auth') === FALSE) { ?>
				<div class="alert-message success">
					  <p>You have had <strong><?php echo $todays_qsos; ?></strong> QSOs Today!</p>
				</div>
				<?php } ?>
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
				foreach ($last_five_qsos->result() as $row) { ?>
					<?php  echo '<tr class="tr'.($i & 1).'">'; ?>
						<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('d/m/y', $timestamp); ?></td>
						<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('H:i', $timestamp); ?></td>
						<td><a class="qsobox" href="<?php echo site_url('logbook/view')."/".$row->COL_PRIMARY_KEY; ?>"><?php echo strtoupper($row->COL_CALL); ?></a></td>
						<td><?php echo $row->COL_MODE; ?></td>
						<td>
						  <?php echo $row->COL_RST_SENT; ?>
						</td>
						<td>
						  <?php echo $row->COL_RST_RCVD; ?>
						</td>
						<?php if($row->COL_SAT_NAME != null) { ?>
						<td><?php echo $row->COL_SAT_NAME; ?></td>
						<?php } else { ?>
						<td><?php echo strtolower($row->COL_BAND); ?></td>
						<?php } ?>
					</tr>
				<?php $i++; } ?>
                </tbody>
              </table>
            </div>
          </div>
           <div class="card-block">  <div class="table-responsive" data-pattern="priority-columns">
                    <table cellspacing="0" id="tech-companies-1" class="table table-small-font table-bordered table-striped">
                        <tbody>

                    	<tr >
							<th colspan="2"><span class="icon_stats">QSOs</span></th>
						</tr>
						
						<tr>
							<th>Total </th>
							<td><?php echo $total_qsos; ?></td>
						</tr>
						
						<tr class="titles">
							<th colspan="2"><span class="icon_world">Countries</span></th>
						</tr>
						
						<tr>
							<th>Worked</th>
							<td><?php echo $total_countrys; ?></td>
						</tr>
                        </tbody>
                    </table>
                </div>
        </div>
      </div>
    </div>
</div>
</div>

<!-- <script src="<?php echo base_url(); ?>backend/plugins/tour/js/kinetic-v5.1.0.min.js"></script>
<script src="<?php echo base_url(); ?>backend/plugins/tour/js/enjoyhint.min.js"></script>
<script>

  'use strict';
$(document).ready(function() {

var enjoyhint_instance = new EnjoyHint({});

//simple config.
//Only one step - highlighting(with description) "New" button
//hide EnjoyHint after a click on the button.
var enjoyhint_script_steps = [
  {
    'click .jtour' : 'Click the "sidebar" button to toggle the sidebar',
    showSkip: false
  },
  {
    'click .drop-image' : 'Show your profile settings'
  },
  {
    'click .displayChatbox' : 'Chatting with your friends'
  },
];

//set script config
enjoyhint_instance.set(enjoyhint_script_steps);

//run Enjoyhint script
enjoyhint_instance.run();


           });


</script> -->
