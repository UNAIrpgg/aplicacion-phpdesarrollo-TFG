CREATE TABLE beneficiarios (
    beneficiario_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    edad INT NOT NULL,
    fecha_ingreso DATE NOT NULL,
    estado_recuperacion VARCHAR(20) NOT NULL
);

INSERT INTO beneficiarios (nombre, apellido, edad, fecha_ingreso, estado_recuperacion) VALUES
('Juan', 'Martínez', 34, '2024-01-15', 'En tratamiento'),
('María', 'López', 28, '2023-11-20', 'Recuperado'),
('Carlos', 'González', 40, '2024-02-10', 'En terapia'),
('Laura', 'Fernández', 25, '2023-12-05', 'En tratamiento'),
('Pedro', 'Ramírez', 38, '2023-10-30', 'En seguimiento'),
('Sofía', 'Díaz', 29, '2024-01-05', 'En tratamiento'),
('Miguel', 'Torres', 33, '2023-09-15', 'Recuperado'),
('Ana', 'Sánchez', 27, '2024-02-20', 'En terapia'),
('Luis', 'Hernández', 35, '2023-08-25', 'En seguimiento'),
('Elena', 'Castro', 31, '2023-11-10', 'Recuperado');


