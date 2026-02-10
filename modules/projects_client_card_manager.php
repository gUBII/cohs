<?php
    
    // if(isset($_COOKIE["client_id"])){
        
        include '../authenticator.php';
        
        $clientid=0;
        $ra1 = "select * from project where id='".$_COOKIE["projectidx"]."' and status='1' order by id asc limit 1";
        $rb1 = $conn->query($ra1);
        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
            $sdate=date("d.m.Y",$rab1["start_date"]);
            $edate=date("d.m.Y",$rab1["end_date"]);
            $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id asc limit 1";
            $rb2 = $conn->query($ra2);
            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                $clientid=$rab2["id"];
                $clientname1=$rab2["username"];
                $clientname2=$rab2["username2"];
                if (!file_exists($rab2["images"]) || empty($rab2["images"])) $clientimage = "$mainurl/saas/assets/noimage.png";
                else $clientimage = $rab2["images"];
            } }
        } }
        
        if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
        else $sortset=10000000;

        $cid=0;
        if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
        echo"<div class='data-table-rows slim' id='sample'>";

            if(!isset($_GET["formid"])){
                $sessionid = rand(1234567890,9876543210);
                echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                    <input type='hidden' name='processor' value='addcardnumber'>
                    <fieldset>
                        <div class='row'>
                            
                            <div class='col-6 col-lg-2'>
                                <div class='form-group'><label>Issue Date *</label><input name='issue_date' type='date' value='$current_date' class='form-control required'></div>
                            </div>
                            
                            <div class='col-6 col-lg-2'>
                                <div class='form-group'><label>Expire Date *</label><input name='expire_date' type='date' value='$current_date' class='form-control required'></div>
                            </div>
                            
                            <div class='col-12 col-lg-3'>
                                <div class='form-group'><label>Provider/Referrer Name *</label><input name='referrer' type='text' value='' class='form-control required'></div>
                            </div>
                            
                            <div class='col-12 col-lg-3'>
                                <div class='form-group'><label>Card Number (Billing Code) *</label><input name='card_number' type='text' value='' class='form-control required'></div>
                            </div>
                            
                            <div class='col-6 col-lg-1'>
                                <div class='form-group'><label>Status *</label><select name='status' class='form-control'><option value='1'>ON</option><option value='0'>OFF</option></select></div>
                            </div>
                            
                            <div class='col-6 col-lg-1'><div class='form-group'><label>&nbsp; </label><Br>
                                <input type='submit' class='btn btn-icon btn-icon-start btn-outline-primary' data-style='expand-right' value='Save' onclick=\"setTimeout(function(){ shiftdataV2('projects_client_card_manager.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 3000);\">
                            </div></div>
                            
                        </div>
                    </fieldset>
                    
                </form><Br><br>";
            }else{
                $sessionid = rand(1234567890,9876543210);
                echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                    <input type='hidden' name='processor' value='editcardnumber'>
                    <h1>EDIT - Card Number</h1>";
                        $ra1X = "select * from ndis_card_number where status='1' and id='".$_GET["formid"]."' order by id desc";
                        $rb1X = $conn->query($ra1X);
                        if ($rb1X->num_rows > 0) { while($rab1X = $rb1X->fetch_assoc()) {
                            $issue_date=date("Y-m-d", $rab1X["issue_date"]);
                            $expire_date=date("Y-m-d", $rab1X["expire_date"]);
                            echo"<input name='id' type='hidden' value='".$rab1X["id"]."'>";
                            echo"<fieldset>
                                <div class='row'>
                                    <div class='col-6 col-lg-2'>
                                        <div class='form-group'><label>Issue Date *</label><input name='issue_date' type='date' value='$issue_date' class='form-control required'></div>
                                    </div>
                                    
                                    <div class='col-6 col-lg-2'>
                                        <div class='form-group'><label>Expire Date *</label><input name='expire_date' type='date' value='$expire_date' class='form-control required'></div>
                                    </div>
                                    
                                    <div class='col-12 col-lg-3'>
                                        <div class='form-group'><label>Provider/Referrer Name *</label><input name='referrer' type='text' value='".$rab1X["referrer"]."' class='form-control required'></div>
                                    </div>
                                    
                                    <div class='col-12 col-lg-3'>
                                        <div class='form-group'><label>Card Number (Billing Code) *</label><input name='card_number' type='text' value='".$rab1X["card_number"]."' class='form-control required'></div>
                                    </div>
                                    
                                    <div class='col-6 col-lg-1'>
                                        <div class='form-group'><label>Status *</label><select name='status' class='form-control'><option value='".$rab1X["status"]."'>".$rab1X["status"]."</option><option value='1'>ON</option><option value='1'>ON</option><option value='0'>OFF</option></select></div>
                                    </div>
                                    
                                    <div class='col-6 col-lg-1'><div class='form-group'><label>&nbsp; </label><Br>
                                        <input type='submit' class='btn btn-icon btn-icon-start btn-outline-primary' data-style='expand-right' value='Save' onclick=\"setTimeout(function(){ shiftdataV2('projects_client_card_manager.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 3000);\">
                                    </div></div>
                                    
                                    <div class='col-lg-1'><br><div class='form-group'><label>&nbsp; </label><Br>
                                        <input type='button' class='btn btn-icon btn-icon-start btn-outline-secondary' data-style='expand-right' value='New'  onclick=\"setTimeout(function(){ shiftdataV2('projects_client_card_manager.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 10);\"></a>
                                    </div></div>
                                </div>
                            </fieldset><br><br>";
                        } }
                    
                echo"</form>";
            }
            
            echo"<div class='table-responsive'>
                <table class='table table-striped table-bordered table-hover dataTables-example' >
                    <thead><tr><th nowrap>Form ID</th><th nowrap>Issue Date</th><th nowrap>Expire Date</th><th>Provider/Referrar Name</th><th>Card Number (Billing Code)</th><th>Status</th><th colspan=3'></th></tr></thead>
                    <tbody>";
                        
                        $ra1 = "select * from ndis_card_number where status='1' order by id desc";
                        $rb1 = $conn->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                            
                            $issue_date=date("d-m-y H:m", $rab1["issue_date"]);
                            $expire_date=date("d-m-y H:m", $rab1["expire_date"]);
                            echo"<tr class='gradeX'>
                                <td nowrap>&nbsp;".$rab1["id"]."</td>
                                <td nowrap>$issue_date</td><td nowrap>$expire_date</td>
                                <td>".$rab1["referrer"]."</td><td>".$rab1["card_number"]."</td>
                                <td>"; 
                                    if($rab1["status"]==1) echo"NO";
                                    else echo"OFF";
                                echo"</td>
                                <td align=center><a href='#' onclick=\"shiftdataV2('projects_client_card_manager.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&formid=".$rab1["id"]."', 'datatableX')\" style='color:lightgreen'><i class='fa fa-edit'></i></a></td>
                                <td align=center><a href='deleterecords.php?tbl=ndis_card_number&delid=".$rab1["id"]."&sourceid=id' onclick=\"setTimeout(function(){ shiftdataV2('projects_client_card_manager.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 3000);\" style='color:lightred' target='dataprocessor'><i class='fa fa-trash'></i></a></td>
                            </tr>";
                            
                        } }    
                    echo"</tbody>
                </table>
                <div style='height:100px'>&nbsp;</div>
            </div>";
    
    // }
?>