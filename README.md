Added basic form validation to Cam's registration page.

# Set up phpmyadmin

in browser type: localhost/phpmyadmin

create a new database and call it 'myfirstdatabase' because that's the name I've used in code. We can change it later.

copy past the below sql code and press the 'go' button to make the table.

Drop Table user
Create Table user (
UserID INT NOT NULL AUTO_INCREMENT,
UserName VarChar(100) NOT NULL,
pwd VARCHAR(255) NOT NULL,
UserAddress VarChar(250),
Email VarChar(100),
ADD created_at DATETIME NOT NULL DEFAULT CURRENT_TIME
PhoneNum VarChar(20),
Primary KEY(UserID) );

Drop Table itinerary 
Create Table itinerary (
ItineraryID INT NOT NULL AUTO_INCREMENT, 
UserID INT NOT NULL,
StartDate Date NOT NULL,
EndDate Date,
Country VarChar(255),
Primary KEY(ItineraryID) );

code should be working now i think... too tired to check if instructions are clear.

If it works well, after typing into the registration form, refresh the phpmyadmin page for the users table, and the data should be in there.

good night.
