<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userId"];

    $sql = "SELECT * FROM login WHERE userId = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$userId])) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            echo "User found:<br>";
            echo "User ID: " . $user["userId"] . "<br>";
            echo "Password: " . $user["password"] . "<br>";
            echo "Role: " . ($user["role"] == 1 ? "Admin" : "Employee") . "<br>";
        } else {
            echo "User not found.";
        }
    } else {
        echo "Error: Unable to search for user.";
    }
}
?>