<?php
    $name = $_POST['q'];
    $limit = $_POST['limit'];
    $name = "%$name%";

    include("include.php");

    // $sql = "SELECT * FROM sms_product_bon WHERE pname LIKE ? LIMIT $limit";
    $sql = "SELECT * FROM sms_product_bon WHERE pname LIKE ? LIMIT $limit";
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $name);
    $statement->execute();
    $result = $statement->get_result();
    $autocompleteResult = array();
    if (! empty($result)) {
        $i = 0;
        while ($row = $result->fetch_assoc()) {        
            $autocompleteResult[$i]["title"] = "".$row["pname"]."";
            $i ++;
        }
    }

    print json_encode($autocompleteResult);
?>