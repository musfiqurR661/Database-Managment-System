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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
    $searchTerm = $_POST["searchTerm"];

    try {
        $sql = "SELECT * FROM payment WHERE paymentId LIKE ? OR custId LIKE ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["%$searchTerm%", "%$searchTerm%"]);

        if ($stmt->rowCount() > 0) {
            echo "<h2>Search Results:</h2>";
            echo "<ul>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Output results
            }
            echo "</ul>";
        } else {
            echo "No matching payment information found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

