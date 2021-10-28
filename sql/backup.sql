CREATE DATABASE phplessons;

CREATE TABLE users (
	id int not null PRIMARY KEY AUTO_INCREMENT,
    email varchar(256) not null,
    password varchar(256) not null
);

INSERT INTO `users`(`email`, `password`)
    VALUES ('oni@oni.com','oni')