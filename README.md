Added basic form validation to Cam's registration page.

# Set up phpmyadmin

in browser type: localhost/phpmyadmin

create a new database and call it 'myfirstdatabase' because that's the name I've used in code. We can change it later.

copy past the below sql code and press the 'go' button to make the table.

UPDATE table user (
UserID INT(11) NOT NULL AUTO_INCREMENT,
pwd VARCHAR(255) NOT NULL,
created_at DATETIME NOT NULL DEFAULT CURRENT_TIME
);

UPDATE table itinerary (
Itinerary INT(11) NOT NULL, AUTO_INCREMENT
);

code should be working now i think... too tired to check if instructions are clear.

If it works well, after typing into the registration form, refresh the phpmyadmin page for the users table, and the data should be in there.

good night.
