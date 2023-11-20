<?php
require_once  '../includes/dbh.inc.php';
/*

$dsn = "mysql:host=localhost;dbname=project";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connection failed: " . $e->getMessage();
}*/
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
        try {
            $stmt = $pdo->prepare("SELECT * FROM itinerary WHERE UserID = 1;");
            $stmt->execute();

            // Fetch data
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Process the data
            foreach ($result as $row) { ?>
                <div class="wide-bar" onclick="goToPage('Update-itinerary.php')">
                    <?php
                    echo "<a href='Update-itinerary.php?itineraryID=" . $row['ItineraryID'] . "'>";
                    echo "Itinerary ID: " . $row['ItineraryID'] . " Start Date: " . $row['StartDate'] . " End Date: " . $row['EndDate'] . "<br>";
                    // Add more fields as needed
                    echo "</a><br>";
                    ?>
                </div>
        <?php
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
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