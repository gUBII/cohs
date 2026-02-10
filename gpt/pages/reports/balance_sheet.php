<?php
include '../../config/db.php';
include '../../includes/header.php';

// Fetch balances by account
$balances = mysqli_query($conn, "
    SELECT a.id, a.name, a.type,
           SUM(jl.debit) AS total_debit,
           SUM(jl.credit) AS total_credit
    FROM accounts a
    LEFT JOIN journal_lines jl ON a.id = jl.account_id
    GROUP BY a.id
    ORDER BY FIELD(a.type, 'Asset', 'Liability', 'Equity'), a.name
");

// Categorize balances
$assets = $liabilities = $equity = [];
while ($row = mysqli_fetch_assoc($balances)) {
    $balance = $row['total_debit'] - $row['total_credit'];
    if ($row['type'] == 'Liability' || $row['type'] == 'Equity') {
        $balance = $row['total_credit'] - $row['total_debit'];
    }

    if ($row['type'] == 'Asset') {
        $assets[] = ['name' => $row['name'], 'amount' => $balance];
    } elseif ($row['type'] == 'Liability') {
        $liabilities[] = ['name' => $row['name'], 'amount' => $balance];
    } elseif ($row['type'] == 'Equity') {
        $equity[] = ['name' => $row['name'], 'amount' => $balance];
    }
}
?>

<h2>Balance Sheet</h2>

<div style="display: flex; gap: 50px;">
    <div>
        <h3>Assets</h3>
        <table border="1" cellpadding="5">
            <tr><th>Account</th><th>Amount</th></tr>
            <?php $total_assets = 0; ?>
            <?php foreach ($assets as $a): ?>
                <tr>
                    <td><?php echo $a['name']; ?></td>
                    <td align="right"><?php echo number_format($a['amount'], 2); ?></td>
                </tr>
                <?php $total_assets += $a['amount']; ?>
            <?php endforeach; ?>
            <tr>
                <th>Total Assets</th>
                <th align="right"><?php echo number_format($total_assets, 2); ?></th>
            </tr>
        </table>
    </div>

    <div>
        <h3>Liabilities</h3>
        <table border="1" cellpadding="5">
            <tr><th>Account</th><th>Amount</th></tr>
            <?php $total_liabilities = 0; ?>
            <?php foreach ($liabilities as $l): ?>
                <tr>
                    <td><?php echo $l['name']; ?></td>
                    <td align="right"><?php echo number_format($l['amount'], 2); ?></td>
                </tr>
                <?php $total_liabilities += $l['amount']; ?>
            <?php endforeach; ?>
            <tr>
                <th>Total Liabilities</th>
                <th align="right"><?php echo number_format($total_liabilities, 2); ?></th>
            </tr>
        </table>

        <h3>Equity</h3>
        <table border="1" cellpadding="5">
            <tr><th>Account</th><th>Amount</th></tr>
            <?php $total_equity = 0; ?>
            <?php foreach ($equity as $e): ?>
                <tr>
                    <td><?php echo $e['name']; ?></td>
                    <td align="right"><?php echo number_format($e['amount'], 2); ?></td>
                </tr>
                <?php $total_equity += $e['amount']; ?>
            <?php endforeach; ?>
            <tr>
                <th>Total Equity</th>
                <th align="right"><?php echo number_format($total_equity, 2); ?></th>
            </tr>
        </table>

        <h4>Total Liabilities & Equity: <?php echo number_format($total_liabilities + $total_equity, 2); ?></h4>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>
