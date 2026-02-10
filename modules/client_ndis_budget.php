<?php
    error_reporting(0);
    include("../authenticator.php");
    
    if(isset($_COOKIE["client_id"])){
        
        include '../aged_care_client_bar.php';
        
    }
    
    if(isset($_COOKIE["client_id"])){ 
        echo"<div class='row'>
            <div class='col-12'><h2 class='small-title'>NDIS Budget</h2></div>
            
            <div class='data-table-rows slim' id='sample'>
                <div class='data-table-responsive-wrapper'id='datatableX'><center>
                    <div class='d-flex justify-content-center align-items-center shadow-deep py-5 ' style='border-radius:10px'>
                        <div class='sw-lg-100' style='padding:5px;text-align:left;width:100%'>
                            <form method='post' name='stage2' action='workspace_processor.php' target='dataprocessor' enctype='multipart/form-data' class='tooltip-end-bottom'>
                                <div class='row'>";
                                    $px1 = "select * from project where id='2' order by id desc limit 1";
                                    $px2 = $conn->query($px1);
                                    if ($px2->num_rows > 0) { while($px3 = $px2 -> fetch_assoc()) {  
                                        echo"<input type='hidden' name='processor' value='categorized_budgeting'><input type='hidden' name='pid' value='".$px3["id"]."'>
                                        <div class='col-md-12'><h2>Capital Supports Funding</h2><hr></div>
                                        <div class='col-md-12'><label class='mb-3 top-label'><input class='form-control' type='number' name='capital'  value='".$px3["capital"]."'/><span >Capital Supports Funding</span></label></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Assistive Technology (Category 5):</b><br>
                                            Includes mobility aids, communication devices, prosthetics, and wheelchairs.</label><input name='cat5' type='number' value='".$px3["cat5"]."' class='form-control' >
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Home Modifications (Category 6):</b><br>
                                            Funds structural changes to make homes more accessible, such as installing ramps, bathroom modifications, and smart home technology.</label><input name='cat6' type='number' value='".$px3["cat6"]."' class='form-control' >
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Specialist Disability Accommodation (SDA):</b><br>
                                            Covers housing for participants with high support needs.</label><input name='sda' type='number' value='".$px3["sda"]."' class='form-control' >
                                        </div></div>
                                        <div class='col-md-12'><hr><h2>Core Supports Funding</h2><hr></div>
                                        <div class='col-md-12'><label class='mb-3 top-label'><input class='form-control' type='number' name='core'  value='".$px3["core"]."' /><span >Core Supports Funding</span></label></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Assistance with Daily Life (Category 1):</b><br>
                                            Covers support for personal activities like showering, dressing, eating, and household tasks.</label><input name='cat1' type='number' value='".$px3["cat1"]."' class='form-control' >
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Transport (Category 2):</b><br>
                                            Helps participants travel to school, work, and other community activities.</label><input name='cat2' type='number' value='".$px3["cat2"]."' class='form-control' >
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Consumables (Category 3):</b><br>
                                            Funds everyday items like continence products and low-cost assistive technology.</label><input name='cat3' type='number' value='".$px3["cat3"]."' class='form-control' >
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Assistance with Social, Economic, and Community Participation (Category 4):</b><br>
                                            Supports participation in community activities, social groups, and recreational events.</label><input name='cat4' type='number' value='".$px3["cat4"]."' class='form-control' >
                                        </div></div>
                                        <div class='col-md-12'><hr><h2>Capacity Building Supports</h2><hr></div>
                                        <div class='col-md-12'><label class='mb-3 top-label'><input class='form-control' type='number' name='capacity'  value='".$px3["capacity"]."' /><span >Capacity Building Supports</span></label></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Support Coordination (Category 7):</b><br>
                                            Helps participants manage and use their NDIS plan effectively.</label><input name='cat7' type='number' value='".$px3["cat7"]."' class='form-control' >
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Living Arrangements (Category 8):</b><br>
                                            Helps find and maintain suitable housing.</label><input name='cat8' type='number' value='".$px3["cat8"]."' class='form-control'>
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Increased Social and Community Participation (Category 9):</b><br>
                                            Develops life skills to engage in social and community activities.</label><input name='cat9' type='number' value='".$px3["cat9"]."' class='form-control'>
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Finding and Keeping a Job (Category 10):</b><br>
                                            Employment-related support, job training, and career assistance.</label><input name='cat10' type='number' value='".$px3["cat10"]."' class='form-control'>
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Relationships (Category 11):</b><br>
                                            Behavioral support and social skill development.</label><input name='cat11' type='number' value='".$px3["cat11"]."' class='form-control'>
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Health and Wellbeing (Category 12):</b><br>
                                            Covers exercise physiology, dietitian services, and health-related activities.</label><input name='cat12' type='number' value='".$px3["cat12"]."' class='form-control'>
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Learning (Category 13):</b><br>
                                            Supports education and skill development.</label><input name='cat13' type='number' value='".$px3["cat13"]."' class='form-control'>
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Life Choices (Category 14):</b><br>
                                            Includes plan management services.</label><input name='cat14' type='number' value='".$px3["cat14"]."' class='form-control'>
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Daily Living (Category 15):</b><br>
                                            Covers therapies like occupational therapy (OT), speech therapy, and psychology.</label><input name='cat15' type='number' value='".$px3["cat15"]."' class='form-control'>
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Budget Date</label>
                                            <input class='form-control' type='number' min='2024' max='2099' step='1' value='".$px3["budget_date"]."' name='date' />
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Status</label>
                                            <select class='form-control m-b required' name='status' required>
                                                <option value='".$px3["status"]."'>".$px3["status"]."</opton><option value='0'>0</opton><option value='1'>1</opton>
                                            </select>
                                        </div></div>
                                        <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>&nbsp;<br>
                                            <button class='btn btn-icon btn-icon-start btn-primary' type='button' ><i data-acorn-icon='login'></i><span> Submit Budget</span></button>
                                        </div></div>";
                                        
                                    } }
                                echo"<div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }
  
?>