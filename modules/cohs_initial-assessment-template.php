<?php
    $cdate=date("Y-m-d",time());
    echo"<div class='container'>
        <form method='post' name='dataform' action='formprocessor_1.php' target='dataprocessor' enctype='multipart/form-data' >
            <input type='hidden' name='form2' value='4'><br><br>
            <div class='row'>
                <div class='col-7 col-md-8' style='text-align:left'>COHS AGED CARE<h4>CONSUMER ASSESSMENT</h4></div>
                <div class='col-5 col-md-4' style='text-align:right'><a href='index.php?url=cohs_initial-assessment-template_view.php' class='btn btn-primary' style='margin-top:10px;'>View Saved Data</a></div>
                <div class='col-12 style='text-align:left'><hr><br><br></div>
                <div class='col-12'><br>
        
                    <div class='row'>
                        <div class='col-12 col-md-12'><center>
                        <table border='0' cellspacing='0' cellpadding='0' border=0 width='100%' style='border-width:0px'>
                          <tr style='height:29.75pt'>
                            <td width='300' colspan='2' valign='top' style='border:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:29.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>DATE:</span><input class='form-control' name='name' value=''></p>
                            </td>
                            <td width='301' colspan='2' valign='top' style='border:solid black 1.0pt; border-left:none;padding:0in 3.3pt 0in 5.25pt;height:29.75pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>CONSENT</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='601' colspan='4' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>PARTICIPANT:&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='300' colspan='2' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>NAME:</span><input class='form-control' name='name' value=''></p>
                            </td>
                            <td width='301' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>DOB:&nbsp;</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='300' colspan='2' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>LEVEL:&nbsp;</span><input class='form-control' name='name' value=''></p>
                            </td>
                            <td width='301' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>PHONE:</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='601' colspan='4' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>ADDRESS:&nbsp;</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='300' colspan='2' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>EMAIL:&nbsp;</span><input class='form-control' name='name' value=''></p>
                            </td>
                            <td width='301' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>AGED CARE ID:</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:15.05pt'>
                            <td width='300' colspan='2' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>MEDICARE:&nbsp;</span><input class='form-control' name='name' value=''></p>
                            </td>
                            <td width='301' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.05pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>PENSION/DVA:</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='300' colspan='2' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>GENDER:&nbsp;</span><select class='form-control' name=gender><option value=''>Select Gender</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option></select></p>
                            </td>
                            <td width='301' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>PREFERRED LANGUAGE:&nbsp;</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='300' colspan='2' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>MARITAL STATUS:</span><select class='form-control' name=merital><option value=''>Select Merital Status</option><option value='MARIED'>MARIED</option><option value='SINGLE'>SINGLE</option><option value='OTHER'>OTHER</option></select></p>
                            </td>
                            <td width='301' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Birth Country/Ethnicity:</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='300' colspan='2' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Contacts</span></b></p>
                            </td>
                            <td width='301' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:16.0pt'>
                                POA - Fin: <select class='form-control' name=gender><option value=''>Select</option><option value='YES'>YES</option><option value='NO'>NO</option></select>
                            </td>
                            <td width='215' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Name:&nbsp;</span><input class='form-control' name='name' value=''></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Relationship:</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Email</span><input class='form-control' name='name' value=''></p>
                            </td>
                            <td width='215' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Ph.</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:16.0pt'>
                              EG - Care: <select class='form-control' name=gender><option value=''>Select</option><option value='YES'>YES</option><option value='NO'>NO</option></select>
                            </td>
                            <td width='215' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Name:&nbsp;</span><input class='form-control' name='name' value=''></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Relationship:&nbsp;</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Email</span><input class='form-control' name='name' value=''></p>
                            </td>
                            <td width='215' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Ph.</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Doctor + regularity</span><input class='form-control' name='name' value=''></p>
                            </td>
                            <td width='215' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Ph.</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Specialist + regularity</span><input class='form-control' name='name' value=''></p>
                            </td>
                            <td width='215' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Ph.</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:29.75pt'>
                            <td width='601' colspan='4' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:29.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>No Response to Door</span></b></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='300' colspan='2' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>&nbsp;</span></b><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><b><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Falls Alarm&nbsp;</span></b></p>
                            </td>
                            <td width='301' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:16.25pt'>
                                Alarm: <select class='form-control' name=gender><option value=''>Select</option><option value='Key Box'>Key Box</option><option value='Smoke'>Smoke</option></select>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='300' colspan='2' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>COMMENCEMENT DATE</span></p>
                            </td>
                            <td width='301' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.3pt 0in 5.25pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>REVIEW</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='601' colspan='4' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><b><span style='color:red;font-style:normal'>ALLERGIES:</span></b><b><span style='font-style:normal'>&nbsp;</span></b></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='601' colspan='4' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><b><span style='color:red;font-style:normal'>&nbsp;</span></b><span style='font-family: 'MS Gothic';color:red;font-style:normal'><input type='checkbox' id='' name='' value=''></span><b><span style='color:red; font-style:normal'>&nbsp;&nbsp;&nbsp; Yes&nbsp;&nbsp; DIABETIC T1DM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></b> <b><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></b><span style='font-family:'MS Gothic';color:red;font-style:normal'><input type='checkbox' id='' name='' value=''></span><b><span style='color:red;font-style:normal'>&nbsp;&nbsp;&nbsp; Management Plan</span></b></p>
                            </td>
                          </tr>
                          <tr style='height:73.8pt'>
                            <td width='601' colspan='4' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:73.8pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>ABOUT :&nbsp;</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:44.5pt'>
                            <td width='601' colspan='4' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:44.5pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>REASON FOR CARE:&nbsp;</span><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='601' colspan='4' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Primary Conditions:&nbsp;</span></b><input class='form-control' name='name' value=''></p>
                            </td>
                          </tr>
                          <tr style='height:29.75pt'>
                            <td width='601' colspan='4' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:29.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Health History&nbsp;</span></b><input class='form-control' name='name' value=''></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>&nbsp;</span></b></p>
                            </td>
                          </tr>
                          <tr style='height:30.05pt'>
                            <td width='601' colspan='4' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:30.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>LIVING SITUATION:</span><input class='form-control' name='name' value=''></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:29.75pt'>
                            <td width='601' colspan='4' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:29.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>CURRENT SERVICES:&nbsp;</span><input class='form-control' name='name' value=''></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:29.75pt'>
                            <td width='601' colspan='4' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:29.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Respite/Emergency Plan?</span><input class='form-control' name='name' value=''></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:59.0pt'>
                            <td width='601' colspan='4' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.3pt 0in 5.25pt;height:59.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Advanced Care Plan</span></b> <span style='font-style:normal'>(wishes, preferences regarding future health medical treatment)</span></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><a href='https://www.healthdirect.gov.au/advance-care-planning-and-directive#directive'><span style='color:blue;font-style:normal'>Advance care planning and directive | healthdirect</span></a> <a href='https://www.healthdirect.gov.au/advance-care-planning-and-directive#directive'></a></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><a href='https://www.advancecareplanning.org.au/create-your-plan/create-your-plan-nsw'><span style='color:blue;font-style:normal'>New South Wales: create your plan | Advance Care Planning</span></a> <a href='https://www.advancecareplanning.org.au/create-your-plan/create-your-plan-nsw'></a></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.25pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>&nbsp;</span></b></p>
                            </td>
                          </tr>
                          <tr>
                            <td width='201' style='border:none'></td>
                            <td width='100' style='border:none'></td>
                            <td width='115' style='border:none'></td>
                            <td width='186' style='border:none'></td>
                          </tr>
                        </table>
                        <p class='MsoNormal' style='margin-top:0in;margin-right:.75pt;margin-bottom:0in; margin-left:-72.05pt;text-align:justify;text-justify:inter-ideograph; text-indent:0in;line-height:107%'>&nbsp;</p>
                        
                        <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='100%' style='margin-left:.25pt;border-collapse:collapse'>
                          <tr style='height:16.0pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                                Advanced Care Directive: 
                                <select class='form-control' name=gender><option value=''>Select</option><option value='YES'>YES</option><option value='NO'>NO</option><option value='My Health Record'>My Health Record</option></select>                </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>MEDICATIONS</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Webster&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Dosette&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' checked value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Original Pack&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:59.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:59.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Current List – Photo</span></b></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:59.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:59.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.05pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Texture</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Whole&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Crushed&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; With Puree&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; PEG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Other&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Independent Loose&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Independent Webster&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Remind to take&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Supervision&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Stored Away&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Full assistance&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Regular Vaccinations</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Flu</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Covid</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>ACTIVITIES OF DAILY LIVING</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Cognitive&nbsp;</span></b></p>
                            </td>
                            <td width='401' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Do you think you have any memory loss?</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-align:justify;text-justify:inter-ideograph;text-indent: 0in;line-height:107%'><span style='font-style:normal'>Memory Issues-Diagnosed</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Comment</span></b></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-family: 'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>Mild Memory Loss – Still Independent</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-family: 'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>Moderate Memory Loss – requires occasional prompting and/or supervision</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-family: 'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>Severe Memory Loss – Requires prompting and/or supervision with all tasks</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Behaviours of Concern</span></b></p>
                            </td>
                          </tr>
                          <tr style='height:30.75pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:30.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Wandering&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:30.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Refusal/Resistance&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:30.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Physical&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style='font-family: 'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;</span></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Verbal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Comment:&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                          </tr>
                          <tr style='height:16.05pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Communication</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; English&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Non/Little English&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Needs Help with&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>Understanding</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>Being understood</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Comments:</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Languages Spoken</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Preferred:&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Sight</span></b></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Glasses&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Reading&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Distance&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Bifocal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Contact Lenses&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No Sight Problems&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Glaucoma&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:-.85pt;text-align:justify;text-justify:inter-ideograph; text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span> <span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Cataracts&nbsp;&nbsp;&nbsp; Removed&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Macular Degen&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Hearing&nbsp;</span></b> <span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No Hearing Problem&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Severely Deaf&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Left hearing aid&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Right Hearing Aid&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Needs assistance&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Comments:</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.3pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:15.3pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Referral Required</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:15.3pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:15.3pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Audiologist&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Optometrist&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Speech Pathologist&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Pain</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Chronic&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Acute&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Cause of Pain</span></p>
                            </td>
                            <td width='401' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>How is pain Managed?</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Medication&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Therapy&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Massage&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Heat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:-1.0pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span> <span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Distraction&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 0in;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:5.5pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Other:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                        </table>
                        <p class='MsoNormal' style='margin-top:0in;margin-right:.75pt;margin-bottom:0in; margin-left:-72.05pt;text-indent:0in;line-height:107%'>&nbsp;</p>
                        
                        <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='100%' style='margin-left:.25pt;border-collapse:collapse'>
                          <tr style='height:15.0pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Skin Integrity</span></b></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Wounds </span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Comment:&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Pressure Areas</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Comment</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Toileting</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Independent</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Supervised</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Standby Assist</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Minimal Assist</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Moderate Assist</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Full Assist</span></p>
                            </td>
                            <td width='401' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Comments</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Continence</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>CAPS Payment</span></b></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Continent of Urine </span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Incontinent of Urine</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>Equip/Aids Required</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Continent of Faeces </span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Incontinent of Faeces</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span> <span style='font-style:normal'>Wipe, Redress</span></p>
                            </td>
                          </tr>
                          <tr style='height:30.0pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:30.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Comments (leakage, mobility) Some Leakage</span></p>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Personal Care</span></b></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Undressing</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp; Independent</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Minimal</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Supervised</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp; Stand By Assist</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Moderate Assist</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Full Assistance</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Showering</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp; Independent</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Minimal</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Supervised</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp; Stand By Assist</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Moderate Assist</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Full Assistance</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Drying</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp; Independent</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Minimal</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Supervised</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp; Stand By Assist</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Moderate Assist</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Full Assistance</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.05pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:15.05pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Dressing</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.05pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.05pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp; Independent</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Minimal</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Supervised</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp; Stand By Assist</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Moderate Assist</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Full Assistance</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Grooming</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp; Independent</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Minimal</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Supervised</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp; Stand By Assist</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Moderate Assist</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Full Assistance</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Fitting Aids</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>NA</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp; Independent</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Minimal</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Supervised</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp; Stand By Assist</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Moderate Assist</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Full Assistance</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Oral Hygiene</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Upper Dentures</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Lower Dentures</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Crown/Implants</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Dentist Required</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Last Appointment</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.3pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.3pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Cleans Own Teeth</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.3pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Requires some Assist</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.3pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Full Assistance</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Nutrition Hydration</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Dietary Requirements</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Comments&nbsp;</span></p>
                            </td>
                            <td width='401' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Diabetic</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; T1DM</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; T2DM</span></p>
                            </td>
                          </tr>
                          <tr style='height:30.75pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:30.75pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; NO</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:30.75pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Self-Manage</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 0in 0in 5.5pt;height:30.75pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Requires</span></p>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Assistance</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='601' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 0in 0in 5.5pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Comment</span></p>
                            </td>
                          </tr>
                        </table>
                        <p class='MsoNormal' style='margin-top:0in;margin-right:.75pt;margin-bottom:0in; margin-left:-72.05pt;text-indent:0in;line-height:107%'>&nbsp;</p>
                        <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='100%' style='margin-left:-.15pt;border-collapse:collapse'>
                          <tr style='height:30.75pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:30.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Meal Prep –</span></b> <span style='font-style: normal'>Family Help </span></p>
                            </td>
                            <td width='215' valign='top' style='border:solid black 1.0pt; border-left:none;padding:0in 5.75pt 0in 5.15pt;height:30.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Independent -</span></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Nutritious</span></p>
                            </td>
                            <td width='186' valign='top' style='border:solid black 1.0pt; border-left:none;padding:0in 5.75pt 0in 5.15pt;height:30.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Independent&nbsp; Not</span></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Nutritious</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Needs Prompting</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Full Assist</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Full Assist + Feed</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Food Texture</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Normal</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Cut Up</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Mince/Moist</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Soft</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Puree</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Fluid Texture</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; PEG</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Normal/Thin</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.05pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Mild/Honey</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Mod/Custard</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Thick/Pudding</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>Smoke/Vape</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>Rec Drugs</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>Alcohol</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Comment</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Weight Loss</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No: Stable&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Comments:&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Current Weight:&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Foot Care</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Independent</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Family</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Podiatrist (CDM)</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Hair Care</span></b></p>
                            </td>
                            <td width='401' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Independent</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Family&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Hairdresser</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Comment</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>ACTIVITES OF DAILY LIVING</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Mobility</span></b></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Walks Outdoors</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Climbs stairs</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>Descends Stairs</span></p>
                            </td>
                          </tr>
                          <tr style='height:30.75pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:30.75pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Walks independently</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:30.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Walks With Assist</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:30.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span> <span style='font-style:normal'>Uses Aid.</span></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Stick/walker</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Unable to Walk</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Wheelchair</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Who Pushes?</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.05pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.05pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Comment:</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Transfers</span></b></p>
                            </td>
                            <td width='401' colspan='2' valign='top' style='border-top:none; border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>In, Out, Up, Down of Chair, Bed, Car, Toilet</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Unaided</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Unaided with aid</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Can get in/Not out</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Help In and Out</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp; Dependent</span> <span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span> <span style='font-style:normal'>1 or&nbsp;</span> <span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span> <span style='font-style:normal'>2</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Lifter</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Comment:&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Falls</span></b> <span style='font-style:normal'>– Have you had any recent falls or near misses?</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Falls in the Last Year</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes&nbsp; How Many?&nbsp;&nbsp;&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Low</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Medium</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; High</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Comment/Why How?&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Upper Body Strength</span></b> <span style='font-style:normal'>– How much can you carry? </span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Equipment</span></b></p>
                            </td>
                          </tr>
                          <tr style='height:15.3pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.3pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>In Place (already has)</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.3pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Required</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.3pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Received</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Sleep</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Nil Issues</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Preferred Bedtime</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No. Of Pillows</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.05pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:16.05pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Medication </span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Difficulty</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 5.75pt 0in 5.15pt;height:16.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Milk/Whiskey</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 5.75pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Comment:</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                          </tr>
                        </table>
                        <p class='MsoNormal' style='margin-top:0in;margin-right:.75pt;margin-bottom:0in; margin-left:-72.05pt;text-indent:0in;line-height:107%'>&nbsp;</p>
                        <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='100%' style='margin-left:-.15pt;border-collapse:collapse'>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Telephone</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border:solid black 1.0pt; border-left:none;padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Independent Landline</span></p>
                            </td>
                            <td width='186' valign='top' style='border:solid black 1.0pt; border-left:none;padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Independent Mobile</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Obtains Number</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Needs number dialled</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Answers only</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Unable/unwilling</span></p>
                            </td>
                            <td width='215' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Comment</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Email/Internet/Online</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Independent</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Wanting to Learn</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Unable/Unwilling</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Housework</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                          </tr>
                          <tr style='height:16.05pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.05pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes to Good standard</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes Lower standard</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.05pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Limited Enable</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Unable/Unwilling</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes Some</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No Some</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Priority Level&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; High</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Medium</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Comment</span></p>
                            </td>
                            <td width='215' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Gardening&nbsp;</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes to Good standard</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes Lower standard</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Limited Enable</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Unable/Unwilling </span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes Some</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No Some</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Comment</span></p>
                            </td>
                            <td width='215' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Shopping</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Able to Shop Alone</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Shops 1-2 items</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Needs Help</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Needs List</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Family/Friend Shops</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Unable unwilling</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Needs Transport</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Carry/Put away</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp;&nbsp; SW Internet shop</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Comment</span></p>
                            </td>
                            <td width='215' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                          </tr>
                          <tr style='height:30.75pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:30.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Finances</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:30.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Independent Comp.</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:30.75pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Family/Friend</span></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Assist</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Unable/Unwilling</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Willing with Help</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; TAG</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Comment (emergencies)</span></p>
                            </td>
                            <td width='215' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                          </tr>
                          <tr style='height:30.55pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:30.55pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Games/Hobbies</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:30.55pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Participate</span></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Independently</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:30.55pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span> <span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp; Participate</span></p>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Instruction</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; With Coaxing</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Unwilling/Unable</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Needs Help</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Comments:&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Mood</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span> <span style='font-style:normal'>Lonely Isolated?</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span> <span style='font-style:normal'>Low/Down</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Social</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp; No</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Comments:&nbsp;</span></p>
                            </td>
                            <td width='215' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                          </tr>
                          <tr style='height:16.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>COHS Hub</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border-top:none;border-left: solid black 1.0pt;border-bottom:solid black 1.0pt;border-right:none; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Comment</span></p>
                            </td>
                            <td width='215' valign='top' style='border:none;border-bottom:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:8.0pt; margin-left:0in;text-indent:0in;line-height:107%'>&nbsp;</p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Transport</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:30.8pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:30.8pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Able to Drive</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:30.8pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Able to catch Bus/Train</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:30.8pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Able to catch taxi alone</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Needs escort Taxi</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Needs escort Bus/train</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Unwilling/unable&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:16.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Wheelchair taxi</span></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Requires escort private</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:16.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span><span style='font-family:'MS Gothic';font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Patient Transport</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Clinical Risk Identified</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Skin:&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Communication:</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Mobility:</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                          </tr>
                          <tr style='height:15.3pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.3pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Manual Handling:</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.3pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Medication:</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.3pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Continence:&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Isolation:</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Falls:&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Behaviour:</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.75pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Pain:&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.4pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Sleep:&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:0in; margin-left:.35pt;text-indent:0in;line-height:107%'><span style='font-style: normal'>Wound:&nbsp;&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Palliative:&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Management Plans:&nbsp;&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Physio:&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Speech Pathologist:</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Dietitian:&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Clinical Review:</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Occupational therapist:&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Podiatrist:</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Home Mods:&nbsp;</span><input type='text' name='2' value='' style='width:100%' class='form-control'></p>
                            </td>
                          </tr>
                          <tr style='height:30.0pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:30.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Family Recipient</span></b></p>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Feedback Participation</span></b></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:30.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; Yes</span></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:30.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span><span style='font-family:'MS Gothic'; font-style:normal'><input type='checkbox' id='' name='' value=''></span><span style='font-style:normal'>&nbsp;&nbsp;&nbsp; No</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>NEEDS</span></b></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Clinical</span></b>
                                <select name='' class='form-control'><option value=''>Select</option>
                                    <option value='Nursing'>Nursing</option><option value='Nutrition'>Nutrition</option><option value='Allied'>Allied</option><option value='Care Management'>Care Management</option>
                                </select>
                            </p>
                            </td>
                          </tr>
                          <tr style='height:29.8pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:29.8pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Everyday</span></b>
                                <select name='' class='form-control'><option value=''>Select</option>
                                    <option value='Personal Care'>Personal Care</option><option value='Social support'>Social support</option>
                                    <option value='Therapeutic'>Therapeutic</option><option value='Respite'>Respite</option>
                                    <option value='Transport'>Transport</option><option value='Home Mods'>Home Mods</option>
                                    <option value='Assistive Technology'>Assistive Technology</option>
                                </select>
                                </p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                                <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>Independence</span></b>
                                    <select name='' class='form-control'><option value=''>Select</option><option value='Domestic Assistance'>Domestic Assistance</option><option value='Home Maintenance'>Home Maintenance</option><option value='Repairs'>Repairs</option><option value='Meals'>Meals</option></select>
                                </p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>PREFERENCES</span></b><input type=text name=name value='' class='form-control'></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><b><span style='font-style:normal'>GOALS:</span></b> <span style='font-style:normal'>&nbsp;</span><input type=text name=name value='' class='form-control'></p>
                            </td>
                          </tr>
                          <tr style='height:15.0pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.0pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:15.25pt'>
                            <td width='602' colspan='3' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:15.25pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:29.75pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:29.75pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Care Manager</span><input type=text name=name value='' class='form-control'></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:29.75pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Sign</span><input type=file name=name value='' class='form-control'></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:29.75pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Date</span><input type=date name=name value='' class='form-control'></p>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                          <tr style='height:29.75pt'>
                            <td width='201' valign='top' style='border:solid black 1.0pt; border-top:none;padding:0in 3.55pt 0in 5.15pt;height:29.75pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Recipient/Rep</span><input type=text name=name value='' class='form-control'></p>
                            </td>
                            <td width='215' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:29.75pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Sign</span><input type=file name=name value='' class='form-control'></p>
                            </td>
                            <td width='186' valign='top' style='border-top:none;border-left: none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt; padding:0in 3.55pt 0in 5.15pt;height:29.75pt'>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>Date</span><input type=date name=name value='' class='form-control'></p>
                              <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                            </td>
                          </tr>
                        </table>
                        <br><br>
                        <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:1.2pt; margin-left:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>NOTES Re:&nbsp;</span></p>
                        <p class='MsoNormal' style='margin-left:-.25pt'><span style='font-style:normal'>(</span>Health Literacy, Stamina, Comprehension, Concentration, Appearance, Behaviour</p>
                        <p class='MsoNormal' style='margin-left:-.25pt'>Access to Community, Hypertension, Diabetes, Cancer (not a minor skin cancer)</p>
                        <p class='MsoNormal' style='margin-left:-.25pt'>Chronic lung disease, Heart attack, Congestive heart failure, Angina, Asthma, Arthritis, Kidney disease, Date Year, Clock, News etc)</p>
                        <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:9.2pt; margin-left:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                        <p class='MsoNormal' style='margin:0in;text-indent:0in;line-height:107%'><span style='font-style:normal'>&nbsp;</span></p>
                </div>
                <div class='col-12 col-md-12'><center>
                    <input type='submit' name='Submit' value='Submit' style='width:30%;background-color:green;color:white' class='form-control'>
                    <br><br><br>
                </div>
            </div>
        </form>
    </div>";
?>
