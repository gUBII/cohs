
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="font/CS-Interface/style.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="css/vendor/OverlayScrollbars.min.css" />
    <link rel="stylesheet" href="css/vendor/select2.min.css" />
    <link rel="stylesheet" href="css/vendor/select2-bootstrap4.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/main.css" />
    <script src="js/base/loader.js"></script>
  
        <div class="container">
          <div class="row">
            <div class="col">
              <!-- Title and Top Buttons Start -->
              <div class="page-title-container mb-3">
                <div class="row">
                  <!-- Title Start -->
                  <div class="col mb-2">
                    <a href='#' onclick='window.history.back()' class='muted-link pb-1 d-inline-block breadcrumb-back'>
                        <i data-acorn-icon='chevron-left' data-acorn-size='13'></i>
                        <span class='text-small align-middle'>Back</span>
                    </a>
                    <h1 class="mb-2 pb-0 display-4" id="title">User's Feedback Form</h1>
                    <div class="text-muted font-heading text-small">Let us manage the database engines for your applications so you can focus on building.</div>
                  </div>
                  <!-- Title End -->
                </div>
              </div>
              <div class="card mb-5">
                <div class="card-body">
                  <form method='post' action='' class="d-flex flex-column mb-4">
                    <div class="mb-3 mx-auto position-relative" id="singleImageUploadExample">
                     
                    </div>
                    <div class="mb-3 filled w-100 d-flex flex-column"><i data-acorn-icon="user"></i><input class="form-control" placeholder="Name" value="" required/></div>
                    <div class="mb-3 filled w-100 d-flex flex-column"><i data-acorn-icon="tag"></i><input class="form-control" placeholder="User Name" value="" required/></div>
                    <div class="mb-3 filled w-100 d-flex flex-column"><i data-acorn-icon="email"></i><input class="form-control" placeholder="Email" value="" required /></div>
                    <div class="mb-3 filled w-100 d-flex flex-column"><i data-acorn-icon="phone"></i><input class="form-control" placeholder="Phone" value="" required/></div>
                    <div class="filled mb-0 w-100">
                      <i data-acorn-icon="gender"></i>
                      <select class="select-single-no-search-filled form-control" data-placeholder="Gender" required>
                        <option label="">Select Gender</option><option value="Male">Male</option><option value="Female">Female</option><option value="Other">Other</option>
                      </select>
                    </div><br>
                    <div class="mb-3 filled w-100 d-flex flex-column">
                        <i data-acorn-icon="notebook"></i>
                        <textarea class="form-control" placeholder="Feedback Note" value="" required/></textarea>
                    </div>
                    
                    <br><br>
                    <input type='submit' class='btn btn-primary value='Send Feedback' name='submit' style='width:150px'>
                  </form>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>

    <script src="js/vendor/jquery-3.5.1.min.js"></script>
    
    <script src="js/vendor/OverlayScrollbars.min.js"></script>
    <script src="js/vendor/autoComplete.min.js"></script>
    <script src="js/vendor/clamp.min.js"></script>
    <script src="icon/acorn-icons.js"></script>
    <script src="icon/acorn-icons-interface.js"></script>
    <script src="icon/acorn-icons-commerce.js"></script>
    <script src="js/vendor/select2.full.min.js"></script>
    <script src="js/vendor/singleimageupload.js"></script>
    <script src="js/base/helpers.js"></script>
    <script src="js/base/globals.js"></script>
    <script src="js/base/nav.js"></script>
    <script src="js/base/search.js"></script>
    <script src="js/base/settings.js"></script>
    <script src="js/pages/account.settings.js"></script>
    <script src="js/common.js"></script>
    <script src="js/scripts.js"></script>
