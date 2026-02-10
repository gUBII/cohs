<?php
    // Theme Settings Modal Start    
    echo"<div class='modal fade modal-right scroll-out-negative' id='settings' data-bs-backdrop='true' tabindex='-1' role='dialog' aria-labelledby='settings' aria-hidden='true' style='z-index:9999999999'>
        <div class='modal-dialog  full' role='document'>
            <div class='modal-content'>
                <div class='modal-header'><h4 class='modal-title'>Theme Settings</h4><button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button></div>
                <div class='modal-body' style='padding:10px'>
                    
                    <ul class='nav nav-tabs nav-tabs-title nav-tabs-line-title responsive-tabs' id='lineTitleTabsContainer' role='tablist'>";
                        if($designationy==13) echo"<li class='nav-item' role='presentation' style='padding:10px;font-size:8pt'><a class='nav-link active' data-bs-toggle='tab' href='#fourthLineTitleTab' role='tab' aria-selected='true'>Solutions</a></li>";
                        if($designationy==13) echo"<li class='nav-item' role='presentation' style='padding:10px;font-size:8pt'><a class='nav-link' data-bs-toggle='tab' href='#firstLineTitleTab' role='tab' aria-selected='false'>Modules</a></li>";
                        echo"<li class='nav-item' role='presentation' style='padding:10px;font-size:8pt'><a class='nav-link' data-bs-toggle='tab' href='#secondLineTitleTab' role='tab' aria-selected='false'>Style</a></li>";
                        echo"<li class='nav-item' role='presentation' style='padding:10px;font-size:8pt'><a class='nav-link' data-bs-toggle='tab' href='#thirdLineTitleTab' role='tab' aria-selected='false'>Layout</a></li>";
                    echo"</ul>
                    <div>
                        <div class='card-body' style='padding:0px'>
                            <div class='tab-content' style='padding:0px'>";
                                if($designationy==13) echo"<div class='tab-pane fade active show' id='fourthLineTitleTab' role='tabpanel'>";
                                else echo"<div class='tab-pane fade' id='fourthLineTitleTab' role='tabpanel'>";
                                    echo"<section class='scroll-section' id='existingHtml'>
                                        <div id='existingHtmlList'>                                        
                                            <div class='search-input-container border border-separator rounded-md bg-foreground mb-4'>
                                                <input class='form-control search' type='text' autocomplete='off' placeholder='Search' />
                                                <span class='search-magnifier-icon'><i data-acorn-icon='search'></i></span>
                                            </div>
                                            <div class='list'>";
                                                $ms1 = "select * from solutions where parent='0' and profile='0' and status='1' order by orders asc";
                                                $ms11 = $conn->query($ms1);
                                                if ($ms11->num_rows > 0) { while($ms111 = $ms11 -> fetch_assoc()) {
                                                    $rand=rand(100000,999999);
                                                    echo"<div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:47px'>
                                                        <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'>
                                                            <table style='width:100%'><tr>
                                                                <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td>
                                                                <td style='font-size:8pt'>
                                                                    <div class='name' style='font-size:10pt'>".$ms111["name"]."</div>
                                                                    <div class='text-muted position' style='font-size:9pt'>".$ms111["detail"]."</div>
                                                                </td>
                                                                <td style='width:30px;text-align:right'><div class='form-check form-switch'>
                                                                    <form name='saas$rand' method=post action='dataprocessor.php' target='dataprocessor'>
                                                                        <input type='hidden' name='processor' value='solutionswitch'><input type='hidden' name='id' value='".$ms111["id"]."'><input type='hidden' name='switchx' value=''>";
                                                                        if($ms111["dashboard"]==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                                        else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                                    echo"</form>
                                                                    <a data-bs-toggle='collapse' href='#saas$rand' role='button' aria-expanded='false' aria-controls='saas$rand' style='margin-top:20px'>
                                                                        <i class='d-inline-block text-primary align-top' data-acorn-icon='arrow-double-bottom' data-acorn-size='17'></i>
                                                                    </a>
                                                                </div></td>
                                                            </tr></table>
                                                            <div class='collapse' id='saas$rand' style='text-align:right;z-index:999;background-color:#cccccc;width:100%;border-radius:5px;padding:10px'>
                                                                <h4><span style='color:black'>Modules List:&nbsp;&nbsp;</span></h2>";
                                                                
                                                                $mm1 = "select * from modules where parent='".$ms111["id"]."' and profile='0' and status='1' order by orders asc";
                                                                $mm11 = $conn->query($mm1);
                                                                if ($mm11->num_rows > 0) { while($mm111 = $mm11 -> fetch_assoc()) {
                                                                    $rand=rand(100000,999999);
                                                                    echo"<table style='width:70%' align=right><tr>
                                                                        <td style='font-size:8pt;padding-right:20px'><div class='name' style='font-size:10pt;color:black'>".$mm111["name"]."</div></td>
                                                                        <td style='width:30px;text-align:right'><div class='form-check form-switch'>
                                                                            <form name='saas$rand' method=post action='dataprocessor.php' target='dataprocessor'>
                                                                                <input type='hidden' name='processor' value='moduleswitch'><input type='hidden' name='id' value='".$mm111["id"]."'><input type='hidden' name='switchx' value=''>";
                                                                                if($mm111["dashboard"]==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                                                else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                                            echo"</form>
                                                                        </div></td>
                                                                    </tr></table>";
                                                                } }
                                                            echo"</div>
                                                        </div>
                                                    </div>";
                                                } }
                                            echo"</div>
                                        </div>
                                    </section>
                                    <br><br><br><br><br><br><br>
                                </div>

                                <div class='tab-pane fade' id='firstLineTitleTab' role='tabpanel'>                                    
                                    <section class='scroll-section' id='existingHtml'>                                    
                                        <div id='existingHtmlList2'>
                                            <div class='search-input-container border border-separator rounded-md bg-foreground mb-4'>
                                                <input class='form-control search' type='text' autocomplete='off' placeholder='Search' />
                                                <span class='search-magnifier-icon'><i data-acorn-icon='search'></i></span>
                                            </div>
                                            <div class='list'>";
                                                $solutionname="";
                                                $mm1x = "select * from solutions where dashboard='0' and profile='0' and status='1' order by orders asc";
                                                $mm11x = $conn->query($mm1x);
                                                if ($mm11x->num_rows > 0) { while($mm111x = $mm11x -> fetch_assoc()) {
                                                    $solutionname=$mm111x["name"];
                                                    $mm1 = "select * from modules where parent='".$mm111x["id"]."' and profile='0' and status='1' order by orders asc";
                                                    $mm11 = $conn->query($mm1);
                                                    if ($mm11->num_rows > 0) { while($mm111 = $mm11 -> fetch_assoc()) {
                                                        $rand=rand(100000,999999);
                                                        echo"<div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:42px'>
                                                            <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'>
                                                                <table style='width:100%'><tr>
                                                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td>
                                                                    <td style='font-size:8pt'>
                                                                        <div class='name' style='font-size:10pt'>$solutionname - ".$mm111["name"]."</div>
                                                                        <div class=' text-muted position' style='font-size:9pt'>".$mm111["detail"]."</div>
                                                                    </td>
                                                                    <td style='width:30px;text-align:right'><div class='form-check form-switch'>
                                                                        <form name='saas$rand' method=post action='dataprocessor.php' target='dataprocessor'>
                                                                            <input type='hidden' name='processor' value='moduleswitch'><input type='hidden' name='id' value='".$mm111["id"]."'><input type='hidden' name='switchx' value=''>";
                                                                            if($mm111["dashboard"]==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                                            else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                                        echo"</form>
                                                                    </div></td>
                                                                </tr></table>
                                                            </div>
                                                        </div>";
                                                    } }
                                                } }                                            
                                            echo"</div>
                                        </div>
                                    </section>
                                    <br><br><br><br><br><br><br>
                                </div>";

                                if($designationy==13) echo"<div class='tab-pane fade' id='secondLineTitleTab' role='tabpanel'>";
                                else echo"<div class='tab-pane fade active show' id='secondLineTitleTab' role='tabpanel'>";

                                    echo"<br><center><h5>UI Color Setting</h5></center><br>
                                    <div class='row d-flex g-3 justify-content-between flex-wrap mb-3'>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='light-blue' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='blue-light'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT BLUE</span></div>
                                        </a>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='dark-blue' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='blue-dark'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK BLUE</span></div>
                                        </a>
                                    </div>
                                    <div class='row d-flex g-3 justify-content-between flex-wrap mb-3'>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='light-teal' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='teal-light'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT TEAL</span></div>
                                        </a>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='dark-teal' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='teal-dark'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK TEAL</span></div>
                                        </a>
                                    </div>
                                    <div class='row d-flex g-3 justify-content-between flex-wrap mb-3'>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='light-sky' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='sky-light'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT SKY</span></div>
                                        </a>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='dark-sky' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='sky-dark'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK SKY</span></div>
                                        </a>
                                    </div>
                                    <div class='row d-flex g-3 justify-content-between flex-wrap mb-3'>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='light-red' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='red-light'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT RED</span></div>
                                        </a>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='dark-red' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='red-dark'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK RED</span></div>
                                        </a>
                                    </div>
                                    <div class='row d-flex g-3 justify-content-between flex-wrap mb-3'>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='light-green' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='green-light'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT GREEN</span></div>
                                        </a>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='dark-green' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='green-dark'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK GREEN</span></div>
                                        </a>
                                    </div>
                                    <div class='row d-flex g-3 justify-content-between flex-wrap mb-3'>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='light-lime' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='lime-light'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT LIME</span></div>
                                        </a>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='dark-lime' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='lime-dark'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK LIME</span></div>
                                        </a>
                                    </div>
                                    <div class='row d-flex g-3 justify-content-between flex-wrap mb-3'>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='light-pink' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='pink-light'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT PINK</span></div>
                                        </a>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='dark-pink' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='pink-dark'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK PINK</span></div>
                                        </a>
                                    </div>
                                    <div class='row d-flex g-3 justify-content-between flex-wrap mb-3'>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='light-purple' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='purple-light'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT PURPLE</span></div>
                                        </a>
                                        <a href='#' class='flex-grow-1 w-50 option col' data-value='dark-purple' data-parent='color'>
                                            <div class='card rounded-md p-3 mb-1 no-shadow color'><div class='purple-dark'></div></div>
                                            <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK PURPLE</span></div>
                                        </a>
                                    </div>
                                    <br><br><br>

                                </div>
                                <div class='tab-pane fade' id='thirdLineTitleTab' role='tabpanel'>

                                    <br><center><h5>UI Layout Setup</h5></center><br>
                                    <div class='mb-5' id='navcolor'>
                                        <label class='mb-3 d-inline-block form-label'>Override Nav Palette</label>
                                        <div class='row d-flex g-3 justify-content-between flex-wrap'>
                                            <a href='#' class='flex-grow-1 w-33 option col' data-value='default' data-parent='navcolor'>
                                                <div class='card rounded-md p-3 mb-1 no-shadow'>
                                                    <div class='figure figure-primary top'></div><div class='figure figure-secondary bottom'></div>
                                                </div>
                                                <div class='text-muted text-part'><span class='text-extra-small align-middle'>DEFAULT</span></div>
                                            </a>
                                            <a href='#' class='flex-grow-1 w-33 option col' data-value='light' data-parent='navcolor'>
                                                <div class='card rounded-md p-3 mb-1 no-shadow'>
                                                    <div class='figure figure-secondary figure-light top'></div><div class='figure figure-secondary bottom'></div>
                                                </div>
                                                <div class='text-muted text-part'><span class='text-extra-small align-middle'>LIGHT</span></div>
                                            </a>
                                            <a href='#' class='flex-grow-1 w-33 option col' data-value='dark' data-parent='navcolor'>
                                                <div class='card rounded-md p-3 mb-1 no-shadow'>
                                                    <div class='figure figure-muted figure-dark top'></div><div class='figure figure-secondary bottom'></div>
                                                </div>
                                                <div class='text-muted text-part'><span class='text-extra-small align-middle'>DARK</span></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class='mb-5' id='placement'>
                                        <label class='mb-3 d-inline-block form-label'>Menu Placement</label>
                                        <div class='row d-flex g-3 justify-content-between flex-wrap'>
                                            <a href='#' class='flex-grow-1 w-50 option col' data-value='horizontal' data-parent='placement'>
                                                <div class='card rounded-md p-3 mb-1 no-shadow'>
                                                    <div class='figure figure-primary top'></div>
                                                    <div class='figure figure-secondary bottom'></div>
                                                </div>
                                                <div class='text-muted text-part'><span class='text-extra-small align-middle'>HORIZONTAL</span></div>
                                            </a>
                                            <a href='#' class='flex-grow-1 w-50 option col' data-value='vertical' data-parent='placement'>
                                                <div class='card rounded-md p-3 mb-1 no-shadow'>
                                                    <div class='figure figure-primary left'></div><div class='figure figure-secondary right'></div>
                                                </div>
                                                <div class='text-muted text-part'><span class='text-extra-small align-middle'>VERTICAL</span></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class='mb-5' id='behaviour'>
                                        <label class='mb-3 d-inline-block form-label'>Menu Behaviour</label>
                                        <div class='row d-flex g-3 justify-content-between flex-wrap'>
                                            <a href='#' class='flex-grow-1 w-50 option col' data-value='pinned' data-parent='behaviour'>
                                                <div class='card rounded-md p-3 mb-1 no-shadow'>
                                                    <div class='figure figure-primary left large'></div><div class='figure figure-secondary right small'></div>
                                                </div>
                                                <div class='text-muted text-part'><span class='text-extra-small align-middle'>PINNED</span></div>
                                            </a>
                                            <a href='#' class='flex-grow-1 w-50 option col' data-value='unpinned' data-parent='behaviour'>
                                                <div class='card rounded-md p-3 mb-1 no-shadow'>
                                                    <div class='figure figure-primary left'></div><div class='figure figure-secondary right'></div>
                                                </div>
                                                <div class='text-muted text-part'><span class='text-extra-small align-middle'>UNPINNED</span></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class='mb-5' id='layout'>
                                        <label class='mb-3 d-inline-block form-label'>Layout</label>
                                        <div class='row d-flex g-3 justify-content-between flex-wrap'>
                                            <a href='#' class='flex-grow-1 w-50 option col' data-value='fluid' data-parent='layout'>
                                                <div class='card rounded-md p-3 mb-1 no-shadow'>
                                                    <div class='figure figure-primary top'></div><div class='figure figure-secondary bottom'></div>
                                                </div>
                                                <div class='text-muted text-part'><span class='text-extra-small align-middle'>FLUID</span></div>
                                            </a>
                                            <a href='#' class='flex-grow-1 w-50 option col' data-value='boxed' data-parent='layout'>
                                                <div class='card rounded-md p-3 mb-1 no-shadow'>
                                                    <div class='figure figure-primary top'></div><div class='figure figure-secondary bottom small'></div>
                                                </div>
                                                <div class='text-muted text-part'><span class='text-extra-small align-middle'>BOXED</span></div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class='mb-5' id='radius'>
                                        <label class='mb-3 d-inline-block form-label'>Radius</label>
                                        <div class='row d-flex g-3 justify-content-between flex-wrap'>
                                            <a href='#' class='flex-grow-1 w-33 option col' data-value='rounded' data-parent='radius'>
                                                <div class='card rounded-md radius-rounded p-3 mb-1 no-shadow'>
                                                    <div class='figure figure-primary top'></div><div class='figure figure-secondary bottom'></div>
                                                </div>
                                                <div class='text-muted text-part'><span class='text-extra-small align-middle'>ROUNDED</span></div>
                                            </a>
                                            <a href='#' class='flex-grow-1 w-33 option col' data-value='standard' data-parent='radius'>
                                                <div class='card rounded-md radius-regular p-3 mb-1 no-shadow'>
                                                    <div class='figure figure-primary top'></div><div class='figure figure-secondary bottom'></div>
                                                </div>
                                                <div class='text-muted text-part'><span class='text-extra-small align-middle'>STANDARD</span></div>
                                            </a>
                                            <a href='#' class='flex-grow-1 w-33 option col' data-value='flat' data-parent='radius'>
                                                <div class='card rounded-md radius-flat p-3 mb-1 no-shadow'>
                                                    <div class='figure figure-primary top'></div><div class='figure figure-secondary bottom'></div>
                                                </div>
                                                <div class='text-muted text-part'><span class='text-extra-small align-middle'>FLAT</span></div>
                                            </a>
                                        </div>
                                    </div>
                                    <br><br><br>

                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>";
    
    
        // Niches Modal Start
        echo"<div class='modal fade modal-right scroll-out-negative' id='niches' data-bs-backdrop='true' tabindex='-1' role='dialog' aria-labelledby='niches' aria-hidden='true'>
            <div class='modal-dialog modal-dialog-scrollable full' role='document'>
                <div class='modal-content'>
                    <div class='modal-header'><h5 class='modal-title'>Niches</h5><button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button></div>
                    <div class='modal-body'>
                        <div class='scroll-track-visible'>
                            <div class='mb-5'>
                                <label class='mb-2 d-inline-block form-label'>Classic Dashboard</label>
                                <div class='hover-reveal-buttons position-relative hover-reveal cursor-default'>
                                    <div class='position-relative mb-3 mb-lg-5 rounded-sm'>
                                        <img src='https://acorn.coloredstrategies.com/img/page/classic-dashboard.webp' class='img-fluid rounded-sm lower-opacity border border-separator-light' alt='card image'/>
                                        <div class='position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100'>
                                            <a target='_blank' href='https://acorn-html-classic-dashboard.coloredstrategies.com/' class='btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1'>Html</a>
                                            <a target='_blank' href='https://acorn-laravel-classic-dashboard.coloredstrategies.com/' class='btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1'>Laravel</a>
                                            <a target='_blank' href='https://acorn-dotnet-classic-dashboard.coloredstrategies.com/' class='btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1'>.Net5</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class='mb-5'>
                                <label class='mb-2 d-inline-block form-label'>Medical Assistant</label>
                                <div class='hover-reveal-buttons position-relative hover-reveal cursor-default'>
                                    <div class='position-relative mb-3 mb-lg-5 rounded-sm'>
                                        <img src='https://acorn.coloredstrategies.com/img/page/medical-assistant.webp' class='img-fluid rounded-sm lower-opacity border border-separator-light' alt='card image'/>
                                        <div class='position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100'>
                                            <a target='_blank' href='https://acorn-html-medical-assistant.coloredstrategies.com/' class='btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1'>Html</a>
                                            <a target='_blank' href='https://acorn-laravel-medical-assistant.coloredstrategies.com/' class='btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1'>Laravel</a>
                                            <a target='_blank' href='https://acorn-dotnet-medical-assistant.coloredstrategies.com/' class='btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1'>.Net5</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>";
    
    // Theme Settings & Niches Buttons Start -->
    echo"<div class='settings-buttons-container'>";
        if($designationy==13) echo"<a href='index.php?url=dashboards.php&id=26' class='btn settings-button btn-outline-primary p-0' id='nichesButton'>";
        else echo"<a href='index.php?url=users_dashboard.php&id=26' class='btn settings-button btn-primary p-0' id='nichesButton'>";
            echo"<span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='left' title='Global Dashboard'>
                <i data-acorn-icon='home' class='position-relative'></i>
            </span>
        </a>

        <a href='index.php?url=../subscription-plans.php' class='btn settings-button btn-outline-primary p-0' id='nichesButton'>
            <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='left' title='Subscription Plan'>
                <i data-acorn-icon='toy' class='position-relative'></i>
            </span>
        </a>

        <button type='button' class='btn settings-button btn-outline-primary p-0' data-bs-toggle='modal' data-bs-target='#settings' id='settingsButton'>
            <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='left' title='Module & Theme Settings'>
                <i data-acorn-icon='paint-roller' class='position-relative'></i>
            </span>
        </button>";
        
        /*
        <a href='index.php?url=helpdesk.php&id=5138' class='btn settings-button btn-primary p-0' id='nichesButton'>
            <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='left' title='AI Guide Book'>
                <i data-acorn-icon='help' class='position-relative'></i>
            </span>
        </a>
        */
        if($designationy==1 OR $designationy==2 OR $designationy==13){
            echo"<a href='index.php?url=settings.php&id=5173' class='btn settings-button btn-outline-success p-0' id='nichesButton'>
                <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='left' title='Settings'>
                    <i data-acorn-icon='settings-1' class='position-relative'></i>
                </span>
            </a>";
        }
        if($designationy==13 && $sourcefrom!="APP" && $walkthrough<=90){
            echo"<a href='addrecord.php?suspend_assistant=0&url=".$_GET["url"]."&id=0' class='btn settings-button btn-outline-warning p-0' id='nichesButton'>
                <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='left' title='Walkthrough Assistant'>
                    <i data-acorn-icon='destination' class='position-relative'></i>
                </span>
            </a>";
        }
        

    echo"</div>";
    
    
    echo"<div class='modal fade modal-right scroll-out-negative' id='modules' data-bs-backdrop='true' tabindex='-1' role='dialog' aria-labelledby='settings' aria-hidden='true'>
        <div class='modal-dialog  full' role='document'>
            <div class='modal-content'>
                <div class='modal-header'><h4 class='modal-title'>Addon Modules</h4><button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button></div>
                <div class='modal-body' style='padding:10px'>
                    <div>
                        <div class='card-body' style='padding:0px'>
                            <div class='tab-content' style='padding:0px'>
                                
                                <div class='tab-pane fade active show' id='firstLineTitleTab' role='tabpanel'>
                                    <section class='scroll-section' id='existingHtml'>
                                        <div id='existingHtmlList4'>
                                            <div class='search-input-container border border-separator rounded-md bg-foreground mb-4'>
                                                <input class='form-control search' type='text' autocomplete='off' placeholder='Search' />
                                                <span class='search-magnifier-icon'><i data-acorn-icon='search'></i></span>
                                            </div>
                                            <div class='list'>";
                                                $solutionname="";
                                                $mm1x = "select * from solutions where dashboard='0' and status='1' order by orders asc";
                                                $mm11x = $conn->query($mm1x);
                                                if ($mm11x->num_rows > 0) { while($mm111x = $mm11x -> fetch_assoc()) {
                                                    $solutionname=$mm111x["name"];
                                                    $mm1 = "select * from modules where parent='".$mm111x["id"]."' and status='1' order by orders asc";
                                                    $mm11 = $conn->query($mm1);
                                                    if ($mm11->num_rows > 0) { while($mm111 = $mm11 -> fetch_assoc()) {
                                                        
                                                        $ttt=0;
                                                        $mm2 = "select * from modules where parent='".$mm111["id"]."' and status='1' order by id asc limit 2";
                                                        $mm22 = $conn->query($mm2);
                                                        if ($mm22->num_rows > 0) { while($mm222 = $mm22 -> fetch_assoc()) { $ttt=($ttt+1); }}
                                                        
                                                        if($ttt==0){
                                                            $permissionz=0;
                                                            $p3 = "select * from designationwise_roleset where designation_id='$designationy' and module_id='".$mm111["id"]."' order by id asc limit 1";
                                                            $p33 = $conn->query($p3);
                                                            if ($p33->num_rows > 0) { while($p333 = $p33->fetch_assoc()) { $permissionz=1; } }
                                                            if($permissionz==1){
                                                                $rand=rand(100000,999999);
                                                                echo"<div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:42px'>
                                                                    <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'>
                                                                        <table style='width:100%'><tr>
                                                                            <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td>
                                                                            <td style='font-size:8pt'>
                                                                                <div class='name' style='font-size:10pt'><b>$solutionname</b><i data-acorn-icon='chevron-right'></i><u>".$mm111["name"]."</u></div>
                                                                                <div class=' text-muted position' style='font-size:9pt'>".$mm111["detail"]."</div>
                                                                            </td>
                                                                            <td style='width:30px;text-align:right'><div class='form-check form-switch'>
                                                                                <form name='saas$rand' method=post action='dataprocessor.php' target='dataprocessor'>
                                                                                    <input type='hidden' name='processor' value='moduleswitch'><input type='hidden' name='id' value='".$mm111["id"]."'><input type='hidden' name='switchx' value=''>";
                                                                                    if($mm111["dashboard"]==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                                                    else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                                                echo"</form>
                                                                            </div></td>
                                                                        </tr></table>
                                                                    </div>
                                                                </div>";
                                                            }
                                                            
                                                        }else{
                                                            
                                                            $mm2 = "select * from modules where parent='".$mm111["id"]."' and status='1' order by id asc";
                                                            $mm22 = $conn->query($mm2);
                                                            if ($mm22->num_rows > 0) { while($mm222 = $mm22 -> fetch_assoc()) {
                                                                $rand=rand(100000,999999);
                                                                $permissionz=0;
                                                                $p3 = "select * from designationwise_roleset where designation_id='$designationy' and module_id='".$mm222["id"]."' order by id asc limit 1";
                                                                $p33 = $conn->query($p3);
                                                                if ($p33->num_rows > 0) { while($p333 = $p33->fetch_assoc()) { $permissionz=1; } }
                                                                if($permissionz==1){
                                                                    echo"<div class='card rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:42px'>
                                                                        <div class='row g-0 sh-6 mb-2' style='margin-top:-7px'>
                                                                            <table style='width:100%'><tr>
                                                                                <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td>
                                                                                <td style='font-size:8pt'>
                                                                                    <div class='name' style='font-size:10pt'><b>$solutionname</b><i data-acorn-icon='chevron-right'></i>".$mm111["name"]."<i data-acorn-icon='chevron-right'></i><u>".$mm222["name"]."</u></div>
                                                                                    <div class=' text-muted position' style='font-size:9pt'>".$mm222["detail"]."</div>
                                                                                </td>
                                                                                <td style='width:30px;text-align:right'><div class='form-check form-switch'>
                                                                                    <form name='saas$rand' method=post action='dataprocessor.php' target='dataprocessor'>
                                                                                        <input type='hidden' name='processor' value='moduleswitch'><input type='hidden' name='id' value='".$mm222["id"]."'><input type='hidden' name='switchx' value=''>";
                                                                                        if($mm222["dashboard"]==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                                                        else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                                                    echo"</form>
                                                                                </div></td>
                                                                            </tr></table>
                                                                        </div>
                                                                    </div>";
                                                                }
                                                            } }
                                                            
                                                        }
                                                    } }
                                                } }                                            
                                            echo"</div>
                                        </div>
                                    </section>
                                    <br><br><br><br><br><br><br>
                                </div>
                                
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>";
    
    
