<?php
session_start();
include("/includes/dbh.inc.php");
include("/includes/redirect.inc.php");

$user_data = check_login($pdo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- Adding Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>

    <!-- Logo Link -->
    <div class="logo-header"> 
        <a href="index.php">
            <img src="logo.jpg" alt="Logo" class="logo">
        </a>
    </div>

    <div class="main-content">
        <header>
            <h1>Welcome <span id="userName">James Smith</span></h1>  
        </header>

        <div class="button-container">
            <!-- Add Itinerary Button with Plus Icon -->
            <button id="addItinerary" class="btn">
                <i class="fa fa-plus"></i> Add Itinerary
            </button>
            <!-- Edit Itinerary Button with Pencil Icon -->
            <button id="editItinerary" class="btn">
                <i class="fa fa-pencil-alt"></i> Edit Itinerary
            </button>
        </div>
    </div>

    <script src="script.js"></script>

    <h3>Change account</h3>
    
    <form action="../includes/userupdate.inc.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <button>Update</button>
    </form>
    
    <h3>Delete account</h3>
    
    <form action="../includes/userdelete.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button>Delete</button>
    </form>

</body>
</html>
