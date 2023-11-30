DROP DATABASE if EXISTS guests;
CREATE DATABASE guests;
USE guests;
CREATE TABLE people (
id INT NOT NULL AUTO_INCREMENT,
firstname VARCHAR(30),
surname VARCHAR(30),
dateofbirth DATE,
phoneNumber VARCHAR(15),
emailAddress VARCHAR(50),
PRIMARY KEY (id)
);

INSERT INTO people (firstname, surname, dateofbirth, phoneNumber, emailAddress) 
VALUES ('diana', 'boyle', '2002-11-24', '0838714997', 'B00147616@mytudublin.ie');
