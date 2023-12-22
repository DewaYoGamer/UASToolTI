CREATE DATABASE datamahasiswati2;
USE datamahasiswati2;

CREATE TABLE admin(
username VARCHAR(255),
pass VARCHAR(255)
);

CREATE TABLE tbdosen(
nidn CHAR(10),
namaDosen VARCHAR(255),
email VARCHAR(255),
PRIMARY KEY (nidn)
);

CREATE TABLE tbmahasiswa(
nim CHAR(10),
namaMahasiswa VARCHAR(255),
telp VARCHAR(13),
nidn CHAR(10),
PRIMARY KEY (nim),
FOREIGN KEY (nidn) REFERENCES tbdosen (nidn)
);

INSERT INTO admin(username, pass) VALUE('yoga', 'yoga123');