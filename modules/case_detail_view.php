<!--- 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<style>
    body {
        font-family: 'Roboto', serif;
        font-size: 10px;
    }
</style>
--->
<?php

    include("../authenticator.php");
        
    if($mtype=="ADMIN") $ra1 = "select * from casenote where id='".$_GET["postid"]."' and status='1' order by id desc";
    else $ra1 = "select * from casenote where id='".$_GET["postid"]."' and employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
    $rb1 = $conn->query($ra1);
    if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
        
        $post_date=date("d/m/Y", $rab1["pdate"]);
        $post_date1=date("d/m/Y", $rab1["date1"]);
        $post_date2=date("d/m/Y", $rab1["date2"]);
        
        $clientname="";
        $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id desc limit 1";
        $rb2 = $conn->query($ra2);
        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
            $clientname1= $rab2["username"];
            $clientname2= $rab2["username2"];
            $clientphone= $rab2["phone"];
            $clientemail= $rab2["email"];
        } }
        
        $employeeid="";
        $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id desc limit 1";
        $rb2 = $conn->query($ra2);
        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
            $employeename1= $rab2["username"];
            $employeename2= $rab2["username2"];
            $employeephone= $rab2["phone"];
            $employeeemail= $rab2["email"];
            $ra22 = "select * from designation where id='".$rab2["designation"]."' order by id desc limit 1";
            $rb22 = $conn->query($ra22);
            if ($rb22->num_rows > 0) { while($rab22 = $rb22->fetch_assoc()) { $designation1=$rab22["designation"]; } }
            
            $ra33 = "select * from departments where id='".$rab2["department"]."' order by id desc limit 1";
            $rb33 = $conn->query($ra33);
            if ($rb33->num_rows > 0) { while($rab33 = $rb33->fetch_assoc()) { $department1=$rab33["department_name"]; } }
            
        } }
        
        echo"<div class='offcanvas-header'>
            <h5 id='offcanvasTopLabel'>Case Report: ID-".$_GET["postid"]."</h5>
            <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
        </div>
        <div class='offcanvas-body'>
            <div style='padding:20px' id='printArea'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <span style='font-size:14pt'><b>Report Information</b></span><hr>
                        <span style='font-size:12pt'>
                            <table>
                                <tr><td>Client Name<b></td><td>:</td><td>$clientname1 $clientname2</td></tr>
                                <tr><td>Week<b></td><td>:</td><td><b>$post_date1 – $post_date2</b></td></tr>
                                <tr><td>Reporter<b></td><td>:</td><td><b>$employeename1 $employeename2</b></td></tr>
                                <tr><td>Case Type<b></td><td>:</td><td><b>".$rab1["type"]."</b></td></tr>
                                <tr><td colspan=10><hr></td></tr>
                                <tr><td>Detailed Account<b></td><td>:</td><td></td></tr>
                                <tr><td colspan=10>".$rab1["note"]."</td></tr>
                                <tr><td colspan=10><hr></td></tr>
                                <tr><td colspan=10>";
                                    $t=0;
                                    $ra3 = "select * from multi_image where postid='".$rab1["id"]."' and sessionid='".$rab1["sessionid"]."' and status='1' order by id desc";
                                    $rb3 = $conn->query($ra3);
                                    if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) { 
                                        $t=($t+1);
                                        echo"[ <a href='".$rab3["location"]."' target='_blank'>View Document $t</a> ] - ";
                                    } }
                                echo"</td></tr>
                                <tr><td colspan=10><hr></td></tr>
                                <tr><td>Report Prepared By</td><td>:</td><td></td></tr>
                                <tr><td>Name</td><td>:</td><td><b>$employeename1 $employeename2</b></td></tr>
                                <tr><td>Position</td><td>:</td><td><b>$designation1 & $department1, Good Will Care Pty Ltd</b></td></tr>
                                <tr><td>Post Date</td><td>:</td><td><b>$post_date</b></td></tr>
                            </table>
                        </span>
                    </div>
                    
                </div>
            </div>
            <center>
                <button type='button' class='btn btn-primary' onclick=\"printDiv('printArea')\">Print Report</button><br><br><br><br><br><br>
            </center>
        </div>";
    } }
    
