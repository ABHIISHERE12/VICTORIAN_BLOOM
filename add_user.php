<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'login';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die(" Connection failed: " . $conn->connect_error);
}

$email = 'admin@bloom.com';
$plain_password = 'test123';
$hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);
$user_type = 'admin';

$stmt = $conn->prepare("INSERT INTO users (email, password, user_type) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $email, $hashed_password, $user_type);

if ($stmt->execute()) {
    echo " Admin user added.";
} else {
    echo " Error: " . $stmt->error;
}
$stmt->close();
$conn->close();
?>
