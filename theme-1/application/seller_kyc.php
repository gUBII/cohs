<?php
    include("auth.php");
    echo"<section class='content-main'>
        <div class='row'>
            <div class='col-md-10 content-header'><h2 class='content-title'>Seller KYC Validate & Approval</h2></div>
            <div class='col-md-2'><button class='btn btn-primary' onclick=\"shiftdataV2('seller_list.php?blist=1', 'datashiftX')\">Add New</button></div>
        </div>
        <div class='card'>
            <div class='card-body'>";
                if(isset($_GET["sid"])){
                    echo"<div class='row gx-5'>";
                        if($uactype=="ADMIN"){
                            echo"<div class='row'>";
                                $s1k = "select * from sms_user2 where actype='VENDOR' and status='ON' and kyc='0' order by sname asc";
                                $r1k = $conn->query($s1k);
                                if ($r1k->num_rows > 0) { while($rs1k = $r1k->fetch_assoc()) {
                                    echo"<div class='col-md-4'><label class='form-label'>Trade License (PDF Format for multiple page)</label>
                                        <form method='post' name='kyc1' action='user_update.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                                            <a href='".$rs1k["kyc1"]."' target='_blank'>View Document</a><hr>
                                            <input type='file' name='images[]' class='form__field__img form-control' accept='.pdf, .jpg, .png, .jpeg' onchange='this.form.submit()'>
                                            <input type=hidden name=processor value='kycupdate1'><input type=hidden name=id value='".$_GET["sid"]."'>
                                        </form>
                                    </div>
                                    <div class='col-md-4'><label class='form-label'>Trade License (PDF Format for multiple page)</label>
                                        <form method='post' name='kyc2' action='user_update.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                                            <a href='".$rs1k["kyc2"]."' target='_blank'>View Document</a><hr>
                                            <input type='file' name='images[]' class='form__field__img form-control' accept='.pdf, .jpg, .png, .jpeg' onchange='this.form.submit()'>
                                            <input type=hidden name=processor value='kycupdate2'><input type=hidden name=id value='".$_GET["sid"]."'>
                                        </form>
                                    </div>
                                    <div class='col-md-4'><label class='form-label'>Trade License (PDF Format for multiple page)</label>
                                        <form method='post' name='kyc3' action='user_update.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >
                                            <a href='".$rs1k["kyc3"]."' target='_blank'>View Document</a><hr>
                                            <input type='file' name='images[]' class='form__field__img form-control' accept='.pdf, .jpg, .png, .jpeg' onchange='this.form.submit()'>
                                            <input type=hidden name=processor value='kycupdate3'><input type=hidden name=id value='".$_GET["sid"]."'>
                                        </form>
                                    </div>
                                    <div class='col-md-12'><hr></div>";
                                }}
                            echo"</div>";
                        }
                    echo"</div>";
                }
                echo"<div class='table-responsive' style='min-height:500px'>
                    <table class='table table-hover'>
                        <thead><tr><th>Shop Name</th><th>Detail</th><th>Address</th><th>Trade License</th><th>NID</th><th>TIN</th><th class='text-end'>Action</th></tr></thead>
                        <tbody>";
                            if(isset($_GET["sid"])) echo"<div style='padding:5px' onmouseover=\"shiftdataV2('seller_kyc.php?sid=".$_GET["sid"]."&sheba=seller_kyc', 'datashiftX')\">";
                            else echo"<div style='padding:5px' onmouseover=\"shiftdataV1('seller_kyc', 'datashiftX')\">";
                                $s1 = "select * from sms_user2 where actype='VENDOR' and status='ON' and kyc='0' order by sname asc";
                                $r1 = $conn->query($s1);
                                if ($r1->num_rows > 0) { while($rs1 = $r1->fetch_assoc()) {
                                    echo"<tr>
                                        <td><b>".$rs1["sname"]."</b></td>
                                        <td nowrap><b>".$rs1["name"]." ".$rs1["name2"]."</b><br>Eml: ".$rs1["email"]."<br>Ph: ".$rs1["phone"]."</td>
                                        <td>".$rs1["address"].", ".$rs1["city"].", ".$rs1["state"]."-".$rs1["zip"].", ".$rs1["country"].",</td>
                                        <td><a href='".$rs1["kyc1"]."' target='_blank'>View Trade License</a></td>
                                        <td><a href='".$rs1["kyc2"]."' target='_blank'>View NID Copy</a></td>
                                        <td><a href='".$rs1["kyc3"]."' target='_blank'>View TIN Certificate</a></td>
                                        <td class='text-end'>
                                            <div class='dropdown'>
                                                <a href='#' data-bs-toggle='dropdown' class='btn btn-light rounded btn-sm font-sm'> <i class='material-icons md-more_horiz'></i> </a>
                                                <div class='dropdown-menu'>
                                                    <a class='dropdown-item' style='cursor: pointer' href='#top' onclick=\"shiftdataV2('seller_kyc.php?sid=".$rs1["id"]."&sheba=seller_kyc', 'datashiftX')\">Edit KYC</a>
                                                    <a class='dropdown-item' style='cursor: pointer' href='user_update.php?processor=kyc&bid=".$rs1["id"]."&kyc=1' target='dataprocessor' onblur=\"shiftdataV1('seller_kyc', 'datashiftX')\">Approve KYC</a>
                                                    <a class='dropdown-item' href='dataprocessor.php?processor=deletetask&delid=".$rs1["id"]."&tbl=sms_user2' target='dataprocessor' onblur=\"shiftdataV1('seller_kyc', 'datashiftX')\">Delete Account</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>";
                                } }
                            echo"</div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>";
?>