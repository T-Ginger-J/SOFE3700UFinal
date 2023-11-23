<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Airlines</title>
    <style>
        /* Your existing CSS styles here */
        body {
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            background-color: #032139;
            font-family: Arial, sans-serif;
        }

        .nav {
            width: 100%;
            display: flex;
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

        /* Your remaining CSS styles */

        .title {
            color: #FFA500;
            text-align: center;
            font-size: 36px;
            margin-top: 20px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .airline-button {
            display: inline-block;
            margin: 5px;
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            color: #032139;
            background-color: #FFA500;
            width: 150px;
            transition: background-color 0.3s ease-in-out;
        }

        .airline-button:hover {
            background-color: #e0e0e0;
        }

        /* New CSS for flight details table */
        .flight-table {
            width: 60%;
            margin-top: 20px;
            border-collapse: collapse;
            text-align: center;
        }

        .flight-table th,
        .flight-table td {
            border: 1px solid orange;
            padding: 8px;
            color: orange; /* Font color set to orange */
        }

        .flight-table th {
            background-color: orange;
        }

        .logo{
            padding-top: 10px;
            
            font-size: 25px;
            font-weight: 900;
            
        }
        .logo a{
            text-decoration: none;
            color: #000;
        }
        .right-links a{
            padding: 0 10px;
        }
    </style>
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
    <h1 class="title">Choose Airlines</h1>
    <div class="container">
        <?php
        echo '<p style="color: black;">Test</p>' . '<br>';
        // Your PHP code to fetch airlines here
        // ...
        // Establish a database connection
        require_once '../../includes/dbh.inc.php';
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo '<p style="color: black;">Test1</p>' . '<br>';
        // Fetch airlines from the database
        $stmt = $pdo->query('SELECT * FROM Airlines');
        $airlines = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo '<p style="color: black;">Test2</p>' . '<br>';
        foreach ($airlines as $airline) {
            // Add data-attribute to store airline ID
            echo "<button class='airline-button' data-airline-id='{$airline['AirlineID']}'>{$airline['AirlineName']}</button>";
        }
        ?>
    </div>

    <table id="flight-details" class="container" style="display: none;">
        <!-- Flight details will be displayed here -->
    </table>

    <script>
        document.querySelectorAll('.airline-button').forEach(button => {
            button.addEventListener('click', function() {
                const airlineID = this.getAttribute('data-airline-id');
                fetchFlightDetails(airlineID);
            });
        });

        async function fetchFlightDetails(airlineID) {
            try {
                const response = await fetch(`get_flight_details.php?airline_id=${airlineID}`);
                const data = await response.json();

                displayFlightDetails(data);
            } catch (error) {
                console.error('Error fetching flight details:', error);
            }
        }

        function displayFlightDetails(flights) {
            const flightDetailsTable = document.getElementById('flight-details');
            flightDetailsTable.innerHTML = '';

            // Create table header
            const tableHeader = document.createElement('thead');
            tableHeader.innerHTML = `
                <tr>
                    <th style="color: orange;">Flight Number</th>
                    <th style="color: orange;">Departure</th>
                    <th style="color: orange;">Arrival</th>
                </tr>
            `;
            flightDetailsTable.appendChild(tableHeader);

            // Create table body
            const tableBody = document.createElement('tbody');
            flights.forEach(flight => {
                const row = document.createElement('tr');
                row.innerHTML = `
                <td style="color: orange;">${flight.FlightNum}</td>
                <td style="color: orange;">${flight.DepartFrom}</td>
                <td style="color: orange;">${flight.ArriveAt}</td>
                `;
                tableBody.appendChild(row);
            });
            flightDetailsTable.appendChild(tableBody);

            flightDetailsTable.style.display = 'block';
        }
    </script>
</body>
</html>
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
        <h2 style="color: orange;">Flights</h2>

        <?php
        try {
            require_once 'fetch_flights.php'; // Fetch flights from a separate file
            foreach ($result as $row) {
                ?>
                <form action="Flight_handle_booking.php" method="post" style="display: inline-block;">
                <input type="hidden" name="FlightID" value="<?php echo $row['FlightID']; ?>">
    <input type="hidden" name="itineraryID" value="<?php echo $_GET['itineraryID']; ?>"> <!-- Pass the itineraryID as a query parameter -->
    <button class="wide-bar" type="submit">
                    <button class="wide-bar" type="button" onclick="submitFormWithItineraryID(this.form)">
                        <?php
                        echo "Flight ID: " . $row['FlightID'] . "<br>" . "Airline ID: " . $row['AirlineID'] . "<br>" . "Flight Number: " .$row['FlightNum'] . "<br>" ." Departure Date: " . $row['DeparetureDate'] . "Arrive at: " .$row['ArriveAt'] . " Length: " .$row['Length']; 
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

