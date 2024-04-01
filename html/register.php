<!DOCTYPE html>
<html>

<head>
    <title>Registration Page</title>
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/normalize.css">

</head>

<body>
<div class="container">
    <h1>Registration Page</h1>
    <form method="post" action="register.php">
        <label for="name">
            Name:
        </label>
        <input type="text"
               id="name"
               name="name" required>

        <label for="username">
            Username:
        </label>
        <input type="text"
               id="username"
               name="username" required>

        <label for="email">Email:</label>
        <input type="email"
               id="email"
               name="email" required>

        <label for="password">Password:</label>
        <input type="password"
               id="password"
               name="password" required>

        <input type="submit"
               value="Register">
    </form>
    <p> Already have an account?</p>
    <a href="login.php">Click Here</a>
</div>
<br>
</body>

</html>
<?php
require_once('..\config\config.php');
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
// 檢查必填欄位是否為空
    if (empty($_POST["name"]) || empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        echo "No empty!";
    } else {
        // 獲取表單欄位的值
        $name = $_POST["name"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    }
    try {
        // Insert the user into the database
        $stmt = $conn->prepare(
            "INSERT INTO users (name, username, email, password) 
                    VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $username, $email, $hashed_password);
        $stmt->execute();

        echo "<h2>Registration Successful</h2>";
        echo "Thank you for registering, " . $name . "!<br>";
        echo "You'll be redirected to login page in 3 seconds";
        header("refresh:3;url=login.php");
    }
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
