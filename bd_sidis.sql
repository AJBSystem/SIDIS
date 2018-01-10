-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-01-2018 a las 14:59:53
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_sidis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(255) NOT NULL,
  `descripcion_categoria` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`, `date_added`) VALUES
(1, 'Repuestos', 'Equipos para el hogar', '2016-12-19 00:00:00'),
(2, 'Equipos', 'Equipos stihl', '2016-12-19 21:06:37'),
(3, 'Accesorios', 'Accesorios stihl', '2016-12-19 21:06:39'),
(4, 'Equipos de ComputaciÃ³n', 'Todo lo que tenga que ver con equipos de computaciÃ³n.', '2017-08-08 22:14:01'),
(5, 'Mobiliario', 'Todo lo relacionado con muebles, mesas, sillas, escritorios, arturitos', '2017-08-08 22:31:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
  `id_historial` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `nota` varchar(255) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `serial` char(40) NOT NULL,
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `precio_producto` double NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `numero_de_bien` varchar(30) NOT NULL,
  `area` char(50) NOT NULL,
  `responsable_entrega` char(50) NOT NULL,
  `concepto_producto` char(50) NOT NULL,
  `condicion_producto` char(50) NOT NULL,
  `asignacion_producto` char(50) NOT NULL,
  PRIMARY KEY (`id_historial`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `id_producto`, `user_id`, `fecha`, `nota`, `referencia`, `cantidad`, `serial`, `codigo_producto`, `nombre_producto`, `precio_producto`, `stock`, `id_categoria`, `numero_de_bien`, `area`, `responsable_entrega`, `concepto_producto`, `condicion_producto`, `asignacion_producto`) VALUES
(1, 9, 254, '2018-01-08 00:00:00', 'Ingreso', 'Tramite', 25, 'cncc', '', '', 0, 0, 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_producto` char(20) NOT NULL,
  `nombre_producto` char(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `precio_producto` double NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `descripcion_producto` char(200) NOT NULL,
  `serial` char(40) NOT NULL,
  `numero_de_bien` varchar(30) NOT NULL,
  `area` char(50) NOT NULL,
  `responsable_entrega` char(50) NOT NULL,
  `concepto_producto` char(50) NOT NULL,
  `condicion_producto` char(50) NOT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `codigo_producto` (`codigo_producto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_producto`, `codigo_producto`, `nombre_producto`, `date_added`, `precio_producto`, `stock`, `id_categoria`, `descripcion_producto`, `serial`, `numero_de_bien`, `area`, `responsable_entrega`, `concepto_producto`, `condicion_producto`) VALUES
(7, '100', 'Impresoras', '2017-12-05 20:38:34', 110, 12, 10, 'Impresora HP', 'CNCC76F03M', '78', 'Division de sistema', 'Darly martinez', 'Sustitucion', 'Regular estado de uso'),
(8, '200', 'Computadores', '2017-12-05 20:40:09', 115, 400, 10, '', '', '', '', '', '', ''),
(9, '300', 'Modem', '2017-12-05 20:40:32', 95, 100, 10, '', '', '', '', '', '', ''),
(10, '400', 'Router', '2017-12-05 20:40:49', 76, 27, 10, '', '', '', '', '', '', ''),
(11, '600', 'Monitor Pantalla Plana', '2017-12-05 20:42:23', 250, 300, 10, '', '', '', '', '', '', ''),
(12, '700', 'Computador All in one', '2017-12-05 20:42:46', 300, 250, 10, '', '', '', '', '', '', ''),
(13, '800', 'Servidores', '2017-12-06 20:30:45', 100, 2, 10, '', '', '', '', '', '', ''),
(14, '1000', 'Escritorio Aereo', '2017-12-06 21:20:21', 50, 1485, 11, '', '', '', '', '', '', ''),
(17, '20021', 'Teclado', '2018-01-05 20:08:09', 100, 38, 5, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`) VALUES
(1, 'Arnaldo', 'Bonillo', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'admin@admin.com', '2016-12-19 15:06:00'),
(2, 'Arnaldo Jose', 'Bonillo Berrios', 'abonillo', '$2y$10$4NQnYuZoUm3FRqoufH1In.h2zupHBKvu6knymLgzJ7J3EV8Hl46Ke', 'abonillo@cicpc.gob.ve', '2017-07-26 21:42:12');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `products` (`id_producto`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
