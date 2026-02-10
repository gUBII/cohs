<?php
    error_reporting(0);
    include('authenticator.php');
	include('head.php');
	
	if(isset($_COOKIE["userid"])) $userid=$_COOKIE["userid"];
	if(isset($_COOKIE["track"])) $track=$_COOKIE["track"];
	
    if(isset($userid)){
        
        $s7 = "select * from theme where id='1' order by id asc limit 1";
        $r7 = $conn->query($s7);
        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
            $topbar_color=$rs7["topbar_color"];
            $tbtc=$rs7["topbar_text_color"];
        } }
        
        echo"<ul class='sortable-list connectList agile-list' id='inprogress'>";
            $t=0;
    	    $s = "select * from family_data where employeeid='$userid' order by id asc";
            $r = $conn->query($s);
            if ($r->num_rows > 0) { while($rs = $r->fetch_assoc()) {
                
                $dob=date("M d, Y",$rs["period_from"]);
                $t=$rs["id"];
                
                echo"<li class='warning-element' style='padding-top:0px;padding-bottom:5px;padding-right:0px;line-height:1.0'>
                    <table width='100%'><tr>
                        <td><strong>".$rs["name"]."</strong> (".$rs["relationship"].").</td>
                        <td align=right nowrap>
                            <a href='deleterecords.php?delid=".$rs["id"]."&tbl=family_data' class='btn' target='dataprocessor' style='margin-top:0px;color:red'><i class='fa fa-times'></i></a>
                        </td>
                    </tr></table>
                    <span style='font-size:8pt'><b>Address</b>: ".$rs["address"]."<br><b>Phone</b>: ".$rs["phone"].", <b>Email</b>: ".$rs["email"]."</span>
                    
                    <div class='modal inmodal' id='$t1' tabindex='-1' role='dialog' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content animated flipInY'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                                    <h4 class='modal-title'>Family Information</h4>
                                </div>
                                <form class='m-t' name='$t' role='form' method='post' action='dataprocessor.php' target='dataprocessor' enctype='multipart/form-data'>
                                    <input type='hidden' name='processor' value='myfamilyupdate'>
                                    <div class='modal-body'>
                                        <div class='row'>
                                            <div class='col-md-6'><div class='form-group'>
                                                <label>Name *</label><input name='name' type='text' value='".$rs["name"]."' class='form-control'>
                                            </div></div>
                                            <div class='col-md-6'><div class='form-group'>
                                                <label>Relationship *</label><input name='relationship' type='text' value='".$rs["relationship"]."' class='form-control'>
                                            </div></div>
                                            <div class='col-md-6'><div class='form-group'>
                                                <label>Date of Birth *</label><input name='dob' type='date' value='".$rs["dob"]."' class='form-control'>
                                            </div></div>
                                            <div class='col-md-6'><div class='form-group'>
                                                <label>Phone</label><input name='phone' type='text' value='".$rs["phone"]."' class='form-control'>
                                            </div></div>
                                            <div class='col-md-6'><div class='form-group'>
                                                <label>Email *</label><input name='email' type='email' value='".$rs["email"]."' class='form-control'>
                                            </div></div>
                                            <div class='col-md-6'><div class='form-group'>
                                                <label>Address</label><input name='address' type='text' value='".$rs["address"]."' class='form-control'>
                                            </div></div>
                                        </div>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-white' data-dismiss='modal'>Close</button>
                                        <input type='reset' class='btn btn-default' value='Reset'>
                                        <input type='submit' class='btn btn-primary recordadded' value='Update'>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>";
                
            } }
            
        echo"</ul>";
    }
?>