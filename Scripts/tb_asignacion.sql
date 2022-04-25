-- -----------------------------------------------------
-- Table `Activos`.`Asignacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Activos`.`Asignacion` ;

CREATE TABLE IF NOT EXISTS `Activos`.`Asignacion` (
  `idAsginacion` INT NOT NULL,
  `idEmpleado` INT NULL DEFAULT NULL,
  `idActivo` INT NOT NULL,
  `FechaAsigna` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`idAsginacion`, `idActivo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE INDEX `ffk_empleado_idx` ON `Activos`.`Asignacion` (`idEmpleado` ASC) ;

CREATE INDEX `fk_activo_idx` ON `Activos`.`Asignacion` (`idActivo` ASC) ;