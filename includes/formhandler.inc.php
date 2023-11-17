<?php
/* This page takes the information the user inserts into the 'registration' page and 
    puts the information in the database (mysql/phpmyadmin)
    */
if ($_SERVER["REQUEST_METHOD"] == "POST") // since Registration is a POST method instead of GET
{
    // assign variables (starting with $) to the names of the form (note: match the names exactly from registration.php)
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once "dbh.inc.php"; // dbh.inc.php has the information to connect to your local database

        /* Takes the data entered by the user and inserts it into the pre-existing 'users' table */
        $query = "INSERT INTO users (username, email, pwd) VALUES 
        (:username, :email, :pwd);"; 

        $stmt = $pdo->prepare($query);

        // We do prepared statements in order to avoid users from typing malicious queries directly into the form
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":pwd", $password);

        $stmt->execute();

        $pdo = null; // disconnect the database
        $stmt = null;

        die();
        
        header("Location: ../Main/index.php"); // at the end, take the user to index page
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../Main/index.php"); // at the end, take the user to index page
}



