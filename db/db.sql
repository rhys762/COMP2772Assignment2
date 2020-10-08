SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS ProductsDB;
CREATE DATABASE ProductsDB;

USE ProductsDB;

CREATE TABLE Products(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(100),
    imgPath varchar(100),
    price float
) AUTO_INCREMENT = 1;

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON ProductsDB.Products TO dbadmin@localhost;

INSERT INTO Products (name, imgPath, price) VALUES('Red Apple', 'redApple.png', 10.5);
INSERT INTO Products (name, imgPath, price) VALUES('Green Apple', 'greenApple.png', 22.7);
INSERT INTO Products (name, imgPath, price) VALUES('Bannana', 'bannana.png', 3.1);