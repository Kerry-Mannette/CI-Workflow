<?php
// db_connect.php — handles database connection

$servername = getenv("DB_SERVER");
$username   = getenv("DB_USERNAME");
$password   = getenv("DB_PASSWORD");
$database   = getenv("DB_NAME");

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
