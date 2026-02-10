<?php
    $qty="100000000";
    if(isset($_POST["qty"])) $qty=$_POST["qty"];

    include("../include.php");
    
    if(isset($_POST["pointer"]) and $_POST["pointer"]=="products"){
        $dfrom=strtotime($_POST["datex"]);
        echo"<div class='wrapper wrapper-content animated fadeInRight' id='element-to-print' style='padding-left:5px;padding-right:5px'>
            <table class='table table-bordered table-hover dataTables-example' style='background-color:#FFFFFF'>
                <thead><tr><th>ID</th><th>Name</th><th>Category</th><th>Vendor</th><th>Brand</th><th>Price</th><th>Qty</th><th>Image</th></tr></thead>
                <tbody>";
                
                    if($_POST["vid"]=="ALL" && $_POST["cid"]=="ALL"){									
                        if($dfrom>=10000) $query = "SELECT * FROM `sms_product_bon` where date='$dfrom' and qty='$qty' and status='".$_POST["status"]."'";
                        else $query = "SELECT * FROM `sms_product_bon` where qty='$qty' and status='".$_POST["status"]."'";
                    }
                    if($_POST["vid"]=="ALL" && $_POST["cid"]!="ALL"){
                        if($dfrom>=10000) $query = "SELECT * FROM `sms_product_bon` where cid='".$_POST["cid"]."' and date='$dfrom' and qty='$qty' and status='2' or cid2='".$_POST["cid"]."' and date='$dfrom' and qty='$qty' and status='".$_POST["status"]."'";
                        else $query = "SELECT * FROM `sms_product_bon` where cid='".$_POST["cid"]."' and qty='$qty' and status='2' or cid2='".$_POST["cid"]."' and qty='$qty' and status='".$_POST["status"]."'";
                    }
                    if($_POST["vid"]!="ALL" && $_POST["cid"]=="ALL"){
                        if($dfrom>=10000) $query = "SELECT * FROM `sms_product_bon` where vid='".$_POST["vid"]."' and date='$dfrom' and qty='$qty' and status='".$_POST["status"]."'";
                        else $query = "SELECT * FROM `sms_product_bon` where vid='".$_POST["vid"]."' and qty='$qty' and status='".$_POST["status"]."'";
                    }
                    if($_POST["vid"]!="ALL" && $_POST["cid"]!="ALL"){
                        if($dfrom>=10000) $query = "SELECT * FROM `sms_product_bon` where vid='".$_POST["vid"]."' and cid='".$_POST["cid"]."' and date='$dfrom' and qty='$qty' and status='2' or vid='".$_POST["vid"]."' and cid2='".$_POST["cid"]."' and date='$dfrom' and qty='$qty' and status='".$_POST["status"]."'";
                        else $query = "SELECT * FROM `sms_product_bon` where vid='".$_POST["vid"]."' and cid='".$_POST["cid"]."' and qty='$qty' and status='2' or vid='".$_POST["vid"]."' and cid2='".$_POST["cid"]."' and qty='$qty' and status='".$_POST["status"]."'";
                    }                    
                    $rb7 = $conn->query($query);
                    if ($rb7->num_rows > 0) { while($rs1 = $rb7->fetch_assoc()) {
                        $cat1="";
                        $s1a = "select * from sms_link where id='".$rs1["cid"]."' order by id desc limit 1";
                        $r1a = $conn->query($s1a);
                        if ($r1a->num_rows > 0) { while($rs1a = $r1a->fetch_assoc()) { $cat1=$rs1a["pam"]; } }
                                
                        $cat2="";
                        $s1b = "select * from sms_link where id='".$rs1["cid2"]."' order by id desc limit 1";
                        $r1b = $conn->query($s1b);
                        if ($r1b->num_rows > 0) { while($rs1b = $r1b->fetch_assoc()) { $cat2=$rs1b["pam"]; } }
                                
                        $vendorname="";
                        $s1c = "select * from sms_user2 where id='".$rs1["vid"]."' order by id desc limit 1";
                        $r1c = $conn->query($s1c);
                        if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { $vendorname=$rs1c["sname"]; } }
                                
                        $brandname="";
                        $s1d = "select * from brand where id='".$rs1["bid"]."' order by id desc limit 1";
                        $r1d = $conn->query($s1d);
                        if ($r1d->num_rows > 0) { while($rs1d = $r1d->fetch_assoc()) { $brandname=$rs1d["title"]; } }
                                
                        echo"<tr>
                            <td>".$rs1["id"]."</td>    
                            <td>".$rs1["pname"]."<br>Sku: ".$rs1["sku"]."</td>
                            <td nowrap>1. $cat1<br>2. $cat2</td>
                            <td>$vendorname</td><td>$brandname</td>
                            <td nowrap align=right>RP: ".$rs1["price"]."<br>OP: ".$rs1["offer"]."<br>DP:".$rs1["discount"]."</td>
                            <td>".$rs1["qty"]."</td>
                            <td>";
                                $t1=0;
                                $s1c = "select * from multi_image where pid='".$rs1["id"]."' and reactor='".$rs1["reactor"]."' order by id asc";
                                $r1c = $conn->query($s1c);
                                if ($r1c->num_rows > 0) { while($rs1c = $r1c->fetch_assoc()) { 
                                    $t1=($t1+1);
                                    echo"<a href='".$rs1c["image"]."' target='_blank'>$t1</a> | ";
                                } }
                            echo"</td>                            
                        </tr>";                                    
                    } }
                echo"</tbody>
            </table>
        </div>";
    }
?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script> 
    <script src="assets/html2pdf/html2pdf.bundle.min.js"></script>    
    <script>
        function printDiv(divID) {
             var divElem = document.getElementById(divID).innerHTML;
             var printWindow = window.open('', '', 'height=210,width=350'); 
             printWindow.document.write('<html><head><title></title></head>');
             printWindow.document.write('<body>');
             printWindow.document.write(divElem);
             printWindow.document.write('</body>');
             printWindow.document.write ('</html>');
             printWindow.document.close();
             printWindow.print();
        }
    </script>
	
	<script src="assets/html2pdf/html2pdf.bundle.min.js"></script>    
    <script>
        var element = document.getElementById('element-to-print');
        html2pdf(element, {
            margin: 5,
            filename: 'pdfdocument.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
        });
    </script>
