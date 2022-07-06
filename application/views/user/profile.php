	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

	<script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

	<script type="text/javascript">

		$(document).ready(function() {
			$(".qsobox").fancybox({
				'width'				: '75%',
				'height'			: '50%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});


		});

	</script>

<div id="container">

<div class="container-fluid">

<!-- Header starts -->
	    <div class="row">
	        <div class="main-header">
	            <h4><?php echo $this->session->userdata('user_name')."'s profile"; ?></h4>
	        </div>
	    </div>
	    <!-- Header end -->
<div class="col-xl-4 col-lg-12">
                    <div class="card">
                        <div class="user-block-2">
                            <img class="img-fluid" src="<?php echo base_url();?>backend/images/avatar-1.png" alt="user-header">
                        </div>
                        <div class="card-block">
                            <div class="user-block-2-activities">
                                <div class="user-block-2-active">
                                    <div class="row">
                                    	<div class="col-lg-6">
                                    		Username
                                    	</div>
                                    	<div class="col-lg-6">
                                    		: <?php if(isset($user_name)) { echo $user_name; } ?>
                                    	</div>
                                    </div>
                                </div>
                            </div>
                            <div class="user-block-2-activities">
                                <div class="user-block-2-active">
                                    <div class="row">
                                    	<div class="col-lg-6">
                                    		Level
                                    	</div>
                                    	<div class="col-lg-6">
                                    		: <?php $l = $this->config->item('auth_level'); echo $l[$user_type]; ?>
                                    	</div>
                                    </div>
                                </div>
                            </div>
                            <div class="user-block-2-activities">
                                <div class="user-block-2-active">
                                    <div class="row">
                                    	<div class="col-lg-6">
                                    		E-mail
                                    	</div>
                                    	<div class="col-lg-6">
                                    		: <?php if(isset($user_email)) { echo $user_email; } ?>
                                    	</div>
                                    </div>
                                </div>
                            </div>
                            <div class="user-block-2-activities">
                                <div class="user-block-2-active">
                                    <div class="row">
                                    	<div class="col-lg-6">
                                    		Callsign
                                    	</div>
                                    	<div class="col-lg-6">
                                    		: <?php if(isset($user_callsign)) { echo $user_callsign; } ?>
                                    	</div>
                                    </div>
                                </div>
                            </div>
                            <div class="user-block-2-activities">
                                <div class="user-block-2-active">
                                    <div class="row">
                                    	<div class="col-lg-6">
                                    		Locator
                                    	</div>
                                    	<div class="col-lg-6">
                                    		: <?php if(isset($user_callsign)) { echo $user_callsign; } ?>
                                    	</div>
                                    </div>
                                </div>
                            </div>
                            <div class="user-block-2-activities">
                                <div class="user-block-2-active">
                                    <div class="row">
                                    	<div class="col-lg-6">
                                    		First name
                                    	</div>
                                    	<div class="col-lg-6">
                                    		: <?php if(isset($user_firstname)) { echo $user_firstname; } ?>
                                    	</div>
                                    </div>
                                </div>
                            </div>
                            <div class="user-block-2-activities">
                                <div class="user-block-2-active">
                                    <div class="row">
                                    	<div class="col-lg-6">
                                    		Last name
                                    	</div>
                                    	<div class="col-lg-6">
                                    		: <?php if(isset($user_lastname)) { echo $user_lastname; } ?>
                                    	</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                            	<a href="<?php echo site_url('user/edit')."/".$this->session->userdata('user_id'); ?>">
                                	<button type="button" class="btn btn-primary waves-effect waves-light text-uppercase">
                                    Edit profile
                                	</button>
                            	</a>
                            </div>
                        </div>
                    </div>
                </div>
</div>
</div>
