<?php
	if(isset($_COOKIE["userid"])) $userid=$_COOKIE["userid"];
	if(isset($_COOKIE["track"])) $track=$_COOKIE["track"];
	
	unset($userid);
	setcookie("userid", "", time() -3600);
	unset($track);
	setcookie("track", "", time() -3600);
	
	echo"<body bgcolor=black><form method='POST' action='index.php' name='main' target='_top'> </form></body>";
?>
<script language=JavaScript> document.main.submit(); </script>