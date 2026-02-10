<?php
    include("auth.php");
    if($uactype=="ADMIN"){
        echo"<div class='content-header'><div><h4 class='content-title card-title'>Currency Setting </h2></div><div> </div></div>
        <form method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
            $s1 = "select * from sms_company_bon where id='1' and status='1' order by id asc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                echo"<input type=hidden name='processor' value='companysetting5'><input type=hidden name='id' value='".$rs1["id"]."'>
                <div class='row border-bottom mb-4 pb-4'>
                    <div class='col-md-4' style='margin-top:15px'><label class='form-label'>Currency Code</label><input class='form-control' type='text' name='ccode' placeholder='Type here' value='".$rs1["ccode"]."'></div>
                    <div class='col-md-4' style='margin-top:15px'><label class='form-label'>Currency Symbol</label><input class='form-control' type='text' name='csymbol' placeholder='Type here' value='".$rs1["csymbol"]."'></div>
                    <div class='col-md-4' style='margin-top:15px'><label class='form-label'>Symbol Placement </label><select class='form-select' name='symbol_position' required=''><option value='".$rs1["symbol_position"]."'>".$rs1["symbol_position"]."</option><option value='LEFT'>LEFT</option><option value='RIGHT'>RIGHT</option></select></div>
                    
                    <div class='col-md-12' style='margin-top:25px'><button class='btn btn-primary' type='submit'>Update</button> &nbsp; <button class='btn btn-light rounded font-md' type='reset'>Reset</button></div>
                </div>";
            } }
        echo"</form>";
    }
?>

<!---
    <div class='row border-bottom mb-4 pb-4'>
        <div class='col-md-5'>
            <h5>Access</h5>
            <p class='text-muted' style='max-width:90%'></p>
        </div>
                <div class='col-md-7'>
                    <label class='mb-2 form-check'>
                        <input class='form-check-input' checked='' name='mycheck_a1' type='radio'>
                        <span class='form-check-label'> All registration is enabled </span>
                    </label>
                    <label class='mb-2 form-check'>
                        <input class='form-check-input' name='mycheck_a1' type='radio'>
                        <span class='form-check-label'> Only buyers is enabled </span>
                    </label>
                    <label class='mb-2 form-check'>
                        <input class='form-check-input' name='mycheck_a1' type='radio'>
                        <span class='form-check-label'> Only buyers is enabled </span>
                    </label>
                    <label class='mb-2 form-check'>
                        <input class='form-check-input' name='mycheck_a1' type='radio'>
                        <span class='form-check-label'> Stop new shop registration </span>
                    </label>
                </div>
            </div>
            
            <div class='row border-bottom mb-4 pb-4'>
                <div class='col-md-6'>
                    <h5>Notification</h5>
                    <p class='text-muted' style='max-width:90%'>Lorem ipsum dolor sit amet, consectetur adipisicing something about this</p>
                </div>
                <div class='mb-6'>
                    <label class='form-label'>Home page title</label><input class='form-control' type='text' name='' placeholder='Type here'>
                </div>
                <div class='mb-6'>
                        <label class='form-label'>Description</label><textarea type='text' class='form-control'></textarea>
                    </div>
                </div>
                <div class='col-md-6'>
                    <div class='form-check mb-3'>
                        <input class='form-check-input' type='checkbox' value='' id='mycheck_notify' checked>
                        <label class='form-check-label' for='mycheck_notify'>Send notification on each user registration</label>
                    </div>
                    <div class='mb-3'><input class='form-control' placeholder='Text'></div>
                </div>
            </div>
            
            <div class='row border-bottom mb-4 pb-4'>
                <div class='col-md-5'>
                    <h5>Currency</h5>
                    <p class='text-muted' style='max-width:90%'> Lorem ipsum dolor sit amet, consectetur adipisicing something about this</p>
                </div>
                <div class='col-md-7'>
                    <div class='mb-3' style='max-width: 200px'>
                        <label class='form-label'>Main currency </label>
                        <select class='form-select'>
                            <option>US Dollar</option>
                            <option>EU Euro</option>
                            <option>RU Ruble</option>
                            <option>UZ Som</option>
                        </select>
                    </div>
                    <div class='mb-3' style='max-width: 200px'>
                        <label class='form-label'>Supported curencies</label>
                        <select class='form-select'>
                            <option>US dollar</option>
                            <option>RUBG russia</option>
                            <option>INR india</option>
                        </select>
                    </div>
                </div>
            </div>
--->