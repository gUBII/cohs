<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='content-header'><h2 class='content-title'>Attribute Options</h2></div>
        <div class='card'>
            <div class='card-body'>
                <div class='row gx-5'>
                    <aside class='col-lg-4 border-end'>
                        <nav class='nav nav-pills flex-lg-column mb-4'>";
                            $s1 = "select * from product_attribute_cat where status='ON' order by name asc";
                            $r1 = $conn->query($s1);
                            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                echo"<strong>".$rs1["name"].":</strong>";
                                $s1x = "select * from product_attribute where catid='".$rs1["id"]."' and status='ON' order by name asc";
                                $r1x = $conn->query($s1x);
                                if ($r1x->num_rows > 0) { while($rs1x = $r1x->fetch_assoc()) {
                                    echo"<a href='#top' class='nav-link' aria-current='page' style='cursor: pointer' onclick=\"shiftdataV2('product_attributes_options_edit.php?mid=".$rs1x["id"]."', 'datashiftZZ')\" target='_self' style='color:black'>".$rs1x["name"]." - ".$rs1x["price"]."</a>";
                                } }
                            } }
                        echo"</nav>
                    </aside>
                    
                    <div class='col-lg-8'>
                        <section class='content-body p-xl-4' id='datashiftZZ'>";
                            include("product_attributes_options_edit.php");
                        echo"</section>
                    </div>
                </div>
            </div>
        </div>
    </section>";
?>
