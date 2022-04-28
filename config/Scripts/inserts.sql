--empresas
insert into Activos.empresa (nombreempresa) values ('empresa1');
insert into Activos.empresa (nombreempresa) values ('empresa2');
insert into Activos.empresa (nombreempresa) values ('empresa3');

--usuarios
insert into activos.usuario (codusr,password,idrol,usuariocol) values ('eaquino','eaquino',1,'eaquino');
insert into activos.usuario (codusr,password,idrol,usuariocol) values ('test','test',2,'test');

--Monedas
insert into activos.moneda values ('GTQ','Quetzal','Q');
insert into activos.moneda values ('USD','Dolar Estadounidense','$');
insert into activos.moneda values ('EUR','Euro','€');

--TASAS DE CAMBIO
INSERT INTO activos.tasa_cambio VALUES ('USD',7.65775,sysdate());
INSERT INTO activos.tasa_cambio VALUES ('EUR',8.04775,sysdate());