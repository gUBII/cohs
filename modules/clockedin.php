<?php
    error_reporting(0);

    if(isset($_COOKIE["projectid"])){
        if($_COOKIE["projectid"]=="0"){
            
            $sheba="shifting_allocation";
            $cid=10001;
            $title="Assign New Shift";
            $utype="ROSTERING";

            date_default_timezone_set("Australia/Sydney");
            $timenow=time();
            $timenowx=date("h:i:s A", $timenow);
            $currentday=date("l", $timenow);
                        
            $tyear=substr($_COOKIE["shiftingidtoday"],0,4);
            $tmonth=substr($_COOKIE["shiftingidtoday"],5,2);
            $tday=substr($_COOKIE["shiftingidtoday"],8,2);
            
            $dd=date("d", $timenow);
            $dm=date("m", $timenow);
            $dy=date("Y", $timenow);
            
            $shift_today=date("Y-m-d", $timenow);
            ?><!-- <script language=JavaScript> document.shift_today.submit(); </script> --><?php

            $week_number = date("W", strtotime('now'));
            
            if(!isset($_POST["src_employeeid"])) $src_employeeid="ALL";
            else $src_employeeid=$_POST["src_employeeid"];
            
            echo"<div class='row'>
                <div class='col-12 col-md-5' style='padding-bottom:10px'>
                    
                    <h1 class='mb-0 pb-0 display-4' id='title'>Daily Shifts</h1>
                
                    <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                        <ul class='breadcrumb pt-0'>
                            <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                            if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Scheduling</a></li>";
                            if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                        echo"</ul>
                    </nav>
                </div>
                <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
                    
                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#buttonemail' style='margin-right:5px'>
                        <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Email Notification' ><i data-acorn-icon='email'></i></span>
                    </button>

                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#buttonrequest' style='margin-right:5px'>
                        <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Re-Schedule Requests' ><i data-acorn-icon='cursor-pointer'></i></span>
                    </button>

                    <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='modal' data-bs-target='#buttontemplates' style='margin-right:5px'>
                        <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Shift Templates' ><i data-acorn-icon='clock'></i></span>
                    </button>";

                    // <button class='btn dim' data-toggle='modal' data-target='#emailmodal'><i class='fa fa-envelope' style='color:#777777'></i>&nbsp; Send Email</button>
                    // <button class='btn dim' data-toggle='modal' data-target='#requestmodal' onclick=\"requestdata('100000', 'datarequestX')\"><i class='fa fa-hand-paper-o' style='color:#777777'></i>&nbsp; Requests</button>
                    // <button class='btn dim' data-toggle='modal' data-target='#shiftingmodal'><i class='fa fa-clock-o' style='color:#777777'></i>&nbsp; Shift</button>";
                    // <button class='btn-active btn btn-xs' data-toggle='modal' data-target='#jobsmodal'><i class='fa fa-briefcase' style='color:#777777'></i>&nbsp; Jobs</button>";
                    // <button class='btn-active btn btn-xs' data-toggle='modal' data-target='#activitymodal'><i class='fa fa-th' style='color:#777777'></i>&nbsp; Activity</button>
                    // <button class='btn-active btn btn-xs' data-toggle='modal' data-target='#settingsmodal'><i class='fa fa-cogs' style='color:#777777'></i>&nbsp; Settings</button>



                    echo"<button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('invoice_manager.php?cid=$cid&sheba=$sheba&ctitle=$title&utype=$utype', 'offcanvasRight')\" style='margin-right:5px'>
                        <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Asign New Shift' ><i data-acorn-icon='plus'></i></span>
                    </button>

                    <a href='index.php?url=time_sheet.php&id=5162' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:5px'>
                        <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Time Sheet' ><i data-acorn-icon='clock'></i><i data-acorn-icon='file-text'></i></span>
                    </a>

                    <div class='btn-group ms-1 check-all-container'>
                        <div class='d-inline-block'>
                            
                            <table><tr><td nowrap>
                                <form method='post' action='cookie_set.php' target='dataprocessor' enctype='multipart/form-data' name='ChartModeForm'>
                                    <input type='hidden' name='chartmode' value='1'>
                                    <a onmouseover=\"document.ChartModeForm.submit()\" onmouseup=\"shiftdataV2('chart_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'chartmodeX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='chart-4'></i></a>
                                </form>
                            </td><td nowrap>
                                <form method='post' action='cookie_set.php' target='dataprocessor' enctype='multipart/form-data' name='ViewModeForm'>
                                    <input type='hidden' name='viewmode' value='LIST'>
                                    <a onmouseover=\"document.ViewModeForm.viewmode.value='LIST'; document.ViewModeForm.submit()\" onmouseup=\"shiftdataV2('invoice_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='list'></i></a>
                                    <a onmouseover=\"document.ViewModeForm.viewmode.value='CARD'; document.ViewModeForm.submit()\" onmouseup=\"shiftdataV2('invoice_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\" href='#' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='calendar'></i></a>                        
                                    <a href='print_data.php?pointer=PRINT&printid=$sheba' target='dataprocessor' class='btn btn-icon btn-icon-only btn-outline-muted btn-sm ' type='button' data-datatable='#datatableStripe'><i data-acorn-icon='print'></i></a>
                                </form>
                            </td><td nowrap>
                                <div class='d-inline-block datatable-export' data-datatable='#datatableStripe' style='margin-top:-15px;margin-left:4px'>
                                    <button class='btn btn-icon btn-icon-only btn-outline-muted btn-sm dropdown' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'>
                                        <i data-acorn-icon='download'></i>
                                    </button>
                                    <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end'>
                                        <form method='get' action='print_data.php' target='dataprocessor' enctype='multipart/form-data' name='PrintForm'>
                                            <input type='hidden' name='pointer' value='PDF'><input type='hidden' name='printid' value='$sheba'>
                                            <a class='dropdown-item' href='#' onmouseover=\"document.PrintForm.pointer.value='PDF'\" onclick=\"document.PrintForm.submit()\">Pdf</a>                                
                                        </form>
                                        <a id='notifyButtonBottomLeft' href='#' onclick=\"CopyToClipboard('sample');return false;\">Copy</a>
                                        <form method='get' action='print_excel.php' target='dataprocessor' enctype='multipart/form-data' name='ExcelForm'>
                                            <input type='hidden' name='pointer' value='EXCEL'><input type='hidden' name='printid' value='$sheba'>
                                            <a class='dropdown-item' href='#' onmouseover=\"document.ExcelForm.pointer.value='EXCEL'\" onclick=\"document.ExcelForm.submit()\">Excel</a>
                                        </form>
                                        <form method='get' action='print_excel.php' target='dataprocessor' enctype='multipart/form-data' name='CsvForm'>
                                            <input type='hidden' name='pointer' value='CSV'><input type='hidden' name='printid' value='$sheba'>
                                            <a class='dropdown-item' href='#' onmouseover=\"document.CsvForm.pointer.value='CSV'\" onclick=\"document.CsvForm.submit()\">Csv</a>
                                        </form>
                                        
                                    </div>
                                </div>
                            </td></tr></table>
                        </div>
                    </div>
                </div>                  
            </div>
            <div class='data-table-rows slim' id='sample'>
                <div class='data-table-responsive-wrapper'>
                    <table width=100%><tr>
                        
                        <td align=left width='50'>";
                            $shift_today=time();
                            $shift_today=date("Y-m-d", $shift_today);
                            echo"<a class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' href='scheduling-set.php?projectid=0&smsbd=schedule-board-jobs' target='_self' style='margin-right:5px' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Roster by Jobs'>Roster by Jobs</a>
                        </td><td align=left width='50'>
                            <a class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' href='schedule.php?' target='_self' style='margin-right:5px' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Roster by Users'>Roster by Users</a>                            
                        </td>
                        <td align=left width='50' nowrap>
                            <form method='post' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                <input type='hidden' name='shiftingidtoday' class='form-control' value='$shift_today'>
                                <input type=submit style='margin-top:20px' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' value='View Today'  style='margin-right:5px' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='View Today'>
                            </form>
                        </td><td align=right>
                            <table ><tr>
                                <td align=left width=50 nowrap style='padding-right:10px'>
                                    <a href='index.php?smsbd=schedule-board-pdf' target='_self' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' style='margin-top:-15px;margin-right:5px'>
                                        <span class='d-inline-block no-delay' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Print As PDF'>Print PDF</span>
                                    </a>
                                </td>
                                <td align=left width=100 nowrap>
                                    <div class='dropdown-as-select d-inline-block datatable-length' data-datatable='#datatableRows' data-childSelector='span' style='margin-top:-15px;'>
                                        <button class='btn p-0 shadow' type='button' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false' data-bs-offset='0,3'>
                                        <span class='btn btn-foreground-alternate dropdown-toggle' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-delay='0' title='Item Count'>10 Items</span>
                                        </button>
                                        <div class='dropdown-menu shadow dropdown-menu-end'>
                                            <a class='dropdown-item' href='#'>5 Items</a>
                                            <a class='dropdown-item active' href='#'>10 Items</a>
                                            <a class='dropdown-item' href='#'>20 Items</a>
                                        </div>
                                    </div>
                                </td>
                            </tr></table>
                        </td>
                    </tr></table>
                </div>
                
                <div class='tab-content'>";

            
            echo"<div class=row>
                <div class='col-lg-12'>Shift Date: $tday-$tmonth-$tyear</div>
            </div>
            <div class='table-responsive' id='dailyclockinout'>";

                if(isset($_COOKIE["shiftingidtoday"])){
                    echo"<table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                        <thead>
                            <thead><tr><th nowrap>Users-1</th><th>Jobs</th><th>In</th><th>Out</th><th>Clocked In</th><th>Clocked Out</th><th>Total</th></tr></thead>
                        </thead>
                        <tbody>";
                            $s7 = "select * from shifting_allocation where days='$tday' and months='$tmonth' and years='$tyear' and status='1' order by stime asc";
                            $r7 = $conn->query($s7);
                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                $totalworkhour=0;
                                $totalworkclock="00:00:00";
                                $currentdate=date("Y-m-d h:i:s a", $timenow);
                                $clockindate=date("Y-m-d h:i:s a", $rs7["clockin"]);
                                $date1=date_create("$clockindate");
                                $date2=date_create("$currentdate");
                                $diff=date_diff($date1,$date2);
                                $totalworkclock= $diff->format("%H:%I");
                                $totalworkhour= $diff->format("%H Hours");
                                                            
                                $clientname="";
                                $clientaddress="";
                                $s7x = "select * from uerp_user where id='".$rs7["clientid"]."' order by id desc limit 1";
                                $r7x = $conn->query($s7x);
                                if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                    $clientname="".$rs7x["username"]." ".$rs7x["username2"]."";
                                    $clientaddress="".$rs7x["address"].", ".$rs7x["city"].", ".$rs7x["area"]."- ".$rs7x["zip"].", ".$rs7x["country"]."";
                                } }
                                                            
                                $employeename="";
                                $employeephone="";
                                $s7y = "select * from uerp_user where id='".$rs7["employeeid"]."' order by id desc limit 1";
                                $r7y = $conn->query($s7y);
                                if ($r7y->num_rows > 0) { while($rs7y = $r7y->fetch_assoc()) {
                                    $employeename="".$rs7y["username"]." ".$rs7y["username2"]."";
                                    $employeephone=$rs7y["phone"];
                                } }
                                                            
                                if($rs7["clockin"]!=0) $clockedin=date("h:i a", $rs7["clockin"]);
                                else $clockedin=0;
                                                            
                                if($rs7["clockout"]!=0) $clockedout=date("h:i a", $rs7["clockout"]);
                                else $clockedout=0;
                                                            
                                $stime=substr($rs7["stime"],11,5);
                                $etime=substr($rs7["etime"],11,5);
                                $stime1=""; $stime2=""; $sstat="";
                                $etime1=""; $etime2=""; $estat="";
                                $stime1=substr($rs7['stime'],11,2);
                                $stime2=substr($rs7['stime'],14,2);
                                if($stime1>=13){
                                    $stime1=($stime1-12);
                                    if($stime1<="9") $stime1="0$stime1";
                                    $sstat="PM";
                                }else{
                                    $sstat="AM";
                                }
                                if($stime1==00){
                                    $stime1=12;
                                    $sstat="AM";
                                }else if($stime1==12){
                                    $sstat="PM";
                                }
                                $etime1=substr($rs7['etime'],11,2);
                                $etime2=substr($rs7['etime'],14,2);
                                if($etime1>=13){
                                    $etime1=($etime1-12);
                                    if($etime1<="9") $etime1="0$etime1";
                                    $estat="PM";
                                }else{
                                    $estat="AM";
                                }
                                if($etime1==00){
                                    $etime1=12;
                                    $estat="AM";
                                }else if($etime1==12){
                                    $estat="PM";
                                }
                                /*
                                red = not clockedin
                                orange = not clocked out
                                blue = clockedout
                                */
                                if($rs7["clockin"]==0 AND $rs7["clockout"]==0){
                                    $tdiff1=0;
                                    $tdiff1=strtotime($rs7["stime"]);
                                    if($tdiff1<=$timenow) echo"<tr class='gradeX zoom'>";
                                    else echo"<tr class='gradeX zoom'>";
                                }else if($rs7["clockin"]!=0 AND $rs7["clockout"]==0){
                                    $tdiff2=0;
                                    $tdiff2=strtotime($rs7["etime"]);
                                    if($tdiff2<=$timenow) echo"<tr class='gradeX zoom'>";
                                    else echo"<tr class='gradeX zoom'>";
                                }else if($rs7["clockin"]!=0 AND $rs7["clockout"]!=0){
                                    echo"<tr class='gradeX zoom'>";
                                }else{
                                    echo"<tr class='gradeX zoom'>"; 
                                }                                
                                echo"<td nowrap><b>$employeename</b><br>Call: <a href='tel:$employeephone'>$employeephone</a></td>
                                <td nowrap>$clientname<br>$clientaddress</td>
                                <td nowrap>$stime1:$stime2 $sstat</td><td nowrap>$etime1:$etime2 $estat</td>
                                <td nowrap>";
                                    if($rs7["clockin"]!=0) echo"$clockedin <a href='https://maps.google.com/maps?q=".$rs7["latitude_in"].",".$rs7["longitude_in"]."&hl=es;z=14' style='color:black;font-size:8pt' target='_blank'><i class='fa fa-map-marker' aria-hidden='true'></i></a>"; else echo"-";
                                echo"</td><td nowrap>";
                                    if($clockedin!="0" AND $clockedout!="0") echo"$clockedout <a href='https://maps.google.com/maps?q=".$rs7["latitude_out"].",".$rs7["longitude_out"]."&hl=es;z=14' style='color:black;font-size:8pt' target='_blank'><i class='fa fa-map-marker' aria-hidden='true'></i></a>"; else echo"-";
                                echo"</td>
                                <td nowrap></td>
                                </tr>";
                            } }   
                        echo"</tbody>
                    </table>";
                }
            
            echo"</div>";
        }
    }
    
    ?>
    
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/plugins/toastr/toastr.min.js"></script>

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


