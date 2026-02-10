<?php
include 'config/db.php';
include 'includes/header.php';

// Fetch summary data
$account_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM accounts"))['total'];
$journal_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM journal_entries"))['total'];
?>

<h2>Dashboard</h2>
<div>
    <p><strong>Total Accounts:</strong> <?php echo $account_count; ?></p>
    <p><strong>Total Journal Entries:</strong> <?php echo $journal_count; ?></p>
</div>

<ul>
    <li><a href="pages/accounts/chart_of_accounts.php">Chart of Accounts</a></li>
    <li><a href="pages/journal/journal_entries.php">Journal Entries</a></li>
    <li><a href="pages/ledger/general_ledger.php">General Ledger</a></li>
    <li><a href="pages/reports/trial_balance.php">Trial Balance</a></li>
    <li><a href="pages/reports/income_statement.php">Income Statement</a></li>
    <li><a href="pages/reports/balance_sheet.php">Balance Sheet</a></li>
</ul>

<?php include 'includes/footer.php'; ?>
