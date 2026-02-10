<?php
    echo"<Br><h4>New Project Manager</h4>
    <form name='form5' method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>
        <input type='hidden' name='processor' value='createproject'><input type='hidden' name='id' value='1'>
        <div class='row'>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Project Name *</label><input name='name' type='text' value='' class='form-control' required></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Client Name *</label><select class='form-control m-b ' name='clientid' required>
                <option value=''>Select Client Name</option>";
                $s77 = "select * from uerp_user where mtype='CLIENT' and status='1' order by id asc";
                $r77 = $conn->query($s77);
                if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) { echo"<option value='".$rs77["id"]."'>".$rs77["username"]." ".$rs77["username2"]."</option>"; } }
            echo"</select></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Team Leader *</label><select class='form-control m-b ' name='teamleaderid' required>
                <option value=''>Select Team Leader Name</option>";
                $s7 = "select * from uerp_user where mtype='EMPLOYEE' and status='1' OR mtype='USER' and status='1' OR mtype='ADMIN' and status='1' order by id asc";
                $r7 = $conn->query($s7);
                if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
            echo"</select></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Clock-In Time *</label><input name='stime' type='time' value='08:00' class='form-control' required></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Clock-Out Time *</label><input name='etime' type='time' value='17:00' class='form-control' required></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Color</label><input name='pcolor' type='color' value='#CCCCCC' style='height:30px' class='form-control' required></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Contact Value *</label><input name='rate' type='text' value='' class='form-control' required></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Contract Type *</label><select class='form-control m-b ' name='type' required>
                <option value=''>Select Contract Type</option><option value='Hourly'>Hourly</option><option value='Fixed'>Fixed</option>
            </select></div></div>
            <div class='col-md-4' style='margin-bottom:25px'><div class='form-group'><label>Priority *</label><select class='form-control m-b ' name='priority' required>
                <option value=''>Select Priority</option><option value='High'>High</option><option value='Medium'>Medium</option><option value='Low'>Low</option>
            </select></div></div>
            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Support Co-ordinator *</label>
                <textarea name='leaderid' class='form-control'></textarea>
            </div></div>
            <div class='col-md-12' style='margin-bottom:25px'><div class='form-group'><label>Description/Note</label>
                <textarea name='note' class='form-control'></textarea>
            </div></div>
            <div class='col-md-12' style='margin-bottom:25px;text-align:right'>
                <button class='btn btn-primary' type='submit'>Create Project</button>
            </div>
        </div>
    </form>";
?>