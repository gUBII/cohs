    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OCR PDF Upload</title>
   <style>
        .animated-text {
            font-size: 18px;
            font-weight: bold;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
    </style>
</head>
<body>
    <h1>Upload PDF for OCR</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="fileUpload">Select PDF:</label>
        <input type="file" name="fileUpload" id="fileUpload" accept=".pdf">
        <br><br>
        <button type="submit">Upload and Extract Text</button>
    </form>

    <?php
    // Database configuration
    $servername = "localhost";
    $username = "saas";
    $password = "Bangladesh$$786";
    $dbname = "saas_info_goodwillcare_net";

    // Create database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
            'service' => null,
            'ndisnumber' => null,
            'dob' => null,
            'participant' => null,
            'regiprovider' => null,
            'pcontactname' => null,
            'pphone' => null,
            'pemail' => null,
            'paddress' => null
        ];

        preg_match('/This Service Agreement is for[.\s]*([A-Za-z\s]+)/', $extractedText, $matches);
        if (isset($matches[1])) $fields['service'] = trim($matches[1]);

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

                    $stmt = $conn->prepare("INSERT INTO ai_wizard (pdf_name, extracted_text, service, ndisnumber, dob, participant, regiprovider, pcontactname, pphone, pemail, paddress, description, ndisitemnumber, unit, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssssssssssssss", $_FILES['fileUpload']['name'], $extractedText, $parsedFields['service'], $parsedFields['ndisnumber'], $parsedFields['dob'], $parsedFields['participant'], $parsedFields['regiprovider'], $parsedFields['pcontactname'], $parsedFields['pphone'], $parsedFields['pemail'], $parsedFields['paddress'], $parsedFields['description'], $parsedFields['ndisitemnumber'], $parsedFields['unit'], $parsedFields['price']);

                    if ($stmt->execute()) {
                      //  echo "<h2>Extracted Text</h2>";
                    //    echo "<pre style='background: #f4f4f4; padding: 10px; border: 1px solid #ddd;'>" . htmlspecialchars($extractedText) . "</pre>";

                        // Display parsed fields in an HTML table
                        echo "<h2>Extracted Fields</h2>";
                        echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
                        echo "<tr><th>Field</th><th>Value</th></tr>";
                        foreach ($parsedFields as $key => $value) {
                            echo "<tr><td>" . htmlspecialchars(ucfirst($key)) . "</td><td>" . htmlspecialchars($value) . "</td></tr>";
                        }
                        echo "</table>";
                        echo "<script>document.addEventListener('DOMContentLoaded', function() { startAnimation(); });</script>";
                    } else {
                        echo "Error: Failed to save data to the database. " . $stmt->error;
                    }
                    $stmt->close();
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

    $conn->close();
    ?>
  <div id="dynamicTextContainer"></div>

    <script>
        function startAnimation() {
            const messages = [
                "Create Project for Client Name",
                "Project Created",
                "Assigns Support Worker Jhon, Maria",
                "Creating Roster",
                "Notify Support Assigns Clients",
                "Waiting for Support Workers Confirmation",
                "Assigning Task to Support Workers",
                "Project Successfully Created and Invoice Generated for this Client",
                "View Project Name and Task and Invoice"
            ];

            const container = document.getElementById("dynamicTextContainer");
            let index = 0;

            function showMessage() {
                if (index < messages.length) {
                    let messageElement = document.createElement("div");
                    messageElement.className = "animated-text";
                    messageElement.innerText = messages[index];
                    container.appendChild(messageElement);
                    
                    setTimeout(() => {
                        messageElement.style.opacity = "1";
                    }, 100);
                    
                    index++;
                    setTimeout(showMessage, 2000);
                }
            }

            showMessage();
        }
    </script>
</body>
</html>
