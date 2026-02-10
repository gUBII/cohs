<?php
    echo"   <link rel='stylesheet' href='font/CS-Interface/style.css' />
    <link rel='stylesheet' href='tools/css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='tools/css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='tools/css/styles.css' />
    <link rel='stylesheet' href='tools/css/main.css' />
    <script src='tools/js/base/loader.js'></script>
    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <main>
        <div class='container'>
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <h1 class='mb-0 pb-0 display-4' id='title'> Project Management</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=../global-dashboard.php'>Dashboard</a></li>                            
                                <li class='breadcrumb-item'><a href='index.php?url=../global-dashboard.php'>Projects</a></li>                            
                            </ul>
                        </nav>
                    </div>
                    <div class='col-12 col-sm-6 d-flex align-items-start justify-content-end'>
                        <a href='index.php?url=helpdesk.php&id=5138' style='margin-top:8px'>Need Help?</a>&nbsp;&nbsp;
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
                            <span>Create New Project</span><i data-acorn-icon='flag'></i>
                          </button>
                        </a>
                    </div>              
                </div>
            </div>
            



            <div class='d-flex justify-content-between'>
            <h2 class='small-title'>Frequently used</h2>
            <div class='mt-n1'>
              <button class='btn btn-icon btn-icon-end btn-background pe-0 pt-0' type='button'>
                <span>View All</span>
                <i data-acorn-icon='chevron-right'></i>
              </button>
            </div>
          </div>
          <div class='row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3 mb-5'>
            <div class='col'>
              <div class='card h-100'>
                <img src='tools/img/course/small/course-1.webp' class='card-img-top sh-22' alt='card image' />
                <div class='card-body'>
                  <h5 class='heading mb-0'><a href='Course.Detail.html' class='body-link stretched-link'>Advanced React Web Developer Course</a></h5>
                </div>
                
              </div>
            </div>
            <div class='col'>
              <div class='card h-100'>
                <img src='tools/img/course/small/course-2.webp' class='card-img-top sh-22' alt='card image' />
                <div class='card-body'>
                  <h5 class='heading mb-0'><a href='Course.Detail.html' class='body-link stretched-link'>Python for Beginners: From Zero to Expert</a></h5>
                </div>
                
              </div>
            </div>
            <div class='col'>
              <div class='card h-100'>
                <img src='tools/img/course/small/course-3.webp' class='card-img-top sh-22' alt='card image' />
                <div class='card-body'>
                  <h5 class='heading mb-0'><a href='Course.Detail.html' class='body-link stretched-link'>Learn and Understand NodeJS</a></h5>
                </div>
                
              </div>
            </div>
            <div class='col'>
              <div class='card h-100'>
                <img src='tools/img/course/small/course-4.webp' class='card-img-top sh-22' alt='card image' />
                <div class='card-body'>
                  <h5 class='heading mb-0'><a href='Course.Detail.html' class='body-link stretched-link'>HTML 5 - The Complete Guide for Every Level</a></h5>
                </div>
                
              </div>
            </div>
          </div>
          <!-- Popular End -->

          <!-- Trending Start -->
          <div class='d-flex justify-content-between'>
            <h2 class='small-title'>Latest Projects</h2>
            <div class='mt-n1'>
              <button class='btn btn-icon btn-icon-end btn-background pe-0 pt-0' type='button'>
                <span>View All</span>
                <i data-acorn-icon='chevron-right'></i>
              </button>
            </div>
          </div>
          <div class='row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3 mb-5'>
            <div class='col'>
              <div class='card h-100'>
                <img src='tools/img/course/small/course-5.webp' class='card-img-top sh-22' alt='card image' />
                <div class='card-body'>
                  <h5 class='heading mb-0'><a href='Course.Detail.html' class='body-link stretched-link'>Advanced Techniques with Gulpjs</a></h5>
                </div>
                
              </div>
            </div>
            <div class='col'>
              <div class='card h-100'>
                <img src='tools/img/course/small/course-6.webp' class='card-img-top sh-22' alt='card image' />
                <div class='card-body'>
                  <h5 class='heading mb-0'><a href='Course.Detail.html' class='body-link stretched-link'>Introduction to Sass with Full Website</a></h5>
                </div>
                
              </div>
            </div>
            <div class='col'>
              <div class='card h-100'>
                <img src='tools/img/course/small/course-7.webp' class='card-img-top sh-22' alt='card image' />
                <div class='card-body'>
                  <h5 class='heading mb-0'><a href='Course.Detail.html' class='body-link stretched-link'>Java - The Complete Guide</a></h5>
                </div>
                
              </div>
            </div>
            <div class='col'>
              <div class='card h-100'>
                <img src='tools/img/course/small/course-8.webp' class='card-img-top sh-22' alt='card image' />
                <div class='card-body'>
                  <h5 class='heading mb-0'><a href='Course.Detail.html' class='body-link stretched-link'>PHP for Beginners with CMS Project</a></h5>
                </div>
                
              </div>
            </div>
          </div>
            
        </div>

    </main>";
?>

    <script src='tools/js/plugins/carousels.js'></script>
    <script src='tools/js/vendor/jquery-3.5.1.min.js'></script>
    <script src='tools/js/vendor/bootstrap.bundle.min.js'></script>
    <script src='tools/js/vendor/OverlayScrollbars.min.js'></script>
    <script src='tools/js/vendor/autoComplete.min.js'></script>
    <script src='tools/js/vendor/clamp.min.js'></script>
    <script src='tools/icon/acorn-icons.js'></script>
    <script src='tools/icon/acorn-icons-interface.js'></script>
    <script src='tools/icon/acorn-icons-learning.js'></script>
    <script src='tools/js/vendor/jquery.barrating.min.js'></script>
    <script src='tools/js/base/helpers.js'></script>
    <script src='tools/js/base/globals.js'></script>
    <script src='tools/js/base/nav.js'></script>
    <script src='tools/js/base/search.js'></script>
    <script src='tools/js/base/settings.js'></script>
    <script src='tools/js/pages/course.explore.js'></script>
    <script src='tools/js/common.js'></script>
    <script src='tools/js/scripts.js'></script>

      