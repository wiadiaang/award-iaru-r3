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
                <div class="card-header"><h5 class="card-header-text">DXCC</h5>
                </div>
                <div class="card-block button-list">
                    <a href="<?php echo site_url('awards'); ?>">
                        <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">Home
                        </button>
                    </a>
                    <a href="<?php echo site_url('awards/dxcc'); ?>">
                        <button type="button" class="btn btn-primary active waves-effect waves-light m-r-10" data-toggle="tooltip" data-placement="top" title=".btn-primary .active">DXCC
                        </button>
                    </a>
                    <a href="<?php echo site_url('awards/wab'); ?>">
                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">WAB
                    </button>
                    </a>
                    <a href="<?php echo site_url('awards/sota'); ?>">
                    <button type="button" class="btn btn-info active waves-effect waves-light" data-toggle="tooltip" data-placement="top" title=".btn-info .active">SOTA
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
                            <th>Country</th>
                            <th>160m</th>
                            <th>80m</th>
                            <th>40m</th>
                            <th>30m</th>
                            <th>20m</th>
                            <th>17m</th>
                            <th>15m</th>
                            <th>12m</th>
                            <th>10m</th>
                            <th>6m</th>
                            <th>4m</th>
                            <th>2m</th>
                            <th>70cm</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Country</th>
                            <th>160m</th>
                            <th>80m</th>
                            <th>40m</th>
                            <th>30m</th>
                            <th>20m</th>
                            <th>17m</th>
                            <th>15m</th>
                            <th>12m</th>
                            <th>10m</th>
                            <th>6m</th>
                            <th>4m</th>
                            <th>2m</th>
                            <th>70cm</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php

                            foreach($dxcc as $country=>$val){
                                print("<tr><td>$country</td>");
                                foreach($val as $band=>$count){
                                    if ($count == 0){
                                        print("<td>&nbsp;</td>");
                                    }else{
                                        printf("<td><a href='dxcc_details?Country=\"%s\"&Band=\"%s\"'>%d</a></td>", $country, $band, $count);
                                    }
                                }
                                print("</tr>");
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

