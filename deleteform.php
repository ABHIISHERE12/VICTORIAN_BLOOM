<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectlogin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['product_name'];

    // Delete from product table
    $sql = "DELETE FROM product WHERE name = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $productName);
    
    if ($stmt->execute()) {
        echo "<script>alert('Product deleted successfully'); window.location.href = 'administrator.php';</script>";
    } else {
        echo "<script>alert('Error deleting product: " . $conn->error . "'); window.location.href = 'administrator.php';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
