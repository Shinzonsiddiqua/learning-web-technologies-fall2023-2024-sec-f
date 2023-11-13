<?php

require_once __DIR__ . '/../model/db_connect.php';


function findAllBlogs(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `blog` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ($rows ?: null);
}

function findBlogByBlogID($id) {

    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `blog` WHERE `id` = :id';
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
    }
    $hr = $stmt->fetch(PDO::FETCH_ASSOC);

    return $hr?:null;
}

function updateBlog($data, $user_id) {
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `blog` SET 
                    title = :title,
                    content = :content,
                    posted_date = :posted_date,
                    user_id = :user_id,
                    WHERE id = :id";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);

        // Bind parameters
        $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
        $stmt->bindParam(':content', $data['content'], PDO::PARAM_STR);
        $stmt->bindParam(':posted_date', $data['posted_date'], PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Return true if the update is successful
        return true;
    } catch (PDOException $e) {
        // Handle the exception, you might want to log it or return false
        echo $e->getMessage();
        return false;
    }
}


function createBlog($title, $content, $posted_date, $uid) {
    $conn = db_conn();

    // Construct the SQL query
    $insertQuery = "INSERT INTO `hr` (title, content,posted_date, user_id) VALUES (:title, :content, :posted_date, :user_id)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);

        // Bind parameters
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        $stmt->bindParam(':posted_date', $posted_date, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $uid, PDO::PARAM_INT);


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

