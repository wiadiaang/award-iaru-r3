
            
            	<div class="table-responsive">
              <table id="simpletable" class="table dt-responsive table-striped table-bordered nowrap">
                <thead>
                <tr>
                	<th>Date</th>
					<th>Time</th>
					<th>Call</th>
					<th>Station </th>
					<!-- <th>Society </th> -->
					<th>Mode</th>
					<th>Sent</th>
					<th>Recv</th>
					<th>Band</th>
					<th>Country</th>
				    <th>Qsl Card</th>
					<?php if(($this->config->item('use_auth')) && ($this->session->userdata('user_type') >= 99)) { ?>
					<!--  <th>Edit</th> -->
					<?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php  $i = 0;  foreach ($results->result() as $row) { ?>
					<?php  echo '<tr class="tr'.($i & 1).'">'; ?>
					<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('d/m/y', $timestamp); ?></td>
					<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('H:i', $timestamp); ?></td>
					<td><a class="qsobox" href="<?php echo site_url('logbook/view')."/".$row->COL_PRIMARY_KEY; ?>"><?php echo strtoupper($row->COL_CALL); ?></a></td>
					<td><?php echo $row->COL_STATION_CALLSIGN; ?></td>
				<!-- 	<td><?php $query = $this->db->get_where('users',array('user_name'=> $row->CallSignImport))->row()->user_locator; echo $query; ?></td> -->

					<td><?php echo $row->COL_MODE; ?></td>

					<td><?php echo $row->COL_RST_SENT; ?> </td>
					<td><?php echo $row->COL_RST_RCVD; ?> </td>
					<?php if($row->COL_SAT_NAME != null) { ?>
					<td><?php echo $row->COL_SAT_NAME; ?></td>
					<?php } else { ?>
					<td><?php echo strtolower($row->COL_BAND); ?></td>
					<?php } ?>
				

										<td><?php $quero = $this->db->query('SELECT * FROM dxcc 
						 WHERE prefix = SUBSTRING( \''.$row->COL_STATION_CALLSIGN.'\', 1, LENGTH( prefix ))
					ORDER BY LENGTH( prefix ) DESC
					LIMIT 1')->row(); 

					if ($quero == null){

						echo "-";

					}else{
						echo $quero->name ;
					}

					 ?>
											
					</td>
					 <td><a href="<?php echo site_url('search/card')."/".$row->COL_PRIMARY_KEY; ?>"><i class="print">Download Qsl Card</i></a>  </td>
						<!-- $query = $this->db->get_where('user',array('user_name'=> $row->CallSignImport ))->row('user_locator'); -->
				</tr>
				<?php $i++;


					} 


					 ?>
					<div style="text-align: center;margin-top: 20px;"><h1>Total Your QSO  <?php echo $i++; ?></h1></div>
                </tbody>
              </table>
              <?php if (isset($this->pagination)){ ?>
              <div class="dataTables_paginate paging_simple_numbers" id="simpletable_paginate">
					<?php echo $this->pagination->create_links(); ?>
				</div>
				<?php } ?>
			</div>
<!--             </div>
          </div>
      </div>
    </div> -->
