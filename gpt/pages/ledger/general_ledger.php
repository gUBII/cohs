<?php
include '../../config/db.php';
include '../../includes/header.php';

// Get the account ID from the URL parameter
$account_id = isset($_GET['account_id']) ? intval($_GET['account_id']) : 0;

if ($account_id <= 0) {
    echo "Invalid Account ID.";
    exit;
}

// Fetch account details
$account = mysqli_query($conn, "SELECT id, name FROM accounts WHERE id = $account_id LIMIT 1");
$account_data = mysqli_fetch_assoc($account);

if (!$account_data) {
    echo "Account not found.";
    exit;
}

$account_name = $account_data['name'];

// Fetch the general ledger for the selected account
$entries = mysqli_query($conn, "
    SELECT je.date, je.description, jl.debit, jl.credit
    FROM journal_entries je
    JOIN journal_lines jl ON je.id = jl.journal_id
    WHERE jl.account_id = $account_id
    ORDER BY je.date ASC
");

// Calculate the running balance
$balance = 0;
?>

<h2>General Ledger for <?php echo $account_name; ?></h2>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Balance</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($entries)): ?>
            <tr>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td align="right"><?php echo number_format($row['debit'], 2); ?></td>
                <td align="right"><?php echo number_format($row['credit'], 2); ?></td>
                <td align="right">
                    <?php
                    $balance += $row['debit'] - $row['credit'];
                    echo number_format($balance, 2);
                    ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<a href="javascript:history.back()">Back to Accounts</a>

<?php include '../../includes/footer.php'; ?>
