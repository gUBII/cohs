<?php
$cdate=time();
$cdate=date("Y-m-d", $cdate);    
$cid=$_GET["cid"];
$sheba=$_GET["sheba"];
$utype="tasks";

error_reporting(0);

include("../authenticator.php");

echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
<link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
<link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
<link rel='stylesheet' href='font/CS-Interface/style.css' />
<link rel='stylesheet' href='css/vendor/bootstrap.min.css' />
<link rel='stylesheet' href='css/vendor/OverlayScrollbars.min.css' />
<link rel='stylesheet' href='css/vendor/glide.core.min.css' />
<link rel='stylesheet' href='css/vendor/introjs.min.css' />
<link rel='stylesheet' href='css/vendor/select2.min.css' />
<link rel='stylesheet' href='css/vendor/select2-bootstrap4.min.css' />
<link rel='stylesheet' href='css/vendor/datatables.min.css' />
<link rel='stylesheet' href='css/vendor/plyr.css' />
<link rel='stylesheet' href='css/styles.css' />
<link rel='stylesheet' href='css/main.css' />        
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='js/base/loader.js'></script>";

$cid=0;
if(isset($_GET["cid"])) $cid=$_GET["cid"];

echo"<div class='offcanvas-header'>
    <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
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
                            <a href='#' id='showCalendar'><div class='name' style='font-size:10pt'>Tasks in Calendar</div></a> 
                        </td>
                    </tr></table></div>
                </div>
            
            </div>
        </div>
    </section>
</div>";

?>