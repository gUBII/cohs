<?php
    echo"<div class='container'><br><br>
        <div class='row'>
            <div class='col-7 col-md-8' style='text-align:left'><b><span style='font-size:15pt;'>Environmental Assessment Saved Data</span></b></div>
            <div class='col-5 col-md-4' style='text-align:right'><a href='index.php?url=cohs_environmental-assessment-date.php' class='btn btn-primary' style='margin-top:10px;'>Add New Record</a></div>
            <div class='col-12 style='text-align:left'><hr></div>";
            
            if (isset($_GET["id"])) {
                $s7yx = "select * from environmental_assessment_checklist_data where id='".$_GET["id"]."' order by id asc limit 1";
                $r7yx = $conn->query($s7yx);
                if ($r7yx->num_rows > 0) { while($datax = $r7yx->fetch_assoc()) {
            
        
            echo "
                <div class='col-12><h3>Checklist Data:</h3><hr></div>
                <div class='col-12 col-md-4'>Name:<br><select class='form-control' style='width:100%' name='name' required=''>
                    <option value=''>Select Client</option>";
                    $s7y = "select * from uerp_user where id='".$datax["name"]."' and mtype='CLIENT' order by username asc limit 1";
                    $r7y = $conn->query($s7y);
                    if ($r7y->num_rows > 0) { while($rs7y = $r7y->fetch_assoc()) {
                        echo"<option value='".$rs7y["id"]."'>".$rs7y["username"]." ".$rs7y["username2"]." </option>";
                    } }
                echo"</select></div>
                <div class='col-12 col-md-4'>Address:<br><input type='text' class='form-control' name='address' value='".$datax["address"]."'></div>
                <div class='col-12 col-md-4'>Date:<br><input type='date' class='form-control' name='date' value='{$datax["date"]}'></div>
                <div class='col-12'><br><br><center>
                    <table border='0' cellspacing='0' cellpadding='0' width='100%' style='border:0px'>
                    <tr style='height:34.15pt'>
                        <td width='193' valign='top' style='border:solid black 1.0pt; background:#7030A0;padding:.15pt 2.8pt 0in 5.25pt;height:34.15pt'>
                            <p class='MsoNormal' align='center' style='margin-top:0in;margin-right:2.65pt; margin-bottom:0in;margin-left:0in;text-align:center;text-indent:0in'><b><span style='color:white'>Area</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border:solid black 1.0pt; border-left:none;background:#7030A0;padding:.15pt 2.8pt 0in 5.25pt; height:34.15pt'>
                            <p class='MsoNormal' align='center' style='margin-top:0in;margin-right:2.75pt; margin-bottom:0in;margin-left:0in;text-align:center;text-indent:0in'><b><span style='color:white'>Details</span></b></p>
                        </td>
                        <td width='41' valign='top' style='border:solid black 1.0pt; border-left:none;background:#7030A0;padding:.15pt 2.8pt 0in 5.25pt; height:34.15pt'>
                            <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-align:justify;text-justify:inter-ideograph;text-indent: 0in'><b><span style='color:white'>Yes</span></b></p>
                        </td>
                        <td width='37' valign='top' style='width:28.05pt;border:solid black 1.0pt; border-left:none;background:#7030A0;padding:.15pt 2.8pt 0in 5.25pt; height:34.15pt'>
                            <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-align:justify;text-justify:inter-ideograph;text-indent: 0in'><b><span style='color:white'>No</span></b></p>
                        </td>
                        <td width='204' valign='top' style='border-top:solid black 1.0pt; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; background:#7030A0;padding:.15pt 2.8pt 0in 5.25pt;height:34.15pt'>
                            <p class='MsoNormal' align='center' style='margin-top:0in;margin-right:.2pt; margin-bottom:0in;margin-left:0in;text-align:center;text-indent:0in'><b><span style='color:white'>Comment and/or Action to be taken - by whom</span></b></p>
                        </td>
                    </tr>
                    
                    <tr style='height:22.6pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>OUTSIDE</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_1' class='form-control'><option value='{$datax["select_1"]}'>{$datax["select_1"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_1' value='{$datax["note_1"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:56.25pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 2.25pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:56.25pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Parking</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:56.25pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:3.25pt; margin-left:0in;text-indent:0in;line-height:113%'><span style='font-size: 11.0pt;line-height:113%'>Driveway, On street, Paid/metered,&nbsp;</span></p>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Parking Lot Nearby</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_2' class='form-control'><option value='{$datax["select_2"]}'>{$datax["select_2"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_2' value='{$datax["note_2"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:37.5pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 2.25pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:37.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:1.0pt; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>House Number</span></b></p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Identifiable</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:37.5pt'>
                          <p class='MsoNormal' style='margin:0in;text-align:justify;text-justify:inter-ideograph; text-indent:0in'><span style='font-size:11.0pt;line-height:107%'>Easily seen, missing, Overgrown, Warn</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_3' class='form-control'><option value='{$datax["select_3"]}'>{$datax["select_3"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_3' value='{$datax["note_3"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:37.25pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 2.25pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:37.25pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Accessible&nbsp; Entry</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:37.25pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;Code/lockbox, Pad lock, Call bell/phone</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_4' class='form-control'><option value='{$datax["select_4"]}'>{$datax["select_4"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_4' value='{$datax["note_4"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:22.0pt'>
                        <td width='193' rowspan='3' valign='top' style='border-top:none; border-left:solid black 1.5pt;border-bottom:solid black 1.0pt;border-right: solid black 1.0pt;padding:.15pt 2.8pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:1.0pt; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Outside Residence</span></b></p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:1.0pt; margin-left:.2pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Pathways, Steps, Verandah,</span></p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Gates</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Level, trip hazards, width</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_5' class='form-control'><option value='{$datax["select_5"]}'>{$datax["select_5"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_5' value='{$datax["note_5"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:22.0pt'>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Clear, unobstructed</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_6' class='form-control'><option value='{$datax["select_6"]}'>{$datax["select_6"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_6' value='{$datax["note_6"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:21.75pt'>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Slippery, muddy</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_7' class='form-control'><option value='{$datax["select_7"]}'>{$datax["select_7"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_7' value='{$datax["note_7"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:37.5pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:37.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Lawns, hedges, scrubs, undergrowth</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:37.5pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Maintained, overgrown</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_8' class='form-control'><option value='{$datax["select_8"]}'>{$datax["select_8"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_8' value='{$datax["note_8"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:22.05pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.05pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Bins</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.05pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Access house to curb/bin night</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_9' class='form-control'><option value='{$datax["select_9"]}'>{$datax["select_9"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_9' value='{$datax["note_9"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:21.75pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Clothesline</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Working, access to</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_10' class='form-control'><option value='{$datax["select_10"]}'>{$datax["select_10"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_10' value='{$datax["note_10"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:37.5pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:37.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Pets - Droppings</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:37.5pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Restrained from worker, who cleans/feeds?</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_11' class='form-control'><option value='{$datax["select_11"]}'>{$datax["select_11"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_11' value='{$datax["note_11"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:22.0pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Taps/hoses</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Accessible, working</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_12' class='form-control'><option value='{$datax["select_12"]}'>{$datax["select_12"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_12' value='{$datax["note_12"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:22.0pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Garage/sheds</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_13' class='form-control'><option value='{$datax["select_13"]}'>{$datax["select_13"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_13' value='{$datax["note_13"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:21.75pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Toilets Outhouse/Laundry</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_14' class='form-control'><option value='{$datax["select_14"]}'>{$datax["select_14"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_14' value='{$datax["note_14"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:22.0pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Lighting</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Adequate at Night</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_15' class='form-control'><option value='{$datax["select_15"]}'>{$datax["select_15"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_15' value='{$datax["note_15"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:22.0pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Gutters/down pipes</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_16' class='form-control'><option value='{$datax["select_16"]}'>{$datax["select_16"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_16' value='{$datax["note_16"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:22.05pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.05pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Meter box</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.05pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Safety Switches, Accessible</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_17' class='form-control'><option value='{$datax["select_17"]}'>{$datax["select_17"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_17' value='{$datax["note_17"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:37.75pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:37.75pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Doors</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:37.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Working properly/condition, types of locks</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_18' class='form-control'><option value='{$datax["select_18"]}'>{$datax["select_18"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_18' value='{$datax["note_18"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:23.0pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:23.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Locality/neighbours/Noise</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:23.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_19' class='form-control'><option value='{$datax["select_19"]}'>{$datax["select_19"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_19' value='{$datax["note_19"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    
                    <tr style='height:23.0pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:23.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Evacuation Plan</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:23.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Nearest cross st, fire blanket?</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_20' class='form-control'><option value='{$datax["select_20"]}'>{$datax["select_20"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_20' value='{$datax["note_20"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    <tr style='height:41.25pt'>
                        <td width='193' valign='top' style='border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:41.25pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:3.75pt; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Security Systems/Camera</span></b></p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.2pt;text-indent:0in'><b><span style='font-size:11.0pt; line-height:107%'>Outside, Inside</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:41.25pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>How is monitored? Activated</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_21' class='form-control'><option value='{$datax["select_21"]}'>{$datax["select_21"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_21' value='{$datax["note_21"]}' style='width:100%' class='form-control'>
                        </td>
                    </tr>
                    </table>
                    
                    <p class='MsoNormal' style='margin-top:0in;margin-right:544.65pt;margin-bottom: 0in;margin-left:-36.55pt;text-indent:0in'>&nbsp;</p>
                    
                    <table class='' border='0' cellspacing='0' cellpadding='0' width='100%'>
                      <tr style='height:40.9pt'>
                        <td width='192' valign='top' style='border-top:1.5pt;border-left: 1.0pt;border-bottom:1.5pt;border-right:1.0pt;border-color:black;border-style: solid;background:#7030A0;padding:1.05pt 3.0pt 0in 5.2pt;height:40.9pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='color:white'>Area</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:solid black 1.5pt; border-left:none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; background:#7030A0;padding:1.05pt 3.0pt 0in 5.2pt;height:40.9pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><b><span style='color:white'>Details</span></b></p>
                        </td>
                        <td width='41' valign='top' style='border-top:solid black 1.5pt; border-left:none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; background:#7030A0;padding:1.05pt 3.0pt 0in 5.2pt;height:40.9pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-align:justify;text-justify:inter-ideograph;text-indent: 0in'><b><span style='color:white'>Yes</span></b></p>
                        </td>
                        <td width='37' valign='top' style='width:28.05pt;border-top:solid black 1.5pt; border-left:none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; background:#7030A0;padding:1.05pt 3.0pt 0in 5.2pt;height:40.9pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-align:justify;text-justify:inter-ideograph;text-indent: 0in'><b><span style='color:white'>No</span></b></p>
                        </td>
                        <td width='204' valign='top' style='border:solid black 1.5pt; border-left:none;background:#7030A0;padding:1.05pt 3.0pt 0in 5.2pt; height:40.9pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><b><span style='color:white'>Comment and/or Action to be taken - by whom</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:24.45pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:24.45pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>INSIDE</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:24.45pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>&nbsp;</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_22' class='form-control'><option value='{$datax["select_22"]}'>{$datax["select_22"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_22' value='{$datax["note_22"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.4pt'>
                        <td width='192' rowspan='7' valign='top' style='border-top:none; border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right: solid black 1.5pt;padding:1.05pt 3.0pt 0in 5.2pt;height:22.4pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:4.0pt; margin-left:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height: 107%'>Entry/Exit</span></b></p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:4.0pt; margin-left:0in;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Locks, Screens</span></p>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.4pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Floors/Rugs</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_23' class='form-control'><option value='{$datax["select_23"]}'>{$datax["select_23"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_23' value='{$datax["note_23"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Windows/Doors/Handles</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_24' class='form-control'><option value='{$datax["select_24"]}'>{$datax["select_24"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_24' value='{$datax["note_24"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:21.8pt'>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:21.8pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Furnishings/storage</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_25' class='form-control'><option value='{$datax["select_25"]}'>{$datax["select_25"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_25' value='{$datax["note_25"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Lighting/Switches/ Electrical</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_26' class='form-control'><option value='{$datax["select_26"]}'>{$datax["select_26"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_26' value='{$datax["note_26"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Cleanliness/mould</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_27' class='form-control'><option value='{$datax["select_27"]}'>{$datax["select_27"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_27' value='{$datax["note_27"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Heating/Cooling/Circulation</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_28' class='form-control'><option value='{$datax["select_28"]}'>{$datax["select_28"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_28' value='{$datax["note_28"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.25pt'>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.25pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Clear/Clutter</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_29' class='form-control'><option value='{$datax["select_29"]}'>{$datax["select_29"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_29' value='{$datax["note_29"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:21.35pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:21.35pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>Hall/stairs/split levels</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:21.35pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Floors/Rugs</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_30' class='form-control'><option value='{$datax["select_30"]}'>{$datax["select_30"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_30' value='{$datax["note_30"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>&nbsp;</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Windows/Doors/Handles</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_31' class='form-control'><option value='{$datax["select_31"]}'>{$datax["select_31"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_31' value='{$datax["note_31"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>&nbsp;</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Furnishings/storage</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_32' class='form-control'><option value='{$datax["select_32"]}'>{$datax["select_32"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_32' value='{$datax["note_32"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:21.75pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>&nbsp;</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Lighting/Switches/ Electrical</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_33' class='form-control'><option value='{$datax["select_33"]}'>{$datax["select_33"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_33' value='{$datax["note_33"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>&nbsp;</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Cleanliness/mould</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_34' class='form-control'><option value='{$datax["select_34"]}'>{$datax["select_34"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_34' value='{$datax["note_34"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>&nbsp;</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Heating/Cooling/Circulation</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_35' class='form-control'><option value='{$datax["select_35"]}'>{$datax["select_35"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_35' value='{$datax["note_35"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.4pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.4pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>&nbsp;</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.4pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Clear/Clutter</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_36' class='form-control'><option value='{$datax["select_36"]}'>{$datax["select_36"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_36' value='{$datax["note_36"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:26.6pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:26.6pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>Kitchen</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:26.6pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Floors/Rugs</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_37' class='form-control'><option value='{$datax["select_37"]}'>{$datax["select_37"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_37' value='{$datax["note_37"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:21.75pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Appliances</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Windows/Doors/Handles</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_38' class='form-control'><option value='{$datax["select_38"]}'>{$datax["select_38"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_38' value='{$datax["note_38"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Taps</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Furnishings/storage</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_39' class='form-control'><option value='{$datax["select_39"]}'>{$datax["select_39"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_39' value='{$datax["note_39"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Oven/gas/electric</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Lighting/Switches/ Electrical</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_40' class='form-control'><option value='{$datax["select_40"]}'>{$datax["select_40"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_40' value='{$datax["note_40"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Work Area Surfaces</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Cleanliness/mould</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_41' class='form-control'><option value='{$datax["select_41"]}'>{$datax["select_41"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_41' value='{$datax["note_41"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Height</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Heating/Cooling/Circulation</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_42' class='form-control'><option value='{$datax["select_42"]}'>{$datax["select_42"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_42' value='{$datax["note_42"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.15pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.15pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>&nbsp;</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.15pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Clear/Clutter</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_43' class='form-control'><option value='{$datax["select_43"]}'>{$datax["select_43"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_43' value='{$datax["note_43"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.65pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.65pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>Lounge</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.65pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Floors/Rugs</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_44' class='form-control'><option value='{$datax["select_44"]}'>{$datax["select_44"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_44' value='{$datax["note_44"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.05pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.05pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.05pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Windows/Doors/Handles</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_45' class='form-control'><option value='{$datax["select_45"]}'>{$datax["select_45"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_45' value='{$datax["note_45"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Furnishings/storage</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_46' class='form-control'><option value='{$datax["select_46"]}'>{$datax["select_46"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_46' value='{$datax["note_46"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:21.75pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Lighting/Switches/ Electrical</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_47' class='form-control'><option value='{$datax["select_47"]}'>{$datax["select_47"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_47' value='{$datax["note_47"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Cleanliness/mould</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_48' class='form-control'><option value='{$datax["select_48"]}'>{$datax["select_48"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_48' value='{$datax["note_48"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Heating/Cooling/Circulation</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_49' class='form-control'><option value='{$datax["select_49"]}'>{$datax["select_49"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_49' value='{$datax["note_49"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.4pt'>
                        <td width='192' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.4pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.4pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Clear/Clutter</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_50' class='form-control'><option value='{$datax["select_50"]}'>{$datax["select_50"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_50' value='{$datax["note_50"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:544.65pt;margin-bottom: 0in;margin-left:-36.55pt;text-indent:0in'>&nbsp;</p>
                    <table class='' border='0' cellspacing='0' cellpadding='0' width='100%'>
                      <tr style='height:41.0pt'>
                        <td width='192' valign='top' style='width:144.3pt;border:solid black 1.0pt; background:#7030A0;padding:3.4pt 3.0pt 0in 5.25pt;height:41.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='color:white'>Area</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:solid black 1.5pt; border-left:none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; background:#7030A0;padding:3.4pt 3.0pt 0in 5.25pt;height:41.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='color:white'>Details</span></b></p>
                        </td>
                        <td width='41' valign='top' style='border-top:solid black 1.5pt; border-left:none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; background:#7030A0;padding:3.4pt 3.0pt 0in 5.25pt;height:41.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-align:justify;text-justify:inter-ideograph;text-indent: 0in'><b><span style='color:white'>Yes</span></b></p>
                        </td>
                        <td width='37' valign='top' style='width:28.05pt;border-top:solid black 1.5pt; border-left:none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; background:#7030A0;padding:3.4pt 3.0pt 0in 5.25pt;height:41.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-align:justify;text-justify:inter-ideograph;text-indent: 0in'><b><span style='color:white'>No</span></b></p>
                        </td>
                        <td width='204' valign='top' style='border:solid black 1.5pt; border-left:none;background:#7030A0;padding:3.4pt 3.0pt 0in 5.25pt; height:41.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='color:white'>Comment and/or Action to be taken - by whom</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:22.45pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.45pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>Bedroom</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.45pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Floors/Rugs</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_51' class='form-control'><option value='{$datax["select_51"]}'>{$datax["select_51"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_51' value='{$datax["note_51"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Bed Height/size</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Windows/Doors/Handles</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_52' class='form-control'><option value='{$datax["select_52"]}'>{$datax["select_52"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_52' value='{$datax["note_52"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Furnishings/storage</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_53' class='form-control'><option value='{$datax["select_53"]}'>{$datax["select_53"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_53' value='{$datax["note_53"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Lighting/Switches/ Electrical</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_54' class='form-control'><option value='{$datax["select_54"]}'>{$datax["select_54"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_54' value='{$datax["note_54"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.05pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.05pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.05pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Cleanliness/mould</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_55' class='form-control'><option value='{$datax["select_55"]}'>{$datax["select_55"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_55' value='{$datax["note_55"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:21.75pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Heating/Cooling/Circulation</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_56' class='form-control'><option value='{$datax["select_56"]}'>{$datax["select_56"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_56' value='{$datax["note_56"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.4pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.4pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.4pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Clear/Clutter</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_57' class='form-control'><option value='{$datax["select_57"]}'>{$datax["select_57"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_57' value='{$datax["note_57"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:23.0pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:23.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>Bathroom</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:23.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Floors/Rugs</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_58' class='form-control'><option value='{$datax["select_58"]}'>{$datax["select_58"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_58' value='{$datax["note_58"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.6pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.6pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Rails</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.6pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Windows/Doors/Handles </span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_59' class='form-control'><option value='{$datax["select_59"]}'>{$datax["select_59"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_59' value='{$datax["note_59"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:21.75pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Hob</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Furnishings/storage</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_60' class='form-control'><option value='{$datax["select_60"]}'>{$datax["select_60"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_60' value='{$datax["note_60"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Bath</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Lighting/Switches/ Electrical</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_61' class='form-control'><option value='{$datax["select_61"]}'>{$datax["select_61"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_61' value='{$datax["note_61"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Temperature Control</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Cleanliness/mould</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_62' class='form-control'><option value='{$datax["select_62"]}'>{$datax["select_62"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_62' value='{$datax["note_62"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Leaks</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Heating/Cooling/Circulation</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_63' class='form-control'><option value='{$datax["select_63"]}'>{$datax["select_63"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_63' value='{$datax["note_63"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.3pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.5pt;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.3pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Handheld shower</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.3pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Clear/Clutter</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_64' class='form-control'><option value='{$datax["select_64"]}'>{$datax["select_64"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_64' value='{$datax["note_64"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.5pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.5pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>Laundry</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.5pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Floors/Rugs</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_65' class='form-control'><option value='{$datax["select_65"]}'>{$datax["select_65"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_65' value='{$datax["note_65"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.05pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.05pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Washer</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.05pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Windows/Doors/Handles</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_66' class='form-control'><option value='{$datax["select_66"]}'>{$datax["select_66"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_66' value='{$datax["note_66"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Dryer</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Furnishings/storage</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_67' class='form-control'><option value='{$datax["select_67"]}'>{$datax["select_67"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_67' value='{$datax["note_67"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Workbench</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Lighting/Switches/ Electrical</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_68' class='form-control'><option value='{$datax["select_68"]}'>{$datax["select_68"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_68' value='{$datax["note_68"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:21.75pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Airer/Clothes line&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Cleanliness/mould</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_69' class='form-control'><option value='{$datax["select_69"]}'>{$datax["select_69"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_69' value='{$datax["note_69"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Heating/Cooling/Circulation</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_70' class='form-control'><option value='{$datax["select_70"]}'>{$datax["select_70"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_70' value='{$datax["note_70"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.35pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.35pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.35pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Clear/Clutter</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_71' class='form-control'><option value='{$datax["select_71"]}'>{$datax["select_71"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_71' value='{$datax["note_71"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.65pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.65pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>Other</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.65pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Floors/Rugs</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_72' class='form-control'><option value='{$datax["select_72"]}'>{$datax["select_72"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_72' value='{$datax["note_72"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:21.75pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Verandah/Covered</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Windows/Doors/Handles</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_73' class='form-control'><option value='{$datax["select_73"]}'>{$datax["select_73"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_73' value='{$datax["note_73"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.05pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.05pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Sunroom</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.05pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Furnishings/storage</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_74' class='form-control'><option value='{$datax["select_74"]}'>{$datax["select_74"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_74' value='{$datax["note_74"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Carers Bedroom</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Lighting/Switches/ Electrical</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_75' class='form-control'><option value='{$datax["select_75"]}'>{$datax["select_75"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_75' value='{$datax["note_75"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Cleanliness/mould</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_76' class='form-control'><option value='{$datax["select_76"]}'>{$datax["select_76"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_76' value='{$datax["note_76"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:21.75pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:21.75pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Heating/Cooling/Circulation</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_77' class='form-control'><option value='{$datax["select_77"]}'>{$datax["select_77"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_77' value='{$datax["note_77"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.4pt'>
                        <td width='192' valign='top' style='width:144.3pt;border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:solid black 1.5pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.4pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.4pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Clear/Clutter</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_78' class='form-control'><option value='{$datax["select_78"]}'>{$datax["select_78"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_78' value='{$datax["note_78"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.6pt'>
                        <td width='192' valign='top' style='width:144.3pt;border:solid black 1.0pt; border-top:none;padding:3.4pt 3.0pt 0in 5.25pt;height:22.6pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>Phone Internet</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.6pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_79' class='form-control'><option value='{$datax["select_79"]}'>{$datax["select_79"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_79' value='{$datax["note_79"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:22.0pt'>
                        <td width='192' valign='top' style='width:144.3pt;border:solid black 1.0pt; border-top:none;padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><b><span style='font-size:11.0pt;line-height:107%'>Smoke Alarm Locations</span></b></p>
                        </td>
                        <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:3.4pt 3.0pt 0in 5.25pt;height:22.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Battery Plan</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_80' class='form-control'><option value='{$datax["select_80"]}'>{$datax["select_80"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_80' value='{$datax["note_80"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:35.5pt;text-indent:0in'>&nbsp;</p>
                    <table class='' border='0' cellspacing='0' cellpadding='0' width='100%' >
                      <tr style='height:38.15pt'>
                        <td width='123' valign='top' style='border:solid black 1.0pt; background:#7030A0;padding:2.15pt 2.8pt 0in 5.2pt;height:38.15pt'>
                          <p class='MsoNormal' align='center' style='margin-top:0in;margin-right:2.6pt; margin-bottom:0in;margin-left:0in;text-align:center;text-indent:0in'><b><span style='color:white'>Area</span></b></p>
                        </td>
                        <td width='243' valign='top' style='border:solid black 1.0pt; border-left:none;background:#7030A0;padding:2.15pt 2.8pt 0in 5.2pt; height:38.15pt'>
                          <p class='MsoNormal' align='center' style='margin-top:0in;margin-right:2.15pt; margin-bottom:0in;margin-left:0in;text-align:center;text-indent:0in'><b><span style='color:white'>Details</span></b></p>
                        </td>
                        <td width='41' valign='top' style='border:solid black 1.0pt; border-left:none;background:#7030A0;padding:2.15pt 2.8pt 0in 5.2pt; height:38.15pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-align:justify;text-justify:inter-ideograph;text-indent: 0in'><b><span style='color:white'>Yes</span></b></p>
                        </td>
                        <td width='38' valign='top' style='border:solid black 1.0pt; border-left:none;background:#7030A0;padding:2.15pt 2.8pt 0in 5.2pt; height:38.15pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-align:justify;text-justify:inter-ideograph;text-indent: 0in'><b><span style='color:white'>No</span></b></p>
                        </td>
                        <td width='246' valign='top' style='border:solid black 1.0pt; border-left:none;background:#7030A0;padding:2.15pt 2.8pt 0in 5.2pt; height:38.15pt'>
                          <p class='MsoNormal' align='center' style='margin:0in;text-align:center; text-indent:0in'><b><span style='color:white'>Comment and/or Action to be taken - by whom</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:21.3pt'>
                        <td width='123' rowspan='2' valign='top' style='border:solid black 1.0pt; border-top:none;padding:2.15pt 2.8pt 0in 5.2pt;height:21.3pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Hazardous Substances</span></p>
                        </td>
                        <td width='243' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.15pt 2.8pt 0in 5.2pt;height:21.3pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-indent:0in'>Stored in a safe place?</p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_81' class='form-control'><option value='{$datax["select_81"]}'>{$datax["select_81"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_8' value='{$datax["note_81"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:21.5pt'>
                        <td width='243' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.15pt 2.8pt 0in 5.2pt;height:21.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>In original container?</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_82' class='form-control'><option value='{$datax["select_82"]}'>{$datax["select_82"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_82' value='{$datax["note_82"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:20.0pt'>
                        <td width='123' valign='top' style='border:solid black 1.0pt; border-top:none;padding:2.15pt 2.8pt 0in 5.2pt;height:20.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Other Issues</span></p>
                        </td>
                        <td width='243' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.15pt 2.8pt 0in 5.2pt;height:20.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Other people in the home</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_83' class='form-control'><option value='{$datax["select_83"]}'>{$datax["select_83"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_83' value='{$datax["note_83"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:19.8pt'>
                        <td width='123' rowspan='5' valign='top' style='border:solid black 1.0pt; border-top:none;padding:2.15pt 2.8pt 0in 5.2pt;height:19.8pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Mobility Equip</span></p>
                        </td>
                        <td width='243' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.15pt 2.8pt 0in 5.2pt;height:19.8pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Eg Walker, mats, hospital bed</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_84' class='form-control'><option value='{$datax["select_84"]}'>{$datax["select_84"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_84' value='{$datax["note_84"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:20.0pt'>
                        <td width='243' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.15pt 2.8pt 0in 5.2pt;height:20.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>&nbsp;</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_85' class='form-control'><option value='{$datax["select_85"]}'>{$datax["select_85"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_85' value='{$datax["note_85"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:20.0pt'>
                        <td width='243' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.15pt 2.8pt 0in 5.2pt;height:20.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>&nbsp;</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_86' class='form-control'><option value='{$datax["select_86"]}'>{$datax["select_86"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_86' value='{$datax["note_86"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:20.0pt'>
                        <td width='243' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.15pt 2.8pt 0in 5.2pt;height:20.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>&nbsp;</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_87' class='form-control'><option value='{$datax["select_87"]}'>{$datax["select_87"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_87' value='{$datax["note_87"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                      <tr style='height:19.75pt'>
                        <td width='243' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.15pt 2.8pt 0in 5.2pt;height:19.75pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>&nbsp;</span></p>
                        </td>
                        <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <select name='select_88' class='form-control'><option value='{$datax["select_88"]}'>{$datax["select_88"]}</option><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                        <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                            <input type='text' name='note_88' value='{$datax["note_88"]}' style='width:100%' class='form-control'>
                        </td>
                      </tr>
                </table>
            </div>
            <div class='col-12 col-md-4'><br><br>
                Checklist Completed by:<br><select class='form-control' style='width:100%' name='checklist_completed_by' required=''>";
                $s7x = "select * from uerp_user where id='{$datax["checklist_completed_by"]}' and mtype='USER' order by username asc limit 1";
                $r7x = $conn->query($s7x);
                if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                    echo"<option value='".$rs7x["id"]."'>".$rs7x["username"]." ".$rs7x["username2"]." </option>";
                } }
            echo"</select></div>
            <div class='col-12 col-md-4'><br><br>
                Date:<br><input type='date' name='post_date' value='{$datax["post_date"]}' style='width:100%' class='form-control'>
            </div>";
        } }
    }

    
            echo"<div class='col-12 style='text-align:left'><Br><br><hr><br><Br>
                <table border='1' cellpadding='8' cellspacing='0' style='width:100%'>";
                    echo "<tr><th>ID</th><th>Client Name</th><th>Address</th><th>Date</th><th>Submitted By</th><th>Post Date</th><th>Action</th></tr>";
    
                    $sql = "SELECT id, name, address, date, checklist_completed_by, post_date FROM environmental_assessment_checklist_data ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['date']}</td>
                            <td>{$row['checklist_completed_by']}</td>
                            <td>{$row['post_date']}</td>
                            <td><a href='index.php?url=cohs_environmental-assessment-date_view.php&id={$row['id']}'>View Details</a></td>
                        </tr>";
                    }
                echo "</table>
            </div>
        </div>
    </div>";
?>
