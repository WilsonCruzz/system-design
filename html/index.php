<?php
    include('../php/invoices.php');
    include('../php/paid_invoices.php');
    session_start();
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
    // 如果用戶已經登入，顯示登入的用戶名稱和其他信息
    if(isset($_SESSION['name'])) {
        // 顯示登出按鈕或連結
        echo "<a href='../php/logout.php'>Log Out</a>";
    } else {
        // 如果用戶未登入，顯示登入表單或其他登入介面
        echo "<p>Please log in to access this page.</p>";
        // 顯示登入連結
        echo "<a href='login.php'>Log In</a>";
    }
    ?>
</footer>
</body>
</html>
