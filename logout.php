<?php
// Start the session
session_start();

// Unset all of the session variables
$_SESSION = array();
unset($_COOKIE[session_name()]);

// Destroy the session
session_destroy();

// Redirect the user to the login page
header('Location: index.php');
exit();
?>
