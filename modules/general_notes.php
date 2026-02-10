<?php
    // error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    
    $sheba="campaigns";
    $cid=90009;
    $title="Add New Campaign";
    $utype="General Notes";
    
    if(isset($_GET["pstat"])) $pstat=$_GET["pstat"];
    else $pstat=0;
    
    if($pstat==1){
        echo"<div class='row'>
            <div class='col-12 col-md-5' style='padding-bottom:10px'>
                <h1 class='mb-0 pb-0 display-4' id='title'>$utype</h1>
                <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                    <ul class='breadcrumb pt-0'>
                        <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                        <li class='breadcrumb-item'><a href='index.php'>Dashboard</a></li>
                        <li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&pstat=".$_GET["pstat"]."'>$utype</a></li>
                    </ul>
                </nav>
            </div>
            <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>";
                
                include 'crm_bar.php';
            
            echo"</div>
        </div>    
        <div class='data-table-rows slim' id='sample'>
            <div class='wrapper wrapper-content animated fadeInRight' style='padding-left:5px;padding-right:5px'>
                <div class='data-table-rows slim' id='sample' style='text-align:left'>";
                    
                    if(isset($_COOKIE["b_lead"])){
                        $p1 = "select * from leads where id='".$_COOKIE["b_lead"]."' order by name asc limit 1";
                        $p2 = $conn->query($p1);
                        if ($p2->num_rows > 0) { while($p3 = $p2 -> fetch_assoc()) {
                            $employeeid="";
                            $cn="";
                            $c1 = "select * from campaigns where id='".$p3["campaignid"]."' order by id asc limit 1";
                            $c2 = $conn->query($c1);
                            if ($c2->num_rows > 0) { while($c3 = $c2 -> fetch_assoc()) {
                                $cn=$c3["campaign_name"];
                                $employeeid=$c3["employeeid"];
                            } }
                            $leadname="";
                            $leadname="".$p3["lead_name"]." @ $cn";
                        } }
                    }
                    
                    echo"<form method='post' name='stage1' action='logs_processor.php' target='dataprocessor' enctype='multipart/form-data'class='tooltip-end-bottom'>
                        <input type=hidden name='processor' value='leadsmanager'><input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'>
                        <table><tr>
                            <td style='width:200px'>
                                <select class='form-control m-b required' name='b_lead' required>";
                                    if(isset($_COOKIE["b_lead"])) echo"<option value='".$_COOKIE["b_lead"]."'>$leadname</option>";
                                    else echo"<option value=''>Select Lead Under Campaign</option>";
                                    $wsp1 = "select * from leads where status='1' order by lead_name asc";
                                    $wsp2 = $conn->query($wsp1);
                                    if ($wsp2->num_rows > 0) { while($wsp3 = $wsp2 -> fetch_assoc()) {
                                        $cname="";
                                        $employeeid="";
                                        $c1 = "select * from campaigns where id='".$wsp3["campaignid"]."' order by id asc limit 1";
                                        $c2 = $conn->query($c1);
                                        if ($c2->num_rows > 0) { while($c3 = $c2 -> fetch_assoc()) {
                                            $cname=$c3["campaign_name"];
                                            $employeeid=$c3["employeeid"];
                                        } }
                                        if($designationy==13){
                                            echo"<option value='".$wsp3["id"]."'>".$wsp3["lead_name"]." @ $cname</option>";
                                        }else{
                                            if($employeeid==$userid) echo"<option value='".$wsp3["id"]."'>".$wsp3["lead_name"]." @ $cname</option>";
                                        }
                                        
                                    } }
                                echo"</select>
                            </td><td>
                                <button class='btn btn-primary' type='submit' >Go</button>
                            </td>
                        </tr></table>
                    </form>";
                    
                    if(isset($_COOKIE["b_lead"])){
                        echo"<body onload=\"shiftdataV2('log_data_x.php?log_type=NOTES&logid=".$_COOKIE["b_lead"]."', 'datatableX')\">
                        <div id='datatableX' style='width:100%'></div>";
                    }
                    
                echo"</div>
            </div><br><br>
        </div>";
    }else{
        echo"<form method='get' action='global-unset.php' name='main' target='_top'>
            <input type=hidden name='pstat' value='1'><input type=hidden name='id' value='".$_GET["id"]."'><input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='sourcefrom' value='".$_GET["sourcefrom"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }
