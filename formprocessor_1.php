<?php
    // error_reporting(0);
    include('include.php');
    
    $dbnamex=$_COOKIE['dbname'];
    
    date_default_timezone_set("Australia/Melbourne");

    if(isset($_POST["form1"])){
        
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $checklist_completed_by = mysqli_real_escape_string($conn, $_POST['checklist_completed_by']);
        $post_date = mysqli_real_escape_string($conn, $_POST['post_date']);
        
        // Build columns and values
        $columns = "name, address, date, ";
        $values = "'$name', '$address', '$date', ";
        
        for ($i = 1; $i <= 88; $i++) {
            $select = isset($_POST["select_$i"]) ? mysqli_real_escape_string($conn, $_POST["select_$i"]) : '';
            $note = isset($_POST["note_$i"]) ? mysqli_real_escape_string($conn, $_POST["note_$i"]) : '';
        
            $columns .= "select_$i, note_$i, ";
            $values .= "'$select', '$note', ";
        }
        
        // Add final fields
        $columns .= "checklist_completed_by, post_date";
        $values .= "'$checklist_completed_by', '$post_date'";
        
        // Final query
        $sql = "INSERT INTO environmental_assessment_checklist_data ($columns) VALUES ($values)";
        
        if (mysqli_query($conn, $sql)) {
            echo "Form data inserted successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    if(isset($_POST["form2"])){
        
        $extension1=0;
        foreach ($_FILES['image1']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension1 = $path_parts['extension'];
            $newFilename="";
            $newFilename = time() . "$dbnamex." . $extension1;
            move_uploaded_file($_FILES['image1']['tmp_name'][$key], 'media/agreement/' . $newFilename);
            $location1 = 'media/agreement/' . $newFilename;
        }
        
        $extension2=0;
        foreach ($_FILES['image2']['name'] as $key => $name){
            $rand= rand(10000,99999);
            $path_parts = pathinfo($name);
            $extension2 = $path_parts['extension'];
            $newFilename="";
            $newFilename = time() . "smsbd$rand." . $extension2;
            move_uploaded_file($_FILES['image2']['tmp_name'][$key], 'media/agreement/' . $newFilename);
            $location2 = 'media/agreement/' . $newFilename;
        }
        
        $extension1=strlen("$extension1");
        $extension2=strlen("$extension2");
    	
    	if($extension1>=3 && $extension1>=3){
            $sql1 = "insert into charter_of_aged_care_rights (image1,image2,consumer_name,authorised_person,provider_name,given_date,opportunity_date) 
            VALUES ('$location1','$location2','".$_POST["consumer_name"]."','".$_POST["authorised_person"]."','".$_POST["provider_name"]."','".$_POST["given_date"]."','".$_POST["opportunity_date"]."')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Updated.')</script> ";
    	}else if($extension1>=3 && $extension1<=2) {
            $sql1 = "insert into charter_of_aged_care_rights (image1,consumer_name,authorised_person,provider_name,given_date,opportunity_date) 
            VALUES ('$location1','".$_POST["consumer_name"]."','".$_POST["authorised_person"]."','".$_POST["provider_name"]."','".$_POST["given_date"]."','".$_POST["opportunity_date"]."')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Updated.')</script> ";
        }else if($extension1<=2 && $extension1>=3) {
            $sql1 = "insert into charter_of_aged_care_rights (image2,consumer_name,authorised_person,provider_name,given_date,opportunity_date) 
            VALUES ('$location2','".$_POST["consumer_name"]."','".$_POST["authorised_person"]."','".$_POST["provider_name"]."','".$_POST["given_date"]."','".$_POST["opportunity_date"]."')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Updated.')</script> ";
        }else{
            $sql1 = "insert into charter_of_aged_care_rights (consumer_name,authorised_person,provider_name,given_date,opportunity_date) 
            VALUES ('".$_POST["consumer_name"]."','".$_POST["authorised_person"]."','".$_POST["provider_name"]."','".$_POST["given_date"]."','".$_POST["opportunity_date"]."')";
            if ($conn->query($sql1) === TRUE) echo"<script>alert('Record Updated.')</script> ";
        }
        // image1,consumer_name,authorised_person,image2,provier_name,given_date,opportunity_date
    }

    
?>
