<?php
    
    include '../authenticator.php';
    
    echo"<div class='data-table-rows slim' id='sample'>";
        $ra1 = "select * from project where id='".$_COOKIE["projectidx"]."' and status='1' order by id asc limit 1";
        $rb1 = $conn->query($ra1);
        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
            echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' target='dataprocessor' enctype='multipart/form-data'>
                <input type='hidden' name='processor' value='updateprojectemergency'><input type='hidden' name='id' value='".$rab1["id"]."'>
                <fieldset>
                    <div class='row'>
                        <div class='col-12 col-md-12'><br><div class='form-group'>
                            <label>Main Emergency Contact</label><textarea name='main_emergency_contact' class='form-control'>".$rab1["main_emergency_contact"]."</textarea>
                        </div></div>
                        <div class='col-12 col-md-12'><br><div class='form-group'>
                            <label>Enduring Power of Attorney</label><textarea name='enduring_power_of_attorney' class='form-control'>".$rab1["enduring_power_of_attorney"]."</textarea>
                        </div></div>
                        <div class='col-12 col-md-12'><br><div class='form-group'>
                            <label>GP Details</label><textarea name='gp_details' class='form-control'>".$rab1["gp_details"]."</textarea>
                        </div></div>
                        <div class='col-12 col-md-12'><br><div class='form-group'>
                            <label>Medical Information</label><textarea name='medical_information' class='form-control'>".$rab1["medical_information"]."</textarea>
                        </div></div>
                        <div class='col-12 col-md-12'><br><div class='form-group'>
                            <label>Access Data</label><textarea name='access_data' class='form-control'>".$rab1["access_data"]."</textarea>
                        </div></div>
                        <div class='col-12 col-md-12'><br><div class='form-group'>
                            <label>Advance Care Plan</label><textarea name='advance_care_plan' class='form-control'>".$rab1["advance_care_plan"]."</textarea>
                        </div></div>
                        <div class='col-12 col-md-12'><div class='form-group'><label>&nbsp; </label><Br>
                            <input type='submit' class='btn btn-icon btn-icon-start btn-outline-primary' data-style='expand-right' value='Update' onclick=\"setTimeout(function(){ shiftdataV2('projects_client_emergency_plan.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 5000);\">
                        </div></div>
                    </div>
                </fieldset>
            </form>
            <br><br>";
        } }
    echo"</div>";
?>