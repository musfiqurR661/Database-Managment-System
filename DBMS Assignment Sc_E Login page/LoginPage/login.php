<?php
// Dummy username and password for demonstration
$valid_username = "user";
$valid_password = "password";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $valid_username && $password === $valid_password) {
        // Successful login, redirect to a dashboard page or any desired page
        header("Location: dashboard.php");
        exit;
    } else {
        // Incorrect username or password
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>
