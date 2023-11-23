<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") // since Registration is a POST method instead of GET
{
    // assign variables (starting with $) to the names of the form (note: match the names exactly from registration.php)
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        require_once 'dbh.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';
        // ERROR HANDLER
        $errors = [];

        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_user($pdo, $username);

        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        if (!is_username_wrong($result) && is_password_wrong ($password, $result["pwd"])) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }
        require_once 'config_session.inc.php';

        if ($errors){
            $_SESSION["erros_login"] = $errors;
            header("Location: ../Login-and-Registration/login.php");
            die();
        } 
        // If login is successful, store the user's session ID
        $_SESSION["UserID"] = $result["UserID"]; // Assuming 'id' is the column name for the user ID in your database
        
        header("Location: ../Main/index.php?login=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header ("Location: ../Login-and-Registration/registration.php");
    die();
}