CREATE TABLE pilotos_copilotos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_piloto VARCHAR(50) NOT NULL,
    apellido_piloto VARCHAR(50) NOT NULL,
    nacionalidad_piloto VARCHAR(50) NOT NULL,
    nombre_copiloto VARCHAR(50) NOT NULL,
    apellido_copiloto VARCHAR(50) NOT NULL,
    nacionalidad_copiloto VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO pilotos_copilotos (nombre_piloto, apellido_piloto, nacionalidad_piloto, nombre_copiloto, apellido_copiloto, nacionalidad_copiloto) VALUES
('Sébastien', 'Loeb', 'Francia', 'Daniel', 'Elena', 'Mónaco'),
('Carlos', 'Sainz', 'España', 'Lucas', 'Cruz', 'España'),
('Thierry', 'Neuville', 'Bélgica', 'Martijn', 'Wydaeghe', 'Bélgica'),
('Ott', 'Tänak', 'Estonia', 'Martin', 'Järveoja', 'Estonia'),
('Kalle', 'Rovanperä', 'Finlandia', 'Jonne', 'Halttunen', 'Finlandia'),
('Elfyn', 'Evans', 'Reino Unido', 'Scott', 'Martin', 'Reino Unido'),
('Dani', 'Sordo', 'España', 'Cándido', 'Carrera', 'España'),
('Esapekka', 'Lappi', 'Finlandia', 'Janne', 'Ferm', 'Finlandia'),
('Gus', 'Greensmith', 'Reino Unido', 'Jonas', 'Andersson', 'Suecia'),
('Adrien', 'Fourmaux', 'Francia', 'Alexandre', 'Coria', 'Francia');



