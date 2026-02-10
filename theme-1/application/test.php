<form method='get' action='excel/export_excel.php' target='dataprocessor' enctype='multipart/form-data'> 
                        <table style='width:100%;background-color:#CFE6E4;padding:5px'>
                            <tr>
                                <td style='padding:5px'>
                                    <select name='vendorid' required class='form-control'>
                                        <option value='ALL'>All Vendor</option>";
                                        $s7 = "select * from sms_user2 where mtype='VENDOR' order by name asc";
                                        $r7 = $conn->query($s7);
                                        if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                            echo"<option value='".$rs7["id"]."'>".$rs7["name"]." ".$rs7["name2"]."</option>";
                                        } }
                                    echo"</select>
                                </td><td style='padding:5px'>
                                    <select name='categoryid' required='' class='form-control'>
                                        <option value='ALL'> All Categories</option>";
                                        $s8 = "select * from sms_link where des1='TOP CATEGORY' order by sorder asc";
                                        $r8 = $conn->query($s8);
                                        if ($r8->num_rows > 0) { while($rs8 = $r8->fetch_assoc()) {
                                            echo"<option value='".$rs8["id"]."' style='color:blue'>".$rs8["pam"]."</option>";
                                            $s8a = "select * from sms_link where des1='".$rs8["id"]."' order by sorder asc";
                                            $r8a = $conn->query($s8a);
                                            if ($r8a->num_rows > 0) { while($rs8a = $r8a->fetch_assoc()) {
                                                echo"<option value='".$rs8a["id"]."' style='color:green'>".$rs8a["pam"]."</option>";
                                                $s8b = "select * from sms_link where des1='".$rs8a["id"]."' order by sorder asc";
                                                $r8b = $conn->query($s8b);
                                                if ($r8b->num_rows > 0) { while($rs8b = $r8b->fetch_assoc()) {
                                                    echo"<option value='".$rs8b["id"]."' style='color:grey'>".$rs8b["pam"]."</option>";
                                                } }
                                            } }
                                        } }
                                    echo"</select>
                                </td><td style='padding:5px'>
                                    <input type=date name='date_from' class='form-control'>
                                </td><td style='padding:5px'>
                                    <input type=date name='date_to' class='form-control'>
                                </td><td style='padding:5px'>
                                    <input type=submit value='EXCEL' class='btn btn-danger'>
                                    <input type=hidden name=smsbd value=reporting-forms>
                                    <input type=hidden name=kroyee value=eod-csv-reports>
                                    <input type=hidden name=sheba value=1708323155>
                                    <input type=button value='PDF' style='color:white' class='btn btn-success'>
                                </td>
                            </tr>
                        </table>
                    </form>