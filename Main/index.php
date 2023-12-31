<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    
    <link rel="stylesheet" href="style-add-itinerary.css">
    <!-- Adding Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>

    <!-- Logo Link -->
    <div class="nav">
        <div class="logo">
            <a href="index.php">
                <img src="logo.jpg" alt="Logo" class="logo" style="width: 100px;height: 100px;">
            </a>
        </div>
        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="../Login-and-Registration/login.php"><button class = "btn">Log Out</button></a>

        </div>
    </div>

    <div class="main-content">
        <header>
        <?php
        // Assuming the user is logged in and their user ID is stored in $_SESSION['UserID']
        session_start();

        if (isset($_SESSION['UserID'])) {
            // Connect to your database
            $pdo = new PDO('mysql:host=localhost;dbname=Project', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare and execute a query to retrieve the username
            $stmt = $pdo->prepare("SELECT username FROM User WHERE UserID = ?");
            $stmt->execute([$_SESSION['UserID']]);
            
            // Fetch the username from the database
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $username = $user['username'];
                // Display the username on the webpage
                echo "<h1>Logged in as: $username</h1>";
            } else {
                echo "<p>User not found.</p>";
            }
        } else {
            echo "<p>User not logged in.</p>";
        }
        ?>
        </header>

        <div class="button-container">
            <!-- Add Itinerary Button with Plus Icon -->
            <!-- Form encapsulating the Add Itinerary button -->
            <form action="add-itinerary.php" method="POST"> <!-- Change 'add_itinerary.php' to your processing PHP file -->
                <button type="submit" name="addItinerary" class="btn">
                    <i class="fa fa-plus"></i> Add Itinerary
                </button>
    </form>
           <!-- <button id="addItinerary" class="btn">
                <i class="fa fa-plus"></i> Add Itinerary
            </button> -->
            <!-- Edit Itinerary Button with Pencil Icon
            </form>
            <button id="editItinerary" class="btn">
                <i class="fa fa-pencil-alt"></i> Edit Itinerary
            </button>
            <div class="button-container"> -->
    <!-- Form encapsulating the Edit Itinerary button -->
    <form action="edit-itinerary.php" method="POST">
        <button type="submit" name="editItinerary" class="btn">
            <i class="fa fa-pencil-alt"></i> Edit Itinerary
        </button>
    </form>
</div>

        </div>
    </div>

    <!--<script src="script.js"></script> -->
</body>
</html>
