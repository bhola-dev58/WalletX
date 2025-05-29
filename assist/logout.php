<?php
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Optional: Delete cookies (e.g., "username")
if (isset($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, "/"); // Expire the cookie
}

// Redirect to login page or homepage
header("Location: login.php");
exit();
?>