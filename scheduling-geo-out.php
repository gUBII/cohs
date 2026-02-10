<?php
if(isset($_COOKIE["latitudez"])) $latitudey=$_COOKIE["latitudez"]; else $latitudey=0;
if(isset($_COOKIE["longitudez"])) $longitudey=$_COOKIE["longitudez"]; else $longitudey=0;
?>

<script>
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError, {enableHighAccuracy:true});
  } else {
    alert("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
  const lat = position.coords.latitude;
  const lon = position.coords.longitude;

  // Update all inputs
  document.getElementById('latitude').value = lat;
  document.getElementById('longitude').value = lon;
  document.querySelector('input[name="latitudea"]').value = lat;
  document.querySelector('input[name="longitudea"]').value = lon;

  // Store cookies for reuse
  document.cookie = "latitudez=" + lat + "; path=/";
  document.cookie = "longitudez=" + lon + "; path=/";
}

function showError(error) {
  alert("Geolocation error: " + error.message);
}

function captureImage() {
  document.getElementById('imageFile').click();
}

function previewImage(event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById('clockimage').src = e.target.result;
      document.getElementById('clockimage').style.display = "block";
    };
    reader.readAsDataURL(file);
  }
}
</script>

<?php
echo "<body onload='getLocation()'>
    <form name='mygeolocation1' method='POST' action='scheduling-set.php' enctype='multipart/form-data'>
        <input type='hidden' name='timeclockout' value='".$_POST["timeclockout"]."'>
        <input type='hidden' name='wage' value='".$_POST["wage"]."'>
        <input type='hidden' name='overtime' value='".$_POST["overtime"]."'>
        <input type='text' name='latitudea' value='$latitudey'>
        <input type='text' name='longitudea' value='$longitudey'>
        <input type='hidden' name='latlog' value='123'>
    </form>
</body>";

?><script language=JavaScript> document.mygeolocation1.submit(); </script>
