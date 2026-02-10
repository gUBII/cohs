<?php
    include("auth.php");
    echo"<div class='row'>
            <div class='col-md-8'><h4 class='content-title card-title'>Page Editor</h2></div>
            <div class='col-md-4'></div>
    </div><hr>
    <form method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
        $mid=$_GET["mid"];
        $tom=0;
        $s1a = "select * from sms_webhost where identity='$mid' order by id asc limit 1";
        $r1a = $conn->query($s1a);
        if ($r1a->num_rows > 0) { while($rs1a = $r1a->fetch_assoc()) { $tom=1; } }
        if($tom==0){
            $sql = "insert into sms_webhost (identity,status) VALUES ('$mid','ON')";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
        if(strlen($mid)>=3){
            $s1x = "select * from sms_webhost where identity='$mid' order by id asc limit 1";
            $r1x = $conn->query($s1x);
            if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                $s1z = "select * from sms_link where id='".$rs1x["identity"]."' order by id asc limit 1";
                $r1z = $conn->query($s1z);
                if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) { $menuname=$rs1z["pam"]; } }
                echo"<input type=hidden name='processor' value='updatepage'><input type=hidden name='id' value='".$rs1x["id"]."'><input type=hidden name='identity' value='$mid'>
                <div class='row border-bottom mb-4 pb-4'>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Page Name</label><input class='form-control' type='text' name='identity2' placeholder='Type here' readonly value='$menuname'></div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Status</label>
                        <select class='form-select' name='status' required=''><option value='".$rs1x["status"]."'>".$rs1x["status"]."</option><option value='ON'>ON</option><option value='OFF'>OFF</option></select>
                    </div>
                    <div class='col-md-12' style='margin-top:15px'><label class='form-label'>Title</label><input class='form-control' type='text' name='title' placeholder='Type here' value='".$rs1x["title"]."'></div>
                    <div class='col-md-12' style='margin-top:15px'><label class='form-label'>Introduction</label><textarea placeholder='Type here' class='form-control' rows='10' name='des1'>".$rs1x["des1"]."</textarea></div>
                    <div class='col-md-12' style='margin-top:15px'><label class='form-label'>Detail</label><textarea placeholder='Type here' class='form-control' rows='10' name='des2'>".$rs1x["des2"]."</textarea></div>
                    <div class='col-md-12' style='margin-top:15px'><label class='form-label'>Description</label><textarea placeholder='Type here' class='form-control' rows='3' name='description'>".$rs1x["description"]."</textarea></div>
                    <div class='col-md-12' style='margin-top:15px'><label class='form-label'>Keywords</label><input class='form-control' type='text' name='keywords' placeholder='Type here' value='".$rs1x["keywords"]."'></div>
                    <div class='col-md-12' style='margin-top:15px'><hr></div>
                    <div class='col-md-12' style='margin-top:15px'>
                        <button class='btn btn-primary' type='submit' onblur=\"shiftdataV1('pages_pages', 'datashiftX')\">Update</button> &nbsp;  
                        <button class='btn btn-light rounded font-md' type='reset'>Reset</button> &nbsp; 
                    </div>
                </div>";
            } }
        }
    echo"</form>";
    
                    // echo"<link href='https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css' rel='stylesheet'>";
                    // echo"<script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>"; 
                    // echo"<script src='https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script>";
                    // echo"<link href='assets/summernote.min.css' rel='stylesheet'>";
                    // echo"<script src='assets/summernote.min.js'></script>";
                    // echo"<div id='summernote'><p>Hello Summernote</p></div>";
                    ?><!-- <script> $(document).ready(function() { $('#summernote').summernote( { height: 300,lang: 'en-US' } ); } ); </script> ---><?php
?>