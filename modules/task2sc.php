<?php
    date_default_timezone_set("Australia/Melbourne");
    include('include.php');
    
    if(isset($_POST['itemid'])) $itemid  = intval($_POST['itemid']);
    if(isset($_GET['itemid'])) $itemid  = intval($_GET['itemid']);
    
    $sql = "SELECT * FROM tasks2sc where id='$itemid' order by id desc limit 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) {
        $namex=$row["title"];
        $detailx=$row["detail"];
        $is_completedx=$row["date"];
    } }
    
    $timenow=time();
    if(isset($namex)){
        $sql = "update tasks2sc set pdate='$timenow',cdate='0',activity='1' where id = $itemid";
        $conn->query($sql);
        echo json_encode(array('success'=>1));
        
        if(isset($_GET['itemid'])) {
            echo"<form method='get' action='index.php' name='main' target='_top'><input type=hidden name='smsbd' value='projectsc'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
        
    }
    $conn->close();
?>