DROP DATABASE IF EXISTS PagingEX;

CREATE DATABASE PagingEX;

USE PagingEX;

CREATE TABLE Countries (
	countryCode INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	CountryName VARCHAR(256) NOT NULL,
	Imports VARCHAR(256) NOT NULL,
	Exports VARCHAR(256) NOT NULL
);


INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryA", "importA", "exportA");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryB", "importB", "ExportB");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryC", "ImportC", "ExportC");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryD", "ImportD", "ExportD");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryE", "ImportE", "ExportE");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryF", "ImportF", "ExportF");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryG", "ImportG", "ExportG");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryH", "ImportH", "ExportH");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryI", "ImportI", "ExportI");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryJ", "ImportJ", "ExportJ");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryK", "ImportK", "ExportK");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryL", "ImportL", "ExportL");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryM", "ImportM", "ExportM");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryN", "ImportN", "ExportN");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryO", "ImportO", "ExportO");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryP", "ImportP", "ExportP");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryQ", "ImportQ", "ExportQ");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryR", "ImportR", "ExportR");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryS", "ImportS", "ExportS");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryT", "ImportT", "ExportT");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryU", "ImportU", "ExportU");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryV", "ImportV", "ExportV");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryW", "ImportW", "ExportW");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryX", "ImportX", "ExportX");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryY", "ImportY", "ExportY");
INSERT INTO Countries (CountryName, Imports, Exports) VALUES ("countryZ", "ImportZ", "ExportZ");