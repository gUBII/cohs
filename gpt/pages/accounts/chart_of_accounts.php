<?php
include '../../config/db.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);

    $query = "INSERT INTO accounts (name, type, code) VALUES ('$name', '$type', '$code')";
    mysqli_query($conn, $query);
}

// Handle deletion
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM accounts WHERE id = $id");
}

// Fetch accounts
$accounts = mysqli_query($conn, "SELECT * FROM accounts ORDER BY type, name");
?>

<?php include '../../includes/header.php'; ?>
<h2>Chart of Accounts</h2>

<form method="POST" style="margin-bottom:20px;">
    <input type="text" name="name" placeholder="Account Name" required>
    <input type="text" name="code" placeholder="Account Code" required>
    <select name="type" required>
        <option value="">Select Type</option>
        <option value="Asset">Asset</option>
        <option value="Liability">Liability</option>
        <option value="Equity">Equity</option>
        <option value="Income">Income</option>
        <option value="Expense">Expense</option>
    </select>
    <button type="submit">Add Account</button>
</form>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Code</th><th>Name</th><th>Type</th><th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($accounts)): ?>
    <tr>
        <td><?php echo $row['code']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['type']; ?></td>
        <td><a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this account?')">Delete</a></td>
    </tr>
    <?php endwhile; ?>
</table>

<?php include '../../includes/footer.php'; ?>
