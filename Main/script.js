
  // script.js
document.addEventListener('DOMContentLoaded', function() {
  const addBtn = document.getElementById('addItinerary');
  const editBtn = document.getElementById('editItinerary');

  addBtn.addEventListener('click', function() {
      console.log('Add itinerary clicked');
      // Redirect to the add-itinerary.html page when clicked
      window.location.href = 'add-itinerary.html';
  });

  editBtn.addEventListener('click', function() {
      console.log('Edit itinerary clicked');
      // Code to handle editing an itinerary
      window.location.href = 'edit-itinerary.php';
  });
});
