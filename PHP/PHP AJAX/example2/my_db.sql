
DROP DATABASE IF EXISTS mydb;


CREATE DATABASE mydb;

USE mydb;


CREATE TABLE User(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(256) NOT NULL, 
	lastname VARCHAR(256) NOT NULL, 
	age INT UNSIGNED NOT NULL, 
	hometown VARCHAR(256) NOT NULL, 
	job VARCHAR(256) NOT NULL
);

INSERT INTO User (firstname, lastname, age, hometown, job) VALUES ("Peter", "Giffin", 21, 
"Victoria, TX", "SW Engineer");
INSERT INTO User (firstname, lastname, age, hometown, job) VALUES ("Lois", "Giffin", 21, 
"Victoria, TX", "SW Engineer");
INSERT INTO User (firstname, lastname, age, hometown, job) VALUES ("Joseph", "Swanson", 21, 
"Victoria, TX", "SW Engineer");
INSERT INTO User (firstname, lastname, age, hometown, job) VALUES ("Glenn", "Quagmire", 21, 
"Victoria, TX", "SW Engineer");