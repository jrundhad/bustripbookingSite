-- -------------------------------
-- SCRIPT 1

-- Set up the database

SHOW DATABASES;
DROP DATABASE IF EXISTS busdb;
CREATE DATABASE busdb;
USE busdb;

-- Create the tables for the database
SHOW TABLES;

CREATE TABLE passenger (passengerid INT NOT NULL, firstname VARCHAR(20) NOT NULL, lastname VARCHAR(20) NOT NULL,  PRIMARY KEY(passengerid));

CREATE TABLE passport (passportnum CHAR(4) NOT NULL, citizenshipcountry VARCHAR(30) NOT NULL, expireydate DATE NOT NULL, 
birthdate DATE NOT NULL,passengerid INT NOT NULL, PRIMARY KEY(passportnum),  FOREIGN KEY(passengerid) REFERENCES passenger(passengerid) ON DELETE CASCADE);

CREATE TABLE bus (licenseplate CHAR(7) NOT NULL, capacity INT NOT NULL, PRIMARY KEY (licenseplate));

CREATE TABLE bustrip (tripid INT NOT NULL, tripname VARCHAR(50) NOT NULL, 
startdate DATE NOT NULL, enddate DATE NOT NULL, country VARCHAR(30) NOT NULL, 
assignedbus CHAR(7) NOT NULL, urlImage CHAR(255),
PRIMARY KEY (tripid), FOREIGN KEY(assignedbus) REFERENCES bus(licenseplate));

CREATE TABLE booking (passengerid INT NOT NULL, tripid INT NOT NULL, price DECIMAL(10,2) NOT NULL, 
PRIMARY KEY (passengerid, tripid), FOREIGN KEY (passengerid) REFERENCES passenger(passengerid) ON DELETE CASCADE, 
FOREIGN KEY (tripid) REFERENCES bustrip(tripid) ON DELETE RESTRICT);

SHOW TABLES;


--  --------------------------------
-- SCRIPT 2

USE busdb;

SELECT * FROM bus;
INSERT INTO bus VALUES ('CAND123',50),('UWO1122',70),('VAN1111',10),('VAN2222',15),('UWO3311',62),('TAXI111',4),('TAXI222',3),('TAXI333',4);
SELECT * FROM bus;

-- insert into the passenger table
SELECT * FROM passenger;
INSERT INTO passenger VALUES (11, "Homer", "Simpson");
INSERT INTO passenger VALUES (22, "Marge", "Simpson");
INSERT INTO passenger VALUES (33, "Bart", "Simpson");
INSERT INTO passenger VALUES (34, "Lisa", "Simpson");
INSERT INTO passenger VALUES (35, "Maggie", "Simpson");
INSERT INTO passenger VALUES (44, "Ned", "Flanders");
INSERT INTO passenger VALUES (45, "Todd", "Flanders");
INSERT INTO passenger VALUES (66, "Heidi", "Klum");
INSERT INTO passenger VALUES (77, "Michael", "Scott");
INSERT INTO passenger VALUES (78, "Dwight", "Schrute");
INSERT INTO passenger VALUES (79, "Pam", "Beesly");
INSERT INTO passenger VALUES (80, "Creed", "Bratton");
INSERT INTO passenger VALUES (81, "Niles", "Crane");
SELECT * FROM passenger;

-- insert into the passport table
SELECT * FROM passport;
INSERT INTO passport VALUES ("US10", "USA", "2025-1-1", "1970-2-19",11);
INSERT INTO passport VALUES ("US12", "USA", "2025-1-1", "1972-8-12",22);
INSERT INTO passport VALUES ("US13", "USA", "2025-1-1", "2001-5-12",33);
INSERT INTO passport VALUES ("US14", "USA", "2025-1-1", "2004-3-19",34);
INSERT INTO passport VALUES ("US15", "USA", "2025-1-1", "2012-9-17",35);
INSERT INTO passport VALUES ("US22", "USA", "2030-4-4", "1950-6-11",44);
INSERT INTO passport VALUES ("US23", "USA", "2018-3-3", "1940-6-24",45);
INSERT INTO passport VALUES ("GE11", "Germany", "2027-1-1", "1970-7-12",66);
INSERT INTO passport VALUES ("US88", "Canada", "2030-2-13", "1979-4-25",77);
INSERT INTO passport VALUES ("US89", "Canada", "2022-2-2", "1976-4-8",78);
INSERT INTO passport VALUES ("US90", "Italy", "2020-2-28", "1980-4-4",79);
INSERT INTO passport VALUES ("US91", "Germany", "2030-1-1", "1959-2-2",80);
INSERT INTO passport VALUES ("ABCD", "Spain", "2025-1-1", "1970-9-12",81);
SELECT * FROM passport;


-- insert into the bustrip table
SELECT * FROM bustrip;
INSERT INTO bustrip VALUES (1,'Castles of Germany','2022-1-1','2022-1-17','Germany','VAN1111','https://csd.uwo.ca/~lreid2/cs3319/assignments/assignment3/pics/germany.png');
INSERT INTO bustrip VALUES (2,'Tuscany Sunsets','2022-3-3','2022-3-14','Italy','TAXI222','https://csd.uwo.ca/~lreid2/cs3319/assignments/assignment3/pics/italy.png');
INSERT INTO bustrip VALUES (3,'California Wines','2022-5-5','2022-5-10','USA','VAN2222', NULL);
INSERT INTO bustrip VALUES (4,'Beaches Galore','2022-4-4','2022-4-14','Bermuda','TAXI222', NULL);
INSERT INTO bustrip VALUES (5,'Cottage Country','2022-6-1','2022-6-22','Canada','CAND123', NULL);
INSERT INTO bustrip VALUES (6,'Arrivaderci Roma','2022-7-5','2022-7-15','Italy','TAXI111', NULL);
INSERT INTO bustrip VALUES (7,'Shetland and Orkney','2022-9-9','2022-9-29','UK','TAXI111', NULL);
INSERT INTO bustrip VALUES (8,'Disney World and Sea World','2022-6-10','2022-6-20','USA','VAN2222', NULL);
INSERT INTO bustrip VALUES (9,'Greek Islands','2022-3-3','2022-3-17','Greece','TAXI111', NULL);
INSERT INTO bustrip VALUES (10,'Mexican Cartels','2022-4-4','2022-4-17','Mexico','TAXI111', NULL);
SELECT * FROM bustrip;

-- insert into the booking table
SELECT * FROM booking;
INSERT INTO booking VALUES (11,1,500);
INSERT INTO booking VALUES (22,1,500);
INSERT INTO booking VALUES (33,1,200);
INSERT INTO booking VALUES (34,1,200);
INSERT INTO booking VALUES (35,1,200);
INSERT INTO booking VALUES (66,1,600.99);
INSERT INTO booking VALUES (44,8,400);
INSERT INTO booking VALUES (45,8,200);
INSERT INTO booking VALUES (78,4,600);
INSERT INTO booking VALUES (80,4,600);
INSERT INTO booking VALUES (78,1,550);
INSERT INTO booking VALUES (33,8,300);
INSERT INTO booking VALUES (34,8,300);
INSERT INTO booking VALUES (11,6,600);
INSERT INTO booking VALUES (22,6,600);
INSERT INTO booking VALUES (33,6,100);
INSERT INTO booking VALUES (34,6,100);
INSERT INTO booking VALUES (35,6,100);
INSERT INTO booking VALUES (11,7,300);
INSERT INTO booking VALUES (44,7,400);
INSERT INTO booking VALUES (77,7,500);
INSERT INTO booking VALUES (81,10,1000);
SELECT * FROM booking;

