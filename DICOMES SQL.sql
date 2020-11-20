
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

id int primary key AUTO_INCREMENT,
cantidad_personas int not null,
start date not null,
hora_inicio time(6) not null,
hora_final time(6) not null,
ubicacion varchar(100) not null,
tipo_evento varchar(50) not null,
descripcion varchar(100) not null,
estado int not NULL,
id_personal INT ,
id_cliente INT,
color VARCHAR(50),
title VARCHAR(50),
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
id_servicio INT,
id_personal int,
cod_tipo INT ,
FOREIGN KEY (id_servicio) REFERENCES servicio(id),
FOREIGN KEY (id_personal) REFERENCES personal(id_personal),
FOREIGN KEY (cod_tipo) REFERENCES tipo_servicio(cod_tipo),
primary key (id_servicio,id_personal)
)

------------------------- COSAS AGREGADAS -----------------------
-- Se agrego el campo de id_solicitud a la tabla ACTUALIZAR.

-- Vista para listar solicitud de actualizacion junto con los datos del cliente y los datos originales del evento.
CREATE VIEW solicitudActualizar AS SELECT actualizar.id_cliente, servicio.id, actualizar.id_solicitud, cliente.correo, cliente.nombre,cliente.apellido,actualizar.fecha AS a_fecha, actualizar.hora_inicio AS a_hora_inicio, actualizar.hora_final AS a_hora_final, actualizar.ubicacion AS a_ubicacion, actualizar.descripcion AS a_descripcion, servicio.start, servicio.hora_inicio, servicio.hora_final, servicio.ubicacion, servicio.descripcion FROM actualizar JOIN cliente ON actualizar.id_cliente = cliente.id_cliente JOIN servicio ON actualizar.id_servicio = servicio.id

-- TABLA FANSTAMA para enviar los mensajes de rechazo o aceptado al cliente.
-- Se puede adicionar un campo en la tabla para saber si la solicitud es de rechazo o aceptado.
CREATE TABLE NotificacionesActualizar (
id_notificacion INT PRIMARY KEY AUTO_INCREMENT,
mensaje VARCHAR(100),
id_cliente INT,
FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
)
-- AGREGAR id_solicitud Primary Key A LA TABLA ACTUALIZAR





