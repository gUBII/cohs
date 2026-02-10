<?php
    include("auth.php");
    echo"<div class='row'>
            <div class='col-md-8'><h4 class='content-title card-title'>Media Slider Editor</h2></div>
            <div class='col-md-4'><button class='btn btn-primary' onclick=\"shiftdataV1('media_slider', 'datashiftX')\">Add New</button></div>
    </div><hr>
    <form method='post' name='categorysection' autocomplete='off' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
        if(isset($_GET["mid"])) $mid=$_GET["mid"];
        else $mid=0;
        if($_GET["mid"]!=0){
            $s1x = "select * from sms_media where id='$mid' order by id asc limit 1";
            $r1x = $conn->query($s1x);
            if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                echo"<input type=hidden name='processor' value='updatemedia'><input type=hidden name='id' value='".$rs1x["id"]."'>
                <div class='row border-bottom mb-4 pb-4'>
                    <div class='col-md-12' style='margin-top:15px'><label class='form-label'>Media Name</label><input class='form-control' type='text' name='mname' placeholder='Type here' value='".$rs1x["name"]."'></div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Parent Menu</label>
                        <select id='iconbox' class='form-select' name='pid' required=''>";
                            if(strlen($rs1x["pid"])<=5){
                                $s1y = "select * from sms_link where id='".$rs1x["pid"]."' order by id asc limit 1";
                                $r1y = $conn->query($s1y);
                                if ($r1y->num_rows > 0) { while($rs1y = $r1y->fetch_assoc()) { echo"<option value='".$rs1y["id"]."'>".$rs1y["pam"]."</option>"; } }
                            }else{
                                echo"<option value='".$rs1x["pid"]."'>".$rs1x["pid"]."</option>";
                            }
                            echo"<option value='FRONT SLIDER'>FRONT SLIDER</option>
                            <option value='SPECIAL PROMO'>SPECIAL PROMO</option>
                            <option value='FEATURED PROMO'>FEATURED PROMO</option>
                            <option value=''>------------------------------</option>";
                            $s1z = "select * from sms_link where des1='TOP CATEGORY' order by sorder asc";
                            $r1z = $conn->query($s1z);
                            if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) {
                                echo"<option value='".$rs1z["id"]."'>".$rs1z["pam"]."</option>";
                                $s1za = "select * from sms_link where des1='".$rs1z["id"]."' order by sorder asc";
                                $r1za = $conn->query($s1za);
                                if ($r1za->num_rows > 0) { while($rs1za = $r1za->fetch_assoc()) {
                                    echo"<option value='".$rs1za["id"]."'>&nbsp;&nbsp; - ".$rs1za["pam"]."</option>";
                                    $s1zb = "select * from sms_link where des1='".$rs1z["id"]."' order by sorder asc";
                                    $r1zb = $conn->query($s1zb);
                                    if ($r1zb->num_rows > 0) { while($rs1zb = $r1zb->fetch_assoc()) {
                                        echo"<option value='".$rs1zb["id"]."'>&nbsp;&nbsp;&nbsp;&nbsp; - ".$rs1zb["pam"]."</option>";
                                    } }
                                } }
                            } }
                        echo"</select>
                    </div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Sort Order</label><input class='form-control' type='number' name='sorder' placeholder='Type here' min-value='1' value='".$rs1x["sorder"]."'></div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Status</label>
                        <select class='form-select' name='status' required=''>
                            <option value='".$rs1x["status"]."'>".$rs1x["status"]."</option><option value='ON'>ON</option><option value='OFF'>OFF</option>
                        </select>
                    </div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Image File ( <a href='".$rs1x["image"]."' target='_blank'>View Image</a> )</label>
                        <input type='file' name='images[]' class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg'>
                    </div>                                        
                    <div class='col-md-12' style='margin-top:15px'><hr></div>
                    <div class='col-md-12' style='margin-top:15px'>
                        <input type='hidden' name='mtype' value='SLIDER'>
                        <input type='hidden' name='placement' value='SLIDER'>                        
                        <button class='btn btn-primary' type='submit' onblur=\"shiftdataV1('media_slider', 'datashiftX')\">Update</button> &nbsp;  
                        <button class='btn btn-light rounded font-md' type='reset'>Reset</button> &nbsp; 
                        <a href='dataprocessor.php?processor=deletetask&delid=".$rs1x["id"]."&tbl=sms_media' target='dataprocessor'>
                            <button class='btn btn-danger rounded font-md' type='button' onblur=\"shiftdataV1('media_slider', 'datashiftX')\">Delete</button>
                        </a>
                    </div>
                </div>";
            } }
        }else{
            echo"<input type=hidden name='processor' value='addmedia'>
            <div style='padding:0px'>
                <div class='row border-bottom mb-4 pb-4'>
                    <div class='col-md-12' style='margin-top:15px'><label class='form-label'>Media Name</label><input class='form-control' type='text' name='mname' placeholder='Type here' value=''></div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Parent Menu</label>
                        <select id='iconbox' class='form-select' name='pid' required=''>
                            <option value='FRONT SLIDER'>FRONT SLIDER</option>
                            <option value='SPECIAL PROMO'>SPECIAL PROMO</option>
                            <option value='FEATURED PROMO'>FEATURED PROMO</option>
                            <option value=''>------------------------------</option>";
                            $s1z = "select * from sms_link where des1='TOP CATEGORY' order by sorder asc";
                            $r1z = $conn->query($s1z);
                            if ($r1z->num_rows > 0) { while($rs1z = $r1z->fetch_assoc()) {
                                echo"<option value='".$rs1z["id"]."'>".$rs1z["pam"]."</option>";
                                $s1za = "select * from sms_link where des1='".$rs1z["id"]."' order by sorder asc";
                                $r1za = $conn->query($s1za);
                                if ($r1za->num_rows > 0) { while($rs1za = $r1za->fetch_assoc()) {
                                    echo"<option value='".$rs1za["id"]."'>&nbsp;&nbsp; - ".$rs1za["pam"]."</option>";
                                    $s1zb = "select * from sms_link where des1='".$rs1z["id"]."' order by sorder asc";
                                    $r1zb = $conn->query($s1zb);
                                    if ($r1zb->num_rows > 0) { while($rs1zb = $r1zb->fetch_assoc()) {
                                        echo"<option value='".$rs1zb["id"]."'>&nbsp;&nbsp;&nbsp;&nbsp; - ".$rs1zb["pam"]."</option>";
                                    } }
                                } }
                            } }
                        echo"</select>
                    </div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Sort Order</label><input class='form-control' type='number' name='sorder' placeholder='Type here' min-value='1' value='1'></div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Status</label>
                        <select class='form-select' name='status' required=''>
                            <option value='ON'>ON</option><option value='OFF'>OFF</option>
                        </select>
                    </div>
                    <div class='col-md-6' style='margin-top:15px'><label class='form-label'>Image File</label>
                        <input type='file' name='images[]' class='form__field__img form-control' accept='.jpg, .png, .gif, .jpeg'>
                    </div>
                    <div class='col-md-12' style='margin-top:15px'><hr></div>
                    <div class='col-md-12' style='margin-top:15px'>
                        <input type='hidden' name='mtype' value='SLIDER'>
                        <input type='hidden' name='placement' value='SLIDER'>
                        <button class='btn btn-primary' type='submit' onblur=\"shiftdataV1('media_slider', 'datashiftX')\">Save</button> &nbsp;  
                        <button class='btn btn-light rounded font-md' type='reset'>Reset</button>
                    </div>
                </div>
            </div>";
        }
    echo"</form>";
?>

<script>
    $(document).ready(function(){
     $( "#textbox" ).autocomplete({
          source: "",
          minLength: 2
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#textbox").autocomplete({
            minlength: 2,
            source: function(request, response) {
                $.ajax({
                    url: "autocomplete.php",
                    type: "POST",
                    dataType: "json",
                    data: { q: request.term, limit: 10 },
                    success: function(data) {
                        response($.map(data, function(item) {
                            return {
                                label: item.title,
                                value: item.postId

                            };
                        }));
                    }
                });
            },
            select: function(event, ui) {
                event.preventDefault();
                $('#textbox').val(ui.item.label);
                $('#itemId').val(ui.item.value);
            }
        });
    });
</script>
