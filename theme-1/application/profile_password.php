<?php
    echo"<div class='content-header'>
        <div><h4 class='content-title card-title'>Password Update </h2></div>
        <div> </div>
    </div>";
    include("../include.php");
    $s1 = "select * from sms_user2 where id='".$_COOKIE["uid"]."' and status='1' order by id asc limit 1";
    $r1 = $conn->query($s1);
    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
        echo"<form method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
            <div class='row'>
                <div class='col-lg-12'>
                    <div class='row gx-3'>
                        <div class='col-4  mb-3'><label class='form-label'>Old Password</label><input class='form-control' type='password' name='oldpass' value=''></div>
                        <div class='col-4 mb-3'><label class='form-label'>New Password</label><input class='form-control' type='password' name='newpass' value=''></div>
                        <div class='col-4  mb-3'><label class='form-label'>Confirm Password</label><input class='form-control' type='password' name='newpass2' value=''></div>
                    </div>
                </div>
            </div><br>
            <input type=hidden name=processor value='passwordupdate'><input type=hidden name=id value='".$rs1["id"]."'>
            <button class='btn btn-primary' type='submit'>Update Password</button>
        </form>";
    } }
?>