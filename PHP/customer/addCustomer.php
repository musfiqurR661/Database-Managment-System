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

// Add customer
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $custId = $_POST['custId'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    $sql = "INSERT INTO customer (custId, name, email, phone, address) VALUES ('$custId', '$name', '$email', '$phone', '$address')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New customer added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
