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
GRANT all privileges ON Practical3.Products TO dbadmin@localhost;

INSERT INTO Products (name, imgPath, price) VALUES('redApple', 'redApple.png', 10.5);
