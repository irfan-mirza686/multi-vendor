    @extends("vendor_panel.layouts.layout")
  @section("style")
  <link href="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
  @endsection



        @section("content")
            <div class="page-wrapper">
                <div class="page-content">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="mb-0">Vendors</h6>
                                        </div>
                                    
                                    </div>
                                    <div class="chart-container-0">
                                        <canvas id="showAllProducts"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="mb-0">All Products</h6>
                                        </div>
                                        
                                    </div>
                                    <div class="chart-container-0">
                                        <canvas id="chart-order-status"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->

                    <div class="row">
                    <div class="col-12 col-lg-8">
                            <div class="card radius-10">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="mb-0">Users</h6>
                                        </div>
                                    
                                    </div>
                                    <div class="chart-container-0">
                                        <canvas id="showAllUsers"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="chart-container1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <canvas id="showSubscribers" width="750" height="340" style="display: block; width: 750px; height: 340px;" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>
            </div>
        </div>
                    




                    

                </div>
            </div>
    @endsection


    @section("script")
  <script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
  <script src="{{asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('assets/plugins/chartjs/js/Chart.min.js')}}"></script>
    <script src="{{asset('assets/plugins/chartjs/js/Chart.extension.js')}}"></script>
    <script src="{{asset('assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
    <!--Morris JavaScript -->
    <script src="{{asset('assets/plugins/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('assets/plugins/morris/js/morris.js')}}"></script>
    <script src="{{asset('assets/js/index2.js')}}"></script>

    <script>
    var ctx = document.getElementById('showAllProducts').getContext('2d');



    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke1.addColorStop(0, 'rgba(255, 255, 0, 0.5)');  
    gradientStroke1.addColorStop(1, 'rgba(233, 30, 99, 0.0)'); 

    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke2.addColorStop(0, '#ffff00');  
    gradientStroke2.addColorStop(1, '#e91e63'); 


    var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke3.addColorStop(0, 'rgba(0, 114, 255, 0.5)');  
    gradientStroke3.addColorStop(1, 'rgba(0, 200, 255, 0.0)'); 

    var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke4.addColorStop(0, '#0072ff');  
    gradientStroke4.addColorStop(1, '#00c8ff'); 


    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sep", "Oct" , "Nov" , "Dec"],
            datasets: [{
                label: 'Vendors',
                data: <?php echo json_encode($journalMasterData); ?>,
                backgroundColor: gradientStroke1,
                borderColor: gradientStroke2,
                pointRadius :"0",
                pointHoverRadius:"0",
                borderWidth: 3
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: true,
                labels: {
                    fontColor: '#585757',
                    boxWidth: 40
                }
            },
            tooltips: {
                enabled: false
            },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: '#585757'
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(0, 0, 0, 0.07)"
                    },
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: '#585757'
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(0, 0, 0, 0.07)"
                    },
                }]
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('showAllUsers').getContext('2d');



    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);



    var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke3.addColorStop(0, 'rgba(0, 114, 255, 0.5)');  
    gradientStroke3.addColorStop(1, 'rgba(0, 200, 255, 0.0)'); 

    var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke4.addColorStop(0, '#0072ff');  
    gradientStroke4.addColorStop(1, '#00c8ff'); 


    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sep", "Oct" , "Nov" , "Dec"],
            datasets: [{
                label: 'Vendors',
                data: <?php echo json_encode(@$journalMasterData); ?>,
                backgroundColor: gradientStroke3,
                borderColor: gradientStroke4,
                pointRadius :"0",
                pointHoverRadius:"0",
                borderWidth: 3
            }]
        },
        options: {
            maintainAspectRatio: false,
            legend: {
                display: true,
                labels: {
                    fontColor: '#585757',
                    boxWidth: 40
                }
            },
            tooltips: {
                enabled: false
            },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: '#585757'
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(0, 0, 0, 0.07)"
                    },
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        fontColor: '#585757'
                    },
                    gridLines: {
                        display: true,
                        color: "rgba(0, 0, 0, 0.07)"
                    },
                }]
            }
        }
    });
</script>

    <script type="text/javascript">
    var ctx = document.getElementById('chart-order-status').getContext('2d');

    var gradientStroke = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke.addColorStop(0, '#ee0979');  
    gradientStroke.addColorStop(1, '#ff6a00'); 

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sep", "Oct" , "Nov" , "Dec"],
          datasets: [{
            label: 'Products',
            data: <?php echo json_encode(@$subcribersAllProductData); ?>,
            backgroundColor: gradientStroke,
            hoverBackgroundColor: gradientStroke,
            borderColor: "#fff",
            pointRadius :6,
            pointHoverRadius :6,
            pointHoverBackgroundColor: "#fff",
            borderWidth: 2

        }]
    },
    options: {
        maintainAspectRatio: false,
        legend: {
          display: false,
          labels: {
              fontColor: '#585757',  
              boxWidth:40
          }
      },
      tooltips: {
          displayColors:false
      },  
      scales: {
          xAxes: [{
            barPercentage: .4,
            ticks: {
                beginAtZero:true,
                fontColor: '#585757'
            },
            gridLines: {
                display: true ,
                color: "rgba(0, 0, 0, 0.08)"
            },
        }],
        yAxes: [{
          ticks: {
            beginAtZero:true,
            fontColor: '#585757'
        },
        gridLines: {
            display: false ,
            color: "rgba(0, 0, 0, 0.08)"
        },
    }]
}

}
});
</script>

<script src="{{asset('assets/plugins/chartjs/js/Chart.min.js')}}"></script>
<script src="{{asset('assets/plugins/chartjs/js/chartjs-custom.js')}}"></script>

<script>
    new Chart(document.getElementById("showSubscribers"), {
        type: 'pie',
        data: {
            labels: <?php echo json_encode(@$GPCNames); ?>,
            datasets: [{
                label: "Featured Products",
                backgroundColor: <?php echo json_encode(@$color); ?>,
                data: <?php echo json_encode(@$gpcs); ?>,
            }]
        },
        options: {
            maintainAspectRatio: false,
            title: {
                display: true,
                text: 'Featured Products'
            }
        }
    });
</script>
    @endsection
