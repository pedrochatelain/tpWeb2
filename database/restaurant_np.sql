-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2019 a las 00:04:15
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurant_np`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `tipo`, `descripcion`) VALUES
(112, 'ENTRADA', 'INTEGER DIGNISSIM NISL NEC MI BIBENDUM, ID MAXIMUS DUI FACILISIS. IN ET LEO EU NEQUE POSUERE LOBORTIS. NULLAM EGET PLACERAT TELLUS. NAM MOLESTIE SIT AMET TELLUS QUIS VENENATIS. QUISQUE LACINIA CONVALLIS FERMENTUM. DONEC PRETIUM BIBENDUM NISI. CRAS NON ELEIFEND ARCU, VEL LAOREET MI. QUISQUE VESTIBULUM FERMENTUM VELIT ID FERMENTUM.'),
(114, 'PLATO PRINCIPAL', 'VIVAMUS UT ENIM ALIQUAM, FACILISIS LEO SIT AMET, SEMPER DOLOR. INTEGER SIT AMET LACINIA EX. DONEC BLANDIT MAXIMUS ENIM VEL GRAVIDA. VIVAMUS ULLAMCORPER NUNC IN CONGUE CURSUS. MAURIS NEC SEMPER TELLUS. FUSCE SAGITTIS ULTRICES POSUERE. AENEAN ELEIFEND TINCIDUNT MASSA EU ALIQUAM. NAM SOLLICITUDIN EX DIGNISSIM LIBERO SOLLICITUDIN, VOLUTPAT CONGUE DIAM LAOREET.'),
(118, 'POSTRE', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `id_plato` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `vegetariano` text NOT NULL,
  `tacc` text NOT NULL,
  `vegano` text NOT NULL,
  `precio` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`id_plato`, `nombre`, `vegetariano`, `tacc`, `vegano`, `precio`, `id_categoria`) VALUES
(319, 'LEMON PIE', 'APTO', 'CONTIENE', 'NO APTO', 500, 118),
(320, 'ARROLLADO DE POLLO', 'NO APTO', 'NO CONTIENE', 'NO APTO', 639, 114);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `administrador` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `administrador`) VALUES
(3, 'pedrochatelain@gmail.com', '$2y$10$cuWaES49egLeaU2sqHPSnO/RuKJUzKk13/y7ad.sx9tzpWXj5pquq', 1),
(4, 'guest', '$2y$10$1iYHVCWY26Zkt/oYfcT3uuElqBTCbexM7NRq3IiLbrHJFuBQcwJsu', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`id_plato`),
  ADD KEY `fk_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `id_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `plato`
--
ALTER TABLE `plato`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
