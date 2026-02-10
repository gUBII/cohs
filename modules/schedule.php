<?php    
    date_default_timezone_set("Australia/Melbourne");
    echo"<form method='get' action='index.php' name='main' target='_top'>
        <input type=text name='url' value='schedule_jobs_updated.php'><input type=text name='viewstatus' value='2'>
        <input type=text name='prjsrc' value='264'><input type=text name='accepted' value='0'>
    </form>";
?>
<script language=JavaScript> document.main.submit(); </script>
    