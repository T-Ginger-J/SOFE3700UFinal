Added basic form validation to Cam's registration page.

# Set up phpmyadmin

in browser type: localhost/phpmyadmin

create a new database and call it 'myfirstdatabase' because that's the name I've used in code. We can change it later.

copy past the below sql code and press the 'go' button to make the table.

ALTER table user (
MODIFY COLUMN UserID INT(11) NOT NULL AUTO_INCREMENT,
ADD pwd VARCHAR(255) NOT NULL,
ADD created_at DATETIME NOT NULL DEFAULT CURRENT_TIME
);

 
ALTER table itinerary (
MODIFY COLUMN Itinerary INT(11) NOT NULL, AUTO_INCREMENT,
ADD Country VARCHAR(255)
);

code should be working now i think... too tired to check if instructions are clear.

If it works well, after typing into the registration form, refresh the phpmyadmin page for the users table, and the data should be in there.

good night.
