<div id="container">
 <div class="container-fluid">
    <div class="row">
        <div class="main-header">
            <h4><?php echo $page_title; ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><h5 class="card-header-text">SOTA</h5>
                </div>
                <div class="card-block button-list">
                    <a href="<?php echo site_url('awards'); ?>">
                        <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">Home
                        </button>
                    </a>
                    <a href="<?php echo site_url('awards/dxcc'); ?>">
                        <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">DXCC
	                    </button>
                    </a>
                    <a href="<?php echo site_url('awards/wab'); ?>">
	                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">WAB
	                    </button>
                    </a>
                    <a href="<?php echo site_url('awards/sota'); ?>">
                    	<button type="button" class="btn btn-primary active waves-effect waves-light m-r-10" data-toggle="tooltip" data-placement="top" title=".btn-primary .active">SOTA
                        </button>
                    </a>
                    <a href="<?php echo site_url('awards/yb72ri'); ?>">
                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">YB72RI
                    </button>
                    </a>
                </div>
                <div class="card-block">
                    <div class="data_table_main">
                      <table id="simpletable" class="table dt-responsive table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>Reference</th>
							<th>Date/Time</th>
							<th>Callsign</th>
							<th>Band</th>
							<th>RST Sent</th>
							<th>RST Recvd</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Reference</th>
							<th>Date/Time</th>
							<th>Callsign</th>
							<th>Band</th>
							<th>RST Sent</th>
							<th>RST Recvd</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php
							if ($sota_all->num_rows() > 0) {
								foreach ($sota_all->result() as $row) {
						?>
						
						<tr>
							<td>	
									<?php
											$pieces = explode(" ", $row->COL_COMMENT);
											foreach($pieces as $val) {
												if (strpos($val,'SOTA:') !== false) {
													//echo $val;
													echo $rest = substr($val, 5);  // returns "cde"
												}
											}
									?>
							</td>
							<td><?php $timestamp = strtotime($row->COL_TIME_ON); echo date('d/m/y', $timestamp); ?> - <?php $timestamp = strtotime($row->COL_TIME_ON); echo date('H:i', $timestamp); ?></td>
							<td><?php echo $row->COL_CALL; ?></td>
							<td><?php echo $row->COL_BAND; ?></td>
							<td><?php echo $row->COL_RST_SENT; ?></td>
							<td><?php echo $row->COL_RST_RCVD; ?></td>
						</tr>
						<?php
							  }
							}
						?>
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
            <!-- end of card -->
        </div>
    </div>
 </div>
</div>

