<?php

    include("../authenticator.php");

    if(isset($_COOKIE["viewmode"])) $viewmode=$_COOKIE["viewmode"];
    else $viewmode="LIST";

    if(isset($_COOKIE["sortset"])) $sortset=$_COOKIE["sortset"];
    else $sortset=10000000;

    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
        
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];
    $title="Edit user Record";
    if(isset($_GET["lim"])) $lim=$_GET["lim"];
    else $lim=1000;
    
    if(isset($_GET["mtype"])) $mtype=$_GET["mtype"];
    
    if(isset($_GET["status"])) $status=$_GET["status"];
    else $status=1;
    
    echo"<div class='card-body' style='width:100%;'>
        <div class='row' style='width:100%'>";
            
            if(isset($_GET["empid"])) $empid=$_GET["empid"];
            else $empid=0;
                
            if($mtype=="ADMIN"){
                if($empid!=0){
                    $s1 = "select * from global_documents where employeeid='$empid' and categoryid='".$_GET["categoryid"]."' order by id asc limit $lim";
                }else{
                    $s1 = "select * from global_documents where categoryid='".$_GET["categoryid"]."' order by id asc limit $lim";
                }
            }else{
                $s1 = "select * from global_documents where employeeid='".$_COOKIE["userid"]."' and categoryid='".$_GET["categoryid"]."' order by id asc limit $lim";
            }
            $r1 = $conn->query($s1);
            if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                
                $categoryname="";
                $parentname="";
                $d1 = "select * from modules where id='".$rs1["categoryid"]."' order by id asc limit 1";
                $d2 = $conn->query($d1);
                if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) {
                    $categoryname=$d3["name"];
                    $d1x = "select * from modules where id='".$d3["parent"]."' order by id asc limit 1";
                    $d2x = $conn->query($d1x);
                    if ($d2x->num_rows > 0) { while($d3x = $d2x->fetch_assoc()) { $parentname=$d3x["name"]; } }
                } }
                
                $employeename="";
                $d1e = "select * from uerp_user where id='".$rs1["employeeid"]."' order by id asc limit 1";
                $d2e = $conn->query($d1e);
                if ($d2e->num_rows > 0) { while($d3e = $d2e->fetch_assoc()) {
                    $employeename="".$d3e["username"]." ".$d3e["username2"]."";
                } }
                
                $expire_date=date("d-m-Y",$rs1["expire_date"]);
                $post_date=date("d-m-Y",$rs1["post_date"]);
                
                echo"<div class='col-12 col-md-3' style='text-align:left;padding-bottom:5px;padding-top:4px'>
                    <div class='card mb-3'>
                        <div class='card-body mb-n5' style='padding:10px'>
                            <div class='d-flex align-items-left flex-column mb-5'>
                                <div class='mb-5 d-flex align-items-left flex-column'><Br>
                                    <div class='text-small text-muted'>Date: $post_date</div><br>
                                    <div class='h5 mb-0' style='height:40px'>".$rs1["document_name"]."</div>";
                                    if($mtype=="ADMIN") echo"<div class='text-small'>By: $employeename</div>";
                                    echo"<hr><div class='text-small text-muted'>$categoryname</div>
                                    <div class='text-small text-muted'>$parentname</div>
                                    <div class='text-small text-muted'>Card Number: ".$rs1["card_number"]."</div>
                                    <div class='text-small text-muted'>Issue/Expire Date : $expire_date</div><hr>
                                    <div class='text-small text-muted'>View Documents</div><br>
                                    <table style='width:100%;height:30px'><tr>";
                                        $t=0;
                                        $tt=0;
                                        $d1z = "select * from multi_documents where randid='".$rs1["hard_copy"]."' and uid='".$rs1["employeeid"]."' order by id asc";
                                        $d2z = $conn->query($d1z);
                                        if ($d2z->num_rows > 0) { while($d3z = $d2z->fetch_assoc()) {
                                            $t=($t+1);
                                            $tt=($tt+1);
                                            echo"<td><a href='".$d3z["location"]."' class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button' target='_blank'>$t</a></td>";
                                            if($tt>=5){
                                                echo"</tr><tr>";
                                                $tt=0;
                                            }
                                        } }
                                    echo"</tr></table><hr>
                                </div><center>";
                                if($mtype=="ADMIN") {
                                    echo"<div class='d-flex flex-row justify-content-between w-100 w-sm-100 w-xl-100'>
                                        <a class='btn btn-outline-tertiary btn-icon btn-icon-start w-md-auto btn-sm' type='button' style='cursor: pointer' data-bs-toggle='offcanvas' data-bs-target='#offcanvasRight' aria-controls='offcanvasRight' onmouseover=\"shiftdataV2('document_process.php?did=".$rs1["id"]."&categoryid=".$rs1["categoryid"]."&status=$status&ctitle=Document Manager&empid=$empid&url=".$_GET["url"]."&id=".$_GET["id"]."', 'offcanvasRight')\"><i class='fa fa-edit'></i></a>
                                    </div>";
                                }
                            echo"</div>                             
                        </div>
                    </div>
                </div>";
            } }
        echo"</div>
    </div>";