-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2023 a las 18:47:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ropa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calzado femenino`
--

CREATE TABLE `calzado femenino` (
  `id_calzado_femenino` int(11) NOT NULL,
  `modelo` varchar(11) NOT NULL,
  `disponibilidad` varchar(45) DEFAULT NULL,
  `Product` varchar(45) NOT NULL,
  `Precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calzado femenino`
--

INSERT INTO `calzado femenino` (`id_calzado_femenino`, `modelo`, `disponibilidad`, `Product`, `Precio`) VALUES
(1, 'nikeSB', NULL, 'nikeSB femenino', 54),
(2, 'NIKE CORTEZ', '5', 'NIKE CORTEZ femenino', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calzado masculino`
--

CREATE TABLE `calzado masculino` (
  `id_calzado_masculino` int(11) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `precio` float NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calzado masculino`
--

INSERT INTO `calzado masculino` (`id_calzado_masculino`, `modelo`, `precio`, `disponibilidad`) VALUES
(1, 'nikeSB', 54, 0),
(2, 'nikeSB', 54, 0),
(3, 'nikeSB', 54, 1),
(4, 'NIKE CORTEZ', 100, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marcas` int(11) NOT NULL,
  `marcas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marcas`, `marcas`) VALUES
(1, 'nike'),
(2, 'addidas'),
(3, 'jordan'),
(4, 'puma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remera femenina`
--

CREATE TABLE `remera femenina` (
  `id_remera_femenino` int(11) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `precio` int(11) NOT NULL,
  `disponibilidad` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `remera femenina`
--

INSERT INTO `remera femenina` (`id_remera_femenino`, `modelo`, `precio`, `disponibilidad`) VALUES
(1, 'nikeSB', 20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remera maculina`
--

CREATE TABLE `remera maculina` (
  `id_remera_masculino` int(11) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `precio` int(11) NOT NULL,
  `disponibilidad` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `remera maculina`
--

INSERT INTO `remera maculina` (`id_remera_masculino`, `modelo`, `precio`, `disponibilidad`) VALUES
(1, 'nikeSB', 20, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calzado femenino`
--
ALTER TABLE `calzado femenino`
  ADD PRIMARY KEY (`id_calzado_femenino`);

--
-- Indices de la tabla `calzado masculino`
--
ALTER TABLE `calzado masculino`
  ADD PRIMARY KEY (`id_calzado_masculino`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marcas`);

--
-- Indices de la tabla `remera femenina`
--
ALTER TABLE `remera femenina`
  ADD PRIMARY KEY (`id_remera_femenino`);

--
-- Indices de la tabla `remera maculina`
--
ALTER TABLE `remera maculina`
  ADD PRIMARY KEY (`id_remera_masculino`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calzado femenino`
--
ALTER TABLE `calzado femenino`
  MODIFY `id_calzado_femenino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calzado masculino`
--
ALTER TABLE `calzado masculino`
  MODIFY `id_calzado_masculino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marcas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `remera femenina`
--
ALTER TABLE `remera femenina`
  MODIFY `id_remera_femenino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `remera maculina`
--
ALTER TABLE `remera maculina`
  MODIFY `id_remera_masculino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calzado femenino`
--
ALTER TABLE `calzado femenino`
  ADD CONSTRAINT `calzado femenino_ibfk_1` FOREIGN KEY (`id_calzado_femenino`) REFERENCES `marcas` (`id_marcas`);

--
-- Filtros para la tabla `calzado masculino`
--
ALTER TABLE `calzado masculino`
  ADD CONSTRAINT `calzado masculino_ibfk_1` FOREIGN KEY (`id_calzado_masculino`) REFERENCES `marcas` (`id_marcas`);

--
-- Filtros para la tabla `remera femenina`
--
ALTER TABLE `remera femenina`
  ADD CONSTRAINT `remera femenina_ibfk_1` FOREIGN KEY (`id_remera_femenino`) REFERENCES `marcas` (`id_marcas`);

--
-- Filtros para la tabla `remera maculina`
--
ALTER TABLE `remera maculina`
  ADD CONSTRAINT `remera maculina_ibfk_1` FOREIGN KEY (`id_remera_masculino`) REFERENCES `marcas` (`id_marcas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
