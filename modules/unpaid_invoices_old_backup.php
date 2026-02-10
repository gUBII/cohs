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
                <input type='hidden' name='url' value='unpaid_invoices.php'>
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
    <div class='data-table-rows slim' id='sample'>
        
        <body onload=\"shiftdataV2('ledger_pending_invoices.php?cid=$cid&sheba=$sheba&utype=$utype&selection=$selection&statusupdate=$statusupdate&poinz=$poinz&lid_date_from=$lid_date_from&lid_date_to=$lid_date_to&lid=$lid&cname=$cname&refby=".$_GET["refby"]."', 'datatableX')\">";
        
        // <div class='data-table-responsive-wrapper' id='chartmodeX'></div>
        
        echo"<div class='data-table-responsive-wrapper'id='datatableX'></div>

    </div>";

/*

if($invoice_status==3){
        echo"<div class='row wrapper border-bottom white-bg page-heading'>
            <div class='col-lg-12'>
                <h2>Paid Invoices</h2>
                <ol class='breadcrumb'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                    <li class='breadcrumb-item active'><strong>Reporting Form</strong></li>";
                    if(isset($kroyee)) echo"<li class='breadcrumb-item active'><strong>$kroyee</strong></li>";
                echo"</ol>
            </div>
        </div>
        <br>
        <div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px;background-color:white;text-align:center'>
            <div class='panel-body' style='padding-left:5px;padding-right:5px'>";
                include("ledger_closed_invoices.php");
            echo"</div>
        </div><br><br>";
    }
*/  
?>

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