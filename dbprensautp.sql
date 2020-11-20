-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2020 a las 23:04:16
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbprensautp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actualizar`
--

CREATE TABLE `actualizar` (
  `id_solicitud` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time(6) NOT NULL,
  `hora_final` time(6) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_servicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atiende`
--

CREATE TABLE `atiende` (
  `id_servicio` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `cod_tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `activacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cedula`, `correo`, `nombre`, `apellido`, `contrasena`, `sede`, `hash`, `activacion`) VALUES
(14, '123', 'Javi0199@hotmail.com', 'Javier', 'Arrue', '202cb962ac59075b964b07152d234b70', 'Centro Regional de Panamá Oeste', 'cb41f167917ec4b8d870a90c54afef7d', 0),
(15, '123', 's@gmail.com', 'Camila', 'Ortega', '202cb962ac59075b964b07152d234b70', 'Centro Regional de Veraguas', '416849da96fb73bee793e2bf65ae43ac', 1),
(16, '123', 'armandoutp1@gmail.com', 'Javier', 'Arrue', '202cb962ac59075b964b07152d234b70', 'Centro Regional de Veraguas', 'd073bb8d0c47f317dd39de9c9f004e9d', 1),
(18, '123', 'cesar.ortega@utp.ac.pa', 'Cesar', 'Ortega', '202cb962ac59075b964b07152d234b70', 'Centro Regional de Azuero', '7fc346397dc202259f27edc7d2adec88', 1),
(21, '123', 'armandoutp1@gmail.com@utp.ac.pa', 'Javier', 'Arrue', '202cb962ac59075b964b07152d234b70', 'Centro Regional de Panamá Oeste', 'cb12d7f933e7d102c52231bf62b8a678', 0),
(26, '123', '123@utp.ac.pa', 'prueba', '123', '202cb962ac59075b964b07152d234b70', 'Centro Regional de Panamá Oeste', 'a14ac55a4f27472c5d894ec1c3c743d2', 1),
(27, '123', 'rocio.nanez@utp.ac.pa', 'Rocio ', 'Ñañez', '202cb962ac59075b964b07152d234b70', 'Centro Regional de Panamá Oeste', 'b0ab42fcb7133122b38521d13da7120b', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacionesactualizar`
--

CREATE TABLE `notificacionesactualizar` (
  `id_notificacion` int(11) NOT NULL,
  `mensaje` varchar(100) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notificacionesactualizar`
--

INSERT INTO `notificacionesactualizar` (`id_notificacion`, `mensaje`, `id_cliente`) VALUES
(1, '', 15),
(2, 'Recibido. Solicitud Aceptada.', 15),
(3, 'Dale pues.', 16),
(4, 'Que dices????.', 15),
(5, 'Dale yo te consigo al conejo', 15),
(6, 'nope', 15),
(7, 'Recibido. Cambios realizados.', 15),
(8, 'Rechazado xD.', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` int(11) NOT NULL,
  `tipo_personal` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `sede` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `tipo_personal`, `nombre`, `apellido`, `correo`, `contrasena`, `sede`) VALUES
(1, 'admin', 'Administrador', 'Dicomes', 'dicomes@utp.ac.pa', '202cb962ac59075b964b07152d234b70', 'UTP'),
(2, 'comunicador', 'Comunicador', 'Social', 'comunicador@utp.ac.pa', '202cb962ac59075b964b07152d234b70', 'UTP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id` int(11) NOT NULL,
  `cantidad_personas` int(11) NOT NULL,
  `start` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `tipo_evento` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_personal` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `color` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `cantidad_personas`, `start`, `hora_inicio`, `hora_final`, `ubicacion`, `tipo_evento`, `descripcion`, `estado`, `id_personal`, `id_cliente`, `color`, `title`) VALUES
(1, 100, '2020-11-17', '08:55:41', '08:55:41', 'En la Nacional pues.', 'Publico', 'Camarografos y traeme a Bad bunny tambien loco.', 1, 1, 15, '', ''),
(2, 23, '2020-11-17', '10:06:00', '12:06:00', 'Edificio 3', 'Publico', 'Cambios', 1, 1, 15, '', ''),
(3, 23, '2020-11-17', '08:57:11', '08:57:11', 'El gacebo.', 'Publico', 'Camarografos y Camaras', 1, 1, 16, '', '');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `solicitudactualizar`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `solicitudactualizar` (
`id_cliente` int(11)
,`id` int(11)
,`id_solicitud` int(11)
,`correo` varchar(50)
,`nombre` varchar(50)
,`apellido` varchar(50)
,`a_fecha` date
,`a_hora_inicio` time(6)
,`a_hora_final` time(6)
,`a_ubicacion` varchar(100)
,`a_descripcion` varchar(100)
,`start` date
,`hora_inicio` time
,`hora_final` time
,`ubicacion` varchar(100)
,`descripcion` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `cod_tipo` int(11) NOT NULL,
  `tipo_servicio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura para la vista `solicitudactualizar`
--
DROP TABLE IF EXISTS `solicitudactualizar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `solicitudactualizar`  AS  select `actualizar`.`id_cliente` AS `id_cliente`,`servicio`.`id` AS `id`,`actualizar`.`id_solicitud` AS `id_solicitud`,`cliente`.`correo` AS `correo`,`cliente`.`nombre` AS `nombre`,`cliente`.`apellido` AS `apellido`,`actualizar`.`fecha` AS `a_fecha`,`actualizar`.`hora_inicio` AS `a_hora_inicio`,`actualizar`.`hora_final` AS `a_hora_final`,`actualizar`.`ubicacion` AS `a_ubicacion`,`actualizar`.`descripcion` AS `a_descripcion`,`servicio`.`start` AS `start`,`servicio`.`hora_inicio` AS `hora_inicio`,`servicio`.`hora_final` AS `hora_final`,`servicio`.`ubicacion` AS `ubicacion`,`servicio`.`descripcion` AS `descripcion` from ((`actualizar` join `cliente` on(`actualizar`.`id_cliente` = `cliente`.`id_cliente`)) join `servicio` on(`actualizar`.`id_servicio` = `servicio`.`id`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actualizar`
--
ALTER TABLE `actualizar`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `atiende`
--
ALTER TABLE `atiende`
  ADD PRIMARY KEY (`id_servicio`,`id_personal`),
  ADD KEY `id_personal` (`id_personal`),
  ADD KEY `cod_tipo` (`cod_tipo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `notificacionesactualizar`
--
ALTER TABLE `notificacionesactualizar`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_personal` (`id_personal`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`cod_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actualizar`
--
ALTER TABLE `actualizar`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `notificacionesactualizar`
--
ALTER TABLE `notificacionesactualizar`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `cod_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actualizar`
--
ALTER TABLE `actualizar`
  ADD CONSTRAINT `actualizar_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `actualizar_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id`);

--
-- Filtros para la tabla `atiende`
--
ALTER TABLE `atiende`
  ADD CONSTRAINT `atiende_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id`),
  ADD CONSTRAINT `atiende_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`),
  ADD CONSTRAINT `atiende_ibfk_3` FOREIGN KEY (`cod_tipo`) REFERENCES `tipo_servicio` (`cod_tipo`);

--
-- Filtros para la tabla `notificacionesactualizar`
--
ALTER TABLE `notificacionesactualizar`
  ADD CONSTRAINT `notificacionesactualizar_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`),
  ADD CONSTRAINT `servicio_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
