<?php
    
    // error_reporting(0);
    include('include.php');
    
    $dbnamex=$_COOKIE['dbname'];
    
    date_default_timezone_set("Asia/Dhaka");

    if(isset($_GET["processor"])){
        if($_GET["processor"]=="GlobalSuspend"){
            $tablename=$_GET["tid"];
            $sql="update $tablename set ".$_GET["sid1"]."='".$_GET["status"]."' where ".$_GET["sid"]."='".$_GET["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('".$_GET["sid1"]." Updated.')</script>";
        }
    }
    
    // ADD CATEGORY
    if($_POST["processor"]=="createcategory"){
        $category_name = str_replace("'", "`", $_POST["name"]);
        $sql = "insert into modules (name,parent,dashboard,status) 
        VALUES ('$category_name','".$_POST["parent"]."','1','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    
    // EDIT CATEGORY
    if($_POST["processor"]=="editcategory"){
        $category_name = str_replace("'", "`", $_POST["name"]);
        $sql="update modules set name='$category_name',parent='".$_POST["parent"]."',status='".$_POST["status"]."' where id='".$_POST["cid"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script>";
    }
    
    // DOCUMENTS
    if($_POST["processor"]=="uploaddocuments"){
        $document_name = str_replace("'", "`", $_POST["document_name"]);
        $expire_date=strtotime($_POST["expire_date"]);
        $randid=time();
        
        $sql = "insert into global_documents (document_name,categoryid,employeeid,card_number,post_date,expire_date,hard_copy,status) 
        VALUES ('$document_name','".$_POST["categoryid"]."','".$_COOKIE["userid"]."','".$_POST["card_number"]."','$randid','$expire_date','$randid','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE){
            $recid=0;
            $sql = "SELECT * FROM global_documents where hard_copy='$randid' order by id desc limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $recid=$row["id"]; } }
            if($recid!="0"){
                // echo"<script>alert('Record Found...')</script>";
                foreach ($_FILES['images']['name'] as $key => $name){
                    $extension=0;
                    $rand= rand(10000,99999);
                    $path_parts = pathinfo($name);
                    $extension = $path_parts['extension'];
            		$newFilename = time() . "$dbnamex." . $extension;
            		move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/documents/' . $newFilename);
            		$location = 'media/documents/' . $newFilename;
            		if(strlen($extension)>=3){
                		$sql = "INSERT INTO multi_documents (uid,postid,location,randid,date,status,source) 
                        VALUES ('".$_COOKIE["userid"]."','$recid','$location','$randid','$randid','1','GLOBAL DOCUMENTS')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
            		}
            	}
            }
            // echo"<script>alert('Document Stored Successfully.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','GLOBAL DOCUMENTS','".$_POST["id"]."','$sysdate','$ip','1','Added Global Documents','".$_COOKIE["userid"]."','$recid','global_documents')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            echo"<form method='get' action='index.php' name='main' target='_top'>
                <input type=hidden name='url' value='".$_POST["url"]."'>
                <input type=hidden name='categoryid' value='".$_POST["categoryid"]."'>
                <input type=hidden name='id' value='".$_POST["id"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
    }
    
    // EDIT DOCUMENTS
    if($_POST["processor"]=="edit_uploaddocuments"){
        $document_name = str_replace("'", "`", $_POST["document_name"]);
        $expire_date=strtotime($_POST["expire_date"]);
        $randid=$_POST["hard_copy"];
        
        $sql="update global_documents set document_name='$document_name',categoryid='".$_POST["categoryid"]."',card_number='".$_POST["card_number"]."',expire_date='$expire_date',status='".$_POST["status"]."' where id='".$_POST["cid"]."'";
        if ($conn->query($sql) === TRUE){
            $recid=0;
            $recid=$_POST["cid"];
            if($recid!="0"){
                foreach ($_FILES['images']['name'] as $key => $name){
                    $extention=0;
                    $rand= rand(10000,99999);
                    $path_parts = pathinfo($name);
                    $extension = $path_parts['extension'];
            		$newFilename = time() . "$dbnamex." . $extension;
            		move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/documents/' . $newFilename);
            		$location = 'media/documents/' . $newFilename;
            		if(strlen($extention)>=3){
            		    $sql = "INSERT INTO multi_documents (uid,postid,location,randid,date,status,source) 
                        VALUES ('".$_COOKIE["userid"]."','$recid','$location','$randid','$randid','1','GLOBAL DOCUMENTS')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
            		}
            	}
            }
            // echo"<script>alert('Document Updated & Stored Successfully.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','GLOBAL DOCUMENTS UPDATE','".$_POST["cid"]."','$sysdate','$ip','1','Added Global Documents','".$_COOKIE["userid"]."','$recid','global_documents')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            echo"<form method='get' action='index.php' name='main' target='_top'>
                <input type=text name='url' value='".$_POST["url"]."'>
                <input type=text name='categoryid' value='".$_POST["categoryid"]."'>
                <input type=text name='id' value='".$_POST["id"]."'>
                <input type=text name='empid' value='".$_POST["employeeid"]."'>
                <input type=text name='pinter' value='1'>
            </form>";
            ?><script language=JavaScript> document.main.submit(); </script><?php
            
        }
        
    } 
    
?>