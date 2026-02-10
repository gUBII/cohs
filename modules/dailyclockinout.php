<?php
        
        date_default_timezone_set("Australia/Melbourne");
        include("../system/include.php");
        
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
        echo"&nbsp;&nbsp; $dd-$dm-$dy $timenowx<hr>";
        if(isset($_COOKIE["shiftingidtoday"])){
            echo"<table class='table table-bordered table-hover dataTables-example' style='background-color:#FFFFFF'>
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
                            if($tdiff1<=$timenow) echo"<tr class='gradeX' style='background-color:red;color:white'>";
                            else echo"<tr class='gradeX' style='background-color:white;color:black'>";
                        }else if($rs7["clockin"]!=0 AND $rs7["clockout"]==0){
                            $tdiff2=0;
                            $tdiff2=strtotime($rs7["etime"]);
                            if($tdiff2<=$timenow) echo"<tr class='gradeX' style='background-color:orange;color:black'>";
                            else echo"<tr class='gradeX' style='background-color:lightgreen;color:black'>";
                        }else if($rs7["clockin"]!=0 AND $rs7["clockout"]!=0){
                            echo"<tr class='gradeX' style='background-color:lightblue;color:black'>";
                        }else{
                            echo"<tr class='gradeX' style='background-color:white;colorblack'>"; 
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


