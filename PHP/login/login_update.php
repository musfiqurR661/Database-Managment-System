<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userId"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $sql = "UPDATE login SET password = ?, role = ? WHERE userId = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$password, $role, $userId])) {
        echo "User updated successfully.";
    } else {
        echo "Error: Unable to update user.";
    }
}
?>