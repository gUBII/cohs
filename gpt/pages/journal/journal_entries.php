<?php
include '../../config/db.php';
include '../../includes/header.php';

// Handle create new journal entry
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['description'])) {
    $date = $_POST['date'];
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $accounts = $_POST['account_id'];
    $debits = $_POST['debit'];
    $credits = $_POST['credit'];

    // Insert journal entry
    mysqli_query($conn, "INSERT INTO journal_entries (date, description) VALUES ('$date', '$description')");
    $journal_id = mysqli_insert_id($conn);

    // Insert journal lines (debit/credit entries)
    foreach ($accounts as $index => $acc_id) {
        $acc_id = intval($acc_id);
        $debit = floatval($debits[$index]);
        $credit = floatval($credits[$index]);

        if ($acc_id > 0 && ($debit > 0 || $credit > 0)) {
            mysqli_query($conn, "INSERT INTO journal_lines (journal_id, account_id, debit, credit)
                VALUES ($journal_id, $acc_id, $debit, $credit)");
        }
    }
}

// Handle delete journal entry
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM journal_entries WHERE id = $id");
}

// Fetch all journal entries
$entries = mysqli_query($conn, "
    SELECT je.id, je.date, je.description,
           GROUP_CONCAT(CONCAT(a.name, ': ', jl.debit, ' / ', jl.credit) SEPARATOR '<br>') as lines
    FROM journal_entries je
    JOIN journal_lines jl ON je.id = jl.journal_id
    JOIN accounts a ON jl.account_id = a.id
    GROUP BY je.id
    ORDER BY je.date DESC
");

// Fetch accounts for dropdown in form
$account_options = mysqli_query($conn, "SELECT id, name FROM accounts ORDER BY name");
?>

<h2>Journal Entries</h2>

<!-- Add New Journal Entry Form -->
<form method="POST">
    <label for="date">Date:</label>
    <input type="date" name="date" required><br><br>
    
    <label for="description">Description:</label>
    <input type="text" name="description" required><br><br>
    
    <h3>Journal Line Items</h3>
    <table border="1" cellpadding="5">
        <tr>
            <th>Account</th>
            <th>Debit</th>
            <th>Credit</th>
        </tr>
        <?php for ($i = 0; $i < 3; $i++): ?>
        <tr>
            <td>
                <select name="account_id[]">
                    <option value="">Select Account</option>
                    <?php while ($a = mysqli_fetch_assoc($account_options)): ?>
                        <option value="<?php echo $a['id']; ?>"><?php echo $a['name']; ?></option>
                    <?php endwhile; mysqli_data_seek($account_options, 0); ?>
                </select>
            </td>
            <td><input type="number" step="0.01" name="debit[]" value="0.00"></td>
            <td><input type="number" step="0.01" name="credit[]" value="0.00"></td>
        </tr>
        <?php endfor; ?>
    </table>
    <br>
    <button type="submit">Add Entry</button>
</form>

<h3>Existing Entries</h3>
<!-- Display Journal Entries -->
<table border="1" cellpadding="5">
    <tr>
        <th>Date</th><th>Description</th><th>Details</th><th>Action</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($entries)): ?>
    <tr>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['description']; ?></td>
        <td><?php echo $row['lines']; ?></td>
        <td><a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this entry?')">Delete</a></td>
    </tr>
    <?php endwhile; ?>
</table>

<?php include '../../includes/footer.php'; ?>
