-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2024 a las 19:51:51
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cyberthronejava`
--

DROP  SCHEMA IF EXISTS `cyberthronejava`;
CREATE SCHEMA IF NOT EXISTS `cyberthronejava` DEFAULT CHARACTER SET utf8mb3 ;
USE `cyberthronejava` ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `nacimiento` date NOT NULL,
  `genero` VARCHAR(255) NOT NULL,
  `canal` enum('Twitch','Youtube','No') NOT NULL,
  `horas` int(11) NOT NULL CHECK (horas > 0),
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



--
-- Estructura de tabla para la tabla `imagenes_silla`
--

CREATE TABLE `imagenes_silla` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_archivo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- Estructura de tabla para la tabla `silla`
--

CREATE TABLE `silla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interes` enum('Tecnología','Videojuegos','Informática','Por determinar') DEFAULT NULL,
  `comentario` varchar(255) DEFAULT 'Sin comentarios',
  PRIMARY KEY (`id`),
  CONSTRAINT `check_interes` CHECK (`interes` IN ('Tecnología', 'Videojuegos', 'Informática', 'Por determinar'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;






/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
