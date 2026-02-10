<?php
    echo"<link rel='stylesheet' href='css/vendor/dropzone.min.css' />
    <link rel='stylesheet' href='css/vendor/quill.bubble.css' />
    <link rel='stylesheet' href='css/vendor/quill.snow.css' />

    <main>
        <div class='container'>
            <div class='page-title-container'>
                <div class='row'>
                    <div class='col-12 col-sm-6'>
                        <h1 class='mb-0 pb-0 display-4' id='title'>Documents Manager</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=../admin-dashboard.php'>Dashboard</a></li>
                                <li class='breadcrumb-item'><a href='index.php?url=../documentation.php'>Documents</a></li>
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
                        <span style='font-size:12pt'>MEDIA & DOCUMENTS</span><br>
                        <span style='font0-size:15pt'>Quickly access your projects, boards, inventory, Inbox and workspaces</span>
                    </div>
                    <div class='col-12 col-sm-6 d-flex align-items-start justify-content-end'>
                        <a href='#' onclick='window.history.back()' class='btn btn-outline-primary btn-icon btn-icon-only'>
                      <i data-acorn-icon='arrow-top-left'></i>
                    </a>
                    <button
                      type='button'
                      class='btn btn-outline-primary btn-icon btn-icon-only ms-1'
                      data-bs-toggle='dropdown'
                      data-bs-auto-close='outside'
                      aria-haspopup='true'
                      aria-expanded='false'
                    >
                      <i data-acorn-icon='folder'></i>
                    </button>
                        <button type='button' class='btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto' data-bs-toggle='modal' data-bs-target='#uploadimages' style='margin-left:5px'>
                            <span>Upload Image</span>
                        </button>
                        <button type='button' class='btn btn-outline-primary btn-icon btn-icon-end w-100 w-sm-auto' data-bs-toggle='modal' data-bs-target='#uploaddocuments' style='margin-left:5px'>
                            <span>Upload File</span> 
                        </button>                        
                        <button type='button' class='btn btn-primary mb-1' data-bs-toggle='modal' data-bs-target='#exampleModalFullscreen' style='margin-left:5px'>
                            <span>Create Document</span> 
                        </button>

                        <div class='modal modal-right fade' id='uploadimages' tabindex='-1' role='dialog' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>Upload Media</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <form>
                                            <label>Lead Name</label><select class='form-control'><option value=1>Client Name</option></select><br>
                                            <label>Title</label><input type=text name=test value='' class='form-control'><br>
                                            <label>File</label><div class='dropzone' id='dropzoneImage'></div><br>
                                            <label>Date</label><input type=text name=test value='' class='form-control'>
                                        </form>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                        <button type='button' class='btn btn-primary'>Upload Images</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='modal modal-right fade' id='uploaddocuments' tabindex='-1' role='dialog' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>Upload Documents</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <form>
                                            <label>Lead Name</label><select class='form-control'><option value=1>Client Name</option></select><br>
                                            <label>Title</label><input type=text name=test value='' class='form-control'><br>
                                            <label>File</label><div class='dropzone' id='dropzoneText'></div><br>
                                            <label>Date</label><input type=text name=test value='' class='form-control'>
                                            
                                        </form>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                                        <button type='button' class='btn btn-primary'>Upload Documents</button>
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
                                            <div class='html-editor sh-500' id='quillEditor'></div>
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
            <div clas='row'>               
                
              <div class='row mb-2'>
                
                <div class='col-sm-12 col-md-5 col-lg-3 col-xxl-2 mb-1'>
                  <div class='d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground'>
                    <input class='form-control' placeholder='Search' />
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
                  <div class='d-inline-block'>
                    <!-- Export Dropdown Start -->
                    <div class='d-inline-block'>
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
                    <div class='dropdown-as-select d-inline-block ms-1' data-childSelector='span'>
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

              <!-- Item List Start -->
              <div class='row'>
                <div class='col-12 mb-5'>
                  <div class='card mb-2 bg-transparent no-shadow d-none d-md-block'>
                    <div class='row g-0 sh-3'>
                      <div class='col'>
                        <div class='card-body pt-0 pb-0 h-100'>
                          <div class='row g-0 h-100 align-content-center'>
                            <div class='col-6 col-md-6 d-flex align-items-center text-alternate text-medium text-muted text-small'>NAME</div>
                            <div class='col-6 col-md-3 d-flex align-items-center text-alternate text-medium text-muted text-small'>DATE</div>
                            <div class='col-6 col-md-3 d-flex align-items-center text-alternate text-medium text-muted text-small'>SIZE</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div id='checkboxTable' class='mb-5'>
                    <div class='mb-n2'>
                      <div class='card mb-2'>
                        <div class='row g-0 sh-14 sh-md-6'>
                          <div class='col'>
                            <div class='card-body pt-0 pb-0 px-4 h-100'>
                              <div class='row g-0 h-100 align-content-center'>
                                <div class='col-11 col-md-6 d-flex flex-column justify-content-center mb-1 mb-md-0 h-md-100 position-relative'>
                                  <a href='#' class='stretched-link body-link' data-bs-toggle='modal' data-bs-target='#imageModal' data-bs-focus='false'>
                                    <i data-acorn-icon='image' class='me-2 text-alternate' data-acorn-size='17'></i>
                                    <span class='align-middle'>product_23452_342.webp</span>
                                  </a>
                                </div>
                                <div class='col-12 col-md-2 d-flex flex-column justify-content-center mb-md-0 order-4 ms-5 ms-md-0'>
                                  <div class='text-alternate'>238.5 KB</div>
                                </div>
                                <div class='col-12 col-md-3 d-flex flex-column justify-content-center order-3 ms-5 ms-md-0'>
                                  <div class='text-alternate'>12.04.2021</div>
                                </div>
                                <div class='col-1 col-md-1 d-flex flex-column justify-content-center order-2 order-md-last'>
                                  <div class='form-check d-flex flex-column justify-content-center align-items-end mb-0 pe-none'>
                                    <input type='checkbox' class='form-check-input ms-n2 mt-n3 ms-md-0 mt-md-0 me-0' />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='card mb-2'>
                        <div class='row g-0 sh-14 sh-md-6'>
                          <div class='col'>
                            <div class='card-body pt-0 pb-0 px-4 h-100'>
                              <div class='row g-0 h-100 align-content-center'>
                                <div class='col-11 col-md-6 d-flex flex-column justify-content-center mb-1 mb-md-0 h-md-100 position-relative'>
                                  <a href='#' class='stretched-link body-link' data-bs-toggle='modal' data-bs-target='#imageModal' data-bs-focus='false'>
                                    <i data-acorn-icon='image' class='me-2 text-alternate' data-acorn-size='17'></i>
                                    <span class='align-middle'>product_23452_341.webp</span>
                                  </a>
                                </div>
                                <div class='col-12 col-md-2 d-flex flex-column justify-content-center mb-md-0 order-4 ms-5 ms-md-0'>
                                  <div class='text-alternate'>423.5 KB</div>
                                </div>
                                <div class='col-12 col-md-3 d-flex flex-column justify-content-center order-3 ms-5 ms-md-0'>
                                  <div class='text-alternate'>11.04.2021</div>
                                </div>
                                <div class='col-1 col-md-1 d-flex flex-column justify-content-center order-2 order-md-last'>
                                  <div class='form-check d-flex flex-column justify-content-center align-items-end mb-0 pe-none'>
                                    <input type='checkbox' class='form-check-input ms-n2 mt-n3 ms-md-0 mt-md-0 me-0' />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='card mb-2'>
                        <div class='row g-0 sh-14 sh-md-6'>
                          <div class='col'>
                            <div class='card-body pt-0 pb-0 px-4 h-100'>
                              <div class='row g-0 h-100 align-content-center'>
                                <div class='col-11 col-md-6 d-flex flex-column justify-content-center mb-1 mb-md-0 h-md-100 position-relative'>
                                  <a href='#' class='stretched-link body-link' data-bs-toggle='modal' data-bs-target='#imageModal' data-bs-focus='false'>
                                    <i data-acorn-icon='image' class='me-2 text-alternate' data-acorn-size='17'></i>
                                    <span class='align-middle'>product_23452_340.webp</span>
                                  </a>
                                </div>
                                <div class='col-12 col-md-2 d-flex flex-column justify-content-center mb-md-0 order-4 ms-5 ms-md-0'>
                                  <div class='text-alternate'>351.0 KB</div>
                                </div>
                                <div class='col-12 col-md-3 d-flex flex-column justify-content-center order-3 ms-5 ms-md-0'>
                                  <div class='text-alternate'>09.04.2021</div>
                                </div>
                                <div class='col-1 col-md-1 d-flex flex-column justify-content-center order-2 order-md-last'>
                                  <div class='form-check d-flex flex-column justify-content-center align-items-end mb-0 pe-none'>
                                    <input type='checkbox' class='form-check-input ms-n2 mt-n3 ms-md-0 mt-md-0 me-0' />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='card mb-2'>
                        <div class='row g-0 sh-14 sh-md-6'>
                          <div class='col'>
                            <div class='card-body pt-0 pb-0 px-4 h-100'>
                              <div class='row g-0 h-100 align-content-center'>
                                <div class='col-11 col-md-6 d-flex flex-column justify-content-center mb-1 mb-md-0 h-md-100 position-relative'>
                                  <a href='#' class='stretched-link body-link' data-bs-toggle='modal' data-bs-target='#imageModal' data-bs-focus='false'>
                                    <i data-acorn-icon='image' class='me-2 text-alternate' data-acorn-size='17'></i>
                                    <span class='align-middle'>product_23452_339.webp</span>
                                  </a>
                                </div>
                                <div class='col-12 col-md-2 d-flex flex-column justify-content-center order-4 ms-5 ms-md-0'>
                                  <div class='text-alternate'>154.0 KB</div>
                                </div>
                                <div class='col-12 col-md-3 d-flex flex-column justify-content-center order-3 ms-5 ms-md-0'>
                                  <div class='text-alternate'>05.04.2021</div>
                                </div>
                                <div class='col-1 col-md-1 d-flex flex-column justify-content-center order-2 order-md-last'>
                                  <div class='form-check d-flex flex-column justify-content-center align-items-end mb-0 pe-none'>
                                    <input type='checkbox' class='form-check-input ms-n2 mt-n3 ms-md-0 mt-md-0 me-0' />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='card mb-2'>
                        <div class='row g-0 sh-14 sh-md-6'>
                          <div class='col'>
                            <div class='card-body pt-0 pb-0 px-4 h-100'>
                              <div class='row g-0 h-100 align-content-center'>
                                <div class='col-11 col-md-6 d-flex flex-column justify-content-center mb-1 mb-md-0 h-md-100 position-relative'>
                                  <a href='#' class='stretched-link body-link' data-bs-toggle='modal' data-bs-target='#imageModal' data-bs-focus='false'>
                                    <i data-acorn-icon='image' class='me-2 text-alternate' data-acorn-size='17'></i>
                                    <span class='align-middle'>product_23452_338.webp</span>
                                  </a>
                                </div>
                                <div class='col-12 col-md-2 d-flex flex-column justify-content-center order-4 ms-5 ms-md-0'>
                                  <div class='text-alternate'>442.3 KB</div>
                                </div>
                                <div class='col-12 col-md-3 d-flex flex-column justify-content-center order-3 ms-5 ms-md-0'>
                                  <div class='text-alternate'>03.04.2021</div>
                                </div>
                                <div class='col-1 col-md-1 d-flex flex-column justify-content-center order-2 order-md-last'>
                                  <div class='form-check d-flex flex-column justify-content-center align-items-end mb-0 pe-none'>
                                    <input type='checkbox' class='form-check-input ms-n2 mt-n3 ms-md-0 mt-md-0 me-0' />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='card mb-2'>
                        <div class='row g-0 sh-14 sh-md-6'>
                          <div class='col'>
                            <div class='card-body pt-0 pb-0 px-4 h-100'>
                              <div class='row g-0 h-100 align-content-center'>
                                <div class='col-11 col-md-6 d-flex flex-column justify-content-center mb-1 mb-md-0 h-md-100 position-relative'>
                                  <a href='#' class='stretched-link body-link' data-bs-toggle='modal' data-bs-target='#imageModal' data-bs-focus='false'>
                                    <i data-acorn-icon='image' class='me-2 text-alternate' data-acorn-size='17'></i>
                                    <span class='align-middle'>product_23452_337.webp</span>
                                  </a>
                                </div>
                                <div class='col-12 col-md-2 d-flex flex-column justify-content-center order-4 ms-5 ms-md-0'>
                                  <div class='text-alternate'>322.7 KB</div>
                                </div>
                                <div class='col-12 col-md-3 d-flex flex-column justify-content-center order-3 ms-5 ms-md-0'>
                                  <div class='text-alternate'>01.04.2021</div>
                                </div>
                                <div class='col-1 col-md-1 d-flex flex-column justify-content-center order-2 order-md-last'>
                                  <div class='form-check d-flex flex-column justify-content-center align-items-end mb-0 pe-none'>
                                    <input type='checkbox' class='form-check-input ms-n2 mt-n3 ms-md-0 mt-md-0 me-0' />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='card mb-2'>
                        <div class='row g-0 sh-14 sh-md-6'>
                          <div class='col'>
                            <div class='card-body pt-0 pb-0 px-4 h-100'>
                              <div class='row g-0 h-100 align-content-center'>
                                <div class='col-11 col-md-6 d-flex flex-column justify-content-center mb-1 mb-md-0 h-md-100 position-relative'>
                                  <a href='#' class='stretched-link body-link' data-bs-toggle='modal' data-bs-target='#imageModal' data-bs-focus='false'>
                                    <i data-acorn-icon='image' class='me-2 text-alternate' data-acorn-size='17'></i>
                                    <span class='align-middle'>product_23452_336.webp</span>
                                  </a>
                                </div>
                                <div class='col-12 col-md-2 d-flex flex-column justify-content-center order-4 ms-5 ms-md-0'>
                                  <div class='text-alternate'>258.0 KB</div>
                                </div>
                                <div class='col-12 col-md-3 d-flex flex-column justify-content-center order-3 ms-5 ms-md-0'>
                                  <div class='text-alternate'>22.03.2021</div>
                                </div>
                                <div class='col-1 col-md-1 d-flex flex-column justify-content-center order-2 order-md-last'>
                                  <div class='form-check d-flex flex-column justify-content-center align-items-end mb-0 pe-none'>
                                    <input type='checkbox' class='form-check-input ms-n2 mt-n3 ms-md-0 mt-md-0 me-0' />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='card mb-2'>
                        <div class='row g-0 sh-14 sh-md-6'>
                          <div class='col'>
                            <div class='card-body pt-0 pb-0 px-4 h-100'>
                              <div class='row g-0 h-100 align-content-center'>
                                <div class='col-11 col-md-6 d-flex flex-column justify-content-center mb-1 mb-md-0 h-md-100 position-relative'>
                                  <a href='#' class='stretched-link body-link' data-bs-toggle='modal' data-bs-target='#imageModal' data-bs-focus='false'>
                                    <i data-acorn-icon='image' class='me-2 text-alternate' data-acorn-size='17'></i>
                                    <span class='align-middle'>product_23452_335.webp</span>
                                  </a>
                                </div>
                                <div class='col-12 col-md-2 d-flex flex-column justify-content-center order-4 ms-5 ms-md-0'>
                                  <div class='text-alternate'>258.0 KB</div>
                                </div>
                                <div class='col-12 col-md-3 d-flex flex-column justify-content-center order-3 ms-5 ms-md-0'>
                                  <div class='text-alternate'>22.03.2021</div>
                                </div>
                                <div class='col-1 col-md-1 d-flex flex-column justify-content-center order-2 order-md-last'>
                                  <div class='form-check d-flex flex-column justify-content-center align-items-end mb-0 pe-none'>
                                    <input type='checkbox' class='form-check-input ms-n2 mt-n3 ms-md-0 mt-md-0 me-0' />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='card mb-2'>
                        <div class='row g-0 sh-14 sh-md-6'>
                          <div class='col'>
                            <div class='card-body pt-0 pb-0 px-4 h-100'>
                              <div class='row g-0 h-100 align-content-center'>
                                <div class='col-11 col-md-6 d-flex flex-column justify-content-center mb-1 mb-md-0 h-md-100 position-relative'>
                                  <a href='#' class='stretched-link body-link' data-bs-toggle='modal' data-bs-target='#imageModal' data-bs-focus='false'>
                                    <i data-acorn-icon='image' class='me-2 text-alternate' data-acorn-size='17'></i>
                                    <span class='align-middle'>product_23452_334.webp</span>
                                  </a>
                                </div>
                                <div class='col-12 col-md-2 d-flex flex-column justify-content-center order-4 ms-5 ms-md-0'>
                                  <div class='text-alternate'>258.0 KB</div>
                                </div>
                                <div class='col-12 col-md-3 d-flex flex-column justify-content-center order-3 ms-5 ms-md-0'>
                                  <div class='text-alternate'>22.03.2021</div>
                                </div>
                                <div class='col-1 col-md-1 d-flex flex-column justify-content-center order-2 order-md-last'>
                                  <div class='form-check d-flex flex-column justify-content-center align-items-end mb-0 pe-none'>
                                    <input type='checkbox' class='form-check-input ms-n2 mt-n3 ms-md-0 mt-md-0 me-0' />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class='card mb-2'>
                        <div class='row g-0 sh-14 sh-md-6'>
                          <div class='col'>
                            <div class='card-body pt-0 pb-0 px-4 h-100'>
                              <div class='row g-0 h-100 align-content-center'>
                                <div class='col-11 col-md-6 d-flex flex-column justify-content-center mb-1 mb-md-0 h-md-100 position-relative'>
                                  <a href='#' class='stretched-link body-link' data-bs-toggle='modal' data-bs-target='#imageModal' data-bs-focus='false'>
                                    <i data-acorn-icon='image' class='me-2 text-alternate' data-acorn-size='17'></i>
                                    <span class='align-middle'>product_23452_333.webp</span>
                                  </a>
                                </div>
                                <div class='col-12 col-md-2 d-flex flex-column justify-content-center order-4 ms-5 ms-md-0'>
                                  <div class='text-alternate'>258.0 KB</div>
                                </div>
                                <div class='col-12 col-md-3 d-flex flex-column justify-content-center order-3 ms-5 ms-md-0'>
                                  <div class='text-alternate'>22.03.2021</div>
                                </div>
                                <div class='col-1 col-md-1 d-flex flex-column justify-content-center order-2 order-md-last'>
                                  <div class='form-check d-flex flex-column justify-content-center align-items-end mb-0 pe-none'>
                                    <input type='checkbox' class='form-check-input ms-n2 mt-n3 ms-md-0 mt-md-0 me-0' />
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class='w-100 d-flex justify-content-center'>
                    <ul class='pagination'>
                      <li class='page-item prev disabled'>
                        <a class='page page-link shadow' href='#'>
                          <i data-acorn-icon='chevron-left'></i>
                        </a>
                      </li>
                      <li class='page-item active'>
                        <a class='page page-link shadow' href='#'>1</a>
                      </li>
                      <li class='page-item'>
                        <a class='page page-link shadow' href='#'>2</a>
                      </li>
                      <li class='page-item next'>
                        <a class='page page-link shadow' href='#'>
                          <i data-acorn-icon='chevron-right'></i>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- Item List End -->

              <!-- Image Detail Modal Start -->
              <div class='modal modal-right fade' id='imageModal' tabindex='-1' role='dialog' aria-hidden='true'>
                <div class='modal-dialog'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h5 class='modal-title'>234523_4239.webp</h5>
                      <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                      <a href='img/product/large/product-1.webp' class='lightbox'>
                        <img src='img/product/large/product-1.webp' class='img-fluid rounded-md mb-4' alt='boule' />
                      </a>
                      <div class='mb-4'>
                        <div class='text-small text-muted'>TITLE</div>
                        <div>234523_4239.webp</div>
                      </div>
                      <div class='mb-3'>
                        <div class='text-small text-muted'>PATH</div>
                        <div>/img/uploads/storage/234523_4239.webp</div>
                      </div>
                      <div class='mb-3'>
                        <div class='text-small text-muted'>CREATED</div>
                        <div>12.05.2021 - 13:42</div>
                      </div>
                      <div class='mb-3'>
                        <div class='text-small text-muted'>SIZE</div>
                        <div>259 KB</div>
                      </div>
                      <div class='mb-3'>
                        <div class='text-small text-muted'>TYPE</div>
                        <div>Jpeg</div>
                      </div>
                      <div class='mb-3'>
                        <div class='text-small text-muted'>RESOLUTION</div>
                        <div>1920x1080</div>
                      </div>
                    </div>
                    <div class='modal-footer border-0'>
                      <a
                        href='#'
                        class='btn btn-icon btn-icon-only btn-outline-primary'
                        data-delay='{'show':'500', 'hide':'0'}'
                        data-bs-toggle='tooltip'
                        data-bs-placement='top'
                        title='Delete'
                        data-bs-dismiss='modal'
                      >
                        <i data-acorn-icon='bin'></i>
                      </a>
                      <a
                        href='#'
                        class='btn btn-icon btn-icon-only btn-outline-primary'
                        data-delay='{'show':'500', 'hide':'0'}'
                        data-bs-toggle='tooltip'
                        data-bs-placement='top'
                        title='View'
                        data-bs-dismiss='modal'
                      >
                        <i data-acorn-icon='shortcut'></i>
                      </a>
                      <a href='#' class='btn btn-icon btn-icon-end btn-primary' data-bs-dismiss='modal'>
                        <span>Use</span>
                        <i data-acorn-icon='check-square'></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Image Detail Modal End -->

              <!-- Upload Modal Start -->
              <div class='modal modal-right large fade' id='uploadModal' tabindex='-1' role='dialog' aria-hidden='true'>
                <div class='modal-dialog'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h5 class='modal-title'>Upload Files</h5>
                      <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body d-flex'>
                      <form class='w-100'>
                        <div class='filled mb-0 h-100'>
                          <div class='dropzone dropzone-filled h-100'></div>
                          <i data-acorn-icon='upload'></i>
                        </div>
                      </form>
                    </div>
                    <div class='modal-footer border-0'>
                      <a href='#' class='btn btn-icon btn-icon-end btn-primary' data-bs-dismiss='modal'>
                        <span>Done</span>
                        <i data-acorn-icon='check-square'></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Upload Modal End -->
            </div>












                </div>
                <div class='col-12'>
                    <div class='row row-cols-1 row-cols-sm-2 row-cols-xl-6 g-2 mb-5'>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-6.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>Basic Introduction to Bread Making</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-3.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>14 Facts About Sugar Products</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-4.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>Apple Cake Recipe for Starters</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-10.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>A Complete Guide to Mix Dough for the Molds</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-2.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>10 Secrets Every Southern Baker Knows</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-1.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>Recipes for Sweet and Healty Treats</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-9.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>Better Ways to Mix Dough for the Molds</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-5.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>Basic Introduction for Dough Molding</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-7.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>A Complete Guide to Mix Dough for the Molds</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-3.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>Introduction to Baking Cakes</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-4.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>Apple Cake Recipe for Starters</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-10.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>A Complete Guide to Mix Dough for the Molds</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-6.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>Basic Introduction to Bread Making</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-3.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>14 Facts About Sugar Products</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-2.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>10 Secrets Every Southern Baker Knows</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-1.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>Recipes for Sweet and Healty Treats</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-7.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>Introduction to Baking Cakes</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                        <div class='col'>
                        <div class='card h-100'>
                            <img src='img/product/small/product-4.webp' class='card-img-top sh-19' alt='card image' />
                            <div class='card-body'>
                            <h5 class='heading mb-3'>
                                <a href='Pages.Blog.Detail.html' class='body-link stretched-link'>
                                <span class='clamp-line sh-5' data-line='2'>Better Ways to Mix Dough for the Molds</span>
                                </a>
                            </h5>
                            
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </main>





    <script src='js/vendor/jquery-3.5.1.min.js'></script>
    <script src='js/vendor/bootstrap.bundle.min.js'></script>
    <script src='js/vendor/OverlayScrollbars.min.js'></script>
    <script src='js/vendor/autoComplete.min.js'></script>
    <script src='js/vendor/clamp.min.js'></script>

    <script src='icon/acorn-icons.js'></script>
    <script src='icon/acorn-icons-interface.js'></script>

    <script src='js/cs/scrollspy.js'></script>

    <script src='js/vendor/dropzone.min.js'></script>

    <script src='js/vendor/singleimageupload.js'></script>

    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src='js/base/helpers.js'></script>
    <script src='js/base/globals.js'></script>
    <script src='js/base/nav.js'></script>
    <script src='js/base/search.js'></script>
    <script src='js/base/settings.js'></script>
    
    <script src='js/vendor/quill.min.js'></script>
    <script src='js/vendor/quill.active.js'></script>
    <script src='js/forms/controls.editor.js'></script>

    <script src='js/cs/dropzone.templates.js'></script>
    <script src='js/forms/controls.dropzone.js'></script>

    <script src='js/common.js'></script>
    <script src='js/scripts.js'></script>";
?>