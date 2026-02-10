<?php
include '../db.php';

$page = intval($_GET['page'] ?? 1);
$search = $_GET['search'] ?? '';
$sort = $_GET['sort'] ?? 'id';
$order = $_GET['order'] ?? 'DESC';
$limit = 5;
$offset = ($page - 1) * $limit;

// Column filters
$filter_id = $_GET['id'] ?? '';
$filter_name = $_GET['name'] ?? '';
$filter_email = $_GET['email'] ?? '';
$filter_designation = $_GET['designation'] ?? '';

// WHERE clause
$where = "WHERE 1=1";

if ($search !== '') {
    $search = $conn->real_escape_string($search);
    $where .= " AND name LIKE '%$search%'";
}

if ($filter_id !== '') {
    $where .= " AND id = " . intval($filter_id);
}

if ($filter_name !== '') {
    $filter_name = $conn->real_escape_string($filter_name);
    $where .= " AND name LIKE '%$filter_name%'";
}

if ($filter_email !== '') {
    $filter_email = $conn->real_escape_string($filter_email);
    $where .= " AND email LIKE '%$filter_email%'";
}

if ($filter_designation !== '') {
    $filter_designation = $conn->real_escape_string($filter_designation);
    $where .= " AND designation = '$filter_designation'";
}

// Total count for pagination
$total = $conn->query("SELECT COUNT(*) FROM employees $where")->fetch_row()[0];
$pages = ceil($total / $limit);

// Fetch filtered data
$sql = "SELECT * FROM employees $where ORDER BY $sort $order LIMIT $offset, $limit";
$res = $conn->query($sql);

// Render HTML rows
$table = '';
while ($row = $res->fetch_assoc()) {
    $class = strtolower($row['designation']) === 'manager' ? 'manager' : '';
    $table .= "<tr class='$class'>
        <td><input type='checkbox' class='row-check' value='{$row['id']}'></td>
        <td>{$row['id']}</td>
        <td>{$row['name']}</td>
        <td>{$row['email']}</td>
        <td>{$row['designation']}</td>
        <td>
            <button onclick=\"editRow('{$row['id']}', '{$row['name']}', '{$row['email']}', '{$row['designation']}')\">Edit</button>
            <button onclick=\"deleteOne({$row['id']})\">Delete</button>
        </td>
    </tr>";

}

// Render pagination links
$pagination = '';
for ($i = 1; $i <= $pages; $i++) {
    $pagination .= "<a href='javascript:changePage($i)'>$i</a> ";
}

// Output JSON
echo json_encode(['table' => $table, 'pagination' => $pagination]);
?>
