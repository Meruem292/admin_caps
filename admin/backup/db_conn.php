<?php
// Database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'admin_caps';

// Create a PDO connection
try {
    $dsn = "mysql:host=$host;dbname=$database";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit; // Exit the script if the connection fails
}
?>
