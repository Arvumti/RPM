-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-05-2014 a las 19:38:26
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_rpm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carros`
--

CREATE TABLE IF NOT EXISTS `carros` (
  `idCarro` int(11) NOT NULL AUTO_INCREMENT,
  `dirImg` varchar(500) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `tipo` varchar(11) DEFAULT NULL,
  `modelo` int(11) DEFAULT NULL,
  `killit` decimal(18,2) DEFAULT NULL,
  `kilometraje` decimal(18,2) DEFAULT NULL,
  `precio` decimal(18,2) DEFAULT NULL,
  `activo` int(1) DEFAULT '1',
  `detalles` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idCarro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `carros`
--

INSERT INTO `carros` (`idCarro`, `dirImg`, `nombre`, `tipo`, `modelo`, `killit`, `kilometraje`, `precio`, `detalles`,`activo`) VALUES
(1, '1.jpg', 'Merdeces Benz', 'SUV', 2013, 100.00, 0.00, 90000.00, 'A/C, Piel, MP3, Quemacocos ', 1),
(2, '2.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1),
(3, '3.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1),
(4, '4.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1),
(5, '5.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1),
(6, '6.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1),
(7, '7.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1),
(8, '8.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1),
(9, '9.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1),
(10, '10.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1),
(11, '11.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1),
(12, '12.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1),
(13, '13.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1),
(14, '14.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1),
(15, '15.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1),
(16, '16.jpg', NULL, NULL, NULL, NULL, NULL, NULL,NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
