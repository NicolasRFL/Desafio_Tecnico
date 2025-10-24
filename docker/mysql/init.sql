CREATE DATABASE IF NOT EXISTS inase_lab;
USE inase_lab;

CREATE TABLE muestras (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nro_precinto VARCHAR(50) NOT NULL,
  empresa VARCHAR(100) NOT NULL,
  especie VARCHAR(100) NOT NULL,
  cantidad_semillas INT NOT NULL
);