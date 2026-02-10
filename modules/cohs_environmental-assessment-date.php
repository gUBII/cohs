<?php
    $cdate=date("Y-m-d",time());
    echo"<div class='container'>
        <form method='post' name='dataform' action='formprocessor_1.php' target='dataprocessor' enctype='multipart/form-data' >
            <input type='hidden' name='form1' value='1'>
            <br><br>
            <div class='row'>
            <div class='col-7 col-md-8' style='text-align:left'><b><span style='font-size:15pt;'>Environmental Assessment</span></b></div>
            <div class='col-5 col-md-4' style='text-align:right'><a href='index.php?url=cohs_environmental-assessment-date_view.php' class='btn btn-primary' style='margin-top:10px;'>View Saved Data</a></div>
            <div class='col-12 style='text-align:left'><hr></div>
            <div class='col-12 col-md-4'>Name:<br><select class='form-control' style='width:100%' name='name' required=''>
                <option value=''>Select Client</option>";
                $s7y = "select * from uerp_user where mtype='CLIENT' order by username asc";
                $r7y = $conn->query($s7y);
                if ($r7y->num_rows > 0) { while($rs7y = $r7y->fetch_assoc()) {
                    echo"<option value='".$rs7y["id"]."'>".$rs7y["username"]." ".$rs7y["username2"]." </option>";
                } }
            echo"</select></div>
            <div class='col-12 col-md-4'>Address:<br><input type='text' class='form-control' name='address' value=''></div>
            <div class='col-12 col-md-4'>Date:<br><input type='date' class='form-control' name='date' value='$cdate'></div>
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
                        <select name='select_1' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_1' value='' style='width:100%' class='form-control'>
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
                        <select name='select_2' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_2' value='' style='width:100%' class='form-control'>
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
                        <select name='select_3' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_3' value='' style='width:100%' class='form-control'>
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
                        <select name='select_4' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_4' value='' style='width:100%' class='form-control'>
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
                        <select name='select_5' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_5' value='' style='width:100%' class='form-control'>
                    </td>
                </tr>
                
                <tr style='height:22.0pt'>
                    <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.0pt'>
                      <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Clear, unobstructed</span></p>
                    </td>
                    <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <select name='select_6' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_6' value='' style='width:100%' class='form-control'>
                    </td>
                </tr>
                
                <tr style='height:21.75pt'>
                    <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:21.75pt'>
                      <p class='MsoNormal' style='margin:0in;text-indent:0in'><span style='font-size: 11.0pt;line-height:107%'>Slippery, muddy</span></p>
                    </td>
                    <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <select name='select_7' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_7' value='' style='width:100%' class='form-control'>
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
                        <select name='select_8' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_8' value='' style='width:100%' class='form-control'>
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
                        <select name='select_9' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_9' value='' style='width:100%' class='form-control'>
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
                        <select name='select_10' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_10' value='' style='width:100%' class='form-control'>
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
                        <select name='select_11' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_11' value='' style='width:100%' class='form-control'>
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
                        <select name='select_12' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_12' value='' style='width:100%' class='form-control'>
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
                        <select name='select_13' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_13' value='' style='width:100%' class='form-control'>
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
                        <select name='select_14' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_14' value='' style='width:100%' class='form-control'>
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
                        <select name='select_15' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_15' value='' style='width:100%' class='form-control'>
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
                        <select name='select_16' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_16' value='' style='width:100%' class='form-control'>
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
                        <select name='select_17' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_17' value='' style='width:100%' class='form-control'>
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
                        <select name='select_18' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_18' value='' style='width:100%' class='form-control'>
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
                        <select name='select_19' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_19' value='' style='width:100%' class='form-control'>
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
                        <select name='select_20' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_20' value='' style='width:100%' class='form-control'>
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
                        <select name='select_21' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_21' value='' style='width:100%' class='form-control'>
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
                        <select name='select_22' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_22' value='' style='width:100%' class='form-control'>
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
                        <select name='select_23' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_23' value='' style='width:100%' class='form-control'>
                    </td>
                  </tr>
                  <tr style='height:22.0pt'>
                    <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                      <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Windows/Doors/Handles</span></p>
                    </td>
                    <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <select name='select_24' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_24' value='' style='width:100%' class='form-control'>
                    </td>
                  </tr>
                  <tr style='height:21.8pt'>
                    <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:21.8pt'>
                      <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Furnishings/storage</span></p>
                    </td>
                    <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <select name='select_25' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_25' value='' style='width:100%' class='form-control'>
                    </td>
                  </tr>
                  <tr style='height:22.0pt'>
                    <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                      <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Lighting/Switches/ Electrical</span></p>
                    </td>
                    <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <select name='select_26' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_26' value='' style='width:100%' class='form-control'>
                    </td>
                  </tr>
                  <tr style='height:22.0pt'>
                    <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                      <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Cleanliness/mould</span></p>
                    </td>
                    <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <select name='select_27' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_27' value='' style='width:100%' class='form-control'>
                    </td>
                  </tr>
                  <tr style='height:22.0pt'>
                    <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.0pt'>
                      <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Heating/Cooling/Circulation</span></p>
                    </td>
                    <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <select name='select_28' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_28' value='' style='width:100%' class='form-control'>
                    </td>
                  </tr>
                  <tr style='height:22.25pt'>
                    <td width='215' valign='top' style='width:161.1pt;border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:1.05pt 3.0pt 0in 5.2pt;height:22.25pt'>
                      <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.05pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>Clear/Clutter</span></p>
                    </td>
                    <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <select name='select_29' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_29' value='' style='width:100%' class='form-control'>
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
                        <select name='select_30' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_30' value='' style='width:100%' class='form-control'>
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
                        <select name='select_31' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_31' value='' style='width:100%' class='form-control'>
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
                        <select name='select_32' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_32' value='' style='width:100%' class='form-control'>
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
                        <select name='select_33' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_33' value='' style='width:100%' class='form-control'>
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
                        <select name='select_34' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_34' value='' style='width:100%' class='form-control'>
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
                        <select name='select_35' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_35' value='' style='width:100%' class='form-control'>
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
                        <select name='select_36' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_36' value='' style='width:100%' class='form-control'>
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
                        <select name='select_37' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_37' value='' style='width:100%' class='form-control'>
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
                        <select name='select_38' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_38' value='' style='width:100%' class='form-control'>
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
                        <select name='select_39' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_39' value='' style='width:100%' class='form-control'>
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
                        <select name='select_40' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_40' value='' style='width:100%' class='form-control'>
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
                        <select name='select_41' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_41' value='' style='width:100%' class='form-control'>
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
                        <select name='select_42' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_42' value='' style='width:100%' class='form-control'>
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
                        <select name='select_43' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_43' value='' style='width:100%' class='form-control'>
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
                        <select name='select_44' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_44' value='' style='width:100%' class='form-control'>
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
                        <select name='select_45' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_45' value='' style='width:100%' class='form-control'>
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
                        <select name='select_46' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_46' value='' style='width:100%' class='form-control'>
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
                        <select name='select_47' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_47' value='' style='width:100%' class='form-control'>
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
                        <select name='select_48' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_48' value='' style='width:100%' class='form-control'>
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
                        <select name='select_49' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_49' value='' style='width:100%' class='form-control'>
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
                        <select name='select_50' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_50' value='' style='width:100%' class='form-control'>
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
                        <select name='select_51' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_51' value='' style='width:100%' class='form-control'>
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
                        <select name='select_52' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_52' value='' style='width:100%' class='form-control'>
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
                        <select name='select_53' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_53' value='' style='width:100%' class='form-control'>
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
                        <select name='select_54' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_54' value='' style='width:100%' class='form-control'>
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
                        <select name='select_55' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_55' value='' style='width:100%' class='form-control'>
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
                        <select name='select_56' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_56' value='' style='width:100%' class='form-control'>
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
                        <select name='select_57' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_57' value='' style='width:100%' class='form-control'>
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
                        <select name='select_58' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_58' value='' style='width:100%' class='form-control'>
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
                        <select name='select_59' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_59' value='' style='width:100%' class='form-control'>
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
                        <select name='select_60' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_60' value='' style='width:100%' class='form-control'>
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
                        <select name='select_61' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_61' value='' style='width:100%' class='form-control'>
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
                        <select name='select_62' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_62' value='' style='width:100%' class='form-control'>
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
                        <select name='select_63' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_63' value='' style='width:100%' class='form-control'>
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
                        <select name='select_64' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_64' value='' style='width:100%' class='form-control'>
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
                        <select name='select_65' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_65' value='' style='width:100%' class='form-control'>
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
                        <select name='select_66' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_66' value='' style='width:100%' class='form-control'>
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
                        <select name='select_67' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_67' value='' style='width:100%' class='form-control'>
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
                        <select name='select_68' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_68' value='' style='width:100%' class='form-control'>
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
                        <select name='select_69' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_69' value='' style='width:100%' class='form-control'>
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
                        <select name='select_70' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_70' value='' style='width:100%' class='form-control'>
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
                        <select name='select_71' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_71' value='' style='width:100%' class='form-control'>
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
                        <select name='select_72' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_72' value='' style='width:100%' class='form-control'>
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
                        <select name='select_73' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_73' value='' style='width:100%' class='form-control'>
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
                        <select name='select_74' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_74' value='' style='width:100%' class='form-control'>
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
                        <select name='select_75' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_75' value='' style='width:100%' class='form-control'>
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
                        <select name='select_76' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_76' value='' style='width:100%' class='form-control'>
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
                        <select name='select_77' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_77' value='' style='width:100%' class='form-control'>
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
                        <select name='select_78' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_78' value='' style='width:100%' class='form-control'>
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
                        <select name='select_79' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_79' value='' style='width:100%' class='form-control'>
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
                        <select name='select_80' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_80' value='' style='width:100%' class='form-control'>
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
                        <select name='select_81' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_8' value='' style='width:100%' class='form-control'>
                    </td>
                  </tr>
                  <tr style='height:21.5pt'>
                    <td width='243' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.15pt 2.8pt 0in 5.2pt;height:21.5pt'>
                      <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>In original container?</span></p>
                    </td>
                    <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <select name='select_82' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_82' value='' style='width:100%' class='form-control'>
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
                        <select name='select_83' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_83' value='' style='width:100%' class='form-control'>
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
                        <select name='select_84' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_84' value='' style='width:100%' class='form-control'>
                    </td>
                  </tr>
                  <tr style='height:20.0pt'>
                    <td width='243' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.15pt 2.8pt 0in 5.2pt;height:20.0pt'>
                      <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>&nbsp;</span></p>
                    </td>
                    <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <select name='select_85' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_85' value='' style='width:100%' class='form-control'>
                    </td>
                  </tr>
                  <tr style='height:20.0pt'>
                    <td width='243' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.15pt 2.8pt 0in 5.2pt;height:20.0pt'>
                      <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>&nbsp;</span></p>
                    </td>
                    <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <select name='select_86' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_86' value='' style='width:100%' class='form-control'>
                    </td>
                  </tr>
                  <tr style='height:20.0pt'>
                    <td width='243' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.15pt 2.8pt 0in 5.2pt;height:20.0pt'>
                      <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>&nbsp;</span></p>
                    </td>
                    <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <select name='select_87' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_87' value='' style='width:100%' class='form-control'>
                    </td>
                  </tr>
                  <tr style='height:19.75pt'>
                    <td width='243' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.15pt 2.8pt 0in 5.2pt;height:19.75pt'>
                      <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.3pt;text-indent:0in'><span style='font-size:11.0pt;line-height: 107%'>&nbsp;</span></p>
                    </td>
                    <td width='78' valign='top' colspan='2' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.0pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <select name='select_88' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                    </td>
                    <td width='204' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.5pt;border-right:solid black 1.5pt; padding:.15pt 2.8pt 0in 5.25pt;height:22.6pt'>
                        <input type='text' name='note_88' value='' style='width:100%' class='form-control'>
                    </td>
                  </tr>
            </table>
        </div>
        <div class='col-12 col-md-4'><br><br>
            Checklist Completed by:<br><select class='form-control' style='width:100%' name='checklist_completed_by' required=''>";
            $s7x = "select * from uerp_user where mtype='USER' order by username asc";
            $r7x = $conn->query($s7x);
            if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                if($userid==$rs7x["id"]) echo"<option value='".$rs7x["id"]."' selected>".$rs7x["username"]." ".$rs7x["username2"]." </option>";
                else echo"<option value='".$rs7x["id"]."'>".$rs7x["username"]." ".$rs7x["username2"]." </option>";
            } }
        echo"</select></div>
        <div class='col-12 col-md-4'><br><br>
            Date:<br><input type='date' name='post_date' value='$cdate' style='width:100%' class='form-control'>
        </div>
        <div class='col-12 col-md-4'><br><br><br>
            <input type='submit' name='Submit' value='Submit' style='width:100%;background-color:green' class='form-control'>
        </div>
    </form>";
    
?>