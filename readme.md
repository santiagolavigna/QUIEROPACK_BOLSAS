project designed for quieropack_bolsas by 5 years ago (2017)
it's time to update some stuffs :D


//modificar el nombre de las bolsas KRAFF por KFRAFT en la BD
// asi matchea con las escritas en el guillotinado


ALTER TABLE quieropack_bolsas.users ADD porcentaje INT DEFAULT 5 NOT NULL;


//querys anteriores agregadas en produccion

ALTER TABLE quieropack_bolsas.dolar ADD precio_armado_bolsa decimal(25,2) DEFAULT 150 NOT NULL;


ALTER TABLE quieropack_bolsas.armadobolsa ADD centimetros INT DEFAULT 1 NOT NULL;

ALTER TABLE quieropack_bolsas.armadobolsa CHANGE centimetros centimetros int DEFAULT 1 NOT NULL AFTER nombre;
