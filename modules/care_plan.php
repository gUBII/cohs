<?php
// Include the database connection file
include '../include.php';

// Initialize variables
$message = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Escape and sanitize input data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $commenced = mysqli_real_escape_string($conn, $_POST['commenced']);
    $alerts = mysqli_real_escape_string($conn, $_POST['alerts']);
    $care_manager = mysqli_real_escape_string($conn, $_POST['care_manager']);
    $care_manager_contact = mysqli_real_escape_string($conn, $_POST['care_manager_contact']);
    $reason_for_home_care = mysqli_real_escape_string($conn, $_POST['reason_for_home_care']);
    $property_access = mysqli_real_escape_string($conn, $_POST['property_access']);
    $advocate = mysqli_real_escape_string($conn, $_POST['advocate']);
    $advocate_contact = mysqli_real_escape_string($conn, $_POST['advocate_contact']);
    $office_contact = mysqli_real_escape_string($conn, $_POST['office_contact']);
    $emergency_contact = mysqli_real_escape_string($conn, $_POST['emergency_contact']);
    $doctor = mysqli_real_escape_string($conn, $_POST['doctor']);
    $allergies = mysqli_real_escape_string($conn, $_POST['allergies']);
    $falls_alarm = isset($_POST['falls_alarm']) ? 1 : 0; // Boolean field
    $medications = mysqli_real_escape_string($conn, $_POST['medications']);
    $weight = mysqli_real_escape_string($conn, $_POST['weight']);
    $cognition = mysqli_real_escape_string($conn, $_POST['cognition']);
    $cultural = mysqli_real_escape_string($conn, $_POST['cultural']);
    $language = mysqli_real_escape_string($conn, $_POST['language']);
    $vaccinations = mysqli_real_escape_string($conn, $_POST['vaccinations']);
    $advanced_care_directive = mysqli_real_escape_string($conn, $_POST['advanced_care_directive']);
    $emergency_plan = mysqli_real_escape_string($conn, $_POST['emergency_plan']);
    $risks = mysqli_real_escape_string($conn, $_POST['risks']);
    $managed_by = mysqli_real_escape_string($conn, $_POST['managed_by']);
    $clinical_conditions = mysqli_real_escape_string($conn, $_POST['clinical_conditions']);
    $pain = mysqli_real_escape_string($conn, $_POST['pain']);
    $behaviour = mysqli_real_escape_string($conn, $_POST['behaviour']);
    $continence = mysqli_real_escape_string($conn, $_POST['continence']);
    $skin = mysqli_real_escape_string($conn, $_POST['skin']);
    $sight = mysqli_real_escape_string($conn, $_POST['sight']);
    $hearing = mysqli_real_escape_string($conn, $_POST['hearing']);
    $smell = mysqli_real_escape_string($conn, $_POST['smell']);
    $podiatry = mysqli_real_escape_string($conn, $_POST['podiatry']);
    $nutrition = mysqli_real_escape_string($conn, $_POST['nutrition']);
    $swallowing = mysqli_real_escape_string($conn, $_POST['swallowing']);
    $weight_loss = isset($_POST['weight_loss']) ? 1 : 0; // Boolean field
    $personal_care = mysqli_real_escape_string($conn, $_POST['personal_care']);
    $toileting = mysqli_real_escape_string($conn, $_POST['toileting']);
    $oral_hygiene = mysqli_real_escape_string($conn, $_POST['oral_hygiene']);
    $mobility = mysqli_real_escape_string($conn, $_POST['mobility']);
    $transfers = mysqli_real_escape_string($conn, $_POST['transfers']);
    $falls = mysqli_real_escape_string($conn, $_POST['falls']);
    $sleep = mysqli_real_escape_string($conn, $_POST['sleep']);
    $meal_prep = mysqli_real_escape_string($conn, $_POST['meal_prep']);
    $financial = mysqli_real_escape_string($conn, $_POST['financial']);
    $communication = mysqli_real_escape_string($conn, $_POST['communication']);
    $shopping = mysqli_real_escape_string($conn, $_POST['shopping']);
    $transport = mysqli_real_escape_string($conn, $_POST['transport']);
    $housework = mysqli_real_escape_string($conn, $_POST['housework']);
    $hobbies = mysqli_real_escape_string($conn, $_POST['hobbies']);
    $gardening = mysqli_real_escape_string($conn, $_POST['gardening']);
    $mood = mysqli_real_escape_string($conn, $_POST['mood']);
    $social = mysqli_real_escape_string($conn, $_POST['social']);
    $environment_indoor = mysqli_real_escape_string($conn, $_POST['environment_indoor']);
    $environment_outdoor = mysqli_real_escape_string($conn, $_POST['environment_outdoor']);
    $strengths = mysqli_real_escape_string($conn, $_POST['strengths']);
    $risk = mysqli_real_escape_string($conn, $_POST['risk']);
    $action_plan = mysqli_real_escape_string($conn, $_POST['action_plan']);
    $current_supports = mysqli_real_escape_string($conn, $_POST['current_supports']);
    $recommendations = mysqli_real_escape_string($conn, $_POST['recommendations']);
    $equipment_in_place = mysqli_real_escape_string($conn, $_POST['equipment_in_place']);
    $equip_modification_needed = mysqli_real_escape_string($conn, $_POST['equip_modification_needed']);
    $goals = mysqli_real_escape_string($conn, $_POST['goals']);
    $service_instruction = mysqli_real_escape_string($conn, $_POST['service_instruction']);

    // Insert query
    $sql = "INSERT INTO careplan (
        name, dob, level, commenced, alerts, care_manager, care_manager_contact, reason_for_home_care, property_access, advocate, advocate_contact, office_contact, emergency_contact, doctor, allergies, falls_alarm, medications, weight, cognition, cultural, language, vaccinations, advanced_care_directive, emergency_plan, risks, managed_by, clinical_conditions, pain, behaviour, continence, skin, sight, hearing, smell, podiatry, nutrition, swallowing, weight_loss, personal_care, toileting, oral_hygiene, mobility, transfers, falls, sleep, meal_prep, financial, communication, shopping, transport, housework, hobbies, gardening, mood, social, environment_indoor, environment_outdoor, strengths, risk, action_plan, current_supports, recommendations, equipment_in_place, equip_modification_needed, goals, service_instruction
    ) VALUES (
        '$name', '$dob', '$level', '$commenced', '$alerts', '$care_manager', '$care_manager_contact', '$reason_for_home_care', '$property_access', '$advocate', '$advocate_contact', '$office_contact', '$emergency_contact', '$doctor', '$allergies', '$falls_alarm', '$medications', '$weight', '$cognition', '$cultural', '$language', '$vaccinations', '$advanced_care_directive', '$emergency_plan', '$risks', '$managed_by', '$clinical_conditions', '$pain', '$behaviour', '$continence', '$skin', '$sight', '$hearing', '$smell', '$podiatry', '$nutrition', '$swallowing', '$weight_loss', '$personal_care', '$toileting', '$oral_hygiene', '$mobility', '$transfers', '$falls', '$sleep', '$meal_prep', '$financial', '$communication', '$shopping', '$transport', '$housework', '$hobbies', '$gardening', '$mood', '$social', '$environment_indoor', '$environment_outdoor', '$strengths', '$risk', '$action_plan', '$current_supports', '$recommendations', '$equipment_in_place', '$equip_modification_needed', '$goals', '$service_instruction'
    )";

    // Execute query
    if (mysqli_query($conn, $sql)) {
        $message = "Data saved successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

    <div class="container mt-5">
        <h1 class="mb-4">Care Plan Form</h1>
        <?php if (!empty($message)): ?>
            <div class="alert alert-success"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="POST" action="careplan.php">
            <!-- Personal Information -->
            <div class='row'>
            <div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="level">Level</label>
                <input type="number" class="form-control" id="level" name="level">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="commenced">Commenced Date</label>
                <input type="date" class="form-control" id="commenced" name="commenced">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="care_manager">Care Manager</label>
                <input type="text" class="form-control" id="care_manager" name="care_manager">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="care_manager_contact">Care Manager Contact</label>
                <input type="text" class="form-control" id="care_manager_contact" name="care_manager_contact">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="alerts">Alerts</label>
                <textarea class="form-control" id="alerts" name="alerts" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="reason_for_home_care">Reason for Home Care</label>
                <textarea class="form-control" id="reason_for_home_care" name="reason_for_home_care" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="property_access">Property Access</label>
                <textarea class="form-control" id="property_access" name="property_access" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="advocate">Advocate</label>
                <input type="text" class="form-control" id="advocate" name="advocate">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="advocate_contact">Advocate Contact</label>
                <input type="text" class="form-control" id="advocate_contact" name="advocate_contact">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="office_contact">Office Contact</label>
                <input type="text" class="form-control" id="office_contact" name="office_contact">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="emergency_contact">Emergency Contact</label>
                <input type="text" class="form-control" id="emergency_contact" name="emergency_contact">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="doctor">Doctor</label>
                <input type="text" class="form-control" id="doctor" name="doctor">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="allergies">Allergies</label>
                <input type="text" class="form-control" id="allergies" name="allergies">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label class="form-check-label" for="falls_alarm">Falls Alarm</label>
                <select name="falls_alarm" class="form-control">
                    <option value="0">NO</option><option value="1">YES</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="medications">Medications</label>
                <textarea class="form-control" id="medications" name="medications" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="weight">Weight</label>
                <input type="number" step="0.01" class="form-control" id="weight" name="weight">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="cognition">Cognition</label>
                <textarea class="form-control" id="cognition" name="cognition" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="cultural">Cultural</label>
                <textarea class="form-control" id="cultural" name="cultural" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="language">Language</label>
                <input type="text" class="form-control" id="language" name="language">
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="vaccinations">Vaccinations</label>
                <textarea class="form-control" id="vaccinations" name="vaccinations" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="advanced_care_directive">Advanced Care Directive</label>
                <textarea class="form-control" id="advanced_care_directive" name="advanced_care_directive" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="emergency_plan">Emergency Plan</label>
                <textarea class="form-control" id="emergency_plan" name="emergency_plan" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="risks">Risks</label>
                <textarea class="form-control" id="risks" name="risks" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="managed_by">Managed By</label>
                <textarea class="form-control" id="managed_by" name="managed_by" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="clinical_conditions">Clinical Conditions</label>
                <textarea class="form-control" id="clinical_conditions" name="clinical_conditions" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="pain">Pain</label>
                <textarea class="form-control" id="pain" name="pain" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="behaviour">Behaviour</label>
                <textarea class="form-control" id="behaviour" name="behaviour" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="continence">Continence</label>
                <textarea class="form-control" id="continence" name="continence" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="skin">Skin</label>
                <textarea class="form-control" id="skin" name="skin" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="sight">Sight</label>
                <textarea class="form-control" id="sight" name="sight" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="hearing">Hearing</label>
                <textarea class="form-control" id="hearing" name="hearing" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="smell">Smell</label>
                <textarea class="form-control" id="smell" name="smell" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="podiatry">Podiatry</label>
                <textarea class="form-control" id="podiatry" name="podiatry" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="nutrition">Nutrition</label>
                <textarea class="form-control" id="nutrition" name="nutrition" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="swallowing">Swallowing</label>
                <textarea class="form-control" id="swallowing" name="swallowing" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label class="form-check-label" for="weight_loss">Weight Loss</label>
                <select name="weight_loss" id="weight_loss" class="form-control">
                    <option value="0">NO</option><option value="1">YES</option>
                </select>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="personal_care">Personal Care</label>
                <textarea class="form-control" id="personal_care" name="personal_care" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="toileting">Toileting</label>
                <textarea class="form-control" id="toileting" name="toileting" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="oral_hygiene">Oral Hygiene</label>
                <textarea class="form-control" id="oral_hygiene" name="oral_hygiene" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="mobility">Mobility</label>
                <textarea class="form-control" id="mobility" name="mobility" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="transfers">Transfers</label>
                <textarea class="form-control" id="transfers" name="transfers" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="falls">Falls</label>
                <textarea class="form-control" id="falls" name="falls" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="sleep">Sleep</label>
                <textarea class="form-control" id="sleep" name="sleep" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="meal_prep">Meal Preparation</label>
                <textarea class="form-control" id="meal_prep" name="meal_prep" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="financial">Financial</label>
                <textarea class="form-control" id="financial" name="financial" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="communication">Communication</label>
                <textarea class="form-control" id="communication" name="communication" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="shopping">Shopping</label>
                <textarea class="form-control" id="shopping" name="shopping" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="transport">Transport</label>
                <textarea class="form-control" id="transport" name="transport" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="housework">Housework</label>
                <textarea class="form-control" id="housework" name="housework" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="hobbies">Hobbies</label>
                <textarea class="form-control" id="hobbies" name="hobbies" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="gardening">Gardening</label>
                <textarea class="form-control" id="gardening" name="gardening" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="mood">Mood</label>
                <textarea class="form-control" id="mood" name="mood" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="social">Social</label>
                <textarea class="form-control" id="social" name="social" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="environment_indoor">Indoor Environment</label>
                <textarea class="form-control" id="environment_indoor" name="environment_indoor" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="environment_outdoor">Outdoor Environment</label>
                <textarea class="form-control" id="environment_outdoor" name="environment_outdoor" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="strengths">Strengths</label>
                <textarea class="form-control" id="strengths" name="strengths" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="risk">Risk</label>
                <textarea class="form-control" id="risk" name="risk" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="action_plan">Action Plan</label>
                <textarea class="form-control" id="action_plan" name="action_plan" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="current_supports">Current Supports</label>
                <textarea class="form-control" id="current_supports" name="current_supports" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="recommendations">Recommendations</label>
                <textarea class="form-control" id="recommendations" name="recommendations" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="equipment_in_place">Equipment in Place</label>
                <textarea class="form-control" id="equipment_in_place" name="equipment_in_place" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="equip_modification_needed">Equipment Modification Needed</label>
                <textarea class="form-control" id="equip_modification_needed" name="equip_modification_needed" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="goals">Goals</label>
                <textarea class="form-control" id="goals" name="goals" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <label for="service_instruction">Service Instruction</label>
                <textarea class="form-control" id="service_instruction" name="service_instruction" rows="3"></textarea>
            </div>
            </div><div class='col-md-4' style='margin-bottom:10px'><div class="form-group"><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
    </div>
    