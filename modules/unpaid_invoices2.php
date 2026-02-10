<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<style>
    #printBtn, #downloadBtn {
        display: none;
    }
</style>

<?php
    $sheba="ndis_invoices";
    $cid=1002;
    $title="Create Template";
    $utype="UNPAID INVOICES";
        
    if(isset($_GET["selection"])) $selection=$_GET["selection"];
    else $selection="INCOME";
    if(isset($_GET["statusupdate"])) $statusupdate=$_GET["statusupdate"];
    else $statusupdate=2;
    if(isset($_GET["poinz"])) $poinz=$_GET["poinz"];
    else $poinz=2;
    $todayx=time();
    if(isset($_GET["lid_date_from"]) && $_GET["lid_date_from"]!=0) $lid_date_from=$_GET["lid_date_from"];
    else $lid_date_from=date("Y-m-01", $todayx);
    $lid_date1=0;
    $lid_date1=strtotime($lid_date_from);
    if(isset($_GET["lid_date_to"]) && strlen($_GET["lid_date_to"])>=5 && $_GET["lid_date_to"]!=0) $lid_date_to=$_GET["lid_date_to"];
    else $lid_date_to=date("Y-m-d", $todayx);
    $lid_date2=strtotime($lid_date_to);
    if(isset($_GET["lid"])) $lid=$_GET["lid"];
    else $lid=0;
    if(isset($_GET["cname"])) $cname=$_GET["cname"];
    else $cname=0;

    echo"<div class='row'>
        <div class='col-12 col-md-5' style='padding-bottom:10px'>
            
            <h1 class='mb-0 pb-0 display-4' id='title'>Unpaid Invoice</h1>
        
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>";
            if(isset($_GET["refby"])) $refby=$_GET["refby"];
            else $refby="";
            if(isset($_GET["cname"])) $cname=$_GET["cname"];
            else $cname="";
            
            if(isset($_COOKIE["projectidx"])){
                echo"<a href='index.php?url=projects.php&pstat=1' style='margin-right:10px'><button class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button'><span>Project Profile</span></button></a>";
            }
            
            $y9r=date("Y");
            
            if($mtype!="CLIENT"){
                echo"<a href='index.php?url=create_invoice.php&id=5161' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px' >
                    <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Create Invoice</span>
                </a>";
            }
            echo"<a href='index.php?url=paid_invoices.php&id=5163&selection=INCOME&statusupdate=2&poinz=2&lid_date_from=$yr-02-01&lid_date_to=$currentdate&lid=800000032&cname=$cname&refby=$refby' class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                <i data-acorn-icon='eye'></i>&nbsp;&nbsp;<span>Paid</span>
            </a>";
        echo"</div>                  
    </div>   
    <div class='col-lg-12'>
        <form method='get' action='index.php' target='_top' enctype='multipart/form-data'>
            <input type='hidden' name='url' value='unpaid_invoices2.php'>
            <input type='hidden' name='id' value='5162'>
            <input type='hidden' name='selection' value='INCOME'>
            <input type='hidden' name='statusupdate' value='2'>
            <input type='hidden' name='poinz' value='2'>
            <input type='hidden' name='cid' value='1002'>
            <input type='hidden' name='sheba' value='$sheba'>
            <input type='hidden' name='utype' value='$utype'>
            <table style='width:100%'><tr>
                <td align=left style='padding:10px'><label>From Date</label><br>
                    <input type='date' name='lid_date_from' value='$lid_date_from' class='form-control'>
                </td>
                <td align=left style='padding:10px'><label>To Date</label><br>
                    <input type='date' name='lid_date_to' value='$lid_date_to' class='form-control'>
                </td>
                <td align-left style='padding:10px'><label>Select Ledger A/c</label><br>
                    <select class='form-control' name='lid'>";
                        if($mtype=="CLIENT"){
                            echo"<option value='800000032' $selectredx>NDIS PLAN</option>";
                        }else{
                            if(isset($_GET["lid"])){
                                $r11 = "select * from accounts_ledger where id='".$_GET["lid"]."' order by ledger_name asc limit 1";
                                $r11x = $conn->query($r11);
                                if ($r11x->num_rows > 0) { while($r11y = $r11x -> fetch_assoc()) {
                                    if($r11y["ledger_name"]=="NDIS PLAN") $selectedx="selected";
                                    else $selectedx=null;
                                    echo"<option value='".$r11y["id"]."' $selectredx>".$r11y["id"]." ".$r11y["ledger_name"]."</option>";
                                } }
                            }
                            $r1 = "select * from accounts_ledger where balance_type='INCOME' order by ledger_name asc";
                            $r1xx = $conn->query($r1);
                            if ($r1xx->num_rows > 0) { while($r1yy = $r1xx -> fetch_assoc()) { echo"<option value='".$r1yy["id"]."'>".$r1yy["ledger_name"]."</option>"; } }
                        }
                    echo"</select>
                </td>
                <td align=left style='padding:10px'>
                    <label>Select Client/Participant</label><br>
                    <select class='form-control' name='cname' required style='width:100%'>";
                        if(isset($_GET["lim"])) $lim=$_GET["lim"];
                        else $lim=1000;
                        if($mtype!="CLIENT"){
                            if($lim>=2) echo"<option value='ALL'>All Clients</option>";
                            $r1x = "select * from uerp_user where mtype='CLIENT' and status='1' order by username asc limit $lim";
                            $r1y = $conn->query($r1x);
                            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                                echo"<option value='".$r1z["id"]."'>".$r1z["username"]." ".$r1z["username2"]."</option>";
                            } }
                        }else{
                            $r1x = "select * from uerp_user where id='".$_COOKIE["userid"]."' and mtype='CLIENT' and status='1' order by username asc limit $lim";
                            $r1y = $conn->query($r1x);
                            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                                echo"<option value='".$r1z["id"]."'>".$r1z["username"]." ".$r1z["username2"]."</option>";
                            } }
                        }
                    echo"</select>
                </td>
                <td align=left style='padding:10px'>&nbsp;<br><input type='submit' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' value='Search'></td>
            </tr></table>
        </form>
    </div>
    <div class='col-lg-12' style='padding:20px'>";
        
        if($mtype!="CLIENT"){
            echo"<a href='modules/myob_invoice_export.php?xid=ALL' target='dataprocessor' id='downloadBtn' class='btn btn-outline-primary' >Download MYOB File</a>";
            echo"<button id='editSelectedBtn' class='btn btn-outline-warning btn-sm'>Edit Selected</button>
            <button id='deleteSelectedBtn' class='btn btn-outline-danger btn-sm'>Delete Selected</button>
            <button id='markAsPaidBtn' class='btn btn-success btn-sm'>Move Selected to Paid</button><hr>";

        }
        
        // echo"<table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>";
        echo"<table id='invoiceTable' class='display' style='width:100%'>
            <thead>
                <tr>
                    <th><input type='checkbox' onclick='toggleAll(this)'></th>
                    <th>Invoice ID </th>
                    <th>Card ID </th>
                    <th>Post Date </th>
                    <th>Template ID. </th>
                    <th>Invoice No. </th>
                    <th>Client Name </th>
                    <th style='text-align:right'>Amount </th>
                    <th>&nbsp;</th>
                </tr>
            </thread>
            <tbody>";
                if(isset($_COOKIE["userid"])) $userid=$_COOKIE['userid'];
                if(isset($_COOKIE["track"])) $track=$_COOKIE['track'];
                if(isset($userid)){
                    $tty=0;
                    $grosspaid=0;
                    if(isset($_GET["cname"])){
                        if(strlen($_GET["cname"])>=3) $cname=$_GET["cname"];
                        else $cname="ALL";
                    }else $cname="ALL";

                    if(isset($_GET["lid"])) $lid=$_GET["lid"];
                    else $lid=0;
                    
                    // echo"".$_GET["selection"].",".$_GET["statusupdate"].",".$_GET["poinz"].",".$_GET["lid_date_from"].",".$_GET["lid_date_to"].",".$_GET["lid"].",".$_GET["cname"]."";
                    if($lid>=0){
                        $ts=0;
                        if($cname=="ALL") $s = "select * from receipt_voucher where ledger_id='$lid' and receipt_date>='$lid_date1' and receipt_date<='$lid_date2' and invoice_no<>'0' and paid='1' group by invoice_no";                            
                        else $s = "select * from receipt_voucher where received_from='$cname' and ledger_id='$lid' and receipt_date>='$lid_date1' and receipt_date<='$lid_date2' and invoice_no<>'0' and paid='1' group by invoice_no";
                        $r = $conn->query($s);
                        if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                        
                            $datatargetX="category".$rs["id"]."X";
                            $datatargetXX="category".$rs["id"]."XX";
                            $datatargetY="category".$rs["id"]."Y";
                            $datatargetZ="category".$rs["id"]."Z";
                            $categoryX="cat".$rs["id"]."Z";
                            $categoryY="cat".$rs["id"]."Y";
                            $t=$rs["id"];
                            
                            $totpaid=0;
                            // $s1 = "select * from receipt_voucher where invoice_no='".$rs["invoice_no"]."' and id='".$rs["id"]."' and paid='1' order by id desc";
                            $s1 = "select * from receipt_voucher where invoice_no='".$rs["invoice_no"]."' and ledger_id='".$rs["ledger_id"]."' and paid='1' order by ledger_id desc";
                            $r1 = $conn->query($s1);
                            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $totpaid=($rs1["cr_amt"]+$totpaid); } }
                            
                            $date=date("d-M-Y",$rs["receipt_date"]);
                            
                            $clientname="";
                            $r1x = "select * from uerp_user where id='".$rs["received_from"]."' order by id asc limit 1";
                            $r1y = $conn->query($r1x);
                            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) {
                                $clientname="".$r1z["username"]." ".$r1z["username2"]."";
                                $clientphone=$r1z["phone"];
                                $clientemail=$r1z["email"];
                                $cp_name=$r1z["cp_name"];
                                $cp_phone=$r1z["cp_phone2"];
                                $cp_email=$r1z["cp_email"];
                                $client_ndis_number=$r1z["ndis_number"];
                                if($client_ndis_number==0) $client_ndis_number="";
                            } }
                            
                            $invoiceprint="printinv".$rs["id"]."";
                            
                            $randomid=rand(100000000000,999999999999);
                            
                            $ts=($ts+1);
                            $ttx="collapse$ts";
                            $printdiv="collapse$ts";
                            
                            if($_GET["selection"]=="INCOME"){
                            
                                echo"<tr class='' style='width:100%'>
                                    <td>";
                                    // <input type='checkbox' class='row-checkbox' onclick='return false;'>
                                    echo"<input type='checkbox' class='row-checkbox' name='selected_ids[]' value='".$rs["invoice_no"]."'></td>
                                    <td class='text-alternate' align='left' style='width:150px;'>".$rs["invoice_no"]."</td>
                                    <td class='text-alternate' align='left' style='width:150px;'>".$rs["cc_code"]."</td>
                                    <td class='text-alternate' align='left' style='width:150px;'>$date</td>
                                    <td class='text-alternate' align='left' style='width:150px;'>".$rs["randomid"]."</td>
                                    <td class='text-alternate' align='left' style='width:150px;'>".$rs["invoice_no2"]."</td>
                                    <td class='text-alternate' align='left' style='width:300px;'>$clientname</td>
                                    <td class='text-alternate' align='right' style='width:100px;'><b>";
                                        setlocale(LC_MONETARY, 'en_AU.UTF-8');
                                        $payable= $totpaid;
                                        $grosspaid=($grosspaid+$totpaid);
                                        echo"$csymbol $payable</b>
                                    </td>
                                    <td class='text-alternate' align='center' style='width:100px;'>";
                                        if($mtype!="CLIENT"){
                                            echo"<button class='btn btn-outline-primary' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3' style='font-size:10pt;'><i class='fa-solid fa-bars'></i></button>
                                            <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('ledger_pending_invoices.php?cid=$cid&sheba=$sheba&utype=$utype&selection=$selection&statusupdate=1&poinz=2&lid_date_from=$lid_date_from&lid_date_to=$lid_date_to&lid=$lid&cname=$cname', 'datatableX')\">
                                                <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('ledger_invoice_view.php?pid=".$rs["id"]."-1', 'offcanvasTop2')\">View/Edit Invoice</a>";
                                                if($status=="ON") echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=10&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('suppliers_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Suspend</a>";
                                                else echo"<a class='dropdown-item' href='./dataprocessor_1.php?processor=StatusSuspend&status=1&tid=$sheba&pid=$uid' target='dataprocessor' onblur=\"shiftdataV2('suppliers_data.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Activate</a>";
                                                
                                                echo"<a class='dropdown-item' style='cursor: pointer' href='invoiceprocessor.php?processor=invoicepaymentgenerator&lid=".$_GET["lid"]."&sid=".$rs["invoice_no"]."&cname=".$rs["received_from"]."&dfrom=".$_GET["lid_date_from"]."&dto=".$_GET["lid_date_to"]."&id=5162&url=unpaid_invoices2.php&utype=".$_GET["utype"]."&selection=".$_GET["selection"]."&statusupdate=".$_GET["statusupdate"]."&poinz=".$_GET["poinz"]."&cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&refby=".$_GET["sheba"]."' target='dataprocessor'>Mark as Paid</a>
                                                
                                                <a class='dropdown-item' style='cursor: pointer' href='modules/myob_invoice_export.php?pid=".$rs["id"]."-1' target='dataprocessor'>Generate MYOB Text File</a>
                                                
                                                <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onclick=\"shiftdataV2('../delete_records.php?processor=receipt_voucher&cid=$cid&delid=$uid&tblrv=receipt_voucher&utype=$utype&inv_id=".$rs["invoice_no"]."', 'offcanvasTop')\">Delete</a>";
                                            echo"</div>";
                                        }
                                    echo"</td>
                                </tr>";
                            }
                        } }
                        echo"<div class='panel panel-default'><div class='panel-heading'>
                            <table style='width:100%'><tr>
                                <td align='left' style='width:150px;'> </td>
                                <td align='left' style='width:150px;'> </td>
                                <td align='left' style='width:150px;'> </td>
                                <td align='left' style='width:150px;'> </td>
                                <td align='left' style='width:300px;'> </td>
                                <td align='right' nowrap style='padding-right:20px;font-size:16pt'><b>";
                                    setlocale(LC_MONETARY, 'en_AU.UTF-8');
                                    $grosspaid1= $grosspaid;
                                    echo"Total: $grosspaid1</b>
                                </td>
                                <td align='center' style='width:100px;'> </td>
                            </tr></table>
                        </div></div>";
                    }
                }
            echo"</div></tbody>
        </table>";
        
        // ALL INVOICE EDIT
        echo"<div class='modal inmodal cardt' id='pendingforms' tabindex='-1' role='dialog' aria-hidden='true'>
            <div class='modal-dialog modal-lg'>
                <div class='modal-content animated bounceInUp' style='text-align:left'>
                    <div id='datatargetZ' style='padding:0px'></div>"; ?>
                        <script type="text/javascript">
                            function getDataXYZ(employeeid,datatargetZ){
                                $.ajax({
                                    url: 'ledger_invoice_view.php?<?php echo"selection=".$_GET["selection"]."&" ?>cid='+employeeid, 
                                    success: function(html) {
                                        var ajaxDisplay = document.getElementById(datatargetZ);
                                        ajaxDisplay.innerHTML = html;
                                    }
                                });
                            }
                        </script> <?php
                    echo"</div>
                </div>
            </div>
        </div>
    </div><br><br><br><br><br><br>"; ?>
    
    <div id="invoiceMeta"
         data-lid="<?= $_GET["lid"] ?>"
         data-lid_date_from="<?= $_GET["lid_date_from"] ?>"
         data-lid_date_to="<?= $_GET["lid_date_to"] ?>"
         data-cname="<?= $_GET["cname"] ?>"
         data-selection="<?= $_GET["selection"] ?>"
         data-statusupdate="<?= $_GET["statusupdate"] ?>"
         data-poinz="<?= $_GET["poinz"] ?>"
         data-cid="<?= $_GET["cid"] ?>"
         data-utype="<?= $_GET["utype"] ?>"
         data-sheba="<?= $_GET["sheba"] ?>">
    </div>

    <!-- Loading Spinner -->
    <div id="loadingSpinner" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); z-index:9999;">
        <div class="spinner-border text-success" role="status"><span class="visually-hidden">Loading...</span></div>
    </div>
    
    <!-- Toast Message -->
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 1050">
        <div id="toastMessage" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body" id="toastContent">Action completed.</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {
            var table = $('#invoiceTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "responsive": true,
                "columnDefs": [
                    { "orderable": false, "targets": 0 } // disable ordering on checkbox column
                ]
            });
        
            // Toggle all checkboxes
            $('#invoiceTable').on('change', 'thead input[type="checkbox"]', function () {
                var checked = this.checked;
                $('tbody input[type="checkbox"]', table.table().container()).prop('checked', checked);
                checkSelection();
            });
        
            // Track selection
            $('#invoiceTable').on('change', 'tbody input[type="checkbox"]', function () {
                checkSelection();
            });
        
            // Action button toggle
            function checkSelection() {
                let selected = $('.row-checkbox:checked').length;
                $('#downloadBtn').toggle(selected > 0);
                $('#printBtn').toggle(selected > 0);
            }
        
            // Delete button logic
            $('#deleteSelectedBtn').click(function () {
                let selected = $('.row-checkbox:checked');
                if (selected.length === 0) {
                    alert("No rows selected");
                    return;
                }
                if (!confirm("Delete selected rows?")) return;
        
                selected.each(function () {
                    table.row($(this).closest('tr')).remove().draw();
                });
                checkSelection();
            });
        
            // Edit button logic
            $('#editSelectedBtn').click(function () {
                let selected = $('.row-checkbox:checked');
                if (selected.length === 0) {
                    alert("No rows selected");
                    return;
                }
        
                selected.each(function () {
                    let row = $(this).closest('tr');
                    // Adjust based on which columns are editable
                    row.find('td:eq(2), td:eq(3)').attr('contenteditable', true).css('background-color', '#ffe');
                });
        
                alert("Editable fields activated.");
            });
            
            function showToast(message, success = true) {
                const toastEl = document.getElementById('toastMessage');
                const toastBody = document.getElementById('toastContent');
            
                toastBody.innerText = message;
                toastEl.classList.remove('bg-success', 'bg-danger');
                toastEl.classList.add(success ? 'bg-success' : 'bg-danger');
            
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            }
            
            function showSpinner() {
                $('#loadingSpinner').show();
            }
            function hideSpinner() {
                $('#loadingSpinner').hide();
            }
            
            $('#markAsPaidBtn').click(function () {
                let selected = $('.row-checkbox:checked');
                if (selected.length === 0) {
                    showToast("No invoices selected.", false);
                    return;
                }
            
                if (!confirm("Are you sure you want to mark selected invoices as Paid?")) return;
            
                let invoiceNos = [];
                selected.each(function () {
                    invoiceNos.push($(this).val());
                });
            
                const meta = $('#invoiceMeta').data();
            
                showSpinner();
            
                $.ajax({
                    url: 'invoiceprocessor.php',
                    method: 'POST',
                    data: {
                        processor: 'batchInvoicePaymentGenerator',
                        invoice_list: invoiceNos,
                        lid: meta.lid,
                        cname: meta.cname,
                        lid_date_from: meta.lid_date_from,
                        lid_date_to: meta.lid_date_to,
                        id: 5162,
                        url: 'unpaid_invoices2.php',
                        utype: meta.utype,
                        selection: meta.selection,
                        statusupdate: meta.statusupdate,
                        poinz: meta.poinz,
                        cid: meta.cid,
                        sheba: meta.sheba
                    },
                    success: function (response) {
                        invoiceNos.forEach(function (sid) {
                            let row = table.row($(`.row-checkbox[value="${sid}"]`).closest('tr'));
                            row.remove().draw();
                        });
                        hideSpinner();
                        showToast("Selected invoices marked as paid.");
                    },
                    error: function () {
                        hideSpinner();
                        showToast("Failed to update invoices.", false);
                    }
                });
            });



        });
    </script>

