-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2014 a las 20:12:06
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `minigaleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `idimagen` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  PRIMARY KEY (`idimagen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`idimagen`, `titulo`, `imagen`) VALUES
(1, 'hola', '006.jpg'),
(3, 'ggg', '125.jpg'),
(4, 'linda', '418.jpg'),
(5, 'paisaje', '71.jpg'),
(7, 'montañas', '443.jpg'),
(8, 'guau', 'ComputerDesktopWallpapersCollection842_054.jpg'),
(9, 'hhh', '428.jpg'),
(10, 'Peñasco en el mar', '330.jpg'),
(11, 'chava', '578.jpg'),
(12, 'Campos', '317.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
