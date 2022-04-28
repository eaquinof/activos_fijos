-- -----------------------------------------------------
-- Table `multiempresa`.`emrpesa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Activos`.`empresa` ;

CREATE TABLE IF NOT EXISTS `Activos`.`empresa` (
  `idempresa` INT NOT NULL AUTO_INCREMENT,
  `nombreempresa` VARCHAR(50) NULL DEFAULT NULL,
  `dbempresa` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`idempresa`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb3;