<?php
// Check for provided parameters
if (isset($_GET['userID']) && isset($_GET['flightID']) && isset($_GET['itineraryID'])) {
    // Fetch parameters
    $userID = $_GET['userID'];
    $flightID = $_GET['flightID'];
    $itineraryID = $_GET['itineraryID'];

    // Database connection (update this with your connection details)
    require_once '../includes/dbh.inc.php'; // Update this path

    try {
        // Prepare and execute query to insert data into MyItinerary
        $stmt = $pdo->prepare("INSERT INTO MyItinerary (UserID, FlightID, ItineraryID) VALUES (?, ?, ?)");
        $stmt->execute([$userID, $flightID, $itineraryID]);

        // Return success response
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        // Return error response
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Parameters are missing']);
}
?>
