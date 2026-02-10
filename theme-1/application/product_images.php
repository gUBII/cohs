<?php
    include("auth.php");
    echo"<div class='row'>";
        $fname="somalian";
        $s3 = "select * from multi_image where pid='".$_GET["pid"]."' order by sorder asc limit 1";
        $r3 = $conn->query($s3);
        if ($r3->num_rows > 0) { while($rs3 = $r3->fetch_assoc()) {
            $fname=$rs3["id"];
            $fname="form$fname";
            echo"<div class='col-md-12'><div class='card card-product-grid'>
                <form method='post' name='$fname' action='product_update.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                    <div class='img-wrap'><img src='".$rs3["image"]."' style='height:150px' alt='".$rs3["note"]."'></div>
                    <input type=hidden name=sorder value='".$rs3["sorder"]."' class='form-control' onchange='this.form.submit()'>
                    <span style='text-align:center;color:black'>Default Image</span>
                </form>
            </div></div>";
        } }
        $s3 = "select * from multi_image where pid='".$_GET["pid"]."' order by sorder asc";
        $r3 = $conn->query($s3);
        if ($r3->num_rows > 0) { while($rs3 = $r3->fetch_assoc()) {
            $fname=$rs3["id"];
            $fname="form$fname";
            echo"<div class='col-md-2'><div class='card card-product-grid'>
                <form method='post' name='$fname' action='product_update.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                    <a href='dataprocessor.php?processor=deletetask&delid=".$rs3["id"]."&tbl=multi_image' target='dataprocessor' onblur=\"shiftdataV2('product_images.php?pid=".$_GET["pid"]."', 'multiimage')\">
                        <div style='z-index:999;text-align:center;position:absolute;background-color:lightgreen;border-radius:50%;color:black;width:15px;height:15px;font-size:7pt'>X</div>
                    </a>
                    <div class='img-wrap'><img src='".$rs3["image"]."' style='height:150px' alt='".$rs3["note"]."'></div>
                    <input type=number name=sorder value='".$rs3["sorder"]."' class='form-control' onchange='this.form.submit()' onblur=\"shiftdataV2('product_images.php?pid=".$_GET["pid"]."', 'multiimage')\">
                    <input type='hidden' name='processor' value='imageupdate'><input type='hidden' name='id' value='".$rs3["id"]."'>
                </form>
            </div></div>";
        } }
    echo"</div>";
?>