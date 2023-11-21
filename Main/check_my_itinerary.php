<?php
// Check for provided parameters
if (isset($_GET['userID']) && isset($_GET['flightID']) && isset($_GET['itineraryID'])) {
    // Fetch parameters
    $userID = $_GET['userID'];
    $flightID = $_GET['flightID'];
    $itineraryID = $_GET['itineraryID'];

    // Database connection (update this with your connection details)
    require_once '../includes/dbh.inc.php'; // Update this path

    // Prepare and execute query to check if the data exists in MyItinerary
    $stmt = $pdo->prepare("SELECT * FROM MyItinerary WHERE UserID = ? AND FlightID = ? AND ItineraryID = ?");
    $stmt->execute([$userID, $flightID, $itineraryID]);

    // Fetch results
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the data exists
    if ($result) {
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
} else {
    echo json_encode(['error' => 'Parameters are missing']);
}
?>
