DROP DATABASE IF EXISTS aw;

CREATE DATABASE aw;

USE zeus_airsoft;

CREATE TABLE users (
  name  VARCHAR(255),
  mail VARCHAR(255) PRIMARY KEY,
  password VARCHAR(255)
);

INSERT INTO users (name, mail, password) VALUES ("Hugo Silva", "hsilva@ucm.es", "asdf");