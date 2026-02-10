<?php
    // error_reporting(0);      
    echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='../font/CS-Interface/style.css' />
    <link rel='stylesheet' href='../css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='../css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='../css/styles.css' />
    <link rel='stylesheet' href='../css/main.css' />
    <script src='../js/base/loader.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>";

    // $mtype="ADMIN";

    $tcount=0;
    $c1 = "SELECT * FROM tasks where employeeid='$userid' and activity='2' order by activity asc";
    $d1 = $conn->query($c1);
    if ($d1->num_rows > 0) { while($cs1 = $d1->fetch_assoc()) {
        $stime=time();
        $etime=$cs1["end"];
        if($etime<=$stime){
            $sql="update tasks set activity='4' where id='".$cs1["id"]."'";
            if ($conn->query($sql) === TRUE) $tomtom=0;
        }
    } }
    
    if($projectid!=0) $projectidx="and projectid='$projectid'";
    else $projectidx="";
    
    if($designationy!=13){

        $sqlIncompleteX = "SELECT * FROM tasks where employeeid='$userid' and activity<>'10' $projectidx ORDER BY priority desc";
        $result = mysqli_query($conn, $sqlIncompleteX);
        $incomleteItemsX = mysqli_fetch_all($result,MYSQLI_ASSOC);
        
        $sqlIncomplete = "SELECT * FROM tasks where employeeid='$userid' and activity='0' $projectidx ORDER BY priority desc";
        $result = mysqli_query($conn, $sqlIncomplete);
        $incomleteItems = mysqli_fetch_all($result,MYSQLI_ASSOC);
                        
        $sqlProcessing = "SELECT * FROM tasks where employeeid='$userid' and activity='1' $projectidx ORDER BY priority desc";
        $processingResult = mysqli_query($conn, $sqlProcessing);
        $processingItems = mysqli_fetch_all($processingResult, MYSQLI_ASSOC);
                        
        $sqlCompleted = "SELECT * FROM tasks where employeeid='$userid' and activity='2' $projectidx ORDER BY priority desc";
        $completeResult = mysqli_query($conn, $sqlCompleted);
        $completeItems = mysqli_fetch_all($completeResult, MYSQLI_ASSOC);
        
        $sqlOnhold = "SELECT * FROM tasks where employeeid='$userid' and activity='3' $projectidx ORDER BY priority desc";
        $onholdResult = mysqli_query($conn, $sqlOnhold);
        $onholdItems = mysqli_fetch_all($onholdResult, MYSQLI_ASSOC);
        
        $sqlOnReject = "SELECT * FROM tasks where employeeid='$userid' and activity='4' $projectidx ORDER BY priority desc";
        $onRejectResult = mysqli_query($conn, $sqlOnReject);
        $onRejectItems = mysqli_fetch_all($onRejectResult, MYSQLI_ASSOC);
        
    }else{
        $sqlIncompleteX = "SELECT * FROM tasks where  activity<>'10' $projectidx ORDER BY priority desc";
        $result = mysqli_query($conn, $sqlIncompleteX);
        $incomleteItemsX = mysqli_fetch_all($result,MYSQLI_ASSOC);
        
        $sqlIncomplete = "SELECT * FROM tasks where activity='0' $projectidx ORDER BY priority desc";
        $result = mysqli_query($conn, $sqlIncomplete);
        $incomleteItems = mysqli_fetch_all($result,MYSQLI_ASSOC);
                        
        $sqlProcessing = "SELECT * FROM tasks where activity='1' $projectidx ORDER BY priority desc";
        $processingResult = mysqli_query($conn, $sqlProcessing);
        $processingItems = mysqli_fetch_all($processingResult, MYSQLI_ASSOC);
                        
        $sqlCompleted = "SELECT * FROM tasks where activity='2' $projectidx ORDER BY priority desc";
        $completeResult = mysqli_query($conn, $sqlCompleted);
        $completeItems = mysqli_fetch_all($completeResult, MYSQLI_ASSOC);
        
        $sqlOnhold = "SELECT * FROM tasks where activity='3' $projectidx ORDER BY priority desc";
        $onholdResult = mysqli_query($conn, $sqlOnhold);
        $onholdItems = mysqli_fetch_all($onholdResult, MYSQLI_ASSOC);
        
        $sqlOnReject = "SELECT * FROM tasks where activity='4' $projectidx ORDER BY priority desc";
        $onRejectResult = mysqli_query($conn, $sqlOnReject);
        $onRejectItems = mysqli_fetch_all($onRejectResult, MYSQLI_ASSOC);
    }

    mysqli_free_result($onholdResult);
    mysqli_free_result($completeResult);
    mysqli_free_result($processingResult);
    mysqli_free_result($result);

    echo"<div class='scroll-section' id='wrapper'>
        <div class='wrapper wrapper-content  animated fadeInTop' style='width:100%;'>
            <div class='row' id='sortable-view'>";
            
                if($projectid==0){ 
                    echo"<div class='col-md-3' id='droppable1'><br><span style='font-size:12pt'>Pending</span><hr>";
                        foreach ($incomleteItems as $key => $item) {
                            $employeename="";
                            $a = "select * from uerp_user where id='".$item["employeeid"]."' order by id asc limit 1";
                            $b = $conn->query($a);
                            if ($b->num_rows > 0) { while($ab = $b -> fetch_assoc()) { $employeename="".$ab["username"]." ".$ab["username2"].""; } }
                            $clientname="";
                            $projectname="";
                            $c = "select * from project where id='".$item["clientid"]."' order by id asc limit 1";
                            $d = $conn->query($c);
                            if ($d->num_rows > 0) { while($cd = $d -> fetch_assoc()) {
                                $projectname=$cd["name"];
                                $cx = "select * from uerp_user where id='".$cd["clientid"]."' order by id asc limit 1";
                                $dx = $conn->query($cx);
                                if ($dx->num_rows > 0) { while($cdx = $dx -> fetch_assoc()) { $clientname="".$cdx["username"]." ".$cdx["username2"].""; }}
                            } }
                            $taskdate="";
                            $taskdate=date("d-m-Y", $item["date"]);
                            $sdate1=strtotime($item["start"]);
                            $sdate1=date("d-m-Y h:i a", $sdate1);
                            $sdate2=strtotime($item["end"]);
                            $sdate2=date("d-m-Y h:i a", $sdate2);
                            
                            echo"<div class='card mb-5' data-itemid='".$item['id']."' style='padding:5px'>
                                <div class='ibox-title'>
                                    <div class='card-body' style='padding:5px'>
                                        <table><tr>
                                            <td style='width:10%'>";
                                                if($item["priority"]=="0") echo"<b><i class='fa fa-angle-up' aria-hidden='true' style='font-size:12pt;color:grey'></i></b>";
                                                if($item["priority"]=="1") echo"<b><i class='fa fa-angle-up' aria-hidden='true' style='font-size:12pt;color:black'></i></b>";
                                                if($item["priority"]=="2") echo"<b><i class='fa fa-angle-double-up' aria-hidden='true' style='font-size:12pt;color:orange'></i></b>";
                                                if($item["priority"]=="3") echo"<b><i class='fa fa-angle-double-up' aria-hidden='true' style='font-size:12pt;color:red'></i></b>";
                                            echo"</td>
                                            <td style='font-size:10pt;width:90%'>
                                                <a data-bs-toggle='collapse' href='#task-".$item['id']."' aria-expanded='false' aria-controls='collapseExample'><b>".$item['title']."</b></a>
                                            </td>
                                            <td>
                                                <div class='d-inline-block datatable-export' data-datatable='#datatableStripe'>
                                                    <button class='btn btn-icon btn-icon-only btn-outline-secondary btn-sm dropdown' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i data-acorn-icon='more-vertical'></i></button>
                                                    <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end'>
                                                        <a id='notifyButtonBottomLeft' href='modules/task2.php?itemid=".$item['id']."' target='dataprocessor' class='dropdown-item' >Processing</a>    
                                                        <a id='notifyButtonBottomLeft' href='modules/task3.php?itemid=".$item['id']."' target='dataprocessor' class='dropdown-item' >Completed</a>
                                                        <a id='notifyButtonBottomLeft' href='modules/task4.php?itemid=".$item['id']."' target='dataprocessor' class='dropdown-item' >Onhold</a>";
                                                        if($mtype=="ADMIN"){
                                                            echo"<hr><a href='#' target='dataprocessor' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#edittask' onmouseover=\"shiftdataV2('task_manager_process.php?cid=$cid&sheba=$sheba&ctitle=$title&url=task_manager.php&id=58&tid=".$item['id']."', 'edittask')\">Edit</a>";
                                                            echo"<hr><a href='deletetask.php?delid=".$item['id']."&tbl=tasks' target='dataprocessor' style='color:red' class='dropdown-item' >Delete</a>";
                                                        }
                                                    echo"</div>
                                                </div>
                                            </td>
                                        </tr></table>
    
                                        <div class='collapse' id='task-".$item['id']."'>
                                            <div class='card card-body no-shadow border mt-3' style='padding:2px'>                                            
                                                <table style='width:100%;padding:2px'>
                                                    
                                                    <tr><td style='font-size:9pt' nowrap><b>Task Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$taskdate</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Project/Lead</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$projectname</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Assigned For</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$clientname</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Assigned To</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$employeename</td></tr>
                                                    
                                                    <tr><td style='font-size:9pt' colspan=10><hr></td></tr>
                                                    <tr><td style='font-size:9pt'><b>Scheduled Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$sdate1</td></tr>
                                                    <tr><td style='font-size:9pt'><b>Expire Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$sdate2</td></tr>
                                                    
                                                    <tr><td style='font-size:9pt' colspan=10><hr></td></tr>
                                                    <tr><td style='font-size:9pt'><b>Task Detail</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'></td></tr>
                                                    
                                                    
                                                    <tr><td colspan=3 style='font-size:9pt'>".$item['detail']." <hr>Attachments: ";
                                                        $t=0;
                                                        $ra1x = "select * from project_multi_image where postid='".$item["id"]."' and randid='".$item["image"]."' and status='1' and source='TASK MANAGER' order by id desc";
                                                        $rb1x = $conn->query($ra1x);
                                                        if ($rb1x->num_rows > 0) { while($rab1x = $rb1x->fetch_assoc()) {
                                                            $t=($t+1);
                                                            echo"<a href='".$rab1x["location"]."' target='cm'>$t</a>&nbsp;&nbsp;";
                                                        } }
                                                    echo"</td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                    echo"</div>";
                
                    echo"<div class='col-lg-3' id='droppable2'><br><span style='font-size:12pt'>Processing</span><hr>";
                        foreach ($processingItems as $key => $pitem) {
                            $employeename="";
                            $a = "select * from uerp_user where id='".$pitem["employeeid"]."' order by id asc limit 1";
                            $b = $conn->query($a);
                            if ($b->num_rows > 0) { while($ab = $b -> fetch_assoc()) { $employeename="".$ab["username"]." ".$ab["username2"].""; } }
                            $clientname="";
                            $projectname="";
                            $c = "select * from project where id='".$pitem["clientid"]."' order by id asc limit 1";
                            $d = $conn->query($c);
                            if ($d->num_rows > 0) { while($cd = $d -> fetch_assoc()) {
                                $projectname=$cd["name"];
                                $cx = "select * from uerp_user where id='".$cd["clientid"]."' order by id asc limit 1";
                                $dx = $conn->query($cx);
                                if ($dx->num_rows > 0) { while($cdx = $dx -> fetch_assoc()) { $clientname="".$cdx["username"]." ".$cdx["username2"].""; }}
                            } }
                            $taskdate="";
                            $taskdate=date("d-m-Y", $pitem["date"]);
                            $sdate1=strtotime($item["start"]);
                            $sdate1=date("d-m-Y", $sdate1);
                            $sdate2=strtotime($item["end"]);
                            $sdate2=date("d-m-Y", $sdate2);
                            
                            echo"<div class='card mb-5' data-itemid='".$pitem['id']."' style='padding:5px'>
                                <div class='ibox-title'>
                                    <div class='card-body' style='padding:5px'>
                                        <table><tr>
                                            <td style='width:10%'>";
                                                if($pitem["priority"]=="0") echo"<b><i class='fa fa-angle-up' aria-hidden='true' style='font-size:12pt;color:grey'></i></b>";
                                                if($pitem["priority"]=="1") echo"<b><i class='fa fa-angle-up' aria-hidden='true' style='font-size:12pt;color:black'></i></b>";
                                                if($pitem["priority"]=="2") echo"<b><i class='fa fa-angle-double-up' aria-hidden='true' style='font-size:12pt;color:orange'></i></b>";
                                                if($pitem["priority"]=="3") echo"<b><i class='fa fa-angle-double-up' aria-hidden='true' style='font-size:12pt;color:red'></i></b>";
                                            echo"</td>
                                            <td style='font-size:10pt;width:90%'>
                                                <a data-bs-toggle='collapse' href='#task-".$pitem['id']."' aria-expanded='false' aria-controls='collapseExample'><b>".$pitem['title']."</b></a>
                                            </td>
                                            <td>
                                                <div class='d-inline-block datatable-export' data-datatable='#datatableStripe'>
                                                    <button class='btn btn-icon btn-icon-only btn-outline-secondary btn-sm dropdown' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i data-acorn-icon='more-vertical'></i></button>
                                                    <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end'>
                                                        <a id='notifyButtonBottomLeft' href='modules/task1.php?itemid=".$pitem['id']."' target='dataprocessor' class='dropdown-item' >Pending</a>    
                                                        <a id='notifyButtonBottomLeft' href='modules/task3.php?itemid=".$pitem['id']."' target='dataprocessor' class='dropdown-item' >Completed</a>
                                                        <a id='notifyButtonBottomLeft' href='modules/task4.php?itemid=".$pitem['id']."' target='dataprocessor' class='dropdown-item' >Onhold</a>";
                                                        if($mtype=="ADMIN"){
                                                            echo"<hr><a href='#' target='dataprocessor' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#edittask' onmouseover=\"shiftdataV2('task_manager_process.php?cid=$cid&sheba=$sheba&ctitle=$title&url=task_manager.php&id=58&tid=".$pitem['id']."', 'edittask')\">Edit</a>";
                                                            echo"<hr><a href='deletetask.php?delid=".$pitem['id']."&tbl=tasks' target='dataprocessor' style='color:red' class='dropdown-item' >Delete</a>";
                                                        }
                                                    echo"</div>
                                                </div>
                                            </td>
                                        </tr></table>
    
                                        <div class='collapse' id='task-".$pitem['id']."'>
                                            <div class='card card-body no-shadow border mt-3' style='padding:2px'>                                            
                                                <table style='width:100%;padding:2px'>
                                                    
                                                    <tr><td style='font-size:9pt' nowrap><b>Task Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$taskdate</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Project/Lead</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$projectname</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Assigned For</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$clientname</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Assigned To</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$employeename</td></tr>
                                                    
                                                    <tr><td style='font-size:9pt' colspan=10><hr></td></tr>
                                                    <tr><td style='font-size:9pt'><b>Scheduled Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$sdate1</td></tr>
                                                    <tr><td style='font-size:9pt'><b>Expire Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$sdate2</td></tr>
                                                    
                                                    <tr><td style='font-size:9pt' colspan=10><hr></td></tr>
                                                    <tr><td style='font-size:9pt'><b>Task Detail</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'></td></tr>
                                                    
                                                    
                                                    <tr><td colspan=3 style='font-size:9pt'>".$pitem['detail']." <hr>Attachments: ";
                                                        $t=0;
                                                        $ra1x = "select * from project_multi_image where postid='".$pitem["id"]."' and randid='".$pitem["image"]."' and status='1' and source='TASK MANAGER' order by id desc";
                                                        $rb1x = $conn->query($ra1x);
                                                        if ($rb1x->num_rows > 0) { while($rab1x = $rb1x->fetch_assoc()) {
                                                            $t=($t+1);
                                                            echo"<a href='".$rab1x["location"]."' target='cm'>$t</a>&nbsp;&nbsp;";
                                                        } }
                                                    echo"</td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                    echo"</div>
            
                    <div class='col-lg-3' id='droppable3'><br><span style='font-size:12pt'>Completed</span><hr>";
                        foreach ($completeItems as $key => $citem) {
                            $employeename="";
                            $a = "select * from uerp_user where id='".$citem["employeeid"]."' order by id asc limit 1";
                            $b = $conn->query($a);
                            if ($b->num_rows > 0) { while($ab = $b -> fetch_assoc()) { $employeename="".$ab["username"]." ".$ab["username2"].""; } }
                            $clientname="";
                            $projectname="";
                            $c = "select * from project where id='".$citem["clientid"]."' order by id asc limit 1";
                            $d = $conn->query($c);
                            if ($d->num_rows > 0) { while($cd = $d -> fetch_assoc()) {
                                $projectname=$cd["name"];
                                $cx = "select * from uerp_user where id='".$cd["clientid"]."' order by id asc limit 1";
                                $dx = $conn->query($cx);
                                if ($dx->num_rows > 0) { while($cdx = $dx -> fetch_assoc()) { $clientname="".$cdx["username"]." ".$cdx["username2"].""; }}
                            } }
                            $taskdate="";
                            $taskdate=date("d-m-Y", $citem["date"]);
                            $sdate1=strtotime($item["start"]);
                            $sdate1=date("d-m-Y", $sdate1);
                            $sdate2=strtotime($item["end"]);
                            $sdate2=date("d-m-Y", $sdate2);
                            echo"<div class='card mb-5' data-itemid='".$citem['id']."' style='padding:5px'>
                                <div class='ibox-title'>
                                    <div class='card-body' style='padding:5px'>
                                        <table><tr>
                                            <td style='width:10%'>";
                                                if($citem["priority"]=="0") echo"<b><i class='fa fa-angle-up' aria-hidden='true' style='font-size:12pt;color:grey'></i></b>";
                                                if($citem["priority"]=="1") echo"<b><i class='fa fa-angle-up' aria-hidden='true' style='font-size:12pt;color:black'></i></b>";
                                                if($citem["priority"]=="2") echo"<b><i class='fa fa-angle-double-up' aria-hidden='true' style='font-size:12pt;color:orange'></i></b>";
                                                if($citem["priority"]=="3") echo"<b><i class='fa fa-angle-double-up' aria-hidden='true' style='font-size:12pt;color:red'></i></b>";
                                            echo"</td>
                                            <td style='font-size:10pt;width:90%'>
                                                <a data-bs-toggle='collapse' href='#task-".$citem['id']."' aria-expanded='false' aria-controls='collapseExample'><b>".$citem['title']."</b></a>
                                            </td>
                                            <td>
                                                <div class='d-inline-block datatable-export' data-datatable='#datatableStripe'>
                                                    <button class='btn btn-icon btn-icon-only btn-outline-secondary btn-sm dropdown' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i data-acorn-icon='more-vertical'></i></button>
                                                    <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end'>
                                                        <a id='notifyButtonBottomLeft' href='modules/task1.php?itemid=".$citem['id']."' target='dataprocessor' class='dropdown-item' >Pending</a>    
                                                        <a id='notifyButtonBottomLeft' href='modules/task2.php?itemid=".$citem['id']."' target='dataprocessor' class='dropdown-item' >Processing</a>
                                                        <a id='notifyButtonBottomLeft' href='modules/task4.php?itemid=".$citem['id']."' target='dataprocessor' class='dropdown-item' >Onhold</a>";
                                                        if($mtype=="ADMIN"){
                                                            echo"<hr><a href='#' target='dataprocessor' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#edittask' onmouseover=\"shiftdataV2('task_manager_process.php?cid=$cid&sheba=$sheba&ctitle=$title&url=task_manager.php&id=58&tid=".$citem['id']."', 'edittask')\">Edit</a>";
                                                            echo"<hr><a href='deletetask.php?delid=".$citem['id']."&tbl=tasks' target='dataprocessor' style='color:red' class='dropdown-item' >Delete</a>";
                                                        }
                                                    echo"</div>
                                                </div>
                                            </td>
                                        </tr></table>
    
                                        <div class='collapse' id='task-".$citem['id']."'>
                                            <div class='card card-body no-shadow border mt-3' style='padding:2px'>                                            
                                                <table style='width:100%;padding:2px'>
                                                    
                                                    <tr><td style='font-size:9pt' nowrap><b>Task Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$taskdate</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Project/Lead</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$projectname</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Assigned For</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$clientname</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Assigned To</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$employeename</td></tr>
                                                    
                                                    <tr><td style='font-size:9pt' colspan=10><hr></td></tr>
                                                    <tr><td style='font-size:9pt'><b>Scheduled Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$sdate1</td></tr>
                                                    <tr><td style='font-size:9pt'><b>Expire Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$sdate2</td></tr>
                                                    
                                                    <tr><td style='font-size:9pt' colspan=10><hr></td></tr>
                                                    <tr><td style='font-size:9pt'><b>Task Detail</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'></td></tr>
                                                    
                                                    
                                                    <tr><td colspan=3 style='font-size:9pt'>".$citem['detail']." <hr>Attachments: ";
                                                        $t=0;
                                                        $ra1x = "select * from project_multi_image where postid='".$citem["id"]."' and randid='".$citem["image"]."' and status='1' and source='TASK MANAGER' order by id desc";
                                                        $rb1x = $conn->query($ra1x);
                                                        if ($rb1x->num_rows > 0) { while($rab1x = $rb1x->fetch_assoc()) {
                                                            $t=($t+1);
                                                            echo"<a href='".$rab1x["location"]."' target='cm'>$t</a>&nbsp;&nbsp;";
                                                        } }
                                                    echo"</td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                    echo"</div>
            
                    <div class='col-lg-3' id='droppable4'><br><span style='font-size:12pt'>Onhold</span><hr>";
                        foreach ($onholdItems as $key => $oitem) {
                            $employeename="";
                            $a = "select * from uerp_user where id='".$oitem["employeeid"]."' order by id asc limit 1";
                            $b = $conn->query($a);
                            if ($b->num_rows > 0) { while($ab = $b -> fetch_assoc()) { $employeename="".$ab["username"]." ".$ab["username2"].""; } }
                            $clientname="";
                            $projectname="";
                            $c = "select * from project where id='".$oitem["clientid"]."' order by id asc limit 1";
                            $d = $conn->query($c);
                            if ($d->num_rows > 0) { while($cd = $d -> fetch_assoc()) {
                                $projectname=$cd["name"];
                                $cx = "select * from uerp_user where id='".$cd["clientid"]."' order by id asc limit 1";
                                $dx = $conn->query($cx);
                                if ($dx->num_rows > 0) { while($cdx = $dx -> fetch_assoc()) { $clientname="".$cdx["username"]." ".$cdx["username2"].""; }}
                            } }
                            $taskdate="";
                            $taskdate=date("d-m-Y", $oitem["date"]);
                            $sdate1=strtotime($item["start"]);
                            $sdate1=date("d-m-Y", $sdate1);
                            $sdate2=strtotime($item["end"]);
                            $sdate2=date("d-m-Y", $sdate2);
                            echo"<div class='card mb-5' data-itemid='".$oitem['id']."' style='padding:5px'>
                                <div class='ibox-title'>
                                    <div class='card-body' style='padding:5px'>
                                        <table><tr>
                                            <td style='width:10%'>";
                                                if($oitem["priority"]=="0") echo"<b><i class='fa fa-angle-up' aria-hidden='true' style='font-size:12pt;color:grey'></i></b>";
                                                if($oitem["priority"]=="1") echo"<b><i class='fa fa-angle-up' aria-hidden='true' style='font-size:12pt;color:black'></i></b>";
                                                if($oitem["priority"]=="2") echo"<b><i class='fa fa-angle-double-up' aria-hidden='true' style='font-size:12pt;color:orange'></i></b>";
                                                if($oitem["priority"]=="3") echo"<b><i class='fa fa-angle-double-up' aria-hidden='true' style='font-size:12pt;color:red'></i></b>";
                                            echo"</td>
                                            <td style='font-size:10pt;width:90%'>
                                                <a data-bs-toggle='collapse' href='#task-".$oitem['id']."' aria-expanded='false' aria-controls='collapseExample'><b>".$oitem['title']."</b></a>
                                            </td>
                                            <td>
                                                <div class='d-inline-block datatable-export' data-datatable='#datatableStripe'>
                                                    <button class='btn btn-icon btn-icon-only btn-outline-secondary btn-sm dropdown' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i data-acorn-icon='more-vertical'></i></button>
                                                    <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end'>
                                                        <a id='notifyButtonBottomLeft' href='modules/task1.php?itemid=".$oitem['id']."' target='dataprocessor' class='dropdown-item' >Pending</a>    
                                                        <a id='notifyButtonBottomLeft' href='modules/task2.php?itemid=".$oitem['id']."' target='dataprocessor' class='dropdown-item' >Processing</a>
                                                        <a id='notifyButtonBottomLeft' href='modules/task3.php?itemid=".$oitem['id']."' target='dataprocessor' class='dropdown-item' >Completed</a>";
                                                        if($mtype=="ADMIN"){
                                                            echo"<hr><a href='#' target='dataprocessor' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#edittask' onmouseover=\"shiftdataV2('task_manager_process.php?cid=$cid&sheba=$sheba&ctitle=$title&url=task_manager.php&id=58&tid=".$oitem['id']."', 'edittask')\">Edit</a>";
                                                            echo"<hr><a href='deletetask.php?delid=".$oitem['id']."&tbl=tasks' target='dataprocessor' style='color:red' class='dropdown-item' >Delete</a>";
                                                        }
                                                    echo"</div>
                                                </div>
                                            </td>
                                        </tr></table>
    
                                        <div class='collapse' id='task-".$oitem['id']."'>
                                            <div class='card card-body no-shadow border mt-3' style='padding:2px'>                                            
                                                <table style='width:100%;padding:2px'>
                                                    
                                                    <tr><td style='font-size:9pt' nowrap><b>Task Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$taskdate</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Project/Lead</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$projectname</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Assigned For</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$clientname</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Assigned To</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$employeename</td></tr>
                                                    
                                                    <tr><td style='font-size:9pt' colspan=10><hr></td></tr>
                                                    <tr><td style='font-size:9pt'><b>Scheduled Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$sdate1</td></tr>
                                                    <tr><td style='font-size:9pt'><b>Expire Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$sdate2</td></tr>
                                                    
                                                    <tr><td style='font-size:9pt' colspan=10><hr></td></tr>
                                                    <tr><td style='font-size:9pt'><b>Task Detail</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'></td></tr>
                                                    <tr><td colspan=3 style='font-size:9pt'>".$oitem['detail']." <hr>Attachments: ";
                                                        $t=0;
                                                        $ra1x = "select * from project_multi_image where postid='".$oitem["id"]."' and randid='".$oitem["image"]."' and status='1' and source='TASK MANAGER' order by id desc";
                                                        $rb1x = $conn->query($ra1x);
                                                        if ($rb1x->num_rows > 0) { while($rab1x = $rb1x->fetch_assoc()) {
                                                            $t=($t+1);
                                                            echo"<a href='".$rab1x["location"]."' target='cm'>$t</a>&nbsp;&nbsp;";
                                                        } }
                                                    echo"</td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                    echo"</div>
                    
                    <div class='col-lg-3' id='droppable5'><br><span style='font-size:12pt'>Expired Tasks</span><hr>";
                        foreach ($onRejectItems as $key => $ritem) {
                            $employeename=""; 
                            $a = "select * from uerp_user where id='".$ritem["employeeid"]."' order by id asc limit 1";
                            $b = $conn->query($a);
                            if ($b->num_rows > 0) { while($ab = $b -> fetch_assoc()) { $employeename="".$ab["username"]." ".$ab["username2"].""; } }
                            $clientname="";
                            $projectname="";
                            $c = "select * from project where id='".$ritem["clientid"]."' order by id asc limit 1";
                            $d = $conn->query($c);
                            if ($d->num_rows > 0) { while($cd = $d -> fetch_assoc()) {
                                $projectname=$cd["name"];
                                $cx = "select * from uerp_user where id='".$cd["clientid"]."' order by id asc limit 1";
                                $dx = $conn->query($cx);
                                if ($dx->num_rows > 0) { while($cdx = $dx -> fetch_assoc()) { $clientname="".$cdx["username"]." ".$cdx["username2"].""; }}
                            } }
                            $taskdate="";
                            $taskdate=date("d-m-Y", $ritem["date"]);
                            $sdate1=strtotime($item["start"]);
                            $sdate1=date("d-m-Y", $sdate1);
                            $sdate2=strtotime($item["end"]);
                            $sdate2=date("d-m-Y", $sdate2);
                            echo"<div class='card mb-5' data-itemid='".$ritem['id']."' style='padding:5px'>
                                <div class='ibox-title'>
                                    <div class='card-body' style='padding:5px'>
                                        <table><tr>
                                            <td style='width:10%'>";
                                                if($ritem["priority"]=="0") echo"<b><i class='fa fa-angle-up' aria-hidden='true' style='font-size:12pt;color:grey'></i></b>";
                                                if($ritem["priority"]=="1") echo"<b><i class='fa fa-angle-up' aria-hidden='true' style='font-size:12pt;color:black'></i></b>";
                                                if($ritem["priority"]=="2") echo"<b><i class='fa fa-angle-double-up' aria-hidden='true' style='font-size:12pt;color:orange'></i></b>";
                                                if($ritem["priority"]=="3") echo"<b><i class='fa fa-angle-double-up' aria-hidden='true' style='font-size:12pt;color:red'></i></b>";
                                            echo"</td>
                                            <td style='font-size:10pt;width:90%'>
                                                <a data-bs-toggle='collapse' href='#task-".$ritem['id']."' aria-expanded='false' aria-controls='collapseExample'><b>".$ritem['title']."</b></a>
                                            </td>
                                            <td>
                                                <div class='d-inline-block datatable-export' data-datatable='#datatableStripe'>
                                                    <button class='btn btn-icon btn-icon-only btn-outline-secondary btn-sm dropdown' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i data-acorn-icon='more-vertical'></i></button>
                                                    <div class='dropdown-menu dropdown-menu-sm dropdown-menu-end'>
                                                        <a id='notifyButtonBottomLeft' href='modules/task1.php?itemid=".$ritem['id']."' target='dataprocessor' class='dropdown-item' >Pending</a>    
                                                        <a id='notifyButtonBottomLeft' href='modules/task2.php?itemid=".$ritem['id']."' target='dataprocessor' class='dropdown-item' >Processing</a>
                                                        <a id='notifyButtonBottomLeft' href='modules/task3.php?itemid=".$ritem['id']."' target='dataprocessor' class='dropdown-item' >Completed</a>";
                                                        if($mtype=="ADMIN"){
                                                            echo"<hr><a href='#' target='dataprocessor' class='dropdown-item' data-bs-toggle='modal' data-bs-target='#edittask' onmouseover=\"shiftdataV2('task_manager_process.php?cid=$cid&sheba=$sheba&ctitle=$title&url=task_manager.php&id=58&tid=".$ritem['id']."', 'edittask')\">Edit</a>";
                                                            echo"<hr><a href='deletetask.php?delid=".$ritem['id']."&tbl=tasks' target='dataprocessor' style='color:red' class='dropdown-item' >Delete</a>";
                                                        }
                                                    echo"</div>
                                                </div>
                                            </td>
                                        </tr></table>
    
                                        <div class='collapse' id='task-".$ritem['id']."'>
                                            <div class='card card-body no-shadow border mt-3' style='padding:2px'>                                            
                                                <table style='width:100%;padding:2px'>
                                                    
                                                    <tr><td style='font-size:9pt' nowrap><b>Task Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$taskdate</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Project/Lead</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$projectname</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Assigned For</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$clientname</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Assigned To</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$employeename</td></tr>
                                                    
                                                    <tr><td style='font-size:9pt' colspan=10><hr></td></tr>
                                                    <tr><td style='font-size:9pt'><b>Scheduled Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$sdate1</td></tr>
                                                    <tr><td style='font-size:9pt'><b>Expire Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$sdate2</td></tr>
                                                    
                                                    <tr><td style='font-size:9pt' colspan=10><hr></td></tr>
                                                    <tr><td style='font-size:9pt'><b>Task Detail</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'></td></tr>
                                                    <tr><td colspan=3 style='font-size:9pt'>".$ritem['detail']." <hr>Attachments: ";
                                                        $t=0;
                                                        $ra1x = "select * from project_multi_image where postid='".$ritem["id"]."' and randid='".$ritem["image"]."' and status='1' and source='TASK MANAGER' order by id desc";
                                                        $rb1x = $conn->query($ra1x);
                                                        if ($rb1x->num_rows > 0) { while($rab1x = $rb1x->fetch_assoc()) {
                                                            $t=($t+1);
                                                            echo"<a href='".$rab1x["location"]."' target='cm'>$t</a>&nbsp;&nbsp;";
                                                        } }
                                                    echo"</td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                    echo"</div>";
                    
                }else{
                    
                    echo"<div class='col-md-12' id='droppable1'><br>";
                        foreach ($incomleteItemsX as $key => $item) {
                            $employeename="";
                            $a = "select * from uerp_user where id='".$item["employeeid"]."' order by id asc limit 1";
                            $b = $conn->query($a);
                            if ($b->num_rows > 0) { while($ab = $b -> fetch_assoc()) { $employeename="".$ab["username"]." ".$ab["username2"].""; } }
                            $clientname="";
                            $projectname="";
                            $c = "select * from project where id='".$item["clientid"]."' order by id asc limit 1";
                            $d = $conn->query($c);
                            if ($d->num_rows > 0) { while($cd = $d -> fetch_assoc()) {
                                $projectname=$cd["name"];
                                $cx = "select * from uerp_user where id='".$cd["clientid"]."' order by id asc limit 1";
                                $dx = $conn->query($cx);
                                if ($dx->num_rows > 0) { while($cdx = $dx -> fetch_assoc()) { $clientname="".$cdx["username"]." ".$cdx["username2"].""; }}
                            } }
                            $taskdate="";
                            $taskdate=date("d-m-Y", $item["date"]);
                            $sdate1=strtotime($item["start"]);
                            $sdate1=date("d-m-Y", $sdate1);
                            $sdate2=strtotime($item["end"]);
                            $sdate2=date("d-m-Y", $sdate2);
                            echo"<div class='card mb-5' data-itemid='".$item['id']."' style='padding:5px'>
                                <div class='ibox-title'>
                                    <div class='card-body' style='padding:5px'>
                                        <table><tr>
                                            <td style='width:10%'>";
                                                if($item["priority"]=="0") echo"<b><i class='fa fa-angle-up' aria-hidden='true' style='font-size:12pt;color:#DDDDDD'></i></b>";
                                                if($item["priority"]=="1") echo"<b><i class='fa fa-angle-up' aria-hidden='true' style='font-size:12pt;color:#FFFFFF'></i></b>";
                                                if($item["priority"]=="2") echo"<b><i class='fa fa-angle-double-up' aria-hidden='true' style='font-size:12pt;color:orange'></i></b>";
                                                if($item["priority"]=="3") echo"<b><i class='fa fa-angle-double-up' aria-hidden='true' style='font-size:12pt;color:red'></i></b>";
                                            echo"</td>
                                            <td style='font-size:10pt;width:90%'>
                                                <a data-bs-toggle='collapse' href='#task-".$item['id']."' aria-expanded='false' aria-controls='collapseExample'><b>".$item['title']."</b></a>
                                            </td><td>
                                                <a data-bs-toggle='collapse' href='#task-".$item['id']."' aria-expanded='false' aria-controls='collapseExample'>
                                                    <b><i class='fa fa-angle-down' aria-hidden='true' style='font-size:12pt;color:#DDDDDD'></i></b>
                                                </a>
                                            </td>
                                        </tr></table>
    
                                        <div class='collapse' id='task-".$item['id']."'>
                                            <div class='card card-body no-shadow border mt-3' style='padding:5px'>                                            
                                                <table style='width:100%;padding:2px'>
                                                    
                                                    <tr><td style='font-size:9pt' nowrap><b>Task Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$taskdate</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Project/Lead</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$projectname</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Assigned For</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$clientname</td></tr>
                                                    <tr><td style='font-size:9pt' nowrap><b>Assigned To</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$employeename</td></tr>
                                                    
                                                    <tr><td style='font-size:9pt' colspan=10><hr></td></tr>
                                                    <tr><td style='font-size:9pt'><b>Scheduled Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$sdate1</td></tr>
                                                    <tr><td style='font-size:9pt'><b>Expire Date</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'>$sdate2</td></tr>
                                                    
                                                    <tr><td style='font-size:9pt' colspan=10><hr></td></tr>
                                                    <tr><td style='font-size:9pt'><b>Task Detail</b></td><td style='font-size:9pt'>:</td><td style='font-size:9pt'></td></tr>
                                                    
                                                    
                                                    <tr><td colspan=3 style='font-size:9pt'>".$item['detail']." <hr>Attachments: ";
                                                        $t=0;
                                                        $ra1x = "select * from project_multi_image where postid='".$item["id"]."' and randid='".$item["image"]."' and status='1' and source='TASK MANAGER' order by id desc";
                                                        $rb1x = $conn->query($ra1x);
                                                        if ($rb1x->num_rows > 0) { while($rab1x = $rb1x->fetch_assoc()) {
                                                            $t=($t+1);
                                                            echo"<a href='".$rab1x["location"]."' target='cm'>$t</a>&nbsp;&nbsp;";
                                                        } }
                                                    echo"</td></tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                    echo"</div>";
                }
                
            echo"</div>
        </div>
    </div>";
    
    
    // Edit Task
    echo"<div class='modal fade modal-close-out' id='edittask' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabelCloseOut' aria-hidden='true'>
        <div class='modal-dialog modal-lg'>
            <div class='modal-content' style='padding:5px'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabelCloseOut'>Task Editor</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body' id='PopupModalX' style='padding:5px'>
                    
                </div>
            </div>
        </div>
    </div>";

?>
    
    <script>
        $( function() {
            $( "#droppable1" ).droppable({
                drop: function( event, ui ) {
                    var itemid = ui.draggable.attr('data-itemid')
                    $.ajax({ method: "POST", url: "modules/task1.php",data:{'itemid': itemid}, }).
                    done(function( data ) { var result = $.parseJSON(data); });
                }
            });
            $( "#droppable2" ).droppable({
                drop: function( event, ui ) {
                    var itemid = ui.draggable.attr('data-itemid')
                    $.ajax({ method: "POST", url: "modules/task2.php", data:{'itemid': itemid},  }).
                    done(function( data ) { var result = $.parseJSON(data); });
                }
            });
            $( "#droppable3" ).droppable({
                drop: function( event, ui ) {
                    var itemid = ui.draggable.attr('data-itemid')
                    $.ajax({ method: "POST", url: "modules/task3.php", data:{'itemid': itemid}, }).
                    done(function( data ) { var result = $.parseJSON(data); });
                }
            });
            $( "#droppable4" ).droppable({
                drop: function( event, ui ) {
                    var itemid = ui.draggable.attr('data-itemid')
                    $.ajax({ method: "POST", url: "modules/task4.php", data:{'itemid': itemid},  }).
                    done(function( data ) { var result = $.parseJSON(data); });
                }
            });
            $( "#droppable5" ).droppable({
                drop: function( event, ui ) {
                    var itemid = ui.draggable.attr('data-itemid')
                    $.ajax({ method: "POST", url: "modules/task5.php", data:{'itemid': itemid},  }).
                    done(function( data ) { var result = $.parseJSON(data); });
                }
            });
            $( "#droppable6" ).droppable({
                drop: function( event, ui ) {
                    var itemid = ui.draggable.attr('data-itemid')
                    $.ajax({ method: "POST", url: "modules/task6.php", data:{'itemid': itemid}, }).
                    done(function( data ) { var result = $.parseJSON(data);});
                }
            });
            $( "#droppable7" ).droppable({
                drop: function( event, ui ) {
                    var itemid = ui.draggable.attr('data-itemid')
                    $.ajax({ method: "POST", url: "task7.php", data:{'itemid': itemid}, }).
                    done(function( data ) { var result = $.parseJSON(data); });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            WinMove();
        });
    </script>

    <script>
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("mySortTable");
            switching = true;
            //Set the sorting direction to ascending:
            dir = "asc"; 
            
            while (switching) {
                //start by saying: no switching is done:
                switching = false;
                rows = table.rows;
                
                for (i = 1; i < (rows.length - 1); i++) {
                    //start by saying there should be no switching:
                    shouldSwitch = false;
                    
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch= true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            //if so, mark as a switch and break the loop:
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    //Each time a switch is done, increase this count by 1:
                    switchcount ++;
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>
