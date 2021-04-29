    
<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing">

                   
                    
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget jumbotron">
                        <h2 class="display-4" ><span id="licenseBalance">0</span></h2>
                        <p class="lead">Credits Remaining</p>
                        <hr class="my-4">
                        <p class="lead">
                          <a class="btn btn-success" href="<?= base_url('purchase/buy')?>" role="button">Top Up</a>
                        </p>
                      </div>
                    </div>
                                        
                    
                    
                    
                    
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        
                        <div class="widget widget-activity-four">

                            <div class="widget-heading">
                                <h5 class="">Recent Activations</h5>
                            </div>

                            <div class="widget-content">
                                    <div class="timeline-line" id="recentactivations">
                                                                                
                                    </div>                                    
                                <div class="tm-action-btn" style="padding-top:2px;">
                                    <a href="<?= base_url('serialkey/list')?>"><button class="btn">View All <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-activity-four">
                            <div class="widget-heading" >
                                <h5 class="">Activations by Type</h5>
                            </div>
                            <div class="widget-content">
                                <div class="vistorsBrowser">
                                    <div class="browser-list">
                                        <div class="w-browser-details">
                                            <div class="w-browser-info">
                                                <h6>Counter</h6>
                                                <p class="browser-count"><span id="counteract">0</span></p>
                                            </div>
                                            <div class="w-browser-stats">
                                                <div class="progress">
                                                    <div id="counterpct" class="progress-bar bg-gradient-primary"  role="progressbar" style="width: 0%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="browser-list">
                                        <div class="w-browser-details">
                                            
                                            <div class="w-browser-info">
                                                <h6>PDA</h6>
                                                <p class="browser-count"><span id="pdaact">0</span></p>
                                            </div>

                                            <div class="w-browser-stats">
                                                <div class="progress">
                                                    <div id="pdapct" class="progress-bar bg-gradient-danger" role="progressbar" style="width: 0%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="browser-list">
                                        <div class="w-browser-details">
                                            
                                            <div class="w-browser-info">
                                                <h6>KDS</h6>
                                                <p class="browser-count"><span id="kdsact">0</span></p>
                                            </div>

                                            <div class="w-browser-stats">
                                                <div class="progress">
                                                    <div id="kdspct" class="progress-bar bg-gradient-warning" role="progressbar" style="width: 0%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                       
                    
                    
                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-one">
                            <div class="widget-heading">
                                <h5 class="">Monthly Activations</h5>
                                <ul class="tabs tab-pills">
                                    <li><a href="javascript:void(0);" id="tb_1" class="tabmenu">Monthly</a></li>
                                </ul>
                            </div>

                            <div class="widget-content">
                                <div class="tabs tab-content">
                                    <div id="content_1" class="tabcontent"> 
                                        <div id="revenueMonthly"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     

                   


                    

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="<?= base_url('plugins/apex/apexcharts.min.js')?>"></script>
    <script src="<?= base_url('assets/js/dashboard/dash_1.js')?>"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
         
    <script>
        $(document).ready(function() {
            
        $.ajax({ url: "<?= base_url() ?>/dashboard/accountinfo",
                    data: {},
                    dataType: "json",
                    type: "POST",
                    success: function(data){
                        
$("#licenseBalance").text(data[0]['license']);
$("#amountBalance").text(data[1]['balance']);
                
                
                    }
                });
                
               

//RECENT ACTIVATIONS
$.ajax({ url: "<?= base_url() ?>/dashboard/recentactivations",
    data: {},
    dataType: "json",
    type: "POST",
    success: function(data){
        $("#recentactivations").html("");
        data.forEach(function(item) {
 $("#recentactivations").append('<div class="item-timeline timeline-primary">'
        +'<div class="t-dot" data-original-title="" title="">'
        +'</div>'
        +'<div class="t-text">'
        +'<p><span>'+item.serialkey+'</span><br>'+item.comments+'</p>'
        
        +'<p class="t-time">'+item.activatedon+'</p>'
        +'</div></div>');
});



    }
});


      
//RECENT ACTIVATIONS
$.ajax({ url: "<?= base_url() ?>/dashboard/getactivationsbytype",
    data: {},
    dataType: "json",
    type: "POST",
    success: function(data){
        
         $("#counteract").html(data[0].counter);
        $("#pdaact").html(data[0].pda);
        $("#kdsact").html(data[0].kds);

$("#counterpct").width(data[0].counterpct+"%");
$("#pdapct").width(data[0].pdapct+"%");
$("#kdspct").width(data[0].kdspct+"%");

    }
});


//MONTHLY ACTIVATIONS

$.ajax({ url: "<?= base_url() ?>/dashboard/getmonthlyactivations",
    data: {},
    dataType: "json",
    type: "POST",
    success: function(data){
        


var options1 = {
  chart: {
    fontFamily: 'Nunito, sans-serif',
    height: 365,
    type: 'area',
    zoom: {
        enabled: false
    },
    dropShadow: {
      enabled: true,
      opacity: 0.3,
      blur: 5,
      left: -7,
      top: 22
    },
    toolbar: {
      show: false
    },
    events: {
      mounted: function(ctx, config) {
        const highest1 = ctx.getHighestValueInSeries(0);
        const highest2 = ctx.getHighestValueInSeries(1);

        ctx.addPointAnnotation({
          x: new Date(ctx.w.globals.seriesX[0][ctx.w.globals.series[0].indexOf(highest1)]).getTime(),
          y: highest1,
          label: {
            style: {
              cssClass: 'd-none'
            }
          },
          customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#1b55e2" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
          }
        })

        ctx.addPointAnnotation({
          x: new Date(ctx.w.globals.seriesX[1][ctx.w.globals.series[1].indexOf(highest2)]).getTime(),
          y: highest2,
          label: {
            style: {
              cssClass: 'd-none'
            }
          },
          customSVG: {
              SVG: '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="#e7515a" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg>',
              cssClass: undefined,
              offsetX: -8,
              offsetY: 5
          }
        })
      },
    }
  },
  colors: ['#1b55e2', '#e7515a'],
  dataLabels: {
      enabled: false
  },
  markers: {
    discrete: [{
    seriesIndex: 0,
    dataPointIndex: 7,
    fillColor: '#000',
    strokeColor: '#000',
    size: 5
  }, {
    seriesIndex: 2,
    dataPointIndex: 11,
    fillColor: '#000',
    strokeColor: '#000',
    size: 4
  }]
  },
  subtitle: {
    text: 'Total activations in last 12 months',
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 35,
    floating: false,
    style: {
      fontSize: '14px',
      color:  '#888ea8'
    }
  },
  title: {
    text: data[0].totalactivations,
    align: 'left',
    margin: 0,
    offsetX: -10,
    offsetY: 0,
    floating: false,
    style: {
      fontSize: '25px',
      color:  '#0e1726'
    },
  },
  stroke: {
      show: true,
      curve: 'smooth',
      width: 2,
      lineCap: 'square'
  },
  series: [{
      name: 'Activations',
      data: data[0].activations
  }],
  labels: data[0].months,
  xaxis: {
    axisBorder: {
      show: false
    },
    axisTicks: {
      show: false
    },
    crosshairs: {
      show: true
    },
    labels: {
      offsetX: 0,
      offsetY: 5,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-xaxis-title',
      },
    }
  },
  yaxis: {
    labels: {
      formatter: function(value, index) {
        return value
      },
      offsetX: -22,
      offsetY: 0,
      style: {
          fontSize: '12px',
          fontFamily: 'Nunito, sans-serif',
          cssClass: 'apexcharts-yaxis-title',
      },
    }
  },
  grid: {
    borderColor: '#e0e6ed',
    strokeDashArray: 5,
    xaxis: {
        lines: {
            show: true
        }
    },   
    yaxis: {
        lines: {
            show: false,
        }
    },
    padding: {
      top: 0,
      right: 0,
      bottom: 0,
      left: -10
    }, 
  }, 
  legend: {
    position: 'top',
    horizontalAlign: 'right',
    offsetY: -50,
    fontSize: '16px',
    fontFamily: 'Nunito, sans-serif',
    markers: {
      width: 10,
      height: 10,
      strokeWidth: 0,
      strokeColor: '#fff',
      fillColors: undefined,
      radius: 12,
      onClick: undefined,
      offsetX: 0,
      offsetY: 0
    },    
    itemMargin: {
      horizontal: 0,
      vertical: 20
    }
  },
  tooltip: {
    theme: 'dark',
    marker: {
      show: true,
    },
    x: {
      show: false,
    }
  },
  fill: {
      type:"gradient",
      gradient: {
          type: "vertical",
          shadeIntensity: 1,
          inverseColors: !1,
          opacityFrom: .28,
          opacityTo: .05,
          stops: [45, 100]
      }
  },
  responsive: [{
    breakpoint: 575,
    options: {
      legend: {
          offsetY: -30,
      },
    },
  }]
}

var chart1 = new ApexCharts(
    document.querySelector("#revenueMonthly"),
    options1
);

chart1.render();

    }
    
    
});



             
                
        });
    </script>
    
    </div>

            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">&nbsp;&nbsp;© <a target="_blank" href="https://www.saleculator.com">Saleculator</a></p>
                </div>
                
            </div>
        </div>
    
        
<?= $this->endSection() ?>