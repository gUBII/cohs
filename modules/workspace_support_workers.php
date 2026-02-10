<!DOCTYPE html>
<html lang='en' data-footer='true'>
    <body style='background-color:white;color:black'>
    <?php
        
        include("../include.php");
        include("../head.php");
        $tday=time();
        
        
        if(isset($_POST["pid"])) $pid=$_POST["pid"];
        else if(isset($_GET["pid"])) $pid=$_GET["pid"];
        else $pid=0;
        
        $eid=0;
        if(isset($_GET["eid"])) $eid=$_GET["eid"];

        echo"<meta http-equiv='refresh' content='10;url=workspace_support_workers.php?pid=$pid'>";

        if(isset($_GET["delid"])){
            $sql = "delete from project_team_allocation where id='".$_GET["delid"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["generalSW"]) && $_POST["generalSW"]!=0){
            $sql = "insert into project_team_allocation (projectid,employeeid,position,date,status) VALUES ('".$_POST["pid"]."','".$_POST["generalSW"]."','0','$tday','1')";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
        
        if(isset($_POST["relatedSW"]) && $_POST["relatedSW"]!=0){
            $sql = "insert into project_team_allocation (projectid,employeeid,position,date,status) VALUES ('".$_POST["pid"]."','".$_POST["relatedSW"]."','0','$tday','1')";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
        
        echo"<section class='scroll-section' id='stripedRows'>
            <div class='card mb-5'>
                <div class='card-body' >
                    <table class='table table-striped'>
                        <thead><tr><th scope='col'>Support Worker</th><th scope='col'>Phone</th><th scope='col'>Email</th><th scope='col'>Experience</th><th scope='col' style='text-align:center'>Action</th></tr></thead>";
                            
                        $wsp1 = "select * from project_team_allocation where projectid='$pid' order by id asc";
                        $wsp2 = $conn->query($wsp1);
                        if ($wsp2->num_rows > 0) { while($wsp3 = $wsp2 -> fetch_assoc()) {
                            $wsp4 = "select * from uerp_user where id='".$wsp3["employeeid"]."' order by id desc limit 1";
                            $wsp5 = $conn->query($wsp4);
                            if ($wsp5->num_rows > 0) { while($wsp6 = $wsp5 -> fetch_assoc()) {
                                $firstname=$wsp6["username"];
                                $lastname=$wsp6["username2"];
                                $phone=$wsp6["phone"];
                                $email=$wsp6["email"];
                                $experience=$wsp6["job_experience"];
                            } }
                            
                            echo"<tr style='padding:10px'>
                                <th scope='row' nowrap>$firstname $lastname</td>
                                <td style='width:20%;text-align:left'>$phone</td>
                                <td style='width:20%;text-align:left'>$email</td>
                                <td style='width:20%;text-align:left'>$experience Years</td>
                                <td style='width:10%;text-align:center;color:red;'>
                                    <a href='workspace_support_workers.php?delid=".$wsp3["id"]."&pid=$pid' target='_self'><i class='fa fa-times'></i></a>
                                </td>
                            </tr>";
                        } }
                    echo"</table>";
                        
                    /*
                        $thx=($lv/$th);
                        $th = round($th, 2);
                        $thx = round($thx, 2);
                        $lv = round($lv, 2);
                        
                        $tdays=0;
                        $date1=$wsp33["budget_date"];
                        $date2=$wsp33["budget_close_date"];
                        
                        $diffInSeconds = abs($date2 - $date1);
                        $tdays = floor($diffInSeconds / (60 * 60 * 24));
                        
                        $dailyspent=($lv*5);
                        $totalspent=($dailyspent*$tdays);
                        $finalbudget=($wsp33["budget_value"]-$totalspent);
                        if($finalbudget<=0) $tcol="red";
                        else $tcol="black";
                        echo"<div style='width:100%;align:right;text-align:right'>
                            <table align=right>
                                <tr><td>Budget Value</td><td>:</td><td align=right style='color:$tcol'><b>$".$wsp33["budget_value"]."</b></td></tr>
                                <tr><td>Allocated Days</td><td>:</td><td align=right style='color:$tcol'><b>$tdays Days</b></td></tr>
                                <tr><td>Daily 1 Hour Spent</td><td>:</td><td align=right style='color:$tcol'><b>$ $lv</b></td></tr>
                                <tr><td>Daily 5 Hour Spent</td><td>:</td><td align=right style='color:$tcol'><b>$ $dailyspent</b></td></tr>
                                <tr><td>Total Spent in $tdays Days</td><td>:</td><td align=right style='color:$tcol'><b>$ $totalspent</b></td></tr>
                                <tr><td><hr><b>Budget Amount Valuation</b></td><td><hr>:</td><td align=right style='color:$tcol'><hr><b>$finalbudget</b></td></tr>
                            </table>
                        </div>";
                    */
                        
                echo"</div>
            </div>
        </section>";
        
        include("../scripts.php");
    
    ?>
    </body>
</html>
