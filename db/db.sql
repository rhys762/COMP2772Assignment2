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

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON ProductsDB.Products TO dbadmin@localhost;
GRANT all privileges ON ProductsDB.Accounts TO dbadmin@localhost;
GRANT all privileges ON ProductsDB.Cart TO dbadmin@localhost;

<<<<<<< HEAD
INSERT INTO Products (name, imgPath, descr, price) VALUES('Angel', 'Angel.png', 'Get an angel costume for your four-legged friend just in time for Halloween!', 10.5);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Devil', 'Devil.png', 'Get a devil costume for your four-legged friend just in time for Halloween!', 22.7);
INSERT INTO Products (name, imgPath, descr, price, specialPrice) VALUES('Evil Pumpkin','EvilPumpkin.png', 'Get an evil pumpkin costume for your four-legged friend just in time for Halloween!', 9.1, 3);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Frankenstein', 'Frankenstein.png', 'Get a Frankenstein costume for your four-legged friend just in time for Halloween!', 10.5);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Ghost', 'Ghost.png', 'Get a ghost costume for your four-legged friend just in time for Halloween!', 22.7);
INSERT INTO Products (name, imgPath, descr, price, specialPrice) VALUES('Headless Ghost', 'HeadlessGhost.png', 'Get a headless ghost costume for your four-legged friend just in time for Halloween!', 9.1, 3);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Mummy', 'Mummy.png', 'Get a mummy costume for your four-legged friend just in time for Halloween! ', 10.5);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Nurse', 'Nurse.png', 'Get a nurse costume for your four-legged friend just in time for Halloween!', 22.7);
INSERT INTO Products (name, imgPath, descr, price, specialPrice) VALUES('Super Hero', 'SuperHero.png', 'Get a superhero costume for your four-legged friend just in time for Halloween!', 9.1, 3);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Vampire', 'Vampire.png', 'Get a vampire costume for your four-legged friend just in time for Halloween! ', 10.5);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Witch', 'Witch.png', 'Get a witch costume for your four-legged friend just in time for Halloween!', 22.7);
INSERT INTO Products (name, imgPath, descr, price, specialPrice) VALUES('Zombie', 'Zombie.png', 'Get a zombie costume for your four-legged friend just in time for Halloween!', 9.1, 3);
=======
INSERT INTO Products (name, imgPath, descr, price) VALUES('Angel', 'Angel.png', 'bring out your pets angelic side with this sick getup', 10.5);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Devil', 'Devil.png', 'your pet has always been the pet-ification of evil, now they look the part', 22.7);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Evil Pumpkin','EvilPumpkin.png', 'idk', 9.1);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Frankenstein', 'Frankenstein.png', 'idk', 10.5);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Ghost', 'Ghost.png', 'a fitting costume for a cat that knocks shit around in the night, like my room-mates cat. Harper your a little rat', 22.7);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Headless Ghost', 'HeadlessGhost.png', 'idk', 9.1);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Mummy', 'Mummy.png', 'for those that fantasize about wrapping thier annoying pets in toilet paper', 10.5);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Nurse', 'Nurse.png', 'idk', 22.7);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Super Hero', 'SuperHero.png', 'idk', 9.1);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Vampire', 'Vampire.png', 'idk', 10.5);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Witch', 'Witch.png', 'idk', 22.7);
INSERT INTO Products (name, imgPath, descr, price) VALUES('Zombie', 'Zombie.png', 'your pugs sad little breathing problem is now a scary zombie growl', 9.1);
>>>>>>> 0c724c3f37a6eced0b4c4aae4cfc1de303ab4115
