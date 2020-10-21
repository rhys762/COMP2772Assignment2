SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS ProductsDB;
CREATE DATABASE ProductsDB;

USE ProductsDB;

CREATE TABLE Products(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(100) NOT NULL,
    imgPath varchar(100) NOT NULL,
    price float NOT NULL,
    specialPrice float
) AUTO_INCREMENT = 1;

CREATE TABLE Accounts(
    accountName varchar(100) NOT NULL PRIMARY KEY,
    firstname varchar(40) NOT NULL,
    lastname varchar(40) NOT NULL,
    password varchar(40) NOT NULL,
    address1 varchar(100),
    address2 varchar(100),
    suburb varchar(100),
    postcode int,
    stat varchar(10)
);

CREATE TABLE Cart(
    accountName varchar(100) NOT NULL,
    id int NOT NULL,
    quantity int NOT NULL,
    PRIMARY KEY (accountName, id)
);

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON ProductsDB.Products TO dbadmin@localhost;
GRANT all privileges ON ProductsDB.Accounts TO dbadmin@localhost;
GRANT all privileges ON ProductsDB.Cart TO dbadmin@localhost;

INSERT INTO Products (name, imgPath, price) VALUES('Angel', 'Angel.png', 10.5);
INSERT INTO Products (name, imgPath, price) VALUES('Devil', 'Devil.png', 22.7);
INSERT INTO Products (name, imgPath, price, specialPrice) VALUES('Evil Pumpkin', 'EvilPumpkin.png', 9.1, 3);
INSERT INTO Products (name, imgPath, price) VALUES('Frankenstein', 'Frankenstein.png', 10.5);
INSERT INTO Products (name, imgPath, price) VALUES('Ghost', 'Ghost.png', 22.7);
INSERT INTO Products (name, imgPath, price, specialPrice) VALUES('Headless Ghost', 'HeadlessGhost.png', 9.1, 3);
INSERT INTO Products (name, imgPath, price) VALUES('Mummy', 'Mummy.png', 10.5);
INSERT INTO Products (name, imgPath, price) VALUES('Nurse', 'Nurse.png', 22.7);
INSERT INTO Products (name, imgPath, price, specialPrice) VALUES('Super Hero', 'SuperHero.png', 9.1, 3);
INSERT INTO Products (name, imgPath, price) VALUES('Vampire', 'Vampire.png', 10.5);
INSERT INTO Products (name, imgPath, price) VALUES('Witch', 'Witch.png', 22.7);
INSERT INTO Products (name, imgPath, price, specialPrice) VALUES('Zombie', 'Zombie.png', 9.1, 3);