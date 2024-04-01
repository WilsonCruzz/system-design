<?php

require_once('..\config\config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// 檢查連接是否成功
if ($conn->connect_error) {
    die("連接失敗：" . $conn->connect_error);
}

// 查詢 invoices 表中的發票數量
$sql = "SELECT COUNT(*) AS totalPaidInvoices FROM paid_invoices";
$result = $conn->query($sql);


// 檢查查詢是否成功
if ($result && $result->num_rows > 0) {
    // 獲取查詢結果
    $row = $result->fetch_assoc();
    $totalPaidInvoices = $row['totalPaidInvoices'];
}


// 關閉資料庫連接
$conn->close();
?>
