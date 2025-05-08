<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'login';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(" Database Connection Failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    user_type ENUM('admin', 'customer') NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo " Table created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?>
