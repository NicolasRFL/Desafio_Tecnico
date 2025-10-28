-- Script de datos de desarrollo
-- Este script debe ejecutarse **después** de crear las tablas.
-- Puede ejecutarse automáticamente desde docker-compose o manualmente con:
-- docker exec -it cakephp_db mysql -u cake_user -p inase_lab < desarrollo.sql


USE inase_lab;


-- Datos de ejemplo para la tabla `muestras`
INSERT INTO muestras (nro_precinto, empresa, especie, cantidad_semillas, codigo_muestra)
VALUES
('P001', 'Semillas Pampeanas S.A.', 'Trigo', 1200, 'MUE-08102025-001'),
('P002', 'AgroAndes SRL', 'Soja', 800, 'MUE-03062025-002'),
('P003', 'Campo Norte', 'Maiz', 950, 'MUE-02042025-003');


-- Datos de ejemplo para la tabla `resultados`
INSERT INTO resultados (muestra_id, poder_germinativo, pureza, materiales_inertes)
VALUES
(1, 95.5, 98.2, 'Paja y restos menores'),
(2, 88.0, 96.7, 'Tierra y restos de hojas'),
(3, 91.2, 99.1, 'Muy pocos restos visibles');