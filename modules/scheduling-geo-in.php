<?php
    if(isset($_COOKIE["latitudez"])) $latitudey=$_COOKIE["latitudez"]; else $latitudey=0;
    if(isset($_COOKIE["longitudez"])) $longitudey=$_COOKIE["longitudez"]; else $longitudey=0;
    
    echo"<body onload='getLocationx()'>
            <form name='mygeolocation1' method='POST' action='scheduling-set.php'>
                <input type='hidden' name='timeclockin' value='".$_POST["timeclockin"]."'>
                <input type='hidden' name='shiftname' value='".$_POST["shiftname"]."'>
                <input type='hidden' name='shiftclockin' value='".$_POST["shiftclockin"]."'>
                <input type='hidden' name='shiftclockout' value='".$_POST["shiftclockout"]."'>
                <input type='hidden' name='wage' value='".$_POST["wage"]."'>
                <input type='hidden' name='overtime' value='".$_POST["overtime"]."'>
                
                <input type='hidden' name='latitude' value=''>
                <input type='hidden' name='longitude' value=''><br>
                <input type='hidden' name='latitudea' value='$latitudey'>
                <input type='hidden' name='longitudea' value='$longitudey'>
                <input type='hidden' name='latlog' value='123'>
            </form>
        </body>";
        ?>
        
        <script type="text/javascript">
            var x = document.getElementById("globaladdress");
            function getLocationx(){
                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition,showError);
                }
            }
            function showPosition(position){
                document.mygeolocation1.latitude.value=position.coords.latitude;
                document.mygeolocation1.longitude.value=position.coords.longitude;
                // document.mygeolocation1.submit();
            }
            function showError(error){
            	switch(error.code){
            		case error.PERMISSION_DENIED:
            		// alert("GeoLocation Permission Required");
            		//location.reload();
            		Break;
            	}
            }
        </script>
        
        <script language=JavaScript> document.mygeolocation1.submit(); </script>
        
        <?php
    echo"</html>";
?>