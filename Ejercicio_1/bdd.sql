CREATE DATABASE mi_colegio;
USE mi_colegio;

CREATE TABLE estudiantes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  numero_identidad VARCHAR(20),
  nombre VARCHAR(50),
  nota_matematicas DOUBLE,
  nota_fisica DOUBLE,
  nota_programacion DOUBLE
);
