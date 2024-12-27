CREATE DATABASE joueurs_db;
USE joueurs_db;

CREATE TABLE joueurs (
    joueurs_id INT(11) AUTO_INCREMENT,
    first_name VARCHAR(30),
    last_name VARCHAR(30),
    position VARCHAR(10),
    rating TINYINT NOT NULL,
    PRIMARY KEY(joueurs_id)
);

SELECT * FROM joueurs;