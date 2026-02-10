<?php
echo"<div class='col'>
                    
                    <section class='scroll-section' id='validation'>
                      
                      <div class='card wizard' id='wizardValidation'>
                        <div class='card-header border-0 pb-0'>
                          <ul class='nav nav-tabs justify-content-center' role='tablist'>
                            <li class='nav-item' role='presentation'>
                              <a class='nav-link text-center' href='#validationFirst' role='tab'>
                                <div class='mb-1 title d-none d-sm-block'>First</div>
                                <div class='text-small description d-none d-md-block'>First description</div>
                              </a>
                            </li>
                            <li class='nav-item' role='presentation'>
                              <a class='nav-link text-center' href='#validationSecond' role='tab'>
                                <div class='mb-1 title d-none d-sm-block'>Second</div>
                                <div class='text-small description d-none d-md-block'>Second description</div>
                              </a>
                            </li>
                            <li class='nav-item' role='presentation'>
                              <a class='nav-link text-center' href='#validationThird' role='tab'>
                                <div class='mb-1 title d-none d-sm-block'>Third</div>
                                <div class='text-small description d-none d-md-block'>Third description</div>
                              </a>
                            </li>
                            <li class='nav-item d-none' role='presentation'>
                              <a class='nav-link text-center' href='#validationLast' role='tab'></a>
                            </li>
                          </ul>
                        </div>
                        <div class='card-body sh-35'>
                          <div class='tab-content'>
                            <div class='tab-pane fade' id='validationFirst' role='tabpanel'>
                              <h5 class='card-title'>First Title</h5>
                              <p class='card-text text-alternate mb-4'>With supporting text below as a natural lead-in to additional content.</p>
                              <form class='tooltip-end-bottom'>
                                <label class='mb-3 top-label'>
                                  <input class='form-control' required name='firstName' />
                                  <span>FIRST NAME</span>
                                </label>
                                <label class='mb-3 top-label'>
                                  <input class='form-control' required name='lastName' />
                                  <span>LAST NAME</span>
                                </label>
                              </form>
                            </div>
                            <div class='tab-pane fade' id='validationSecond' role='tabpanel'>
                              <h5 class='card-title'>Second Title</h5>
                              <p class='card-text text-alternate mb-4'>With supporting text below as a natural lead-in to additional content.</p>
                              <form class='tooltip-end-bottom'>
                                <label class='mb-3 top-label'>
                                  <input class='form-control' required type='email' name='emailName' />
                                  <span>E-MAIL</span>
                                </label>
                                <label class='mb-3 top-label'>
                                  <input class='form-control' type='password' required name='passwordName' />
                                  <span>PASSWORD</span>
                                </label>
                              </form>
                            </div>
                            <div class='tab-pane fade' id='validationThird' role='tabpanel'>
                              <h5 class='card-title'>Third Title</h5>
                              <p class='card-text text-alternate mb-4'>With supporting text below as a natural lead-in to additional content.</p>
                              <form class='tooltip-end-bottom'>
                                <label class='mb-3 top-label'>
                                  <input class='form-control' required name='countryName' />
                                  <span>COUNTRY</span>
                                </label>
                                <label class='mb-3 top-label'>
                                  <input class='form-control' required name='cityName' />
                                  <span>CITY</span>
                                </label>
                              </form>
                            </div>
                            <div class='tab-pane fade' id='validationLast' role='tabpanel'>
                              <div class='text-center mt-5'>
                                <h5 class='card-title'>Thank You!</h5>
                                <p class='card-text text-alternate mb-4'>Your registration completed successfully!</p>
                                <button class='btn btn-icon btn-icon-start btn-primary' type='button'>
                                  <i data-acorn-icon='login'></i>
                                  <span>Login</span>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class='card-footer text-center border-0 pt-1'>
                          <button class='btn btn-icon btn-icon-start btn-outline-primary btn-prev' type='button'>
                            <i data-acorn-icon='chevron-left'></i>
                            <span>Back</span>
                          </button>
                          <button class='btn btn-icon btn-icon-end btn-outline-primary btn-next' type='button'>
                            <span>Next</span>
                            <i data-acorn-icon='chevron-right'></i>
                          </button>
                        </div>
                      </div>
                    </section>
                </div>";?>
