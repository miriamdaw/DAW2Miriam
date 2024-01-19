-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema cyberthrone
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cyberthrone
-- -----------------------------------------------------

DROP  SCHEMA IF EXISTS `cyberthrone`;
CREATE SCHEMA IF NOT EXISTS `cyberthrone` DEFAULT CHARACTER SET utf8mb3 ;
USE `cyberthrone` ;
-- -----------------------------------------------------
-- Table `cyberthrone`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cyberthrone`.`clientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `edad` INT NOT NULL,
  `telefono` VARCHAR(20) NOT NULL,
  `comunidadAutonoma` VARCHAR(50) NOT NULL,
  `mensaje` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cyberthrone`.`silla`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cyberthrone`.`silla` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idCliente` INT NULL,
  `color` VARCHAR(50) NULL,
  `motivo` enum('Oficina','Videojuegos','Deporte','Por determinar') DEFAULT NULL,
  `valoracion` enum('Satisfecho','Neutral','No Satisfecho') NOT NULL,
  `fecha_compra` DATE NULL,
  PRIMARY KEY (`id`),
  INDEX `cliente-silla_idx` (`idCliente` ASC),
  CONSTRAINT `cliente-silla`
    FOREIGN KEY (`idCliente`)
    REFERENCES `cyberthrone`.`clientes` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cyberthrone`.`imagenes_silla`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cyberthrone`.`imagenes_silla` (
  `id_imagen` INT NOT NULL AUTO_INCREMENT,
  `id_silla` INT NOT NULL,
  `nombre_archivo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_imagen`),
  INDEX `silla-imagen_idx` (`id_silla` ASC),
  CONSTRAINT `silla-imagen`
    FOREIGN KEY (`id_silla`)
    REFERENCES `cyberthrone`.`silla` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;