<?php
// get_flight_details.php

// Establish a database connection
require_once '../includes/dbh.inc.php';

// Check if airline_id is provided in the GET request
if (isset($_GET['airline_id'])) {
    $airlineID = $_GET['airline_id'];

    // Prepare and execute a query to retrieve flight details based on airline ID
    $stmt = $pdo->prepare("SELECT FlightNum, DepartFrom, ArriveAt FROM Flights WHERE AirlineID = ?");
    $stmt->execute([$airlineID]);

    // Fetch flight details as an associative array
    $flights = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return flight details as JSON response
    header('Content-Type: application/json');
    echo json_encode($flights);
} else {
    // If airline_id is not provided, return an error message
    echo json_encode(['error' => 'Airline ID is missing']);
}

// Close the database connection
$pdo = null;
?>
