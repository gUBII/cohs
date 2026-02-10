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
                    <input type='hidden' name='url' value='general_forms.php'><input type='hidden' name='id' value='5205'>
                    <input type='hidden' name='clientid' value='$clientid'>
                    <input name='submitted_form' type='hidden' id='submitted_form' value='image_upload_form'>
                    <input type='hidden' name='processor' value='generalforms'>
                    <input type='hidden' name='redirection' value='off'>
                    <input type='hidden' name='status' value='111'>
                    <fieldset>
                        <div class='row'>
                            <div class='col-4 col-lg-2'>
                                <div class='form-group'><label>Post Date *</label><input name='date1' type='date' value='$current_date' class='form-control required'></div>
                            </div>
                            <div class='col-4 col-lg-2'>
                                <div class='form-group'>
                                    <label>Client Name *</label><select class='form-control m-b required' name='clientid'>";
                                        $s71 = "select * from project where id='".$_COOKIE["projectidx"]."' order by id asc limit 1";
                                        $r71 = $conn->query($s71);
                                        if ($r71->num_rows > 0) { while($rs71 = $r71->fetch_assoc()) {
                                            $s72 = "select * from uerp_user where id='".$rs71["clientid"]."' and status='1' order by id asc limit 1";
                                            $r72 = $conn->query($s72);
                                            if ($r72->num_rows > 0) { while($rs72 = $r72->fetch_assoc()) {
                                                echo"<option value='".$rs72["id"]."'>".$rs72["username"]." ".$rs72["username2"]."</option>";
                                            } }
                                        } }
                                    echo"</select>
                                </div>
                            </div>
                            <div class='col-4 col-lg-4'>
                                <div class='form-group'><label>Document Title *</label><input name='title' type='text' value='' class='form-control required'></div>
                            </div>
                            
                            <div class='col-8 col-lg-2'>
                                <div class='form-group'><label>Hard Copy *</label><input type='file' name='images[]' multiple class='form__field__img form-control' accept='.pdf,' required></div>
                            </div>
                            
                            <div class='col-4 col-lg-2'><div class='form-group'><label>&nbsp; </label><Br>
                                <input type='submit' class='btn btn-icon btn-icon-start btn-outline-primary' data-style='expand-right' value='Upload' onclick=\"setTimeout(function(){ shiftdataV2('projects_client_notes.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 5000);\">
                            </div></div>
                        </div>
                    </fieldset>
                    
                </form><Br><br>";
            }else{
                $sessionid = rand(1234567890,9876543210);
                echo"<form class='m-t' role='form' method='post' action='dataprocessor03.php' id='image_upload_form' target='dataprocessor' enctype='multipart/form-data'>
                    <input type='hidden' name='formid' value='".$_GET["formid"]."'><input type='hidden' name='clientid' value='$clientid'>
                    <input name='submitted_form' type='hidden' id='submitted_form' value='image_upload_form'>
                    <input type='hidden' name='processor' value='generalformsedit'>
                    <input type='hidden' name='redirection' value='off'>
                    <h1>EDIT - General Form</h1>";
                        $ra1X = "select * from general_forms where status='1' and id='".$_GET["formid"]."' order by id desc";
                        $rb1X = $conn->query($ra1X);
                        if ($rb1X->num_rows > 0) { while($rab1X = $rb1X->fetch_assoc()) {
                            $current_date=date("Y-m-d", $rab1X["date"]);
                            echo"<fieldset>
                                <div class='row'>
                                    <div class='col-lg-2'><br>
                                        <div class='form-group'><label>Document Upload Date *</label>
                                            <input name='date1' type='date' value='$current_date' class='form-control required'>
                                        </div>
                                    </div>
                                    <div class='col-lg-2'><br>
                                        <div class='form-group'>
                                            <label>Note Category *</label><select class='form-control m-b required' name='clientid'>";
                                                $s7x = "select * from uerp_user where id='".$rab1X["clientid"]."' and mtype='CLIENT' and status='1' order by id asc";
                                                $r7x = $conn->query($s7x);
                                                if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                    echo"<option value='".$rs7x["id"]."'>".$rs7x["username"]." ".$rs7x["username2"]."</option>";
                                                } }
                                            echo"</select>
                                        </div>
                                    </div>
                                    <div class='col-lg-3'><br>
                                        <div class='form-group'><label>Document Title *</label><input name='title' type='text' value='".$rab1X["title"]."' class='form-control required'></div>
                                    </div>
                                    
                                    <div class='col-lg-3'><br>
                                        <div class='form-group'><label>Document Title * <a href='".$rab1X["filename"]."'>View Document</a>
                                        </label><input type='file' name='images[]' multiple class='form__field__img form-control' accept='.pdf,'></div>
                                    </div>
                                    
                                    <div class='col-lg-1'><br><div class='form-group'><label>&nbsp; </label><Br>
                                        <input type='submit' class='btn btn-icon btn-icon-start btn-outline-primary' data-style='expand-right' value='Update'  onclick=\"setTimeout(function(){ shiftdataV2('projects_client_notes.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 5000);\">
                                    </div></div>
                                    <div class='col-lg-1'><br><div class='form-group'><label>&nbsp; </label><Br>
                                        <input type='button' class='btn btn-icon btn-icon-start btn-outline-secondary' data-style='expand-right' value='New'  onclick=\"setTimeout(function(){ shiftdataV2('projects_client_notes.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."', 'datatableX'); }, 10);\"></a>
                                    </div></div>
                                </div>
                            </fieldset><br><br>";
                        } }
                    
                echo"</form>";
            }
            ?>
            
            <?php if(isset($_GET["postid"])){ ?>
                
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
                <style>
                    body {
                        font-family: 'Roboto', serif;
                        font-size: 10px;
                    }
                </style> <?php
                
                $ra1 = "select * from casenote where id='".$_GET["postid"]."' and status='1' order by id desc";
                $rb1 = $conn->query($ra1);
                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                
                    $post_date=date("d/m/Y", $rab1["pdate"]);
                    $post_date1=date("d/m/Y", $rab1["date1"]);
                    $post_date2=date("d/m/Y", $rab1["date2"]);
                    
                    $clientname="";
                    $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id desc limit 1";
                    $rb2 = $conn->query($ra2);
                    if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                        $clientname1= $rab2["username"];
                        $clientname2= $rab2["username2"];
                        $clientphone= $rab2["phone"];
                        $clientemail= $rab2["email"];
                    } }
                    
                    $employeeid="";
                    $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id desc limit 1";
                    $rb2 = $conn->query($ra2);
                    if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
                        $employeename1= $rab2["username"];
                        $employeename2= $rab2["username2"];
                        $employeephone= $rab2["phone"];
                        $employeeemail= $rab2["email"];
                        $ra22 = "select * from designation where id='".$rab2["designation"]."' order by id desc limit 1";
                        $rb22 = $conn->query($ra22);
                        if ($rb22->num_rows > 0) { while($rab22 = $rb22->fetch_assoc()) { $designation1=$rab22["designation"]; } }
                        
                        $ra33 = "select * from departments where id='".$rab2["department"]."' order by id desc limit 1";
                        $rb33 = $conn->query($ra33);
                        if ($rb33->num_rows > 0) { while($rab33 = $rb33->fetch_assoc()) { $department1=$rab33["department_name"]; } }
                        
                    } }
                    
                    
                    echo"<div class='p-xl' id='element-to-print'> 
                        <div class='row'>
                            <div class='col-lg-10'><h4>Good Will Care Weekly Report</h4><br></div>
                            <div class='col-lg-2' style='text-align:right'><img src='img/logo.png' style='width:100px'></div>
                            <div class='col-lg-12'>
                                <span style='font-size:14pt'><b>Report Information</b></span><hr>
                                <span style='font-size:12pt'>
                                    <table>
                                        <tr><td>Client Name<b></td><td>:</td><td>$clientname1 $clientname2</td></tr>
                                        <tr><td>Week<b></td><td>:</td><td><b>$post_date1 – $post_date2</b></td></tr>
                                        <tr><td>Reporter<b></td><td>:</td><td><b>$employeename1 $employeename2</b></td></tr>
                                        <tr><td colspan=10><hr></td></tr>
                                        <tr><td>Detailed Account<b></td><td>:</td><td></td></tr>
                                        <tr><td colspan=10>".$rab1["note"]."</td></tr>
                                        <tr><td colspan=10><hr></td></tr>
                                        <tr><td>Report Prepared By</td><td>:</td><td></td></tr>
                                        <tr><td>Name</td><td>:</td><td><b>$employeename1 $employeename2</b></td></tr>
                                        <tr><td>Position</td><td>:</td><td><b>$designation1 & $department1, Good Will Care Pty Ltd</b></td></tr>
                                        <tr><td>Post Date</td><td>:</td><td><b>$post_date</b></td></tr>
                                    </table>
                                </span>
                            </div>
                            
                        </div>
                    </div>";
                    
                } } ?>
                
                
                <script>
                    function printDiv(divID) {
                         var divElem = document.getElementById(divID).innerHTML;
                         var printWindow = window.open('', '', 'height=210,width=350'); 
                         printWindow.document.write('<html><head><title></title></head>');
                         printWindow.document.write('<body>');
                         printWindow.document.write(divElem);
                         printWindow.document.write('</body>');
                         printWindow.document.write ('</html>');
                         printWindow.document.close();
                         printWindow.print();
                    }
                </script>
            	
            	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
                
                <script>
                    var element = document.getElementById('element-to-print');
                    html2pdf(element, {
                        margin: 10,
                        filename: 'casefile.pdf',
                        image: { type: 'jpeg', quality: 0.98 },
                        html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
                        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
                    });
                </script>
                
                <?php
            }
            
            echo"<div class='table-responsive'>
                <table class='table table-striped table-bordered table-hover dataTables-example' >
                    <thead><tr><th nowrap>Form ID</th><th nowrap>Date</th><th> Title</th><th>Document</th><th colspan=3'></th></tr></thead>
                    <tbody>";
                        
                        $ra1 = "select * from general_forms where clientid='$clientid' and status='1' order by id desc";
                        $rb1 = $conn->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                            
                            $post_date=date("d-m-y H:m", $rab1["date"]);
                            
                            $clientname="";
                            $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id desc limit 1";
                            $rb2 = $conn->query($ra2);
                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $clientname= "".$rab2["username"]." ".$rab2["username2"].""; } }
                            
                            $employeename="";
                            $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id desc limit 1";
                            $rb2 = $conn->query($ra2);
                            if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $employeename= "".$rab2["username"]." ".$rab2["username2"].""; } }
                            
                            echo"<tr class='gradeX'>
                                <td nowrap>&nbsp;".$rab1["date"]."".$rab1["id"]."</td>
                                <td nowrap>$post_date</td><td>".$rab1["title"]."</td>
                                <td align=center><a href='".$rab1["filename"]."'>Download</a></td>
                                <td align=center><a href='#' onclick=\"shiftdataV2('projects_client_notes.php?sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."&formid=".$rab1["id"]."', 'datatableX')\" style='color:lightgreen'><i class='fa fa-edit'></i></a></td>
                                <td align=center><a href='#' style='color:lightred' target='dataprocessor'><i class='fa fa-trash'></i></a></td>
                            </tr>";
                            
                        } }    
                    echo"</tbody>
                </table>
                <div style='height:100px'>&nbsp;</div>
            </div>";
    
    // }
?>