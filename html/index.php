<?php
    include('../php/invoices.php');
    include('../php/paid_invoices.php');
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Management System - Home</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/normalize.css">
</head>

<body>
<header>
    <h1>Invoice Management System</h1>
</header>
<section class="user-info">
    <h2>User Information</h2>
    <div>
        <p>Supplier Name: XYZ Company</p>
        <p>Contact Information: contact@example.com</p>
        <!-- Add more user-related information here -->
    </div>
</section>
<section class="invoice-summary">
    <h2>Invoice Summary</h2>
    <div>
        <p>Total Invoices: <?= $totalInvoices ?></p>
        <p>Pending Invoices: <?= $totalInvoices-$totalPaidInvoices ?></p>
        <p>Paid Invoices: <?= $totalPaidInvoices ?></p>
        <!-- Add more summary information about invoices here -->
    </div>
</section>
<nav>
    <ul>
        <li><a href="invoices.php">View All Invoices</a></li>
        <!-- Add more navigation links here -->
    </ul>
</nav>
<footer>
    <!-- Footer content -->
</footer>
</body>
</html>
