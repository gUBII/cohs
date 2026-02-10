<?php
	$printid=$_GET["printid"];
	$pointer=$_GET["pointer"];	

    error_reporting(0); 
    date_default_timezone_set("Australia/Melbourne");
    
	include("include.php");

    if(isset($_COOKIE["userid"])) $userid=$_COOKIE['userid'];
	if(isset($_COOKIE["track"])) $track=$_COOKIE['track'];
    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;
    
    if(isset($userid)){
		if($pointer=="EXCEL"){
			header("Content-Type: application/xls");    
			header("Content-Disposition: attachment; filename=$printid.xls");  
			header("Pragma: no-cache"); 
			header("Expires: 0");			
			$output = "";
			if($_GET["printid"]=="ledger_class"){
				$output .="
				<table>
					<thead><tr><th>CLASS ID</th><th>CLASS NAME</th><th>DEBIT</th><th>CREDIT</th><th>STATUS</th></tr>
					<tbody>";

					$query = $conn->query("SELECT * FROM `$printid` order by class_name asc limit $sortset");	    
					while($fetch = $query->fetch_array()){
						$output .= "<tr>
							<td>".$fetch['id']."</td>	
							<td>".$fetch['class_name']."</td>	
							<td>".$fetch['debit']."</td>	
							<td>".$fetch['credit']."</td>	
							<td>".$fetch['status']."</td>
						</tr>";
					}
				$output .="</tbody></table>";
				echo $output;
			}
			if($_GET["printid"]=="ledger_group"){
				$output .="
				<table>
					<thead><tr><th>CLASS ID</th><th>CLASS NAME</th><th>DEBIT</th><th>CREDIT</th><th>STATUS</th></tr>
					<tbody>";

					$query = $conn->query("SELECT * FROM `$printid` order by group_name asc limit $sortset");
					while($fetch = $query->fetch_array()){
						$class_name="";
						$query1 = $conn->query("SELECT * FROM `ledger_class` where id='".$fetch['group_class']."' order by id asc limit 1");
						while($fetch1 = $query1->fetch_array()){ $class_name=$fetch1["class_name"]; }
						$output .= "<tr>
							<td>".$fetch['id']."</td>
							<td>$class_name</td>	
							<td>".$fetch['group_name']."</td>	
							<td>".$fetch['debit']."</td>	
							<td>".$fetch['credit']."</td>	
							<td>".$fetch['status']."</td>
						</tr>";
					}
				$output .="</tbody></table>";
				echo $output;
			}
			if($_GET["printid"]=="accounts_ledger"){
				$output .="
				<table>
					<thead><tr><th>ID</th><th>GROUP NAME</th><th>ACCOUNT NAME</th><th>OPENING BALANCE</th><th>BALANCE TYPE</th><th>BALANCE DATE</th><th>DEBIT</th><th>CREDIT</th><th>STATUS</th></tr>
					<tbody>";

					$query = $conn->query("SELECT * FROM `$printid` order by ledger_name asc limit $sortset");
					while($fetch = $query->fetch_array()){
						$bdate=date("d-m-Y",$fetch['opening_balance_on']);
						$group_name="";
						$query1 = $conn->query("SELECT * FROM `ledger_group` where id='".$fetch['ledger_group_id']."' order by id asc limit 1");
						while($fetch1 = $query1->fetch_array()){ $group_name=$fetch1["group_name"]; }
						$output .= "<tr>
							<td>".$fetch['id']."</td>
							<td>$group_name</td>	
							<td>".$fetch['ledger_name']."</td>	
							<td>".$fetch['opening_balance']."</td>
							<td>".$fetch['balance_type']."</td>
							<td>$bdate</td>
							<td>".$fetch['debit']."</td>	
							<td>".$fetch['credit']."</td>	
							<td>".$fetch['status']."</td>
						</tr>";
					}
				$output .="</tbody></table>";
				echo $output;
			}
			if($_GET["printid"]=="sub_ledger"){
				$output .="
				<table>
					<thead><tr><th>ID</th><th>ACCOUNT NAME</th><th>SUB A/C NAME</th><th>OPENING BALANCE</th><th>DEBIT</th><th>CREDIT</th><th>STATUS</th></tr>
					<tbody>";

					$query = $conn->query("SELECT * FROM `$printid` order by sub_ledger asc limit $sortset");
					while($fetch = $query->fetch_array()){
						$accounts_name="";
						$query1 = $conn->query("SELECT * FROM `accounts_ledger` where id='".$fetch['ledger_id']."' order by id asc limit 1");
						while($fetch1 = $query1->fetch_array()){ $accounts_name=$fetch1["ledger_name"]; }
						$output .= "<tr>
							<td>".$fetch['id']."</td>
							<td>$accounts_name</td>	
							<td>".$fetch['sub_ledger']."</td>	
							<td>".$fetch['opening_balance']."</td>
							<td>".$fetch['debit']."</td>	
							<td>".$fetch['credit']."</td>	
							<td>".$fetch['status']."</td>
						</tr>";
					}
				$output .="</tbody></table>";
				echo $output;
			}

			if($_GET["printid"]=="receipt_voucher"){
				$output .="
				<table>
					<thead><tr><th>ID</th><th>RECEIPT NO.</th><th>DATE</th><th>INCOME NOTE</th><th>RECEIVED FROM</th><th>LEDGER ID</th><th>AMOUNT</th><th>STATUS</th></tr>
					<tbody>";

					$query = $conn->query("select * from receipt_voucher order by id asc limit $sortset");
					while($fetch = $query->fetch_array()){

						$accounts_name="";
						$query1 = $conn->query("SELECT * FROM `accounts_ledger` where id='".$fetch['ledger_id']."' order by id asc limit 1");
						while($fetch1 = $query1->fetch_array()){ $accounts_name=$fetch1["ledger_name"]; }
						
						$ledgername="0";
						$s1b = "select * from sub_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
						$r1b = $conn->query($s1b);
						if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
						if($ledgername=="0"){
							$s1bc = "select * from accounts_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
							$r1bc = $conn->query($s1bc);
							if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
						}
						$receivedfromname="";
						$s1c = "select * from uerp_user where id='".$fetch["employeeid"]."' order by id desc limit 1";
						$r1c = $conn->query($s1c);
						if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $receivedfromname="".$rs1c["username"]." ".$rs1c["username2"].""; } }

						$rdate=date("d-m-Y",$fetch["receipt_date"]);

						$output .= "<tr>
							<td>".$fetch['id']."</td>
							<td>".$fetch['receipt_no']."</td>	
							<td>$rdate</td>	
							<td>".$fetch["invoice_no2"]." - ".$fetch["invoice_no"]." - ".$fetch["narration"]."</td>
							<td>$receivedfromname</td>	
							<td>$ledgername</td>	
							<td>".$fetch['cr_amt']."</td>
							<td>".$fetch['status']."</td>
						</tr>";
					}
				$output .="</tbody></table>";
				echo $output;
			}

			if($_GET["printid"]=="payment_voucher"){
				$output .="
				<table>
					<thead><tr><th>ID</th><th>PAYMENT NO.</th><th>DATE</th><th>PAYMENT NOTE</th><th>PAID TO</th><th>LEDGER ID</th><th>AMOUNT</th><th>STATUS</th></tr>
					<tbody>";

					$query = $conn->query("select * from payment_voucher order by id asc limit $sortset");
					while($fetch = $query->fetch_array()){

						$accounts_name="";
						$query1 = $conn->query("SELECT * FROM `accounts_ledger` where id='".$fetch['ledger_id']."' order by id asc limit 1");
						while($fetch1 = $query1->fetch_array()){ $accounts_name=$fetch1["ledger_name"]; }
						
						$ledgername="0";
						$s1b = "select * from sub_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
						$r1b = $conn->query($s1b);
						if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
						if($ledgername=="0"){
							$s1bc = "select * from accounts_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
							$r1bc = $conn->query($s1bc);
							if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
						}
						$paymenttoname="";
						$s1c = "select * from uerp_user where id='".$fetch["employeeid"]."' order by id desc limit 1";
						$r1c = $conn->query($s1c);
						if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $paymenttoname="".$rs1c["username"]." ".$rs1c["username2"].""; } }

						$rdate=date("d-m-Y",$fetch["payment_date"]);

						$output .= "<tr>
							<td>".$fetch['id']."</td>
							<td>".$fetch['payment_no']."</td>	
							<td>$rdate</td>	
							<td>".$fetch["invoice_no2"]." - ".$fetch["invoice_no"]." - ".$fetch["narration"]."</td>
							<td>$paymenttoname</td>	
							<td>$ledgername</td>	
							<td>".$fetch['dr_amt']."</td>
							<td>".$fetch['status']."</td>
						</tr>";
					}
				$output .="</tbody></table>";
				echo $output;
			}

			if($_GET["printid"]=="receipt_payment"){
				$output .="
				<table>
					<thead><tr><th>ID</th><th>VOUCHER NO.</th><th>DATE</th><th>NOTE</th><th>FROM/TO ACCOUNT</th><th>LEDGER ID</th><th>RECEIVED</th><th>PAID</th><th>STATUS</th></tr>
					<tbody>";
					$totalpaid=0;
            		$totalreceived=0;
					$query = $conn->query("select * from payment_voucher order by id asc limit $sortset");
					while($fetch = $query->fetch_array()){

						$accounts_name="";
						$query1 = $conn->query("SELECT * FROM `accounts_ledger` where id='".$fetch['ledger_id']."' order by id asc limit 1");
						while($fetch1 = $query1->fetch_array()){ $accounts_name=$fetch1["ledger_name"]; }
						
						$ledgername="0";
						$s1b = "select * from sub_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
						$r1b = $conn->query($s1b);
						if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
						if($ledgername=="0"){
							$s1bc = "select * from accounts_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
							$r1bc = $conn->query($s1bc);
							if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
						}
						$paymenttoname="";
						$s1c = "select * from uerp_user where id='".$fetch["employeeid"]."' order by id desc limit 1";
						$r1c = $conn->query($s1c);
						if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $paymenttoname="".$rs1c["username"]." ".$rs1c["username2"].""; } }

						$rdate=date("d-m-Y",$fetch["payment_date"]);

						$output .= "<tr>
							<td>".$fetch['id']."</td>
							<td>".$fetch['payment_no']."</td>	
							<td>$rdate</td>	
							<td>".$fetch["invoice_no2"]." - ".$fetch["invoice_no"]." - ".$fetch["narration"]."</td>
							<td>$paymenttoname</td>	
							<td>$ledgername</td>	
							<td>0.00</td>
							<td>".$fetch['dr_amt']."</td>
							<td>".$fetch['status']."</td>
						</tr>";
					}
					$query = $conn->query("select * from receipt_voucher order by id asc limit $sortset");
					while($fetch = $query->fetch_array()){

						$accounts_name="";
						$query1 = $conn->query("SELECT * FROM `accounts_ledger` where id='".$fetch['ledger_id']."' order by id asc limit 1");
						while($fetch1 = $query1->fetch_array()){ $accounts_name=$fetch1["ledger_name"]; }
						
						$ledgername="0";
						$s1b = "select * from sub_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
						$r1b = $conn->query($s1b);
						if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
						if($ledgername=="0"){
							$s1bc = "select * from accounts_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
							$r1bc = $conn->query($s1bc);
							if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
						}
						$receivedfromname="";
						$s1c = "select * from uerp_user where id='".$fetch["employeeid"]."' order by id desc limit 1";
						$r1c = $conn->query($s1c);
						if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $receivedfromname="".$rs1c["username"]." ".$rs1c["username2"].""; } }

						$rdate=date("d-m-Y",$fetch["receipt_date"]);

						$output .= "<tr>
							<td>".$fetch['id']."</td>
							<td>".$fetch['receipt_no']."</td>	
							<td>$rdate</td>	
							<td>".$fetch["invoice_no2"]." - ".$fetch["invoice_no"]." - ".$fetch["narration"]."</td>
							<td>$receivedfromname</td>	
							<td>$ledgername</td>	
							<td>".$fetch['cr_amt']."</td>
							<td>0.00</td>
							<td>".$fetch['status']."</td>
						</tr>";
					}
				$output .="</tbody></table>";
				echo $output;
			}



		}else{
			header("Content-Type: application/csv");    
			header("Content-Disposition: attachment; filename=$printid.csv");  
			header("Pragma: no-cache"); 
			header("Expires: 0");			
			$output = "";
			
			if($_GET["printid"]=="ledger_class"){
				$output .="'CLASS ID','CLASS NAME','DEBIT','CREDIT','STATUS'\n";
				$query = $conn->query("SELECT * FROM `$printid` order by class_name asc limit $sortset");	    
				while($fetch = $query->fetch_array()){
					$output .= "'".$fetch['id']."','".$fetch['class_name']."','".$fetch['debit']."','".$fetch['credit']."','".$fetch['status']."'\n";
				}				
				echo $output;
			}
			if($_GET["printid"]=="ledger_group"){
				$output .="'ID','CLASS NAME','GROUP NAME','DEBIT','CREDIT','STATUS'\n";
				$query = $conn->query("SELECT * FROM `$printid` order by group_name asc limit $sortset");
				while($fetch = $query->fetch_array()){
					$class_name="";
					$query1 = $conn->query("SELECT * FROM `ledger_class` where id='".$fetch['group_class']."' order by id asc limit 1");
					while($fetch1 = $query1->fetch_array()){ $class_name=$fetch1["class_name"]; }
					$output .= "'".$fetch['id']."','$class_name','".$fetch['group_name']."','".$fetch['debit']."','".$fetch['credit']."','".$fetch['status']."'\n";
				}
				echo $output;
			}
			if($_GET["printid"]=="accounts_ledger"){
				$output .="'ID','GROUP NAME','ACCOUNT NAME','OPENING BALANCE','BALANCE TYPE','BALANCE DATE','DEBIT','CREDIT','STATUS'\n";
				$query = $conn->query("SELECT * FROM `$printid` order by ledger_name asc limit $sortset");
				while($fetch = $query->fetch_array()){
					$bdate=date("d-m-Y",$fetch['opening_balance_on']);
					$group_name="";
					$query1 = $conn->query("SELECT * FROM `ledger_group` where id='".$fetch['ledger_group_id']."' order by id asc limit 1");
					while($fetch1 = $query1->fetch_array()){ $group_name=$fetch1["group_name"]; }
					$output .= "'".$fetch['id']."','$group_name','".$fetch['ledger_name']."','".$fetch['opening_balance']."','".$fetch['balance_type']."','$bdate','".$fetch['debit']."','".$fetch['credit']."','".$fetch['status']."'\n";
				}
				echo $output;
			}
			if($_GET["printid"]=="sub_ledger"){
				$output .="'ID','ACCOUNT NAME','SUB A/C NAME','OPENING BALANCE','DEBIT','CREDIT','STATUS'\n";
				$query = $conn->query("SELECT * FROM `$printid` order by sub_ledger asc limit $sortset");
				while($fetch = $query->fetch_array()){
					$accounts_name="";
					$query1 = $conn->query("SELECT * FROM `accounts_ledger` where id='".$fetch['ledger_id']."' order by id asc limit 1");
					while($fetch1 = $query1->fetch_array()){ $accounts_name=$fetch1["ledger_name"]; }
					$output .= "'".$fetch['id']."','$accounts_name','".$fetch['sub_ledger']."','".$fetch['opening_balance']."','".$fetch['debit']."','".$fetch['credit']."','".$fetch['status']."'\n";
				}
				echo $output;
			}
			if($_GET["printid"]=="receipt_voucher"){

				$output .="'ID','RECEIPT NO.','DATE','INCOME NOTE','RECEIVED FROM','LEDGER ID','AMOUNT','STATUS'\n";
				$query = $conn->query("select * from receipt_voucher order by id asc limit $sortset");
				while($fetch = $query->fetch_array()){
					$accounts_name="";
					$query1 = $conn->query("SELECT * FROM `accounts_ledger` where id='".$fetch['ledger_id']."' order by id asc limit 1");
					while($fetch1 = $query1->fetch_array()){ $accounts_name=$fetch1["ledger_name"]; }
					
					$ledgername="0";
					$s1b = "select * from sub_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
					$r1b = $conn->query($s1b);
					if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
					if($ledgername=="0"){
						$s1bc = "select * from accounts_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
						$r1bc = $conn->query($s1bc);
						if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
					}
					$receivedfromname="";
					$s1c = "select * from uerp_user where id='".$fetch["employeeid"]."' order by id desc limit 1";
					$r1c = $conn->query($s1c);
					if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $receivedfromname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
									
					$rdate=date("d-m-Y",$fetch["receipt_date"]);

					$output .= "'".$fetch['id']."','".$fetch['receipt_no']."','$rdate','".$fetch["invoice_no2"]." - ".$fetch["invoice_no"]." - ".$fetch["narration"]."','$receivedfromname','$ledgername','".$fetch['cr_amt']."','".$fetch['status']."'\n";
				}
				echo $output;
			}
			if($_GET["printid"]=="payment_voucher"){

				$output .="'ID','PAYMENT NO.','DATE','PAYMENT NOTE','PAID TO','LEDGER ID','AMOUNT','STATUS'\n";
				$query = $conn->query("select * from payment_voucher order by id asc limit $sortset");
				while($fetch = $query->fetch_array()){
					$accounts_name="";
					$query1 = $conn->query("SELECT * FROM `accounts_ledger` where id='".$fetch['ledger_id']."' order by id asc limit 1");
					while($fetch1 = $query1->fetch_array()){ $accounts_name=$fetch1["ledger_name"]; }
					
					$ledgername="0";
					$s1b = "select * from sub_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
					$r1b = $conn->query($s1b);
					if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
					if($ledgername=="0"){
						$s1bc = "select * from accounts_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
						$r1bc = $conn->query($s1bc);
						if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
					}
					$paymenttoname="";
					$s1c = "select * from uerp_user where id='".$fetch["employeeid"]."' order by id desc limit 1";
					$r1c = $conn->query($s1c);
					if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $paymenttoname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
									
					$rdate=date("d-m-Y",$fetch["payment_date"]);

					$output .= "'".$fetch['id']."','".$fetch['payment_no']."','$rdate','".$fetch["invoice_no2"]." - ".$fetch["invoice_no"]." - ".$fetch["narration"]."','$paymenttoname','$ledgername','".$fetch['dr_amt']."','".$fetch['status']."'\n";
				}
				echo $output;
			}

			if($_GET["printid"]=="receipt_payment"){
				
				$output .="'ID','VOUCHER NO.','DATE','NOTE','FROM/TO ACCOUNT','LEDGER ID','RECEIVED','PAID','STATUS'\n";
				$query = $conn->query("select * from payment_voucher order by id asc limit $sortset");
				while($fetch = $query->fetch_array()){
					$accounts_name="";
					$query1 = $conn->query("SELECT * FROM `accounts_ledger` where id='".$fetch['ledger_id']."' order by id asc limit 1");
					while($fetch1 = $query1->fetch_array()){ $accounts_name=$fetch1["ledger_name"]; }
					
					$ledgername="0";
					$s1b = "select * from sub_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
					$r1b = $conn->query($s1b);
					if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
					if($ledgername=="0"){
						$s1bc = "select * from accounts_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
						$r1bc = $conn->query($s1bc);
						if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
					}
					$paymenttoname="";
					$s1c = "select * from uerp_user where id='".$fetch["employeeid"]."' order by id desc limit 1";
					$r1c = $conn->query($s1c);
					if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $paymenttoname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
									
					$rdate=date("d-m-Y",$fetch["payment_date"]);

					$output .= "'".$fetch['id']."','".$fetch['payment_no']."','$rdate','".$fetch["invoice_no2"]." - ".$fetch["invoice_no"]." - ".$fetch["narration"]."','$paymenttoname','$ledgername','0.00','".$fetch['dr_amt']."','".$fetch['status']."'\n";
				}
				$query = $conn->query("select * from receipt_voucher order by id asc limit $sortset");
				while($fetch = $query->fetch_array()){
					$accounts_name="";
					$query1 = $conn->query("SELECT * FROM `accounts_ledger` where id='".$fetch['ledger_id']."' order by id asc limit 1");
					while($fetch1 = $query1->fetch_array()){ $accounts_name=$fetch1["ledger_name"]; }
					
					$ledgername="0";
					$s1b = "select * from sub_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
					$r1b = $conn->query($s1b);
					if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $ledgername=$rs1b["sub_ledger"]; } }
					if($ledgername=="0"){
						$s1bc = "select * from accounts_ledger where id='".$fetch["ledger_id"]."' order by id desc limit 1";
						$r1bc = $conn->query($s1bc);
						if ($r1bc->num_rows > 0) { while($rs1bc = $r1bc->fetch_assoc()) { $ledgername=$rs1bc["ledger_name"]; } }
					}
					$receivedfromname="";
					$s1c = "select * from uerp_user where id='".$fetch["employeeid"]."' order by id desc limit 1";
					$r1c = $conn->query($s1c);
					if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $receivedfromname="".$rs1c["username"]." ".$rs1c["username2"].""; } }
									
					$rdate=date("d-m-Y",$fetch["receipt_date"]);

					$output .= "'".$fetch['id']."','".$fetch['receipt_no']."','$rdate','".$fetch["invoice_no2"]." - ".$fetch["invoice_no"]." - ".$fetch["narration"]."','$receivedfromname','$ledgername','".$fetch['cr_amt']."','0.00','".$fetch['status']."'\n";
				}
				echo $output;
			}
		}
	}
?>
