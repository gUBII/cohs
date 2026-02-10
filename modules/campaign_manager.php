<?php
    $cdate=time();
    $cdate=date("Y-m-d", $cdate);    
    $cid=$_GET["cid"];
    $sheba=$_GET["sheba"];
    $utype=$_GET["utype"];

    error_reporting(0);
    include("../authenticator.php");
    /*
    echo"<link rel='preconnect' href='https://fonts.gstatic.com' />
    <link href='https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap' rel='stylesheet' />
    <link href='https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap' rel='stylesheet' />
    <link rel='stylesheet' href='font/CS-Interface/style.css' />
    <link rel='stylesheet' href='css/vendor/bootstrap.min.css' />
    <link rel='stylesheet' href='css/vendor/OverlayScrollbars.min.css' />
    <link rel='stylesheet' href='css/vendor/glide.core.min.css' />
    <link rel='stylesheet' href='css/vendor/introjs.min.css' />
    <link rel='stylesheet' href='css/vendor/select2.min.css' />
    <link rel='stylesheet' href='css/vendor/select2-bootstrap4.min.css' />
    <link rel='stylesheet' href='css/vendor/datatables.min.css' />
    <link rel='stylesheet' href='css/vendor/plyr.css' />
    <link rel='stylesheet' href='css/styles.css' />
    <link rel='stylesheet' href='css/main.css' />        
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
    <script src='js/base/loader.js'></script>";
    */
    $cid=0;
    if(isset($_GET["cid"])) $cid=$_GET["cid"];
    
    echo"<div class='offcanvas-header'>
        <h5 id='offcanvasRightLabel'>".$_GET["ctitle"]."</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
    </div>
    <div class='offcanvas-body'>
        <form method='post' action='./system/dataprocessor_1.php' target='dataprocessor' enctype='multipart/form-data' id='loginForm' class='tooltip-end-bottom' novalidate >";
            if(isset($_GET["mid"]) && $_GET["mid"]!=0){
    
                if($_GET["cid"]==7){
                    echo"<input type='hidden' name='processor' value='edit_campaign'>
                    <input type='hidden' name='id' value='".$_GET["mid"]."'>";
                        $randid=rand(100,999);
                        $s1 = "select * from uerp_user where id='".$_GET["mid"]."' order by id asc limit 1";
                        $r1 = $conn->query($s1);
                        if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                            $pdate=date("Y-m-d", $t1["date"]);
                            $jdate=date("Y-m-d", $t1["jointime"]);
                            $dob=date("Y-m-d", $t1["dob"]);
                            echo"<fieldset>
                                                    <h2>Personal Detail</h2>
                                                    <div class='row'>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$pdate' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Contract Date *</label><input name='jdate' type='date' value='$jdate' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Client ID *</label><input name='employeeid' type='text' value='".$t1["uid"]."' class='form-control' required></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='".$t1["username"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='".$t1["username2"]."' class='form-control' required></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='".$t1["unbox"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Login Password *</label><input name='password' type='text' value='".$t1["passbox"]."' class='form-control' required></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$t1["address"]."' class='form-control' required></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='".$t1["address2"]."' class='form-control'></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>City # *</label><input name='city' type='text' value='".$t1["city"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>State # *</label><input name='state' type='text' value='".$t1["area"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='".$t1["zip"]."' class='form-control' required></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
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
                                                        </select></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='".$t1["phone"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='".$t1["email"]."' class='form-control'></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='$dob' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                                            <option value='".$t1["gender"]."'>".$t1["gender"]."</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                                        </select></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                                            <option value='".$t1["marital_status"]."'>".$t1["marital_status"]."</option><option value='SINGLE'>SINGLE</option><option value='MARIED'>MARIED</option>
                                                            <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                                        </select></div></div>
                                                        
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Plan Manager Detail</h2><br>
                                                    <div class='row'>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Plan Manager Name</label><input name='pm_name' type='text' value='".$t1["pm_name"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone Number</label><input name='pm_mobile' type='text' value='".$t1["pm_mobile"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Email Address</label><input name='pm_email' type='text' value='".$t1["pm_email"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Home Address</label><input name='pm_address' type='text' value='".$t1["pm_address"]."' class='form-control'></div></div>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Contact Person Detail</h2><br>
                                                    <div class='row'>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Contact Person Name</label><input name='cp_name' type='text' value='".$t1["cp_name"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone 1</label><input name='cp_phone1' type='text' value='".$t1["cp_phone1"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone 2</label><input name='cp_mobile' type='text' value='".$t1["cp_mobile"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Email Address</label><input name='cp_email' type='text' value='".$t1["cp_email"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>HomeAddress</label><input name='cp_address' type='text' value='".$t1["cp_address"]."' class='form-control'></div></div>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Financial Detail</h2><br>
                                                    <div class='row'>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>NDIS Number</label><input name='ndisnumber' type='text' value='".$t1["ndis_number"]."' class='form-control'></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='".$t1["abn"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='".$t1["bank_name"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='".$t1["bsb"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='".$t1["account_name"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='".$t1["account_number"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                                            <option value='".$t1["mtype"]."'>".$t1["mtype"]."</option><option value='CLIENT'>CLIENT</option>
                                                        </select></div></div>
                                                        
                                                    </div>
                                                </fieldset>
                                                    <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                                                    <button class='btn btn-primary' type='reset' >Reset</button> &nbsp; 
                                                    <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Update</button>
                                                </div>";
                    } }
                }
    
                if($_GET["cid"]==8){
                    echo"<input type='hidden' name='processor' value='edit_$utype'>
                    <input type='hidden' name='id' value='".$_GET["mid"]."'>";
                        $randid=rand(100,999);
                        $s1 = "select * from uerp_user where id='".$_GET["mid"]."' order by id asc limit 1";
                        $r1 = $conn->query($s1);
                        if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                            $pdate=date("Y-m-d", $t1["date"]);
                            $jdate=date("Y-m-d", $t1["jointime"]);
                            $dob=date("Y-m-d", $t1["dob"]);
                            echo"<fieldset>
                                                    <h2>Personal Detail</h2>
                                                    <div class='row'>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$pdate' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Contract Date *</label><input name='jdate' type='date' value='$jdate' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Vendor ID *</label><input name='employeeid' type='text' value='".$t1["uid"]."' class='form-control' required></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='".$t1["username"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='".$t1["username2"]."' class='form-control' required></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='".$t1["unbox"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Login Password *</label><input name='password' type='text' value='".$t1["passbox"]."' class='form-control' required></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$t1["address"]."' class='form-control' required></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='".$t1["address2"]."' class='form-control'></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>City # *</label><input name='city' type='text' value='".$t1["city"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>State # *</label><input name='state' type='text' value='".$t1["area"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='".$t1["zip"]."' class='form-control' required></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
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
                                                        </select></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='".$t1["phone"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='".$t1["email"]."' class='form-control'></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='$dob' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                                            <option value='".$t1["gender"]."'>".$t1["gender"]."</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                                        </select></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                                            <option value='".$t1["marital_status"]."'>".$t1["marital_status"]."</option><option value='SINGLE'>SINGLE</option><option value='MARIED'>MARIED</option>
                                                            <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                                        </select></div></div>
                                                        
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Store Detail</h2><br>
                                                    <div class='row'>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Store Name</label><input name='store_name' type='text' value='".$t1["store_name"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Store Address</label><input name='store_address' type='text' value='".$t1["store_address"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Store Phone</label><input name='store_phone' type='text' value='".$t1["store_phone"]."' class='form-control'></div></div>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Financial Detail</h2><br>
                                                    <div class='row'>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='".$t1["bank_name"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='".$t1["bsb"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='".$t1["account_name"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='".$t1["account_number"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:15px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                                            <option value='".$t1["mtype"]."'>".$t1["mtype"]."</option><option value='VENDOR'>VENDOR</option>
                                                        </select></div></div>
                                                    </div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                                                    <button class='btn btn-primary' type='reset' >Reset</button> &nbsp; 
                                                    <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Update</button>
                                                </div>";
                    } }
                }
                
            
                if($_GET["cid"]==9){
                    echo"<input type='hidden' name='processor' value='edit_$utype'>
                    <input type='hidden' name='id' value='".$_GET["mid"]."'>";
                                            $randid=rand(100,999);
                                            $s1 = "select * from uerp_user where id='".$_GET["mid"]."' order by id asc limit 1";
                                            $r1 = $conn->query($s1);
                                            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                                $pdate=date("Y-m-d", $t1["date"]);
                                                $jdate=date("Y-m-d", $t1["jointime"]);
                                                $dob=date("Y-m-d", $t1["dob"]);
                                                echo"<fieldset>
                                                    <h2>Personal Detail</h2>
                                                    <div class='row'>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$pdate' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Joining Date  *</label><input name='jdate' type='date' value='$jdate' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Employee ID *</label><input name='employeeid' type='text' value='".$t1["uid"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='".$t1["username"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='".$t1["username2"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='".$t1["unbox"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Login Password *</label><input name='password' type='text' value='".$t1["passbox"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$t1["address"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='".$t1["address2"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>City # *</label><input name='city' type='text' value='".$t1["city"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>State # *</label><input name='state' type='text' value='".$t1["area"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='".$t1["zip"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
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
                                                        </select></div></div>
                                                        
                                                        <div class='col-lg-2'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='".$t1["phone"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='".$t1["email"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='$dob' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                                            <option value='".$t1["gender"]."'>".$t1["gender"]."</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                                        </select></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                                            <option value='".$t1["marital_status"]."'>".$t1["marital_status"]."</option><option value='SINGLE'>SINGLE</option><option value='MARIED'>MARIED</option>
                                                            <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                                        </select></div></div>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Financial Detail</h2><br>
                                                    <div class='row'>
                                                        <div class='col-lg-2'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='".$t1["abn"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='".$t1["bank_name"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='".$t1["bsb"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='".$t1["account_name"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='".$t1["account_number"]."' class='form-control'></div></div>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Official Detail</h2><br>
                                                    <div class='row'>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Designation *</label><select class='form-control m-b required' name='designation' required=''>";
                                                            $s7x = "select * from designation where id='".$t1["designation"]."' order by id asc limit 1";
                                                            $r7x = $conn->query($s7x);
                                                            if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                                echo"<option value='".$rs7x["id"]."'>".$rs7x["designation"]."</option>";
                                                            } }
                                                            $s7 = "select * from designation where status='1' order by id asc";
                                                            $r7 = $conn->query($s7);
                                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                                echo"<option value='".$rs7["id"]."'>".$rs7["designation"]."</option>";
                                                            } }
                                                        echo"</select></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Department *</label><select class='form-control m-b required' name='department' required>";
                                                            $s7x = "select * from departments where id='".$t1["department"]."' order by id asc limit 1";
                                                            $r7x = $conn->query($s7x);
                                                            if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                                echo"<option value='".$rs7x["id"]."'>".$rs7x["department_name"]."</option>";
                                                            } }
                                                            $s7 = "select * from departments where status='1' order by id asc";
                                                            $r7 = $conn->query($s7);
                                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                                echo"<option value='".$rs7["id"]."'>".$rs7["department_name"]."</option>";
                                                            } }
                                                        echo"</select></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                                            <option value='".$t1["mtype"]."'>".$t1["mtype"]."</option><option value='EMPLOYEE'>EMPLOYEE</option><option value='ADMIN'>ADMIN</option>
                                                        </select></div></div>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Accounts Detail</h2><br>
                                                    <div class='row'> 
                                                        <div class='col-lg-2'><div class='form-group'><label>Wage Basic</label><select class='form-control m-b required' name='salary_basic' required>
                                                            <option value='".$t1["salary_basic"]."'>".$t1["salary_basic"]."</option><option value='Hourly'>Hourly</option>
                                                            <option value='Daily'>Daily</option><option value='Weekly'>Weekly</option><option value='Monthly'>Monthly</option>
                                                        </select></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Regular Wage</label><input name='reg_amt' type='text' value='".$t1["reg_amt"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Saturday Wage</label><input name='sat_amt' type='text' value='".$t1["sat_amt"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Sunday Wage</label><input name='sun_amt' type='text' value='".$t1["sun_amt"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Public holiday</label><input name='hol_amt' type='text' value='".$t1["hol_amt"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Over Night Wage</label><input name='night_amt' type='text' value='".$t1["night_amt"]."' class='form-control' required></div></div>
                                                        
                                                        <div class='col-lg-2'><div class='form-group'><label>Overtime (Per Hour)</label><input name='overtime' type='text' value='".$t1["overtime"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Payment type</label><select class='form-control m-b required' name='payment_type' required>
                                                            <option value='".$t1["payment_type"]."'>".$t1["payment_type"]."</option><option value='Bank Transfer'>Bank Transfer</option>
                                                            <option value='Check'>Check</option><option value='Cash'>Cash</option>
                                                        </select></div></div>
                                                        
                                                        <input name='pf' type='hidden' value='No'><input name='pf_no' type='hidden' value='0'>
                                                        <input name='pf_rate' type='hidden' value='0'><input name='esi' type='hidden' value='No'>
                                                        <input name='esi_no' type='hidden' value='0'><input name='esi_rate' type='hidden' value='0'>";
    
                                                        /*
                                                        <div class='col-lg-12'>&nbsp;</div>                                                    
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF contribution</label><select class='form-control m-b' name='pf'>
                                                            <option value='".$t1["pf"]."'>".$t1["pf"]."</option><option value='Yes'>Yes</option><option value='No'>No</option>
                                                        </select></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF No.</label><input name='pf_no' type='number' value='".$t1["pf_no"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF rate</label><input name='pf_rate' type='number' value='".$t1["pf_rate"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI contribution</label><select class='form-control m-b ' name='esi'>
                                                            <option value='".$t1["esi"]."'>".$t1["esi"]."</option><option value='Yes'>Yes</option><option value='No'>No</option>
                                                        </select></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI No.</label><input name='esi_no' type='number' value='".$t1["esi_no"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI rate</label><input name='esi_rate' type='number' value='".$t1["esi_rate"]."' class='form-control'></div></div>";
                                                        */
    
                                                    echo"</div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                                                    <button class='btn btn-primary' type='reset' >Reset</button> &nbsp; 
                                                    <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Update</button>
                                                </div>";
                                            } }
                }
    
    
                if($_GET["cid"]==10){
                    echo"<input type='hidden' name='processor' value='edit_$utype'>
                    <input type='hidden' name='id' value='".$_GET["mid"]."'>";
                                            $randid=rand(100,999);
                                            $s1 = "select * from uerp_user where id='".$_GET["mid"]."' order by id asc limit 1";
                                            $r1 = $conn->query($s1);
                                            if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                                                $pdate=date("Y-m-d", $t1["date"]);
                                                $jdate=date("Y-m-d", $t1["jointime"]);
                                                $dob=date("Y-m-d", $t1["dob"]);
                                                echo"<fieldset>
                                                    <h2>Personal Detail</h2>
                                                    <div class='row'>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$pdate' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Joining Date  *</label><input name='jdate' type='date' value='$jdate' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Support ID *</label><input name='employeeid' type='text' value='".$t1["uid"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='".$t1["username"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='".$t1["username2"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='".$t1["unbox"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Login Password *</label><input name='password' type='text' value='".$t1["passbox"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$t1["address"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='".$t1["address2"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>City # *</label><input name='city' type='text' value='".$t1["city"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>State # *</label><input name='state' type='text' value='".$t1["area"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='".$t1["zip"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
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
                                                        </select></div></div>
                                                        
                                                        <div class='col-lg-2'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='".$t1["phone"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='".$t1["email"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='$dob' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                                            <option value='".$t1["gender"]."'>".$t1["gender"]."</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                                        </select></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                                            <option value='".$t1["marital_status"]."'>".$t1["marital_status"]."</option><option value='SINGLE'>SINGLE</option><option value='MARIED'>MARIED</option>
                                                            <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                                        </select></div></div>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Financial Detail</h2><br>
                                                    <div class='row'>
                                                        <div class='col-lg-2'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='".$t1["abn"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='".$t1["bank_name"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='".$t1["bsb"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='".$t1["account_name"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='".$t1["account_number"]."' class='form-control'></div></div>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Official Detail</h2><br>
                                                    <div class='row'>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Designation *</label><select class='form-control m-b required' name='designation' required=''>";
                                                            $s7x = "select * from designation where id='".$t1["designation"]."' order by id asc limit 1";
                                                            $r7x = $conn->query($s7x);
                                                            if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                                echo"<option value='".$rs7x["id"]."'>".$rs7x["designation"]."</option>";
                                                            } }
                                                            $s7 = "select * from designation where status='1' order by id asc";
                                                            $r7 = $conn->query($s7);
                                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                                echo"<option value='".$rs7["id"]."'>".$rs7["designation"]."</option>";
                                                            } }
                                                        echo"</select></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Department *</label><select class='form-control m-b required' name='department' required>";
                                                            $s7x = "select * from departments where id='".$t1["department"]."' order by id asc limit 1";
                                                            $r7x = $conn->query($s7x);
                                                            if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                                echo"<option value='".$rs7x["id"]."'>".$rs7x["department_name"]."</option>";
                                                            } }
                                                            $s7 = "select * from departments where status='1' order by id asc";
                                                            $r7 = $conn->query($s7);
                                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                                echo"<option value='".$rs7["id"]."'>".$rs7["department_name"]."</option>";
                                                            } }
                                                        echo"</select></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                                            <option value='".$t1["mtype"]."'>".$t1["mtype"]."</option><option value='SUPPORT'>SUPPORT</option>
                                                        </select></div></div>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Accounts Detail</h2><br>
                                                    <div class='row'> 
                                                        <div class='col-lg-2'><div class='form-group'><label>Commission Basic</label><select class='form-control m-b required' name='salary_basic' required>
                                                            <option value='".$t1["salary_basic"]."'>".$t1["salary_basic"]."</option><option value='Hourly'>Hourly</option>
                                                            <option value='Daily'>Daily</option><option value='Weekly'>Weekly</option><option value='Monthly'>Monthly</option>
                                                        </select></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Regular Commission</label><input name='reg_amt' type='text' value='".$t1["reg_amt"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Saturday Commission</label><input name='sat_amt' type='text' value='".$t1["sat_amt"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Sunday Commission</label><input name='sun_amt' type='text' value='".$t1["sun_amt"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Public holiday Comm.</label><input name='hol_amt' type='text' value='".$t1["hol_amt"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Over Night Commission</label><input name='night_amt' type='text' value='".$t1["night_amt"]."' class='form-control' required></div></div>
                                                        
                                                        <div class='col-lg-2'><div class='form-group'><label>Overtime (Per Hour)</label><input name='overtime' type='text' value='".$t1["overtime"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Payment type</label><select class='form-control m-b required' name='payment_type' required>
                                                            <option value='".$t1["payment_type"]."'>".$t1["payment_type"]."</option><option value='Bank Transfer'>Bank Transfer</option>
                                                            <option value='Check'>Check</option><option value='Cash'>Cash</option>
                                                        </select></div></div>
                                                        
                                                        <input name='pf' type='hidden' value='No'><input name='pf_no' type='hidden' value='0'>
                                                        <input name='pf_rate' type='hidden' value='0'><input name='esi' type='hidden' value='No'>
                                                        <input name='esi_no' type='hidden' value='0'><input name='esi_rate' type='hidden' value='0'>";
    
                                                        /*
                                                        <div class='col-lg-12'>&nbsp;</div>                                                    
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF contribution</label><select class='form-control m-b' name='pf'>
                                                            <option value='".$t1["pf"]."'>".$t1["pf"]."</option><option value='Yes'>Yes</option><option value='No'>No</option>
                                                        </select></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF No.</label><input name='pf_no' type='number' value='".$t1["pf_no"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF rate</label><input name='pf_rate' type='number' value='".$t1["pf_rate"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI contribution</label><select class='form-control m-b ' name='esi'>
                                                            <option value='".$t1["esi"]."'>".$t1["esi"]."</option><option value='Yes'>Yes</option><option value='No'>No</option>
                                                        </select></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI No.</label><input name='esi_no' type='number' value='".$t1["esi_no"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI rate</label><input name='esi_rate' type='number' value='".$t1["esi_rate"]."' class='form-control'></div></div>";
                                                        */
    
                                                    echo"</div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                                                    <button class='btn btn-primary' type='reset' >Reset</button> &nbsp; 
                                                    <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Update</button>
                                                </div>";
                                            } }
                }
    
                if($_GET["cid"]==1000){
                    echo"<input type='hidden' name='processor' value='edit_$utype'>
                    <input type='hidden' name='id' value='".$_GET["mid"]."'>";
                        $randid=rand(100,999);
                        $s1 = "select * from uerp_user where id='".$_GET["mid"]."' order by id asc limit 1";
                        $r1 = $conn->query($s1);
                        if ($r1->num_rows > 0) { while($t1 = $r1->fetch_assoc()) {
                            $pdate=date("Y-m-d", $t1["date"]);
                            $jdate=date("Y-m-d", $t1["jointime"]);
                            $dob=date("Y-m-d", $t1["dob"]);
                            
                            $departmentname="";
                            $d1 = "select * from departments where id='".$t1["department"]."' order by id asc limit 1";
                            $d2 = $conn->query($d1);
                            if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $departmentname=$d3["department_name"]; } }
                            $designationname="";
                            $d4 = "select * from designation where id='".$t1["designation"]."' order by id asc limit 1";
                            $d5 = $conn->query($d4);
                            if ($d5->num_rows > 0) { while($d6 = $d5->fetch_assoc()) { $designationname=$d6["designation"]; } }
    
                            if($utype=="CLIENT"){
                                $leadername="";
                                $d1 = "select * from uerp_user where id='".$t1["team_leader"]."' order by id asc limit 1";
                                $d2 = $conn->query($d1);
                                if ($d2->num_rows > 0) { while($d3 = $d2->fetch_assoc()) { $leadername="".$d3["username"]."".$d3["username2"]."" ; } }
                                $openprojects=0;
                                $p1 = "select * from project where clientid='".$t1["id"]."' and status='1' order by id asc limit 1";
                                $p2 = $conn->query($p1);
                                if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { $openprojects=($openprojects+1); } }
                                $closedprojects=0;
                                $p1 = "select * from project where clientid='".$t1["id"]."' and status='5' order by id asc limit 1";
                                $p2 = $conn->query($p1);
                                if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) { $closedprojects=($closedprojects+1); } }
                            }
                            if($utype=="EMPLOYEE" || $utype=="SUPPORT"){
                                $openprojects=0;
                                $closedprojects=0;
                                $ta1 = "select * from project_team_allocation where employeeid='".$t1["id"]."' and status='1' order by id asc";
                                $ta2 = $conn->query($ta1);
                                if ($ta2->num_rows > 0) { while($ta3 = $ta2->fetch_assoc()) {
                                    $p1 = "select * from project where id='".$a3["projectid"]."' order by id asc";
                                    $p2 = $conn->query($p1);
                                    if ($p2->num_rows > 0) { while($p3 = $p2->fetch_assoc()) {
                                        if($p3["status"]=="1") $openprojects=($openprojects+1);                            
                                        if($p3["status"]=="5") $closedprojects=($closedprojects+1);
                                    } }
                                } }
            
                                $opentasks=0;
                                $closedtasks=0;                    
                                $ta1 = "select * from tasks where employeeid='".$t1["id"]."' order by id asc";
                                $ta2 = $conn->query($ta1);
                                if ($ta2->num_rows > 0) { while($ta3 = $ta2->fetch_assoc()) {
                                    if($p3["activity"]!="2") $opentasks=($opentasks+1);                            
                                    else $closedtasks=($closedtasks+1);                        
                                } }
                            }
                            
                            $uid=$t1["id"];
                            $status=$t1["status"];
                            if($status==1) $status="ON";
                            else $status="OFF";
                            
                            echo"<div class='container'>
                                <div class='row'>
                                    <div class='col-12 col-xl-4 col-xxl-3'>                                    
                                        <div class='card mb-5'>
                                            <div class='card-body'>
                                                <div class='d-flex align-items-center flex-column mb-4'>
                                                    <div class='d-flex align-items-center flex-column'>
                                                        <div class='sw-13 position-relative mb-3'><img src='".$t1["images"]."' class='img-fluid rounded-xl' alt='thumb' /></div>
                                                        <div class='h5 mb-0'>".$t1["username"]." ".$t1["username2"]."</div>
                                                        <div class='text-muted'>$designationname</div>
                                                        <div class='text-muted'>
                                                            <i data-acorn-icon='pin' class='me-1'></i>
                                                            <span class='align-middle'>".$t1["address"].", ".$t1["city"].", ".$t1["area"]."-".$t1["zip"].", ".$t1["country"]."</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='nav flex-column' role='tablist'>
                                                    <a class='nav-link active px-0 border-bottom border-separator-light' data-bs-toggle='tab' href='#overviewTab' role='tab'>
                                                        <i class='fa-solid fa-dashboard'></i>
                                                        <span class='align-middle'>Overview</span>
                                                    </a>
                                                    <a class='nav-link px-0 border-bottom border-separator-light' data-bs-toggle='tab' href='#projectsTab' role='tab'>
                                                        <i class='fa-solid fa-project-diagram'></i>
                                                        <span class='align-middle'>Projects</span>
                                                    </a>
                                                    <a class='nav-link px-0 border-bottom border-separator-light' data-bs-toggle='tab' href='#permissionsTab' role='tab'>
                                                        <i class='fa-solid fa-tasks'></i>
                                                        <span class='align-middle'>Tasks</span>
                                                    </a>
                                                    <a class='nav-link px-0 border-bottom border-separator-light' data-bs-toggle='tab' href='#friendsTab' role='tab'>
                                                        <i class='fa fa-book'></i>
                                                        <span class='align-middle'>Documents</span>
                                                    </a>
                                                    <a class='nav-link px-0' data-bs-toggle='tab' href='#aboutTab' role='tab'>
                                                        <i class='fa-solid fa-user'></i>
                                                        <span class='align-middle'>About</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class='col-12 col-xl-8 col-xxl-9 mb-5 tab-content'>
                                        <br><br><div class='tab-pane fade show active' id='overviewTab' role='tabpanel'>
                                            <h2 class='small-title'>Stats</h2>
                                            <div class='mb-5'>
                                                <div class='row g-2'>
                                                    <div class='col-12 col-sm-6 col-lg-3'>
                                                        <div class='card hover-border-primary'>
                                                            <div class='card-body'>
                                                            <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                                                <span>Projects</span><i data-acorn-icon='office' class='text-primary'></i>
                                                            </div>
                                                            <div class='text-small text-muted mb-1'>ACTIVE</div>
                                                            <div class='cta-1 text-primary'>14</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-12 col-sm-6 col-lg-3'>
                                                    <div class='card hover-border-primary'>
                                                        <div class='card-body'>
                                                            <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                                                <span>Tasks</span><i data-acorn-icon='check-square' class='text-primary'></i>
                                                            </div>
                                                            <div class='text-small text-muted mb-1'>PENDING</div>
                                                            <div class='cta-1 text-primary'>153</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-12 col-sm-6 col-lg-3'>
                                                    <div class='card hover-border-primary'>
                                                        <div class='card-body'>
                                                            <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                                                <span>Notes</span>
                                                                <i data-acorn-icon='file-empty' class='text-primary'></i>
                                                            </div>
                                                            <div class='text-small text-muted mb-1'>RECENT</div>
                                                            <div class='cta-1 text-primary'>24</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-12 col-sm-6 col-lg-3'>
                                                    <div class='card hover-border-primary'>
                                                        <div class='card-body'>
                                                            <div class='heading mb-0 d-flex justify-content-between lh-1-25 mb-3'>
                                                                <span>Views</span><i data-acorn-icon='screen' class='text-primary'></i>
                                                            </div>
                                                            <div class='text-small text-muted mb-1'>THIS MONTH</div>
                                                            <div class='cta-1 text-primary'>524</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <h2 class='small-title'>Timeline/Activity Log</h2>
                                        <div class='card mb-5'>
                                            <div class='card-body'>
                                                <div class='row g-0'>
                                                <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                                <div class='w-100 d-flex sh-1'></div>
                                                <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                                <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                                </div>
                                                <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                                <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                </div>
                                            </div>
                                            <div class='col mb-4'>
                                                <div class='h-100'>
                                                <div class='d-flex flex-column justify-content-start'>
                                                    <div class='d-flex flex-column'>
                                                    <a href='#' class='heading stretched-link'>Developing Components</a>
                                                    <div class='text-alternate'>21.12.2020</div>
                                                    <div class='text-muted mt-1'>
                                                        Jujubes tootsie roll liquorice cake jelly beans pudding gummi bears chocolate cake donut. Jelly-o sugar plum fruitcake bonbon
                                                        bear claw cake cookie chocolate bar. Tiramisu soufflé apple pie.
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='row g-0'>
                                            <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                                <div class='w-100 d-flex sh-1 position-relative justify-content-center'>
                                                <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                </div>
                                                <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                                <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                                </div>
                                                <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                                <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                </div>
                                            </div>
                                            <div class='col mb-4'>
                                                <div class='h-100'>
                                                <div class='d-flex flex-column justify-content-start'>
                                                    <div class='d-flex flex-column'>
                                                    <a href='#' class='heading stretched-link pt-0'>HTML Structure</a>
                                                    <div class='text-alternate'>14.12.2020</div>
                                                    <div class='text-muted mt-1'>
                                                        Pudding gummi bears chocolate chocolate apple pie powder tart chupa chups bonbon. Donut biscuit chocolate cake pie topping.
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='row g-0'>
                                            <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                                <div class='w-100 d-flex sh-1 position-relative justify-content-center'>
                                                <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                </div>
                                                <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                                <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                                </div>
                                                <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                                <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                </div>
                                            </div>
                                            <div class='col mb-4'>
                                                <div class='h-100'>
                                                <div class='d-flex flex-column justify-content-start'>
                                                    <div class='d-flex flex-column'>
                                                    <a href='#' class='heading stretched-link'>Sass Structure</a>
                                                    <div class='text-alternate'>03.11.2020</div>
                                                    <div class='text-muted mt-1'>
                                                        Jelly-o wafer sesame snaps candy canes. Danish dragée toffee bonbon. Jelly-o marshmallow cake oat cake caramels jujubes.
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='row g-0'>
                                            <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                                <div class='w-100 d-flex sh-1 position-relative justify-content-center'>
                                                <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                </div>
                                                <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                                <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                                </div>
                                                <div class='w-100 d-flex h-100 justify-content-center position-relative'>
                                                <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                </div>
                                            </div>
                                            <div class='col mb-4'>
                                                <div class='h-100'>
                                                <div class='d-flex flex-column justify-content-start'>
                                                    <div class='d-flex flex-column'>
                                                    <a href='#' class='heading stretched-link pt-0'>Final Design</a>
                                                    <div class='text-alternate'>15.10.2020</div>
                                                    <div class='text-muted mt-1'>Chocolate apple pie powder tart chupa chups bonbon. Donut biscuit chocolate cake pie topping.</div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='row g-0'>
                                            <div class='col-auto sw-1 d-flex flex-column justify-content-center align-items-center position-relative me-4'>
                                                <div class='w-100 d-flex sh-1 position-relative justify-content-center'>
                                                <div class='line-w-1 bg-separator h-100 position-absolute'></div>
                                                </div>
                                                <div class='rounded-xl shadow d-flex flex-shrink-0 justify-content-center align-items-center'>
                                                <div class='bg-gradient-light sw-1 sh-1 rounded-xl position-relative'></div>
                                                </div>
                                                <div class='w-100 d-flex h-100 justify-content-center position-relative'></div>
                                            </div>
                                            <div class='col'>
                                                <div class='h-100'>
                                                <div class='d-flex flex-column justify-content-start'>
                                                    <div class='d-flex flex-column'>
                                                    <a href='#' class='heading stretched-link pt-0'>Wireframe Design</a>
                                                    <div class='text-alternate'>08.06.2020</div>
                                                    <div class='text-muted mt-1'>Chocolate apple pie powder tart chupa chups bonbon. Donut biscuit chocolate cake pie topping.</div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <h2 class='small-title'>Logs</h2>
                                <div class='card'>
                                        <div class='card-body mb-n2'>
                                            <div class='row g-0 mb-2'>
                                            <div class='col-auto'>
                                                <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                                <div class='sh-3'>
                                                    <i data-acorn-icon='circle' class='text-primary align-top'></i>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                                <div class='d-flex flex-column'>
                                                    <div class='text-alternate mt-n1 lh-1-25'>New user registiration</div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col-auto'>
                                                <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                                <div class='text-muted ms-2 mt-n1 lh-1-25'>18 Dec</div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='row g-0 mb-2'>
                                            <div class='col-auto'>
                                                <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                                <div class='sh-3'>
                                                    <i data-acorn-icon='circle' class='text-primary align-top'></i>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                                <div class='d-flex flex-column'>
                                                    <div class='text-alternate mt-n1 lh-1-25'>3 new product added</div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col-auto'>
                                                <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                                <div class='text-muted ms-2 mt-n1 lh-1-25'>18 Dec</div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='row g-0 mb-2'>
                                            <div class='col-auto'>
                                                <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                                <div class='sh-3'>
                                                    <i data-acorn-icon='square' class='text-secondary align-top'></i>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                                <div class='d-flex flex-column'>
                                                    <div class='text-alternate mt-n1 lh-1-25'>
                                                    Product out of stock:
                                                    <a href='#' class='alternate-link underline-link'>Breadstick</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col-auto'>
                                                <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                                <div class='text-muted ms-2 mt-n1 lh-1-25'>16 Dec</div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='row g-0 mb-2'>
                                            <div class='col-auto'>
                                                <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                                <div class='sh-3'>
                                                    <i data-acorn-icon='square' class='text-secondary align-top'></i>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                                <div class='d-flex flex-column'>
                                                    <div class='text-alternate mt-n1 lh-1-25'>Category page returned an error</div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col-auto'>
                                                <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                                <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='row g-0 mb-2'>
                                            <div class='col-auto'>
                                                <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                                <div class='sh-3'>
                                                    <i data-acorn-icon='circle' class='text-primary align-top'></i>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                                <div class='d-flex flex-column'>
                                                    <div class='text-alternate mt-n1 lh-1-25'>14 products added</div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col-auto'>
                                                <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                                <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='row g-0 mb-2'>
                                            <div class='col-auto'>
                                                <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                                <div class='sh-3'>
                                                    <i data-acorn-icon='hexagon' class='text-tertiary align-top'></i>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                                <div class='d-flex flex-column'>
                                                    <div class='text-alternate mt-n1 lh-1-25'>
                                                    New sale:
                                                    <a href='#' class='alternate-link underline-link'>Steirer Brot</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col-auto'>
                                                <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                                <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='row g-0 mb-2'>
                                            <div class='col-auto'>
                                                <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                                <div class='sh-3'>
                                                    <i data-acorn-icon='hexagon' class='text-tertiary align-top'></i>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                                <div class='d-flex flex-column'>
                                                    <div class='text-alternate mt-n1 lh-1-25'>
                                                    New sale:
                                                    <a href='#' class='alternate-link underline-link'>Soda Bread</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col-auto'>
                                                <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                                <div class='text-muted ms-2 mt-n1 lh-1-25'>15 Dec</div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='row g-0 mb-2'>
                                            <div class='col-auto'>
                                                <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                                <div class='sh-3'>
                                                    <i data-acorn-icon='triangle' class='text-warning align-top'></i>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                                <div class='d-flex flex-column'>
                                                    <div class='text-alternate mt-n1 lh-1-25'>Recived a support ticket</div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col-auto'>
                                                <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                                <div class='text-muted ms-2 mt-n1 lh-1-25'>14 Dec</div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class='row g-0'>
                                            <div class='col-auto'>
                                                <div class='sw-3 d-inline-block d-flex justify-content-start align-items-center h-100'>
                                                <div class='sh-3'>
                                                    <i data-acorn-icon='hexagon' class='text-tertiary align-top'></i>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col'>
                                                <div class='card-body d-flex flex-column pt-0 pb-0 ps-3 pe-4 h-100 justify-content-center'>
                                                <div class='d-flex flex-column'>
                                                    <div class='text-alternate mt-n1 lh-1-25'>
                                                    New sale:
                                                    <a href='#' class='alternate-link underline-link'>Cholermüs</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class='col-auto'>
                                                <div class='d-inline-block d-flex justify-content-end align-items-center h-100'>
                                                <div class='text-muted ms-2 mt-n1 lh-1-25'>13 Dec</div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class='tab-pane fade' id='projectsTab' role='tabpanel'>
                                    <h2 class='small-title'>Projects</h2>
                                    <div class='row mb-3 g-2'>
                                        <div class='col mb-1'>
                                            <div class='d-inline-block float-md-start me-1 mb-1 search-input-container w-100 shadow bg-foreground'>
                                                <input class='form-control' placeholder='Search' />
                                                <span class='search-magnifier-icon'><i data-acorn-icon='search'></i></span>
                                                <span class='search-delete-icon d-none'><i data-acorn-icon='close'></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class='row row-cols-1 row-cols-sm-2 g-2'>
                                        <div class='col'>
                                            <div class='card h-100'>
                                            <div class='card-body'>
                                                <h6 class='heading mb-3'>
                                                <a href='#' class='stretched-link'>
                                                    <span class='clamp-line sh-5' data-line='2'>Basic Introduction to Bread Making</span>
                                                </a>
                                                </h6>
                                                <div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Contributors: 4</span>
                                                </div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='trend-up' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Active</span>
                                                </div>
                                                <div>
                                                    <i data-acorn-icon='check-square' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Completed</span>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card h-100'>
                                            <div class='card-body'>
                                                <h6 class='heading mb-3'>
                                                <a href='#' class='stretched-link'>
                                                    <span class='clamp-line sh-5' data-line='2'>4 Facts About Old Baking Techniques</span>
                                                </a>
                                                </h6>
                                                <div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Contributors: 3</span>
                                                </div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='trend-up' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Active</span>
                                                </div>
                                                <div>
                                                    <i data-acorn-icon='clock' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Pending</span>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card h-100'>
                                            <div class='card-body'>
                                                <h6 class='heading mb-3'>
                                                <a href='#' class='stretched-link'>
                                                    <span class='clamp-line sh-5' data-line='2'>Apple Cake Recipe for Starters</span>
                                                </a>
                                                </h6>
                                                <div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Contributors: 8</span>
                                                </div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='lock-on' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Locked</span>
                                                </div>
                                                <div>
                                                    <i data-acorn-icon='sync-horizontal' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Continuing</span>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card h-100'>
                                            <div class='card-body'>
                                                <h6 class='heading mb-3'>
                                                <a href='#' class='stretched-link'>
                                                    <span class='clamp-line sh-5' data-line='2'>A Complete Guide to Mix Dough for the Molds</span>
                                                </a>
                                                </h6>
                                                <div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Contributors: 12</span>
                                                </div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='trend-up' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Active</span>
                                                </div>
                                                <div>
                                                    <i data-acorn-icon='check-square' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Completed</span>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card h-100'>
                                            <div class='card-body'>
                                                <h6 class='heading mb-3'>
                                                <a href='#' class='stretched-link'>
                                                    <span class='clamp-line sh-5' data-line='2'>14 Facts About Sugar Products</span>
                                                </a>
                                                </h6>
                                                <div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Contributors: 2</span>
                                                </div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='trend-down' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Inactive</span>
                                                </div>
                                                <div>
                                                    <i data-acorn-icon='archive' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Archived</span>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card h-100'>
                                            <div class='card-body'>
                                                <h6 class='heading mb-3'>
                                                <a href='#' class='stretched-link'>
                                                    <span class='clamp-line sh-5' data-line='2'>Easy and Efficient Tricks for Baking Crispy Breads</span>
                                                </a>
                                                </h6>
                                                <div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Contributors: 2</span>
                                                </div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='trend-up' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Active</span>
                                                </div>
                                                <div>
                                                    <i data-acorn-icon='clock' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Pending</span>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card h-100'>
                                            <div class='card-body'>
                                                <h6 class='heading mb-3'>
                                                <a href='#' class='stretched-link'>
                                                    <span class='clamp-line sh-5' data-line='2'>Apple Cake Recipe for Starters</span>
                                                </a>
                                                </h6>
                                                <div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Contributors: 6</span>
                                                </div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='trend-down' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Inactive</span>
                                                </div>
                                                <div>
                                                    <i data-acorn-icon='archive' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Archived</span>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card h-100'>
                                            <div class='card-body'>
                                                <h6 class='heading mb-3'>
                                                <a href='#' class='stretched-link'>
                                                    <span class='clamp-line sh-5' data-line='2'>Simple Guide to Mix Dough</span>
                                                </a>
                                                </h6>
                                                <div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Contributors: 22</span>
                                                </div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='lock-on' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Locked</span>
                                                </div>
                                                <div>
                                                    <i data-acorn-icon='check-square' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Completed</span>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card h-100'>
                                            <div class='card-body'>
                                                <h6 class='heading mb-3'>
                                                <a href='#' class='stretched-link'>
                                                    <span class='clamp-line sh-5' data-line='2'>10 Secrets Every Southern Baker Knows</span>
                                                </a>
                                                </h6>
                                                <div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Contributors: 3</span>
                                                </div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='trend-up' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Active</span>
                                                </div>
                                                <div>
                                                    <i data-acorn-icon='sync-horizontal' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Continuing</span>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card h-100'>
                                            <div class='card-body'>
                                                <h6 class='heading mb-3'>
                                                <a href='#' class='stretched-link'>
                                                    <span class='clamp-line sh-5' data-line='2'>Recipes for Sweet and Healty Treats</span>
                                                </a>
                                                </h6>
                                                <div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Contributors: 1</span>
                                                </div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='trend-down' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Inactive</span>
                                                </div>
                                                <div>
                                                    <i data-acorn-icon='clock' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Pending</span>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card h-100'>
                                            <div class='card-body'>
                                                <h6 class='heading mb-3'>
                                                <a href='#' class='stretched-link'>
                                                    <span class='clamp-line sh-5' data-line='2'>Better Ways to Mix Dough for the Molds</span>
                                                </a>
                                                </h6>
                                                <div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Contributors: 20</span>
                                                </div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='trend-up' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Active</span>
                                                </div>
                                                <div>
                                                    <i data-acorn-icon='clock' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Pending</span>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card h-100'>
                                            <div class='card-body'>
                                                <h6 class='heading mb-3'>
                                                <a href='#' class='stretched-link'>
                                                    <span class='clamp-line sh-5' data-line='2'>Introduction to Baking Cakes</span>
                                                </a>
                                                </h6>
                                                <div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='category' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Contributors: 13</span>
                                                </div>
                                                <div class='mb-2'>
                                                    <i data-acorn-icon='trend-up' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Active</span>
                                                </div>
                                                <div>
                                                    <i data-acorn-icon='check-square' class='text-muted me-2' data-acorn-size='17'></i>
                                                    <span class='align-middle text-alternate'>Completed</span>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- Projects Content End -->
                                    </div>
                                    <!-- Projects Tab End -->
    
                                    <!-- Permissions Tab Start -->
                                    <div class='tab-pane fade' id='permissionsTab' role='tabpanel'>
                                        <h2 class='small-title'>Permissions</h2>
                                        <div class='row row-cols-1 g-2'>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <label class='form-check custom-icon mb-0 checked-opacity-100'>
                                                <input type='checkbox' class='form-check-input' checked />
                                                <span class='form-check-label'>
                                                    <span class='content opacity-50'>
                                                    <span class='heading mb-1 lh-1-25'>Create</span>
                                                    <span class='d-block text-small text-muted'>
                                                        Chocolate cake biscuit donut cotton candy soufflé cake macaroon. Halvah chocolate cotton candy sweet roll jelly-o candy danish
                                                        dragée.
                                                    </span>
                                                    </span>
                                                </span>
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <label class='form-check custom-icon mb-0 checked-opacity-100'>
                                                <input type='checkbox' class='form-check-input' checked />
                                                <span class='form-check-label'>
                                                    <span class='content opacity-50'>
                                                    <span class='heading mb-1 lh-1-25'>Publish</span>
                                                    <span class='d-block text-small text-muted'>Jelly beans wafer candy caramels fruitcake macaroon sweet roll.</span>
                                                    </span>
                                                </span>
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <label class='form-check custom-icon mb-0 checked-opacity-100'>
                                                <input type='checkbox' class='form-check-input' checked />
                                                <span class='form-check-label'>
                                                    <span class='content opacity-50'>
                                                    <span class='heading mb-1 lh-1-25'>Edit</span>
                                                    <span class='d-block text-small text-muted'>Jelly cake jelly sesame snaps jelly beans jelly beans.</span>
                                                    </span>
                                                </span>
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <label class='form-check custom-icon mb-0 checked-opacity-100'>
                                                <input type='checkbox' class='form-check-input' />
                                                <span class='form-check-label'>
                                                    <span class='content opacity-50'>
                                                    <span class='heading mb-1 lh-1-25'>Delete</span>
                                                    <span class='d-block text-small text-muted'>Danish oat cake pudding.</span>
                                                    </span>
                                                </span>
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <label class='form-check custom-icon mb-0 checked-opacity-100'>
                                                <input type='checkbox' class='form-check-input' checked />
                                                <span class='form-check-label'>
                                                    <span class='content opacity-50'>
                                                    <span class='heading mb-1 lh-1-25'>Add User</span>
                                                    <span class='d-block text-small text-muted'>Soufflé chocolate cake chupa chups danish brownie pudding fruitcake.</span>
                                                    </span>
                                                </span>
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <label class='form-check custom-icon mb-0 checked-opacity-100'>
                                                <input type='checkbox' class='form-check-input' />
                                                <span class='form-check-label'>
                                                    <span class='content opacity-50'>
                                                    <span class='heading mb-1 lh-1-25'>Edit User</span>
                                                    <span class='d-block text-small text-muted'>Biscuit powder brownie powder sesame snaps jelly-o dragée cake.</span>
                                                    </span>
                                                </span>
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <label class='form-check custom-icon mb-0 checked-opacity-100'>
                                                <input type='checkbox' class='form-check-input' />
                                                <span class='form-check-label'>
                                                    <span class='content opacity-50'>
                                                    <span class='heading mb-1 lh-1-25'>Delete User</span>
                                                    <span class='d-block text-small text-muted'>
                                                        Liquorice jelly powder fruitcake oat cake. Gummies tiramisu cake jelly-o bonbon. Marshmallow liquorice croissant.
                                                    </span>
                                                    </span>
                                                </span>
                                                </label>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- Permissions Tab End -->
    
                                    <!-- Friends Tab Start -->
                                    <div class='tab-pane fade' id='friendsTab' role='tabpanel'>
                                        <h2 class='small-title'>Friends</h2>
                                        <div class='row row-cols-1 row-cols-md-2 row-cols-xxl-3 g-2 mb-5'>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <div class='row g-0 sh-6'>
                                                <div class='col-auto'>
                                                    <img src='img/profile/profile-1.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                                </div>
                                                <div class='col'>
                                                    <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                    <div class='d-flex flex-column'>
                                                        <div>Blaine Cottrell</div>
                                                        <div class='text-small text-muted'>Project Manager</div>
                                                    </div>
                                                    <div class='d-flex'>
                                                        <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <div class='row g-0 sh-6'>
                                                <div class='col-auto'>
                                                    <img src='img/profile/profile-4.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                                </div>
                                                <div class='col'>
                                                    <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                    <div class='d-flex flex-column'>
                                                        <div>Cherish Kerr</div>
                                                        <div class='text-small text-muted'>Development Lead</div>
                                                    </div>
                                                    <div class='d-flex'>
                                                        <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <div class='row g-0 sh-6'>
                                                <div class='col-auto'>
                                                    <img src='img/profile/profile-8.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                                </div>
                                                <div class='col'>
                                                    <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                    <div class='d-flex flex-column'>
                                                        <div>Kirby Peters</div>
                                                        <div class='text-small text-muted'>Accounting</div>
                                                    </div>
                                                    <div class='d-flex'>
                                                        <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <div class='row g-0 sh-6'>
                                                <div class='col-auto'>
                                                    <img src='img/profile/profile-5.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                                </div>
                                                <div class='col'>
                                                    <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                    <div class='d-flex flex-column'>
                                                        <div>Olli Hawkins</div>
                                                        <div class='text-small text-muted'>Client Relations Lead</div>
                                                    </div>
                                                    <div class='d-flex'>
                                                        <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <div class='row g-0 sh-6'>
                                                <div class='col-auto'>
                                                    <img src='img/profile/profile-2.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                                </div>
                                                <div class='col'>
                                                    <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                    <div class='d-flex flex-column'>
                                                        <div>Zayn Hartley</div>
                                                        <div class='text-small text-muted'>Customer Engagement</div>
                                                    </div>
                                                    <div class='d-flex'>
                                                        <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <div class='row g-0 sh-6'>
                                                <div class='col-auto'>
                                                    <img src='img/profile/profile-3.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                                </div>
                                                <div class='col'>
                                                    <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                    <div class='d-flex flex-column'>
                                                        <div>Esperanza Lodge</div>
                                                        <div class='text-small text-muted'>UX Designer</div>
                                                    </div>
                                                    <div class='d-flex'>
                                                        <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <div class='row g-0 sh-6'>
                                                <div class='col-auto'>
                                                    <img src='img/profile/profile-4.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                                </div>
                                                <div class='col'>
                                                    <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                    <div class='d-flex flex-column'>
                                                        <div>Kerr Jackson</div>
                                                        <div class='text-small text-muted'>Frontend Developer</div>
                                                    </div>
                                                    <div class='d-flex'>
                                                        <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <div class='row g-0 sh-6'>
                                                <div class='col-auto'>
                                                    <img src='img/profile/profile-6.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                                </div>
                                                <div class='col'>
                                                    <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                    <div class='d-flex flex-column'>
                                                        <div>Kathryn Mengel</div>
                                                        <div class='text-small text-muted'>Team Leader</div>
                                                    </div>
                                                    <div class='d-flex'>
                                                        <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <div class='row g-0 sh-6'>
                                                <div class='col-auto'>
                                                    <img src='img/profile/profile-6.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                                </div>
                                                <div class='col'>
                                                    <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                    <div class='d-flex flex-column'>
                                                        <div>Joisse Kaycee</div>
                                                        <div class='text-small text-muted'>Copywriter</div>
                                                    </div>
                                                    <div class='d-flex'>
                                                        <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class='col'>
                                            <div class='card'>
                                            <div class='card-body'>
                                                <div class='row g-0 sh-6'>
                                                <div class='col-auto'>
                                                    <img src='img/profile/profile-7.webp' class='card-img rounded-xl sh-6 sw-6' alt='thumb' />
                                                </div>
                                                <div class='col'>
                                                    <div class='card-body d-flex flex-row pt-0 pb-0 ps-3 pe-0 h-100 align-items-center justify-content-between'>
                                                    <div class='d-flex flex-column'>
                                                        <div>Zayn Hartley</div>
                                                        <div class='text-small text-muted'>Visual Effect Designer</div>
                                                    </div>
                                                    <div class='d-flex'>
                                                        <button type='button' class='btn btn-outline-primary btn-sm ms-1'>View Doc</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- Friends Tab End -->
    
                                    <!-- About Tab Start -->
                                    <div class='tab-pane fade' id='aboutTab' role='tabpanel'>
                                        <h2 class='small-title'>About</h2>
                                        <div class='card'>
                                        <div class='card-body'>
                                            <div class='mb-5'>
                                            <p class='text-small text-muted mb-2'>ME</p>
                                            <p>
                                                Jujubes brownie marshmallow apple pie donut ice cream jelly-o jelly-o gummi bears. Tootsie roll chocolate bar dragée bonbon cheesecake
                                                icing. Danish wafer donut cookie caramels gummies topping.
                                            </p>
                                            </div>
                                            <div class='mb-5'>
                                            <p class='text-small text-muted mb-2'>INTERESTS</p>
                                            <p>
                                                Chocolate cake biscuit donut cotton candy soufflé cake macaroon. Halvah chocolate cotton candy sweet roll jelly-o candy danish dragée.
                                                Apple pie cotton candy tiramisu biscuit cake muffin tootsie roll bear claw cake. Cupcake cake fruitcake.
                                            </p>
                                            </div>
                                            <div>
                                            <p class='text-small text-muted mb-2'>CONTACT</p>
                                            <a href='#' class='d-block body-link mb-1'>
                                                <i data-acorn-icon='screen' class='me-2' data-acorn-size='17'></i>
                                                <span class='align-middle'>blainecottrell.com</span>
                                            </a>
                                            <a href='#' class='d-block body-link'>
                                                <i data-acorn-icon='email' class='me-2' data-acorn-size='17'></i>
                                                <span class='align-middle'>contact@blainecottrell.com</span>
                                            </a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>";
                            
                            echo"<fieldset>
                                                    <h2>Personal Detail</h2>
                                                    <div class='row'>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Posting Date *</label><input name='pdate' type='date' value='$pdate' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Joining Date  *</label><input name='jdate' type='date' value='$jdate' class='form-control' required></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Support ID *</label><input name='employeeid' type='text' value='".$t1["uid"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>First Name *</label><input name='fname' type='text' value='".$t1["username"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Last Name *</label><input name='lname' type='text' value='".$t1["username2"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Login User ID *</label><input name='userid' type='text' value='".$t1["unbox"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Login Password *</label><input name='password' type='text' value='".$t1["passbox"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Address *</label><input name='address' type='text' value='".$t1["address"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Address 2</label><input name='address2' type='text' value='".$t1["address2"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>City # *</label><input name='city' type='text' value='".$t1["city"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>State # *</label><input name='state' type='text' value='".$t1["area"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Zip # *</label><input name='zip' type='text' value='".$t1["zip"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Country # *</label><select class='form-control m-b required' name='country' required>
                                                            <option value='".$t1["country"]."'>".$t1["country"]."</option>
                                                               
                                                        </select></div></div>
                                                        
                                                        <div class='col-lg-2'><div class='form-group'><label>Phone # *</label><input name='phone' type='text' value='".$t1["phone"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Email Address *</label><input name='email' type='text' value='".$t1["email"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>DOB *</label><input name='dob' type='date' value='$dob' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Gender *</label><select class='form-control m-b required ' name='gender'>
                                                            <option value='".$t1["gender"]."'>".$t1["gender"]."</option><option value='MALE'>MALE</option><option value='FEMALE'>FEMALE</option><option value='OTHER'>OTHER</option>
                                                        </select></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Marital Status *</label><select class='form-control m-b required ' name='marital_status'>
                                                            <option value='".$t1["marital_status"]."'>".$t1["marital_status"]."</option><option value='SINGLE'>SINGLE</option><option value='MARIED'>MARIED</option>
                                                            <option value='WIDOWED'>WIDOWED</option><option value='SEPARATED'>SEPARATED</option><option value='DIVORCED'>DIVORCED</option>
                                                        </select></div></div>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Financial Detail</h2><br>
                                                    <div class='row'>
                                                        <div class='col-lg-2'><div class='form-group'><label>ABN *</label><input name='abn' type='text' value='".$t1["abn"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Bank Name</label><input name='bankname' type='text' value='".$t1["bank_name"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>BSB</label><input name='bsb' type='text' value='".$t1["bsb"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Account Name</label><input name='accountname' type='text' value='".$t1["account_name"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Account Number</label><input name='accountnumber' type='text' value='".$t1["account_number"]."' class='form-control'></div></div>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Official Detail</h2><br>
                                                    <div class='row'>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Designation *</label><select class='form-control m-b required' name='designation' required=''>";
                                                            $s7x = "select * from designation where id='".$t1["designation"]."' order by id asc limit 1";
                                                            $r7x = $conn->query($s7x);
                                                            if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                                echo"<option value='".$rs7x["id"]."'>".$rs7x["designation"]."</option>";
                                                            } }
                                                            $s7 = "select * from designation where status='1' order by id asc";
                                                            $r7 = $conn->query($s7);
                                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                                echo"<option value='".$rs7["id"]."'>".$rs7["designation"]."</option>";
                                                            } }
                                                        echo"</select></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Department *</label><select class='form-control m-b required' name='department' required>";
                                                            $s7x = "select * from departments where id='".$t1["department"]."' order by id asc limit 1";
                                                            $r7x = $conn->query($s7x);
                                                            if ($r7x->num_rows > 0) { while($rs7x = $r7x->fetch_assoc()) {
                                                                echo"<option value='".$rs7x["id"]."'>".$rs7x["department_name"]."</option>";
                                                            } }
                                                            $s7 = "select * from departments where status='1' order by id asc";
                                                            $r7 = $conn->query($s7);
                                                            if ($r7->num_rows > 0) { while($rs7 = $r7->fetch_assoc()) {
                                                                echo"<option value='".$rs7["id"]."'>".$rs7["department_name"]."</option>";
                                                            } }
                                                        echo"</select></div></div>
                                                        
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>Account Type</label><select class='form-control m-b required' name='mtype' required>
                                                            <option value='".$t1["mtype"]."'>".$t1["mtype"]."</option><option value='SUPPORT'>SUPPORT</option>
                                                        </select></div></div>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset><br>
                                                    <h2>Accounts Detail</h2><br>
                                                    <div class='row'> 
                                                        <div class='col-lg-2'><div class='form-group'><label>Commission Basic</label><select class='form-control m-b required' name='salary_basic' required>
                                                            <option value='".$t1["salary_basic"]."'>".$t1["salary_basic"]."</option><option value='Hourly'>Hourly</option>
                                                            <option value='Daily'>Daily</option><option value='Weekly'>Weekly</option><option value='Monthly'>Monthly</option>
                                                        </select></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Regular Commission</label><input name='reg_amt' type='text' value='".$t1["reg_amt"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Saturday Commission</label><input name='sat_amt' type='text' value='".$t1["sat_amt"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Sunday Commission</label><input name='sun_amt' type='text' value='".$t1["sun_amt"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Public holiday Comm.</label><input name='hol_amt' type='text' value='".$t1["hol_amt"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Over Night Commission</label><input name='night_amt' type='text' value='".$t1["night_amt"]."' class='form-control' required></div></div>
                                                        
                                                        <div class='col-lg-2'><div class='form-group'><label>Overtime (Per Hour)</label><input name='overtime' type='text' value='".$t1["overtime"]."' class='form-control' required></div></div>
                                                        <div class='col-lg-2'><div class='form-group'><label>Payment type</label><select class='form-control m-b required' name='payment_type' required>
                                                            <option value='".$t1["payment_type"]."'>".$t1["payment_type"]."</option><option value='Bank Transfer'>Bank Transfer</option>
                                                            <option value='Check'>Check</option><option value='Cash'>Cash</option>
                                                        </select></div></div>
                                                        
                                                        <input name='pf' type='hidden' value='No'><input name='pf_no' type='hidden' value='0'>
                                                        <input name='pf_rate' type='hidden' value='0'><input name='esi' type='hidden' value='No'>
                                                        <input name='esi_no' type='hidden' value='0'><input name='esi_rate' type='hidden' value='0'>";
    
                                                        /*
                                                        <div class='col-lg-12'>&nbsp;</div>                                                    
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF contribution</label><select class='form-control m-b' name='pf'>
                                                            <option value='".$t1["pf"]."'>".$t1["pf"]."</option><option value='Yes'>Yes</option><option value='No'>No</option>
                                                        </select></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF No.</label><input name='pf_no' type='number' value='".$t1["pf_no"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>PF rate</label><input name='pf_rate' type='number' value='".$t1["pf_rate"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI contribution</label><select class='form-control m-b ' name='esi'>
                                                            <option value='".$t1["esi"]."'>".$t1["esi"]."</option><option value='Yes'>Yes</option><option value='No'>No</option>
                                                        </select></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI No.</label><input name='esi_no' type='number' value='".$t1["esi_no"]."' class='form-control'></div></div>
                                                        <div class='col-lg-2' style='margin-bottom:25px'><div class='form-group'><label>ESI rate</label><input name='esi_rate' type='number' value='".$t1["esi_rate"]."' class='form-control'></div></div>";
                                                        */
    
                                                    echo"</div>
                                                </fieldset>
                                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas'>Close</button>&nbsp;
                                                </div>";
                                            } }
                }
    
            }else{
    
                if($cid==7){
                    $randid=rand(100,999);
                    $ctime=time();
                    $rdate=date("Y-m-d",$ctime);                
    
                    echo"<input type=hidden name='processor' value='add_campaign'>
                                <fieldset>
                                    <h2>Campaign Detail</h2><br>
                                    <div class='row'>
                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Campaign Name *</label><input name='campaign_name' type='text' value='' class='form-control' required></div></div>    
                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Expected Closing  Date *</label><input name='start_date' type='date' value='$rdate' class='form-control' required></div></div>
                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Campaign End Date *</label><input name='end_date' type='date' value='$rdate' class='form-control' required></div></div>
                                        
                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Targeted Client Name *</label>
                                            <select class='form-select' name='clientid' required='' >";
                                                $e1 = "select * from uerp_user where id='".$rs1x["employeeid"]."' order by id asc limit 1";
                                                $f1 = $conn->query($e1);
                                                if ($f1->num_rows > 0) { while($g1 = $f1->fetch_assoc()) {
                                                    echo"<option value='".$g1["id"]."'>".$g1["username"]." ".$g1["username2"]."</option>";
                                                } }
                                                $e2 = "select * from uerp_user where status<>'4' order by username asc";
                                                $f2 = $conn->query($e2);
                                                if ($f2->num_rows > 0) { while($g2 = $f2->fetch_assoc()) {
                                                    echo"<option value='".$g2["id"]."'>".$g2["username"]." ".$g2["username2"]."</option>";
                                                } }
                                            echo"</select>
                                        </div></div>
    
                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'>
                                            <label>Team Leader Name *</label>
                                            <select class='form-select' name='employeeid' required='' >";
                                                $e1 = "select * from uerp_user where id='".$rs1x["employeeid"]."' order by id asc limit 1";
                                                $f1 = $conn->query($e1);
                                                if ($f1->num_rows > 0) { while($g1 = $f1->fetch_assoc()) {
                                                    echo"<option value='".$g1["id"]."'>".$g1["username"]." ".$g1["username2"]."</option>";
                                                } }
                                                $e2 = "select * from uerp_user where status<>'4' order by username asc";
                                                $f2 = $conn->query($e2);
                                                if ($f2->num_rows > 0) { while($g2 = $f2->fetch_assoc()) {
                                                    echo"<option value='".$g2["id"]."'>".$g2["username"]." ".$g2["username2"]."</option>";
                                                } }
                                            echo"</select>
                                        </div></div>
    
                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Campaign GEO Location *</label><select class='form-control m-b required' name='country' required>
                                            <option value=''>Select Country</option>
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
                                        </select></div></div>
                                    </div>
                                </fieldset>
                                
                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Close</button>&nbsp;
                                    <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button> &nbsp;                            
                                    <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Save</button>
                                </div>";
                }           
    
                if($cid==8){
                    $randid=rand(100,999);
                    $ctime=time();
                    $rdate=date("Y-m-d",$ctime);                
    
                    echo"<input type=hidden name='processor' value='add_opportunity'>
                                <fieldset>
                                    <h2>Opportunity Detail</h2><br>
                                    <div class='row'>
                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Campaign Name *</label>
                                            <select class='form-select' name='campaignid' required='' >";
                                                $e1 = "select * from campaigns where status='ON' order by id asc";
                                                $f1 = $conn->query($e1);
                                                if ($f1->num_rows > 0) { while($g1 = $f1->fetch_assoc()) {
                                                    echo"<option value='".$g1["id"]."'>".$g1["campaign_name"]."</option>";
                                                } }                                            
                                            echo"</select>
                                        </div></div>
                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Opportunity Name *</label><input name='opportunity_name' type='text' value='' class='form-control' required></div></div>    
                                        <div class='col-lg-4' style='margin-bottom:15px'><div class='form-group'><label>Start Date *</label><input name='start_date' type='date' value='$rdate' class='form-control' required></div></div>
                                        
                                        <div class='col-lg-12' style='margin-bottom:15px'><div class='form-group'><label>Plan/Note *</label><input name='plan' type='text' value='' class='form-control' required></div></div>                                                                        
                                        <div class='col-lg-12' style='margin-bottom:15px'><div class='form-group'><label>Possibility </label><input name='possibility' type='text' value='' class='form-control' required></div></div>                                                                        
                                        <div class='col-lg-12' style='margin-bottom:15px'><div class='form-group'><label>Opportunity</label><input name='opportunity' type='text' value='' class='form-control' required></div></div>                                                                        
    
                                </fieldset>
                                
                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Close</button>&nbsp;
                                    <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button> &nbsp;                            
                                    <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Save</button>
                                </div>";
                }
                
                if($cid==9){
                    $randid=rand(100,999);
                    $ctime=time();
                    $rdate=date("Y-m-d",$ctime);                
    
                    echo"<input type=hidden name='processor' value='add_lead'>
                                <fieldset>
                                    <h2>Lead Detail</h2><br>
                                    <div class='row'>
                                        <div class='col-lg-6' style='margin-bottom:15px'><div class='form-group'><label>Campaign Name *</label>
                                            <select class='form-select' name='campaignid' required='' >";
                                                $e1 = "select * from campaigns where status='ON' order by id asc";
                                                $f1 = $conn->query($e1);
                                                if ($f1->num_rows > 0) { while($g1 = $f1->fetch_assoc()) {
                                                    echo"<option value='".$g1["id"]."'>".$g1["campaign_name"]."</option>";
                                                } }                                            
                                            echo"</select>
                                        </div></div>
                                        <div class='col-lg-6' style='margin-bottom:15px'><div class='form-group'><label>Lead Name *</label><input name='lead_name' type='text' value='' class='form-control' required></div></div>    
                                        <div class='col-lg-6' style='margin-bottom:15px'><div class='form-group'><label>Date *</label><input name='date' type='date' value='$rdate' class='form-control' required></div></div>
                                        <div class='col-lg-6' style='margin-bottom:15px'><div class='form-group'><label>Appointment Date *</label><input name='appointment_date' type='date' value='$rdate' class='form-control' required></div></div>
                                        <div class='col-lg-12' style='margin-bottom:15px'><div class='form-group'><label>Speech Note</label><input name='speech_note' type='text' value='' class='form-control' required></div></div>                                                                        
                                        <div class='col-lg-12' style='margin-bottom:15px'><div class='form-group'><label>Additional Note </label><input name='note' type='text' value='' class='form-control' required></div></div>
                                </fieldset>
                                
                                <div class='modal-footer' class='col-md-12' style='margin-top:15px;padding:5px;border-width:0px'>
                                    <button type='button' class='btn btn-outline-primary' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Close</button>&nbsp;
                                    <button class='btn btn-primary' type='reset' ata-bs-toggle='tooltip' data-bs-placement='left' title='Module Updated'id='notifyButtonBottomLeft'>Reset</button> &nbsp;                            
                                    <button class='btn btn-primary' type='submit' data-bs-dismiss='offcanvas' onblur=\"shiftdataV2('users_table.php?cid=$cid&sheba=$sheba&utype=$utype', 'datatableX')\">Save</button>
                                </div>";
                }
    
    
            }
        echo"</form>
    </div>";
?>

    <script src="js/vendor/jquery-3.5.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/OverlayScrollbars.min.js"></script>
    <script src="js/vendor/autoComplete.min.js"></script>
    <script src="js/vendor/clamp.min.js"></script>
    <script src="icon/acorn-icons.js"></script>
    <script src="icon/acorn-icons-interface.js"></script>
    <script src="js/vendor/Chart.bundle.min.js"></script>
    <script src="js/base/helpers.js"></script>
    <script src="js/base/globals.js"></script>
    <script src="js/base/nav.js"></script>
    <script src="js/base/search.js"></script>
    <script src="js/base/settings.js"></script>
    <script src="js/cs/charts.extend.js"></script>
    <script src="js/pages/profile.standard.js"></script>
    <script src="js/common.js"></script>
    <script src="js/scripts.js"></script>