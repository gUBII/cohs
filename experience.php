<?php

    error_reporting(0);
    include('authenticator.php');
	include('head.php');
	
	if(isset($_COOKIE["userid"])) $userid=$_COOKIE["userid"];
	if(isset($_COOKIE["track"])) $track=$_COOKIE["track"];

    if(isset($userid)){
        
        $s7 = "select * from theme where id='1' order by id asc limit 1";
        $r7 = $conn->query($s7);
        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
            $topbar_color=$rs7["topbar_color"];
            $tbtc=$rs7["topbar_text_color"];
        } }
        echo"<ul class='sortable-list connectList agile-list' id='inprogress'>";
    	    $s = "select * from experience_data where employeeid='$userid' order by id asc";
            $r = $conn->query($s);
            if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                
                $fromdate=date("M y",$rs["period_from"]);
                $todate=date("M y",$rs["period_to"]);
                
                echo"<li class='danger-element' style='padding-top:0px;padding-bottom:5px;padding-right:0px;line-height:1.0'>
                    <table width='100%'><tr>
                        <td>".$rs["company"]."</strong></td>
                        <td align=right>
                            <a href='deleterecords.php?delid=".$rs["id"]."&tbl=experience_data' class='btn' target='dataprocessor' style='margin-top:0px;color:red'><i class='fa fa-times'></i></a>
                        </td>
                    </tr></table>
                    <span style='font-size:8pt'>Position: <strong>".$rs["job_position"]."</strong> ( From: $fromdate To $todate )</span>
                </li>";
                
            } }
        echo"</ul>";
    }

?>