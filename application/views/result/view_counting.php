<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<div id="container">

<h1>World Ranking</h1>

<div class="row show-grid">
	  <div class="span16">
	  
		<?php echo validation_errors(); ?>
<!-- 		<form method="post" action="<?php echo $action; ?>" >
		<table>
		
			
			<tr>
				<td><label for="station">Station</label></td>
				<td><select name="station" id="station">
					<option value="0" >ALL</option>
					<option value="YB72RI/0">YB72RI/0</option>
					<option value="YB72RI/1">YB72RI/1</option>
					<option value="YB72RI/2">YB72RI/2</option>
					<option value="YB72RI/3">YB72RI/3</option>
					<option value="YB72RI/4">YB72RI/4</option>
					<option value="YB72RI/5">YB72RI/5</option>
					<option value="YB72RI/6">YB72RI/6</option>
					<option value="YB72RI/7">YB72RI/7</option>
					<option value="YB72RI/8">YB72RI/8</option>
					<option value="YB72RI/9">YB72RI/9</option>
				</select></td>
			</tr>
			
			<tr>
			<td></td>
			<td><input class="btn primary" type="submit" value="Submit"  /></td>
						
			</tr>
		</table>




		</form> -->
			<!-- <div id="list_data"></div> -->

		<div class="span14">

		 <!-- 	<table style="width: 100% !important;" class="zebra-striped" id="example1"> -->
		 <table class="table table-striped table-bordered data" id="dataTables">
		 		<thead>
		 			<tr class="titles">
		 				<th>No</th>
		 				<th>CallSign</th>
		 				<th>Total QSO</th>
		 				
		 			</tr>
		 			
		 		</thead>
		 		<tbody>
			 		<?php $start = 0; foreach ($terbanyak as $row) { ?>
					<tr>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo  ++$start; ?></td>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo $row['COL_CALL']; ?></td>
						<td style='text-align: center;border:1px solid #DDDDDD;'><?php echo $row['TOTAL']; ?></td>
						
					</tr>
					<?php  } ?>


		 		</tbody>

		 	</table>
		</div>
	  </div>

	 

	</div>


</div>
<div>
	

</div>

<!-- <div id="container"> -->
<!-- <a class="qsobox" href="<?php echo site_url('logbook/view')."/".$row['COL_PRIMARY_KEY']; ?>"> -->
<!-- <h2>Search</h2>

<form method="post" action="" id="search_box" name="test">
	Callsign: <input type="text" id="callsign" name="callsign" value="" />
</form> -->

<!-- <div id="partial_view"></div>

</div> -->


<script type="text/javascript">
i=0;
$(document).ready(function(){

	$('#partial_view').load("logbook/search_result/<?php echo $this->input->post('callsign'); ?>", function() {
	      // after load trigger your fancybox 
			$(".qsobox").fancybox({
				'autoDimensions'	: false,
				'width'         	: 700,
				'height'        	: 300,
				'transitionIn'		: 'fade',
				'transitionOut'		: 'fade',
				'type'				: 'iframe'
			});

	      	$(".editbox").fancybox({
				'autoDimensions'	: false,
				'width'         	: 450,
				'height'        	: 550,
				'transitionIn'		: 'fade',
				'transitionOut'		: 'fade',
				'type'				: 'iframe',
			});
	});

  $("#callsign").keyup(function(){
	if ($(this).val()) {

		$('#partial_view').load("logbook/search_result/" + $(this).val(), function() {
				$(".qsobox").fancybox({
					'autoDimensions'	: false,
					'width'         	: 700,
					'height'        	: 300,
					'transitionIn'		: 'fade',
					'transitionOut'		: 'fade',
					'type'				: 'iframe'
				});
	 
		      // after load trigger your fancybox 
		      	$(".editbox").fancybox({
					'autoDimensions'	: false,
					'width'         	: 450,
					'height'        	: 550,
					'transitionIn'		: 'fade',
					'transitionOut'		: 'fade',
					'type'				: 'iframe',
				});
		});
	}

  });
});


</script>
	


	



	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

	<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script>
	$(document).ready(function() {
		$('#dataTables').DataTable();
	} );
	</script>