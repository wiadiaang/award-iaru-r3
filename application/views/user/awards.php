

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
										<!-- 	<input type="hidden" aria-required="true" name="rangking" id="rangking" class="form-control" value="<?php echo $rangking; ?>"> -->
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
					Number of QSO callsign <?php $querycw = $this->db->get_where('v_hrd_contact', array('COL_CALL'=>$callsign ));
											$cw = $querycw->num_rows();
											echo strtoupper($callsign) ; echo "  is  ". $cw; ?></h2>
				</div>

				

<!-- 						<form  method="post" action="<?php echo site_url('search/get_award'); ?> " target="_blank">
					<div class="row">
									
						
					
							
						<input type="hidden" aria-required="true" name="callsign" id="callsign"  value="<?php echo $callsign; ?>">
						
						<button type="submit" id="pickup-_submit" name="contact_submit" class="theme_button color1">Download Award</button>
						
					</div>
				
		
				</form> -->

				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<!-- <th style="text-align: center;">QSO</th>						 -->
								<th style="text-align: center;">Award</th>
							</tr>
						</thead>

						<tbody>
						<?php
						$query = $this->db->query("select 
						count(*) as total, 
						a.COL_MODE, 
						a.COL_BAND, 
						a.COLMODE,
						a.COL_FREQ,
						a.COL_CALL,
						a.kali  
						from v_hrd_contact_new a 
						where a.COL_CALL = '" . $callsign . "' AND a.COLMODE NOT IN (select b.COLMODE 
						from v_hrd_contact_new b where b.COLMODE = 'Phone' AND b.kali > '30')
						group by COLMODE, a.COL_BAND 
						order by a.COL_MODE, a.COL_BAND")->num_rows();

						$qu = $this->db->query("select 
						count(*) as total, 
						a.COL_MODE, 
						a.COL_BAND, 
						a.COLMODE,
						a.COL_FREQ,
						a.COL_CALL,
						a.kali  
						from v_hrd_contact_new a 
						where a.COL_CALL = '" . $callsign . "' AND a.COLMODE NOT IN (select b.COLMODE 
						from v_hrd_contact_new b where b.COLMODE = 'Phone' AND b.kali > '30')
						order by a.COL_MODE, a.COL_BAND")->row();
						$url = site_url();
						?>

							 <tr>
								<!-- <td></td> -->
								<td>
								<?php
									 
								
									$basic = $this->db->query("select 
										count(*) as total, 
										a.COL_MODE, 
										a.COL_BAND, 
										a.COLMODE,
										a.COL_FREQ,
										a.COL_CALL,
										a.kali  
										from v_hrd_contact_new a 
										where a.COL_CALL = '" . $callsign . "' AND a.COLMODE NOT IN (select b.COLMODE 
										from v_hrd_contact_new b where b.COLMODE = 'Phone' AND b.kali > '30')
										order by a.COL_MODE, a.COL_BAND LIMIT 5")->row();
								
									
									if($basic->total >= '5'){
										 echo '<a href='.$url.'/search/cek_awards_bronze_all/'.$callsign.'>Link Download Basic Mixed</a>';
										// echo '<a >Link Download Basic Mixed</a>';
									}else{

									}
								?>
								</td>
							</tr>		

							<tr>
								<!-- <td><?php echo $qu->total?></td> -->
								<td>
								<?php
							$silver = $this->db->query("select 
							count(*) as total, 
							a.COL_MODE, 
							a.COL_BAND, 
							a.COLMODE,
							a.COL_FREQ,
							a.COL_CALL,
							a.kali  
							from v_hrd_contact_new a 
							where a.COL_CALL = '" . $callsign . "' AND a.COLMODE NOT IN (select b.COLMODE 
							from v_hrd_contact_new b where b.COLMODE = 'Phone' AND b.kali > '30')
							order by a.COL_MODE, a.COL_BAND LIMIT 10")->row();

							if($silver->total >= '10'){
								 echo '<a href='.$url.'/search/cek_awards_silver_all/'.$callsign.'>Link Download Silver Mixed</a>';
								// echo '<a >Link Download Silver Mixed</a>';
							}else{

							}

									// if($query >= '10' && $query < '15'){
									// 	// echo '<a href='.$url.'/search/cek_awards_silver_mode/>Link Download Silver Mixed</a>';
									// 	echo '<a >Link Download Silver Mixed</a>';
									// }else{

									// }
								?>
								</td>
							</tr>		
							<tr>
								<!-- <td><?php echo $qu->total?></td> -->
								<td>
								<?php
								$gold = $this->db->query("select 
								count(*) as total, 
								a.COL_MODE, 
								a.COL_BAND, 
								a.COLMODE,
								a.COL_FREQ,
								a.COL_CALL,
								a.kali  
								from v_hrd_contact_new a 
								where a.COL_CALL = '" . $callsign . "' AND a.COLMODE NOT IN (select b.COLMODE 
								from v_hrd_contact_new b where b.COLMODE = 'Phone' AND b.kali > '30')
								order by a.COL_MODE, a.COL_BAND")->row();

										
									
									if($gold->total >= '15'){
											echo '<a href='.$url.'/search/cek_awards_gold_all/'.$callsign.'>Link Download Gold Mixed</a>';
											// echo '<a>Link Download Gold Mixed</a>';
										}else{

										}
								?>
								</td>
							</tr>							 
						</tbody>
					</table>
				</div>


				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<tr>
								<th style="text-align: center;">QSO</th>
				
								<th style="text-align: center;">Mode</th>
						
								<th style="text-align: center;">Band</th>
								<th style="text-align: center;">Award</th>
							</tr>
						</thead>

						<tbody>
						<?php
							// $querys = $this->db->query("select count(*) as total, a.COL_MODE, a.COL_BAND, a.COLMODE from v_hrd_contact a 
							// where a.COL_CALL = '" . $callsign . "' group by COLMODE, a.COL_BAND order by a.COL_MODE, a.COL_BAND")->result();
						// $querys = $this->db->query("select 
						// count(*) as total, 
						// a.COL_MODE, 
						// a.COL_BAND, 
						// a.COLMODE,
						// a.COL_FREQ,
						// a.COL_CALL,
						// a.kali  
						// from v_hrd_contact_new a 
						// where a.COL_CALL = '" . $callsign . "' AND a.COLMODE NOT IN (select b.COLMODE 
						// from v_hrd_contact_new b where b.COLMODE = 'Phone' AND b.kali > '30')
						// group by COLMODE, a.COL_BAND 
						// order by a.COL_MODE, a.COL_BAND")->result();
						$querys = $this->db->query("select 
						count(*) as total, 
						a.COL_MODE, 
						a.COL_BAND, 
						a.COLMODE,
						a.COL_FREQ,
						a.COL_CALL,
						a.kali  
						from v_hrd_contact_new a 
						where a.COL_CALL = '" . $callsign . "'
						group by COLMODE, a.COL_BAND 
						order by a.COL_MODE, a.COL_BAND")->result();
						foreach($querys as $rowq){
						if($rowq->COLMODE == 'Digi'){
							$rowq->COLMODE = 'Digital';
						}else if($rowq->COLMODE == 'SSB'){
							$rowq->COLMODE = 'Phone';
						}else{
							$rowq->COLMODE = $rowq->COLMODE;
						}
						$m = substr($rowq->COL_BAND, -1);
						$m = "Meters";
						?>
							<tr>
								<td><?php echo $rowq->total?></td>
								<td><?php echo $rowq->COLMODE?></td>
								<td><?php echo $rowq->kali.' '.$m;?> </td>
								<td>
								<?php
									$url = site_url();
									$url_silver = site_url();
									if($rowq->total >= '5' && $rowq->total < '10'){
										echo '<a href='.$url.'/search/cek_awards_bronze/'.$rowq->COLMODE.'/'.$callsign.'/bronze-'.$rowq->COLMODE.'-'.$rowq->COL_BAND.'>Link Download Basic</a>';
									}else if($rowq->total >= '10' && $rowq->total < '15'){
										echo '<a href='.$url.'/search/cek_awards_silver/'.$rowq->COLMODE.'/'.$callsign.'/silver-'.$rowq->COLMODE.'-'.$rowq->COL_BAND.'>Link Download Silver</a>';
									}else if($rowq->total >= '15'){
										echo '<a href='.$url.'/search/cek_awards_gold/'.$rowq->COLMODE.'/'.$callsign.'/gold-'.$rowq->COLMODE.'-'.$rowq->COL_BAND.'>Link Download Gold</a>';
									}else{
										echo '';
									}
								?>
								</td>
							</tr>
							
							<!-- END SSB =============================================================== -->
							
						<?php
						}
						?>	
						</tbody>
					</table>
				</div>

				<div  class="table-responsive">
					<table class="table table-hover table-bordered">
								<thead>
							<tr>
								<th style="text-align: center;">QSO</th>
				
								<th style="text-align: center;">Mode</th>
					
							<!-- 	<th style="text-align: center;">Band</th> -->
								<th style="text-align: center;">Award</th>
							</tr>
						</thead>
						<tbody>
							<?php
								// $queryz = $this->db->query("select a.COL_MODE, a.COL_BAND, a.COLMODE, a.COL_CALL, count(*) as total from v_hrd_contact_new a where a.COL_CALL = '" . $callsign . "'  AND a.COLMODE NOT IN (select b.COLMODE 
								// from v_hrd_contact_new b where b.COLMODE = 'Phone' AND b.kali > '30') GROUP BY a.COLMODE")->result();
								$queryz = $this->db->query("select a.COL_MODE, a.COL_BAND, a.COLMODE, a.COL_CALL, count(*) as total, (case `a`.`COLMODE` when 'Digi' then 'Digital' when 'SSB' then 'Phone' else `a`.`COLMODE` end) AS `COLMODES` from v_hrd_contact_new a where a.COL_CALL = '" . $callsign . "' GROUP BY COLMODES")->result();
								foreach($queryz as $roww){
									if($roww->COLMODE == 'Digi'){
										$roww->COLMODE = 'Digital';
									}else if($roww->COLMODE == 'SSB'){
										$roww->COLMODE = 'Phone';
									}else{
										$roww->COLMODE = $roww->COLMODE;
									}
								?>

															<tr>
								<td><?php echo $roww->total?></td>
								<td><?php echo $roww->COLMODE?></td>
								<td>
									<?php
										$url = site_url();
										$url_silver = site_url();
										if($roww->total >= '5' && $roww->total < '10'){
											echo '<a href='.$url.'/search/cek_awards_bronze_mode/'.$roww->COLMODE.'/'.$callsign.'/bronze-'.$roww->COLMODE.'>Link Download Basic</a>';
										}else if($roww->total >= '10' && $roww->total < '15'){
											echo '<a href='.$url.'/search/cek_awards_silver_mode/'.$roww->COLMODE.'/'.$callsign.'/silver-'.$roww->COLMODE.'>Link Download Silver</a>';
										}else if($roww->total >= '15'){
											echo '<a href='.$url.'/search/cek_awards_gold_mode/'.$roww->COLMODE.'/'.$callsign.'/gold-'.$roww->COLMODE.'>Link Download Gold</a>';
										}else{
											echo '';
										}
									?>
								</td>
							</tr>

							<?php
								}
							?>
						</tbody>
					</table>
				</div>

				<div  class="table-responsive">
					<table class="table table-hover table-bordered">
								<thead>
							<tr>
								<th style="text-align: center;">QSO</th>
				
								<th style="text-align: center;">Band</th>
					
							<!-- 	<th style="text-align: center;">Band</th> -->
								<th style="text-align: center;">Award</th>
							</tr>
						</thead>
						<tbody>
							<?php
								// $querya = $this->db->query("select a.COL_CALL, a.COL_BAND, a.COLMODE, count(*) AS total, a.kali from v_hrd_contact_new a where a.COL_CALL = '" . $callsign . "'  AND a.COLMODE NOT IN (select b.COLMODE 
								// from v_hrd_contact_new b where b.COLMODE = 'Phone' AND b.kali > '30') GROUP BY a.COL_BAND ")->result();
								$querya = $this->db->query("select a.COL_CALL, a.COL_BAND, a.COLMODE, count(*) AS total, a.kali from v_hrd_contact_new a where a.COL_CALL = '" . $callsign . "' GROUP BY a.COL_BAND ")->result();
								foreach($querya as $rowe){
									if($rowe->COLMODE == 'Digi'){
										$rowe->COLMODE = 'Digital';
									}else if($rowe->COLMODE == 'SSB'){
										$rowe->COLMODE = 'Phone';
									}else{
										$rowe->COLMODE = $rowe->COLMODE;
									}
									$me = substr($rowq->COL_BAND, -1);
									$me = "Meters";
												
							?>

							<tr>
								<td><?php echo $rowe->total?></td>
								<td><?php echo $rowe->kali.' '.$me;?> </td>
								<td>	
								
								<?php
									$url = site_url();
									$url_silver = site_url();
									if($rowe->total >= '5' && $rowe->total < '10'){
										echo '<a href='.$url.'/search/cek_awards_bronze_band/'.$rowe->COLMODE.'/'.$callsign.'/bronze-'.$rowe->COL_BAND.'>Link Download Basic</a>';
									}else if($rowe->total >= '10' && $rowe->total < '15'){
										echo '<a href='.$url.'/search/cek_awards_silver_band/'.$rowe->COLMODE.'/'.$callsign.'/silver-'.$rowe->COL_BAND.'>Link Download Silver</a>';
									}else if($rowe->total >= '15'){
										echo '<a href='.$url.'/search/cek_awards_gold_band/'.$rowe->COLMODE.'/'.$callsign.'/gold-'.$rowe->COL_BAND.'>Link Download Gold</a>';
									}else{
										echo '';
									}
								?>
								</td>
							</tr>

							<?php
								}
							?>
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
		<!-- 	</section> -->
	</div>
</div>
				
		

	