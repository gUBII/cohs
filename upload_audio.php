<?php

include 'include.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['audioFile'])) {
    // Save uploaded audio file
    $audioFile = $_FILES['audioFile']['tmp_name'];
    $audioFileName = uniqid('audio_', true) . '.webm'; // Updated file extension to match WEBM OPUS
    $uploadDir = 'voice_search/';

    // Ensure the upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $audioPath = $uploadDir . $audioFileName;
    if (!move_uploaded_file($audioFile, $audioPath)) {
        echo json_encode(['success' => false, 'error' => 'Failed to save the uploaded file.']);
        exit;
    }

    // Validate audio file
    if (!file_exists($audioPath) || filesize($audioPath) == 0) {
        echo json_encode(['success' => false, 'error' => 'Uploaded file is missing or empty.']);
        exit;
    }

    // Transcription using Google Cloud Speech-to-Text API
    $transcription = transcribeAudio($audioPath);

    if (!$transcription) {
        echo json_encode(['success' => false, 'error' => 'Failed to transcribe the audio file. Check logs for details.']);
        exit;
    }

    // Save transcription to the database
    if (!saveTranscription($conn, $transcription)) {
        echo json_encode(['success' => false, 'error' => 'Failed to save transcription to the database.']);
        exit;
    }

    // Return the result as JSON
    echo json_encode([
        'success' => true,
        'transcription' => $transcription,
        'audioPath' => $audioPath
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'No file uploaded']);
}

// Function to transcribe audio using Google Cloud Speech-to-Text API with API key
function transcribeAudio($filePath) {
    $apiKey = 'AIzaSyCgWVwzVHk2oOCIatI7x3h4i55MBJRKLIs'; // Replace with your Google Cloud API key
    $apiUrl = 'https://speech.googleapis.com/v1p1beta1/speech:recognize?key=' . $apiKey;

    // Read the audio file and encode it in Base64
    $audioContent = base64_encode(file_get_contents($filePath));

    // Build the request payload
    $requestData = [
        'config' => [
            'encoding' => 'WEBM_OPUS', // Updated encoding to match WEBM OPUS
            'sampleRateHertz' => 48000, // Match the actual sample rate of the audio file
            'languageCode' => 'en-US'
        ],
        'audio' => [
            'content' => $audioContent
        ]
    ];

    // Initialize curl request
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));

    // Execute curl request
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        error_log('Curl error: ' . curl_error($ch));
        return false;
    }

    $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($responseCode === 200) {
        $result = json_decode($response, true);
        if (isset($result['results'][0]['alternatives'][0]['transcript'])) {
            return $result['results'][0]['alternatives'][0]['transcript'];
        } else {
            error_log('Google API returned an unexpected response: ' . json_encode($result));
            return false;
        }
    } else {
        error_log('Google Speech-to-Text API error. HTTP Code: ' . $responseCode . '. Response: ' . $response);
        return false;
    }
}

// Function to save transcription to the database
function saveTranscription($conn, $transcription) {
    $sql = "INSERT INTO voicedata (voice_text) VALUES (?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        error_log('Database error: ' . $conn->error);
        return false;
    }

    $stmt->bind_param("s", $transcription);

    if ($stmt->execute()) {
        $stmt->close();
        return true;
    } else {
        error_log('Database error: ' . $stmt->error);
        $stmt->close();
        return false;
    }
}


// Close the database connection
$conn->close();
?>
