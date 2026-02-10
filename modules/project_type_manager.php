<?php

    include("../authenticator.php");
    
    $dbname="project_sc";
    if(isset($_COOKIE["viewmode"])) $viewmode=$_COOKIE["viewmode"];
    else $viewmode="LIST";

    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    $sourceid=0;
    if(isset($_GET["sourceid"])) $sourceid=$_GET["sourceid"];
    
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];
    $title="Edit user Record";
    if(isset($_GET["lim"])) $lim=$_GET["lim"];
    else $lim=1000;

    echo"<div class='card-body' style='width:100%;padding:0px'>
        <div class='row' style='padding-left:5px;padding-right:5px'>
            <div class='col-12'>
                <table style='width:100%'>
                    <thead><tr>
                        <th style='text-align:left'>Name</th>
                        <th style='text-align:left'>Parent/Location</th>
                        <th style='text-align:left'>Note</th>
                        <th style='text-align:center'>status</th>
                        <th>&nbsp;</th>
                    </tr></thead> 
                    <tbody>";
                        
                        $ra1 = "select * from project_type where type='".$_GET["sourceid"]."' order by name asc";
                        $rb1 = $conn->query($ra1);
                        if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                            if($rab1["type"]=="CATEGORY"){
                                $ra1x = "select * from project_type where id='".$rab1["location"]."' order by name asc limit 1";
                                $rb1x = $conn->query($ra1x);
                                if ($rb1x->num_rows > 0) { while($rab1x = $rb1x->fetch_assoc()) { $location=$rab1x["name"]; } }
                            }else $location=$rab1["location"];
                            
                            echo"<tr>
                                <td>".$rab1["name"]."</td><td>$location</td><td>".$rab1["note"]."</td><td>".$rab1["status"]."</td>
                                <td class='text-alternate'>
                                    <div class='d-inline-block datatable-export' data-datatable='#datatableRows' style='background-color:grey;padding:5px;width:30px;text-align:center;border-radius:5px'>
                                        <button class='btn p-0' data-bs-toggle='dropdown' type='button' data-bs-offset='0,3'><i class='fa-solid fa-bars'></i></button>
                                        <div class='dropdown-menu shadow dropdown-menu-end' onmouseup=\"shiftdataV2('project_type_manager.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=".$_GET["sourceid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">
                                            <a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('global_manager.php?dataid=".$rab1["id"]."&cid=$cid&sheba=$sheba&sourceid=".$_GET["sourceid"]."&ctitle=Edit ".$_GET["sourceid"]."', 'offcanvasRight')\">Edit</a>";
                                            if($rab1["status"]=="ON") echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=OFF&tid=project_type&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('project_type_manager.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=".$_GET["sourceid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Suspend</a>";
                                            else echo"<a class='dropdown-item' href='dataprocessor_1.php?processor=StatusSuspend&status=ON&tid=project_type&pid=".$rab1["id"]."' target='dataprocessor' onblur=\"shiftdataV2('project_type_manager.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=".$_GET["sourceid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Activate</a>";
                                            // echo"<a class='dropdown-item' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasTop' aria-controls='offcanvasTop' onblur=\"shiftdataV2('project_type_manager.php?cid=".$_GET["cid"]."&sheba=".$_GET["sheba"]."&utype=".$_GET["utype"]."&sourceid=".$_GET["sourceid"]."&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">Delete</a>";
                                        echo"</div>
                                    </div>
                                </td>
                                <td>&nbsp;</td>
                            </tr>"; 
                        } }
                    echo"</tbody>
                </table>
            </div>
        </div>
    </div>"; 
