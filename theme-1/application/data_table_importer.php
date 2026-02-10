<?php
/*
    // error_reporting(0);
    include('../include.php');
    $t=0;
    $a1 = "select * from sms_mega_downloads where mtype='PRODUCT' order by id asc";
    $a2 = $conn->query($a1);
    if ($a2->num_rows > 0) { while($a3 = $a2->fetch_assoc()) {
        $reactor=rand(100000000,999999999);
        $datex=time();
        
        $sql = "insert into sms_product_bon (cid,cid2,bid,vid,pname,sku,qty,price,offer,offer_sd,offer_ed,discount,discount_type,
        v_comm,comm_type,tag,introduction,detail,ws,ws_status,ws11,ws22,ws33,ws44,ws55,ws66,c_status,c1,c2,c3,c4,c5,status,ws1,ws2,
        ws3,ws4,ws5,ws6,reactor,date,attribute_1,attribute_2,attribute_3,attribute_4,attribute_5,attribute_6,views,review,terms,
        returnpolicy,affiliate_commission,weight,gross_weight,net_weight,carton_size,pcs_per_carton) 
        VALUES ('".$a3["cname"]."','".$a3["cname2"]."','".$a3["type"]."','".$a3["mid"]."','".$a3["company_name"]."','".$a3["sku"]."',
        '".$a3["qty"]."','".$a3["price1"]."','".$a3["offerprice"]."','0','0','".$a3["discount"]."','".$a3["discounttype"]."',
        '".$a3["commission"]."','".$a3["commissiontype"]."','".$a3["remarks_tags"]."','".$a3["des1"]."','".$a3["des2"]."',
        '".$a3["option1t"]."','OFF','".$a3["option1a"]."','".$a3["option1b"]."','".$a3["option1c"]."','".$a3["option1d"]."',
        '".$a3["option1e"]."','".$a3["option1f"]."','OFF','".$a3["option2a"]."','".$a3["option2b"]."','".$a3["option2c"]."',
        '".$a3["option2d"]."','".$a3["option2e"]."','2','".$a3["option2pa"]."','".$a3["option2pb"]."',
        '".$a3["option2pc"]."','".$a3["option2pd"]."','".$a3["option2pe"]."','".$a3["option2pf"]."','$reactor','".$a3["date"]."',
        'OFF','OFF','OFF','OFF','OFF','OFF','0','".$a3["review"]."','".$a3["terms"]."','".$a3["returnpolicy"]."','".$a3["aff_comm"]."',
        '0','0','0','0','0')";
        if ($conn->query($sql) === TRUE){
            // echo"<script>alert('Record Saved.')</script>";
            $recid=0;
            $sql = "SELECT * FROM sms_product_bon where reactor='$reactor' order by id desc limit 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { $recid=$row["id"]; } }
            if($a3["image"]!=0){
                $image="../".$a3["image"]."";
                $sql = "INSERT INTO multi_image (pid,image,note,status,table_name,remark,reactor,date) 
                VALUES ('$recid','$image','".$a3["company_name"]."','1','sms_product_bon','PRODUCT','$reactor','$datex')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            if($a3["image1"]!=0){
                $image1="../".$a3["image1"]."";
                $sql = "INSERT INTO multi_image (pid,image,note,status,table_name,remark,reactor,date) 
                VALUES ('$recid','$image1','".$a3["company_name"]."','1','sms_product_bon','PRODUCT','$reactor','$datex')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            if($a3["image2"]!=0){
                $image2="../".$a3["image2"]."";
                $sql = "INSERT INTO multi_image (pid,image,note,status,table_name,remark,reactor,date) 
                VALUES ('$recid','$image2','".$a3["company_name"]."','1','sms_product_bon','PRODUCT','$reactor','$datex')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            if($a3["image3"]!=0){
                $image3="../".$a3["image3"]."";
                $sql = "INSERT INTO multi_image (pid,image,note,status,table_name,remark,reactor,date) 
                VALUES ('$recid','$image3','".$a3["company_name"]."','1','sms_product_bon','PRODUCT','$reactor','$datex')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            if($a3["image4"]!=0){
                $image4="../".$a3["image4"]."";
                $sql = "INSERT INTO multi_image (pid,image,note,status,table_name,remark,reactor,date) 
                VALUES ('$recid','$image4','".$a3["company_name"]."','1','sms_product_bon','PRODUCT','$reactor','$datex')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
            if($a3["image4"]!=0){
                $image5="../".$a3["image5"]."";
                $sql = "INSERT INTO multi_image (pid,image,note,status,table_name,remark,reactor,date) 
                VALUES ('$recid','$image5','".$a3["company_name"]."','1','sms_product_bon','PRODUCT','$reactor','$datex')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            }
        }

        $t=($t+1);
        echo"$t, ";

    } }
*/
?>