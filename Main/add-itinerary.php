<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") // since Registration is a POST method instead of GET
{
    // assign variables  to the names of the form and session
    $userID = $_SESSION['UserID'];
    $end = $_POST["start-date"];
    $start = $_POST["end-date"];

    try {
        require_once "dbh.inc.php"; // dbh.inc.php has the information to connect to your local database

        /* Takes the data entered by the user and inserts it into the pre-existing 'itinerary' table */
        $query = "INSERT INTO itinerary (UserID, StartDate, EndDate) VALUES 
        (:user, :startD, :endD);"; 

        $stmt = $pdo->prepare($query);

        // We do prepared statements in order to avoid users from typing malicious queries directly into the form
        $stmt->bindParam(":user", $userID);
        $stmt->bindParam(":startD", $start);
        $stmt->bindParam(":endD", $end);

        $stmt->execute();

        $pdo = null; // disconnect the database
        $stmt = null;

        die();
        
        header("Location: itinerary-details.php"); // at the end, take the user to details page
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Itinerary</title>
    <link rel="stylesheet" href="style-add-itinerary.css">
</head>

<body>

    <!-- Logo Link --> 
    <div class="logo-header">
        <a href="index.php">
            <img src="logo.jpg" alt="Logo" class="logo">
        </a>
    </div>

    <div class="search-container">
        <h1>Plan Your Itinerary</h1>
        <form id="itinerary-form">
            <input type="text" id="country-search" name="country" placeholder="Search countries...">
            <input type="date" id="start-date" name="start-date" placeholder="Start Date">
            <input type="date" id="end-date" name="end-date" placeholder="End Date">
            <button type="submit">Create Itinerary</button>
        </form>
    </div>

    <script src="form-handler.js"></script>
</body>
</html>