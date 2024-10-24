-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-10-2024 a las 17:58:53
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reporte_fallas`
--
CREATE DATABASE IF NOT EXISTS `reporte_fallas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `reporte_fallas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compresores`
--

DROP TABLE IF EXISTS `compresores`;
CREATE TABLE IF NOT EXISTS `compresores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('En uso','Fuera de uso','En Reparacion') DEFAULT 'En uso',
  `observaciones` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  `fecha_fuera_uso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `compresores`
--

INSERT INTO `compresores` (`id`, `nombre`, `marca`, `modelo`, `codigo`, `fecha_ingreso`, `estado`, `observaciones`, `imagen_url`, `fecha_fuera_uso`) VALUES
(2, 'Compresor de dos fases', 'REAVEL', 'Sa', 'H-LT-C-01', '2012-09-13', 'Fuera de uso', '', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cortadora`
--

DROP TABLE IF EXISTS `cortadora`;
CREATE TABLE IF NOT EXISTS `cortadora` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('En uso','Fuera de uso','En Reparacion') DEFAULT 'En uso',
  `observaciones` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  `fecha_fuera_uso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cortadora`
--

INSERT INTO `cortadora` (`id`, `nombre`, `marca`, `modelo`, `codigo`, `fecha_ingreso`, `estado`, `observaciones`, `imagen_url`, `fecha_fuera_uso`) VALUES
(5, 'Sierra mecánica eléctrica', 'Elliot', 'S.S 1968', 'H-ME-CM0109', '2012-08-23', 'Fuera de uso', 'Falta hoja de la sierra', '', NULL),
(4, 'Sierra', 'Sabi S.A.', 'SH260', 'H-MH-SO1O1', '2012-01-21', 'En uso', '', '', NULL),
(6, 'Cortadora de lamina', '-----------', '', 'H-LT-CI-01', '2012-09-13', 'En uso', '', '', NULL),
(7, 'Cortadora de lamina', 'Tennsmith', 'T5216', 'H-OB-CL01', '2012-09-13', 'En uso', 'Necesita limpieza', '', NULL),
(8, 'Cortadora de lámina hidráulica ', '--------', '', 'H-ME-CLH01', '2012-09-05', 'En uso', '', '', NULL),
(9, 'Sierra alternativa', '--------', '', 'H-ME-SA01', '2012-09-05', 'Fuera de uso', 'Cables desconectados y hace falta sierra', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dobladoras`
--

DROP TABLE IF EXISTS `dobladoras`;
CREATE TABLE IF NOT EXISTS `dobladoras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('En uso','Fuera de uso','En Reparacion') DEFAULT 'En uso',
  `observaciones` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  `fecha_fuera_uso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `dobladoras`
--

INSERT INTO `dobladoras` (`id`, `nombre`, `marca`, `modelo`, `codigo`, `fecha_ingreso`, `estado`, `observaciones`, `imagen_url`, `fecha_fuera_uso`) VALUES
(1, 'Dobladora Edwards', 'Edwards', '', 'H-OB-DG01', '2012-09-12', 'En uso', 'Necesita ajuste de manivela', '', NULL),
(2, 'Dobladora pequeña', '-----------', '', 'H-OB-DP01', '2012-09-12', 'En uso', 'Necesita engrase y limpieza', '', NULL),
(3, 'Dobladora mediana', 'Tennsmith', 'SR36', 'H-OB-TL04', '2012-09-12', 'En uso', '', '', NULL),
(4, 'Dobladora Elite', 'Elite', '', 'H-ME-AB01', '2012-09-12', 'En uso', 'Fuera de uso y sucia', '', NULL),
(5, 'Dobladora Keetona', 'Keetona', '', 'H-ME-DL0105', '2012-08-23', 'En uso', '', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esmeriles`
--

DROP TABLE IF EXISTS `esmeriles`;
CREATE TABLE IF NOT EXISTS `esmeriles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('En uso','Fuera de uso','En Reparacion') DEFAULT 'En uso',
  `observaciones` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  `fecha_fuera_uso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `esmeriles`
--

INSERT INTO `esmeriles` (`id`, `nombre`, `marca`, `modelo`, `codigo`, `fecha_ingreso`, `estado`, `observaciones`, `imagen_url`, `fecha_fuera_uso`) VALUES
(1, 'Esmeril Egor', 'Egor', '', 'H-ME-EE01', '2012-09-05', 'Fuera de uso', 'No funciona por falta de cables eléctricos', '', NULL),
(2, 'Esmeril Wisota', 'Wisota', 'E-1010L', 'H-ME-EW01', '2012-09-05', 'Fuera de uso', 'Se encuentra sucia', '', NULL),
(3, 'Esmeril Bench Grinder', 'Bench Grinder', 'S/100', 'H-AS-RB0106', '2012-08-23', 'En uso', '', '', NULL),
(4, 'Esmeril Wisota', 'Wisota', 'E-1010L', 'H-AS-RW0307', '2012-08-23', 'En uso', '', '', NULL),
(5, 'Esmeril Freyot Tool', 'Freyot Tool', 'S/10C', 'H-SE-F-01', '2012-09-13', 'En uso', '', '', NULL),
(6, 'Esmeril Wisota', 'Wisota', 'E1016', 'H-SE-W-01', '2012-09-13', 'En uso', '', '', NULL),
(7, 'Esmeril Wisota', 'Wisota', 'E1016', 'H-SE-W-02', '2012-09-13', 'En uso', '', '', NULL),
(8, 'Esmeril Wisota', 'Wisota', 'E-1010L', 'H-ME-MG0107', '2012-08-23', 'En uso', '', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fresadoras`
--

DROP TABLE IF EXISTS `fresadoras`;
CREATE TABLE IF NOT EXISTS `fresadoras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('En uso','Fuera de uso','En Reparacion') DEFAULT 'En uso',
  `observaciones` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  `fecha_fuera_uso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `fresadoras`
--

INSERT INTO `fresadoras` (`id`, `nombre`, `marca`, `modelo`, `codigo`, `fecha_ingreso`, `estado`, `observaciones`, `imagen_url`, `fecha_fuera_uso`) VALUES
(1, 'Fresadora', 'Adcok Shipley', '2E', 'H-MH-F01O1', '2012-01-21', 'En uso', 'No funciona bomba de refrigerante. ', '', NULL),
(2, 'Taladro Fresador', 'Erlo', 'TF-30', 'H-MH-TF01O2', '2012-01-21', 'En uso', '', '', NULL),
(3, 'Fresadora', 'Lagun', 'LT-2S', 'H-MH-F01O3', '2012-01-21', 'Fuera de uso', 'Faltan fajas.', '', NULL),
(4, 'Fresadora Vertical', 'Elliot', '', 'H-MH-F01O4', '2012-01-21', 'En uso', '', '', NULL),
(5, 'Fresadora Horizontal', 'MC', '', 'H-MH-F01O5', '2012-01-21', 'En uso', '', '', NULL),
(6, 'Fresadora Horizontal', 'Elliot', '', 'H-MH-F01O6', '2012-01-21', 'En uso', '', '', NULL),
(7, 'Fresadora', 'Índex', '847', 'H-MH-F01O7', '2012-01-21', 'En uso', '', '', NULL),
(8, 'Fresadora ', 'Lagun', '', 'H-ME-FD0101', '2012-08-20', 'En uso', '', '', NULL),
(9, 'Fresadora', 'Beaverpal', 'Pal 12468', 'H-ME-BV0126', '2012-08-23', 'En Reparacion', '', '', NULL),
(10, 'Fresadora Beaver', 'Beaver ', 'Pal 12468', 'H-ME-FB01', '2012-09-05', 'Fuera de uso', 'Falta de caja de velocidades ', '', NULL),
(11, 'Fresadora Lacun', '-----------', '', 'H-ME-FL01', '2012-09-05', 'En uso', '', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guillotinas`
--

DROP TABLE IF EXISTS `guillotinas`;
CREATE TABLE IF NOT EXISTS `guillotinas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('En uso','Fuera de uso','En Reparacion') DEFAULT 'En uso',
  `observaciones` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  `fecha_fuera_uso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `guillotinas`
--

INSERT INTO `guillotinas` (`id`, `nombre`, `marca`, `modelo`, `codigo`, `fecha_ingreso`, `estado`, `observaciones`, `imagen_url`, `fecha_fuera_uso`) VALUES
(1, 'Guillotina Edwards', 'Edwards', '', 'H-OB-GT01', '2012-09-12', 'En uso', 'Necesita engrase y limpieza', '', NULL),
(2, 'Guillotina hidraulica ', '------', '', 'H-ME-GM0106', '2012-08-23', 'En Reparacion', 'Sucia ', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_fallas`
--

DROP TABLE IF EXISTS `historial_fallas`;
CREATE TABLE IF NOT EXISTS `historial_fallas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_equipo` int DEFAULT NULL,
  `descripcion_falla` text,
  `fecha_hora` datetime DEFAULT NULL,
  `prioridad` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_equipo` (`id_equipo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `limadoras`
--

DROP TABLE IF EXISTS `limadoras`;
CREATE TABLE IF NOT EXISTS `limadoras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('En uso','Fuera de uso','En Reparacion') DEFAULT 'En uso',
  `observaciones` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  `fecha_fuera_uso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `limadoras`
--

INSERT INTO `limadoras` (`id`, `nombre`, `marca`, `modelo`, `codigo`, `fecha_ingreso`, `estado`, `observaciones`, `imagen_url`, `fecha_fuera_uso`) VALUES
(1, 'Limadora Sacia', 'Sacia', 'L/450-E', 'H-MH-LS-13', '2012-09-13', 'Fuera de uso', 'Problema sistema eléctrico', '', NULL),
(2, 'Limadora Sacia', 'Sacia', 'L/450-E', 'H-MH-LS-14', '2012-09-13', 'En uso', '', '', NULL),
(3, 'Limadora Elliot', 'Elliot', '14M', 'H-MH-LE-16', '2012-09-13', 'En uso', '', '', NULL),
(4, 'Limadora Elliot', 'Elliot', '14M', 'H-MH-LE-17', '2012-09-13', 'En uso', '', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motores`
--

DROP TABLE IF EXISTS `motores`;
CREATE TABLE IF NOT EXISTS `motores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('En uso','Fuera de uso','En Reparacion') DEFAULT 'En uso',
  `observaciones` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  `fecha_fuera_uso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `motores`
--

INSERT INTO `motores` (`id`, `nombre`, `marca`, `modelo`, `codigo`, `fecha_ingreso`, `estado`, `observaciones`, `imagen_url`, `fecha_fuera_uso`) VALUES
(2, 'Motor Trifásico ', 'Singer', 'Clutch Motor', 'HLE-MSC-02', '2012-08-23', 'En uso', '', '', NULL),
(3, 'Motor Trifásico ', 'Singer', 'Clutch Motor', 'HLE-MSC-01', '2012-08-23', 'En uso', '', '', NULL),
(4, 'Motor Trifásico ', 'Singer', 'Electric Transmitter', 'HLE-MST-01', '2012-08-23', 'En uso', '', '', NULL),
(5, 'Motor Trifásico ', 'AMCO', '', 'HLE-MAm-01', '2012-08-21', 'En uso', '', '', NULL),
(6, 'Motor Trifásico ', 'AMCO', '', 'HLE-MAm-02', '2012-08-23', 'En uso', '', '', NULL),
(7, 'Motor ', 'ITALFARRU', '', 'HLE-MIT-01', '2012-08-23', 'En Reparacion', 'Tiene cables sueltos y pelados. No tiene aceite.', '', NULL),
(8, 'Motor Trifásico ', 'DAVI', '', 'HLE-CHI-01', '2012-08-23', 'Fuera de uso', '', '', NULL),
(9, 'Motor de 1/4 HP', 'MAC', '', 'HLE-MAC-01', '2012-08-23', 'Fuera de uso', '', '', NULL),
(10, 'Motor Diesel', '--------------', '', 'H-LT-Md-01', '2012-09-13', 'En uso', '', '', NULL),
(11, 'Motor gasolina', '-----------', '', 'H-LT-Mg-01', '2012-09-13', 'En Reparacion', 'Le falta el tanque de gasolina y platinos', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuevo_equipo`
--

DROP TABLE IF EXISTS `nuevo_equipo`;
CREATE TABLE IF NOT EXISTS `nuevo_equipo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_maquina` varchar(100) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `imagen` blob,
  `codigo` varchar(50) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `observaciones` text,
  `fecha_fuera_uso` date DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `nuevo_equipo`
--

INSERT INTO `nuevo_equipo` (`id`, `nombre_maquina`, `marca`, `modelo`, `imagen`, `codigo`, `estado`, `observaciones`, `fecha_fuera_uso`, `categoria`) VALUES
(1, 'Torno', 'Pinacho', 'S-90/260', 0x696d616765732e6a706567, 'H-MH-TO1O', 'En uso', 'No funciona bomba de refrigeración. ', NULL, NULL),
(2, 'Torno', 'Pinacho', 'S-90/260', 0x696d616765732e6a706567, 'H-MH-TO1O2', 'Fuera de uso', 'No funciona bombas del sistema de refrigeración ', '2024-10-13', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_trabajo`
--

DROP TABLE IF EXISTS `orden_trabajo`;
CREATE TABLE IF NOT EXISTS `orden_trabajo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero_orden` int NOT NULL,
  `codigo_equipo` varchar(50) NOT NULL,
  `nombre_equipo` varchar(100) NOT NULL,
  `descripcion_falla` text NOT NULL,
  `fecha_hora_reportada` datetime NOT NULL,
  `prioridad` enum('baja','media','alta') NOT NULL,
  `nombre_reportante` varchar(100) NOT NULL,
  `detalles_trabajo_realizado` text,
  `fecha_inicio_mantenimiento` date NOT NULL,
  `fecha_finalizacion_mantenimiento` date NOT NULL,
  `materiales_utilizados` text,
  `descripcion_trabajo_realizado` text,
  `firma_responsable` blob,
  `firma_solicitante` blob,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `orden_trabajo`
--

INSERT INTO `orden_trabajo` (`id`, `numero_orden`, `codigo_equipo`, `nombre_equipo`, `descripcion_falla`, `fecha_hora_reportada`, `prioridad`, `nombre_reportante`, `detalles_trabajo_realizado`, `fecha_inicio_mantenimiento`, `fecha_finalizacion_mantenimiento`, `materiales_utilizados`, `descripcion_trabajo_realizado`, `firma_responsable`, `firma_solicitante`, `fecha`) VALUES
(1, 2501, '3', 'torno paralelo', 'problemas electricos', '2024-10-01 17:33:00', 'alta', 'alfonso', 'cambio de pulsadores en tablero', '2024-10-03', '2024-10-04', 'medidor de voltaje y pulsadores nuevos', 'cambio de pulsadores y reparación del tablero eléctrico', NULL, NULL, '2024-10-05'),
(2, 9604, '14', 'fresadora', 'problemas eléctricos', '2024-10-08 16:51:00', 'baja', 'alfonso', 'cambio de pulsadores en tablero', '2024-10-08', '2024-10-09', 'medidor de voltaje y pulsadores nuevos', 'cambio de pulsadores y reparación del tablero eléctrico', NULL, NULL, '2024-10-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prensas`
--

DROP TABLE IF EXISTS `prensas`;
CREATE TABLE IF NOT EXISTS `prensas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('En uso','Fuera de uso','En Reparacion') DEFAULT 'En uso',
  `observaciones` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  `fecha_fuera_uso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `prensas`
--

INSERT INTO `prensas` (`id`, `nombre`, `marca`, `modelo`, `codigo`, `fecha_ingreso`, `estado`, `observaciones`, `imagen_url`, `fecha_fuera_uso`) VALUES
(1, 'Prensa', 'Record', '24', 'H-OB-P06', '2012-09-12', 'En uso', 'Necesita limpieza', '', NULL),
(2, 'Prensa', 'Woden', '6', 'H-OB-P05', '2012-09-12', 'En uso', 'Necesita limpieza', '', NULL),
(3, 'Prensa', 'Craftsman', '', 'H-OB-P07', '2012-09-12', 'En uso', 'Necesita limpieza', '', NULL),
(4, 'Prensa', '-----------', '', 'H-OB-P03', '2012-09-12', 'En uso', '', '', NULL),
(5, 'Prensa', '-----------', '', 'H-ME-P03', '2012-09-05', 'En uso', '', '', NULL),
(6, 'Prensa Irwin', 'Irwin', '', 'H-SP-I-07', '2012-09-13', 'En uso', '', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rectificadoras`
--

DROP TABLE IF EXISTS `rectificadoras`;
CREATE TABLE IF NOT EXISTS `rectificadoras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('En uso','Fuera de uso','En Reparacion') DEFAULT 'En uso',
  `observaciones` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  `fecha_fuera_uso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `rectificadoras`
--

INSERT INTO `rectificadoras` (`id`, `nombre`, `marca`, `modelo`, `codigo`, `fecha_ingreso`, `estado`, `observaciones`, `imagen_url`, `fecha_fuera_uso`) VALUES
(1, 'Rectificadora para piezas pequeñas', 'Jones-Shipman', '63242', 'H-ME-RPC01', '2012-09-05', 'Fuera de uso', 'Se encuentra sucia y fuera de uso', '', NULL),
(2, 'Rectificadora para piezas planas', '-----------', '', 'H-ME-RPP01', '2012-09-05', 'Fuera de uso', 'Fuera de uso y sucia', '', NULL),
(3, 'Rectificadora Jones Shipma', 'Jones Shipma', '', 'H-ME-RD0102', '2012-09-23', 'Fuera de uso', '', '', NULL),
(4, 'Rectificadora Plana', '-------', 'TBK 650', 'H-ME-ES0103', '2012-09-13', 'En uso', '', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE IF NOT EXISTS `registro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `usuario`, `contraseña`, `rol`) VALUES
(1, 'alfonso', '$2y$10$0A/oCzRAWx3XeeXgjsPOdumhhOztf.112j.KlNIQOs9ZTD4K/LUaC', 'director'),
(2, 'alfonso', '$2y$10$vicuKB1VeGMIyNp.WjaA3.6SKOGyHUiTSOni6aWHnrUxfj1BMmgBS', 'director'),
(3, 'alfonso', '$2y$10$y84teH2IzJJ8frrnhDZqJ.bqDDywT8W0jNk67ZZBeGvZ/dmJSulrO', 'director');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_fallas`
--

DROP TABLE IF EXISTS `reportes_fallas`;
CREATE TABLE IF NOT EXISTS `reportes_fallas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_equipo` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `descripcion_falla` text NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `prioridad` enum('alta','media','baja') NOT NULL,
  `fecha_reporte` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reportes_fallas`
--

INSERT INTO `reportes_fallas` (`id`, `nombre_equipo`, `marca`, `modelo`, `codigo`, `descripcion_falla`, `fecha_hora`, `prioridad`, `fecha_reporte`) VALUES
(1, 'Motor Trifásico ', 'Singer', 'Clutch Motor', 'HLE-MSC-02', 'Falla reportada para el equipo Motor Trifásico ', '2024-10-22 04:00:42', 'media', '2024-10-22 04:00:42'),
(2, 'Motor Trifásico ', 'Singer', 'Clutch Motor', 'HLE-MSC-01', 'Falla reportada para el equipo Motor Trifásico ', '2024-10-22 04:00:42', 'media', '2024-10-22 04:00:42'),
(3, 'Motor Trifásico ', 'Singer', 'Electric Transmitter', 'HLE-MST-01', 'Falla reportada para el equipo Motor Trifásico ', '2024-10-22 04:00:42', 'media', '2024-10-22 04:00:42'),
(4, 'Motor Trifásico ', 'Singer', 'Clutch Motor', 'HLE-MSC-02', 'Falla reportada para el equipo Motor Trifásico ', '2024-10-22 04:00:50', 'media', '2024-10-22 04:00:50'),
(5, 'Motor Trifásico ', 'Singer', 'Clutch Motor', 'HLE-MSC-01', 'Falla reportada para el equipo Motor Trifásico ', '2024-10-22 04:00:50', 'media', '2024-10-22 04:00:50'),
(6, 'Motor Trifásico ', 'Singer', 'Electric Transmitter', 'HLE-MST-01', 'Falla reportada para el equipo Motor Trifásico ', '2024-10-22 04:00:50', 'media', '2024-10-22 04:00:50'),
(7, 'Compresor de dos fases', 'REAVEL', 'Sa', 'H-LT-C-01', 'Falla reportada para el equipo Compresor de dos fases', '2024-10-22 04:02:49', 'media', '2024-10-22 04:02:49'),
(8, 'Compresor de dos fases', 'REAVEL', 'Sa', 'H-LT-C-01', 'Falla reportada para el equipo Compresor de dos fases', '2024-10-22 04:02:49', 'media', '2024-10-22 04:02:49'),
(11, 'TAL TAL', '', '', '', 'HOLA HOLA', '2024-10-22 10:26:00', 'alta', '2024-10-22 16:26:29'),
(12, 'gtr', '', '', '', 'gtr', '2024-10-24 10:29:00', 'alta', '2024-10-22 16:29:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes_fallas_completo`
--

DROP TABLE IF EXISTS `reportes_fallas_completo`;
CREATE TABLE IF NOT EXISTS `reportes_fallas_completo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) DEFAULT NULL,
  `nombre_equipo` varchar(255) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `descripcion_falla` text,
  `fecha_hora` datetime DEFAULT NULL,
  `prioridad` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `reportes_fallas_completo`
--

INSERT INTO `reportes_fallas_completo` (`id`, `categoria`, `nombre_equipo`, `marca`, `modelo`, `codigo`, `descripcion_falla`, `fecha_hora`, `prioridad`) VALUES
(3, 'limadoras', '2', 'Sacia', 'L/450-E', 'H-MH-LS-14', 'Falla mecánica', '2024-10-22 11:29:00', 'media'),
(4, 'esmeriles', '7', 'Wisota', 'E1016', 'H-SE-W-02', 'Enciende y se apaga el solo ', '2024-10-22 11:30:00', 'baja'),
(5, 'motores', '3', 'Singer', 'Clutch Motor', 'HLE-MSC-01', 'Necesita reparación total ', '2024-10-22 11:31:00', 'alta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soldadores`
--

DROP TABLE IF EXISTS `soldadores`;
CREATE TABLE IF NOT EXISTS `soldadores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('En uso','Fuera de uso','En Reparacion') DEFAULT 'En uso',
  `observaciones` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  `fecha_fuera_uso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `soldadores`
--

INSERT INTO `soldadores` (`id`, `nombre`, `marca`, `modelo`, `codigo`, `fecha_ingreso`, `estado`, `observaciones`, `imagen_url`, `fecha_fuera_uso`) VALUES
(2, 'Eq. de soldadura', 'Miller', 'THUNDERBOLT', 'H-AS-EM0201', '2012-08-23', 'Fuera de uso', 'Falta de extensión eléctrica y protección ', '', NULL),
(3, 'Eq. de soldadura', 'CEBORA', 'EUROWELD', 'H-AS-EC0502', '2012-08-23', 'Fuera de uso', 'Medidor de amperaje no funciona', '', NULL),
(4, 'Eq. Autogena', '-------', '', 'H-AS-OX0103', '2012-08-23', 'En uso', '', '', NULL),
(5, 'Antorchas de autogena', '--------', '', 'H-AS-AN0604', '2012-08-23', 'En uso', '', '', NULL),
(6, 'Eq. de soldadura MIG', 'Cebora', 'MIG260E', 'H-AS-GC0108', '2012-08-23', 'En uso', '', '', NULL),
(7, 'Eq. de soldadura MIG', 'Miller', '251', 'H-AS-GM0309', '2012-08-23', 'En uso', '', '', NULL),
(8, 'Eq. de soldadura TIG', 'CEBORA', 'TIG START 250', 'H-AS-TC0210', '2012-08-22', 'En uso', '', '', NULL),
(9, 'Eq. de soldadura ', 'Master', '', 'H-AS-EL0312', '2012-08-23', 'En uso', '', '', NULL),
(10, 'Eq. de soldadura ', 'Thermec', '33 Welder', 'H-AS-ED0213', '2012-08-23', 'En uso', '', '', NULL),
(11, 'Eq. de soldadura ', 'Cebora', 'EuroWeld', 'H-SE-C-05', '2012-09-13', 'En uso', '', '', NULL),
(12, 'Eq. de soldadura ', 'Miller', 'M-130', 'H-SE-M-01', '2012-09-13', 'Fuera de uso', 'Aparato desarmado ', '', NULL),
(13, 'Eq. de soldadura TIG', 'Miller', '251', 'H-SM-M-02', '2012-09-13', 'Fuera de uso', 'Falta de embobinado', '', NULL),
(14, 'Eq. de soldadura TIG', 'Miller TIG', '35', 'H-SM-M-01', '2012-09-13', 'Fuera de uso', '', '', NULL),
(15, 'Eq. de soldadura ', 'Cebora', '260 E', 'H-SM-C-01', '2012-09-13', 'En uso', '', '', NULL),
(16, 'Eq. de soldadura ', 'Cebora', 'Star 250', 'H-SM-C-02', '2012-09-13', 'En uso', '', '', NULL),
(17, 'Manometro Harris', 'Harris', '63-2', 'H-SA-H-02', '2012-09-13', 'En uso', '', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taladros`
--

DROP TABLE IF EXISTS `taladros`;
CREATE TABLE IF NOT EXISTS `taladros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('En uso','Fuera de uso','En Reparacion') DEFAULT 'En uso',
  `observaciones` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  `fecha_fuera_uso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `taladros`
--

INSERT INTO `taladros` (`id`, `nombre`, `marca`, `modelo`, `codigo`, `fecha_ingreso`, `estado`, `observaciones`, `imagen_url`, `fecha_fuera_uso`) VALUES
(6, 'Taladro de banco', 'BIMAK', 'EB16', 'H-LT-TB-04', '2012-09-13', 'En uso', 'Falta de piezas', '', NULL),
(7, 'Taladro NOE', 'NOE', '', 'H-OB-TL01', '2012-09-12', 'En uso', 'Necesita ajuste de manivela', '', NULL),
(8, 'Taladro Ibarmia', 'Ibarmia', 'A-25/32', 'H-OB-TL04', '2012-09-12', 'En uso', '', '', NULL),
(9, 'Taladro de Columna', 'Medding', '', 'H-ME-TC01', '2012-09-05', 'Fuera de uso', 'Fuera de uso y sucia', '', NULL),
(10, 'Taladro de Columna', 'Medding', '', 'H-ME-TC0111', '2012-08-23', 'En uso', '', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tornos`
--

DROP TABLE IF EXISTS `tornos`;
CREATE TABLE IF NOT EXISTS `tornos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` enum('En uso','Fuera de uso','En Reparacion') DEFAULT 'En uso',
  `observaciones` text,
  `imagen_url` varchar(255) DEFAULT NULL,
  `fecha_fuera_uso` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tornos`
--

INSERT INTO `tornos` (`id`, `nombre`, `marca`, `modelo`, `codigo`, `fecha_ingreso`, `estado`, `observaciones`, `imagen_url`, `fecha_fuera_uso`) VALUES
(1, 'Torno', 'Pinacho', 'S-90/260', 'H-MH-TO1O1', '2012-01-21', 'En uso', 'No funciona bomba de sistema de refrigeración. ', 'uploads/c0b5411a-15d3-4b72-a145-8389d58d9b57.jpeg', NULL),
(2, 'Torno', 'Pinacho', 'S-90/260', 'H-MH-TO1O2', '2012-01-21', 'En uso', 'No funciona bomba de sistema de refrigeración.', '', NULL),
(3, 'Torno', 'Pinacho', 'S-90/260', 'H-MH-TO1O3', '2012-01-21', 'En uso', 'No funciona bomba de sistema de refrigeración.', '', NULL),
(4, 'Torno', 'Pinacho', 'S-90/260', 'H-MH-TO1O4', '2012-01-21', 'En uso', 'No funciona bomba de sistema de refrigeración.', '', NULL),
(5, 'Torno', 'Harrison', 'M300', 'H-MH-TO1O5', '2012-01-21', 'En uso', 'No funciona caja Norton y no funcionan los automáticos. ', '', NULL),
(6, 'Torno', 'Harrison', 'M300', 'H-MH-TO1O7', '2012-01-21', 'En uso', 'Problemas eléctricos varios.', '', NULL),
(7, 'Torno', 'Colchester', 'MASCOT-1600', 'H-MH-TO1O8', '2012-01-21', 'En uso', '', '', NULL),
(8, 'Torno', 'Colchester', 'MASCOT-1600', 'H-MH-TO1O9', '2012-01-21', 'Fuera de uso', '', '', NULL),
(9, 'Torno', 'Harrison', 'EWD 401', 'H-ME-TN0128', '2012-08-23', 'En Reparacion', '', '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `rol` enum('encargado','director') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`, `rol`) VALUES
(1, 'encargado', '482c811da5d5b4bc6d497ffa98491e38', 'encargado'),
(2, 'director', '0192023a7bbd73250516f069df18b500', 'director');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
