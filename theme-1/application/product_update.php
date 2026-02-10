<?php
    // error_reporting(0);
    include('../include.php');
    
    date_default_timezone_set("Asia/Dhaka");

    if(isset($_GET["processor"])){
        if($_GET["processor"]=="approveproduct"){
            $sql="update sms_product_bon set status='2' where id='".$_GET["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Product Approved')</script>";
        }
        if($_GET["processor"]=="suspendproduct"){
            $sql="update sms_product_bon set status='0' where id='".$_GET["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Product Suspended')</script>";
        }
        if($_GET["processor"]=="pendingproduct"){
            $sql="update sms_product_bon set status='1' where id='".$_GET["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Product Un Approved')</script>";
        }
    }

    if(isset($_POST["processor"])){
        if($_POST["processor"]=="imageupdate"){
            $sql="update multi_image set sorder='".$_POST["sorder"]."' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
    
        if($_POST["processor"]=="addproduct"){
            $pname = str_replace("'", "`", $_POST["pname"]);
            $introduction = str_replace("'", "`", $_POST["introduction"]);
            $detail = str_replace("'", "`", $_POST["detail"]);
            $reactor=rand(100000000,999999999);
            
            $datex=time();
            if($_POST["offer_sd"]<=10000) $offer_sd=0;
            else $offer_sd=strtotime($_POST["offer_sd"]);
            if($_POST["offer_ed"]<=10000) $offer_ed=0;
            else $offer_ed=strtotime($_POST["offer_ed"]);
                        
            $cat1x=strripos("".$_POST["cid"]."","--");
			$cat1x=($cat1x+2);
            $cat1x=substr("".$_POST["cid"]."",$cat1x);
            
            $cat2x=strripos("".$_POST["cid2"]."","--");
            $cat2x=($cat2x+2);
			$cat2x=substr("".$_POST["cid2"]."",$cat2x);
            
            $sql = "insert into sms_product_bon (cid,cid2,bid,vid,pname,sku,qty,price,offer,discount,discount_type,
            v_comm,comm_type,tag,introduction,detail,ws,ws_status,ws1,ws2,ws3,ws4,ws5,ws6,c_status,c1,c2,c3,c4,c5,
            ws11,ws22,ws33,ws44,ws55,ws66,reactor,date,offer_sd,offer_ed,shipping_policy,returnpolicy,payment_terms,
            vendor_terms,attribute_1,attribute_2,attribute_3,attribute_4,attribute_5,attribute_6,status) 
            VALUES ('$cat1x','$cat2x','".$_POST["bid"]."','".$_POST["vid"]."','$pname',
            '".$_POST["sku"]."','".$_POST["qty"]."','".$_POST["price"]."','".$_POST["offer"]."','".$_POST["discount"]."',
            '".$_POST["discount_type"]."','".$_POST["v_comm"]."','".$_POST["comm_type"]."','".$_POST["tag"]."',
            '$introduction','$detail','".$_POST["ws"]."','".$_POST["ws_status"]."','".$_POST["ws1"]."',
            '".$_POST["ws2"]."','".$_POST["ws3"]."','".$_POST["ws4"]."','".$_POST["ws5"]."','".$_POST["ws6"]."',
            '".$_POST["c_status"]."','".$_POST["c1"]."','".$_POST["c2"]."','".$_POST["c3"]."','".$_POST["c4"]."',
            '".$_POST["c5"]."','".$_POST["ws11"]."','".$_POST["ws22"]."','".$_POST["ws33"]."','".$_POST["ws44"]."',
            '".$_POST["ws55"]."','".$_POST["ws66"]."','$reactor','$datex','$offer_sd','$offer_ed',
            '".$_POST["sp"]."','".$_POST["rp"]."','".$_POST["vp"]."','".$_POST["pp"]."','".$_POST["attribute_1"]."',
            '".$_POST["attribute_2"]."','".$_POST["attribute_3"]."','".$_POST["attribute_4"]."','".$_POST["attribute_5"]."',
            '".$_POST["attribute_6"]."','1')";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('Product Data Updated.')</script>";
                $recid=0;
                $sql = "SELECT * FROM sms_product_bon where reactor='$reactor' order by id desc limit 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $recid=$row["id"]; } }
                if($recid!=0){
                    $extension=0;
                    foreach ($_FILES['images']['name'] as $key => $name){
                        $rand= rand(10000,99999);
                        $path_parts = pathinfo($name);
                        $extension = $path_parts['extension'];
                            
                        $newFilename = time() . "smsbd$rand." . $extension;
                        move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/products/' . $newFilename);
                        $location = '../media/products/' . $newFilename;
                        $extension1=strlen("$extension");
                        if($extension1>=3){
                            $sql = "INSERT INTO multi_image (pid,image,note,status,table_name,remark,reactor,date) VALUES ('$recid','$location','$pname','1','sms_product_bon','PRODUCT','$reactor','$datex')";
                            if ($conn->query($sql) === TRUE) $tomtom=0;
                        }
                    }
                }
            }
        }
        
        if($_POST["processor"]=="editproduct"){
            $pname = str_replace("'", "`", $_POST["pname"]);
            $introduction = str_replace("'", "`", $_POST["introduction"]);
            $detail = str_replace("'", "`", $_POST["detail"]);
            $datex=time();            
            if($_POST["offer_sd"]<=10000) $offer_sd=0;
            else $offer_sd=strtotime($_POST["offer_sd"]);
            if($_POST["offer_ed"]<=10000) $offer_ed=0;
            else $offer_ed=strtotime($_POST["offer_ed"]);
                        
            $cat1x=strripos("".$_POST["cid"]."","--");
			$cat1x=($cat1x+2);
            $cat1x=substr("".$_POST["cid"]."",$cat1x);
            
            $cat2x=strripos("".$_POST["cid2"]."","--");
            $cat2x=($cat2x+2);
			$cat2x=substr("".$_POST["cid2"]."",$cat2x);
            
            $sql="update sms_product_bon set cid='$cat1x',cid2='$cat2x',bid='".$_POST["bid"]."',vid='".$_POST["vid"]."',
            pname='$pname',sku='".$_POST["sku"]."',qty='".$_POST["qty"]."',price='".$_POST["price"]."',offer='".$_POST["offer"]."',
            offer_sd='$offer_sd',offer_ed='$offer_ed',shipping_policy='".$_POST["sp"]."',returnpolicy='".$_POST["rp"]."',
            payment_terms='".$_POST["pp"]."',vendor_terms='".$_POST["vp"]."',discount='".$_POST["discount"]."',
            discount_type='".$_POST["discount_type"]."',v_comm='".$_POST["v_comm"]."',comm_type='".$_POST["comm_type"]."',
            tag='".$_POST["tag"]."',introduction='$introduction',detail='$detail',ws='".$_POST["ws"]."',ws_status='".$_POST["ws_status"]."',
            ws1='".$_POST["ws1"]."',ws2='".$_POST["ws2"]."',ws3='".$_POST["ws3"]."',ws4='".$_POST["ws4"]."',ws5='".$_POST["ws5"]."',
            ws6='".$_POST["ws6"]."',c_status='".$_POST["c_status"]."',c1='".$_POST["c1"]."',c2='".$_POST["c2"]."',c3='".$_POST["c3"]."',
            c4='".$_POST["c4"]."',c5='".$_POST["c5"]."',ws11='".$_POST["ws11"]."',ws22='".$_POST["ws22"]."',ws33='".$_POST["ws33"]."',
            ws44='".$_POST["ws44"]."',ws55='".$_POST["ws55"]."',ws66='".$_POST["ws66"]."',attribute_1='".$_POST["attribute_1"]."',
            attribute_2='".$_POST["attribute_2"]."',attribute_3='".$_POST["attribute_3"]."',attribute_4='".$_POST["attribute_4"]."',
            attribute_5='".$_POST["attribute_5"]."',attribute_6='".$_POST["attribute_6"]."' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('Product Data Updated.')</script>";
                $extension=0;
                foreach ($_FILES['images']['name'] as $key => $name){
                    $rand= rand(10000,99999);
                    $path_parts = pathinfo($name);
                    $extension = $path_parts['extension'];
                            
                    $newFilename = time() . "smsbd$rand." . $extension;
                    move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/products/' . $newFilename);
                    $location = '../media/products/' . $newFilename;
                    $extension1=strlen("$extension");
                    if($extension1>=3){
                        $sql = "INSERT INTO multi_image (pid,image,note,status,table_name,remark,reactor,date) VALUES ('".$_POST["id"]."','$location','$pname','1','sms_product_bon','PRODUCT','".$_POST["reactor"]."','$datex')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                    }
                }
            }
        }
    }
    
?>