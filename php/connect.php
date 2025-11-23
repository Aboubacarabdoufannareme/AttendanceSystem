<?php
// Load environment file
$env = parse_ini_file(__DIR__ . "/env/connect.env");

// If env file is missing
if (!$env) {
    die("Error: Environment file not found.");
}

// Create database connection
$conn = new mysqli(
    $env['host'],
    $env['user'],
    $env['password'],
    $env['database']
);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
