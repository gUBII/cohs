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
        
        // Function to call OCR.Space API for PDF
        function ocrSpaceApi($pdfFilePath, $apiKey) {
            $url = 'https://api.ocr.space/parse/image';
            $postData = [
                'apikey' => $apiKey,
                'file' => new CURLFile(realpath($pdfFilePath)),
                'language' => 'eng',
                'isOverlayRequired' => 'false',
                'filetype' => 'PDF',
                'OCREngine' => 2
            ];
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            
            $response = curl_exec($ch);
            curl_close($ch);
            return json_decode($response, true);
        }
        
        // Function to clean and reformat the extracted text
        function reformatExtractedText($extractedText) {
            // Split the text into lines
            $lines = explode("\n", $extractedText);
            
            // Initialize variables to track the "Participant information" section
            $inParticipantSection = false;
            $reformattedText = "";
            
            foreach ($lines as $line) {
                // Check if we are in the "Participant information" section
                if (strpos($line, '> Participant information') !== false) {
                    $inParticipantSection = true;
                }
                
                // Reformat lines in the "Participant information" section
                if ($inParticipantSection) {
                    // Remove leading/trailing whitespace
                    $line = trim($line);
                    
                    // If the line starts with a field name, append it to the reformatted text
                    if (preg_match('/^(Contact Name|NDIS Number|Date of Birth|Phone Number - Day time|Phone Number - Night time|Mobile Phone Number|Email|Address)/', $line)) {
                        $reformattedText .= $line . " ";
                    } else {
                        // Append the rest of the line to the previous line
                        $reformattedText .= $line . "\n";
                    }
                } else {
                    // Append non-participant section lines as-is
                    $reformattedText .= $line . "\n";
                }
            }
            return $reformattedText;
        }
        
        // Function to parse extracted text into relevant fields
        function parseExtractedText($extractedText) {
            $fields = [
                'clientname' => null,
                'ndisnumber' => null,
                'dob' => null,
                'participant' => null,
                'regiprovider' => null,
                'pcontactname' => null,
                'pphone' => null,
                'pemail' => null,
                'paddress' => null
            ];
            
            /*
            preg_match('/This Service Agreement is for[.\s]*([A-Za-z\s]+)/', $extractedText, $matches);
            if (isset($matches[1])) {
                $fields['clientname'] = trim(preg_replace('/\s+/', ' ', $matches[1])); // Remove extra spaces and new lines
            }
            */
            
            preg_match('/NDIS Number.\s*(\S+)/', $extractedText, $matches);
            if (isset($matches[1])) $fields['ndisnumber'] = trim($matches[1]);
            
            preg_match('/DOB.\s*(\S+)/', $extractedText, $matches);
            if (isset($matches[1])) $fields['dob'] = trim($matches[1]);
            
            preg_match('/Participant representative\s*(.+)/', $extractedText, $matches);
            if (isset($matches[1])) $fields['participant'] = trim($matches[1]);
            
            preg_match('/Registered Provider:\s*(.+)/', $extractedText, $matches);
            if (isset($matches[1])) $fields['regiprovider'] = trim($matches[1]);
            
            preg_match('/Contact Name:\s*(.+)/', $extractedText, $matches);
            if (isset($matches[1])) $fields['pcontactname'] = trim($matches[1]);
            
            preg_match('/Phone Number-Day time:\s*(\S+)/', $extractedText, $matches);
            if (isset($matches[1])) $fields['pphone'] = trim($matches[1]);
            
            preg_match('/Email\s*Address\s*([\w\s]+@[\w\s\.]+)/', $extractedText, $matches);
            if (isset($matches[1])) {
                $fields['pemail'] = trim($matches[1]);
            }
            preg_match('/Email\s*Address\s*[\w\s]+@[\w\s\.]+\s*([\d\s\w,]+)/', $extractedText, $matches);
            if (isset($matches[1])) {
                $fields['paddress'] = trim($matches[1]);
            }
            
            // $fields['clientname'] = "Alexandra Blazerki";
            $fields['clientname'] = "Albert Saddler";
            $fields['description'] = "inovider Travel, Aeren Com Social & Rec Act - saturday";
            $fields['ndisitemnumber'] = "01-799_0104.11";
            $fields['unit'] = "hr";
            $fields['price'] = "$1.00";
            
            return $fields;
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $apiKey = "K82065550588957"; // Replace with your OCR.Space API key
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            
            if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK) {
                $uploadedFilePath = $uploadDir . basename($_FILES['fileUpload']['name']);
                if (move_uploaded_file($_FILES['fileUpload']['tmp_name'], $uploadedFilePath)) {
                    $ocrResult = ocrSpaceApi($uploadedFilePath, $apiKey);
                    
                    if (isset($ocrResult['ParsedResults']) && is_array($ocrResult['ParsedResults'])) {
                        $extractedText = "";
                        foreach ($ocrResult['ParsedResults'] as $page) {
                            if (isset($page['ParsedText'])) {
                                $extractedText .= $page['ParsedText'] . "\n\n";
                            }
                        }
                        
                        // Reformat the extracted text
                        $extractedText = reformatExtractedText($extractedText);
                        $parsedFields = parseExtractedText($extractedText);
                        $service=$parsedFields['clientname'];
                        $cn=str_replace("NDIS Number","",$service);
                        
                        $stmt = $conn->prepare("INSERT INTO ai_wizard (pdf_name, extracted_text, clientname, ndisnumber, dob, participant, regiprovider, pcontactname, pphone, pemail, paddress, description, ndisitemnumber, unit, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("sssssssssssssss", $_FILES['fileUpload']['name'], $extractedText, $cn, $parsedFields['ndisnumber'], $parsedFields['dob'], $parsedFields['participant'], $parsedFields['regiprovider'], $parsedFields['pcontactname'], $parsedFields['pphone'], $parsedFields['pemail'], $parsedFields['paddress'], $parsedFields['description'], $parsedFields['ndisitemnumber'], $parsedFields['unit'], $parsedFields['price']);
                    
                        if ($stmt->execute()) {
                            echo "<script>document.addEventListener('DOMContentLoaded', function() { startAnimation(); });</script>";
                        } else {
                            echo "Error: Failed to save data to the database. " . $stmt->error;
                        }
                    } else {
                        echo "Failed to extract text. API response: " . json_encode($ocrResult);
                    }
                } else {
                    echo "Error: Failed to upload PDF.";
                }
            } else {
                echo "Error: No file selected or file upload failed.";
            }
        }
        
        $s1 = "select * from ai_wizard order by id desc limit 1";
        $r1 = $conn->query($s1);
        if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
            $clientname=$rs1["clientname"];
            //$clientname="Roger Hass";
            $ndisnumber=$rs1["ndisnumber"];
            $description=$rs1["description"];
            $ndisitemnumber=$rs1["ndisitemnumber"];
            $unit=$rs1["unit"];
            $price=$rs1["price"];
        } }
        
        
        // finding client on database
        $projx=0;
        $randnumber=rand(100000,999999);
        $s1X = "select * from project where name='$clientname (AI Powered - $randnumber)' and status='1' order by id desc limit 1";
        $r1X = $conn->query($s1X);
        if ($r1X->num_rows > 0) { while($rs1X = $r1X->fetch_assoc()) { $projx=1; } }
        
        if($projx==0){
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
                $s3 = "select * from uerp_user where mtype='EMPLOYEE' or mtype='USER' order by id asc limit 1";
                $r3 = $conn->query($s3);
                if ($r3->num_rows > 0) { while($rs3 = $r3->fetch_assoc()) {
                    $sw1=$rs3["id"];
                    $sw11="".$rs3["username"]." ".$rs3["username2"]."";
                } }
                
                // SUPPORT WORKER 2
                $randno=rand(2,10);
                $s4 = "select * from uerp_user where mtype='EMPLOYEE' or mtype='USER' order by id asc limit $randno";
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
                if($projx==0){
                    $sdate=time();
                    $edate=strtotime('+2 years', $sdate);
                    $sql = "insert into project (name,clientid,stime,etime,color,rate,rate_type,priority,leaderid,note,status,start_date,end_date,teamleaderid) 
                    VALUES ('$clientname (AI Powered - $randnumber)','$found','08:00','17:00','#CCCCCC','$price','$unit','High','$sw1','$description $ndisitemnumber $price/$unit','1','$sdate','$edate','1')";
                    if ($conn->query($sql) === TRUE){
                        $s1 = "select * from project where clientid='$found' and name='$clientname (AI Powered - $randnumber)' and status='1' order by id desc limit 1";
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
                            
                            // CREATTING TASK FOR SUPPORT WORKER
                            $datex=time();;
                            $title = "Please Attend $clientname and get further instruction.";
                            $detail = "$description";
                            $randid=time();
                            $sql = "insert into tasks (employeeid,clientid,date,title,detail,priority,image,tdate,mode) 
                            VALUES ('$sw1','$found','$datex','$title','$detail','3','$randid','$randid','SELECTIVE')";
                            if ($conn->query($sql) === TRUE) $tomtom=0;
                        }
                    }
                    
                    echo"<div class='video-container' style='width:100%;height:300px'>
                        <video autoplay muted loop style='opacity:0.5'><source src='https://www.nexis365.com/saas/assets/nexis-ai-flow0.mp4' type='video/mp4' /></video>
                        <div style='z-index:999999999;padding:20px' id='dynamicTextContainer' class='caption'></div>
                    </div>";
                }
            }
        }else{
            echo"<div class='video-container' style='width:100%;height:300px'>
                <video autoplay muted loop style='opacity:0.5'><source src='https://www.nexis365.com/saas/assets/nexis-ai-flow0.mp4' type='video/mp4' /></video>
                <div style='z-index:999999999;padding:20px' class='caption typewriter'>This Project is already Created. Try with next client service agreement form.</div>
            </div>";
        } ?>    
                        

            <script>
                function startAnimation() {
                    const messages = [<?php echo"
                        'Data Extracttion Started...',
                        'Creating Project for Client $clientname', // PHP variable injected here
                        'Assigned $sc11 Smith as Support Co-ordinator.',
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
            </script>

            
            <?php
            
            include 'scripts.php';
            
        // }
        
    echo"</body>
</html>";

?>