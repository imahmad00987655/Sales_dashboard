<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

// Optional: Check user role/permissions
if (isset($_SESSION['role']) && $_SESSION['role'] !== 'admin') {
    // Redirect to appropriate page or show error
    header('Location: index.php');
    exit();
}
?> 