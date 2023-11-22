<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Itinerary</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<div class="nav">
        <div class="logo">
            <a href="../index.php">
                <img src="../logo.jpg" alt="Logo" class="logo" style="width: 100px;height: 100px;">
            </a>
        </div>
        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="../../Login-and-Registration/login.php"><button class = "btn">Log Out</button></a>

        </div>
    </div>
    <script>
        // Function to get the itineraryID from sessionStorage
        function getItineraryID() {
            return sessionStorage.getItem('clickedItineraryID');
        }

        // Function to handle form submission with itineraryID
        function submitFormWithItineraryID(form) {
            const itineraryID = getItineraryID(); // Retrieve the itineraryID
            form.querySelector('input[name="itineraryID"]').value = itineraryID; // Set the value in the hidden input field
            form.submit(); // Submit the form with the itineraryID
        }
    </script>

    <div class="container">
        <h2 style="color: orange;">Attractions</h2>

        <?php
        try {
            require_once 'fetch_attractions.php'; // Fetch hotels from a separate file
            foreach ($result as $row) {
                ?>
                <form action="handle_booking.php" method="post" style="display: inline-block;">
                <input type="hidden" name="attractionID" value="<?php echo $row['AttractionID']; ?>">
    <input type="hidden" name="itineraryID" value="<?php echo $_GET['itineraryID']; ?>"> <!-- Pass the itineraryID as a query parameter -->
    <button class="wide-bar" type="submit">
                    <button class="wide-bar" type="button" onclick="submitFormWithItineraryID(this.form)">
                        <?php
                        echo "Attraction ID: " . $row['AttractionID'] . "<br>" . $row['AttractionName'] . "<br>" . $row['AttractionAddress']; 
                        ?>
                    </button>
                </form>
                <?php
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>

        <!-- Booking status message -->
        <div>
            <?php
            if (isset($bookingStatusMessage)) {
                echo $bookingStatusMessage; // Display the booking status message if set
            }
            ?>
        </div>
    </div>

    <!-- Your styles -->
    <style>
        /* Your existing styles here */

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            background-color: #032139;
        }

        .nav {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #fff; /* Example background color for demonstration */
        }

        .logo {
            padding-top: 10px;
            font-size: 25px;
            font-weight: 900;
        }

        .logo a {
            text-decoration: none;
            color: #000;
        }

        .right-links {
            display: flex;
            align-items: center;
        }

        .right-links a {
            padding: 0 10px;
            color: #000;
        }

        .right-links .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            background-color: #FFA500;
            transition: background-color 0.3s ease-in-out;
        }

        .right-links .btn:hover {
            background-color: #e0e0e0;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px;
        }

        .wide-bar {
            width: 100%;
            max-width: 400px; /* Adjust as needed */
            background-color: #3498db;
            color: white;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            cursor: pointer;
            text-align: center;
            border: none;
            border-radius: 5px;
        }

        .wide-bar:hover {
            background-color: #2980b9;
        }
    </style>
</body>

</html>
