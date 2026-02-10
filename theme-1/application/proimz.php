<?php
    $randid=rand(100,999);
    echo"$randid";
    
    include("../include.php");
    $s1 = "select * from sms_user2 where id='".$_COOKIE["uid"]."' and status='1' order by id asc limit 1";
    $r1 = $conn->query($s1);
    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
        echo"<img class='img-lg mb-3 img-avatar' src=' value='".$rs1[""]."' alt='User Photo'>";
    } }
?>