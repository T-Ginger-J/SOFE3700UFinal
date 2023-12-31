<?php

include_once("../includes/dbh.inc.php");

$iten = $_GET['itineraryID'];

$query = "SELECT Days.Date, Days.Transport
FROM Days
WHERE Days.ItineraryID = :iten";

$stmt = $pdo->prepare($query);

$stmt->bindParam(":iten", $iten);

$stmt->execute();

$tripItinerary = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = null;
$query = null;

$query = "SELECT F.FlightNum, F.DeparetureDate, FB.Seat
FROM Flights AS F, Flightbookings AS FB
WHERE FB.ItineraryID = :iten AND FB.FlightID = F.FlightID";

$stmt = $pdo->prepare($query);

$stmt->bindParam(":iten", $iten);

$stmt->execute();

$tripItinerary = array_merge($tripItinerary, $stmt->fetchAll(PDO::FETCH_ASSOC));

$stmt = null;

$query = null;

$query = "SELECT H.HotelName, H.HotelAddress, HB.Room, HB.Date
FROM HotelBookings AS HB, Hotels AS H
WHERE HB.ItineraryID = :iten AND HB.HotelID = H.HotelID";

$stmt = $pdo->prepare($query);

$stmt->bindParam(":iten", $iten);

$stmt->execute();

$tripItinerary = array_merge($tripItinerary, $stmt->fetchAll(PDO::FETCH_ASSOC));

$stmt = null;
$query = null;

$query = "SELECT A.AttractionName, A.AttractionAddress, A.StartTime, AB.seat
FROM Attractions AS A, AttractionBookings AS AB
WHERE AB.ItineraryID = :iten AND AB.AttractionID = A.AttractionID";

$stmt = $pdo->prepare($query);

$stmt->bindParam(":iten", $iten);

$stmt->execute();


$tripItinerary = array_merge($tripItinerary, $stmt->fetchAll(PDO::FETCH_ASSOC));

$stmt = null;
$query = null;

$jsonData = json_encode($tripItinerary, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="trip_itinerary.json"');

// Output the JSON data
echo $jsonData;
?>