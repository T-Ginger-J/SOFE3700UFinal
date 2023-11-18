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

        echo "test1";
        if (is_input_empty($username, $password)) {
            $errors["empty_input"] = "Fill in all fields!";
        }

        echo "test2";
        $result = get_user($pdo, $username);

        echo "test3";
        if (is_username_wrong($result)) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        echo "test4";
        if (!is_username_wrong($result) && is_password_wrong ($password, $result["pwd"])) {
            $errors["login_incorrect"] = "Incorrect login info!";
        }
        require_once 'config_session.inc.php';

        echo "test5";
        if ($errors){
            $_SESSION["erros_login"] = $errors;
            header("Location: ../Login-and-Registration/login.php");
            echo "testfuck";
            die();
        } 

        /*
        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);
        */
        
        header("Location: ../Main/index.php?login=success");

        echo "test6";
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