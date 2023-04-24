-- Active: 1678687549404@@127.0.0.1@3306@practice
use practice;
CREATE TABLE player (playerId int, name VARCHAR(50), runs int,  balls int, strikeRate DECIMAL);

CREATE TABLE userTable (userId int AUTO_INCREMENT PRIMARY KEY, username VARCHAR(50), email VARCHAR(50), password VARCHAR(50));
