<?php
    
    error_reporting(0);
    include("../authenticator.php");
/*
    echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='font/CS-Interface/style.css' />
    <link rel='stylesheet' href='css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='css/vendor/glide.core.min.css' />
    <link rel='stylesheet' href='css/vendor/introjs.min.css' />
    <link rel='stylesheet' href='css/vendor/select2.min.css' />
    <link rel='stylesheet' href='css/vendor/select2-bootstrap4.min.css' />
    <link rel='stylesheet' href='css/vendor/datatables.min.css' />
    <link rel='stylesheet' href='css/vendor/plyr.css' />
    <link rel='stylesheet' href='css/styles.css' />
    <link rel='stylesheet' href='css/main.css' />        
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='js/base/loader.js'></script>";
*/

    echo"<hr>
    <table style='width:100%'><tr>
        <td style='width:50%' align=left>";
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
                        $c1x = "select * from uerp_user where id='".$p3["employeeid"]."' order by id asc limit 1";
                        $c2x = $conn->query($c1x);
                        if ($c2x->num_rows > 0) { while($c3x = $c2x -> fetch_assoc()) {
                            $employeename="".$c3x["username"]." ".$c3x["username2"]."";
                        } }
                    } }
                    $leadname="";
                    $leadname="".$p3["lead_name"]." @ $cn";
                } }
            }
        echo"<h4>$leadname</h4>Lead Under Manager: $employeename</td><td style='width:50%;text-aligh:right' align=right>
            <form method=get action='addrecord.php' target='dataprocessor'>
                <input type=hidden name=log_type value='".$_GET["log_type"]."'><input type=hidden name='logid' value='".$_GET["logid"]."'>
                <input type=submit value='Add New ".$_GET["log_type"]." Log' onblur=\"shiftdataV2('log_data_x.php?log_type=".$_GET["log_type"]."&logid=".$_COOKIE["b_lead"]."', 'datatableX')\" style='margin-top:0px' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm'>
            </form>
        </td>
    </tr></table>
    
    <div class='modal-body'>
            
                <table class='table stripe table-hover' style='width:100%;padding:10px'>
                    <thead><tr><th nowrap>Log ID & Date</th><th nowrap>Title & Description</th><th nowrap>Document & Status</th><th nowrap style='text-align:right'></th></tr></thead>
                    <tbody>";
                        $tts=0;
                        $ttt=0;
                        $ttx=0;
                        $tty=0;
                        $ra6 = "select * from activity_logs where logid='".$_GET["logid"]."' and log_type='".$_GET["log_type"]."' order by id desc";
                        $rb6 = $conn->query($ra6);
                        if ($rb6->num_rows > 0) { while($rab6 = $rb6->fetch_assoc()) {
                            $tts=($tts+1);
                            $ttt=($ttt+1);
                            $ttx=($ttx+1);
                            $tty=($tty+1);
                            $allocateddate=date("Y-m-d", $rab6["date"]);
                            
                            echo"<tr class='gradeX'>
                                <td nowrap style='width:20%'>
                                    <input type='text' name='date' readonly class='form-control' value='".$rab6["date"]."-".$rab6["id"]."' style='width:100%' >
                                    <form name='form_$tts' method='post' action='addrecord.php' target='dataprocessor' enctype='multipart/form-data'>
                                        <input type='hidden' name='log2' value='title'><input type='hidden' name='id' value='".$rab6["id"]."'>
                                        <input type='date' name='date' class='form-control' value='$allocateddate' style='width:100%' onchange='this.form.submit()' >
                                    </form>
                                </td>
                                <td nowrap> 
                                    <form name='form_$tts' method='post' action='addrecord.php' target='dataprocessor' enctype='multipart/form-data'>
                                        <input type='hidden' name='log1' value='title'><input type='hidden' name='id' value='".$rab6["id"]."'>
                                        <input type='text' name='title' class='form-control' value='".$rab6["title"]."' style='width:100%' onchange='this.form.submit()' >
                                        <input type='text' name='detail' class='form-control' value='".$rab6["detail"]."' style='width:100%' onchange='this.form.submit()' >
                                    </form>
                                </td>
                                <td nowrap style='width:20%'>
                                    <form name='form_$tty' method='post' action='addrecord.php' target='dataprocessor' enctype='multipart/form-data'>
                                        <input type='file' name='images[]' class='form__field__img form-control' accept='.jpg, .doc, .docx, .pdf,' required>
                                        <input type='hidden' name='log3' value='status'><input type='hidden' name='id' value='".$rab6["id"]."'>
                                        <select name='status' class='form-control' onchange='this.form.submit()' onblur=\"shiftdataV2('log_data.php?log_type=".$_GET["log_type"]."&logid=".$_GET["logid"]."', 'scrollingModalBody')\">
                                            <option value='".$rab6["status"]."'>";
                                                if($rab6["status"]=="1") echo"Active"; else echo"Suspend";
                                            echo"</option>
                                            <option value='1'>Active</option><option value='0'>Suspend</option>
                                        </select>
                                    </form>
                                </td>
                                <td style='width:20px'>
                                    <a href='".$rab6["documents"]."' target='_blank' class='btn btn-outline-info btn-icon btn-icon-start w-md-auto btn-sm'><i class='fa fa-eye''></i></a><br>
                                    <br>
                                    <a href='deleterecords.php?sourceid=id&delid=".$rab6["id"]."&tbl=activity_logs' target='dataprocessor' style='margin-top:0px' onblur=\"shiftdataV2('log_data.php?log_type=".$_GET["log_type"]."&logid=".$_GET["logid"]."', 'scrollingModalBody')\" class='btn btn-outline-danger btn-icon btn-icon-start w-md-auto btn-sm'>
                                        <i class='fa fa-trash''></i>
                                    </a>
                                </td>
                            </tr>";
                        } }
                    echo"</tbody>
                </table>
            </div>";
?>