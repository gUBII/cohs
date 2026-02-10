<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
<link rel="stylesheet" href="tools/css/vendor/fullcalendar.min.css" />
      <main>
      <div class='container'>
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <h1 class='mb-0 pb-0 display-4' id='title'>Workforce Task Manager</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=../admin-dashboard.php'>Dashboard</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=../documentation.php'>Workforce</a></li>
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
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <span style='font-size:12pt'>Department Wise Workforce Management System</span><br>
                        <span style='font-size:15pt'>Quickly access your projects, boards, inventory, Inbox and workspaces</span>
                    </div>
                    <div class='col-12 col-sm-6 d-flex align-items-start justify-content-end'>
                        <a href='#' onclick='window.history.back()' class='btn btn-outline-primary btn-icon btn-icon-only'>
                            <i data-acorn-icon='arrow-top-left'></i>
                        </a>
                        <button type='button' class='btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto' data-bs-toggle='modal' data-bs-target='#uploadimages' style='margin-left:5px'>
                            <span>Departments</span>
                        </button>
                        <button type='button' class='btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto' data-bs-toggle='modal' data-bs-target='#uploaddocuments' style='margin-left:5px'>
                            <span>Task Distribution</span> 
                        </button>
                        <button type='button' class='btn btn-primary mb-1' data-bs-toggle='modal' data-bs-target='#exampleModalFullscreen' style='margin-left:5px'>
                            <span>Distribution Funnel</span> 
                        </button>
                        <div class='modal modal-right fade' id='uploadimages' tabindex='-1' role='dialog' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>Create Department</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <form>
                                            <label>Department Name</label><input type=text name=test value='' class='form-control'><br>                                            
                                        </form>
                                        <section class='scroll-section' id='users'>
                                            <h2 class='small-title'>Departments List</h2>
                                            
                                                <div class='card-body mb-n2'>
                                                    <div class='row g-0 sh-6 mb-2'>
                                                        <div class='col'>
                                                            <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                                <div class='d-flex flex-column'><div>Admin</div><div class='text-small text-muted'>12 Members</div></div>
                                                                <div class='d-flex'><button type='button' class='btn btn-outline-primary btn-sm ms-1'>Edit</button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='card-body mb-n2'>
                                                    <div class='row g-0 sh-6 mb-2'>
                                                        <div class='col'>
                                                            <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                                <div class='d-flex flex-column'><div>Admin</div><div class='text-small text-muted'>12 Members</div></div>
                                                                <div class='d-flex'><button type='button' class='btn btn-outline-primary btn-sm ms-1'>Edit</button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='card-body mb-n2'>
                                                    <div class='row g-0 sh-6 mb-2'>
                                                        <div class='col'>
                                                            <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                                <div class='d-flex flex-column'><div>Admin</div><div class='text-small text-muted'>12 Members</div></div>
                                                                <div class='d-flex'><button type='button' class='btn btn-outline-primary btn-sm ms-1'>Edit</button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='card-body mb-n2'>
                                                    <div class='row g-0 sh-6 mb-2'>
                                                        <div class='col'>
                                                            <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                                <div class='d-flex flex-column'><div>Admin</div><div class='text-small text-muted'>12 Members</div></div>
                                                                <div class='d-flex'><button type='button' class='btn btn-outline-primary btn-sm ms-1'>Edit</button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='card-body mb-n2'>
                                                    <div class='row g-0 sh-6 mb-2'>
                                                        <div class='col'>
                                                            <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                                <div class='d-flex flex-column'><div>Admin</div><div class='text-small text-muted'>12 Members</div></div>
                                                                <div class='d-flex'><button type='button' class='btn btn-outline-primary btn-sm ms-1'>Edit</button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='card-body mb-n2'>
                                                    <div class='row g-0 sh-6 mb-2'>
                                                        <div class='col'>
                                                            <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                                <div class='d-flex flex-column'><div>Admin</div><div class='text-small text-muted'>12 Members</div></div>
                                                                <div class='d-flex'><button type='button' class='btn btn-outline-primary btn-sm ms-1'>Edit</button></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                        <button type='button' class='btn btn-primary'>Save/Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='modal modal-right fade' id='uploaddocuments' tabindex='-1' role='dialog' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>Task Distribution</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <form>
                                            <label>Select Task</label><select class='form-control'>
                                                <option value=1>Task Schedule 123</option>
                                                <option value=1>Task Schedule 987</option>
                                                <option value=1>Task Schedule 876</option>
                                                <option value=1>Task Schedule 435</option>
                                                <option value=1>Task Schedule 678</option>
                                                <option value=1>Task Schedule 234</option>
                                                <option value=1>Task Schedule 456</option>
                                                <option value=1>Task Schedule 345</option>
                                                <option value=1>Task Schedule 938</option>
                                                <option value=1>Task Schedule 265</option>
                                            </select><br>
                                            <label>Select A Manager</label><select class='form-control'>
                                                <option value=1>Roger</option>
                                                <option value=1>Albert</option>
                                                <option value=1>Jason</option>
                                                <option value=1>Peter</option>
                                                <option value=1>Hossain</option>
                                                <option value=1>Shahrin</option>
                                                <option value=1>Fatema</option>
                                                <option value=1>Joshef</option>
                                                <option value=1>Somalian</option>
                                                <option value=1>Anderson</option>
                                            </select><br>
                                            <label>Select Executive</label><select class='form-control'>
                                                <option value=1>Roger</option>
                                                <option value=1>Albert</option>
                                                <option value=1>Jason</option>
                                                <option value=1>Peter</option>
                                                <option value=1>Hossain</option>
                                                <option value=1>Shahrin</option>
                                                <option value=1>Fatema</option>
                                                <option value=1>Joshef</option>
                                                <option value=1>Somalian</option>
                                                <option value=1>Anderson</option>
                                            </select><br>
                                            <label>Select Co-Ordinator</label><select class='form-control'>
                                                <option value=1>Roger</option>
                                                <option value=1>Albert</option>
                                                <option value=1>Jason</option>
                                                <option value=1>Peter</option>
                                                <option value=1>Hossain</option>
                                                <option value=1>Shahrin</option>
                                                <option value=1>Fatema</option>
                                                <option value=1>Joshef</option>
                                                <option value=1>Somalian</option>
                                                <option value=1>Anderson</option>
                                            </select><br>
                                            <label>Select Executive</label><select class='form-control'>
                                                <option value=1>Roger</option>
                                                <option value=1>Albert</option>
                                                <option value=1>Jason</option>
                                                <option value=1>Peter</option>
                                                <option value=1>Hossain</option>
                                                <option value=1>Shahrin</option>
                                                <option value=1>Fatema</option>
                                                <option value=1>Joshef</option>
                                                <option value=1>Somalian</option>
                                                <option value=1>Anderson</option>
                                            </select><br>
                                            <label>Select Worker</label><select class='form-control'>
                                                <option value=1>Roger</option>
                                                <option value=1>Albert</option>
                                                <option value=1>Jason</option>
                                                <option value=1>Peter</option>
                                                <option value=1>Hossain</option>
                                                <option value=1>Shahrin</option>
                                                <option value=1>Fatema</option>
                                                <option value=1>Joshef</option>
                                                <option value=1>Somalian</option>
                                                <option value=1>Anderson</option>
                                            </select><br>
                                            <label>Select Co-Worker</label><select class='form-control'>
                                                <option value=1>Roger</option>
                                                <option value=1>Albert</option>
                                                <option value=1>Jason</option>
                                                <option value=1>Peter</option>
                                                <option value=1>Hossain</option>
                                                <option value=1>Shahrin</option>
                                                <option value=1>Fatema</option>
                                                <option value=1>Joshef</option>
                                                <option value=1>Somalian</option>
                                                <option value=1>Anderson</option>
                                            </select><br>                                            
                                            <label>Date</label><input type=text name=test value='' class='form-control'>
                                            <label>Task Detail</label><textarea name=test value='' class='form-control'></textarea>
                                            
                                        </form>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                        <button type='button' class='btn btn-primary'>Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='modal fade' id='exampleModalFullscreen' tabindex='-1' aria-labelledby='exampleModalFullscreenLabel' aria-hidden='true'>
                            <div class='modal-dialog modal-fullscreen'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title h4' id='exampleModalFullscreenLabel'>Documents</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <div class='card-body editor-container' style='padding:0px'>
                                            
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
                            [13, 'Rhizaria (Worker)', 2, 1, 0],
                            [14, 'Excavata (Worker)', 2, 1, 0],

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
                            [35, 'Aquificae (Worker)', 3, 1, 0],
                            [36, 'Deinococcus-Thermus (Worker)', 3, 1, 0],
                            [37, 'Fibrobacteres-Chlorobi/Bacteroidetes (Worker)', 3, 1, 0],
                            [38, 'Fusobacteria (Worker)', 3, 1, 0],
                            [39, 'Gemmatimonadetes (Worker)', 3, 1, 0],
                            [40, 'Nitrospirae (Worker)', 3, 1, 0],
                            [41, 'Planctomycetes-Verrucomicrobia/Chlamydiae (Worker)', 3, 1, 0],
                            [42, 'Proteobacteria (Worker)', 3, 1, 0],
                            [43, 'Spirochaetes (Worker)', 3, 1, 0],
                            [44, 'Synergistetes (Worker)', 3, 1, 0],
                            [45, 'Acidobacteria (Worker)', 3, 1, 0],
                            [46, 'Chloroflexi (Worker)', 3, 1, 0],
                            [47, 'Chrysiogenetes (Worker)', 3, 1, 0],
                            [48, 'Cyanobacteria (Worker)', 3, 1, 0],
                            [49, 'Deferribacteres (Worker)', 3, 1, 0],
                            [50, 'Dictyoglomi (Worker)', 3, 1, 0],
                            [51, 'Thermodesulfobacteria (Worker)', 3, 1, 0],
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
                                        <div id="wordtree_explicit_maxfontsize" style="width: 100%; height: 1200px;"></div>
                                    </div> 
                                </div>
                            </section>
                        </div>

                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>              
                </div>
            </div>

          <div class="row">
            <!-- Patients Start -->
            <div class="col-xl-6 mb-5">
              <div class="d-flex">
                <div class="dropdown-as-select me-3" data-setActive="false" data-childSelector="span">
                  <a class="pe-0 pt-0 align-top lh-1 dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                    <span class="small-title"></span>
                  </a>
                  <div class="dropdown-menu font-standard">
                    <div class="nav flex-column" role="tablist">
                      <a class="active dropdown-item text-medium" href="#" aria-selected="true" role="tab">Today's</a>
                      <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Tomorrow's</a>
                      <a class="dropdown-item text-medium" href="#" aria-selected="false" role="tab">Weekly</a>
                    </div>
                  </div>
                </div>
                <h2 class="small-title"> My Tasks</h2>
              </div>
              <div class="card mb-2">
                <div class="card-body py-3">
                  <label class="form-check custom-icon mb-0 checked-line-through checked-opacity-75 mt-2">
                    <input type="checkbox" class="form-check-input" checked />
                    <span class="form-check-label">
                      <span class="content">
                        <span class="mb-1 lh-1-25">Blaine Cottrell</span>
                        <span class="d-block text-small text-primary">10:30</span>
                      </span>
                    </span>
                  </label>
                </div>
              </div>
              <div class="card mb-2">
                <div class="card-body py-3">
                  <label class="form-check custom-icon mb-0 checked-line-through checked-opacity-75 mt-2">
                    <input type="checkbox" class="form-check-input" checked />
                    <span class="form-check-label">
                      <span class="content">
                        <span class="mb-1 lh-1-25">Winry Rockbell</span>
                        <span class="d-block text-small text-primary">11:30</span>
                      </span>
                    </span>
                  </label>
                </div>
              </div>
              <div class="card mb-2">
                <div class="card-body py-3">
                  <label class="form-check custom-icon mb-0 checked-line-through checked-opacity-75 mt-2">
                    <input type="checkbox" class="form-check-input" />
                    <span class="form-check-label">
                      <span class="content">
                        <span class="mb-1 lh-1-25">Kirby Peters</span>
                        <span class="d-block text-small text-primary">13:00</span>
                      </span>
                    </span>
                  </label>
                </div>
              </div>
              <div class="card mb-2">
                <div class="card-body py-3">
                  <label class="form-check custom-icon mb-0 checked-line-through checked-opacity-75 mt-2">
                    <input type="checkbox" class="form-check-input" />
                    <span class="form-check-label">
                      <span class="content">
                        <span class="mb-1 lh-1-25">Olli Hawkins</span>
                        <span class="d-block text-small text-primary">13:30</span>
                      </span>
                    </span>
                  </label>
                </div>
              </div>
              <div class="card mb-2">
                <div class="card-body py-3">
                  <label class="form-check custom-icon mb-0 checked-line-through checked-opacity-75 mt-2">
                    <input type="checkbox" class="form-check-input" />
                    <span class="form-check-label">
                      <span class="content">
                        <span class="mb-1 lh-1-25">Daisy Hartley</span>
                        <span class="d-block text-small text-primary">14:30</span>
                      </span>
                    </span>
                  </label>
                </div>
              </div>
              <div class="card">
                <div class="card-body py-3">
                  <label class="form-check custom-icon mb-0 checked-line-through checked-opacity-75 mt-2">
                    <input type="checkbox" class="form-check-input" />
                    <span class="form-check-label">
                      <span class="content">
                        <span class="mb-1 lh-1-25">Kathryn Mengel</span>
                        <span class="d-block text-small text-primary">15:00</span>
                      </span>
                    </span>
                  </label>
                </div>
              </div>
            </div>
            <!-- Patients End -->

            <!-- Schedule Calendar Start -->
            <div class="col-xl-6 mb-5">
              <h2 class="small-title">Task by Schedule</h2>
              <div class="card h-auto h-xl-100-card">
                <div class="card-body sh-xl-50">
                  <div id="calendar" class="compact h-100"></div>
                </div>
              </div>
            </div>
            <!-- Schedule Calendar End -->

            <!-- Schedule Modal Start -->
            <div class="modal modal-right fade" id="scheduleModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">19 August 2024</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body border-last-none">
                    <div class="border-bottom border-separator-light pb-3 mb-3">
                      <div class="text-primary">09:00 - 10:00</div>
                      <div class="mb-2">Meeting with the team</div>
                      <div class="text-muted">Dessert oat cake pudding jujubes jujubes tiramisu candy lollipop.</div>
                    </div>
                    <div class="border-bottom border-separator-light pb-3 mb-3">
                      <div class="text-primary">12:00 - 13:00</div>
                      <div class="mb-2">Cardiovascular Online Symposium</div>
                      <div class="text-muted">Carrot cake ice cream macaroon sweet roll muffin liquorice.</div>
                    </div>
                    <div class="border-bottom border-separator-light pb-3 mb-3">
                      <div class="text-primary">18:00 - 19:00</div>
                      <div class="mb-2">Dinner with Chief Physician</div>
                      <div class="text-muted">Chocolate cake apple pie bear claw wafer cupcake topping topping oat cake.</div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Schedule Modal End -->
          </div>

          <!-- Departments Start -->
          <div class="d-flex justify-content-between">
            <h2 class="small-title">Departments</h2>
            <button class="btn btn-icon btn-icon-end btn-xs btn-background-alternate p-0 text-small" type="button">
              <span class="align-bottom">View All</span>
              <i data-acorn-icon="chevron-right" class="align-middle" data-acorn-size="12"></i>
            </button>
          </div>
          <div class="row g-2 mb-5">
            <div class="col-6 col-md-4 col-xl-2 sh-23">
              <div class="card h-100 hover-scale-up">
                <a class="card-body text-center d-flex flex-column align-items-center" href="#">
                  <div class="sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                    <i data-acorn-icon="brain" class="text-primary"></i>
                  </div>
                  <p class="heading mt-3 text-body">Admin</p><div class="text-extra-small fw-medium text-muted">3 Members</div>
                </a>
              </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2 sh-23">
              <div class="card h-100 hover-scale-up">
                <a class="card-body text-center d-flex flex-column align-items-center" href="#">
                  <div class="sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                    <i data-acorn-icon="lungs" class="text-primary"></i>
                  </div>
                  <p class="heading mt-3 text-body">Managers</p><div class="text-extra-small fw-medium text-muted">6 Members</div>
                </a>
              </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2 sh-23">
              <div class="card h-100 hover-scale-up">
                <a class="card-body text-center d-flex flex-column align-items-center" href="#">
                  <div class="sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                    <i data-acorn-icon="dermatology" class="text-primary"></i>
                  </div>
                  <p class="heading mt-3 text-body">Officers</p><div class="text-extra-small fw-medium text-muted">25 Members</div>
                </a>
              </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2 sh-23">
              <div class="card h-100 hover-scale-up">
                <a class="card-body text-center d-flex flex-column align-items-center" href="#">
                  <div class="sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                    <i data-acorn-icon="urinary" class="text-primary"></i>
                  </div>
                  <p class="heading mt-3 text-body">Co-Ordinators</p><div class="text-extra-small fw-medium text-muted">50 Members</div>
                </a>
              </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2 sh-23">
              <div class="card h-100 hover-scale-up">
                <a class="card-body text-center d-flex flex-column align-items-center" href="#">
                  <div class="sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                    <i data-acorn-icon="blood" class="text-primary"></i>
                  </div>
                  <p class="heading mt-3 text-body">Workers</p>
                  <div class="text-extra-small fw-medium text-muted">12 Members</div>
                </a>
              </div>
            </div>
            <div class="col-6 col-md-4 col-xl-2 sh-23">
              <div class="card h-100 hover-scale-up">
                <a class="card-body text-center d-flex flex-column align-items-center" href="#">
                  <div class="sw-8 sh-8 rounded-xl d-flex justify-content-center align-items-center border border-primary">
                    <i data-acorn-icon="gynecology" class="text-primary"></i>
                  </div>
                  <p class="heading mt-3 text-body">Co-Workers</p>
                  <div class="text-extra-small fw-medium text-muted">526 Members</div>
                </a>
              </div>
            </div>
          </div>
          
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
                                ['Research', 'Albert', new Date(2015, 0, 1), new Date(2015, 0, 5), null,  100,  null],
                                ['Write', 'William', null, new Date(2015, 0, 9), daysToMilliseconds(3), 25, 'Research,Outline'],
                                ['Cite', 'John', null, new Date(2015, 0, 7), daysToMilliseconds(1), 20, 'Research'],
                                ['Complete', 'Peter', null, new Date(2015, 0, 10), daysToMilliseconds(1), 0, 'Cite,Write'],
                                ['Outline', 'Shahrin', null, new Date(2015, 0, 6), daysToMilliseconds(1), 100, 'Research']
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
        
          <h2 class="small-title">Quick Links</h2>
          <div class="row g-2 h-lg-100-card mb-5">
            <div class="col-12 col-lg-6 col-xl-3 h-100">
              <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                  <div>
                    <div class="cta-4 mb-3">Lab Results</div>
                    <div class="text-muted mb-4 clamp-line" data-line="3">
                      Tootsie roll sweet roll pudding. Pastry liquorice wafer sweet. Chocolate bar jelly sugar plum cake sesame snaps gummies lollipop.
                    </div>
                  </div>
                  <a href="#" class="btn btn-icon btn-icon-start btn-outline-primary stretched-link sw-12">
                    <i data-acorn-icon="form-check"></i>
                    <span>View</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 h-100">
              <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                  <div>
                    <div class="cta-4 mb-3">Imaging Results</div>
                    <div class="text-muted mb-4 clamp-line" data-line="3">
                      Candy canes jelly beans donut gummies gummi biscuit chocolate bar powder bears halvah pie bear claw wafer cupcake oat cake marzipan.
                    </div>
                  </div>
                  <a href="#" class="btn btn-icon btn-icon-start btn-outline-primary stretched-link sw-12">
                    <i data-acorn-icon="file-image"></i>
                    <span>View</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 h-100">
              <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                  <div>
                    <div class="cta-4 mb-3">Prescriptions</div>
                    <div class="text-muted mb-4 clamp-line" data-line="3">
                      Tootsie roll sweet roll pudding. Pastry liquorice wafer sweet. Chocolate bar jelly sugar plum cake sesame snaps gummies lollipop.
                    </div>
                  </div>
                  <a href="#" class="btn btn-icon btn-icon-start btn-outline-primary stretched-link sw-12">
                    <i data-acorn-icon="health"></i>
                    <span>View</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 h-100">
              <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                  <div>
                    <div class="cta-4 mb-3">Guides</div>
                    <div class="text-muted mb-4 clamp-line" data-line="3">
                      Candy canes jelly beans donut gummies gummi biscuit ice cream chocolate bar powder bears halvah sweet roll muffin oat cake marzipan.
                    </div>
                  </div>
                  <a href="#" class="btn btn-icon btn-icon-start btn-outline-primary stretched-link sw-12">
                    <i data-acorn-icon="notebook-1"></i>
                    <span>View</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- Quick Links End -->
        </div>
      </main>
      
    <script src="tools/js/vendor/fullcalendar/main.min.js"></script>
    <script src="tools/js/cs/charts.extend.js"></script>
    <script src="tools/js/pages/dashboards.doctor.js"></script>
    <script src="tools/js/scripts.js"></script>
  </body>
</html>
