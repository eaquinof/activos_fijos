SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS auditoria.auditoria;

CREATE TABLE auditoria.auditoria
(
   id         int NOT NULL AUTO_INCREMENT,
   type       varchar(255) DEFAULT NULL,
   tabla      varchar(255) DEFAULT NULL,
   old text,
   new text,
   valor_alterado text,
   usuario    varchar(255) DEFAULT NULL,
   ip         varchar(255) DEFAULT NULL,
   fecha      timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(),
   PRIMARY KEY(id)
)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARSET = utf8;

SET FOREIGN_KEY_CHECKS = 1;