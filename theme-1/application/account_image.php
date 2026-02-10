<?php
    include("auth.php");
    if($uactype=="ADMIN"){
        echo"<div class='content-header'><div><h4 class='content-title card-title'>Logo and Favicon Setting </h2></div><div> </div></div>
        <div style='padding:5px' >";
        
        $s1 = "select * from sms_company_bon where id='1' and status='1' order by id asc limit 1";
        $r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
            echo"<div class='row border-bottom mb-4 pb-4'>
                <div class='col-md-6' style='margin-top:15px'>
                    <div class='card-header' style='font-size:12pt'>Company Logo</div>
                    <div class='card-body'>
                        <div class='input-upload'>
                            <form method='post' name=img action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
                                if(strlen($rs1["logo"])>="5") echo"<img src='".$rs1["logo"]."' alt='Logo'>";
                                else  echo"<img src='assets/imgs/theme/upload.svg' alt=''>";
                                echo"<input type='file' name='images[]' multiple class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg' onchange='this.form.submit();'>
                                <input type=hidden name='processor' value='companysetting2'><input type=hidden name='id' value='".$rs1["id"]."'>
                            </form>
                        </div>
                    </div>
                </div>
                <div class='col-md-6' style='margin-top:15px'>
                    <div class='card-header' style='font-size:12pt'>Favicon Icon</div>
                    <div class='card-body'>
                        <div class='input-upload'>
                            <form method='post' name=fav action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
                                if(strlen($rs1["favicon"])>=5) echo"<img src='".$rs1["favicon"]."' alt='Favicon'>";
                                else echo"<img src='assets/imgs/theme/upload.svg' alt=''>";
                                echo"<input type='file' name='images[]' multiple class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg' onchange='this.form.submit();'>
                                <input type=hidden name='processor' value='companysetting3'><input type=hidden name='id' value='".$rs1["id"]."'>
                            </form>
                        </div>
                    </div>
                </div>
            </div>";
        } }
        echo"</div>";
    }
?>