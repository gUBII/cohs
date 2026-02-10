<?php
    
    $cid=$_GET["cid"];
    $sid=$_GET["sid"];
    $pid=$_GET["pid"];
    
    error_reporting(0);

    include("../authenticator.php");

    echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='../font/CS-Interface/style.css' />
    <link rel='stylesheet' href='../css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='../css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='../css/vendor/glide.core.min.css' />
    <link rel='stylesheet' href='../css/vendor/introjs.min.css' />
    <link rel='stylesheet' href='../css/vendor/select2.min.css' />
    <link rel='stylesheet' href='../css/vendor/select2-bootstrap4.min.css' />
    <link rel='stylesheet' href='../css/vendor/datatables.min.css' />
    <link rel='stylesheet' href='../css/vendor/plyr.css' />
    <link rel='stylesheet' href='../css/styles.css' />
    <link rel='stylesheet' href='../css/main.css' />        
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='../js/base/loader.js'></script>
    
    <div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>Service Addon Manager</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>";
    
    if(isset($_GET["sid"]) && $_GET["sid"]>=1){
        $ttx=0;
        $r1 = "select * from service_agreement_addon where id='".$_GET["sid"]."' and status='1' order by id desc limit 1";
        $r1x = $conn->query($r1);
        if ($r1x->num_rows > 0) { while($r1y = $r1x -> fetch_assoc()) {
            echo"<form class='m-t' role='form' method='post' action='projectprocessor.php' id='schedule-form' target='dataprocessor' enctype='multipart/form-data'>
                <div class='offcanvas-body'>
                    <input type='hidden' name='url' value='".$_GET["url"]."'>
                    <input type='hidden' name='processor' value='editagreementlist'>
                    <input type='hidden' name='sid' value='".$_GET["sid"]."'>
                    <div class='row'>
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'><label>
                            Description:</label><input type='text' class=form-control name='description' value='".$r1y["description"]."' required>
                        </div></div>
                        <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>
                            NDIS item #:</label><input type='text' class=form-control name='ndis_item' value='".$r1y["ndis_item"]."' required>
                        </div></div>
                        <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>
                            Unit:</label><input type='text' class=form-control name='unit' value='".$r1y["unit"]."'>
                        </div></div>
                        <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>
                            Price:</label><input type='text' class=form-control name='price' value='".$r1y["price"]."'>
                        </div></div>
                        <div class='col-12 col-md-6' style='margin-bottom:25px'><div class='form-group'><label>
                            Qty & Frequency:</label><input type='text' class=form-control name='qty' value='".$r1y["qty"]."'>
                        </div></div>
                        <div class='col-12' style='margin-bottom:25px'><div class='form-group'><label>
                            Comments:</label><input type='text' class=form-control name='comments' value='".$r1y["comments"]."'>
                        </div></div>
                    </div>
                </div>
                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                    <input type='hidden' name='cid' value='$cid'><input type='hidden' name='pid' value='$pid'>
                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('client-service-addons.php?cid=$cid&pid=$pid&sid=0', 'datashiftXX')\">Close</button>&nbsp;
                    <button class='btn btn-primary' type='submit' onblur=\"shiftdataV2('client-service-addons.php?cid=$cid&pid=$pid&sid=0', 'datashiftXX')\">Update Project</button>
                </div>
            </form>";
        } }
    }
    
    /* <select class='form-control m-b ' name='leaderid' required>
        <option value='".$rab1["leaderid"]."'>$leadername1 $leadername2</option>";
        $s7 = "select * from uerp_user where mtype='ADMIN' and status='1' order by id asc";
        $r7 = $conn->query($s7);
        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) { echo"<option value='".$rs7["id"]."'>".$rs7["username"]." ".$rs7["username2"]."</option>"; } }
    echo"</select> */
    
?>