

<div id="canvas">
	<div id="box_wrapper">	
		<section class="page_toplogo table_section table_section_md ls section_padding_top_30 section_padding_bottom_30" style="border-bottom: 5px solid #c79f00">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="col-md-12" style="padding-top: 20px;">
							<h3></h3>
							
						</div>
					
						<form class="contact-form columns_margin_bottom_20" method="post" action="<?php echo $action; ?> " target="_blank">
						<div class="row">
										<div class="col-md-10">
							<div class="form-group">
								<!-- <label for="pickup-name">Callsign to Check
									<span class="required">*</span>
								</label> -->
								<i class="fa fa-user highlight2" aria-hidden="true"></i>
							<!-- 	<input type="text" aria-required="true" required="required" value="" name="nama" id="nama" class="form-control" placeholder="input Your Name"> -->
								<input type="hidden" aria-required="true" name="callsign" id="callsign" class="form-control" value="<?php echo $callsign; ?>">
							</div>
						</div>
			
						<div class="col-md-2 submit1">
							<h4><?php echo $jns ; ?> From The IARU Region 3 - 50th Anniversary.</h4>
							<input type="hidden" aria-required="true" name="id_certificate" id="id_certificate" class="form-control" value="<?php echo $id_certificate; ?>">
							<input type="text" aria-required="true" required="required" value="" maxlength="30" name="nama" id="nama" class="form input-std" placeholder="input Your Name">
														<div class="contact-form-submit">

								<button type="submit" id="pickup-_submit" name="contact_submit" class="theme_button color1">Submit</button>
							</div>
						</div>
						</div>
			
						</form>
					</div>
					<div class="col-md-3">
						<div class="logo top_logo" style="text-align: center;">
							<!-- <img style="width: 70%;" src="<?php echo base_url();?><?php echo $image;?>" alt=""> -->
						</div>
					</div>
				</div>
			</div>
		</section>
	
		<div class="container">
			<div class="row">
				<div style="text-align: center;margin-top: 20px;"><h2>
					Number of QSO callsign <?php $querycw = $this->db->get_where('TABLE_HRD_CONTACTS_V01', array('COL_CALL'=>$callsign ));
					$cw = $querycw->num_rows();
					echo strtoupper($callsign) ; echo "  is  ". $cw; ?></h2>
				</div>

						

<!-- 						<form  method="post" action="<?php echo site_url('search/get_award'); ?> " target="_blank">
						<div class="row">
										
							
						
								
							<input type="hidden" aria-required="true" name="callsign" id="callsign"  value="<?php echo $callsign; ?>">
							
							<button type="submit" id="pickup-_submit" name="contact_submit" class="theme_button color1">Download Award</button>
							
						</div>
					
			
					</form> -->


				<?php if (isset($this->pagination)){ ?>
				<div class="pagination">
				<?php echo $this->pagination->create_links(); ?>
				</div>
				<?php } ?>
			</div>
		</div>
	<!-- 	</section> -->
	</div>
</div>
			
	

