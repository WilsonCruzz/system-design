<?php
require '../php/invoices.php';
require '../php/function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Management System - All Invoices</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/normalize.css">
</head>
<body>
<header>
    <h1>All Invoices</h1>
</header>
<section class="invoice-list">
    <h2>Invoice List</h2>
    <table>
        <!-- Display a list of invoices -->
        <tr>
            <th><?= "invoice_id:" ?></th>
            <th><?= "invoice_number:"?></th>
            <th><?= "invoice_date:" ?></th>
            <th><?= "invoice_total:" ?></th>
            <th><?= "payment_total:" ?></th>
            <th><?= "invoice_due_date:" ?></th>
            <th><?= "payment_date:" ?></th>
            <th></th>
        </tr>
        <?php foreach ($a as $value): ?>
        <tr>
            <td><?= $value[0] ?></td>
            <td><?= $value[2] ?></td>
            <td><?= $value[3] ?></td>
            <td><?= $value[4] ?></td>
            <td><?= $value[5] ?></td>
            <td><?= $value[8] ?></td>
            <td><?= $value[9] ?></td>
            <td>
                <a type="button" href="../php/function.php?delete_id=<?= $value[0]?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <!-- Add more invoice items here -->
    </table>
</section>
<section class="actions">
    <!-- Actions for managing invoices -->
    <button>Add New Invoice</button>
    <a href="index.php">Back to Home</a>
</section>
<footer>
    <!-- Footer content -->
</footer>
</body>
</html>
