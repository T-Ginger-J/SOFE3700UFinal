<?php
    include("../includes/dbh.inc.php");
    include("../includes/redirect.inc.php");    
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // Establish a PDO connection (replace with your actual database credentials)
        $dsn = 'mysql:host=your_host;dbname=your_database';
        $username = 'your_username';
        $password = 'your_password';
    
        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    
        // Read from DB
        $user_name = $_POST['user_name'];
        $password = $_POST['user_pass'];
    
        if (!empty($user_name) && !empty($password)) {
            // Save to DB using prepared statements to prevent SQL injection
            $query = "SELECT * FROM users WHERE Username = :user_name LIMIT 1";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':user_name', $user_name, PDO::PARAM_STR);
            $stmt->execute();
    
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user_data && password_verify($password, $user_data['Password'])) {
                session_start();
                $_SESSION['Id'] = $user_data['Id'];
                header("Location: checkUser.php");
                die;
            } else {
                echo "Invalid Username or Password";
            }
        } else {
            echo "Invalid entry. Please fill all forms.";
        }
    }
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LRStyle.css">
    <title>Login</title>
</head>
<body> 
    <div class="container">
        <div class="box form-box">
             <header>Login</header>
             <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required >
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required >
                </div>

                <div class="field">
                    <input type="submit" name="submit" value="Login" class="btn" required >
                </div>
                <div class="links">
                    Don't have an account? <a href="registration.php"><u>Sign Up Now</u></a>
                </div>
             </form>
        </div>
    </div>
</body>
</html>