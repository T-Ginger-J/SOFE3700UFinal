<?php
require_once  '../includes/dbh.inc.php';


try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $itineraryID = $_POST['itineraryID'];
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

    $itineraryID = 1; // Replace this with the ID of the itinerary to be updated

    // Fetch data for a specific itinerary
    $stmt = $pdo->prepare("SELECT * FROM itinerary WHERE UserID = 1 AND ItineraryID = 1;");
    $stmt->execute();

    // Fetch the itinerary details
    $itinerary = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($itinerary) {
        // Display a form with editable fields for each attribute
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
        echo "Itinerary not found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>