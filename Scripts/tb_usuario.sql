-- -----------------------------------------------------
-- Table `Activos`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Activos`.`Usuario` ;

CREATE TABLE IF NOT EXISTS `Activos`.`Usuario` (
  `CodUsr` VARCHAR(10) NOT NULL,
  `Password` VARCHAR(12) NOT NULL,
  `idRol` INT NOT NULL,
  `Usuariocol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`CodUsr`, `Password`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;

CREATE INDEX `fk_rol_idx` ON `Activos`.`Usuario` (`idRol` ASC) VISIBLE;