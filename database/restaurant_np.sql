-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2019 a las 21:14:36
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
(113, 'POSTRE', 'LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT. SED NEC PURUS VITAE URNA VEHICULA VEHICULA NEC ID MI. NULLAM SIT AMET EST ARCU. ALIQUAM ID CONSECTETUR AUGUE. QUISQUE VEL MASSA FRINGILLA, CONDIMENTUM MASSA ET, VESTIBULUM NULLA. DONEC VEL EX SEMPER, DICTUM METUS LOBORTIS, TEMPOR TORTOR. SED LACINIA LACINIA RISUS. FUSCE FACILISIS FEUGIAT EUISMOD. FUSCE QUAM URNA, FRINGILLA VITAE AUCTOR ET, EUISMOD AT LOREM. PHASELLUS DAPIBUS, MI ET MATTIS VESTIBULUM, NISL AUGUE HENDRERIT ERAT, SIT AMET FEUGIAT DUI ELIT VEL DIAM.'),
(114, 'PLATO PRINCIPAL', 'VIVAMUS UT ENIM ALIQUAM, FACILISIS LEO SIT AMET, SEMPER DOLOR. INTEGER SIT AMET LACINIA EX. DONEC BLANDIT MAXIMUS ENIM VEL GRAVIDA. VIVAMUS ULLAMCORPER NUNC IN CONGUE CURSUS. MAURIS NEC SEMPER TELLUS. FUSCE SAGITTIS ULTRICES POSUERE. AENEAN ELEIFEND TINCIDUNT MASSA EU ALIQUAM. NAM SOLLICITUDIN EX DIGNISSIM LIBERO SOLLICITUDIN, VOLUTPAT CONGUE DIAM LAOREET.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `id_plato` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
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

INSERT INTO `plato` (`id_plato`, `tipo`, `nombre`, `vegetariano`, `tacc`, `vegano`, `precio`, `id_categoria`) VALUES
(302, 'POSTRE', 'LEMON PIE', 'APTO', 'NO CONTIENE', 'APTO', 345, 113),
(303, 'POSTRE', 'TIRAMISU', 'NO APTO', 'CONTIENE', 'APTO', 541, 113);

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
(1, 'guest', '', 0),
(3, 'pedrochatelain@gmail.com', '$2y$10$cuWaES49egLeaU2sqHPSnO/RuKJUzKk13/y7ad.sx9tzpWXj5pquq', 1);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `id_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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