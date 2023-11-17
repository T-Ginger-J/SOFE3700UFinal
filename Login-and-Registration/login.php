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
                    Don't have an account? <a href="registration.html"><u>Sign Up Now</u></a>
                </div>
             </form>
        </div>
    </div>
</body>
</html>