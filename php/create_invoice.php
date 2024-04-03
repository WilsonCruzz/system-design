<!DOCTYPE html>
<html>

<head>
    <title>Create invoice</title>
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/normalize.css">
</head>
<body>
<div class="container">
    <h1>Create invoice</h1>
    <form method="post"
          action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="vendor_id">vendor_id:</label>
        <input type="number"
               id="vendor_id"
               name="vendor_id" required>

        <label for="invoice_number">invoice_number:</label>
        <input type="text"
               id="invoice_number"
               name="invoice_number" required>

        <label for="invoice_date">invoice_date:</label>
        <input type="date"
               id="invoice_date"
               name="invoice_date" required>

        <label for="invoice_total">invoice_total:</label>
        <input type="number"
               id="invoice_total"
               name="invoice_total" required>

        <label for="payment_total">payment_total:</label>
        <input type="number"
               id="payment_total"
               name="payment_total" required>

        <label for="invoice_due_date">invoice_due_date:</label>
        <input type="date"
               id="invoice_due_date"
               name="invoice_due_date" required>

        <label for="payment_date">payment_date:</label>
        <input type="date"
               id="payment_date"
               name="payment_date" required>


        <button type="submit">Create</button>
    </form>
</div>
</body>
</html>
<?php

require_once('..\config\config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
    die("fail：" . $conn->connect_error);
}
$conn->query("SET FOREIGN_KEY_CHECKS = 0;");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get info
    $vendor_id=$_POST["vendor_id"];
    $invoice_number = $_POST["invoice_number"];
    $invoice_date = $_POST["invoice_date"];
    $invoice_total = $_POST["invoice_total"];
    $payment_total = $_POST["payment_total"];
    $invoice_due_date = $_POST["invoice_due_date"];
    $payment_date = $_POST["payment_date"];
}
function create_invoice ($vendor_id,$invoice_number, $invoice_date, $invoice_total, $payment_total, $invoice_due_date, $payment_date, $conn = null) {
    // Construct the SQL statement
    $sql = "INSERT INTO invoices (vendor_id,invoice_number,invoice_date,invoice_total,payment_total,invoice_due_date,payment_date)
            VALUES (?,?, ?, ?, ?, ?, ?)";
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    // Bind parameters and execute the SQL statement
    $stmt->bind_param("sssssss",$vendor_id, $invoice_number, $invoice_date, $invoice_total, $payment_total, $invoice_due_date, $payment_date);
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
        return true;
    } else {
        return false;
    }
}

$result=create_invoice($vendor_id,$invoice_number, $invoice_date, $invoice_total, $payment_total, $invoice_due_date, $payment_date,$conn);
header('Location: ../html/invoices.php');

$conn->close();
?>