<?php
    
    error_reporting(0);
    $cdate=time();
    $vmd=date("Y-m", $cdate);
    $vyd=date("Y", $cdate);
    $cdate=date("d-m-Y", $cdate);
    
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    else $cid=$userid;
    
    date_default_timezone_set("Australia/Sydney");
	
    $week_number = date("W", strtotime('now'));
        
    $shift_today3=time();
    $shift_today3=date("Y-m-d", $shift_today3);
    
    $timetable=time();
    $time1=date("H", $timetable);
    
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    else $cid=$userid;
    
    date_default_timezone_set("Australia/Sydney");
	
    $week_number = date("W", strtotime('now'));
        
    $shift_today3=time();
    $shift_today3=date("Y-m-d", $shift_today3);
    
    $timetable=time();
    $time1=date("H", $timetable);
    
    $totalreceived=0.00;
    $rv1 = "select * from receipt_voucher where status='ON' order by id asc";
    $rv2 = $conn->query($rv1);
    if ($rv2->num_rows > 0) { while($rv3 = $rv2->fetch_assoc()) { $totalreceived=($totalreceived+$rv3["cr_amt"]); } }
    $totalreceived= number_format($totalreceived,2,".",",");
    
    $todayreceived=0.00;
    $rv4 = "select * from receipt_voucher where status='ON' and receipt_date>='$timestamp' order by id asc";
    $rv5 = $conn->query($rv4);
    if ($rv5->num_rows > 0) { while($rv6 = $rv5->fetch_assoc()) { $todayreceived=($todayreceived+$rv6["cr_amt"]); } }
    $todayreceived= number_format($todayreceived,2,".",",");

    $totalpaid=0.00;
    $pv1 = "select * from payment_voucher where status='ON' order by id asc";
    $pv2 = $conn->query($pv1);
    if ($pv2->num_rows > 0) { while($pv3 = $pv2->fetch_assoc()) { $totalpaid=($totalpaid+$pv3["dr_amt"]); } }
    $totalpaid= number_format($totalpaid,2,".",",");

    $todaypaid=0.00;
    $pv4 = "select * from payment_voucher where status='ON' and payment_date>='$timestamp' order by id asc";
    $pv5 = $conn->query($pv4);
    if ($pv5->num_rows > 0) { while($pv6 = $pv5->fetch_assoc()) { $todaypaid=($todaypaid+$pv6["dr_amt"]); } }
    $todaypaid= number_format($todaypaid,2,".",",");

    $managed=0;
    if(isset($_COOKIE["managed"])) $managed=$_COOKIE["managed"];
    
    if($managed!=0) echo"<a href='aged_managed.php?url=aged_care_dashboard.php&id=786&pstat=1&managed=0' target='dataprocessor'><i class='fa fa-angle-left '></i> Back to Portal Selector</a>";
    
    if($managed==0){ ?>
        <style>
            * {
              box-sizing: border-box;
            }
        
            .help-link {
              position: absolute;
              top: 20px;
              right: 30px;
              color: #3f8efc;
              font-size: 14px;
              text-decoration: none;
            }
        
            h1 {
              font-size: 28px;
              text-align: center;
              font-weight: 600;
              margin-bottom: 40px;
            }
        
            .portal-container {
              display: flex;
              gap: 30px;
              flex-wrap: wrap;
              justify-content: center;
            }
        
            .portal-box {
              background-color: #161b22;
              padding: 30px;
              border-radius: 16px;
              width: 300px;
              text-align: center;
              border: 1px solid #30363d;
            }
        
            .portal-box img {
              width: 50px;
              margin-bottom: 20px;
            }
        
            .portal-box h2 {
              font-size: 18px;
              margin-bottom: 15px;
              font-weight: 600;
            }
        
            .portal-box p {
              font-size: 14px;
              color: #c9d1d9;
              margin-bottom: 20px;
            }
        
            .portal-box button {
              padding: 10px 15px;
              font-size: 14px;
              font-weight: 600;
              border: none;
              border-radius: 8px;
              cursor: pointer;
            }
        
            .green-btn {
              background-color: #5CDCAA;
              color: white;
            }
        
            .blue-btn {
              background-color: #5C8BEB;
              color: white;
            }
            
            .purple-btn {
              background-color: #5C2BCF;
              color: white;
            }
        
            .footer-text {
              margin-top: 40px;
              font-size: 13px;
              color: #8b949e;
              text-align: center;
            }
        </style>
        <center><br><br>
            <?php
                if(strlen("$favicon")>=3){
                    if (!file_exists($favicon) || empty($favicon)) {
                        echo"<img class='profile' alt='profile' src='assets/noimage.png' style='height:90px'/>";
                    } else echo"<img class='profile' alt='profile' src='$favicon' style='height:90px'/>";
                } else echo"<img class='profile' alt='profile' src='assets/noimage.png' style='height:90px'/>";
            ?>
            <br><br>
            <h1>Choose how you want to manage<br>your work experience.</h1>
        </center>
        <div class="portal-container">
            <!---
            <div class="portal-box">
              <i class="fa fa-user" aria-hidden="true" style='font-size:40pt'></i>
              <h2>Self-Manage Portal</h2>
              <p>Take full control, Access your tools to upload invoices, and manage budgets, and schedule care.</p>
              <a href='aged_managed.php?url=aged_care_dashboard.php&id=786&pstat=1&managed=1' target='dataprocessor'><button class="green-btn">Self-Managed</button></a>
            </div>
            <div class="portal-box">
              <i class="fa fa-wheelchair" aria-hidden="true" style='font-size:40pt'></i>
              <h2>Care-Managed Portal</h2>
              <p>Let us manage your support team, schedules, and compliance. You focus on living well.</p>
              <a href='aged_managed.php?url=aged_care_dashboard.php&id=786&pstat=1&managed=2' target='dataprocessor'><button class="blue-btn">Care-Managed</button></a>
            </div>
            --->
            <div class="portal-box">
              <i class="fa fa-wheelchair" aria-hidden="true" style='font-size:40pt'></i>
              <h2>Age Care Portal</h2>
              <p>Let us manage your support team, schedules, and compliance. You focus on living well.</p>
              <a href='aged_managed.php?url=aged_care_dashboard.php&id=786&pstat=1&managed=2' target='dataprocessor'><button class="blue-btn">Age Care</button></a>
            </div>
            <div class="portal-box">
              <i class="fa fa-users" aria-hidden="true" style='font-size:40pt'></i>
              <h2>NDIS-Managed Portal</h2>
              <p>Let us manage your support team, schedules, and compliance. You focus on living well.</p>
              <a href='aged_managed.php?url=aged_care_dashboard.php&id=786&pstat=1&managed=3' target='dataprocessor'><button class="purple-btn">NDIS</button></a>
            </div>
        </div>

        <div class="footer-text">All portals are secure, encrypted, and compliant with aged care & ndis regulations.</div>

    <?php }else if($managed==2){
        
        include 'care_dashboard.php';
        
    }else if($managed==3){
        
        include 'ndis_dashboard.php';
        
    }else{ ?>
        <style>
            * {
              box-sizing: border-box;
            }
        
            .help-link {
              position: absolute;
              top: 20px;
              right: 30px;
              color: #3f8efc;
              font-size: 14px;
              text-decoration: none;
            }
        
            h1 {
              font-size: 28px;
              text-align: center;
              font-weight: 600;
              margin-bottom: 40px;
            }
        
            .portal-container {
              display: flex;
              gap: 30px;
              flex-wrap: wrap;
              justify-content: center;
            }
        
            .portal-box {
              background-color: #161b22;
              padding: 30px;
              border-radius: 16px;
              width: 300px;
              text-align: center;
              border: 1px solid #30363d;
            }
        
            .portal-box img {
              width: 50px;
              margin-bottom: 20px;
            }
        
            .portal-box h2 {
              font-size: 18px;
              margin-bottom: 15px;
              font-weight: 600;
            }
        
            .portal-box p {
              font-size: 14px;
              color: #c9d1d9;
              margin-bottom: 20px;
            }
        
            .portal-box button {
              padding: 10px 15px;
              font-size: 14px;
              font-weight: 600;
              border: none;
              border-radius: 8px;
              cursor: pointer;
            }
        
            .green-btn {
              background-color: #5CDCAA;
              color: white;
            }
        
            .blue-btn {
              background-color: #5C8BEB;
              color: white;
            }
            
            .purple-btn {
              background-color: #5C2BCF;
              color: white;
            }
        
            .footer-text {
              margin-top: 40px;
              font-size: 13px;
              color: #8b949e;
              text-align: center;
            }
        </style>
        
        <center><br><br><br>
            <h1>Self Managed Portal<br>Coming Soon...</h1>
        <br><br></center>
        
        <div class="portal-container">
            <div class="portal-box">
                <a href='aged_managed.php?url=aged_care_dashboard.php&id=786&pstat=1&managed=0' target='dataprocessor'><button class="green-btn">Back</button></a>
            </div>
            <div class="portal-box">
                <a href='aged_managed.php?url=aged_care_dashboard.php&id=786&pstat=1&managed=2' target='dataprocessor'><button class="blue-btn">Care-Managed</button></a>
            </div>
        </div>

        <div class="footer-text">All portals are secure, encrypted, and compliant with aged care regulations.</div>

    <?php }
