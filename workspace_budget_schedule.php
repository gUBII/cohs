<?php
    include("authenticator.php");
    include("head.php");
?>

<!DOCTYPE html>
<html lang='en' data-footer='true'>
    <head>
        <style>
            body {
                opacity: 0;
                transition: opacity 1s ease-in;
            }
            
            body.fade-in-loaded {
                opacity: 1;
            }
        </style>
    </head>
    <body class='fade-in card mb-5'><?php
        
        $tday=time();
        if(isset($_POST["pid"])) $pid=$_POST["pid"];
        else if(isset($_GET["pid"])) $pid=$_GET["pid"];
        else $pid=0;
        
        $wsp11 = "select * from project where id='$pid' order by id desc limit 1";
        $wsp22 = $conn->query($wsp11);
        if ($wsp22->num_rows > 0) { while($px3 = $wsp22 -> fetch_assoc()) {
            echo"<form method='post' name='stage2ax' action='workspace_processor.php' target='budgetmanagerxz' enctype='multipart/form-data' class='tooltip-end-bottom'>
                
                <input type='hidden' name='processor' value='categorized_budgeting'><input type='hidden' name='pid' value='".$px3["id"]."'>
                
                <section class='scroll-section' id='default'>
                    <div class='card mb-5'>
                        
                        <div class='card-body'>
                            <table style='width:100%'><tr><td align=left>
                                <a data-bs-toggle='collapse' href='#csf1' role='button' aria-expanded='false' aria-controls='csf1'>
                                    <label class='mb-3 top-label'><input class='form-control' type='number' name='core'  value='".$px3["core"]."' readonly /><span >Core Supports Funding</span></label>
                                </a>
                            </td><td align='right' style='width:50px' valign=top>
                                <a class='btn btn-outline-primary' data-bs-toggle='collapse' href='#csf1' role='button' aria-expanded='false' aria-controls='csf1' style='padding:19px'><i class='fa fa-angle-down'></i></a>
                            </td></tr></table>
                            <div class='collapse' id='csf1'>
                                <div class='card card-body no-shadow border mt-3'>
                                    <div class='row'>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Assistance with Daily Life (Category 1):</b><br>
                                            Covers support for personal activities like showering, dressing, eating, and household tasks.</label><input name='cat1' type='number' value='".$px3["cat1"]."' class='form-control' onchange=\"this.form.core.value = (Number(this.form.cat1.value) + Number(this.form.cat2.value) + Number(this.form.cat3.value) + Number(this.form.cat4.value)); this.form.submit();\">
                                        </div></div>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Transport (Category 2):</b><br>
                                            Helps participants travel to school, work, and other community activities.</label><input name='cat2' type='number' value='".$px3["cat2"]."' class='form-control' onchange=\"this.form.core.value = (Number(this.form.cat1.value) + Number(this.form.cat2.value) + Number(this.form.cat3.value) + Number(this.form.cat4.value)); this.form.submit();\">
                                        </div></div>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Consumables (Category 3):</b><br>
                                            Funds everyday items like continence products and low-cost assistive technology.</label><input name='cat3' type='number' value='".$px3["cat3"]."' class='form-control' onchange=\"this.form.core.value = (Number(this.form.cat1.value) + Number(this.form.cat2.value) + Number(this.form.cat3.value) + Number(this.form.cat4.value)); this.form.submit();\">
                                        </div></div>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Assistance with Social, Economic, and Community Participation (Category 4):</b><br>
                                            Supports participation in community activities, social groups, and recreational events.</label><input name='cat4' type='number' value='".$px3["cat4"]."' class='form-control' onchange=\"this.form.core.value = (Number(this.form.cat1.value) + Number(this.form.cat2.value) + Number(this.form.cat3.value) + Number(this.form.cat4.value)); this.form.submit();\">
                                        </div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class='card-body'>
                            <table style='width:100%'><tr><td align=left>
                                <a data-bs-toggle='collapse' href='#cbs' role='button' aria-expanded='false' aria-controls='cbs'>
                                    <label class='mb-3 top-label'><input class='form-control' type='number' name='capacity'  value='".$px3["capacity"]."' readonly /><span >Capacity Building Supports</span></label>
                                </a>
                            </td><td align='right' style='width:50px' valign=top>
                                <a class='btn btn-outline-primary' data-bs-toggle='collapse' href='#cbs' role='button' aria-expanded='false' aria-controls='cbs' style='padding:19px'>
                                    <i class='fa fa-angle-down'></i>
                                </a>
                            </td></tr></table>
                            <div class='collapse' id='cbs'>
                                <div class='card card-body no-shadow border mt-3'>
                                    <div class='row'>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Support Coordination (Category 7):</b><br>
                                            Helps participants manage and use their NDIS plan effectively.</label><input name='cat7' type='number' value='".$px3["cat7"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                        </div></div>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Living Arrangements (Category 8):</b><br>
                                            Helps find and maintain suitable housing.</label><input name='cat8' type='number' value='".$px3["cat8"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                        </div></div>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Increased Social and Community Participation (Category 9):</b><br>
                                            Develops life skills to engage in social and community activities.</label><input name='cat9' type='number' value='".$px3["cat9"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                        </div></div>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Finding and Keeping a Job (Category 10):</b><br>
                                            Employment-related support, job training, and career assistance.</label><input name='cat10' type='number' value='".$px3["cat10"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                        </div></div>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Relationships (Category 11):</b><br>
                                            Behavioral support and social skill development.</label><input name='cat11' type='number' value='".$px3["cat11"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                        </div></div>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Health and Wellbeing (Category 12):</b><br>
                                            Covers exercise physiology, dietitian services, and health-related activities.</label><input name='cat12' type='number' value='".$px3["cat12"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                        </div></div>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Learning (Category 13):</b><br>
                                            Supports education and skill development.</label><input name='cat13' type='number' value='".$px3["cat13"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                        </div></div>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Life Choices (Category 14):</b><br>
                                            Includes plan management services.</label><input name='cat14' type='number' value='".$px3["cat14"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                        </div></div>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Daily Living (Category 15):</b><br>
                                            Covers therapies like occupational therapy (OT), speech therapy, and psychology.</label><input name='cat15' type='number' value='".$px3["cat15"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                        </div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class='card-body'>
                            <table style='width:100%'><tr><td align=left>
                                <a data-bs-toggle='collapse' href='#csf2' role='button' aria-expanded='false' aria-controls='csf2'>
                                    <label class='mb-3 top-label'><input class='form-control' type='number' name='capital'  value='".$px3["capital"]."' readonly /><span >Capital Supports Funding</span></label>
                                </a>
                            </td><td align='right' style='width:50px' valign=top>
                                <a class='btn btn-outline-primary' data-bs-toggle='collapse' href='#csf2' role='button' aria-expanded='false' aria-controls='csf2' style='padding:19px'><i class='fa fa-angle-down'></i></a>
                            </td></tr></table>
                            <div class='collapse' id='csf2'>
                                <div class='card card-body no-shadow border mt-3'>
                                    <div class='row'>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Assistive Technology (Category 5):</b><br>
                                            Includes mobility aids, communication devices, prosthetics, and wheelchairs.</label><input name='cat5' type='number' value='".$px3["cat5"]."' class='form-control' onchange=\"this.form.capital.value = (Number(this.form.cat5.value) + Number(this.form.cat6.value) + Number(this.form.sda.value)); this.form.submit();\">
                                        </div></div>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Home Modifications (Category 6):</b><br>
                                            Funds structural changes to make homes more accessible, such as installing ramps, bathroom modifications, and smart home technology.</label><input name='cat6' type='number' value='".$px3["cat6"]."' class='form-control' onchange=\"this.form.capital.value = (Number(this.form.cat5.value) + Number(this.form.cat6.value) + Number(this.form.sda.value)); this.form.submit();\">
                                        </div></div>
                                        <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Specialist Disability Accommodation (SDA):</b><br>
                                            Covers housing for participants with high support needs.</label><input name='sda' type='number' value='".$px3["sda"]."' class='form-control' onchange=\"this.form.capital.value = (Number(this.form.cat5.value) + Number(this.form.cat6.value) + Number(this.form.sda.value)); this.form.submit();\">
                                        </div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>";
                
                /*
                <section class='scroll-section' id='stripedRows'>
                    <div class='card mb-5'>
                        <div class='card-body' >
                            <div class='row'>
                                <input type='hidden' name='processor' value='categorized_budgeting'><input type='hidden' name='pid' value='".$px3["id"]."'>
                                
                                <div class='col-md-12'><h3>Core Supports Funding</h3><hr></div>";
                                
                                echo"<div class='col-md-12'><label class='mb-3 top-label'><input class='form-control' type='number' name='core'  value='".$px3["core"]."' readonly /><span >Core Supports Funding</span></label></div>";
                                
                                echo"<div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Assistance with Daily Life (Category 1):</b><br>
                                    Covers support for personal activities like showering, dressing, eating, and household tasks.</label><input name='cat1' type='number' value='".$px3["cat1"]."' class='form-control' onchange=\"this.form.core.value = (Number(this.form.cat1.value) + Number(this.form.cat2.value) + Number(this.form.cat3.value) + Number(this.form.cat4.value)); this.form.submit();\">
                                </div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Transport (Category 2):</b><br>
                                    Helps participants travel to school, work, and other community activities.</label><input name='cat2' type='number' value='".$px3["cat2"]."' class='form-control' onchange=\"this.form.core.value = (Number(this.form.cat1.value) + Number(this.form.cat2.value) + Number(this.form.cat3.value) + Number(this.form.cat4.value)); this.form.submit();\">
                                </div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Consumables (Category 3):</b><br>
                                    Funds everyday items like continence products and low-cost assistive technology.</label><input name='cat3' type='number' value='".$px3["cat3"]."' class='form-control' onchange=\"this.form.core.value = (Number(this.form.cat1.value) + Number(this.form.cat2.value) + Number(this.form.cat3.value) + Number(this.form.cat4.value)); this.form.submit();\">
                                </div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Assistance with Social, Economic, and Community Participation (Category 4):</b><br>
                                    Supports participation in community activities, social groups, and recreational events.</label><input name='cat4' type='number' value='".$px3["cat4"]."' class='form-control' onchange=\"this.form.core.value = (Number(this.form.cat1.value) + Number(this.form.cat2.value) + Number(this.form.cat3.value) + Number(this.form.cat4.value)); this.form.submit();\">
                                </div></div>
                                
                                <div class='col-md-12'><br><br><h3>Capacity Building Supports</h3><hr></div>";
                                
                                echo"<div class='col-md-12'><label class='mb-3 top-label'><input class='form-control' type='number' name='capacity'  value='".$px3["capacity"]."' readonly /><span >Capacity Building Supports</span></label></div>";
                                
                                echo"<div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Support Coordination (Category 7):</b><br>
                                    Helps participants manage and use their NDIS plan effectively.</label><input name='cat7' type='number' value='".$px3["cat7"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                </div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Living Arrangements (Category 8):</b><br>
                                    Helps find and maintain suitable housing.</label><input name='cat8' type='number' value='".$px3["cat8"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                </div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Increased Social and Community Participation (Category 9):</b><br>
                                    Develops life skills to engage in social and community activities.</label><input name='cat9' type='number' value='".$px3["cat9"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                </div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Finding and Keeping a Job (Category 10):</b><br>
                                    Employment-related support, job training, and career assistance.</label><input name='cat10' type='number' value='".$px3["cat10"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                </div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Relationships (Category 11):</b><br>
                                    Behavioral support and social skill development.</label><input name='cat11' type='number' value='".$px3["cat11"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                </div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Health and Wellbeing (Category 12):</b><br>
                                    Covers exercise physiology, dietitian services, and health-related activities.</label><input name='cat12' type='number' value='".$px3["cat12"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                </div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Learning (Category 13):</b><br>
                                    Supports education and skill development.</label><input name='cat13' type='number' value='".$px3["cat13"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                </div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Life Choices (Category 14):</b><br>
                                    Includes plan management services.</label><input name='cat14' type='number' value='".$px3["cat14"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                </div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Improved Daily Living (Category 15):</b><br>
                                    Covers therapies like occupational therapy (OT), speech therapy, and psychology.</label><input name='cat15' type='number' value='".$px3["cat15"]."' class='form-control' onchange=\"this.form.capacity.value = (Number(this.form.cat7.value) + Number(this.form.cat8.value) + Number(this.form.cat9.value) + Number(this.form.cat10.value) + Number(this.form.cat11.value) + Number(this.form.cat12.value) + Number(this.form.cat13.value) + Number(this.form.cat14.value) + Number(this.form.cat15.value)); this.form.submit();\">
                                </div></div>
                                
                                <div class='col-md-12'><br><br><h3>Capital Supports Funding</h3><hr></div>";
                                
                                echo"<div class='col-md-12'><label class='mb-3 top-label'><input class='form-control' type='number' name='capital'  value='".$px3["capital"]."' readonly /><span >Capital Supports Funding</span></label></div>";
                                
                                echo"<div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Assistive Technology (Category 5):</b><br>
                                    Includes mobility aids, communication devices, prosthetics, and wheelchairs.</label><input name='cat5' type='number' value='".$px3["cat5"]."' class='form-control' onchange=\"this.form.capital.value = (Number(this.form.cat5.value) + Number(this.form.cat6.value) + Number(this.form.sda.value)); this.form.submit();\">
                                </div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Home Modifications (Category 6):</b><br>
                                    Funds structural changes to make homes more accessible, such as installing ramps, bathroom modifications, and smart home technology.</label><input name='cat6' type='number' value='".$px3["cat6"]."' class='form-control' onchange=\"this.form.capital.value = (Number(this.form.cat5.value) + Number(this.form.cat6.value) + Number(this.form.sda.value)); this.form.submit();\">
                                </div></div>
                                <div class='col-md-6' style='margin-bottom:25px'><div class='form-group'><label><b>Specialist Disability Accommodation (SDA):</b><br>
                                    Covers housing for participants with high support needs.</label><input name='sda' type='number' value='".$px3["sda"]."' class='form-control' onchange=\"this.form.capital.value = (Number(this.form.cat5.value) + Number(this.form.cat6.value) + Number(this.form.sda.value)); this.form.submit();\">
                                </div></div>
                                
                            <div>
                        </div>
                    </div>
                </section>
                */
            echo"</form>";
            
            echo"<iframe src='blank.php' name='budgetmanagerxz' scrolling='no' style='border: 0px dashed #000000' border='0' frameborder='0' width='5' height='5'>BROWSER NOT SUPPORTED</iframe>";
                        
        } }
    
        include("scripts.php");
        
        ?>
        <script>
            // Wait until DOM is fully loaded
            window.addEventListener('DOMContentLoaded', () => {
                document.body.classList.add('fade-in-loaded');
            });
        </script>
    </body>
</html>
