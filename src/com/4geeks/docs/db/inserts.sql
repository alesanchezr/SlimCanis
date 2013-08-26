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
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id`, `reservacion_id`, `equipo_id`, `socio_id`, `cadi_id`, `hoyo`, `fecha_asignada`, `fecha_inicio`, `fecha_fin`, `estatus`, `editado_por`, `createdate`, `updatedate`) VALUES
(1, 20, 1, 1, NULL, 1, '2013-08-21 08:20:00', NULL, NULL, 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-21 00:13:24'),
(2, 21, 2, 2, NULL, 10, '2013-08-21 09:20:00', NULL, NULL, 'pendiente', NULL, '2009-03-10 05:31:01', '2013-08-21 00:13:24');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `cadi`
--

INSERT INTO `cadi` (`id`, `nombre`, `cedula`, `telefono`, `createdate`, `updatedate`) VALUES
(1, 'Jhonny Caputo', 15130932, '04243738484', '2009-03-10 05:31:01', '2013-08-21 00:14:44'),
(2, 'Henry Pulido', 19324658, '04162138238', '2009-03-10 05:31:01', '2013-08-21 00:14:44');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id`, `socio_id`, `handicap_promedio`, `createdate`, `updatedate`) VALUES
(1, 1, 10, '2009-03-10 05:31:01', '2013-08-20 23:45:42'),
(2, 2, 14, '2009-03-10 05:31:01', '2013-08-20 23:45:48');

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `fecha_ocupada`
--

INSERT INTO `fecha_ocupada` (`id`, `fecha_inicio`, `fecha_fin`, `motivo`, `editado_por`, `createdate`, `updatedate`) VALUES
(1, '2013-08-22 10:00:00', '2013-08-22 15:00:00', 'Hay un torneito de Mini Golf', NULL, '2009-03-10 05:31:01', '2013-08-21 00:04:43'),
(2, '2013-08-23 09:30:00', '2013-08-23 18:30:00', 'Torneo Master', NULL, '2009-03-10 05:31:01', '2013-08-21 00:04:43');

-- --------------------------------------------------------

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
-- Volcado de datos para la tabla `invitacion`
--

INSERT INTO `invitacion` (`invitado_id`, `asignacion_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `invitado`
--

INSERT INTO `invitado` (`id`, `nombre`, `cedula`, `email`, `telefono`, `handicap`, `createdate`, `updatedate`) VALUES
(1, 'Isaac Casado', 2139823, 'icasado@4geeks.co', '04125845469', 21, '2009-03-10 05:31:01', '2013-08-20 23:44:01');

-- --------------------------------------------------------

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
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(2, 'admin'),
(3, 'socio'),
(1, 'superadmin');

-- --------------------------------------------------------

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
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role_id`, `email`, `createdate`, `updatedate`) VALUES
(1, '1111', '25d55ad283aa400af464c76d713c07ad', 3, 'mgomez@4geeks.co', '2009-03-10 05:31:01', '2013-08-20 23:30:11'),
(2, '2222', '25d55ad283aa400af464c76d713c07ad', 3, 'rramos@4geeks.co', '2009-03-10 05:31:01', '2013-08-20 23:30:11'),
(3, '3333', '25d55ad283aa400af464c76d713c07ad', 3, 'icordoba@4geeks.co', '2009-03-10 05:31:01', '2013-08-20 23:34:41'),
(4, '4444', '25d55ad283aa400af464c76d713c07ad', 3, 'a@4geeks.co', '2009-03-10 05:31:01', '2013-08-20 23:34:52');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
