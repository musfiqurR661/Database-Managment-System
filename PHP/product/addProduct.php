<?php
// Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $variant = $_POST['variant'];
    $productionDate = $_POST['productionDate'];
    $unitPrice = $_POST['unitPrice'];
    $expDate = $_POST['expDate'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $unitPerStrips = $_POST['unitPerStrips'];
    
    $sql = "INSERT INTO product (productName, variant, productionDate, unitPrice, expDate, quantity, description, unitPerStrips) 
            VALUES ('$productName', '$variant', '$productionDate', '$unitPrice', '$expDate', '$quantity', '$description', '$unitPerStrips')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
