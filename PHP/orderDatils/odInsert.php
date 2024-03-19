<?php
// Establishing a database connection
$host = "localhost";
$dbname = "your_database_name";
$username = "your_username";
$password = "your_password";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["insert"])) {
    $orderDetailId = $_POST["orderDetailId"];
    $productId = $_POST["productId"];
    $quantity = $_POST["quantity"];
    $shippingDate = $_POST["shippingDate"];
    $orderDate = $_POST["orderDate"];
    $discount = $_POST["discount"];
    $orderPrice = $_POST["orderPrice"];
    $discountedPrice = $_POST["discountedPrice"];
    $custId = $_POST["custId"];
    $paymentId = $_POST["paymentId"];

    try {
        $sql = "INSERT INTO orderdetails (orderDetailId, productId, quantity, shippingDate, orderDate, discount, orderPrice, discountedPrice, custId, paymentId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$orderDetailId, $productId, $quantity, $shippingDate, $orderDate, $discount, $orderPrice, $discountedPrice, $custId, $paymentId]);

        echo "Order details inserted successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
