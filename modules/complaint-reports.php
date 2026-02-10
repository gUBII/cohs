<?php
$sheba="eod";
$cid=7;
$title="Add New Client/Participant";
$utype="COMPLAINT";
$designation=6;

echo"<div class='row'>
    <div class='col-12 col-md-5' style='padding-bottom:10px'>
        
        <h1 class='mb-0 pb-0 display-4' id='title'>COMPLAINT Reports</h1>
    
        <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
            <ul class='breadcrumb pt-0'>
                <li class='breadcrumb-item'><a href='index.php'>Home</a></li>";
                if(isset($_GET["url"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."'>Contacts</a></li>";
                if(isset($_GET["id"])) echo"<li class='breadcrumb-item'><a href='index.php?url=".$_GET["url"]."&id=".$_GET["id"]."'>$utype</a></li>";
            echo"</ul>
        </nav>
    </div>
    <div class='col-12 col-md-7 d-flex align-items-start justify-content-end'>
    
        <div class='d-inline-block float-md-start me-1 mb-1 search-input-container border border-separator bg-foreground search-sm'>
            <input class='form-control form-control-sm datatable-search' onkeyup='myFunction()' placeholder='Search' data-datatable='#datatableStripe' id='myInput' style='width:100%'/>
            <span class='search-magnifier-icon'><i data-acorn-icon='search'></i></span><span class='search-delete-icon d-none'><i data-acorn-icon='close'></i></span>                
        </div>
        
        <div class='btn-group ms-1 check-all-container'>
            <div class='d-inline-block'>
                
                <table><tr>
                    <td nowrap>";
                        if($mtype!="CLIENT"){
                            echo"<a href='index.php?url=complaints.php'>
                                <button class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' type='button'>
                                    <i data-acorn-icon='plus'></i>&nbsp;&nbsp;<span>View Complaint Reports</span>
                                </button>
                            </a>";
                        }
                    echo"</td>
                    <td>
                        <a href='index.php?url=complaint-reports.php&type=ALL' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' >ALL</a>
                    </td><td>
                        <a href='index.php?url=complaint-reports.php&type=Assesment' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' >Assesment</a>
                    </td><td>
                        <a href='index.php?url=complaint-reports.php&type=Ongoing' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' >Ongoing</a>
                    </td><td>
                        <a href='index.php?url=complaint-reports.php&type=Resolved' class='btn btn-outline-primary btn-icon btn-icon-start w-md-auto btn-sm' >Resolved</a>
                    </td><td>       
                </tr></table>
            </div>
        </div>
    </div>                  
</div>    
<div class='data-table-rows slim' id='sample'>";

?>
<?php if(isset($_GET["postid"])){ ?>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <style>
        body {
            font-family: 'Roboto', serif;
            font-size: 10px;
        }
    </style> <?php
    
    $ra1 = "select * from complaintnote where id='".$_GET["postid"]."' and status='1' order by id desc";
    $rb1 = $conn->query($ra1);
    if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
    
        $post_date=date("d/m/Y", $rab1["pdate"]);
        $post_date1=date("d/m/Y", $rab1["date1"]);
        $post_date2=date("d/m/Y", $rab1["date2"]);
        
        $clientname="";
        $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id desc limit 1";
        $rb2 = $conn->query($ra2);
        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
            $clientname1= $rab2["username"];
            $clientname2= $rab2["username2"];
            $clientphone= $rab2["phone"];
            $clientemail= $rab2["email"];
        } }
        
        $employeeid="";
        $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id desc limit 1";
        $rb2 = $conn->query($ra2);
        if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) {
            $employeename1= $rab2["username"];
            $employeename2= $rab2["username2"];
            $employeephone= $rab2["phone"];
            $employeeemail= $rab2["email"];
            $ra22 = "select * from designation where id='".$rab2["designation"]."' order by id desc limit 1";
            $rb22 = $conn->query($ra22);
            if ($rb22->num_rows > 0) { while($rab22 = $rb22->fetch_assoc()) { $designation1=$rab22["designation"]; } }
            
            $ra33 = "select * from departments where id='".$rab2["department"]."' order by id desc limit 1";
            $rb33 = $conn->query($ra33);
            if ($rb33->num_rows > 0) { while($rab33 = $rb33->fetch_assoc()) { $department1=$rab33["department_name"]; } }
            
        } }
        
        
        echo"<div class='p-xl' id='element-to-print'> 
            <div class='row'>
                <div class='col-lg-10'><h4>Complaint Detail</h4><br></div>
                <div class='col-lg-2' style='text-align:right'><img src='img/logo.png' style='width:100px'></div>
                <div class='col-lg-12'>
                    <span style='font-size:14pt'><b>Detail Information</b></span><hr>
                    <span style='font-size:12pt'>
                        <table>
                            <tr><td>Client Name<b></td><td>:</td><td>$clientname1 $clientname2</td></tr>
                            <tr><td>Assesment Date<b></td><td>:</td><td><b>$post_date1</b></td></tr>
                            <tr><td>Expected Resolved Date<b></td><td>:</td><td><b>$post_date2</b></td></tr>
                            <tr><td>Complaint Manager<b></td><td>:</td><td><b>$employeename1 $employeename2</b></td></tr>
                            <tr><td>Complaint Status<b></td><td>:</td><td><b>".$rab1["type"]."</b></td></tr>
                            <tr><td colspan=10><hr></td></tr>
                            <tr><td>Detailed Note<b></td><td>:</td><td></td></tr>
                            <tr><td colspan=10>".$rab1["note"]."</td></tr>
                            <tr><td colspan=10><hr></td></tr>
                            <tr><td colspan=10>";
                                $t=0;
                                $ra3 = "select * from multi_image where postid='".$rab1["id"]."' and sessionid='".$rab1["sessionid"]."' and status='1' order by id desc";
                                $rb3 = $conn->query($ra3);
                                if ($rb3->num_rows > 0) { while($rab3 = $rb3->fetch_assoc()) { 
                                    $t=($t+1);
                                    echo"[ <a href='".$rab3["location"]."' target='_blank'>View Document $t</a> ] - ";
                                } }
                            echo"</td></tr>
                            <tr><td colspan=10><hr></td></tr>
                            <tr><td>Complaint Submitted By</td><td>:</td><td></td></tr>
                            <tr><td>Name</td><td>:</td><td><b>$employeename1 $employeename2</b></td></tr>
                            <tr><td>Position</td><td>:</td><td><b>$designation1 & $department1, Good Will Care Pty Ltd</b></td></tr>
                            <tr><td>Post Date</td><td>:</td><td><b>$post_date</b></td></tr>
                        </table>
                    </span>
                </div>
                
            </div>
        </div>";
        
    } } ?>
    
    
    <script>
        function printDiv(divID) {
             var divElem = document.getElementById(divID).innerHTML;
             var printWindow = window.open('', '', 'height=210,width=350'); 
             printWindow.document.write('<html><head><title></title></head>');
             printWindow.document.write('<body>');
             printWindow.document.write(divElem);
             printWindow.document.write('</body>');
             printWindow.document.write ('</html>');
             printWindow.document.close();
             printWindow.print();
        }
    </script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
    
    <script>
        var element = document.getElementById('element-to-print');
        html2pdf(element, {
            margin: 10,
            filename: 'casefile.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2, logging: true, dpi: 192, letterRendering: true },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });
    </script>
    
    <?php
}

if(!isset($_GET["type"])) $type="ALL";
else $type=$_GET["type"];

echo"<div class='table-responsive'>
    <h4>Showing $type</h4><hr>
    <table class='table table-striped table-bordered table-hover dataTables-example' >
        <thead><tr><th nowrap>Complaint ID</th><th nowrap>Assesment Date</th><th nowrap>Expected Resolved Date</th><th>Complaints Manager</th><th>Client Name</th><th>Status</th></tr></thead>
        <tbody>";
            if($designationy==17){ 
                if($type=="ALL") $ra1 = "select * from complaintnote where clientid='$userid' and status='1' order by id desc";
                else $ra1 = "select * from complaintnote where status='1' and clientid='$userid' and type='$type' order by id desc";
            }else if($designationy==13){ 
                if($type=="ALL") $ra1 = "select * from complaintnote where status='1' order by id desc";
                else $ra1 = "select * from complaintnote where status='1' and type='$type' order by id desc";
            }else{ 
                if($type=="ALL") $ra1 = "select * from complaintnote where employeeid='$userid' and status='1' order by id desc";
                else $ra1 = "select * from complaintnote where status='1' and employeeid='$userid' and type='$type' order by id desc";
            }
            
            $rb1 = $conn->query($ra1);
            if ($rb1->num_rows > 0) { while($rab1 = $rb1->fetch_assoc()) {
                
                $post_date=date("d-m-y H:m", $rab1["pdate"]);
                $post_date1=date("d-m-y H:m", $rab1["date1"]);
                $post_date2=date("d-m-y H:m", $rab1["date2"]);
                
                $clientname="";
                $ra2 = "select * from uerp_user where id='".$rab1["clientid"]."' order by id desc limit 1";
                $rb2 = $conn->query($ra2);
                if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $clientname= "".$rab2["username"]." ".$rab2["username2"].""; } }
                
                $employeename="";
                $ra2 = "select * from uerp_user where id='".$rab1["employeeid"]."' order by id desc limit 1";
                $rb2 = $conn->query($ra2);
                if ($rb2->num_rows > 0) { while($rab2 = $rb2->fetch_assoc()) { $employeename= "".$rab2["username"]." ".$rab2["username2"].""; } }
                
                echo"<tr class='gradeX'>
                    <td nowrap><a href='index.php?url=complaint-reports.php&postid=".$rab1["id"]."'><i class='fa fa-eye'></i>&nbsp;".$rab1["pdate"]."".$rab1["id"]."</a></td>
                    <td>$post_date1</td><td>$post_date2</td><td>$employeename</td><td>$clientname</td><td>
                        <form name='complaintform' action='report_processor.php' target='dataprocessor' method='post'>
                            <input type='hidden' name='url' value='complaint-reports.php'><input type='hidden' name='cid' value='".$rab1["id"]."'>
                            <select class='form-control m-b required' name='complainttype' onchange='this.form.submit()'>
                            <option value='".$rab1["type"]."'>".$rab1["type"]."</option>
                            <option value='Assesment'>Assesment</option>
                            <option value='Ongoing'>Ongoing</option>
                            <option value='Resolved'>Resolved</option>
                        </select></form>
                    </td>
                </tr>";
                
            } }    
        echo"</tbody>
        <tfoot><tr><th nowrap>Case ID</th><th nowrap>Date</th><th nowrap>Week Date</th><th>Reporter Name</th><th>Client Name</th><th>Status</th></tr></tfoot>
    </table>
</div>"; ?>