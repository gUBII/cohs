<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='content-header'><h2 class='content-title'>Product Category </h2></div>
        <div class='card'>
            <div class='card-body'>
                <div class='row gx-5'>
                    <aside class='col-lg-4 border-end'>
                        <nav class='nav nav-pills flex-lg-column mb-4'>";
                            $s1 = "select * from sms_link where des1='TOP CATEGORY' order by sorder asc";
                            $r1 = $conn->query($s1);
                            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                echo"<a href='#top' class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV2('product_category_edit.php?mid=".$rs1["id"]."&sheba=pages_blog_category', 'datashiftZZ')\" target='_self' style='color:black'>".$rs1["pam"]." <span style='font-size:8pt'>(S:".$rs1["status"]." | P:".$rs1["popular"]." | M:".$rs1["megamenu"].")</span></a>";
                                $s1a = "select * from sms_link where des1='".$rs1["id"]."' order by sorder asc";
                                $r1a = $conn->query($s1a);
                                if ($r1a->num_rows > 0) { while($rs1a = $r1a->fetch_assoc()) {
                                    echo"<a href='#top' class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV2('product_category_edit.php?mid=".$rs1a["id"]."&sheba=pages_blog_category', 'datashiftZZ')\" target='_self' style='color:#dddddd;background-color:#eeeeee'>&nbsp;&nbsp; - ".$rs1a["pam"]." <span style='font-size:8pt'>(S:".$rs1a["status"]." | P:".$rs1a["popular"]." | M:".$rs1a["megamenu"].")</span></a>";
                                    $s1b = "select * from sms_link where des1='".$rs1a["id"]."' order by sorder asc";
                                    $r1b = $conn->query($s1b);
                                    if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) {
                                        echo"<a href='#top' class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV2('product_category_edit.php?mid=".$rs1b["id"]."&sheba=pages_blog_category', 'datashiftZZ')\"  target='_self' style='color:#cccccc;background-color:#dddddd'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - ".$rs1b["pam"]."  <span style='font-size:8pt'>(S:".$rs1b["status"]." | P:".$rs1b["popular"]." | M:".$rs1b["megamenu"].")</span></a>";
                                    } }
                                } }
                            } }
                        echo"</nav>
                    </aside>
                    
                    <div class='col-lg-8'>
                        <section class='content-body p-xl-4' id='datashiftZZ'>";
                            include("product_category_edit.php");
                        echo"</section>
                    </div>
                </div>
            </div>
        </div>
    </section>";
?>
