SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS ProductsDB;
CREATE DATABASE ProductsDB;

USE ProductsDB;

CREATE TABLE Products(
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(30) NOT NULL,
    imgPath varchar(30) NOT NULL,
    descr varchar(200) NOT NULL,
    price float NOT NULL
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

CREATE TABLE Orders(
    orderid int NOT NULL,
    accountName varchar(100) NOT NULL,
    id int NOT NULL,
    quantity int NOT NULL,
    paymentID varchar(8) NOT NULL,
    PRIMARY KEY (orderid, accountName, id)
);

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON ProductsDB.Products TO dbadmin@localhost;
GRANT all privileges ON ProductsDB.Accounts TO dbadmin@localhost;
GRANT all privileges ON ProductsDB.Cart TO dbadmin@localhost;
GRANT all privileges ON ProductsDB.Orders TO dbadmin@localhost;

INSERT INTO Products (name, imgPath, descr, price) VALUES('Angel', 'Angel.png', 'Get an angel costume for your four-legged friend just in time for Halloween!', 10.5);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Devil', 'Devil.png', 'Get a devil costume for your four-legged friend just in time for Halloween!', 22.7);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Evil Pumpkin','EvilPumpkin.png', 'Get an evil pumpkin costume for your four-legged friend just in time for Halloween!', 9.1);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Frankenstein', 'Frankenstein.png', 'Get a Frankenstein costume for your four-legged friend just in time for Halloween!', 10.5);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Ghost', 'Ghost.png', 'Get a ghost costume for your four-legged friend just in time for Halloween!', 22.7);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Headless Ghost', 'HeadlessGhost.png', 'Get a headless ghost costume for your four-legged friend just in time for Halloween!', 9.1);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Mummy', 'Mummy.png', 'Get a mummy costume for your four-legged friend just in time for Halloween! ', 10.5);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Nurse', 'Nurse.png', 'Get a nurse costume for your four-legged friend just in time for Halloween!', 22.7);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Super Hero', 'SuperHero.png', 'Get a superhero costume for your four-legged friend just in time for Halloween!', 9.1);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Vampire', 'Vampire.png', 'Get a vampire costume for your four-legged friend just in time for Halloween! ', 10.5);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Witch', 'Witch.png', 'Get a witch costume for your four-legged friend just in time for Halloween!', 22.7);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Zombie', 'Zombie.png', 'Get a zombie costume for your four-legged friend just in time for Halloween!', 9.1);
