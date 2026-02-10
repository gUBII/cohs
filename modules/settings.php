    <?php
        echo"<div class='container'>
            <div class='row'>
                <div class='col'>
                    <section class='scroll-section' id='title'>
                        <div class='page-title-container'>
                            <h1 class='mb-0 pb-0 display-4'>System Setting</h1>
                            <nav class='breadcrumb-container d-inline-block' aria-label='breadcrumb'>
                                <ul class='breadcrumb pt-0'>
                                    <li class='breadcrumb-item'><a href='index.php'>Home</a></li>
                                    <li class='breadcrumb-item'><a href='index.php'>dashboard</a></li>
                                    <li class='breadcrumb-item'><a href='index.php?url=settings.php&id=5173'>Settings</a></li>
                                </ul>
                            </nav>
                        </div>
                    </section>
                    
                    <div>
                        <section class='scroll-section' id='s1'>
                            <h2 class='small-title'>Brand Logo Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                <div>";
                                    $s1 = "select * from companysetting where id='1' order by id asc limit 1";
                                    $r1 = $conn->query($s1);
                                    if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                        echo"<fieldset>
                                            <div class='row'>
                                                <div class='col-lg-4' style='margin-bottom:15px'>
                                                    <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>
                                                        <center>
                                                            <label>Logo For Dark Mode</label><br>
                                                            <input type='hidden' name='processor' value='edit_s1a'><input type='hidden' name='id' value='1'>
                                                            <img src='".$t1["logo_dark"]."' style='height:50px;background-color:#eeeeee;padding:5px;border-radius:5px'><br>
                                                        </center><br>
                                                        <table><tr>
                                                            <td><input type='file' name='images[]' class='form-control'></td>
                                                            <td><button class='btn btn-outline-primary' type='submit'>Update</button></td>
                                                        </tr></table>
                                                    </form>
                                                </div>
                                                <div class='col-lg-4' style='margin-bottom:15px'>
                                                    <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>
                                                        <center>
                                                            <label>Logo For Light Mode</label><br>
                                                            <input type='hidden' name='processor' value='edit_s1b'><input type='hidden' name='id' value='1'>
                                                            <img src='".$t1["logo_light"]."' style='height:50px;background-color:#eeeeee;padding:5px;border-radius:5px'><br>
                                                        </center><br>
                                                        <table><tr>
                                                            <td><input type='file' name='images[]' class='form-control'></td>
                                                            <td><button class='btn btn-outline-primary' type='submit'>Update</button></td>
                                                        </tr></table>
                                                    </form>
                                                </div>
                                                <div class='col-lg-4' style='margin-bottom:15px'>
                                                    <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>
                                                        <center>
                                                            <label>Favicon Icon</label><br>
                                                            <input type='hidden' name='processor' value='edit_s1c'><input type='hidden' name='id' value='1'>
                                                            <img src='".$t1["favicon"]."' style='height:50px;background-color:#eeeeee;padding:5px;border-radius:5px'><br>
                                                        </center><br>
                                                        <table><tr>
                                                            <td><input type='file' name='images[]' class='form-control'></td>
                                                            <td><button class='btn btn-outline-primary' type='submit'>Update</button></td>
                                                        </tr></table>
                                                    </form>
                                                </div>
                                            </div>
                                        </fieldset>";
                                    } }
                                echo"</div>
                            </div></div>
                        </section>
                        
                        <section class='scroll-section' id='s1'>
                            <h2 class='small-title'>Brand Title Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                <div>";
                                    $s1 = "select * from companysetting where id='1' order by id asc limit 1";
                                    $r1 = $conn->query($s1);
                                    if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                        echo"<fieldset>
                                            <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>
                                                <input type='hidden' name='processor' value='edit_s1'><input type='hidden' name='id' value='1'>
                                                <div class='row'>
                                                    <div class='col-lg-6' style='margin-bottom:15px'><div class='form-group'>
                                                        <label>Company Title</label><input name='brand_title' type='text' value='".$t1["brand_title"]."' class='form-control' required>
                                                    </div></div>
                                                    <div class='col-lg-6' style='margin-bottom:15px'><div class='form-group'>
                                                        <label>Copyright Title</label><input name='copyright_title' type='text' value='".$t1["copyright_title"]."' class='form-control' required>
                                                    </div></div>
                                                </div>
                                                <div class='col-lg-12' style='margin-bottom:15px;text-align:right'>
                                                    <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                                </div>
                                            </form>
                                        </fieldset>";
                                    } }
                                echo"</div>
                            </div></div>
                        </section>
                        <section class='scroll-section' id='s3'>
                            <h2 class='small-title'>Company Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                    <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>";
                                        echo"<div>
                                            <input type='hidden' name='processor' value='edit_s3'><input type='hidden' name='id' value='1'>";
                                            $s1 = "select * from companysetting where id='1' order by id asc limit 1";
                                            $r1 = $conn->query($s1);
                                            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                                echo"<fieldset>
                                                    <div class='row'>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Company Name *</label><input name='companyname' type='text' value='".$t1["companyname"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>First Name *</label><input name='firstname' type='text' value='".$t1["firstname"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Last Name *</label><input name='lastname' type='text' value='".$t1["lastname"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                                            <option value='".$t1["gender"]."'>".$t1["gender"]."</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                                        </select></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Registration Number *</label><input name='registrationnumber' type='text' value='".$t1["registrationnumber"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>TIN Number *</label><input name='tinnumber' type='text' value='".$t1["tinnumber"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Phone *</label><input name='phone' type='text' value='".$t1["phone"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Email *</label><input name='email' type='text' value='".$t1["email"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Website *</label><input name='website' type='text' value='".$t1["website"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$t1["address"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>City *</label><input name='city' type='text' value='".$t1["city"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>state *</label><input name='state' type='text' value='".$t1["state"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Postal Code *</label><input name='postalcode' type='text' value='".$t1["postalcode"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Country *</label>
                                                            <select class='form-control m-b required' name='country' required>
                                                                <option value='".$t1["country"]."'>".$t1["country"]."</option>
                                                                <option value='Afghanistan'>Afghanistan</option>
                                                                <option value='Åland Islands'>Åland Islands</option>
                                                                <option value='Albania'>Albania</option>
                                                                <option value='Algeria'>Algeria</option>
                                                                <option value='American Samoa'>American Samoa</option>
                                                                <option value='Andorra'>Andorra</option>
                                                                <option value='Angola'>Angola</option>
                                                                <option value='Anguilla'>Anguilla</option>
                                                                <option value='Antarctica'>Antarctica</option>
                                                                <option value='Antigua and Barbuda'>Antigua and Barbuda</option>
                                                                <option value='Argentina'>Argentina</option>
                                                                <option value='Armenia'>Armenia</option>
                                                                <option value='Aruba'>Aruba</option>
                                                                <option value='Australia' selected>Australia</option>
                                                                <option value='Austria'>Austria</option>
                                                                <option value='Azerbaijan'>Azerbaijan</option>
                                                                <option value='Bahamas'>Bahamas</option>
                                                                <option value='Bahrain'>Bahrain</option>
                                                                <option value='Bangladesh'>Bangladesh</option>
                                                                <option value='Barbados'>Barbados</option>
                                                                <option value='Belarus'>Belarus</option>
                                                                <option value='Belgium'>Belgium</option>
                                                                <option value='Belize'>Belize</option>
                                                                <option value='Benin'>Benin</option>
                                                                <option value='Bermuda'>Bermuda</option>
                                                                <option value='Bhutan'>Bhutan</option>
                                                                <option value='Bolivia'>Bolivia</option>
                                                                <option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option>
                                                                <option value='Botswana'>Botswana</option>
                                                                <option value='Bouvet Island'>Bouvet Island</option>
                                                                <option value='Brazil'>Brazil</option>
                                                                <option value='British Indian Ocean Territory'>British Indian Ocean Territory</option>
                                                                <option value='Brunei Darussalam'>Brunei Darussalam</option>
                                                                <option value='Bulgaria'>Bulgaria</option>
                                                                <option value='Burkina Faso'>Burkina Faso</option>
                                                                <option value='Burundi'>Burundi</option>
                                                                <option value='Cambodia'>Cambodia</option>
                                                                <option value='Cameroon'>Cameroon</option>
                                                                <option value='Canada'>Canada</option>
                                                                <option value='Cape Verde'>Cape Verde</option>
                                                                <option value='Cayman Islands'>Cayman Islands</option>
                                                                <option value='Central African Republic'>Central African Republic</option>
                                                                <option value='Chad'>Chad</option>
                                                                <option value='Chile'>Chile</option>
                                                                <option value='China'>China</option>
                                                                <option value='Christmas Island'>Christmas Island</option>
                                                                <option value='Cocos (Keeling) Islands'>Cocos (Keeling) Islands</option>
                                                                <option value='Colombia'>Colombia</option>
                                                                <option value='Comoros'>Comoros</option>
                                                                <option value='Congo'>Congo</option>
                                                                <option value='Congo, The Democratic Republic of The'>Congo, The Democratic Republic of The</option>
                                                                <option value='Cook Islands'>Cook Islands</option>
                                                                <option value='Costa Rica'>Costa Rica</option>
                                                                <option value='Cote Divoire'>Cote D'ivoire</option>
                                                                <option value='Croatia'>Croatia</option>
                                                                <option value='Cuba'>Cuba</option>
                                                                <option value='Cyprus'>Cyprus</option>
                                                                <option value='Czech Republic'>Czech Republic</option>
                                                                <option value='Denmark'>Denmark</option>
                                                                <option value='Djibouti'>Djibouti</option>
                                                                <option value='Dominica'>Dominica</option>
                                                                <option value='Dominican Republic'>Dominican Republic</option>
                                                                <option value='Ecuador'>Ecuador</option>
                                                                <option value='Egypt'>Egypt</option>
                                                                <option value='El Salvador'>El Salvador</option>
                                                                <option value='Equatorial Guinea'>Equatorial Guinea</option>
                                                                <option value='Eritrea'>Eritrea</option>
                                                                <option value='Estonia'>Estonia</option>
                                                                <option value='Ethiopia'>Ethiopia</option>
                                                                <option value='Falkland Islands (Malvinas)'>Falkland Islands (Malvinas)</option>
                                                                <option value='Faroe Islands'>Faroe Islands</option>
                                                                <option value='Fiji'>Fiji</option>
                                                                <option value='Finland'>Finland</option>
                                                                <option value='France'>France</option>
                                                                <option value='French Guiana'>French Guiana</option>
                                                                <option value='French Polynesia'>French Polynesia</option>
                                                                <option value='French Southern Territories'>French Southern Territories</option>
                                                                <option value='Gabon'>Gabon</option>
                                                                <option value='Gambia'>Gambia</option>
                                                                <option value='Georgia'>Georgia</option>
                                                                <option value='Germany'>Germany</option>
                                                                <option value='Ghana'>Ghana</option>
                                                                <option value='Gibraltar'>Gibraltar</option>
                                                                <option value='Greece'>Greece</option>
                                                                <option value='Greenland'>Greenland</option>
                                                                <option value='Grenada'>Grenada</option>
                                                                <option value='Guadeloupe'>Guadeloupe</option>
                                                                <option value='Guam'>Guam</option>
                                                                <option value='Guatemala'>Guatemala</option>
                                                                <option value='Guernsey'>Guernsey</option>
                                                                <option value='Guinea'>Guinea</option>
                                                                <option value='Guinea-bissau'>Guinea-bissau</option>
                                                                <option value='Guyana'>Guyana</option>
                                                                <option value='Haiti'>Haiti</option>
                                                                <option value='Heard Island and Mcdonald Islands'>Heard Island and Mcdonald Islands</option>
                                                                <option value='Holy See (Vatican City State)'>Holy See (Vatican City State)</option>
                                                                <option value='Honduras'>Honduras</option>
                                                                <option value='Hong Kong'>Hong Kong</option>
                                                                <option value='Hungary'>Hungary</option>
                                                                <option value='Iceland'>Iceland</option>
                                                                <option value='India'>India</option>
                                                                <option value='Indonesia'>Indonesia</option>
                                                                <option value='Iran, Islamic Republic of'>Iran, Islamic Republic of</option>
                                                                <option value='Iraq'>Iraq</option>
                                                                <option value='Ireland'>Ireland</option>
                                                                <option value='Isle of Man'>Isle of Man</option>
                                                                <option value='Israel'>Israel</option>
                                                                <option value='Italy'>Italy</option>
                                                                <option value='Jamaica'>Jamaica</option>
                                                                <option value='Japan'>Japan</option>
                                                                <option value='Jersey'>Jersey</option>
                                                                <option value='Jordan'>Jordan</option>
                                                                <option value='Kazakhstan'>Kazakhstan</option>
                                                                <option value='Kenya'>Kenya</option>
                                                                <option value='Kiribati'>Kiribati</option>
                                                                <option value='Korea, Democratic People`s Republic of'>Korea, Democratic People's Republic of</option>
                                                                <option value='Korea, Republic of'>Korea, Republic of</option>
                                                                <option value='Kuwait'>Kuwait</option>
                                                                <option value='Kyrgyzstan'>Kyrgyzstan</option>
                                                                <option value='Lao People`s Democratic Republic'>Lao People's Democratic Republic</option>
                                                                <option value='Latvia'>Latvia</option>
                                                                <option value='Lebanon'>Lebanon</option>
                                                                <option value='Lesotho'>Lesotho</option>
                                                                <option value='Liberia'>Liberia</option>
                                                                <option value='Libyan Arab Jamahiriya'>Libyan Arab Jamahiriya</option>
                                                                <option value='Liechtenstein'>Liechtenstein</option>
                                                                <option value='Lithuania'>Lithuania</option>
                                                                <option value='Luxembourg'>Luxembourg</option>
                                                                <option value='Macao'>Macao</option>
                                                                <option value='Macedonia, The Former Yugoslav Republic of'>Macedonia, The Former Yugoslav Republic of</option>
                                                                <option value='Madagascar'>Madagascar</option>
                                                                <option value='Malawi'>Malawi</option>
                                                                <option value='Malaysia'>Malaysia</option>
                                                                <option value='Maldives'>Maldives</option>
                                                                <option value='Mali'>Mali</option>
                                                                <option value='Malta'>Malta</option>
                                                                <option value='Marshall Islands'>Marshall Islands</option>
                                                                <option value='Martinique'>Martinique</option>
                                                                <option value='Mauritania'>Mauritania</option>
                                                                <option value='Mauritius'>Mauritius</option>
                                                                <option value='Mayotte'>Mayotte</option>
                                                                <option value='Mexico'>Mexico</option>
                                                                <option value='Micronesia, Federated States of'>Micronesia, Federated States of</option>
                                                                <option value='Moldova, Republic of'>Moldova, Republic of</option>
                                                                <option value='Monaco'>Monaco</option>
                                                                <option value='Mongolia'>Mongolia</option>
                                                                <option value='Montenegro'>Montenegro</option>
                                                                <option value='Montserrat'>Montserrat</option>
                                                                <option value='Morocco'>Morocco</option>
                                                                <option value='Mozambique'>Mozambique</option>
                                                                <option value='Myanmar'>Myanmar</option>
                                                                <option value='Namibia'>Namibia</option>
                                                                <option value='Nauru'>Nauru</option>
                                                                <option value='Nepal'>Nepal</option>
                                                                <option value='Netherlands'>Netherlands</option>
                                                                <option value='Netherlands Antilles'>Netherlands Antilles</option>
                                                                <option value='New Caledonia'>New Caledonia</option>
                                                                <option value='New Zealand'>New Zealand</option>
                                                                <option value='Nicaragua'>Nicaragua</option>
                                                                <option value='Niger'>Niger</option>
                                                                <option value='Nigeria'>Nigeria</option>
                                                                <option value='Niue'>Niue</option>
                                                                <option value='Norfolk Island'>Norfolk Island</option>
                                                                <option value='Northern Mariana Islands'>Northern Mariana Islands</option>
                                                                <option value='Norway'>Norway</option>
                                                                <option value='Oman'>Oman</option>
                                                                <option value='Pakistan'>Pakistan</option>
                                                                <option value='Palau'>Palau</option>
                                                                <option value='Palestinian Territory, Occupied'>Palestinian Territory, Occupied</option>
                                                                <option value='Panama'>Panama</option>
                                                                <option value='Papua New Guinea'>Papua New Guinea</option>
                                                                <option value='Paraguay'>Paraguay</option>
                                                                <option value='Peru'>Peru</option>
                                                                <option value='Philippines'>Philippines</option>
                                                                <option value='Pitcairn'>Pitcairn</option>
                                                                <option value='Poland'>Poland</option>
                                                                <option value='Portugal'>Portugal</option>
                                                                <option value='Puerto Rico'>Puerto Rico</option>
                                                                <option value='Qatar'>Qatar</option>
                                                                <option value='Reunion'>Reunion</option>
                                                                <option value='Romania'>Romania</option>
                                                                <option value='Russian Federation'>Russian Federation</option>
                                                                <option value='Rwanda'>Rwanda</option>
                                                                <option value='Saint Helena'>Saint Helena</option>
                                                                <option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option>
                                                                <option value='Saint Lucia'>Saint Lucia</option>
                                                                <option value='Saint Pierre and Miquelon'>Saint Pierre and Miquelon</option>
                                                                <option value='Saint Vincent and The Grenadines'>Saint Vincent and The Grenadines</option>
                                                                <option value='Samoa'>Samoa</option>
                                                                <option value='San Marino'>San Marino</option>
                                                                <option value='Sao Tome and Principe'>Sao Tome and Principe</option>
                                                                <option value='Saudi Arabia'>Saudi Arabia</option>
                                                                <option value='Senegal'>Senegal</option>
                                                                <option value='Serbia'>Serbia</option>
                                                                <option value='Seychelles'>Seychelles</option>
                                                                <option value='Sierra Leone'>Sierra Leone</option>
                                                                <option value='Singapore'>Singapore</option>
                                                                <option value='Slovakia'>Slovakia</option>
                                                                <option value='Slovenia'>Slovenia</option>
                                                                <option value='Solomon Islands'>Solomon Islands</option>
                                                                <option value='Somalia'>Somalia</option>
                                                                <option value='South Africa'>South Africa</option>
                                                                <option value='South Georgia and The South Sandwich Islands'>South Georgia and The South Sandwich Islands</option>
                                                                <option value='Spain'>Spain</option>
                                                                <option value='Sri Lanka'>Sri Lanka</option>
                                                                <option value='Sudan'>Sudan</option>
                                                                <option value='Suriname'>Suriname</option>
                                                                <option value='Svalbard and Jan Mayen'>Svalbard and Jan Mayen</option>
                                                                <option value='Swaziland'>Swaziland</option>
                                                                <option value='Sweden'>Sweden</option>
                                                                <option value='Switzerland'>Switzerland</option>
                                                                <option value='Syrian Arab Republic'>Syrian Arab Republic</option>
                                                                <option value='Taiwan'>Taiwan</option>
                                                                <option value='Tajikistan'>Tajikistan</option>
                                                                <option value='Tanzania, United Republic of'>Tanzania, United Republic of</option>
                                                                <option value='Thailand'>Thailand</option>
                                                                <option value='Timor-leste'>Timor-leste</option>
                                                                <option value='Togo'>Togo</option>
                                                                <option value='Tokelau'>Tokelau</option>
                                                                <option value='Tonga'>Tonga</option>
                                                                <option value='Trinidad and Tobago'>Trinidad and Tobago</option>
                                                                <option value='Tunisia'>Tunisia</option>
                                                                <option value='Turkey'>Turkey</option>
                                                                <option value='Turkmenistan'>Turkmenistan</option>
                                                                <option value='Turks and Caicos Islands'>Turks and Caicos Islands</option>
                                                                <option value='Tuvalu'>Tuvalu</option>
                                                                <option value='Uganda'>Uganda</option>
                                                                <option value='Ukraine'>Ukraine</option>
                                                                <option value='United Arab Emirates'>United Arab Emirates</option>
                                                                <option value='United Kingdom'>United Kingdom</option>
                                                                <option value='United States'>United States</option>
                                                                <option value='United States Minor Outlying Islands'>United States Minor Outlying Islands</option>
                                                                <option value='Uruguay'>Uruguay</option>
                                                                <option value='Uzbekistan'>Uzbekistan</option>
                                                                <option value='Vanuatu'>Vanuatu</option>
                                                                <option value='Venezuela'>Venezuela</option>
                                                                <option value='Viet Nam'>Viet Nam</option>
                                                                <option value='Virgin Islands, British'>Virgin Islands, British</option>
                                                                <option value='Virgin Islands, U.S.'>Virgin Islands, U.S.</option>
                                                                <option value='Wallis and Futuna'>Wallis and Futuna</option>
                                                                <option value='Western Sahara'>Western Sahara</option>
                                                                <option value='Yemen'>Yemen</option>
                                                                <option value='Zambia'>Zambia</option>
                                                                <option value='Zimbabwe'>Zimbabwe</option>    
                                                            </select>
                                                        </div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Company Detail *</label><input name='companydetail' type='text' value='".$t1["companydetail"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Account Status *</label><select class='form-control m-b required ' name='status'>
                                                            <option value='".$t1["status"]."'>".$t1["status"]."</option><option value='ON'>ON</option><option value='OFF'>OFF</option>
                                                        </select></div></div>
                                                    </div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button class='btn btn-primary' type='reset' >Reset</button>&nbsp;&nbsp; <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                                </div>";
                                            } }
                                        echo"</div>
                                    </form>
                            </div></div>
                        </section>
                        <section class='scroll-section' id='s2'>
                            <h2 class='small-title'>System Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                    <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>";
                                        echo"<div>
                                            <input type='hidden' name='processor' value='edit_s2'><input type='hidden' name='id' value='1'>";
                                            $s1 = "select * from companysetting where id='1' order by id asc limit 1";
                                            $r1 = $conn->query($s1);
                                            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                                $register_date=date("Y-m-d", $t1["register_date"]);
                                                $fstartdate=date("Y-m-d", $t1["fstartdate"]);
                                                $fenddate=date("Y-m-d", $t1["fenddate"]);
                                                $expire_date=date("Y-m-d", $t1["expire_date"]);
                                                echo"<fieldset>
                                                    <div class='row'>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>ndis Number *</label><input name='ndis_number' type='text' value='".$t1["ndis_number"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>abn Number *</label><input name='abn_number' type='text' value='".$t1["abn_number"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>bsb Number *</label><input name='bsb_number' type='text' value='".$t1["bsb_number"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>A/c Number *</label><input name='ac_number' type='text' value='".$t1["ac_number"]."' class='form-control' required></div></div>
                                                        
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Register Date *</label><input name='register_date' type='date' value='$register_date' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Subscription Plan *</label><input name='subscription_type' type='text' value='".$t1["subscription_type"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Expire Date *</label><input name='expire_date' type='date' value='$expire_date' class='form-control' required></div></div>
                                        
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Fiscal Start Date *</label><input name='fstartdate' type='date' value='$fstartdate' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Fiscal End Date *</label><input name='fenddate' type='date' value='$fenddate' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Currency Code *</label><input name='currencycode' type='text' value='".$t1["currencycode"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Currency Symbol *</label><input name='currencysymbol' type='text' value='".$t1["currencysymbol"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Language *</label><input name='language' type='text' value='".$t1["language"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Date Format *</label><input name='date_format' type='text' value='".$t1["date_format"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Time Zone *</label><input name='timezone' type='text' value='".$t1["timezone"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Time Format *</label><input name='time_format' type='text' value='".$t1["time_format"]."' class='form-control' required></div></div>
                                                    </div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button class='btn btn-primary' type='reset' >Reset</button>&nbsp;&nbsp; <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                                </div>";
                                            } }
                                        echo"</div>
                                    </form>
                            </div></div>
                        </section>
                        <section class='scroll-section' id='s4'>
                            <h2 class='small-title'>Accounts Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                    <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>";
                                        echo"<div> 
                                            <input type='hidden' name='processor' value='edit_s4'><input type='hidden' name='id' value='1'>";
                                            $s1 = "select * from companysetting where id='1' order by id asc limit 1";
                                            $r1 = $conn->query($s1);
                                            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                                $pdate=date("Y-m-d", $t1["date"]);
                                                $jdate=date("Y-m-d", $t1["jointime"]);
                                                $dob=date("Y-m-d", $t1["dob"]);
                                                echo"<fieldset>
                                                    <div class='row'>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Voucher Mode *</label>
                                                            <select class='form-control m-b required ' name='vouchermode'><option value='".$t1["vouchermode"]."'>".$t1["vouchermode"]."</option><option value='NAME'>NAME</option><option value='ID'>ID</option></select>
                                                        </div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>VAT Number *</label><input name='vatnumber' type='text' value='".$t1["vatnumber"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>VAT Percentage *</label><input name='vatpercentage' type='text' value='".$t1["vatpercentage"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-3' style='margin-bottom:15px'><div class='form-group'><label>Received Voucer *</label><input name='receive_v' type='text' value='".$t1["receive_v"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-3' style='margin-bottom:15px'><div class='form-group'><label>Payment Voucher *</label><input name='payment_v' type='text' value='".$t1["payment_v"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-3' style='margin-bottom:15px'><div class='form-group'><label>Journal Voucher *</label><input name='journal_v' type='text' value='".$t1["journal_v"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-3' style='margin-bottom:15px'><div class='form-group'><label>Invoice Prefix *</label><input name='invoice_prefix' type='text' value='".$t1["invoice_prefix"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-12' style='margin-bottom:15px'><div class='form-group'><label>Invoice Note *</label><input name='invoice_note' type='text' value='".$t1["invoice_note"]."' class='form-control' required></div></div>
                                                        
                                                        
                                                        <div class='col-lg-3' style='margin-bottom:15px'><div class='form-group'><label>Cash Book *</label>
                                                            <select class='form-control m-b required ' name='cashbook'>";
                                                                $sv1 = "select * from ledger_group where id='".$t1["cashbook"]."' order by id asc limit 1";
                                                                $sv2 = $conn->query($sv1);
                                                                if ($sv2->num_rows > 0) { while($sv3 = $sv2->fetch_assoc()) { echo"<option value='".$sv3["id"]."'>".$sv3["group_name"]."</option>"; } }
                                                                $sv1 = "select * from ledger_group where status='ON' order by group_name asc";
                                                                $sv2 = $conn->query($sv1);
                                                                if ($sv2->num_rows > 0) { while($sv3 = $sv2->fetch_assoc()) { echo"<option value='".$sv3["id"]."'>".$sv3["group_name"]."</option>"; } }
                                                            echo"</select>
                                                        </div></div>
                                                        
                                                        <div class='col-lg-3' style='margin-bottom:15px'><div class='form-group'><label>Bank Book *</label>
                                                            <select class='form-control m-b required ' name='bankbook'>";
                                                                $sv1 = "select * from ledger_group where id='".$t1["bankbook"]."' order by id asc limit 1";
                                                                $sv2 = $conn->query($sv1);
                                                                if ($sv2->num_rows > 0) { while($sv3 = $sv2->fetch_assoc()) { echo"<option value='".$sv3["id"]."'>".$sv3["group_name"]."</option>"; } }
                                                                $sv1 = "select * from ledger_group where status='ON' order by group_name asc";
                                                                $sv2 = $conn->query($sv1);
                                                                if ($sv2->num_rows > 0) { while($sv3 = $sv2->fetch_assoc()) { echo"<option value='".$sv3["id"]."'>".$sv3["group_name"]."</option>"; } }
                                                            echo"</select>
                                                        </div></div>
                                                        
                                                        <div class='col-lg-3' style='margin-bottom:15px'><div class='form-group'>
                                                            <label>Sales A/c Head *</label>
                                                            <select class='form-select' name='sales_v' required='' >";
                                                                $sv1 = "select * from ledger_group where id='".$t1["sales_v"]."' order by id asc limit 1";
                                                                $sv2 = $conn->query($sv1);
                                                                if ($sv2->num_rows > 0) { while($sv3 = $sv2->fetch_assoc()) { echo"<option value='".$sv3["id"]."'>".$sv3["group_name"]."</option>"; } }
                                                                $sv1 = "select * from ledger_group where status='ON' order by group_name asc";
                                                                $sv2 = $conn->query($sv1);
                                                                if ($sv2->num_rows > 0) { while($sv3 = $sv2->fetch_assoc()) { echo"<option value='".$sv3["id"]."'>".$sv3["group_name"]."</option>"; } }
                                                            echo"</select>
                                                        </div></div>
                                                        
                                                        <div class='col-lg-3' style='margin-bottom:15px'><div class='form-group'>
                                                            <label>Purchase A/c Head *</label>
                                                            <select class='form-select' name='purchase_v' required='' >";
                                                                $sv1 = "select * from ledger_group where id='".$t1["purchase_v"]."' order by id asc limit 1";
                                                                $sv2 = $conn->query($sv1);
                                                                if ($sv2->num_rows > 0) { while($sv3 = $sv2->fetch_assoc()) { echo"<option value='".$sv3["id"]."'>".$sv3["group_name"]."</option>"; } }                                    
                                                                $sv1 = "select * from ledger_group where status='ON' order by group_name asc";
                                                                $sv2 = $conn->query($sv1);
                                                                if ($sv2->num_rows > 0) { while($sv3 = $sv2->fetch_assoc()) { echo"<option value='".$sv3["id"]."'>".$sv3["group_name"]."</option>"; } }                                    
                                                            echo"</select>
                                                        </div></div>
                                                        
                                                    </div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button class='btn btn-primary' type='reset' >Reset</button>&nbsp;&nbsp; <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                                </div>";
                                            } }
                                        echo"</div>
                                    </form>

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s5'>
                            <h2 class='small-title'>CRM Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                    <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>";
                                        echo"<div>
                                            <input type='hidden' name='processor' value='edit_s2'><input type='hidden' name='id' value='1'>";
                                            $s1 = "select * from companysetting where id='1' order by id asc limit 1";
                                            $r1 = $conn->query($s1);
                                            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                                $pdate=date("Y-m-d", $t1["date"]);
                                                $jdate=date("Y-m-d", $t1["jointime"]);
                                                $dob=date("Y-m-d", $t1["dob"]);
                                                echo"<fieldset>
                                                    <div class='row'>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Attendance Mode *</label><input name='attendancemode' type='text' value='".$t1["attendancemode"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Attendance Device IP *</label><input name='deviceip' type='text' value='".$t1["deviceip"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Ware House *</label><input name='warehouse' type='text' value='".$t1["warehouse"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Data File Location *</label><input name='datafilelocation' type='text' value='".$t1["datafilelocation"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Total Employee *</label><input name='total_employee' type='text' value='".$t1["total_employee"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Purpose of Use *</label><input name='purpose_of_use' type='text' value='".$t1["purpose_of_use"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Referred Source *</label><input name='referred_source' type='text' value='".$t1["referred_source"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Applicaiton ID *</label><input name='application_id' type='text' value='".$t1["application_id"]."' class='form-control' required></div></div>
                                                    </div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button class='btn btn-primary' type='reset' >Reset</button>&nbsp;&nbsp; <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                                </div>";
                                            } }
                                        echo"</div>
                                    </form>
                            </div></div>
                        </section>
                        <section class='scroll-section' id='s6'>
                            <h2 class='small-title'>HRM Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                    <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>";
                                        echo"<div>
                                            <input type='hidden' name='processor' value='edit_s6'><input type='hidden' name='id' value='1'>";
                                            $s1 = "select * from companysetting where id='1' order by id asc limit 1";
                                            $r1 = $conn->query($s1);
                                            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                                $pdate=date("Y-m-d", $t1["date"]);
                                                $jdate=date("Y-m-d", $t1["jointime"]);
                                                $dob=date("Y-m-d", $t1["dob"]);
                                                echo"<fieldset>
                                                    <div class='row'>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Attendance Mode *</label><input name='attendancemode' type='text' value='".$t1["attendancemode"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Attendance Device IP *</label><input name='deviceip' type='text' value='".$t1["deviceip"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Data File Location *</label><input name='datafilelocation' type='text' value='".$t1["datafilelocation"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Total Employee *</label><input name='total_employee' type='text' value='".$t1["total_employee"]."' class='form-control' required></div></div>
                                                        
                                                    </div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button class='btn btn-primary' type='reset' >Reset</button>&nbsp;&nbsp; <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                                </div>";
                                            } }
                                        echo"</div>
                                    </form>

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s17'>
                            <h2 class='small-title'>XERO Integrated API</h2>
                            <div class='card mb-5'><div class='card-body'>
                                <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>";
                                        echo"<div>
                                            <input type='hidden' name='processor' value='edit_s17'><input type='hidden' name='id' value='1'>";
                                            $s1 = "select * from companysetting where id='1' order by id asc limit 1";
                                            $r1 = $conn->query($s1);
                                            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                                $pdate=date("Y-m-d", $t1["date"]);
                                                $jdate=date("Y-m-d", $t1["jointime"]);
                                                $dob=date("Y-m-d", $t1["dob"]);
                                                echo"<fieldset>
                                                    <div class='row'>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>XERO Client ID *</label><input name='xero_client_id' type='text' value='".$t1["xero_client_id"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Client Secret # *</label><input name='xero_client_secret' type='text' value='".$t1["xero_client_secret"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Redirect URL *</label><input name='xero_redirect_url' type='text' value='".$t1["xero_redirect_url"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Authentication URL *</label><input name='xero_auth_url' type='text' value='".$t1["xero_auth_url"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Scope *</label><input name='xero_scope' type='text' readonly value='openid profile email accounting.transactions payroll.employees payroll.payruns' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Tanent ID *</label><input name='xero_tanent_id' type='text' value='Universal' readonly class='form-control' required></div></div>
                                                        
                                                        
                                                    </div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button class='btn btn-primary' type='reset' >Reset</button>&nbsp;&nbsp; <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                                </div>";
                                            } }
                                        echo"</div>
                                    </form>

                            </div></div>
                        </section>
                        ";
                        /*
                        <section class='scroll-section' id='s7'>
                            <h2 class='small-title'>NDIS Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s8'>
                            <h2 class='small-title'>Aged Care Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s9'>
                            <h2 class='small-title'>Workforce Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s0'>
                            <h2 class='small-title'>POS Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s11'>
                            <h2 class='small-title'>Retail Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s12'>
                            <h2 class='small-title'>Purchase Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s13'>
                            <h2 class='small-title'>Sales Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s14'>
                            <h2 class='small-title'>Account Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s15'>
                            <h2 class='small-title'>Currency Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s16'>
                            <h2 class='small-title'>Barcode Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s17'>
                            <h2 class='small-title'>Support Ticket</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s18'>
                            <h2 class='small-title'>Documents Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        */
                        echo"<section class='scroll-section' id='s19'>
                            <h2 class='small-title'>Email Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                    <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>";
                                        echo"<div>
                                            <input type='hidden' name='processor' value='edit_s19'><input type='hidden' name='id' value='1'>";

                                            $s1 = "select * from companysetting where id='1' order by id asc limit 1";
                                            $r1 = $conn->query($s1);
                                            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                                echo"<fieldset>
                                                    <div class='row'>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Host Name *</label><input name='email_host' type='text' value='".$t1["email_host"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>SMTP Authentication *</label>
                                                            <select class='form-control m-b required ' name='email_smtpauth'><option value='".$t1["email_smtpauth"]."'>".$t1["email_smtpauth"]."</option><option value='true'>true</option><option value='false'>false</option></select>
                                                        </div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>SMTP Port *</label><input name='email_smtpport' type='number' value='".$t1["email_smtpport"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Gmail Email Address *</label><input name='email_username' type='email' value='".$t1["email_username"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Gmail Login Password *</label><input name='email_password' type='password' value='".$t1["email_password"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>CC Email Address *</label><input name='email_cc' type='email' value='".$t1["email_cc"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>BCC Email Address *</label><input name='email_bcc' type='email' value='".$t1["email_bcc"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-8' style='margin-bottom:15px'><div class='form-group'><label>Email Subject Prefix *</label><input name='email_subject' type='text' value='".$t1["email_subject"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-12' style='margin-bottom:15px'><div class='form-group'><label>Email Body Prefix *</label>
                                                            <textarea name='email_body' class='form-control' required>".$t1["email_body"]."</textarea>
                                                        </div></div>
                                                    </div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button class='btn btn-primary' type='reset' >Reset</button>&nbsp;&nbsp; <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                                </div>";
                                            } }
                                        echo"</div>
                                    </form>

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s20'>
                            <h2 class='small-title'>Email Notification Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                    

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s21'>
                            <h2 class='small-title'>Social Networks</h2>
                            <div class='card mb-5'><div class='card-body'>
                                    <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>";
                                        echo"<div>
                                            <input type='hidden' name='processor' value='edit_s21'><input type='hidden' name='id' value='1'>";

                                            $s1 = "select * from companysetting where id='1' order by id asc limit 1";
                                            $r1 = $conn->query($s1);
                                            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                                echo"<fieldset>
                                                    <div class='row'>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Facebook Link *</label><input name='social_facebook' type='text' value='".$t1["social_facebook"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>X (Twitter) *</label><input name='social_x' type='text' value='".$t1["social_x"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>LinkedIN *</label><input name='social_linkedin' type='text' value='".$t1["social_linkedin"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Youtube *</label><input name='social_youtube' type='text' value='".$t1["social_youtube"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Instagram *</label><input name='social_instagram' type='text' value='".$t1["social_instagram"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Pinterest *</label><input name='social_pinterest' type='text' value='".$t1["social_pinterest"]."' class='form-control' required></div></div>
                                                        
                                                    </div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button class='btn btn-primary' type='reset' >Reset</button>&nbsp;&nbsp; <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                                </div>";
                                            } }
                                        echo"</div>
                                    </form>

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s22'>
                            <h2 class='small-title'>WhatsApp API Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>";
                                    echo"<div>
                                        <input type='hidden' name='processor' value='edit_s22'><input type='hidden' name='id' value='1'>";
                                            $s1 = "select * from companysetting where id='1' order by id asc limit 1";
                                            $r1 = $conn->query($s1);
                                            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                                echo"<fieldset>
                                                    <div class='row'>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>What`s App Mobile Number *</label><input name='whatsapp_number' type='text' value='".$t1["whatsapp_number"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Default Message *</label><input name='whatsapp_message' type='text' value='".$t1["whatsapp_message"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>API Key *</label><input name='whatsapp_api' type='text' value='".$t1["whatsapp_api"]."' class='form-control'></div></div>
                                                    </div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button class='btn btn-primary' type='reset' >Reset</button>&nbsp;&nbsp; <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                                </div>";
                                            } }
                                        echo"</div>
                                    </form> 

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s23'>
                            <h2 class='small-title'>SMS Gateway</h2>
                            <div class='card mb-5'><div class='card-body'>
                                    <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>";
                                        echo"<div>
                                            <input type='hidden' name='processor' value='edit_s23'><input type='hidden' name='id' value='1'>";

                                            $s1 = "select * from companysetting where id='1' order by id asc limit 1";
                                            $r1 = $conn->query($s1);
                                            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                                echo"<fieldset>
                                                    <div class='row'>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>API Key *</label><input name='sms_api_key' type='text' value='".$t1["sms_api_key"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Sender ID *</label><input name='sms_senderid' type='number' value='".$t1["sms_senderid"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>SMS Type *</label>
                                                            <select class='form-control m-b required ' name='sms_type'><option value='".$t1["sms_type"]."'>".$t1["sms_type"]."</option><option value='text'>text</option><option value='unicode'>unicode</option></select>
                                                        </div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>SMS Label *</label>
                                                            <select class='form-control m-b required ' name='sms_label'><option value='".$t1["sms_label"]."'>".$t1["sms_label"]."</option><option value='transactional'>transactional</option><option value='promotional'>promotional</option></select>
                                                        </div></div>
                                                    </div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button class='btn btn-primary' type='reset' >Reset</button>&nbsp;&nbsp; <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                                </div>";
                                            } }
                                        echo"</div>
                                    </form>    

                            </div></div>
                        </section>";
                        /*
                        <section class='scroll-section' id='s24'>
                            <h2 class='small-title'>Woocommerce Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s25'>
                            <h2 class='small-title'>Google Meet Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s26'>
                            <h2 class='small-title'>Zoom Meeting</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s27'>
                            <h2 class='small-title'>Google Calendar</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s28'>
                            <h2 class='small-title'>Outlook Calendar</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s29'>
                            <h2 class='small-title'>Google Drive Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s30'>
                            <h2 class='small-title'>Google Sheet Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s31'>
                            <h2 class='small-title'>OneDrive Settings</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s32'>
                            <h2 class='small-title'>MailChimp</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s33'>
                            <h2 class='small-title'>Pabbly Connect</h2>
                            <div class='card mb-5'><div class='card-body'>
                                

                            </div></div>
                        </section>
                        */
                        echo"<section class='scroll-section' id='s34'>
                            <h2 class='small-title'>APP Store Links</h2>
                            <div class='card mb-5'><div class='card-body'>
                                    <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>";
                                        echo"<div>
                                            <input type='hidden' name='processor' value='edit_s34'><input type='hidden' name='id' value='1'>";

                                            $s1 = "select * from companysetting where id='1' order by id asc limit 1";
                                            $r1 = $conn->query($s1);
                                            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                                echo"<fieldset>
                                                    <div class='row'>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Google Play Store Link *</label><input name='google_store' type='text' value='".$t1["google_store"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>IOS Play Store Link *</label><input name='ios_store' type='number' value='".$t1["ios_store"]."' class='form-control' required></div></div>
                                                    </div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button class='btn btn-primary' type='reset' >Reset</button>&nbsp;&nbsp; <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                                </div>";
                                            } }
                                        echo"</div>
                                    </form> 

                            </div></div>
                        </section>
                        <section class='scroll-section' id='s35'>
                            <h2 class='small-title'>Access Control</h2>
                            <div class='card mb-5'><div class='card-body'>
                                    <form method='post' action='setting_processor.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm'>";
                                        echo"<div>
                                            <input type='hidden' name='processor' value='edit_s35'><input type='hidden' name='id' value='1'>";

                                            $s1 = "select * from companysetting where id='1' order by id asc limit 1";
                                            $r1 = $conn->query($s1);
                                            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                                echo"<fieldset>
                                                    <div class='row'>
                                                        <div class='col-lg-6' style='margin-bottom:15px'><div class='form-group'><label>Location Access *</label>
                                                            <select class='form-control m-b required ' name='location_access'><option value='".$t1["location_access"]."'>".$t1["location_access"]."</option><option value='YES'>YES</option><option value='NO'>NO</option></select>
                                                        </div></div>
                                                        <div class='col-lg-6' style='margin-bottom:15px'><div class='form-group'><label>Camera Access *</label>
                                                            <select class='form-control m-b required ' name='camera_access'><option value='".$t1["camera_access"]."'>".$t1["camera_access"]."</option><option value='YES'>YES</option><option value='NO'>NO</option></select>
                                                        </div></div>
                                                        <div class='col-lg-12' style='margin-bottom:15px'><div class='form-group'><label>Login Suspended Users</label>";
                                                            echo"<select multiple='multiple' data-tags='true' data-close-on-select='false' id='selectDataApi' name='login_suspended[]' style='width:100%'>";
                                                                $tomtom=$t1["login_suspended"];
                                                                echo"<option value='1' selected>";
                                                                $arr = array($tomtom);
                                                                echo implode("</option><option value='$arr' selected>",$arr);
                                                                
                                                                // $c4 = "select * from uerp_user where id like '%".$t1["login_suspended"]."%' and status='1' order by username asc";
                                                                // $c44 = $conn->query($c4);
                                                                // if ($c44->num_rows > 0) { while($c444 = $c44 -> fetch_assoc()) { echo"<option value='".$c444["id"]."' selected>".$c444["username"]." ".$c444["username"]." (".$c444["id"].")</option>"; } }
                                                                
                                                                $c2 = "select * from uerp_user where mtype='EMPLOYEE' and status='1' order by username asc";
                                                                $c22 = $conn->query($c2);
                                                                if ($c22->num_rows > 0) { while($c222 = $c22 -> fetch_assoc()) { echo"<option value='".$c222["username"]." ".$c222["username"]." (".$c222["id"].")'>".$c222["username"]." ".$c222["username"]." (".$c222["id"].")</option>"; } }
                                                                
                                                            echo"</select>
                                                        </div></div>
                                                    </div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button class='btn btn-primary' type='reset' >Reset</button>&nbsp;&nbsp; <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas'>Update</button>
                                                </div>";
                                            } }
                                        echo"</div>
                                    </form>

                            </div></div>
                        </section>
                    </div>
                </div>

                <div class='col-md-auto d-none d-lg-block' id='scrollSpyMenu'>
                    <ul class='nav flex-column'>
                        <li><a class='nav-link'><i data-acorn-icon='chevron-down'></i><span>Active List</span></a></li>
                        <li><a class='nav-link' href='#s1'><i data-acorn-icon='chevron-right'></i><span>Brand Settings</span></a></li>
                        <li><a class='nav-link' href='#s2'><i data-acorn-icon='chevron-right'></i><span>System Settings</span></a></li>
                        <li><a class='nav-link' href='#s3'><i data-acorn-icon='chevron-right'></i><span>Company Settings</span></a></li>
                        <li><a class='nav-link' href='#s4'><i data-acorn-icon='chevron-right'></i><span>Accounts Settings</span></a></li>
                        <li><a class='nav-link' href='#s19'><i data-acorn-icon='chevron-right'></i><span>Email Gateway</span></a></li>
                        <li><a class='nav-link' href='#s21'><i data-acorn-icon='chevron-right'></i><span>Social Links</span></a></li>
                        <li><a class='nav-link' href='#s22'><i data-acorn-icon='chevron-right'></i><span>WhatsApp API Settings</span></a></li>
                        <li><a class='nav-link' href='#s23'><i data-acorn-icon='chevron-right'></i><span>SMS Gateway</span></a></li> 
                        <li><a class='nav-link' href='#s34'><i data-acorn-icon='chevron-right'></i><span>APP Store Links</span></a></li>
                        <li><a class='nav-link' href='#s35'><i data-acorn-icon='chevron-right'></i><span>Access Control</span></a></li>
                        <li><a class='nav-link' href='#s17'><i data-acorn-icon='chevron-right'></i><span>XERO PayRun API</span></a></li>
                        <li><a class='nav-link' href='#s18'><i data-acorn-icon='chevron-right'></i><span>Documents</span></a></li>
                        <li><a class='nav-link' href='#s23'><i data-acorn-icon='chevron-right'></i><span>Push Notification</span></a></li> 
                        
                        <li><a class='nav-link' href='#s17'><i data-acorn-icon='chevron-right'></i><span>Support Ticket</span></a></li>";
                        /*
                        <li><hr></li>
                        <li><a class='nav-link'><i data-acorn-icon='chevron-down'></i><span>Upcomig List</span></a></li>
                        <li><a class='nav-link' href='#s5'><i data-acorn-icon='chevron-right'></i><span>CRM Settings</span></a></li>
                        <li><a class='nav-link' href='#s6'><i data-acorn-icon='chevron-right'></i><span>HRM Settings</span></a></li>
                        <li><a class='nav-link' href='#s7'><i data-acorn-icon='chevron-right'></i><span>NDIS Settings</span></a></li>
                        <li><a class='nav-link' href='#s8'><i data-acorn-icon='chevron-right'></i><span>Aged Care Settings</span></a></li>
                        <li><a class='nav-link' href='#s9'><i data-acorn-icon='chevron-right'></i><span>Workforce Settings</span></a></li>
                        <li><a class='nav-link' href='#s10'><i data-acorn-icon='chevron-right'></i><span>POS Settings</span></a></li>
                        <li><a class='nav-link' href='#s11'><i data-acorn-icon='chevron-right'></i><span>Retail Settings</span></a></li>
                        <li><a class='nav-link' href='#s12'><i data-acorn-icon='chevron-right'></i><span>Purchase Settings</span></a></li>
                        <li><a class='nav-link' href='#s13'><i data-acorn-icon='chevron-right'></i><span>Sales Settings</span></a></li>
                        <li><a class='nav-link' href='#s16'><i data-acorn-icon='chevron-right'></i><span>Barcode Settings</span></a></li>
                        <li><a class='nav-link' href='#s24'><i data-acorn-icon='chevron-right'></i><span>Woocommerce Settings</span></a></li>
                        <li><a class='nav-link' href='#s25'><i data-acorn-icon='chevron-right'></i><span>Google Meet Settings</span></a></li>
                        <li><a class='nav-link' href='#s26'><i data-acorn-icon='chevron-right'></i><span>Zoom Meeting</span></a></li>
                        <li><a class='nav-link' href='#s27'><i data-acorn-icon='chevron-right'></i><span>Google Calendar</span></a></li>
                        <li><a class='nav-link' href='#s28'><i data-acorn-icon='chevron-right'></i><span>Outlook Calendar</span></a></li>
                        <li><a class='nav-link' href='#s29'><i data-acorn-icon='chevron-right'></i><span>Google Drive Settings</span></a></li>
                        <li><a class='nav-link' href='#s30'><i data-acorn-icon='chevron-right'></i><span>Google Sheet Settings</span></a></li>
                        <li><a class='nav-link' href='#s31'><i data-acorn-icon='chevron-right'></i><span>OneDrive Settings</span></a></li>
                        <li><a class='nav-link' href='#s32'><i data-acorn-icon='chevron-right'></i><span>MailChimp</span></a></li>
                        <li><a class='nav-link' href='#s33'><i data-acorn-icon='chevron-right'></i><span>Pabbly Connect</span></a></li>
                        */
                    echo"</ul>
                </div>
            </div>
        </div>";
    ?>