-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2024 a las 06:06:26
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lote`
--
CREATE DATABASE IF NOT EXISTS `lote` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lote`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `id_lote` int(11) NOT NULL,
  `dueño` varchar(30) NOT NULL,
  `barrio` varchar(30) NOT NULL,
  `frente` varchar(20) NOT NULL,
  `ancho` varchar(20) NOT NULL,
  `cod_bar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`id_lote`, `dueño`, `barrio`, `frente`, `ancho`, `cod_bar`) VALUES
(1, 'Ohany', 'Caracoli', '22Mtrs', '33Mtrs', '65f132a4e49b95414'),
(2, 'Laura', 'Salado', '15Mtrs', '30Mtrs', '65f133297ca403932'),
(3, 'Andres', 'Vergel', '800Mtrs', '1200Mtrs', '65f1335d540a85795'),
(4, 'Nicoll', 'Ricaurte', '7Mtrs', '15Mtrs', '65f13387163622833'),
(5, 'Julian', 'Comfenalco', '56Mtrs', '92Mtrs', '65f133d6556264212'),
(6, 'Valentina', 'Jordan', '89Mtrs', '20Mtrs', '65f1342c6e86e3260');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id_lote`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `id_lote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
