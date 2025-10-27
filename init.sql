CREATE DATABASE IF NOT EXISTS inase_lab;
USE inase_lab;

CREATE TABLE muestras (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nro_precinto VARCHAR(50) NOT NULL,
  empresa VARCHAR(100) NOT NULL,
  especie VARCHAR(100) NOT NULL,
  cantidad_semillas INT NOT NULL,
  fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
  fecha_modificacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  codigo_muestra VARCHAR(20) NOT NULL UNIQUE,  
  INDEX (especie),
  INDEX (fecha_creacion),
  CONSTRAINT chk_cantidad_semillas CHECK (cantidad_semillas >= 0)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE resultados (
  id INT AUTO_INCREMENT PRIMARY KEY,
  muestra_id INT NOT NULL,
  poder_germinativo DECIMAL(5,2) NOT NULL,
  pureza DECIMAL(5,2) NOT NULL,
  materiales_inertes VARCHAR(255),
  fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
  fecha_modificacion DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_resultados_muestra
    FOREIGN KEY (muestra_id) REFERENCES muestras(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,  
  CONSTRAINT chk_poder_germinativo CHECK (poder_germinativo BETWEEN 0 AND 100),
  CONSTRAINT chk_pureza CHECK (pureza BETWEEN 0 AND 100)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;