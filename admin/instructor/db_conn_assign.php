<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_caps";

// Function to connect to the database
function connectToDatabase()
{
    global $servername, $username, $password, $dbname;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
