<?php
    echo"<div class='container'><br><br>
        <div class='row'>
            <div class='col-7 col-md-8' style='text-align:left'><b><span style='font-size:15pt;'>Charter of Aged Care Rights</span></b></div>
            <div class='col-5 col-md-4' style='text-align:right'><a href='index.php?url=cohs_charter_of_aged_care_rights_signing_template.php' class='btn btn-primary' style='margin-top:10px;'>Add New Record</a></div>
            <div class='col-12 style='text-align:left'><hr></div>";
            
            if (isset($_GET["id"])) {
                $s7yx = "select * from environmental_assessment_checklist_data where id='".$_GET["id"]."' order by id asc limit 1";
                $r7yx = $conn->query($s7yx);
                if ($r7yx->num_rows > 0) { while($datax = $r7yx->fetch_assoc()) {
            
                       
                } }
                echo"<div class='col-12 style='text-align:left'><Br><br><hr><br><Br>";
            }

    
            echo"<table border='1' cellpadding='8' cellspacing='0' style='width:100%'>
                    <tr><th>ID</th><th>Consumer Name</th><th>Signature</th><th>Authorised Person</th><th>Provider Name</th><th>Signature</th><th>Given Date</th><th>Opportunity Date</th><th>Action</th></tr>";
    
                    $sql = "SELECT * FROM charter_of_aged_care_rights ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['consumer_name']}</td>
                            <td><a href='{$row['image1']}' target='_blank'>View Signature</a></td>
                            <td>{$row['authorised_person']}</td>
                            <td>{$row['provider_name']}</td>
                            <td><a href='{$row['image2']}' target='_blank'>View Signature</a></td>
                            <td>{$row['given_date']}</td>
                            <td>{$row['opportunity_date']}</td>
                            <td><a href='index.php?url=cohs_charter_of_aged_care_rights_signing_template_view.php&id={$row['id']}'>View Details</a></td>
                        </tr>";
                    }
                echo "</table>
            </div>
        </div>
    </div>";
?>
