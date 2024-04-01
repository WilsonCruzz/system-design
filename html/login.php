<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/normalize.css">

</head>

<body>
<div class="container">
    <h1>Login Page</h1>
    <form method="post"
          action="login.php">
        <label for="username">Username:</label>
        <input type="text"
               id="username"
               name="username" required>

        <label for="password">Password:</label>
        <input type="password"
               id="password"
               name="password" required>

        <input type="submit"
               value="Login">
    </form>
    <br><br>
    <p> Does not have an account?
        <a href="register.php">Click Here</a>
    </p>
</div>
</body>

</html>
<?php
session_start();
require_once('..\config\config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        // 準備 SQL 語句並執行
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // 驗證密碼
            if (password_verify($password, $user['password'])) {
                // 密碼驗證成功，可以進行登錄操作
                echo "Login Successful";
                // 在這裡處理登錄成功的操作，例如將用戶重定向到其個人資料頁面
                // 導向至 index.php 頁面
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                header("Location: index.php");
                exit; // 確保腳本終止以防止後續代碼執行
            } else {
                // 密碼驗證失敗
                echo "<h2>Login Failed</h2>";
                echo "Invalid username or password.";
            }
        } else {
            echo "<h2>Login Failed</h2>";
            echo "User not found.";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Connection failed: " . $e->getMessage();
    } finally {
        // 關閉 MySQLi 連接
        $conn->close();
    }
}
?>
