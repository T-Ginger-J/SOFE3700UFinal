<?php
require_once '../includes/dbh.inc.php';

// Retrieve hotelID from the query parameter (expecting multiple IDs)
if(isset($_GET['hotelIDs'])) {
    $hotelIDs = json_decode($_GET['hotelIDs']); // Decode JSON array of hotel IDs

    // Iterate through each hotel ID to fetch its name
    foreach ($hotelIDs as $hotelID) {
        // Retrieve hotel name associated with the hotelID
        $sql = "SELECT hotelname FROM Hotels WHERE hotelID = $hotelID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo $row["hotelname"] . "<br>"; // Echo hotel name
        } else {
            echo "No hotel found with ID: $hotelID <br>";
        }
    }
} else {
    echo "No hotel IDs received";
}

$conn->close();
?>
