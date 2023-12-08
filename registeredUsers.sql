DROP TABLE if EXISTS registeredUsers;
CREATE TABLE registeredUsers (
	regUsersid INT NOT NULL AUTO_INCREMENT,
	firstName VARCHAR(30),
	surName VARCHAR(30),
	emailAddress VARCHAR(50),
	userName VARCHAR(20),
	pwrd VARCHAR(15),
	PRIMARY KEY (regUsersid)
);

INSERT INTO registeredUsers (firstName, surName, emailAddress, userName, pwrd) VALUES ('susan', 'dunne', 'susandunne@gmail.com', 'susan01','lolly505');