-- -----------------------------------------------------
-- Table `Activos`.`Rol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Activos`.`Rol` ;

CREATE TABLE IF NOT EXISTS `Activos`.`Rol` (
  `idRol` INT NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idRol`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;