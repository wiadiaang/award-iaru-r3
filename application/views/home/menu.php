			<section class="page_toplogo table_section table_section_md ls section_padding_top_30 section_padding_bottom_30" style="border-bottom: 5px solid #CF1717;">
				<div class="container">
					<div class="row">
						<div class="col-md-4 text-center text-md-left">
							<a href="" class="logo top_logo" style="text-align: center;">
								<img style="width: 70%;" src="<?php echo base_url();?>assets/images/logo.png" alt="">
							</a>
						</div>
						<div class="col-md-8">
							<div class="col-md-12" style="padding-top: 20px;">
								<h3>LOG SEARCH</h3>
								<p>This form allows you to check if you are "in the log" of YB72RI.</p>
							</div>
							<!--   <form method="post" action="<?php echo site_url('search'); ?>"><input type="text" name="callsign" placeholder="Search Callsign"></form> -->
							<form class="contact-form columns_margin_bottom_20" method="post" action="<?php echo site_url('search'); ?> " target="_blank">
							<div class="col-md-5 text-center text-md-right">
								<div class="form-group">
									<label for="pickup-name">Callsign to Check
										<span class="required">*</span>
									</label>
									<i class="fa fa-user highlight2" aria-hidden="true"></i>
									<input type="text" aria-required="true" value="" name="callsign" id="callsign" class="form-control" placeholder="Your Callsign">
								</div>
							</div>
							<div class="col-md-4 text-center text-md-right">
								<div class="form-group">
									<label for="pickup-name">Log to Search</label>
									<i class="fa fa-user highlight2" aria-hidden="true"></i>
									<input disabled="disabled" type="text" aria-required="true" value="YB72RI" name="pickup-name" id="pickup-name" class="form-control" placeholder="YB72RI">
								</div>
							</div>
							<div class="col-md-2">
								<div class="contact-form-submit">
									<button type="submit" id="pickup-_submit" name="contact_submit" class="theme_button color1">Search</button>
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</section>