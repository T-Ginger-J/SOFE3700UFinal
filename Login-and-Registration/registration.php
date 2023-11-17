<?php
    session_start();
    include("../includes/dbh.inc.php");
    include("../includes/redirect.inc.php");    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LRStyle.css">
    <title>Register</title>
</head>
<body> 
    <div class="container">
        <div class="box form-box">
             <header>Sign Up</header>
             <form action="../includes/formhandler.inc.php" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required >
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required >
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required >
                </div>

                <div class="field">
                    <input type="submit" name="submit" value="Login" class="btn" required >
                </div>
                <div class="links">
                    Already a member? <a href="login.php"><u>Sign In</u></a>
                </div>
             </form>
        </div>
    </div>
</body>
</html>