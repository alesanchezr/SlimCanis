SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`role` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `role_id` INT NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `createdate` TIMESTAMP NULL DEFAULT '2009-03-10 01:01:01',
  `updatedate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`socio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`socio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `cedula` INT NOT NULL,
  `numero_socio` VARCHAR(20) NOT NULL,
  `handicap` SMALLINT NOT NULL,
  `telefono` VARCHAR(45) NULL,
  `createdate` TIMESTAMP NULL DEFAULT '2009-03-10 01:01:01',
  `updatedate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cedula_UNIQUE` (`cedula` ASC),
  UNIQUE INDEX `numero_socio_UNIQUE` (`numero_socio` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`equipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`equipo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `socio_id` INT NOT NULL,
  `handicap_promedio` SMALLINT NOT NULL,
  `createdate` TIMESTAMP NOT NULL DEFAULT '2009-03-10 01:01:01',
  `updatedate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`invitado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`invitado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `cedula` INT NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(20) NULL,
  `handicap` SMALLINT NOT NULL,
  `createdate` TIMESTAMP NULL DEFAULT '2009-03-10 01:01:01',
  `updatedate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `cedula_UNIQUE` (`cedula` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`integrante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`integrante` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `equipo_id` INT NOT NULL,
  `socio_id` INT NULL,
  `invitado_id` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`fecha_ocupada`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`fecha_ocupada` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `fecha_inicio` DATETIME NOT NULL,
  `fecha_fin` DATETIME NOT NULL,
  `motivo` VARCHAR(255) NOT NULL,
  `editado_por` VARCHAR(45) NULL,
  `createdate` TIMESTAMP NOT NULL DEFAULT '2009-03-10 01:01:01',
  `updatedate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`reservacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`reservacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `socio_id` INT NOT NULL,
  `equipo_id` INT NOT NULL,
  `fecha_solicitada` DATETIME NOT NULL,
  `prioridad` INT NULL,
  `estatus` VARCHAR(25) NOT NULL,
  `editado_por` VARCHAR(45) NULL,
  `createdate` TIMESTAMP NOT NULL DEFAULT '2009-03-10 01:01:01',
  `updatedate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `index_estatus` (`estatus` ASC),
  INDEX `index_fecha_solicitada` (`fecha_solicitada` ASC),
  INDEX `index_prioridad` (`prioridad` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cadi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cadi` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `cedula` INT NOT NULL,
  `telefono` VARCHAR(20) NULL,
  `createdate` TIMESTAMP NOT NULL DEFAULT '2009-03-10 01:01:01',
  `updatedate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cedula_UNIQUE` (`cedula` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`asignacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`asignacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `reservacion_id` INT NOT NULL COMMENT '	',
  `equipo_id` INT NOT NULL,
  `socio_id` INT NOT NULL,
  `cadi_id` INT NULL,
  `hoyo` TINYINT NOT NULL,
  `fecha_asignada` DATETIME NOT NULL,
  `fecha_inicio` DATETIME NULL,
  `fecha_fin` DATETIME NULL,
  `estatus` VARCHAR(20) NOT NULL,
  `editado_por` VARCHAR(45) NULL,
  `createdate` TIMESTAMP NOT NULL DEFAULT '2009-03-10 01:01:01',
  `updatedate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `reservacion_id_UNIQUE` (`reservacion_id` ASC),
  INDEX `index_fecha_asignada` (`fecha_asignada` ASC),
  INDEX `index_estatus` (`estatus` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`invitacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`invitacion` (
  `invitado_id` INT NOT NULL,
  `asignacion_id` INT NOT NULL)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`ticket` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `reservacion_id` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
