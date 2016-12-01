-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2016 a las 17:51:20
-- Versión del servidor: 5.7.9
-- Versión de PHP: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sysreserva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendar_events`
--

DROP TABLE IF EXISTS `calendar_events`;
CREATE TABLE IF NOT EXISTS `calendar_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `precio_actual` float NOT NULL,
  `precio_total` float NOT NULL,
  `cod_equipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calendar_events`
--

INSERT INTO `calendar_events` (`id`, `descripcion`, `fecha_inicio`, `fecha_fin`, `precio_actual`, `precio_total`, `cod_equipo`) VALUES
(1, 'hello world', '2015-02-19 08:00:00', '2015-02-19 23:00:00', 0, 0, 1),
(2, 'lorem ipsum dolor sit amet', '2015-02-25 12:15:00', '2015-02-25 21:30:00', 0, 0, 1),
(3, 'otro evento cualquiera', '2015-02-14 09:00:00', '2015-02-14 12:00:00', 0, 0, 1),
(4, 'nombre evento', '2015-02-19 07:00:00', '2015-02-19 08:00:00', 0, 0, 1),
(5, 'hola', '2016-09-03 08:00:00', '2016-09-03 23:00:00', 0, 0, 1),
(6, 'uno', '2016-09-13 08:00:00', '2016-09-13 23:00:00', 0, 0, 1),
(8, 'HOLA', '2016-10-05 08:00:00', '2016-10-05 23:00:00', 15, 2000, 1),
(9, 'ghdfhy', '2016-10-06 08:00:00', '2016-10-06 23:00:00', 0, 0, 1),
(10, 'ghdfhy', '2016-10-06 08:00:00', '2016-10-06 23:00:00', 0, 0, 1),
(11, 'asdasd', '2016-10-07 08:00:00', '2016-10-07 23:00:00', 0, 0, 1),
(12, 'otro gato', '2016-10-08 08:00:00', '2016-10-08 23:00:00', 0, 0, 1),
(23, 'asa', '2016-10-09 08:00:00', '2016-10-09 23:00:00', 0, 0, 1),
(24, 'asa', '2016-10-09 08:00:00', '2016-10-09 23:00:00', 0, 0, 1),
(25, 'prueba', '2016-10-04 08:00:00', '2016-10-04 23:00:00', 1, 32008, 1),
(26, 'prueba', '2016-10-04 08:00:00', '2016-10-04 23:00:00', 1, 32008, 1),
(27, 'otra prueba', '2016-10-03 08:00:00', '2016-10-03 23:00:00', 3200, 3200, 1),
(30, 'Combo 3', '2016-10-02 08:00:00', '2016-10-02 23:00:00', 200, 3200, 1),
(31, 'pagado', '2016-10-01 08:00:00', '2016-10-01 23:00:00', 3200, 3200, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `tel`) VALUES
(1, 'Kevin', '3743456328'),
(2, 'Juan', '376415445567');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
