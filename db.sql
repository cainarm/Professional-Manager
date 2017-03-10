-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema lpw_g2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema lpw_g2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `lpw_g2` DEFAULT CHARACTER SET latin1 ;
USE `lpw_g2` ;

-- -----------------------------------------------------
-- Table `lpw_g2`.`area`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lpw_g2`.`area` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `lpw_g2`.`city`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lpw_g2`.`city` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `estado` CHAR(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `lpw_g2`.`pontosturisticos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lpw_g2`.`pontosturisticos` (
  `idPontoTuristico` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `cidade` VARCHAR(100) NOT NULL,
  `estado` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(5000) NOT NULL,
  `avaliacao` INT(10) NOT NULL,
  PRIMARY KEY (`idPontoTuristico`))
ENGINE = InnoDB
AUTO_INCREMENT = 17
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `lpw_g2`.`profession`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lpw_g2`.`profession` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `area_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_profession_area1_idx` (`area_id` ASC),
  CONSTRAINT `fk_profession_area1`
    FOREIGN KEY (`area_id`)
    REFERENCES `lpw_g2`.`area` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `lpw_g2`.`professional`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lpw_g2`.`professional` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NULL DEFAULT NULL,
  `telefone` VARCHAR(15) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `area_id` INT(11) NOT NULL,
  `cidade_id` INT(11) NOT NULL,
  `descricao` VARCHAR(500) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_professional_area_idx` (`area_id` ASC),
  INDEX `fk_professional_cidade1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_professional_area`
    FOREIGN KEY (`area_id`)
    REFERENCES `lpw_g2`.`profession` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_professional_cidade1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `lpw_g2`.`city` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `lpw_g2`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lpw_g2`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(50) NULL DEFAULT NULL,
  `pass` VARCHAR(400) NULL DEFAULT NULL,
  `level` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1;

USE `lpw_g2` ;

-- -----------------------------------------------------
-- Placeholder table for view `lpw_g2`.`pro_view`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `lpw_g2`.`pro_view` (`id` INT, `nome` INT, `telefone` INT, `email` INT, `profissao` INT, `cidade` INT, `descricao` INT);

-- -----------------------------------------------------
-- View `lpw_g2`.`pro_view`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `lpw_g2`.`pro_view`;
USE `lpw_g2`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lpw_g2`.`pro_view` AS select `lpw_g2`.`professional`.`id` AS `id`,`lpw_g2`.`professional`.`nome` AS `nome`,`lpw_g2`.`professional`.`telefone` AS `telefone`,`lpw_g2`.`professional`.`email` AS `email`,`lpw_g2`.`profession`.`nome` AS `profissao`,`lpw_g2`.`city`.`nome` AS `cidade`,`lpw_g2`.`professional`.`descricao` AS `descricao` from ((`lpw_g2`.`professional` join `lpw_g2`.`city` on((`lpw_g2`.`professional`.`cidade_id` = `lpw_g2`.`city`.`id`))) join `lpw_g2`.`profession` on((`lpw_g2`.`professional`.`area_id` = `lpw_g2`.`profession`.`id`)));

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
