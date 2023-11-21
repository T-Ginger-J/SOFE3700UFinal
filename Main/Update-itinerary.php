<?php
require_once '../includes/dbh.inc.php';

session_start(); // Start the session

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $itineraryID = $_GET['itineraryID'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        // Update query
        $stmt = $pdo->prepare("UPDATE itinerary SET StartDate = :startDate, EndDate = :endDate WHERE ItineraryID = :itineraryID");
        $stmt->bindParam(':startDate', $startDate);
        $stmt->bindParam(':endDate', $endDate);
        $stmt->bindParam(':itineraryID', $itineraryID);

        $stmt->execute();

        echo "Itinerary updated successfully!";
    }

    if(isset($_SESSION['UserID'])) {
        $loggedInUserID = $_SESSION['UserID']; // Retrieve the logged-in user's ID from session

        $itineraryID = 1; // Replace this with the ID of the itinerary to be updated

        // Fetch data for the logged-in user's itinerary
        $stmt = $pdo->prepare("SELECT * FROM itinerary WHERE UserID = :userID AND ItineraryID = :itineraryID");
        $stmt->bindParam(':userID', $loggedInUserID);
        $stmt->bindParam(':itineraryID', $itineraryID);
        $stmt->execute();

        // Fetch the itinerary details for the logged-in user
        $itinerary = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($itinerary) {
            // Display the form with editable fields for the logged-in user's itinerary
            ?>
            <form method="POST" action="">
                <input type="hidden" name="itineraryID" value="<?php echo $itinerary['ItineraryID']; ?>">
                <label for="startDate">Start Date:</label>
                <input type="date" name="startDate" value="<?php echo $itinerary['StartDate']; ?>"><br>

                <label for="endDate">End Date:</label>
                <input type="date" name="endDate" value="<?php echo $itinerary['EndDate']; ?>"><br>

                <!-- Add other fields as needed -->

                <input type="submit" value="Update Itinerary">
            </form>
            <?php
        } else {
            echo "Itinerary not found for the logged-in user.";
        }
    } else {
        echo "User not logged in.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>