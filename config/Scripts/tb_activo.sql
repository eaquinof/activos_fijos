-- -----------------------------------------------------
-- Table `Activos`.`Activo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Activos`.`Activo` ;

CREATE TABLE IF NOT EXISTS `Activos`.`Activo` (
  `idActivo` INT NOT NULL AUTO_INCREMENT,
  `No_Serial` VARCHAR(50) NULL DEFAULT NULL,
  `Descripcion` VARCHAR(50) NULL DEFAULT NULL,
  `Valor` INT NULL DEFAULT NULL,
  `FechaCompra` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`idActivo`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb3;

ALTER TABLE activos.activo
 ADD empresa INT DEFAULT '1' AFTER FechaCompra;