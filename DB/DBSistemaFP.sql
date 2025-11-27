-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-11-2025 a las 02:06:40
-- Versión del servidor: 5.7.36
-- Versión de PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventarioudb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidades`
--

DROP TABLE IF EXISTS `comunidades`;
CREATE TABLE IF NOT EXISTS `comunidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `idDistrito` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDistrito` (`idDistrito`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comunidades`
--

INSERT INTO `comunidades` (`id`, `nombre`, `idDistrito`) VALUES
(1, 'Colonia Santa Lucia', 102),
(2, 'Residencial Simon Simon', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dimensiones`
--

DROP TABLE IF EXISTS `dimensiones`;
CREATE TABLE IF NOT EXISTS `dimensiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dimension` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dimensiones`
--

INSERT INTO `dimensiones` (`id`, `dimension`) VALUES
(1, 'Cognitiva'),
(3, 'Emocional y Psicológica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

DROP TABLE IF EXISTS `distritos`;
CREATE TABLE IF NOT EXISTS `distritos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `idMunicipio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMunicipio` (`idMunicipio`)
) ENGINE=MyISAM AUTO_INCREMENT=263 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id`, `nombre`, `idMunicipio`) VALUES
(1, 'Ahuachapán', 1),
(2, 'Apaneca', 1),
(3, 'Concepción de Ataco', 1),
(4, 'Tacuba', 1),
(5, 'Atiquizaya', 2),
(6, 'El Refugio', 2),
(7, 'San Lorenzo', 2),
(8, 'Turín', 2),
(9, 'Guaymango', 3),
(10, 'Jujutla', 3),
(11, 'San Francisco Menéndez', 3),
(12, 'San Pedro Puxtla', 3),
(13, 'Santa Ana', 4),
(14, 'Coatepeque', 5),
(15, 'El Congo', 5),
(16, 'Masahuat', 6),
(17, 'Metapán', 6),
(18, 'Santa Rosa Guachipilín', 6),
(19, 'Texistepeque', 6),
(20, 'Candelaria de la Frontera', 7),
(21, 'Chalchuapa', 7),
(22, 'El Porvenir', 7),
(23, 'San Antonio Pajonal', 7),
(24, 'San Sebastián Salitrillo', 7),
(25, 'Santiago de la Frontera', 7),
(26, 'Nahulingo', 8),
(27, 'San Antonio del Monte', 8),
(28, 'Santo Domingo de Guzmán', 8),
(29, 'Sonsonate', 8),
(30, 'Sonzacate', 8),
(31, 'Armenia', 9),
(32, 'Caluco', 9),
(33, 'Cuisnahuat', 9),
(34, 'Santa Isabel Ishuatán', 9),
(35, 'Izalco', 9),
(36, 'San Julián', 9),
(37, 'Juayúa', 10),
(38, 'Nahuizalco', 10),
(39, 'Salcoatitán', 10),
(40, 'Santa Catarina Masahuat', 10),
(41, 'Acajutla', 11),
(42, 'Agua Caliente', 12),
(43, 'Dulce Nombre de María', 12),
(44, 'El Paraíso', 12),
(45, 'La Reina', 12),
(46, 'Nueva Concepción', 12),
(47, 'San Fernando', 12),
(48, 'San Francisco Morazán', 12),
(49, 'San Rafael', 12),
(50, 'Santa Rita', 12),
(51, 'Tejutla', 12),
(52, 'Citalá', 13),
(53, 'San Ignacio', 13),
(54, 'La Palma', 13),
(55, 'Arcatao', 14),
(56, 'Azacualpa', 14),
(57, 'Comalapa', 14),
(58, 'Concepción Quezaltepeque', 14),
(59, 'Chalatenango', 14),
(60, 'El Carrizal', 14),
(61, 'La Laguna', 14),
(62, 'Las Vueltas', 14),
(63, 'Nombre de Jesús', 14),
(64, 'Nueva Trinidad', 14),
(65, 'Ojos de Agua', 14),
(66, 'Potonico', 14),
(67, 'San Antonio de la Cruz', 14),
(68, 'San Antonio Los Ranchos', 14),
(69, 'San Isidro Labrador', 14),
(70, 'San Francisco Lempa', 14),
(71, 'San José Cancasque / Cancasque', 14),
(72, 'San José Las Flores / Las Flores', 14),
(73, 'San Luis del Carmen', 14),
(74, 'San Miguel de Mercedes', 14),
(75, 'Ciudad Arce', 15),
(76, 'San Juan Opico', 15),
(77, 'Chiltiupán', 16),
(78, 'Jicalapa', 16),
(79, 'La Libertad', 16),
(80, 'Tamanique', 16),
(81, 'Teotepeque', 16),
(82, 'Antiguo Cuscatlán', 17),
(83, 'Huizúcar', 17),
(84, 'Nuevo Cuscatlán', 17),
(85, 'San José Villanueva', 17),
(86, 'Zaragoza', 17),
(87, 'Quezaltepeque', 18),
(88, 'San Matías', 18),
(89, 'San Pablo Tacachico', 18),
(90, 'Colón', 19),
(91, 'Jayaque', 19),
(92, 'Sacacoyo', 19),
(93, 'Talnique', 19),
(94, 'Tepecoyo', 19),
(95, 'Comasagua', 20),
(96, 'Santa Tecla antes: Nueva San Salvador', 20),
(97, 'Ayutuxtepeque', 21),
(98, 'Cuscatancingo', 21),
(99, 'Mejicanos', 21),
(100, 'San Salvador', 21),
(101, 'Delgado', 21),
(102, 'Ilopango', 22),
(103, 'San Martín', 22),
(104, 'Soyapango', 22),
(105, 'Tonacatepeque', 22),
(106, 'Aguilares', 23),
(107, 'El Paisnal', 23),
(108, 'Guazapa', 23),
(109, 'Apopa', 24),
(110, 'Nejapa', 24),
(111, 'Panchimalco', 25),
(112, 'Rosario de Mora', 25),
(113, 'San Marcos', 25),
(114, 'Santiago Texacuangos', 25),
(115, 'Santo Tomás', 25),
(116, 'Oratorio de Concepción', 26),
(117, 'San Bartolomé Perulapía', 26),
(118, 'San José Guayabal', 26),
(119, 'San Pedro Perulapán', 26),
(120, 'Suchitoto', 26),
(121, 'Candelaria', 27),
(122, 'Cojutepeque', 27),
(123, 'El Carmen', 27),
(124, 'El Rosario', 27),
(125, 'Monte San Juan', 27),
(126, 'San Cristóbal', 27),
(127, 'San Rafael Cedros', 27),
(128, 'San Ramón', 27),
(129, 'Santa Cruz Analquito', 27),
(130, 'Santa Cruz Michapa', 27),
(131, 'Tenancingo', 27),
(132, 'El Rosario / Rosario de La Paz', 28),
(133, 'Jerusalén', 28),
(134, 'Mercedes La Ceiba', 28),
(135, 'Paraíso de Osorio', 28),
(136, 'San Antonio Masahuat', 28),
(137, 'San Emigdio', 28),
(138, 'San Juan Tepezontes', 28),
(139, 'San Miguel Tepezontes', 28),
(140, 'San Pedro Nonualco', 28),
(141, 'Santa María Ostuma', 28),
(142, 'Santiago Nonualco', 28),
(143, 'San Luis La Herradura', 28),
(144, 'San Juan Nonualco', 29),
(145, 'San Rafael Obrajuelo', 29),
(146, 'Zacatecoluca', 29),
(147, 'Cuyultitán', 30),
(148, 'Olocuilta', 30),
(149, 'San Francisco Chinameca', 30),
(150, 'San Juan Talpa', 30),
(151, 'San Luis Talpa', 30),
(152, 'San Pedro Masahuat', 30),
(153, 'Tapalhuaca', 30),
(154, 'Dolores / Villa Dolores', 31),
(155, 'Guacotecti', 31),
(156, 'San Isidro', 31),
(157, 'Sensuntepeque', 31),
(158, 'Victoria', 31),
(159, 'Cinquera', 32),
(160, 'Ilobasco', 32),
(161, 'Jutiapa', 32),
(162, 'Tejutepeque', 32),
(163, 'Apastepeque', 33),
(164, 'San Esteban Catarina', 33),
(165, 'San Ildefonso', 33),
(166, 'San Lorenzo', 33),
(167, 'San Sebastián', 33),
(168, 'Santa Clara', 33),
(169, 'Santo Domingo', 33),
(170, 'Guadalupe', 34),
(171, 'San Cayetano Istepeque', 34),
(172, 'San Vicente', 34),
(173, 'Tecoluca', 34),
(174, 'Tepetitán', 34),
(175, 'Verapaz', 34),
(176, 'California', 35),
(177, 'Concepción Batres', 35),
(178, 'Ereguayquín', 35),
(179, 'Jucuarán', 35),
(180, 'Ozatlán', 35),
(181, 'Usulután', 35),
(182, 'San Dionisio', 35),
(183, 'Santa Elena', 35),
(184, 'Santa María', 35),
(185, 'Tecapán', 35),
(186, 'Alegría', 36),
(187, 'Berlín', 36),
(188, 'El Triunfo', 36),
(189, 'Estanzuelas', 36),
(190, 'Jucuapa', 36),
(191, 'Mercedes Umaña', 36),
(192, 'Nueva Granada', 36),
(193, 'San Buenaventura', 36),
(194, 'Santiago de María', 36),
(195, 'Jiquilisco', 37),
(196, 'Puerto El Triunfo', 37),
(197, 'San Agustín', 37),
(198, 'San Francisco Javier', 37),
(199, 'Comacarán', 38),
(200, 'Moncagua', 38),
(201, 'Chirilagua', 38),
(202, 'Quelepa', 38),
(203, 'San Miguel', 38),
(204, 'Uluazapa', 38),
(205, 'Carolina', 39),
(206, 'Ciudad Barrios', 39),
(207, 'Chapeltique', 39),
(208, 'Nuevo Edén de San Juan', 39),
(209, 'San Antonio del Mosco', 39),
(210, 'San Gerardo', 39),
(211, 'San Luis de La Reina', 39),
(212, 'Sesori', 39),
(213, 'Chinameca', 40),
(214, 'El Tránsito', 40),
(215, 'Lolotique', 40),
(216, 'Nueva Guadalupe', 40),
(217, 'San Jorge', 40),
(218, 'San Rafael Oriente', 40),
(219, 'Arambala', 41),
(220, 'Cacaopera', 41),
(221, 'Corinto', 41),
(222, 'El Rosario', 41),
(223, 'Joateca', 41),
(224, 'Jocoaitique', 41),
(225, 'Meanguera', 41),
(226, 'Perquín', 41),
(227, 'San Fernando', 41),
(228, 'San Isidro', 41),
(229, 'Torola', 41),
(230, 'Chilanga', 42),
(231, 'Delicias de Concepción', 42),
(232, 'El Divisadero', 42),
(233, 'Gualococti', 42),
(234, 'Guatajiagua', 42),
(235, 'Jocoro', 42),
(236, 'Lolotiquillo', 42),
(237, 'Osicala', 42),
(238, 'San Carlos', 42),
(239, 'San Francisco Gotera', 42),
(240, 'San Simón', 42),
(241, 'Sensembra', 42),
(242, 'Sociedad', 42),
(243, 'Yamabal', 42),
(244, 'Yoloaiquín', 42),
(245, 'Anamorós', 43),
(246, 'Bolívar', 43),
(247, 'Concepción de Oriente', 43),
(248, 'El Sauce', 43),
(249, 'Lislique', 43),
(250, 'Nueva Esparta', 43),
(251, 'Pasaquina', 43),
(252, 'Polorós', 43),
(253, 'San José La Fuente', 43),
(254, 'Santa Rosa de Lima', 43),
(255, 'Conchagua', 44),
(256, 'El Carmen', 44),
(257, 'Intipucá', 44),
(258, 'La Unión', 44),
(259, 'Meanguera del Golfo', 44),
(260, 'San Alejo', 44),
(261, 'Yayantique', 44),
(262, 'Yucuaiquín', 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

DROP TABLE IF EXISTS `evaluaciones`;
CREATE TABLE IF NOT EXISTS `evaluaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `tipo` enum('Inicial','Seguimiento','Final') NOT NULL,
  `estado` enum('excelente','bueno','medio','critico') DEFAULT NULL,
  `idDimension` int(11) DEFAULT NULL,
  `idFicha` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idIndicador` int(11) NOT NULL,
  `puntajeBruto` int(11) NOT NULL DEFAULT '0',
  `puntajeMaximo` int(11) NOT NULL DEFAULT '0',
  `puntajePorcentaje` decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idDimension` (`idDimension`),
  KEY `idFicha` (`idFicha`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`id`, `fecha`, `tipo`, `estado`, `idDimension`, `idFicha`, `idUsuario`, `idIndicador`, `puntajeBruto`, `puntajeMaximo`, `puntajePorcentaje`) VALUES
(1, '2025-11-24 08:03:00', 'Inicial', 'critico', 1, 1, 1, 6, 2, 5, 40.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones_respuestas`
--

DROP TABLE IF EXISTS `evaluaciones_respuestas`;
CREATE TABLE IF NOT EXISTS `evaluaciones_respuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEvaluacion` int(11) NOT NULL,
  `idPregunta` int(11) NOT NULL,
  `idRespuesta` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEvaluacion` (`idEvaluacion`),
  KEY `idPregunta` (`idPregunta`),
  KEY `idRespuesta` (`idRespuesta`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evaluaciones_respuestas`
--

INSERT INTO `evaluaciones_respuestas` (`id`, `idEvaluacion`, `idPregunta`, `idRespuesta`) VALUES
(8, 1, 3, 5),
(7, 1, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichasbeneficiarios`
--

DROP TABLE IF EXISTS `fichasbeneficiarios`;
CREATE TABLE IF NOT EXISTS `fichasbeneficiarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` enum('Masculino','Femenino','Otro') NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaSalida` date DEFAULT NULL,
  `idComunidad` int(11) DEFAULT NULL,
  `idPrograma` int(11) DEFAULT NULL,
  `dui` varchar(10) NOT NULL,
  `nit` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `nombre_responsable` varchar(250) NOT NULL,
  `apellido_responsable` varchar(250) NOT NULL,
  `dui_responsable` varchar(100) NOT NULL,
  `telefono_responsable` varchar(100) NOT NULL,
  `correo_responsable` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idComunidad` (`idComunidad`),
  KEY `idPrograma` (`idPrograma`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fichasbeneficiarios`
--

INSERT INTO `fichasbeneficiarios` (`id`, `nombres`, `apellidos`, `fechaNacimiento`, `genero`, `fechaIngreso`, `fechaSalida`, `idComunidad`, `idPrograma`, `dui`, `nit`, `telefono`, `nombre_responsable`, `apellido_responsable`, `dui_responsable`, `telefono_responsable`, `correo_responsable`) VALUES
(1, 'jose Gerardo', 'marroquin vasquez', '1997-04-07', 'Masculino', '2025-11-21', NULL, 1, 3, '055094753', '0614-070497-123-1', '75668878', 'gerardo', 'marroquin', '055094753', '75668878', 'gerardo.marrroquin@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadores`
--

DROP TABLE IF EXISTS `indicadores`;
CREATE TABLE IF NOT EXISTS `indicadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `idDimension` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idDimension` (`idDimension`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `indicadores`
--

INSERT INTO `indicadores` (`id`, `nombre`, `idDimension`) VALUES
(5, 'Estado de ánimo general', 3),
(6, 'Nivel de orientación', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

DROP TABLE IF EXISTS `municipios`;
CREATE TABLE IF NOT EXISTS `municipios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `nombre`) VALUES
(1, 'Ahuachapán Centro'),
(2, 'Ahuachapán Norte'),
(3, 'Ahuachapán Sur'),
(4, 'Santa Ana Centro'),
(5, 'Santa Ana Este'),
(6, 'Santa Ana Norte'),
(7, 'Santa Ana Oeste'),
(8, 'Sonsonate Centro'),
(9, 'Sonsonate Este'),
(10, 'Sonsonate Norte'),
(11, 'Sonsonate Oeste'),
(12, 'Chalatenango Centro'),
(13, 'Chalatenango Norte'),
(14, 'Chalatenango Sur'),
(15, 'La Libertad Centro'),
(16, 'La Libertad Costa'),
(17, 'La Libertad Este'),
(18, 'La Libertad Norte'),
(19, 'La Libertad Oeste'),
(20, 'La Libertad Sur'),
(21, 'San Salvador Centro'),
(22, 'San Salvador Este'),
(23, 'San Salvador Norte'),
(24, 'San Salvador Oeste'),
(25, 'San Salvador Sur'),
(26, 'Cuscatlán Norte'),
(27, 'Cuscatlán Sur'),
(28, 'La Paz Centro'),
(29, 'La Paz Este'),
(30, 'La Paz Oeste'),
(31, 'Cabañas Este'),
(32, 'Cabañas Oeste'),
(33, 'San Vicente Norte'),
(34, 'San Vicente Sur'),
(35, 'Usulután Este'),
(36, 'Usulután Norte'),
(37, 'Usulután Oeste'),
(38, 'San Miguel Centro'),
(39, 'San Miguel Norte'),
(40, 'San Miguel Oeste'),
(41, 'Morazán Norte'),
(42, 'Morazán Sur'),
(43, 'La Unión Norte'),
(44, 'La Unión Sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `idPermiso` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePermiso` varchar(45) NOT NULL,
  `idRol` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPermiso`),
  KEY `idRol` (`idRol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(600) NOT NULL,
  `idIndicador` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idIndicador` (`idIndicador`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `idIndicador`) VALUES
(1, '¿Sabe en qué día estamos?', 6),
(3, '¿Dónde se encuentra?', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

DROP TABLE IF EXISTS `programas`;
CREATE TABLE IF NOT EXISTS `programas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `nombre`) VALUES
(1, 'Programa1'),
(3, 'Programa 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE IF NOT EXISTS `respuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(250) NOT NULL,
  `puntuacion` decimal(12,2) NOT NULL,
  `interpretacion` varchar(250) NOT NULL,
  `idPregunta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idPregunta` (`idPregunta`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `respuesta`, `puntuacion`, `interpretacion`, `idPregunta`) VALUES
(1, 'Sí, con frecuencia o de forma constante editado', 1.00, 'Es porque se siente raro', 4),
(2, 'No, la mayoría del tiempo me siento con esperanza', 2.00, 'Bienestar moderado', 4),
(5, 'respuesta 1', 1.00, 'algo 1', 3),
(6, 'respuesta 2', 3.00, 'algo 2', 3),
(7, 'respuesta 1', 1.00, 'algo 1', 1),
(8, 'respuesta 2', 2.00, 'algo 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Técnico'),
(3, 'Visor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporespuestas`
--

DROP TABLE IF EXISTS `tiporespuestas`;
CREATE TABLE IF NOT EXISTS `tiporespuestas` (
  `idTipoRespuesta` int(11) NOT NULL AUTO_INCREMENT,
  `nombreTipoRespuesta` varchar(100) NOT NULL,
  PRIMARY KEY (`idTipoRespuesta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idRol` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `idRol`, `created_at`, `updated_at`) VALUES
(1, 'Gerardo Marroquin', 'admin@hotmail.com', NULL, '$2y$10$uNrwV7rW2Dc1hHTvVJPhyO.DLS/t.sPpj435XwZ4BzWzryhUhvqpe', 'OskMbrhdCckmTeZISvVh0fby5F1lTlkmxdLiuKAVO76lh9ljS57GpX1HaSM0', 1, '2024-04-19 10:56:25', '2024-04-19 10:56:25'),
(2, 'Sofia Rojas', 'srojas@hotmail.com', NULL, '$2y$10$hIInrVhQH4cJUKf8C6jl8.3.yceRaszvcrHa4ETPE73zjbxV7Mi0K', NULL, 2, '2025-11-24 08:39:38', '2025-11-24 08:39:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
