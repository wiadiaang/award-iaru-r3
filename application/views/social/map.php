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


	
	<script type="text/javascript">
	  function create_map() {
	    var latlng = new google.maps.LatLng(40.313043, -32.695312);
	    var myOptions = {
	      zoom: 2,
	      center: latlng,
	      mapTypeId: google.maps.MapTypeId.ROADMAP
	    };
	    var infowindow = new google.maps.InfoWindow();

	    var marker, i;

	    /* Get QSO points via json*/
		 $.getJSON("/logbook/index.php/social/json_map/<?php echo $date; ?>", function(data) {
		 	
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
	</script>

<h2>Social Media Map - <?php echo $formated_date; ?></h2>
<div class="wrap_content dashboard">

	<div id="map" style="width: 100%; height: 300px"></div> 


	<div id="dashboard_container">
		
		<div class="dashboard_top">
			
			<div class="dashboard_log">
				<table class="logbook" width="100%">
					<tr class="log_title titles">
						<td>Time</td>
						<td>Call</td>
						<td>Mode</td>
						<td>Sent</td>
						<td>Recv</td>
						<td>Band</td>
					</tr>

					<?php $i = 0; 
					foreach ($qsos->result() as $row) { ?>
						<?php  echo '<tr class="tr'.($i & 1).'">'; ?>
						<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('d/m/y', $timestamp); ?></td>
						<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('H:i', $timestamp); ?></td>
						<td><a class="qsobox" href="<?php echo site_url('logbook/view')."/".$row->COL_PRIMARY_KEY; ?>"><?php echo strtoupper($row->COL_CALL); ?></a></td>
						<td><?php echo $row->COL_MODE; ?></td>
						<td><?php echo $row->COL_RST_SENT; ?></td>
						<td><?php echo $row->COL_RST_RCVD; ?></td>
						<?php if($row->COL_SAT_NAME != null) { ?>
						<td>SAT</td>
						<?php } else { ?>
						<td><?php echo $row->COL_BAND; ?></td>
						<?php } ?>
					</tr>
					<?php $i++; } ?>

				</table>

			</div>
			
			<div class="clear"></div>
		</div>
		
		<!-- <div class="dashboard_bottom">
			<div class="chart" id="modechart_div"></div>
			<div class="chart" id="bandchart_div"></div>
		</div> -->
		
	</div>

	<div class="clear"></div>
</div>