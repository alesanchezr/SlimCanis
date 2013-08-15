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
  `createdate` DATETIME NOT NULL,
  `updatedate` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_user_1_idx` (`role_id` ASC),
  CONSTRAINT `fk_user_role`
    FOREIGN KEY (`role_id`)
    REFERENCES `mydb`.`role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  `createdate` DATETIME NOT NULL,
  `updatedate` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cedula_UNIQUE` (`cedula` ASC),
  UNIQUE INDEX `numero_socio_UNIQUE` (`numero_socio` ASC),
  INDEX `fk_socio_user_idx` (`user_id` ASC),
  CONSTRAINT `fk_socio_user`
    FOREIGN KEY (`user_id`)
    REFERENCES `mydb`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`equipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`equipo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `socio_id` INT NOT NULL,
  `handicap_promedio` SMALLINT NOT NULL,
  `createdate` DATETIME NOT NULL,
  `updatedate` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_equipo_socio_idx` (`socio_id` ASC),
  CONSTRAINT `fk_equipo_socio`
    FOREIGN KEY (`socio_id`)
    REFERENCES `mydb`.`socio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  `createdate` DATETIME NOT NULL,
  `updatedate` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `cedula_UNIQUE` (`cedula` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`integrante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`integrante` (
  `equipo_id` INT NOT NULL,
  `socio_id` INT NULL,
  `invitado_id` INT NULL,
  INDEX `fk_integrantes_equipo_idx` (`equipo_id` ASC),
  INDEX `fk_integrantes_socio_idx` (`socio_id` ASC),
  INDEX `fk_integrantes_invitado_idx` (`invitado_id` ASC),
  CONSTRAINT `fk_integrantes_equipo`
    FOREIGN KEY (`equipo_id`)
    REFERENCES `mydb`.`equipo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_integrantes_socio`
    FOREIGN KEY (`socio_id`)
    REFERENCES `mydb`.`socio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_integrantes_invitado`
    FOREIGN KEY (`invitado_id`)
    REFERENCES `mydb`.`invitado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
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
  `createdate` DATETIME NOT NULL,
  `updatedate` DATETIME NOT NULL,
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
  `estatus` VARCHAR(25) NOT NULL,
  `editado_por` VARCHAR(45) NULL,
  `createdate` DATETIME NOT NULL,
  `updatedate` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_reservacion_socio_idx` (`socio_id` ASC),
  INDEX `fk_reservacion_equipo_idx` (`equipo_id` ASC),
  INDEX `index_estatus` (`estatus` ASC),
  INDEX `index_fecha_solicitada` (`fecha_solicitada` ASC),
  CONSTRAINT `fk_reservacion_socio`
    FOREIGN KEY (`socio_id`)
    REFERENCES `mydb`.`socio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservacion_equipo`
    FOREIGN KEY (`equipo_id`)
    REFERENCES `mydb`.`equipo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cadi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cadi` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `cedula` INT NOT NULL,
  `telefono` VARCHAR(20) NULL,
  `createdate` DATETIME NOT NULL,
  `updatedate` DATETIME NOT NULL,
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
  `createdate` DATETIME NULL,
  `updatedate` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `reservacion_id_UNIQUE` (`reservacion_id` ASC),
  INDEX `fk_asignacion_cadi_idx` (`cadi_id` ASC),
  INDEX `fk_asignacion_equipo_idx` (`equipo_id` ASC),
  INDEX `fk_asignacion_socio_idx` (`socio_id` ASC),
  INDEX `index_fecha_asignada` (`fecha_asignada` ASC),
  INDEX `index_estatus` (`estatus` ASC),
  CONSTRAINT `fk_asignacion_reservacion`
    FOREIGN KEY (`reservacion_id`)
    REFERENCES `mydb`.`reservacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_cadi`
    FOREIGN KEY (`cadi_id`)
    REFERENCES `mydb`.`cadi` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_equipo`
    FOREIGN KEY (`equipo_id`)
    REFERENCES `mydb`.`equipo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_socio`
    FOREIGN KEY (`socio_id`)
    REFERENCES `mydb`.`socio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`invitacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`invitacion` (
  `invitado_id` INT NOT NULL,
  `asignacion_id` INT NOT NULL,
  INDEX `fk_invitaciones_invitado_idx` (`invitado_id` ASC),
  INDEX `fk_invitaciones_asignacion_idx` (`asignacion_id` ASC),
  CONSTRAINT `fk_invitaciones_invitado`
    FOREIGN KEY (`invitado_id`)
    REFERENCES `mydb`.`invitado` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invitaciones_asignacion`
    FOREIGN KEY (`asignacion_id`)
    REFERENCES `mydb`.`asignacion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
