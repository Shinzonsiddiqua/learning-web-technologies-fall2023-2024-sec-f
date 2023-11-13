<?php

require_once __DIR__ . '/../model/db_connect.php';


function findAllPayments(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `payment` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ($rows ?: null);
}



function findPaymentByPaymentID($id){

    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `payment` WHERE `id` = :id';
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

function updateUser($amount, $id) {
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `payment` SET 
                    amount = :amount,
                    WHERE id = :id";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);

        // Bind parameters
        $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

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

function deletePayment($id) {
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `payment` SET 
                    status = :status
                    WHERE id = :id";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);
        $data['status'] = "De-Activated";
        $stmt->bindParam(':status', $data['status'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

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


function createPayment($amount, $user_id) {
    $conn = db_conn();

    // Hash the password using a secure hashing algorithm (e.g., password_hash)
//    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Construct the SQL query
    $insertQuery = "INSERT INTO `payment` (amount, user_id) VALUES (:amount, :user_id)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);

        // Bind parameters
        $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
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




