<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page after logout
header("Location: ../html/login.php");
// Ensure script termination to prevent further code execution
exit;
?>
