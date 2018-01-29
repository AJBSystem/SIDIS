-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-01-2018 a las 11:29:49
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sidis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` int(11) NOT NULL,
  `nombre_area` char(200) NOT NULL,
  `descripcion_area` char(200) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `nombre_area`, `descripcion_area`, `fecha`) VALUES
(1, 'Direccion de Tecnologia', 'Direccion', '2018-01-11 00:00:00'),
(2, 'Division Sistema', 'Division', '2018-01-11 00:00:00'),
(3, 'Division Proyectos Especiales', 'Division', '2018-01-11 00:00:00'),
(4, 'Division Telematica', 'Division', '2018-01-11 00:00:00'),
(5, 'Division Base de Datos', 'Division', '2018-01-12 00:00:00'),
(6, 'Division Administracion de Operaciones', 'Division', '2018-01-10 00:00:00'),
(7, 'Afis', 'Afis', '2018-01-12 00:00:00'),
(8, 'Soporte Operativo', 'Soporte', '2018-01-12 00:00:00'),
(9, 'Seguridad de Datos', 'Seguridad', '2018-01-12 00:00:00'),
(10, 'Grupo de Guarida', 'Guardia', '2018-01-12 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` char(200) NOT NULL,
  `descripcion_cargo` char(200) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre_cargo`, `descripcion_cargo`, `fecha`) VALUES
(1, 'Agente de Seguridad I', 'Agente', '2018-01-18 00:00:00'),
(2, 'Agente de Seguridad II', 'Agente', '2018-01-18 00:00:00'),
(3, 'Experto Profesional Especialista I', 'Experto', '2018-01-18 00:00:00'),
(4, 'Experto Profesional Especialista II', 'Experto', '2018-01-18 00:00:00'),
(5, 'Experto Profesional Especialista III', 'Experto', '2018-01-18 00:00:00'),
(6, 'Asesor Juridico General', 'Asesor', '2018-01-18 00:00:00'),
(7, 'Secretario General', 'Secretario', '2018-01-18 00:00:00'),
(8, 'Sub Director General', 'Director', '2018-01-18 00:00:00'),
(9, 'Supervisor De Los Servicios', 'Supervisor', '2018-01-18 00:00:00'),
(10, 'Jefe De Area', 'Jefe', '2018-01-18 00:00:00'),
(11, 'Supervisor De Investigaciones', 'Supervisor', '2018-01-18 00:00:00'),
(12, 'Jefe De Inspectoria', 'Jefe', '2018-01-18 00:00:00'),
(13, 'Jefe De Departamento', 'Jefe', '2018-01-18 00:00:00'),
(14, 'Jefe De Investigaciones', 'Jefe', '2018-01-18 00:00:00'),
(15, 'Jefe De Division', 'Jefe', '2018-01-18 00:00:00'),
(16, 'Jefe De Escolta', 'Jefe', '2018-01-18 00:00:00'),
(17, 'Supervisor De Sub Delegaciones', 'Supervisor', '2018-01-18 00:00:00'),
(18, 'Director De Investigaciones', 'Director', '2018-01-18 00:00:00'),
(19, 'Jefe De Delegacion', 'Jefe', '2018-01-18 00:00:00'),
(20, 'Jefe De Sub Delegacion', 'Jefe', '2018-01-18 00:00:00'),
(21, 'Director', 'Director', '2018-01-18 00:00:00'),
(22, 'Adjunto', 'Adjunto', '2018-01-18 00:00:00'),
(23, 'Supervisor', 'Supervisor', '2018-01-18 00:00:00'),
(24, 'Jefe Del Eje', 'Jefe Del Eje', '2018-01-18 00:00:00'),
(25, 'Secretario General Nacional', 'Secretario', '2018-01-18 00:00:00'),
(26, 'Jefe De Bloque', 'Jefe', '2018-01-18 00:00:00'),
(27, 'Miembro Principal Consejo Disciplinario', 'Miembro', '2018-01-18 00:00:00'),
(28, 'Supervisor De Region', 'Supervisor', '2018-01-18 00:00:00'),
(29, 'Secretario Principal Consejo Disciplinario', 'Secretario', '2018-01-18 00:00:00'),
(30, 'Miembro Principal  Comision Permanente Evaluacion Y Seguim', 'Miembro', '2018-01-18 00:00:00'),
(31, 'No Aplica', 'No Aplica', '2018-01-22 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` char(200) NOT NULL,
  `descripcion_categoria` char(200) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `descripcion_categoria`, `fecha`) VALUES
