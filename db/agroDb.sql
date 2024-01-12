CREATE DATABASE IF NOT EXISTS agro_db;

USE agro_db;

-- Dichiarazioni per impostare la codifica del database (es. UTF-8)
SET NAMES utf8;
SET CHARACTER SET utf8;

-- Dichiarazione per evitare il modo strict di MySQL (opzionale)
SET sql_mode = '';



CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
);

CREATE TABLE posts (
    post_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    description TEXT,
    image_data LONGBLOB, 
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
CREATE TABLE chats (
     chat_id INT PRIMARY KEY AUTO_INCREMENT,
    -- incompleta
);



CREATE TABLE comments (
    comment_id INT PRIMARY KEY AUTO_INCREMENT,
    post_id INT,
    user_id INT,
    comment_text TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(post_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE messages (
    message_id INT PRIMARY KEY AUTO_INCREMENT,
    chat_id INT,
    user_id INT,
    message_text TEXT,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (chat_id) REFERENCES chats(chat_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);



