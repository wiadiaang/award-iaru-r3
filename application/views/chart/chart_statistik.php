<div id="container">

    

    <div class="row show-grid">
      <div class="span16">
      
       
                            <div class="col-lg-10">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                    
                                    </div>
                                   <!--  <h4 class="header-title m-t-0">TOTAL</h4> -->
                                    <div id="data_maining"  class="flot-chart" style="height: 320px;"></div>
                                </div>
                            </div>



      </div>

       <div class="span16">
      
       
                            <div class="col-lg-10">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                    
                                    </div>
                                   <!--  <h4 class="header-title m-t-0">TOTAL</h4> -->
                                    <div id="data_station"  class="flot-chart" style="height: 320px;"></div>
                                </div>
                            </div>



      </div>
     

    </div>


</div>

<!-- <?php
echo $json;
?> -->

<script type="text/javascript" src="<?=base_url()?>assets/highcharts/highcharts.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/highcharts/modules/exporting.js" type="text/javascript"></script> 

<script type="text/javascript">
 $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'data_maining',
                    type: 'column',
                    marginRight: 20,
                    marginBottom: 80,
                    marginTop: 50
                },
                title: {
                    text: 'Total QSO Per Call Area',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Total QSO'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y;
                    }
                },
                legend: {
                    layout: 'horizontal',
                    align: 'right',
                    verticalAlign: 'bottom',
                    x: -10,
                    y: 0,
                    borderWidth: 0
                },

                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            formatter:function() {
                                return this.point.name;
                            }
                        }
                    }
                },
                series: []
            }
            
            $.getJSON("<?php echo base_url();?>index.php/statistics/chart_qso", function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                chart = new Highcharts.Chart(options);
            });
        });
        

         $(document).ready(function() {
            var options = {
                chart: {
                    renderTo: 'data_station',
                    type: 'column',
                    marginRight: 20,
                    marginBottom: 80,
                    marginTop: 50
                },
                title: {
                    text: 'Total QSO Per Call Area',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                   categories: []

                 //  categories: ['YB72RI/0', 'YB72RI/1', 'YB72RI/3', 'YB72RI/4', 'YB72RI/5', 'YB72RI/6',
                  //  'YB72RI/7', 'YB72RI/8', 'YB72RI/9']
                },
                yAxis: {
                    title: {
                        text: 'Total QSO'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y;
                    }
                },
                legend: {
                    layout: 'horizontal',
                    align: 'right',
                    verticalAlign: 'bottom',
                    x: -10,
                    y: 0,
                    borderWidth: 0
                },

                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
                            formatter:function() {
                                return this.point.t;
                            }
                        }
                    }
                },
                series: []
            }
            
            $.getJSON("<?php echo base_url();?>index.php/statistics/chart_perstation", function(json) {
                console.log(json);
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                options.series[1] = json[2];
                options.series[2] = json[3];
                options.series[3] = json[4];
                options.series[4] = json[5];
                options.series[5] = json[6];
                options.series[6] = json[7];
                options.series[7] = json[8];
                chart = new Highcharts.Chart(options);
            });
        });
</script>

    <!-- <script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

    <script type="text/javascript" src="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>/fancybox/jquery.fancybox-1.3.4.css" media="screen" /> -->