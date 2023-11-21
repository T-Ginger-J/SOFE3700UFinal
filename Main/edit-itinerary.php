<?php
require_once  '../includes/dbh.inc.php';
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Itinerary</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Logo Link -->
    <div class="logo-header">
        <a href="index.php">
            <img src="logo.jpg" alt="Logo" class="logo">
        </a>
    </div>

    <div class="container">
    <h2>Edit Itinerary</h2>
    <?php
    session_start(); // Start the session

    // Check if the UserID is set in the session
    if (isset($_SESSION['UserID'])) {
        try {
            // Prepare the query using the logged-in user's ID from the session
            $stmt = $pdo->prepare("SELECT * FROM itinerary WHERE UserID = :userID");
            $stmt->bindParam(':userID', $_SESSION['UserID']);
            $stmt->execute();

            // Fetch data
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
            <table>
            <thead>
                <tr>
                    <th style="color: orange;">Itinerary ID</th>
                    <th style="color: orange;">Country</th>
                    <th style="color: orange;">Start Date</th>
                    <th style="color: orange;">End Date</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($result as $row) { ?>
                    <tr class="wide-bar" onclick="goToPage('Update-itinerary.php')">
                        <td>
                            <a href='Update-itinerary.php?itineraryID=<?php echo $row['ItineraryID']; ?>'>
                                <?php echo $row['ItineraryID']; ?>
                            </a>
                        </td>
                        <td><?php echo $row['Country']; ?></td>
                        <td><?php echo $row['StartDate']; ?></td>
                        <td><?php echo $row['EndDate']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
         <?php
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo '<p style="color: white;">User not logged in.</p><br>';

    }
    ?>
</div>


</div>
 
    <style>
        

 
        h2 {
        color: white; 
    }
   body {
  margin: 0;
  font-family: Arial, sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.container {
  display: flex;
  flex-direction: column;
  align-items: left; /* Align items to the left horizontally */
  width: 60%; /* Adjust width as needed */
  margin: 20px 0; /* Add margin vertically */
}

.wide-bar {
  width: 100%;
  max-width: 40000px; /* Set maximum width for the boxes */
  background-color: #3498db;
  color: white;
  padding: 30px; /* Increase padding for larger clickable area */
  margin-bottom: 20px; /* Add margin between the boxes */
  box-sizing: border-box;
  cursor: pointer;
  text-align: center; /* Center text horizontally */
}

.wide-bar:hover {
  background-color: #2980b9;
}




    </style>
</body>

</html>