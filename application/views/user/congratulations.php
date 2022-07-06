

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
									<input type="hidden" aria-required="true" name="callsign" id="callsign" class="form-control" value="<?php echo $c; ?>">
									<input type="hidden" aria-required="true" name="rangking" id="rangking" class="form-control" value="<?php echo $rangking; ?>">
								</div>
							</div>
				
							<div class="col-md-2 submit1">
								<h4><?php echo $jns ; ?> From The IARU Region 3 - 50th Anniversary.</h4>
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
			

			<section id="services" class="ls ms overflow_hidden half_section section_padding_top_20 section_padding_bottom_20 columns_padding_20">
				<div class="container">
					<div class="row">
					<div style="text-align: center;margin-top: 20px;"><h2>Your QSO <?php echo $jml; ?></h2></div>


	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th style="text-align: center;">Date</th>
					<th style="text-align: center;">Time</th>
					<th style="text-align: center;">Call</th>
					<th style="text-align: center;">Station</th>
					<th style="text-align: center;">Mode</th>
					<th style="text-align: center;">Sent</th>
					<th style="text-align: center;">Recv</th>
					<th style="text-align: center;">Band</th>
					<th style="text-align: center;">Country</th>
				</tr>
			</thead>

			<tbody>
				<?php  $i = 0; foreach ($qso as $row) { ?>
				<tr>
					<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('d/m/y', $timestamp); ?></td>
					<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('H:i', $timestamp); ?></td>
					<td><?php echo strtoupper($row->COL_CALL); ?></td>
					<td><?php echo $row->CallSignImport; ?></td>
					<td><?php echo $row->COL_MODE; ?></td>
					<td><?php echo $row->COL_RST_SENT; ?></td>
					<td><?php echo $row->COL_RST_RCVD; ?></td>
					<td><?php echo strtolower($row->COL_BAND); ?></td>
					<td><?php echo $row->COL_COUNTRY; ?></td>
				</tr>
				<?php $i++; } ?>
			</tbody>
		</table>
	</div>



    <?php if (isset($this->pagination)){ ?>
	<div class="pagination">
		<?php echo $this->pagination->create_links(); ?>
	</div>
	<?php } ?>

	</div>



					</div>
				</div>
		

	