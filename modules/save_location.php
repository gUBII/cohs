<?php
// Get JSON input
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['latitude']) && isset($data['longitude'])) {
    $latitude = $data['latitude'];
    $longitude = $data['longitude'];

    // Process or save the data (e.g., to a database)
    echo "Location received: Latitude = $latitude, Longitude = $longitude";
} else {
    echo "Invalid data received.";
}
?>
