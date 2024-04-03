<?php
// Include the database configuration file
require_once('..\config\config.php');
// Connect to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check if the connection was successful
if ($conn->connect_error) {
    // Terminate script execution and display error message
    die("fail：" . $conn->connect_error);
}

// Query to get the total number of paid invoices
$sql = "SELECT COUNT(*) AS totalPaidInvoices FROM paid_invoices";
// Execute the query
$result = $conn->query($sql);


// Check if the query was successful and if there are rows returned
if ($result && $result->num_rows > 0) {
    // Fetch the result row as an associative array
    $row = $result->fetch_assoc();
    // Get the total number of paid invoices from the result
    $totalPaidInvoices = $row['totalPaidInvoices'];
}
// Close the database connection
$conn->close();
?>
