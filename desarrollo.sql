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
('P003', 'Campo Norte', 'Maiz', 950, 'MUE-02042025-003'),
('P004', 'AgroAndes SRL', 'Trigo', 1100, 'MUE-15072025-004'),
('P005', 'Semillas Pampeanas S.A.', 'Soja', 700, 'MUE-22052025-005'),
('P236', 'Campo Sur', 'Girasol', 600, 'MUE-12032025-006'),
('P442', 'Granos del Plata', 'Trigo', 1300, 'MUE-05082025-007');


-- Datos de ejemplo para la tabla `resultados`
INSERT INTO resultados (muestra_id, poder_germinativo, pureza, materiales_inertes,fecha_creacion)
VALUES
(1, 95.5, 98.2, 'Paja y restos menores', '2024-10-10 14:30:00'),
(2, 88.0, 96.7, 'Tierra y restos de hojas', '2024-10-12 09:15:00'),
(3, 91.2, 99.1, 'Muy pocos restos visibles','2024-10-15 11:45:00'),
(4, 93.8, 97.5, 'Restos de paja y tierra','2024-10-18 16:20:00'),
(5, 85.6, 95.4, 'Restos de semillas dañadas','2024-10-20 10:00:00');