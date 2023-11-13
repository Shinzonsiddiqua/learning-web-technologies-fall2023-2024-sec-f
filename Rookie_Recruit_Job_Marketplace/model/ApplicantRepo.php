<?php

require_once __DIR__ . '/../model/db_connect.php';


function findAllApplicants(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `applicant` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ($rows ?: null);
}

function findApplicantByUserID($id) {

    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `appllicant` WHERE `user_id` = :id';
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

function updateApplicant($data) {
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `appllicant` SET 
                    full_name = :full_name,
                    user_id = :user_id
                    WHERE id = :id";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);

        // Bind parameters
        $stmt->bindParam(':full_name', $data['full_name'], PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $data['user_id'], PDO::PARAM_INT); // Corrected the binding here
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



function createApplicant($fullName, $uid) {
    $conn = db_conn();

    // Construct the SQL query
    $insertQuery = "INSERT INTO `appllicant` (full_name, user_id) VALUES (:full_name, :user_id)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);

        // Bind parameters
        $stmt->bindParam(':full_name', $fullName, PDO::PARAM_STR);
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
