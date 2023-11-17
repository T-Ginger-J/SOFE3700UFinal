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