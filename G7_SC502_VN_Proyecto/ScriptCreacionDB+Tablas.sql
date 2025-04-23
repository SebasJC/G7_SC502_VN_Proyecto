-- Crear base de datos
CREATE DATABASE IF NOT EXISTS pura_cleta_cr;
USE pura_cleta_cr;

-- Tabla de bicicletas
CREATE TABLE bicicletas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    tipo ENUM('venta', 'alquiler') NOT NULL,
    imagen VARCHAR(255) DEFAULT 'imagenes/default.jpg'
);

-- Tabla del carrito (temporal por usuario o sesión)
CREATE TABLE carrito (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bicicleta_id INT NOT NULL,
    tipo ENUM('venta', 'alquiler') NOT NULL,
    cantidad INT DEFAULT 1,
    FOREIGN KEY (bicicleta_id) REFERENCES bicicletas(id) ON DELETE CASCADE
);

-- Tabla de compras confirmadas
CREATE TABLE compras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bicicleta_id INT NOT NULL,
    cantidad INT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (bicicleta_id) REFERENCES bicicletas(id)
);

-- Tabla de alquileres confirmados
CREATE TABLE alquileres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bicicleta_id INT NOT NULL,
    fecha_alquiler TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    dias INT DEFAULT 1,
    FOREIGN KEY (bicicleta_id) REFERENCES bicicletas(id)
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);