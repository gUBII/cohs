<!DOCTYPE html>
<html lang='en' data-footer='true' data-scrollspy='true'>
    <head>
        <meta charset='UTF-8' />
        <link rel='preconnect' href='https://fonts.gstatic.com' />
        <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
        <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
        <link rel='stylesheet' href='font/CS-Interface/style.css' />
        <link rel='stylesheet' href='css/vendor/bootstrap.min.css' />
        <link rel='stylesheet' href='css/vendor/OverlayScrollbars.min.css' />
        <link rel='stylesheet' href='css/styles.css' />
        <link rel='stylesheet' href='css/main.css' />
        <script src='js/base/loader.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/chart.js'></script>
        <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
        
        <style>
            .sidebar {
                height: 100vh;
                padding: 20px;
            }
            .sidebar a {
                text-decoration: none;
                display: block;
                margin-bottom: 10px;
            }
            .sidebar a:hover {
                
            }
            .content {
                padding: 20px;
            }
            .data-box {
                margin-bottom: 20px;
                padding: 15px;
                border: 1px solid #ddd;
                border-radius: 5px;
                
            }
            .close-btn {
                float: right;
                cursor: pointer;
                font-size: 20px;
                font-weight: bold;
            }
            .bar-chart {
                display: flex;
                justify-content: space-around;
                align-items: flex-end;
                height: 200px;
                margin-top: 20px;
            }
            .bar {
                width: 40px;
                
                margin: 0 5px;
                text-align: center;
                
                font-size: 12px;
            }
            .funnel-chart {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-top: 20px;
            }
            .funnel-stage {
                width: 80%;
                
                
                text-align: center;
                padding: 10px;
                margin: 5px 0;
            }
            .pie-chart {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 20px;
            }
            .pie {
                width: 150px;
                height: 150px;
                border-radius: 50%;
                background: conic-gradient(
                    #007bff 0% 40%,
                    #28a745 40% 70%,
                    #dc3545 70% 100%
                );
                display: flex;
                justify-content: center;
                align-items: center;
                color: white;
                font-size: 16px;
            }
            .area-chart {
                width: 100%;
                height: 200px;
                background: linear-gradient(to top, #007bff, rgba(0, 123, 255, 0.2));
                position: relative;
                margin-top: 20px;
            }
            .area-chart::before {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(to top, #28a745, rgba(40, 167, 69, 0.2));
                clip-path: polygon(0% 100%, 100% 100%, 100% 50%, 75% 30%, 50% 50%, 25% 70%, 0% 50%);
            }
            .donut-chart {
                display: flex;
                justify-content: center;
                align-items: center;
                margin-top: 20px;
            }
            .donut {
                width: 150px;
                height: 150px;
                border-radius: 50%;
                background: conic-gradient(
                    #007bff 0% 40%,
                    #28a745 40% 70%,
                    #dc3545 70% 100%
                );
                display: flex;
                justify-content: center;
                align-items: center;
                color: white;
                font-size: 16px;
                position: relative;
            }
            .donut::before {
                content: '';
                position: absolute;
                width: 100px;
                height: 100px;
                border-radius: 50%;
                background: white;
            }
            
        </style>
        
    </head>

<?php
    
    error_reporting(0);
    $cdate=time();
    $cdate=date("d-m-Y", $cdate);
    
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    else $cid=$userid;
    
    date_default_timezone_set("Australia/Sydney");
	
    $week_number = date("W", strtotime('now'));
        
    $shift_today3=time();
    $shift_today3=date("Y-m-d", $shift_today3);
    
    $timetable=time();
    $time1=date("H", $timetable);
    
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    else $cid=$userid;
    
    date_default_timezone_set("Australia/Sydney");
	
    $week_number = date("W", strtotime('now'));
        
    $shift_today3=time();
    $shift_today3=date("Y-m-d", $shift_today3);
    
    $timetable=time();
    $time1=date("H", $timetable);
    
    $totalreceived=0.00;
    $rv1 = "select * from receipt_voucher where status='ON' order by id asc";
    $rv2 = $conn->query($rv1);
    if ($rv2->num_rows > 0) { while($rv3 = $rv2->fetch_assoc()) { $totalreceived=($totalreceived+$rv3["cr_amt"]); } }
    $totalreceived= number_format($totalreceived,2,".",",");
    
    $todayreceived=0.00;
    $rv4 = "select * from receipt_voucher where status='ON' and receipt_date>='$timestamp' order by id asc";
    $rv5 = $conn->query($rv4);
    if ($rv5->num_rows > 0) { while($rv6 = $rv5->fetch_assoc()) { $todayreceived=($todayreceived+$rv6["cr_amt"]); } }
    $todayreceived= number_format($todayreceived,2,".",",");


    $totalpaid=0.00;
    $pv1 = "select * from payment_voucher where status='ON' order by id asc";
    $pv2 = $conn->query($pv1);
    if ($pv2->num_rows > 0) { while($pv3 = $pv2->fetch_assoc()) { $totalpaid=($totalpaid+$pv3["dr_amt"]); } }
    $totalpaid= number_format($totalpaid,2,".",",");

    $todaypaid=0.00;
    $pv4 = "select * from payment_voucher where status='ON' and payment_date>='$timestamp' order by id asc";
    $pv5 = $conn->query($pv4);
    if ($pv5->num_rows > 0) { while($pv6 = $pv5->fetch_assoc()) { $todaypaid=($todaypaid+$pv6["dr_amt"]); } }
    $todaypaid= number_format($todaypaid,2,".",",");

    echo"<div class='container'>
        
        <div class='offcanvas offcanvas-end' tabindex='-1' id='offcanvasRightx' aria-labelledby='offcanvasRightLabel' style='z-index:9999'>                            
            <div class='offcanvas-header'>
                <h5 id='offcanvasRightLabel'>Custom Widgets</h5>
                <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
            </div>
            <div class='offcanvas-body'>
                <section class='scroll-section' id='existingHtml'>                                    
                    <div id='existingHtmlList'>                                        
                        <div class='list'>
                            
                            <div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:47px'>
                                <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'><table style='width:100%'><tr>
                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td><td style='font-size:8pt'>
                                        <a href='#' id='showEmployee'><div class='name' style='font-size:10pt'>Show Employee</div></a>
                                    </td>
                                </tr></table></div>
                            </div>
                            <div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:47px'>
                                <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'><table style='width:100%'><tr>
                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td><td style='font-size:8pt'>
                                        <a href='#' id='showEvents'><div class='name' style='font-size:10pt'>Show Events</div></a>
                                    </td>
                                </tr></table></div>
                            </div>
                            <div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:47px'>
                                <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'><table style='width:100%'><tr>
                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td><td style='font-size:8pt'>
                                        <a href='#' id='showTaskManager'><div class='name' style='font-size:10pt'>Task Manager</div></a>
                                    </td>
                                </tr></table></div>
                            </div>
                            <div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:47px'>
                                <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'><table style='width:100%'><tr>
                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td><td style='font-size:8pt'>
                                        <a href='#' id='showInvoices'><div class='name' style='font-size:10pt'>Show All Invoice</div></a>
                                    </td>
                                </tr></table></div>
                            </div>
                            <div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:47px'>
                                <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'><table style='width:100%'><tr>
                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td><td style='font-size:8pt'>
                                        <a href='#' id='showSalesChart'><div class='name' style='font-size:10pt'>Sales in Bar Chart</div></a>
                                    </td>
                                </tr></table></div>
                            </div>
                            <div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:47px'>
                                <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'><table style='width:100%'><tr>
                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td><td style='font-size:8pt'>
                                        <a href='#' id='showStockChart'><div class='name' style='font-size:10pt'>Stock in Bar Chart</div></a>
                                    </td>
                                </tr></table></div>
                            </div>
                            <div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:47px'>
                                <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'><table style='width:100%'><tr>
                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td><td style='font-size:8pt'>
                                        <a href='#' id='showSalesFunnel'><div class='name' style='font-size:10pt'>Sales Funnel Chart</div></a>
                                    </td>
                                </tr></table></div>
                            </div>
                            <div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:47px'>
                                <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'><table style='width:100%'><tr>
                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td><td style='font-size:8pt'>
                                        <a href='#' id='showIncomeExpense'><div class='name' style='font-size:10pt'>Income Expense Pie Chart</div></a>
                                    </td>
                                </tr></table></div>
                            </div>
                            <div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:47px'>
                                <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'><table style='width:100%'><tr>
                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td><td style='font-size:8pt'>
                                        <a href='#' id='showSalesArea'><div class='name' style='font-size:10pt'>Sales Area Chart</div></a>
                                    </td>
                                </tr></table></div>
                            </div>
                            <div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:47px'>
                                <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'><table style='width:100%'><tr>
                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td><td style='font-size:8pt'>
                                        <a href='#' id='showSalesDonut'><div class='name' style='font-size:10pt'>Sales Item Donut Chart</div></a>
                                    </td>
                                </tr></table></div>
                            </div>
                            <div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:47px'>
                                <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'><table style='width:100%'><tr>
                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td><td style='font-size:8pt'>
                                        <a href='#' id='showCustomerForm'><div class='name' style='font-size:10pt'>New Client Form</div></a>
                                    </td>
                                </tr></table></div>
                            </div>
                            
                            <div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:47px'>
                                <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'><table style='width:100%'><tr>
                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td><td style='font-size:8pt'>
                                        <a href='#' id='showEmployeeForm'><div class='name' style='font-size:10pt'>New Employee Form</div></a>
                                    </td>
                                </tr></table></div>
                            </div>
                            
                        </div>
                    </div>
                </section>
            </div>                            
        </div>
        <div>
            <div class='hide-area page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'><h1 class='mb-0 pb-0 display-4' id='title'>Select Dashboard</h1><p>Global Dashboard</p></div>
                    <div class='col-12 col-sm-6 d-flex align-items-start justify-content-end'>
                        <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRightx' aria-controls='offcanvasRightx' style='margin-right:10px'>
                            <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Custom Dashboard</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-12'>
                        <span style='font-size:12pt'>$welcomenote & Welcome to Nexis 365, $username $username2</span><br>
                        <span style='font0-size:15pt'>Quickly access your Dashboards, Projects, Tasks, Leads, Inbox and workspaces, and many other modules from one platform.</span>
                    </div>
                </div>
            </div>";
            
            
            ?><div class="row">
                
                
                <div class="col-md-12 content">
                <h2>Dashboard</h2>
                <div class="row" id="dataContainer">
                    <div class="col-md-4" id="employeeColumn"></div>
                    <div class="col-md-4" id="eventColumn"></div>
                    <div class="col-md-4" id="taskManagerColumn"></div>
                    <div class="col-md-4" id="invoiceColumn"></div>
                    <div class="col-md-4" id="stockChartColumn"></div>
                    <div class="col-md-4" id="salesFunnelColumn"></div>
                    <div class="col-md-4" id="incomeExpenseColumn"></div>
                    <div class="col-md-4" id="salesAreaColumn"></div>
                    <div class="col-md-4" id="salesDonutColumn"></div>
                    <div class="col-md-4" id="customerFormColumn"></div>
                    <div class="col-md-4" id="employeeFormColumn"></div>
                    <div class="col-md-4" id="calendarColumn"></div>
                </div>


            


                <!-- Hidden Employee Data -->
                <div id="employeeData" style="display: none;">
                    <div class="data-box">
                        <span class="close-btn" onclick="this.parentElement.remove()">&times;</span>
                        <h4>Employee Data</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Developer</td>
                                </tr>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>Designer</td>
                                </tr>
                                <tr>
                                    <td>Mike Johnson</td>
                                    <td>Manager</td>
                                </tr>
                                <tr>
                                    <td>Sarah Lee</td>
                                    <td>Analyst</td>
                                </tr>
                                <tr>
                                    <td>Chris Brown</td>
                                    <td>Tester</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Hidden Event Data -->
                <div id="eventData" style="display: none;">
                    <div class="data-box">
                        <span class="close-btn" onclick="this.parentElement.remove()">&times;</span>
                        <h4>Event Data</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Meeting</td>
                                    <td>2023-10-01</td>
                                </tr>
                                <tr>
                                    <td>Conference</td>
                                    <td>2023-10-05</td>
                                </tr>
                                <tr>
                                    <td>Workshop</td>
                                    <td>2023-10-10</td>
                                </tr>
                                <tr>
                                    <td>Seminar</td>
                                    <td>2023-10-15</td>
                                </tr>
                                <tr>
                                    <td>Training</td>
                                    <td>2023-10-20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Hidden Task Manager Data -->
                <div id="taskManagerData" style="display: none;">
                    <div class="data-box">
                        <span class="close-btn" onclick="this.parentElement.remove()">&times;</span>
                        <h4>Task Manager</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Task</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Design Homepage</td>
                                    <td>In Progress</td>
                                </tr>
                                <tr>
                                    <td>Fix Login Bug</td>
                                    <td>Completed</td>
                                </tr>
                                <tr>
                                    <td>Write Documentation</td>
                                    <td>Pending</td>
                                </tr>
                                <tr>
                                    <td>Test Payment Module</td>
                                    <td>In Progress</td>
                                </tr>
                                <tr>
                                    <td>Deploy to Server</td>
                                    <td>Pending</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Hidden Invoice Data -->
                <div id="invoiceData" style="display: none;">
                    <div class="data-box">
                        <span class="close-btn" onclick="this.parentElement.remove()">&times;</span>
                        <h4>All Invoices</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Invoice ID</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>INV001</td>
                                    <td>$500</td>
                                </tr>
                                <tr>
                                    <td>INV002</td>
                                    <td>$750</td>
                                </tr>
                                <tr>
                                    <td>INV003</td>
                                    <td>$1200</td>
                                </tr>
                                <tr>
                                    <td>INV004</td>
                                    <td>$300</td>
                                </tr>
                                <tr>
                                    <td>INV005</td>
                                    <td>$900</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Hidden Sales Area Chart Data -->
                <div id="salesAreaData" style="display: none;">
                    <div class="data-box">
                        <span class="close-btn" onclick="this.parentElement.remove()">&times;</span>
                        <h4>Sales Area Chart</h4>
                        <canvas id="salesAreaChart" width="400" height="200"></canvas>
                    </div>
                </div>

                <!-- Hidden Stock Chart Data -->
               
                <div id="stockChartData" style="display: none;">
                    <div class="data-box">
                        <span class="close-btn" onclick="this.parentElement.remove()">&times;</span>
                        <h4>Stock in Bar Chart</h4>
                        <canvas id="stockBarChart" width="400" height="200"></canvas>
                    </div>
                </div>

                <!-- Hidden Sales Funnel Chart Data -->
              
                <!-- Hidden Sales Funnel Chart Data -->
                <div id="salesFunnelData" style="display: none;">
                    <div class="data-box">
                        <span class="close-btn" onclick="this.parentElement.remove()">&times;</span>
                        <h4>Sales Funnel Chart</h4>
                        <canvas id="salesFunnelChart" width="400" height="200"></canvas>
                    </div>
                </div>
                

                <!-- Hidden Income Expense Pie Chart Data -->
             <div id="incomeExpenseData" style="display: none;">
    <div class="data-box">
        <span class="close-btn" onclick="this.parentElement.remove()">&times;</span>
        <h4>Income Expense Pie Chart</h4>
        <canvas id="incomeExpenseChart" width="400" height="400"></canvas>
    </div>
</div>

                <!-- Hidden Sales Area Chart Data -->
                <div id="salesAreaData" style="display: none;">
                    <div class="data-box">
                        <span class="close-btn" onclick="this.parentElement.remove()">&times;</span>
                        <h4>Sales Area Chart</h4>
                        <div class="area-chart"></div>
                    </div>
                </div>

               <!-- Hidden Sales Donut Chart Data -->
                <div id="salesDonutData" style="display: none;">
                    <div class="data-box">
                        <span class="close-btn" onclick="this.parentElement.remove()">&times;</span>
                        <h4>Sales Item Donut Chart</h4>
                        <canvas id="salesDonutChart" width="400" height="400"></canvas>
                    </div>
                </div>
                
                <!-- New Customer Form Hidden Data -->
    <div id="customerFormData" style="display: none;">
        <div class="data-box">
            <span class="close-btn" onclick="this.parentElement.remove()">&times;</span>
            <h4>New Client Form</h4>
            <form>
                <div class="form-group">
                    <label for="customerName">Name:</label>
                    <input type="text" class="form-control" id="customerName" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="customerEmail">Email:</label>
                    <input type="email" class="form-control" id="customerEmail" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="customerPhone">Phone:</label>
                    <input type="text" class="form-control" id="customerPhone" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <label for="customerAddress">Address:</label>
                    <input type="text" class="form-control" id="customerAddress" placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label for="customerNotes">Notes:</label>
                    <textarea class="form-control" id="customerNotes" placeholder="Enter Notes"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    
    <div id="employeeFormData" style="display: none;">
        <div class="data-box">
            <span class="close-btn" onclick="this.parentElement.remove()">&times;</span>
            <h4>New Client Form</h4>
            <form>
                <div class="form-group">
                    <label for="customerName">Name:</label>
                    <input type="text" class="form-control" id="customerName" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="customerEmail">Email:</label>
                    <input type="email" class="form-control" id="customerEmail" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="customerPhone">Phone:</label>
                    <input type="text" class="form-control" id="customerPhone" placeholder="Enter Phone">
                </div>
                <div class="form-group">
                    <label for="customerAddress">Address:</label>
                    <input type="text" class="form-control" id="customerAddress" placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label for="customerNotes">Notes:</label>
                    <textarea class="form-control" id="customerNotes" placeholder="Enter Notes"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    
</div>

                
                
                
            
            </div><?php
            if($designationy==13){
                echo"<div class='row'>
                    <div class='mb-5'>
                        
                        <div class='row g-2'>";
                        
                            $t=0;
                            $m2x = "select * from solutions where dashboard='1' and status='1' and id<>'10006' order by orders asc";
                            $m22x = $conn->query($m2x);
                            if ($m22x->num_rows > 0) { while($m222x = $m22x->fetch_assoc()) { $t=($t+1); } }
                            
                            if($t>=2){
                                $t=0;
                                $m1 = "select * from solutions where dashboard='1' and status='1' order by orders asc";
                                $m11 = $conn->query($m1);
                                if ($m11->num_rows > 0) { while($m111 = $m11->fetch_assoc()) {
                                    $m1x = "select * from modules where parent='".$m111["id"]."' and status='1' and orders='1' order by orders asc limit 1";
                                    $m11x = $conn->query($m1x);
                                    if ($m11x->num_rows > 0) { while($m111x = $m11x->fetch_assoc()) {
                                        $dashboardname=0;
                                        $dashboardname=strtolower($m111x["name"]);
                                        $dashboardname=str_replace(" ","_",$dashboardname); 
                                        $dashboardid=$m111x["id"];
                                        $dashboardnamex=$m111x["name"];
                                    } }
                                    $t=($t+1);
                                    echo"<div class='col-6 col-sm-6 col-lg-4' data-title='".$m111["name"]."' data-intro='$dashboardnamex -  View All in this Dashboard.' data-step='$t'>
                                        <a href='$mainurl/index.php?url=$dashboardname.php&id=$dashboardid' data-href='$mainurl/index.php?url=$dashboardname.php&id=$dashboardid'>
                                            <div class='card hover-border-primary' style='height:100px'>
                                                <div class='card-body'><center><span>$dashboardnamex</span></center></div>
                                            </div>
                                        </a>
                                    </div>";
                                } }
                            }else{
                                $m1 = "select * from solutions where dashboard='1' and status='1' and id<>'10006' order by orders asc limit 1";
                                $m11 = $conn->query($m1);
                                if ($m11->num_rows > 0) { while($m111 = $m11->fetch_assoc()) {
                                    $m1x = "select * from modules where parent='".$m111["id"]."' and status='1' and orders='1' order by orders asc limit 1";
                                    $m11x = $conn->query($m1x);
                                    if ($m11x->num_rows > 0) { while($m111x = $m11x->fetch_assoc()) {
                                        $dashboardname=0;
                                        $dashboardname=strtolower($m111x["name"]);
                                        $dashboardname=str_replace(" ","_",$dashboardname); 
                                        $dashboardid=$m111x["id"];
                                        $dashboardnamex=$m111x["name"];
                                    } }
                                    echo"<form method='get' action='index.php' name='main' target='_top'>
                                        <input type=hidden name='url' value='$dashboardname.php'><input type=hidden name='id' value='$dashboardid'>
                                    </form>";
                                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                                    
                                } }
                            }
                            
                        echo"</div>
                    </div>
                    
                </div>";
            }
            
        echo"</div>
    </main>";
?>
    <script src='js/plugins/carousels.js'></script>
    
    
    <script>
        // Event listener for "Show Employee"
        document.getElementById('showEmployee').addEventListener('click', function() {
            const employeeData = document.getElementById('employeeData').innerHTML;
            document.getElementById('employeeColumn').innerHTML = employeeData;
        });

        // Event listener for "Show Events"
        document.getElementById('showEvents').addEventListener('click', function() {
            const eventData = document.getElementById('eventData').innerHTML;
            document.getElementById('eventColumn').innerHTML = eventData;
        });

        // Event listener for "Task Manager"
        document.getElementById('showTaskManager').addEventListener('click', function() {
            const taskManagerData = document.getElementById('taskManagerData').innerHTML;
            document.getElementById('taskManagerColumn').innerHTML = taskManagerData;
        });

        // Event listener for "Show All Invoice"
        document.getElementById('showInvoices').addEventListener('click', function() {
            const invoiceData = document.getElementById('invoiceData').innerHTML;
            document.getElementById('invoiceColumn').innerHTML = invoiceData;
        });

      
        // Event listener for "Stock in Bar Chart"
document.getElementById('showStockChart').addEventListener('click', function() {
    const stockChartData = document.getElementById('stockChartData').innerHTML;
    document.getElementById('stockChartColumn').innerHTML = stockChartData;

    // Initialize Chart.js Bar Chart
    const ctx = document.getElementById('stockBarChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar', // Use bar chart
        data: {
            labels: ['Product A', 'Product B', 'Product C', 'Product D', 'Product E'], // X-axis labels
            datasets: [{
                label: 'Stock Quantity',
                data: [80, 120, 90, 60, 150], // Y-axis data
                backgroundColor: [
                    '#007bff', // Product A color
                    '#28a745', // Product B color
                    '#ffc107', // Product C color
                    '#dc3545', // Product D color
                    '#17a2b8'  // Product E color
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false // Hide legend
                },
                tooltip: {
                    enabled: true
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false // Hide X-axis grid lines
                    }
                },
                y: {
                    beginAtZero: true // Start Y-axis from 0
                }
            }
        }
    });
});

        // Event listener for "Sales Funnel Chart"
        document.getElementById('showSalesFunnel').addEventListener('click', function() {
            const salesFunnelData = document.getElementById('salesFunnelData').innerHTML;
            document.getElementById('salesFunnelColumn').innerHTML = salesFunnelData;
        });

      // Event listener for "Income Expense Pie Chart"
document.getElementById('showIncomeExpense').addEventListener('click', function() {
    const incomeExpenseData = document.getElementById('incomeExpenseData').innerHTML;
    document.getElementById('incomeExpenseColumn').innerHTML = incomeExpenseData;

    // Initialize Chart.js Pie Chart
    const ctx = document.getElementById('incomeExpenseChart').getContext('2d');
    new Chart(ctx, {
        type: 'pie', // Use pie chart
        data: {
            labels: ['Income', 'Expense', 'Savings'],
            datasets: [{
                label: 'Amount',
                data: [40, 30, 30], // Values for Income, Expense, and Savings
                backgroundColor: [
                    '#007bff', // Income color
                    '#dc3545', // Expense color
                    '#28a745'  // Savings color
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top', // Legend position
                },
                tooltip: {
                    enabled: true
                }
            }
        }
    });
});

        // Event listener for "Sales Area Chart"
document.getElementById('showSalesArea').addEventListener('click', function() {
    const salesAreaData = document.getElementById('salesAreaData').innerHTML;
    document.getElementById('salesAreaColumn').innerHTML = salesAreaData;

    // Initialize Chart.js Area Chart
    const ctx = document.getElementById('salesAreaChart').getContext('2d');
    new Chart(ctx, {
        type: 'line', // Use line chart for area chart
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'], // X-axis labels
            datasets: [{
                label: 'Sales',
                data: [65, 59, 80, 81, 56, 55, 40], // Y-axis data
                backgroundColor: 'rgba(0, 123, 255, 0.2)', // Area fill color
                borderColor: '#007bff', // Line color
                borderWidth: 2,
                fill: true // Enable area fill
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false // Hide legend
                },
                tooltip: {
                    enabled: true
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false // Hide X-axis grid lines
                    }
                },
                y: {
                    beginAtZero: true // Start Y-axis from 0
                }
            }
        }
    });
});
      
        // Event listener for "Sales Item Donut Chart"
