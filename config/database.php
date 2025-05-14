<?php
// Database configuration
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'admin_dashboard');

// Set default connection state
$GLOBALS['db_connected'] = false;

// Check if mysqli extension is available
if (!extension_loaded('mysqli')) {
    // Extension not available, continue with mock data
    error_log("mysqli extension is not loaded. Using mock data instead.");
} else {
    // Attempt to connect to MySQL database
    try {
        $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        
        // Check connection
        if($mysqli->connect_error) {
            throw new Exception("Connection failed: " . $mysqli->connect_error);
        }
        
        $GLOBALS['db_connected'] = true;
    } catch (Exception $e) {
        // Log the error
        error_log("Database connection error: " . $e->getMessage());
        // Continue with mock data
    }
}
?> 