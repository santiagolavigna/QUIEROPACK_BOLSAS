-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2019 a las 13:56:57
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

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
(1, 'GUILLOTINADO', '1.000', '1.000', '3.000', 1000),
(2, 'GUILLOTINADO', '0.000', '0.000', '0.000', 1000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gillotinado`
--
ALTER TABLE `gillotinado`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gillotinado`
--
ALTER TABLE `gillotinado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