document.getElementById('showSalesDonut').addEventListener('click', function() {
    const salesDonutData = document.getElementById('salesDonutData').innerHTML;
    document.getElementById('salesDonutColumn').innerHTML = salesDonutData;

    // Initialize Chart.js Donut Chart
    const ctx = document.getElementById('salesDonutChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut', // Use doughnut chart
        data: {
            labels: ['Item A', 'Item B', 'Item C'], // Labels for each segment
            datasets: [{
                label: 'Sales',
                data: [40, 30, 30], // Values for each segment
                backgroundColor: [
                    '#007bff', // Item A color
                    '#28a745', // Item B color
                    '#dc3545'  // Item C color
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top', // Legend position
                },
                tooltip: {
                    enabled: true
                }
            },
            cutout: '70%' // Create a donut chart by cutting out the center
        }
    });
});
          // Event listener for "New Customer Form"
    document.getElementById('showCustomerForm').addEventListener('click', function() {
        const customerFormData = document.getElementById('customerFormData').innerHTML;
        document.getElementById('customerFormColumn').innerHTML = customerFormData;
    });
    
    // Event listener for "New Customer Form"
    document.getElementById('showEmployeeForm').addEventListener('click', function() {
        const employeeFormData = document.getElementById('employeeFormData').innerHTML;
        document.getElementById('employeeFormColumn').innerHTML = employeeFormData;
    });
    
    
    </script>
    <script>
        // Event listener for "Sales Funnel Chart"
