<?php

require_once __DIR__ . '/../database_connection/db_connect.php';


function createReview($rating, $comment, $blog_id) {
    $conn = db_conn();

    // Construct the SQL query
    $insertQuery = "INSERT INTO `review` ( rating , comment, blog_id ) VALUES (:rating, :comment, :blog_id)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);

        // Bind parameters
        $stmt->bindParam(':rating', $rating, PDO::PARAM_STR);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindParam(':blog_id', $blog_id, PDO::PARAM_INT);


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

