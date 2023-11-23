<?php
require_once  '../includes/dbh.inc.php';
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Itinerary</title>
    <link rel="stylesheet" href="style-add-itinerary.css">
</head>

<body>
    <!-- Logo Link -->
    <div class="nav">
        <div class="logo">
            <a href="index.php">
                <img src="logo.jpg" alt="Logo" class="logo" style="width: 100px;height: 100px;">
            </a>
        </div>
        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="../Login-and-Registration/login.php"><button class = "btn">Log Out</button></a>

        </div>
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
                <tr class="wide-bar" onclick="redirectToDetails(<?php echo $row['ItineraryID']; ?>)">
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

            <script>
                function redirectToDetails(itineraryID) {
                    // Store the clicked itinerary ID in sessionStorage
                    sessionStorage.setItem('clickedItineraryID', itineraryID);

                    // Redirect to 'itinerary-details.php'
                    window.location.href = 'itinerary-details.php';
                }
            </script>
 
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
            flex-direction: column;
            align-items: center;
            height: 100vh;
            background-color: #032139;
        }

        .nav {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #fff; /* Example background color for demonstration */
        }

        .logo {
            padding-top: 10px;
            font-size: 25px;
            font-weight: 900;
        }

        .logo a {
            text-decoration: none;
            color: #000;
        }

        .right-links {
            display: flex;
            align-items: center;
        }

        .right-links a {
            padding: 0 10px;
            color: #000;
        }

        .right-links .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            background-color: #FFA500;
            transition: background-color 0.3s ease-in-out;
        }

        .right-links .btn:hover {
            background-color: #e0e0e0;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 20px;
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