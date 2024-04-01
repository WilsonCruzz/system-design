<?php
session_start(); // 開始 session

// 刪除所有的 session 變數
session_unset();

// 銷毀 session
session_destroy();

// 重定向到登出後的頁面或重新登入頁面
header("Location: ../html/login.php");
exit;
?>
