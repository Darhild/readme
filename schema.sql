CREATE DATABASE readme
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE readme;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    registration_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    email CHAR(255) UNIQUE NOT NULL,
    name CHAR(255) UNIQUE NOT NULL,
    password CHAR(64) NOT NULL,
    avatar CHAR(255) DEFAULT "images/raccoon.jpg",
    contacts TEXT
);

CREATE TABLE post (
    id INT AUTO_INCREMENT PRIMARY KEY,
    creation_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    title CHAR(255),
    content TEXT,
    quote_author CHAR(255) DEFAULT "Неизвестный автор",
    image CHAR(255),
    video CHAR(255),
    link CHAR(255),
    view_count INT DEFAULT NULL,
    author_id INT,
    content_type CHAR(64),
    hashtag_id CHAR(128)
);

CREATE TABLE comment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    creation_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    content TEXT,
    author_id INT,
    post_id INT
);

CREATE TABLE post_like (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    post_id INT
);

CREATE TABLE subscription (
   id INT AUTO_INCREMENT PRIMARY KEY,
   user_id INT,
   friend_id INT
);

CREATE TABLE message (
    id INT AUTO_INCREMENT PRIMARY KEY,
    creation_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    content TEXT,
    author_id int,
    receiver_id int
);

CREATE TABLE hashtag (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name CHAR(128)
);

CREATE TABLE content_type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name CHAR(32),
    class CHAR(32)
);
