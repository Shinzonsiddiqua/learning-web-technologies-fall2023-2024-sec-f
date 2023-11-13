<?php

require_once __DIR__ . '/../model/db_connect.php';


function findAllUsers(){
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `user` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return ($rows ?: null);
}

function findUserByEmailAndPassword($email, $password) {
    echo "Got Email = ".$email;
    echo "Got Pass = ".$password;
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `user` WHERE `email` = :email AND `password` = :password';
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

//        // You should use a secure password hashing mechanism in a real-world scenario
//        $hashedPassword = md5($password); // Example: Using MD5 (not secure, for demonstration purposes)
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
        return null;
    }
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user?:null;
}

function findUserByUserID($id){

    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `user` WHERE `id` = :id';
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

function updateUser($data, $id) {
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `user` SET 
                    type = :type,
                    email = :email,
                    password = :password,
                    status = :status
                    WHERE id = :id";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($updateQuery);

        // Bind parameters
        $stmt->bindParam(':type', $data['type'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);
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

function deleteUser($id) {
    $conn = db_conn();

    // Construct the SQL query
    $updateQuery = "UPDATE `user` SET 
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


function createUser($email, $password,$type) {
    $conn = db_conn();

    // Hash the password using a secure hashing algorithm (e.g., password_hash)
//    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Construct the SQL query
    $insertQuery = "INSERT INTO `user` (email, password, type, status) VALUES (:email, :password, :type, :status)";

    try {
        // Prepare the statement
        $stmt = $conn->prepare($insertQuery);
        $status = 1;

        // Bind parameters
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
//        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);

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




