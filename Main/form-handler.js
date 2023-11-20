document.getElementById('itinerary-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Here you can handle the form data if needed

    // Redirect to another page
    window.location.href = 'itinerary-details.php'; 
});