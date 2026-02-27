CREATE DATABASE IF NOT EXISTS quiz_game;
USE quiz_game;

CREATE TABLE IF NOT EXISTS tank_quiz (
    question_id INT AUTO_INCREMENT PRIMARY KEY,
    question_img VARCHAR(255) NOT NULL,
    question_txt VARCHAR(255),

    choice1 VARCHAR(255) NOT NULL,
    choice2 VARCHAR(255) NOT NULL,
    choice3 VARCHAR(255) NOT NULL,
    choice4 VARCHAR(255) NOT NULL,
    answer VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS tank_review (
    tank_id INT AUTO_INCREMENT PRIMARY KEY,
    tank_img VARCHAR(255) NOT NULL,
    tank_name VARCHAR(255) NOT NULL,
    country_origin VARCHAR(255) NOT NULL
)