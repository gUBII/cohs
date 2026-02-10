<?php
include '../../config/db.php';
include '../../includes/header.php';

// Fetch account balances
$results = mysqli_query($conn, "
    SELECT a.name, a.type,
           SUM(jl.debit) AS total_debit,
           SUM(jl.credit) AS total_credit
    FROM accounts a
    LEFT JOIN journal_lines jl ON a.id = jl.account_id
    GROUP BY a.id
    ORDER BY a.code ASC
");

?>

<h2>Trial Balance</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Account</th>
            <th>Debit</th>
            <th>Credit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total_debits = 0;
        $total_credits = 0;

        while ($row = mysqli_fetch_assoc($results)):
            $debit = $row['total_debit'] ?? 0;
            $credit = $row['total_credit'] ?? 0;
            $balance = $debit - $credit;

            if ($balance > 0) {
                $display_debit = $balance;
                $display_credit = 0;
                $total_debits += $balance;
            } elseif ($balance < 0) {
                $display_debit = 0;
                $display_credit = abs($balance);
                $total_credits += abs($balance);
            } else {
                $display_debit = $display_credit = 0;
            }
        ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td align="right"><?php echo number_format($display_debit, 2); ?></td>
            <td align="right"><?php echo number_format($display_credit, 2); ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Total</th>
            <th align="right"><?php echo number_format($total_debits, 2); ?></th>
            <th align="right"><?php echo number_format($total_credits, 2); ?></th>
        </tr>
    </tfoot>
</table>

<?php include '../../includes/footer.php'; ?>
