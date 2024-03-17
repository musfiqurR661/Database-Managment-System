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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $salaryId = $_POST["salaryId"];
    $baseSalary = $_POST["baseSalary"];
    $bonuses = $_POST["bonuses"];
    $overtime = $_POST["overtime"];
    $dues = $_POST["dues"];
    $currency = $_POST["currency"];
    $paymentFrequency = $_POST["paymentFrequency"];

    try {
        $sql = "UPDATE salary SET baseSalary = ?, bonuses = ?, overtime = ?, dues = ?, currency = ?, paymentFrequency = ? WHERE salaryId = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$baseSalary, $bonuses, $overtime, $dues, $currency, $paymentFrequency, $salaryId]);

        echo "Salary information updated successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


