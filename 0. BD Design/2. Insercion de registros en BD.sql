CREATE DATABASE IF NOT EXISTS certificate_system_database;

USE certificate_system_database;

INSERT INTO `areas` (`id`, `name`, `abbreviation`) VALUES 
(1, 'Gestión del Talento Humano', 'GTH'),
(2, 'Logística y Finanzas', 'LTK & FNZ'),
(3, 'Marketing', 'MKT'),
(4, 'Project Management Office', 'PMO'),
(5, 'Tecnologías de la Información', 'TI');


INSERT INTO `people` (`id`, `first_name`, `last_name`, `email`, `gender`, `signature_image_url`, `created_at`, `updated_at`) VALUES 
(1, 'Lucía de Fátima', 'Amaya Cáceda', 't1051300621@unitru.edu.pe', 'femenino', NULL, '2023-03-01 03:05:14', '2025-03-31 03:05:14'),
(2, 'Silvana Valeria', 'Pereda Llave', 'speredal@unitru.edu.pe', 'femenino', NULL, '2023-03-01 03:05:14', '2025-03-31 03:05:14'),
(3, 'Marina Lizeth', 'Gonzales Torres', 't1510600121@unitru.edu.pe', 'femenino', NULL, '2023-03-01 03:05:14', '2025-03-31 03:05:14'),
(4, 'Diego Jesús', 'Rodríguez Sabana', 't1010100421@unitru.edu.pe', 'masculino', NULL, '2023-03-01 03:05:14', '2025-03-31 03:05:14'),
(5, 'Ángel', 'Iparraguirre Aguilar', 't1024000721@unitru.edu.pe', 'masculino', NULL, '2023-03-01 03:05:14', '2025-03-31 03:05:14'),
(6, 'María Fernanda de la Caridad', 'Herrera Cerquín', 'mfherrerace@unitru.edu.pe', 'femenino', NULL, '2023-03-01 03:05:14', '2025-03-31 03:05:14'),
(7, 'Cristian Anthony', 'Morales Esquivel', 'chmoralese@unitru.edu.pe', 'masculino', NULL, '2023-03-01 03:05:14', '2025-03-31 03:05:14');


INSERT INTO `area_person` (`person_id`, `area_id`, `start_date`, `end_date`, `is_active`, `created_at`, `updated_at`) VALUES 
('1', '4', '2023-05-01', NULL, '1', '2024-05-01 15:05:10', '2025-03-31 03:23:17'),
('2', '1', '2023-05-01', NULL, '1', '2024-05-01 15:05:10', '2025-03-31 03:23:17'),
('3', '1', '2023-05-01', NULL, '1', '2021-05-01 15:05:10', '2025-03-31 03:23:17'),
('4', '2', '2023-05-01', NULL, '1', '2024-05-01 15:05:10', '2025-03-31 03:23:17'),
('5', '3', '2023-05-01', NULL, '1', '2024-05-01 15:05:10', '2025-03-31 03:23:17'),
('6', '4', '2023-05-01', NULL, '1', '2023-05-01 15:05:10', '2025-03-31 03:23:17'),
('7', '5', '2023-05-01', NULL, '1', '2023-05-01 15:05:10', '2025-03-31 03:23:17');


INSERT INTO `outstanding_values` (`id`, `name`) VALUES 
(1, 'Actitud Positiva'),
(2, 'Innovación'),
(3, 'Integridad'),
(4, 'Trabajo en Equipo'),
(5, 'Vocación de Servicio');


INSERT INTO `area_person_outstanding_value` (`area_person_area_id`, `area_person_person_id`, `outstanding_value_id`, `date`, `created_at`, `updated_at`) VALUES ('4', '6', '4', '2024-06-01', '2024-05-30 04:26:30', '2025-03-31 04:26:30');
