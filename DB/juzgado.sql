-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2020 a las 07:09:26
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juzgado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `naturaleza` int(11) NOT NULL,
  `consecutivo` int(11) NOT NULL,
  `demandante` varchar(225) COLLATE utf8_spanish2_ci NOT NULL,
  `demandado` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fe_reparto` date NOT NULL,
  `fe_terminacion` date DEFAULT NULL,
  `novedad` int(11) DEFAULT NULL,
  `archivo` varchar(120) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `naturaleza`
--

CREATE TABLE `naturaleza` (
  `id_naturaleza` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` enum('Y','N') COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

CREATE TABLE `novedad` (
  `id_novedad` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` enum('Y','N') COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE latin1_spanish_ci NOT NULL,
  `activo` enum('Y','N') COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `perfil` int(11) NOT NULL,
  `usuario` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `pass` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `nom_comple` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `fec_creaci` datetime DEFAULT NULL,
  `fec_modifi` datetime DEFAULT NULL,
  `activo` enum('Y','N') COLLATE latin1_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vs_historial`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vs_historial` (
`naturaleza` varchar(120)
,`consecutivo` int(11)
,`demandante` varchar(225)
,`demandado` varchar(255)
,`fe_reparto` date
,`fe_terminacion` date
,`novedad` varchar(120)
,`archivo` varchar(120)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vs_historial`
--
DROP TABLE IF EXISTS `vs_historial`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vs_historial`  AS  select `b`.`nombre` AS `naturaleza`,`a`.`consecutivo` AS `consecutivo`,`a`.`demandante` AS `demandante`,`a`.`demandado` AS `demandado`,cast(`a`.`fe_reparto` as date) AS `fe_reparto`,cast(`a`.`fe_terminacion` as date) AS `fe_terminacion`,`c`.`nombre` AS `novedad`,`a`.`archivo` AS `archivo` from ((`historial` `a` join `naturaleza` `b` on(`a`.`naturaleza` = `b`.`id_naturaleza`)) left join `novedad` `c` on(`a`.`novedad` = `c`.`id_novedad`)) order by `a`.`consecutivo` desc ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`consecutivo`);

--
-- Indices de la tabla `naturaleza`
--
ALTER TABLE `naturaleza`
  ADD PRIMARY KEY (`id_naturaleza`);

--
-- Indices de la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD PRIMARY KEY (`id_novedad`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idperfil`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `consecutivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `naturaleza`
--
ALTER TABLE `naturaleza`
  MODIFY `id_naturaleza` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedad`
--
ALTER TABLE `novedad`
  MODIFY `id_novedad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idperfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
