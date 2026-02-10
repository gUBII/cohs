<?php
    error_reporting(0);
    
    include('../authenticator.php');
    
    if(isset($_COOKIE["userid"])){
        echo"<table class='table table-striped table-bordered table-hover dataTables-example1' >
            <thead><tr><th>Date</th><th>Concern</th><th>Contact</th><th>Documents</th><th>Note</th></tr></thead>
            <tbody>";
                $ra1 = "select * from project_forms where projectid='".$_COOKIE["projectidx"]."' and categoryid='".$_GET["cid"]."' and status='1' order by id desc";
                $rb1 = $conn->query($ra1);
                if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                    $cdate=date("d-m-Y", $rab1["date"]);
                    $datatargetZZ="category".$rab1["categoryid"]."Z";
                    $datatargetYY="category".$rab1["categoryid"]."Y";
                    
                    echo"<tr class='gradeX'>
                        <td nowrap><i class='fa fa-clock'></i>&nbsp; $cdate</td>
                        <td nowrap>".$rab1["cname"]."</td>
                        <td>".$rab1["contact"]."</td>
                        <td>";
                            $t=0;
                            $ra1x = "select * from project_multi_image where postid='".$rab1["id"]."' and randid='".$rab1["randid"]."' and status='1' order by id desc";
                            $rb1x = $conn->query($ra1x);
                            if ($rb1x->num_rows > 0) { while($rab1x = $rb1x->fetch_assoc()) {
                                $loclength=0;
                                $loclength=strlen($rab1x["location"]);
                                if($loclength>=32){
                                    $t=($t+1);
                                    $locname="";
                                    $locname=substr($rab1x["location"],35);
                                    echo"<a href='".$rab1x["location"]."' target='cm'>$t. $locname</a><br>";
                                }
                            } }
                        echo"</td>
                        <td >
                            <button data-bs-toggle='modal' data-bs-target='#formdata".$rab1["id"]."' class='btn btn-outline-primary'>View Note</button>
                            <div class='modal fade modal-close-out' id='formdata".$rab1["id"]."' tabindex='-1' role='dialog' aria-labelledby='formdata".$rab1["id"]."CloseOut' aria-hidden='true' >
                                <div class='modal-dialog'><div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='formdata".$rab1["id"]."CloseOut'>View Note</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'><span style=''>".$rab1["note"]."</span></div>
                                </div></div>
                            </div>
                        </td>
                        <td style='width:20px'><div class='btn-group' onmouseout=\"shiftdataV2('project-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\">
                            <a href='deleterecords.php?delid=".$rab1["id"]."&tbl=project_forms&sourceid=id' target='dataprocessor' style='margin-top:0px;color:$topbar_color' onblur=\"shiftdataV2('project-category-list.php?cid=".$cat3["id"]."', '$datatargetY')\">
                                <i class='fa fa-trash' style='color:red'></i>
                            </a>
                        </div></td>
                    </tr>";
                } }
            echo"</tbody>
        </table>";
    }
?>