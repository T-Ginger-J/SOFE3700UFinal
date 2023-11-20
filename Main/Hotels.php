<?php
require_once '../includes/dbh.inc.php';

$bookingStatusMessage = ""; // Initialize the message variable

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hotelID'])) {
    try {
        $hotelID = $_POST['hotelID'];

        // Check if the combination of values exists before inserting
        $stmtCheck = $pdo->prepare("SELECT * FROM hotelbookings WHERE hotelid = ? AND room = ? AND date = ?");
        $room = 3; // Modify room as needed
        $date = '22220202'; // Modify date as needed
        $stmtCheck->execute([$hotelID, $room, $date]);
        $existingBooking = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if (!$existingBooking) {
            // If no existing booking found, proceed with insertion

            // Generate a unique identifier for the booking
            $itineraryID = uniqid();

            $stmt = $pdo->prepare("INSERT INTO hotelbookings (hotelid, ItineraryID, room, date, cost) VALUES (?, ?, ?, ?, ?)");
            $room = 3; // Modify room as needed
            $date = '22220202'; // Modify date as needed
            $cost = 3; // Modify cost as needed

            $stmt->execute([$hotelID, $itineraryID, $room, $date, $cost]);

            $bookingStatusMessage = "Booking added successfully";
        } // No need for an else block here since the variable is initialized with an empty string
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

try {
    $stmt = $pdo->prepare("SELECT * FROM hotels;");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Itinerary</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Logo Link -->
    <div class="logo-header">
        <a href="index.php">
            <img src="logo.jpg" alt="Logo" class="logo">
        </a>
    </div>

    <div class="container">
        <h2>Hotels</h2>

        <!-- Display hotels as buttons -->
        <?php
        foreach ($result as $row) {
            ?>
            <form method="post" style="display: inline-block;">
                <input type="hidden" name="hotelID" value="<?php echo $row['HotelID']; ?>">
                <button class="wide-bar" type="submit">
                    <?php
                    echo "Hotel ID: " . $row['HotelID'] . "<br>" . $row['HotelName'] . "<br>" . $row['HotelAddress'] . "<br> Star Rank: " . $row['StarRank']; 
                    ?>
                </button>
            </form>
            <?php
        }
        ?>
        

        <!-- Booking status message -->
        <div>
            <?php
            echo $bookingStatusMessage; 
            /*if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hotelID'])) {
                // Display booking status message here
                echo "Booking added successfully";
            }*/
            ?>
        </div>
    </div>

    <!-- [Your styles] -->
    <style>
        /* Your existing styles here */

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
