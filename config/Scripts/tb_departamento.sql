-- -----------------------------------------------------
-- Table `Activos`.`Departamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Activos`.`Departamento` ;

CREATE TABLE IF NOT EXISTS `Activos`.`Departamento` (
  `idDepto` INT NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idDepto`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;