document.getElementById('showSalesFunnel').addEventListener('click', function() {
    const salesFunnelData = document.getElementById('salesFunnelData').innerHTML;
    document.getElementById('salesFunnelColumn').innerHTML = salesFunnelData;

    // Initialize Chart.js Sales Funnel Chart
    const ctx = document.getElementById('salesFunnelChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar', // Use bar chart for funnel visualization
        data: {
            labels: ['Lead', 'Opportunity', 'Proposal', 'Negotiation', 'Closed Won'],
            datasets: [{
                label: 'Sales Funnel',
                data: [1000, 600, 300, 150, 75],
                backgroundColor: [
                    '#007bff',
                    '#28a745',
                    '#ffc107',
                    '#dc3545',
                    '#17a2b8'
                ],
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y', // Horizontal bar chart
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    enabled: true
                }
            },
            scales: {
                x: {
                    beginAtZero: true
                }
            }
        }
    });
});
    </script>
    <script>
        // Sample Tasks
const tasks = [
    { date: "2025-02-05", task: "Team Meeting" },
    { date: "2025-02-10", task: "Project Deadline" },
    { date: "2025-02-15", task: "Client Presentation" },
    { date: "2025-02-20", task: "Code Review" },
    { date: "2025-02-25", task: "Monthly Report Submission" },
];

