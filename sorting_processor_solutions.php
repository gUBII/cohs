<?php
include("include.php");

//$page_id = $_POST["page_id_array"];
for($i=0; $i<count($_POST["page_id_array"]); $i++){
    $query = "
    UPDATE solutions 
    SET orders = '".$i."' 
    WHERE id = '".$_POST["page_id_array"][$i]."'";
    mysqli_query($conn, $query);
}

// echo 'Order Updated'; 

?>