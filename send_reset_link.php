<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        // Simulate sending email here if needed
        echo "success";
    } else {
        // Still echo success to prevent revealing valid emails
        echo "success";
    }
}
?>
