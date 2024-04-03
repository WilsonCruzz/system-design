<?php
// Include necessary PHP files
include('../php/invoices.php');
include('../php/paid_invoices.php');

// Start session
session_start();

// Get user information from session
$supplier_name = $_SESSION['name'];
$contact_info = $_SESSION['email'];
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
        <p>Supplier Name: <?= $supplier_name ?></p>
        <p>Contact Information: <?= $contact_info ?></p>
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
    <?php
    // If the user is logged in, display their name and other information
    if(isset($_SESSION['name'])) {
        // Display logout button or link
        echo "<a href='../php/logout.php'>Log Out</a>";
    } else {
        // If the user is not logged in, display login form or other login interface
        echo "<p>Please log in to access this page.</p>";
        // Display login link
        echo "<a href='login.php'>Log In</a>";
    }
    ?>
</footer>
</body>
</html>
