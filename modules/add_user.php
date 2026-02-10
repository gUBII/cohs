<?php
    
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    
    echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='../font/CS-Interface/style.css' />
    <link rel='stylesheet' href='../css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='../css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='../css/vendor/glide.core.min.css' />
    <link rel='stylesheet' href='../css/vendor/introjs.min.css' />
    <link rel='stylesheet' href='../css/vendor/select2.min.css' />
    <link rel='stylesheet' href='../css/vendor/select2-bootstrap4.min.css' />
    <link rel='stylesheet' href='../css/vendor/datatables.min.css' />
    <link rel='stylesheet' href='../css/vendor/plyr.css' />
    <link rel='stylesheet' href='../css/styles.css' />
    <link rel='stylesheet' href='../css/main.css' />        
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='../js/base/loader.js'></script>";
    
    $title="";
    if($utype==1) $title="Employee/Staff";
    if($utype==2) $title="Participants/Client";
    if($utype==3) $title="Supplier/Vendor";
    
    $utypex="";
    if($utype==1) $utypex="USER";
    if($utype==2) $utypex="CLIENT";
    if($utype==3) $utypex="VENDOR";
    
    echo"<br><h4>$title Manager</h4>
    <div style='margin-left:10px;padding:5px;width:100%'>
        <form method=post action='setting_processor.php' target='dataprocessor'>
            <div class='row' style='width:100%'>
                <div class='col-4 col-md-2' style='padding:2px'>
                    First Name<input type='text' name='username' class='form-control' required></div>
                <div class='col-4 col-md-2' style='padding:2px'>
                    Last Name<input type='text' name='username2' class='form-control' required></div>
                <div class='col-4 col-md-2' style='padding:2px'>
                    Email (Login)<input type='email' name='email' class='form-control' required></div>
                <div class='col-4 col-md-2' style='padding:2px'>
                    Phone<input type='text' name='phone' class='form-control' required></div>
                <div class='col-4 col-md-2' style='padding:2px'>
                    Account Role<select name='designation' class='form-control'>";
                    if($utype==1) echo"<option value='USER'>User (Support Worker)</option><option value='ADMIN'>Admin (Admin & Manager)</option>";
                    if($utype==2) echo"<option value='CLIENT'>Client/Participant</option>";
                    if($utype==3) echo"<option value='VENDOR'>Supplier/Vendor</option>";
                echo"</select></div>
                <div class='col-4 col-md-2' style='padding:2px'>&nbsp;<br>
                    <input type=hidden name='processor' value='newaccount'><input type=hidden name='utype' value='$utype'>
                    <input type='submit' value='Add' onblur=\"shiftdataV2('walkthrough_data.php?pointer=$pointer', 'datatableXYZ')\" style='margin-top:0px' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm'>
                </div>
            </div>
        </form>
    </div><hr>
            
    <div style='margin-left:10px;padding:5px;width:100%'><br>";
        if($utypex=="USER") $ra6 = "select * from uerp_user where id<>'1' and mtype='$utypex' or id<>'1' and mtype='ADMIN' order by id desc";
        else $ra6 = "select * from uerp_user where mtype='$utypex' order by id desc";
        $rb6 = $conn->query($ra6);
        if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
            $tt1=rand(1000,1999);
            $tt2=rand(2000,2999);
            $tt3=rand(3000,3999);
            $tt4=rand(4000,4999);
            $tt=($tt+1);
            echo"<div class='row' style='width:100%'>
                <div class='col-6 col-md-3' style='padding:2px'>
                    <form name='form_$tt1' method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data'>
                        <input type='hidden' name='processor' value='editaccount'><input type='hidden' name='id' value='".$rab6["id"]."'>
                        First Name:<input type='text' name='username' value='".$rab6["username"]."' class='form-control' required onchange='this.form.submit()' onblur=\"shiftdataV2('walkthrough_data.php?pointer=$pointer', 'datatableXYZ')\">
                    </form>
                </div>
                <div class='col-6 col-md-3' style='padding:2px'>
                    <form name='form_$tt1' method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data'>
                        <input type='hidden' name='processor' value='editaccount'><input type='hidden' name='id' value='".$rab6["id"]."'>
                        Last Name<input type='text' name='username2' value='".$rab6["username2"]."' class='form-control' required onchange='this.form.submit()' onblur=\"shiftdataV2('walkthrough_data.php?pointer=$pointer', 'datatableXYZ')\">
                    </form>
                </div>
                <div class='col-4 col-md-2' style='padding:2px'>
                    <form name='form_$tt2' method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data'>
                        <input type='hidden' name='processor' value='editaccount'><input type='hidden' name='id' value='".$rab6["id"]."'>
                        Email (Login)<input type='email' name='email' value='".$rab6["email"]."' class='form-control' required onchange='this.form.submit()' onblur=\"shiftdataV2('walkthrough_data.php?pointer=$pointer', 'datatableXYZ')\">
                    </form>
                </div>
                <div class='col-4 col-md-2' style='padding:2px'>
                    <form name='form_$tt3' method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data'>
                        <input type='hidden' name='processor' value='editaccount'><input type='hidden' name='id' value='".$rab6["id"]."'>
                        Phone<input type='text' name='phone' value='".$rab6["phone"]."' class='form-control' required onchange='this.form.submit()' onblur=\"shiftdataV2('walkthrough_data.php?pointer=$pointer', 'datatableXYZ')\">
                    </form>
                </div>
                <div class='col-4 col-md-2' style='padding:2px'>
                    <form name='form_$tt4' method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data'>
                        <input type='hidden' name='processor' value='editaccount'><input type='hidden' name='id' value='".$rab6["id"]."'>
                        Account Role<select name='designation' class='form-control' onchange='this.form.submit()' onblur=\"shiftdataV2('walkthrough_data.php?pointer=$pointer', 'datatableXYZ')\">
                            <option value='".$rab6["mtype"]."'>".$rab6["mtype"]."</option>
                            <option value='USER'>User (Support Worker)</option>
                            <option value='ADMIN'>Admin (Admin & Manager)</option>
                            <option value='CLIENT'>Client/Participant</option>
                            <option value='VENDOR'>Supplier/Vendor</option>
                        </select>
                    </form>
                </div>
            </div>
            <hr>";
        } }
    echo"</div>";
