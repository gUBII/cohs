<?php
$cdate=time();
$cdate=date("Y-m-d", $cdate);    
$cid=$_GET["cid"];
$sheba=$_GET["sheba"];
$utype=$_GET["utype"];

error_reporting(0);

include("../authenticator.php");

echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
<link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
<link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
<link rel='stylesheet' href='font/CS-Interface/style.css' />
<link rel='stylesheet' href='css/vendor/bootstrap.min.css' />
<link rel='stylesheet' href='css/vendor/OverlayScrollbars.min.css' />
<link rel='stylesheet' href='css/vendor/glide.core.min.css' />
<link rel='stylesheet' href='css/vendor/introjs.min.css' />
<link rel='stylesheet' href='css/vendor/select2.min.css' />
<link rel='stylesheet' href='css/vendor/select2-bootstrap4.min.css' />
<link rel='stylesheet' href='css/vendor/datatables.min.css' />
<link rel='stylesheet' href='css/vendor/plyr.css' />
<link rel='stylesheet' href='css/styles.css' />
<link rel='stylesheet' href='css/main.css' />        
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='js/base/loader.js'></script>";

$cid=0;
if(isset($_GET["cid"])) $cid=$_GET["cid"];

echo"<div class='offcanvas-header'>
    <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
    <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
</div>
<div class='offcanvas-body'>";
    if (isset($_GET["smid"])) {
        $r5a = "select * from shifting_allocation where id='".$_GET["smid"]."' and status='1' order by id asc";
        $r5b = $conn->query($r5a);
        if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
            
            $clientname="";
            $r1x = "select * from uerp_user where id='".$r5c['clientid']."' order by id asc limit 1";
            $r1y = $conn->query($r1x);
            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                $clientname="".$r1z["username"]." ".$r1z["username2"]."";  
                $clientlocation="".$r1z["address"].", ".$r1z["city"].", ".$r1z["state"].", ".$r1z["zip"].", ".$r1z["country"]." ";
            } }
            
            $projectname="";
            $r2x = "select * from project where id='".$r5c['projectid']."' order by id asc limit 1";
            $r2y = $conn->query($r2x);
            if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) { $projectname=$r2z["name"]; } }
            
            $employeename="";
            $r3x = "select * from uerp_user where id='".$r5c['employeeid']."' order by id asc limit 1";
            $r3y = $conn->query($r3x);
            if ($r3y->num_rows > 0) { while($r3z = $r3y -> fetch_assoc()) { $employeename="".$r3z["username"]." ".$r3z["username2"]."";  } }
            
            $stime=substr($r5c['stime'],11,5);
            $etime=substr($r5c['etime'],11,5);
            $stime1=substr($r5c['stime'],0,10);
            $etime1=substr($r5c['etime'],0,10);
            
            $stime2=substr($r5c['stime'],8,2);
            
            $statuscolor="black";
            if($r5c["accepted"]=="0") $statuscolor="grey";
            if($r5c["accepted"]=="1") $statuscolor="lightgreen";
            if($r5c["accepted"]=="2") $statuscolor="orange";
            if($r5c["accepted"]=="3") $statuscolor="yellow";
            
            $empid=$r5c['employeeid'];
            $datatarget="$empid$stime1";
            $getData="getData$stime2";
            
            echo"<br><br><br><br><center>
                <div class='btn btn-warning'>
                    <i class='fa fa-clock-o'></i> <span style='font-size:10pt'>".$_GET["smid"]." - $stime - $etime</span> <span style='font-size:8pt'>$clientname @ $projectname</span>
                </div>
                <hr>
                <a class='btn btn-success' href='dataprocessor.php?processor=shiftapprove&shiftid=".$r5c["id"]."&url=".$_GET["url"]."&src_employeeid=".$_GET["src_employeeid"]."&id=".$_GET["id"]."&status=1&gogo=1' target='dataprocessor' onmouseout=\"$getData('$empid', '$datatarget')\" data-bs-dismiss='offcanvas'>Accept This Schedule</a>
            </center>";
            
            /*
            echo"<div class='tabs-container'>
                <ul class='nav nav-tabs' role='tablist'>
                    <li><a class='nav-link active' data-toggle='tab' href='#tab-100'>Request Re-Schedule</a></li>
                </ul>
                <div class='tab-content'>
                    <div role='tabpanel' id='tab-100' class='tab-pane active'>
                        <div class='panel-body'>
                            <form class='m-t' role='form' method='post' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='processor' value='schedulerequest'><input type='hidden' name='id' value='".$r5c["id"]."'>
                                <input type='hidden' name='stime1' value='$stime1'><input type='hidden' name='etime1' value='$etime1'>
                                <div class='modal-body'>
                                    <div class='row'>
                            		    <div class='col-md-6'><div class='form-group'>
                            			    <label>Support Worker *</label>
                            				<select class='form-control m-b ' name='employeeid' required><option value='".$r5c['employeeid']."'>$employeename</option></select>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                            			    <label>Participant *</label>
                            				<select class='form-control m-b ' name='employeeid' required><option value='".$r5c['clientid']."'>$clientname</option></select>
                                        </div></div>
                                        <div class='col-md-12'><div class='form-group'>
                            			    <label>Location *</label>
                            			    <input type=text class='form-control m-b ' name='clientlocation' readonly value='".$r5c['address']."'>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                            			    <label>Clock In *</label>
                            			    <input type='time' id='datepicker' name='stime' class='form-control' value='$stime'>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                            			    <label>Clock Out *</label>
                            			    <input type='time' name='etime' class='form-control' value='$etime'>
                                        </div></div>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-white' data-dismiss='modal'>Close</button>
                                    <input type='submit' class='btn btn-primary' value='Submit Request' onmouseout=\"$getData('$empid', '$datatarget')\">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>";
            */
        } }
    }
