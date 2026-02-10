<?php
    include("include.php");
    
    if(isset($_GET["tbl"])){
        
        if(isset($_GET["delid"])){
            $tablename = $_GET["tbl"];
            $delid = $_GET["delid"];
            $filename = $_GET["processor"];
            $cid = $_GET["cid"];
            $sourceid = $_GET["sourceid"];
            $sourcefrom = $_GET["sourcefrom"];
            
            if(isset($_GET["utype"])) $utype=$_GET["utype"];
            else $utype="EMPLOYEE";
            
            if(isset($_GET["inv_id"])) $s1 = "select * from $tablename where invoice_no2='".$_GET["inv_id"]."' and proj_id='".$_GET["proj_id"]."' order by id asc limit 1";
            else $s1 = "select * from $tablename where id='$delid' order by id asc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                
                echo"<br><br><br><br><center>Delete This Record?<br><br>
                <form method='GET' action='deleterecords.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                    <input type=hidden name='processor' value='deletedata'>
                    <input type=hidden name='delid' value='$delid'>
                    <input type=hidden name='tbl' value='$tablename'>
                    <input type=hidden name='sourceid' value='$sourceid'>
                    <input type=hidden name='sourcefrom' value='$sourcefrom'>";
                    if($tablename=="ndis_invoices"){
                        echo"<input type=hidden name='randomid' value='".$rs1["id"]."'>
                        <input type=hidden name='received_from' value='".$rs1["received_from"]."'>
                        <input type=hidden name='invoice_no2' value='".$rs1["invoice_no2"]."'>
                        <input type=hidden name='ledger_id' value='".$rs1["ledger_id"]."'>";
                    }
                    if($tablename=="receipt_voucher"){
                        echo"<input type=hidden name='randomid' value='".$rs1["id"]."'>
                        <input type=hidden name='received_from' value='".$rs1["received_from"]."'>
                        <input type=hidden name='invoice_no2' value='".$rs1["invoice_no2"]."'>
                        <input type=hidden name='ledger_id' value='".$rs1["ledger_id"]."'>
                        <input type=hidden name='proj_id' value='".$rs1["prof_id"]."'>";
                    }
                    echo"<table style='width:200px'><tr>
                        <td align=left><button type='button' class='btn btn-secondary' data-bs-dismiss='offcanvas'>Cancel</button></td>
                        <td align=right>
                            <button type='submit' class='btn btn-danger' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('$filename.php?cid=$cid&sheba=$tablename&utype=$utype', 'datatableX')\">Delete</button>
                        </td>
                    </tr></table>
                </form>";
            } }
            
        }
        
        if(isset($_GET["delid_main"])){
            $tablename = $_GET["tbl"];
            $delid = $_GET["delid_main"];
            $filename = $_GET["processor"];
            $cid = $_GET["cid"];
            $sourceid = $_GET["sourceid"];
            $sourcefrom = $_GET["sourcefrom"];
            
            $s1 = "select * from $tablename where id='$delid' order by id asc limit 1";
            $r1 = $conn_main->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                echo"<br><br><br><br><center>Delete This Record?<br><br>
                <form method='GET' action='deleterecords.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                    <input type=hidden name='processor' value='deletedata'>
                    <input type=hidden name='delid_main' value='$delid'>
                    <input type=hidden name='tbl' value='$tablename'>
                    <input type=hidden name='sourceid' value='$sourceid'>
                    <input type=hidden name='sourcefrom' value='$sourcefrom'>
                    
                    <table style='width:200px'><tr>
                        <td align=left><button type='button' class='btn btn-secondary' data-bs-dismiss='offcanvas'>Cancel</button></td>
                        <td align=right><button type='submit' class='btn btn-danger' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('$filename.php?cid=$cid&sheba=$tablename&utype=$utype', 'datatableX')\">Delete</button></td>
                    </tr></table>
                </form>";
            } }            
        }
        
    }
    
    if(isset($_GET["tblx"])){
        if(isset($_GET["delidx"])){
            $tablename = $_GET["tblx"];
            $delid = $_GET["delidx"];
            $filename = $_GET["processorx"];
            $cid = $_GET["cidx"];
            $sourceid = $_GET["sourceidx"];
            $sourcefrom = $_GET["sourcefromx"];
            
            if(isset($_GET["utype"])) $utype=$_GET["utype"];
            else $utype="EMPLOYEE";
            
            $s1 = "select * from $tablename where $sourceid='$delid' order by $sourceid desc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                echo"<br><br><br><br><center>Delete This Record?<br><br>
                <form method='GET' action='deleterecords.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                    <input type=hidden name='processor' value='deletedata'>
                    <input type=hidden name='delid' value='$delid'>
                    <input type=hidden name='tbl' value='$tablename'>
                    <input type=hidden name='sourceid' value='$sourceid'>
                    <input type=hidden name='sourcefrom' value='$sourcefrom'>
                    
                    <table style='width:200px'><tr>
                        <td align=left><button type='button' class='btn btn-secondary' data-bs-dismiss='offcanvas'>Cancel</button></td>
                        <td align=right>
                            <button type='submit' class='btn btn-danger' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('$filename.php?cid=$cid&sheba=$tablename&utype=$utype', 'datatableX')\">Delete</button>
                        </td>
                    </tr></table>
                </form>";
            } }            
        }
    }
    
    if(isset($_GET["tblrv"])){
        /*
        if(isset($_GET["delid"])){
            $tablename = $_GET["tblzrv"];
            $delid = $_GET["delidz"];
            $filename = $_GET["processor"];
            $cidz = $_GET["cidz"];
            $sourceid = $_GET["sourceidz"];
            $sourcefrom = $_GET["sourcefromz"];
            $invoice_id = $_GET["inv_id"];
            $s1 = "select * from $tablename where invoice_no='$invoice_id' order by $invoice_id desc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                echo"<br><br><br><br><center>Delete This Record?<br><br>
                <form method='GET' action='deleterecords.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                    <input type=hidden name='processor' value='deletedata'>
                    <input type=hidden name='delid' value='$delid'>
                    <input type=hidden name='tbl' value='$tablename'>
                    <input type=hidden name='sourceid' value='$sourceid'>
                    <input type=hidden name='sourcefrom' value='$sourcefrom'>
                    <input type=hidden name='invoice_id' value='$invoice_id'>
                    <table style='width:200px'><tr>
                        <td align=left><button type='button' class='btn btn-secondary' data-bs-dismiss='offcanvas'>Cancel</button></td>
                        <td align=right>
                            <button type='submit' class='btn btn-danger' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onblur=\"shiftdataV2('$filename.php?did=$cidz&ctitle=".$_GET["ctitle"]."&categoryid=".$_GET["categoryid"]."', 'offcanvasRight'); shiftdataV2('document_data2.php?status=1&categoryid=".$_GET["categoryid"]."', 'datatableX')\">
                                Delete
                            </button>
                        </td>
                    </tr></table>
                </form>";
            } }            
        }
        */
    }
    
    if(isset($_GET["tblz"])){
        if(isset($_GET["delidz"])){
            $tablename = $_GET["tblz"];
            $delid = $_GET["delidz"];
            $filename = $_GET["processorz"];
            $cidz = $_GET["cidz"];
            $sourceid = $_GET["sourceidz"];
            $sourcefrom = $_GET["sourcefromz"];
            
            $s1 = "select * from $tablename where $sourceid='$delid' order by $sourceid desc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                echo"<br><br><br><br><center>Delete This Record?<br><br>
                <form method='GET' action='deleterecords.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                    <input type=hidden name='processor' value='deletedata'>
                    <input type=hidden name='delid' value='$delid'>
                    <input type=hidden name='tbl' value='$tablename'>
                    <input type=hidden name='sourceid' value='$sourceid'>
                    <input type=hidden name='sourcefrom' value='$sourcefrom'>
                    
                    <table style='width:200px'><tr>
                        <td align=left><button type='button' class='btn btn-secondary' data-bs-dismiss='offcanvas'>Cancel</button></td>
                        <td align=right>
                            <button type='submit' class='btn btn-danger' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onblur=\"shiftdataV2('$filename.php?did=$cidz&ctitle=".$_GET["ctitle"]."&categoryid=".$_GET["categoryid"]."', 'offcanvasRight'); shiftdataV2('document_data2.php?status=1&categoryid=".$_GET["categoryid"]."', 'datatableX')\">
                                Delete
                            </button>
                        </td>
                    </tr></table>
                </form>";
            } }            
        }
    }