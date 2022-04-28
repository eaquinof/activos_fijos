-- -----------------------------------------------------
-- Table `Activos`.`moneda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Activos`.`moneda` ;

CREATE TABLE IF NOT EXISTS `Activos`.`moneda` (
  `codmoneda` VARCHAR(3) NOT NULL,
  `divisa` VARCHAR(100) NOT NULL,
  `simbolo` VARCHAR(4) ,
  PRIMARY KEY (`codmoneda`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;