<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 100%;
  left: 50%;
  margin-left: -60px;
  
  /* Fade in tooltip - takes 1 second to go from 0% to 100% opac: */
  opacity: 0;
  transition: opacity 1s;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>
<?php

    include '../authenticator.php';
    include '../head.php';
    
    if($walkthrough<=9) $pointerx=10;
    else $pointerx=($walkthrough+10);
    
    if(isset($_GET["pointer"])) $pointer=$_GET["pointer"];
    else $pointer=$pointerx;
    
    $randid=rand(10,100);
    echo"<div class='row'>
        <div class='col-12 col-md-5' style='padding-bottom:10px'><a href='#'>";
            if($pointer==10) echo"<span style='font-size:12pt'>Color Selection</span></a><br><span style='font-size:8pt'>Select COLOR SET that is confortable for you.</span>";
            if($pointer==20) echo"<span style='font-size:10pt'>Interface Selection</span></a><br><span style='font-size:8pt'>Select LAYOUT SET that is confortable for you.</span>";
            if($pointer==30) echo"<span style='font-size:10pt'>Add Employees/Staffs</span></a><br><span style='font-size:8pt'>Select Color Set that is confortable for you.</span>";
            if($pointer==40) echo"<span style='font-size:10pt'>Add Perticipants/Client</span></a><br><span style='font-size:8pt'>Select Color Set that is confortable for you.</span>";
            if($pointer==50) echo"<span style='font-size:10pt'>Add Supplier/Vendor</span></a><br><span style='font-size:8pt'>Select Color Set that is confortable for you.</span>";
            if($pointer==60) echo"<span style='font-size:10pt'>Company Setting</span></a><br><span style='font-size:8pt'>Select Color Set that is confortable for you.</span>";
            if($pointer==70) echo"<span style='font-size:10pt'>Create Lead</span></a><br><span style='font-size:8pt'>Select Color Set that is confortable for you.</span>";
            if($pointer==80) echo"<span style='font-size:10pt'>Create Project</span></a><br><span style='font-size:8pt'>Select Color Set that is confortable for you.</span>";
            // if($pointer==90) echo"<span style='font-size:10pt'>Cusomize Dashboard</span>";
            // if($pointer==100) echo"<span style='font-size:10pt'>Help Center</span>";
        echo"</div>
        
        <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
            <div class='btn-group ms-1 check-all-container'>
                <div class='d-inline-block'>
                    <table style='width:100%'><tr>
                        <td nowrap style='padding-left:5px;padding-right:5px' align=center><button class='btn btn-icon btn-icon-only btn-outline-primary muted btn-sm' type='button' onclick=\"shiftdataV2('walkthrough_data.php?pointer=10', 'datatableXYZ')\" data-bs-toggle='tooltip' data-bs-placement='bottom' title='Theme Color Setting'><i class='fa fa-paint-brush'></i></button><br><span style='font-size:8pt'>Color</span></td>
                        <td nowrap style='padding-left:5px;padding-right:5px' align=center><button class='btn btn-icon btn-icon-only btn-outline-secondary btn-sm' type='button' onclick=\"shiftdataV2('walkthrough_data.php?pointer=20', 'datatableXYZ')\" data-bs-toggle='tooltip' data-bs-placement='bottom' title='Theme Layout Setting'><i class='fa fa-th'></i></button><br><span style='font-size:8pt'>Layout</span></td>
                        <td nowrap style='padding-left:5px;padding-right:5px' align=center><button class='btn btn-icon btn-icon-only btn-outline-primary btn-sm' type='button' onclick=\"shiftdataV2('walkthrough_data.php?pointer=30', 'datatableXYZ')\" data-bs-toggle='tooltip' data-bs-placement='bottom' title='Add Employee/Staffs'><i class='fa fa-user-plus'></i></button><br><span style='font-size:8pt'>User</span></td>
                        <td nowrap style='padding-left:5px;padding-right:5px' align=center><button class='btn btn-icon btn-icon-only btn-outline-secondary btn-sm' type='button' onclick=\"shiftdataV2('walkthrough_data.php?pointer=40', 'datatableXYZ')\" data-bs-toggle='tooltip' data-bs-placement='bottom' title='Add Client/Participants'><i class='fa fa-users'></i></button><br><span style='font-size:8pt'>Client</span></td>
                        <td nowrap style='padding-left:5px;padding-right:5px' align=center><button class='hide-area1 btn btn-icon btn-icon-only btn-outline-primary btn-sm' type='button' onclick=\"shiftdataV2('walkthrough_data.php?pointer=50', 'datatableXYZ')\" data-bs-toggle='tooltip' data-bs-placement='bottom' title='Add Supplier/Vendor'><i class='fa fa-address-card'></i></button><br><span style='font-size:8pt'>Vendor</span></td>
                        <td nowrap style='padding-left:5px;padding-right:5px' align=center><button class='btn btn-icon btn-icon-only btn-outline-primary btn-sm' type='button' onclick=\"shiftdataV2('walkthrough_data.php?pointer=60', 'datatableXYZ')\" data-bs-toggle='tooltip' data-bs-placement='bottom' title='Company Setting'><i class='fa fa-cogs'></i></button><br><span style='font-size:8pt'>Setting</span></td>
                        <td nowrap style='padding-left:5px;padding-right:5px' align=center><button class='btn btn-icon btn-icon-only btn-outline-secondary btn-sm' type='button' onclick=\"shiftdataV2('walkthrough_data.php?pointer=70', 'datatableXYZ')\" data-bs-toggle='tooltip' data-bs-placement='bottom' title='Add New Lead'><i class='fa fa-line-chart'></i></button><br><span style='font-size:8pt'>Lead</span></td>
                        <td nowrap style='padding-left:5px;padding-right:5px' align=center><button class='btn btn-icon btn-icon-only btn-outline-primary btn-sm' type='button' onclick=\"shiftdataV2('walkthrough_data.php?pointer=80', 'datatableXYZ')\" data-bs-toggle='tooltip' data-bs-placement='bottom' title='Start New Project'><i class='fa fa-database'></i></button><br><span style='font-size:8pt'>Project</span></td>";
                        // <td nowrap style='padding-left:5px;padding-right:5px' align=center><button class='btn btn-icon btn-icon-only btn-outline-secondary btn-sm' type='button' onclick=\"shiftdataV2('walkthrough_data.php?pointer=90', 'datatableXYZ')\" data-bs-toggle='tooltip' data-bs-placement='bottom' title='Customize Dashboard'><i class='fa fa-tachometer'></i></button><br><span style='font-size:8pt'>Dashboard</span></td>
                        // <td nowrap style='padding-left:5px;padding-right:5px' align=center><button class='btn btn-icon btn-icon-only btn-outline-secondary btn-sm' type='button' onclick=\"shiftdataV2('walkthrough_data.php?pointer=100', 'datatableXYZ')\" data-bs-toggle='tooltip' data-bs-placement='bottom' title='Visit Help Center'><i class='fa fa-question-circle'></i></button><br><span style='font-size:8pt'>Help!</span></td>
                    echo"</tr></table>
                </div>
            </div>
        </div>
        
        
        
        <div class='col-12' style='width:100%'>";
            if($pointer==10){
                echo"<iframe name='color_chart' src='theme_color.php?url=".$_GET["url"]."&id=".$_GET["id"]."' scrolling='no' border='0' frameborder='0' width='100%' height='420'>BROWSER NOT SUPPORTED</iframe>";
            }
            if($pointer==20){
                echo"<iframe name='color_chart' src='theme_layout.php?url=".$_GET["url"]."&id=".$_GET["id"]."' scrolling='no' border='0' frameborder='0' width='100%' height='600'>BROWSER NOT SUPPORTED</iframe>";                
            }
            if($pointer==30){
                $utype=1;
                include 'add_user.php';
            }
            if($pointer==40){
                $utype=2;
                include 'add_user.php';
            }
            if($pointer==50){
                $utype=3;
                include 'add_user.php';
            }
            if($pointer==60){
                include 'add_settings.php';
            }
            if($pointer==70){
                include 'add_lead.php';
            }
            if($pointer==80){
                include 'add_project.php';
            }
            if($pointer==90){
                include 'add_dashboard.php';
            }
            if($pointer==100){
                include 'help_center.php';
            }
        echo"</div>
        
        <div class='col-12 d-flex align-items-start' style='padding-top:10px'>
            <table style='width:100%'><tr><td>
                <div class='btn btn-icon btn-icon-only btn-outline-info btn-sm' style='border-radius:5px;height:17px;width:100%'>
                    <div class='btn-warning' style='margin-left:-6px;margin-top:-6px;height:16px;width:$walkthrough%;border-radius:5px;text-align:center;color:white;font-size:12pt;valign:middle'>$walkthrough%</div>
                </div>
            </td><td style='width:30px'>";
                $pointerxx=10;
                if($_GET["pointer"]==0) $pointerxx=10;
                if($_GET["pointer"]==10) $pointerxx=20;
                if($_GET["pointer"]==20) $pointerxx=30;
                if($_GET["pointer"]==30) $pointerxx=40;
                if($_GET["pointer"]==40) $pointerxx=50;
                if($_GET["pointer"]==50) $pointerxx=60;
                if($_GET["pointer"]==60) $pointerxx=70;
                if($_GET["pointer"]==70) $pointerxx=80;
                echo"<button class='btn btn-icon btn-success btn-sm' type='button' onclick=\"shiftdataV2('walkthrough_data.php?pointer=$pointerxx', 'datatableXYZ')\" style='width:100%;'>NEXT <i class='fa fa-chevron-right'></i></button>
            </td></tr></table>
        </div>
        
    </div>";
    
    include '../scripts.php';
?>