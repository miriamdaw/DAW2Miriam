-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS biblioteca;
USE biblioteca;

-- Crear la tabla de libros
CREATE TABLE IF NOT EXISTS libros (
    id_libro INT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

