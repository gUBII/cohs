<?php
	echo"<body style='background-color:black'>";
		include('include.php');
		if(!isset($_COOKIE["guestid"])){
			$guestidx=rand(1000000000000000000,9000000000000000000);
			setcookie("guestid", $guestidx, time()+9999999);		
		}else $guestidx=$_COOKIE["guestid"];

		$cdate=time();		
		if(isset($_COOKIE["track"])) $userid=$_COOKIE["track"]; else $userid=$guestidx;

		if(isset($_POST["pid"])){
			if(isset($_POST["price"])) $price=$_POST["price"]; else $price= 0;
			if(isset($_POST["colors"])) $colors=$_POST["colors"]; else	$colors= "";
			if(isset($_POST["pid"])) $pid=$_POST["pid"]; else $pid= 0;
			if(isset($_POST["qty"])) $qty=$_POST["qty"]; else $qty=0;
			if(isset($_POST["pname"])) $pname=$_POST["pname"]; else $pname=0;
			if(isset($_POST["catid1"])) $catid1=$_POST["catid1"]; else $catid1=0;
			if(isset($_POST["catid2"])) $catid2=$_POST["catid2"]; else $catid2=0;
			if(isset($_POST["vid"])) $vid=$_POST["vid"]; else $vid=0;
			if(isset($_POST["bid"])) $bid=$_POST["bid"]; else $bid=0;
			if(isset($_POST["cimage"])) $cimage=$_POST["cimage"]; else $cimage=0;
			if(isset($_POST["weightbox"])) $weightbox=$_POST["weightbox"]; else $weightbox=0;
			if(isset($_POST["attribute_1"])) $attribute_1=$_POST["attribute_1"]; else $attribute_1=0;
			if(isset($_POST["attribute_2"])) $attribute_2=$_POST["attribute_2"]; else $attribute_2=0;
			if(isset($_POST["attribute_3"])) $attribute_3=$_POST["attribute_3"]; else $attribute_3=0;
			if(isset($_POST["attribute_4"])) $attribute_4=$_POST["attribute_4"]; else $attribute_4=0;
			if(isset($_POST["attribute_5"])) $attribute_5=$_POST["attribute_5"]; else $attribute_5=0;
			if(isset($_POST["attribute_6"])) $attribute_6=$_POST["attribute_6"]; else $attribute_6=0;

			if(isset($_POST["discount"])) $discount=$_POST["discount"]; else $discount=0;
			if(isset($_POST["discount_type"])) $discount_type=$_POST["discount_type"]; else $discount_type=0;
			if(isset($_POST["offer"])) $offer=$_POST["offer"]; else $offer=0;
			if(isset($_POST["affiliate_commission"])) $affiliate_commission=$_POST["affiliate_commission"]; else $affiliate_commission=0;
			
			// echo"<script>alert('$guestidx & $track')</script>";
    	    
			$pfound=0;
    	    $oldprice=0;
    		$C110 = "select * from sms_cart where cid='$userid' and pid='".$_POST["pid"]."' and status='0' order by id asc";
			$d110 = $conn->query($C110);
            if ($d110->num_rows > 0) { while($cd110 = $d110->fetch_assoc()) { 
    			$pfound=$cd110["id"];
    			$newqty=($cd110["qty"]+$qty);
    			$oldprice=$cd110["price"];
    		} }
			$pricex=strripos("$price","-");
			$pricey=substr("$price",0,$pricex);
			$pricex=($pricex+1);
			$weight=substr("$price",$pricex);

			// echo"<script>alert('$pid and $pricey and $weight and $colors and $qty and ".$_POST["attribute_1"]." and ".$_POST["attribute_2"]." and ".$_POST["attribute_3"]."')</script>";

			if($pfound!=0){
				$sql = "update sms_cart set price='$pricey',qty='$newqty',colors='$colors',weight='$weight',attribute_1='$attribute_1',attribute_2='$attribute_2',attribute_3='$attribute_3',attribute_4='$attribute_4',attribute_5='$attribute_5',attribute_6='$attribute_6' where id='$pid'";
                if ($conn->query($sql) === TRUE) $tomtom=0;
                else echo"Error updating record: ". $conn->error;
    		}else{				
				$oid=rand(1000000000,9999999999);
				$sql = "insert into sms_cart(cid,guestid,pid,qty,price,status,pname,cat1,cat2,pimz,date,offer,payment,oid,vid,bid,
				confirm,discount,discount_type,attribute_1,attribute_2,attribute_3,attribute_4,attribute_5,attribute_6,aff_comm,note,
				shipping_address_id,shipping_vendor,shipping_charge,qc_vendor,qc_charge) values('$userid','$userid','$pid','$qty',
				'$pricey','0','$pname','$catid1','$catid2','$cimage','$cdate','$offer','0','$oid','$vid','$bid','0','$discount',
				'$discount_type','$attribute_1','$attribute_2','$attribute_3','$attribute_4','$attribute_5','$attribute_6',
				'$affiliate_commission','0','0','0','0','0','0')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
    		}
    	}
		
		if(isset($_GET["favouriteid"])){
			$pfound=0;
    	    $oldprice=0;
    		$C110 = "select * from sms_favourite where cid='$userid' and pid='".$_GET["favouriteid"]."' order by id asc limit 1";
			$d110 = $conn->query($C110);
            if ($d110->num_rows > 0) { while($cd110 = $d110->fetch_assoc()) { $pfound=$cd110["id"]; } }
			if($pfound==0){
				$sql = "insert into sms_favourite(cid,pid,status,date) values('$userid','".$_GET["favouriteid"]."','1','$cdate')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
			}
		}

		if(isset($_GET["compareid"])){
			$pfound=0;
    	    $oldprice=0;
    		$C110 = "select * from sms_compare where cid='$userid' and pid='".$_GET["compareid"]."' order by id asc limit 1";
			$d110 = $conn->query($C110);
            if ($d110->num_rows > 0) { while($cd110 = $d110->fetch_assoc()) { $pfound=$cd110["id"]; } }
			if($pfound==0){
				$sql = "insert into sms_compare(cid,pid,status,date) values('$userid','".$_GET["compareid"]."','1','$cdate')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
			}
		}

	echo"</body>";
?>