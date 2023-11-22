<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itinerary Details</title>
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
            <a href="../Login-and-Registration/login.php"><button class="btn">Log Out</button></a>
        </div>
    </div>

    <div class="search-container">
        <h1>Itinerary Add Ons</h1>

        <?php
        // Start the session and retrieve the UserID
        session_start();
        $userID = isset($_SESSION['UserID']) ? $_SESSION['UserID'] : '';

        // Display the UserID
        echo "<h1>User ID: $userID</h1>";
        ?>

        <script>
            // Retrieve clickedItineraryID from sessionStorage
            const clickedItineraryID = sessionStorage.getItem('clickedItineraryID');

            // Create a new element to display Itinerary ID
            const itineraryIDElement = document.createElement('h1');
            itineraryIDElement.textContent = `Itinerary ID: ${clickedItineraryID}`;
            document.querySelector('.search-container').appendChild(itineraryIDElement);
            </script>
            <form id="itinerary-add">
                        <button type="button" id="addFlights">Add Flights</button>
                        <button type="button" id="addHotels">Add Hotels</button>
                        <button type="button" id="addRestaurant">Add Restaurant</button>
                        <button type="button" id="addAttraction">Add Attraction</button>
                    </form>
                </div>
            <script>
            // Function to handle redirection
            function redirectTo(destination) {
                const clickedItineraryID = sessionStorage.getItem('clickedItineraryID');
                const userID = '<?php echo isset($_SESSION['UserID']) ? $_SESSION['UserID'] : '' ?>';

                // Redirect to the destination page with ItineraryID and UserID as parameters
                window.location.href = `${destination}?itineraryID=${clickedItineraryID}&userID=${userID}`;
            }


            // Event listeners for adding different items to the itinerary
            document.getElementById('addFlights').addEventListener('click', function() {
                redirectTo('Flight/Flights.php');
            });

            document.getElementById('addHotels').addEventListener('click', function() {
                redirectTo('Hotels/hotels.php');
            });

            document.getElementById('addRestaurant').addEventListener('click', function() {
                redirectTo('restaurant.php');
            });

            document.getElementById('addAttraction').addEventListener('click', function() {
                redirectTo('Attractions/attraction.php');
            });
        </script>

        
</body>
</html>
