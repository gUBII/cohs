<?php
    include("include.php");
    $tablename = $_GET["tbl"];
    $delid = $_GET["delid"];
    
    if(isset($_GET["tbl"])){
        
        if(isset($_GET["delid"])){
            
            if(strlen($_GET["sourceid"])>=3){
                $sourceid=$_GET["sourceid"];
                $sql = "DELETE FROM $tablename WHERE $sourceid='".$_GET["delid"]."'"; 
            }else{
                $sql = "DELETE FROM $tablename WHERE id='".$_GET["delid"]."'"; 
            }
            
            if ($conn->query($sql) === TRUE){
                
                if($tablename=="ndis_invoices"){
                    
                    $sqlx = "DELETE FROM ndis_invoices_addon WHERE randomid='".$_GET["randomid"]."' and received_from='".$_GET["received_from"]."' and invoice_no2='".$_GET["invoice_no2"]."' and ledger_id='".$_GET["ledger_id"]."'"; 
                    if ($conn->query($sqlx) === TRUE) $tomtom=0;
                
                } else if($tablename=="ndis_invoices_addon"){                    
                    
                    echo"<form method='get' action='modules/invoices_addon.php' name='main' target='_self'>
                        <input type='hidden' name='pid' value='".$_GET["pid"]."'>
                        <input type='hidden' name='rid' value='".$_GET["rid"]."'>
                        <input type='hidden' name='sid' value='".$_GET["sid"]."'>
                        <input type='hidden' name='lid' value='".$_GET["lid"]."'>
                        <input type='hidden' name='sourceid' value='".$_GET["sourceid"]."'>
                        <input type='hidden' name='sourcefrom' value='".$_GET["sourcefrom"]."'>
                    </form>";
                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                    
                } else if($tablename=="receipt_voucher"){
                    
                    $sqlx = "DELETE FROM receipt_voucher WHERE invoice_no2='".$_GET["invoice_no2"]."' and received_from='".$_GET["received_from"]."' and proj_id='".$_GET["proj_id"]."'"; 
                    if ($conn->query($sqlx) === TRUE){
                        echo"<script>alert('Record Deleted.')</script>";
                        echo"<form method='get' action='modules/ledger_forms_addon_edit.php' name='main' target='_self'>
                        <input type='hidden' name='pid' value='".$_GET["pid"]."'>
                        <input type='hidden' name='rid' value='".$_GET["rid"]."'>
                        <input type='hidden' name='sid' value='".$_GET["sid"]."'>
                        <input type='hidden' name='lid' value='".$_GET["lid"]."'>
                        <input type='hidden' name='sourceid' value='".$_GET["sourceid"]."'>
                        <input type='hidden' name='sourcefrom' value='".$_GET["sourcefrom"]."'>
                    </form>";
                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                    }
                    
                }else{
                    
                    if(strlen($_GET["sourceid"])>=1){
                        $tomtom=0;
                    }else{
                        if(isset($_GET["rurl"])){
                            echo"<form method='get' action='modules/".$_GET["rurl"]."' name='main' target='_self'>
                                <input type='hidden' name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                            </form>";
                            ?> <script language=JavaScript> document.main.submit(); </script> <?php
                        }else{
                            echo"<form method='get' action='index.php' name='main' target='_top'>
                                <input type=hidden name='pointer' value='".$_GET["pointer"]."'>
                        	    <input type='hidden' name='url' value='".$_GET["url"]."'>
                        	    <input type='hidden' name='id' value='".$_GET["id"]."'>
                        	    <input type='hidden' name='dfrom' value='".$_GET["dfrom"]."'>
                        	    <input type='hidden' name='dto' value='".$_GET["dto"]."'>
                                <input type='hidden' name='estatus' value='".$_GET["estatus"]."'>
                                <input type='hidden' name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                                <input type='hidden' name='src_clientid' value='".$_GET["src_clientid"]."'>
                            </form>";
                            ?> <script language=JavaScript> document.main.submit(); </script> <?php
                        }
                    }
                    
                }                
            }
        }
        
        if(isset($_GET["delid_main"])){
            $sql = "DELETE FROM $tablename WHERE id='".$_GET["delid_main"]."'"; 
            if ($conn_main->query($sql) === TRUE) echo"<script>alert('Record Deleted.')</script>";
        }
    }
    
    if(isset($_GET["delinvoiceid2"])){
        if($_GET["delinvoiceid2"]>=1){ ?>
            <body onload='deleteFunction()'>
                <script>
                    function deleteFunction() {
                        let text = "WARNING! Sure to DELETE this Record?";
                        if (confirm(text) == true) { <?php
                            $sql = "DELETE FROM  $tablename WHERE id='".$_GET["delinvoiceid2"]."'";
                            if ($conn->query($sql) === TRUE){ ?> alert('Record Deleted.') <?php } ?>
                        } else {
                            alert('Cancelled.')
                        }
                        document.getElementById("demo").innerHTML = text;
                    }
                </script>
            </body>
            <?php
                echo"<form method='get' action='modules/ledger_forms_addon_edit.php' name='main' target='_self'>
                    <input type=hidden name='lid' value='".$_GET["lid"]."'><input type=hidden name='sid' value='".$_GET["sid"]."'>
                </form>";
            ?>
            <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
