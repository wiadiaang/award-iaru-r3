<section>

	<div id="box">

		<div class="swiperHeader">

	        <div class="swiper-wrapper">

	            <img class="swiper-slide objImg opt1" src="<?php echo base_url();?>assets/img/slide/11.png"/>
	            <img class="swiper-slide objImg opt2" src="<?php echo base_url();?>assets/img/slide/12.png"/>
	            <img class="swiper-slide objImg" src="<?php echo base_url();?>assets/img/slide/08.jpg"/>
	            <img class="swiper-slide objImg" src="<?php echo base_url();?>assets/img/slide/06.jpg"/>
	            <img class="swiper-slide objImg" src="<?php echo base_url();?>assets/img/slide/07.jpg"/>
	           	<img class="swiper-slide objImg" src="<?php echo base_url();?>assets/img/slide/01.jpg"/>
	            <img class="swiper-slide objImg" src="<?php echo base_url();?>assets/img/slide/02.jpg"/>
	            <img class="swiper-slide objImg" src="<?php echo base_url();?>assets/img/slide/09.jpg"/>
	            <img class="swiper-slide objImg" src="<?php echo base_url();?>assets/img/slide/10.jpg"/>
	            <img class="swiper-slide objImg" src="<?php echo base_url();?>assets/img/slide/03.jpg"/>
	            <img class="swiper-slide objImg" src="<?php echo base_url();?>assets/img/slide/05.jpg"/>
	            <img class="swiper-slide objImg" src="<?php echo base_url();?>assets/img/slide/04.jpg"/>

	        </div>

	        <div class="swiper-pagination"></div>
	        <div class="slide-next"></div>
			<div class="slide-prev"></div>

	    </div>

		<!-- <div id="tables">

			<div class="table">

				<span>Top 10 World Ranking</span>

				<table>

					<thead>

					    <th>CallSign</th>
					    <th>QSO</th>
						<th>Ranking</th>

					</thead>

					<tbody>

						<?php  foreach ($callrangking as $row) { ?>

						<tr>

							<td><?php echo $row->COL_CALL; ?></td>
							<td><?php echo $row->S; ?></td>
						    <td style=""><?php echo $row->rownum; ?></td>

						</tr>

						<?php } ?>

					</tbody>

				</table>

			</div>

			<div class="table">

				<span>Certificate Operator</span>

				<table>

					<thead>

					    <th>No</th>
					    <th>CallSign</th>
						<th>Operator Name</th>

					</thead>

					<tbody>

						<?php $start=0; foreach ($operator as $row) { ?>

						<tr>

							<td><?php echo ++$start; ?></td>
							<td><?php $tes = str_replace("/", "-",$row->callsign );?><a class="qsobox" href="<?php echo site_url('search/operator')."/".$tes; ?>"><?php echo $row->callsign; ?></a></td>
							<td><?php echo $row->nama_lengkap; ?></td>

						</tr>
						<?php } ?>

					</tbody>

				</table>

			</div>

		</div> -->

	</div>

</section>