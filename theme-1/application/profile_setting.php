<?php
    echo"<div class='content-header'>
        <div><h4 class='content-title card-title'>My Profile </h2></div>
        <div> </div>
    </div>";
    include("../include.php");
    $s1 = "select * from sms_user2 where id='".$_COOKIE["uid"]."' and status='1' order by id asc limit 1";
    $r1 = $conn->query($s1);
    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
        echo"<div class='row'>
            <div class='col-lg-8'>
                <form method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                    <div class='row gx-3'>
                        <div class='col-6  mb-3'>
                            <label class='form-label'>First name</label><input class='form-control' type='text' placeholder='Type here' name='firstname' value='".$rs1["name"]."'>
                        </div><div class='col-6  mb-3'>
                            <label class='form-label'>Last name</label><input class='form-control' type='text' placeholder='Type here' name='lastname' value='".$rs1["name2"]."'>
                        </div><div class='col-lg-6  mb-3'>
                        <label class='form-label'>Email</label><input class='form-control' type='email' placeholder='example@mail.com' name='email' value='".$rs1["email"]."'>
                            </div>
                        <div class='col-lg-6  mb-3'>
                            <label class='form-label'>Phone</label><input class='form-control' type='tel' placeholder='+1234567890' name='phone' value='".$rs1["phone"]."'>
                        </div>
                        <div class='col-lg-12  mb-3'>
                            <label class='form-label'>Address</label><input class='form-control' type='text' placeholder='Type here' name='address' value='".$rs1["address"]."'>
                        </div>
                        <div class='col-lg-6  mb-3'>
                            <label class='form-label'>Birthday</label><input class='form-control' type='date' name='dob' value='".$rs1["dob"]."'>
                        </div>
                        <div class='col-lg-12  mb-3' style='margin-top:25px'>
                            <input type=hidden name=processor value='profileupdate'><input type=hidden name=id value='".$rs1["id"]."'>
                            <button class='btn btn-primary' type='submit'>Update Changes</button>
                        </div>
                    </div>
                </form>
            </div>
                                            
            <aside class='col-lg-4'>
                <div class='input-upload'>
                    <form method='post' name=img action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
                        if(strlen($rs1["image"])>="5") echo"<img src='".$rs1["image"]."' alt='Logo'>";
                        else  echo"<img src='assets/imgs/theme/upload.svg' alt=''>";
                        echo"<input type='file' name='images[]' multiple class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg' onchange='this.form.submit();'>
                        <input type=hidden name='processor' value='companysetting10'><input type=hidden name='id' value='".$rs1["id"]."'>
                    </form>
                </div>
            </aside>
        </div><br>";
    } }
?>