<!---
    <script>
        // Toggle all checkboxes and check selection
        function toggleAll(source) {
            const checkboxes = document.querySelectorAll('.row-checkbox');
            checkboxes.forEach(cb => {
                cb.checked = source.checked;
            });
            checkSelection();
        }
    
        // Check how many rows are selected, then toggle button visibility
        function checkSelection() {
            const anyChecked = document.querySelectorAll('.row-checkbox:checked').length > 0;
            document.getElementById('downloadBtn').style.display = anyChecked ? 'inline-block' : 'none';
            document.getElementById('printBtn').style.display = anyChecked ? 'inline-block' : 'none';
        }
    
        // Delete selected rows
        function deleteSelected() {
            const checkboxes = document.querySelectorAll('.row-checkbox:checked');
            if (checkboxes.length === 0) return alert("No rows selected");
            if (!confirm("Are you sure to delete selected rows?")) return;
    
            checkboxes.forEach(cb => cb.closest("tr").remove());
            checkSelection(); // Re-check after delete
        }
    
        // Enable editing for selected rows
        function editSelected() {
            const rows = document.querySelectorAll('.row-checkbox:checked');
            if (rows.length === 0) return alert("No rows selected");
    
            rows.forEach(cb => {
                const cells = cb.closest("tr").querySelectorAll("td");
                cells[2].setAttribute("contenteditable", "true");
                cells[3].setAttribute("contenteditable", "true");
            });
    
            alert("Now you can edit Name and Role directly. Click outside the cell to save.");
        }
    </script>
-->