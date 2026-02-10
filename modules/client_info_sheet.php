<?php
    error_reporting(0);
    include("../authenticator.php");
    
    if(isset($_COOKIE["client_id"])){
        
        include '../aged_care_client_bar.php';
        
    }
    
    echo"<div class='offcanvas-body'>";
    
        if(isset($_COOKIE["client_id"])){
                
            $s1 = "select * from uerp_user where id='".$_COOKIE["client_id"]."' order by id asc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                if(strlen($t1["date"])>=10) $pdate=date("Y-m-d", $t1["date"]);
                else $pdate=null;
                
                if(strlen($t1["jointime"])>=10) $jdate=date("Y-m-d", $t1["jointime"]);
                else $jdate=null;
                
                if(strlen($t1["dob"])>=10) $dob=date("Y-m-d", $t1["dob"]);
                else $dob=null;
                
                $departmentname="";
                $d1 = "select * from departments where id='".$t1["department"]."' order by id asc limit 1";
                $d2 = $conn->query($d1);
                if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $departmentname=$d3["department_name"]; } }
                
                $designationname="";
                $d4 = "select * from designation where id='".$t1["designation"]."' order by id asc limit 1";
                $d5 = $conn->query($d4);
                if ($d5->num_rows > 0) { while($d6 = $d5->fetch_assoc()) { $designationname=$d6["designation"]; } }
            
                $leadername="";
                $d1 = "select * from uerp_user where id='".$t1["team_leader"]."' order by id asc limit 1";
                $d2 = $conn->query($d1);
                if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $leadername="".$d3["username"]."".$d3["username2"]."" ; } }
                
                $openprojects=0;
                $p1 = "select * from project where clientid='".$t1["id"]."' and status='1' order by id asc limit 1";
                $p2 = $conn->query($p1);
                if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { $openprojects=($openprojects+1); } }
                
                $closedprojects=0;
                $p1 = "select * from project where clientid='".$t1["id"]."' and status='5' order by id asc limit 1";
                $p2 = $conn->query($p1);
                if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { $closedprojects=($closedprojects+1); } }
                
                /*                    
                $p1 = "select * from project where id='".$ta3["projectid"]."' order by id asc";
                $p2 = $conn->query($p1);
                if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) {
                    if($p3["status"]=="1") $openprojects=($openprojects+1);                            
                    if($p3["status"]=="5") $closedprojects=($closedprojects+1);
                } }
                $opentasks=0;
                $closedtasks=0;                    
                $ta1 = "select * from tasks where employeeid='".$t1["id"]."' order by id asc";
                $ta2 = $conn->query($ta1);
                if ($ta2->num_rows > 0) { while($ta3 = $ta2->fetch_assoc()) {
                    if($ta3["activity"]!="2") $opentasks=($opentasks+1);                            
                    else $closedtasks=($closedtasks+1);                        
                } }
                */
                
                $uid=$t1["id"];
                $status=$t1["status"];
                if($status==1) $status="ON";
                else $status="OFF";
                
                echo"<div class='row'>
                    <div class='col-12'><h2 class='small-title'>".$t1["username"]." ".$t1["username2"]."`s Info Sheet</h2></div>";
                    $s1 = "select * from leads where clientid='".$_COOKIE["client_id"]."' order by id asc";
                    $r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                    
                        $manager_name=""; 
                        $c1 = "select * from uerp_user where id='".$rs1["employeeid"]."' order by id asc limit 1";
                        $c2 = $conn->query($c1);
                        if ($c2->num_rows > 0) { while($c3 = $c2->fetch_assoc()) { $manager_name="".$c3["username"]." ".$c3["username1"].""; } }
                    
                        $campaign_name=""; 
                        $c11 = "select * from campaigns where id='".$rs1["campaignid"]."' order by id asc limit 1";
                        $c22 = $conn->query($c11);
                        if ($c22->num_rows > 0) { while($c33 = $c22->fetch_assoc()) { $campaign_name=$c33["campaign_name"]; } }
                        
                        $package=$rs1["cpackage"];
                        $startdate=date("d-m-Y",$rs1["start_date"]);
                        $enddate=date("d-m-Y",$rs1["end_date"]);
                        $lockeddate=date("d-m-Y",$rs1["locked_date"]);
                        $budget_balance=$rs1["balanced"];
                        $dob=date("d-m-Y",$rs1["cdob"]);
                        
                        echo"<div class='col-12'>
                            <div class='mb-5'>
                                <div class='card mb-5'>
                                    <div class='card-body'>
                                        <div class='row g-0'>
                                            <div class='col-md-4'><div class='ibox'><div class='ibox-content text-left'>
                                                <h3><u>Lead Manager</u></h3>
                                                <table style='width:100%'>
                                                    <tr><td nowrap width='100px'>Campaign</td></td><td align=center> : </td><td align=left>$campaign_name</td></tr>
                                                    <tr><td nowrap width='100px'>Manager</td><td align=center> : </td><td align=left>$manager_name</td></tr>
                                                </table>
                                            </div></div></div>
                                            <div class='col-md-4'><div class='ibox'><div class='ibox-content text-left'>
                                                <h3><u>Client Data</u></h3>
                                                <table style='width:100%'>
                                                    <tr><td nowrap width='100px'>Date of Birth</td><td align=center> : </td><td align=left>$dob</td></tr>
                                                    <tr><td nowrap width='100px'>Birth Country</td><td align=center> : </td><td align=left>".$rs1["birth_country"]."</td></tr>
                                                    <tr><td nowrap width='100px'>Language</td><td align=center> : </td><td align=left>".$rs1["language"]."</td></tr>
                                                    <tr><td nowrap width='100px'>Can Spoke English?</td><td align=center> : </td><td align=left>".$rs1["english"]."</td></tr>
                                                </table><br>
                                            </div></div></div>
                                            <div class='col-md-4'><div class='ibox'><div class='ibox-content text-left'>
                                                <h3><u>Package & Funding</u></h3>
                                                <table style='width:100%'>
                                                    <tr><td nowrap width='100px'>Default Package</td><td align=center> : </td><td align=left>HCP L-".$rab1["cpackage"]."</td></tr>
                                                    <tr><td nowrap width='100px'>Address</td><td align=center> : </td><td align=left>".$rab1["address"]."</td></tr>
                                                    <tr><td nowrap width='100px'>Contact Number</td><td align=center> : </td><td align=left>".$rab1["phone"]."</td></tr>
                                                    <tr><td nowrap width='100px'>Email Address</td><td align=center> : </td><td align=left>".$rab1["email"]."
                                                </table><br>
                                            </div></div></div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>";
                    } }
                echo"</div>";    
            } }
        }
    echo"</div>";
?>