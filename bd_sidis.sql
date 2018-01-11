-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2018 a las 17:09:52
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
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_area` char(200) NOT NULL,
  `descripcion_area` char(200) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `nombre_area`, `descripcion_area`, `fecha`) VALUES
(1, 'Direccion de Tecnologia', 'Direccion', '2018-01-11 00:00:00'),
(2, 'Division Sistema', 'Division', '2018-01-11 00:00:00'),
(3, 'Division Proyectos Especiales', 'Division', '2018-01-11 00:00:00'),
(4, 'Division Telematica', 'Division', '2018-01-11 00:00:00');

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
(4, 'Equipos de Computacion', 'Todo lo que tenga que ver con equipos de computaciÃ³n.', '2017-08-08 22:14:01'),
(5, 'Escritorio', 'Mesas', '2018-01-11 00:00:00'),
(10, 'Archivador', 'Archivador', '2018-01-11 00:00:00'),
(6, 'Teclado', 'Teclado', '2018-01-11 00:00:00'),
(11, 'Biblioteca', 'Biblioteca', '2018-01-11 00:00:00'),
(7, 'Monitor', 'Monitor', '2018-01-11 00:00:00'),
(8, 'Mouse', 'Mouse', '2018-01-11 00:00:00'),
(9, 'Impresora', 'Impresora', '2018-01-11 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `id_producto`, `user_id`, `fecha`, `nota`, `referencia`, `cantidad`, `serial`, `codigo_producto`, `nombre_producto`, `precio_producto`, `stock`, `id_categoria`, `numero_de_bien`, `area`, `responsable_entrega`, `concepto_producto`, `condicion_producto`, `asignacion_producto`) VALUES
(1, 9, 254, '2018-01-08 00:00:00', 'Ingreso', 'Tramite', 25, 'cncc', '', '', 0, 0, 0, '', '', '', '', '', ''),
(2, 18, 1, '2018-01-11 16:38:00', 'Arnaldo agregÃ³ 2 producto(s) al inventario', '101', 2, '', '', '', 0, 0, 0, '', '', '', '', '', ''),
(3, 19, 1, '2018-01-11 16:47:45', 'Arnaldo agregÃ³ 1 producto(s) al inventario', '14', 1, '', '', '', 0, 0, 0, '', '', '', '', '', ''),
(4, 20, 1, '2018-01-11 16:55:40', 'Arnaldo agregÃ³ 28 producto(s) al inventario', '172', 28, '', '', '', 0, 0, 0, '', '', '', '', '', ''),
(5, 21, 1, '2018-01-11 16:59:42', 'Arnaldo agregÃ³ 14 producto(s) al inventario', '1025', 14, '', '', '', 0, 0, 0, '', '', '', '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

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
(17, '20021', 'Teclado', '2018-01-05 20:08:09', 100, 38, 5, '', '', '', '', '', '', ''),
(18, '101', 'fgew', '2018-01-11 16:38:00', 58, 2, 3, '', '', '', '', '', '', ''),
(19, '145', 'Estante', '2018-01-11 16:47:45', 175, 1, 3, '', '', '', '', '', '', ''),
(20, '172', 'Modelos', '2018-01-11 16:55:40', 88, 28, 3, '', '', '', '', '', '', ''),
(21, '1025', 'Teclado', '2018-01-11 16:59:42', 852, 14, 6, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rango`
--

CREATE TABLE IF NOT EXISTS `rango` (
  `id_rango` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rango` char(150) NOT NULL,
  `descripcion_rango` char(150) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_rango`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `rango`
--

INSERT INTO `rango` (`id_rango`, `nombre_rango`, `descripcion_rango`, `fecha`) VALUES
(1, 'Asesor Juridico', 'Asesor', '2018-01-10 00:00:00'),
(2, 'Asist. Administrativo I', 'Asistente', '2018-01-10 00:00:00'),
(3, 'Asist. Administrativo II', 'Asistente', '2018-01-10 00:00:00'),
(4, 'Asist. Administrativo III', 'Asistente', '2018-01-10 00:00:00'),
(5, 'Asist. Administrativo IV', 'Asistente', '2018-01-10 00:00:00'),
(6, 'Asist. Administrativo V', 'Asistente', '2018-01-10 00:00:00'),
(7, 'Asist. Administrativo VI', 'Asistente', '2018-01-10 00:00:00'),
(8, 'Asist. Administrativo VII', 'Asistente', '2018-01-10 00:00:00'),
(9, 'Auxiliar Adm. I', 'Auxiliar', '2018-01-10 00:00:00'),
(10, 'Auxiliar Adm. II', 'Auxiliar', '2018-01-10 00:00:00'),
(11, 'Auxiliar Adm. III', 'Auxiliar', '2018-01-10 00:00:00'),
(12, 'Auxiliar Adm. IV', 'Auxiliar', '2018-01-10 00:00:00'),
(13, 'Auxiliar Adm. V', 'Auxiliar', '2018-01-10 00:00:00'),
(14, 'Auxiliar Adm. VI', 'Auxiliar', '2018-01-10 00:00:00'),
(15, 'Auxiliar Adm. VII', 'Auxiliar', '2018-01-10 00:00:00'),
(16, 'Comisario', 'Comisario', '2018-01-10 00:00:00'),
(17, 'Comisario General', 'Comisario', '2018-01-10 00:00:00'),
(18, 'Comisario Jefe', 'Comisario', '2018-01-10 00:00:00'),
(19, 'Detective', 'Detective', '2018-01-10 00:00:00'),
(20, 'Detective Agregado', 'Detective', '2018-01-10 00:00:00'),
(21, 'Detective Jefe', 'Detective', '2018-01-10 00:00:00'),
(22, 'Director General Nacional', 'Director', '2018-01-10 00:00:00'),
(23, 'Experto Profesional I', 'Experto', '2018-01-10 00:00:00'),
(24, 'Experto Profesional II', 'Experto', '2018-01-10 00:00:00'),
(25, 'Experto Profesional III', 'Experto', '2018-01-10 00:00:00'),
(26, 'Experto Profesional IV', 'Experto', '2018-01-10 00:00:00'),
(27, 'Experto Tecnico I', 'Experto', '2018-01-10 00:00:00'),
(28, 'Experto Tecnico II', 'Experto', '2018-01-10 00:00:00'),
(29, 'Experto Tecnico III', 'Experto', '2018-01-10 00:00:00'),
(30, 'Experto Tecnico IV', 'Experto', '2018-01-10 00:00:00'),
(31, 'Experto Tecnico V', 'Experto', '2018-01-10 00:00:00'),
(32, 'Experto Tecnico VI', 'Experto', '2018-01-10 00:00:00'),
(33, 'Experto Tecnico VII', 'Experto', '2018-01-10 00:00:00'),
(34, 'Inspector', 'Inspector', '2018-01-10 00:00:00'),
(35, 'Inspector Agregado', 'Inspector', '2018-01-10 00:00:00'),
(36, 'Inspector General', 'Inspector', '2018-01-10 00:00:00'),
(37, 'Inspector Jefe', 'Inspector', '2018-01-10 00:00:00'),
(38, 'Sub-Director', 'Sub', '2018-01-10 00:00:00');

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
