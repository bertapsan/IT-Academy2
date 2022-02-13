-- MySQL Script generated by MySQL Workbench
-- Sun Feb 13 17:06:17 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema pizzeria
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pizzeria
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pizzeria` DEFAULT CHARACTER SET utf8 ;
USE `pizzeria` ;

-- -----------------------------------------------------
-- Table `pizzeria`.`botiga`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzeria`.`botiga` (
  `id_botiga` INT(11) NOT NULL,
  `carrer` VARCHAR(45) NULL DEFAULT NULL,
  `portal` VARCHAR(5) NULL DEFAULT NULL,
  `codi_postal` VARCHAR(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id_botiga`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pizzeria`.`categoria_pizza`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzeria`.`categoria_pizza` (
  `id_categoria_pizza` INT(11) NOT NULL,
  `nom_categoria` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_categoria_pizza`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pizzeria`.`provincia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzeria`.`provincia` (
  `id_provincia` INT(11) NOT NULL,
  `nom` ENUM('Barcelona', 'LLeida', 'Girona', 'Tarragona') NULL DEFAULT NULL,
  PRIMARY KEY (`id_provincia`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pizzeria`.`localitat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzeria`.`localitat` (
  `id-localitat` INT(11) NOT NULL,
  `nom` VARCHAR(45) NULL DEFAULT NULL,
  `id_provincia` INT(11) NOT NULL,
  PRIMARY KEY (`id-localitat`, `id_provincia`),
  INDEX `fk_localitat_provincia1_idx` (`id_provincia` ASC) ,
  CONSTRAINT `fk_localitat_provincia1`
    FOREIGN KEY (`id_provincia`)
    REFERENCES `pizzeria`.`provincia` (`id_provincia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pizzeria`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzeria`.`customer` (
  `id_customer` INT(11) NOT NULL,
  `nom` VARCHAR(45) NULL DEFAULT NULL,
  `cognom1` VARCHAR(45) NULL DEFAULT NULL,
  `cognom2` VARCHAR(45) NULL DEFAULT NULL,
  `carrer` VARCHAR(45) NULL DEFAULT NULL,
  `portal` VARCHAR(5) NULL DEFAULT NULL,
  `pis` VARCHAR(10) NULL DEFAULT NULL,
  `porta` VARCHAR(5) NULL DEFAULT NULL,
  `codi_postal` VARCHAR(10) NULL DEFAULT NULL,
  `telefon` VARCHAR(9) NULL DEFAULT NULL,
  `id-localitat` INT(11) NOT NULL,
  `id_provincia` INT(11) NOT NULL,
  PRIMARY KEY (`id_customer`, `id-localitat`, `id_provincia`),
  INDEX `fk_customer_localitat1_idx` (`id-localitat` ASC, `id_provincia` ASC) ,
  CONSTRAINT `fk_customer_localitat1`
    FOREIGN KEY (`id-localitat` , `id_provincia`)
    REFERENCES `pizzeria`.`localitat` (`id-localitat` , `id_provincia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pizzeria`.`empleat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzeria`.`empleat` (
  `id_empleat` INT(11) NOT NULL,
  `nom` VARCHAR(45) NULL DEFAULT NULL,
  `cognom1` VARCHAR(45) NULL DEFAULT NULL,
  `cognom2` VARCHAR(45) NULL DEFAULT NULL,
  `nif` VARCHAR(8) NULL DEFAULT NULL,
  `telefon` VARCHAR(9) NULL DEFAULT NULL,
  `carrec` ENUM('cuiner', 'repartidor') NULL DEFAULT NULL,
  `id_botiga` INT(11) NOT NULL,
  PRIMARY KEY (`id_empleat`, `id_botiga`),
  INDEX `fk_empleat_botiga1_idx` (`id_botiga` ASC) ,
  CONSTRAINT `fk_empleat_botiga1`
    FOREIGN KEY (`id_botiga`)
    REFERENCES `pizzeria`.`botiga` (`id_botiga`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pizzeria`.`comanda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzeria`.`comanda` (
  `id_Comanda` INT(11) NOT NULL,
  `data_hora` DATETIME NULL DEFAULT NULL,
  `tipus` ENUM('domicili', 'botiga') NULL DEFAULT NULL,
  `lliurament_data_hora` DATETIME NULL DEFAULT NULL,
  `id_customer` INT(11) NOT NULL,
  `id-localitat` INT(11) NOT NULL,
  `id_provincia` INT(11) NOT NULL,
  `id_botiga` INT(11) NOT NULL,
  `id_empleat` INT(11) NOT NULL,
  PRIMARY KEY (`id_Comanda`, `id_customer`, `id-localitat`, `id_provincia`, `id_botiga`),
  INDEX `fk_Comanda_customer1_idx` (`id_customer` ASC, `id-localitat` ASC, `id_provincia` ASC) ,
  INDEX `fk_Comanda_botiga1_idx` (`id_botiga` ASC) ,
  INDEX `fk_Comanda_empleat1_idx` (`id_empleat` ASC) ,
  CONSTRAINT `fk_Comanda_botiga1`
    FOREIGN KEY (`id_botiga`)
    REFERENCES `pizzeria`.`botiga` (`id_botiga`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comanda_customer1`
    FOREIGN KEY (`id_customer` , `id-localitat` , `id_provincia`)
    REFERENCES `pizzeria`.`customer` (`id_customer` , `id-localitat` , `id_provincia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comanda_empleat1`
    FOREIGN KEY (`id_empleat`)
    REFERENCES `pizzeria`.`empleat` (`id_empleat`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pizzeria`.`producte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzeria`.`producte` (
  `id_producte` INT(11) NOT NULL,
  `nom` VARCHAR(45) NULL DEFAULT NULL,
  `descripcio` VARCHAR(200) NULL DEFAULT NULL,
  `imatge` TINYBLOB NULL DEFAULT NULL,
  `preu` DECIMAL(7,2) NULL DEFAULT NULL,
  `tipus_producte` ENUM('pizza', 'hamburguesa', 'beguda') NULL DEFAULT NULL,
  `id_categoria_pizza` INT(11) NOT NULL,
  PRIMARY KEY (`id_producte`),
  INDEX `fk_producte_categoria_pizza1_idx` (`id_categoria_pizza` ASC) ,
  CONSTRAINT `fk_producte_categoria_pizza1`
    FOREIGN KEY (`id_categoria_pizza`)
    REFERENCES `pizzeria`.`categoria_pizza` (`id_categoria_pizza`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `pizzeria`.`llista_productes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzeria`.`llista_productes` (
  `id_llista_productes` INT(11) NOT NULL,
  `unitats_per_producte` INT(11) NULL DEFAULT NULL,
  `id_producte` INT(11) NOT NULL,
  `id_Comanda` INT(11) NOT NULL,
  `id_customer` INT(11) NOT NULL,
  `id-localitat` INT(11) NOT NULL,
  `id_provincia` INT(11) NOT NULL,
  `id_botiga` INT(11) NOT NULL,
  PRIMARY KEY (`id_llista_productes`, `id_producte`, `id_Comanda`, `id_customer`, `id-localitat`, `id_provincia`, `id_botiga`),
  INDEX `fk_llista_productes_producte1_idx` (`id_producte` ASC) ,
  INDEX `fk_llista_productes_comanda1_idx` (`id_Comanda` ASC, `id_customer` ASC, `id-localitat` ASC, `id_provincia` ASC, `id_botiga` ASC) ,
  CONSTRAINT `fk_llista_productes_producte1`
    FOREIGN KEY (`id_producte`)
    REFERENCES `pizzeria`.`producte` (`id_producte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_llista_productes_comanda1`
    FOREIGN KEY (`id_Comanda` , `id_customer` , `id-localitat` , `id_provincia` , `id_botiga`)
    REFERENCES `pizzeria`.`comanda` (`id_Comanda` , `id_customer` , `id-localitat` , `id_provincia` , `id_botiga`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
