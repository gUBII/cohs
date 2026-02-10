<?php
    echo"<form method='post' name='stage3' action='workspace_processor.php' target='dataprocessor' enctype='multipart/form-data'class='tooltip-end-bottom'>
        <input type='hidden' name='processor' value='new_workspace_PROJECT_agreement'>
        <input type='hidden' name='pid' value='$projectidz'><input type='hidden' name='cid' value='$cid'>
        <div class='row'>
            <div class='col-12 col-md-12'><h4>Important Information Schedule</h4></div>
            <div class='col-12 col-md-12'><b>Organisation Details</b></div>
            <div class='col-12 col-md-2'><label class='mb-3 top-label'>Name:<input type='text' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-2'><label class='mb-3 top-label'>ABN:<input type='text' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-2'><label class='mb-3 top-label'>Address:<input type='text' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-2'><label class='mb-3 top-label'>Phone:<input type='text' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-2'><label class='mb-3 top-label'>Email:<input type='text' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-12'><br><b>Consumer</b></div>
            <div class='col-12 col-md-2'><label class='mb-3 top-label'>Name:<input type='text' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-2'><label class='mb-3 top-label'>Address:<input type='text' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-2'><label class='mb-3 top-label'>Phone:<input type='text' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-2'><label class='mb-3 top-label'>Email:<input type='text' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-12'><br><b>Consumer’s Representative</b></div>
            <div class='col-12 col-md-2'><label class='mb-3 top-label'>Name:<input type='text' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-2'><label class='mb-3 top-label'>ABN:<input type='text' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-2'><label class='mb-3 top-label'>Address:<input type='text' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-2'><label class='mb-3 top-label'>Phone:<input type='text' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-2'><label class='mb-3 top-label'>Email:<input type='text' name='' value='' class='form-control'></div>
            
            <div class='col-12 col-md-2'><Br><label class='mb-3 top-label'></div>
            <div class='col-12 col-md-2'><Br><label class='mb-3 top-label'><b>Agreement Start Date</b><input type='date' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-2'><br><label class='mb-3 top-label'><b>Agreement End Date</b><input type='date' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-2'><Br><label class='mb-3 top-label'>Home Care Package Transfer:<select name='' class='form-control'><option value='YES'>YES</option><option value='NO'>NO</option></select></div>
            <div class='col-12 col-md-2'><Br><label class='mb-3 top-label'>Transferring From:<input type='date' name='' value='' class='form-control'></div>
            <div class='col-12 col-md-2'><Br><label class='mb-3 top-label'>Last day of services from previous Service Provider (Date):<input type='date' name='' value='' class='form-control'></div>
            
            <div class='col-12 col-md-12'><br></div>
            <div class='col-12 col-md-12'>
                <table>
                    <tr><td valign='top'><b>Home Care Package</b></td><td align=center><b>Eligibility Level</b></td><td align=center><b>Availability Level</b></td></tr>
                    <tr>
                        <td valign='top' >Level 1</td>
                        <td align=center><label class='mb-3 top-label'><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                        <td align=center><label class='mb-3 top-label'><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                    </tr>
                    <tr>
                        <td valign='top' >Level 2</td>
                        <td align=center><label class='mb-3 top-label'><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                        <td align=center><label class='mb-3 top-label'><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                    </tr>
                    <tr>
                        <td valign='top' >Level 3</td>
                        <td align=center><label class='mb-3 top-label'><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                        <td align=center><label class='mb-3 top-label'><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                    </tr>
                    <tr>
                        <td valign='top' >Level 4</td>
                        <td align=center><label class='mb-3 top-label'><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                        <td align=center><label class='mb-3 top-label'><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                    </tr>
                    <tr>
                        <td valign='top' ><br><b>Delivery of Care</b></td>
                        <td align=center><label class='mb-3 top-label'><br>Consumer Directed Care:<br><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                        <td align=center></td>
                    </tr>
                    <tr>
                        <td valign='top' ><br><b>Care Plan</b></td>
                        <td align=center><label class='mb-3 top-label'><br>Attached:<br><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                        <td align=center><label class='mb-3 top-label'><br>In Home:<br><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                    </tr>
                    <tr>
                        <td valign='top' ><br><b>Fees</b></td>
                        <td align=center colspan=2><br>Fees are set out at Annexure 2. Further detail can be found in COHS’s Fee Schedule.  </td>
                    </tr>
                    <tr>
                        <td valign='top' ><br><b>Guarantor Details (if applicable)</b></td>
                        <td align=center colspan=2><br><label class='mb-3 top-label'><textarea name='' class='form-control'></textarea></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>";
?>                                                    