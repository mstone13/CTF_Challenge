CREATE DATABASE ctf_db;

USE ctf_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);

INSERT INTO users (username, password) VALUES
('admin', 'mypass'),
('guest', 'guestpass');

