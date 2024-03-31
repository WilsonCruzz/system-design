<?php

require_once('D:\coding\Repositories\system-design\config\config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// 檢查連接是否成功
if ($conn->connect_error) {
    die("連接失敗：" . $conn->connect_error);
}

// 執行 SQL 查詢來獲取發票列表
$sql = "SELECT * FROM invoices";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

// 將查詢結果轉換為 JSON 格式並輸出
$invoices = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($invoices);

// 關閉資料庫連接
$stmt->close();
$conn->close();
?>
