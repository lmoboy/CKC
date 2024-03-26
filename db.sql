CREATE DATABASE ckc_vahramejevs;
USE ckc_vahramejevs;

CREATE TABLE EVENTS(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	date_and_time DATETIME NOT NULL,
	NAME VARCHAR(255) NOT NULL,
	location VARCHAR(255) NOT NULL
);


CREATE TABLE collective(
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
NAME VARCHAR(80) NOT NULL,
DESCRIPTION VARCHAR(500) NOT NULL
);

INSERT INTO EVENTS (date_and_time, NAME, location) VALUES
("2024-03-31 13:00:00", "Lieldienas Cēsīs", "Rožu laukums"),
("2024-04-04 18:00:00", 'Leļļu teātra izrāde "Gangsteromīte"', 	'Koncertzāle "Cēsis"' ),
("2024-07-19 08:00:00", "Cēsu pilsētas svētki 818", "Cēsi");

INSERT INTO collective(NAME, DESCRIPTION) VALUES 
("Cēsis", "Pūtēju orķestris"),
("Raitais solid", "Tautu deju ansamblis"),
("Vidzeme", "Jauktais koris"),
("Dzieti", "Tautas v\ertes kopa");