CREATE DATABASE ecommerce;

USE ecommerce;

CREATE TABLE users (
    mail VARCHAR(80) PRIMARY KEY,
    name VARCHAR(30),
    type VARCHAR(5),
    password VARCHAR(255),
    verified BOOLEAN,
    address TEXT
);

CREATE TABLE products (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    productName VARCHAR(60),
    price INTEGER,
    image VARCHAR(100) NULL,
    description TEXT,
    stock INTEGER,
    vendor VARCHAR(40)
);
CREATE TABLE invoice (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    userMail VARCHAR(80),
    productId INTEGER,
    date DATE,
    status BOOLEAN,
    totalPrice INTEGER,
    quantity INTEGER,
    FOREIGN KEY (userMail) REFERENCES users(mail),
    FOREIGN KEY (productId) REFERENCES Products(id)
);
