/* To start with a fresh new database named bookstore, we will delete one
 * if one already exists:
 */
DROP DATABASE IF EXISTS bookstore;

-- Now, create a new databse named bookstore (another form of a comment)
CREATE DATABASE bookstore;

/* Create a user named mariam@localhost with the password 'salloum'.
 * mariam is to have full access on all the objects (tables) on the bookstore
 * database.  * is a wildcared to mean all the tables.
 * Note: You must use a semicolon to end every command; you also need quotes
 *       around a password.
 * After you create a user named mariam with the password salloum, you will be
 * able to start a client like this:
 *    /Applications/XAMPP/bin/mysql -u mariam -p
 * which will prompt for a password to which you can type in salloum.
 */
GRANT ALL PRIVILEGES ON bookstore.* to mariam@localhost IDENTIFIED BY 'salloum';


/* From here uncomment one command at a time to see how each command works.
*/
-- Select the database among all the existing databases on the server to use
USE bookstore;

-- Create some tables
CREATE TABLE Customer (
	custid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(256) NOT NULL,
	phone VARCHAR(64)
);

CREATE TABLE Buy (
	custid INT UNSIGNED NOT NULL AUTO_INCREMENT,
	isbn INT UNSIGNED NOT NULL,
	quantity INT NOT NULL DEFAULT 0,
        PRIMARY KEY (custid, isbn)
);

CREATE TABLE Book (
	isbn INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(256) NOT NULL,
	author VARCHAR(256) NOT NULL,
	price DOUBLE NOT NULL,
        category VARCHAR(20) NOT NULL,
        year CHAR(4) NOT NULL,
        INDEX(title(20)),
        INDEX(author(20))
);

DESCRIBE Customer;
DESCRIBE Buy;
DESCRIBE Book;

INSERT INTO Customer (name, phone) VALUES ("Jack", "70410");
INSERT INTO Customer (name, phone) VALUES ("Jill", "70411");

INSERT INTO Book (title, author, price, category, year)
       VALUES ("DBMS", "Rama", 140.97, "Textbook", 2011);
INSERT INTO Book (title, author, price, category, year)
       VALUES ("Open Life", "Campbell", 11.0, "Philosophy", 1980);
INSERT INTO Book (title, author, price, category, year)
       VALUES ("DistSys", "Jones", 78.95, "Textbook", 2002);
INSERT INTO Book (title, author, price, category, year)
       VALUES ("What?", "Nagel", 7.95, "Philosophy", 2015);
INSERT INTO Book (title, author, price, category, year)
       VALUES ("Another", "Smith", 17.95, "SciFi", 2012);

INSERT INTO Buy (isbn, quantity) VALUES (1, 3);
INSERT INTO Buy (isbn, quantity) VALUES (2, 5);
INSERT INTO Buy (isbn, quantity) VALUES (3, 7);

SELECT * FROM Customer;
SELECT * FROM Buy;
SELECT * FROM Book;

SELECT title, author, price FROM Book;
SELECT title, author, price FROM Book WHERE price > 10;


SELECT title, author, price
FROM Book
WHERE author="Rama";

SELECT title, author, price
FROM Book
WHERE price > 10 and author LIKE "Campbell%";


UPDATE Book SET author='Joe Campbell'
WHERE author='Campbell';

SELECT title, author, price
FROM Book
WHERE price > 10 and author LIKE "%Campbell%";

SELECT title, author, price FROM Book ORDER BY author ASC; -- ASC is default
SELECT title, author, price FROM Book ORDER BY author DESC;

SELECT category, count(author) FROM Book GROUP BY category;

SELECT category, count(author)
FROM Book
GROUP BY category
ORDER BY category DESC;


SELECT C.name, B.title FROM Customer C, Book B WHERE B.price > 10;

SELECT C.name, B.title
FROM Customer C, Buy, Book B
WHERE Buy.quantity > 5 and B.price > 100;


CREATE TABLE Account (
	number INT,
        balance FLOAT,
        PRIMARY KEY (number)
) ENGINE InnoDB;

DESCRIBE Account;

INSERT INTO Account (number, balance) VALUES (12345, 1025.50);
INSERT INTO Account (number, balance) VALUES (67890, 140.00);

SELECT * FROM Account;

BEGIN;
UPDATE Account SET balance=balance+25.11 WHERE number=12345;
COMMIT;
SELECT * FROM Account;

BEGIN;
UPDATE Account SET balance=balance-250 WHERE number=12345;
UPDATE Account SET balance=balance+250 WHERE number=67890;
SELECT * FROM Account;


ROLLBACK;
SELECT * FROM Account;

-- see http://dev.mysql.com/doc/refman/5.0/en/explain-output.html
EXPLAIN SELECT * FROM Account WHERE number=12345;

/* Transactions
*/

/* See the lecture slides to see more common MySQL commands */
