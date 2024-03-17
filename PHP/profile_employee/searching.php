<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchTerm = $_POST["searchTerm"];

    try {
        // Prepare the SQL statement to search for employee profiles based on search term
        $sql = "SELECT * FROM profile_employee WHERE name LIKE ? OR email LIKE ? OR designation LIKE ?";
        $stmt = $pdo->prepare($sql);

        // Bind the search term to the prepared statement (with wildcards)
        $searchTerm = "%$searchTerm%";
        $stmt->bindParam(1, $searchTerm, PDO::PARAM_STR);
        $stmt->bindParam(2, $searchTerm, PDO::PARAM_STR);
        $stmt->bindParam(3, $searchTerm, PDO::PARAM_STR);

        // Execute the query
        $stmt->execute();

        // Check if any results were found
        if ($stmt->rowCount() > 0) {
            // Display search results
            echo "<h2>Search Results:</h2>";
            echo "<ul>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>{$row['name']} - {$row['email']} - {$row['designation']}</li>";
                // You can display other relevant information as needed
            }
            echo "</ul>";
        } else {
            echo "No matching employee profiles found.";
        }
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
    }
}
?>
