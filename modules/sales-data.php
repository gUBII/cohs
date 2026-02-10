<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <main>
        <div class='container'>
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <h1 class='mb-0 pb-0 display-4' id='title'> Sales KPI Dashboard</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=../global/dashboard.php'>Dashboard</a></li>                            
                                <li class='breadcrumb-item'><a href='index.php?url=../global/dashboard.php'>Sales KPI</a></li>                            
                            </ul>
                        </nav>
                    </div>
                    <div class='col-12 col-sm-6 d-flex align-items-start justify-content-end'>
                        <a href='' style='margin-top:8px'>Need Help?</a>&nbsp;&nbsp;
                        <button type='button' class='btn btn-outline-success btn-icon btn-icon-end w-100 w-sm-auto'>
                            <span>Give Feedback</span><i data-acorn-icon='question'></i>
                        </button>                
                    </div>              
                </div>
            </div>
            
            
            <div class='row'>
                <div class='row gx-2'>
                    <h2 class='small-title'>SALES PIPELINE</h2>                        
                    <div class='col-3 p-10'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='alarm' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>Number of Sales</p><p class='cta-3 mb-0 text-primary'>2500+</p>
                            </div>
                        </div>
                    </div><div class='col-3 p-10'>  
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='navigate-diagonal' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>New Revenue</p><p class='cta-3 mb-0 text-primary'>$360,000.00</p>
                            </div>
                        </div>
                    </div><div class='col-3 p-10'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='check-circle' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>Costs</p><p class='cta-3 mb-0 text-primary'>$290,000.00</p>
                            </div>
                        </div>
                    </div><div class='col-3 p-10'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='check-circle' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>Profit By Sale</p><p class='cta-3 mb-0 text-primary'>$70,000.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Month', 'Sales', 'Expenses'],
                        ['Jan 2024',  11000,      7000],
                        ['Feb 2024',  12170,      9460],
                        ['Mar 2024',  6460,       5120],
                        ['Apr 2024',  15030,      12540],
                        ['May 2024',  17030,      14540],
                        ['Jun 2024',  18000,      13540],
                        ['Jul 2024',  12030,      10540]
                    ]);
                    var options = {
                        curveType: 'function',
                        legend: { position: 'bottom' }
                    };
                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                    chart.draw(data, options);
                }

                google.charts.load("current", {packages:["corechart"]});
                google.charts.setOnLoadCallback(drawChart2);
                function drawChart2() {
                    var data2 = google.visualization.arrayToDataTable([
                        ['Task', 'Revenue'],
                        ['Sales $54,000', 60],
                        ['Marketing $42,000', 40]
                    ]);
                    var options2 = {                    
                        pieHole: 0.4,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                    chart.draw(data2, options2);
                }
    
                google.charts.load('current', {'packages':['bar']});
                google.charts.setOnLoadCallback(drawChart3);
                function drawChart3() {
                    var data3 = google.visualization.arrayToDataTable([
                        ['Year', 'Sales', 'Expenses', 'Profit'],
                        ['2020', 1000, 400, 200],
                        ['2021', 1170, 460, 250],
                        ['2022', 660, 1120, 300],
                        ['2023', 1030, 540, 350],
                        ['2024', 530, 240, 100]
                    ]);
                    var options3 = {
                        chart: {
                            title: 'Yearly Performance',
                            subtitle: 'Sales, Expenses, and Profit: 2020-2024',
                        },
                        bars: 'horizontal' // Required for Material Bar Charts.
                    };
                    var chart = new google.charts.Bar(document.getElementById('barchart_material'));
                    chart.draw(data3, google.charts.Bar.convertOptions(options3));
                }
            </script>
    
            <div class='row'>
                <div class='col-lg-4 mb-5'>                
                    <div class='card' style="background-color:white;padding:0px">
                        <div class='card-body' style="padding:10px"><center>
                            <h2 class='small-title'>Sales Revenue</h2>
                            <div id="curve_chart" style="width: 100%;height: 300px"></div>
                        </center></div>                            
                    </div>
                </div>
                
                <div class='col-lg-4 mb-5'>                
                    <div class='card' style="background-color:white;padding:0px">
                        <div class='card-body' style="padding:10px"><center>
                            <h2 class='small-title'>Cost Breakdown</h2>
                            <div id="donutchart" style="width: 100%; height:300px;padding:0px"></div>
                        </center></div>                        
                    </div>
                </div>

                <div class='col-lg-4 mb-5'>                
                    <div class='card' style="background-color:white;padding:0px">
                        <div class='card-body' style="padding:10px"><center>
                            <h2 class='small-title'>Incremental Sales</h2>
                            <div id="barchart_material" style="width: 100%; height: 300px;"></div>
                        </center></div>                        
                    </div>
                </div>
            </div>

            <div class='data-table-rows slim'>
                <!-- Controls Start -->
                <div class='row'>
                  <!-- Search Start -->
                  <div class='col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1'>
                    <div class='d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground'>
                      <input class='form-control datatable-search' placeholder='Search' data-datatable='#datatableRows' />
                      <span class='search-magnifier-icon'>
                        <i data-acorn-icon='search'></i>
                      </span>
                      <span class='search-delete-icon d-none'>
                        <i data-acorn-icon='close'></i>
                      </span>
                    </div>
                  </div>
                  <!-- Search End -->

                  <div class='col-sm-12 col-md-7 col-lg-9 col-xxl-10 text-end mb-1'>
                    <div class='d-inline-block me-0 me-sm-3 float-start float-md-none'>
                      <!-- Add Button Start -->
                      <button
                        class='btn btn-icon btn-icon-only btn-foreground-alternate shadow add-datatable'
                        data-bs-toggle='tooltip'
                        data-bs-placement='top'
                        title='Add'
                        type='button'
                        data-bs-delay='0'
                      >
                        <i data-acorn-icon='plus'></i>
                      </button>
                      <!-- Add Button End -->

                      <!-- Edit Button Start -->
                      <button
                        class='btn btn-icon btn-icon-only btn-foreground-alternate shadow edit-datatable disabled'
                        data-bs-toggle='tooltip'
                        data-bs-placement='top'
                        title='Edit'
                        type='button'
                        data-bs-delay='0'
                      >
                        <i data-acorn-icon='edit'></i>
                      </button>
                      <!-- Edit Button End -->

                      <!-- Delete Button Start -->
                      <button
                        class='btn btn-icon btn-icon-only btn-foreground-alternate shadow disabled delete-datatable'
                        data-bs-toggle='tooltip'
                        data-bs-placement='top'
                        title='Delete'
                        type='button'
                        data-bs-delay='0'
                      >
                        <i data-acorn-icon='bin'></i>
                      </button>
                      <!-- Delete Button End -->
                    </div>
                    <div class='d-inline-block'>
                      <!-- Print Button Start -->
                      <button
                        class='btn btn-icon btn-icon-only btn-foreground-alternate shadow datatable-print'
                        data-datatable='#datatableRows'
                        data-bs-toggle='tooltip'
                        data-bs-placement='top'
                        data-bs-delay='0'
                        title='Print'
                        type='button'
                      >
                        <i data-acorn-icon='print'></i>
                      </button>
                      <!-- Print Button End -->

                      <!-- Export Dropdown Start -->
                      <div class='d-inline-block datatable-export' data-datatable='#datatableRows'>
                        <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'>
                          <span
                            class='btn btn-icon btn-icon-only btn-foreground-alternate shadow dropdown'
                            data-bs-delay='0'
                            data-bs-placement='top'
                            data-bs-toggle='tooltip'
                            title='Export'
                          >
                            <i data-acorn-icon='download'></i>
                          </span>
                        </button>
                        <div class='dropdown-menu shadow dropdown-menu-end'>
                          <button class='dropdown-item export-copy' type='button'>Copy</button>
                          <button class='dropdown-item export-excel' type='button'>Excel</button>
                          <button class='dropdown-item export-cvs' type='button'>Cvs</button>
                        </div>
                      </div>
                      <!-- Export Dropdown End -->

                      <!-- Length Start -->
                      <div class='dropdown-as-select d-inline-block datatable-length' data-datatable='#datatableRows' data-childSelector='span'>
                        <button class='btn p-0 shadow' type='button' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false' data-bs-offset='0,3'>
                          <span
                            class='btn btn-foreground-alternate dropdown-toggle'
                            data-bs-toggle='tooltip'
                            data-bs-placement='top'
                            data-bs-delay='0'
                            title='Item Count'
                          >
                            10 Items
                          </span>
                        </button>
                        <div class='dropdown-menu shadow dropdown-menu-end'>
                          <a class='dropdown-item' href='#'>5 Items</a>
                          <a class='dropdown-item active' href='#'>10 Items</a>
                          <a class='dropdown-item' href='#'>20 Items</a>
                        </div>
                      </div>
                      <!-- Length End -->
                    </div>
                  </div>
                </div>
                <!-- Controls End -->

                <!-- Table Start -->
                <div class='data-table-responsive-wrapper' style='width:100%'>
                  <table id='datatableRows' class='data-table nowrap hover' style='width:100%'>
                    <thead>
                      <tr>                        
                        <th class='text-muted text-small text-uppercase'>Sales Officer</th>
                        <th class='text-muted text-small text-uppercase'>Total Earning</th>
                        <th class='text-muted text-small text-uppercase'>Target Volume</th>
                        <th class='text-muted text-small text-uppercase'>Activity Score</th>
                        <th class='text-muted text-small text-uppercase'>Profit</th>
                        <th class='text-muted text-small text-uppercase'>No. of Sales</th>
                        <th class='empty'>&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr><td><b>Roger H.</b><br>Senior SR</td><td>$53,000</td><td>$65,000</td><td>8/10</td><td>$5,000</td><td>30</td><td><a href=''>View Detail</a></a></td></tr>
                      <tr><td><b>Roger H.</b><br>Senior SR</td><td>$53,000</td><td>$65,000</td><td>8/10</td><td>$5,000</td><td>30</td><td><a href=''>View Detail</a></td></tr>
                      <tr><td><b>Roger H.</b><br>Senior SR</td><td>$53,000</td><td>$65,000</td><td>8/10</td><td>$5,000</td><td>30</td><td><a href=''>View Detail</a></td></tr>
                      <tr><td><b>Roger H.</b><br>Senior SR</td><td>$53,000</td><td>$65,000</td><td>8/10</td><td>$5,000</td><td>30</td><td><a href=''>View Detail</a></td></tr>
                      <tr><td><b>Roger H.</b><br>Senior SR</td><td>$53,000</td><td>$65,000</td><td>8/10</td><td>$5,000</td><td>30</td><td><a href=''>View Detail</a></td></tr>
                      <tr><td><b>Roger H.</b><br>Senior SR</td><td>$53,000</td><td>$65,000</td><td>8/10</td><td>$5,000</td><td>30</td><td><a href=''>View Detail</a></td></tr>
                      <tr><td><b>Roger H.</b><br>Senior SR</td><td>$53,000</td><td>$65,000</td><td>8/10</td><td>$5,000</td><td>30</td><td><a href=''>View Detail</a></td></tr>
                      <tr><td><b>Roger H.</b><br>Senior SR</td><td>$53,000</td><td>$65,000</td><td>8/10</td><td>$5,000</td><td>30</td><td><a href=''>View Detail</a></td></tr>
                      <tr><td><b>Roger H.</b><br>Senior SR</td><td>$53,000</td><td>$65,000</td><td>8/10</td><td>$5,000</td><td>30</td><td><a href=''>View Detail</a></td></tr>
                      <tr><td><b>Roger H.</b><br>Senior SR</td><td>$53,000</td><td>$65,000</td><td>8/10</td><td>$5,000</td><td>30</td><td><a href=''>View Detail</a></td></tr>
                      <tr><td><b>Roger H.</b><br>Senior SR</td><td>$53,000</td><td>$65,000</td><td>8/10</td><td>$5,000</td><td>30</td><td><a href=''>View Detail</a></td></tr>
                      
                    </tbody>
                  </table>
                </div>
                <!-- Table End -->
              </div>
        

            


    </main>
    
    <script src='js/plugins/carousels.js'></script>

      