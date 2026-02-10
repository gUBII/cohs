<?php
    // error_reporting(0);
    date_default_timezone_set("Australia/Melbourne");
    
    $sheba="leads";
    $cid=90009;
    $title="Add New Lead";
    $utype="Aged Care Solution";
    
    if(isset($_GET["pstat"])) $pstat=$_GET["pstat"];
    else $pstat=0;
    
    if($pstat==1){
        echo"<div class='row'>
            <div class='col-12 col-md-4' style='padding-bottom:10px'>
                <h1 class='mb-0 pb-0 display-4' id='title'>$utype</h1>
                <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                    <ul class='breadcrumb pt-0'>
                        <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                        <li class='breadcrumb-item'><a href='index.php'>Dashboard</a></li>
                        <li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&pstat=".$_GET["pstat"]."'>$utype</a></li>
                    </ul>
                </nav>
            </div>
            <div class='col-12 col-md-8 d-flex align-items-start justify-content-end'>";
                
                include 'aged_care_bar.php';
            
            echo"</div>
        </div>    
        <div class='row'>
            <div class='col-md-2'>
                <button class='btn btn-primary btn-sm' type='button' onclick=\"shiftdataV2('care_dashboard.php?cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\" style='width:100%;margin-top:4px'>Care Dashboard</button><br>
                
                <form method='post' name='stage1' action='logs_processor.php' target='dataprocessor' enctype='multipart/form-data'class='tooltip-end-bottom'>
                    <input type=hidden name='processor' value='clientmanager'><input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='id' value='".$_GET["id"]."'>
                    <table style='width:100%'><tr><td>
                        <select id='select2Basic' name='cid' class='form-control' style='width:140px;height:30px' onchange='this.form.submit()'>
                            <option label=''>Select Client</option>";
                            $src1 = "select * from uerp_user where mtype='CLIENT' and status='1' OR mtype='CUSTOMER' and status='1' order by username asc";
                            $src2 = $conn->query($src1);
                            if ($src2->num_rows > 0) { while($src3 = $src2->fetch_assoc()) {
                                echo"<option value='".$src3["id"]."'>".$src3["username"]." ".$src3["username2"]."</option>";
                            } }
                        echo"</select>
                    </td><td style='width:30px'><br>
                        <button class='btn btn-outline-primary btn-sm' type='button' onclick=\"shiftdataV2('client_profile.php?sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\" style='width:100%;height:35px;padding:5px'><i class='fa fa-search'></i></button><br><br>
                    </td></tr></table>
                </form>
                <a class='btn btn-tertiary btn-sm' type='button' href='index.php?url=appointments.php&id=5199' style='width:100%'>Appointments</a>
                <br><br>
                <button type='button' class='btn btn-outline-warning btn-sm' data-bs-toggle='offcanvas' data-bs-target='#offcanvasLeftFilter2' aria-controls='offcanvasLeftFilter' style='width:100%'>
                    <i class='fa fa-magic' aria-hidden='true'></i> AI Suggest!
                </button>
                <div class='container text-center mt-5'>
                    <div class='mb-3'>Let's Try A Call:<input type='text' id='toNumber' class='form-control text-center' placeholder='Enter Destination Number' value='+61416103924' required></div>
                    <div class='mb-4'><button id='callBtn' class='btn btn-success btn-lg'>Call & Record</button></div>
                    <div class='calling-section' id='callingSection'><h4 class='mt-3'><span id='showNumber'></span></h4></div>
                </div>
            </div>
            <div class='col-md-10'>
                <div class='data-table-rows slim' id='sample'>
                    <body onload=\"shiftdataV2('care_dashboard.php?cid=$cid&sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&id=".$_GET["id"]."', 'datatableX')\">
                    <div class='data-table-responsive-wrapper'id='datatableX'></div>
                </div>
            </div>
        </div>";
    }else{
        echo"<form method='get' action='global-unset.php' name='main' target='_top'>
            <input type=hidden name='pstat' value='1'><input type=hidden name='id' value='".$_GET["id"]."'><input type=hidden name='url' value='".$_GET["url"]."'><input type=hidden name='sourcefrom' value='".$_GET["sourcefrom"]."'>
        </form>";
        ?> <script language=JavaScript> document.main.submit(); </script> <?php
    }

?>

<script>
    $('#callBtn').click(function () {
        var toNumber = $('#toNumber').val();

        if (toNumber === '') {
            alert('Please enter a number');
            return false;
        }

        // $('#callBtn').hide();
        $('#showNumber').text(toNumber);
        $('#callingSection').show();

        $.ajax({
            url: 'call/make_call.php',
            method: 'POST',
            data: {toNumber: toNumber},
            success: function (response) {
                console.log('Call Triggered');
                console.log(response);
            },
            error: function () {
                alert('Failed to make call.');
            }
        });
    });
</script>