(151, 'Acondicionadores', 'Aires', '2018-01-26 19:27:39'),
(2, 'Archivador', 'Archivadores', '2018-01-12 00:00:00'),
(3, 'Aspiradoras', 'Limpieza', '2018-01-12 00:00:00'),
(4, 'Balanzas', 'Balanzas', '2018-01-12 00:00:00'),
(5, 'Bancos', 'Asientos', '2018-01-12 00:00:00'),
(27, 'Bibliotecas', 'Bibliotecas\r\n', '2018-01-12 19:29:55'),
(26, 'Banderas Nacionales', 'Banderas', '2018-01-12 19:28:36'),
(29, 'Butacas', 'Butacas\r\n', '2018-01-12 19:30:39'),
(30, 'Cafeteras', 'Cafeteras', '2018-01-12 19:30:52'),
(31, 'Cajas Fuertes', 'Cajas', '2018-01-12 19:31:03'),
(32, 'Calculadoras', 'Calculadoras', '2018-01-12 19:31:18'),
(33, 'Camas', 'Camas', '2018-01-12 19:31:25'),
(34, 'Camaras', 'Camaras', '2018-01-12 19:31:38'),
(35, 'Carretillas', 'Carretillas', '2018-01-12 19:31:48'),
(36, 'Carteleras', 'Carteleras', '2018-01-12 19:31:56'),
(37, 'Centrales', 'Centrales', '2018-01-12 19:32:05'),
(39, 'Cintas', 'Cintas', '2018-01-12 19:32:30'),
(40, 'Cocinas', 'Cocinas', '2018-01-12 19:32:38'),
(41, 'Congeladoras', 'Congeladoras', '2018-01-12 19:32:50'),
(42, 'Conservadoras', 'Conservadoras', '2018-01-12 19:32:59'),
(43, 'Copiadoras Fotograficas', 'Copiadoras Fotograficas', '2018-01-12 19:33:13'),
(44, 'Cornetas', 'Multimedia', '2018-01-12 19:33:27'),
(45, 'C.P.U', 'Unidad Central De Procesos', '2018-01-12 19:33:46'),
(46, 'Cuadros', 'Cuadros', '2018-01-12 19:33:57'),
(47, 'Discos', 'Discos', '2018-01-12 19:34:07'),
(48, 'Diskette', 'Diskette', '2018-01-12 19:34:15'),
(49, 'Divanes', 'Divanes', '2018-01-12 19:34:23'),
(50, 'Editoras Para PelÃ­culas Fotograficas', 'Editoras', '2018-01-12 19:34:45'),
(51, 'Escritorios', 'Escritorios', '2018-01-12 19:34:52'),
(52, 'Estantes', 'Estantes', '2018-01-12 19:35:01'),
(53, 'Escaleras PortÃ¡tiles', 'Escaleras', '2018-01-12 19:35:12'),
(54, 'Escaparates', 'Escaparates', '2018-01-12 19:35:22'),
(55, 'Escudos Nacionales', 'Escudos', '2018-01-12 19:35:34'),
(56, 'Enfriadores De Agua', 'Enfriadores', '2018-01-12 19:35:46'),
(57, 'Escopetas', 'Escopetas', '2018-01-12 19:36:50'),
(58, 'Equipos', 'Equipos', '2018-01-12 19:36:58'),
(59, 'Equipos De ComunicaciÃ³n Interna', 'Equipos De ComunicaciÃ³n Interna', '2018-01-12 19:37:06'),
(60, 'Equipos De Deporte', 'Equipos De Deporte', '2018-01-12 19:37:13'),
(61, 'Equipos Instructivos', 'Equipos Instructivos', '2018-01-12 19:37:22'),
(62, 'Equipos Para Gimnasia Y Parques Recreativos', 'Equipos Para Gimnasia Y Parques Recreativos', '2018-01-12 19:37:35'),
(63, 'Extintores De Incendio', 'Extintores De Incendio', '2018-01-12 19:37:49'),
(64, 'Filtros De Agua', 'Filtros', '2018-01-12 19:37:58'),
(65, 'Filmadoras', 'Filmadoras', '2018-01-12 19:38:05'),
(66, 'Flash FotogrÃ¡fico', 'Flash FotogrÃ¡fico', '2018-01-12 19:38:11'),
(67, 'Fotocopiadoras', 'Fotocopiadoras', '2018-01-12 19:38:19'),
(68, 'Fusiles', 'Fusiles', '2018-01-12 19:38:26'),
(69, 'Grabadores De Sonido', 'Grabadores De Sonido', '2018-01-12 19:38:35'),
(70, 'Guillotinas Para Papel', 'Guillotinas', '2018-01-12 19:38:48'),
(71, 'Impresora', 'Impresora', '2018-01-12 19:38:58'),
(72, 'Licuadoras', 'Licuadoras', '2018-01-12 19:39:08'),
(73, 'LitografÃ­as Montadas En Marcos', 'LitografÃ­as', '2018-01-12 19:39:21'),
(74, 'Marmitas', 'Marmitas', '2018-01-12 19:39:29'),
(75, 'MegÃ¡fonos', 'MegÃ¡fonos', '2018-01-12 19:39:35'),
(76, 'Mesas', 'Mesas', '2018-01-12 19:39:41'),
(77, 'MicrÃ³fono', 'MicrÃ³fono', '2018-01-12 19:39:52'),
(78, 'Microondas', 'Microondas', '2018-01-12 19:40:00'),
(79, 'Monitor', 'Monitor', '2018-01-12 19:40:09'),
(80, 'Mouse', 'Mouse', '2018-01-12 19:40:17'),
(81, 'Neveras', 'Neveras', '2018-01-12 19:40:26'),
(82, 'Pantallas', 'Pantallas', '2018-01-12 19:40:36'),
(83, 'Pistolas', 'Armas\r\n', '2018-01-12 19:40:44'),
(84, 'Pizarrones', 'Pizarrones', '2018-01-12 19:40:51'),
(85, 'Plantas', 'Plantas', '2018-01-12 19:40:58'),
(86, 'Poltronas', 'Poltronas', '2018-01-12 19:41:06'),
(87, 'Protectores', 'Protectores', '2018-01-12 19:41:18'),
(88, 'Pulidoras', 'Pulidoras', '2018-01-12 19:41:27'),
(89, 'Receptores Radio ElÃ©ctricos', 'Receptores Radio ElÃ©ctricos', '2018-01-12 19:41:35'),
(90, 'Rectificadores De Corriente', 'Rectificadores', '2018-01-12 19:41:46'),
(91, 'Router', 'Router', '2018-01-12 19:41:54'),
(92, 'Repuesto', 'Repuesto', '2018-01-12 19:42:00'),
(130, 'Armas', 'Armas\r\n', '2018-01-22 15:26:20'),
(94, 'Relojes', 'Relojes', '2018-01-12 19:42:10'),
(95, 'Revolver', 'Revolver', '2018-01-12 19:42:16'),
(96, 'Saca-Puntas', 'Saca-Puntas', '2018-01-12 19:42:24'),
(97, 'Servidor', 'Servidor', '2018-01-12 19:42:33'),
(98, 'Sillas', 'Sillas', '2018-01-12 19:43:50'),
(99, 'Sofas', 'Sofas', '2018-01-12 19:44:10'),
(100, 'Sub-Ametralladoras', 'Sub-Ametralladoras', '2018-01-12 19:44:32'),
(129, 'Ametralladoras', 'Armas', '2018-01-22 15:07:57'),
(102, 'Taburetes', 'Taburetes', '2018-01-12 19:44:46'),
(103, 'Teclado', 'Teclado', '2018-01-12 19:44:53'),
(104, 'TelÃ©fonos', 'TelÃ©fonos', '2018-01-12 19:45:00'),
(105, 'Televisores', 'Televisores', '2018-01-12 19:45:08'),
(106, 'TensiÃ³metros', 'TensiÃ³metros', '2018-01-12 19:45:17'),
(107, 'Ventiladores', 'Ventiladores', '2018-01-12 19:45:29'),
(108, 'Vitrinas', 'Vitrinas', '2018-01-12 19:45:35'),
(109, 'Video Grabadores', 'Video Grabadores', '2018-01-12 19:45:42'),
(131, 'Pendrive\'s', 'Pendrive\'s', '2018-01-22 20:32:19'),
(133, 'Switch', 'Switch', '2018-01-22 20:35:04'),
(134, 'Firewell', 'Firewell', '2018-01-22 20:35:40'),
(135, 'Adaptador', 'Adaptador', '2018-01-22 20:35:57'),
(136, 'Modem', 'Modem', '2018-01-22 20:36:09'),
(137, 'Modulo', 'Modulo', '2018-01-22 20:37:34'),
(139, 'Cableado', 'Canaleta, Caja de cable\r\n', '2018-01-22 20:39:05'),
(140, 'Fuente de Poder', 'Fuente', '2018-01-22 20:40:11'),
(141, 'Memoria', 'Memoria', '2018-01-22 20:40:34'),
(143, 'Procesadores', 'Procesador', '2018-01-22 20:55:36'),
(144, 'Unidad Ã“ptica', 'Dvd, Cd', '2018-01-22 20:56:39'),
(145, 'Software', 'Antivirus, Aplicaciones, Sistemas\r\n', '2018-01-22 21:00:40'),
(146, 'Audifonos', 'Audifonos', '2018-01-22 21:07:50'),
(147, 'Laptops', 'Laptop', '2018-01-22 21:08:26'),
(148, 'Tablets', 'Tablet', '2018-01-22 21:52:10'),
(149, 'Toner', 'Tintas de impresora', '2018-01-22 21:56:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponible`
--

CREATE TABLE `disponible` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` char(200) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `precio_producto` double NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `responsable_entrega` char(200) NOT NULL,
  `concepto_inventario` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disponible`
--

INSERT INTO `disponible` (`id_producto`, `nombre_producto`, `id_categoria`, `precio_producto`, `stock`, `fecha`, `codigo_producto`, `responsable_entrega`, `concepto_inventario`) VALUES
(21, '1', 151, 111, 1, '2018-01-28 13:18:10', 100, 'a', 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `codigo` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `nota` varchar(255) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `id_producto`, `user_id`, `fecha`, `nota`, `referencia`, `cantidad`, `stock`) VALUES
(58, 65, 1, '2018-01-25 19:32:33', 'Arnaldo agregÃ³ 1 producto(s) al inventario', '20020', 1, 0),
(61, 65, 1, '2018-01-25 19:45:59', 'Arnaldo agregÃ³ 1 producto(s) al inventario', '20020', 1, 0),
(62, 65, 1, '2018-01-25 19:48:16', 'Arnaldo agregÃ³ 1 producto(s) al inventario', '20020', 1, 0),
(63, 65, 1, '2018-01-25 19:51:08', 'Arnaldo agregÃ³ 1 producto(s) al inventario', '20020', 1, 0),
(68, 69, 1, '2018-01-25 21:10:47', 'Arnaldo agregÃ³ 1 producto(s) al inventario', '1', 1, 0),
(89, 68, 1, '2018-01-27 18:25:51', 'Arnaldo agregÃ³ 1 producto(s) al inventario', '1', 1, 0),
(91, 68, 1, '2018-01-27 18:32:02', 'Arnaldo agregÃ³ 1 producto(s) al inventario', '1', 1, 0),
(104, 69, 1, '2018-01-28 13:42:12', 'Arnaldo agregÃ³ 1 producto(s) al inventario', 'a', 1, 0),
(105, 69, 1, '2018-01-28 13:42:16', 'Arnaldo agregÃ³ 1 producto(s) al inventario', 'a', 1, 0),
(131, 69, 1, '2018-01-28 14:27:40', 'Arnaldo agregÃ³ 1 producto(s) al inventario', '1', 1, 0),
(132, 69, 1, '2018-01-28 14:28:06', 'Arnaldo agregÃ³ 1 producto(s) al inventario', '1', 1, 0),
(133, 69, 1, '2018-01-28 14:28:20', 'Arnaldo agregÃ³ 1 producto(s) al inventario', 'd', 1, 0),
(134, 69, 1, '2018-01-28 14:28:23', 'Arnaldo agregÃ³ 1 producto(s) al inventario', 'd', 1, 0),
(139, 69, 1, '2018-01-28 14:30:19', 'Arnaldo agregÃ³ 1 producto(s) al inventario', 'd', 1, 0),
(140, 69, 1, '2018-01-28 14:32:36', 'Arnaldo agregÃ³ 1 producto(s) al inventario', 'd', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo`
--

CREATE TABLE `motivo` (
  `id_motivo` int(11) NOT NULL,
  `nombre_motivo` char(200) NOT NULL,
  `descripcion_motivo` char(200) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `motivo`
--

INSERT INTO `motivo` (`id_motivo`, `nombre_motivo`, `descripcion_motivo`, `fecha`) VALUES
(1, 'Peticion', 'Peticion', '2018-01-12 00:00:00'),
(2, 'Asignacion', 'Asignacion', '2018-01-12 00:00:00'),
(3, 'Inactivos', 'Desintegrados', '2018-01-12 00:00:00'),
(4, 'Activos', 'Activos', '2018-01-12 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id_producto` int(11) NOT NULL,
  `codigo_producto` char(200) NOT NULL,
  `nombre_producto` char(200) NOT NULL,
  `fecha` datetime NOT NULL,
  `precio_producto` double NOT NULL,
  `stock` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `numero_bien` varchar(30) NOT NULL,
  `id_area` char(200) NOT NULL,
  `responsable_entrega` char(200) NOT NULL,
  `id_motivo` int(200) NOT NULL,
  `condicion_producto` char(50) NOT NULL,
  `asignacion_producto` char(200) NOT NULL,
  `id_rango` int(200) NOT NULL,
  `marca_producto` char(200) NOT NULL,
  `modelo_producto` char(200) NOT NULL,
  `concepto_inventario` char(200) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id_producto`, `codigo_producto`, `nombre_producto`, `fecha`, `precio_producto`, `stock`, `id_categoria`, `serial`, `numero_bien`, `id_area`, `responsable_entrega`, `id_motivo`, `condicion_producto`, `asignacion_producto`, `id_rango`, `marca_producto`, `modelo_producto`, `concepto_inventario`, `id_cargo`) VALUES
(65, '20020', 'Monitor', '2018-01-25 19:32:33', 100, 1, 79, 'FSEE8HA022449', 'Desconocido', '2', 'Geraldine Torrealba', 4, 'Regular estado de uso y conservacion', 'Arnaldo Bonillo', 41, 'VIT', 'TFT20W90PSI', 'Inventario Inicial', 31),
(66, '20020', 'Monitor', '2018-01-25 19:42:41', 100, 1, 79, '4A4E', '160', '2', 'Geraldine Torrealba', 4, 'Regular estado de uso y conservaciÃ³n\r\n', 'Arnaldo Bonillo', 41, 'Lenovo', 'C20 All-in-One', 'Inventario Inicial', 31),
(67, '20020', 'CPU', '2018-01-25 19:44:19', 100, 1, 45, 'A000902481', 'Desconocido', '2', 'Geraldine Torrealba', 4, 'Regular estado de uso y conservaciÃ³n\r\n', 'Arnaldo Bonillo', 41, 'Vit', 'E 1210-01', 'Inventario Inicial', 31),
(68, '20020', 'Teclado', '2018-01-25 19:45:59', 100, 3, 103, 'KBE901K14483A', 'Desconocido', '2', 'Geraldine Torrealba', 4, 'Regular estado de uso y conservaciÃ³n\r\n', 'Arnaldo Bonillo', 41, 'Vit', 'DOK-K5313', 'Inventario Inicial', 31),
(69, '20020', 'Teclado', '2018-01-25 19:48:16', 100, 13, 103, 'MSE915K13358A', 'Desconocido', '2', 'Geraldine Torrealba', 4, 'Regular estado de uso y conservaciÃ³n\r\n', 'Arnaldo Bonillo', 41, 'Vit', 'DOK-K5313', 'Inventario Inicial', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rango`
--

CREATE TABLE `rango` (
  `id_rango` int(11) NOT NULL,
  `nombre_rango` char(150) NOT NULL,
  `descripcion_rango` char(150) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(38, 'Sub-Director', 'Sub', '2018-01-10 00:00:00'),
(39, 'Pasantes', 'Pasante', '2018-01-17 00:00:00'),
(40, 'Aprendices', 'Aprendices', '2018-01-17 00:00:00'),
(41, 'No Aplica', 'No Aplica', '2018-01-25 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `fecha`) VALUES
(1, 'Arnaldo', 'Bonillo', 'admin', '$2y$10$MPVHzZ2ZPOWmtUUGCq3RXu31OTB.jo7M9LZ7PmPQYmgETSNn19ejO', 'admin@admin.com', '2016-12-19 15:06:00'),
(2, 'Arnaldo Jose', 'Bonillo Berrios', 'abonillo', '$2y$10$4NQnYuZoUm3FRqoufH1In.h2zupHBKvu6knymLgzJ7J3EV8Hl46Ke', 'abonillo@cicpc.gob.ve', '2017-07-26 21:42:12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `disponible`
--
ALTER TABLE `disponible`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `nombre_producto` (`nombre_producto`) USING BTREE;

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `motivo`
--
ALTER TABLE `motivo`
  ADD PRIMARY KEY (`id_motivo`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `serial` (`serial`) USING BTREE;

--
-- Indices de la tabla `rango`
--
ALTER TABLE `rango`
  ADD PRIMARY KEY (`id_rango`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT de la tabla `disponible`
--
ALTER TABLE `disponible`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT de la tabla `motivo`
--
ALTER TABLE `motivo`
  MODIFY `id_motivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `rango`
--
ALTER TABLE `rango`
  MODIFY `id_rango` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index', AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `fk_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `products` (`id_producto`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
