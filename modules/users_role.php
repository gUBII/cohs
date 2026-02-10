<?php
    $sheba="permissions";
    $cid=7;
    $title="Add New Permission";
    $utype="Userwise Roleset";
    
    $urid=$_GET["urid"];
    $drid=$_GET["drid"];
    
    
    echo"<div class='row'>
        <div class='col-12 col-md-8' style='padding-bottom:10px'>
            
            <h1 class='mb-0 pb-0 display-4' id='title'>User & Designation Wise Permission Manager</h1>
        
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-12 col-md-4 d-flex align-items-start justify-content-end'>
            <table><tr>";
                /*
                echo"<td><form method='GET' name='userwiseroleset' action='index.php' target='_self' enctype='multipart/form-data'>
                    <input type=hidden name=url value='users_role.php'>
                    <select class='form-control form-control-sm' name='urid' onchange='this.form.submit()' style='width:150px'>
                        <option value=''>Select User</option>";
                        $s7 = "select * from uerp_user order by username asc";
                        $r7 = $conn->query($s7);
                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                            echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                        } }
                    echo"</select>
                </form></td>";
                */
                echo"<td><form method='GET' name='userwiseroleset' action='index.php' target='_self' enctype='multipart/form-data'>
                    <input type=hidden name=url value='users_role.php'>
                    <select class='form-control form-control-sm' name='drid' onchange='this.form.submit()' style='width:150px'>
                        <option value=''>Select Designation</option>";
                        $s77 = "select * from designation order by designation asc";
                        $r77 = $conn->query($s77);
                        if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) {
                            echo"<option value='".$rs77["id"]."'>".$rs77["designation"]."</option>";
                        } }
                    echo"</select>
                </form></td>
                
            </tr></table>
        </div>                  
    </div>    
    <div class='data-table-rows slim' id='sample'>
        <body onload=\"shiftdataV2('users_role_data.php?cid=$cid&sheba=$sheba&utype=$utype&urid=$urid&drid=$drid', 'datatableX')\">
        <div class='data-table-responsive-wrapper'id='datatableX'></div>
    </div>";    
?>