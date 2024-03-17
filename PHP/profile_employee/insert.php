<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userId"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $dateOfBirth = $_POST["dateOfBirth"];
    $joiningDate = $_POST["joiningDate"];
    $designation = $_POST["designation"];
    $rating = $_POST["rating"];
    $streetNumber = $_POST["streetNumber"];
    $streetName = $_POST["streetName"];
    $apartment = $_POST["apartment"];
    $apartmentNumber = $_POST["apartmentNumber"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zipCode = $_POST["zipCode"];
    $country = $_POST["country"];
    $phoneNumbers = $_POST["phoneNumbers"]; // Array of phone numbers
    $skills = $_POST["skills"]; // Array of skills

    try {
        $pdo->beginTransaction();

        // Insert into profile_employee table
        $sqlProfileEmployee = "INSERT INTO profile_employee (userId, name, email, dateOfBirth, joiningDate, designation, rating) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmtProfileEmployee = $pdo->prepare($sqlProfileEmployee);
        $stmtProfileEmployee->execute([$userId, $name, $email, $dateOfBirth, $joiningDate, $designation, $rating]);

        // Insert into address table
        $sqlAddress = "INSERT INTO address (userId, streetNumber, streetName, apartment, apartmentNumber, city, state, zipCode, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtAddress = $pdo->prepare($sqlAddress);
        $stmtAddress->execute([$userId, $streetNumber, $streetName, $apartment, $apartmentNumber, $city, $state, $zipCode, $country]);

        // Insert into phone table
        $sqlPhone = "INSERT INTO phone (userId, phoneNumber) VALUES (?, ?)";
        $stmtPhone = $pdo->prepare($sqlPhone);
        foreach ($phoneNumbers as $phoneNumber) {
            $stmtPhone->execute([$userId, $phoneNumber]);
        }

        // Insert into skills table
        $sqlSkills = "INSERT INTO skills (userId, skill) VALUES (?, ?)";
        $stmtSkills = $pdo->prepare($sqlSkills);
        foreach ($skills as $skill) {
            $stmtSkills->execute([$userId, $skill]);
        }

        $pdo->commit();
        echo "Employee profile registered successfully.";
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>