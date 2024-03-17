<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userId"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $sql = "INSERT INTO login (userId, password, role) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$userId, $password, $role])) {
        echo "User registered successfully.";
    } else {
        echo "Error: Unable to register user.";
    }
}
?>