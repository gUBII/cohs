<?php
    echo"<section class='popular-categories section-padding mt-5 mb-25'>
        <div class='container wow fadeIn animated'>
            <h3 class='section-title mb-20' style='color:$bodytc'><span style='color:$buttonbc'>Popular</span> Categories</h3>
            <div class='carausel-6-columns-cover position-relative'>
                <div class='slider-arrow slider-arrow-2 carausel-6-columns-arrow' id='carausel-6-columns-arrows'></div>
                <div class='carausel-6-columns' id='carausel-6-columns'>";
                    $t=0;
                    $s32 = "select * from sms_link where popular='YES' and status='ON' order by sorder asc";
                    $r32 = $conn->query($s32);
                    if ($r32->num_rows > 0) { while($rs32 = $r32->fetch_assoc()) {
                        echo"<div class='card-1' style='text-align:center'>                            
                            <a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=".$rs32["id"]."'); shiftdatax('pd.php?cPath=4&catid=".$rs32["id"]."&cm=1', 'datashiftX')\" target='_self'>";
                                if(strlen($rs32["image"])<=3) echo"<div style='padding-top:30px;padding-bottom:20px'><i class='fa ".$rs32["icon"]."' style='color:$bodytc;font-size:45pt;margin-top:2px'></i></div>";
                                else echo"<img src='media/".$rs32["image"]."' style=''></i>";
                            echo"</a>                            
                            <h5><a href='#top' style='cursor: pointer' onclick=\"ChangeUrl('index.php?cPath=4&catid=".$rs32["id"]."'); shiftdatax('pd.php?cPath=4&catid=".$rs32["id"]."&cm=1', 'datashiftX')\" target='_self'>
                                <span style='color:buttonbc'>".$rs32["pam"]."</span>
                            </a></h5>
                        </div>";
                    } }
                echo"</div>
            </div>
        </div>
    </section>";
?>
