<?php
include '../include.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entries = $_POST['entries'];
    foreach ($entries as $field => $data) {
        $area = mysqli_real_escape_string($conn, $data['area']);
        $status = mysqli_real_escape_string($conn, $data['status']);
        $comment = mysqli_real_escape_string($conn, $data['comment']);
        
        $query = "INSERT INTO home_safety_checklist (area, status, comment) VALUES ('$area', '$status', '$comment')";
        mysqli_query($conn, $query);
    }
    echo "<h2>Data Submitted Successfully</h2>";
}
?>

<div class="container mt-5">
    <h2 class="text-left">Environmental Assessment</h2>
    <form method="POST" action="">
        <div class='row'>
        <?php
        $fields = [
            "Parking" => "Driveway, On street, Paid/metered, Parking Lot Nearby",
            "House Number Identifiable" => "Clearly visible from street",
            "Accessible Entry" => "Ramp, Wide doorways, Handrails",
            "Outside Residence Pathways, Steps, Verandah, Gates" => "Clear of obstacles",
            "Lawns, Hedges, Scrubs, Undergrowth" => "Well maintained",
            "Bins" => "Properly covered and emptied regularly",
            "Clothesline" => "Secure and accessible",
            "Pets - Droppings" => "Cleaned regularly",
            "Taps/Hoses" => "No leaks, properly stored",
            "Garage/Sheds" => "Secure and tidy",
            "Toilets Outhouse/Laundry" => "Clean and functional",
            "Lighting" => "Adequate for safety",
            "Gutters/Down Pipes" => "No blockages or leaks",
            "Meter Box" => "Accessible and labeled",
            "Doors" => "Functional locks and handles",
            "Locality/Neighbours/Noise" => "Acceptable living conditions",
            "Evacuation Plan" => "Clearly posted and practiced",
            "Security Systems/Camera Outside, Inside" => "Functional",
            "Entry/Exit" => "Accessible and unobstructed",
            "Locks, Screens" => "Secure and maintained",
            "Hall/Stairs/Split Levels" => "Safe and well-lit",
            "Kitchen" => "Clean and functional",
            "Lounge" => "Comfortable and safe",
            "Bedroom" => "Adequate bedding and ventilation",
            "Bathroom" => "Hygienic and accessible",
            "Laundry" => "Clean and organized",
            "Other" => "Additional notes",
            "Phone Internet" => "Reliable connection",
            "Smoke Alarm Locations" => "Functional and installed",
            "Hazardous Substances" => "Properly stored",
            "Other Issues" => "Additional concerns",
            "Mobility Equip" => "Available and functional"
        ];

        foreach ($fields as $field => $details) {
            echo "<div class='col-md-6' style='margin-bottom:20px'><div class='form-group'><br>";
            echo "<label><strong>$field</strong> ($details)</label>";
            echo "<input type='text' name='entries[$field][area]' class='form-control' placeholder='Enter area details'>";
            echo "<div class='form-check'>";
            echo "<input class='form-check-input' type='radio' name='entries[$field][status]' value='Yes'>";
            echo "<label class='form-check-label'>Yes</label>";
            echo "</div>";
            echo "<div class='form-check'>";
            echo "<input class='form-check-input' type='radio' name='entries[$field][status]' value='No'>";
            echo "<label class='form-check-label'>No</label>";
            echo "</div>";
            echo "<textarea name='entries[$field][comment]' class='form-control' placeholder='Comments'></textarea>";
            echo "</div></div>";
        }
        ?>
        <div class='col-md-12' style='margin-bottom:10px'>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>
    </form>
</div>