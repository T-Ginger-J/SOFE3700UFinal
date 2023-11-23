<?php
require_once '../../includes/dbh.inc.php';
echo '<p style="color: black;">Test</p>' . '<br>';

$bookingStatusMessage = ""; // Initialize the message variable

// Check if the itineraryID and userID are provided as parameters in the URL
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['attractionID'], $_POST['itineraryID'])) {
    try {
        $attractionID = $_POST['attractionID'];
        $itineraryID = $_POST['itineraryID']; // Retrieve the itineraryID from the form submission
echo '<p style="color: black;">Test1</p>' . '<br>';
        
        // Check if the combination of values exists before inserting
        $stmtCheck = $pdo->prepare("SELECT * FROM attractionbookings WHERE attractionid = ? AND ItineraryID = ?");
        $stmtCheck->execute([$attractionID, $itineraryID]);
        //$existingBooking = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        //if (!$existingBooking) {
echo '<p style="color: black;">Test3</p>' . '<br>';
            // If no existing booking found, proceed with insertion
            $seat = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT); // Generate a random 3-digit room number
            //$date = '22220204'; // Modify date as needed
            $date = date('Ymd'); // This will fetch the current date in YYYYMMDD format

            $cost = 100; // Modify cost as needed

            $stmt = $pdo->prepare("INSERT INTO attractionbookings (attractionID, ItineraryID, date, seat, cost) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$attractionID, $itineraryID, $date, $seat, $cost]);

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
header("Location: ../index.php");
exit();
?>
