Copy repo into stack folder. WAMP stack was throwing some unknown errors so preferably XAMPP stack. 

# Set up phpmyadmin

in browser type: localhost/phpmyadmin

create a new database and call it whatever. Default used in the website is project but any name can be used. If name other than 'project' is used then alter the dbh.inc.php file in the includes folder to reflect this. dbh.inc.php also will need to be altered to reflect stack credentials. In our code the default is root with no password is used. 

copy past the below sql code found in the 'Project.sql' file in order to produce the schema for the website.  
