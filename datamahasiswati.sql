CREATE DATABASE datamahasiswati;
USE datamahasiswati;

CREATE TABLE admin(
username VARCHAR(255),
pass VARCHAR(255)
);

CREATE TABLE tbkelas(
idKelas CHAR(5),
namaKelas VARCHAR(255),
namaDosen VARCHAR(255),
PRIMARY KEY (idKelas)
);

CREATE TABLE tbmahasiswa(
nim CHAR(10),
namaMahasiswa VARCHAR(255),
telp VARCHAR(13),
idKelas CHAR(5),
PRIMARY KEY (nim),
FOREIGN KEY (idKelas) REFERENCES tbkelas (idKelas)
);

INSERT INTO admin(username, pass) VALUE('yoga', 'yoga123');