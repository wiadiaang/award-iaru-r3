<style type="text/css">
	
	h1 {
		position: relative;
		float: left;
		margin-bottom: 10px;
		padding: 10px 0;
		width: 100%;
		font: 700 18px "Montserrat";
	}

</style>

<div id="container"></div>




<script type="text/javascript">
i=0;
$(document).ready(function(){

	$('#container').load("logbook/search_result/<?php echo $this->input->post('callsign'); ?>", function() {
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

		$('#container').load("logbook/search_result/" + $(this).val(), function() {
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
	
