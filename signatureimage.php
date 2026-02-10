<?php
    
    include 'include.php';

    echo"<body style='background-color:#ffffff;color:#000000'>";
        if(isset($_GET["signatureimage"])){
            $a0 = "select * from project where id='".$_GET["pid"]."' order by id asc limit 1";
            $b0 = $conn->query($a0);
            if ($b0->num_rows > 0) { while($c0 = $b0->fetch_assoc()) {
                if($_GET["signatureimage"]==1) echo"<img src='".$c0["signature1"]."' style='width:100%'>";
                if($_GET["signatureimage"]==2) echo"<img src='".$c0["signature2"]."' style='width:100%'>";
                if($_GET["signatureimage"]==3) echo"<img src='".$c0["signature3"]."' style='width:100%'>";
                if($_GET["signatureimage"]==4) echo"<img src='".$c0["image1"]."' style='width:100%'>";
                if($_GET["signatureimage"]==5) echo"<img src='".$c0["image2"]."' style='width:100%'>";
                if($_GET["signatureimage"]==6) echo"<img src='".$c0["image3"]."' style='width:100%'>";
            } }
        }
    echo"</body>";
    
?>