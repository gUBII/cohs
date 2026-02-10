<?php
    // BANNER 2
    echo"<br><br><section class='banners mb-15' style='background-color:$bodybc;color:$bodytc'>
        <div class='container'>
            <div class='row'>";
                $bb=0;
                $b3 = "select * from sms_media where mtype='BANNER' and placement='5' and status='ON' order by sorder asc";
                $b33 = $conn->query($b3);
                if ($b33->num_rows > 0) { while($b333 = $b33->fetch_assoc()) { $bb=($bb+1); } }
                if($bb==0) $colwdt="12";
                if($bb==1) $colwdt="12";
                if($bb==2) $colwdt="6";
                if($bb==3) $colwdt="4";
                $s0 = "select * from sms_media where mtype='BANNER' and placement='3' and status='ON' order by sorder asc limit 3";
                $r0 = $conn->query($s0);
                if ($r0->num_rows > 0) { while($rs0 = $r0->fetch_assoc()) {
                    echo"<div class='col-6 col-md-$colwdt'><div class='banner-img wow fadeIn animated'>
                        <img src='".$rs0["image"]."' alt='".$rs0["name"]."' style='width:100%'>                        
                    </div></div>";
                } }
            echo"</div>
        </div>
    </section>";
?>