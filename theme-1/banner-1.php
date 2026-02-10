<?php
    $s0 = "select * from sms_media where mtype='BANNER' and pid='BANNER' and placement='1' and status='ON' order by sorder asc limit 1";
    $r0 = $conn->query($s0);
    if ($r0->num_rows > 0) { while($rs0 = $r0->fetch_assoc()) {
        if(strlen($rs0["image"])>=10){
            echo"<div id='closeDIV'><center>
                <a href='#'><img src='media/".$rs0["image"]."' alt='".$rs0["name"]."' style='width:100%;max-height:200px;'></a>
                <a href='#' style='position:absolute;margin-left:-20px;color:white;border:0' title='Close' onclick='CloseFunction()'><strong>X<strong></a>
            </center></div>";
        }
    } }
?>
