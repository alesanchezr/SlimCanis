-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-08-2013 a las 19:49:35
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.3.10-1ubuntu3.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE IF NOT EXISTS `asignacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservacion_id` int(11) NOT NULL COMMENT '	',
  `equipo_id` int(11) NOT NULL,
  `socio_id` int(11) NOT NULL,
  `cadi_id` int(11) DEFAULT NULL,
  `hoyo` tinyint(4) NOT NULL,
  `fecha_asignada` datetime NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `estatus` varchar(20) NOT NULL,
  `editado_por` varchar(45) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT '2009-03-10 05:31:01',
  `updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reservacion_id_UNIQUE` (`reservacion_id`),
  KEY `fk_asignacion_cadi_idx` (`cadi_id`),
  KEY `fk_asignacion_equipo_idx` (`equipo_id`),
  KEY `fk_asignacion_socio_idx` (`socio_id`),
  KEY `index_fecha_asignada` (`fecha_asignada`),
  KEY `index_estatus` (`estatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id`, `reservacion_id`, `equipo_id`, `socio_id`, `cadi_id`, `hoyo`, `fecha_asignada`, `fecha_inicio`, `fecha_fin`, `estatus`, `editado_por`, `createdate`, `updatedate`) VALUES
(1, 20, 1, 1, NULL, 1, '2013-08-21 08:20:00', NULL, NULL, 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-21 00:13:24'),
(2, 21, 2, 2, NULL, 10, '2013-08-21 09:20:00', NULL, NULL, 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-21 00:13:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cadi`
--

CREATE TABLE IF NOT EXISTS `cadi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `cedula` int(11) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT '2009-03-10 05:31:01',
  `updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula_UNIQUE` (`cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cadi`
--

INSERT INTO `cadi` (`id`, `nombre`, `cedula`, `telefono`, `createdate`, `updatedate`) VALUES
(1, 'Jhonny Caputo', 15130932, '04243738484', '2009-03-10 05:31:01', '2013-08-21 00:14:44'),
(2, 'Henry Pulido', 19324658, '04162138238', '2009-03-10 05:31:01', '2013-08-21 00:14:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `socio_id` int(11) NOT NULL,
  `handicap_promedio` smallint(6) NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT '2009-03-10 05:31:01',
  `updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_equipo_socio_idx` (`socio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id`, `socio_id`, `handicap_promedio`, `createdate`, `updatedate`) VALUES
(1, 1, 10, '2009-03-10 05:31:01', '2013-08-20 23:45:42'),
(2, 2, 14, '2009-03-10 05:31:01', '2013-08-20 23:45:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_ocupada`
--

CREATE TABLE IF NOT EXISTS `fecha_ocupada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `editado_por` varchar(45) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT '2009-03-10 05:31:01',
  `updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `fecha_ocupada`
--

INSERT INTO `fecha_ocupada` (`id`, `fecha_inicio`, `fecha_fin`, `motivo`, `editado_por`, `createdate`, `updatedate`) VALUES
(1, '2013-08-22 10:00:00', '2013-08-22 15:00:00', 'Hay un torneito de Mini Golf', NULL, '2009-03-10 05:31:01', '2013-08-21 00:04:43'),
(2, '2013-08-23 09:30:00', '2013-08-23 18:30:00', 'Torneo Master', NULL, '2009-03-10 05:31:01', '2013-08-21 00:04:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrante`
--

CREATE TABLE IF NOT EXISTS `integrante` (
  `equipo_id` int(11) NOT NULL,
  `socio_id` int(11) DEFAULT NULL,
  `invitado_id` int(11) DEFAULT NULL,
  KEY `fk_integrantes_equipo_idx` (`equipo_id`),
  KEY `fk_integrantes_socio_idx` (`socio_id`),
  KEY `fk_integrantes_invitado_idx` (`invitado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `integrante`
--

INSERT INTO `integrante` (`equipo_id`, `socio_id`, `invitado_id`) VALUES
(1, 2, NULL),
(1, 3, NULL),
(1, 4, NULL),
(2, 1, NULL),
(2, 3, NULL),
(2, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitacion`
--

CREATE TABLE IF NOT EXISTS `invitacion` (
  `invitado_id` int(11) NOT NULL,
  `asignacion_id` int(11) NOT NULL,
  KEY `fk_invitaciones_invitado_idx` (`invitado_id`),
  KEY `fk_invitaciones_asignacion_idx` (`asignacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invitacion`
--

INSERT INTO `invitacion` (`invitado_id`, `asignacion_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitado`
--

CREATE TABLE IF NOT EXISTS `invitado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `cedula` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `handicap` smallint(6) NOT NULL,
  `createdate` timestamp NULL DEFAULT '2009-03-10 05:31:01',
  `updatedate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `cedula_UNIQUE` (`cedula`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `invitado`
--

INSERT INTO `invitado` (`id`, `nombre`, `cedula`, `email`, `telefono`, `handicap`, `createdate`, `updatedate`) VALUES
(1, 'Isaac Casado', 2139823, 'icasado@4geeks.co', '04125845469', 21, '2009-03-10 05:31:01', '2013-08-20 23:44:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE IF NOT EXISTS `reservacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `socio_id` int(11) NOT NULL,
  `equipo_id` int(11) NOT NULL,
  `fecha_solicitada` datetime NOT NULL,
  `estatus` varchar(25) NOT NULL,
  `editado_por` varchar(45) DEFAULT NULL,
  `createdate` timestamp NOT NULL DEFAULT '2009-03-10 05:31:01',
  `updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_reservacion_socio_idx` (`socio_id`),
  KEY `fk_reservacion_equipo_idx` (`equipo_id`),
  KEY `index_estatus` (`estatus`),
  KEY `index_fecha_solicitada` (`fecha_solicitada`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`id`, `socio_id`, `equipo_id`, `fecha_solicitada`, `estatus`, `editado_por`, `createdate`, `updatedate`) VALUES
(1, 1, 1, '2013-08-22 08:20:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:47:23'),
(2, 1, 1, '2013-08-22 06:30:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:48:06'),
(3, 1, 1, '2013-08-22 07:00:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:48:06'),
(4, 1, 1, '2013-08-22 07:20:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:48:56'),
(5, 1, 1, '2013-08-22 08:10:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:48:56'),
(6, 1, 1, '2013-08-22 09:20:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:52:51'),
(7, 1, 1, '2013-08-22 08:50:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:52:51'),
(8, 2, 2, '2013-08-22 08:20:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:54:04'),
(9, 2, 2, '2013-08-22 06:00:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:54:04'),
(10, 2, 2, '2013-08-22 06:30:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:54:42'),
(11, 2, 2, '2013-08-22 07:20:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:54:42'),
(12, 2, 2, '2013-08-23 07:20:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:56:07'),
(13, 2, 2, '2013-08-23 07:00:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:56:07'),
(14, 2, 2, '2013-08-23 09:20:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:56:44'),
(15, 2, 2, '2013-08-23 06:50:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:57:28'),
(16, 1, 1, '2013-08-23 08:20:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-20 23:59:36'),
(17, 1, 1, '2013-08-23 09:20:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-21 00:01:56'),
(18, 1, 1, '2013-08-23 07:40:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-21 00:00:36'),
(19, 1, 1, '2013-08-23 06:40:00', 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-21 00:02:01'),
(20, 1, 1, '2013-08-21 08:20:00', 'asignada', NULL, '2009-03-10 05:31:01', '2013-08-21 00:06:31'),
(21, 2, 2, '2013-08-21 08:20:00', 'rechazada', NULL, '2009-03-10 05:31:01', '2013-08-21 00:06:31'),
(22, 2, 2, '2013-08-21 09:20:00', 'asignada', NULL, '2009-03-10 05:31:01', '2013-08-21 00:12:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(2, 'admin'),
(3, 'socio'),
(1, 'superadmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio`
--

CREATE TABLE IF NOT EXISTS `socio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cedula` int(11) NOT NULL,
  `numero_socio` varchar(20) NOT NULL,
  `handicap` smallint(6) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `createdate` timestamp NULL DEFAULT '2009-03-10 05:31:01',
  `updatedate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula_UNIQUE` (`cedula`),
  UNIQUE KEY `numero_socio_UNIQUE` (`numero_socio`),
  KEY `fk_socio_user_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `socio`
--

INSERT INTO `socio` (`id`, `user_id`, `nombre`, `cedula`, `numero_socio`, `handicap`, `telefono`, `createdate`, `updatedate`) VALUES
(1, 1, 'Marco Gómez', 18313357, '1111', 10, '04125845469', '2009-03-10 05:31:01', '2013-08-20 23:37:57'),
(2, 2, 'Romer Ramos', 564534, '2222', 8, '04125845469', '2009-03-10 05:31:01', '2013-08-20 23:37:57'),
(3, 3, 'Ignacio Cordoba', 1234359, '3333', 12, '04125845469', '2009-03-10 05:31:01', '2013-08-20 23:39:25'),
(4, 4, 'Alejandro Sanchez', 8347928, '4444', 8, '04125845469', '2009-03-10 05:31:01', '2013-08-20 23:39:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `createdate` timestamp NULL DEFAULT '2009-03-10 05:31:01',
  `updatedate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_user_1_idx` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role_id`, `email`, `createdate`, `updatedate`) VALUES
(1, '1111', '25d55ad283aa400af464c76d713c07ad', 3, 'mgomez@4geeks.co', '2009-03-10 05:31:01', '2013-08-20 23:30:11'),
(2, '2222', '25d55ad283aa400af464c76d713c07ad', 3, 'rramos@4geeks.co', '2009-03-10 05:31:01', '2013-08-20 23:30:11'),
(3, '3333', '25d55ad283aa400af464c76d713c07ad', 3, 'icordoba@4geeks.co', '2009-03-10 05:31:01', '2013-08-20 23:34:41'),
(4, '4444', '25d55ad283aa400af464c76d713c07ad', 3, 'a@4geeks.co', '2009-03-10 05:31:01', '2013-08-20 23:34:52');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD CONSTRAINT `fk_asignacion_reservacion` FOREIGN KEY (`reservacion_id`) REFERENCES `reservacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignacion_cadi` FOREIGN KEY (`cadi_id`) REFERENCES `cadi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignacion_equipo` FOREIGN KEY (`equipo_id`) REFERENCES `equipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asignacion_socio` FOREIGN KEY (`socio_id`) REFERENCES `socio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `fk_equipo_socio` FOREIGN KEY (`socio_id`) REFERENCES `socio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `integrante`
--
ALTER TABLE `integrante`
  ADD CONSTRAINT `fk_integrantes_equipo` FOREIGN KEY (`equipo_id`) REFERENCES `equipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_integrantes_socio` FOREIGN KEY (`socio_id`) REFERENCES `socio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_integrantes_invitado` FOREIGN KEY (`invitado_id`) REFERENCES `invitado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `invitacion`
--
ALTER TABLE `invitacion`
  ADD CONSTRAINT `fk_invitaciones_invitado` FOREIGN KEY (`invitado_id`) REFERENCES `invitado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invitaciones_asignacion` FOREIGN KEY (`asignacion_id`) REFERENCES `asignacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `fk_reservacion_socio` FOREIGN KEY (`socio_id`) REFERENCES `socio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reservacion_equipo` FOREIGN KEY (`equipo_id`) REFERENCES `equipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `socio`
--
ALTER TABLE `socio`
  ADD CONSTRAINT `fk_socio_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
