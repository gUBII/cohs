<?php
    error_reporting(0);
    include('../include.php');
    
    echo"<table class='table stripe table-hover' style='width:100%;padding:10px'>
        <thead><tr><th nowrap style='font-size:10pt'>Project/Client Name</th>
            <th nowrap style='font-size:10pt'>Clock-in/out</th>
            <th nowrap style='font-size:10pt'>O. Night</th>
            <th nowrap style='font-size:10pt'>Color</th>
            <th></th></tr>
        </thead><tbody>";
            $ttx==0;
            $r1 = "select * from shifting_schedule order by id desc";
            $r1x = $conn->query($r1);
            if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
                $r1a = "select * from project where id='".$r1y['projectid']."' order by id asc limit 1";
                $r1b = $conn->query($r1a);
                if ($r1b->num_rows > 0) { while($r1c = $r1b -> fetch_assoc()) {
                    $projectname=$r1c["name"];
                    $clientname="";
                    $r1ax = "select * from uerp_user where id='".$r1c['clientid']."' order by id asc limit 1";
                    $r1bx = $conn->query($r1ax);
                    if ($r1bx->num_rows > 0) { while($r1cx = $r1bx -> fetch_assoc()) {
                        $clientname1=$r1cx["username"]; $clientname2=$r1cx["username2"]; $clientname="$clientname1 $clientname2";
                    } }
                    $projcolor=$r1c["color"];
                } }
                $ttx=($ttx+1);
                echo"<tr class='gradeX'>
                    <td style='font-size:10pt'>$clientname<br>$projectname</td>
                    <td nowrap style='font-size:10pt'>
                        <form name='form_$ttx' method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                            <input type='hidden' name='processor' value='shiftinglist'><input type='hidden' name='id' value='".$r1y["id"]."'>
                            <input type='time' name='stime' value='".$r1y['stime']."' onchange='this.form.submit()'><br>
                            <input type='time' name='etime' value='".$r1y['etime']."' onchange='this.form.submit()'>
                        </form>
                    </td>
                    <td nowrap style='font-size:10pt'>
                        <form name='form_$ttx' method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                            <input type='hidden' name='processor' value='shiftinglist1'><input type='hidden' name='id' value='".$r1y["id"]."'>";
                            if($r1y['night']==1) echo"<input type='checkbox' name='over_night' value='0' checked onchange='this.form.submit()'>";
                            else echo"<input type='checkbox' name='over_night' value='1' onchange='this.form.submit()'>";
                        echo"</form>
                    </td>
                    <td nowrap style='font-size:10pt'>
                        <form name='form_$ttx' method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                            <input type='hidden' name='processor' value='shiftinglist2'><input type='hidden' name='projectid' value='".$r1y['projectid']."'>
                            <input type='color' class='' name='pcolor' value='$projcolor' style='padding:0px;width:50px' onblur='this.form.submit()'>
                        </form>
                    </td>
                    <td style='width:20px' style='font-size:10pt'><div class='btn-group' onmouseout=\"shiftdataV2('schedule-list.php?days=$d1&months=$mm1&years=$y&sid=0', 'datashiftXX')\">
                        <a href='deleterecords.php?delid=".$r1y["id"]."&tbl=shifting_schedule' target='dataprocessor' style='margin-top:0px'>
                            <i class='fa fa-trash'></i>
                        </a>
                    </div></td>
                </tr>";
            } }
        echo"</tbody>
    </table>";
?>