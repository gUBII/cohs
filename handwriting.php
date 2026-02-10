<?php
// Function to call the OCR.Space API
function scanHandwritingImage($imagePath, $apiKey) {
    $url = 'https://api.ocr.space/parse/image';
    $headers = [
        'apikey: ' . $apiKey
    ];

    $postFields = [
        'isOverlayRequired' => 'true',
        'language' => 'eng', // Specify the language (e.g., 'eng' for English)
        'isHandwriting' => 'true', // Enable handwriting recognition
        'file' => new CURLFile($imagePath)
    ];

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute and decode response
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        // Handle cURL errors
        $errorMessage = curl_error($ch);
        curl_close($ch);
        return ['error' => true, 'message' => 'cURL Error: ' . $errorMessage];
    }
    curl_close($ch);

    return json_decode($response, true);
}

// Example Usage
$imagePath = 'hand.jpg'; // Path to the handwriting image
$apiKey = 'K82065550588957'; // Replace with your OCR.Space API key

$result = scanHandwritingImage($imagePath, $apiKey);

// Handle the response
if (isset($result['ParsedResults'][0]['ParsedText'])) {
    $extractedText = $result['ParsedResults'][0]['ParsedText'];
    echo "Extracted Text:\n";
    echo $extractedText;
} else {
    echo "Error: Unable to extract text.\n";

    // Check for error messages
    if (isset($result['ErrorMessage'])) {
        if (is_array($result['ErrorMessage'])) {
            // Handle if the error message is an array
            echo "API Error Message: " . implode(', ', $result['ErrorMessage']) . "\n";
        } else {
            echo "API Error Message: " . $result['ErrorMessage'] . "\n";
        }
    } else {
        echo "An unknown error occurred.\n";
    }
}
?>
