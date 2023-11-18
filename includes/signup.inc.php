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
        require_once "signup_model.inc.php"; 
        require_once "signup_contr.inc.php"; 
        
        // ERROR HANDLER
        $errors = [];

        echo 'test';
        if (is_input_empty($username, $email, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        echo 'teset1';
        if (is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email used!";
        }
        echo 'test2';
        
        if (is_username_taken($pdo, $username)){
            $errors["username_taken"] = "Userame already taken!";
        } 
        echo 'test3';
        if (is_email_registered($pdo, $email)){
            $errors["email_used"] = "Email already registered!"; 
        } 

        require_once 'config_session.inc.php';

        echo 'test4';
        if ($errors){
            echo 'test5';
            header("Location: ../Login-and-Registration/registration.php");
            $_SESSION["errors_signup"] = $errors;
            echo 'Errortest';
            die();
        } 

        create_user($pdo, $username, $email, $password);
        echo 'test5';
        header("Location: ../Main/index.php?signup-success");
        echo 'test6';

        $pdo = null;
        $stmt = null;
        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../Login-and-Registration/registration.php"); // at the end, take the user to index page
    die();
}



