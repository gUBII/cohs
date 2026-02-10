<link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
<link href='css/plugins/dataTables/datatables.min.css' rel='stylesheet'>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<style>
    .li_containers{
        width: 52%;
        float: left;
    }
    .listitems { 
        padding: 0.5em; 
        float: left; 
        margin: 10px 10px 10px 0;
        border: 1px solid black;
        font-weight: normal;
    }
    #droppable { 
        width:   550px; 
        height:  550px; 
        padding: 0.5em; 
        float:   right; 
        margin:  10px;
        cursor:  pointer;
    }
    .hide {
        display: none;
    }
    .myDIV:hover + .hide {
        display: block;
        color: red;
    }
</style>
<style>
    #div1 {
        width: 350px;
        height: 70px;
        padding: 10px;
        border: 1px solid #aaaaaa;
    }
    #div2 {
        width: 350px;
        height: 70px;
        padding: 10px;
        border: 1px solid #aaaaaa;
    }
    #div3 {
        width: 350px;
        height: 70px;
        padding: 10px;
        border: 1px solid #aaaaaa;
    }
</style>

<script>
    function allowDrop(ev) {
        ev.preventDefault();
    }
    
    function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
    }
    
    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }
</script>

<?php
    echo"<div class='row wrapper border-bottom white-bg page-heading'>
        <div class='col-lg-12'>
            <h2>Payroll Reports</h2>
            <ol class='breadcrumb'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                <li class='breadcrumb-item active'><strong>$smsbd</strong></li>";
                if(isset($kroyee)) echo"<li class='breadcrumb-item active'><strong>$kroyee</strong></li>";
            echo"</ol>
        </div>
    </div>
    <div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>
        <div class='row'>
            <div class='col-lg-12' style='background-color:white'>";
    
                error_reporting(0);
                include('include.php');
            	
            	if(isset($_COOKIE["userid"])) $userid=$_COOKIE['userid'];
            	if(isset($_COOKIE["track"])) $track=$_COOKIE['track'];
            
                if(isset($userid)){
                    $s7 = "select * from theme where id='1' order by id asc limit 1";
                    $r7 = $conn->query($s7);
                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                        $topbar_color=$rs7["topbar_color"];
                        $tbtc=$rs7["topbar_text_color"];
                    } }
                    if(isset($_GET["dfrom"])){ 
                        $todaydate1=$_GET["dfrom"];
                    }else{
                        $ttime=time();
                    	$todaydate1=date("Y-m-d", $ttime);
                    }
                    if(isset($_GET["dto"])){ 
                        $todaydate2=$_GET["dto"];
                    }else{
                        $ttime=time();
                    	$todaydate2=date("Y-m-d", $ttime);
                    }
                    
                    if(isset($_GET["estatus"])){
                        $estatus=$_GET["estatus"];
                        if($_GET["estatus"]==1) $evalue="Approved";
                        else $evalue="Pending";
                    } else{
                        $estatus=0;
                        $evalue="Pending";
                    }
                     
                    $totaldr=0;
                    echo"<form method=get name=ep action='index.php'><input type=hidden name=smsbd value='payroll-received'><input type=hidden name=pointer value='23'>
                        <div class='row m-b-lg m-t-lg'>
                            <div class='col-6 col-md-3'>Date from:<br><input type=date value='$todaydate1' class='form-control' name=dfrom style='width:100%'></div>
                            <div class='col-6 col-md-3'>Date To:<br><input type=date value='$todaydate2' class='form-control' name=dto></div>
                            <div class='col-6 col-md-3'>Account Name:<br>
                                <select class='form-control' name='src_employeeid' style='font-size:12pt;' required>";
                                    if($mtype=="ADMIN"){
                                        if(isset($_GET["src_employeeid"])){
                                        $s77 = "select * from uerp_user where id='".$_GET["src_employeeid"]."' order by id asc";
                                            $r77 = $conn->query($s77);
                                            if ($r77->num_rows > 0) { while($rs77 = $r77->fetch_assoc()) { echo"<option value='".$rs77["id"]."'>".$rs77["username"]." ".$rs77["username2"]."</option>"; } }
                                        }else{
                                            echo"<option value=''>Select Employee</option>";
                                        }
                                        echo"<option value='0'>View All Employee</option>";
                                        $s7 = "select * from uerp_user where mtype='USER' and status='1' or mtype='ADMIN' and status='1' order by username asc";
                                    }else{
                                        $s7 = "select * from uerp_user where id='".$_COOKIE["userid"]."' order by username asc";
                                    }
                                    $r7 = $conn->query($s7);
                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                    } }
                                echo"</select>
                            </div>
                            <div class='col-6 col-md-3'>&nbsp;<br>
                                <input type=submit class='form-control btn btn-warning' value='Search' style='background-color:orange'>
                            </div>
                        </div>    
                    </form>
                    <hr>
                    <table class='table table-striped table-bordered table-hover dataTables-example' >
                        <tr style='background-color:$topbar_color;color:$tbtc'>
                            <th align=left nowrap>Payroll Date</th>
                            <th align=center style='text-align:center;style='padding:10px' nowrap>Payslip ID</th>
                            <th align=left style='text-align:left' nowrap>Account Name</td>
                            <th align=right style='text-align:right' nowrap>Total Paid Amount</td>
                            <th align=center style='text-align:center;width:100px' nowrap>View Slip</th>
                        </tr>";
                        
                        if(isset($_GET["dfrom"])){ 
                    	    $datefrom=date('d-m-Y', strtotime($_GET["dfrom"]));
                    	    $dfromv=date('Y-m-d H:i:s', strtotime($_GET["dfrom"] . ' -1 day'));
                    	    $dfromv=strtotime($dfromv);
                    	    $dateto=date('d-m-Y', strtotime($_GET["dto"]));
                    	    $dtov=date('Y-m-d H:i:s', strtotime($_GET["dto"] . ' +1 day'));
                    	    $dtov=strtotime($dtov);
                        }else{
                            $ttime=time();
                            $ttime=date("Y-m-d H:i:s", $ttime);
                            $dfromv=date('Y-m-d H:i:s', strtotime($ttime . ' -1 day'));
                    	    $dfromv=strtotime($dfromv);
                    	    $dtov=date('Y-m-d H:i:s', strtotime($ttime . ' +1 day'));
                    	    $dtov=strtotime($dtov);
                        }
                        
                        $globalpaid=0;
                        
                        if($mtype=="ADMIN"){
                            if($_GET["src_employeeid"]=="0") $s = "select * from payment_voucher where payment_date>'$dfromv' and payment_date<'$dtov' and invoice_id<>'0' group by invoice_id";
                            else  $s = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and invoice_id<>'0' group by invoice_id";
                        }else{
                            $s = "select * from payment_voucher where employeeid='$userid' and payment_date>'$dfromv' and payment_date<'$dtov' and invoice_id<>'0' group by invoice_id";
                        }
                        $r = $conn->query($s);
                        if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                            $totpaid=0;
                            if($mtype=="ADMIN"){
                                if($_GET["src_employeeid"]=="0") $s1 = "select * from payment_voucher where payment_date>'$dfromv' and payment_date<'$dtov' and invoice_id='".$rs["invoice_id"]."' order by invoice_id"; 
                                else $s1 = "select * from payment_voucher where employeeid='".$_GET["src_employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and invoice_id='".$rs["invoice_id"]."' order by invoice_id";
                            }else{
                                $s1 = "select * from payment_voucher where employeeid='$userid' and payment_date>'$dfromv' and payment_date<'$dtov' and invoice_id='".$rs["invoice_id"]."' order by invoice_id";
                            }
                            $r1 = $conn->query($s1);
                            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $totpaid=($rs1["dr_amt"]+$totpaid); } }
                            
                            $globalpaid=($globalpaid+$totpaid);
                            
                            $pdate="";    
                            $pdate=date("d-M-Y",$rs["payment_date"]);
                                
                            $clientname="";
                            $r1x = "select * from uerp_user where id='".$rs["paid_to"]."' order by id asc limit 1";
                            $r1y = $conn->query($r1x);
                            if ($r1y->num_rows > 0) { while($r1z = $r1y -> fetch_assoc()) { $clientname="".$r1z["username"]." ".$r1z["username2"].""; } }
                            
                            $employeename="";
                            $r2x = "select * from uerp_user where id='".$rs["employeeid"]."' order by id asc limit 1";
                            $r2y = $conn->query($r2x);
                            if ($r2y->num_rows > 0) { while($r2z = $r2y -> fetch_assoc()) {
                                $employeename="".$r2z["username"]." ".$r2z["username2"]."";
                                $employeeaddress="".$r2z["address"].", ".$r2z["city"].", ".$r2z["area"].", ".$r2z["zip"].", ".$r2z["country"]."";
                                $employeephone=$r2z["phone"];
                            } }
                            
                            $myexperienceX="myexperienceX".$rs["id"]."";
                            $myexperienceY="myexperienceY".$rs["id"]."";
                            
                            echo"<tr>
                                <td align='left' style='font-size:10pt'>$pdate</td>
                                <td align='center' style='font-size:10pt'>".$rs["invoice_id"]."</td>
                                <td align='left' style='font-size:10pt'>$employeename</td>
                                <td align='right' style='font-size:12pt'><b>";
                                    setlocale(LC_MONETARY, 'en_AU.UTF-8');
                                    $payable= money_format('%.2n', $totpaid);
                                    echo"$payable</b>
                                </td>
                                <td align='center' style='font-size:10pt'>
                                    <table><tr><td>
                                        <a href='#' class='btn btn-default' data-toggle='modal' data-target='#$myexperienceY' style='margin-top:0px;color:$topbar_color'><i class='fa fa-eye'></i></a> &nbsp;&nbsp;
                                    </td><td>
                                        <a href='#' class='btn btn-default' onclick=\"printDiv('$myexperienceY')\" style='margin-top:0px;color:$topbar_color'><i class='fa fa-print'></i></a>
                                    </td><td>
                                        <form id='form' method='get' class='wizard-big' action='excel/payslip2pdf.php' target='dataprocessor' name='outputform' enctype='multipart/form-data'> 
                                            <input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                                            <input type=hidden name='dfrom' value='".$_GET["dfrom"]."'>
                                            <input type=hidden name='dto' value='".$_GET["dto"]."'>
                                            <input type=submit value='PDF' class='form-control' style='margin-top:0px;width:80px;background-color:#ffffff;color:$topbar_color' onmouseover=\"document.outputform.pointer.value='PDF'\">
                                            <input type=hidden name='smsbd' value='reporting-forms'><input type=hidden name='kroyee' value='payslip-reports'>
                                            <input type=hidden name='sheba' value='1708323155'><input type=hidden name='pointer' value=''>
                                        </form>
                                    </td>
                                    </tr></table>
                                
                                    <div class='modal inmodal' id='$myexperienceY' tabindex='-1' role='dialog' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content animated bounceInUp' id='$myexperienceY'>
                                                <div class='modal-body' style='padding:10px'>
                                                    <table style='width:100%;border-color:#FFFFFF;padding:10px'>
                                                        <tr style='background-color:#FFFFFF'><td style='width:50%' align=left><img src='https://app.goodwillcare.net/gwc-logo.jpg' style='width:100px'><br></td>
                                                            <td align=right style='font-size:8pt;width:50%'>
                                                                <b>GOODWILL CARE</b><br>ABN: 53662401372<br>132 Tower Street, Panania, 2213.<br>Email: info@goodwillcare.com.au<br>Phone: 1800 070 872, 0488 330 333
                                                            </td>
                                                        </tr><tr>
                                                            <td align=left style='font-size:8pt;width:50%'><br><b>$employeename</b><br>$employeeaddress<br>$employeephone</td>
                                                            <td style='width:50%' align=right>
                                                                <table>
                                                                    <tr><td style='font-size:8pt' align=right>Payment Date</td><td style='font-size:8pt'>:</td><td style='font-size:8pt' align=right  nowrap><b>$pdate</b></td></tr>
                                                                    <tr><td style='font-size:8pt' align=right>Gross Earning</td><td style='font-size:8pt'>:</td><td style='font-size:8pt' align=right><b>$payable</b></td></tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table><hr>
                                                        
                                                    <table style='width:100%'>
                                                        <thead><tr>
                                                            <td align=left nowrap style='font-size:8pt'><b>Shift ID</b></td>
                                                            <td align=left style='font-size:8pt'><b>Particulars</b></td>
                                                            <td align=right nowrap style='font-size:8pt'><b>Paid Amount</b></td>
                                                        </tr></thead>
                                                        <tbody>";
                                                            $s3 = "select * from payment_voucher where employeeid='".$rs["employeeid"]."' and payment_date>'$dfromv' and payment_date<'$dtov' and invoice_id='".$rs["invoice_id"]."' order by invoice_id";
                                                            $r3 = $conn->query($s3);
                                                            if ($r3->num_rows > 0) { while($rs3 = $r3->fetch_assoc()) {
                                                                $paidamount=($dr_amt+$paidamount);
                                                                echo"<tr>
                                                                    <td align=left nowrap valign=top style='font-size:8pt'><b>".$rs3["invoice_id"]."-".$rs3["payroll_id"]."</b></td>
                                                                    <td align=left style='font-size:8pt'>";
                                                                        $s4 = "select * from shifting_allocation where id='".$rs3["payroll_id"]."' order by id desc limit 1";
                                                                        $r4 = $conn->query($s4);
                                                                        if ($r4->num_rows > 0) { while($rs4 = $r4->fetch_assoc()) { 
                                                                            $sdate="";
                                                                            $sdate=date("l, d-m-Y", $rs4["sdate"]);
                                                                            $thw=$rs4["sdate"];
                                                                            $tow=$rs4["sdate"];
                                                                            
                                                                            echo"<span style='color:blue;font-size:8pt'>$sdate</span><br>";
                                                                        } }
                                                                    echo"".$rs3["narration"]."</td>
                                                                    <td align=right nowrap valign=top style='font-size:10pt'><b>$".$rs3["dr_amt"]."</b></td>
                                                                </tr>";
                                                            } }
                                                            echo"<tr><td align=left style='font-size:8pt' colspan=5><hr></td></tr>
                                                            <tr>
                                                                <td align=left style='font-size:8pt'></td>
                                                                <td align=right style='font-size:8pt'><b>Total Paid :</b></td>
                                                                <td align=right style='font-size:10pt'><b>$payable</b></td>
                                                            </tr>
                                                            <tr><td align=left style='font-size:8pt' colspan=5><hr></td></tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>";
                            echo"<div class='modal inmodal' id='$myexperienceX' tabindex='-1' role='dialog' aria-hidden='true'>
                                <div class='modal-dialog'><div class='modal-content animated bounceInUp'>Note:<br>".$rs["narration"]."</div></div>
                            </div>";
                        } }
                        echo"<tr style='background-color:black;color:white'>
                            <td align='right' style='font-size:12pt' colspan=3><b>Total Paid from $datefrom to $dateto:</td>
                            <td align='right' style='font-size:14pt'><b>";
                                setlocale(LC_MONETARY, 'en_AU.UTF-8');
                                $globalpaid1= money_format('%.2n', $globalpaid);
                                echo"$globalpaid1</b>
                            </td>
                            <td></td>
                        </tr>";
                       
                    echo"</table>";
                }    
            echo"</div>
            
        </div><br><br><br><br><br><br>
    </div>";
