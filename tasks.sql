-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-09-2015 a las 02:14:35
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tasks`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
  `id` int(11) NOT NULL,
  `fk_id_tarea` int(11) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `fk_id_tarea`, `path`) VALUES
(1, 44, 'uploads/imagenes/55f0b93449323gato.jpg'),
(2, 40, 'uploads/imagenes/55f0b5c35f44egato.jpg'),
(3, 40, 'uploads/imagenes/55f0b5c35f87dgato1.jpg'),
(4, 41, 'uploads/imagenes/55f0b861238a3gato.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
  `id` int(11) NOT NULL,
  `tarea` varchar(300) NOT NULL,
  `realizada` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id`, `tarea`, `realizada`) VALUES
(35, 't2', 0),
(36, 'Gato 1', 0),
(37, 'Gato 2', 0),
(38, 'Gato 3', 0),
(39, 'Tarea con muchas imagenes', 0),
(40, 'Tarea con muchas imagenes', 0),
(41, 'Tarea 1', 0),
(44, 'Tarea E', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_tarea` (`fk_id_tarea`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `fk_id_tarea` FOREIGN KEY (`fk_id_tarea`) REFERENCES `tarea` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
