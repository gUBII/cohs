<?php
    $cdate=date("Y-m-d",time());
    echo"<div class='container'>
        <form method='post' name='dataform' action='formprocessor_1.php' target='dataprocessor' enctype='multipart/form-data' >
            <input type='hidden' name='form2' value='2'><br><br>
            <div class='row'>
                <div class='col-7 col-md-8' style='text-align:left'><h4>Home Care Plan</h4></div>
                <div class='col-5 col-md-4' style='text-align:right'><a href='index.php?url=cohs_care_plan_sdm_view.php' class='btn btn-primary' style='margin-top:10px;'>View Saved Data</a></div>
                <div class='col-12 style='text-align:left'><hr><br><br></div>
                <div class='col-12'><br><center>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='697'>
                        <tr>
                            <td>
                                Care Level:<br><select class='form-control'>
                                <option value='1'>Level 1</option>
                                <option value='2'>Level 2</option>
                                <option value='3'>Level 3</option>
                                <option value='4'>Level 4</option>
                                <option value='5'>Level 5</option>
                                <option value='6'>Level 6</option>
                                <option value='7'>Level 7</option>
                                <option value='8'>Level 8</option>
                                </select>
                            </td>
                            <td>Commenced:<br><input type='text' name='' value='Commenced' class='form-control'></td>
                            <td>Alerts:<br><select class='form-control'><option>YES</option><option>NO</option></select></td>
                        </tr>
                    </table>
                </div>
                
                <div class='col-12 col-md-12'><br><br><center><h1 style='margin-left:-.25pt'>INTRODUCTION REASON FOR HOME CARE</h1></center><br><Br></div>
                
                <div class='col-12 col-md-12'><center>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='697'>
                        <tr><td colspan=3><b><span style='color:#3A7C22'>PROPERTY ACCESS</span></b></td><td></td></tr>
                        <tr><td>Gates</td><td>:</td><td><select class='form-control'><option>YES</option><option>NO</option></select></td></tr>
                        <tr><td>Lock Box</td><td>:</td><td><select class='form-control'><option>YES</option><option>NO</option></select></td></tr>
                        <tr><td>Park</td><td>:</td><td><select class='form-control'><option>YES</option><option>NO</option></select></td></tr>
                        <tr><td>Advocate</td><td>:</td><td><input type='text' class='form-control'></td></tr>
                        <tr><td>Contacts No response to Door</td><td>:</td><td><input type='text' class='form-control'></td></tr>
                        <tr><td>Office</td><td>:</td><td><input type='text' class='form-control'></td></tr>
                        <tr><td>Gabby SDM</td><td>:</td><td><input type='text' class='form-control' value='0287749698'></td></tr>
                        <tr><td>Emergency</td><td>:</td><td><input type='text' class='form-control'></td></tr>
                        <tr><td>Doctor</td><td>:</td><td><input type='text' class='form-control'></td></tr>
                        <tr><td>Allergies</td><td>:</td><td><input type='text' class='form-control'></td></tr>
                        
                        <tr><td>Falls Alarm</td><td>:</td><td><input type='text' class='form-control'></td></tr>
                        <tr><td>Medications</td><td>:</td><td><input type='text' class='form-control'></td></tr>
                        <tr><td>Weight</td><td>:</td><td><input type='text' class='form-control'></td></tr>
                        <tr><td>Cognition</td><td>:</td><td><input type='text' class='form-control'></td></tr>
                        <tr><td>Cultural</td><td>:</td><td><input type='text' class='form-control'></td></tr>
                        <tr><td>Language</td><td>:</td><td><input type='text' class='form-control'></td></tr>
                        <tr><td>Vacinations (Flu, Covid)</td><td>:</td><td><input type='text' class='form-control'></td></tr>
                        <tr><td>Advanced Care Directive</td><td>:</td><td><input type='text' class='form-control'></td></tr>
                        <tr><td>Emergency Plan</td><td>:</td><td><input type='text' class='form-control' value='Blackout eg Torch, Phone, Relocate, Unavailable Carer, Radio'></td></tr>
                        
                        <tr><td><br><br>About</td><td></td><td></td></tr>
                        <tr><td colspan=3><textarea class='form-control'></textarea></td></tr>
                    </table>    
                    <br><br>
                    <h1>PARTNERSHIPS</h1>
                    <br><br>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='697'>
                        <tr style='height:15.5pt'>
                            <td width='491'><b><span style='color:#3A7C22'>ASSESSMENT</span><br></b> I - Independent, F - Family and friends, C - COHS</td>
                            <td width='58' align=center><br><b>I</b></td><td width='58' align=center><br><b>F</b></td><td width='58' align=center><br><b>C</b></td><td width='150' align=center><br><b>RISKS</b></td>
                        </tr>
                        <tr><td width='491'><br><b><span style='color:#00B0F0'>CLINCIAL</span> </b></td><td></td><td></td><td></td><td></td></tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Conditions:</span> </b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Pain:</span> </b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr><td width='491'><Br><br><b><span style='color:#00B0F0'>MANAGED BY</span> </b></td><td></td><td></td><td></td><td></td></tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Cognition:</span> </b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Behaviours:</span> </b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr><td width='491'><Br><br><b><span style='color:#00B0F0'>CAPS</span> </b></td><td></td><td></td><td></td><td></td></tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Skin:</span> </b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Pressure:</span> </b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Allied Healt:</span> </b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Sight:</span> </b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Hearing:</span> </b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Smell:</span> </b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Podiatry:</span> </b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Nutrition/Hydration:</span> </b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Swallowing:</span> </b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr><td width='491'><br><br><b><span style='color:#00B0F0'>TEXTURE</span> </b></td><td></td><td></td><td></td><td></td></tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Weight Loss:</span> </b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr><td width='491'><Br><br><b><span style='color:#00B0F0'>INDEPENDENCE</span> </b></td><td></td><td></td><td></td><td></td></tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Personal Care:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Toileting:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Oral Hygiene</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Mobility</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Transfers:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Falls</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Sleep:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Meal Prep:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Financial:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Communication:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Shopping:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Transport:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Housework:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Hobbies:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Gardening:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Mood:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Social:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Environment Indoor:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                        <tr>
                            <td width='491'><b><span style='color:#00B0F0'>Environment Outdoor:</span></b></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><select class='form-control'><option value='NO'>NO</option><option value='YES'>YES</option></select></td>
                            <td><input type='text' class='form-control'></td>
                        </tr>
                    </table>
                    <br><br><hr>
                    <h1 style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:-.25pt'>STRENGTHS</h1>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='697'>
                        <tr><td width='200'><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td width='200'><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td width='200'><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td width='200'><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                    </table>
                    
                    <br><br><hr>
                    <h1 style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:-.25pt'>RISKS</h1>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='697'>
                        <tr><td width='300'>RISK</td><td width='300'>ACTION PLAN</td><td width='300'>WHO/WHEN</td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                    </table>
                    
                    <br><br><hr>
                    <h1 style='margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:-.25pt'>CURRENT SUPPORTS</h1>
                    Changed provider to COHS and to continue<BR>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='697'>
                        <tr><td width='200'>NAME</td><td width='200'>FREQ</td><td width='200'>WHEN</td><td width='200'>TIME</td><td width='200'>HOURS</td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                    </table>
                    
                    <BR><BR><hr>
                    <p class='MsoNormal' style='margin-top:0in;margin-right:0in;margin-bottom:9.2pt; margin-left:-.25pt;line-height:107%'><u>RECOMMENDATIONS</u>
                    <h1 style='margin:0in;text-indent:0in'><span style='color:#3A7C22;text-decoration: none'>EQUIPMENT IN PLACE</span></h1>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='697'>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                    </table>
                    
                    <br><br><hr>
                    <h1 style='margin:0in;text-indent:0in'><span style='color:#3A7C22;text-decoration: none'>EQUIPIMENT/MODIFICATION NEEDED</span></h1>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='697'>
                        <tr><td width='300'><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td width='300'><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td width='300'><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td width='300'><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                    </table>
                    
                    <br><br><hr>
                    <h1 style='margin:0in;text-indent:0in'><span style='color:#3A7C22;text-decoration: none'>FOR SUPPORT WORKERS<br>WHEN TO REPORT TO MANAGEMENT – Phone 87749698</span></h1>
                    <b>Changes</b>: Deterioration, Impact, Fluid, Diabetes, Refusal, Hospitalisation,<br>Wound, Neglect, Change needed to Service Instructions info, Accidents,<br>Near Misses, Medication, No response to door. GOALS
                    <BR><BR>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='697'>
                        <tr><td width='200'>GOALS</td><td width='200'>ACTIVITY</td><td width='200'>SERVICES</td><td width='200'>EFFECTIVENESS</td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                        <tr><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td><td><input type='text' class='form-control'></td></tr>
                    </table>
                    <br><br><br>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='697' style='width:523.0pt;margin-left:.25pt;border-collapse:collapse'>
                        <tr>
                            <td>
                                <h1 style='margin:0in;text-indent:0in'><span style='color:#3A7C22;text-decoration: none'>SERVICE INSTRUCTION</h1>
                                <p>Personal Care (PC) Assist Namet by being nearby as she showers and dryers herself. Assist as she requests. Help with Hair washing other. Attend to making the bed and any laundry. </p>
                                <p>Domestic Assistance 2hrs pw – Ensure Namet’s Bedroom Bathroom Kitchen Laundry and Lounge areas are clean and free from clutter, Dust wiped, floors vacuumed, mopped and swept as Namet likes, remembering Infection Control. Bathroom clothes and mops separate from other areas. Change water often. Empty Bins. Prepare lunch and prep for evening as requested</p>
                                <p>Social Support 3hrs pw – Ask Namet where she would like to go or what she would like to do. Take to appointments as required. Provide Company. Consider Artwork, Sewing, Café, Visit friends or relative cooking, going for a walk.</p>
                                <p>Shopping 3hrs pw Assist Namet by going shopping for her or take Namet if she would like to go. Put shopping away. Take a photo of any money given and list. Take a photo of receipt and change. </p>
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='697' style='width:523.0pt;margin-left:.25pt;border-collapse:collapse'>
                      <tr>
                        <td width='46' align=center></td>
                        <td width='47' align=center>M</td>
                        <td width='46' align=center>T</td>
                        <td width='47' align=center>W</td>
                        <td width='46' align=center>T</td>
                        <td width='46' align=center>F</td>
                        <td width='47' align=center>S</td>
                        <td width='46' align=center>S</td>
                        <td width='47' align=center>M</td>
                        <td width='46' align=center>T</td>
                        <td width='46' align=center>W</td>
                        <td width='47' align=center>T</td>
                        <td width='46' align=center>F</td>
                        <td width='47' align=center>S</td>
                        <td width='46' align=center>S</td>
                      </tr>
                      <tr><td align=center>7</td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                      </tr>
                      <tr><td align=center>8</td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                      </tr>
                      <tr><td align=center>9</td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                      </tr>
                      <tr><td align=center>10</td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                      </tr>
                      <tr><td align=center>11</td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                      </tr>
                      <tr><td align=center>12</td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                      </tr>
                      <tr><td align=center>13</td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                      </tr>
                      <tr><td align=center>14</td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                      </tr>
                      <tr><td align=center>15</td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                      </tr>
                      <tr><td align=center>16</td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                      </tr>
                      <tr><td align=center>17</td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                      </tr>
                      <tr><td align=center>18</td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                        <td align='center'><input type='checkbox'></td>
                      </tr>
                    </table>
                    <Br><br>
                    <table class='TableGrid' border='0' cellspacing='0' cellpadding='0' width='697' style='width:523.0pt;margin-left:.25pt;border-collapse:collapse'>
                        <tr><td>Name<br><input type='text' class='form-control'></td></tr>
                        <tr><td><br>Date<br><input type='date' class='form-control'></td></tr>
                        <tr><td><br>Signature<br><input type='file' class='form-control'></td></tr>
                    </table>
                </div> 
            </div>
        </div>
    </div>";
?>