DROP TABLE IF EXISTS people;

CREATE TABLE people (
    peopleid INT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(30),
    surname VARCHAR(30),
    dateofbirth DATE,
    phoneNumber VARCHAR(15),
    emailAddress VARCHAR(50),
    PRIMARY KEY (peopleid)
);


INSERT INTO people (firstname, surname, dateofbirth, phoneNumber, emailAddress) 
VALUES ('diana', 'boyle', '2002-11-24', '0838714997', 'B00147616@mytudublin.ie');


CREATE TABLE staff (
    staffid INT NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(30),
    surname VARCHAR(30),
    dateofbirth DATE,
    phoneNumber VARCHAR(15),
    emailAddress VARCHAR(50),
    typeWork VARCHAR(20),
    PRIMARY KEY (staffid)
);

INSERT INTO staff (firstname, surname, dateofbirth, phoneNumber, emailAddress, typeWork) 
VALUES ('cian', 'doyle', '2000-01-05', '0838884508', 'ciandoyle@gmail.com', 'Part-Time');


CREATE TABLE room (
    roomid INT NOT NULL AUTO_INCREMENT,
    roomNo INT,
    roomType VARCHAR(50),
    occupancy INT,
    cleanOrNot VARCHAR(5),
    staffid INT, 
    PRIMARY KEY (roomid),
    FOREIGN KEY (staffid) REFERENCES staff(staffid)
);


INSERT INTO room (roomNo, roomType, occupancy, cleanOrNot, staffid) 
VALUES ('3', 'single', 'reserved', 'yes', 1); 


CREATE TABLE events (
    eventid INT NOT NULL AUTO_INCREMENT,
    eventType VARCHAR(25),
    eventDate DATE,
    eventTime TIME,
    noOfPeople INT,
    organizer VARCHAR(50),
    PRIMARY KEY (eventid)
);

INSERT INTO events (eventType, eventDate, eventTime, noOfPeople, organizer) VALUES ('wedding', '2024-03-15', '09:00', '177', 'weddingbeatrice');
