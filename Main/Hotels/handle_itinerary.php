<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once("../../includes/dbh.inc.php");
    // Retrieve the UserID from the session
    if(isset($_SESSION['UserID'])) {
        $userID = $_SESSION['UserID'];
} else {
        // Handle case where UserID is not set in the session
        die("User ID not found in session.");
    }

echo '<p style="color: white;">test4.</p>';
echo '<br>';

    // Retrieve values from the form
    $end = $_POST["end-date"];
    $start = $_POST["start-date"];
    $country = $_POST["country"];

echo '<p style="color: white;">test5.</p>';
echo '<br>';

    try {
        require_once "../../includes/dbh.inc.php";

        $query = "INSERT INTO itinerary (UserID, StartDate, EndDate, Country) VALUES (:user, :startD, :endD, :country)";
        $stmt = $pdo->prepare($query);
echo '<p style="color: white;">test6.</p>';
echo '<br>';


        $stmt->bindParam(":user", $userID);
        $stmt->bindParam(":startD", $start);
        $stmt->bindParam(":endD", $end);
        $stmt->bindParam(":country", $country);

        $stmt->execute();

        // Close connections and redirect after successful insertion
        $stmt = null;
        $pdo = null;

        header("Location: ../index.php");
        //exit(); // Terminate the script after redirection
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
}
?>