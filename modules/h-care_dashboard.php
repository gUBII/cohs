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
    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
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
    

    echo"<div class='container'>
        <div>
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <h1 class='mb-0 pb-0 display-4' id='title'> NDIS Admin Dashboard</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=ndis_dashboard.php&id=55'>NDIS</a></li>                            
                                <li class='breadcrumb-item'><a href='index.php?url=ndis_dashboard.php&id=55'>Dashboard</a></li>                            
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
                        <span style='font-size:12pt'>Good morning, $userid!</span><br>
                        <span style='font0-size:15pt'>Quickly access your projects, boards, inventory, Inbox and workspaces</span>
                    </div>
                    <div class='col-12 col-sm-6 d-flex align-items-start justify-content-end'>
                        <a href='index.php' style='margin-top:8px'>
                          <button type='button' class='btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto' id='dashboardTourButton'>
                            <span>Take a Tour</span><i data-acorn-icon='flag'></i>
                          </button>
                        </a>
                    </div>              
                </div>
            </div>
            
            <div class='row'>
                <div class='mb-5'>
                    <div class='row g-2'>
                        <div class='col-12 col-sm-6 col-lg-3'>
                            <div class='card hover-border-primary'>
                                <div class='card-body'>
                                    <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                    <span>Active Projects</span><i data-acorn-icon='office' class='text-primary'></i>
                                </div>                                
                                <div class='cta-1 text-primary'>4 <span style='color:red'>(+2%)</span></div>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-3'>
                        <div class='card hover-border-primary'>
                            <div class='card-body'>
                                <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                    <span>Active Tasks</span><i data-acorn-icon='check-square' class='text-primary'></i>
                                </div>                                
                                <div class='cta-1 text-primary'>55 <span style='font-size:8pt'>(+11 This Week)</span></div>
                            </div>
                        </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-3'>
                      <div class='card hover-border-primary'>
                        <div class='card-body'>
                          <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                            <span>Today's Schedules</span><i data-acorn-icon='file-empty' class='text-primary'></i>
                          </div>
                          <div class='cta-1 text-primary'>2 - 10.40 hours <span style='color:red'></span></div>
                        </div>
                      </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-3'>
                      <div class='card hover-border-primary'>
                        <div class='card-body'>
                          <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                            <span>Notificatons</span><i data-acorn-icon='screen' class='text-primary'></i>
                          </div>
                          <div class='cta-1 text-primary'>15+ <span style='font-size:10pt'>( View Notices )</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class='col-12 col-xl-12'>
                    <section class='scroll-section' id='lineChartTitle'>
                      <h2 class='small-title'>Performance Chart</h2>
                      <div class='card mb-5'>
                        <div class='card-body'>
                          <div class='sh-35'><canvas id='lineChart'></canvas>
                          </div>
                        </div>
                      </div>
                    </section>
                </div>
                <div class='col-6 col-xl-12'>

                    <div class='row gx-2'>
                        <h2 class='small-title'>DOCUMENTS REPORTED</h2>                        
                        <div class='col-2 p-10'>
                            <div class='card mb-5 sh-20 hover-border-primary'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='alarm' class='text-white'></i>
                                    </div>
                                    <p class='mb-0 lh-1'>Total EOD Submitted</p>
                                    <p class='cta-3 mb-0 text-primary'>55+</p>
                                </div>
                            </div>
                        </div><div class='col-2 p-10'>  
                            <div class='card mb-5 sh-20 hover-border-primary'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='navigate-diagonal' class='text-white'></i>
                                    </div>
                                    <p class='mb-0 lh-1'>Total BOC Submitted</p>
                                    <p class='cta-3 mb-0 text-primary'>30+</p>
                                </div>
                            </div>
                        </div><div class='col-2 p-10'>
                            <div class='card mb-5 sh-20 hover-border-primary'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='check-circle' class='text-white'></i>
                                    </div>
                                    <p class='mb-0 lh-1'>Incident Reported</p>
                                    <p class='cta-3 mb-0 text-primary'>50+</p>
                                </div>
                            </div>
                        </div><div class='col-2 p-10'>
                            <div class='card mb-5 sh-20 hover-border-primary'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='check-circle' class='text-white'></i>
                                    </div>
                                    <p class='mb-0 lh-1'>Case Reported</p>
                                    <p class='cta-3 mb-0 text-primary'>25 (+/-)</p>
                                </div>
                            </div>
                        </div><div class='col-2 p-10'>
                            <div class='card mb-5 sh-20 hover-border-primary'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='check-circle' class='text-white'></i>
                                    </div>
                                    <p class='mb-0 lh-1'>Complains Solved</p>
                                    <p class='cta-3 mb-0 text-primary'>5+</p>
                                </div>
                            </div>
                        </div><div class='col-2 p-10'>
                            <div class='card mb-5 sh-20 hover-border-primary'>
                                <div class='h-100 p-4 text-center align-items-center d-flex flex-column justify-content-between'>
                                    <div class='d-flex flex-column justify-content-center align-items-center sh-5 sw-5 rounded-xl bg-gradient-light mb-2'>
                                        <i data-acorn-icon='check-circle' class='text-white'></i>
                                    </div>
                                    <p class='mb-0 lh-1'>General Documents Uploaded</p>
                                    <p class='cta-3 mb-0 text-primary'>150+</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Doughnut Chart Start -->
                  <div class='col-12 col-xl-6'>
                    <section class='scroll-section' id='doughnutChartTitle'>
                      <h2 class='small-title'>Tasks</h2>
                      <div class='card mb-5'>
                        <div class='card-body'>
                          <div class='sh-35'>
                            <canvas id='doughnutChart'></canvas>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                  <!-- Doughnut Chart End -->

                  
                  <!-- Polar Chart Start -->
                  <div class='col-12 col-xl-6'>
                    <section class='scroll-section' id='polarChartTitle'>
                      <h2 class='small-title'>Positive/Negetive Reviews Chart</h2>
                      <div class='card mb-5'>
                        <div class='card-body'>
                          <div class='sh-35'>
                            <canvas id='polarChart'></canvas>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                  <!-- Polar Chart End -->
          

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
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>18 Oct</div>
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
                            <div class='text-alternate mt-n1 lh-1-25'>Added Category Multi Data</div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>18 Oct</div>
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
                              NI150MO23 (100039) Signed
                              <a href='#' class='alternate-link underline-link'>12.25.254.25</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>16 Oct</div>
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
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Oct</div>
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
                            <div class='text-alternate mt-n1 lh-1-25'>Assigned Shift is APPROVED by User.</div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Oct</div>
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
                              New Client:
                              <a href='#' class='alternate-link underline-link'>Phoebe L Clocked IN</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Oct</div>
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
                              New Client:
                              <a href='#' class='alternate-link underline-link'>Stiphen G.</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Oct</div>
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
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>14 Oct</div>
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
                              New Client:
                              <a href='#' class='alternate-link underline-link'>Cholerms</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>13 Oct</div>
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
                              New Client:
                              <a href='#' class='alternate-link underline-link'>Bazlama</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>13 Oct</div>
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
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>13 Oct</div>
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
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>13 Oct</div>
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
                              New Client:
                              <a href='#' class='alternate-link underline-link'>Roger H</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='col-auto'>
                        <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>12 Oct</div>
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
                          <div class='text-muted ms-2 mt-n1 lh-1-25'>12 Oct</div>
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
                            <img src='assets/noimage.png' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                          </div>
                          <div class='col'>
                            <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                              <div class='d-flex flex-column mb-2 mb-sm-0'>
                                <div>Joisse Kaycee</div>
                                <div class='text-small text-muted'>By Client Relations Lead</div>
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
                            <img src='assets/noimage.png' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                          </div>
                          <div class='col'>
                            <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                              <div class='d-flex flex-column mb-2 mb-sm-0'>
                                <div>Zayn Hartley</div>
                                <div class='text-small text-muted'>By Client Relations Lead</div>
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
                            <img src='assets/noimage.png' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                          </div>
                          <div class='col'>
                            <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                              <div class='d-flex flex-column mb-2 mb-sm-0'>
                                <div>Esperanza Lodge</div>
                                <div class='text-small text-muted'>By Client Relations Lead</div>
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
                            <img src='assets/noimage.png' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                          </div>
                          <div class='col'>
                            <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                              <div class='d-flex flex-column mb-2 mb-sm-0'>
                                <div>Kathryn Mengel</div>
                                <div class='text-small text-muted'>By Client Relations Lead</div>
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
                            <img src='assets/noimage.png' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                          </div>
                          <div class='col'>
                            <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                              <div class='d-flex flex-column mb-2 mb-sm-0'>
                                <div>Blaine Cottrell</div>
                                <div class='text-small text-muted'>By Client Relations Lead</div>
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
                            <img src='assets/noimage.png' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                          </div>
                          <div class='col'>
                            <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                              <div class='d-flex flex-column mb-2 mb-sm-0'>
                                <div>Cherish Kerr</div>
                                <div class='text-small text-muted'>By Client Relations Lead</div>
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
                            <img src='assets/noimage.png' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                          </div>
                          <div class='col'>
                            <div class='card-body d-flex flex-column flex-sm-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-sm-center justify-content-sm-between'>
                              <div class='d-flex flex-column mb-2 mb-sm-0'>
                                <div>Olli Hawkins</div>
                                <div class='text-small text-muted'>By Client Relations Lead</div>
                              </div>
                              <div class='d-flex'>
                                <a href='https://nexis365.com/saas-demo/index.php?url=clients.php&id=60'><button class='btn btn-outline-secondary btn-sm' type='button'>Edit</button></a>
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
          </div>
          
          <!-- Bubble Chart Start -->
                  <div class='col-12 col-xl-12'><br>
                    <section class='scroll-section' id='bubbleChartTitle'>
                      <h2 class='small-title'>Clock IN/OUT</h2>
                      <div class='card mb-5'>
                        <div class='card-body'>
                          <div class='sh-35'>
                            <canvas id='bubbleChart'></canvas>
                          </div>
                        </div>
                      </div>
                    </section>
                  </div>
                  <!-- Bubble Chart End -->
          
          "; ?>
          
          
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
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>18 Oct</div>
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
                                  <div class='text-alternate mt-n1 lh-1-25'>3 new Service added</div>
                                </div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>18 Oct</div>
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
                                    Service Ongoing:
                                    <a href='#' class='alternate-link underline-link'>H-Care Plan</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>16 Oct</div>
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
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Oct</div>
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
                                  <div class='text-alternate mt-n1 lh-1-25'>14 Services added</div>
                                </div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Oct</div>
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
                                    New Client:
                                    <a href='#' class='alternate-link underline-link'>Albert</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Oct</div>
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
                                    New Client:
                                    <a href='#' class='alternate-link underline-link'>Linda H.</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class='col-auto'>
                              <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Oct</div>
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
                                <div class='text-muted ms-2 mt-n1 lh-1-25'>14 Oct</div>
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
                                  <div class='text-alternate mt-n1 lh-1-25'>3 new Service added</div>
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
                                    Service Ongoing:
                                    <a href='#' class='alternate-link underline-link'>H-Care Plan</a>
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
                                  <div class='text-alternate mt-n1 lh-1-25'>14 Services added</div>
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
                                    New Client:
                                    <a href='#' class='alternate-link underline-link'>Stiphen G.</a>
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
                  </div>";
                  
                  echo"<div class='col-xl-6 mb-5'>
                    <section class='scroll-section' id='tasks'>
                      <h2 class='small-title'>Tasks</h2>
                      <div class='card h-xl-100-card sh-40'>
                        <div class='card-body mb-n2 scroll-out h-100'>
                          <div class='scroll h-100'>
                            <div class='mb-2'>
                              <label class='form-check w-100 checked-line-through checked-opacity-75'>
                                <input type='checkbox' class='form-check-input' checked />
                                <span class='form-check-label d-block'>
                                  <span>Create Wireframes</span>
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
                  </div>
                  
                  
                </div>
              </div>
              <!-- Content End -->
            </div>



    </main>";
?>
    <script src='js/plugins/carousels.js'></script>

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