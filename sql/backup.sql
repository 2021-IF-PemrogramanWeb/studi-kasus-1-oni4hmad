CREATE DATABASE phplessons;

-- table users

CREATE TABLE users (
	id int not null PRIMARY KEY AUTO_INCREMENT,
    email varchar(256) not null,
    password varchar(256) not null
);

INSERT INTO `users`(`email`, `password`)
    VALUES ('oni@oni.com','oni');

-- table biodata

CREATE TABLE biodata (
	id int not null PRIMARY KEY AUTO_INCREMENT,
    users_id int not null,
    nama varchar(256) not null,
    alamat varchar(256) not null,
    jenis_kelamin varchar(1) not null,
    tempat_lahir varchar(256) not null,
    FOREIGN KEY (users_id) REFERENCES users(id)
);

insert into biodata (users_id, nama, alamat, jenis_kelamin, tempat_lahir) 
values (1, "Oni", "Jl. Manukan Indah II 19C", "L", "Surabaya");

insert into biodata (users_id, nama, alamat, jenis_kelamin, tempat_lahir)
values (1, "Fio", "Jl. Rungkut", "L", "Depok");

insert into biodata (users_id, nama, alamat, jenis_kelamin, tempat_lahir)
values (1, "Naufal", "Jl. xxxxx", "L", "Sidoarjo");

insert into biodata (users_id, nama, alamat, jenis_kelamin, tempat_lahir)
values (1, "Fajar", "Jl. xxxxx", "L", "Sidoarjo");

insert into biodata (users_id, nama, alamat, jenis_kelamin, tempat_lahir)
values (1, "Aganwati", "Jl. xxxxx", "P", "Sidoarjo");

insert into biodata (users_id, nama, alamat, jenis_kelamin, tempat_lahir)
values (1, "Agan", "Jl. xxxxx", "L", "Depok");