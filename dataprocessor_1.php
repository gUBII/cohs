<?php
    // error_reporting(0);
    include('include.php');
    
    $dbnamex=$_COOKIE['dbname'];
    
    date_default_timezone_set("Australia/Melbourne");

    if(isset($_GET["processor"])){
        if($_GET["processor"]=="StatusSuspend"){
            $tablename=$_GET["tid"];
            $sql="update $tablename set status='".$_GET["status"]."' where id='".$_GET["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Status Record Updated.')</script>";
        }
        if($_GET["processor"]=="StatusSuspendMain"){
            $tablename=$_GET["tid"];
            $sql="update $tablename set status='".$_GET["status"]."' where id='".$_GET["pid"]."'";
            if ($conn_main->query($sql) === TRUE) echo"<script>alert('Status Record Updated.')</script>";
        }
        
    }
    
    if(isset($_GET["processor"])){
        if($_GET["processor"]=="GlobalSuspend"){
            $tablename=$_GET["tid"];
            $sql="update $tablename set ".$_GET["sid1"]."='".$_GET["status"]."' where ".$_GET["sid"]."='".$_GET["pid"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('".$_GET["sid1"]." Updated.')</script>";
        }
    }
    
    // WAREHOUSE
    if($_POST["processor"]=="new_warehouse"){
        $warehouse_name = str_replace("'", "`", $_POST["warehouse_name"]);
        $warehouse_company = str_replace("'", "`", $_POST["warehouse_company"]);
        $sql = "insert into warehouse (warehouse_name,warehouse_company,address,contact_no,warehouse_type,ownership,rent,rent_type,contract_duration,status) 
        VALUES ('$warehouse_name','$warehouse_company','".$_POST["address"]."','".$_POST["contact_no"]."','".$_POST["warehouse_type"]."',
        '".$_POST["owner"]."','".$_POST["rent"]."','".$_POST["rent_type"]."','".$_POST["contract_duration"]."','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="warehouse"){
        $warehouse_name = str_replace("'", "`", $_POST["warehouse_name"]);
        $warehouse_company = str_replace("'", "`", $_POST["warehouse_company"]);
        $sql="update warehouse set warehouse_name='$warehouse_name',address='".$_POST["address"]."',contact_no='".$_POST["contact_no"]."',warehouse_type='".$_POST["warehouse_type"]."',status='".$_POST["status"]."',
        ownership='".$_POST["owner"]."',rent='".$_POST["rent"]."',rent_type='".$_POST["rent_type"]."',warehouse_company='".$_POST["warehouse_company"]."',contract_duration='".$_POST["contract_duration"]."' where id='".$_POST["id"]."'";
    	if ($conn->query($sql) === TRUE) echo"<script>alert('Ledger Class Record Updated.')</script>";
    }
    
    // CARE ITEM NUMBER
    if($_POST["processor"]=="new_ndis_support_catelogue2"){
        $support_item_number = str_replace("'", "`", $_POST["support_item_number"]);
        $support_item_name = str_replace("'", "`", $_POST["support_item_name"]);
        $support_category_name = str_replace("'", "`", $_POST["support_category_name"]);
        
        $sql = "insert into ndis_support_catelogue2 (support_item_number,support_item_name,support_category_name,nsw,status) 
        VALUES ('$support_item_number','$support_item_name','$support_category_name','".$_POST["nsw"]."','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Item Number Record Saved.')</script>";
    }
    if($_POST["processor"]=="ndis_support_catelogue2"){
        $support_item_number = str_replace("'", "`", $_POST["support_item_number"]);
        $support_item_name = str_replace("'", "`", $_POST["support_item_name"]);
        $support_category_name = str_replace("'", "`", $_POST["support_category_name"]);
        
        $sql="update ndis_support_catelogue2 set support_item_number='$support_item_number',support_item_name='$support_item_name',
        support_category_name='$support_category_name',nsw='".$_POST["nsw"]."',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
    	if ($conn->query($sql) === TRUE) echo"<script>alert('Item Number Record Updated.')</script>";
    }
    
    // NDIS ITEM NUMBER
    if($_POST["processor"]=="new_ndis_support_catelogue"){
        $item_number = str_replace("'", "`", $_POST["item_number"]);
        $item_name = str_replace("'", "`", $_POST["item_name"]);
        $unit = str_replace("'", "`", $_POST["category_name"]);
        
        $sql = "insert into ndis_line_numbers (item_number,item_name,unit,national,remote,very_remote,status) 
        VALUES ('$item_number','$item_name','$unit','".$_POST["national"]."','".$_POST["remote"]."','".$_POST["very_remote"]."','".$_POST["status"]."')";
        if ($conn_main->query($sql) === TRUE) echo"<script>alert('Item Number Record Saved.')</script>";
    }
    if($_POST["processor"]=="ndis_support_catelogue"){
        $item_number = str_replace("'", "`", $_POST["item_number"]);
        $item_name = str_replace("'", "`", $_POST["item_name"]);
        $unit = str_replace("'", "`", $_POST["unit"]);
        
        $sql="update ndis_line_numbers set item_number='$item_number',item_name='$item_name',unit='$unit',national='".$_POST["national"]."',
        remote='".$_POST["remote"]."',very_remote='".$_POST["very_remote"]."',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
    	if ($conn_main->query($sql) === TRUE) echo"<script>alert('Item Number Record Updated.')</script>";
    }
    
    // LEDGER CLASS
    if($_POST["processor"]=="new_ledger_class"){
        $class_name = str_replace("'", "`", $_POST["class_name"]);
        $sql = "insert into ledger_class (class_name,debit,credit,status) VALUES ('$class_name','".$_POST["debit"]."','".$_POST["credit"]."','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="ledger_class"){
        $class_name = str_replace("'", "`", $_POST["class_name"]);
        $sql="update ledger_class set class_name='$class_name',debit='".$_POST["debit"]."',credit='".$_POST["credit"]."',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
    	if ($conn->query($sql) === TRUE) echo"<script>alert('Ledger Class Record Updated.')</script>";
    }
    
    // LEDGER GROUP
    if($_POST["processor"]=="new_ledger_group"){
        $group_name = str_replace("'", "`", $_POST["group_name"]);
        $sql = "insert into ledger_group (group_name,group_class,debit,credit,status) VALUES ('$group_name','".$_POST["group_class"]."','".$_POST["debit"]."','".$_POST["credit"]."','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="ledger_group"){
        $group_name = str_replace("'", "`", $_POST["group_name"]);
        $sql="update ledger_group set group_name='$group_name',group_class='".$_POST["group_class"]."',debit='".$_POST["debit"]."',credit='".$_POST["credit"]."',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
    	if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script>";
    }

    // LEDGER ACCOUNTS
    if($_POST["processor"]=="new_accounts_ledger"){
        $ledger_name = str_replace("'", "`", $_POST["ledger_name"]);
        $opening_balance_on=strtotime($_POST["opening_balance_on"]);
        $sql = "insert into accounts_ledger (ledger_name,ledger_group_id,opening_balance,balance_type,opening_balance_on,status,debit,credit) VALUES 
        ('$ledger_name','".$_POST["ledger_group_id"]."','".$_POST["opening_balance"]."','".$_POST["balance_type"]."',
        '$opening_balance_on','".$_POST["status"]."','".$_POST["debit"]."','".$_POST["credit"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="accounts_ledger"){
        $ledger_name = str_replace("'", "`", $_POST["ledger_name"]);
        $opening_balance_on=strtotime($_POST["opening_balance_on"]);
        $sql="update accounts_ledger set ledger_name='$ledger_name',ledger_group_id='".$_POST["ledger_group_id"]."',
        opening_balance='".$_POST["opening_balance"]."',balance_type='".$_POST["balance_type"]."',opening_balance_on='$opening_balance_on',
        debit='".$_POST["debit"]."',credit='".$_POST["credit"]."',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
    	if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script>";
    }

    // LEDGER SUB ACCOUNTS
    if($_POST["processor"]=="new_sub_account"){
        $sub_ledger = str_replace("'", "`", $_POST["sub_ledger"]);
        $created_on=strtotime($_POST["created_on"]);
        $sql = "insert into sub_ledger (sub_ledger,ledger_id,opening_balance,status,debit,credit) VALUES 
        ('$sub_ledger','".$_POST["ledger_id"]."','".$_POST["opening_balance"]."','".$_POST["status"]."','".$_POST["debit"]."','".$_POST["credit"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="sub_ledger"){
        $sub_ledger = str_replace("'", "`", $_POST["sub_ledger"]);        
        $sql="update sub_ledger set sub_ledger='$sub_ledger',ledger_id='".$_POST["ledger_id"]."',
        opening_balance='".$_POST["opening_balance"]."',debit='".$_POST["debit"]."',
        credit='".$_POST["credit"]."',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
    	if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script>";
    }

    // INCOME
    if($_POST["processor"]=="new_receipt_voucher"){
        $narration = str_replace("'", "`", $_POST["narration"]);
        $rdate=strtotime($_POST["receipt_date"]);
        $sql = "insert into receipt_voucher (narration,receipt_date,receipt_no,invoice_no,ledger_id,employeeid,cr_amt,status) VALUES 
        ('$narration','$rdate','".$_POST["receipt_no"]."','".$_POST["invoice_no"]."','".$_POST["ledger_id"]."','".$_POST["employeeid"]."','".$_POST["cr_amt"]."','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="receipt_voucher"){
        $narration = str_replace("'", "`", $_POST["narration"]);
        $rdate=strtotime($_POST["receipt_date"]);
        $sql="update receipt_voucher set narration='$narration',receipt_date='$rdate',receipt_no='".$_POST["receipt_no"]."',
        invoice_no='".$_POST["invoice_no"]."',ledger_id='".$_POST["ledger_id"]."',employeeid='".$_POST["employeeid"]."',
        cr_amt='".$_POST["cr_amt"]."',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
    	if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script>";
    }
    
    // EXPENSE
    if($_POST["processor"]=="new_payment_voucher"){
        $narration = str_replace("'", "`", $_POST["narration"]);
        $rdate=strtotime($_POST["payment_date"]);
        $sql = "insert into payment_voucher (narration,payment_date,payment_no,invoice_no,ledger_id,employeeid,dr_amt,status) VALUES 
        ('$narration','$rdate','".$_POST["payment_no"]."','".$_POST["invoice_no"]."','".$_POST["ledger_id"]."','".$_POST["employeeid"]."','".$_POST["dr_amt"]."','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="payment_voucher"){
        $narration = str_replace("'", "`", $_POST["narration"]);
        $rdate=strtotime($_POST["payment_date"]);
        $sql="update payment_voucher set narration='$narration',payment_date='$rdate',payment_no='".$_POST["payment_no"]."',
        invoice_no='".$_POST["invoice_no"]."',ledger_id='".$_POST["ledger_id"]."',employeeid='".$_POST["employeeid"]."',
        dr_amt='".$_POST["dr_amt"]."',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
    	if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated.')</script>";
    }

    if($_POST["processor"]=="new_product_attributes"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/attributes/' . $newFilename);
            $location = 'media/attributes/' . $newFilename;
        }
        $note = str_replace("'", "`", $_POST["note"]);
        $attribute_name = str_replace("'", "`", $_POST["attribute_name"]);
        $extension1=strlen("$extension");
    	if($extension1>=3){
            $sql = "insert into product_attributes (attribute_name,image,note,status,parent) 
            VALUES ('$attribute_name','$location','$note','".$_POST["status"]."','".$_POST["parent"]."')";
    	}else{
    	    $sql = "insert into product_attributes (attribute_name,note,status,parent) 
            VALUES ('$attribute_name','$note','".$_POST["status"]."','".$_POST["parent"]."')";
    	}
        if ($conn->query($sql) === TRUE){
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','ITEM ATTRIBUTE','0','$sysdate','$ip','1','Added New ITEM ATTRIBUTE','0','".$_POST["userid"]."','product_attributes')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Saved.')</script>";
        }
    }
    
    if($_POST["processor"]=="edit_product_attributes"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/attributes/' . $newFilename);
            $location = 'media/attributes/' . $newFilename;
        }
        $note = str_replace("'", "`", $_POST["note"]);
        $attribute_name = str_replace("'", "`", $_POST["attribute_name"]);
        
        $extension1=strlen("$extension");
        if($extension1>=3){
            $sql="update product_attributes set attribute_name='$attribute_name',note='$note',image='$location',status='".$_POST["status"]."',parent='".$_POST["parent"]."' where id='".$_POST["id"]."'";
    	}else{
    	    $sql="update product_attributes set attribute_name='$attribute_name',note='$note',status='".$_POST["status"]."',parent='".$_POST["parent"]."' where id='".$_POST["id"]."'";
    	}
        if ($conn->query($sql) === TRUE){
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','ITEM ATTRIBUTE','0','$sysdate','$ip','1','Updated New ITEM ATTRIBUTE','0','".$_POST["userid"]."','product_attributes')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Updated.')</script>";
        }
    }
    
    if($_POST["processor"]=="new_product_brands"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/brands/' . $newFilename);
            $location = 'media/brands/' . $newFilename;
        }
        $note = str_replace("'", "`", $_POST["note"]);
        $brand_name = str_replace("'", "`", $_POST["brand_name"]);
        $extension1=strlen("$extension");
    	if($extension1>=3){
            $sql = "insert into product_brands (brand_name,image,note,status) 
            VALUES ('$brand_name','$location','$note','".$_POST["status"]."')";
    	}else{
    	    $sql = "insert into product_brands (brand_name,note,status) 
            VALUES ('$brand_name','$note','".$_POST["status"]."')";
    	}
        if ($conn->query($sql) === TRUE){
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','ITEM BRAND','0','$sysdate','$ip','1','Added New ITEM BRAND','0','".$_POST["userid"]."','product_brands')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Saved.')</script>";
        }
    }
    
    if($_POST["processor"]=="edit_product_brands"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/brands/' . $newFilename);
            $location = 'media/brands/' . $newFilename;
        }
        $note = str_replace("'", "`", $_POST["note"]);
        $brand_name = str_replace("'", "`", $_POST["brand_name"]);
        
        $extension1=strlen("$extension");
        if($extension1>=3){
            $sql="update product_brands set brand_name='$brand_name',note='$note',image='$location',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
    	}else{
    	    $sql="update product_brands set brand_name='$brand_name',note='$note',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
    	}
        if ($conn->query($sql) === TRUE){
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','ITEM BRAND','0','$sysdate','$ip','1','Updated New ITEM BRAND','0','".$_POST["userid"]."','product_brands')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Updated.')</script>";
        }
    }
    
    if($_POST["processor"]=="new_product_category"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/category/' . $newFilename);
            $location = 'media/category/' . $newFilename;
        }
        $note = str_replace("'", "`", $_POST["note"]);
        $category_name = str_replace("'", "`", $_POST["category_name"]);
        $extension1=strlen("$extension");
    	if($extension1>=3){
            $sql = "insert into product_category (category_name,parent,image,note,status) 
            VALUES ('$category_name','".$_POST["parent"]."','$location','$note','".$_POST["status"]."')";
    	}else{
    	    $sql = "insert into product_category (category_name,parent,note,status) 
            VALUES ('$category_name','".$_POST["parent"]."','$note','".$_POST["status"]."')";
    	}
        if ($conn->query($sql) === TRUE){
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','ITEM CATEGORY','0','$sysdate','$ip','1','Added New ITEM CATEGORY','0','".$_POST["userid"]."','product_category')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Saved.')</script>";
        }
    }
    
    if($_POST["processor"]=="edit_product_category"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/category/' . $newFilename);
            $location = 'media/category/' . $newFilename;
        }
        $note = str_replace("'", "`", $_POST["note"]);
        $category_name = str_replace("'", "`", $_POST["category_name"]);
        $extension1=strlen("$extension");
        
        if($extension1>=3){
            $sql="update product_category set category_name='$category_name',note='$note',image='$location',status='".$_POST["status"].",parent='".$_POST["parent"]."' where id='".$_POST["id"]."'";
    	}else{
    	    $sql="update product_category set category_name='$category_name',note='$note',status='".$_POST["status"]."',parent='".$_POST["parent"]."' where id='".$_POST["id"]."'";
    	}
        if ($conn->query($sql) === TRUE){
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','ITEM CATEGORY','0','$sysdate','$ip','1','Updated New ITEM CATEGORY','0','".$_POST["userid"]."','product_category')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Updated.')</script>";
        }
    }
    
    if($_POST["processor"]=="new_designation"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/designation/' . $newFilename);
            $location = 'media/designation/' . $newFilename;
        }
        $designation = str_replace("'", "`", $_POST["designation"]);
        $detail = str_replace("'", "`", $_POST["designation_detail"]);
        $extension1=strlen("$extension");
    	if($extension1>=3){
            $sql = "insert into designation (designation,category_id,image,status,designation_detail,type) 
            VALUES ('$designation','1','$location','".$_POST["status"]."','$detail','".$_POST["type"]."')";
    	}else{
    	    $sql = "insert into designation (designation,category_id,status,designation_detail,type) 
            VALUES ('$designation','1','".$_POST["status"]."','$detail','".$_POST["type"]."')";
    	}
        if ($conn->query($sql) === TRUE){
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','DESIGNATION','0','$sysdate','$ip','1','Added New DESIGNATION','0','".$_POST["userid"]."','designation')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Saved.')</script>";
        }
    }
    
    if($_POST["processor"]=="edit_designation"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/designation/' . $newFilename);
            $location = 'media/designation/' . $newFilename;
        }
        $designation = str_replace("'", "`", $_POST["designation"]);
        $detail = str_replace("'", "`", $_POST["designation_detail"]);
        $extension1=strlen("$extension");
        
    	if($extension1>=3){
            $sql="update designation set designation='$designation',designation_detail='$detail',image='$location',status='".$_POST["status"]."',type='".$_POST["type"]."' where id='".$_POST["id"]."'";
    	}else{
    	    $sql="update designation set designation='$designation',designation_detail='$detail',status='".$_POST["status"]."',type='".$_POST["type"]."' where id='".$_POST["id"]."'";
    	}
        if ($conn->query($sql) === TRUE){
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','DESIGNATION','0','$sysdate','$ip','1','Updated DESIGNATION','0','".$_POST["userid"]."','designation')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Saved.')</script>";
        }
    }
    
    
    if($_POST["processor"]=="new_department"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/department/' . $newFilename);
            $location = 'media/department/' . $newFilename;
        }
        $department = str_replace("'", "`", $_POST["department_name"]);
        $detail = str_replace("'", "`", $_POST["department_detail"]);
        $extension1=strlen("$extension");
    	if($extension1>=3){
            $sql = "insert into departments (department_name,category_id,image,status,department_detail,type) VALUES ('$department','1','$location','".$_POST["status"]."','$detail','".$_POST["type"]."')";
    	}else{
    	    $sql = "insert into departments (department_name,category_id,status,department_detail,type) VALUES ('$department','1','".$_POST["status"]."','$detail','".$_POST["type"]."')";
    	}
        if ($conn->query($sql) === TRUE){
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','DEPARTMENT','0','$sysdate','$ip','1','Added New DEPARTMENT','0','".$_POST["userid"]."','departments')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Saved.')</script>";
        }
    }
    
    if($_POST["processor"]=="edit_department"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/department/' . $newFilename);
            $location = 'media/department/' . $newFilename;
        }
        $department = str_replace("'", "`", $_POST["department_name"]);
        $detail = str_replace("'", "`", $_POST["department_detail"]);
        $extension1=strlen("$extension");
        
    	if($extension1>=3){
            $sql="update departments set department_name='$department',department_detail='$detail',image='$location',status='".$_POST["status"]."',type='".$_POST["type"]."' where id='".$_POST["id"]."'";
    	}else{
    	    $sql="update departments set department_name='$department',department_detail='$detail',status='".$_POST["status"]."',type='".$_POST["type"]."' where id='".$_POST["id"]."'";
    	}
        if ($conn->query($sql) === TRUE){
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','DEPARTMENT','0','$sysdate','$ip','1','Updated DEPARTMENT','0','".$_POST["userid"]."','departments')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Saved.')</script>";
        }
    }
    
    // adding and updating client data
    
    if($_POST["processor"]=="new_CLIENT"){
        
        $pdate=strtotime($_POST["pdate"]);
        $jdate=strtotime($_POST["jdate"]);
        $dob=strtotime($_POST["dob"]);
        $
        $currentpassword=md5($_POST["password"]);
        
        $fname = str_replace("'", "`", $_POST["fname"]);
        $lname = str_replace("'", "`", $_POST["lname"]);
        $address = str_replace("'", "`", $_POST["address"]);
        $address2 = str_replace("'", "`", $_POST["address2"]);
        
        $ref_number = str_replace("'", "`", $_POST["ref_number"]);
        $medicare_import_ref = str_replace("'", "`", $_POST["medicare_import_ref"]);
        $naps_service_id = str_replace("'", "`", $_POST["naps_service_id"]);
        $ndis_price_zone = str_replace("'", "`", $_POST["ndis_price_zone"]);
        
        $note = mysqli_real_escape_string($conn, str_replace("'", "`", trim($_POST['note'])));
        $note_for_staff = mysqli_real_escape_string($conn, str_replace("'", "`", trim($_POST['note_for_staff'])));

        $recid=0;
        $sm1 = "select * from uerp_user where unbox='".$_POST["email"]."' order by id asc limit 1";
        $rm1 = $conn->query($sm1);
        if ($rm1->num_rows > 0) { while($tm1 = $rm1->fetch_assoc()) { $recid=1; }}

        $sm2 = "select * from uerp_user where unbox='".$_POST["email"]."' and ref_db='".$_COOKIE['dbname']."' order by id asc limit 1";
        $rm2 = $conn_main->query($sm2);
        if ($rm2->num_rows > 0) { while($tm2 = $rm2->fetch_assoc()) { $recid=2; }}
        
        if($recid==0){
            $sql = "insert into uerp_user (date,jointime,username,username2,phone,dob,uid,email,unbox,passbox,gender,marital_status,address,
            address2,city,area,zip,country,ndis_number,cp_name,cp_phone1,cp_mobile,cp_email,cp_address,mtype,payment_type,status,agentid,
            application_id,title,nickname,birth_country,language_spoken,hcp_grandfathered,allied_health,geographic_regions,referred_source,
            note,note_for_staff,ref_number,medicare_import_ref,naps_service_id,ndis_price_zone) 
            VALUES ('$pdate','$jdate','$fname','$lname','".$_POST["phone"]."','$dob','".$_POST["employeeid"]."','".$_POST["email"]."',
            '".$_POST["email"]."','$currentpassword','".$_POST["gender"]."','".$_POST["marital_status"]."','$address','$address2',
            '".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip"]."','".$_POST["country"]."','".$_POST["ndisnumber"]."',
            '".$_POST["cp_name"]."','".$_POST["cp_phone1"]."','".$_POST["cp_mobile"]."','".$_POST["cp_email"]."','".$_POST["cp_address"]."',
            '".$_POST["mtype"]."','".$_POST["payment_type"]."','1','0','".$_POST["application_id"]."','".$_POST["title"]."',
            '".$_POST["nickname"]."','".$_POST["birth_country"]."','".$_POST["language_spoken"]."','".$_POST["hcp_grandfathered"]."',
            '".$_POST["allied_health"]."','".$_POST["geographic_regions"]."','".$_POST["referred_source"]."','$note','$note_for_staff'
            '$ref_number','$medicare_import_ref','$naps_service_id','$ndis_price_zone')";
            if ($conn->query($sql) === TRUE){
                $sql_main = "insert into uerp_user (uid,date,unbox,passbox,username,username2,phone,email,mtype,ref_db) 
                VALUES ('".$_POST["employeeid"]."','$pdate','".$_POST["email"]."','$currentpassword','$fname','$lname','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["mtype"]."','".$_COOKIE['dbname']."')";
                if ($conn_main->query($sql_main) === TRUE) echo"<script>alert('Record Saved.')</script>";

                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                VALUES ('".$_COOKIE["userid"]."','0','0','CLIENT','0','$sysdate','$ip','1','Added New CLIENT','0','".$_POST["userid"]."','uerp_user')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                
                echo"<form method='GET' action='global_email.php' name='main' target='_self'>
                    <input type=hidden name='r_email' value='".$_POST["email"]."'>
                    <input type=hidden name='r_name' value='$fname $lname'>
                    <input type=hidden name='r_subject' value='New Account Created as ".$_POST["mtype"].". Please login to see detail.'>
                    <input type=hidden name='r_body' value=\"We`re excited to let you know that your account has been successfully created!<br><br>Here are your account details:<br>Registered & Login Email: ".$_POST["email"]."<br>Login Password: [ ".$_POST["password"]." ]<br><br>You can now log in using this link and start using our services: <a href='$main_url/saas/login.php'>Login</a>. <br><br>\">
                </form>";
                ?><script language=JavaScript> document.main.submit(); </script><?php
            }
        }else echo"<script>alert('Sorry! This email address is already used.')</script>";
    }
    
    if($_POST["processor"]=="edit_CLIENT"){
        $pdate=strtotime($_POST["pdate"]);
        $jdate=strtotime($_POST["jdate"]);
        
        $dob=strtotime($_POST["dob"]);
        $fname = str_replace("'", "`", $_POST["fname"]);
        $lname = str_replace("'", "`", $_POST["lname"]);
        $address = str_replace("'", "`", $_POST["address"]);
        $address2 = str_replace("'", "`", $_POST["address2"]);
        
        $ref_number = str_replace("'", "`", $_POST["ref_number"]);
        $medicare_import_ref = str_replace("'", "`", $_POST["medicare_import_ref"]);
        $naps_service_id = str_replace("'", "`", $_POST["naps_service_id"]);
        $ndis_price_zone = str_replace("'", "`", $_POST["ndis_price_zone"]);
        
        $note_for_staff = mysqli_real_escape_string($conn, str_replace("'", "`", trim($_POST['note_for_staff'])));
        $note = mysqli_real_escape_string($conn, str_replace("'", "`", trim($_POST['note'])));
        
        if(strlen($_POST["password"])>=5){
            $currentpassword=md5($_POST["password"]);
            $sql="update uerp_user set passbox='$currentpassword' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
        
        $sql="update uerp_user set uid='".$_POST["employeeid"]."',date='$pdate',jointime='$jdate',status='1',gender='".$_POST["gender"]."',
        username='$fname',username2='$lname',address='$address',phone='".$_POST["phone"]."',address2='$address2',country='".$_POST["country"]."',
        city='".$_POST["city"]."',area='".$_POST["state"]."',dob='$dob',mtype='".$_POST["mtype"]."',zip='".$_POST["zip"]."',
        marital_status='".$_POST["marital_status"]."',cp_name='".$_POST["cp_name"]."',cp_phone1='".$_POST["cp_phone1"]."',
        cp_mobile='".$_POST["cp_mobile"]."',cp_email='".$_POST["cp_email"]."',cp_address='".$_POST["cp_address"]."',ndis='".$_POST["ndis_number"]."',
        ndis_number='".$_POST["ndis_number"]."',application_id='".$_POST["application_id"]."',payment_type='".$_POST["payment_type"]."',
        aboutme='$aboutme',note='$note',note_for_staff='$note_for_staff',title='$title',nickname='".$_POST["nickname"]."',birth_country='".$_POST["birth_country"]."',
        ref_number='$ref_number',medicare_import_ref='$medicare_import_ref',naps_service_id='$naps_service_id',ndis_price_zone='$ndis_price_zone',
        language_spoken='$language_spoken',hcp_grandfathered='$hcp_grandfathered',allied_health='$allied_health',
        geographic_regions='$geographic_regions',referred_source='$referred_source' where id='".$_POST["id"]."'";
        
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            $sql_main="update uerp_user set username='$fname',username2='$lname',phone='".$_POST["phone"]."',email='".$_POST["email"]."' where ref_db='".$_COOKIE['dbname']."' and unbox='".$_POST["email"]."'";
            if ($conn_main->query($sql_main) === TRUE) echo"<script>alert('Record Updated')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','CLIENT UPDATE','0','$sysdate','$ip','1','Updated CLIENT data','0','".$_POST["userid"]."','uerp_user')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
        }
    }



    
    // adding and updating vendor data
    
    if($_POST["processor"]=="new_VENDOR"){
        
        $pdate=time();
        $dob=strtotime($_POST["dob"]);
        $currentpassword=md5($_POST["password"]);
        
        $recid=0;
        $sm1 = "select * from uerp_user where unbox='".$_POST["email"]."' order by id asc limit 1";
        $rm1 = $conn->query($sm1);
        if ($rm1->num_rows > 0) { while($tm1 = $rm1->fetch_assoc()) { $recid=1; }}

        $sm2 = "select * from uerp_user where unbox='".$_POST["email"]."' and ref_db='".$_COOKIE['dbname']."' order by id asc limit 1";
        $rm2 = $conn_main->query($sm2);
        if ($rm2->num_rows > 0) { while($tm2 = $rm2->fetch_assoc()) { $recid=2; }}
        
        $fname = str_replace("'", "`", $_POST["fname"]);
        $lname = str_replace("'", "`", $_POST["lname"]);
        $address = str_replace("'", "`", $_POST["store_address"]);
        $address2 = str_replace("'", "`", $_POST["address2"]);
        
        if($recid==0){
            $sql = "insert into uerp_user (uid,date,jointime,status,agentid,username,username2,unbox,passbox,store_name,store_address,
            city,area,zip,country,phone,store_phone,email,dob,gender,mtype,abn,bank_name,bsb,account_name,account_number,designation,department) 
            VALUES ('".$_POST["employeeid"]."','$pdate','$pdate','1','0','$fname','$lname','".$_POST["email"]."','$currentpassword',
            '".$_POST["store_name"]."','$address','".$_POST["city"]."','".$_POST["state"]."','".$_POST["zip"]."',
            '".$_POST["country"]."','".$_POST["phone"]."','".$_POST["phone"]."','".$_POST["email"]."','$dob',
            '".$_POST["gender"]."','".$_POST["mtype"]."','".$_POST["abn"]."','".$_POST["bankname"]."',
            '".$_POST["bsb"]."','".$_POST["accountname"]."','".$_POST["accountnumber"]."','22','0')";
            if ($conn->query($sql) === TRUE){
                $sql_main = "insert into uerp_user (uid,date,unbox,passbox,username,username2,phone,email,mtype,ref_db) 
                VALUES ('".$_POST["employeeid"]."','$pdate','".$_POST["email"]."','$currentpassword','$fname','$lname','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["mtype"]."','".$_COOKIE['dbname']."')";
                if ($conn_main->query($sql_main) === TRUE) echo"<script>alert('Data Saved.')</script>";

                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                VALUES ('".$_COOKIE["userid"]."','0','0','VENDOR ACCOUNT','0','$sysdate','$ip','1','Added New VENDOR','0','".$_POST["userid"]."','uerp_user')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
            }
        }else echo"<script>alert('Sorry! This email address is already used.')</script>";
    }
    
    if($_POST["processor"]=="edit_VENDOR"){
        
        $pdate=time();
        $dob=strtotime($_POST["dob"]);
        $fname = str_replace("'", "`", $_POST["fname"]);
        $lname = str_replace("'", "`", $_POST["lname"]);
        $address = str_replace("'", "`", $_POST["store_address"]);
        $store_name = str_replace("'", "`", $_POST["store_name"]);
        
        if(strlen($_POST["password"])>=5){
            $currentpassword=md5($_POST["password"]);
            $sql="update uerp_user set username='$fname',username2='$lname'store_name='$store_name',
            store_address='$address',city='".$_POST["city"]."',area='".$_POST["state"]."',zip='".$_POST["zip"]."',
            country='".$_POST["country"]."',store_phone='".$_POST["phone"]."',phone='".$_POST["phone"]."',email='".$_POST["email"]."',
            dob='$dob',gender='".$_POST["gender"]."',abn='".$_POST["abn"]."',bank_name='".$_POST["bankname"]."',bsb='".$_POST["bsb"]."',
            account_name='".$_POST["accountname"]."',account_number='".$_POST["accountnumber"]."',passbox='$currentpassword' where id='".$_POST["id"]."'";
        }else{
            $sql="update uerp_user set username='".$_POST["fname"]."',username2='".$_POST["lname"]."',store_name='".$_POST["store_name"]."',
            store_address='".$_POST["store_address"]."',city='".$_POST["city"]."',area='".$_POST["state"]."',zip='".$_POST["zip"]."',
            country='".$_POST["country"]."',store_phone='".$_POST["phone"]."',phone='".$_POST["phone"]."',email='".$_POST["email"]."',
            dob='$dob',gender='".$_POST["gender"]."',abn='".$_POST["abn"]."',bank_name='".$_POST["bankname"]."',bsb='".$_POST["bsb"]."',
            account_name='".$_POST["accountname"]."',account_number='".$_POST["accountnumber"]."' where id='".$_POST["id"]."'";
        }
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            $sql_main="update uerp_user set username='$fname',username2='$lname',phone='".$_POST["phone"]."',email='".$_POST["email"]."' where ref_db='".$_COOKIE['dbname']."' and unbox='".$_POST["email"]."'";
            if ($conn_main->query($sql_main) === TRUE) echo"<script>alert('Record Updated')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','VENDOR UPDATE','0','$sysdate','$ip','1','Updated VENDOR data','0','".$_POST["employeeid"]."','uerp_user')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;            
        }
    }
    
    
    
    
    if($_POST["processor"]=="add_campaign"){
        $sdate=strtotime($_POST["start_date"]);
        $edate=strtotime($_POST["end_date"]);
        $sql = "insert into campaigns (campaign_name,clientid,employeeid,start_date,end_date,country,status) 
        VALUES ('".$_POST["campaign_name"]."','".$_POST["clientid"]."','".$_POST["employeeid"]."','$sdate','$edate','".$_POST["country"]."','ON')";
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            echo"<script>alert('Record Saved')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','CAMPAIGN ADDED','0','$sysdate','$ip','1','Added CAMPAIGN data','0','".$_POST["clientid"]."','uerp_user')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;            
        } 
    }

    if($_POST["processor"]=="add_opportunity"){        
       $sdate=strtotime($_POST["start_date"]);       
       $sql = "insert into opportunities (opportunity_name,campaignid,start_date,plan,possibility,opportunity,status) 
       VALUES ('".$_POST["opportunity_name"]."','".$_POST["campaignid"]."','$sdate','".$_POST["plan"]."','".$_POST["possibility"]."','".$_POST["opportunity"]."','ON')";
       if ($conn->query($sql) === TRUE){
           $tomtom=0;
           echo"<script>alert('Record Saved')</script>";
           $sysdate=time();
           $ip=$_SERVER['REMOTE_ADDR'];
           $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
           VALUES ('".$_COOKIE["userid"]."','0','0','OPPORTUNITY ADDED','0','$sysdate','$ip','1','Added OPPORTUNITY data','0','".$_POST["campaignid"]."','uerp_user')";
           if ($conn->query($sql1) === TRUE) $tomtom=0;            
       } 
   }
   

   if($_POST["processor"]=="add_lead"){        
        $sdate=strtotime($_POST["date"]);
        $target_date=strtotime($_POST["target_date"]);
        $appointment_date=strtotime($_POST["appointment_date"]);       
        $sql = "insert into leads (lead_name,campaignid,date,appointment_date,speech_note,note,status)
        VALUES ('".$_POST["lead_name"]."','".$_POST["campaignid"]."','$sdate','".$_POST["appointment_date"]."','".$_POST["speech_note"]."','".$_POST["note"]."','ON')";
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            echo"<script>alert('Record Saved')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','LEAD ADDED','0','$sysdate','$ip','1','Added LEAD data','0','".$_POST["campaignid"]."','uerp_user')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;            
        } 
    }

    
    // adding and editing employees

    if($_POST["processor"]=="new_EMPLOYEE"){
        
        $pdate=strtotime($_POST["pdate"]);
        $jdate=strtotime($_POST["jdate"]);
        $dob=strtotime($_POST["dob"]);
        $currentpassword=md5($_POST["password"]);
        
        $fname = str_replace("'", "`", $_POST["fname"]);
        $lname = str_replace("'", "`", $_POST["lname"]);
        $address = str_replace("'", "`", $_POST["address"]);
        $address2 = str_replace("'", "`", $_POST["address2"]);
        $application_id = str_replace("'", "`", $_POST["application_id"]);
        $recid=0;
        $sm1 = "select * from uerp_user where unbox='".$_POST["email"]."' order by id asc limit 1";
        $rm1 = $conn->query($sm1);
        if ($rm1->num_rows > 0) { while($tm1 = $rm1->fetch_assoc()) { $recid=1; }}

        $sm2 = "select * from uerp_user where unbox='".$_POST["email"]."' and ref_db='".$_COOKIE['dbname']."' order by id asc limit 1";
        $rm2 = $conn_main->query($sm2);
        if ($rm2->num_rows > 0) { while($tm2 = $rm2->fetch_assoc()) { $recid=2; }}
        
        $nickname = str_replace("'", "`", $_POST["nickname"]);
        $email = str_replace("'", "`", $_POST["email"]);
        $birth_country = str_replace("'", "`", $_POST["birth_country"]);
        $note = str_replace("'", "`", $_POST["note"]);
        $note_for_staff = str_replace("'", "`", $_POST["note_for_staff"]);
        
        
        if($recid==0){
            $sql = "insert into uerp_user (uid,date,jointime,status,agentid,unbox,passbox,gender,username,username2,designation,department,address,phone,address2,
            bank_name,account_name,account_number,bsb,country,city,area,email,dob,mtype,zip,abn,salary_basic,reg_amt,sat_amt,sun_amt,hol_amt,night_amt,payment_type,
            marital_status,ref_db,ndis_number,job_experience,application_id,geographic_regions,schads_status,schads_level,schads_paypoint,title,language_spoken,
            nickname,birth_country,note,note_for_staff) 
            VALUES ('".$_POST["employeeid"]."','$pdate','$jdate','1','0','".$_POST["email"]."','$currentpassword','".$_POST["gender"]."',
            '$fname','$lname','".$_POST["designation"]."','".$_POST["department"]."','$address','".$_POST["phone"]."','$address2',
            '".$_POST["bankname"]."','".$_POST["accountname"]."','".$_POST["accountnumber"]."','".$_POST["bsb"]."','".$_POST["country"]."',
            '".$_POST["city"]."','".$_POST["state"]."','".$_POST["email"]."','$dob','".$_POST["mtype"]."','".$_POST["zip"]."',
            '".$_POST["abn"]."','".$_POST["salary_basic"]."','".$_POST["reg_amt"]."','".$_POST["sat_amt"]."','".$_POST["sun_amt"]."',
            '".$_POST["hol_amt"]."','".$_POST["night_amt"]."','".$_POST["payment_type"]."','".$_POST["marital_status"]."','".$_COOKIE['dbname']."',
            '".$_POST['ndis_number']."','".$_POST['job_experience']."','$application_id','".$_POST['geographic_regions']."',
            '".$_POST["schads_status"]."','".$_POST["schads_level"]."','".$_POST["schads_paypoint"]."','".$_POST["title"]."','".$_POST["language_spoken"]."',
            '$nickname','$birth_country','$note','$note_for_staff')";
            if ($conn->query($sql) === TRUE){
                
                $sql_main = "insert into uerp_user (uid,date,unbox,passbox,username,username2,phone,email,mtype,ref_db) 
                VALUES ('".$_POST["employeeid"]."','$pdate','".$_POST["email"]."','$currentpassword','$fname','$lname','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["mtype"]."','".$_COOKIE['dbname']."')";
                if ($conn_main->query($sql_main) === TRUE) echo"<script>alert('Record Saved.')</script>";
                
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                VALUES ('".$_COOKIE["userid"]."','0','0','EMPLOYEE INTAKE','0','$sysdate','$ip','1','Added New EMPLOYEE','0','".$_POST["userid"]."','uerp_user')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                
                echo"<form method='GET' action='global_email.php' name='main' target='_self'>
                    <input type=hidden name='r_email' value='".$_POST["email"]."'>
                    <input type=hidden name='r_name' value='$fname $lname'>
                    <input type=hidden name='r_subject' value='New Account Created as ".$_POST["mtype"]."'>
                    <input type=hidden name='r_body' value=\"We`re excited to let you know that your account has been successfully created!<br><br>Here are your account details:<br>Registered & Login Email: ".$_POST["email"]."<br>Login Password: [ ".$_POST["password"]." ]<br><br>You can now log in using this link and start using our services: <a href='$main_url/saas/login.php'>Login</a>. <br><br>\">
                </form>";
                ?><script language=JavaScript> document.main.submit(); </script><?php
            }
        }else echo"<script>alert('Sorry! This email address is already used.')</script>";
    }

    
    if($_POST["processor"]=="edit_EMPLOYEE"){
        
        $pdate=strtotime($_POST["pdate"]);
        $jdate=strtotime($_POST["jdate"]);
        $dob=strtotime($_POST["dob"]);
        $fname = str_replace("'", "`", $_POST["fname"]);
        $lname = str_replace("'", "`", $_POST["lname"]);
        $address = str_replace("'", "`", $_POST["address"]);
        $address2 = str_replace("'", "`", $_POST["address2"]);
        $application_id = str_replace("'", "`", $_POST["application_id"]);
        
        if(strlen($_POST["password"])>=5){
            $currentpassword=md5($_POST["password"]);
            $sql="update uerp_user set passbox='$currentpassword' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
            $sqlx="update uerp_user set passbox='$currentpassword' where ref_db='$dbnamex' and unbox='".$_POST["userid"]."'";
            if ($conn_main->query($sqlx) === TRUE) $tomtom=0;
            
        }
        
        $nickname = str_replace("'", "`", $_POST["nickname"]);
        $email = str_replace("'", "`", $_POST["email"]);
        $birth_country = str_replace("'", "`", $_POST["birth_country"]);
        $note = str_replace("'", "`", $_POST["note"]);
        $note_for_staff = str_replace("'", "`", $_POST["note_for_staff"]);
        
        $sql="update uerp_user set uid='".$_POST["employeeid"]."',date='$pdate',jointime='$jdate',status='1',
        gender='".$_POST["gender"]."',username='$fname',username2='$lname',address='$address',phone='".$_POST["phone"]."',
        address2='$address2',designation='".$_POST["designation"]."',department='".$_POST["department"]."',
        bank_name='".$_POST["bankname"]."',account_name='".$_POST["accountname"]."',account_number='".$_POST["accountnumber"]."',
        bsb='".$_POST["bsb"]."',country='".$_POST["country"]."',city='".$_POST["city"]."',area='".$_POST["state"]."',dob='$dob',
        mtype='".$_POST["mtype"]."',zip='".$_POST["zip"]."',abn='".$_POST["abn"]."',marital_status='".$_POST["marital_status"]."',
        salary_basic='".$_POST["salary_basic"]."',reg_amt='".$_POST["reg_amt"]."',sat_amt='".$_POST["sat_amt"]."',
        sun_amt='".$_POST["sun_amt"]."',hol_amt='".$_POST["hol_amt"]."',overtime='".$_POST["overtime"]."',
        night_amt='".$_POST["night_amt"]."',payment_type='".$_POST["payment_type"]."',job_experience='".$_POST["job_experience"]."',
        ndis_number='".$_POST["ndis_number"]."',nationality='".$_POST["nationality"]."',driving_licence_no='".$_POST["driving_licence_no"]."',
        emergency_contact_1='".$_POST["emergency_contact_1"]."',emergency_phone_1='".$_POST["emergency_phone_1"]."',
        emergency_email_1='".$_POST["emergency_email_1"]."',emergency_relation_1='".$_POST["emergency_relation_1"]."',
        emergency_contact_2='".$_POST["emergency_contact_2"]."',emergency_phone_2='".$_POST["emergency_phone_2"]."',
        emergency_email_2='".$_POST["emergency_email_2"]."',emergency_relation_2='".$_POST["emergency_relation_2"]."',
        application_id='$application_id',geographic_regions='$geographic_regions',schads_status='".$_POST["schads_status"]."',
        schads_level='".$_POST["schads_level"]."',schads_paypoint='".$_POST["schads_paypoint"]."',title='".$_POST["title"]."',
        nickname='".$_POST["nickname"]."',birth_country='".$_POST["birth_country"]."',note='".$_POST["note"]."',note_for_staff='".$_POST["note_for_staff"]."',
        language_spoken='".$_POST["language_spoken"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE){
            // echo"<script>alert('Record Updated')</script>";
            $sql_main="update uerp_user set username='$fname',username2='$lname$',phone='".$_POST["phone"]."',email='".$_POST["email"]."' where ref_db='".$_COOKIE['dbname']."' and unbox='".$_POST["unbox"]."'";
            if ($conn_main->query($sql_main) === TRUE) echo"<script>alert('Record Updated')</script>";
            
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','EMPLOYEE UPDATE','0','$sysdate','$ip','1','Updated EMPLOYEE data','0','".$_POST["userid"]."','uerp_user')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;            
        }
    }


    if($_POST["processor"]=="new_SUPPORT"){
        
        $pdate=strtotime($_POST["pdate"]);
        $jdate=strtotime($_POST["jdate"]);
        $dob=strtotime($_POST["dob"]);
        $currentpassword=md5($_POST["password"]);
        $sql = "insert into uerp_user (uid,date,jointime,status,agentid,unbox,passbox,gender,username,username2,designation,department,address,
        phone,address2,bank_name,account_name,account_number,bsb,country,city,area,email,dob,mtype,zip,abn,salary_basic,reg_amt,sat_amt,sun_amt,hol_amt,
        night_amt,payment_type,marital_status) 
        VALUES ('".$_POST["employeeid"]."','$pdate','$jdate','1','0','".$_POST["userid"]."','$currentpassword','".$_POST["gender"]."',
        '".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["designation"]."','".$_POST["department"]."','".$_POST["address"]."','".$_POST["phone"]."',
        '".$_POST["address2"]."','".$_POST["bankname"]."','".$_POST["accountname"]."','".$_POST["accountnumber"]."','".$_POST["bsb"]."',
        '".$_POST["country"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["email"]."','$dob','".$_POST["mtype"]."','".$_POST["zip"]."',
        '".$_POST["abn"]."','".$_POST["salary_basic"]."','".$_POST["reg_amt"]."','".$_POST["sat_amt"]."','".$_POST["sun_amt"]."','".$_POST["hol_amt"]."',
        '".$_POST["night_amt"]."','".$_POST["payment_type"]."','".$_POST["marital_status"]."')";
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            echo"<script>alert('Record Saved.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','SUPPORT INTAKE','0','$sysdate','$ip','1','Added New SUPPORT','0','0','uerp_user')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;            
        }
    }
    if($_POST["processor"]=="edit_SUPPORT"){

        $pdate=strtotime($_POST["pdate"]);
        $jdate=strtotime($_POST["jdate"]);
        $dob=strtotime($_POST["dob"]); 
        $currentpassword=md5($_POST["password"]);
        $sql="update uerp_user set uid='".$_POST["employeeid"]."',date='$pdate',jointime='$jdate',status='1',unbox='".$_POST["userid"]."',passbox='$currentpassword',
        gender='".$_POST["gender"]."',username='".$_POST["fname"]."',username2='".$_POST["lname"]."',address='".$_POST["address"]."',phone='".$_POST["phone"]."',
        address2='".$_POST["address2"]."',designation='".$_POST["designation"]."',department='".$_POST["department"]."',bank_name='".$_POST["bankname"]."',
        account_name='".$_POST["accountname"]."',account_number='".$_POST["accountnumber"]."',bsb='".$_POST["bsb"]."',country='".$_POST["country"]."',
        city='".$_POST["city"]."',area='".$_POST["state"]."',email='".$_POST["email"]."',dob='$dob',mtype='".$_POST["mtype"]."',zip='".$_POST["zip"]."',
        abn='".$_POST["abn"]."',marital_status='".$_POST["marital_status"]."',salary_basic='".$_POST["salary_basic"]."',reg_amt='".$_POST["reg_amt"]."',
        sat_amt='".$_POST["sat_amt"]."',sun_amt='".$_POST["sun_amt"]."',hol_amt='".$_POST["hol_amt"]."',overtime='".$_POST["overtime"]."',
        night_amt='".$_POST["night_amt"]."',payment_type='".$_POST["payment_type"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            echo"<script>alert('Record Updated')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','SUPPORT UPDATE','0','$sysdate','$ip','1','Updated SUPPORT data','0','".$_POST["employeeid"]."','uerp_user')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
        }
        
    }
    // echo"<form method='POST' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='all-clients'></form>";
    // <script language=JavaScript> document.main.submit(); </script>