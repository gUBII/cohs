<?php
    // dataprocessor03.php
    echo"<br><h4>New Lead Manager</h4>
    <form name='form5' method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>
        <input type='hidden' name='processor' value='createlead'><input type='hidden' name='id' value='1'>
        <div class='row'>
            <div class='col-md-12' >&nbsp;<br></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Campaign Name *</label><input name='campaignid' type='text' value='' class='form-control' required></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Lead Name *</label><input name='lead_name' type='text' value='' class='form-control' required></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Prospect Client Name</label><input name='cname' type='text' value='' style='height:30px' class='form-control' required></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Home/Office Address</label><input name='caddress' type='text' value='' style='height:30px' class='form-control' required></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Email Address</label><input name='cemail' type='email' value='' style='height:30px' class='form-control' required></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Contact Number</label><input name='cphone' type='text' value='' style='height:30px' class='form-control' required></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Follow Up Date</label><input name='fdate' type='date' value='' style='height:30px' class='form-control' required></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Appointment Date</label><input name='adate' type='date' value='' style='height:30px' class='form-control' required></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Target Date</label><input name='tdate' type='date' value='' style='height:30px' class='form-control' required></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Lead Team Leader *</label><select class='form-control m-b ' name='employeeid' required>
                <option value=''>Select Operation Incharge Name</option>";
                if($mtype=="ADMIN") $s77 = "select * from uerp_user where mtype='EMPLOYEE' and status='1' or mtype='USER' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                else $s77 = "select * from uerp_user where id='$userid' and status='1' order by id asc";
                $r77 = $conn->query($s77);
                if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) { echo"<option value='".$rs77["id"]."'>".$rs77["username"]." ".$rs77["username2"]."</option>"; } }
            echo"</select></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Priority *</label><select class='form-control m-b ' name='priority' required>
                <option value=''>Select Priority</option><option value='High'>High</option><option value='Medium'>Medium</option><option value='Low'>Low</option>
            </select></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Status *</label><select class='form-control m-b ' name='status' required>
                <option value='ON'>ON</option><option value='OFF'>OFF</option>
            </select></div></div>
            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Description/Note</label>
                <textarea name='note' class='form-control'></textarea>
            </div></div>
            <div class='col-md-12' style='margin-bottom:25px;text-align:right'>
                <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('walkthrough_data.php?pointer=80', 'datatableXYZ')\">Create Lead</button>
            </div>
        </div>
    </form>";
?>