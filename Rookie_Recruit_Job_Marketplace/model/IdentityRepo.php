<?php

require_once __DIR__ . '/../model/db_connect.php';





function createIdentity($file_name, $user_id) {
    $conn = db_conn();
    // Construct the SQL query

    $insertQuery = "INSERT INTO `identity` (file_name, user_id) VALUES (:file_name, :user_id)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);
        // Bind parameters
        $stmt->bindParam(':file_name', $file_name, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Return the ID of the newly inserted user
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        // Handle the exception, you might want to log it or return false
        echo $e->getMessage();
        return -1;
    }
}


