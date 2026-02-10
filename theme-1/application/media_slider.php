<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='content-header'><h2 class='content-title'>Media Sliders </h2></div>
        <div class='card'>
            <div class='card-body'>
                <div class='row gx-5'>
                    <aside class='col-lg-4 border-end'>
                        <nav class='nav nav-pills flex-lg-column mb-4'>";
                            $s1 = "select * from sms_media where mtype='SLIDER' order by sorder asc";
                            $r1 = $conn->query($s1);
                            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                $catname="none";
                                echo"<a href='#top' class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV2('media_slider_edit.php?mid=".$rs1["id"]."&sheba=pages_blog_category', 'datashiftZZ')\" target='_self' style='color:black'>".$rs1["name"]." <span style='font-size:8pt'>(".$rs1["pid"].")</span></a>";
                            } }
                        echo"</nav>
                    </aside>
                    <div class='col-lg-8'><section class='content-body p-xl-4' id='datashiftZZ'>";
                        include("media_slider_edit.php");
                    echo"</section></div>
                </div>
            </div>
        </div>
    </section>";
?>
