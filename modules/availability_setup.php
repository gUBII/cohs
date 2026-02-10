<?php    
    date_default_timezone_set("Australia/Melbourne");
    // if($sourcefrom!="APP") echo"<div style='margin-top:-50px'>";
    
    if(isset($_COOKIE["projectid"])){
        
        if($_COOKIE["projectid"]=="0"){
        
            $sheba="shifting_allocation";
            $cid=10001;
            $title="Assign New Shift";
            $utype="Availability Setup";
            $week_number = date("W", strtotime('now'));
                
            if(!isset($_GET["src_employeeid"])) $src_employeeid="ALL";
            else $src_employeeid=$_GET["src_employeeid"];
            
            if($sourcefrom!="APP"){
                echo"<div class='row'>
                    <div class='col-12 col-md-5' style='padding-bottom:10px'>
                        <h1 class='mb-0 pb-0 display-4' id='title'>Work Availability Setup</h1>
                        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                            <ul class='breadcrumb pt-0'>
                                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                                if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Scheduling</a></li>";
                                if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                            echo"</ul>
                        </nav>
                    </div>
                    
                </div>";
            }
            
            echo"<div>
                <div class='data-table-rows slim' id='sample'>
                    <div class='data-table-responsive-wrapper'>
                        <table width=100%><tr>
                            
                            <td align=left width='50'>
                                <form method='get' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                    <input type='hidden' name='projectid' value='0'><input type=hidden name='url' value='".$_GET["url"]."'>
                                    <input type=hidden name='id' value='".$_GET["id"]."'><input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                                    <input type=submit class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' value=\"Current Week\" style='margin-right:5px' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Current Week'>
                                </form>
                            </td>
                            <td align=left width='50' nowrap>";
                                ?><script type="text/javascript">
                                    // function myDateFunction() {
                                    //   document.getElementById("shift_date").submit();
                                    // }
                                    $( function() {
                                        $('#datepicker').change(function(){
                                            $('#shift_date').submit();
                                        });
                                    });
                                </script> <?php
                                
                                $weekvar=strtotime($_COOKIE["shiftingid"]);
                                $weekvar1=date("W", $weekvar);
                                $weekvar2=date("Y", $weekvar);
                                $weekvar="$weekvar2-W$weekvar1";
                                                
                                $weekvar3=$weekvar2;
                                $prevweek=($weekvar1-1);
                                if($prevweek<=0){
                                    $prevweek=52;
                                    $weekvar3=($weekvar2-1);
                                }    
                                if($prevweek<=9) $prevweek="0$prevweek";
                                $prevweek="$weekvar3-W$prevweek";
                                                
                                $weekvar4=$weekvar2;
                                $weekcopy=($weekvar1+1);
                                if($weekcopy<=9) $weekcopy="0$weekcopy";
                                if($weekcopy>=53){
                                    $weekvar4=($weekvar2+1);
                                    $weekcopy="01";
                                }
                                $weekcopy="$weekvar4-W$weekcopy";
                                                
                                if(isset($_GET["src_employeeid"])){
                                    $src_employeeid=$_GET["src_employeeid"];
                                }else{
                                    $src_employeeid="";
                                }
                                
                                echo"<table><tr>
                                    <td style='align:right;width:30px'><form method='post' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                        <input type='hidden' name='shiftingidtoday1' value='$prevweek'><input type=hidden name='url' value='".$_GET["url"]."'>
                                        <input type=hidden name='id' value='".$_GET["id"]."'><input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                                        <button type='submit' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Previous Week'><i class='fa fa-chevron-left'></i></button>
                                    </form></td>
                                    <td><form method='post' name='shift_date' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                        <input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'><input type=hidden name='url' value='".$_GET["url"]."'>
                                        <input type=hidden name='id' value='".$_GET["id"]."'>
                                        <input type='week' id='datepicker' name='shiftingid' class='form-control form-control-sm' value='$weekvar' onchange='this.form.submit()'>
                                    </form></td>
                                    <td style='align:left;width:30px'><form method='post' name='shift_today' action='scheduling-set.php' target='_self' enctype='multipart/form-data'>
                                        <input type='hidden' name='shiftingidtoday1' value='$weekcopy'><input type=hidden name='url' value='".$_GET["url"]."'>
                                        <input type=hidden name='id' value='".$_GET["id"]."'><input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
                                        <button type='submit' class='btn btn-outline-success btn-icon btn-icon-start w-md-auto btn-sm' data-bs-delay='0' data-bs-offset='0,3' data-bs-toggle='tooltip' data-bs-placement='bottom' title='Previous Week'><i class='fa fa-chevron-right'></i></button>
                                    </form></td>
                                </tr></table>
                            </td><td align=right>";
                                
                            echo"</td>
                        </tr></table>
                    </div>";
                    
                    echo"<div class='tab-content'><hr>
                        <table class='data-table data-table-pagination data-table-standard responsive nowrap stripe hover' id='myTable' style='width:100%'>
                            <tr style='position:sticky;margin-top:100px;top:0;z-index:1;height:70px' class='btn-primary'>
                                <th class='text-medium text-uppercase'>AVAILABILITY TABLE</th>";
                                
                                $todayx=$_COOKIE["shiftingid"];
                                // $todayx=time();
                                $todayx=strtotime($todayx);
                                $todayz=time();
                                $y= date("Y", $todayx);
                                
                                $m1= date("M", $todayx); $d1= date("d", $todayx); $mm1= date("m", $todayx); $d11= date("l", $todayx);
                                $m2= date("M", $todayx); $d2=($d1+1); $mm2= date("m", $todayx); $d22= date('l', strtotime('+1 day', $todayx));
                                $m3= date("M", $todayx); $d3=($d1+2); $mm3= date("m", $todayx); $d33= date('l', strtotime('+2 day', $todayx));
                                $m4= date("M", $todayx); $d4=($d1+3); $mm4= date("m", $todayx); $d44= date('l', strtotime('+3 day', $todayx));
                                $m5= date("M", $todayx); $d5=($d1+4); $mm5= date("m", $todayx); $d55= date('l', strtotime('+4 day', $todayx));
                                $m6= date("M", $todayx); $d6=($d1+5); $mm6= date("m", $todayx); $d66= date('l', strtotime('+5 day', $todayx));
                                $m7= date("M", $todayx); $d7=($d1+6); $mm7= date("m", $todayx); $d77= date('l', strtotime('+6 day', $todayx));
                                
                                if($m1=="Jan" || $m1=="Mar" || $m1=="May" || $m1=="Jul" || $m1=="Aug" || $m1=="Oct" || $m1=="Dec") $lastdate=31;
                                else $lastdate=30;
                                if($m1=="Feb") $lastdate=date("t", $todayx); 
                                
                                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////                            
                                if($d1==$lastdate){
                                    $todayx=strtotime('+1 day', $todayx);
                                    $y= date("Y", $todayx);
                                    $m2= date("M", $todayx); $d2=date("d", $todayx); $mm2= date("m", $todayx); $d22= date("l", $todayx);
                                    $m3= date("M", $todayx); $d3=($d2+1); $mm3= date("m", $todayx); $d33= date('l', strtotime('+1 day', $todayx));
                                    $m4= date("M", $todayx); $d4=($d2+2); $mm4= date("m", $todayx); $d44= date('l', strtotime('+2 day', $todayx));
                                    $m5= date("M", $todayx); $d5=($d2+3); $mm5= date("m", $todayx); $d55= date('l', strtotime('+3 day', $todayx));
                                    $m6= date("M", $todayx); $d6=($d2+4); $mm6= date("m", $todayx); $d66= date('l', strtotime('+4 day', $todayx));
                                    $m7= date("M", $todayx); $d7=($d2+5); $mm7= date("m", $todayx); $d77= date('l', strtotime('+5 day', $todayx));
                                }
                                if($d2==$lastdate){
                                    $todayx=strtotime('+2 day', $todayx);
                                    $y= date("Y", $todayx);
                                    $m3= date("M", $todayx); $d3=date("d", $todayx); $mm3= date("m", $todayx); $d33= date("l", $todayx);
                                    $m4= date("M", $todayx); $d4=($d3+1); $mm4= date("m", $todayx); $d44= date('l', strtotime('+1 day', $todayx));
                                    $m5= date("M", $todayx); $d5=($d3+2); $mm5= date("m", $todayx); $d55= date('l', strtotime('+2 day', $todayx));
                                    $m6= date("M", $todayx); $d6=($d3+3); $mm6= date("m", $todayx); $d66= date('l', strtotime('+3 day', $todayx));
                                    $m7= date("M", $todayx); $d7=($d3+4); $mm7= date("m", $todayx); $d77= date('l', strtotime('+4 day', $todayx));
                                }
                                if($d3==$lastdate){
                                    $todayx=strtotime('+3 day', $todayx);
                                    $y= date("Y", $todayx);
                                    $m4= date("M", $todayx); $d4=date("d", $todayx); $mm4= date("m", $todayx); $d44= date("l", $todayx);
                                    $m5= date("M", $todayx); $d5=($d4+1); $mm5= date("m", $todayx); $d55= date('l', strtotime('+1 day', $todayx));
                                    $m6= date("M", $todayx); $d6=($d4+2); $mm6= date("m", $todayx); $d66= date('l', strtotime('+2 day', $todayx));
                                    $m7= date("M", $todayx); $d7=($d4+3); $mm7= date("m", $todayx); $d77= date('l', strtotime('+3 day', $todayx));
                                }
                                if($d4==$lastdate){
                                    $todayx=strtotime('+4 day', $todayx);
                                    $y= date("Y", $todayx);
                                    $m5= date("M", $todayx); $d5=date("d", $todayx); $mm5= date("m", $todayx); $d55= date("l", $todayx);
                                    $m6= date("M", $todayx); $d6=($d5+1); $mm6= date("m", $todayx); $d66= date('l', strtotime('+1 day', $todayx));
                                    $m7= date("M", $todayx); $d7=($d5+2); $mm7= date("m", $todayx); $d77= date('l', strtotime('+2 day', $todayx));
                                }
                                if($d5==$lastdate){
                                    $todayx=strtotime('+5 day', $todayx);
                                    $y= date("Y", $todayx);
                                    $m6= date("M", $todayx); $d6=date("d", $todayx); $mm6= date("m", $todayx); $d66= date("l", $todayx);
                                    $m7= date("M", $todayx); $d7=($d6+1); $mm7= date("m", $todayx); $d77= date('l', strtotime('+1 day', $todayx));
                                }
                                if($d6==$lastdate){
                                    $todayx=strtotime('+6 day', $todayx);
                                    $y= date("Y", $todayx);
                                    $m7= date("M", $todayx); $d7=date("d", $todayx); $mm7= date("m", $todayx); $d77= date("l", $todayx);
                                }
                                
                                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                if($d2<=9 and $d2!="01") $d222="0$d2"; else $d222=$d2;
                                if($d3<=9 and $d3!="01") $d333="0$d3"; else $d333=$d3;
                                if($d4<=9 and $d4!="01") $d444="0$d4"; else $d444=$d4;
                                if($d5<=9 and $d5!="01") $d555="0$d5"; else $d555=$d5;
                                if($d6<=9 and $d6!="01") $d666="0$d6"; else $d666=$d6;
                                if($d7<=9 and $d7!="01") $d777="0$d7"; else $d777=$d7;
                                
                                $tdate=date("l", strtotime('now'));
                                if($tdate=="$d11") $bgcolor1=""; else $bgcolor1="";
                                if($tdate=="$d22") $bgcolor2=""; else $bgcolor2="";
                                if($tdate=="$d33") $bgcolor3=""; else $bgcolor3="";
                                if($tdate=="$d44") $bgcolor4=""; else $bgcolor4="";
                                if($tdate=="$d55") $bgcolor5=""; else $bgcolor5="";
                                if($tdate=="$d66") $bgcolor6=""; else $bgcolor6="";
                                if($tdate=="$d77") $bgcolor7=""; else $bgcolor7="";
                                
                                if($d1<=$lastdate) echo"<th class='text-uppercase' style='font-size:8pt;color:'>$d11 $d1<br>$m1, $y</th>";
                                if($d2<=$lastdate) echo"<th class='text-uppercase' style='font-size:8pt;color:'>$d22 $d222<br>$m2, $y</th>";
                                if($d3<=$lastdate) echo"<th class='text-uppercase' style='font-size:8pt;color:'>$d33 $d333<br>$m3, $y</th>";
                                if($d4<=$lastdate) echo"<th class='text-uppercase' style='font-size:8pt;color:'>$d44 $d444<br>$m4, $y</th>";
                                if($d5<=$lastdate) echo"<th class='text-uppercase' style='font-size:8pt;color:'>$d55 $d555<br>$m5, $y</th>";
                                if($d6<=$lastdate) echo"<th class='text-uppercase' style='font-size:8pt;color:'>$d66 $d666<br>$m6, $y</th>";
                                if($d7<=$lastdate) echo"<th class='text-uppercase' style='font-size:8pt;color:'>$d77 $d777<br>$m7, $y</th>";
                                echo"<th style='width:120px'>&nbsp;</th>";
                            echo"</tr>
                            <tbody id='datatableX'>";
                                
                                if($mtype=="ADMIN") $ra7 = "select * from uerp_user where status='1' and mtype='USER' or status='1' and mtype='ADMIN' or status='1' and mtype='EMPLOYEE' order by username asc";
                                else $ra7 = "select * from uerp_user where id='$userid' and status='1' order by username asc";
                                $rb7 = $conn->query($ra7);
                                if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {
                                    echo"<tr>
                                        <td nowrap><center>";
                                            $simage=null;
                                            $simage=$rab7["images"];
                                            if(strlen("$simage")>=3){
                                                if (!file_exists($simage) || empty($simage)) {
                                                    echo"<img alt='profile' src='assets/noimage.png' style='border:1px solid #ccc;border-radius:5px;width:50px;' title='".$rab7["username"]."'/>";
                                                } else echo"<img alt='profile' src='$simage' style='border:1px solid #ccc;border-radius:5px;width:50px;' title='".$rab7["username"]."'/>";
                                            } else echo"<img alt='profile' src='assets/noimage.png' style='border:1px solid #ccc;border-radius:5px;width:50px;' title='".$rab7["username"]."'/>";
                                            
                                            echo"<br><span style='font-size:8pt'>".$rab7["username"]." ".$rab7["username2"]."</a>
                                        </td>";
                                    
                                        if($d1<=$lastdate){
                                            $empid=$rab7["id"];
                                            $empuid=$rab7["unbox"];
                                            $datatarget="$empid$y-$mm1-$d1";
                                            $datatarget11="$empuid$d1$y";
                                            $getData="getData$d1";
                                        
                                            $lts=0;
                                            $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$d1' and month='$mm1' and year='$y' and status='1' order by id asc limit 1";
                                            $lt2 = $conn->query($lt1);
                                            if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                            if($lts==1){
                                                echo"<td valign=top style='text-align:center;vertical-align:middle;padding:0px;background-color:grey'><div style='width:100%;text-align:center;padding:0px'>
                                                    <br>Not Available
                                                    <hr><a href='scheduling-set.php?dd=$d1&mm=$mm1&yy=$y&empid33=".$rab7["id"]."' target='dataprocessor' class='btn-active btn btn-xs'>Set Available</a>
                                                </div></td>";
                                            }else{
                                                echo"<td valign=top style='vertical-align:middle;padding:0px;background-color:$bgcolor1;'><div style='width:100%;text-align:right;padding:0px'>
                                                    <a href='scheduling-set.php?dd=$d1&mm=$mm1&yy=$y&empidx=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
                                                </div></td>";
                                            }
                                        }
                                        
                                        if($d2<=$lastdate){
                                            $empid=$rab7["id"];
                                            $empuid=$rab7["unbox"];
                                            $datatarget="$empid$y-$mm2-$d222";
                                            $datatarget2="$empuid$d222$y";
                                            $getData="getData$d222";
                                                    
                                            $lts=0;
                                            $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$d222' and month='$mm2' and year='$y' and status='1' order by id asc limit 1";
                                            $lt2 = $conn->query($lt1);
                                            if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                            if($lts==1){
                                                echo"<td valign=top style='text-align:center;vertical-align:middle;padding:0px;background-color:grey'><div style='width:100%;text-align:center;padding:0px'>
                                                    <br>Not Available
                                                    <hr><a href='scheduling-set.php?dd=$d222&mm=$mm2&yy=$y&empid33=".$rab7["id"]."' target='dataprocessor' class='btn-active btn btn-xs'>Set Available</a>
                                                </div></td>";
                                            }else{
                                                echo"<td valign=top style='vertical-align:middle;padding:0px;background-color:$bgcolor2'><div style='width:100%;text-align:right;'>
                                                    <a href='scheduling-set.php?dd=$d222&mm=$mm2&yy=$y&empidx=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
                                                </div></td>";
                                            }
                                        }
                                        
                                        if($d3<=$lastdate){
                                            $empid=$rab7["id"];
                                            $empuid=$rab7["unbox"];
                                            $datatarget="$empid$y-$mm3-$d333";
                                            $datatarget2="$empuid$d333$y";
                                            $getData="getData$d333";
                                                    
                                            $lts=0;
                                            $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$d333' and month='$mm3' and year='$y' and status='1' order by id asc limit 1";
                                            $lt2 = $conn->query($lt1);
                                            if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                            if($lts==1){
                                                echo"<td valign=top style='text-align:center;vertical-align:middle;padding:0px;background-color:grey'><div style='width:100%;text-align:center;padding:0px'>
                                                    <br>Not Available 1
                                                    <hr><a href='scheduling-set.php?dd=$d333&mm=$mm3&yy=$y&empid33=".$rab7["id"]."' target='dataprocessor' class='btn-active btn btn-xs'>Set Available</a>
                                                </div></td>";
                                            }else{
                                                echo"<td valign=top style='vertical-align:middle;padding:0px;background-color:$bgcolor3'><div style='width:100%;text-align:right;'>
                                                    <a href='scheduling-set.php?dd=$d333&mm=$mm3&yy=$y&empidx=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
                                                </div></td>";
                                            }
                                        }
    
                                        if($d4<=$lastdate){
                                            $empid=$rab7["id"];
                                            $empuid=$rab7["unbox"];
                                            $datatarget="$empid$y-$mm4-$d444";
                                            $datatarget2="$empuid$d444$y";
                                            $getData="getData$d444";
                                            $lts=0;
                                            $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$d444' and month='$mm4' and year='$y' and status='1' order by id asc limit 1";
                                            $lt2 = $conn->query($lt1);
                                            if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                            if($lts==1){
                                                echo"<td valign=top style='text-align:center;vertical-align:middle;padding:0px;background-color:grey'><div style='width:100%;text-align:center;padding:0px'>
                                                    <br>Not Available
                                                    <hr><a href='scheduling-set.php?dd=$d444&mm=$mm4&yy=$y&empid33=".$rab7["id"]."' target='dataprocessor' class='btn-active btn btn-xs'>Set Available</a>
                                                </div></td>";
                                            }else{
                                                echo"<td valign=top style='vertical-align:middle;padding:0px;background-color:$bgcolor4'><div style='width:100%;text-align:right;'>
                                                    <a href='scheduling-set.php?dd=$d444&mm=$mm4&yy=$y&empidx=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
                                                </div></td>";
                                            }
                                        }
                                        
                                        if($d5<=$lastdate){
                                            $empid=$rab7["id"];
                                            $empuid=$rab7["unbox"];
                                            $datatarget="$empid$y-$mm5-$d555";
                                            $datatarget2="$empuid$d555$y";
                                            $getData="getData$d555";
                                                    
                                            $lts=0;
                                            $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$d555' and month='$mm5' and year='$y' and status='1' order by id asc limit 1";
                                            $lt2 = $conn->query($lt1);
                                            if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                            if($lts==1){
                                                echo"<td valign=top style='text-align:center;vertical-align:middle;padding:0px;background-color:grey'><div style='width:100%;text-align:center;padding:0px'>
                                                    <br>Not Available
                                                    <hr><a href='scheduling-set.php?dd=$d555&mm=$mm5&yy=$y&empid33=".$rab7["id"]."' target='dataprocessor' class='btn-active btn btn-xs'>Set Available</a>
                                                </div></td>";
                                            }else{
                                                echo"<td valign=top style='vertical-align:middle;padding:0px;background-color:$bgcolor5'><div style='width:100%;text-align:right;'>
                                                    <a href='scheduling-set.php?dd=$d555&mm=$mm5&yy=$y&empidx=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
                                                </div></td>";
                                            }
                                        }
                                        
                                      
                                        if($d6<=$lastdate){
                                            $empid=$rab7["id"];
                                            $empuid=$rab7["unbox"];
                                            $datatarget="$empid$y-$mm6-$d666";
                                            $datatarget2="$empuid$d666$y";
                                            $getData="getData$d666";
                                                    
                                            $lts=0;
                                            $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$d666' and month='$mm6' and year='$y' and status='1' order by id asc limit 1";
                                            $lt2 = $conn->query($lt1);
                                            if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                            if($lts==1){
                                                echo"<td valign=top style='text-align:center;vertical-align:middle;padding:0px;background-color:grey'><div style='width:100%;text-align:center;padding:0px'>
                                                    <br>Not Available
                                                    <hr><a href='scheduling-set.php?dd=$d666&mm=$mm6&yy=$y&empid33=".$rab7["id"]."' target='dataprocessor' class='btn-active btn btn-xs'>Set Available</a>
                                                </div></td>";
                                            }else{
                                                echo"<td valign=top style='vertical-align:middle;padding:0px;background-color:$bgcolor6'><div style='width:100%;text-align:right;'>
                                                    <a href='scheduling-set.php?dd=$d666&mm=$mm6&yy=$y&empidx=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
                                                </div></td>";
                                            }
                                        }
                                        
                                        // echo"<td style='border-left: 1px solid #333333'>7</td>";  
                                        
                                        if($d7<=$lastdate){
                                            $empid=$rab7["id"];
                                            $empuid=$rab7["unbox"];
                                            $datatarget="$empid$y-$mm7-$d777";
                                            $datatarget2="$empuid$d777$y";
                                            $getData="getData$d777";
                                                    
                                            $lts=0;
                                            $lt1 = "select * from leave_asign where cid='".$rab7["id"]."' and day='$d777' and month='$mm7' and year='$y' and status='1' order by id asc limit 1";
                                            $lt2 = $conn->query($lt1);
                                            if ($lt2->num_rows > 0) { while($lt12 = $lt2 -> fetch_assoc()) { $lts=1; } }
                                            if($lts==1){
                                                echo"<td valign=top style='text-align:center;vertical-align:middle;padding:0px;background-color:grey'><div style='width:100%;text-align:center;padding:0px'>
                                                    <br>Not Available
                                                    <hr><a href='scheduling-set.php?dd=$d777&mm=$mm7&yy=$y&empid33=".$rab7["id"]."' target='dataprocessor' class='btn-active btn btn-xs'>Set Available</a>
                                                </div></td>";
                                            }else{
                                                echo"<td valign=top style='vertical-align:middle;padding:0px;background-color:$bgcolor7'><div style='width:100%;text-align:right;'>
                                                    <a href='scheduling-set.php?dd=$d777&mm=$mm7&yy=$y&empidx=".$_COOKIE["userid"]."' class='btn btn-info'>Set Unavailable</a>
                                                </div></td>";
                                            }
                                        }
                                           
                                    echo"<td style='width:120px'>&nbsp;</td></tr>";
                                } }
                                
                            echo"</tbody>
                        </table>
                    </div>";
                
                echo"</div>";

                // REQUESTS 
                echo"<div class='modal fade modal-close-out' id='buttonrequest' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabelCloseOut'>Re-Schedule Requests</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body' style='padding:5px'>
                                <div style='width:100%' id='datarequestX'>
                                    <table class='table stripe table-hover' style='width:100%;padding:10px'>
                                        <thead><tr>
                                            <th nowrap style='font-size:8pt'>Client Name</th>
                                            <th nowrap style='font-size:8pt'>Employee</th>
                                            <th nowrap style='font-size:8pt'>Assigned</th>
                                            <th nowrap style='font-size:8pt' colspan=2>Req. Time</th>
                                        </tr></thead>
                                        <tbody>";
                                        
                                        $ttx=0;
                                        $r1 = "select * from shifting_allocation where request2='1' order by id desc";
                                        $r1x = $conn->query($r1);
                                        if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                                            
                                            $projectname="";
                                            $pstatus=0;
                                            $r1a = "select * from project where id='".$r1y['projectid']."' and status='1' order by id asc limit 1";
                                            $r1b = $conn->query($r1a);
                                            if ($r1b->num_rows > 0) { while($r1c = $r1b -> fetch_assoc()) {
                                                $projectname=$r1c["name"];
                                                $pstatus=1;
                                            } }
                                            
                                            if($pstatus!=0){
                                                
                                                $clientname="";
                                                $r1ax = "select * from uerp_user where id='".$r1y['clientid']."' order by id asc limit 1";
                                                $r1bx = $conn->query($r1ax);
                                                if ($r1bx->num_rows > 0) { while($r1cx = $r1bx -> fetch_assoc()) { $clientname="".$r1cx["username"]." ".$r1cx["username2"].""; } }
                                                
                                                $employeename="";
                                                $r1ay = "select * from uerp_user where id='".$r1y['employeeid']."' order by id asc limit 1";
                                                $r1by = $conn->query($r1ay);
                                                if ($r1by->num_rows > 0) { while($r1cy = $r1by -> fetch_assoc()) {
                                                    $employeename="".$r1cy["username"]." ".$r1cy["username2"]."";
                                                    $employeephone=$r1cy["phone"];
                                                } }
                                                
                                                $stimeA1="";
                                                $etimeA1="";
                                                $stimeA=strtotime($r1y["stime"]);
                                                $etimeA=strtotime($r1y["etime"]);
                                                $stimeA1=date("h:i A", $stimeA);
                                                $etimeA1=date("h:i A", $etimeA);
                                                
                                                $stimeR1="";
                                                $etimeR1="";
                                                $stimeR=strtotime($r1y["stime2"]);
                                                $etimeR=strtotime($r1y["etime2"]);
                                                $stimeR1=date("h:i A", $stimeR);
                                                $etimeR1=date("h:i A", $etimeR);
                                                
                                                $ttx=($ttx+1);
                                                
                                                echo"<tr class='gradeX'>
                                                    <td nowrap style='font-size:8pt'>$clientname<br>@ $projectname</td>
                                                    <td nowrap style='font-size:8pt'>$employeename<br><a href='tel:$employeephone'>$employeephone</a></td>
                                                    <td nowrap style='font-size:8pt'><i class='fa fa-clock-o' style='color:black'></i> $stimeA1<br><i class='fa fa-clock-o' style='color:black'></i> $etimeA1</td>
                                                    <td nowrap style='font-size:8pt'><b><i class='fa fa-clock-o' style='color:black'></i> $stimeR1<br><i class='fa fa-clock-o' style='color:black'></i> $etimeR1</b></td>
                                                    <td style='width:70px;font-size:8pt'>".$r1y["days"]."-".$r1y["months"]."-".$r1y["years"]."<br>
                                                        <div class='btn-group' onmouseout=\"requestdata('100000', 'datarequestX')\">
                                                            <a href='updaterecord.php?rid=".$r1y["id"]."&approval=1' target='dataprocessor' style='margin-top:0px;' title='Accept'>
                                                                <i class='fa fa-thumbs-up' style='color:blue;font-size:10pt'></i>
                                                            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a href='updaterecord.php?rid=".$r1y["id"]."&approval=0' target='dataprocessor' style='margin-top:0px;' title='Reject'>
                                                                <i class='fa fa-thumbs-down' style='color:red;font-size:10pt'></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>";
                                                
                                            }
                                            
                                        } }
                                        
                                    echo"</tbody></table>
                                
                                </div>";
                                ?><script type="text/javascript">
                                    function requestdata(shiftid1,shiftid2){
                                        $.ajax({
                                            url: 'request-list.php?<?php echo"days=$d1&months=$mm1&years=$y&" ?>sid='+shiftid1, 
                                            success: function(html) {
                                                var ajaxDisplay = document.getElementById(shiftid2);
                                                ajaxDisplay.innerHTML = html;
                                            }
                                        });
                                    }
                                </script> <?php
                            echo"</div>
                        </div>
                    </div>
                </div>";
                
                // EMAIL
                echo"<div class='modal fade modal-close-out' id='buttonemail' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabelCloseOut'>Email Notification</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body'>
                                <form class='m-t' role='form' method='post' action='email_sender.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='processor' value='sendemail'>
                                    <div class='modal-body'>
                                        <div class='row'>
                                            <div class='col-md-12'>
                                                <div class='form-group'>
                                                    <label>Employee/Client *</label>
                                                    <select class='form-control m-b ' name='receiverid' required>
                                                        <option value=''>Select Employee/Client</option>";
                                                        $rz111 = "select * from uerp_user where mtype='USER' and status='1' order by username asc";
                                                        $rz11 = $conn->query($rz111);
                                                        if ($rz11->num_rows > 0) { while($rz1 = $rz11->fetch_assoc()) { echo"<option value='".$rz1["id"]."'>".$rz1["username"]." ".$rz1["username2"]."</option>"; } }
                                                        echo"<option value=''><hr></option>";
                                                        $rz222 = "select * from uerp_user where mtype='CLIENT' and status='1' order by username asc";
                                                        $rz22 = $conn->query($rz222);
                                                        if ($rz22->num_rows > 0) { while($rz2 = $rz22->fetch_assoc()) { echo"<option value='".$rz2["id"]."'>".$rz2["username"]." ".$rz2["username2"]."</option>"; } }
                                                        
                                                        $timex=time();
                                                    echo"</select>
                                                </div>
                                            </div>
                                            <div class='col-md-12'><div class='form-group'><br><br>
                                                <label for='start_datetime' class='control-label'>Subject</label>
                                                <input type='text' class='form-control form-control-sm rounded-0' name='subject' value='' required>
                                            </div></div>
                                            <div class='col-md-12'><div class='form-group'><br><br>
                                                <label for='start_datetime' class='control-label'>Messasge</label>
                                                <textarea id='summernote' name='message' col=20 class='form-control'></textarea>
                                            </div></div>
                                            <div class='col-md-12'><div class='form-group' style='text-align:right'><br><br>
                                                <label for='end_datetime' class='control-label'>&nbsp;</label>
                                                <input type='submit' class='btn btn-primary' value='Send Email'>
                                            </div></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";
                
                // SHIFT
                echo"<div class='modal fade modal-close-out' id='ShiftModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabelCloseOut'>Shift Template Create/Modify</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body' id='PopupModalX'>
                                <form method='POST' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='processor' value='schedulelist'><input type='hidden' name='id' value=''>
                                    <div class='row'>
                                        <div class='col-md-12' style='padding-bottom:20px'><div class='form-group'><label>Participant/Job *</label><select class='form-control m-b ' name='projectid' required>
                                            <option value=''>Select Project/Participant</option>";
                                            $ra7 = "select * from project where status='1' order by id asc";
                                            $rb7 = $conn->query($ra7);
                                            if ($rb7->num_rows > 0) { while($rab7 = $rb7->fetch_assoc()) {
                                                $clientname="";
                                                $clientcolor="";
                                                $ra8 = "select * from uerp_user where id='".$rab7["clientid"]."' order by id asc";
                                                $rb8 = $conn->query($ra8);
                                                if ($rb8->num_rows > 0) { while($rab8 = $rb8->fetch_assoc()) {
                                                    $clientname1=$rab8["username"];
                                                    $clientname2=$rab8["username2"];
                                                    $clientname="$clientname1 $clientname2";
                                                }}
                                                echo"<option value='".$rab7["id"]."''>$clientname <br> ".$rab7["name"]."</option>";
                                            } }
                                            $timex=time();
                                            $dd=date("d",$timex);
                                            $mm=date("m",$timex);
                                            $yy=date("Y",$timex);
                                        echo"</select></div></div>
                                        <div class='col-md-4'><div class='form-group'>
                                            <label for='start_datetime' class='control-label'>Clock-In Time</label>
                                            <input type='hidden' class='form-control form-control-sm rounded-0' name='sdate' value='$yy-$mm-$dd'>
                                            <input type='time' class='form-control form-control-sm rounded-0' name='stime' value='08:00' required>
                                        </div></div>
                                        <div class='col-md-4'><div class='form-group'>
                                            <label for='end_datetime' class='control-label'>Clock-Out Time</label>
                                            <input type='hidden' class='form-control form-control-sm rounded-0' name='edate' value='$yy-$mm-$dd'>
                                            <input type='time' class='form-control form-control-sm rounded-0' name='etime' value='17:00'  required>
                                        </div></div>
                                        <div class='col-md-2'><div class='form-group'>
                                            <label for='end_datetime' class='control-label'>Over Night?</label>
                                            <input type='checkbox' class='btn btn-primary' value='1' name='over_night'>
                                        </div></div>
                                        <div class='col-md-2'><div class='form-group'>
                                            <label for='end_datetime' class='control-label'>&nbsp;</label>
                                            <input type='submit' class='btn btn-primary' value='Save' onblur=\"shiftdataV2('schedule-list.php?days=$d1&months=$mm1&years=$y&sid=0', 'datashiftXX')\">
                                        </div></div>                                
                                    </div>
                                </form><br><br>
                            
                                <div style='width:100%' id='datashiftXX'>";
                                    // <body onload='sortTable(0)'>
                                    echo"<table class='table stripe table-hover' id='mySortTable' style='width:100%;padding:5px'>
                                        <thead><tr><th nowrap style='font-size:10pt' onclick='sortTable(0)'>Project/Client Name</th>
                                            <th nowrap style='font-size:10pt'>Clock-in/out</th>
                                            <th nowrap style='font-size:10pt'>O. Night</th>
                                            <th nowrap style='font-size:10pt'>Color</th>
                                            <th></th></tr>
                                        </thead>
                                        <tbody>";
                                            $ttx=0;
                                            $r1 = "select * from shifting_schedule order by id desc";
                                            $r1x = $conn->query($r1);
                                            if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                                                $pstatus=0;
                                                $projectname="";
                                                $r1a = "select * from project where id='".$r1y['projectid']."' and status='1' order by id asc limit 1";
                                                $r1b = $conn->query($r1a);
                                                if ($r1b->num_rows > 0) { while($r1c = $r1b -> fetch_assoc()) {
                                                    $projectname=$r1c["name"];
                                                    $pstatus=1;
                                                    $clientname="";
                                                    $r1ax = "select * from uerp_user where id='".$r1c['clientid']."' order by id asc limit 1";
                                                    $r1bx = $conn->query($r1ax);
                                                    if ($r1bx->num_rows > 0) { while($r1cx = $r1bx -> fetch_assoc()) {
                                                        $clientname1=$r1cx["username"]; $clientname2=$r1cx["username2"]; $clientname="$clientname1 $clientname2";
                                                    } }
                                                    $projcolor=$r1c["color"];
                                                } }
                                                $ttx=($ttx+1);
                                                if($pstatus!=0){
                                                    echo"<tr class='gradeX'>
                                                        <td style='font-size:10pt'>$clientname<br>$projectname</td>
                                                        <td nowrap style='font-size:10pt'>
                                                            <form name='form_$ttx' method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                                                <input type='hidden' name='processor' value='shiftinglist'><input type='hidden' name='id' value='".$r1y["id"]."'>
                                                                <input type='time' name='stime' value='".$r1y['stime']."' onchange='this.form.submit()'><br>
                                                                <input type='time' name='etime' value='".$r1y['etime']."' onchange='this.form.submit()'>
                                                            </form>
                                                        </td>
                                                        <td nowrap style='font-size:10pt'>
                                                            <form name='form_$ttx' method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                                                <input type='hidden' name='processor' value='shiftinglist1'><input type='hidden' name='id' value='".$r1y["id"]."'>";
                                                                if($r1y['night']==1) echo"<input type='checkbox' name='over_night' value='0' checked onchange='this.form.submit()'>";
                                                                else echo"<input type='checkbox' name='over_night' value='1' onchange='this.form.submit()'>";
                                                            echo"</form>
                                                        </td>
                                                        <td nowrap style='font-size:10pt'>
                                                            <form name='form_$ttx' method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                                                <input type='hidden' name='processor' value='shiftinglist2'><input type='hidden' name='projectid' value='".$r1y['projectid']."'>
                                                                <input type='color' name='pcolor' value='$projcolor' style='padding:0px;width:50px' onblur='this.form.submit()'>
                                                            </form>
                                                        </td>
                                                        <td style='width:20px' style='font-size:10pt'><div class='btn-group' onmouseout=\"shiftdataV2('schedule-list.php?days=$d1&months=$mm1&years=$y&sid=0', 'datashiftXX')\">
                                                            <a href='deleterecords.php?delid=".$r1y["id"]."&tbl=shifting_schedule' target='dataprocessor' style='margin-top:0px'>
                                                                <i class='fa fa-trash'></i>
                                                            </a>
                                                        </div></td>
                                                    </tr>";
                                                }
                                            } }
                                        echo"</tbody>
                                    </table>
                                </div>"; ?>
                                 <?php
                            echo"</div>
                        </div>
                    </div>
                </div>
            </div>";


            // JOBS
            echo"<div class='modal inmodal cardt' id='jobsmodal' tabindex='-1' role='dialog' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content animated bounceInUp' style='text-align:left'>";
                        $ttx=0;
                        echo"<br><div style='width:95%'>
                            <table class='table stripe table-hover dataTables-jobs' style='width:100%;padding:0px'>
                                <thead><tr><th nowrap>Project & Participant</th><th nowrap>Support Co-ordinator</th><th>Theme</th></tr></thead><tbody>";
                                $r1 = "select * from project where status='1' order by id asc";
                                $r1x = $conn->query($r1);
                                if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                                    $clientname="";
                                    $r1a = "select * from uerp_user where id='".$r1y["clientid"]."' order by id asc limit 1";
                                    $r1b = $conn->query($r1a);
                                    if ($r1b->num_rows > 0) { while($r1c = $r1b -> fetch_assoc()) {
                                        $clientname1=$r1c["username"];
                                        $clientname2=$r1c["username2"];
                                        $clientname="$clientname1 $clientname2";
                                    } }
                                    $leadername="";
                                    $r1a = "select * from uerp_user where id='".$r1y["leaderid"]."' order by id asc limit 1";
                                    $r1b = $conn->query($r1a);
                                    if ($r1b->num_rows > 0) { while($r1c = $r1b -> fetch_assoc()) {
                                        $leadername1=$r1c["username"];
                                        $leadername2=$r1c["username2"];
                                        $leadername="$leadername1 $leadername2";
                                    } }
                                    echo"<tr class='gradeX'>
                                        <td nowrap style='font-size:8pt'>".$r1y["name"]."<br>$clientname</td>
                                        <td style='font-size:8pt'>$leadername</td>
                                        <td align=center nowrap>";
                                            $ttx=($ttx+1);
                                            echo"<form class='m-t' name='form_$ttx' role='form' method='post' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                            				    <input type='hidden' name='processor' value='jobslist'><input type='hidden' name='projectid' value='".$r1y["id"]."'>
                            				    <input type='color' name='pcolor' value='".$r1y["color"]."' style='padding:0px;width:80px' onblur='this.form.submit()'>";
                            				    // <button type='submit' class='form-control form-control-sm rounded-0' style='border:0;padding:0px;height:20px;width:20px'><i class='fa fa-upload' style='color:#777777'></i></button>
                                            echo"</form>
                                        </tb>
                                    </tr>";
                                } }
                            echo"</tbody></table>
                        </div>
                    </div>
                </div>
            </div>";
            
            // COPY TO CERTAIN DATE
            echo"<div class='modal fade modal-close-out' id='schedulecopyday' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabelCloseOut'>Copy Date To Date</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body' style='padding:5px'>
                                <form class='m-t' role='form' method='post' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                				    <input type='hidden' name='processor' value='cloneday'><input type='hidden' name='id' value=''>
                				    <input type='hidden' name='redirect' value='schedule-board'>
                				    <div class='modal-body'>
                                        <div class='row'>
                				            <div class='col-md-12'><div class='form-group'>
                				                <label>Project Name *</label>
                				                <select class='form-control m-b ' name='employeeid' required>
                                                    <option value='ALL'>All Employee</option>";
                                                    /*
                                                    $s7 = "select * from uerp_user where mtype='USER' or mtype='ADMIN' order by username asc";
                                                    $r7 = $conn->query($s7);
                                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                    } }
                                                    */
                                                    $copydate=time();
                                                    $copydate=date("Y-m-d", $copydate);
                                            echo"</select></div></div>
                                            <div class='col-md-6'><div class='form-group'>
                				                <label>DATE FROM *</label>
                				                <input type='date' id='datepicker' name='datefrom' class='form-control' value='$copydate' required>
                                            </div></div>
                                            <div class='col-md-6'><div class='form-group'>
                				                <label>TO DATE *</label>
                				                <input type='date' id='datepicker' name='dateto' class='form-control' value='' required>
                                            </div></div>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-white' data-bs-dismiss='modal'>Close</button>
                                        <input type='submit' class='btn btn-primary recordupdated' value='Clone Day' onblur=\"shiftdataV2('schedule-list.php?days=$d1&months=$mm1&years=$y&sid=0', 'datatableX')\"> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            
            // COPY TO CERTAIN WEEK
            echo"<div class='modal fade modal-close-out' id='schedulecopyweek' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabelCloseOut'>Copy Week</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body' style='padding:5px'>
                                <form class='m-t' role='form' method='POST' name='wcopy' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                				    <input type='hidden' name='processor' value='cloneweek'><input type='hidden' name='id' value=''>
                				    <input type='hidden' name='redirect' value='schedule-board'>
                				    <div class='modal-body'>
                                        <div class='row'>
                				            <div class='col-md-12'><div class='form-group'>
                				                <label>Employee/User Name *</label>
                				                <select class='form-control m-b ' name='employeeid' required>
                                                    <option value='ALL'>All Employee</option>";
                                                    /*
                                                    $s7 = "select * from uerp_user where mtype='USER' or mtype='ADMIN' order by username asc";
                                                    $r7 = $conn->query($s7);
                                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                    } }
                                                    */
                                            echo"</select></div></div>
                                            <div class='col-md-6'><div class='form-group'>
                				                <label>COPY WEEK FROM *</label>
                				                <input type='week' id='weekpicker' name='weekfrom' class='form-control' value='$weekvar'>
                                            </div></div>
                                            <div class='col-md-6'><div class='form-group'>
                				                <label>COPY WEEK TO *</label>
                				                <input type='week' id='weekpicker' name='weekto' class='form-control' value='$weekcopy'>
                                            </div></div>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-white' data-bs-dismiss='modal'>Close</button>
                                        <input type='submit' class='btn btn-primary recordupdated' value='Clone Week' onblur=\"shiftdataV2('schedule-list.php?days=$d1&months=$mm1&years=$y&sid=0', 'datashiftXX')\">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            
            // WIPE TO CERTAIN WEEK
            echo"<div class='modal fade modal-close-out' id='scheduledeleteweek' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabelCloseOut'>Copy Week</h5>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body' style='padding:5px'>
                                <form class='m-t' role='form' method='POST' name='wcopy' action='dataprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                				    <input type='hidden' name='processor' value='wipeweek'><input type='hidden' name='id' value=''>
                				    <input type='hidden' name='redirect' value='schedule-board'>
                				    <div class='modal-body'>
                                        <div class='row'>
                				            <div class='col-md-6'><div class='form-group'>
                				                <label>Employee/User Name *</label>
                				                <select class='form-control m-b ' name='employeeid' required>
                                                    <option value='ALL'>All Employee</option>";
                                                    /*
                                                    $s7 = "select * from uerp_user where mtype='USER' or mtype='ADMIN' order by username asc";
                                                    $r7 = $conn->query($s7);
                                                    if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                        echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>";
                                                    } }
                                                    */
                                            echo"</select></div></div>
                                            <div class='col-md-6'><div class='form-group'>
                				                <label>SELECE A WEEK TO WIPE *</label>
                				                <input type='week' id='weekpicker' name='weekto' required class='form-control' value=''>
                                            </div></div>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-white' data-bs-dismiss='modal'>Close</button>
                                        <input type='submit' class='btn btn-primary' value='Wipe This Week' onblur=\"shiftdataV2('schedule-list.php?days=$d1&months=$mm1&years=$y&sid=0', 'datashiftXX')\">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            
            // MOVE TO CERTAIN DATE
            echo"<div class='modal fade modal-close-out' id='schedulemover1' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-body' id='schedulemover2'></div>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                </div>
            </div>";    
        }
    }else{
        echo"<form method='get' action='scheduling-set.php' name='main' target='_top'>
            <input type=text name='projectid' value='0'><input type=hidden name='url' value='".$_GET["url"]."'>
            <input type=text name='id' value='".$_GET["id"]."'><input type=hidden name='src_employeeid' value='".$_GET["src_employeeid"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
    
    if($sourcefrom!="APP") echo"</div>";
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
            <script>
                function myFunctionX() {
                    alert("Schedule Allocated.");
                }
            </script>
            
            <script>
                thead th {
                    position: sticky;
                    top: 0;
                    background-color: #f2f2f2; /* Optional: Add a background color for better visibility */
                    z-index: 1; /* Optional: Ensure the header stays on top */
                }
            </script>