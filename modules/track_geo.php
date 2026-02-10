<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Geo Location Clock In/Out</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="bg-light">

<div class="container py-5">
  <div class="card shadow p-4">
    <h3 class="text-center mb-4">Geo Location Clock In/Out</h3>

    <div id="locationDisplay" class="text-center text-primary fw-bold mb-3">
      Detecting your location...
    </div>

    <div class="text-center">
      <button id="clockIn" class="btn btn-success btn-lg m-2">Clock In</button>
      <button id="clockOut" class="btn btn-danger btn-lg m-2">Clock Out</button>
    </div>

    <div id="status" class="text-center mt-4 text-secondary"></div>
  </div>
</div>

<script>
let currentLat = null;
let currentLon = null;

// Show current location when page loads
function showCurrentLocation() {
  if (!navigator.geolocation) {
    $('#locationDisplay').text('Geolocation not supported.');
    return;
  }

  navigator.geolocation.getCurrentPosition(function(pos) {
      currentLat = pos.coords.latitude;
      currentLon = pos.coords.longitude;
      $('#locationDisplay').html(`Latitude: <b>${currentLat.toFixed(6)}</b> | Longitude: <b>${currentLon.toFixed(6)}</b>`);
  }, function(err) {
      $('#locationDisplay').html(`<span class="text-danger">Error: ${err.message}</span>`);
  });
}

// Record clock-in or clock-out
function recordAction(action) {
  if (!currentLat || !currentLon) {
    $('#status').html('<span class="text-danger">Location not detected yet.</span>');
    return;
  }

  const data = {
    action: action,
    latitude: currentLat,
    longitude: currentLon
  };

  $('#status').text('Recording your location...');
  
  $.post('track_location.php', data, function(res) {
    if (res.success) {
      $('#status').html(`<span class="text-success">${action.toUpperCase()} recorded at [${data.latitude.toFixed(5)}, ${data.longitude.toFixed(5)}]</span>`);
    } else {
      $('#status').html(`<span class="text-danger">${res.message}</span>`);
    }
  }, 'json');
}

$('#clockIn').on('click', ()=> recordAction('clock_in'));
$('#clockOut').on('click', ()=> recordAction('clock_out'));

$(document).ready(showCurrentLocation);
</script>

</body>
</html>
