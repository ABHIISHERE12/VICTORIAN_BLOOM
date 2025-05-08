<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "projectlogin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Image upload
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];

    // Move uploaded file to a folder
    $uploadDir = "uploads/"; 
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir);
    }

    $uploadPath = $uploadDir . basename($imageName);

    if (move_uploaded_file($imageTmpName, $uploadPath)) {
        // Insert product into database
        $sql = "INSERT INTO product (id, name, description, price, image) 
                VALUES ('$product_id', '$name', '$description', '$price', '$uploadPath')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Product added successfully!'); window.location.href = 'administrator.php';</script>";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}

$conn->close();
?>