?>
    <script src='js/plugins/carousels.js'></script>

    <style>
    #clockContainer {
        position: relative;
        margin: auto;
        height: 200px;
        width: 200px;
        background-image: url("assets/clock.png");
        background-size: 100%;
    }
    
    #hour,
    #minute,
    #second {
        position: absolute;
        background: #EF5550;
        border-radius: 10px;
        transform-origin: bottom;
    }
    
    #hour {
        width: 1.8%;
        height: 25%;
        top: 25%;
        left: 48.85%;
        opacity: 0.8;
        background: #000000;
    }
    
    #minute {
        width: 1.6%;
        height: 30%;
        top: 19%;
        left: 48.9%;
        opacity: 0.8;
        background: #000000;
    }
    
    #second {
        width: 1%;
        height: 40%;
        top: 9%;
        left: 49.25%;
        opacity: 0.8;
        color: red;
    }
</style>
<script>
    setInterval(() => {
    d = new Date(); //object of date()
    hr = d.getHours();
    min = d.getMinutes();
    sec = d.getSeconds();
    hr_rotation = 30 * hr + min / 2; //converting current time
    min_rotation = 6 * min;
    sec_rotation = 6 * sec;
    
    hour.style.transform = `rotate(${hr_rotation}deg)`;
    minute.style.transform = `rotate(${min_rotation}deg)`;
    second.style.transform = `rotate(${sec_rotation}deg)`;
    }, 1000);
</script>