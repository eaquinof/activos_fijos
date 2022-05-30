-- empresas
insert into Activos.empresa (nombreempresa) values ('empresa1');
insert into Activos.empresa (nombreempresa) values ('empresa2');
insert into Activos.empresa (nombreempresa) values ('empresa3');

-- roles
insert into activos.rol (Descripcion) VALUES ('Admin');
insert into activos.rol (Descripcion) VALUES ('User');

-- usuarios
insert into activos.usuario (codusr,password,idrol) values ('eaquino','eaquino',1);
insert into activos.usuario (codusr,password,idrol) values ('test','test',2);

-- Monedas
insert into activos.moneda values ('GTQ','Quetzal','Q');
insert into activos.moneda values ('USD','Dolar Estadounidense','$');
insert into activos.moneda values ('EUR','Euro','€');

-- TASAS DE CAMBIO
INSERT INTO activos.tasa_cambio VALUES ('USD',7.65775,sysdate());
INSERT INTO activos.tasa_cambio VALUES ('EUR',8.04775,sysdate());