<?php
    // error_reporting(0);
    include('../include.php');
    
    date_default_timezone_set("Asia/Dhaka");
    
    
    // ADD PRODUCTS
    // $sql = "insert into sms_product_bon (cid,cid2,bid,vid,sku,qty,price,offer,discount,discount_type,v_comm,comm_type,tag,introduction,detail,ws,ws_status,ws11,ws22,ws33,ws44,ws55,ws66,ws1,ws2,ws3,ws4,ws5,ws6,c_status,c1,c2,c3,c4,c5,
    
    // BRAND DATA
    if($_POST["processor"]=="addbrand"){
        $title = str_replace("'", "`", $_POST["title"]);
        $introduction = str_replace("'", "`", $_POST["introduction"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $datex=strtotime($_POST["date"]);        
        
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/brand/' . $newFilename);
            $location = '../media/brand/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
    	if($extension1>=3){
            $sql = "insert into brand (title,introduction,detail,sorder,status,image) VALUES ('$title','$introduction','$detail','".$_POST["sorder"]."','".$_POST["status"]."','$location')";
    	}else{
    	   $sql = "insert into brand (title,introduction,detail,sorder,status) VALUES ('$title','$introduction','$detail','".$_POST["sorder"]."','".$_POST["status"]."')";
    	}
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="updatebrand"){
        $title = str_replace("'", "`", $_POST["title"]);
        $introduction = str_replace("'", "`", $_POST["introduction"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/brand/' . $newFilename);
            $location = '../media/brand/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
    	if($extension1>=3){
            $sql="update brand set title='$title',introduction='$introduction',detail='$detail',status='".$_POST["status"]."',sorder='".$_POST["sorder"]."',image='$location' where id='".$_POST["id"]."'";
    	}else{
    	    $sql="update brand set title='$title',introduction='$introduction',detail='$detail',status='".$_POST["status"]."',sorder='".$_POST["sorder"]."' where id='".$_POST["id"]."'";
    	}
    	if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }
    
    // BLOG DATA
    if($_POST["processor"]=="addblog"){
        $title = str_replace("'", "`", $_POST["title"]);
        $introduction = str_replace("'", "`", $_POST["introduction"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $author = str_replace("'", "`", $_POST["author"]);
        $datex=strtotime($_POST["date"]);        
        
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/blog/' . $newFilename);
            $location = '../media/blog/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
    	if($extension1>=3){
            $sql = "insert into blog (bid,title,introduction,detail,sorder,date,status,author,image) VALUES ('".$_POST["bid"]."','$title','$introduction','$detail','".$_POST["sorder"]."','$datex','".$_POST["status"]."','$author','$location')";
    	}else{
    	   $sql = "insert into blog (bid,title,introduction,detail,sorder,date,status,author) VALUES ('".$_POST["bid"]."','$title','$introduction','$detail','".$_POST["sorder"]."','$datex','".$_POST["status"]."','$author')";
    	}
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="updateblog"){
        $title = str_replace("'", "`", $_POST["title"]);
        $introduction = str_replace("'", "`", $_POST["introduction"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $author = str_replace("'", "`", $_POST["author"]);
        $datex=strtotime($_POST["date"]);
        
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/blog/' . $newFilename);
            $location = '../media/blog/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
    	if($extension1>=3){
            $sql="update blog set bid='".$_POST["bid"]."',title='$title',introduction='$introduction',detail='$detail',date='$datex',status='".$_POST["status"]."',sorder='".$_POST["sorder"]."',author='$author',image='$location' where id='".$_POST["id"]."'";
    	}else{
    	    $sql="update blog set bid='".$_POST["bid"]."',title='$title',introduction='$introduction',detail='$detail',date='$datex',status='".$_POST["status"]."',sorder='".$_POST["sorder"]."',author='$author' where id='".$_POST["id"]."'";
    	}
    	if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }

    // PROMO DATA
    if($_POST["processor"]=="addpromo"){
        $title = str_replace("'", "`", $_POST["title"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $datex=strtotime($_POST["date"]);
        
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/promo/' . $newFilename);
            $location = '../media/promo/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
        if($extension1>=3){
            $sql = "insert into promo (pid,title,amount,type,detail,sorder,date,status,image)
            VALUES ('".$_POST["pid"]."','$title','".$_POST["amount"]."','".$_POST["type"]."','$detail','".$_POST["sorder"]."','$datex','".$_POST["status"]."','$location')";
        }else{
            $sql = "insert into promo (pid,title,amount,type,detail,sorder,date,status)
            VALUES ('".$_POST["pid"]."','$title','".$_POST["amount"]."','".$_POST["type"]."','$detail','".$_POST["sorder"]."','$datex','".$_POST["status"]."')";
        }
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="updatepromo"){
        $title = str_replace("'", "`", $_POST["title"]);
        $detail = str_replace("'", "`", $_POST["detail"]);
        $datex=strtotime($_POST["date"]);
        
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/promo/' . $newFilename);
            $location = '../media/promo/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
        if($extension1>=3){
            $sql="update promo set pid='".$_POST["pid"]."',title='$title',detail='$detail',date='$datex',status='".$_POST["status"]."',sorder='".$_POST["sorder"]."',amount='".$_POST["amount"]."',type='".$_POST["type"]."',image='$location' where id='".$_POST["id"]."'";
        }else{
            $sql="update promo set pid='".$_POST["pid"]."',title='$title',detail='$detail',date='$datex',status='".$_POST["status"]."',sorder='".$_POST["sorder"]."',amount='".$_POST["amount"]."',type='".$_POST["type"]."' where id='".$_POST["id"]."'";
        }
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }
        
    // FAQ DATA
    if($_POST["processor"]=="addfaq"){
        $title = str_replace("'", "`", $_POST["title"]);
        $solution = str_replace("'", "`", $_POST["solution"]);
        $sql = "insert into sms_faq (title,solution,sorder,status) VALUES ('$title','$solution','".$_POST["sorder"]."','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="updatefaq"){
        $title = str_replace("'", "`", $_POST["title"]);
        $solution = str_replace("'", "`", $_POST["solution"]);
        $sql="update sms_faq set title='$title',solution='$solution',status='".$_POST["status"]."',sorder='".$_POST["sorder"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }

    // attributes
    if($_POST["processor"]=="updateattributes"){
        $name = str_replace("'", "`", $_POST["name"]);        
        $sql="update product_attribute_cat set name='$name',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }
    if($_POST["processor"]=="addattributes"){
        $name = str_replace("'", "`", $_POST["name"]);
        $sql = "insert into product_attribute_cat (name,status) VALUES ('$name','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="addattributeoption"){
        $name = str_replace("'", "`", $_POST["name"]);
        $sql = "insert into product_attribute (catid,name,price,status) VALUES ('".$_POST["catid"]."','$name','0','".$_POST["status"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="updateattributeoption"){
        $name = str_replace("'", "`", $_POST["name"]);
        $sql="update product_attribute set name='$name',status='".$_POST["status"]."',catid='".$_POST["catid"]."',price='0' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }
    

    // NOTICE DATA
    if($_POST["processor"]=="addnotice"){
        $title = str_replace("'", "`", $_POST["title"]);
        $solution = str_replace("'", "`", $_POST["solution"]);
        $datex=time();
        $sql = "insert into sms_notice (title,solution,sorder,status,date) VALUES ('$title','$solution','".$_POST["sorder"]."','".$_POST["status"]."','$datex')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    

    if($_POST["processor"]=="updatenotice"){
        $title = str_replace("'", "`", $_POST["title"]);
        $solution = str_replace("'", "`", $_POST["solution"]);
        $sql="update sms_notice set title='$title',solution='$solution',status='".$_POST["status"]."',sorder='".$_POST["sorder"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }
    
    // PAGES DATA
    if($_POST["processor"]=="updatepage"){
        $des1 = str_replace("'", "`", $_POST["des1"]);
        $des2 = str_replace("'", "`", $_POST["des2"]);
        $description = str_replace("'", "`", $_POST["description"]);
        $title = str_replace("'", "`", $_POST["title"]);
        $keywords = str_replace("'", "`", $_POST["keywords"]);
        $sql="update sms_webhost set identity='".$_POST["identity"]."',title='$title',des1='$des1',des2='$des2',description='$description',keywords='$keywords',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }
    
    // MENU DATA
    if($_POST["processor"]=="updatemenu"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/category/' . $newFilename);
            $location = '../media/category/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
    	if($extension1>=3) $sql="update sms_link set pam='".$_POST["pam"]."',des1='".$_POST["des1"]."',sorder='".$_POST["sorder"]."',status='".$_POST["status"]."',icon='".$_POST["iconname"]."',megamenu='".$_POST["megamenu"]."',panel='".$_POST["panel"]."',popular='".$_POST["popular"]."',image='$location' where id='".$_POST["id"]."'";
        else $sql="update sms_link set pam='".$_POST["pam"]."',des1='".$_POST["des1"]."',sorder='".$_POST["sorder"]."',status='".$_POST["status"]."',icon='".$_POST["iconname"]."',megamenu='".$_POST["megamenu"]."',panel='".$_POST["panel"]."',popular='".$_POST["popular"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }
    if($_POST["processor"]=="addnewmenu"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/category/' . $newFilename);
            $location = '../media/category/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
    	if($extension1>=3) $sql = "insert into sms_link (pam,des1,sorder,status,icon,megamenu,panel,popular,image) VALUES ('".$_POST["pam"]."','".$_POST["des1"]."','".$_POST["sorder"]."','".$_POST["status"]."','".$_POST["iconname"]."','".$_POST["megamenu"]."','".$_POST["panel"]."','".$_POST["popular"]."','$location')";
        else $sql = "insert into sms_link (pam,des1,sorder,status,icon,megamenu,panel,popular) VALUES ('".$_POST["pam"]."','".$_POST["des1"]."','".$_POST["sorder"]."','".$_POST["status"]."','".$_POST["icon"]."','".$_POST["megamenu"]."','".$_POST["panel"]."','".$_POST["popular"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }

    // update media
    if($_POST["processor"]=="addmedia"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/gallery/' . $newFilename);
            $location = '../media/gallery/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
    	if($extension1>=3) $sql = "insert into sms_media (pid,name,placement,image,sorder,mtype,status) VALUES ('".$_POST["pid"]."','".$_POST["mname"]."','".$_POST["placement"]."','$location','".$_POST["sorder"]."','".$_POST["mtype"]."','".$_POST["status"]."')";
        else $sql = "insert into sms_media (pid,name,placement,sorder,mtype,status) VALUES ('".$_POST["pid"]."','".$_POST["mname"]."','".$_POST["placement"]."','".$_POST["sorder"]."','".$_POST["mtype"]."','1')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Saved.')</script>";
    }
    if($_POST["processor"]=="updatemedia"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/category/' . $newFilename);
            $location = '../media/category/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
    	if($extension1>=3) $sql="update sms_media set pid='".$_POST["pid"]."',name='".$_POST["mname"]."',placement='".$_POST["placement"]."',image='$location',sorder='".$_POST["sorder"]."',mtype='".$_POST["mtype"]."',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
        else $sql="update sms_media set pid='".$_POST["pid"]."',name='".$_POST["mname"]."',placement='".$_POST["placement"]."',sorder='".$_POST["sorder"]."',mtype='".$_POST["mtype"]."',status='".$_POST["status"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }

    if($_POST["processor"]=="companysetting"){
        $sql="update sms_company_bon set cname='".$_POST["cname"]."',address='".$_POST["caddress"]."',city='".$_POST["ccity"]."',state='".$_POST["cstate"]."',zip='".$_POST["czip"]."',
        country='".$_POST["ccountry"]."',phone='".$_POST["cphone"]."',email='".$_POST["cemail"]."',tin='".$_POST["ctin"]."',vat='".$_POST["cvat"]."',license='".$_POST["clicense"]."',servicehours='".$_POST["cservicehours"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }
    
    // logofile,faviconfile
    if($_POST["processor"]=="companysetting2"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/company/' . $newFilename);
            $location = '../media/company/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
    	if($extension1>=3){
            $sql="update sms_company_bon set logo='$location' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Company Logo Uploaded.')</script>";
        }
    }
    
    if($_POST["processor"]=="companysetting3"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/company/' . $newFilename);
            $location = '../media/company/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
    	if($extension1>=3){
            $sql="update sms_company_bon set favicon='$location' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Favicon Icon Uploaded.')</script>";
        }
    }
    
    if($_POST["processor"]=="companysetting4"){
        $sql="update sms_company_bon set top_bc='".$_POST["top_bc"]."',top_tc='".$_POST["top_tc"]."',side_bc='".$_POST["side_bc"]."',side_tc='".$_POST["side_tc"]."',
        body_bc='".$_POST["body_bc"]."',body_tc='".$_POST["body_tc"]."',button_bc='".$_POST["button_bc"]."',button_tc='".$_POST["button_tc"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Color Settings Updated')</script>";
    }
    
    if($_POST["processor"]=="companysetting5"){
        $sql="update sms_company_bon set ccode='".$_POST["ccode"]."',csymbol='".$_POST["csymbol"]."',symbol_position='".$_POST["symbol_position"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Currency Settings Updated')</script>";
    }
    
    if($_POST["processor"]=="companysetting6"){
        $sql="update sms_company_bon set user_login='".$_POST["user_login"]."',client_login='".$_POST["client_login"]."',seller_login='".$_POST["seller_login"]."',
        system_status='".$_POST["system_status"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Access Control Settings Updated')</script>";
    }
    
    if($_POST["processor"]=="companysetting7"){
        $sql="update sms_company_bon set noticeboard='".$_POST["noticeboard"]."',noticeboardstatus='".$_POST["noticeboardstatus"]."'  where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Notice Board Updated')</script>";
    }
    
    if($_POST["processor"]=="companysetting8"){
        $sql="update sms_company_bon set send_email='".$_POST["send_email"]."',smtp_server='".$_POST["smtp_server"]."',smtp_port='".$_POST["smtp_port"]."'  where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Email Server Updated')</script>";
    }
    
    if($_POST["processor"]=="companysetting9"){
        $sql="update sms_company_bon set project_path='".$_POST["project_path"]."',api_domain_url='".$_POST["api_domain_url"]."',store_id='".$_POST["store_id"]."',store_password='".$_POST["store_password"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Payment API Updated')</script>";
    }
    
    if($_POST["processor"]=="companysetting10"){
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "smsbd$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], '../media/users/' . $newFilename);
            $location = '../media/users/' . $newFilename;
        }
        $extension1=0;
        $extension1=strlen("$extension");
    	if($extension1>=3){
            $sql="update sms_user2 set image='$location' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Profile Image Uploaded.')</script>";
        }
    }
    
    if($_POST["processor"]=="companysetting11"){
        $sql="update sms_company_bon set facebook='".$_POST["facebook"]."',twitter='".$_POST["twitter"]."',linkedin='".$_POST["linkedin"]."',youtube='".$_POST["youtube"]."',instagram='".$_POST["instagram"]."',pinterest='".$_POST["pinterest"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Social Media Links Updated ')</script>";
    }

    if($_POST["processor"]=="companysetting12"){
        $sql="update sms_company_bon set android='".$_POST["android"]."',ios='".$_POST["ios"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('App Store Links Updated ')</script>";
    }

    if($_POST["processor"]=="profileupdate"){
        $sql="update sms_user2 set name='".$_POST["firstname"]."',name2='".$_POST["lastname"]."',email='".$_POST["email"]."',phone='".$_POST["phone"]."',address='".$_POST["address"]."',dob='".$_POST["dob"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Record Updated')</script>";
    }
    
    if($_POST["processor"]=="passwordupdate"){
        $sam=0;
        $s1 = "select * from sms_user2 where id='".$_POST["id"]."' and pass='".$_POST["oldpass"]."' and status='1' order by id asc limit 1";
    	$r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $sam=$rs1["id"]; } }
        if($sam!="0"){
            if($_POST["newpass"]==$_POST["newpass2"]){
                $sql="update sms_user2 set pass='".$_POST["newpass"]."' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE) echo"<script>alert('New Password Updated')</script>";
            } else echo"<script>alert('Confirm Password Not Matched with New Password.')</script>";
        } else echo"<script>alert('Current Password Not Matched.')</script>";
    }
    
    if($_POST["processor"]=="addnewtask"){
        $datex=strtotime($_POST["dfrom"]);
        $datey=strtotime($_POST["dto"]);
        $sql = "insert into tasks (eid,dfrom,dto,priority,detail,status) VALUES ('".$_POST["eid"]."','$datex','$datey','".$_POST["priority"]."','".$_POST["task_detail"]."','PENDING')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Task Assigned.')</script>";
    }
    
    if($_GET["processor"]=="updatetask"){
        $sql="update tasks set status='".$_GET["statusupdate"]."' where id='".$_GET["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Task Status Updated.')</script>";
    }
    
    if($_POST["processor"]=="updatetask2"){
        $datex=strtotime($_POST["dfrom"]);
        $datey=strtotime($_POST["dto"]);
        $sql="update tasks set eid='".$_POST["eid"]."',dfrom='$datex',dto='$datey',priority='".$_POST["priority"]."',detail='".$_POST["todo_detail"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Task Status Updated.')</script>";
    }
    
    
    if($_POST["processor"]=="addnewtodo"){
        $datex=strtotime($_POST["dfrom"]);
        $sql = "insert into todo (eid,dfrom,detail,status) VALUES ('".$_COOKIE["uid"]."','$datex','".$_POST["task_detail"]."','ACTIVE')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('To-Do List Added.')</script>";
    }
    
    if($_GET["processor"]=="updatetodo"){
        $sql="update todo set status='".$_GET["statusupdate"]."' where id='".$_GET["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('To-Do List ".$_GET["statusupdate"].".')</script>";
    }
    if($_POST["processor"]=="updatetodo2"){
        $datex=strtotime($_POST["dfrom"]);
        $datey=strtotime($_POST["dto"]);
        $sql="update todo set dfrom='$datex',detail='".$_POST["todo_detail"]."' where id='".$_POST["id"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('To-Do Status Updated.')</script>";
    }
    
    
    
    
    
    
    
    
    
    
    
    
    // delete data records.
    if($_GET["processor"]=="deletetask"){
        $tablename = $_GET["tbl"];
        $delid = $_GET["delid"];
        if(isset($_GET["delid"])){
            if($_GET["delid"]>=1){ ?>
                <body onload='ConfirmDelete()'>
                    <script>
                        var baseUrl='<?php echo"deleterecords.php?tbl=$tablename&delid=$delid"; ?>';
                        function ConfirmDelete(){
                            if (confirm("Delete Record?"))
                                location.href=baseUrl;
                        }
                    </script>
                </body><?php
            }
        }
    }
?>
