<?php
// Start the session
session_start();

// Destroy all session data
session_destroy();

// Redirect to another page after ending the session
header("Location: login.php"); // Change 'login.php' to the desired page
exit();
?>