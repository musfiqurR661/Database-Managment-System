<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve all updated data from the form
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

        // Update profile_employee table
        $sqlProfileEmployee = "UPDATE profile_employee SET name = ?, email = ?, dateOfBirth = ?, joiningDate = ?, designation = ?, rating = ? WHERE userId = ?";
        $stmtProfileEmployee = $pdo->prepare($sqlProfileEmployee);
        $stmtProfileEmployee->execute([$name, $email, $dateOfBirth, $joiningDate, $designation, $rating, $userId]);

        // Update address table
        $sqlAddress = "UPDATE address SET streetNumber = ?, streetName = ?, apartment = ?, apartmentNumber = ?, city = ?, state = ?, zipCode = ?, country = ? WHERE userId = ?";
        $stmtAddress = $pdo->prepare($sqlAddress);
        $stmtAddress->execute([$streetNumber, $streetName, $apartment, $apartmentNumber, $city, $state, $zipCode, $country, $userId]);

        // Delete existing phone numbers for the user
        $sqlDeletePhone = "DELETE FROM phone WHERE userId = ?";
        $stmtDeletePhone = $pdo->prepare($sqlDeletePhone);
        $stmtDeletePhone->execute([$userId]);

        // Insert new phone numbers for the user
        $sqlPhone = "INSERT INTO phone (userId, phoneNumber) VALUES (?, ?)";
        $stmtPhone = $pdo->prepare($sqlPhone);
        foreach ($phoneNumbers as $phoneNumber) {
            $stmtPhone->execute([$userId, $phoneNumber]);
        }

        // Delete existing skills for the user
        $sqlDeleteSkills = "DELETE FROM skills WHERE userId = ?";
        $stmtDeleteSkills = $pdo->prepare($sqlDeleteSkills);
        $stmtDeleteSkills->execute([$userId]);

        // Insert new skills for the user
        $sqlSkills = "INSERT INTO skills (userId, skill) VALUES (?, ?)";
        $stmtSkills = $pdo->prepare($sqlSkills);
        foreach ($skills as $skill) {
            $stmtSkills->execute([$userId, $skill]);
        }

        $pdo->commit();
        echo "Employee profile updated successfully.";
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "Error: " . $e->getMessage();
    }
}
?>
