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
            <a href="index.html">
                <img src="logo.jpg" alt="Logo" class="logo" style="width: 100px;height: 100px;">
            </a>
        </div>
        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="login.html"><button class = "btn">Log Out</button></a>

        </div>
    </div>

    <div class="search-container">
        <h1>Itinerary Add Ons</h1>
        <form id="itinerary-add">
            <button type="button" id="addFlights">Add Flights</button>
            <button type="button" id="addHotels">Add Hotels</button>
            <button type="button" id="addRestaurant">Add Restaurant</button>
            <button type="button" id="addAttraction">Add Attraction</button>
        </form>
    </div>

    <script>
        document.getElementById('addFlights').addEventListener('click', function() {
            window.location.href = 'flights.html'; // Redirect to flights page
        });

        document.getElementById('addHotels').addEventListener('click', function() {
            window.location.href = 'hotels.html'; // Redirect to hotels page
        });

        document.getElementById('addRestaurant').addEventListener('click', function() {
            window.location.href = 'restaurant.html'; // Redirect to restaurant page
        });

        document.getElementById('addAttraction').addEventListener('click', function() {
            window.location.href = 'attraction.html'; // Redirect to attraction page
        });
    </script>
</body>