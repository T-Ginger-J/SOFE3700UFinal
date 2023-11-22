<?php
require_once '../includes/dbh.inc.php';

// Retrieve itineraryID from the query parameter
if(isset($_GET['itineraryID'])) {
    $itineraryID = $_GET['itineraryID'];

    // Use the $itineraryID in your SQL query to retrieve hotelIDs associated with the itineraryID
    $sql = "SELECT hotelID FROM hotelbookings WHERE itineraryID = $itineraryID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Store hotel IDs in an array
        $hotelIDs = array();
        while ($row = $result->fetch_assoc()) {
            $hotelIDs[] = $row["hotelID"];
        }
        // Output hotel IDs as a JSON array
        echo json_encode($hotelIDs);
    } else {
        echo "No hotel associated with this itineraryID";
    }
} else {
    echo "No itineraryID received";
}

$conn->close();
?>