// Function to display calendar with tasks
function showCalendar() {
    const calendarContainer = document.getElementById("calendarColumn");
    calendarContainer.innerHTML = ''; // Clear previous content
    const calendar = document.createElement("div");
    calendar.classList.add("data-box");

    const calendarTitle = document.createElement("h4");
    calendarTitle.innerText = "Tasks Calendar";
    calendar.appendChild(calendarTitle);

    const table = document.createElement("table");
    table.classList.add("table", "table-bordered");
    const headerRow = document.createElement("tr");
    ["Date", "Task"].forEach((header) => {
        const th = document.createElement("th");
        th.innerText = header;
        headerRow.appendChild(th);
    });
    table.appendChild(headerRow);

    tasks.forEach(({ date, task }) => {
        const row = document.createElement("tr");
        const dateCell = document.createElement("td");
        dateCell.innerText = date;
        const taskCell = document.createElement("td");
        taskCell.innerText = task;
        row.appendChild(dateCell);
        row.appendChild(taskCell);
        table.appendChild(row);
    });

    calendar.appendChild(table);
    calendarContainer.appendChild(calendar);
}

// Attach the menu event
document.getElementById("showCalendar").addEventListener("click", showCalendar);

    </script>
            
            
    <style>
    #clockContainer {
        position: relative;
        margin: auto;
        height: 200px;
        width: 200px;
        background-image: url("assets/clock.png");
        background-size: 100%;
    }
    
    #hour,
    #minute,
    #second {
        position: absolute;
        background: #EF5550;
        border-radius: 10px;
        transform-origin: bottom;
    }
    
    #hour {
        width: 1.8%;
        height: 25%;
        top: 25%;
        left: 48.85%;
        opacity: 0.8;
        background: #000000;
    }
    
    #minute {
        width: 1.6%;
        height: 30%;
        top: 19%;
        left: 48.9%;
        opacity: 0.8;
        background: #000000;
    }
    
    #second {
        width: 1%;
        height: 40%;
        top: 9%;
        left: 49.25%;
        opacity: 0.8;
        color: red;
    }
</style>
<script>
    setInterval(() => {
    d = new Date(); //object of date()
    hr = d.getHours();
    min = d.getMinutes();
    sec = d.getSeconds();
    hr_rotation = 30 * hr + min / 2; //converting current time
    min_rotation = 6 * min;
    sec_rotation = 6 * sec;
    
    hour.style.transform = `rotate(${hr_rotation}deg)`;
    minute.style.transform = `rotate(${min_rotation}deg)`;
    second.style.transform = `rotate(${sec_rotation}deg)`;
    }, 1000);
</script>