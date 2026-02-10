<?php 
include_once("include.php");
if(isset($_GET["order"])) {
	$order  = explode(",",$_GET["order"]);
	for($i=0; $i < count($order);$i++) {
		$sql = "UPDATE reorder SET display_order='" . $i . "' WHERE id=". $order[$i];		
		mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));	
	}
}

?>