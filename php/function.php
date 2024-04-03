<?php

require_once('..\config\config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
    die("fail：" . $conn->connect_error);
}
$conn->query("SET FOREIGN_KEY_CHECKS = 0;");
function delete ($id, $conn=null) {
    $sql = "DELETE FROM invoices WHERE invoice_id =";
    $sql .= $id;
        $result = $conn->query($sql);
        if($result) {
            var_dump("deleted it $id");
        }else {
            var_dump("failed");
        }
    }

    if(isset($_GET['delete_id'])) {
        delete($_GET['delete_id'], $conn);
        header('Location: ../html/invoices.php');
    }

$conn->close();


