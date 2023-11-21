


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Itinerary</title>
    <link rel="stylesheet" href="style-add-itinerary.css">
</head>

<body>

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
    
    <div class="search-container">
        <h1>Plan Your Itinerary</h1>
        <form id="itinerary-form" method="POST" action="handle_itinerary.php">
            <!-- Form fields -->
            <input type="text" id="country" name="country" placeholder="Search countries...">
            <input type="date" id="start-date" name="start-date" placeholder="Start Date">
            <input type="date" id="end-date" name="end-date" placeholder="End Date">
            <button type="submit">Create Itinerary</button>
        </form>

    </div>

</body>
</html>