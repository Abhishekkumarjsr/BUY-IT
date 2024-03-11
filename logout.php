<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Close the database connection if it's open
if (isset($conn)) {
    mysqli_close($conn);
}

// Redirect to the login page
header("Location: index.php");
exit();
