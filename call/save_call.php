<?php
$uploadDir = 'uploads/';

// Make sure folder exists
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

// Log POST data for debug
file_put_contents("log.txt", print_r($_POST, true), FILE_APPEND);

// Get recording info from Twilio
if (isset($_POST['RecordingUrl'])) {
    $recordingUrl = $_POST['RecordingUrl'] . '.mp3'; // Twilio only sends base URL
    $callSid = $_POST['CallSid'] ?? 'unknown';
    $from = $_POST['From'] ?? 'unknown';
    $to = $_POST['To'] ?? 'unknown';
    $timestamp = date('Ymd_His');
    $filename = "{$timestamp}_{$from}_to_{$to}_{$callSid}.mp3";
    $fullPath = $uploadDir . '/' . $filename;

    // Download recording
    $audioData = file_get_contents($recordingUrl);
    if ($audioData !== false) {
        file_put_contents($fullPath, $audioData);
        echo "Recording saved successfully: $filename";
    } else {
        echo "Failed to fetch recording from Twilio.";
    }
} else {
    echo "No recording data received.";
}
?>
