<?php
    $cdate=date("Y-m-d",time());
    echo"<div class='container'>
        <form method='post' name='dataform' action='formprocessor_1.php' target='dataprocessor' enctype='multipart/form-data' >
            <input type='hidden' name='form2' value='2'><br><br>
            <div class='row'>
                <div class='col-7 col-md-8' style='text-align:left'>COHS AGED CARE<h4>HOME CARE SERVICE AGREEMENT</h4></div>
                <div class='col-5 col-md-4' style='text-align:right'><a href='index.php?url=cohs_care_plan_sdm_view.php' class='btn btn-primary' style='margin-top:10px;'>View Saved Data</a></div>
                <div class='col-12 style='text-align:left'><hr><br><br></div>
                <div class='col-12'><br>
                    <div class='row'>
                        <div class='col-12 col-md-12'><h4>Important Information Schedule</h4></div>
                        <div class='col-12 col-md-12'><b>Organisation Details</b></div>
                        <div class='col-12 col-md-2'>Name:<input type='text' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-2'>ABN:<input type='text' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-2'>Address:<input type='text' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-2'>Phone:<input type='text' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-2'>Email:<input type='text' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-12'><br><b>Consumer</b></div>
                        <div class='col-12 col-md-2'>Name:<input type='text' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-2'>Address:<input type='text' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-2'>Phone:<input type='text' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-2'>Email:<input type='text' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-12'><br><b>Consumer’s Representative</b></div>
                        <div class='col-12 col-md-2'>Name:<input type='text' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-2'>ABN:<input type='text' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-2'>Address:<input type='text' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-2'>Phone:<input type='text' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-2'>Email:<input type='text' name='' value='' class='form-control'></div>
                        
                        <div class='col-12 col-md-6'><Br><b>Agreement Start Date</b></div>
                        <div class='col-12 col-md-6'><br><b>Agreement End Date</b></div>
                        <div class='col-12 col-md-6'><input type='date' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-6'><input type='date' name='' value='' class='form-control'></div>
                        
                        <div class='col-12 col-md-12'><br><b>Home Care Package Transfer</b></div>
                        <div class='col-12 col-md-4'>Select Option:<select name='' class='form-control'><option value='YES'>YES</option><option value='NO'>NO</option></select></div>
                        <div class='col-12 col-md-4'>Transferring From:<input type='date' name='' value='' class='form-control'></div>
                        <div class='col-12 col-md-4'>Last day of services from previous Service Provider (Date):<input type='date' name='' value='' class='form-control'></div>
                        
                        <div class='col-12 col-md-12'><br></div>
                        <div class='col-12 col-md-12'>
                            <table>
                                <tr><td valign='top'><b>Home Care Package</b></td><td align=center><b>Eligibility Level</b></td><td align=center><b>Availability Level</b></td></tr>
                                <tr>
                                    <td valign='top' >Level 1</td>
                                    <td align=center><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                                    <td align=center><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                                </tr>
                                <tr>
                                    <td valign='top' >Level 2</td>
                                    <td align=center><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                                    <td align=center><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                                </tr>
                                <tr>
                                    <td valign='top' >Level 3</td>
                                    <td align=center><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                                    <td align=center><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                                </tr>
                                <tr>
                                    <td valign='top' >Level 4</td>
                                    <td align=center><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                                    <td align=center><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                                </tr>
                              
                                <tr>
                                    <td valign='top' ><br><b>Delivery of Care</b></td>
                                    <td align=center><br>Consumer Directed Care:<br><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                                    <td align=center></td>
                                </tr>
                                
                                <tr>
                                    <td valign='top' ><br><b>Care Plan</b></td>
                                    <td align=center><br>Attached:<br><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                                    <td align=center><br>In Home:<br><select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                                </tr>
                                
                                <tr>
                                    <td valign='top' ><br><b>Fees</b></td>
                                    <td align=center colspan=2><br>Fees are set out at Annexure 2. Further detail can be found in COHS’s Fee Schedule.  </td>
                                </tr>
                                
                                <tr>
                                    <td valign='top' ><br><b>Guarantor Details (if applicable)</b></td>
                                    <td align=center colspan=2><br><textarea name='' class='form-control'></textarea></td>
                                </tr>
                            </table>
                        </div>
                        
                        <div class='col-12 col-md-12'><br></div>
                        <div class='col-12 col-md-12' style='background-color:#7030A0'><b>Home Care Agreement</b></div>
                        <div class='col-12 col-md-12'><br>
                            <p>This Agreement is a contract between you and us. If you have any concerns about what is in this Agreement, or if you need this Agreement in another format (such as in another language), you can ask us for support, or you can ask for advice from your family, friends, a financial advisor, or a legal practitioner.</p>
                        </div>
                        
                        
                    </div>
                    
                    
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='100%' style='margin-left:-1.5pt;border-collapse:collapse'>
                      <tr style='height:16.5pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:.3pt 0in 0in 0in; height:16.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>1</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: .3pt 0in 0in 0in;height:16.5pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Home Care Packages and Consumer Directed Care</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:52.55pt'>
                        <td width='56' valign='bottom' style='padding:.3pt 0in 0in 0in; height:52.55pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:8.8pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:2.0pt;line-height:107%'>&nbsp;</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:14.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>1.1</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:.3pt 0in 0in 0in; height:52.55pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'>The Australian Government provides funding for Home Care Packages aimed at supporting older people to remain living at home for as long as possible.</p>
                        </td>
                      </tr>
                      <tr style='height:84.75pt'>
                        <td width='56' valign='bottom' style='padding:.3pt 0in 0in 0in; height:84.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:56.85pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>1.2</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' style='padding:.3pt 0in 0in 0in;height:84.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.3pt;margin-left:0in;text-align:left;text-indent:0in; line-height:107%'>There are four levels of Home Care Packages:</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.95pt;margin-left:30.5pt;text-align:left;text-indent:-30.5pt; line-height:107%'><span style='line-height:107%'>(a)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Home Care Level 1</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.65pt;margin-left:30.5pt;text-align:left;text-indent:-30.5pt; line-height:107%'><span style='line-height:107%'>(b)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Home Care Level 2</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.9pt;margin-left:30.5pt;text-align:left;text-indent:-30.5pt; line-height:107%'><span style='line-height:107%'>(c)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Home Care Level 3</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:30.5pt;text-align:left;text-indent:-30.5pt; line-height:107%'><span style='line-height:107%'>(d)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Home Care Level 4</p>
                        </td>
                      </tr>
                      <tr style='height:64.5pt'>
                        <td width='56' valign='bottom' style='padding:.3pt 0in 0in 0in; height:64.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:29.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>1.3</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:12.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='550' valign='top' style='padding:.3pt 0in 0in 0in; height:64.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.2pt;margin-bottom: 0in;margin-left:0in;text-indent:0in;line-height:107%'>Each Home Care Package will be delivered using a Consumer Directed Care model, to provide you with choice and flexibility in the way your care and support are provided.</p>
                        </td>
                      </tr>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:.3pt 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>2</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: .3pt 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>What this Agreement is about and how it applies to you</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:92.3pt'>
                        <td width='56' valign='bottom' style='padding:.3pt 0in 0in 0in; height:92.3pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:56.85pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>2.1&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:.3pt 0in 0in 0in; height:92.3pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:.3pt; margin-left:0in;text-indent:0in;line-height:110%'>We have agreed to provide you with care that you need in your own home for as long as you need or want, subject to your and our rights to terminate this Agreement. This</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:.35pt; margin-left:0in;text-indent:0in;line-height:107%'>Agreement and our Home Care Package Consumer Handbook (Consumer</p>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'>Handbook) sets out how you will receive the services and what we expect of each other.&nbsp;</p>
                        </td>
                      </tr>
                      <tr style='height:148.0pt'>
                        <td width='56' valign='bottom' style='padding:.3pt 0in 0in 0in; height:148.0pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:113.65pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>2.2</p>
                          <p class='MsoNormal' align='right' style='margin-top:0in;margin-right:1.45pt; margin-bottom:0in;margin-left:0in;text-align:right;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='top' style='padding:.3pt 0in 0in 0in; height:148.0pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:2.0pt;text-align:left;text-indent:0in; line-height:107%'>We agree to:</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:.1pt; margin-left:23.25pt;text-indent:-21.25pt'><span style='line-height:111%'>(a)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;</span></span> Provide you with services as per your <i>Care Plan</i>, in line with the <i>Aged Care Act 1997 (Cth)</i> (the Act), all other relevant legislation, and the <i>Aged Care Quality Standards</i>.</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:.25pt; margin-left:23.25pt;text-indent:-21.25pt;line-height:110%'><span style='line-height:110%'>(b)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;</span></span> Support you to set goals, determine the amount of control you wish to have in relation to your care and have a say in what services you receive from us.</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:23.25pt;text-indent:-21.25pt;line-height:112%'><span style='line-height:112%'>(c)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;</span></span> Take all reasonable steps to comply with our obligations set out in this Agreement, except where you have agreed to exclude any of our duties to you.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:23.25pt;text-align:left;text-indent:0in; line-height:107%'><i>Any agreed exclusions will be added to Annexure 4 to this agreement.</i></p>
                        </td>
                      </tr>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:.3pt 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>3</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: .3pt 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Receiving Care</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:59.45pt'>
                        <td width='56' valign='top' style='padding:.3pt 0in 0in 0in; height:59.45pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:21.55pt; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:13.0pt;line-height:107%'>&nbsp;</span>3.1</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:.3pt 0in 0in 0in; height:59.45pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:2.5pt;margin-bottom: 0in;margin-left:0in;text-indent:0in;line-height:107%'>You have been assessed as eligible for the services set out in the <i>Important Information Schedule</i> in this Agreement. Based on this assessment, we’ll provide you with the care services appropriate to the care package level set out in the schedule.</p>
                        </td>
                      </tr>
                      <tr style='height:39.85pt'>
                        <td width='56' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:.3pt 0in 0in 0in;height:39.85pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>3.2</p>
                        </td>
                        <td width='550' valign='top' style='border:none;border-bottom: solid black 1.0pt;padding:.3pt 0in 0in 0in;height:39.85pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'>Should you become eligible to be provided with a different level of care and we agree to provide it, we will amend this Agreement by inserting an amended <i>Important</i></p>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: 1.6pt;margin-left:41.05pt'><i>Information Schedule</i> containing the detail of those changes.</p>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='100%' style='margin-left:-1.5pt;border-collapse:collapse'>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>4</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Our Responsibilities</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:52.3pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:52.3pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:21.55pt; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%'>&nbsp;</span></b>4.1</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 0in 0in; height:52.3pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:-1.95pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:107%'>We agree to provide you with the type of services identified in your <i>Care Plan</i> or as described in the <i>Important Information Schedule</i>.</p>
                        </td>
                      </tr>
                      <tr style='height:56.5pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:56.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>4.2</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:56.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:-1.85pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:107%'>We believe these services are suitable for your needs and comply with our obligations under the <i>Charter of Aged Care Rights</i>. This charter is detailed in our <i>Consumer Handbook</i>.</p>
                        </td>
                      </tr>
                      <tr style='height:70.75pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:70.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:42.85pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>4.3</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:70.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:2.0pt;text-align:left;text-indent:0in; line-height:107%'>We have ensured that this Agreement has been made in compliance with our obligations under the <i>Aged Care Act</i>. The care planning process is driven by you, in consultation with us, and together we will set your care goals, develop a <i>Care Plan</i> and <i>Individualised Budget</i> that best meet your needs.</p>
                        </td>
                      </tr>
                      <tr style='height:113.0pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:113.0pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>4.4</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:113.0pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:2.0pt;text-align:left;text-indent:0in; line-height:107%'>We will ensure that you receive:</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:-.6pt; margin-bottom:.35pt;margin-left:23.25pt;text-align:left;text-indent:-21.25pt; line-height:107%'><span style='line-height:107%'>(a)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;</span></span> High-quality in-home services that meet your identified and assessed needs.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:-.6pt; margin-bottom:0in;margin-left:23.25pt;text-align:left;text-indent:-21.25pt; line-height:112%'><span style='line-height:112%'>(b)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;</span></span> Information needed to assist you to make informed decisions about your care options, including access to an advocate.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:-.6pt; margin-bottom:0in;margin-left:23.25pt;text-align:left;text-indent:-21.25pt; line-height:112%'><span style='line-height:112%'>(c)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;</span></span> As little or as much support as required in line with your preferred level of independence.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:-.6pt; margin-bottom:0in;margin-left:23.25pt;text-align:left;text-indent:-21.25pt; line-height:107%'><span style='line-height:107%'>(d)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;</span></span> Full details of the care being provided.</p>
                        </td>
                      </tr>
                      <tr style='height:49.25pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:49.25pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>4.5</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 0in 0in; height:49.25pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:-.95pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:112%'>A detailed list of the types of care and services available to you via your Home Care Package are outlined in our <i>Consumer Handbook</i>.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:2.0pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                      </tr>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>5</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Your Responsibilities</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:49.8pt'>
                        <td width='56' valign='bottom' style='padding:0in 0in 0in 0in; height:49.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:14.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>5.1</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 0in 0in; height:49.8pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:-1.8pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:107%'>If we request you to acquire and maintain public liability insurance at your place of residence, you will do this with a reputable insurer on terms reasonable to us.</p>
                        </td>
                      </tr>
                      <tr style='height:56.5pt'>
                        <td width='56' valign='bottom' style='padding:0in 0in 0in 0in; height:56.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:28.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>5.2</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:56.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:-1.35pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:107%'>Both you (to the extent within your control) and we must act in a manner consistent with the <i>Charter of Aged Care Rights</i>, however this is not intended to be, nor should it be taken to be, an exhaustive list of all your rights and responsibilities.</p>
                        </td>
                      </tr>
                      <tr style='height:49.4pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:49.4pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>5.3</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 0in 0in; height:49.4pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:-1.65pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:107%'>You will, to the extent within your control, always treat our staff with respect and in a manner consistent with the Responsibilities set out in our <i>Consumer Rights Policy and Procedure and Consumer Handbook</i>.&nbsp;</p>
                        </td>
                      </tr>
                      <tr style='height:56.35pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:56.35pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>5.4</p>
                        </td>
                        <td width='550' valign='top' style='padding:0in 0in 0in 0in; height:56.35pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:-1.9pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:112%'>You agree to pay all Fees and Charges applicable to your services, and to act in accordance with the <i>Charter of Aged Care Rights</i>, your responsibilities, and this Agreement, to the extent within your control.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:2.0pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                      </tr>
                      <tr style='height:16.5pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 0in 0in; height:16.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>6</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 0in 0in;height:16.5pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Your Care Plan</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:33.0pt'>
                        <td width='56' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 0in 0in 0in;height:33.0pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:12.0pt;line-height:107%'>&nbsp;</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>6.1</p>
                        </td>
                        <td width='550' valign='bottom' style='border:none;border-bottom: solid black 1.0pt;padding:0in 0in 0in 0in;height:33.0pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'>Prior to the Commencement Date of this <i>Agreement</i>, we will consult with you and/or</p>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' style='margin-right:3.75pt'>your Representative to develop an individual <i>Care Plan</i> appropriate to your assessed needs. The individual <i>Care Plan</i> will be monitored and reviewed with you at least six</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:57.3pt;text-indent:-16.75pt'><span style='line-height:111%'>(6)<span style='font:7.0pt 'Times New Roman''>&nbsp;</span></span> - monthly.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:5.65pt;margin-bottom: .2pt;margin-left:117.1pt;text-indent:-40.55pt'><span style='line-height:111%'>6.2<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> You will receive the services listed in your <i>Care Plan</i> based on your assessed needs and goals. These services will continue until such time as the services are varied by agreement, or suspended, or this <i>Agreement</i> with you is terminated.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:5.65pt;margin-bottom: .2pt;margin-left:117.1pt;text-indent:-40.55pt'><span style='line-height:111%'>6.3<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> We will support and encourage you to set your care goals, develop your <i>Care Plan</i> and <i>Individualised Budget</i> to best meet your needs.</p>
                    <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'>&nbsp;</p>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='100%' style='margin-left:-1.5pt;border-collapse:collapse'>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 1.7pt 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>7</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 1.7pt 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Services Available</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:35.55pt'>
                        <td width='56' valign='top' style='padding:0in 0in 1.7pt 0in; height:35.55pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>7.1</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 1.7pt 0in; height:35.55pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'>The type of services available to you are set out in our <i>Consumer Handbook</i>.</p>
                        </td>
                      </tr>
                      <tr style='height:240.3pt'>
                        <td width='56' valign='top' style='padding:0in 0in 1.7pt 0in; height:240.3pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>7.2</p>
                        </td>
                        <td width='550' style='padding:0in 0in 1.7pt 0in;height:240.3pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:2.0pt;text-indent:-2.0pt;line-height:112%'>We will take all reasonable steps to accommodate your service preferences, however there are some circumstances where we may decline a request, such as where:</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.75pt;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:112%'><span style='line-height:112%'>(a)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> We believe it may cause harm or pose a threat to your health and/or safety, or that of our staff.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.9pt;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:107%'><span style='line-height:107%'>(b)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> It is outside the scope of the home care package program.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:113%'><span style='line-height:113%'>(c)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> We would not be able to comply with our responsibilities under the Act or other laws.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.8pt;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:112%'><span style='line-height:112%'>(d)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> You have chosen an alternative service provider that is outside of our preferred list and all reasonable effort has been made to broker an acceptable <i>Brokerage Agreement</i>, however the requested service provider will not enter a contract with us.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.9pt;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:107%'><span style='line-height:107%'>(e)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> There have been previous concerns with your suggested service provider.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.9pt;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:113%'><span style='line-height:113%'>(f)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Providing the service will result in a possible compromise of your health and wellbeing.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.65pt;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:107%'><span style='line-height:107%'>(g)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> The cost of the service is above the available funds within your package.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:107%'><span style='line-height:107%'>(h)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> The service requested in an Excluded Service (as prescribed by the Act).</p>
                        </td>
                      </tr>
                      <tr style='height:64.45pt'>
                        <td width='56' valign='top' style='padding:0in 0in 1.7pt 0in; height:64.45pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:29.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>7.3</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:12.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='550' valign='top' style='padding:0in 0in 1.7pt 0in; height:64.45pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:2.05pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>Where we are not able to give you your preference or request for services, it will be clearly documented, and you will be provided with an explanation as to why we are unable to do so.</p>
                        </td>
                      </tr>
                      <tr style='height:16.8pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 1.7pt 0in; height:16.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>8</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 1.7pt 0in;height:16.8pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Your Budget</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:71.05pt'>
                        <td width='56' valign='top' style='padding:0in 0in 1.7pt 0in; height:71.05pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>8.1</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 1.7pt 0in; height:71.05pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.4pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>We will work with you to develop an <i>Individualised Budget</i> which identifies income and planned expenditure for your package, based on your agreed individual <i>Care Plan</i>. Your budget will clearly identify the full amount payable by you including any Basic Daily Fee (if applicable) and the Income Tested Care Fee (where relevant).</p>
                        </td>
                      </tr>
                      <tr style='height:35.4pt'>
                        <td width='56' valign='top' style='padding:0in 0in 1.7pt 0in; height:35.4pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>8.2</p>
                        </td>
                        <td width='550' valign='top' style='padding:0in 0in 1.7pt 0in; height:35.4pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>We will provide you with your budget as soon as possible, however no later than 14 days after the commencement of your care.</p>
                        </td>
                      </tr>
                      <tr style='height:29.35pt'>
                        <td width='56' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 0in 1.7pt 0in;height:29.35pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>8.3</p>
                        </td>
                        <td width='550' style='border:none;border-bottom:solid black 1.0pt; padding:0in 0in 1.7pt 0in;height:29.35pt'>
                          <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'>Your budget does not need to plan to expend all the funds available and any unspent</p>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: 14.2pt;margin-left:43.05pt'>funds can be carried from month to month and year to year (i.e., a contingency).</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:42.55pt;text-indent:-42.55pt'>8.4 At any time where there is a change to the services or the costs of the services provided, we will review and revise the budget in consultation with you to enable this additional expense to be either accommodated within the budget or paid for under private arrangements.</p>
                    <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'>&nbsp;</p>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='100%' style='margin-left:-1.5pt;border-collapse:collapse'>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:1.95pt 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>9</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 1.95pt 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Your Monthly Statements</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:108.8pt'>
                        <td width='56' valign='bottom' style='padding:1.95pt 0in 0in 0in; height:108.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%'>&nbsp;</span></b></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:71.1pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>9.1</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:1.95pt 0in 0in 0in; height:108.8pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:.7pt; margin-left:2.0pt;text-indent:-2.0pt;line-height:112%'>You will be provided with a statement each month to help you to keep track of how your package funds are being spent. Your <i>Monthly Statement</i> will outline:</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.95pt;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:107%'><span style='line-height:107%'>(a)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Charges made to your home care package for care and services.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.2pt;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:110%'><span style='line-height:110%'>(b)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Charges made to your home care package to cover case management and other management costs.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:107%'><span style='line-height:107%'>(c)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> The unspent balance.</p>
                        </td>
                      </tr>
                      <tr style='height:42.5pt'>
                        <td width='56' valign='bottom' style='padding:1.95pt 0in 0in 0in; height:42.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:14.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>9.2</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' style='padding:1.95pt 0in 0in 0in;height:42.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>The <i>Monthly Statement</i> will detail the total amount paid and payable by you for all services provided.</p>
                        </td>
                      </tr>
                      <tr style='height:48.95pt'>
                        <td width='56' valign='bottom' style='padding:1.95pt 0in 0in 0in; height:48.95pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:14.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>9.3</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='top' style='padding:1.95pt 0in 0in 0in; height:48.95pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>The <i>Monthly Statement</i> will also include an itemised list of all services and products received, along with the cost of each for the month.</p>
                        </td>
                      </tr>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:1.95pt 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>10</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 1.95pt 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>The Costs of Your Care</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:64.05pt'>
                        <td width='56' valign='bottom' style='padding:1.95pt 0in 0in 0in; height:64.05pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:28.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>10.1</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:1.95pt 0in 0in 0in; height:64.05pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.3pt;margin-left:0in;text-align:left;text-indent:0in; line-height:107%'>&nbsp;You may be required to pay a fee for our services. These may include:</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.9pt;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:107%'><span style='line-height:107%'>(a)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> A Basic Daily Fee.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:107%'><span style='line-height:107%'>(b)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> An Income Tested Care Fee.</p>
                        </td>
                      </tr>
                      <tr style='height:56.5pt'>
                        <td width='56' valign='bottom' style='padding:1.95pt 0in 0in 0in; height:56.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:28.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>10.2</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' style='padding:1.95pt 0in 0in 0in;height:56.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.7pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>All Fees and Charges must be paid by you on the dates and by the method as agreed in this <i>Agreement</i>, to the extent within your control. Our preferred method of payment is by credit card or direct debit into our nominated account.</p>
                        </td>
                      </tr>
                      <tr style='height:84.75pt'>
                        <td width='56' valign='bottom' style='padding:1.95pt 0in 0in 0in; height:84.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:56.85pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>10.3</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' style='padding:1.95pt 0in 0in 0in;height:84.75pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.3pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>Your income will be used to determine the amount you will be asked to contribute to your care. This is assessed and determined by Services Australia. If we do not have all the information required to work out the applicable fees by the start date of this Agreement, we will calculate an interim fee, which will be payable by you based on the information we have received.</p>
                        </td>
                      </tr>
                      <tr style='height:49.5pt'>
                        <td width='56' valign='top' style='padding:1.95pt 0in 0in 0in; height:49.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>10.4</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:1.95pt 0in 0in 0in; height:49.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.85pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>You will not be denied the services you need based on an inability to pay fees. If the fees could cause you hardship, we will support you to apply for Financial Hardship Assistance through Services Australia.</p>
                        </td>
                      </tr>
                      <tr style='height:77.5pt'>
                        <td width='56' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:1.95pt 0in 0in 0in;height:77.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>10.5</p>
                        </td>
                        <td width='550' valign='top' style='border:none;border-bottom: solid black 1.0pt;padding:1.95pt 0in 0in 0in;height:77.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:1.25pt; margin-left:2.0pt;text-indent:-2.0pt;line-height:110%'>We will notify you with a minimum of 30 days’ notice in writing regarding any increase in fees relating to the delivery of your home care package. We will:</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.65pt;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:107%'><span style='line-height:107%'>(a)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Explain what the charges are for and why prices are changing.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.9pt;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:107%'><span style='line-height:107%'>(b)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Explain what the new prices include and when they will start.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:107%'><span style='line-height:107%'>(c)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Ensure you understand all charges, price increases, or changes, and the</p>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:71.55pt'>impact these will have on your package funds and the provision of care and services.</p>
                    <p class='MsoNormal' align='left' style='margin-left:0in;text-align:left; text-indent:0in'><span style='font-family:'Calibri',sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> (d) &nbsp;&nbsp;&nbsp; Give reasonable notice in writing to vary this <i>Agreement</i> if required.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:42.55pt;text-indent:-42.55pt'>10.6 If you do not wish to disclose financial details to us, you may be required to pay the maximum fee.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:42.55pt;text-indent:-42.55pt'>10.7 We will provide, if requested, any additional services on a fee for service basis as agreed by you.</p>
                    <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'>&nbsp;</p>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='100%' style='margin-left:-1.5pt;border-collapse:collapse'>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>11</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>How Your Fees are Calculated</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:78.05pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:78.05pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>11.1</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 0in 0in; height:78.05pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:2.0pt;text-align:left;text-indent:-2.0pt; line-height:107%'>If payable, the Aged Care Act specifies the way the Basic Daily Fee and the Income Tested Care Fee are calculated, and these are detailed in this Agreement. The cost of your care is subsidised by the Australian Government depending on your level of need.</p>
                        </td>
                      </tr>
                      <tr style='height:56.5pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:56.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>11.2</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:56.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.55pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>The maximum amount we will ask you to pay under your home care package will depend on your income and unavoidable expenses such as pharmaceutical bills, rent, mortgage, utilities, and other living expenses.</p>
                        </td>
                      </tr>
                      <tr style='height:56.65pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:56.65pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:28.85pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>11.3</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:56.65pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.4pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>You will be required to pay the Basic Daily Fee (if applicable) and Income Tested Care Fee (where relevant) during any periods of leave (this does not include the Basic Daily Fee during transition care or residential respite care).</p>
                        </td>
                      </tr>
                      <tr style='height:70.65pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:70.65pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>11.4</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:70.65pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.45pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>If, after the start date of this Agreement, your circumstances change, and you are income tested as more able to contribute towards the payment of fees, then you agree to pay any Income Tested Care Fee which should have been paid from the date of your change in circumstances.</p>
                        </td>
                      </tr>
                      <tr style='height:77.5pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:77.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:42.85pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>11.5</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='top' style='padding:0in 0in 0in 0in; height:77.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.6pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>From time to time the fees we can charge will be changed according to the policy of the Australian Government. We will notify you if there is a change of policy that impacts on the fees we charge you, and any adjustment will take place over the next month.</p>
                        </td>
                      </tr>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>12</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Cancellations</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:56.8pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:56.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>12.1</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 0in 0in; height:56.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:2.0pt;text-align:left;text-indent:-2.0pt; line-height:107%'>We understand that sometimes circumstances change, and you may need to cancel or reschedule your services. We request that you provide us with as much notice as possible.</p>
                        </td>
                      </tr>
                      <tr style='height:49.5pt'>
                        <td width='56' valign='bottom' style='padding:0in 0in 0in 0in; height:49.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:28.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>12.2</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='top' style='padding:0in 0in 0in 0in; height:49.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.4pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>If your circumstances change suddenly, we ask that you provide notice at least 48 hours before your scheduled visit if you will not be available. If you provide less than 48 hours’ notice, then your scheduled services will still be charged in full.&nbsp;&nbsp;</p>
                        </td>
                      </tr>
                      <tr style='height:44.75pt'>
                        <td width='56' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 0in 0in 0in;height:44.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>12.3</p>
                        </td>
                        <td width='550' style='border:none;border-bottom:solid black 1.0pt; padding:0in 0in 0in 0in;height:44.75pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>If there are circumstances beyond your control, such as an emergency or a disaster, and you are not able to let us know that you need to cancel or reschedule services,</p>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: 1.6pt;margin-left:43.05pt'>then a cancellation fee will not be charged.</p>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='100%' style='margin-left:-1.5pt;border-collapse:collapse'>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>13</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Exiting our service</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:49.8pt'>
                        <td width='56' valign='bottom' style='padding:0in 0in 0in 0in; height:49.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:14.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>13.1</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 0in 0in; height:49.8pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>You may withdraw from this <i>Agreement</i> for any reason by providing us with at least two (2) weeks’ notice. &nbsp;</p>
                        </td>
                      </tr>
                      <tr style='height:42.5pt'>
                        <td width='56' valign='bottom' style='padding:0in 0in 0in 0in; height:42.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:14.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>13.2</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:42.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>Upon termination, we’ll send you a letter informing you of your rights to future service provision, and information regarding advocacy services if required.</p>
                        </td>
                      </tr>
                      <tr style='height:48.5pt'>
                        <td width='56' valign='bottom' style='padding:0in 0in 0in 0in; height:48.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:13.85pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>13.3</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='550' valign='top' style='padding:0in 0in 0in 0in; height:48.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:.35pt; margin-left:0in;text-indent:0in;line-height:107%'>We will also notify the Department of Health and Aged Care within 31 days of your</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:2.0pt;text-align:left;text-indent:0in; line-height:107%'>last service date.</p>
                        </td>
                      </tr>
                      <tr style='height:16.5pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 0in 0in; height:16.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>14</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 0in 0in;height:16.5pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Termination by us</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:278.6pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:278.6pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:8.75pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:2.0pt;line-height:107%'>&nbsp;</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>14.1</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 0in 0in; height:278.6pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.65pt;margin-bottom: .15pt;margin-left:2.0pt;text-indent:-2.0pt'>You can expect to receive support and services from us for as long as you wish. This right is recognised by the Aged Care Act. However, we may cease providing you with care if:&nbsp;</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:.25pt; margin-left:30.5pt;text-indent:-28.5pt;line-height:110%'><span style='line-height:110%'>(a)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> You can no longer be cared for in the community with the resources available via the Home Care Package program.</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:1.2pt; margin-left:30.5pt;text-indent:-28.5pt;line-height:110%'><span style='line-height:110%'>(b)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> You notify us, in writing, that you wish to relocate to an area outside of our current service area.</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:.9pt; margin-left:30.5pt;text-indent:-28.5pt;line-height:113%'><span style='line-height:113%'>(c)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> You notify us, in writing, that you no longer wish to receive your home care services.</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:.7pt; margin-left:30.5pt;text-indent:-28.5pt;line-height:107%'><span style='line-height:107%'>(d)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Your condition changes to the extent that you no longer need home care.</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:30.5pt;text-indent:-28.5pt;line-height:112%'><span style='line-height:112%'>(e)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Your needs, as assessed by an aged care assessment team or service, can be more appropriately met by other types of services or care.</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:30.5pt;text-indent:-28.5pt'><span style='line-height:111%'>(f)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> You have not paid (for a reason within your control) any home care fee specified in this Agreement and have not negotiated an alternative arrangement with us for payment.</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:30.5pt;text-indent:-28.5pt;line-height:107%'><span style='line-height:107%'>(g)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> You have intentionally caused serious injury to a COHS staff member or intentionally infringed on the right of a COHS staff member to work in a safe environment.</p>
                        </td>
                      </tr>
                      <tr style='height:42.5pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:42.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:14.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>14.2</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:42.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>Any termination of this <i>Agreement</i> by us will be undertaken in accordance with the Aged Care Act and law.</p>
                        </td>
                      </tr>
                      <tr style='height:70.5pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:70.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>14.3</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:70.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.35pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>If we do decide to terminate this <i>Agreement</i>, we will give you at least two (2) weeks’ notice. The notice will include the reasons for the decision and your rights about the decision, including access to complaint resolution mechanisms and an advocate if required.</p>
                        </td>
                      </tr>
                      <tr style='height:71.25pt'>
                        <td width='56' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 0in 0in 0in;height:71.25pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>14.4</p>
                        </td>
                        <td width='550' style='border:none;border-bottom:solid black 1.0pt; padding:0in 0in 0in 0in;height:71.25pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:2.05pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>If any of the above situations occur, we will ensure every effort is made to transfer you to a more appropriate service or program. We will ensure your current services remain in place until an appropriate service or program is sourced. We will work with you and the new service provider to ensure your transition is smooth with minimal</p>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:43.05pt'>disruption to your care needs.</p>
                    <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'>&nbsp;</p>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='100%' style='margin-left:-1.5pt;border-collapse:collapse'>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>15</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Unspent funds</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:49.8pt'>
                        <td width='56' valign='bottom' style='padding:0in 0in 0in 0in; height:49.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:14.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>15.1</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 0in 0in; height:49.8pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>Should this Agreement be terminated by you or us, any unspent funds will be discussed with you.&nbsp;</p>
                        </td>
                      </tr>
                      <tr style='height:56.5pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:56.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>15.2</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:56.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:2.05pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>Unspent subsidies must be returned to the Department of Health and Aged Care, unless you are transferring to another provider, in which case unspent subsidy amounts will be transferred to the new provider.&nbsp;</p>
                        </td>
                      </tr>
                      <tr style='height:56.5pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:56.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>15.3</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:56.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:2.2pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>Any unspent fees paid in advance for services not yet provided will be returned to you. If you are transferring to another provider, unspent fee amounts will also be transferred to the new provider.</p>
                        </td>
                      </tr>
                      <tr style='height:50.45pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:50.45pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:15.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>15.4</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:12.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='550' valign='top' style='padding:0in 0in 0in 0in; height:50.45pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:.6pt; margin-left:0in;text-indent:0in;line-height:107%'>We will notify you in writing of any unspent home care funds within 56 days of your</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:2.0pt;text-align:left;text-indent:0in; line-height:107%'>last service date.</p>
                        </td>
                      </tr>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>16</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Suspending your services</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:63.8pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:63.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>16.1</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 0in 0in; height:63.8pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.6pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>You may request a suspension of services for any reason and whenever required. If you request not to receive services for five (5) or more consecutive days, it will constitute a suspension of services.&nbsp;</p>
                        </td>
                      </tr>
                      <tr style='height:326.3pt'>
                        <td width='56' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 0in 0in 0in;height:326.3pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:28.85pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>16.2</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:28.85pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:127.65pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:14.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' style='border:none;border-bottom:solid black 1.0pt; padding:0in 0in 0in 0in;height:326.3pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.35pt;margin-bottom: 14.35pt;margin-left:2.0pt;text-indent:-2.0pt'>In such instances, we can, until it is determined otherwise pursuant to the Act or <i>User Rights Principles</i>, receive financial assistance in the form of subsidies and supplements in respect of your Home Care Package:</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:14.25pt;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:110%'><span style='line-height:110%'>(a)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> on each day of any period during which you attend hospital for the purpose of receiving hospital treatment:</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:2.85pt;margin-bottom: .1pt;margin-left:37.55pt;text-indent:-.75pt'>16.2.a.1 up to a maximum of 28 consecutive days – the amount mentioned in the Aged Care Determination for the level of care you are taken to have been provided with during the suspension of care and</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:22.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:2.9pt;margin-bottom: 15.1pt;margin-left:37.55pt;text-indent:-.75pt'>16.2.a.2 for a subsequent consecutive day – 25% of the amount mentioned in the Aged Care Determination for the level of care you are taken to have been provided with during the suspension of care (excluding all supplements other than the Viability Supplement and the Aged Care Workforce Supplement as the context requires)</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:14.95pt;margin-left:30.5pt;text-align:left;text-indent:-28.5pt; line-height:107%'><span style='line-height:107%'>(b)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> on each day of any period during which you are provided with respite care:</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.3pt;margin-bottom: 0in;margin-left:37.55pt;text-indent:0in;line-height:107%'>16.2.b.1 up to a maximum of 28 days in the financial year - the amount mentioned in the Aged Care Determination for the level of care you are taken to have been provided with during the suspension of care and&nbsp;</p>
                        </td>
                      </tr>
                    </table>
                  </div><span style='font-size:11.0pt;line-height:111%;font-family:'Arial',sans-serif; color:black'><br style='clear: both;page-break-before:always' /></span>
                  <div class='WordSection2'>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:144.1pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:143.85pt'>16.2.b.2 after 28 cumulative days – 25% of the amount mentioned in the Aged Care Determination for the level of care you are taken to have been provided with during the suspension of care (excluding all supplements other than the Viability Supplement or the Aged Care Workforce Supplement as the context requires)</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:137.05pt;text-indent:-28.5pt'><span style='line-height:111%'>(c)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> for an additional 28 days in the financial year for reasons other than (a) and (b) above and</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:137.05pt;text-indent:-28.5pt'><span style='line-height:111%'>(d)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> following an In-Patient Hospital Episode, where you have taken Transition Care leave as is necessary to ensure that your further Transition Care needs are met:</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:143.85pt'>16.2.d.1 up to a maximum of 28 consecutive days – the amount mentioned in the Aged Care Determination for the level of care you are taken to have been provided with during the suspension of care and</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:143.35pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:144.6pt'>16.2.d.2 for a subsequent consecutive day – 25% of the amount mentioned in the Aged Care Determination for the level of care you are taken to have been provided with during the suspension of care (excluding all supplements other than the Viability Supplement or the Aged Care Workforce Supplement as the context requires).</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:105.85pt;text-indent:-40.55pt'><i><span style='line-height: 111%'>16.3<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></i> During a suspension of services (other than when it is in connection with Transition Care or Respite Care) you agree to continue to pay our Fees in accordance with this <i>Agreement.</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:105.85pt;text-indent:-40.55pt'><i><span style='line-height: 111%'>16.4<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></i> Where, with your consent, another consumer temporarily uses the Home Care Package otherwise allocated to you during a suspension of services, we will reduce any Fees payable by you to reflect the additional income we receive.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:105.85pt;text-indent:-40.55pt'><i><span style='line-height: 111%'>16.5<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></i> Any suspension of services for periods beyond those set out above are considered leave and may be agreed at the relevant time, the terms of which are subject to our discretion.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='100%' style='margin-left:64.55pt;border-collapse:collapse'>
                      <tr style='height:16.55pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 2.0pt 0in; height:16.55pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>17</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 2.0pt 0in;height:16.55pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Equipment</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:66.55pt'>
                        <td width='56' valign='top' style='padding:0in 0in 2.0pt 0in; height:66.55pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:8.75pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:2.0pt;line-height:107%'>&nbsp;</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>17.1</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 2.0pt 0in; height:66.55pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.4pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>As part of your individual <i>Care Plan</i>, you may need certain equipment provided to you, which we may do by way of hire or lease arrangements. Alternatively, we may purchase the equipment on your behalf.</p>
                        </td>
                      </tr>
                      <tr style='height:58.95pt'>
                        <td width='56' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 0in 2.0pt 0in;height:58.95pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>17.2</p>
                        </td>
                        <td width='550' style='border:none;border-bottom:solid black 1.0pt; padding:0in 0in 2.0pt 0in;height:58.95pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.35pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:-2.0pt;line-height:107%'>If we purchase the equipment on your behalf, you may be required to pay a nonrefundable contribution for the difference between any funding provided for your Home Care Package and the full cost of the equipment purchased. We will retain</p>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:109.05pt'>ownership of the equipment purchased on your behalf when you cease your Home Care Package unless you have contributed more than 50 per cent of the total cost of the equipment purchased.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:131.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:107.85pt;text-indent:-42.55pt'>17.3 You agree to be responsible for any loss, damage, costs of repairs and/or replacement of equipment we provide under this Agreement, where that equipment is damaged by:</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:137.05pt;text-indent:-28.5pt'><span style='line-height:111%'>(a)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Any person, other than a COHS staff member while carrying out the services to you.</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:137.05pt;text-indent:-28.5pt'><span style='line-height:111%'>(b)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Any other cause (other than by a COHS staff member).</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:105.85pt;text-indent:-40.55pt'><span style='line-height:111%'>17.4<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> You agree to indemnify us against any claim arising because of injury to any person (other than a COHS staff member) caused by the misuse or negligent use of the equipment, while the equipment is in your residence or on the land upon which it is situated.&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:105.85pt;text-indent:-40.55pt'><span style='line-height:111%'>17.5<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> In this clause, claim includes any claim, action, proceeding, demand, liability, obligation, cost, loss, damages, or expense.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:20.75pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' align='left' width='100%' style='border-collapse:collapse;margin-left:-2.25pt; margin-right:-2.25pt'>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>18</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Workplace Health and Safety</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:49.8pt'>
                        <td width='56' valign='bottom' style='padding:0in 0in 0in 0in; height:49.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:14.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>18.1</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 0in 0in; height:49.8pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:2.0pt;text-indent:0in;line-height:107%'>You understand that your residence and the land upon which it is situated will be a workplace for COHS staff.</p>
                        </td>
                      </tr>
                      <tr style='height:84.8pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:84.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>18.2</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:84.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:2.0pt;text-align:left;text-indent:0in; line-height:107%'>You agree to be responsible:</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:.25pt; margin-left:30.5pt;text-indent:-28.5pt;line-height:110%'><span style='line-height:110%'>(a)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> For ensuring we are made aware in advance of any risks associated with COHS staff being at your residence.</p>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:30.5pt;text-indent:-28.5pt;line-height:107%'><span style='line-height:107%'>(b)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> For taking steps to ensure that any risks are rectified and addressed at your own cost.</p>
                        </td>
                      </tr>
                      <tr style='height:42.5pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:42.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:14.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>18.3</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:42.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:2.0pt;text-indent:0in;line-height:107%'>You agree to allow us, upon giving reasonable notice, to conduct an inspection of your residence and land to assess the risks of providing services.</p>
                        </td>
                      </tr>
                      <tr style='height:49.4pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:49.4pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>18.4</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 0in 0in; height:49.4pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.8pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:107%'>We may at any time suspend the provision of our services to you while a risk referred to under this clause remains unrectified. We will recommence the services once the risk has been addressed to our reasonable satisfaction.</p>
                        </td>
                      </tr>
                      <tr style='height:114.15pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:114.15pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:86.15pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>18.5</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:12.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='550' valign='top' style='padding:0in 0in 0in 0in; height:114.15pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.55pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:107%'>While we acknowledge and respect your privacy, you acknowledge that there may be occasions where we or a COHS staff member considers it necessary to enter your residence and land or take other action for your wellbeing and safety (such as contacting the police, an ambulance, or your representative), without your express consent or the consent of your representative. You hereby provide your consent for us or COHS staff to take such action in circumstances where we reasonably believe that an emergency exists.</p>
                        </td>
                      </tr>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='color:white'>19</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Providing Information to other Approved Providers</span></b> <b><span style='color:white'>&nbsp;</span></b></p>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' align='right' style='margin-top:0in;margin-right:2.6pt; margin-bottom:244.2pt;margin-left:-6.0pt;text-align:right;text-indent:0in; line-height:107%'></p>
                    <table cellpadding='0' cellspacing='0'>
                      <tr>
                        <td width='94' height='0'></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><img width='100%' height='1' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAl4AAAABAQMAAAA1qDLOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAADUExURQAAAKd6PdoAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAANSURBVBjTY6AeYGAAAABNAAHXpX0BAAAAAElFTkSuQmCC' alt='image'></td>
                      </tr>
                    </table><br clear='all'>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:107.85pt;text-indent:-42.55pt'><span style='line-height:111%'>19.1<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> If you move to our service from another Aged Care provider, we may obtain personal information about you from your previous Aged Care provider.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:107.85pt;text-indent:-42.55pt'><span style='line-height:111%'>19.2<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> If you move from our service to another Aged Care provider, we may transfer your personal information to your new Aged Care provider. We will be limited by the Act as to what information we can provide a new Aged Care provider.&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:107.85pt;text-indent:-42.55pt'><span style='line-height:111%'>19.3<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Under this <i>Agreement</i> you authorise us to provide or obtain the personal information as referred to in this clause.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:392.85pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><span style='color:white'>&nbsp;</span></p>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' align='left' width='100%' style='border-collapse:collapse;margin-left:-2.25pt; margin-right:-2.25pt'>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:.3pt 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>20</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: .3pt 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Assignment</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:102.75pt'>
                        <td width='56' valign='top' style='padding:.3pt 0in 0in 0in; height:102.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:8.5pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:2.0pt;line-height:107%'>&nbsp;</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b>&nbsp;</b></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>20.1</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:.3pt 0in 0in 0in; height:102.75pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.95pt;margin-bottom: .85pt;margin-left:2.0pt;text-indent:0in'>Your rights and obligations under this <i>Agreement</i> cannot be transferred or assigned to another person. We may transfer or assign our rights and obligations under this <i>Agreement</i> to a purchaser or transferee at any time, but we must still comply with any obligations under the Act or law, including any obligations to provide you with sufficient notice.</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:24.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:12.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                      </tr>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:.3pt 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>21</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: .3pt 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Costs, Stamp Duty</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:35.8pt'>
                        <td width='56' valign='bottom' style='padding:.3pt 0in 0in 0in; height:35.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><i>21.1</i></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:.3pt 0in 0in 0in; height:35.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:2.0pt;text-align:left;text-indent:0in; line-height:107%'>You and COHS will each pay our own costs of any incidentals to this <i>Agreement.</i></p>
                        </td>
                      </tr>
                      <tr style='height:34.2pt'>
                        <td width='56' valign='bottom' style='padding:.3pt 0in 0in 0in; height:34.2pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>21.2</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='550' valign='top' style='padding:.3pt 0in 0in 0in; height:34.2pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:2.0pt;text-align:left;text-indent:0in; line-height:107%'>All stamp duty (if any) payable on this <i>Agreement</i> will be paid by you.</p>
                        </td>
                      </tr>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:.3pt 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>22</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: .3pt 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Power of Attorney</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:132.25pt'>
                        <td width='56' valign='top' style='padding:.3pt 0in 0in 0in; height:132.25pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:43.85pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>22.1</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:12.0pt;line-height:107%'>&nbsp;</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:12.0pt;line-height:107%'>&nbsp;</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:12.0pt;line-height:107%'>&nbsp;</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:12.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='550' valign='top' style='padding:.3pt 0in 0in 0in; height:132.25pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.6pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:107%'>Where this <i>Agreement</i> is executed by a person as attorney or agent for you, that person confirms that they have the authority to sign and will deliver to us at the time you deliver the signed <i>Agreement</i>, a copy of the power of attorney or appointment of agent evidencing this authority.</p>
                        </td>
                      </tr>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:.3pt 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>23</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: .3pt 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Variation</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:80.7pt'>
                        <td width='56' valign='bottom' style='padding:.3pt 0in 0in 0in; height:80.7pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:8.5pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:2.0pt;line-height:107%'>&nbsp;</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:42.85pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>23.1</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:.3pt 0in 0in 0in; height:80.7pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.6pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:107%'>This <i>Agreement</i> may be varied by mutual consent provided we have given you reasonable notice in writing of the proposed variation and following adequate consultation between you and us. However, it must not be varied in a way that is inconsistent with the Act or law.</p>
                        </td>
                      </tr>
                      <tr style='height:36.35pt'>
                        <td width='56' valign='bottom' style='padding:.3pt 0in 0in 0in; height:36.35pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.1pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>23.2</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:12.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='550' valign='top' style='padding:.3pt 0in 0in 0in; height:36.35pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:2.0pt;text-align:left;text-indent:0in; line-height:107%'>Any variation must be in writing and signed by all parties to this <i>Agreement</i>.</p>
                        </td>
                      </tr>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:.3pt 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>24</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: .3pt 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>If Problems Arise</span></b></p>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:107.85pt;text-indent:-42.55pt'><span style='line-height:111%'>24.1<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> You are entitled to make any genuine complaints about the provision of Home Care services without fear of retribution.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:107.85pt;text-indent:-42.55pt'><span style='line-height:111%'>24.2<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> If you are dissatisfied with anything that occurs with your Home Care services, please tell us so that we can address the issue. We will use all reasonable efforts to resolve any dissatisfaction between you and us in accordance with our internal feedback, compliments, and complaints processes.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:107.85pt;text-indent:-42.55pt'><span style='line-height:111%'>24.3<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> If we cannot satisfactorily resolve any dispute, you may use the escalation processes set out in our <i>Consumer Handbook</i>.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:12.0pt;line-height:107%'>&nbsp;</span></p>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='100%' style='margin-left:64.55pt;border-collapse:collapse'>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>25</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>GST</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:114.3pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:114.3pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:71.85pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>25.1</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:12.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:114.3pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.65pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:107%'>If any supply made by us under this <i>Agreement</i> or any variation to it is a taxable supply for the purposes of the <i>A New Tax System (Goods and Services Tax) Act 1999 (Cth)</i>, then in addition to any amount of Fees and Charges payable to us under this <i>Agreement</i>, we are entitled to recover from you an additional amount on account of GST. The amount of our GST liability in respect of each supply will be recoverable at the same time as the Fees and Charges payable for that supply.</p>
                        </td>
                      </tr>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>26</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Guarantee and Indemnity</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:76.8pt'>
                        <td width='56' valign='bottom' style='padding:0in 0in 0in 0in; height:76.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:42.85pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>26.1</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 0in 0in; height:76.8pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.9pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:107%'>If we ask that you provide somebody to guarantee your obligations under this <i>Agreement</i>, or you indicate to us that someone will be responsible for your obligations under this <i>Agreement,</i> then you agree to provide this guarantee before commencement of your Home Care Package services.</p>
                        </td>
                      </tr>
                      <tr style='height:97.0pt'>
                        <td width='56' valign='bottom' style='padding:0in 0in 0in 0in; height:97.0pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:61.85pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>26.2</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:12.0pt;line-height:107%;color:white'>&nbsp;</span></p>
                        </td>
                        <td width='550' valign='top' style='padding:0in 0in 0in 0in; height:97.0pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:2.15pt;margin-bottom: 5.9pt;margin-left:2.0pt;text-indent:0in'>If we require a guarantee, we will provide you with a form of guarantee which will do no more than guarantee the punctual payment of any outstanding amounts under the <i>Agreement</i> and indemnity from any loss we suffer.&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:24.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                      </tr>
                      <tr style='height:16.75pt'>
                        <td width='56' valign='top' style='background:#7030A0;padding:0in 0in 0in 0in; height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>27</span></b></p>
                        </td>
                        <td width='550' valign='top' style='background:#7030A0;padding: 0in 0in 0in 0in;height:16.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:13.0pt;line-height:107%; color:white'>Privacy</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:92.05pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:92.05pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>27.1</p>
                        </td>
                        <td width='550' valign='bottom' style='padding:0in 0in 0in 0in; height:92.05pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:1.35pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:107%'>We are committed to the National Privacy Principles contained in the <i>Privacy Act 1988 (Cth)</i>. We may collect, use, and disclose various Personal Information about you for the purposes of providing services to you, including the fulfilment of any legal and regulatory requirements, and providing you with information about us and the services that we offer.&nbsp;</p>
                        </td>
                      </tr>
                      <tr style='height:56.5pt'>
                        <td width='56' valign='top' style='padding:0in 0in 0in 0in; height:56.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>27.2</p>
                        </td>
                        <td width='550' style='padding:0in 0in 0in 0in;height:56.5pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:2.1pt;margin-bottom: 0in;margin-left:2.0pt;text-indent:0in;line-height:107%'>We may disclose Personal Information about you to your nominated next of kin in an emergency, or our related entities and affiliated organisations and service providers, who assist us in operating our business.&nbsp;</p>
                        </td>
                      </tr>
                      <tr style='height:21.45pt'>
                        <td width='56' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 0in 0in 0in;height:21.45pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>27.3</p>
                        </td>
                        <td width='550' valign='bottom' style='border:none;border-bottom: solid black 1.0pt;padding:0in 0in 0in 0in;height:21.45pt'>
                          <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:2.0pt;text-indent:0in;line-height:107%'>Also, if we provide you with in-home care, we may leave your record of treatment,</p>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:109.05pt'>which includes Personal Information, at your home. You acknowledge that you will keep the record safe and secure and that you will inform us if any event or threatened event jeopardises the safety and security of this record.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:107.85pt;text-indent:-42.55pt'><i>27.4</i> We will always take reasonable steps to ensure the confidentiality and privacy of Personal Information provided to us by you, your Representative, or relatives, and that it is managed and used according to law and this <i>Agreement.</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><b><i>&nbsp;</i></b></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.7pt;margin-left:65.8pt;text-align:left;line-height:108%'><i>At COHS we are committed to providing quality services and respecting your rights. Your right to privacy and confidentiality is recognised, respected, and protected in all aspects of your contact with us. We take privacy very seriously at COHS and respect the information we receive.&nbsp;&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.7pt;margin-left:65.8pt;text-align:left;line-height:108%'><i>We never provide information to another party unless we have obtained your consent to do so and provided you with reason as to why it is required. We may also be required to share information in cases of emergency, which includes any situation which poses a serious threat to life or health of any person, or if we are required by law, for example mandatory child protection reporting or concerns. For your information, please refer to the COHS Privacy Statement which is included in your welcome pack.&nbsp;&nbsp;</i></p>
                    <h1 style='margin-left:65.8pt'>Consent&nbsp;</h1>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:2.25pt; margin-bottom:7.65pt;margin-left:65.8pt;text-align:left;line-height:108%'>COHS will work closely with other agencies to coordinate the best support for the Aged Care Consumer. This means your informed consent for the sharing of information will be sought and respected in all situations unless:&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.65pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.7pt;margin-left:101.6pt;text-align:left;text-indent:-21.3pt; line-height:108%'><span style='font-size:10.0pt;line-height:108%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> <i>COHS is obliged by law to disclose the Aged Care Consumer’s information regardless of consent or otherwise.&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.15pt;margin-left:101.6pt;text-align:left;text-indent:-21.3pt; line-height:107%'><span style='font-size:10.0pt;line-height:107%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> <i>It is unreasonable or impracticable to gain consent or consent has been refused.&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.7pt;margin-left:101.6pt;text-align:left;text-indent:-21.3pt; line-height:108%'><span style='font-size:10.0pt;line-height:108%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> <i>The disclosure is reasonably necessary to prevent or lessen a serious threat to the life, health or safety of a person or group of people.&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:48.15pt; margin-bottom:1.95pt;margin-left:65.8pt;text-align:left;line-height:167%'><b><i>Aged Care Consumer / Aged Care Consumer’s Representative Consent</i></b><i>&nbsp; I, the Consumer hereby acknowledges that COHS has advised me of the following:&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.75pt;margin-left:101.6pt;text-align:left;text-indent:-21.3pt; line-height:107%'><span style='font-size:10.0pt;line-height:107%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> <i>COHS’s Privacy and Confidentiality Policy and Procedure.&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.7pt;margin-left:101.6pt;text-align:left;text-indent:-21.3pt; line-height:108%'><span style='font-size:10.0pt;line-height:108%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> <i>My right to access my personal information.&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:32.85pt;margin-left:101.6pt;text-align:left;text-indent:-21.3pt; line-height:108%'><span style='font-size:10.0pt;line-height:108%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> <i>My right to withdraw my consent at any time.&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:3.8pt;margin-left:65.8pt;text-align:left;line-height:139%'><i><span style='font-size:28.0pt;line-height:139%'><input type='checkbox' id='' name='' value=''></span> <b>I understand</b> that the following service(s) are recommended and relevant information about me may be forwarded to the agency(s) that provides these services, in order that I receive the best possible service:&nbsp;&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.7pt;margin-left:101.6pt;text-align:left;text-indent:-21.3pt; line-height:108%'><span style='font-size:10.0pt;line-height:108%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> <i>Third parties who provide supports as agreed with Consumer.&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:34.7pt;margin-left:65.8pt;text-align:left;line-height:108%'><b><i>I understand</i></b> <i>that COHS may need to collaborate with other providers, including health care and allied health providers, to share my information, manage risks to me, and meet my needs.&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:26.45pt;margin-left:65.8pt;text-align:left;line-height:173%'><i><span style='font-size:28.0pt;line-height:173%'><input type='checkbox' id='' name='' value=''></span> <b>I understand</b> that COHS must comply with relevant privacy laws, and I will contact the organisation immediately if I feel that these laws have been breached.&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:26.45pt;margin-left:65.8pt;text-align:left;line-height:173%'><i><span style='font-size:28.0pt;line-height:173%'><input type='checkbox' id='' name='' value=''></span> COHS has discussed with me how and why certain information about me may need to be provided to other service providers.&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:0in;margin-left:65.8pt;text-align:left;line-height:173%'><i><span style='font-size:28.0pt;line-height:173%'><input type='checkbox' id='' name='' value=''></span> <b>I understand</b> the recommendations and I give my permission for the information to be shared with the people or agencies as detailed above.&nbsp;</i></p>
                    <h1 style='margin-top:0in;margin-right:0in;margin-bottom:34.5pt;margin-left: 65.8pt'>OR<span style='font-weight:normal'>&nbsp;</span></h1>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:0in;margin-left:65.8pt;text-align:left;line-height:173%'><i><span style='font-size:28.0pt;line-height:173%'><input type='checkbox' id='' name='' value=''></span> <b>I do not give my consent</b> for COHS to collect and disclose my personal information to any third parties.&nbsp;</i></p>
                    <h1 style='margin-left:65.8pt'>Photos and Videos&nbsp;</h1>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:2.25pt; margin-bottom:7.65pt;margin-left:65.8pt;text-align:left;line-height:108%'></p>
                    <table cellpadding='0' cellspacing='0'>
                      <tr>
                        <td width='94' height='0'></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><img width='100%' height='1' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAl4AAAABAQMAAAA1qDLOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAADUExURQAAAKd6PdoAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAANSURBVBjTY6AeYGAAAABNAAHXpX0BAAAAAElFTkSuQmCC' alt='image'></td>
                      </tr>
                    </table><br clear='all'>
                    Photos, videos, and other recordings are a form of personal information. COHS staff will respect people’s choices about being photographed or videoed and ensure images of people are used appropriately. This includes being aware of cultural sensitivities and the need for some images to be treated with special care.&nbsp;&nbsp;&nbsp;
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:2.25pt; margin-bottom:7.65pt;margin-left:65.8pt;text-align:left;line-height:108%'>COHS may use your photos or videos to share in newsletters, or on our noticeboards, website and social media platforms. It is your choice to give permission for COHS to take and use images and video footage of you. You can change your permission at any time by contacting COHS.&nbsp;&nbsp;&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.45pt;margin-left:65.8pt;text-align:left;line-height:110%'><b><i>Please circle:&nbsp;</i></b></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.7pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 108%'><span style='font-family:'Calibri',sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style='font-size:10.0pt;line-height:108%;font-family:'Segoe UI Symbol',sans-serif'>•</span> <span style='font-size:10.0pt;line-height:108%'>&nbsp;&nbsp;&nbsp;</span> <b><i>I consent</i></b> <i>to my photographs, videos and/or recordings being taken by COHS&nbsp;</i></p>
                    <h1 style='margin-left:65.8pt'>OR<span style='font-weight:normal'>&nbsp;</span></h1>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.7pt;margin-left:102.05pt;text-align:left;text-indent:-.25in; line-height:108%'><span style='font-size:10.0pt;line-height:108%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> <b><i>I do not</i></b> <i>consent to my photographs, videos and/or recordings being taken by COHS.&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.75pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.7pt;margin-left:102.05pt;text-align:left;text-indent:-.25in; line-height:108%'><span style='font-size:10.0pt;line-height:108%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> <b><i>I consent</i></b> <i>to my photographs, videos and/or recordings being taken and published by COHS and external stakeholders as described above.&nbsp;</i></p>
                    <h1 style='margin-left:65.8pt'>OR<span style='font-weight:normal'>&nbsp;</span></h1>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.7pt;margin-left:102.05pt;text-align:left;text-indent:-.25in; line-height:108%'><span style='font-size:10.0pt;line-height:108%;font-family: 'Segoe UI Symbol',sans-serif'>•</span> <span style='font-size:10.0pt;line-height: 108%'>&nbsp;&nbsp;&nbsp;</span> <b><i>I do not</i></b> <i>consent to my photographs, videos and/or recordings being published by COHS.&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.85pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;<b>&nbsp;</b></i></p>
                    <h1 style='margin-left:65.8pt'>Aged Care Compliance Audits</h1>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:65.8pt'>COHS complies with the requirements of the Aged Care Home Package program and Aged</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:2.25pt; margin-bottom:.5pt;margin-left:65.8pt;text-align:left;line-height:108%'>Care Quality Standards, Aged Care Act 1997, Aged Care Aged Care Quality and Safey Commission Rules 2018 and Quality of Care Principles 2014 whereby consumers are automatically included in audits against the Aged Care Quality Standards.&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:65.8pt'>Consumers may be contacted at any time by an Aged Care Approved Quality Auditor for an interview, or for their personal records and plans to be reviewed.&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:65.8pt'>Consumers can choose to opt-out of the AGED CARE Audit process. COHS will notify its Approved Quality Auditor of Consumers who have opted-out.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:65.8pt'>I, the Consumer, hereby acknowledge that COHS has advised me of the potential for me to be contacted as part of the business’ AGED CARE audit.&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.9pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.7pt;margin-left:83.35pt;text-align:left;text-indent:-18.05pt; line-height:108%'><input type='checkbox' id='' name='' value=''> <i>I consent to be contacted by an AGED CARE Approved Quality Auditor for an interview as part of COHS’s future AGED CARE audits.</i></p>
                    <h1 style='margin-top:0in;margin-right:0in;margin-bottom:8.85pt;margin-left: 65.8pt'>OR</h1>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.7pt;margin-left:83.35pt;text-align:left;text-indent:-18.05pt; line-height:108%'><input type='checkbox' id='' name='' value=''> <i>I <b>do not consent</b> to be contacted by a AGED CARE Approved Quality Auditor for an interview as part of COHS’s future AGED CARE audits.</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:9.15pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.7pt;margin-left:83.35pt;text-align:left;text-indent:-18.05pt; line-height:108%'><input type='checkbox' id='' name='' value=''> <i>I understand that I can change my decision regarding AGED CARE Audits at any time by contacting COHS.</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <h1 style='margin-left:65.8pt'>Signatures</h1>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:8.8pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:8.8pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 108%'><span style='font-family:'Calibri',sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <i>_______________________ &nbsp;&nbsp;&nbsp; _______________________ &nbsp;&nbsp;&nbsp;&nbsp; _______________________</i></p>
                    <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:108%'><span style='font-family:'Calibri',sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <i>Name of Consumer or &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Signature &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:138.85pt; margin-bottom:8.75pt;margin-left:379.7pt;text-align:left;text-indent:-308.15pt; line-height:108%'><i>Authorised Representative&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:8.9pt;margin-left:71.55pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:8.8pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 108%'><span style='font-family:'Calibri',sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <i>_______________________ &nbsp;&nbsp;&nbsp; _______________________ &nbsp;&nbsp;&nbsp;&nbsp; _______________________</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:74.75pt; margin-bottom:7.7pt;margin-left:72.05pt;text-align:left;line-height:108%'><i>Name of COHS Staff Signature &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date Member</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><b><i>&nbsp;</i></b></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.45pt;margin-left:65.8pt;text-align:left;line-height:110%'><b><i>Staff Use Only</i></b></p>
                    <h1 style='margin-left:65.8pt'>Verbal Consent</h1>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .1in;margin-left:65.8pt'>Verbal consent should only be used where it is not practicable to obtain written consent.&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:2.25pt; margin-bottom:7.65pt;margin-left:65.8pt;text-align:left;line-height:108%'>I have discussed the proposed referrals with the Consumer or authorised representative and I am satisfied that they understand the proposed uses and disclosures and have provided their informed consent to these.&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:8.55pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:8.8pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 108%'><span style='font-family:'Calibri',sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <i>_______________________ &nbsp;&nbsp;&nbsp; _______________________ &nbsp;&nbsp;&nbsp;&nbsp; _______________________</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.7pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 108%'><span style='font-family:'Calibri',sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <i>Name of COHS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Signature &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:7.7pt;margin-left:72.05pt;text-align:left;line-height:108%'><i>Staff Member</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.85pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:7.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:8.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i>&nbsp;</i></p>
                    <h1 style='margin-top:0in;margin-right:0in;margin-bottom:2.35pt;margin-left: 65.8pt;line-height:107%;background:#7030A0'><span style='font-size:12.0pt; line-height:107%;color:white;font-style:normal'>Execution</span></h1>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:14.0pt;line-height:107%'>&nbsp;</span></b></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.15pt;margin-left:65.8pt;text-align:left;line-height:107%'><b>Executed as an Agreement</b></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><b>&nbsp;</b></p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:65.8pt'><b>Executed by:</b> COHS. PTY LTD</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:65.8pt'><b>ABN:</b> 13 664 313 624</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.15pt;margin-left:65.8pt;text-align:left;line-height:107%'><b>By:&nbsp;</b></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='100%' style='margin-left:64.55pt;border-collapse:collapse'>
                      <tr style='height:58.25pt'>
                        <td width='386' valign='top' style='border-top:solid black 1.0pt; border-left:none;border-bottom:solid black 1.0pt;border-right:none; padding:2.5pt 5.75pt 0in 0in;height:58.25pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.95pt;margin-left:0in;text-align:left;text-indent:0in; line-height:107%'>COHS Representative Signature &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                        </td>
                        <td width='220' valign='top' style='border-top:solid black 1.0pt; border-left:none;border-bottom:solid black 1.0pt;border-right:none; padding:2.5pt 5.75pt 0in 0in;height:58.25pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'>Date</p>
                        </td>
                      </tr>
                      <tr style='height:14.5pt'>
                        <td width='386' valign='top' style='border:none;border-bottom: solid black 1.0pt;padding:2.5pt 5.75pt 0in 0in;height:14.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:1.5pt;text-align:left;text-indent:0in; line-height:107%'>Full Name of COHS Representative</p>
                        </td>
                        <td width='220' valign='top' style='border:none;border-bottom: solid black 1.0pt;padding:2.5pt 5.75pt 0in 0in;height:14.5pt'>
                          <select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.15pt;margin-left:65.8pt;text-align:left;line-height:107%'><b>Executed by Consumer (or Representative):</b></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:2.25pt;margin-left:64.55pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-family:'Calibri',sans-serif'><img width='100%' height='1' id='Group40785' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAl4AAAABAQMAAAA1qDLOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAADUExURQAAAKd6PdoAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAANSURBVBjTY6AeYGAAAABNAAHXpX0BAAAAAElFTkSuQmCC' alt='image'></span></p>
                    <p class='MsoNormal' align='left' style='margin-left:0in;text-align:left; text-indent:0in'><span style='font-family:'Calibri',sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Consumer/Representative Signature&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:2.25pt;margin-left:64.55pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-family:'Calibri',sans-serif'><img width='100%' height='1' id='Group40786' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAl4AAAABAQMAAAA1qDLOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAADUExURQAAAKd6PdoAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAANSURBVBjTY6AeYGAAAABNAAHXpX0BAAAAAElFTkSuQmCC' alt='image'></span></p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:65.8pt'>Consumer/Representative Full Name</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:65.8pt'>[Insert Witness or Guarantor if applicable]</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp; &nbsp;<br style='clear: both;page-break-before:always' /></p>
                    <h1 style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:65.8pt; line-height:107%;background:#7030A0'><span style='font-size:12.0pt;line-height: 107%;color:white;font-style:normal'>Annexure 1 – Acknowledgement</span></h1>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:65.8pt'>It is strongly recommended that all persons signing this <i>Agreement</i> obtain independent legal and financial advice. This <i>Agreement</i> is a legally binding document.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.85pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.0pt;line-height:107%'>&nbsp;</span></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.15pt;margin-left:65.8pt;text-align:left;line-height:107%'><b>Acknowledgement by the Consumer/Representative/Guarantor (as applicable)</b></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:65.8pt'>I acknowledge that:</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.85pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.0pt;line-height:107%'>&nbsp;</span></p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:92.35pt;text-indent:-27.05pt'><span style='line-height:111%'>1.<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> I am advised to seek and obtain independent legal advice on the nature and effect of this <i>Agreement</i> before signing the document and have had the opportunity to do so.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:2.55pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.0pt;line-height:107%'>&nbsp;</span></p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: 1.5pt;margin-left:92.35pt;text-indent:-27.05pt'><span style='line-height:111%'>2.<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> I have:</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:101.45pt;text-indent:14.25pt'><span style='line-height:111%'>(a)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> obtained independent legal advice* or</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:101.45pt;text-indent:14.25pt'><span style='line-height:111%'>(b)<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> chosen not to take independent legal advice* on the nature and effect of the Agreement and any indemnity contained in the Agreement.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:.5pt; margin-bottom:0in;margin-left:94.8pt;text-align:left;line-height:108%'><i>* Delete whichever is not applicable.</i></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:2.8pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><i><span style='font-size:10.0pt;line-height:107%'>&nbsp;</span></i></p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: 14.75pt;margin-left:92.35pt;text-indent:-27.05pt'><span style='line-height: 111%'>3.<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> I have read and understand the nature and effect of this Agreement.</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:92.35pt;text-indent:-27.05pt'><span style='line-height:111%'>4.<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> I have executed this Agreement freely and voluntarily and without any influence from COHS.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.15pt;margin-left:65.8pt;text-align:left;line-height:107%'><b>Signed by the Consumer</b></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.2pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:10.5pt;line-height:107%'>&nbsp;</span></b></p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:65.8pt'>Signed:</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.7pt;margin-left:64.55pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-family:'Calibri',sans-serif'><img width='100%' height='1' id='Group43651' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAl4AAAABAQMAAAA1qDLOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAADUExURQAAAKd6PdoAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAANSURBVBjTY6AeYGAAAABNAAHXpX0BAAAAAElFTkSuQmCC' alt='image'></span></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:2.55pt;margin-left:0in;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.0pt;line-height:107%'>&nbsp;</span></p>
                    <p class='MsoNormal' align='left' style='margin-left:0in;text-align:left; text-indent:0in'><span style='font-family:'Calibri',sans-serif'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date:</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:2.25pt;margin-left:64.55pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-family:'Calibri',sans-serif'><img width='100%' height='1' id='Group43652' src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAl4AAAABAQMAAAA1qDLOAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAADUExURQAAAKd6PdoAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAANSURBVBjTY6AeYGAAAABNAAHXpX0BAAAAAElFTkSuQmCC' alt='image'></span></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:2.1pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <div style='border:solid black 1.0pt;padding:0in 0in 0in 0in;background:#F2F2F2; margin-left:66.05pt;margin-right:5.95pt'>
                      <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:1.5pt; margin-left:.5pt;background:#F2F2F2;border:none;padding:0in'>If you do not sign this document, we will note your decision on your consumer record. This note will include details of what you, your Representative, and we have discussed and agreed to with regards to your care and services. This will be considered a verbal agreement to the terms outlined.</p>
                    </div>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='605' style='margin-left:64.55pt;border-collapse:collapse'>
                      <tr style='height:15.5pt'>
                        <td width='605' valign='top' style='background:#7030A0;padding: 2.25pt 5.75pt 0in 1.5pt;height:15.5pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:12.0pt;line-height:107%; color:white'>Annexure 2 – Fees</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:14.0pt'>
                        <td width='605' valign='top' style='border:none;border-bottom: solid black 1.0pt;background:#CCCCFF;padding:2.25pt 5.75pt 0in 1.5pt; height:14.0pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><i>Definitions</i></b></p>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:10.0pt;margin-bottom: .2pt;margin-left:65.8pt'>COHS can ask consumers to pay up to three (3) types of fees as part of their Home Care Package individualised budget. These must be recorded in <i>Home Care Agreements</i> and listed in monthly statements:</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:10.45pt;margin-bottom: .2pt;margin-left:65.8pt'><b>Basic Daily Fee</b> – all consumers can be asked to pay this fee, but some providers do not collect it. The amount consumers pay varies depending on their package level. The basic daily fee increases twice a year in line with the age pension.&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:10.45pt;margin-bottom: .2pt;margin-left:65.8pt'><b>Income Tested Care Fee</b> - if a consumer’s income is above a certain amount, they need to pay an income tested care fee to contribute to the cost of their care. This fee is different for everyone. Full pensioners do not pay an income tested care fee. Annual and lifetime caps apply. If a consumer moves into an aged care home, any income tested care fee they have paid while in home care will count towards the annual and lifetime caps for the means tested care fee in residential care.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:10.0pt;margin-bottom: .2pt;margin-left:65.8pt'><b>Additional Service Fee</b> - consumers can choose to buy additional care and services if they do not have enough money in their Home Care Package budget to support their individual <i>Care Plan</i>. These must be agreed in the <i>Home Care Agreement</i>.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:10.45pt;margin-bottom: .2pt;margin-left:65.8pt'>The Basic Daily Fee and Income Tested Care Fee are set out in the Australian Government Department of Health and Aged Care’s <i>Schedule of Fees and Charges for Residential and Home Care</i>.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:10.05pt;margin-bottom: .2pt;margin-left:65.8pt'>For fees and charges that apply to consumers who entered aged care before 1 July 2014, see the Australian Government Department of Health and Aged Care’s <i>Schedule of Fees and Charges for Pre-1 July 2014 Residential and Home Care Recipients</i>.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:65.8pt'>COHS can also charge for the following:</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:10.3pt;margin-bottom: .2pt;margin-left:65.8pt'><b>Care Management</b> - ongoing assessment and planning to ensure consumers receive the care and services they need. It is a mandatory service that must be provided to all home care package consumers, including consumers who self-manage their home care package. Care management must be undertaken on at least a monthly basis and include:</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .1pt;margin-left:28.3pt;text-indent:-14.05pt;line-height:110%'><span style='line-height:110%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Regularly assessing consumers’ needs, goals, and preferences.</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: 0in;margin-left:28.3pt;text-indent:-14.05pt;line-height:108%'><span style='line-height:108%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Reviewing consumers’ <i>Home Care Agreements</i> and <i>Care Plans.</i></p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .1pt;margin-left:28.3pt;text-indent:-14.05pt;line-height:110%'><span style='line-height:110%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Ensuring consumers’ care and services are aligned with other supports.</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .1pt;margin-left:28.3pt;text-indent:-14.05pt;line-height:110%'><span style='line-height:110%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Partnering with consumers and their representatives about consumers’ care and services.</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .1pt;margin-left:28.3pt;text-indent:-14.05pt;line-height:110%'><span style='line-height:110%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Ensuring consumers’ care and services are culturally safe and</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .1pt;margin-left:28.3pt;text-indent:-14.05pt;line-height:110%'><span style='line-height:110%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Identifying and addressing risks to consumers’ safety, health, and wellbeing.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:66.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:65.8pt'>COHS cannot charge more than 20% of the level of home care package a consumer receives for Care Management fees.</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:65.8pt'><b>Package Management</b> - a service that supports the delivery of home care packages. It includes:</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Establishing and managing home care budgets</p>
                  </div><span style='font-size:11.0pt;line-height:111%;font-family:'Arial',sans-serif; color:black'><br style='clear: both;page-break-before:always' /></span>
                  <div class='WordSection3'>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Coordinating services (such as scheduling services and staff or arranging respite care).</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Preparing invoices and monthly statements.</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Responding to enquiries about invoices.</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Organising third-party services.</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Buying equipment (such as mobility aids).</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Arranging allowable home modifications (such as bath rails).</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Submitting claims to Services Australia.</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Maintaining and updating income tested care fee and basic daily fee payments.</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Completing paperwork for ceasing care.</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Storing and maintaining records.</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Ensuring staff are suitable (e.g., police and immunisation checks).</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Training and educating staff</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Conducting quality improvement, compliance, and assurance activities.</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Completing financial reporting and</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:28.3pt;text-indent:-14.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;</span></span> Maintaining COVID-19 vaccination compliance documents.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:.5pt'>COHS cannot charge more than 15% of the level of home care package a consumer receives for Package Management fees.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:.5pt'>The fees consumers are required to pay are reduced by the following:</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:.5pt'><b>Subsidy</b> – a payment made by the Australian Government to approved providers for each person receiving government-subsidised home care. COHS can claim the subsidy for a consumer if they have been assigned a Home Care Package through the national priority system. The subsidy is comprised of:</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.1pt;margin-left:36.55pt;text-align:left;line-height:110%'><b>Basic Subsidy</b> – this rate depends on the consumer’s package level, and it increases for higher levels.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:36.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:36.55pt'><b>Reductions</b> - an amount that reduces the basic subsidy and primary supplements for consumers. The two (2) types of reductions that apply to home care are the:</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.6pt;margin-left:36.05pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:18.05pt;text-indent:-18.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> <b>Care Subsidy Reduction</b> – this is an income-tested care fee, which may be payable if a person enters home care from 1 July 2014 and has income over a certain amount. Services Australia calculates the maximum income-tested care fee based on an assessment of the person’s income and</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.35pt;margin-left:0in;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:18.05pt;text-indent:-18.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> <b>Compensation Payment Reduction</b> - a person can get compensation through a settlement, judgement, or reimbursement arrangement. This may be for things like an injury in the workplace or from a car accident. If the compensation covers some or all the cost of their home care, a reduction applies.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:.5pt'><b>Supplements</b> - primary and other supplements provide extra funding for specific care needs. For some supplements, the Australian Government automatically checks the consumer’s eligibility. For others, approved providers need to apply.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.1pt;margin-left:.5pt;text-align:left;line-height:110%'>Subsidy and supplement rates are set out in the Department of Health and Aged Care’s <i>Schedule of Subsidies and Supplements for Aged Care</i>.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%;background:#7030A0'><b><i><span style='color:white'>Fees Payable</span></i></b></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'><b>&nbsp;</b></p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: 1.85pt;margin-left:.5pt'>COHS must adhere to legislative requirements in how it charges for the delivery of home care packages, including:</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:18.05pt;text-indent:-18.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> not charging above the cap for care management and package management services</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: 2.1pt;margin-left:18.05pt;text-indent:-18.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> not charging for package management in a calendar month where no services (other than care management) are delivered, except for the first month of care&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:18.05pt;text-indent:-18.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> not charging exit amounts</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:18.05pt;text-indent:-18.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> not charging separately for third-party charges and&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:18.05pt;text-indent:-18.05pt'><span style='line-height:111%'>•<span style='font:7.0pt 'Times New Roman''>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span> ensuring charges are reasonable.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:.5pt'>The total subsidies, supplements, and fees that apply to your home care package are:</p>
                    <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'>&nbsp;</p>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='604' style='margin-left:.3pt;border-collapse:collapse'>
                      <tr style='height:13.9pt'>
                        <td width='302' valign='top' style='border:solid black 1.0pt; border-right:none;background:#7030A0;padding:2.05pt 5.75pt 0in 5.25pt; height:13.9pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:10.5pt;line-height:107%; color:white'>Government Income</span></b></p>
                        </td>
                        <td width='302' valign='top' style='border:solid black 1.0pt; border-left:none;background:#7030A0;padding:2.05pt 5.75pt 0in 5.25pt; height:13.9pt'>
                          <select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                      </tr>
                      <tr style='height:27.6pt'>
                        <td width='302' valign='top' style='border:solid black 1.0pt; border-top:none;padding:2.05pt 5.75pt 0in 5.25pt;height:27.6pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.5pt;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>Subsidy</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='302' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.05pt 5.75pt 0in 5.25pt;height:27.6pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><span style='font-size:10.5pt;line-height:107%'>[$______] per [fortnight]</span></p>
                        </td>
                      </tr>
                      <tr style='height:27.55pt'>
                        <td width='302' valign='top' style='border:solid black 1.0pt; border-top:none;padding:2.05pt 5.75pt 0in 5.25pt;height:27.55pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.45pt;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>Supplements</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='302' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.05pt 5.75pt 0in 5.25pt;height:27.55pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><span style='font-size:10.5pt;line-height:107%'>[$______] per [fortnight]</span></p>
                        </td>
                      </tr>
                      <tr style='height:27.45pt'>
                        <td width='302' valign='top' style='border:solid black 1.0pt; border-top:none;background:#CCCCFF;padding:2.05pt 5.75pt 0in 5.25pt; height:27.45pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.45pt;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>Total Government Income</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='302' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; background:#CCCCFF;padding:2.05pt 5.75pt 0in 5.25pt;height:27.45pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><span style='font-size:10.5pt;line-height:107%'>[$______] per [fortnight]</span></p>
                        </td>
                      </tr>
                      <tr style='height:13.95pt'>
                        <td width='302' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none; background:#7030A0;padding:2.05pt 5.75pt 0in 5.25pt;height:13.95pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:10.5pt;line-height:107%; color:white'>Less Fees and Charges</span></b></p>
                        </td>
                        <td width='302' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; background:#7030A0;padding:2.05pt 5.75pt 0in 5.25pt;height:13.95pt'>
                          <select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                      </tr>
                      <tr style='height:27.55pt'>
                        <td width='302' valign='top' style='border:solid black 1.0pt; border-top:none;padding:2.05pt 5.75pt 0in 5.25pt;height:27.55pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.45pt;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>Basic Daily Fee</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='302' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.05pt 5.75pt 0in 5.25pt;height:27.55pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><span style='font-size:10.5pt;line-height:107%'>[$______] per [fortnight]</span></p>
                        </td>
                      </tr>
                      <tr style='height:27.5pt'>
                        <td width='302' valign='top' style='border:solid black 1.0pt; border-top:none;padding:2.05pt 5.75pt 0in 5.25pt;height:27.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.45pt;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>Income Tested Care Fee</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='302' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.05pt 5.75pt 0in 5.25pt;height:27.5pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><span style='font-size:10.5pt;line-height:107%'>[$______] per [fortnight]</span></p>
                        </td>
                      </tr>
                      <tr style='height:40.75pt'>
                        <td width='302' valign='top' style='border:solid black 1.0pt; border-top:none;padding:2.05pt 5.75pt 0in 5.25pt;height:40.75pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.25pt;margin-left:.2pt;text-align:left;text-indent:0in; line-height:109%'><span style='font-size:10.5pt;line-height:109%'>Additional Service Fee (see <b><i>Annexure 3</i></b> for detail)</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='302' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.05pt 5.75pt 0in 5.25pt;height:40.75pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><span style='font-size:10.5pt;line-height:107%'>[$______] per [fortnight]</span></p>
                        </td>
                      </tr>
                      <tr style='height:27.5pt'>
                        <td width='302' valign='top' style='border:solid black 1.0pt; border-top:none;padding:2.05pt 5.75pt 0in 5.25pt;height:27.5pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.45pt;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>Care Management Fee</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='302' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.05pt 5.75pt 0in 5.25pt;height:27.5pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><span style='font-size:10.5pt;line-height:107%'>[$______] per [fortnight]</span></p>
                        </td>
                      </tr>
                      <tr style='height:27.55pt'>
                        <td width='302' valign='top' style='border:solid black 1.0pt; border-top:none;padding:2.05pt 5.75pt 0in 5.25pt;height:27.55pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.45pt;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>Package Management Fee</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='302' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.05pt 5.75pt 0in 5.25pt;height:27.55pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><span style='font-size:10.5pt;line-height:107%'>[$______] per [fortnight]</span></p>
                        </td>
                      </tr>
                      <tr style='height:27.45pt'>
                        <td width='302' valign='top' style='border:solid black 1.0pt; border-top:none;background:#CCCCFF;padding:2.05pt 5.75pt 0in 5.25pt; height:27.45pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.5pt;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>Total Fees and Charges</span></p>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.5pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='302' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; background:#CCCCFF;padding:2.05pt 5.75pt 0in 5.25pt;height:27.45pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><span style='font-size:10.5pt;line-height:107%'>[$______] per [fortnight]</span></p>
                        </td>
                      </tr>
                      <tr style='height:13.95pt'>
                        <td width='302' valign='top' style='border:solid black 1.0pt; border-top:none;background:#CCCCFF;padding:2.05pt 5.75pt 0in 5.25pt; height:13.95pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.2pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:10.5pt;line-height:107%'>Total Fees and Charges payable by you</span></b></p>
                        </td>
                        <td width='302' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; background:#CCCCFF;padding:2.05pt 5.75pt 0in 5.25pt;height:13.95pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><span style='font-size:10.5pt;line-height:107%'>[$______] per [fortnight]</span></p>
                        </td>
                      </tr>
                    </table>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-left:.5pt'>The above total does not consider the carry-over of any unspent funds. Detailed calculations are set out in your <i>Individualised Budget</i>.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%;background:#CCCCFF'><b><i>Payment Arrangements</i></b></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-left:.5pt'>Fees must be paid fortnightly, in arrears by direct debit or credit card into the nominated bank account.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:.5pt'>If for any reason during your care, you are in a position of financial hardship, please contact us for further discussion.</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:10.0pt;text-align:left;text-indent:0in; line-height:107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-left:.5pt'>The fees you pay for your Home Care Package care and services will be reviewed six (6) monthly with your individual <i>Care Plan</i>. Fees may change depending on increases in the maximum basic rate of the single pension, which is reviewed in March and September each year by the Australian Government.&nbsp;<br style='clear: both;page-break-before:always' /></p>
                    <h1 style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:.5pt; line-height:107%;background:#7030A0'><span style='font-size:12.0pt;line-height: 107%;color:white;font-style:normal'>Annexure 3 – Additional Services</span></h1>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:3.75pt;margin-bottom: .2pt;margin-left:.5pt'>[Specify Additional Services and related fees and charges, if any.]</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:448.0pt; margin-bottom:0in;margin-left:0in;text-align:left;text-indent:0in;line-height: 103%'>&nbsp;<span style='font-size:13.0pt;line-height:103%'>&nbsp;</span></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'><span style='font-size:10.0pt;line-height:107%'>&nbsp;</span></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:1.85pt;margin-left:0in;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.0pt;line-height:107%'>&nbsp;</span></p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.35pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%'>&nbsp;</p>
                    <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:.6pt;margin-left:0in;text-align:left;text-indent:0in;line-height: 107%;background:#7030A0'><b><span style='color:white'>DOCUMENT CONTROL</span></b></p>
                    <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'>&nbsp;</p>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='601' style='margin-left:.45pt;border-collapse:collapse'>
                      <tr style='height:13.55pt'>
                        <td width='96' valign='top' style='border:solid black 1.0pt; background:#7030A0;padding:2.0pt 5.75pt 0in 5.3pt;height:13.55pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:10.0pt;line-height:107%; color:white'>Version No.</span></b></p>
                        </td>
                        <td width='139' valign='top' style='border:solid black 1.0pt; border-left:none;background:#7030A0;padding:2.0pt 5.75pt 0in 5.3pt; height:13.55pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.15pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:10.0pt;line-height:107%; color:white'>Issue Date</span></b></p>
                        </td>
                        <td width='366' valign='top' style='border:solid black 1.0pt; border-left:none;background:#7030A0;padding:2.0pt 5.75pt 0in 5.3pt; height:13.55pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.15pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:10.0pt;line-height:107%; color:white'>Document Owner</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:13.7pt'>
                        <td width='96' valign='top' style='border:solid black 1.0pt; border-top:none;padding:2.0pt 5.75pt 0in 5.3pt;height:13.7pt'>
                          <p class='MsoNormal' align='center' style='margin:0in;text-align:center; text-indent:0in;line-height:107%'><span style='font-size:10.0pt;line-height: 107%'>1</span></p>
                        </td>
                        <td width='139' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.0pt 5.75pt 0in 5.3pt;height:13.7pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.15pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.0pt;line-height:107%'>1/07/2024</span></p>
                        </td>
                        <td width='366' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.0pt 5.75pt 0in 5.3pt;height:13.7pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.15pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.0pt;line-height:107%'>Management</span></p>
                        </td>
                      </tr>
                      <tr style='height:13.4pt'>
                        <td width='234' colspan='2' valign='top' style='border-top:none; border-left:solid black 1.0pt;border-bottom:solid black 1.0pt;border-right: none;background:#D9D9D9;padding:2.0pt 5.75pt 0in 5.3pt;height:13.4pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:10.0pt;line-height:107%'>Version History</span></b></p>
                        </td>
                        <td width='366' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; background:#D9D9D9;padding:2.0pt 5.75pt 0in 5.3pt;height:13.4pt'>
                          <select name='' class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select>
                        </td>
                      </tr>
                      <tr style='height:13.65pt'>
                        <td width='96' valign='top' style='border:solid black 1.0pt; border-top:none;background:#7030A0;padding:2.0pt 5.75pt 0in 5.3pt;height: 13.65pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><b><span style='font-size:10.0pt;line-height:107%; color:white'>Version No.</span></b></p>
                        </td>
                        <td width='139' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; background:#7030A0;padding:2.0pt 5.75pt 0in 5.3pt;height:13.65pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.15pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:10.0pt;line-height:107%; color:white'>Review Date</span></b></p>
                        </td>
                        <td width='366' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; background:#7030A0;padding:2.0pt 5.75pt 0in 5.3pt;height:13.65pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.15pt;text-align:left;text-indent:0in; line-height:107%'><b><span style='font-size:10.0pt;line-height:107%; color:white'>Revision Description</span></b></p>
                        </td>
                      </tr>
                      <tr style='height:13.6pt'>
                        <td width='96' valign='top' style='border:solid black 1.0pt; border-top:none;padding:2.0pt 5.75pt 0in 5.3pt;height:13.6pt'>
                          <p class='MsoNormal' align='center' style='margin:0in;text-align:center; text-indent:0in;line-height:107%'><span style='font-size:10.0pt;line-height: 107%'>1</span></p>
                        </td>
                        <td width='139' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.0pt 5.75pt 0in 5.3pt;height:13.6pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.15pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.0pt;line-height:107%'>01/07/2025</span></p>
                        </td>
                        <td width='366' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.0pt 5.75pt 0in 5.3pt;height:13.6pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.15pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                      </tr>
                      <tr style='height:13.8pt'>
                        <td width='96' valign='top' style='border:solid black 1.0pt; border-top:none;padding:2.0pt 5.75pt 0in 5.3pt;height:13.8pt'>
                          <p class='MsoNormal' align='left' style='margin:0in;text-align:left;text-indent: 0in;line-height:107%'><span style='font-size:10.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='139' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.0pt 5.75pt 0in 5.3pt;height:13.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.15pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                        <td width='366' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:2.0pt 5.75pt 0in 5.3pt;height:13.8pt'>
                          <p class='MsoNormal' align='left' style='margin-top:0in;margin-right:0in; margin-bottom:0in;margin-left:.15pt;text-align:left;text-indent:0in; line-height:107%'><span style='font-size:10.0pt;line-height:107%'>&nbsp;</span></p>
                        </td>
                      </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>";
?>