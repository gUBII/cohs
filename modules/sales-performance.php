<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
<?php
    echo"<main>
        <div class='container'>
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <h1 class='mb-0 pb-0 display-4' id='title'> Sales Pipeline/Performance</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=../global/dashboard.php'>Dashboard</a></li>                            
                                <li class='breadcrumb-item'><a href='index.php?url=../global/dashboard.php'>Sales Pipeline</a></li>                            
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
                    <div class='col-2 p-10'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='alarm' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>Total Sales</p>
                                <p class='cta-3 mb-0 text-primary'>2500+</p>
                            </div>
                        </div>
                    </div><div class='col-2 p-10'>  
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='navigate-diagonal' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>New Customers</p>
                                <p class='cta-3 mb-0 text-primary'>15oo+</p>
                            </div>
                        </div>
                    </div><div class='col-2 p-10'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='check-circle' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>New Leads</p>
                                <p class='cta-3 mb-0 text-primary'>50+</p>
                            </div>
                        </div>
                    </div><div class='col-2 p-10'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='check-circle' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>Prospects</p>
                                <p class='cta-3 mb-0 text-primary'>25 (+/-)</p>
                            </div>
                        </div>
                    </div><div class='col-2 p-10'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='check-circle' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>Deals Closed</p>
                                <p class='cta-3 mb-0 text-primary'>5000+</p>
                            </div>
                        </div>
                    </div><div class='col-2 p-10'>
                        <div class='card mb-5 sh-20 hover-border-primary'>
                            <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                    <i data-acorn-icon='check-circle' class='text-white'></i>
                                </div>
                                <p class='mb-0 lh-1'>Deals Ongoing</p>
                                <p class='cta-3 mb-0 text-primary'>500+</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>"; ?>

            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawVisualization);
                function drawVisualization() {
                    var data = google.visualization.arrayToDataTable([
                    ['Month', 'Albert', 'Peter', 'Roger', 'Shahrin', 'Fatema', 'Nazim'],
                    ['2024/01',  20,      12,         18,             30,           4,      26],
                    ['2024/02',  18,      12,         22,             25,           5,      22],
                    ['2024/03',  25,      14,         25,             25,           10,      21],
                    ['2024/04',  30,      16,        20,             24,          12,      20],
                    ['2024/05',  32,      18,        18,             27,           18,      18],
                    ['2024/06',  30,      20,        19,             26,           22,      14],
                    ['2024/07',  25,      25,         30,             30,          27,      12]
                    ]);

                    var options = {
                        title : 'Monthly Sales Performance Statistics for improvement',
                        vAxis: {title: 'Sales Volume'},
                        hAxis: {title: 'Month'},
                        seriesType: 'bars',
                        backgroundColor: 'none',
                        series: {5: {type: 'line'}}
                    };

                    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                }
            </script>
            <div class='col-lg-12 mb-5'>                
                <div class='card sh-40 h-lg-100-card' style="background-color:white">
                    <div class='card-body mb-n2 scroll-out h-100'>
                    <h2 class='small-title'>Performance Chart</h2>
                        <div class='scroll h-100'>
                            <div class='row g-0 mb-2'>
                                <div id="chart_div" style="width:100%;height:500px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        
        <?php echo"<div class='data-table-rows slim'>
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
                <div class='data-table-responsive-wrapper'>
                  <table id='datatableRows' class='data-table nowrap hover'>
                    <thead>
                      <tr>
                        <th class='text-muted text-small text-uppercase'>Date</th>
                        <th class='text-muted text-small text-uppercase'>Client Name</th>
                        <th class='text-muted text-small text-uppercase'>Meeting Attended</th>
                        <th class='text-muted text-small text-uppercase'>Agenda Submitted</th>
                        <th class='text-muted text-small text-uppercase'>Next Meeting Date</th>
                        <th class='text-muted text-small text-uppercase'>Task Scheduling</th>
                        <th class='empty'>&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr><td>13-05-2024</td><td>Jason Hash</td><td>6</td><td>View Agendas</td><td>19-08-2024</td><td><a href=''>Create Task</a></td><td></td></tr>
                      <tr><td>13-05-2024</td><td>Roger Mark</td><td>6</td><td>View Agendas</td><td>19-08-2024</td><td><a href=''>Create Task</a></td><td></td></tr>
                      <tr><td>13-05-2024</td><td>Shahrin Solan</td><td>6</td><td>View Agendas</td><td>19-08-2024</td><td><a href=''>Create Task</a></td><td></td></tr>
                      <tr><td>13-05-2024</td><td>Marry Desoza</td><td>6</td><td>View Agendas</td><td>19-08-2024</td><td><a href=''>Create Task</a></td><td></td></tr>
                      <tr><td>13-05-2024</td><td>Peter Pen</td><td>6</td><td>View Agendas</td><td>19-08-2024</td><td><a href=''>Create Task</a></td><td></td></tr>
                      <tr><td>13-05-2024</td><td>Albert Saddler</td><td>6</td><td>View Agendas</td><td>19-08-2024</td><td><a href=''>Create Task</a></td><td></td></tr>
                      <tr><td>13-05-2024</td><td>Jason Hash</td><td>6</td><td>View Agendas</td><td>19-08-2024</td><td><a href=''>Create Task</a></td><td></td></tr>
                      <tr><td>13-05-2024</td><td>Jason Hash</td><td>6</td><td>View Agendas</td><td>19-08-2024</td><td><a href=''>Create Task</a></td><td></td></tr>
                      <tr><td>13-05-2024</td><td>Jason Hash</td><td>6</td><td>View Agendas</td><td>19-08-2024</td><td><a href=''>Create Task</a></td><td></td></tr>
                      <tr><td>13-05-2024</td><td>Jason Hash</td><td>6</td><td>View Agendas</td><td>19-08-2024</td><td><a href=''>Create Task</a></td><td></td></tr>
                      <tr><td>13-05-2024</td><td>Jason Hash</td><td>6</td><td>View Agendas</td><td>19-08-2024</td><td><a href=''>Create Task</a></td><td></td></tr>
                      <tr><td>13-05-2024</td><td>Jason Hash</td><td>6</td><td>View Agendas</td><td>19-08-2024</td><td><a href=''>Create Task</a></td><td></td></tr>
                      <tr><td>13-05-2024</td><td>Jason Hash</td><td>6</td><td>View Agendas</td><td>19-08-2024</td><td><a href=''>Create Task</a></td><td></td></tr>
                      <tr><td>13-05-2024</td><td>Jason Hash</td><td>6</td><td>View Agendas</td><td>19-08-2024</td><td><a href=''>Create Task</a></td><td></td></tr>
                    </tbody>
                  </table>
                </div>
                <!-- Table End -->
              </div>


            


    </main>";
?>
    <script src='js/plugins/carousels.js'></script>

      