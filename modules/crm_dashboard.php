<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
<?php
    echo"
        <div class='container'>
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <h1 class='mb-0 pb-0 display-4' id='title'> CRM Administrative Dashboard</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=../global/dashboard.php'>Dashboard</a></li>                            
                            </ul>
                        </nav>
                    </div>
                    <div class='col-12 col-sm-6 d-flex align-items-start justify-content-end'>
                        <a href='index.php?url=helpdesk.php&id=5138' style='margin-top:18px'>Need Help?</a>&nbsp;&nbsp;
                        <a href='index.php?url=feedback.php&id=5138' style='margin-top:8px'>
                          <button type='button' class='btn btn-outline-success btn-icon btn-icon-end w-100 w-sm-auto'>
                              <span>Give Feedback</span><i data-acorn-icon='question'></i>
                          </button>
                        </a>
                    </div>              
                </div>
            </div>
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <span style='font-size:12pt'>$welcomenote & Welcome to Nexis 365, $username $username2</span><br>
                        <span style='font0-size:15pt'>Quickly access your projects, boards, inventory, Inbox and workspaces</span>
                    </div>
                </div>
            </div>
            
            <div class='row'>
                <div class='mb-5'>
                    <div class='row g-2'>
                        <div class='col-12 col-sm-6 col-lg-3'>
                            <div class='card hover-border-primary' data-title='Avg. Contract Value' data-intro='Click see detail.' data-step='1'><a href='index.php?url=global_contracts.php&id=000&sourcefrom=$sourcefrom'>
                                <div class='card-body'>
                                    <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                    <span>AVG. CONTRACT VALUE</span><i data-acorn-icon='office' class='text-primary'></i>
                                </div>                                
                                <div class='cta-1 text-primary'>$3,863 <span style='color:red'>(+2%)</span></div>
                            </a></div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-3'>
                        <div class='card hover-border-primary' data-title='Avg. Sales Cycle Length' data-intro='Click see detail.' data-step='2'><a href='index.php?url=global_deals.php&id=000&sourcefrom=$sourcefrom'>
                            <div class='card-body'>
                                <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                    <span>AVG. SALES CYCLE LENGTH</span><i data-acorn-icon='check-square' class='text-primary'></i>
                                </div>                                
                                <div class='cta-1 text-primary'>22.2 days <span style='color:red'>(+11%)</span></div>
                            </div>
                        </a></div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-3'>
                      <div class='card hover-border-primary' data-title='Avg. Lead Response Time' data-intro='Click see detail.' data-step='3'><a href='index.php?url=global_leads.php&id=000&sourcefrom=$sourcefrom'>
                        <div class='card-body'>
                          <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                            <span>AVG. LEAD RESPONSE TIME</span><i data-acorn-icon='file-empty' class='text-primary'></i>
                          </div>
                          <div class='cta-1 text-primary'>1.0 hours <span style='color:red'>(+3%)</span></div>
                        </div>
                      </a></div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-3' data-title='Avg. Pipeline Breakdown' data-intro='Showing Average Invoice value. click see detail.' data-step='4'><a href='index.php?url=global_invoices.php&id=000&sourcefrom=$sourcefrom'>
                      <div class='card hover-border-primary'>
                        <div class='card-body'>
                          <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                            <span>AVG. PIPELINE BREAKDOWN</span><i data-acorn-icon='screen' class='text-primary'></i>
                          </div>
                          <div class='cta-1 text-primary'>$97,258/M <span style='color:red'>(70%+)</span></div>
                        </div>
                      </a></div>
                    </div>
                  </div>
                </div>

                <div class='col-12'>
                    <section class='scroll-section' id='autoPlay'>
                        <h2 class='small-title'>SALES CYCLE STEPS</h2>                        
                        <div class='row'>
                            <div class='col-6 col-xl-6 p-0 mb-5'>
                                <div class='glide' id='glideAuto'>
                                    <div class='glide__track' data-glide-el='track'>
                                        <div class='glide__slides'>
                                            <div class='glide__slide'><a href='index.php?url=global_deals.php&id=000&sourcefrom=$sourcefrom'>
                                                <div class='card mb-5 sh-25'>
                                                    <div class='card-body text-center align-items-center d-flex flex-column justify-content-between'>";
                                                        ?><script type="text/javascript">
                                                            google.charts.load("current", {packages:["corechart"]});
                                                            google.charts.setOnLoadCallback(drawChart);
                                                            function drawChart() {
                                                              var data = google.visualization.arrayToDataTable([
                                                                ['Task', 'Hours'],
                                                                ['Done',     6.7],
                                                                ['Left',      2.3]
                                                              ]);
                                                              
                                                              var options = {
                                                                pieHole: 0.9,
                                                                legend: 'none',
                                                                backgroundColor: 'none',                                                                
                                                                is3D: true,
                                                                pieStartAngle: 100,
                                                                tooltip: { trigger: 'none' },
                                                                slices: {
                                                                    0: { color: '#1EA8E7' },
                                                                    1: { color: '#FFFFFF' }
                                                                }
                                                              };
                                                              
                                                              var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                                                              chart.draw(data, options);
                                                            }
                                                          </script><div id="donutchart" style="width: 130px; height: 130px;margin-top:-35px"></div>
                                                        <?php echo"<p class='card-text mb-0 d-flex'>Opportunity</p>
                                                        <p class='h4 text-center mb-0 d-flex text-primary'>6.7/10</p>
                                                    </div>
                                                </div>
                                            </a></div>
                                            <div class='glide__slide'><a href='index.php?url=global_deals.php&id=000&sourcefrom=$sourcefrom'>
                                                <div class='card mb-5 sh-25'>
                                                    <div class='card-body text-center align-items-center d-flex flex-column justify-content-between'>";
                                                        ?><script type="text/javascript">
                                                            google.charts.load("current", {packages:["corechart"]});
                                                            google.charts.setOnLoadCallback(drawChart2);
                                                            function drawChart2() {
                                                              var data2 = google.visualization.arrayToDataTable([
                                                                ['Task', 'Hours'],
                                                                ['Done',     4.1],
                                                                ['Left',      5.9]
                                                              ]);
                                                              
                                                              var options2 = {
                                                                pieHole: 0.9,
                                                                legend: 'none',
                                                                backgroundColor: 'none',                                                                
                                                                is3D: true,
                                                                pieStartAngle: 100,
                                                                tooltip: { trigger: 'none' },
                                                                slices: {
                                                                    0: { color: '#1EA8E7' },
                                                                    1: { color: '#FFFFFF' }
                                                                }
                                                              };
                                                              
                                                              var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
                                                              chart.draw(data2, options2);
                                                            }
                                                          </script><div id="donutchart2" style="width: 130px; height: 130px;margin-top:-35px"></div>
                                                        <?php echo"<p class='card-text mb-0 d-flex'>Proposal</p>
                                                        <p class='h4 text-center mb-0 d-flex text-primary'>4.1/10</p>
                                                    </div>
                                                </div>
                                            </a></div>
                                            <div class='glide__slide'><a href='index.php?url=global_deals.php&id=000&sourcefrom=$sourcefrom'>
                                                <div class='card mb-5 sh-25'>
                                                    <div class='card-body text-center align-items-center d-flex flex-column justify-content-between'>";
                                                        ?><script type="text/javascript">
                                                            google.charts.load("current", {packages:["corechart"]});
                                                            google.charts.setOnLoadCallback(drawChart3);
                                                            function drawChart3() {
                                                              var data3 = google.visualization.arrayToDataTable([
                                                                ['Task', 'Hours'],
                                                                ['Done',     8.8],
                                                                ['Left',     1.2]
                                                              ]);
                                                              
                                                              var options3 = {
                                                                pieHole: 0.9,
                                                                legend: 'none',
                                                                backgroundColor: 'none',                                                                
                                                                is3D: true,
                                                                pieStartAngle: 100,
                                                                tooltip: { trigger: 'none' },
                                                                slices: {
                                                                    0: { color: '#1EA8E7' },
                                                                    1: { color: '#FFFFFF' }
                                                                }
                                                              };
                                                              
                                                              var chart = new google.visualization.PieChart(document.getElementById('donutchart3'));
                                                              chart.draw(data3, options3);
                                                            }
                                                          </script><div id="donutchart3" style="width: 130px; height: 130px;margin-top:-35px"></div>
                                                        <?php echo"<p class='card-text mb-0 d-flex'>Negotiation</p>
                                                        <p class='h4 text-center mb-0 d-flex text-primary'>8.8/10</p>
                                                    </div>
                                                </div>
                                            </a></div>
                                            <div class='glide__slide'><a href='index.php?url=global_deals.php&id=000&sourcefrom=$sourcefrom'>
                                                <div class='card mb-5 sh-25'>
                                                    <div class='card-body text-center align-items-center d-flex flex-column justify-content-between'>";
                                                        ?><script type="text/javascript">
                                                            google.charts.load("current", {packages:["corechart"]});
                                                            google.charts.setOnLoadCallback(drawChart4);
                                                            function drawChart4() {
                                                              var data4 = google.visualization.arrayToDataTable([
                                                                ['Task', 'Hours'],
                                                                ['Done',     4.1],
                                                                ['Left',      5.9]
                                                              ]);
                                                              
                                                              var options4 = {
                                                                pieHole: 0.9,
                                                                legend: 'none',
                                                                backgroundColor: 'none',                                                                
                                                                is3D: true,
                                                                pieStartAngle: 100,
                                                                tooltip: { trigger: 'none' },
                                                                slices: {
                                                                    0: { color: '#1EA8E7' },
                                                                    1: { color: '#FFFFFF' }
                                                                }
                                                              };
                                                              
                                                              var chart = new google.visualization.PieChart(document.getElementById('donutchart4'));
                                                              chart.draw(data4, options4);
                                                            }
                                                          </script><div id="donutchart4" style="width: 130px; height: 130px;margin-top:-35px"></div>
                                                        <?php echo"<p class='card-text mb-0 d-flex'>Closing</p>
                                                        <p class='h4 text-center m-b-0 d-flex text-primary'>4.6/10</p>
                                                    </div>
                                                </div>
                                            </a></div>
                                            <div class='glide__slide'><a href='index.php?url=global_deals.php&id=000&sourcefrom=$sourcefrom'>
                                                <div class='card mb-5 sh-25'>
                                                    <div class='card-body text-center align-items-center d-flex flex-column justify-content-between'>";
                                                        ?><script type="text/javascript">
                                                            google.charts.load("current", {packages:["corechart"]});
                                                            google.charts.setOnLoadCallback(drawChart5);
                                                            function drawChart5() {
                                                              var data5 = google.visualization.arrayToDataTable([
                                                                ['Task', 'Hours'],
                                                                ['Done',     2.0],
                                                                ['Left',      8.0]
                                                              ]);
                                                              
                                                              var options5 = {
                                                                pieHole: 0.9,
                                                                legend: 'none',
                                                                backgroundColor: 'none',
                                                                is3D: true,
                                                                pieStartAngle: 100,
                                                                tooltip: { trigger: 'none' },
                                                                slices: {
                                                                    0: { color: '#1EA8E7' },
                                                                    1: { color: '#FFFFFF' }
                                                                }
                                                              };
                                                              
                                                              var chart = new google.visualization.PieChart(document.getElementById('donutchart5'));
                                                              chart.draw(data5, options5);
                                                            }
                                                          </script><div id="donutchart5" style="width: 130px; height: 130px;margin-top:-35px"></div>
                                                        <?php echo"<p class='card-text mb-0 d-flex'>Other</p>
                                                        <p class='h4 text-center mb-0 d-flex text-primary'>2.0/10</p>
                                                    </div>
                                                </div>
                                            </a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='col-6 col-xl-6 p-0 mb-5'>"; ?>
                                <script type="text/javascript">
                                    google.charts.load('current', {packages: ['corechart', 'bar']});
                                    google.charts.setOnLoadCallback(drawAxisTickColors);

                                    function drawAxisTickColors() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Team', 'Hours'],
                                            ['Albert Saddler', 1.7],
                                            ['Elton Saga', 1.4],
                                            ['Chang Lee', 1.0],
                                            ['Houston John', 0.9],
                                            ['Harsh', 0.6],
                                            ['Jason', 0.4]
                                        ]);

                                        var options = {   
                                            legend: 'true',
                                            backgroundColor: 'none',                                            
                                            chartArea: {width: '50%'},                                            
                                            hAxis: {                                    
                                                minValue: 0,
                                                textStyle: {
                                                    bold: true,
                                                    fontSize: 12,
                                                    color: '#4d4d4d'
                                                },
                                                titleTextStyle: {
                                                    bold: true,
                                                    fontSize: 18,
                                                    color: '#4d4d4d'
                                                }                                                
                                            },
                                            vAxis: {
                                                title: 'By Sales Representative Per Hour',
                                                textStyle: {
                                                    fontSize: 12,
                                                    bold: false,
                                                    color: '#848484'
                                                },
                                                titleTextStyle: {
                                                    fontSize: 12,
                                                    bold: false,
                                                    color: '#848484'
                                                }
                                            }
                                        };
                                        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
                                        chart.draw(data, options);
                                    }
                                </script>                                
                                <?php echo"<div class='card hover-border-primary'style='margin-left:10px;height:200px'>
                                    <div class='card-body' style='margin-top:-20px' data-title='Avg. Lead Response Time' data-intro='Click see detail.' data-step='5'><a href='index.php?url=global_leads.php&id=000&sourcefrom=$sourcefrom'>
                                        <h2 class='small-title'>AVG. LEAD RESPONSE TIME</h2>
                                        <div id='chart_div' style='width:100%;margin-top:-40px'></div>
                                    </a></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class='row gx-2'>
                    <h2 class='small-title'>SALES PIPELINE</h2>
                    <div class='col-2 p-10'><a href='index.php?url=global_deals.php&id=000&sourcefrom=$sourcefrom'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='alarm' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>Total Sales</p>
                                <p class='cta-3 mb-0 text-primary'>2500+</p>
                            </div>
                        </div>
                    </a></div><div class='col-2 p-10'><a href='index.php?url=global_deals.php&id=000&sourcefrom=$sourcefrom'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='navigate-diagonal' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>New Customers</p>
                                <p class='cta-3 mb-0 text-primary'>15oo+</p>
                            </div>
                        </div>
                    </a></div><div class='col-2 p-10'><a href='index.php?url=global_leads.php&id=000&sourcefrom=$sourcefrom'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='check-circle' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>New Leads</p>
                                <p class='cta-3 mb-0 text-primary'>50+</p>
                            </div>
                        </div>
                    </a></div><div class='col-2 p-10'><a href='index.php?url=global_leads.php&id=000&sourcefrom=$sourcefrom'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='check-circle' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>Prospects</p>
                                <p class='cta-3 mb-0 text-primary'>25 (+/-)</p>
                            </div>
                        </div>
                    </a></div><div class='col-2 p-10'><a href='index.php?url=global_deals.php&id=000&sourcefrom=$sourcefrom'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='check-circle' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>Deals Closed</p>
                                <p class='cta-3 mb-0 text-primary'>5000+</p>
                            </div>
                        </div>
                    </a></div><div class='col-2 p-10'><a href='index.php?url=global_deals.php&id=000&sourcefrom=$sourcefrom'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='check-circle' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>Deals Ongoing</p>
                                <p class='cta-3 mb-0 text-primary'>500+</p>
                            </div>
                        </div>
                    </a></div>
                </div>
                
                <table style='width:100%'><tr>
                    <td style='width:50%;padding:10px'>
                        <div class='card mb-2 h-auto sh-xl-24'><a href='index.php?url=global_deals.php&id=000&sourcefrom=$sourcefrom'>
                            <div class='card-body'>
                                <div class='row g-0 h-100 chart-container'>
                                    <div class='col-12 col-sm-auto d-flex flex-column justify-content-between custom-tooltip pe-0 pe-sm-4'>
                                        <p class='heading title mb-1'></p>
                                        <div>
                                            <div>
                                                <div class='cta-2 text-primary value d-inline-block align-middle sw-4'></div>
                                                    <i class='icon d-inline-block align-middle text-primary' data-acorn-size='15'></i>
                                                </div>
                                                <div class='text-small text-muted mb-1 text'></div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-auto'><div class='cta-3 text-alternate'>84</div><div class='text-small text-muted mb-1'>THIS WEEK</div></div>
                                                <div class='col'><div class='cta-3 text-alternate'>792</div><div class='text-small text-muted mb-1'>THIS MONTH</div></div>
                                            </div>
                                        </div>
                                        <div class='col-12 col-sm sh-17'><canvas id='largeLineChart1'></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    </td><td style='width:50%;padding:10px'>
                        <div class='card mb-2 h-auto sh-xl-24'><a href='index.php?url=global_campaigns.php&id=000&sourcefrom=$sourcefrom'>
                            <div class='card-body'>
                                <div class='row g-0 h-100 chart-container'>
                                    <div class='col-12 col-sm-auto d-flex flex-column justify-content-between custom-tooltip pe-0 pe-sm-4'>
                                        <p class='heading title'></p>
                                        <div>
                                            <div>
                                                <div class='cta-2 text-primary value d-inline-block align-middle sw-4'></div>
                                                <i class='icon d-inline-block align-middle text-primary' data-acorn-size='15'></i>
                                            </div>
                                            <div class='text-small text-muted mb-1 text'></div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-auto'>
                                                <div class='cta-3 text-alternate'>84</div><div class='text-small text-muted mb-1'>THIS WEEK</div></div>
                                                <div class='col'><div class='cta-3 text-alternate'>792</div><div class='text-small text-muted mb-1'>THIS MONTH</div></div>
                                            </div>
                                        </div>
                                        <div class='col-12 col-sm sh-17'><canvas id='largeLineChart2'></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    </td>
                </tr></table>

                
          

          

          <div class='row'>
            <!-- Logs Start -->
            <div class='col-lg-6 mb-5'>
              <h2 class='small-title'>Recent Activities</h2>
              <div class='card sh-40 h-lg-100-card'>
                <div class='card-body mb-n2 scroll-out h-100'>
                  <div class='scroll h-100'>
                    <div class='row g-0 mb-2'>
                      <div class='col-auto'>
                        <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                          <div class='sh-3'>
                            <i data-acorn-icon='circle' class='text-primary align-top'></i>
                          </div>
                        </div>
                      </div>
                      <div class='col'>
                        <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                          <div class='d-flex flex-column'>
                            <div class='text-alternate mt-n1 lh-1-25'>New user registiration</div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>18 Dec</div>
                        </div>
                      </div>
                    </div>
                    <div class='row g-0 mb-2'>
                      <div class='col-auto'>
                        <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                          <div class='sh-3'>
                            <i data-acorn-icon='circle' class='text-primary align-top'></i>
                          </div>
                        </div>
                      </div>
                      <div class='col'>
                        <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                          <div class='d-flex flex-column'>
                            <div class='text-alternate mt-n1 lh-1-25'>3 new product added</div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>18 Dec</div>
                        </div>
                      </div>
                    </div>
                    <div class='row g-0 mb-2'>
                      <div class='col-auto'>
                        <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                          <div class='sh-3'>
                            <i data-acorn-icon='square' class='text-secondary align-top'></i>
                          </div>
                        </div>
                      </div>
                      <div class='col'>
                        <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                          <div class='d-flex flex-column'>
                            <div class='text-alternate mt-n1 lh-1-25'>
                              Product out of stock:
                              <a href='#' class='alternate-link underline-link'>Breadstick</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>16 Dec</div>
                        </div>
                      </div>
                    </div>
                    <div class='row g-0 mb-2'>
                      <div class='col-auto'>
                        <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                          <div class='sh-3'>
                            <i data-acorn-icon='square' class='text-secondary align-top'></i>
                          </div>
                        </div>
                      </div>
                      <div class='col'>
                        <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                          <div class='d-flex flex-column'>
                            <div class='text-alternate mt-n1 lh-1-25'>Category page returned an error</div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                        </div>
                      </div>
                    </div>
                    <div class='row g-0 mb-2'>
                      <div class='col-auto'>
                        <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                          <div class='sh-3'>
                            <i data-acorn-icon='circle' class='text-primary align-top'></i>
                          </div>
                        </div>
                      </div>
                      <div class='col'>
                        <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                          <div class='d-flex flex-column'>
                            <div class='text-alternate mt-n1 lh-1-25'>14 products added</div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                        </div>
                      </div>
                    </div>
                    <div class='row g-0 mb-2'>
                      <div class='col-auto'>
                        <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                          <div class='sh-3'>
                            <i data-acorn-icon='hexagon' class='text-tertiary align-top'></i>
                          </div>
                        </div>
                      </div>
                      <div class='col'>
                        <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                          <div class='d-flex flex-column'>
                            <div class='text-alternate mt-n1 lh-1-25'>
                              New sale:
                              <a href='#' class='alternate-link underline-link'>Steirer Brot</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                        </div>
                      </div>
                    </div>
                    <div class='row g-0 mb-2'>
                      <div class='col-auto'>
                        <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                          <div class='sh-3'>
                            <i data-acorn-icon='hexagon' class='text-tertiary align-top'></i>
                          </div>
                        </div>
                      </div>
                      <div class='col'>
                        <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                          <div class='d-flex flex-column'>
                            <div class='text-alternate mt-n1 lh-1-25'>
                              New sale:
                              <a href='#' class='alternate-link underline-link'>Soda Bread</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                        </div>
                      </div>
                    </div>
                    <div class='row g-0 mb-2'>
                      <div class='col-auto'>
                        <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                          <div class='sh-3'>
                            <i data-acorn-icon='triangle' class='text-warning align-top'></i>
                          </div>
                        </div>
                      </div>
                      <div class='col'>
                        <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                          <div class='d-flex flex-column'>
                            <div class='text-alternate mt-n1 lh-1-25'>Recived a support ticket</div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>14 Dec</div>
                        </div>
                      </div>
                    </div>
                    <div class='row g-0 mb-2'>
                      <div class='col-auto'>
                        <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                          <div class='sh-3'>
                            <i data-acorn-icon='hexagon' class='text-tertiary align-top'></i>
                          </div>
                        </div>
                      </div>
                      <div class='col'>
                        <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                          <div class='d-flex flex-column'>
                            <div class='text-alternate mt-n1 lh-1-25'>
                              New sale:
                              <a href='#' class='alternate-link underline-link'>Cholermüs</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>13 Dec</div>
                        </div>
                      </div>
                    </div>
                    <div class='row g-0 mb-2'>
                      <div class='col-auto'>
                        <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                          <div class='sh-3'>
                            <i data-acorn-icon='hexagon' class='text-tertiary align-top'></i>
                          </div>
                        </div>
                      </div>
                      <div class='col'>
                        <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                          <div class='d-flex flex-column'>
                            <div class='text-alternate mt-n1 lh-1-25'>
                              New sale:
                              <a href='#' class='alternate-link underline-link'>Bazlama</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>13 Dec</div>
                        </div>
                      </div>
                    </div>
                    <div class='row g-0 mb-2'>
                      <div class='col-auto'>
                        <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                          <div class='sh-3'>
                            <i data-acorn-icon='triangle' class='text-warning align-top'></i>
                          </div>
                        </div>
                      </div>
                      <div class='col'>
                        <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                          <div class='d-flex flex-column'>
                            <div class='text-alternate mt-n1 lh-1-25'>Recived a comment</div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>13 Dec</div>
                        </div>
                      </div>
                    </div>
                    <div class='row g-0 mb-2'>
                      <div class='col-auto'>
                        <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                          <div class='sh-3'>
                            <i data-acorn-icon='triangle' class='text-warning align-top'></i>
                          </div>
                        </div>
                      </div>
                      <div class='col'>
                        <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                          <div class='d-flex flex-column'>
                            <div class='text-alternate mt-n1 lh-1-25'>Recived an email</div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>13 Dec</div>
                        </div>
                      </div>
                    </div>
                    <div class='row g-0 mb-2'>
                      <div class='col-auto'>
                        <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                          <div class='sh-3'>
                            <i data-acorn-icon='hexagon' class='text-tertiary align-top'></i>
                          </div>
                        </div>
                      </div>
                      <div class='col'>
                        <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                          <div class='d-flex flex-column'>
                            <div class='text-alternate mt-n1 lh-1-25'>
                              New sale:
                              <a href='#' class='alternate-link underline-link'>Bazlama</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>12 Dec</div>
                        </div>
                      </div>
                    </div>
                    <div class='row g-0 mb-2'>
                      <div class='col-auto'>
                        <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                          <div class='sh-3'>
                            <i data-acorn-icon='triangle' class='text-warning align-top'></i>
                          </div>
                        </div>
                      </div>
                      <div class='col'>
                        <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                          <div class='d-flex flex-column'>
                            <div class='text-alternate mt-n1 lh-1-25'>Recived a comment</div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>12 Dec</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             <!-- Latest Registrations Start -->
             <div class='col-12 col-xl-6 mb-5'>
              <h2 class='small-title'>Latest Registrations</h2>
              <div class='card h-100-card'>
                <div class='card-body'>
                  <div class='scroll-out'>
                    <div class='scroll-by-count mb-n2' data-childSelector='.scroll-item' data-count='5'>
                      <div class='mb-2 scroll-item'>
                        <div class='row g-0 sh-10 sh-sm-7'>
                          <div class='col-auto'>
                            <img src='img/profile/profile-6.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                          </div>
                          <div class='col'>
                            <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                              <div class='d-flex flex-column mb-2 mb-sm-0'>
                                <div>Joisse Kaycee</div>
                                <div class='text-small text-muted'>UX Designer</div>
                              </div>
                              <div class='d-flex'>
                                <button class='btn btn-outline-secondary btn-sm' type='button'>Edit</button>
                                <button class='btn btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1' type='button'>
                                  <i data-acorn-icon='more-vertical'></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='mb-2 scroll-item'>
                        <div class='row g-0 sh-10 sh-sm-7'>
                          <div class='col-auto'>
                            <img src='img/profile/profile-7.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                          </div>
                          <div class='col'>
                            <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                              <div class='d-flex flex-column mb-2 mb-sm-0'>
                                <div>Zayn Hartley</div>
                                <div class='text-small text-muted'>Frontend Developer</div>
                              </div>
                              <div class='d-flex'>
                                <button class='btn btn-outline-secondary btn-sm' type='button'>Edit</button>
                                <button class='btn btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1' type='button'>
                                  <i data-acorn-icon='more-vertical'></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='mb-2 scroll-item'>
                        <div class='row g-0 sh-10 sh-sm-7'>
                          <div class='col-auto'>
                            <img src='img/profile/profile-8.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                          </div>
                          <div class='col'>
                            <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                              <div class='d-flex flex-column mb-2 mb-sm-0'>
                                <div>Esperanza Lodge</div>
                                <div class='text-small text-muted'>Project Manager</div>
                              </div>
                              <div class='d-flex'>
                                <button class='btn btn-outline-secondary btn-sm' type='button'>Edit</button>
                                <button class='btn btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1' type='button'>
                                  <i data-acorn-icon='more-vertical'></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='mb-2 scroll-item'>
                        <div class='row g-0 sh-10 sh-sm-7'>
                          <div class='col-auto'>
                            <img src='img/profile/profile-2.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                          </div>
                          <div class='col'>
                            <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                              <div class='d-flex flex-column mb-2 mb-sm-0'>
                                <div>Kathryn Mengel</div>
                                <div class='text-small text-muted'>Executive Team Leader</div>
                              </div>
                              <div class='d-flex'>
                                <button class='btn btn-outline-secondary btn-sm' type='button'>Edit</button>
                                <button class='btn btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1' type='button'>
                                  <i data-acorn-icon='more-vertical'></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='mb-2 scroll-item'>
                        <div class='row g-0 sh-10 sh-sm-7'>
                          <div class='col-auto'>
                            <img src='img/profile/profile-5.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                          </div>
                          <div class='col'>
                            <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                              <div class='d-flex flex-column mb-2 mb-sm-0'>
                                <div>Blaine Cottrell</div>
                                <div class='text-small text-muted'>Accounting</div>
                              </div>
                              <div class='d-flex'>
                                <button class='btn btn-outline-secondary btn-sm' type='button'>Edit</button>
                                <button class='btn btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1' type='button'>
                                  <i data-acorn-icon='more-vertical'></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='mb-2 scroll-item'>
                        <div class='row g-0 sh-10 sh-sm-7'>
                          <div class='col-auto'>
                            <img src='img/profile/profile-8.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                          </div>
                          <div class='col'>
                            <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                              <div class='d-flex flex-column mb-2 mb-sm-0'>
                                <div>Cherish Kerr</div>
                                <div class='text-small text-muted'>Development Lead</div>
                              </div>
                              <div class='d-flex'>
                                <button class='btn btn-outline-secondary btn-sm' type='button'>Edit</button>
                                <button class='btn btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1' type='button'>
                                  <i data-acorn-icon='more-vertical'></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='mb-2 scroll-item'>
                        <div class='row g-0 sh-10 sh-sm-7'>
                          <div class='col-auto'>
                            <img src='img/profile/profile-3.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                          </div>
                          <div class='col'>
                            <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                              <div class='d-flex flex-column mb-2 mb-sm-0'>
                                <div>Olli Hawkins</div>
                                <div class='text-small text-muted'>Client Relations Lead</div>
                              </div>
                              <div class='d-flex'>
                                <button class='btn btn-outline-secondary btn-sm' type='button'>Edit</button>
                                <button class='btn btn-sm btn-icon btn-icon-only btn-outline-secondary ms-1' type='button'>
                                  <i data-acorn-icon='more-vertical'></i>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Latest Registrations End -->
          </div>"; ?>
          
          <script type="text/javascript">
            google.charts.load("current", {packages:["timeline"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {

                var container = document.getElementById('example5.1');
                var chart = new google.visualization.Timeline(container);
                var dataTable = new google.visualization.DataTable();
                dataTable.addColumn({ type: 'string', id: 'Room' });
                dataTable.addColumn({ type: 'string', id: 'Name' });
                dataTable.addColumn({ type: 'date', id: 'Start' });
                dataTable.addColumn({ type: 'date', id: 'End' });
                dataTable.addRows([
                [ 'Magnolia', 'Beginning JavaScript',       new Date(0,0,0,12,0,0),  new Date(0,0,0,13,30,0) ],
                [ 'Magnolia', 'Intermediate JavaScript',    new Date(0,0,0,14,0,0),  new Date(0,0,0,15,30,0) ],
                [ 'Magnolia', 'Advanced JavaScript',        new Date(0,0,0,16,0,0),  new Date(0,0,0,17,30,0) ],
                [ 'William',   'Beginning Google Charts',    new Date(0,0,0,12,30,0), new Date(0,0,0,14,0,0) ],
                [ 'William',   'Intermediate Google Charts', new Date(0,0,0,14,30,0), new Date(0,0,0,16,0,0) ],
                [ 'William',   'Advanced Google Charts',     new Date(0,0,0,16,30,0), new Date(0,0,0,18,0,0) ],
                [ 'Roger', 'Beginning JavaScript',       new Date(0,0,0,12,0,0),  new Date(0,0,0,13,30,0) ],
                [ 'Roger', 'Intermediate JavaScript',    new Date(0,0,0,14,0,0),  new Date(0,0,0,15,30,0) ],
                [ 'Roger', 'Advanced JavaScript',        new Date(0,0,0,16,0,0),  new Date(0,0,0,17,30,0) ],
                [ 'Sonali',   'Beginning Google Charts',    new Date(0,0,0,12,30,0), new Date(0,0,0,14,0,0) ],
                [ 'Sonali',   'Intermediate Google Charts', new Date(0,0,0,14,30,0), new Date(0,0,0,16,0,0) ],
                [ 'Sonali',   'Advanced Google Charts',     new Date(0,0,0,16,30,0), new Date(0,0,0,18,0,0) ],
                [ 'Hossain', 'Beginning JavaScript',       new Date(0,0,0,12,0,0),  new Date(0,0,0,13,30,0) ],
                [ 'Hossain', 'Intermediate JavaScript',    new Date(0,0,0,14,0,0),  new Date(0,0,0,15,30,0) ],
                [ 'Hossain', 'Advanced JavaScript',        new Date(0,0,0,16,0,0),  new Date(0,0,0,17,30,0) ]                
            ]);

                var options = {
                    backgroundColor: 'none',
                    // colors: ['#cbb69d', '#603913', '#c69c6e'],
                    timeline: {
                        colorByRowLabel: true,
                        rowLabelStyle: {fontName: 'Helvetica', fontSize: 12, color: '#603913' },
                        barLabelStyle: { fontName: 'Garamond', fontSize: 12 }
                    }
                };

                chart.draw(dataTable, options);
            }

            </script>
            <div class='col-xl-12 mb-5'>
                <section class='scroll-section' id='activityLogs'>                    
                    <div class='card'>
                        <div class='card-body mb-n2' style='background-color:white;border-radius:10px'>
                            <h2 class='small-title'>Time Line Funnel</h2>
                            <div id="example5.1" style="height:260px;color:white"></div>
                        </div> 
                    </div>
                </section>
            </div>
        
          <?php echo"
          
                  <div class='col-xl-6 mb-5'>
                    <section class='scroll-section' id='activityLogs'>
                      <h2 class='small-title'>Activity Logs</h2>
                      <div class='card'>
                        <div class='card-body mb-n2'>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='circle' class='text-primary align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>New user registiration</div>
                                </div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>18 Dec</div>
                              </div>
                            </div>
                          </div>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='circle' class='text-primary align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>3 new product added</div>
                                </div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>18 Dec</div>
                              </div>
                            </div>
                          </div>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='square' class='text-secondary align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>
                                    Product out of stock:
                                    <a href='#' class='alternate-link underline-link'>Breadstick</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>16 Dec</div>
                              </div>
                            </div>
                          </div>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='square' class='text-secondary align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>Category page returned an error</div>
                                </div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                              </div>
                            </div>
                          </div>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='circle' class='text-primary align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>14 products added</div>
                                </div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                              </div>
                            </div>
                          </div>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='hexagon' class='text-tertiary align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>
                                    New sale:
                                    <a href='#' class='alternate-link underline-link'>Steirer Brot</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                              </div>
                            </div>
                          </div>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='hexagon' class='text-tertiary align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>
                                    New sale:
                                    <a href='#' class='alternate-link underline-link'>Soda Bread</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                              </div>
                            </div>
                          </div>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='triangle' class='text-warning align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>Recived a support ticket</div>
                                </div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>14 Dec</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                  <!-- Activity Logs End -->

                  <!-- Time Logs Start -->
                  <div class='col-xl-6 mb-5'>
                    <section class='scroll-section' id='timeLogs'>
                      <h2 class='small-title'>Time Logs</h2>
                      <div class='card'>
                        <div class='card-body mb-n2'>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-6 d-inline-block d-flex justify-content-start align-items-center h-100 me-2'>
                                <div class='text-muted mt-n1 lh-1-25'>12:43</div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='sw-2 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='circle' class='text-primary align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>New user registiration</div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-6 d-inline-block d-flex justify-content-start align-items-center h-100 me-2'>
                                <div class='text-muted mt-n1 lh-1-25'>12:43</div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='sw-2 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='circle' class='text-primary align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>3 new product added</div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-6 d-inline-block d-flex justify-content-start align-items-center h-100 me-2'>
                                <div class='text-muted mt-n1 lh-1-25'>12:43</div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='sw-2 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='square' class='text-secondary align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>
                                    Product out of stock:
                                    <a href='#' class='alternate-link underline-link'>Breadstick</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-6 d-inline-block d-flex justify-content-start align-items-center h-100 me-2'>
                                <div class='text-muted mt-n1 lh-1-25'>12:43</div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='sw-2 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='square' class='text-secondary align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>Category page returned an error</div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-6 d-inline-block d-flex justify-content-start align-items-center h-100 me-2'>
                                <div class='text-muted mt-n1 lh-1-25'>12:43</div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='sw-2 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='circle' class='text-primary align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>14 products added</div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-6 d-inline-block d-flex justify-content-start align-items-center h-100 me-2'>
                                <div class='text-muted mt-n1 lh-1-25'>12:43</div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='sw-2 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='hexagon' class='text-tertiary align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>
                                    New sale:
                                    <a href='#' class='alternate-link underline-link'>Steirer Brot</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-6 d-inline-block d-flex justify-content-start align-items-center h-100 me-2'>
                                <div class='text-muted mt-n1 lh-1-25'>12:43</div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='sw-2 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='triangle' class='text-warning align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>Recived a support ticket</div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class='row g-0 mb-2'>
                            <div class='col-auto'>
                              <div class='sw-6 d-inline-block d-flex justify-content-start align-items-center h-100 me-2'>
                                <div class='text-muted mt-n1 lh-1-25'>12:43</div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='sw-2 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                <div class='sh-3'>
                                  <i data-acorn-icon='triangle' class='text-warning align-top'></i>
                                </div>
                              </div>
                            </div>
                            <div class='col'>
                              <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-0 h-100 justify-content-center'>
                                <div class='d-flex flex-column'>
                                  <div class='text-alternate mt-n1 lh-1-25'>Recived a comment</div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>"; ?>

                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['gantt']});
                        google.charts.setOnLoadCallback(drawChart);

                        function daysToMilliseconds(days) {
                            return days * 24 * 60 * 60 * 1000;
                        }

                        function drawChart() {

                            var dataX = new google.visualization.DataTable();
                            dataX.addColumn('string', 'Task ID');
                            dataX.addColumn('string', 'Task Name');
                            dataX.addColumn('date', 'Start Date');
                            dataX.addColumn('date', 'End Date');
                            dataX.addColumn('number', 'Duration');
                            dataX.addColumn('number', 'Percent Complete');
                            dataX.addColumn('string', 'Dependencies');

                            dataX.addRows([
                                ['Research', 'Find sources', new Date(2015, 0, 1), new Date(2015, 0, 5), null,  100,  null],
                                ['Write', 'Write paper', null, new Date(2015, 0, 9), daysToMilliseconds(3), 25, 'Research,Outline'],
                                ['Cite', 'Create bibliography', null, new Date(2015, 0, 7), daysToMilliseconds(1), 20, 'Research'],
                                ['Complete', 'Hand in paper', null, new Date(2015, 0, 10), daysToMilliseconds(1), 0, 'Cite,Write'],
                                ['Outline', 'Outline paper', null, new Date(2015, 0, 6), daysToMilliseconds(1), 100, 'Research']
                            ]);

                            var optionsX = {
                                height: 275                                
                            };

                            var chart = new google.visualization.Gantt(document.getElementById('chart_div1'));

                            chart.draw(dataX, optionsX);
                        }
                    </script>
                
                    <div class='col-xl-12 mb-5'>
                        <section class='scroll-section' id='activityLogs'>                    
                            <div class='card'>
                                <div class='card-body mb-n2' style='background-color:white;border-radius:10px'>
                                    <h2 class='small-title'>WorkForce Task Progress Funnel</h2>
                                    <div id="chart_div1"></div>
                                </div> 
                            </div>
                        </section>
                    </div>
        
                <?php echo"
          
                  <div class='col-xl-6 mb-5'>
                    <section class='scroll-section' id='tasks'>
                      <h2 class='small-title'>Tasks</h2>
                      <div class='card h-xl-100-card sh-40'>
                        <div class='card-body mb-n2 scroll-out h-100'>
                          <div class='scroll h-100'>
                            <div class='mb-2'>
                              <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' checked />
                                <span class='form-check-label d-block'>
                                  <span>AidaMoussa Clocked IN at</span>
                                  <span class='text-muted d-block text-small mt-0'>Today 09:00</span>
                                </span>
                              </label>
                            </div>
                            <div class='mb-2'>
                              <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' checked />
                                <span class='form-check-label d-block'>
                                  <span>Meeting with the team</span>
                                  <span class='text-muted d-block text-small mt-0'>Today 13:00</span>
                                </span>
                              </label>
                            </div>
                            <div class='mb-2'>
                              <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' />
                                <span class='form-check-label d-block'>
                                  <span>Business lunch with clients</span>
                                  <span class='text-muted d-block text-small mt-0'>Today 14:00</span>
                                </span>
                              </label>
                            </div>
                            <div class='mb-2'>
                              <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' />
                                <span class='form-check-label d-block'>
                                  <span>Training with the team</span>
                                  <span class='text-muted d-block text-small mt-0'>Today 15:00</span>
                                </span>
                              </label>
                            </div>
                            <div class='mb-2'>
                              <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' />
                                <span class='form-check-label d-block'>
                                  <span>Account meeting</span>
                                  <span class='text-muted d-block text-small mt-0'>Today 17:00</span>
                                </span>
                              </label>
                            </div>
                            <div class='mb-2'>
                              <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' />
                                <span class='form-check-label d-block'>
                                  <span>Gym</span>
                                  <span class='text-muted d-block text-small mt-0'>Today 17:30</span>
                                </span>
                              </label>
                            </div>
                            <div class='mb-2'>
                              <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' />
                                <span class='form-check-label d-block'>
                                  <span>Dinner with the family</span>
                                  <span class='text-muted d-block text-small mt-0'>Today 19:30</span>
                                </span>
                              </label>
                            </div>
                            <div class='mb-2'>
                              <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' />
                                <span class='form-check-label d-block'>
                                  <span>Gym</span>
                                  <span class='text-muted d-block text-small mt-0'>Today 17:30</span>
                                </span>
                              </label>
                            </div>
                            <div class='mb-2'>
                              <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' />
                                <span class='form-check-label d-block'>
                                  <span>Dinner with the family</span>
                                  <span class='text-muted d-block text-small mt-0'>Today 19:30</span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                  <!-- Tasks End -->

                  <!-- Tasks Apart Start -->
                  <div class='col-xl-6 mb-5'>
                    <section class='scroll-section' id='tasksApart'>
                      <h2 class='small-title'>Tasks Apart</h2>
                      <div class='scroll-out'>
                        <div class='scroll-by-count mb-n2' data-count='4'>
                          <div class='card mb-2'>
                            <div class='card-body'>
                              <label class='form-check custom-icon mb-0 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' checked />
                                <span class='form-check-label'>
                                  <span class='content'>
                                    <span class='heading mb-1 lh-1-25'>Create Wireframes</span>
                                    <span class='d-block text-small text-muted'>10:30</span>
                                  </span>
                                </span>
                              </label>
                            </div>
                          </div>
                          <div class='card mb-2'>
                            <div class='card-body'>
                              <label class='form-check custom-icon mb-0 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' checked />
                                <span class='form-check-label'>
                                  <span class='content'>
                                    <span class='heading mb-1 lh-1-25'>Business lunch with clients</span>
                                    <span class='d-block text-small text-muted'>12:30</span>
                                  </span>
                                </span>
                              </label>
                            </div>
                          </div>
                          <div class='card mb-2'>
                            <div class='card-body'>
                              <label class='form-check custom-icon mb-0 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' />
                                <span class='form-check-label'>
                                  <span class='content'>
                                    <span class='heading mb-1 lh-1-25'>Training with the team</span>
                                    <span class='d-block text-small text-muted'>15:30</span>
                                  </span>
                                </span>
                              </label>
                            </div>
                          </div>
                          <div class='card mb-2'>
                            <div class='card-body'>
                              <label class='form-check custom-icon mb-0 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' />
                                <span class='form-check-label'>
                                  <span class='content'>
                                    <span class='heading mb-1 lh-1-25'>Gym</span>
                                    <span class='d-block text-small text-muted'>17:00</span>
                                  </span>
                                </span>
                              </label>
                            </div>
                          </div>
                          <div class='card mb-2'>
                            <div class='card-body'>
                              <label class='form-check custom-icon mb-0 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' />
                                <span class='form-check-label'>
                                  <span class='content'>
                                    <span class='heading mb-1 lh-1-25'>Dinner with the boys</span>
                                    <span class='d-block text-small text-muted'>19:00</span>
                                  </span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>"; ?>

                    <script type="text/javascript">
                        google.charts.load('current', {packages:['wordtree']});
                        google.charts.setOnLoadCallback(drawSimpleNodeChart);
                        function drawSimpleNodeChart() {
                            var nodeListData = new google.visualization.arrayToDataTable([
                            ['id', 'childLabel', 'parent', 'Active', 'Completed'],
                            [0, 'Roger (Admin)', -1, 1, 0],
                            [1, 'Rahul (Manager)', 0, 1, 0],
                            [2, 'Nasim (Co-Ordinator)', 0, 5, 0],
                            [3, 'Bacteria (Manager)', 0, 1, 0],

                            [4, 'Crenarchaeota (Employee)', 1, 1, 0],
                            [5, 'Euryarchaeota (Employee)', 1, 1, 0],
                            [6, 'Korarchaeota (Employee)', 1, 1, 0],
                            [7, 'Nanoarchaeota (Employee)', 1, 1, 0],
                            [8, 'Thaumarchaeota (Employee)', 1, 1, 0],

                            [9, 'Amoebae (Worker)', 2, 1, 0],
                            [10, 'Plants (Worker)', 2, 1, 0],
                            [11, 'Chromalveolata (Worker)', 2, 1, 0],
                            [12, 'Opisthokonta (Worker)', 2, 5, 0],

                            [15, 'Animalia (Worker)', 12, 5, 0],
                            [16, 'Fungi (Worker)', 12, 2, 0],

                            [17, 'Parazoa (Worker)', 15, 2, 0],
                            [18, 'Eumetazoa (Worker)', 15, 5, 0],

                            [19, 'Radiata (Worker)', 18, 2, 0],
                            [20, 'Bilateria (Worker)', 18, 5, 0],

                            [21, 'Orthonectida (Worker)', 20, 2, 0],
                            [22, 'Rhombozoa (Worker)', 20, 2, 0],
                            [23, 'Acoelomorpha (Worker)', 20, 1, 0],
                            [24, 'Deuterostomia (Worker)', 20, 5, 0],
                            [25, 'Chaetognatha (Worker)', 20, 2, 0],
                            [26, 'Protostomia (Worker)', 20, 2, 0],

                            [27, 'Chordata (Worker)', 24, 5, 0],
                            [28, 'Hemichordata (Worker)', 24, 1, 0],
                            [29, 'Echinodermata (Worker)', 24, 1, 0],
                            [30, 'Xenoturbellida (Worker)', 24, 1, 0],
                            [31, 'Vetulicolia (Worker)', 24, 1, 0],

                            [32, 'Actinobacteria (Worker)', 3, 1, 0],
                            [33, 'Firmicutes (Worker)', 3, 1, 0],
                            [34, 'Tenericutes (Worker)', 3, 1, 0],
                            [52, 'Thermotogae (Worker)', 3, 1, 0]]);

                            var options = {
                                backgroundColor: 'none',
                                maxFontSize: 14,
                                wordtree: {
                                    format: 'explicit',
                                    type: 'suffix',
                                    colors: ['red', 'black', 'green'],
                                }
                                
                            };

                            var wordtree = new google.visualization.WordTree(
                            document.getElementById('wordtree_explicit_maxfontsize'));
                            wordtree.draw(nodeListData, options);
                        }
                        </script>
                        <div class='col-xl-12 mb-5'>
                            <section class='scroll-section' id='activityLogs'>                    
                                <div class='card'>
                                    <div class='card-body mb-n2' style='background-color:black;border-radius:10px'>
                                        <h2 class='small-title'>WorkForce Task Distribution Funnel</h2>
                                        <div id="wordtree_explicit_maxfontsize" style="width: 100%; height: 400px;"></div>
                                    </div> 
                                </div>
                            </section>
                        </div>
                        

                  <?php echo"
                </div>
              </div>
            </div>
    </main>";
?>
    <script src='js/plugins/carousels.js'></script>

      