<?php
    include("auth.php");
    if($uactype=="ADMIN"){
        echo"<div class='content-header'><div><h4 class='content-title card-title'>Social Media Links </h2></div><div> </div></div>
        <form method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
            $s1 = "select * from sms_company_bon where id='1' and status='1' order by id asc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                echo"<input type=hidden name='processor' value='companysetting11'><input type=hidden name='id' value='".$rs1["id"]."'>
                <div class='row border-bottom mb-4 pb-4'>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Facebook</label><input class='form-control' type='text' name='facebook' placeholder='Type here' value='".$rs1["facebook"]."'></div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>X (Twitter)</label><input class='form-control' type='text' name='twitter' placeholder='Type here' value='".$rs1["twitter"]."'></div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Linked IN</label><input class='form-control' type='text' name='linkedin' placeholder='Type here' value='".$rs1["linkedin"]."'></div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Youtube</label><input class='form-control' type='text' name='youtube' placeholder='Type here' value='".$rs1["youtube"]."'></div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Instagram</label><input class='form-control' type='text' name='instagram' placeholder='Type here' value='".$rs1["instagram"]."'></div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Pinterest</label><input class='form-control' type='text' name='pinterest' placeholder='Type here' value='".$rs1["pinterest"]."'></div>

                    <div class='col-md-12' style='margin-top:25px'><button class='btn btn-primary' type='submit'>Update</button> &nbsp; <button class='btn btn-light rounded font-md' type='reset'>Reset</button></div>
                </div>";
            } }
        echo"</form>";
    }
?>