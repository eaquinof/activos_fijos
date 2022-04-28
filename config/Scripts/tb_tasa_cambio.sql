-- -----------------------------------------------------
-- Table `Activos`.`tasa_cambio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Activos`.`tasa_cambio` ;

CREATE TABLE IF NOT EXISTS `Activos`.`tasa_cambio` (
  `codmoneda` VARCHAR(3) NOT NULL,
  `tasa` DOUBLE  NULL DEFAULT NULL,
  `fecha` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`codmoneda`,`fecha`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;