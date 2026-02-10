<!DOCTYPE html>
<html lang='en' data-footer='true'>
    <?php
        
        include("authenticator.php");
        include("head.php");
        
        $tday=time();
        
        if(isset($_POST["pid"])) $pid=$_POST["pid"];
        if(isset($_POST["projectid"])) $pid=$_POST["projectid"];
        else if(isset($_GET["pid"])) $pid=$_GET["pid"];
        else $pid=0;
        
        if(isset($_GET["delid"])){
            $sql = "delete from project_forms where id='".$_GET["delid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["processor"]) && $_POST["processor"]=="categorydata"){
            $cdate=strtotime($_POST["cdate"]);
            $cname = str_replace("'", "`", $_POST["cname"]);
            $contact = str_replace("'", "`", $_POST["contact"]);
            $note = str_replace("'", "`", $_POST["note"]);
            $randid=time();
            	
            $sql = "INSERT INTO project_forms (uid,projectid,categoryid,cname,contact,date,type,note,randid,status) 
            VALUES ('".$_COOKIE["userid"]."','".$_POST["projectid"]."','".$_POST["id"]."','$cname','$contact','$cdate','".$_POST["processor1"]."','$note','$randid','1')";
            if ($conn->query($sql) === TRUE){
                $recid=0;
                $sql = "SELECT * FROM project_forms where randid='$randid' order by id desc limit 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $recid=$row["id"]; } }
                if($recid!="0"){
                    $dbnamex=$_COOKIE['dbname'];
                    foreach ($_FILES['images']['name'] as $key => $name){
                        $rand= rand(10000,99999);
                        $path_parts = pathinfo($name);
                        $extension = $path_parts['extension'];
                		$newFilename = time() . "_$dbnamex." . $extension;
                		move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/clientprofile/' . $newFilename);
                		$location = 'media/clientprofile/' . $newFilename;
                		$extension1=strlen("$extension");
                        if($extension1>=3){
                    		$sql = "INSERT INTO project_multi_image (uid,postid,location,randid,date,status,source) 
                            VALUES ('".$_COOKIE["userid"]."','$recid','$location','$randid','$randid','1','COMMUNICATION BOOK')";
                            if ($conn->query($sql) === TRUE) $tomtom=0;
                        }
                	}
                }
            }
            $pid=$_POST["projectid"];
        }
        
        echo"<section class='scroll-section' id='stripedRows'>
            <div class='card mb-5'>
                <div class='card-body' >";
                
                    $wsp1 = "select * from project where status='15' and id='$pid' order by id desc limit 1";
                    $wsp2 = $conn->query($wsp1);
                    if ($wsp2->num_rows > 0) { while($wsp3 = $wsp2 -> fetch_assoc()) { 
                        $currenttime=time();
                        $currentdate=date("Y-m-d",$currenttime);
                
                        echo"<form method='post' action='workspace_documents.php' id='image_upload_form' enctype='multipart/form-data'>
                            <input type='hidden' name='processor' value='categorydata'><input type='hidden' name='processor1' value='DOCUMENT MANAGEMENT'>
                            <input type='hidden' name='projectid' value='".$wsp3["id"]."'><input type='hidden' name='cdate' value='$currentdate'>
                            <input name='contact' type='hidden' value='0'><input name='geturl' type='hidden' value='123'>
                            <input type='hidden' name='sessionid' value=''>
                            <div class='row'>
                                <div class='col-12 col-md-3' style='margin-bottom:25px'><label class='mb-3 top-label'>
                                    <span>Project Related Categories *</span>
                                    <select class='form-control m-b' name='id' onchange='this.form.sessionid.value=this.value'>
                                        <option value='0'>Select Category</option>";
                                        $sb1 = "select * from project_category where status='1' order by category asc";
                                        $rb1 = $conn->query($sb1);
                                        if ($rb1->num_rows > 0) { while($rsb1 = $rb1->fetch_assoc()) {
                                            echo"<option value='".$rsb1["id"]."'>".$rsb1["category"]."</option>";
                                        } }
                                    echo"</select>
                                </label></div>
                                <div class='col-12 col-md-3' style='margin-bottom:25px'><label class='mb-3 top-label'>
                                    <span>Concern/Title Name</span>
                                    <input name='cname' type='text' value='' class='form-control'>
                                </label></div>
                                <div class='col-12 col-md-3' style='margin-bottom:25px'><label class='mb-3 top-label'>
                                    <span>Note</span>
                                    <input name='note' type='text' value='' class='form-control'>
                                </label></div>
                                <div class='col-12 col-md-2' style='margin-bottom:25px'><label class='mb-3 top-label'>
                                    <span>Select Document to Upload *</span>
                                    <input type='file' name='images[]' multiple class='form-control' accept='.doc, .docx, .pdf, .jpg, .png, .gif, .jpeg'>
                                </label></div>
                                <div class='col-12 col-md-1' style='margin-bottom:25px'>
                                    <input type='submit' name='Upload' class='btn btn-primary' style='margin-top:10px'>
                                </label></div>
                            </div>
                        </form>";
                    } }
                
                    echo"<table class='table table-striped'>
                        <thead><tr><th scope='col'>Date</th><th scope='col'>Category</th><th scope='col'>Title & Note</th><th scope='col'>Documents</th><th scope='col' style='text-align:center'>Action</th></tr></thead>";
                            
                        $wsp1 = "select * from project_forms where projectid='$pid' order by id asc";
                        $wsp2 = $conn->query($wsp1);
                        if ($wsp2->num_rows > 0) { while($wsp3 = $wsp2 -> fetch_assoc()) {
                            $wsp4 = "select * from project_category where id='".$wsp3["categoryid"]."' order by id desc limit 1";
                            $wsp5 = $conn->query($wsp4);
                            if ($wsp5->num_rows > 0) { while($wsp6 = $wsp5 -> fetch_assoc()) { $categoryname=$wsp6["category"]; } }
                            
                            $cdate=date("d-m-Y", $wsp3["date"]);
                            echo"<tr style='padding:10px'>
                                <th scope='row' nowrap>$cdate</td>
                                <td style='width:20%;text-align:left'>$categoryname</td>
                                <td style='width:20%;text-align:left'><b>".$wsp3["cname"]."</b><br>".$wsp3["note"]."</td>
                                <td>";
                                    $t=0;
                                    $ra1x = "select * from project_multi_image where postid='".$wsp3["id"]."' and randid='".$wsp3["randid"]."' and status='1' order by id desc";
                                    $rb1x = $conn->query($ra1x);
                                    if ($rb1x->num_rows > 0) { while($rab1x = $rb1x->fetch_assoc()) {
                                        $loclength=0;
                                        $loclength=strlen($rab1x["location"]);
                                        if($loclength>=32){
                                            $t=($t+1);
                                            $locname="";
                                            $locname=substr($rab1x["location"],35);
                                            echo"<a href='".$rab1x["location"]."' target='cm'>$t. $locname</a><br>";
                                        }
                                    } }
                                echo"</td>
                                <td style='width:10%;text-align:center;color:red;'>
                                    <a href='workspace_documents.php?delid=".$wsp3["id"]."&pid=$pid' target='_self'><i class='fa fa-times'></i></a>
                                </td>
                            </tr>";
                        } }
                    echo"</table>
                </div>
            </div>
        </section>";
        
        include("scripts.php");
    
    ?>
    </body>
</html>