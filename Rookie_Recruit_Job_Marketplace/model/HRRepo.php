<?php

require_once __DIR__ . '/../model/db_connect.php';


function findAllHR(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `hr` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ($rows ?: null);
}

function findHRByUserID($id) {

    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `hr` WHERE `user_id` = :id';
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
    }
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user?:null;
}

function updateHR($data) {
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `hr` SET 
                    company_name = :company_name,
                    user_id = :user_id
                    WHERE id = :id";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);

        // Bind parameters
        $stmt->bindParam(':company_name', $data['company_name'], PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $data['user_id'], PDO::PARAM_INT); // Corrected the data type here
        $stmt->bindParam(':id', $data["id"], PDO::PARAM_INT);

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


function createHR($companyName, $uid) {
    $conn = db_conn();

    // Construct the SQL query
    $insertQuery = "INSERT INTO `hr` (company_name, user_id) VALUES (:company_name, :user_id)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);

        // Bind parameters
        $stmt->bindParam(':company_name', $companyName, PDO::PARAM_STR);
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

