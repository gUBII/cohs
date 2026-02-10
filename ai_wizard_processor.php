<?php
include 'authenticator.php';

echo"<!DOCTYPE html><html lang='en' data-footer='true'>";

    include 'head.php';
    
    ?><style>
        .video-container {
            height: 120%;
            width: 100%;
            position: relative;
        }
        
        .video-container video {
            width: 100%;
            height: 100%;
            position: absolute;
            object-fit: cover;
            z-index: 0;
        }
         
        .video-container .caption {
            z-index: 1;
            position: relative;
            padding: 10px;
        }
        
        #grad1 {
            background-color: red;
            background-image: linear-gradient(128deg, #121212, red);
        }
        .typewriter h1 {
          overflow: hidden;
          /* border-right: .15em solid black; */
          white-space: nowrap;
          margin: 0 auto;
          
          animation: 
            typing 1.0s steps(30, end),
            blink-caret .5s step-end infinite;
        }
        
        .typewriter {
          color: #fff;
          overflow: hidden;
          border-right: .15em solid black;
          white-space: nowrap;
          margin: 0 auto;
          
          animation: 
            typing 1.5s steps(30, end),
            blink-caret .5s step-end infinite;
        }
        
        /* The typing effect */
        @keyframes typing {
          from { width: 0 }
          to { width: 100% }
        }
        
        /* The typewriter cursor effect */
        @keyframes blink-caret {
          from, to { border-color: transparent }
          50% { border-color: orange }
        }
    </style><?php
    
    echo"<body style='padding:0px;background-color:black'>";
    
        if(isset($_POST["doprocess"])){
            
            $s1 = "select * from ai_wizard order by id desc limit 1";
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                $clientname=$rs1["clientname"];
                $ndisnumber=$rs1["ndisnumber"];
                $description=$rs1["description"];
                $ndisitemnumber=$rs1["ndisitemnumber"];
                $unit=$rs1["unit"];
                $price=$rs1["price"];
            } }
            
            // finding client on database
            $found=0;
            $s2 = "select * from uerp_user where username='$clientname' or username2='$clientname' order by id desc limit 1";
            $r2 = $conn->query($s2);
            if ($r2->num_rows > 0) { while($rs2 = $r2->fetch_assoc()) { $found=$rs2["id"];  } }
            if($found==0){
                $randid= rand(100000000,999999999);
                $pdate=time();
                $sql = "insert into uerp_user (uid,date,jointime,status,agentid,unbox,passbox,username,mtype) VALUES ('$randid','$pdate','$pdate','1','0','$randid','$randid','$clientname','CLIENT')";
                if ($conn->query($sql) === TRUE) $tomtom=0;
                $s22 = "select * from uerp_user order by id desc limit 1";
                $r22 = $conn->query($s22);
                if ($r22->num_rows > 0) { while($rs22 = $r22->fetch_assoc()) { $found=$rs2["id"];  } }
            }
            
            if($found!=0){
                
                // SUPPORT WORKER 1
                $s3 = "select * from uerp_user where mtype='EMPLOYEE' or mtype='USER' order by id desc limit 1";
                $r3 = $conn->query($s3);
                if ($r3->num_rows > 0) { while($rs3 = $r3->fetch_assoc()) {
                    $sw1=$rs3["id"];
                    $sw11="".$rs3["username"]." ".$rs3["username2"]."";
                } }
                
                // SUPPORT WORKER 2
                $s4 = "select * from uerp_user where mtype='EMPLOYEE' or mtype='USER' order by id desc limit 1";
                $r4 = $conn->query($s4);
                if ($r4->num_rows > 0) { while($rs4 = $r4->fetch_assoc()) {
                    $sw2=$rs4["id"];
                    $sw22="".$rs4["username"]." ".$rs4["username2"]."";
                } }
                
                // SUPPORT CO-ORDINATOR 2
                $s5 = "select * from uerp_user where id='1' order by id desc limit 1";
                $r5 = $conn->query($s5);
                if ($r5->num_rows > 0) { while($rs5 = $r5->fetch_assoc()) {
                    $sc1=$rs5["id"];
                    $sc11="".$rs5["username"]." ".$rs5["username2"]."";
                } }
                
                
                // CREATING PROJECT DATA
                $sdate=time();
                $edate=strtotime('+2 years', $sdate);
                $sql = "insert into project (name,clientid,stime,etime,color,rate,rate_type,priority,leaderid,note,status,start_date,end_date,teamleaderid) 
                VALUES ('$clientname (AI Powered)','$found','08:00','17:00','#CCCCCC','$price','$unit','High','$sw1','$description $ndisitemnumber $price/$unit','1','$sdate','$edate','1')";
                if ($conn->query($sql) === TRUE){
                    $s1 = "select * from project where clientid='$found' and name='$clientname (AI Powered)' and status='1' order by id desc limit 1";
                    $r1 = $conn->query($s1);
                    if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) { $projid=$rs1["id"]; } }
                    if(isset($projid)){
                        
                        // ASSIGNING SHIFTING IN ROSTER
                        $sql = "insert into shifting_schedule (projectid,stime,etime,status) VALUES ('$projid','08:00','17:00','1')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                        
                        // ALLOCATING SUPPORT WORKER 1
                        $sql = "insert into project_team_allocation (projectid,employeeid,position,date,status) VALUES ('$projid','$sw1','1','$sdate','1')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                        
                        // ALLOCATING SUPPORT WORKER 2
                        $sql = "insert into project_team_allocation (projectid,employeeid,position,date,status) VALUES ('$projid','$sw2','1','$sdate','1')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                        
                        // ALLOCATING SERVICE AGREEMENT FORM
                        $sql = "insert into service_agreement_addon (description,ndis_item,unit,price,qty,status,projectid,clientid) VALUES ('$description','$ndisitemnumber','$unit','$price','1','1','$projid','$found')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                        
                        // ASSIGNED ROSTER FOR TODAY
                        $dd=date("d",time());
                        $mm=date("m",time());
                        $yy=date("Y",time());
                        $stime=date("Y-m-d 08:00",time());
                        $sdate=strtotime($stime);
                        $etime=date("Y-m-d 17:00",time());
                        $edate=strtotime($etime);
                        $sql = "insert into shifting_allocation (employeeid,projectid,clientid,days,months,years,stime,edays,emonths,eyears,etime,accepted,status,color,address,sdate) VALUES 
                        ('$sw1','$projid','$found','$dd','$mm','$yy','$stime','$dd','$mm','$yy','$etime','1','1','#EEEEEE','n/a','$sdate')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                        
                        // CREATING INVOICE.
                        $ctime=time();
                        $ctime=($ctime/4);
                        $invoice_no="INV-$ctime";
                        $invoice_date=time();
                        $sql = "insert into ndis_invoices (ledger_id,received_from,employeeid,invoice_no2,receipt_date,date_from,date_to) VALUES ('800000032','$found','1','$invoice_no','$invoice_date','$invoice_date','$invoice_date')";
                        if ($conn->query($sql) === TRUE) $tomtom=0;
                        
                        echo"<div class='video-container' style='width:100%;height:300px'>
                            <video autoplay muted loop style='opacity:0.5'><source src='https://www.nexis365.com/saas/assets/nexis-ai-flow0.mp4' type='video/mp4' /></video>
                            <div style='z-index:999999999;padding:20px' id='dynamicTextContainer' class='caption'></div>
                        </div>";
                    }
                }
            }
        } ?>
        
        <script>
            function startAnimation() {
                const messages = [<?php echo"
                    'Data Extracttion Started...',
                    'Creating Project for Client $clientname', // PHP variable injected here
                    'Assigned $sc11 Smith as Support Co-ordinator Jhon, Maria.',
                    'Assigned $sw11 and $sw22 as Support Worker.',
                    'Sent Notification to Support Works and Client.',
                    'Assigned Shifts & Rostered for Client.',
                    'Assigned Task to Support Workers.',
                    'Created Invoice with $description',
                    'Item Line Number: $ndisitemnumber and $price/$unit .',
                    'Project Created Successfully',
                    'You can View Project now. Thank you.'
                "; ?>];
                
                const container = document.getElementById("dynamicTextContainer");
                let index = 0;
                
                function showMessage() {
                    if (index < messages.length) {
                        let messageElement = document.createElement("div");
                        messageElement.className = "typewriter";
                        messageElement.innerText = messages[index];
                        container.appendChild(messageElement);
                        
                        setTimeout(() => {
                            messageElement.style.opacity = "1";
                            readText(messages[index]);
                        }, 100);
                        
                        index++;
                        setTimeout(showMessage, 2000);
                    }
                }
                
                showMessage();
            }
            
            function readText(text) {
                const speech = new SpeechSynthesisUtterance();
                speech.text = text;
                speech.lang = 'en-US';
                speechSynthesis.speak(speech);
            }
            
        </script><?php
    
        include 'scripts.php';
    
    echo"</body>
</html>";

?>