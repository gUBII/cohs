<?php
    error_reporting(0);

    date_default_timezone_set("Australia/Melbourne");
    $timetable=time();
    $dbnamex=$_COOKIE['dbname'];
    
    include('authenticator.php');

    if($_POST["processor"]=="incomeimage"){
        $date=strtotime($_POST["date"]);
        $note = str_replace("'", "`", $_POST["note"]);
        $extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex_$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/bookkeeping/' . $newFilename);
            $location = 'media/bookkeeping/' . $newFilename;
        }
    	if($extension!=""){
    	    $sql = "insert into receipt_voucher (employeeid,receipt_no,receipt_date,narration,ledger_id,dr_amt,cr_amt,type,ledger_type,received_from,cc_code,ip,country,image) 
            VALUES ('".$_COOKIE["userid"]."','$date','$date','$note','".$_POST["cname"]."','0','".$_POST["amount"]."','2','2','".$_POST["cname"]."','1','$ip','$mycountry','$location')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record saved and sent for approval.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','INCOME NOTE','0','$sysdate','$ip','1','Added New Income Note With Attachment','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}else{
    	    $sql = "insert into receipt_voucher (employeeid,receipt_no,receipt_date,narration,ledger_id,dr_amt,cr_amt,type,ledger_type,received_from,cc_code,ip,country) 
            VALUES ('".$_COOKIE["userid"]."','$date','$date','$note','".$_POST["cname"]."','0','".$_POST["amount"]."','2','2','".$_POST["cname"]."','1','$ip','$mycountry')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record saved and sent for approval.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','INCOME NOTE','0','$sysdate','$ip','1','Added New Income Note','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}
    	
    	echo"<form method='get' action='index.php' name='main' target='_top'>
    	    <input type=hidden name='pointer' value='".$_POST["pointer"]."'><input type=hidden name='smsbd' value='daily-income'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    if($_POST["processor"]=="expenseimage"){
        $date=strtotime($_POST["date"]);
        $note = str_replace("'", "`", $_POST["note"]);
    	$extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex_$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/bookkeeping/' . $newFilename);
            $location = 'media/bookkeeping/' . $newFilename;
        }
        $extension1=strlen("$extension");
    	if($extension1>=3){
    	    $sql = "insert into payment_voucher (employeeid,payment_no,payment_date,narration,ledger_id,dr_amt,cr_amt,type,ledger_type,paid_to,cc_code,ip,country,image,approve1) 
            VALUES ('".$_COOKIE["userid"]."','$date','$date','$note','".$_POST["cname"]."','".$_POST["amount"]."','0','2','2','".$_POST["cname"]."','1','$ip','$mycountry','$location','0')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record saved and sent for approval.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','EXPENSE NOTE','0','$sysdate','$ip','1','Added New Expense Note With Attachment','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}else{
    	    $sql = "insert into payment_voucher (employeeid,payment_no,payment_date,narration,ledger_id,dr_amt,cr_amt,type,ledger_type,paid_to,cc_code,ip,country,approve1) 
            VALUES ('".$_COOKIE["userid"]."','$date','$date','$note','".$_POST["cname"]."','".$_POST["amount"]."','0','2','2','".$_POST["cname"]."','1','$ip','$mycountry','0')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record saved and sent for approval.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','EXPENSE NOTE','0','$sysdate','$ip','1','Added New Expense Note','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}
    	echo"<form method='get' action='index.php' name='main' target='_top'>
    	    <input type=hidden name='pointer' value='".$_POST["pointer"]."'>
    	    <input type='hidden' name='url' value='".$_POST["url"]."'>
    	    <input type='hidden' name='id' value='".$_POST["id"]."'>
    	    <input type='hidden' name='dfrom' value='".$_POST["dfrom"]."'><input type='hidden' name='dto' value='".$_POST["dto"]."'>
            <input type='hidden' name='estatus' value='".$_POST["estatus"]."'><input type='hidden' name='src_employeeid' value='".$_POST["src_employeeid"]."'>
            <input type='hidden' name='src_clientid' value='".$_POST["src_clientid"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    
    if($_POST["processor"]=="generalexpenseimage"){
        $date=strtotime($_POST["date"]);
        $note = str_replace("'", "`", $_POST["note"]);
    	$extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex_$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/bookkeeping/' . $newFilename);
            $location = 'media/bookkeeping/' . $newFilename;
        }
        $extension1=strlen("$extension");
    	if($extension1>=3){
    	    $sql = "insert into payment_voucher (employeeid,payment_no,payment_date,narration,ledger_id,dr_amt,cr_amt,type,ledger_type,paid_to,cc_code,ip,country,image,approve1) 
            VALUES ('0','$date','$date','$note','".$_POST["cname"]."','".$_POST["amount"]."','0','2','2','".$_POST["cname"]."','1','$ip','$mycountry','$location','1')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('General Expense Record saved.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','GENERAL EXPENSE NOTE','0','$sysdate','$ip','1','Added New General Expense Note With Attachment','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}else{
    	    $sql = "insert into payment_voucher (employeeid,payment_no,payment_date,narration,ledger_id,dr_amt,cr_amt,type,ledger_type,paid_to,cc_code,ip,country,approve1) 
            VALUES ('0','$date','$date','$note','".$_POST["cname"]."','".$_POST["amount"]."','0','2','2','".$_POST["cname"]."','1','$ip','$mycountry','1')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('General Expense Record saved.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','GENERAL EXPENSE NOTE','0','$sysdate','$ip','1','Added New General Expense Note','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}
    	echo"<form method='get' action='index.php' name='main' target='_top'>
    	    <input type=hidden name='pointer' value='".$_POST["pointer"]."'><input type=hidden name='smsbd' value='general-expenses'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    if($_POST["processor"]=="expenseimage2"){
        $date=strtotime($_POST["date"]);
        $note = str_replace("'", "`", $_POST["note"]);
    	$extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex_$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/bookkeeping/' . $newFilename);
            $location = 'media/bookkeeping/' . $newFilename;
        }
        $extension1=strlen("$extension");
    	if($extension1>=3){
    	    $sql = "insert into payment_voucher (employeeid,payment_no,payment_date,narration,ledger_id,dr_amt,cr_amt,type,ledger_type,paid_to,cc_code,ip,country,image) 
            VALUES ('".$_COOKIE["userid"]."','$date','$date','$note','".$_POST["cname"]."','".$_POST["amount"]."','0','2','2','".$_POST["cname"]."','1','$ip','$mycountry','$location')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record saved and sent for approval.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','EXPENSE NOTE','0','$sysdate','$ip','1','Added New Expense Note With Attachment','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}else{
    	    $sql = "insert into payment_voucher (employeeid,payment_no,payment_date,narration,ledger_id,dr_amt,cr_amt,type,ledger_type,paid_to,cc_code,ip,country) 
            VALUES ('".$_COOKIE["userid"]."','$date','$date','$note','".$_POST["cname"]."','".$_POST["amount"]."','0','2','2','".$_POST["cname"]."','1','$ip','$mycountry')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record saved and sent for approval.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','EXPENSE NOTE','0','$sysdate','$ip','1','Added New Expense Note','0','0')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}
    	echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='invoice-generator'>
            <input type=hidden name='processor' value='1'><input type=hidden name='selection' value='".$_POST["selection"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    if($_POST["processor"]=="expenseimagez"){
        $date=strtotime($_POST["date"]);
        $note = str_replace("'", "`", $_POST["note"]);
    	$extension=0;
        foreach ($_FILES['images']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension = $path_parts['extension'];
            $newFilename = time() . "$dbnamex_$rand." . $extension;
            move_uploaded_file($_FILES['images']['tmp_name'][$key], 'media/bookkeeping/' . $newFilename);
            $location = 'media/bookkeeping/' . $newFilename;
        }
        $extension1=strlen("$extension");
    	if($extension1>=3){
    	    $sql = "insert into payment_voucher (employeeid,payment_no,payment_date,narration,ledger_id,dr_amt,cr_amt,type,ledger_type,paid_to,cc_code,ip,country,image,approve1) 
            VALUES ('".$_POST["employeeidz"]."','$date','$date','$note','".$_POST["cname"]."','".$_POST["amount"]."','0','2','2','".$_POST["cname"]."','1','$ip','$mycountry','$location','".$_POST["approve1"]."')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Record saved and auto approved.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','EXPENSE NOTE','0','$sysdate','$ip','1','Added New Expense Note by ADMIN With Attachment','0','".$_POST["employeeidz"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}else{
    	    $sql = "insert into payment_voucher (employeeid,payment_no,payment_date,narration,ledger_id,dr_amt,cr_amt,type,ledger_type,paid_to,cc_code,ip,country,approve1) 
            VALUES ('".$_POST["employeeidz"]."','$date','$date','$note','".$_POST["cname"]."','".$_POST["amount"]."','0','2','2','".$_POST["cname"]."','1','$ip','$mycountry','".$_POST["approve1"]."')";
            if ($conn->query($sql) === TRUE) echo"<script>alert('Expense Record Saved.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
            VALUES ('".$_COOKIE["userid"]."','0','0','EXPENSE NOTE','0','$sysdate','$ip','1','Added New Expense Note by ADMIN','0','".$_POST["employeeidz"]."')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
    	}
    	echo"<form method='get' action='index.php' name='main' target='_top'>
    	    <input type=hidden name='pointer' value='".$_POST["pointer"]."'>
            <input type=hidden name='url' value='time_sheet.php'><input type=hidden name='id' value='5198'>
    	    <input type=hidden name='src_employeeid' value='".$_POST["employeeidz"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    if($_GET["processor"]=="expenseapprove"){
        $sql="update payment_voucher set approve1='1' where id='".$_GET["aid"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Expense Request Approved.')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
        VALUES ('".$_COOKIE["userid"]."','0','0','EXPENSE NOTE','0','$sysdate','$ip','1','Expense Request Approved.','0','".$_GET["aid"]."','payment_voucher')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
        
        echo"<form method='get' action='index.php' name='main' target='_top'>
            <input type=hidden name='pointer' value='".$_GET["pointer"]."'>
    	    <input type='hidden' name='url' value='".$_GET["url"]."'>
    	    <input type='hidden' name='id' value='".$_GET["id"]."'>
    	    <input type='hidden' name='dfrom' value='".$_GET["dfrom"]."'>
    	    <input type='hidden' name='dto' value='".$_GET["dto"]."'>
            <input type='hidden' name='estatus' value='".$_GET["estatus"]."'>
            <input type='hidden' name='src_employeeid' value='".$_GET["src_employeeid"]."'>
            <input type='hidden' name='src_clientid' value='".$_GET["src_clientid"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    
    if($_GET["processor"]=="expenseapprove2"){
        $sql="update payment_voucher set approve1='1' where id='".$_GET["aid"]."'"; 
        if ($conn->query($sql) === TRUE){
            echo"<script>alert('Expense Request Approved.')</script>";
            $sysdate=time();
            $ip=$_SERVER['REMOTE_ADDR'];
            $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
            VALUES ('".$_COOKIE["userid"]."','0','0','EXPENSE NOTE','0','$sysdate','$ip','1','Expense Request Approved.','0','".$_GET["aid"]."','payment_voucher')";
            if ($conn->query($sql1) === TRUE) $tomtom=0;
            
            echo"<form method='get' action='modules/approveexpense.php' name='main' target='_self'><input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
    }
    if($_GET["processor"]=="expenseunapprove"){
        $sql="update payment_voucher set approve1='0' where id='".$_GET["aid"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Expense Request Set to Pending Again.')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
        VALUES ('".$_COOKIE["userid"]."','0','0','EXPENSE NOTE','0','$sysdate','$ip','1','Expense Request Approved.','0','".$_GET["aid"]."','payment_voucher')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
        
        echo"<form method='get' action='index.php' name='main' target='_top'>
            <input type=hidden name='pointer' value='".$_GET["pointer"]."'>
    	    <input type='hidden' name='url' value='".$_GET["url"]."'>
    	    <input type='hidden' name='id' value='".$_GET["id"]."'>
    	    <input type='hidden' name='dfrom' value='".$_GET["dfrom"]."'>
    	    <input type='hidden' name='dto' value='".$_GET["dto"]."'>
            <input type='hidden' name='estatus' value='".$_GET["estatus"]."'>
            <input type='hidden' name='src_employeeid' value='".$_GET["src_employeeid"]."'>
            <input type='hidden' name='src_clientid' value='".$_GET["src_clientid"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if($_POST["processor"]=="accountsclass"){
        $sql = "insert into ledger_class (class_name,proj_id,status,debit,credit) VALUES ('".$_POST["classname"]."','".$_POST["project"]."','".$_POST["status"]."','0','0')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Accounts Class Added.')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','ACCOUNTS CLASS','0','$sysdate','$ip','1','Added New Accounts Class','0','".$_POST["classname"]."')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="accountsclassupdate"){
        $sql="update ledger_class set class_name='".$_POST["classname"]."',status='".$_POST["status"]."' where class_id='".$_POST["projectid"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Accounts Class Updated.')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','ACCOUNTS CLASS','0','$sysdate','$ip','1','Updated Accounts Class','".$_POST["projectid"]."','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if($_POST["processor"]=="accountsgroup"){
        $sql = "insert into ledger_group (group_name,group_class,proj_id,status,debit,credit) VALUES ('".$_POST["groupname"]."','".$_POST["classname"]."','".$_POST["project"]."','".$_POST["status"]."','0','0')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Accounts Group Added.')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','ACCOUNTS GROUP','0','$sysdate','$ip','1','Added New Accounts Group','0','".$_POST["groupname"]."')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="accountsgroupupdate"){
        $sql="update ledger_group set group_name='".$_POST["groupname"]."',group_class='".$_POST["classname"]."',status='".$_POST["status"]."' where group_id='".$_POST["projectid"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Accounts Group Updated.')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','ACCOUNTS GROUP','0','$sysdate','$ip','1','Updated Accounts Group','".$_POST["projectid"]."','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="accountsaccounts2"){
        $sql = "insert into accounts_ledger (ledger_name,ledger_group_id,balance_type,proj_id,status,debit,credit,transaction_type) 
        VALUES ('".$_POST["accountsname"]."','".$_POST["groupname"]."','".$_POST["type"]."','".$_POST["project"]."','".$_POST["status"]."','0','0','".$_POST["type2"]."')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Accounts Ledger Added.')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','ACCOUNTS LEDGER','0','$sysdate','$ip','1','Added New Accounts Ledger','0','".$_POST["accountsname"]."')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
        
        echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='invoice-generator'>
            <input type=hidden name='processor' value='1'><input type=hidden name='selection' value='".$_POST["selection"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if($_POST["processor"]=="accountsaccounts"){
        $sql = "insert into accounts_ledger (ledger_name,ledger_group_id,balance_type,proj_id,status,debit,credit) 
        VALUES ('".$_POST["accountsname"]."','".$_POST["groupname"]."','".$_POST["type"]."','".$_POST["project"]."','".$_POST["status"]."','0','0')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Accounts Ledger Added.')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','ACCOUNTS LEDGER','0','$sysdate','$ip','1','Added New Accounts Ledger','0','".$_POST["accountsname"]."')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="accountsaccountsupdate"){
        $sql="update accounts_ledger set ledger_name='".$_POST["accountsname"]."',ledger_group_id='".$_POST["groupname"]."',balance_type='".$_POST["type"]."',status='".$_POST["status"]."' where ledger_id	='".$_POST["projectid"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Accounts Ledger Updated.')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','ACCOUNTS LEDGER','0','$sysdate','$ip','1','Updated Accounts Ledger','".$_POST["projectid"]."','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if($_POST["processor"]=="accountssub"){
        $sql = "insert into accounts_ledger (ledger_name,ledger_group_id,balance_type,proj_id,status,debit,credit) 
        VALUES ('".$_POST["accountsname"]."','".$_POST["groupname"]."','".$_POST["type"]."','".$_POST["project"]."','".$_POST["status"]."','0','0')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Accounts Ledger Added.')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','ACCOUNTS LEDGER','0','$sysdate','$ip','1','Added New Accounts Ledger','0','".$_POST["accountsname"]."')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    if($_POST["processor"]=="accountssubupdate"){
        $sql="update accounts_ledger set ledger_name='".$_POST["accountsname"]."',ledger_group_id='".$_POST["groupname"]."',balance_type='".$_POST["type"]."',status='".$_POST["status"]."' where ledger_id	='".$_POST["projectid"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Accounts Ledger Updated.')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','ACCOUNTS LEDGER','0','$sysdate','$ip','1','Updated Accounts Ledger','".$_POST["projectid"]."','0')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
    }
    
    
    
    // formgenerator
    if($_POST["processor"]=="formgenerator"){
        $fdate=time();
        $sql = "insert into form_builder (companyid,ledgerid,form_name,title,description,documents,status) 
        VALUES ('1','".$_POST["ledgerid"]."','".$_POST["name"]."','".$_POST["title"]."','".$_POST["description"]."','".$_POST["status"]."','$fdate')";
        if ($conn->query($sql) === TRUE) echo"<script>alert('New Form for [ ".$_POST["name"]." ] is Generated Successfully.')</script>";
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','NEW FORM','0','$sysdate','$ip','1','New Accounts Form is created. ','".$_POST["ledgerid"]."','$fdate')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
        
        echo"<form method='get' action='index.php' name='main' target='_top'>
    	    <input type=hidden name='selection' value='".$_POST["pointer"]."'><input type=hidden name='smsbd' value='invoice-generator'>
    	    <input type=hidden name='processor' value='1'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // newinvoice
    if($_POST["processor"]=="newinvoice"){
        $idate=strtotime($_POST["idate"]);
        $date_from=strtotime($_POST["date_from"]);
        $date_to=strtotime($_POST["date_to"]);
        $thour=0;
        $total_hour_worked=0;
        $total_hour_workedH=0;
        $sx1 = "select * from shifting_allocation where clientid='".$_POST["participant"]."' and sdate>='$date_from' and sdate<='$date_to' order by id asc";
        $rx1 = $conn->query($sx1);
        if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) {
            if($ry1["clockout"]!=0){
                $enddate=0;
                $cinout=0;
                $cin1=date("H", $ry1["clockin"]);
                $cout1=date("H", $ry1["clockout"]);
                $cinout=($cin1-$cout1);
                if($cinout>=1) $enddate=strtotime("24 hours", $ry1["clockout"]);
                else $enddate=$ry1["clockout"];
                
                $clockin2=0;
                $clockout2=0;
                $date1=0;
                $date2=0;
                $diff1=0;
                
                $clockin2=date("Y-m-d h:i:s a", $ry1["clockin"]);
                $clockout2=date("Y-m-d h:i:s a", $enddate);
                $date1=date_create("$clockout2");
                $date2=date_create("$clockin2");
                $diff1=date_diff($date1,$date2);
                
                $total_hour_worked= $diff1->format("%H");
                $total_hour_worked2= $diff1->format("%I");
                
                $total_overtime=$ry1["total_overtime"];
                
                $total_hour_workedH=($total_hour_workedH+$total_hour_worked);
                $total_hour_workedH=($total_hour_workedH+$total_overtime);
                
                $total_hour_workedS=($total_hour_workedS+$total_hour_worked2);
                
            }
        } }
        
        $tpm=($_POST["rates"]/60);
        $total_amount2=round($total_hour_workedS*$tpm);
        
        $tsw=round($total_hour_workedS/60);
        $thw=($total_hour_workedH+$tsw);
        
        $total_amount=($thw*$_POST["rates"]);
        // $total_amount=($total_amount+$total_amount2);
        
        $sql = "insert into receipt_voucher (receipt_no,receipt_date,narration,ledger_id,type,ledger_type,received_from,ip,country,status,employeeid,invoice_no,date_from,date_to,ndis_item,hours,rate,dr_amt,cr_amt,identifier,paid,invoice_no2) 
        VALUES ('$idate','$idate','".$_POST["note"]."','".$_POST["ledger_id"]."','2','2','".$_POST["participant"]."','$ip','$mycountry','1','".$_POST["employeeid"]."','".$_POST["invoice_no"]."','$date_from','$date_to','".$_POST["ndis_item"]."','$thw','".$_POST["rates"]."','0','$total_amount','".$_POST["selection"]."','0','".$_POST["invoice_no2"]."')";
        if ($conn->query($sql) === TRUE) $tomtom=0;
        // echo"<script>alert('New Invoice is Generated Successfully.')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','NEW INVOICE','0','$sysdate','$ip','1','New Invoice Form is created.','".$_POST["ledgerid"]."','$idate')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
        
        echo"<form method='get' action='ledger_forms_addon.php' name='main' target='_self'>
    	    <input type=hidden name='lid' value='".$_POST["ledger_id"]."'><input type=hidden name='sid' value='".$_POST["invoice_no"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
        
    }
    
    // Edit Invoice
    if($_POST["processor"]=="editinvoice"){
        
        
        $date_from=strtotime($_POST["date_from"]);
        $date_to=strtotime($_POST["date_to"]);
        $receipt_date=strtotime($_POST["receipt_date"]);
        
        $n1 = "select * from ndis_line_numbers where id='".$_POST["ndis_item"]."' order by id asc limit 1";
        $nn1 = $conn_main->query($n1);
        if ($nn1->num_rows > 0) { while($nnn1 = $nn1->fetch_assoc()) {
            $n_itemnumber=$nnn1["item_number"];
            $n_description=$nnn1["item_name"];
            $n_rate=$nnn1["national"];
        } }
        
        $total_amount=($n_rate*$_POST["frequency"]);
        
        $sql = "insert into receipt_voucher (receipt_no,receipt_date,narration,ledger_id,type,ledger_type,received_from,ip,country,status,
        employeeid,invoice_no,date_from,date_to,ndis_item,hours,rate,dr_amt,cr_amt,identifier,invoice_no2,paid,randomid,proj_id,cc_code,claim_type) 
        VALUES ('".$_POST["receipt_no"]."','$receipt_date','Direct Service - DS - $n_description on $weekname at $receipt_date','800000032','2','2','".$_POST["participant"]."','$ip','-','1',
        '".$_POST["employeeid"]."','".$_POST["invoice_no2"]."','$date_from','$date_to','$n_itemnumber','".$_POST["frequency"]."','$n_rate','0','$total_amount',
        '".$_POST["selection"]."','".$_POST["invoice_no2"]."','1','".$_POST["invoiceid"]."','".$_POST["proj_id"]."','".$_POST["cc_code"]."','DS')";
        if ($conn->query($sql) === TRUE) $tomtom=0;

        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $nid=0;
        $sx1 = "select * from receipt_voucher order by id desc limit 1";
        $rx1 = $conn->query($sx1);
        if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) { $nid=$ry1["id"]; } }
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
        VALUES ('".$_COOKIE["userid"]."','0','0','INVOICE PAYMENT NOTE ADDON','0','$sysdate','$ip','1','Invoice Payment Note Added','0','$nid','receipt_voucher')";
        if ($conn->query($sql1) === TRUE) echo"<script>alert('Invoice Payment Note Added')</script>";

        echo"<form method='get' action='modules/ledger_forms_addon_edit.php' name='main' target='_self'>
            <input type=hidden name='pid' value='".$_POST["invoiceid"]."'><input type=hidden name='rid' value='".$_POST["participant"]."'>
            <input type=hidden name='lid' value='".$_POST["ledger_id"]."'><input type=hidden name='sid' value='".$_POST["invoice_no2"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    if($_POST["processor"]=="editinvoice1"){
        $idate=strtotime($_POST["idate"]);
        $sql="update receipt_voucher set receipt_date='$idate',invoice_no2='".$_POST["invoice_no2"]."',cc_code='".$_POST["cc_code"]."' where ledger_id='".$_POST["ledger_id"]."' and invoice_no='".$_POST["invoice_no"]."'";
        if ($conn->query($sql) === TRUE) $tomtom=0;
        echo"<form method='get' action='modules/ledger_forms_addon_edit.php' name='main' target='_self'>
    	    <input type=hidden name='lid' value='".$_POST["ledger_id"]."'><input type=hidden name='sid' value='".$_POST["invoice_no"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    // invoiceupdate
    if($_POST["processor"]=="invoicedateupdate"){
        $date_from=strtotime($_POST["date_from"]);
        $date_to=strtotime($_POST["date_to"]);
        $sql="update receipt_voucher set date_from='$date_from',date_to='$date_to' where invoice_no='".$_POST["invoice_no"]."' and ledger_id='".$_POST["ledger_id"]."' and paid='1'";
        if ($conn->query($sql) === TRUE){
            $tomtom=0;
            echo"<script>alert('Date Updated')</script>";
            echo"<form method='get' action='modules/ledger_forms_addon_edit.php' name='main' target='_self'>
                <input type='hidden' name='lid' value='".$_POST["ledger_id"]."'><input type='hidden' name='sid' value='".$_POST["invoice_no"]."'>
            </form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
    if($_POST["processor"]=="invoiceupdate"){
        
        if($_POST["pointer"]==1){
            $date_from=strtotime($_POST["date_from"]);
            $date_to=strtotime($_POST["date_to"]);
            $receipt_date=strtotime($_POST["receipt_date"]);
            $sql="update receipt_voucher set receipt_date='$receipt_date' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
        
        if($_POST["pointer"]==2){
            $narration = str_replace("'", "`", $_POST["note"]);
            $sql="update receipt_voucher set narration='$narration' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;    
        }
        
        if($_POST["pointer"]==3){
            $n_description=null;
            $n_itemnumber=0;
            $n_rate=0;
            $n1 = "select * from ndis_line_numbers where id='".$_POST["ndis_item"]."' order by id asc limit 1";
            $nn1 = $conn_main->query($n1);
            if ($nn1->num_rows > 0) { while($nnn1 = $nn1->fetch_assoc()) {
                $n_description=$nnn1["item_name"];
                $n_itemnumber=$nnn1["item_number"];
                $n_rate=$nnn1["national"];
            } }
            $cr_amt=($_POST["thour"]*$n_rate);
            $cr_amt=round($cr_amt);
            $sql="update receipt_voucher set ndis_item='$n_itemnumber',hours='".$_POST["thour"]."',rate='$n_rate',cr_amt='$cr_amt' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE){
                echo"<form method='get' action='modules/ledger_forms_addon_edit.php' name='main' target='_self'>
                    <input type=hidden name='pid' value='".$_POST["pid"]."'><input type=hidden name='rid' value='".$_POST["rid"]."'>
                    <input type=hidden name='lid' value='".$_POST["lid"]."'><input type=hidden name='sid' value='".$_POST["sid"]."'>
                </form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if($_POST["pointer"]==4){
            $cr_amt=round($_POST["ttotal"]);
            $sql="update receipt_voucher set hours='".$_POST["thour"]."',rate='".$_POST["trate"]."',cr_amt='$cr_amt' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
        
        if($_POST["pointer"]==5){
            $sql="update receipt_voucher set claim_type='".$_POST["claim_type"]."' where id='".$_POST["id"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
        
        
        // $sql="update receipt_voucher set receipt_date='$date_from',date_to='$date_to',narration='".$_POST["note"]."',ndis_item='".$_POST["ndis_item"]."',hours='".$_POST["thour"]."',rate='".$_POST["trate"]."',cr_amt='".$_POST["ttotal"]."' where id='".$_POST["id"]."'";
            
        
        
        
    }
    
    
    
    
    if($_GET["processor"]=="invoicegenerator"){
        $sql="update receipt_voucher set paid='1' where ledger_id='".$_GET["lid"]."' and invoice_no='".$_GET["sid"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Invoice Generate.')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','INVOICE GENERATED','0','$sysdate','$ip','1','New Invoice Form is created.','".$_GET["lid"]."','".$_GET["sid"]."')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
        echo"<form method='get' action='index.php' name='main' target='_top'>
    	    <input type=hidden name='selection' value='".$_GET["selection"]."'><input type=hidden name='smsbd' value='invoice-generator'>
    	    <input type=hidden name='processor' value='1'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    if($_GET["processor"]=="invoicepaymentgenerator"){
        
        $sql="update receipt_voucher set paid='10' where ledger_id='".$_GET["lid"]."' and invoice_no='".$_GET["sid"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Invoice Closed')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','INVOICE CLOSED','0','$sysdate','$ip','1','Invoice Form is Closed.','".$_GET["lid"]."','".$_GET["sid"]."')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
        
        // invoice-generator
        echo"<form method='get' action='index.php' name='main' target='_top'>
    	    <input type=hidden name='selection' value='INCOME'><input type=hidden name='smsbd' value='invoices'>
    	    <input type=hidden name='processor' value='1'><input type=hidden name='statusupdate' value='2'><input type=hidden name='poinz' value='2'>
    	    <input type=hidden name='lid' value='".$_GET["lid"]."'><input type=hidden name='cname' value='".$_GET["cname"]."'>
    	    <input type=hidden name='lid_date_from' value='".$_GET["dfrom"]."'><input type=hidden name='lid_date_to' value='".$_GET["dto"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
        
    }
    
    if($_GET["processor"]=="invoicepaymentreversegenerator"){
        
        $sql="update receipt_voucher set paid='1' where ledger_id='".$_GET["lid"]."' and invoice_no='".$_GET["sid"]."'";
        if ($conn->query($sql) === TRUE) echo"<script>alert('Invoice Closed')</script>";
        
        $sysdate=time();
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','INVOICE RE-OPENED','0','$sysdate','$ip','1','Invoice Form is Re-Opened.','".$_GET["lid"]."','".$_GET["sid"]."')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
        
        // invoice-generator
        echo"<form method='get' action='index.php' name='main' target='_top'>
    	    <input type=hidden name='selection' value='INCOME'><input type=hidden name='smsbd' value='invoices'>
    	    <input type=hidden name='processor' value='1'><input type=hidden name='statusupdate' value='3'><input type=hidden name='poinz' value='3'>
    	    <input type=hidden name='lid' value='".$_GET["lid"]."'><input type=hidden name='cname' value='".$_GET["cname"]."'>
    	    <input type=hidden name='lid_date_from' value='".$_GET["dfrom"]."'><input type=hidden name='lid_date_to' value='".$_GET["dto"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
        
    }
?>