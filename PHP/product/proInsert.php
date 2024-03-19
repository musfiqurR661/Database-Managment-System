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
    $productId = $_POST["productId"];
    $productName = $_POST["productName"];
    $variant = $_POST["variant"];
    $productionDate = $_POST["productionDate"];
    $unitPrice = $_POST["unitPrice"];
    $expDate = $_POST["expDate"];
    $quantity = $_POST["quantity"];
    $description = $_POST["description"];
    $unitPerStrips = $_POST["unitPerStrips"];

    try {
        $sql = "INSERT INTO product (productId, productName, variant, productionDate, unitPrice, expDate, quantity, description, unitPerStrips) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$productId, $productName, $variant, $productionDate, $unitPrice, $expDate, $quantity, $description, $unitPerStrips]);

        echo "Product information inserted successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


