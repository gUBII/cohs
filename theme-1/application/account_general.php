<?php
    include("auth.php");
    if($uactype=="ADMIN"){
        echo"<div class='content-header'><div><h4 class='content-title card-title'>General Setting </h2></div><div> </div></div>
        <form method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
            $s1 = "select * from sms_company_bon where id='1' and status='1' order by id asc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                echo"<input type=hidden name='processor' value='companysetting'><input type=hidden name='id' value='".$rs1["id"]."'>
                <div class='row border-bottom mb-4 pb-4'>
                    <div class='col-md-12'><label class='form-label'>Company Name</label><input class='form-control' type='text' name='cname' placeholder='Type here' value='".$rs1["cname"]."'></div>
                    <div class='col-md-12' style='margin-top:15px'><label class='form-label'>Address</label><input class='form-control' type='text' name='caddress' placeholder='Type here' value='".$rs1["address"]."'></div>
                    <div class='col-md-4' style='margin-top:15px'><label class='form-label'>City</label><input class='form-control' type='text' name='ccity' placeholder='Type here' value='".$rs1["city"]."'></div>
                    <div class='col-md-4' style='margin-top:15px'><label class='form-label'>State</label><input class='form-control' type='text' name='cstate' placeholder='Type here' value='".$rs1["state"]."'></div>
                    <div class='col-md-4' style='margin-top:15px'><label class='form-label'>Zip</label><input class='form-control' type='text' name='czip' placeholder='Type here' value='".$rs1["zip"]."'></div>
                    <div class='col-md-4' style='margin-top:15px'><label class='form-label'>Country</label><input class='form-control' type='text' name='ccountry' placeholder='Type here' value='".$rs1["country"]."'></div>
                    <div class='col-md-12' style='margin-top:15px'><hr></div>
                    <div class='col-md-4' style='margin-top:15px'><label class='form-label'>Phone</label><input class='form-control' type='text' name='cphone' placeholder='Type here' value='".$rs1["phone"]."'></div>
                    <div class='col-md-4' style='margin-top:15px'><label class='form-label'>Email</label><input class='form-control' type='text' name='cemail' placeholder='Type here' value='".$rs1["email"]."'></div>
                    <div class='col-md-4' style='margin-top:15px'><label class='form-label'>Service Hours</label><input class='form-control' type='text' name='cservicehours' placeholder='Type here' value='".$rs1["servicehours"]."'></div>
                    <div class='col-md-12' style='margin-top:15px'><hr></div>
                    <div class='col-md-4' style='margin-top:15px'><label class='form-label'>TIN #</label><input class='form-control' type='text' name='ctin' placeholder='Type here' value='".$rs1["tin"]."'></div>
                    <div class='col-md-4' style='margin-top:15px'><label class='form-label'>VAT #</label><input class='form-control' type='text' name='cvat' placeholder='Type here' value='".$rs1["vat"]."'></div>
                    <div class='col-md-4' style='margin-top:15px'><label class='form-label'>Trade License #</label><input class='form-control' type='text' name='clicense' placeholder='Type here' value='".$rs1["license"]."'></div>
                    <div class='col-md-12' style='margin-top:15px'><hr></div>
                    <div class='col-md-12' style='margin-top:15px'><button class='btn btn-primary' type='submit'>Update</button> &nbsp; <button class='btn btn-light rounded font-md' type='reset'>Reset</button></div>
                </div>";
            } }
        echo"</form>";
    }
?>