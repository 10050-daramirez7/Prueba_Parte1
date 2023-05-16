-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2023 a las 22:01:46
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matriculacionvehicular`

CREATE DATABASE IF NOT EXISTS `matriculacionVehicular` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `matriculacionVehicular`;
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agencia`
--

CREATE TABLE `agencia` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `horainicio` time NOT NULL,
  `horafin` time NOT NULL,
  `foto` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `agencia`
--

INSERT INTO `agencia` (`id`, `descripcion`, `direccion`, `telefono`, `horainicio`, `horafin`, `foto`) VALUES
(1, 'Los Chillos', 'Gnral. Rumiñahui', '6054874', '00:00:00', '00:00:00', ''),
(2, 'Cotocollao', 'La prensa', '6048754', '00:00:00', '00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id`, `descripcion`) VALUES
(2, 'Negro'),
(3, 'Rojo'),
(4, 'Azul'),
(5, 'Plomo'),
(6, 'Verde'),
(7, 'Negro'),
(8, 'Plata'),
(9, 'Morado'),
(10, 'Naranja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `pais` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(16) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `foto` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `descripcion`, `pais`, `direccion`, `foto`) VALUES
(1, 'Chévrolet', 'USA', NULL, NULL),
(2, 'Fiat', 'Italia', NULL, NULL),
(4, 'Great Wall', 'China', NULL, NULL),
(5, 'Toyota', 'Japón', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `vehiculo` mediumint(8) UNSIGNED NOT NULL,
  `agencia` tinyint(3) UNSIGNED NOT NULL,
  `anio` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `placa` char(7) COLLATE utf8_spanish2_ci NOT NULL,
  `marca` smallint(5) UNSIGNED NOT NULL,
  `motor` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `chasis` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `combustible` enum('Gasolina','Diesel','Eléctrico') COLLATE utf8_spanish2_ci NOT NULL,
  `anio` year(4) NOT NULL,
  `color` smallint(5) UNSIGNED NOT NULL,
  `foto` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `avaluo` decimal(8,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `placa`, `marca`, `motor`, `chasis`, `combustible`, `anio`, `color`, `foto`, `avaluo`) VALUES
(5, 'PCH3465', 1, 'dede', 'Dede', 'Gasolina', 2017, 2, 'prkruMMZOugQ.jpg', '25415.00'),
(6, 'PHH2354', 1, 'sswe', 'eddede', 'Gasolina', 1962, 6, 'wDDhfbYRIxxN.jpg', '23541.36'),
(7, 'CHH3465', 5, 'edcdede', 'Dedede', 'Gasolina', 2017, 10, 'QaJKsieMgreb.jpg', '25412.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agencia`
--
ALTER TABLE `agencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehiculo` (`vehiculo`),
  ADD KEY `agencia` (`agencia`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca` (`marca`),
  ADD KEY `color` (`color`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agencia`
--
ALTER TABLE `agencia`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_agencia` FOREIGN KEY (`agencia`) REFERENCES `agencia` (`id`),
  ADD CONSTRAINT `matricula_vehiculo` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculo` (`id`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_color` FOREIGN KEY (`color`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_marca` FOREIGN KEY (`marca`) REFERENCES `marca` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;