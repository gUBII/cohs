<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=file.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
	require_once '../../../include.php';
	$output = "";
	
	if($_GET["kroyee"]=="ActiveProducts"){
		// date_from, categoryid, vendorid
		$output .="
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>POST DATE</th>
					<th>PRODUCT NAME</th>
					<th>CATEGORY</th>
					<th>2ND CAT</th>
					<th>BRAND</th>
					<th>VENDER</th>					
					<th>SKU</th>
					<th>QTY</th>
					<th>PRICE</th>
					<th>OFFER</th>
					<th>OFFER-SD</th>
					<th>OFFER-ED</th>
					<th>DISCOUNT</th>
					<th>DISCOUNT TYPE</th>
					<th>VENDOR COMMISSION</th>
					<th>COMMISSION TYPE</th>
					<th>TAB</th>
					<th>WEIGHT/SIZE</th>
					<th>WS STATUS</th>
					<th>WS PRICE 1</th>
					<th>WS PRICE 2</th>
					<th>WS PRICE 3</th>
					<th>WS PRICE 4</th>
					<th>WS PRICE 5</th>
					<th>WS PRICE 6</th>
					<th>COLOR STATUS</th>
					<th>COLOR 1</th>
					<th>COLOR 2</th>	
					<th>COLOR 3</th>
					<th>COLOR 4</th>
					<th>COLOR 5</th>
					<th>WS NAME 1</th>
					<th>WS NAME 2</th>
					<th>WS NAME 3</th>
					<th>WS NAME 4</th>
					<th>WS NAME 5</th>
					<th>WS NAME 6</th>
					<th>ATTRIBUTE 1</th>
					<th>ATTRIBUTE 2</th>
					<th>ATTRIBUTE 3</th>
					<th>ATTRIBUTE 4</th>
					<th>ATTRIBUTE 5</th>
					<th>ATTRIBUTE 6</th>
					<th>TOTAL VIEWED</th>
					<th>REVIEWS</th>
					<th>TERMS</th>
					<th>RETURN POLICY</th>
					<th>AFFILIATE COMMISSION</th>
					<th>WEIGHT</th>
					<th>GROSS WEIGHT</th>
					<th>NET WEIGHT</th>	
					<th>CARTON SIZE</th>
					<th>PCS PER CARTON</th>
					<th>STATUS</th>
				</tr>
			<tbody>";
			$dform=0;
			$dfrom=strtotime($_GET["date_from"]);
			// $dto=strtotime($_GET["date_to"]);
			
			if($_GET["vendorid"]=="ALL" && $_GET["categoryid"]=="ALL"){									
				if($dfrom>=10000) $query = $conn->query("SELECT * FROM `sms_product_bon` where date='$dfrom' and status='".$_GET["status"]."'");
				else $query = $conn->query("SELECT * FROM `sms_product_bon` where status='".$_GET["status"]."'");
			}
			if($_GET["vendorid"]=="ALL" && $_GET["categoryid"]!="ALL"){
				if($dfrom>=10000) $query = $conn->query("SELECT * FROM `sms_product_bon` where cid='".$_GET["categoryid"]."' and date='$dfrom' and status='2' or cid2='".$_GET["categoryid"]."' and date='$dfrom' and status='".$_GET["status"]."'");
				else $query = $conn->query("SELECT * FROM `sms_product_bon` where cid='".$_GET["categoryid"]."' and status='2' or cid2='".$_GET["categoryid"]."' and status='".$_GET["status"]."'");
			}
			if($_GET["vendorid"]!="ALL" && $_GET["categoryid"]=="ALL"){
				if($dfrom>=10000) $query = $conn->query("SELECT * FROM `sms_product_bon` where vid='".$_GET["vendorid"]."' and date='$dfrom' and status='".$_GET["status"]."'");
				else $query = $conn->query("SELECT * FROM `sms_product_bon` where vid='".$_GET["vendorid"]."' and status='".$_GET["status"]."'");
			}
			if($_GET["vendorid"]!="ALL" && $_GET["categoryid"]!="ALL"){
				if($dfrom>=10000) $query = $conn->query("SELECT * FROM `sms_product_bon` where vid='".$_GET["vendorid"]."' and cid='".$_GET["categoryid"]."' and date='$dfrom' and status='2' or vid='".$_GET["vendorid"]."' and cid2='".$_GET["categoryid"]."' and date='$dfrom' and status='".$_GET["status"]."'");
				else $query = $conn->query("SELECT * FROM `sms_product_bon` where vid='".$_GET["vendorid"]."' and cid='".$_GET["categoryid"]."' and status='2' or vid='".$_GET["vendorid"]."' and cid2='".$_GET["categoryid"]."' and status='".$_GET["status"]."'");
			}
			
			while($fetch = $query->fetch_array()){
				$date=date("d-m-Y", $fetch['date']);
				$osd=date("d-m-Y", $fetch['offer_sd']);
				$oed=date("d-m-Y", $fetch['offer_ed']);
				$output .= "<tr>
					<td>".$fetch['id']."</td>
					<td>$date</td>
					<td>".$fetch['pname']."</td>
					<td>".$fetch['cid']."</td>
					<td>".$fetch['cid2']."</td>
					<td>".$fetch['bid']."</td>
					<td>".$fetch['vid']."</td>					
					<td>".$fetch['sku']."</td>
					<td>".$fetch['qty']."</td>
					<td>".$fetch['price']."</td>
					<td>".$fetch['offer']."</td>
					<td>$osd</td>
					<td>$oed</td>
					<td>".$fetch['discount']."</td>
					<td>".$fetch['discount_type']."</td>
					<td>".$fetch['v_comm']."</td>
					<td>".$fetch['comm_type']."</td>
					<td>".$fetch['tag']."</td>
					<td>".$fetch['ws']."</td>
					<td>".$fetch['ws_status']."</td>
					<td>".$fetch['ws11']." - ".$fetch['ws1']."</td>
					<td>".$fetch['ws22']." - ".$fetch['ws2']."</td>
					<td>".$fetch['ws33']." - ".$fetch['ws3']."</td>
					<td>".$fetch['ws44']." - ".$fetch['ws4']."</td>
					<td>".$fetch['ws55']." - ".$fetch['ws5']."</td>
					<td>".$fetch['ws66']." - ".$fetch['ws6']."</td>
					<td>Color - ".$fetch['c_status']."</td>
					<td>".$fetch['c1']."</td>
					<td>".$fetch['c2']."</td>
					<td>".$fetch['c3']."</td>
					<td>".$fetch['c4']."</td>
					<td>".$fetch['c5']."</td>
					<td>".$fetch['attribute_1']."</td>
					<td>".$fetch['attribute_2']."</td>
					<td>".$fetch['attribute_3']."</td>
					<td>".$fetch['attribute_4']."</td>
					<td>".$fetch['attribute_5']."</td>
					<td>".$fetch['attribute_6']."</td>
					<td>".$fetch['views']."</td>
					<td>".$fetch['review']."</td>
					<td>".$fetch['terms']."</td>
					<td>".$fetch['returnpolicy']."</td>
					<td>".$fetch['affiliate_commission']."</td>
					<td>".$fetch['weight']."</td>
					<td>".$fetch['gross_weight']."</td>
					<td>".$fetch['net_weight']."</td>
					<td>".$fetch['carton_size']."</td>
					<td>".$fetch['pcs_per_carton']."</td>
					<td>".$fetch['status']."</td>
				</tr>";
			}
		$output .="</tbody></table>";
	}
	
	echo $output;
?>
