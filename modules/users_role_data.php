<?php

    include("../authenticator.php");

    $dbname="userwise_roleset";
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];
    $title="Edit user Record";
    
    if(isset($_GET["urid"])) $urid=$_GET["urid"];
    else $urid=0;
    
    if(isset($_GET["drid"])) $drid=$_GET["drid"];
    else $drid=0;
    
    
    
    if(isset($drid) and $drid>=1 OR isset($urid) and $urid>=1){
        if(isset($drid) and $drid>=1){
            $designationname="";
            $mm1z = "select * from designation where id='$drid' order by id asc limit 1";
            $mm11z = $conn->query($mm1z);
            if ($mm11z->num_rows > 0) { while($mm111z = $mm11z -> fetch_assoc()) { $designationname=$mm111z["designation"]; }}
            echo"<h2>Designation wise Role Set For <b>$designationname</b></h2>";
        }
        if(isset($urid) and $urid>=1){
            $userwisename="";
            $mm1z = "select * from uerp_user where id='$urid' order by id asc limit 1";
            $mm11z = $conn->query($mm1z);
            if ($mm11z->num_rows > 0) { while($mm111z = $mm11z -> fetch_assoc()) { $userwisename="".$mm111z["username"]." ".$mm111z["username"].""; }}
            echo"<h2>User wise Role Set For <b>$userwisename</b></h2>";
        }
        
        echo"<div class='list row'>";
            $solutionname="";
            $mm1x = "select * from solutions where dashboard='1' and profile='0' and status='1' order by orders asc";
            $mm11x = $conn->query($mm1x);
            if ($mm11x->num_rows > 0) { while($mm111x = $mm11x -> fetch_assoc()) {
                
                echo"<div class='col-12'><hr><h3>".$mm111x["name"]." (".$mm111x["detail"].")</h3></div>";
                
                $mm1 = "select * from modules where parent='".$mm111x["id"]."' and profile='0' and status='1' order by orders asc";
                $mm11 = $conn->query($mm1);
                if ($mm11->num_rows > 0) { while($mm111 = $mm11 -> fetch_assoc()) {
                    
                    $rand=rand(100000,999999);
                    echo"<div class='col-md-4 col-sm-12'>
                        <div class='card bg-info rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:35px'>
                            <div class='row g-0 sh-6 mb-2' style='margin-top:0px'>
                                <table style='width:100%'><tr>
                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td>
                                    <td style='font-size:8pt'><div class='name' style='font-size:10pt'>".$mm111["name"]."</div></td>
                                    <td style='width:30px;text-align:right'><div class='form-check form-switch'>";
                                        
                                        if(isset($urid) AND $urid>=1){
                                            echo"<form name='saas$rand' method=post action='dataprocessor.php' target='dataprocessor'>
                                                <input type='hidden' name='processor' value='uroleswitch'>
                                                <input type='hidden' name='module_id' value='".$mm111["id"]."'>
                                                <input type='hidden' name='user_id' value='$urid'>";
                                                
                                                $swstatus=0;
                                                $ur1 = "select * from userwise_roleset where user_id='$urid' and module_id='".$mm111["id"]."' order by id asc limit 1";
                                                $ur11 = $conn->query($ur1);
                                                if ($ur11->num_rows > 0) { while($ur111 = $ur11 -> fetch_assoc()) { $swstatus=1; } }
                                                
                                                if($swstatus==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                
                                            echo"</form>";
                                        }
                                        
                                        if(isset($drid) AND $drid>=1){
                                            echo"<form name='saas$rand' method=post action='dataprocessor.php' target='dataprocessor'>
                                                <input type='hidden' name='processor' value='droleswitch'>
                                                <input type='hidden' name='module_id' value='".$mm111["id"]."'>
                                                <input type='hidden' name='designation_id' value='$drid'>";
                                                
                                                $swstatus=0;
                                                $ur1 = "select * from designationwise_roleset where designation_id='$drid' and module_id='".$mm111["id"]."' order by id asc limit 1";
                                                $ur11 = $conn->query($ur1);
                                                if ($ur11->num_rows > 0) { while($ur111 = $ur11 -> fetch_assoc()) { $swstatus=1; } }
                                                
                                                if($swstatus==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                
                                            echo"</form>";
                                        }
                                    echo"</div></td>
                                </tr></table>
                            </div>
                        </div>
                        
                        <div class='row'>";
                            $rand=0;
                            $mm2 = "select * from modules where parent='".$mm111["id"]."' and profile='0' and status='1' order by orders asc";
                            $mm22 = $conn->query($mm2);
                            if ($mm22->num_rows > 0) { while($mm222 = $mm22 -> fetch_assoc()) {
                                $rand=rand(100000,999999);
                                echo"<div class='col-md-12 col-sm-12'>
                                    <div class='card bg-default rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:35px'>
                                        <div class='row g-0 sh-6 mb-2' style='margin-top:0px'>
                                            <table style='width:100%'><tr>
                                                <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td>
                                                <td style='font-size:8pt;padding-left:30px'><div class='name' style='font-size:10pt'>".$mm222["name"]."</div></td>
                                                <td style='width:30px;text-align:right'><div class='form-check form-switch'>";
                                                    
                                                    if(isset($urid) AND $urid>=1){
                                                        echo"<form name='saas$rand' method=post action='dataprocessor.php' target='dataprocessor'>
                                                            <input type='hidden' name='processor' value='uroleswitch'>
                                                            <input type='hidden' name='module_id' value='".$mm222["id"]."'>
                                                            <input type='hidden' name='user_id' value='$urid'>";
                                                            
                                                            $swstatus=0;
                                                            $ur1 = "select * from userwise_roleset where user_id='$urid' and module_id='".$mm222["id"]."' order by id asc limit 1";
                                                            $ur11 = $conn->query($ur1);
                                                            if ($ur11->num_rows > 0) { while($ur111 = $ur11 -> fetch_assoc()) { $swstatus=1; } }
                                                            
                                                            if($swstatus==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                            else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                            
                                                        echo"</form>";
                                                    }
                                                    
                                                    if(isset($drid) AND $drid>=1){
                                                        echo"<form name='saas$rand' method=post action='dataprocessor.php' target='dataprocessor'>
                                                            <input type='hidden' name='processor' value='droleswitch'>
                                                            <input type='hidden' name='module_id' value='".$mm222["id"]."'>
                                                            <input type='hidden' name='designation_id' value='$drid'>";
                                                            
                                                            $swstatus=0;
                                                            $ur1 = "select * from designationwise_roleset where designation_id='$drid' and module_id='".$mm222["id"]."' order by id asc limit 1";
                                                            $ur11 = $conn->query($ur1);
                                                            if ($ur11->num_rows > 0) { while($ur111 = $ur11 -> fetch_assoc()) { $swstatus=1; } }
                                                            
                                                            if($swstatus==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                            else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                            
                                                        echo"</form>";
                                                    }
                                                echo"</div></td>
                                            </tr></table>
                                        </div>
                                    </div>
                                </div>";
                            } }
                            
                        echo"</div>
                    </div>";
                } }
            } }
        echo"</div><br><br><br><br><br><br>";
        
        echo"<div class='list row'>";
            
            echo"<div class='col-12'><hr><h3>Addon Modules</h3></div>";
            
            $solutionname="";
            $mm1x = "select * from solutions where dashboard='0' and status='1' order by orders asc";
            $mm11x = $conn->query($mm1x);
            if ($mm11x->num_rows > 0) { while($mm111x = $mm11x -> fetch_assoc()) {
                
                $mm1 = "select * from modules where parent='".$mm111x["id"]."' and profile='0' and status='1' order by orders asc";
                $mm11 = $conn->query($mm1);
                if ($mm11->num_rows > 0) { while($mm111 = $mm11 -> fetch_assoc()) {
                    
                    $rand=rand(100000,999999);
                    echo"<div class='col-md-4 col-sm-12'>
                        <div class='card bg-success rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:35px'>
                            <div class='row g-0 sh-6 mb-2' style='margin-top:0px'>
                                <table style='width:100%'><tr> 
                                    <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td>
                                    <td style='font-size:8pt'><div class='name' style='font-size:10pt'>".$mm111["name"]." (".$mm111x["name"].")</div></td>
                                    <td style='width:30px;text-align:right'><div class='form-check form-switch'>";
                                        
                                        if(isset($urid) AND $urid>=1){
                                            echo"<form name='saas$rand' method=post action='dataprocessor.php' target='dataprocessor'>
                                                <input type='hidden' name='processor' value='uroleswitch'>
                                                <input type='hidden' name='module_id' value='".$mm111["id"]."'>
                                                <input type='hidden' name='user_id' value='$urid'>";
                                                
                                                $swstatus=0;
                                                $ur1 = "select * from userwise_roleset where user_id='$urid' and module_id='".$mm111["id"]."' order by id asc limit 1";
                                                $ur11 = $conn->query($ur1);
                                                if ($ur11->num_rows > 0) { while($ur111 = $ur11 -> fetch_assoc()) { $swstatus=1; } }
                                                
                                                if($swstatus==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                
                                            echo"</form>";
                                        }
                                        
                                        if(isset($drid) AND $drid>=1){
                                            echo"<form name='saas$rand' method=post action='dataprocessor.php' target='dataprocessor'>
                                                <input type='hidden' name='processor' value='droleswitch'>
                                                <input type='hidden' name='module_id' value='".$mm111["id"]."'>
                                                <input type='hidden' name='designation_id' value='$drid'>";
                                                
                                                $swstatus=0;
                                                $ur1 = "select * from designationwise_roleset where designation_id='$drid' and module_id='".$mm111["id"]."' order by id asc limit 1";
                                                $ur11 = $conn->query($ur1);
                                                if ($ur11->num_rows > 0) { while($ur111 = $ur11 -> fetch_assoc()) { $swstatus=1; } }
                                                
                                                if($swstatus==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                
                                            echo"</form>";
                                        }
                                    echo"</div></td>
                                </tr></table>
                            </div>
                        </div>
                        
                        <div class='row'>";
                            $rand=0;
                            $mm2 = "select * from modules where parent='".$mm111["id"]."' and profile='0' and status='1' order by orders asc";
                            $mm22 = $conn->query($mm2);
                            if ($mm22->num_rows > 0) { while($mm222 = $mm22 -> fetch_assoc()) {
                                $rand=rand(100000,999999);
                                echo"<div class='col-md-12 col-sm-12'>
                                    <div class='card bg-default rounded-md radius-rounded p-1 mb-1 no-shadow' style='height:35px'>
                                        <div class='row g-0 sh-6 mb-2' style='margin-top:0px'>
                                            <table style='width:100%'><tr>
                                                <td style='width:30px;font-size:8pt' align=center><i data-acorn-icon='sort' class='icon' data-acorn-size='10'></i></td>
                                                <td style='font-size:8pt;padding-left:30px'><div class='name' style='font-size:10pt'>".$mm222["name"]."</div></td>
                                                <td style='width:30px;text-align:right'><div class='form-check form-switch'>";
                                                    
                                                    if(isset($urid) AND $urid>=1){
                                                        echo"<form name='saas$rand' method=post action='dataprocessor.php' target='dataprocessor'>
                                                            <input type='hidden' name='processor' value='uroleswitch'>
                                                            <input type='hidden' name='module_id' value='".$mm222["id"]."'>
                                                            <input type='hidden' name='user_id' value='$urid'>";
                                                            
                                                            $swstatus=0;
                                                            $ur1 = "select * from userwise_roleset where user_id='$urid' and module_id='".$mm222["id"]."' order by id asc limit 1";
                                                            $ur11 = $conn->query($ur1);
                                                            if ($ur11->num_rows > 0) { while($ur111 = $ur11 -> fetch_assoc()) { $swstatus=1; } }
                                                            
                                                            if($swstatus==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                            else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                            
                                                        echo"</form>";
                                                    }
                                                    
                                                    if(isset($drid) AND $drid>=1){
                                                        echo"<form name='saas$rand' method=post action='dataprocessor.php' target='dataprocessor'>
                                                            <input type='hidden' name='processor' value='droleswitch'>
                                                            <input type='hidden' name='module_id' value='".$mm222["id"]."'>
                                                            <input type='hidden' name='designation_id' value='$drid'>";
                                                            
                                                            $swstatus=0;
                                                            $ur1 = "select * from designationwise_roleset where designation_id='$drid' and module_id='".$mm222["id"]."' order by id asc limit 1";
                                                            $ur11 = $conn->query($ur1);
                                                            if ($ur11->num_rows > 0) { while($ur111 = $ur11 -> fetch_assoc()) { $swstatus=1; } }
                                                            
                                                            if($swstatus==1) echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' checked name='switch' value='0' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                            else echo"<input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked ' name='switch' value='1' onclick=\"this.form.switchx.value=this.value\" onchange='this.form.submit()'/>";
                                                            
                                                        echo"</form>";
                                                    }
                                                echo"</div></td>
                                            </tr></table>
                                        </div>
                                    </div>
                                </div>";
                            } }
                            
                        echo"</div>
                    </div>";
                } }
            } }
        echo"</div><br><br><br><br><br><Br>";
    }
    
