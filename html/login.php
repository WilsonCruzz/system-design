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
// Start the session
session_start();
// Include the configuration file
require_once('..\config\config.php');
// Establish a connection to the database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the POST request
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        // Prepare and execute the SQL statement to fetch user data by username
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        // Check if a user with the provided username exists
        if ($result->num_rows > 0) {
            // Fetch the user data
            $user = $result->fetch_assoc();
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Password verification successful, perform login operation
                echo "Login Successful";
                // Set session variables
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                // Redirect to the index.php page after successful login
                header("Location: index.php");
                // Ensure script termination to prevent further code execution
                exit;
            } else {
                // Password verification failed
                echo "<h2>Login Failed</h2>";
                echo "Invalid username or password.";
            }
        } else {
            // User not found
            echo "<h2>Login Failed</h2>";
            echo "User not found.";
        }
    } catch (mysqli_sql_exception $e) {
        // Handle database connection errors
        echo "Connection failed: " . $e->getMessage();
    } finally {
        // Close the MySQLi connection
        $conn->close();
    }
}
?>