echo"</div>";

?>

    <script src="js/vendor/jquery-3.5.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/OverlayScrollbars.min.js"></script>
    <script src="js/vendor/autoComplete.min.js"></script>
    <script src="js/vendor/clamp.min.js"></script>
    <script src="icon/acorn-icons.js"></script>
    <script src="icon/acorn-icons-interface.js"></script>
    <script src="js/vendor/Chart.bundle.min.js"></script>
    <script src="js/base/helpers.js"></script>
    <script src="js/base/globals.js"></script>
    <script src="js/base/nav.js"></script>
    <script src="js/base/search.js"></script>
    <script src="js/base/settings.js"></script>
    <script src="js/cs/charts.extend.js"></script>
    <script src="js/pages/profile.standard.js"></script>
    <script src="js/common.js"></script>
    <script src="js/scripts.js"></script>
    
    
    
    
    
<?php    
    /*
    if (isset($_GET["smid"])) {
        $r5a = "select * from shifting_allocation where id='".$_GET["smid"]."' and status='1' order by id asc";
        $r5b = $conn->query($r5a);
        if ($r5b->num_rows > 0) { while($r5c = $r5b -> fetch_assoc()) {
            
            $clientname="";
            $r1x = "select * from uerp_user where id='".$r5c['clientid']."' order by id asc limit 1";
            $r1y = $conn->query($r1x);
            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                $clientname="".$r1z["username"]." ".$r1z["username2"]."";  
                $clientlocation="".$r1z["address"].", ".$r1z["city"].", ".$r1z["state"].", ".$r1z["zip"].", ".$r1z["country"]." ";
            } }
            
            $projectname="";
            $r2x = "select * from project where id='".$r5c['projectid']."' order by id asc limit 1";
            $r2y = $conn->query($r2x);
            if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) { $projectname=$r2z["name"]; } }
            
            $employeename="";
            $r3x = "select * from uerp_user where id='".$r5c['employeeid']."' order by id asc limit 1";
            $r3y = $conn->query($r3x);
            if ($r3y->num_rows > 0) { while($r3z = $r3y -> fetch_assoc()) { $employeename="".$r3z["username"]." ".$r3z["username2"]."";  } }
            
            $stime=substr($r5c['stime'],11,5);
            $etime=substr($r5c['etime'],11,5);
            $stime1=substr($r5c['stime'],0,10);
            $etime1=substr($r5c['etime'],0,10);
            
            $stime2=substr($r5c['stime'],8,2);
            
            $statuscolor="black";
            if($r5c["accepted"]=="0") $statuscolor="grey";
            if($r5c["accepted"]=="1") $statuscolor="lightgreen";
            if($r5c["accepted"]=="2") $statuscolor="orange";
            if($r5c["accepted"]=="3") $statuscolor="yellow";
            
            $empid=$r5c['employeeid'];
            $datatarget="$empid$stime1";
            $getData="getData$stime2";
            
            echo"<br><table style='width:100%'><tr>
                <td style='padding:0px;text-align:center;font-size:12pt;'>
                    <div class='btn' style='color:white;background-color:".$r5c["color"].";width:90%;text-align:left'>
                    <i class='fa fa-clock-o'></i> <span style='font-size:10pt'>$stime - $etime</span> <span style='font-size:8pt'>$clientname @ $projectname</span>
                    </div>
                </td>
            </tr></table><hr>";
            
            echo"<br><table style='width:100%'><tr>
                <td style='padding:0px;text-align:center;width:100px'>
                    <a class='btn btn-success' href='dataprocessor.php?processor=shiftapprove&shiftid=".$r5c["id"]."&status=1&gogo=1' target='dataprocessor' onmouseout=\"$getData('$empid', '$datatarget')\" style='height:60px;width:200px;font-size:20pt'>Accept</a>
                </td>
                
            </tr></table><hr>";
            /*
            echo"<div class='tabs-container'>
                <ul class='nav nav-tabs' role='tablist'>
                    <li><a class='nav-link active' data-toggle='tab' href='#tab-100'>Request Re-Schedule</a></li>
                </ul>
                <div class='tab-content'>
                    <div role='tabpanel' id='tab-100' class='tab-pane active'>
                        <div class='panel-body'>
                            <form class='m-t' role='form' method='post' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                                <input type='hidden' name='processor' value='schedulerequest'><input type='hidden' name='id' value='".$r5c["id"]."'>
                                <input type='hidden' name='stime1' value='$stime1'><input type='hidden' name='etime1' value='$etime1'>
                                <div class='modal-body'>
                                    <div class='row'>
                            		    <div class='col-md-6'><div class='form-group'>
                            			    <label>Support Worker *</label>
                            				<select class='form-control m-b ' name='employeeid' required><option value='".$r5c['employeeid']."'>$employeename</option></select>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                            			    <label>Participant *</label>
                            				<select class='form-control m-b ' name='employeeid' required><option value='".$r5c['clientid']."'>$clientname</option></select>
                                        </div></div>
                                        <div class='col-md-12'><div class='form-group'>
                            			    <label>Location *</label>
                            			    <input type=text class='form-control m-b ' name='clientlocation' readonly value='".$r5c['address']."'>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                            			    <label>Clock In *</label>
                            			    <input type='time' id='datepicker' name='stime' class='form-control' value='$stime'>
                                        </div></div>
                                        <div class='col-md-6'><div class='form-group'>
                            			    <label>Clock Out *</label>
                            			    <input type='time' name='etime' class='form-control' value='$etime'>
                                        </div></div>
                                    </div>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-white' data-dismiss='modal'>Close</button>
                                    <input type='submit' class='btn btn-primary' value='Submit Request' onmouseout=\"$getData('$empid', '$datatarget')\">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>";
            *//*
        } }
    }
    */
?>