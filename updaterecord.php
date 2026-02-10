<?php
    error_reporting(0);
    if(isset($_COOKIE["userid"])){
        
        include('include.php');
        
        if(isset($_GET["rid"])){
            $cdate=time();
            if($_GET["approval"]==0){
                $sql="update shifting_allocation set request2='3' where id='".$_GET["rid"]."'";
                if ($conn->query($sql) === TRUE) echo"<script>alert('Request Rejected.')</script>";
                
            }
            if($_GET["approval"]==1){
                $r1 = "select * from shifting_allocation where id='".$_GET["rid"]."' order by id desc limit 1";
                $r1x = $conn->query($r1);
                if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                    
                    $clockin_request=$r1y["clockin_request"];
                    $clockout_request=$r1y["clockout_request"];
                    
                    $clockin_request1=date("Y-m-d H:i:s", $r1y["clockin_request"]);
                    $clockout_request1=date("Y-m-d H:i:s", $r1y["clockout_request"]);
                    
                    $clockin_day=date("d", $r1y["clockin_request"]);
                    $clockin_month=date("m", $r1y["clockin_request"]);
                    $clockin_year=date("Y", $r1y["clockin_request"]);
                    
                    $sql="update shifting_allocation set stime='$clockin_request1',sdate='$clockin_request',etime='$clockout_request1',accepted='1',
                    edate='$clockout_request',days='$clockin_day',months='$clockin_month',years='$clockin_year',request2='2' where id='".$_GET["rid"]."'";
                    if ($conn->query($sql) === TRUE) echo"<script>alert('Request Accepted.')</script>";
                } }
                
            }
        }
        
        if(isset($_GET["susid"])){
            $sql="update project_category set status='".$_GET["status"]."' where id='".$_GET["susid"]."'";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('Category Status Updated.')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','CB CATEGORY UPDATE','0','$sysdate','$ip','1','Changed Communication Book Category Status','0','".$_GET["susid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                echo"<form method='GET' action='index.php' name='main' target='_top'><input type=hidden name='url' value='projects.php'><input type=hidden name='pstat' value='1'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        if(isset($_GET["susidsc"])){
            $sql="update project_sc_category set status='".$_GET["status"]."' where id='".$_GET["susidsc"]."'";
            if ($conn->query($sql) === TRUE){
                echo"<script>alert('Category Status Updated.')</script>";
                $sysdate=time();
                $ip=$_SERVER['REMOTE_ADDR'];
                $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                VALUES ('".$_COOKIE["userid"]."','0','0','SUPPORT CO-ORDINATOR CATEGORY UPDATE','0','$sysdate','$ip','1','Changed Category Status by support co-ordinator','0','".$_GET["susid"]."')";
                if ($conn->query($sql1) === TRUE) $tomtom=0;
                echo"<form method='GET' action='index.php' name='main' target='_top'><input type=hidden name='url' value='projectsc'></form>";
                ?> <script language=JavaScript> document.main.submit(); </script> <?php
            }
        }
        
        if(isset($_POST["processor"])){
            if($_POST["processor"]=="category"){
                $sql="update project_category set category='".$_POST["category"]."',sorder='".$_POST["sorder"]."' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE){
                    echo"<script>alert('Category Updated.')</script>";
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token,table_name) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','CB CATEGORY UPDATE','0','$sysdate','$ip','1','Changed Communication Book Category Name','0','".$_POST["id"]."','project_category')";
                    if ($conn->query($sql1) === TRUE) $tomtom=0;                    
                    
                    echo"<form method='GET' action='index.php' name='main' target='_top'>
                        <input type=hidden name='url' value='projects.php'><input type=hidden name='pstat' value='1'>
                    </form>";
                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                }
            }
            if($_POST["processor"]=="categorysc"){
                $sql="update project_sc_category set category='".$_POST["category"]."',sorder='".$_POST["sorder"]."' where id='".$_POST["id"]."'";
                if ($conn->query($sql) === TRUE){
                    echo"<script>alert('Category Updated.')</script>";
                    $sysdate=time();
                    $ip=$_SERVER['REMOTE_ADDR'];
                    $sql1 = "insert into audit (sourceid,targetid,amount,tran_type,tran_to,date,ip,status,note,credit,token) 
                    VALUES ('".$_COOKIE["userid"]."','0','0','SUPPORT CO-ORDINATOR CATEGORY UPDATE','0','$sysdate','$ip','1','Changed Category Name by support co-ordination','0','".$_POST["id"]."')";
                    if ($conn->query($sql1) === TRUE) $tomtom=0;
                    echo"<form method='GET' action='index.php' name='main' target='_top'><input type=hidden name='url' value='projectsc'></form>";
                    ?> <script language=JavaScript> document.main.submit(); </script> <?php
                }
            }
        }
    }
?>