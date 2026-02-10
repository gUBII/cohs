<?php
    include 'include.php';
    //include 'head.php';
    $string = $_COOKIE["voiceresult"];    
    $randid=rand(1234123,99999);    
    
    echo"Nexis AI Search Result for $string<br>
    
    <body onload='initializeSpeech()'>
    
    <input type='hidden' id='text' value='Initializing your request $string'>";
    
    $wordx = "create";
    $positionx = stripos($string, $wordx); 
    // if ($positionx !== false){
        $tlen=strlen($string);
        $strreplace = str_ireplace("create ","", $string);
        $positionxx=($positionx+6);
        $newvalue=substr("$string",$positionxx);
        $positiony = stripos($newvalue, " "); 
        $newvalue=substr($string,$positionxx,$positiony);
        
        $invoicez = "invoice";
        $invoicezz = stripos($string, $invoicez); 
        if ($invoicezz == false){
            $invoicez = "unpaid invoice";
            $invoicezz = stripos($string, $invoicez); 
        }
        if ($invoicezz == false){
            $invoicez = "paid invoice";
            $invoicezz = stripos($string, $invoicez); 
        }
        
        if ($invoicezz !== false){
            echo"<button class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' style='margin-right:10px' onmouseover=\"shiftdataV2('invoice_manager.php?cid=1001&sheba=ndis_invoices&ctitle=Create Invoice Template&utype=CREATE INVOICE', 'offcanvasRight')\">
                <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Do you want to create new $strreplace?</span>
            </button> &nbsp;&nbsp;";
            echo"<a href='index.php?url=create_invoice.php&id=5161' class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px' >
                <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Open $strreplace Module?</span>
            </a>";
        }
        
        // if($strreplace=="roster" || $strreplace=="Roaster" || $strreplace=="schedule"){
        
        $rosterz = "roster";
        $rosterzz = stripos($string, $rosterz); 
        if ($rosterzz == false){
            $rosterz = "rooster";
            $rosterzz = stripos($string, $rosterz); 
        }
        if ($rosterzz == false){
            $rosterz = "roaster";
            $rosterzz = stripos($string, $rosterz); 
        }
        
        // echo"$rosterzz";
        if ($rosterzz !== false){
            $d1=date("d",time());
            $m1=date("m",time()); 
            $y1=date("Y",time());
            $tdate=date("Y-m-d", time());
            
            /*
            echo"<form name='$datatarget' method='post' action='schedule-allocation-set.php' target='dataprocessor' enctype='multipart/form-data'>
                <table><tr>
                    <td nowrap><span style='font-size:12pt'>$strreplace For &nbsp;&nbsp;</span></td>
                    <td nowrap><span style='font-size:12pt'><select class='form-control m-b ' name='reidx' required style='width:130px'><option value=''>Select Client</option>";
                        $rz111 = "select * from uerp_user where mtype='USER' and status='1' order by username asc";
                        $rz11 = $conn->query($rz111);
                        if ($rz11->num_rows > 0) { while($rz1 = $rz11->fetch_assoc()) { echo"<option value='".$rz1["id"]."'>".$rz1["username"]." ".$rz1["username2"]."</option>"; } }
                    echo"</select></span></td>
                    <td nowrap><span style='font-size:12pt'>&nbsp;&nbsp; Schedule Date  &nbsp;&nbsp;</span></td>
                    <td><span style='font-size:12pt'><input type='date' class='form-control m-b' name='datex' value='$tdate' style='width:140px'> </span></td>
                    <td nowrap> &nbsp;&nbsp; </td>
                    <td><button type='submit' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' 
                        onmouseover=\"shiftdataV2('schedule-allocation-selector-jobs.php?days=$d1&months=$mm1&years=$y&rdt=$datatarget&empid=".$rab7["id"]."', 'offcanvasRight'); 
                        shiftdataV2('schedule-track-jobs.php?days=$d1&months=$mm1&rdt=$datatarget&years=$y&empid=".$rab7["id"]."', '$datatarget')\">
                        <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>create $strreplace</span>
                    </button></td>
                    <td>
                    </td>
                </tr></table>";
                *//*
                    <hr><span style='font-size:12pt'>
                    <a href='index.php?url=schedule_jobs.php&id=48' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px' >
                        <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Open $strreplace by Jobs?</span>
                    </a>
                    <a href='index.php?url=schedule.php&id=4' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px' >
                        <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>Open $strreplace by Users?</span>
                    </a>
                *//*
            echo"</form>";
            */
            echo"<iframe name='dataprocessorz' src='index.php?url=schedule.php&id=57' height='450' width='100%' scrolling='yes' border='0' frameborder='0'>&nbsp;</iframe>";

        }
        
    // }else{
    
        // $wordz = "open";
        // $positionz = stripos($string, $wordz); 
        // if ($positionz !== false){
            
            echo"Click the link below to open the module.<hr>";
            $m1 = "select * from solutions where parent='0' and status='1' and profile='0' and dashboard='1' order by orders asc";
            $m11 = $conn->query($m1);
            if ($m11->num_rows > 0) { while($m111 = $m11->fetch_assoc()) {
                $v11=0;
                $v22=0;
                $v11=strtolower($m111["name"]);
                $v22=str_replace(" ","_",$v11); 
                $t=0;
                $m2x = "select * from modules where parent='".$m111["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc limit 1";
                $m22x = $conn->query($m2x);
                if ($m22x->num_rows > 0) { while($m222x = $m22x->fetch_assoc()) { $t=($t+1); } }
                if($t>=1){
                    $m2 = "select * from modules where parent='".$m111["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc";
                    $m22 = $conn->query($m2);
                    if ($m22->num_rows > 0) { while($m222 = $m22->fetch_assoc()) {
                        $v1=0;
                        $v2=0;
                        $v1=strtolower($m222["name"]);
                        $v2=str_replace(" ","_",$v1);                            
                        $t=0;
                        $m3 = "select * from modules where parent='".$m222["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc limit 1";
                        $m33 = $conn->query($m3);
                        if ($m33->num_rows > 0) { while($m333 = $m33->fetch_assoc()) { $t=($t+1); }}
                        if($t>=1){
                            $m4 = "select * from modules where parent='".$m222["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc";
                            $m44 = $conn->query($m4);
                            if ($m44->num_rows > 0) { while($m444 = $m44->fetch_assoc()) {
                                $v1=0;
                                $v2=0;
                                $v1=strtolower($m444["name"]);
                                $v2=str_replace(" ","_",$v1);
                                $t=0;
                                $m5 = "select * from modules where parent='".$m444["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc limit 1";
                                $m55 = $conn->query($m5);
                                if ($m55->num_rows > 0) { while($m555 = $m55->fetch_assoc()) { $t=($t+1); }}
                                if($t>=1){
                                    $m6 = "select * from modules where parent='".$m444["id"]."' and status='1' and profile='0' and dashboard='1' order by orders asc";
                                    $m66 = $conn->query($m6);
                                    if ($m66->num_rows > 0) { while($m666 = $m66->fetch_assoc()) {
                                        $v1=0;
                                        $v2=0;
                                        $v1=strtolower($m666["name"]);
                                        $v2=str_replace(" ","_",$v1);
                                        $word = $m444["name"];
                                        $position = stripos($string, $word); 
                                        if ($position !== false) echo"<a href='$mainurl/index.php?url=$v2.php&id=".$m666["id"]."' data-href='$mainurl/index.php?url=$v2.php&id=".$m666["id"]."'><button class='btn btn-outline-quaternary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>Open ".$m666["name"]."</button></a>";
                                    } }
                                }else {
                                    $word = $m444["name"];
                                    $position = stripos($string, $word); 
                                    if ($position !== false) echo"<a href='$mainurl/index.php?url=$v2.php&id=".$m444["id"]."' data-href='$mainurl/index.php?url=$v2.php&id=".$m444["id"]."'><button class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>Open ".$m444["name"]."</button></a>";
                                }
                            } }
                        } else {
                            $word = $m222["name"];
                            $position = stripos($string, $word); 
                            if ($position !== false) echo"<a href='$mainurl/index.php?url=$v2.php&id=".$m222["id"]."' data-href='$mainurl/index.php?url=$v2.php&id=".$m222["id"]."'><button class='btn btn-outline-secondary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>Open ".$m222["name"]."</button></a>";
                        }
                    } } 
                } else {
                    $word = $m111["name"];
                    $position = stripos($string, $word); 
                    if ($position !== false) echo"<a href='$mainurl/index.php?url=$v22.php&id=".$m111["id"]."' data-href='$mainurl/index.php?url=$v22.php&id=".$m111["id"]."'><button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='margin-right:10px'>Open ".$m111["name"]."</button></a>";
                }
                
            } }
        // }
        // else{
        //    echo"Sorry! no match found....";
        //}
    // }
    echo"<br><br><br>";
?>


    <script>
        function initializeSpeech() {
            const text = document.getElementById('text').value;
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'en-US';

            function speak() {
                const voices = window.speechSynthesis.getVoices();
                if (voices.length > 0) {
                    utterance.voice = voices.find(voice => voice.lang === 'en-US') || voices[0];
                }
                window.speechSynthesis.speak(utterance);
            }

            if (window.speechSynthesis.getVoices().length === 0) {
                window.speechSynthesis.addEventListener('voiceschanged', speak);
            } else {
                speak();
            }
        }
    </script>