?>

<script> 
    function printDiv() { 
        var divContents = document.getElementById("printthisarea").innerHTML; 
        var a = window.open('', '', 'height=500, width=100%'); 
        a.document.write('<html>'); 
        a.document.write('<body >'); 
        a.document.write(divContents); 
        a.document.write('</body></html>'); 
        a.document.close(); 
        a.print(); 
    } 
</script> 



    <!---
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>
    <script src="js/plugins/toastr/toastr.min.js"></script>
    --->
    
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                           $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
    
    
    <script type="text/javascript">
        $(function () {
            var i = -1;
            var toastCount = 0;
            var $toastlast;

            $('#showshiftingnotification').click(function (){
                toastr.success('Notification sent to user for quick response.','Shift Allocation Updated.'),
                toastr.options = {
                  "closeButton": false,
                  "debug": false,
                  "progressBar": true,
                  "preventDuplicates": false,
                  "positionClass": "toast-bottom-right",
                  "onclick": null,
                  "showDuration": "200",
                  "hideDuration": "100",
                  "timeOut": "3000",
                  "extendedTimeOut": "100",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
            });
            function getLastToast(){
                return $toastlast;
            }
            $('#clearlasttoast').click(function () {
                toastr.clear(getLastToast());
            });
            $('#cleartoasts').click(function () {
                toastr.clear();
            });
        })
    </script>
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