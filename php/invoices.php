<?php

require_once('..\config\config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check if the connection was successful
if ($conn->connect_error) {
    die("fail：" . $conn->connect_error);
}

// Query to get the total number of invoices
$sql = "SELECT COUNT(*) AS totalInvoices FROM invoices";
$result = $conn->query($sql);

$a = $conn->query("SELECT * From invoices")->fetch_all();
// Fetch all invoices from the database
$invoices = array(
    array("id" => 12345, "date" => "January 31, 2024", "amount" => "$500.00", "status" => "Paid"),

);
if ($result && $result->num_rows > 0) {
    // get result
    $row = $result->fetch_assoc();
    $totalInvoices = $row['totalInvoices'];
}


// Close the database connection
$conn->close();
?>
