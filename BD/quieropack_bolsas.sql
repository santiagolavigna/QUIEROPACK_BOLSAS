-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2022 a las 23:13:29
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quieropack_bolsas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acarreo`
--

CREATE TABLE `acarreo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `precio` decimal(25,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acarreo`
--

INSERT INTO `acarreo` (`id`, `nombre`, `precio`) VALUES
(1, 'KANGOO', '0.300');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adicionales`
--

CREATE TABLE `adicionales` (
  `id` int(11) NOT NULL,
  `adicional` varchar(30) NOT NULL,
  `detalle` varchar(30) NOT NULL,
  `precio` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `adicionales`
--

INSERT INTO `adicionales` (`id`, `adicional`, `detalle`, `precio`) VALUES
(3, 'TINTA', 'COLOR ESPECIAL (PLATA Y DORADO', '0.00'),
(4, 'CINTA', 'CENTIMETROS EXTRA DE CINTA 75C', '123.00'),
(5, 'CINTA', 'CINTA DE COLORES (0,7+ EL PAR)', '0.70'),
(6, 'LACA', 'LACA SECTORIZADA', '0.00'),
(7, 'LAMINADO', 'EN POLIPROPILENO MATE', '0.00'),
(8, 'LAMINADO', 'EN POLIETILENO ', '0.00'),
(9, 'LAMINADO', 'EN POLIPROPILENO BRILLANTE', '0.00'),
(10, 'FALLETINA', 'FALLETINA PARA BOLSA (PAR)', '0.00'),
(11, 'CIERRE DE BOLSA', 'OFFSET (X COLOR)', '0.00'),
(12, 'CIERRE DE BOLSA', 'DIGITAL', '0.00'),
(13, 'TARJETAS', 'TARJETAS DE OPALINA', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `armadobolsa`
--

CREATE TABLE `armadobolsa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `precio` decimal(25,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `armadobolsa`
--

INSERT INTO `armadobolsa` (`id`, `nombre`, `precio`) VALUES
(1, 'BOLSAS DESDE 12X40 A 30X21', '2.500'),
(2, 'BOLSAS 13X14X07', '2.100'),
(3, 'BOLSAS DE 30 A 40', '3.200'),
(4, '43X32X12', '5.000'),
(5, '52X38X15', '7.000'),
(6, '60X45X15', '10.000'),
(7, 'SOBRES', '1.650'),
(8, 'SOBRES CUBIERTO', '1.600'),
(9, 'BOLSA 13X24X07', '2.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `armadotroquelado`
--

CREATE TABLE `armadotroquelado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `precio` decimal(25,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `armadotroquelado`
--

INSERT INTO `armadotroquelado` (`id`, `nombre`, `precio`) VALUES
(1, 'MAQUINA GRANDE', '6.000'),
(2, 'MAQUINA CHICA', '5.000'),
(3, '43X32X12', '7.500'),
(4, '52X39X12', '9.000'),
(5, '60X45X15', '9.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barniz`
--

CREATE TABLE `barniz` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `precio` decimal(25,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `barniz`
--

INSERT INTO `barniz` (`id`, `nombre`, `precio`) VALUES
(2, 'BARNIZ MAQUINA CHICA', '1.250'),
(3, 'BARNIZ MAQUINA GRANDE', '1.500'),
(4, 'SIN BARNIZ', '0.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bolsas`
--

CREATE TABLE `bolsas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `largo` decimal(25,2) NOT NULL,
  `ancho` decimal(25,2) NOT NULL,
  `fuelle` decimal(25,3) NOT NULL,
  `id_impresion` int(11) NOT NULL,
  `id_cartulina` int(11) NOT NULL,
  `cant_bolsa_pliego` decimal(25,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bolsas`
--

INSERT INTO `bolsas` (`id`, `nombre`, `largo`, `ancho`, `fuelle`, `id_impresion`, `id_cartulina`, `cant_bolsa_pliego`) VALUES
(34, 'BOLSA 12X40X09', '40.00', '12.00', '9.000', 1, 2, '2.0'),
(35, 'BOLSA 13X14X07', '14.00', '13.00', '7.000', 1, 3, '6.0'),
(36, 'BOLSA 13X24X07', '24.00', '13.00', '7.000', 1, 4, '4.0'),
(37, 'BOLSA 16X25X14', '25.00', '16.00', '14.000', 1, 4, '2.0'),
(38, 'BOLSA 17X17X11', '17.00', '17.00', '11.000', 1, 2, '3.0'),
(39, 'BOLSA 19X40X09', '40.00', '19.00', '9.000', 1, 4, '2.0'),
(40, 'BOLSA 20X20X10', '20.00', '20.00', '10.000', 1, 2, '3.0'),
(41, 'BOLSA 22X24X11', '24.00', '22.00', '11.000', 1, 4, '3.0'),
(42, 'BOLSA 26X38X13', '38.00', '26.00', '13.000', 1, 6, '2.0'),
(43, 'BOLSA 27X22X15', '22.00', '27.00', '15.000', 1, 4, '2.0'),
(44, 'BOLSA 30X21X09', '21.00', '30.00', '9.000', 6, 6, '3.0'),
(45, 'BOLSA 30X38X15', '38.00', '30.00', '15.000', 7, 7, '1.0'),
(46, 'BOLSA 32X26X10', '26.00', '32.00', '10.000', 1, 8, '2.0'),
(47, 'BOLSA 32X33X11', '33.00', '32.00', '11.000', 1, 10, '1.0'),
(48, 'BOLSA 40X40X14', '40.00', '40.00', '14.000', 1, 5, '1.0'),
(49, 'BOLSA 40X46X12', '46.00', '40.00', '12.000', 1, 15, '1.0'),
(50, 'BOLSA 43X32X12', '32.00', '43.00', '12.000', 7, 7, '1.0'),
(51, 'BOLSA 52X39X15', '39.00', '52.00', '15.000', 1, 9, '1.0'),
(52, 'BOLSA 60X45X15', '45.00', '60.00', '15.000', 1, 11, '0.5'),
(53, 'BOLSA 12X40X09 KRAFF', '40.00', '12.00', '9.000', 1, 12, '2.0'),
(54, 'BOLSA 19X40X09 KRAFF', '40.00', '19.00', '9.000', 1, 13, '2.0'),
(55, 'BOLSA 40X40X14 KRAFF', '40.00', '40.00', '14.000', 1, 14, '1.0'),
(56, 'BOLSA 28X35X10 KRAFT', '28.00', '35.00', '10.000', 1, 16, '2.0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bolsa_kg`
--

CREATE TABLE `bolsa_kg` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bolsa_kg`
--

INSERT INTO `bolsa_kg` (`id`, `nombre`, `precio`) VALUES
(6, 'BOLSA 08X20X04 CARTULINA', '825.00'),
(7, 'BOLSA 12X40X09 CARTULINA', '880.00'),
(8, 'BOLSA 13X14X07 CARTULINA', '770.00'),
(9, 'BOLSA 13X24X07 CARTULINA', '825.00'),
(10, 'BOLSA 16X25X14 CARTULINA', '825.00'),
(17, 'BOLSA 17X17X11 CARTULINA', '825.00'),
(18, 'BOLSA 19X40X09 CARTULINA', '825.00'),
(19, 'BOLSA 20X20X10 CARTULINA', '825.00'),
(20, 'BOLSA 22X24X11 CARTULINA', '825.00'),
(21, 'BOLSA 26X38X13 CARTULINA', '825.00'),
(22, 'BOLSA 27X22X15 CARTULINA', '825.00'),
(23, 'BOLSA 30X21X09 CARTULINA', '825.00'),
(24, 'BOLSA 30X38X15 CARTULINA', '990.00'),
(25, 'BOLSA 32X26X10 CARTULINA', '990.00'),
(26, 'BOLSA 32X33X11 CARTULINA', '990.00'),
(27, 'BOLSA 38X40X19 CARTULINA', '990.00'),
(28, 'BOLSA 40X40X20 CARTULINA', '990.00'),
(29, 'BOLSA 40X40X14 CARTULINA', '990.00'),
(30, 'BOLSA 40X46X12 CARTULINA', '990.00'),
(31, 'BOLSA 43X32X12 CARTULINA', '1100.00'),
(32, 'BOLSA 52X39X15 CARTULINA', '1430.00'),
(33, 'BOLSA 60X45X15 CARTULINA', '1650.00'),
(34, 'BOLSA 28X35X10 KRAFF ', '990.00'),
(35, 'SOBRE PARA CUBIERTOS', '600.00'),
(36, 'BOLSA 43X32X12 CARTULINA (REGALERIA)', '1100.00'),
(37, 'SOBRES 11X06X03', '500.00'),
(38, 'CALENDARIO CARPA C/LAPIZERO', '800.00'),
(39, 'BOLSA 40X20X12 CARTULINA', '990.00'),
(40, 'CAJA HELADO 24X10X09 COGNINI', '800.00'),
(41, 'CAJA HELADO 15X09X11 GELATIAMO', '800.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calculo`
--

CREATE TABLE `calculo` (
  `id` int(11) NOT NULL,
  `id_bolsas` int(11) NOT NULL,
  `id_pegamentos` int(11) NOT NULL,
  `id_armadotroquelado` int(11) NOT NULL,
  `id_cordoncinta` int(11) NOT NULL,
  `id_armadobolsa` int(11) NOT NULL,
  `id_acarreo` int(11) NOT NULL,
  `id_barniz` int(11) NOT NULL,
  `id_perforado` int(11) NOT NULL,
  `id_fondorefuerzo` int(11) NOT NULL,
  `id_empaquetado` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_impresion` int(11) NOT NULL,
  `id_gillotinado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calculo`
--

INSERT INTO `calculo` (`id`, `id_bolsas`, `id_pegamentos`, `id_armadotroquelado`, `id_cordoncinta`, `id_armadobolsa`, `id_acarreo`, `id_barniz`, `id_perforado`, `id_fondorefuerzo`, `id_empaquetado`, `fecha`, `id_impresion`, `id_gillotinado`) VALUES
(3, 34, 4, 2, 3, 1, 1, 2, 1, 4, 3, '2020-02-07', 7, 1),
(4, 35, 5, 2, 5, 2, 1, 2, 1, 4, 1, '2020-06-08', 7, 2),
(5, 36, 6, 2, 3, 1, 1, 2, 1, 4, 2, '2020-02-07', 7, 1),
(6, 39, 7, 2, 3, 1, 1, 2, 1, 4, 9, '2021-06-15', 7, 6),
(7, 40, 11, 2, 4, 1, 1, 2, 1, 4, 4, '2020-02-07', 7, 1),
(8, 41, 8, 1, 3, 1, 1, 2, 1, 4, 9, '2020-02-07', 7, 1),
(9, 42, 10, 1, 4, 3, 1, 2, 1, 4, 9, '2020-02-07', 7, 1),
(10, 43, 10, 1, 4, 1, 1, 2, 1, 4, 9, '2020-02-07', 7, 1),
(11, 44, 9, 2, 4, 1, 1, 2, 1, 4, 5, '2020-02-07', 7, 1),
(13, 46, 12, 2, 4, 3, 1, 2, 1, 4, 6, '2020-02-07', 6, 1),
(14, 48, 13, 2, 4, 3, 1, 2, 1, 4, 8, '2020-02-07', 6, 1),
(15, 49, 14, 3, 4, 4, 1, 2, 1, 4, 7, '2020-02-07', 6, 1),
(16, 50, 14, 3, 4, 4, 1, 3, 1, 4, 7, '2019-11-12', 6, 1),
(17, 51, 15, 4, 4, 5, 1, 2, 1, 4, 8, '2020-02-07', 6, 1),
(18, 52, 16, 5, 4, 6, 1, 2, 1, 4, 8, '2020-02-07', 6, 1),
(19, 53, 4, 2, 3, 1, 1, 2, 1, 4, 3, '2020-02-07', 7, 1),
(20, 54, 7, 2, 3, 1, 1, 2, 1, 4, 9, '2020-02-07', 7, 1),
(21, 55, 13, 1, 4, 3, 1, 2, 1, 4, 8, '2020-02-07', 6, 1),
(22, 56, 17, 1, 6, 3, 1, 4, 1, 4, 10, '2020-02-19', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartulina`
--

CREATE TABLE `cartulina` (
  `id` int(11) NOT NULL,
  `largo` decimal(25,2) NOT NULL,
  `ancho` decimal(25,2) NOT NULL,
  `id_gramaje` int(10) NOT NULL,
  `pliego` int(11) NOT NULL,
  `id_flete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cartulina`
--

INSERT INTO `cartulina` (`id`, `largo`, `ancho`, `id_gramaje`, `pliego`, `id_flete`) VALUES
(2, '66.00', '100.00', 1, 1, 2),
(3, '72.00', '102.00', 1, 1, 2),
(4, '76.00', '112.00', 1, 1, 2),
(5, '76.00', '112.00', 2, 1, 2),
(6, '82.00', '112.00', 1, 1, 2),
(7, '66.00', '100.00', 2, 1, 2),
(8, '76.00', '94.00', 1, 1, 2),
(9, '76.00', '112.00', 3, 1, 2),
(10, '66.00', '100.00', 3, 1, 2),
(11, '66.00', '100.00', 4, 1, 2),
(12, '48.00', '65.00', 5, 1, 2),
(13, '53.00', '65.00', 5, 1, 2),
(14, '65.00', '56.00', 5, 1, 2),
(15, '76.00', '112.00', 4, 1, 2),
(16, '82.00', '118.00', 6, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `telefono` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `direccion`, `telefono`) VALUES
(4, 'BLUE', 'PELLEGRINI 68', '2147483647'),
(5, 'EL SECRETO', 'ALSINA 3299 (OLAVARR', '2147483647'),
(6, 'LA ESMERALDA', '', '0'),
(7, 'TRENTO', '', '0'),
(8, 'AY CHAVELLA', '', '0'),
(9, 'ADHA', '', '0'),
(10, 'DIADEMA', '', '0'),
(11, 'PIETRA', '', '0'),
(12, 'LAS MANITAS', '', '0'),
(13, 'LE VINOTEQUE', '', ''),
(14, 'EL PASEO', '', ''),
(15, 'LAS MANITAS', '', ''),
(16, 'TAKOS', '', ''),
(17, 'ALGO MAS', '', ''),
(18, 'LA BITACORA', '', ''),
(19, 'VINOTECA 1847', '', ''),
(20, 'ODIN', '', ''),
(21, 'HELADOS COGNINI', '', ''),
(22, 'GELATIAMO 9 DE JULIO', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cordoncinta`
--

CREATE TABLE `cordoncinta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `precio` decimal(25,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cordoncinta`
--

INSERT INTO `cordoncinta` (`id`, `nombre`, `precio`) VALUES
(3, 'CINTA 40 cm', '6.600'),
(4, 'CINTA 45 CM', '5.830'),
(5, 'CORDON', '8.000'),
(6, 'SIN MANIJA', '0.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dolar`
--

CREATE TABLE `dolar` (
  `id` int(11) NOT NULL,
  `precio` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dolar`
--

INSERT INTO `dolar` (`id`, `precio`) VALUES
(99, '158.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egreso`
--

CREATE TABLE `egreso` (
  `id` int(11) NOT NULL,
  `id_pegadora` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_bolsa_kg` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `egreso`
--

INSERT INTO `egreso` (`id`, `id_pegadora`, `id_cliente`, `id_bolsa_kg`, `cantidad`, `fecha`) VALUES
(7, 7, 11, 9, 1000, '2019-11-01'),
(8, 7, 11, 8, 1000, '2019-11-08'),
(9, 7, 11, 19, 1000, '2019-11-08'),
(10, 9, 13, 18, 650, '2019-11-08'),
(11, 7, 14, 19, 600, '2019-11-08'),
(14, 4, 16, 32, 900, '2019-11-11'),
(15, 4, 16, 36, 1700, '2019-11-11'),
(16, 4, 16, 31, 800, '2019-11-11'),
(17, 6, 15, 9, 1100, '2019-11-06'),
(18, 6, 15, 25, 800, '2019-11-06'),
(19, 4, 7, 31, 500, '2019-11-22'),
(20, 7, 18, 35, 3000, '2019-11-01'),
(21, 4, 17, 31, 500, '2019-11-22'),
(23, 9, 6, 8, 900, '2019-11-26'),
(24, 9, 14, 8, 1100, '2019-11-26'),
(25, 5, 10, 37, 1000, '2019-11-28'),
(26, 5, 6, 37, 1000, '2019-11-29'),
(27, 7, 6, 8, 500, '2019-11-29'),
(28, 4, 16, 38, 1000, '2019-12-05'),
(29, 6, 19, 29, 500, '2019-12-09'),
(30, 6, 19, 39, 1000, '2019-12-09'),
(31, 7, 19, 7, 100, '2019-12-09'),
(32, 7, 20, 35, 8000, '2019-12-07'),
(33, 4, 13, 7, 600, '2019-12-10'),
(34, 6, 15, 34, 1000, '2019-12-11'),
(35, 4, 21, 40, 3000, '2019-12-10'),
(36, 4, 22, 41, 2000, '2019-12-01'),
(37, 4, 8, 31, 500, '2019-12-30'),
(38, 7, 11, 8, 1000, '2019-01-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empaquetado`
--

CREATE TABLE `empaquetado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `precio` decimal(25,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empaquetado`
--

INSERT INTO `empaquetado` (`id`, `nombre`, `precio`) VALUES
(1, 'CAJA 13X14X07', '0.500'),
(2, 'CAJA 13X24X07', '0.550'),
(3, 'CAJA 12X40X09', '0.550'),
(4, 'CAJA 20X20X10', '0.600'),
(5, 'CAJA 30X21X09', '0.600'),
(6, 'CAJA 32X26X10', '0.700'),
(7, 'CAJA 43X32X12', '0.900'),
(8, 'POLIETILENO 52 Y 60 BOLSA GRANDE', '1.800'),
(9, 'POLIETILENO BOLSAS CHICAS ', '0.750'),
(10, 'CAJA 38X35X10', '0.800');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flete`
--

CREATE TABLE `flete` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `precio` decimal(25,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `flete`
--

INSERT INTO `flete` (`id`, `nombre`, `precio`) VALUES
(2, 'FLETE', '6.000'),
(3, 'A', '16.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fondorefuerzo`
--

CREATE TABLE `fondorefuerzo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `precio` decimal(25,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fondorefuerzo`
--

INSERT INTO `fondorefuerzo` (`id`, `nombre`, `precio`) VALUES
(4, 'FONDO REFUERZO STANDAR', '0.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gillotinado`
--

CREATE TABLE `gillotinado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `kilo` decimal(25,3) NOT NULL,
  `corte` decimal(25,3) NOT NULL,
  `costo` decimal(25,3) NOT NULL,
  `division` int(11) NOT NULL DEFAULT '1000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gillotinado`
--

INSERT INTO `gillotinado` (`id`, `nombre`, `kilo`, `corte`, `costo`, `division`) VALUES
(1, 'BOLSA 12X40X09', '75.000', '2.000', '6.000', 1000),
(2, 'BOLSA 13X14X07', '28.000', '2.000', '6.000', 1000),
(3, 'BOLSA 13X24X07', '48.000', '2.000', '6.000', 1000),
(4, 'BOLSA 16X25X14', '96.000', '2.000', '6.000', 1000),
(5, 'BOLSA 17X17X11', '50.000', '2.000', '6.000', 1000),
(6, 'BOLSA 19X40X09', '106.000', '2.000', '6.000', 1000),
(7, 'BOLSA 20X20X10', '50.000', '2.000', '6.000', 1000),
(8, 'BOLSA 22X24X11', '64.000', '2.000', '6.000', 1000),
(9, 'BOLSA 26X38X13', '104.000', '2.000', '6.000', 1000),
(10, 'BOLSA 27X22X15', '96.000', '2.000', '6.000', 1000),
(11, 'BOLSA 30X21X09', '70.000', '2.000', '6.000', 1000),
(12, 'BOLSA 30X38X15', '163.000', '2.000', '6.000', 1000),
(13, 'BOLSA 32X26X16', '81.000', '2.000', '6.000', 1000),
(14, 'BOLSA 32X33X11', '175.000', '2.000', '6.000', 1000),
(15, 'BOLSA 40X40X14', '239.000', '2.000', '6.000', 1000),
(16, 'BOLSA 40X46X12', '239.000', '2.000', '6.000', 1000),
(17, 'BOLSA 43X32X12', '163.350', '2.000', '6.000', 1000),
(18, 'BOLSA 52X39X15', '224.717', '2.000', '6.000', 1000),
(19, 'BOLSA 60X45X15', '185.130', '2.000', '6.000', 1000),
(20, 'BOLSA 12X40X09 KRAFT', '34.320', '2.000', '6.000', 1000),
(21, 'BOLSA 19X40X09 KRAFT', '37.895', '2.000', '6.000', 1000),
(22, 'BOLSA 28X35X10 KRAFT', '61.200', '2.000', '6.000', 1000),
(23, 'BOLSA 40X40X14 KRAFT', '80.080', '2.000', '6.000', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gramaje`
--

CREATE TABLE `gramaje` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `gr` int(11) NOT NULL,
  `precio` decimal(25,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gramaje`
--

INSERT INTO `gramaje` (`id`, `nombre`, `gr`, `precio`) VALUES
(1, '205 G/M2', 205, '790.000'),
(2, '225 G/M2', 225, '865.000'),
(3, '240 G/M2', 240, '865.000'),
(4, '255 G/M2', 255, '865.000'),
(5, '200 G/M2 KRAFT', 200, '161.930'),
(6, '115 G/M2 KRAFT', 115, '181.700');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresion`
--

CREATE TABLE `impresion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `precio` decimal(25,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `impresion`
--

INSERT INTO `impresion` (`id`, `nombre`, `precio`) VALUES
(1, 'LISA', '0.000'),
(6, '1 COL MAQUINA GRANDE', '5.500'),
(7, '1 COL MAQUINA CHICA', '4.500');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `id` int(11) NOT NULL,
  `id_pegadora` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_bolsa_kg` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingreso`
--

INSERT INTO `ingreso` (`id`, `id_pegadora`, `id_cliente`, `id_bolsa_kg`, `cantidad`, `fecha`) VALUES
(1, 7, 11, 8, 500, '2019-11-11'),
(2, 4, 16, 32, 100, '2019-11-11'),
(3, 4, 16, 31, 100, '2019-11-11'),
(4, 6, 15, 25, 100, '2019-11-09'),
(5, 7, 14, 19, 400, '2019-11-23'),
(6, 7, 11, 19, 300, '2019-11-23'),
(7, 7, 11, 8, 200, '2019-11-23'),
(8, 7, 6, 8, 200, '2019-11-23'),
(9, 7, 18, 35, 900, '2019-11-23'),
(10, 9, 13, 18, 150, '2019-11-20'),
(11, 4, 17, 31, 100, '2019-11-23'),
(12, 9, 13, 18, 250, '2019-11-26'),
(13, 6, 15, 9, 500, '2019-11-26'),
(14, 4, 16, 31, 100, '2019-11-28'),
(15, 4, 7, 31, 50, '2019-11-23'),
(16, 5, 10, 37, 450, '2019-11-30'),
(17, 4, 16, 36, 100, '2019-11-30'),
(18, 4, 16, 38, 150, '2019-12-05'),
(19, 4, 16, 31, 100, '2019-12-04'),
(20, 7, 11, 8, 300, '2019-12-06'),
(21, 7, 11, 9, 600, '2019-12-06'),
(22, 7, 11, 19, 200, '2019-12-06'),
(23, 4, 16, 38, 500, '2019-12-07'),
(24, 9, 6, 8, 200, '2019-12-06'),
(26, 9, 14, 8, 300, '2019-12-06'),
(27, 6, 12, 25, 100, '2019-12-09'),
(28, 6, 15, 9, 200, '2019-12-09'),
(29, 7, 20, 35, 600, '2019-12-09'),
(30, 5, 6, 37, 918, '2019-12-09'),
(31, 5, 4, 37, 550, '2019-12-09'),
(32, 4, 16, 38, 150, '2019-12-10'),
(33, 4, 13, 7, 100, '2019-12-11'),
(34, 7, 19, 7, 100, '2019-12-10'),
(35, 6, 15, 34, 100, '2019-12-12'),
(36, 4, 21, 40, 600, '2019-12-12'),
(37, 4, 22, 41, 300, '2019-12-12'),
(38, 6, 19, 39, 100, '2019-12-11'),
(39, 4, 16, 31, 100, '2019-11-19'),
(40, 4, 16, 31, 100, '2019-12-14'),
(41, 7, 20, 35, 1500, '2019-12-14'),
(42, 6, 19, 29, 100, '2019-12-16'),
(43, 6, 15, 34, 200, '2019-12-16'),
(44, 7, 20, 35, 600, '2019-12-16'),
(45, 4, 21, 40, 200, '2019-12-16'),
(46, 4, 16, 31, 100, '2019-12-16'),
(47, 7, 20, 35, 600, '2019-12-19'),
(48, 6, 12, 34, 150, '2019-12-19'),
(49, 9, 6, 8, 393, '2019-12-24'),
(50, 6, 15, 34, 200, '2019-12-30'),
(51, 7, 11, 8, 500, '2019-12-30'),
(52, 6, 15, 25, 100, '2019-12-31'),
(53, 6, 15, 34, 200, '2019-12-31'),
(54, 9, 6, 8, 307, '2020-01-03'),
(55, 9, 14, 8, 500, '2020-01-03'),
(56, 9, 13, 18, 211, '2020-01-03'),
(57, 7, 11, 8, 500, '2020-01-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kg`
--

CREATE TABLE `kg` (
  `id` int(11) NOT NULL,
  `precio` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kg`
--

INSERT INTO `kg` (`id`, `precio`) VALUES
(99, '8.70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_pegadora`
--

CREATE TABLE `pago_pegadora` (
  `id` int(11) NOT NULL,
  `id_pegadora` int(11) NOT NULL,
  `detalle` varchar(60) NOT NULL,
  `monto` decimal(25,3) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pago_pegadora`
--

INSERT INTO `pago_pegadora` (`id`, `id_pegadora`, `detalle`, `monto`, `fecha`) VALUES
(1, 7, 'PAGO POR EL TOTAL DE BOLSAS', '1975.500', '2019-11-24'),
(2, 6, 'PAGO POR EL TOTAL DE BOLSAS', '841.500', '2019-11-26'),
(3, 7, 'PAGO TOTAL HASTA EL 09/12/2019', '891.000', '2019-12-10'),
(4, 9, 'PAGO HASTA EL 03/01/2020', '1813.080', '2020-01-03'),
(5, 7, '', '2453.000', '2020-01-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pegadora`
--

CREATE TABLE `pegadora` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `deuda` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pegadora`
--

INSERT INTO `pegadora` (`id`, `nombre`, `direccion`, `telefono`, `deuda`) VALUES
(4, 'Claudia Orellano', 'Acceso Nestor Kirchn', '2346636970', '2289.70'),
(5, 'Claudia Almada', '', '2346585937', '1234.50'),
(6, 'Eugenia', 'Atras de Hospital', '2346515545', '1402.50'),
(7, 'Debora', 'Calle piran', '23446556933', '385.00'),
(8, 'Adriana Cambon', 'Atras de ozono', '2346310715', '0.00'),
(9, 'Paola', '', '2346585792', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pegamentos`
--

CREATE TABLE `pegamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `precio_dolar` int(11) NOT NULL,
  `precio_kilo` int(11) DEFAULT NULL,
  `cantidad` decimal(25,2) DEFAULT NULL,
  `porcentaje` decimal(25,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pegamentos`
--

INSERT INTO `pegamentos` (`id`, `nombre`, `precio_dolar`, `precio_kilo`, `cantidad`, `porcentaje`) VALUES
(4, '12X40X09', 99, 99, '6.00', '0.00'),
(5, '13X14X07', 99, 99, '3.00', '0.00'),
(6, '13X24X07', 99, 99, '4.00', '0.00'),
(7, '19X40X09', 99, 99, '7.00', '0.00'),
(8, '22X24X11', 99, 99, '6.00', '0.00'),
(9, '30X21X09', 99, 99, '6.00', '0.00'),
(10, '26X38X13', 99, 99, '9.00', '0.00'),
(11, '20X20X10', 99, 99, '5.50', '0.00'),
(12, '32X26X10', 99, 99, '7.00', '0.00'),
(13, '40X40X14', 99, 99, '8.00', '0.00'),
(14, '43X32X12', 99, 99, '9.00', '0.00'),
(15, '52X39X15', 99, 99, '11.00', '0.00'),
(16, '60X45X15', 99, 99, '13.00', '0.00'),
(17, '38X35X10', 99, 99, '8.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perforado`
--

CREATE TABLE `perforado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `precio` decimal(25,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perforado`
--

INSERT INTO `perforado` (`id`, `nombre`, `precio`) VALUES
(1, '', '0.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pliegos`
--

CREATE TABLE `pliegos` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, 'Usuario del sistema', 'gonzalo@quieropack', 'e5fdfecfc553986c951e0e21dbbff37e5462f772', 1, 'no_image.jpg', 1, '2022-10-13 08:43:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acarreo`
--
ALTER TABLE `acarreo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `adicionales`
--
ALTER TABLE `adicionales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `armadobolsa`
--
ALTER TABLE `armadobolsa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `armadotroquelado`
--
ALTER TABLE `armadotroquelado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `barniz`
--
ALTER TABLE `barniz`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bolsas`
--
ALTER TABLE `bolsas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cartulina` (`id_cartulina`),
  ADD KEY `id_impresion` (`id_impresion`);

--
-- Indices de la tabla `bolsa_kg`
--
ALTER TABLE `bolsa_kg`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calculo`
--
ALTER TABLE `calculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bolsas` (`id_bolsas`),
  ADD KEY `id_pegamentos` (`id_pegamentos`),
  ADD KEY `id_armadotroquelado` (`id_armadotroquelado`),
  ADD KEY `id_cordoncinta` (`id_cordoncinta`),
  ADD KEY `id_armadobolsa` (`id_armadobolsa`),
  ADD KEY `id_acarreo` (`id_acarreo`),
  ADD KEY `id_barniz` (`id_barniz`),
  ADD KEY `id_perforado` (`id_perforado`),
  ADD KEY `id_fondorefuerzo` (`id_fondorefuerzo`),
  ADD KEY `id_empaquetado` (`id_empaquetado`),
  ADD KEY `id_impresion` (`id_impresion`),
  ADD KEY `id_gillotinado` (`id_gillotinado`);

--
-- Indices de la tabla `cartulina`
--
ALTER TABLE `cartulina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gramaje` (`id_gramaje`),
  ADD KEY `id_flete` (`id_flete`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cordoncinta`
--
ALTER TABLE `cordoncinta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dolar`
--
ALTER TABLE `dolar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `egreso`
--
ALTER TABLE `egreso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegadora` (`id_pegadora`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_bolsa_kg` (`id_bolsa_kg`);

--
-- Indices de la tabla `empaquetado`
--
ALTER TABLE `empaquetado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `flete`
--
ALTER TABLE `flete`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fondorefuerzo`
--
ALTER TABLE `fondorefuerzo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gillotinado`
--
ALTER TABLE `gillotinado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gramaje`
--
ALTER TABLE `gramaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `impresion`
--
ALTER TABLE `impresion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegadora` (`id_pegadora`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_bolsa_kg` (`id_bolsa_kg`);

--
-- Indices de la tabla `kg`
--
ALTER TABLE `kg`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago_pegadora`
--
ALTER TABLE `pago_pegadora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pegadora` (`id_pegadora`);

--
-- Indices de la tabla `pegadora`
--
ALTER TABLE `pegadora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pegamentos`
--
ALTER TABLE `pegamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `precio_dolar` (`precio_dolar`),
  ADD KEY `id` (`id`),
  ADD KEY `precio_dolar_2` (`precio_dolar`),
  ADD KEY `precio_kilo` (`precio_kilo`);

--
-- Indices de la tabla `perforado`
--
ALTER TABLE `perforado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pliegos`
--
ALTER TABLE `pliegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_level` (`user_level`);

--
-- Indices de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acarreo`
--
ALTER TABLE `acarreo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `adicionales`
--
ALTER TABLE `adicionales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `armadobolsa`
--
ALTER TABLE `armadobolsa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `armadotroquelado`
--
ALTER TABLE `armadotroquelado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `barniz`
--
ALTER TABLE `barniz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `bolsas`
--
ALTER TABLE `bolsas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `bolsa_kg`
--
ALTER TABLE `bolsa_kg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `calculo`
--
ALTER TABLE `calculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `cartulina`
--
ALTER TABLE `cartulina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `cordoncinta`
--
ALTER TABLE `cordoncinta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `dolar`
--
ALTER TABLE `dolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `egreso`
--
ALTER TABLE `egreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `empaquetado`
--
ALTER TABLE `empaquetado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `flete`
--
ALTER TABLE `flete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fondorefuerzo`
--
ALTER TABLE `fondorefuerzo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `gillotinado`
--
ALTER TABLE `gillotinado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `gramaje`
--
ALTER TABLE `gramaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `impresion`
--
ALTER TABLE `impresion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `kg`
--
ALTER TABLE `kg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `pago_pegadora`
--
ALTER TABLE `pago_pegadora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pegadora`
--
ALTER TABLE `pegadora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pegamentos`
--
ALTER TABLE `pegamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `perforado`
--
ALTER TABLE `perforado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bolsas`
--
ALTER TABLE `bolsas`
  ADD CONSTRAINT `bolsas_ibfk_1` FOREIGN KEY (`id_cartulina`) REFERENCES `cartulina` (`id`),
  ADD CONSTRAINT `bolsas_ibfk_2` FOREIGN KEY (`id_impresion`) REFERENCES `impresion` (`id`);

--
-- Filtros para la tabla `calculo`
--
ALTER TABLE `calculo`
  ADD CONSTRAINT `calculo_ibfk_1` FOREIGN KEY (`id_acarreo`) REFERENCES `acarreo` (`id`),
  ADD CONSTRAINT `calculo_ibfk_10` FOREIGN KEY (`id_fondorefuerzo`) REFERENCES `fondorefuerzo` (`id`),
  ADD CONSTRAINT `calculo_ibfk_11` FOREIGN KEY (`id_empaquetado`) REFERENCES `empaquetado` (`id`),
  ADD CONSTRAINT `calculo_ibfk_12` FOREIGN KEY (`id_gillotinado`) REFERENCES `gillotinado` (`id`),
  ADD CONSTRAINT `calculo_ibfk_2` FOREIGN KEY (`id_pegamentos`) REFERENCES `pegamentos` (`id`),
  ADD CONSTRAINT `calculo_ibfk_3` FOREIGN KEY (`id_cordoncinta`) REFERENCES `cordoncinta` (`id`),
  ADD CONSTRAINT `calculo_ibfk_4` FOREIGN KEY (`id_bolsas`) REFERENCES `bolsas` (`id`),
  ADD CONSTRAINT `calculo_ibfk_5` FOREIGN KEY (`id_perforado`) REFERENCES `perforado` (`id`),
  ADD CONSTRAINT `calculo_ibfk_7` FOREIGN KEY (`id_barniz`) REFERENCES `barniz` (`id`),
  ADD CONSTRAINT `calculo_ibfk_8` FOREIGN KEY (`id_armadotroquelado`) REFERENCES `armadotroquelado` (`id`),
  ADD CONSTRAINT `calculo_ibfk_9` FOREIGN KEY (`id_armadobolsa`) REFERENCES `armadobolsa` (`id`);

--
-- Filtros para la tabla `cartulina`
--
ALTER TABLE `cartulina`
  ADD CONSTRAINT `cartulina_ibfk_1` FOREIGN KEY (`id_flete`) REFERENCES `flete` (`id`),
  ADD CONSTRAINT `cartulina_ibfk_3` FOREIGN KEY (`id_gramaje`) REFERENCES `gramaje` (`id`);

--
-- Filtros para la tabla `egreso`
--
ALTER TABLE `egreso`
  ADD CONSTRAINT `egreso_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `egreso_ibfk_2` FOREIGN KEY (`id_pegadora`) REFERENCES `pegadora` (`id`),
  ADD CONSTRAINT `egreso_ibfk_3` FOREIGN KEY (`id_bolsa_kg`) REFERENCES `bolsa_kg` (`id`);

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `ingreso_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `ingreso_ibfk_2` FOREIGN KEY (`id_pegadora`) REFERENCES `pegadora` (`id`),
  ADD CONSTRAINT `ingreso_ibfk_3` FOREIGN KEY (`id_bolsa_kg`) REFERENCES `bolsa_kg` (`id`);

--
-- Filtros para la tabla `pago_pegadora`
--
ALTER TABLE `pago_pegadora`
  ADD CONSTRAINT `pago_pegadora_ibfk_1` FOREIGN KEY (`id_pegadora`) REFERENCES `pegadora` (`id`);

--
-- Filtros para la tabla `pegamentos`
--
ALTER TABLE `pegamentos`
  ADD CONSTRAINT `pegamentos_ibfk_1` FOREIGN KEY (`precio_dolar`) REFERENCES `dolar` (`id`),
  ADD CONSTRAINT `pegamentos_ibfk_2` FOREIGN KEY (`precio_kilo`) REFERENCES `kg` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
