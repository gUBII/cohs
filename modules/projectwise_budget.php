<style>
        #grad1 {
            background-color: red;
            background-image: linear-gradient(128deg, #121212, red); 
        }
        .typewriter h1 {
          color: #fff;
          overflow: hidden;
          border-right: .15em solid black;
          white-space: nowrap;
          margin: 0 auto;
          
          animation: 
            typing 3.5s steps(30, end),
            blink-caret .5s step-end infinite;
        }
        .typewriter h2 {
          color: #fff;
          overflow: hidden;
          /* border-right: .15em solid black; */
          white-space: nowrap;
          margin: 0 auto;
          
          animation: 
            typing 3.5s steps(30, end),
            blink-caret .5s step-end infinite;
        }
        
        /* The typing effect */
        @keyframes typing {
          from { width: 0 }
          to { width: 100% }
        }
        
        /* The typewriter cursor effect */
        @keyframes blink-caret {
          from, to { border-color: transparent }
          50% { border-color: orange }
        }
    </style>
    
<?php
    
    /*
    unset($_COOKIE["ws_fname"]);
    setcookie("ws_fname", "", time() -99999);
    unset($_COOKIE["ws_lname"]);
    setcookie("ws_lname", "", time() -99999);
    unset($_COOKIE["ws_email"]);
    setcookie("ws_email", "", time() -99999);
    */
    
    include("head-light.php");
    
    $sheba="workspace";
    $cid=90001;
    $title="Add New Workspace";
    $utype="Workspace";
    
    echo"<div class='data-table-rows slim' id='sample'>
        <div class='data-table-responsive-wrapper'id='datatableX'><center>
            <div class='d-flex justify-content-center align-items-center shadow-deep py-5 ' style='border-radius:10px'>
                <div class='sw-lg-100' style='padding:5px;text-align:left;width:100%'>
                    <table style='width:100%'><tr>
                        <td><h2>Categorized Budgeting</h2></td>
                        <td style='' align=right>";
                            if(isset($_COOKIE["b_project"])){
                                $p1 = "select * from project where id='".$_COOKIE["b_project"]."' order by name asc limit 1";
                                $p2 = $conn->query($p1);
                                if ($p2->num_rows > 0) { while($p3 = $p2 -> fetch_assoc()) {
                                    $cn="";
                                    $c1 = "select * from uerp_user where id='".$p3["clientid"]."' order by id asc limit 1";
                                    $c2 = $conn->query($c1);
                                    if ($c2->num_rows > 0) { while($c3 = $c2 -> fetch_assoc()) {  $cn="".$c3["username"]." ".$c3["username2"].""; } }
                                    $projectname="";
                                    $projectname="".$p3["name"]." @ $cn";
                                } }
                            }
                            
                            echo"<form method='post' name='stage1' action='workspace_processor.php' target='dataprocessor' enctype='multipart/form-data'class='tooltip-end-bottom'>
                                <input type=hidden name='processor' value='budget_project_select'><input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'>
                                <table><tr>
                                    <td style='width:200px'>
                                        <select class='form-control m-b required' name='b_project' required>";
                                            if(isset($_COOKIE["b_project"])) echo"<option value='".$_COOKIE["b_project"]."'>$projectname</option>";
                                            else echo"<option value=''>Select Client Under Project</option>";
                                            $wsp1 = "select * from project where status='1' order by name asc";
                                            $wsp2 = $conn->query($wsp1);
                                            if ($wsp2->num_rows > 0) { while($wsp3 = $wsp2 -> fetch_assoc()) {
                                                $cname="";
                                                $wsp1x = "select * from uerp_user where id='".$wsp3["clientid"]."' order by id asc limit 1";
                                                $wsp2x = $conn->query($wsp1x);
                                                if ($wsp2x->num_rows > 0) { while($px3x = $wsp2x -> fetch_assoc()) {  $cname="".$px3x["username"]." ".$px3x["username2"].""; } }
                                                echo"<option value='".$wsp3["id"]."'>".$wsp3["id"]." @ $cname</option>";
                                            } }
                                        echo"</select>
                                    </td><td>
                                        <button class='btn btn-primary' type='submit' >Go</button>
                                    </td>
                                </tr></table>
                            </form>";
                        echo"</td>
                    </tr></table>
                    
                    <form method='post' name='stage2' action='workspace_processor.php' target='dataprocessor' enctype='multipart/form-data' class='tooltip-end-bottom'>
                        <div class='row'>";
                            $px1 = "select * from project where id='".$_COOKIE["b_project"]."' order by id desc limit 1";
                            $px2 = $conn->query($px1);
                            if ($px2->num_rows > 0) { while($px3 = $px2 -> fetch_assoc()) {  
                                echo"<input type='hidden' name='processor' value='categorized_budgeting'><input type='hidden' name='pid' value='".$px3["id"]."'>
                                <div class='col-md-12'><hr><h2>Capital Supports Funding</h2><hr></div>
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
                                    <button class='btn btn-icon btn-icon-start btn-primary' type='submit' onclick='this.form.submit();'><i data-acorn-icon='login'></i><span> Submit Budget</span></button>
                                </div></div>";
                                
                            } }
                        echo"<div>
                    </form>
                </div>
            </div>
        </div>
    </div>";
?>
    