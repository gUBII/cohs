<?php
    $sheba="eod";
    $cid=7;
    $title="Add New Client/Participant";
    $utype="EOD";
    $designation=6;

    echo"<div class='row'>
        <div class='col-12 col-md-5' style='padding-bottom:10px'>
            
            <h1 class='mb-0 pb-0 display-4' id='title'>BOC Reports</h1>
        
            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                <ul class='breadcrumb pt-0'>
                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                    if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                    if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
                echo"</ul>
            </nav>
        </div>
        <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
            <form method='get' action='index.php' target='_self' name='output' enctype='multipart/form-data'> 
                <table style='padding-bottom:10px;'><tr>
                    <td style='min-width:80px'>
                        <input class='form-control' type='date' name='srcfdate' placeholder='From Date' style='width:100%'>
                    </td><td style='min-width:80px'>
                        <input class='form-control' type='date' name='srctdate' placeholder='To Date' style='width:100%'>
                    </td><td>
                        <input type='hidden' name='url' value='eod-reports.php'>
                        <input type=submit class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' value='Search'>
                    </td><td>";
                        if($mtype!="CLIENT"){
                            echo"<a href='index.php?url=boc.php'>
                                <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                    <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>BOC</span>
                                </button>
                            </a>";
                        }
                    echo"</td>
                </tr></table>
            </form>
        </div>                  
    </div>    
    <div class='data-table-rows slim' id='sample'>
        <div class='table-responsive'>
            <table class='table table-striped table-bordered table-hover dataTables-example' >
                <thead><tr>
                    <th nowrap>Date</th><th nowrap>Support W.</th><th nowrap>Participant</th><th>Type</th><th>Frequency</th><th>Duration</th><th>Signs</th><th>Information</th>
                </tr></thead>
                <tbody>";
                    $t=0;
                    if(isset($_GET["srcfdate"])){
                        $srcfdate=strtotime($_GET["srcfdate"]);
                        $srctdate=strtotime($_GET["srctdate"]);
                        if($designationy==17) $ra1 = "select * from boc where date>='$srcfdate' and date<='$srctdate' and clientid='".$_GET["clientid"]."' and status='1' order by id desc";
                        else if($designationy==13) $ra1 = "select * from boc where date>='$srcfdate' and date<='$srctdate' and status='1' order by id desc";
                        else $ra1 = "select * from boc where date>='$srcfdate' and date<='$srctdate' and employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                    }else{
                        if($designationy==17) $ra1 = "select * from boc where clientid='".$_GET["clientid"]."' and status='1' order by id desc";
                        else if($designationy==13) $ra1 = "select * from boc where status='1' order by id desc";
                        else $ra1 = "select * from boc where employeeid='".$_COOKIE["userid"]."' and status='1' order by id desc";
                    }
                    $rb1 = $conn->query($ra1);
                    if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                        $boc_date=date("d-m-y H:m", $rab1["date"]);
                        $clientname="";
                        $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id desc limit 1";
                        $rb2 = $conn->query($ra2);
                        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $clientname= "".$rab2["username"]." ".$rab2["username2"].""; } }
                        $employeename="";
                        $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id desc limit 1";
                        $rb2 = $conn->query($ra2);
                        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $employeename= "".$rab2["username"]." ".$rab2["username2"].""; } }
                        
                        echo"<tr class='gradeX'>
                            <td nowrap>ID: ".$rab1["date"]."".$rab1["id"]."<br>";
                                if(!isset($_GET["clientid"])) echo"<a data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('boc_detail_view.php?postid=".$rab1["id"]."', 'offcanvasTop2')\" href='#'><i class='fa fa-eye'></i>&nbsp;View</a>&nbsp;$boc_date&nbsp;";
                                else echo"<a data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop2' aria-controls='offcanvasTop2' onmouseover=\"shiftdataV2('boc_detail_view.php?postid=".$rab1["id"]."&clientid=".$_GET["clientid"]."', 'offcanvasTop2')\" href='#'><i class='fa fa-eye'></i>&nbsp;View</a>&nbsp;$boc_date&nbsp;";
                            echo"</td>
                            <td>$employeename</td>
                            <td>$clientname</td>
                            <td>".$rab1["typeid"]."</td>
                            <td>".$rab1["frequencyid"]."</td>
                            <td>".$rab1["durationid"]."</td>
                            <td>".$rab1["signs"]."</td>
                            <td>".$rab1["information"]."</td>
                        </tr>";
                        
                    } }    
                echo"</tbody>
            </table>
        </div>
    </div>";
