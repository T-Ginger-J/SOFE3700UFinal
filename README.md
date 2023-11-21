CREATE TABLE MyItinerary (
ItineraryID INT PRIMARY KEY,
UserID INT,
FlightID INT,
HotelID INT,
AttractionID INT
);

Paste the above code into MySQL to create the table for the following code on the feature/addFlight branch to work?

The code is NOT working, but I'm saving it because it seems close to working.

This is what the code was _supposed_ to do (but it doesn't work):

1. The user can choose any of the airline buttons, and it will display the respective flights for those airlines
2. Then, this is the new part: The user can click of that flight, and it was supposed to add that flight ID to the MyItinerary table along with the userID (current session) as well as the ItineraryID that it stored from the itinerary-details.php page.
3. It checks MyItinerary table if the data selected already exists, if it doesn't it adds it to the table.

but it doesn't do that.

If you want to trouble shoot and fix this, look into what values are actually being stored/retrieved into the userID/flightID/itineraryID
