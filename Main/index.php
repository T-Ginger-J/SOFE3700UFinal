<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <!-- Adding Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>

    <!-- Logo Link -->
    <div class="logo-header"> 
        <a href="index.php">
            <img src="logo.jpg" alt="Logo" class="logo">
        </a>
    </div>

    <div class="main-content">
        <header>
            <h1>Welcome <span id="userName">James Smith</span></h1>  
        </header>

        <div class="button-container">
            <!-- Add Itinerary Button with Plus Icon -->
            <button id="addItinerary" class="btn">
                <i class="fa fa-plus"></i> Add Itinerary
            </button>
            <!-- Edit Itinerary Button with Pencil Icon -->
            <button id="editItinerary" class="btn">
                <i class="fa fa-pencil-alt"></i> Edit Itinerary
            </button>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
