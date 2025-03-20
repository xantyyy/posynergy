<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "isyn_pos";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Error: Failed to connect to database - " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");