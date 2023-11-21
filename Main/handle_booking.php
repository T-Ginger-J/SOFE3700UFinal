<?php
require_once '../includes/dbh.inc.php';

$bookingStatusMessage = ""; // Initialize the message variable

// ...
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hotelID'])) {
    try {
        $hotelID = $_POST['hotelID'];
        
        // Fetch ItineraryID stored in sessionStorage
        session_start();
        $itineraryID = $_SESSION['clickedItineraryID'] ?? ''; // Retrieve the clicked ItineraryID
        
        // Check if the combination of values exists before inserting
        $stmtCheck = $pdo->prepare("SELECT * FROM hotelbookings WHERE hotelid = ? AND ItineraryID = ?");
        $stmtCheck->execute([$hotelID, $itineraryID]);
        $existingBooking = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if (!$existingBooking) {
            // If no existing booking found, proceed with insertion
            $room = 3; // Modify room as needed
            $date = '22220202'; // Modify date as needed
            $cost = 3; // Modify cost as needed

            $stmt = $pdo->prepare("INSERT INTO hotelbookings (hotelid, ItineraryID, room, date, cost) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$hotelID, $itineraryID, $room, $date, $cost]);

            $bookingStatusMessage = "Booking added successfully";
        } // No need for an else block here since the variable is initialized with an empty string
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
// ...


// Redirect back to the index.php after handling the booking
header("Location: Hotels.php");
exit();
?>
