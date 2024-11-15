-- Crear tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    google_id VARCHAR(255) NOT NULL UNIQUE,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    contraseña 
);

-- Crear tabla de libros guardados
CREATE TABLE libros_guardados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    google_books_id VARCHAR(255) NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    imagen_portada VARCHAR(255),
    reseña_personal TEXT,
    fecha_guardado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES usuarios(id) ON DELETE CASCADE
);



INSERT INTO usuarios (email, nombre, contraseña, google_id) VALUES 
('usuario1@example.com', 'Carlos Pérez','01', 'google_id_12345'),
('usuario2@example.com', 'Ana Gómez','02', 'google_id_67890'),
('usuario3@example.com', 'Luis Martínez','03', 'google_id_13579'),
('usuario4@example.com', 'Marta Sánchez','04', 'google_id_24680'),
('usuario5@example.com', 'José Rodríguez','05', 'google_id_11223');
