
CREATE DATABASE dbprensautp
USE dbprensautp

create table cliente(

id_cliente int primary key AUTO_INCREMENT,
cedula varchar(50) not null,
correo varchar(50) not null,
nombre varchar(50) not null,
apellido varchar(50) not null,
contrasena varchar(50) not null,
sede varchar(50) not null

);


create table personal(

id_personal int primary key AUTO_INCREMENT,
tipo_personal varchar(50) not null,
nombre varchar(50) not null,
apellido varchar(50) not null,
correo varchar(50) not null,
contrasena varchar(50) not null,
sede varchar(50) not null

)

create table servicio(

id_servicio int primary key AUTO_INCREMENT,
cantidad_personas int not null,
fecha date not null,
hora_inicio time(6) not null,
hora_final time(6) not null,
ubicacion varchar(100) not null,
tipo_evento varchar(50) not null,
descripcion varchar(100) not null,
estado int not NULL,
id_personal INT ,
id_cliente INT,
FOREIGN KEY (id_personal) REFERENCES personal(id_personal),
FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)

)


create table tipo_servicio(

cod_tipo int primary key AUTO_INCREMENT,
tipo_servicio varchar(50) not null

)

create table actualizar(

fecha date not null,
hora_inicio time(6) not null,
hora_final time(6) not null,
ubicacion varchar(100) not null,
descripcion varchar(100) not null,
id_cliente INT ,
id_servicio INT,
FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente),
FOREIGN KEY (id_servicio) REFERENCES servicio(id_servicio)

)


create table atiende (

id_cliente INT,
id_personal int,
cod_tipo INT ,
FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente),
FOREIGN KEY (id_personal) REFERENCES personal(id_personal),
FOREIGN KEY (cod_tipo) REFERENCES tipo_servicio(cod_tipo),
primary key (id_cliente,id_personal)
)


----------------------------------------------------------------------
-- Insertar datos
INSERT INTO personal VALUES (1,"admin","Administrador","Dicomes","dicomes@utp.ac.pa","123","UTP")

INSERT INTO personal VALUES (2,"comunicador","Comunicador","Social","comunicador@utp.ac.pa","123","UTP")

INSERT INTO servicio (id_servicio, cantidad_personas, fecha, hora_inicio, hora_final, ubicacion, tipo_evento, descripcion, estado, id_personal, id_cliente) VALUES (2,23,CURDATE(),CURRENT_TIME(),CURRENT_TIME(),'Edificio 2','Publico','Este evento necesita de fotografos.',1,1,15)
INSERT INTO servicio (id_servicio, cantidad_personas, fecha, hora_inicio, hora_final, ubicacion, tipo_evento, descripcion, estado, id_personal, id_cliente) VALUES (3,23,CURDATE(),CURRENT_TIME(),CURRENT_TIME(),'Edificio 3','Publico','Camarografos locoo.',1,1,16)


INSERT INTO actualizar (fecha, hora_inicio, hora_final, ubicacion, descripcion, id_cliente, id_servicio) VALUES (CURDATE(),CURRENT_TIME(),CURRENT_TIME(), 'En mi casa','Alexis texas y Rhoades ahi',15,2);

INSERT INTO actualizar (fecha, hora_inicio, hora_final, ubicacion, descripcion, id_cliente, id_servicio) VALUES (CURDATE(),CURRENT_TIME(),CURRENT_TIME(), 'En la Nacional pues.','Camarografos y traeme a Bad bunny tambien loco.',15,1);

INSERT INTO actualizar (fecha, hora_inicio, hora_final, ubicacion, descripcion, id_cliente, id_servicio) VALUES (CURDATE(),CURRENT_TIME(),CURRENT_TIME(), 'El gacebo.','Camarografos y Camaras',16,3);

SELECT*FROM personal
SELECT*FROM servicio
SELECT*FROM actualizar
SELECT*FROM cliente
SELECT*FROM solicitudactualizar
SELECT*FROM NotificacionesActualizar

--DROP VIEW solicitudactualizar

------------------------- COSAS AGREGADAS -----------------------
-- Se agrego el campo de id_solicitud a la tabla ACTUALIZAR.

-- Vista para listar solicitud de actualizacion junto con los datos del cliente y los datos originales del evento.
CREATE VIEW solicitudActualizar AS SELECT actualizar.id_cliente, servicio.id_servicio, actualizar.id_solicitud, cliente.correo, cliente.nombre,cliente.apellido,actualizar.fecha AS a_fecha, actualizar.hora_inicio AS a_hora_inicio, actualizar.hora_final AS a_hora_final, actualizar.ubicacion AS a_ubicacion, actualizar.descripcion AS a_descripcion, servicio.fecha, servicio.hora_inicio, servicio.hora_final, servicio.ubicacion, servicio.descripcion FROM actualizar JOIN cliente ON actualizar.id_cliente = cliente.id_cliente JOIN servicio ON actualizar.id_servicio = servicio.id_servicio


-- TABLA FANSTAMA para enviar los mensajes de rechazo o aceptado al cliente.
-- Se puede adicionar un campo en la tabla para saber si la solicitud es de rechazo o aceptado.
CREATE TABLE NotificacionesActualizar (
id_notificacion INT PRIMARY KEY AUTO_INCREMENT,
mensaje VARCHAR(100),
id_cliente INT,
FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
)

ALTER TABLE atiende 





