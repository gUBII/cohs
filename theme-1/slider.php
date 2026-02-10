<?php
    echo"<div style='padding-top:0px;padding-bottom:0px;background-color:#cccccc'><section class='home-slider position-relative pt-0' style='background-color:$bodybc'>
        <div class='hero-slider-1 dot-style-1 '>";
            $s30 = "select * from sms_media where mtype='SLIDER' and pid='FRONT SLIDER' and status='ON' order by sorder asc";
            $r30 = $conn->query($s30);
            if ($r30->num_rows > 0) { while($rs30 = $r30->fetch_assoc()) {
                echo"<div class='single-hero-slider single-animation-wrap' style='padding:0px'>
                    <img class='animated slider-1-1' src='media/".$rs30["image"]."' alt='".$rs30["name"]."' style='width:100%;height:100%'>                        
                </div>";
            } }
        echo"</div>
        <div class='slider-arrow hero-slider-1-arrow'></div>
    </section></div>";
?>
