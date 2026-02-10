<?php
    // error_reporting(0);
    include('include.php');
    
    $dbnamex=$_COOKIE["dbname"];
    
    date_default_timezone_set("Asia/Dhaka");

    // status update
    if(isset($_GET["processor"])){
        if($_GET["processor"]=="StatusSuspend"){
            $tablename=$_GET["tid"];
            $sql="update $tablename set status='".$_GET["status"]."' where id='".$_GET["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Status Record Updated.')</script>";
        }
    }
    // global data update
    if(isset($_GET["processor"])){
        if($_GET["processor"]=="GlobalSuspend"){
            $tablename=$_GET["tid"];
            $sql="update $tablename set ".$_GET["sid1"]."='".$_GET["status"]."' where ".$_GET["sid"]."='".$_GET["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('".$_GET["sid1"]." Updated.')</script>";
        }
    }
    
    // delete record
    if(isset($_POST["delid"])){
        if($_POST["delid"]!=0){
            if(isset($_POST["tbl"])){
                $sql="delete from ".$_POST["tbl"]." where id='".$_POST["delid"]."'";
                if ($conn->query($sql) === TRUE) echo"<script>alert('Record Deleted. ".$_POST["delid"]." ".$_POST["tbl"]."')</script>";
            }
        }
    }
    
    // update record
    if(isset($_POST["pid"])){
        if($_POST["pid"]!=0){
            if(isset($_POST["tbl"])){
                $sql="update ".$_POST["tbl"]." set ".$_POST["field_name"]."='".$_POST["pvalue"]."' where id='".$_POST["pid"]."'";
    	        if ($conn->query($sql) === TRUE) $tomtom=0;
    	        //echo"<script>alert('Record Updated.')</script>";
            }
        }
    }
    
    // EDIT PURCHASE VOUCHER
    
    if($_POST["processor"]=="edit_purchase_voucher"){
        $product_name = str_replace("'", "`", $_POST["product_name"]);
        $note = str_replace("'", "`", $_POST["note"]);
        $purchase_date=strtotime($_POST["purchase_date"]);
        
        $sql = "insert into purchase_voucher (purchase_no,purchase_date,narration,ledger_id,qty,cr_amt,purchased_from,status,invoice_no,product_id,proj_id,user_id,order_status) 
        VALUES ('".$_POST["purchase_no"]."','$purchase_date','$note','".$_POST["ledger_id"]."','".$_POST["quantity"]."','".$_POST["amount"]."','".$_POST["purchased_from"]."','".$_POST["status"]."','".$_POST["invoice_no"]."','".$_POST["product_id"]."','".$_POST["proj_id"]."','".$_POST["user_id"]."','1')";
        if ($conn->query($sql) === TRUE){
            $sql="update purchase_voucher set purchase_date='$purchase_date',ledger_id='".$_POST["ledger_id"]."',purchased_from='".$_POST["purchased_from"]."',invoice_no='".$_POST["invoice_no"]."',proj_id='".$_POST["project_id"]."' where purchase_no='".$_POST["purchase_no"]."'";
    	    if ($conn->query($sql) === TRUE) $tomtom=0;
            echo"<script>alert('Purchase Item Added.')</script>";
        }
    }
    
    // ADD PURCHASE VOUCHER
    if($_POST["processor"]=="new_product"){
        $product_name = str_replace("'", "`", $_POST["product_name"]);
        $introduction = str_replace("'", "`", $_POST["introduction"]);
        $description = str_replace("'", "`", $_POST["description"]);
        $shipping_policy = str_replace("'", "`", $_POST["shipping_policy"]);
        $return_policy = str_replace("'", "`", $_POST["return_policy"]);
        $vendor_policy = str_replace("'", "`", $_POST["vendor_policy"]);
        $payment_policy = str_replace("'", "`", $_POST["payment_policy"]);
        
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/products/' . $newFilename);
            $location = 'media/products/' . $newFilename;
        }
        $extension1=strlen("$extension");
    	if($extension1>=3){
            $sql = "insert into product (product_name,image,sku,category,category2,brand,introduction,description,size,weight,color,material,capacity,flavour,
            style,bundles,modal,age,gender,genetic,shipping_policy,return_policy,vendor_policy,payment_policy,video_link,status) 
            VALUES ('$product_name','$location','".$_POST["sku"]."','".$_POST["category1"]."','".$_POST["category2"]."','".$_POST["brand"]."',
            '$introduction','$description','".$_POST["size"]."','".$_POST["weight"]."','".$_POST["color"]."','".$_POST["material"]."',
            '".$_POST["capacity"]."','".$_POST["flavour"]."','".$_POST["style"]."','".$_POST["bundles"]."','".$_POST["modal"]."','".$_POST["age"]."',
            '".$_POST["gender"]."','".$_POST["genetic"]."','$shipping_policy','$return_policy','$vendor_policy','$payment_policy','".$_POST["video_link"]."','".$_POST["status"]."')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('New Product Added with Image.')</script>";
    	}else{
    	    $sql = "insert into product (product_name,sku,category,category2,brand,introduction,description,size,weight,color,material,capacity,flavour,
            style,bundles,modal,age,gender,genetic,shipping_policy,return_policy,vendor_policy,payment_policy,video_link,status) 
            VALUES ('$product_name','".$_POST["sku"]."','".$_POST["category1"]."','".$_POST["category2"]."','".$_POST["brand"]."',
            '$introduction','$description','".$_POST["size"]."','".$_POST["weight"]."','".$_POST["color"]."','".$_POST["material"]."',
            '".$_POST["capacity"]."','".$_POST["flavour"]."','".$_POST["style"]."','".$_POST["bundles"]."','".$_POST["modal"]."','".$_POST["age"]."',
            '".$_POST["gender"]."','".$_POST["genetic"]."','$shipping_policy','$return_policy','$vendor_policy','$payment_policy','".$_POST["video_link"]."','".$_POST["status"]."')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('New Product Added.')</script>";
    	}
    }
    
    // EDIT PURCHASE VOUCHER
    if($_POST["processor"]=="edit_product"){
        $product_name = str_replace("'", "`", $_POST["product_name"]);
        $introduction = str_replace("'", "`", $_POST["introduction"]);
        $description = str_replace("'", "`", $_POST["description"]);
        $shipping_policy = str_replace("'", "`", $_POST["shipping_policy"]);
        $return_policy = str_replace("'", "`", $_POST["return_policy"]);
        $vendor_policy = str_replace("'", "`", $_POST["vendor_policy"]);
        $payment_policy = str_replace("'", "`", $_POST["payment_policy"]);
        
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/products/' . $newFilename);
            $location = 'media/products/' . $newFilename;
        }
        $extension1=strlen("$extension");
    	if($extension1>=3){
    	    $sql="update product set product_name='$product_name',image='$location',sku='".$_POST["sku"]."',category='".$_POST["category1"]."',
    	    category2='".$_POST["category2"]."',brand='".$_POST["brand"]."',introduction='$introduction',description='$description',
    	    size='".$_POST["size"]."',weight='".$_POST["weight"]."',color='".$_POST["color"]."',material='".$_POST["material"]."',
    	    capacity='".$_POST["capacity"]."',flavour='".$_POST["flavour"]."',style='".$_POST["style"]."',bundles='".$_POST["bundles"]."',
    	    modal='".$_POST["modal"]."',age='".$_POST["age"]."',gender='".$_POST["gender"]."',genetic='".$_POST["genetic"]."',
    	    shipping_policy='$shipping_policy',return_policy='$return_policy',vendor_policy='$vendor_policy',payment_policy='$payment_policy',
    	    video_link='".$_POST["video_link"]."',status='".$_POST["status"]."' where productid='".$_POST["productid"]."'";
    	    if ($conn->query($sql) === TRUE) echo"<script>alert('Product Record Updated with Image.')</script>";
    	}else{
    	    $sql="update product set product_name='$product_name',sku='".$_POST["sku"]."',category='".$_POST["category1"]."',
    	    category2='".$_POST["category2"]."',brand='".$_POST["brand"]."',introduction='$introduction',description='$description',
    	    size='".$_POST["size"]."',weight='".$_POST["weight"]."',color='".$_POST["color"]."',material='".$_POST["material"]."',
    	    capacity='".$_POST["capacity"]."',flavour='".$_POST["flavour"]."',style='".$_POST["style"]."',bundles='".$_POST["bundles"]."',
    	    modal='".$_POST["modal"]."',age='".$_POST["age"]."',gender='".$_POST["gender"]."',genetic='".$_POST["genetic"]."',
    	    shipping_policy='$shipping_policy',return_policy='$return_policy',vendor_policy='$vendor_policy',payment_policy='$payment_policy',
    	    video_link='".$_POST["video_link"]."',status='".$_POST["status"]."' where productid='".$_POST["productid"]."'";
    	    if ($conn->query($sql) === TRUE) echo"<script>alert('Product Record Updated.')</script>";
    	}
    }
    
    // ADD PURCHASE VOUCHER
    if($_POST["processor"]=="new_purchase_voucher"){
        $product_name = str_replace("'", "`", $_POST["product_name"]);
        $note = str_replace("'", "`", $_POST["note"]);
        $purchase_date=strtotime($_POST["purchase_date"]);
        
        $sql = "insert into purchase_voucher (purchase_no,purchase_date,narration,ledger_id,qty,cr_amt,purchased_from,status,invoice_no,product_id,proj_id,user_id) 
        VALUES ('".$_POST["purchase_no"]."','$purchase_date','$note','".$_POST["ledger_id"]."','".$_POST["quantity"]."','".$_POST["amount"]."','".$_POST["purchased_from"]."','".$_POST["status"]."','".$_POST["invoice_no"]."','".$_POST["product_id"]."','".$_POST["proj_id"]."','".$_POST["user_id"]."')";
        if ($conn->query($sql) === TRUE){
            $sql="update purchase_voucher set purchase_date='$purchase_date',ledger_id='".$_POST["ledger_id"]."',purchased_from='".$_POST["purchased_from"]."',invoice_no='".$_POST["invoice_no"]."',proj_id='".$_POST["project_id"]."' where purchase_no='".$_POST["purchase_no"]."'";
    	    if ($conn->query($sql) === TRUE) $tomtom=0;
            echo"<script>alert('Purchase Item Added.')</script>";
        }
    }
    
    // PURCHASE CLOSING
    if($_POST["processor"]=="process_purchase"){
        $sql="update purchase_voucher set order_status='1' where purchase_no='".$_POST["purchase_no"]."' and proj_id='".$_POST["proj_id"]."' and ledger_id='".$_POST["ledger_id"]."' and user_id='".$_POST["user_id"]."'";
    	if ($conn->query($sql) === TRUE){
    	    $s1x = "select * from purchase_voucher where purchase_no='".$_POST["purchase_no"]."' and proj_id='".$_POST["proj_id"]."' and ledger_id='".$_POST["ledger_id"]."' and user_id='".$_POST["user_id"]."' order by id asc";
            $r1x = $conn->query($s1x);
            if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                $sql = "insert into product_in_queue (productid,purchase_no,warehouse_id,rack_id,quantity,status,date,vendor_id) 
                VALUES  ('".$rs1x["product_id"]."','".$rs1x["purchase_no"]."','0','0','".$rs1x["qty"]."','0','".$rs1x["purchase_date"]."','".$rs1x["purchased_from"]."')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
            } }
    	    echo"<script>alert('Purchase Voucher Processed Successfully.')</script>";
    	}
    	
    }
    
    
    if($_POST["processor"]=="ledger_class"){
        $class_name = str_replace("'", "`", $_POST["class_name"]);
        $sql="update ledger_class set class_name='$class_name',debit='".$_POST["debit"]."',credit='".$_POST["credit"]."',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
    	if ($conn->query($sql) === TRUE) echo"<script>alert('Ledger Class Record Updated.')</script>";
    }