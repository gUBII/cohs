<?php
	
    foreach ($_COOKIE as $key=>$val) {
        setcookie($key, "", time() - 9999999);
    }
    
    echo"<body style='background-color:#121212;overflow: hidden;' onload='deleteAllCookies();'>";
    ?><script>
        function deleteAllCookies() {
            const cookies = document.cookie.split(';');
            for (let i = 0; i < cookies.length; i++) {
                const cookie = cookies[i].split('=');
                const cookieName = cookie[0].trim();
                document.cookie = `${cookieName}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
            }
        }
    </script><?php
    
    if(isset($_POST["redirect_server"])){
        echo"<form method='GET' action='https://www.nexis365.com/".$_POST["redirect_server"]."/login.php' name='main' target='_top'><input type=hidden name='id' value='0'></form>";
    }else{
        if(isset($_POST["redirect_url"])){        
            echo"<form method='GET' action='index.php' name='main' target='_top'><input type=hidden name='url' value='".$_POST["redirect_url"]."'><input type=hidden name='id' value='0'></form>";
        }else{
            echo"<form method='GET' action='login.php' name='main' target='_top'><input type=hidden name='id' value='0'></form>";
        }
    }
?>
<script language=JavaScript> document.main.submit(); </script>