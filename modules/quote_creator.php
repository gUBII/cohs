<?php
    
    if(isset($_COOKIE["userid"])){
        
        include '../authenticator.php';
        
        $formid=0;
        $ra1a = "select * from quotes where employeeid='$userid' and status='15' order by id asc limit 1";
        $rb1a = $conn->query($ra1a);
        if ($rb1a->num_rows > 0) { while($rab1a = $rb1a->fetch_assoc()) { $formid=1; } }
        if($formid==0){
            $sql = "insert into quotes (employeeid,status)VALUES ('$userid','15')";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
        
        $ra1 = "select * from quotes where employeeid='$userid' and status='15' order by id asc limit 1";
        $rb1 = $conn->query($ra1);
        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
            $qid=$rab1["id"];
            $name=$rab1["name"];
            $ndis=$rab1["ndis"];
            $email=$rab1["email"];
            $phone=$rab1["phone"];
            $address=$rab1["address"];
            $city=$rab1["city"];
            $state=$rab1["state"];
            $zip=$rab1["zip"];
            $country=$rab1["country"];
            $status=$rab1["status"];
            $employeeid=$rab1["employeeid"];
            $sessionid = rand(1234567890,9876543210);
            
            echo"<div class='data-table-rows slim' id='sample'>
                <form method='post' name='stage1' action='workspace_processor.php' target='dataprocessor' enctype='multipart/form-data' class='tooltip-end-bottom'>
                    <input type=hidden name='processor' value='quotation_update'><input type=hidden name='id' value='$qid'><hr>
                    <fieldset>
                        <div class='row'>
                            <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>First Name *</label><input name='name' id='firstName' type='text' value='$name' class='form-control' required onchange='this.form.submit()'></div></div>
                            <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>NDIS # *</label><input name='ndis' type='text' value='$ndis' class='form-control' required onchange='this.form.submit()'></div></div>
                            <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>Email *</label><input name='email' type='text' value='$email' class='form-control' required onchange='this.form.submit()'></div></div>
                            <div class='col-6 col-md-3' style='margin-bottom:15px'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='$phone' class='form-control' required onchange='this.form.submit()'></div></div>
                            <div class='col-12 col-md-4' style='margin-bottom:15px'><div class='form-group'><label>Address *</label><input name='address' type='text' value='$address' class='form-control' required onchange='this.form.submit()'></div></div>
                            <div class='col-6 col-md-2' style='margin-bottom:15px'><div class='form-group'><label>City *</label><input name='city' type='text' value='$city' class='form-control' required onchange='this.form.submit()'></div></div>
                            <div class='col-6 col-md-2' style='margin-bottom:15px'><div class='form-group'><label>State *</label><input name='state' type='text' value='$city' class='form-control' required onchange='this.form.submit()'></div></div>
                            <div class='col-6 col-md-2' style='margin-bottom:15px'><div class='form-group'><label>Post Code *</label><input name='zip' type='text' value='$zip' class='form-control' required onchange='this.form.submit()'></div></div>
                            <div class='col-6 col-md-2' style='margin-bottom:25px'><div class='form-group'><label>Country *</label><select class='form-control m-b required' name='country' required onchange='this.form.submit()'><option value='$country'>$country</option>";
                                include 'countries.php';
                            echo"</select></div></div>
                        </div>
                        <h2>Schedule of Supports:</h2>
                        <div class='row'><div class='col-12' style='margin-bottom:15px'><div class='form-group'>
                            <iframe src='workspace_budget_quotation.php?pid=$qid' name='budgetmanagerx' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='800'>BROWSER NOT SUPPORTED</iframe
                        </div></div></div>
                    </fieldset>
                </form>";
                ?> <script>
                    window.onload = function() {
                      document.getElementById("firstName").focus();
                    }
                </script> <?php
                echo"<form method='post' name='stage2' action='workspace_processor.php' target='dataprocessor' enctype='multipart/form-data' class='tooltip-end-bottom'>
                    <input type=hidden name='processor' value='quotation_status_update'><input type=hidden name='id' value='$qid'><hr><center>
                    <button class='btn btn-primary' type='submit' onmouseover='document.stage1.userid.value=document.datafrom.email.value'>Create Quotation</button>
                </center> 
            </div>";
        } }
        
    }
?>