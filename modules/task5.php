<?php
    date_default_timezone_set("Australia/Melbourne");
    include('../include.php');
    // require_once('dbconn.php');
    
    if(isset($_POST['itemid'])) $itemid  = intval($_POST['itemid']);
    if(isset($_GET['itemid'])) $itemid  = intval($_GET['itemid']);
    
    $sql = "SELECT * FROM tasks where id='$itemid' order by id desc limit 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) {
        $namex=$row["title"];
        $detailx=$row["detail"];
        $is_completedx=$row["date"];
    } }
    
    $timenow=time();
    if(isset($namex)){
        $sql = "update tasks set cdate='$timenow',activity='4' where id = $itemid";
        $conn->query($sql);
        echo json_encode(array('success'=>1));
        
        $sx1 = "select * from uerp_user where id='".$_COOKIE["userid"]."' order by id asc limit 1";
        $rx1 = $conn->query($sx1);
        if ($rx1->num_rows > 0) { while($ry1 = $rx1->fetch_assoc()) { $employeename="".$ry1["username"]." ".$ry1["username2"].""; } }
        $sysdate=time();
        $sysdate2=date("d-m-y h:i:s a", $sysdate);
        $ip=$_SERVER['REMOTE_ADDR'];
        $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
        VALUES ('".$_COOKIE["userid"]."','0','0','TASK','0','$sysdate','$ip','1','$employeename placed his task to <b>REJECTED TASKS</b> list at $sysdate2','$itemid','".$_COOKIE["userid"]."')";
        if ($conn->query($sql1) === TRUE) $tomtom=0;
        
        if(isset($_GET['itemid'])) {
            echo"<form method='get' action='../index.php' name='main' target='_top'><input type=hidden name='url' value='task_manager.php'></form>";
            ?> <script language=JavaScript> document.main.submit(); </script> <?php
        }
    }
    $conn->close();
?>