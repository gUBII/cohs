<?php
include '../include.php';

// Handle form submission
$success_message = '';
$error_message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect form data (example for a few fields, extend as needed)
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $consent = isset($_POST['consent']) ? 1 : 0;
    $participants = mysqli_real_escape_string($conn, $_POST['participants']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    // Add other fields here...

    // Insert query (extend with all fields)
    $sql = "INSERT INTO consumer_assessment (
        date, consent, participants, name, dob, level, phone, address, email, aged_care_id, 
        medicare, pension_dva, gender, preferred_language, marital_status, birth_country_ethnicity,
        poa_fin_name, poa_fin_relationship, poa_fin_email, poa_fin_phone, care_name, care_relationship,
        care_email, care_phone, doctor, doctor_phone, specialist, specialist_phone, no_response_to_door,
        falls_alarm, key_box, smoke_alarm, commencement_date, review_date, allergies, diabetic_t1dm,
        management_plan, reason_for_care, primary_conditions, health_history, living_situation,
        current_services, respite_emergency_plan, advanced_care_plan, advanced_care_directive,
        my_health_record, medication_webster, medication_dosette, medication_original_pack,
        medication_texture, medication_assistance, regular_vaccinations_flu, regular_vaccinations_covid,
        memory_issues, memory_loss_level, behaviours_of_concern, communication_needs, languages_spoken,
        sight_conditions, hearing_conditions, pain_management, toileting_assistance, continence_status,
        personal_care_needs, oral_hygiene, nutrition_hydration, diabetes_status, meal_prep_assistance,
        food_texture, fluid_texture, smoking_vaping, alcohol_drugs, weight_loss, foot_care, hair_care,
        mobility_status, transfers_assistance, falls_history, upper_body_strength, equipment_needs,
        sleep_conditions, telephone_use, email_internet_use, housework_ability, gardening_ability,
        shopping_ability, finances_management, games_hobbies, mood_status, social_participation,
        transportation_ability, clinical_risks_identified, nursing_needs, therapy_needs,
        independence_needs, preferences, goals
    ) VALUES (
        '$date', '$consent', '$participants', '$name', '$dob', '" . mysqli_real_escape_string($conn, $_POST['level']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['phone']) . "', '" . mysqli_real_escape_string($conn, $_POST['address']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['email']) . "', '" . mysqli_real_escape_string($conn, $_POST['aged_care_id']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['medicare']) . "', '" . mysqli_real_escape_string($conn, $_POST['pension_dva']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['gender']) . "', '" . mysqli_real_escape_string($conn, $_POST['preferred_language']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['marital_status']) . "', '" . mysqli_real_escape_string($conn, $_POST['birth_country_ethnicity']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['poa_fin_name']) . "', '" . mysqli_real_escape_string($conn, $_POST['poa_fin_relationship']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['poa_fin_email']) . "', '" . mysqli_real_escape_string($conn, $_POST['poa_fin_phone']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['care_name']) . "', '" . mysqli_real_escape_string($conn, $_POST['care_relationship']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['care_email']) . "', '" . mysqli_real_escape_string($conn, $_POST['care_phone']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['doctor']) . "', '" . mysqli_real_escape_string($conn, $_POST['doctor_phone']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['specialist']) . "', '" . mysqli_real_escape_string($conn, $_POST['specialist_phone']) . "',
        '" . (isset($_POST['no_response_to_door']) ? 1 : 0) . "', '" . (isset($_POST['falls_alarm']) ? 1 : 0) . "',
        '" . (isset($_POST['key_box']) ? 1 : 0) . "', '" . (isset($_POST['smoke_alarm']) ? 1 : 0) . "',
        '" . mysqli_real_escape_string($conn, $_POST['commencement_date']) . "', '" . mysqli_real_escape_string($conn, $_POST['review_date']) . "',
        '" . (isset($_POST['allergies']) ? 1 : 0) . "', '" . (isset($_POST['diabetic_t1dm']) ? 1 : 0) . "',
        '" . mysqli_real_escape_string($conn, $_POST['management_plan']) . "', '" . mysqli_real_escape_string($conn, $_POST['reason_for_care']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['primary_conditions']) . "', '" . mysqli_real_escape_string($conn, $_POST['health_history']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['living_situation']) . "', '" . mysqli_real_escape_string($conn, $_POST['current_services']) . "',
        '" . (isset($_POST['respite_emergency_plan']) ? 1 : 0) . "', '" . (isset($_POST['advanced_care_plan']) ? 1 : 0) . "',
        '" . (isset($_POST['advanced_care_directive']) ? 1 : 0) . "', '" . (isset($_POST['my_health_record']) ? 1 : 0) . "',
        '" . (isset($_POST['medication_webster']) ? 1 : 0) . "', '" . (isset($_POST['medication_dosette']) ? 1 : 0) . "',
        '" . (isset($_POST['medication_original_pack']) ? 1 : 0) . "', '" . mysqli_real_escape_string($conn, $_POST['medication_texture']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['medication_assistance']) . "', '" . (isset($_POST['regular_vaccinations_flu']) ? 1 : 0) . "',
        '" . (isset($_POST['regular_vaccinations_covid']) ? 1 : 0) . "', '" . (isset($_POST['memory_issues']) ? 1 : 0) . "',
        '" . mysqli_real_escape_string($conn, $_POST['memory_loss_level']) . "', '" . mysqli_real_escape_string($conn, $_POST['behaviours_of_concern']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['communication_needs']) . "', '" . mysqli_real_escape_string($conn, $_POST['languages_spoken']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['sight_conditions']) . "', '" . mysqli_real_escape_string($conn, $_POST['hearing_conditions']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['pain_management']) . "', '" . mysqli_real_escape_string($conn, $_POST['toileting_assistance']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['continence_status']) . "', '" . mysqli_real_escape_string($conn, $_POST['personal_care_needs']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['oral_hygiene']) . "', '" . mysqli_real_escape_string($conn, $_POST['nutrition_hydration']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['diabetes_status']) . "', '" . mysqli_real_escape_string($conn, $_POST['meal_prep_assistance']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['food_texture']) . "', '" . mysqli_real_escape_string($conn, $_POST['fluid_texture']) . "',
        '" . (isset($_POST['smoking_vaping']) ? 1 : 0) . "', '" . (isset($_POST['alcohol_drugs']) ? 1 : 0) . "',
        '" . (isset($_POST['weight_loss']) ? 1 : 0) . "', '" . mysqli_real_escape_string($conn, $_POST['foot_care']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['hair_care']) . "', '" . mysqli_real_escape_string($conn, $_POST['mobility_status']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['transfers_assistance']) . "', '" . mysqli_real_escape_string($conn, $_POST['falls_history']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['upper_body_strength']) . "', '" . mysqli_real_escape_string($conn, $_POST['equipment_needs']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['sleep_conditions']) . "', '" . mysqli_real_escape_string($conn, $_POST['telephone_use']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['email_internet_use']) . "', '" . mysqli_real_escape_string($conn, $_POST['housework_ability']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['gardening_ability']) . "', '" . mysqli_real_escape_string($conn, $_POST['shopping_ability']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['finances_management']) . "', '" . mysqli_real_escape_string($conn, $_POST['games_hobbies']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['mood_status']) . "', '" . mysqli_real_escape_string($conn, $_POST['social_participation']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['transportation_ability']) . "', '" . mysqli_real_escape_string($conn, $_POST['clinical_risks_identified']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['nursing_needs']) . "', '" . mysqli_real_escape_string($conn, $_POST['therapy_needs']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['independence_needs']) . "', '" . mysqli_real_escape_string($conn, $_POST['preferences']) . "',
        '" . mysqli_real_escape_string($conn, $_POST['goals']) . "'
    )";

    if (mysqli_query($conn, $sql)) {
        $success_message = "Consumer assessment added successfully!";
    } else {
        $error_message = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

    <div class="container mt-5">
        <h1 class="mb-4">Consumer Assessment Form</h1>

        <?php if ($success_message): ?>
            <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <?php if ($error_message): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <!-- Personal Information -->
            <h3>Personal Information</h3>
            <div class='row'>
                <div class='col-md-4' style='margin-bottom:10px'>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>
                </div><div class='col-md-4' style='margin-bottom:10px'>
                    <div class="form-group">
                        <label>Consent</label>
                        <select name="consent" class="form-control">
                            <option value="0">NO</option><option value="1">YES</option>
                        </select>
                    </div>
                </div><div class='col-md-4' style='margin-bottom:10px'>
                    <div class="form-group">
                        <label>Participants</label>
                        <textarea name="participants" class="form-control"></textarea>
                    </div>
                </div><div class='col-md-4' style='margin-bottom:10px'>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                </div><div class='col-md-4' style='margin-bottom:10px'>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" class="form-control" required>
                    </div>
                </div><div class='col-md-4' style='margin-bottom:10px'>
                    <div class="form-group">
                        <label>Level</label>
                        <input type="text" name="level" class="form-control">
                    </div>
                </div><div class='col-md-4' style='margin-bottom:10px'>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                </div><div class='col-md-4' style='margin-bottom:10px'>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control"></textarea>
                    </div>
                </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>Aged Care ID</label>
                <input type="text" name="aged_care_id" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>Medicare</label>
                <input type="text" name="medicare" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>Pension/DVA</label>
                <input type="text" name="pension_dva" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>Preferred Language</label>
                <input type="text" name="preferred_language" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>Marital Status</label>
                <input type="text" name="marital_status" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>Birth Country/Ethnicity</label>
                <input type="text" name="birth_country_ethnicity" class="form-control">
            </div>
            </div><div class='col-md-12' style='margin-bottom:10px'><br><br>
                <!-- Emergency Contacts -->
                <h3>Emergency Contacts</h3>
            </div><div class='col-md-4' style='margin-bottom:10px'>
                <div class="form-group">
                    <label>POA Financial Name</label>
                    <input type="text" name="poa_fin_name" class="form-control">
                </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>POA Financial Relationship</label>
                <input type="text" name="poa_fin_relationship" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>POA Financial Email</label>
                <input type="email" name="poa_fin_email" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>POA Financial Phone</label>
                <input type="text" name="poa_fin_phone" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>Care Name</label>
                <input type="text" name="care_name" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>Care Relationship</label>
                <input type="text" name="care_relationship" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>Care Email</label>
                <input type="email" name="care_email" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>Care Phone</label>
                <input type="text" name="care_phone" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>Doctor</label>
                <input type="text" name="doctor" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'>
            <div class="form-group">
                <label>Doctor Phone</label>
                <input type="text" name="doctor_phone" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Specialist</label>
                <input type="text" name="specialist" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Specialist Phone</label>
                <input type="text" name="specialist_phone" class="form-control">
            </div>
            </div>
            
            <div class='col-md-12' style='margin-bottom:10px'>&nbsp;<Br></div>
            
            <div class='col-md-3' style='margin-bottom:10px'><div class="form-group">
                <label>No Response to Door</label>
                <input type="checkbox" name="no_response_to_door" value="1">
            </div>
            </div><div class='col-md-3' style='margin-bottom:10px'><div class="form-group">
                <label>Falls Alarm</label>
                <input type="checkbox" name="falls_alarm" value="1">
            </div>
            </div><div class='col-md-3' style='margin-bottom:10px'><div class="form-group">
                <label>Key Box</label>
                <input type="checkbox" name="key_box" value="1">
            </div>
            </div><div class='col-md-3' style='margin-bottom:10px'><div class="form-group">
                <label>Smoke Alarm</label>
                <input type="checkbox" name="smoke_alarm" value="1">
            </div>

            </div><div class='col-md-12' style='margin-bottom:10px'><div class="form-group"><br><br>
                <h3>Medical Details</h3>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Commencement Date</label>
                <input type="date" name="commencement_date" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Review Date</label>
                <input type="date" name="review_date" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Allergies</label>
                <select name="allergies" class="form-control">
                    <option value="0">NO</option><option value="1">YES</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Diabetic (T1DM)</label>
                <select name="diabetic_t1dm" class="form-control">
                    <option value="0">NO</option><option value="1">YES</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Management Plan</label>
                <textarea name="management_plan" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Reason for Care</label>
                <textarea name="reason_for_care" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Primary Conditions</label>
                <textarea name="primary_conditions" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Health History</label>
                <textarea name="health_history" class="form-control"></textarea>
            </div>

            </div><div class='col-md-12' style='margin-bottom:10px'><div class="form-group"><br><br>
                <h3>Living & Care Information</h3>
            </div>
            
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Living Situation</label>
                <textarea name="living_situation" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Current Services</label>
                <textarea name="current_services" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Respite/Emergency Plan</label>
                <select name="respite_emergency_plan" class="form-control">
                    <option value="0">NO</option><option value="1">YES</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Advanced Care Plan</label>
                <select name="advanced_care_plan" class="form-control">
                    <option value="0">NO</option><option value="1">YES</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Advanced Care Directive</label>
                <select name="advanced_care_directive" class="form-control">
                    <option value="0">NO</option><option value="1">YES</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>My Health Record</label>
                <select name="my_health_record" class="form-control">
                    <option value="0">NO</option><option value="1">YES</option>
                </select>
            </div>

            </div><div class='col-md-12' style='margin-bottom:10px'><div class="form-group"><BR><BR>
                <h3>Medications</h3></DIV>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Medication Webster</label>
                <select name="medication_webster" class="form-control">
                    <option value="0">NO</option><option value="1">YES</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Medication Dosette</label>
                <select name="medication_dosette" class="form-control">
                    <option value="0">NO</option><option value="1">YES</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Medication Original Pack</label>
                <select name="medication_original_pack" class="form-control">
                    <option value="0">NO</option><option value="1">YES</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Medication Texture</label>
                <textarea name="medication_texture" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Medication Assistance</label>
                <textarea name="medication_assistance" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Regular Vaccinations (Flu)</label>
                <select name="regular_vaccinations_flu" class="form-control">
                    <option value="0">NO</option><option value="1">YES</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Regular Vaccinations (COVID)</label>
                <select name="regular_vaccinations_covid" class="form-control">
                    <option value="0">NO</option><option value="1">YES</option>
                </select>
            </div>
            
            </div><div class='col-md-12' style='margin-bottom:10px'><div class="form-group"><br><Br>
                <h3>Daily Activities</h3></div>
            </div>
            
            
            
            <div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Memory Issues</label>
                <select name="memory_issues" class="form-control">
                    <option value="0">NO</option><option value="1">YES</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Memory Loss Level</label>
                <select name="memory_loss_level" class="form-control">
                    <option value="None">None</option>
                    <option value="Mild">Mild</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Severe">Severe</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Behaviours of Concern</label>
                <textarea name="behaviours_of_concern" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Communication Needs</label>
                <textarea name="communication_needs" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Languages Spoken</label>
                <input type="text" name="languages_spoken" class="form-control">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Sight Conditions</label>
                <textarea name="sight_conditions" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Hearing Conditions</label>
                <textarea name="hearing_conditions" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Pain Management</label>
                <textarea name="pain_management" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Toileting Assistance</label>
                <textarea name="toileting_assistance" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Continence Status</label>
                <textarea name="continence_status" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Personal Care Needs</label>
                <textarea name="personal_care_needs" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Oral Hygiene</label>
                <textarea name="oral_hygiene" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Nutrition/Hydration</label>
                <textarea name="nutrition_hydration" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Diabetes Status</label>
                <select name="diabetes_status" class="form-control">
                    <option value="None">None</option>
                    <option value="T1DM">T1DM</option>
                    <option value="T2DM">T2DM</option>
                    <option value="Self-Manage">Self-Manage</option>
                    <option value="Requires Assistance">Requires Assistance</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Meal Prep Assistance</label>
                <textarea name="meal_prep_assistance" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Food Texture</label>
                <textarea name="food_texture" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Fluid Texture</label>
                <textarea name="fluid_texture" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Foot Care</label>
                <textarea name="foot_care" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Hair Care</label>
                <textarea name="hair_care" class="form-control"></textarea>
            </div>

            </div><div class='col-md-2' style='margin-bottom:10px'><br><br><div class="form-group">
                <label>Smoking/Vaping</label>
                <input type="checkbox" name="smoking_vaping" value="1">
            </div>
            </div><div class='col-md-2' style='margin-bottom:10px'><br><br><div class="form-group">
                <label>Alcohol/Drugs</label>
                <input type="checkbox" name="alcohol_drugs" value="1">
            </div>
            </div><div class='col-md-2' style='margin-bottom:10px'><br><br><div class="form-group">
                <label>Weight Loss</label>
                <input type="checkbox" name="weight_loss" value="1">
            </div>
            
            
            </div><div class='col-md-12' style='margin-bottom:10px'><div class="form-group"><Br><br>
                <h3>Mobility & Physical Condition</h3></div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Mobility Status</label>
                <textarea name="mobility_status" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Transfers Assistance</label>
                <textarea name="transfers_assistance" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Falls History</label>
                <textarea name="falls_history" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Upper Body Strength</label>
                <textarea name="upper_body_strength" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Equipment Needs</label>
                <textarea name="equipment_needs" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Sleep Conditions</label>
                <textarea name="sleep_conditions" class="form-control"></textarea>
            </div>

            </div><div class='col-md-12' style='margin-bottom:10px'><div class="form-group"><Br><br>
                <h3>Household & Social Activities</h3></div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Telephone Use</label>
                <textarea name="telephone_use" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Email/Internet Use</label>
                <textarea name="email_internet_use" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Housework Ability</label>
                <textarea name="housework_ability" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Gardening Ability</label>
                <textarea name="gardening_ability" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Shopping Ability</label>
                <textarea name="shopping_ability" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Finances Management</label>
                <textarea name="finances_management" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Games/Hobbies</label>
                <textarea name="games_hobbies" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Mood Status</label>
                <textarea name="mood_status" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Social Participation</label>
                <textarea name="social_participation" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Transportation Ability</label>
                <textarea name="transportation_ability" class="form-control"></textarea>
            </div>

            </div><div class='col-md-12' style='margin-bottom:10px'><div class="form-group"><Br><Br>
            <h3>Clinical Risks & Needs</h3></div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Clinical Risks Identified</label>
                <textarea name="clinical_risks_identified" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Nursing Needs</label>
                <textarea name="nursing_needs" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Therapy Needs</label>
                <textarea name="therapy_needs" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Independence Needs</label>
                <textarea name="independence_needs" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Preferences</label>
                <textarea name="preferences" class="form-control"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <label>Goals</label>
                <textarea name="goals" class="form-control"></textarea>
            </div>

            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>            
        </form>
    </div>
