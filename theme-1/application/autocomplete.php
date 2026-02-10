<?php
$name = $_POST['q'];
$limit = $_POST['limit'];
$name = "%$name%";
$conn = mysqli_connect('localhost', 'root', 'root', 'jmlbd');
$sql = "SELECT * FROM fa_icons WHERE icon LIKE ? LIMIT $limit";
$statement = $conn->prepare($sql);
$statement->bind_param('s', $name);
$statement->execute();
$result = $statement->get_result();
$autocompleteResult = array();
if (! empty($result)) {
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $autocompleteResult[$i]["postId"] = $row["id"];
        $autocompleteResult[$i]["title"] = $row["icon"];
        $i ++;
    }
}
print json_encode($autocompleteResult);
?>
