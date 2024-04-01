<?php

$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL
$sql = "SELECT salaryId, userId, baseSalary, bonuses, overtime, dues FROM salary";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    //  deductions Calculation  for leaves
    while ($row = $result->fetch_assoc()) {
        $leaveCount = /* Get leave count for the user */;
        if ($leaveCount >= 5) {
            $deduction = $row['baseSalary'] * 0.02;
            $newTotalSalary = $row['baseSalary'] + $row['bonuses'] + $row['overtime'] - $row['dues'] - $deduction;

            // Update the salary table with the new total salary
            $updateSql = "UPDATE salary SET totalSalary = $newTotalSalary WHERE salaryId = " . $row['salaryId'];
            $conn->query($updateSql);
        }
    }
} else {
    echo "0 results";
}

// bonuses Calculation  and update salary table
$sql = "SELECT salaryId, userId, baseSalary FROM salary";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Calculate bonus (5% of base salary)
        $bonus = $row['baseSalary'] * 0.05;
        $newTotalSalary = $row['baseSalary'] + $row['bonuses'] + $row['overtime'] - $row['dues'] + $bonus;

        // Update the salary table with the new total salary
        $updateSql = "UPDATE salary SET totalSalary = $newTotalSalary WHERE salaryId = " . $row['salaryId'];
        $conn->query($updateSql);
    }
} else {
    echo "0 results";
}

$conn->close();
?>
