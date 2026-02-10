
<?php
    $yr=date("Y", time());
    $mn=date("m", time());
    
    $id=0;
    $ra1 = "select * from project where id='".$_COOKIE["projectidx"]."' and status='1' order by id asc limit 1";
    $rb1 = $conn->query($ra1);
    if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
        echo"<div class='row'> 
            <div class='col-4 col-md-2' style='text-align:center;padding:5px'><button class='btn btn-outline-primary btn-sm' type='button' onclick=\"shiftdataV2('projects_profile.php?sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."&clientid=".$rab1["clientid"]."', 'datatableX')\" style='width:100%'>Project Dashboard</button></div>
            <div class='col-4 col-md-2' style='text-align:center;padding:5px'><a href='index.php?url=appointments.php&viewstatus=2&prjsrc=".$rab1["id"]."'><button class='btn btn-outline-tertiary btn-sm' type='button' style='width:100%'>Appointments</button></a></div>
            <div class='col-4 col-md-2' style='text-align:center;padding:5px'><button class='btn btn-outline-tertiary btn-sm' type='button' onclick=\"shiftdataV2('projects_client_package_schedule.php?sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."', 'datatableX')\" style='width:100%'>Package Schedules</button></div>";
            // <div class='col-4 col-md-2' style='text-align:center;padding:5px'><button class='btn btn-outline-secondary btn-sm' type='button' onclick=\"shiftdataV2('projects_client_notes.php?sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."', 'datatableX')\" style='width:100%'>Notes</button></div>
            
            echo"<div class='col-4 col-md-2' style='text-align:center;padding:5px'>
                <a href='index.php?employeedata=ALL&clientdata=".$rab1["clientid"]."&srcfdate=$yr-$mn-01&srctdate=$yr-$mn-30&url=eod-document-reports.php'
                class='btn btn-outline-secondary btn-sm' type='button' style='width:100%'>Notes</a></div>";
            
            echo"<div class='col-4 col-md-2' style='text-align:center;padding:5px'><button class='btn btn-outline-primary btn-sm' type='button' onclick=\"shiftdataV2('projects_client_card_manager.php?sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."', 'datatableX')\" style='width:100%'>Card Manager</button></div>
            <div class='col-4 col-md-2' style='text-align:center;padding:5px'><button class='btn btn-outline-secondary btn-sm' type='button' onclick=\"shiftdataV2('projects_client_sos_budget.php?sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."', 'datatableX')\" style='width:100%'>Plan Budget</button></div>
            <div class='col-4 col-md-2' style='text-align:center;padding:5px'><a href='index.php?url=client-service-agreement.php&projectid=".$rab1["id"]."&clientid=".$rab1["clientid"]."'><button class='btn btn-outline-tertiary btn-sm' type='button' style='width:100%'>Agreement</button></a></div>
            <div class='col-4 col-md-2' style='text-align:center;padding:5px'><button class='btn btn-outline-secondary btn-sm' type='button' onclick=\"shiftdataV2('projects_client_contacts.php?sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."', 'datatableX')\" style='width:100%'>Support Team</button></div>
            <div class='col-4 col-md-2' style='text-align:center;padding:5px'><button class='btn btn-outline-primary btn-sm' type='button' onclick=\"shiftdataV2('projects_client_support_plan.php?sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."', 'datatableX')\" style='width:100%'>Support Plan</button></div>
            <div class='col-4 col-md-2' style='text-align:center;padding:5px'><button class='btn btn-outline-secondary btn-sm' type='button' onclick=\"shiftdataV2('projects_client_emergency_plan.php?sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."', 'datatableX')\" style='width:100%'>Emergency Plan</button></div>
            <div class='col-4 col-md-2' style='text-align:center;padding:5px'><button class='btn btn-outline-tertiary btn-sm' type='button' onclick=\"shiftdataV2('projects_client_documents.php?sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."', 'datatableX')\" style='width:100%'>Documents</button></div>
            <div class='col-4 col-md-2' style='text-align:center;padding:5px'><button class='btn btn-outline-secondary btn-sm' type='button' onclick=\"shiftdataV2('projects_client_ndis_budget.php?sheba=$sheba&utype=$utype&sourceid=leads&url=".$_GET["url"]."', 'datatableX')\" style='width:100%'>Schedule of Supports</button></div>
        </div><br>";
    } }
?>