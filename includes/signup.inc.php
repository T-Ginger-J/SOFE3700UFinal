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

        if (is_input_empty($username, $email, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        if (is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email used!";
        }
        
        if (is_username_taken($pdo, $username)){
            $errors["username_taken"] = "Userame already taken!";
        } 

        if (is_email_registered($pdo, $email)){
            $errors["email_used"] = "Email already registered!"; 
        } 

        require_once 'config_session.inc.php';

        if ($errors){
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../Login-and-Registration/registration.php");
            die();
        } 

        create_user($pdo, $username, $email, $password);
        header("Location: ../Login-and-Registration/registration.php?signup=success");

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