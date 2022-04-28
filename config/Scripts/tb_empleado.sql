-- -----------------------------------------------------
-- Table `Activos`.`Empleado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Activos`.`Empleado` ;

CREATE TABLE IF NOT EXISTS `Activos`.`Empleado` (
  `idEmpleado` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL DEFAULT NULL,
  `Apellido` VARCHAR(45) NULL DEFAULT NULL,
  `Departamento` INT NULL DEFAULT NULL,
  `Usuario` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`idEmpleado`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE INDEX `fk_depto_idx` ON `Activos`.`Empleado` (`Departamento` ASC);