<?php
    
    error_reporting(0);
    include("../authenticator.php");
    echo"<div class='modal-dialog modal-xl modal-dialog-scrollable'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='scrollingModalBodyLabel'>".$_GET["log_type"]." Logs Manager</h5>
                
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                &nbsp;&nbsp;
                <button type='button' class='btn btn-outline-warning btn-sm' data-bs-toggle='offcanvas' data-bs-target='#offcanvasLeftFilter2' aria-controls='offcanvasLeftFilter'>
                    <i class='fa fa-life-ring' aria-hidden='true'></i> AI Suggest!
                </button>
                
            </div>
            <div style='text-align:right;margin-right:10px;padding:10px'>";
                if($_GET["log_type"]!="QUOTE"){
                    echo"<form method=get action='addrecord.php' target='dataprocessor'>
                        <input type=hidden name=log_type value='".$_GET["log_type"]."'><input type=hidden name='logid' value='".$_GET["logid"]."'>
                        <input type=submit value='Add New ".$_GET["log_type"]." Log' onblur=\"shiftdataV2('log_data.php?log_type=".$_GET["log_type"]."&logid=".$_GET["logid"]."', 'scrollingModalBody')\" style='margin-top:0px' class='btn btn-outline-warning btn-icon btn-icon-start w-md-auto btn-sm'>
                    </form>";
                }
            echo"</div>
            <div class='modal-body'>";
                
                if($_GET["log_type"]=="QUOTE"){
                    echo"<iframe src='lead_quote.php?lid=".$_GET["logid"]."' name='budgetmanagerx' scrolling='yes' style='border: 0px dashed #000000' border='0' frameborder='0' width='100%' height='800'>BROWSER NOT SUPPORTED</iframe>";
                }else{
                
                    echo"<table class='table stripe table-hover' style='width:100%;padding:10px'>
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
                                            <textarea class='form-control' name='detail' rows='3' style='resize: both; width: 100%;' onchange='this.form.submit()'>".$rab6["detail"]."</textarea >
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
                    </table>";
                }
            echo"</div>
        </div>
    </div>";
?>