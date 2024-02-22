<?php
// Start session management
session_start();

// Set a session variable
$_SESSION["username"] = '$loggedInUserEmail';

// Output result
echo 'Session started. username=' . $_SESSION["username"];