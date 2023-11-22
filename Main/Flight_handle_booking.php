<?php
require_once '../includes/dbh.inc.php';
echo '<p style="color: black;">Test</p>' . '<br>';

$bookingStatusMessage = ""; // Initialize the message variable

// Check if the itineraryID and userID are provided as parameters in the URL
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['flightID'], $_POST['itineraryID'])) {
    try {
        $flightID = $_POST['flightID'];
        $itineraryID = $_POST['itineraryID']; // Retrieve the itineraryID from the form submission
echo '<p style="color: black;">Test1</p>' . '<br>';
        
        // Check if the combination of values exists before inserting
        $stmtCheck = $pdo->prepare("SELECT * FROM flightbookings WHERE flightid = ? AND ItineraryID = ?");
        $stmtCheck->execute([$flightID, $itineraryID]);
        //$existingBooking = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        //if (!$existingBooking) {
echo '<p style="color: black;">Test3</p>' . '<br>';
            // If no existing booking found, proceed with insertion
            $flightid = 1;
            $AirlineID = 1; // This will fetch the current date in YYYYMMDD format
            $flightnum = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT); // Generate a random 3-digit room number
            //$date = '22220204'; // Modify date as needed
            $DepartureDate = date('Ymd');
            $deparetureform = 1;
            $arriveAt = 3;
            $length = 101500;

            $stmt = $pdo->prepare("INSERT INTO flightbookings (FlightID, ItineraryID, Seat, Cost) VALUES (?, ?, ?, ?)");
            $stmt->execute([$FlightID, $ItineraryID, $Seat, $Cost]);

echo '<p style="color: black;">Testinsert</p>' . '<br>';
            $bookingStatusMessage = "Booking added successfully";
        //} // No need for an else block here since the variable is initialized with an empty string
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
echo '<p style="color: black;">Test4</p>' . '<br>';
    }
}

echo '<p style="color: black;">Test5</p>' . '<br>';
// Redirect back to the index.php after handling the booking
header("Location: index.php");
exit();
?>
