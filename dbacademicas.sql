-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2021 a las 07:51:45
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbeventos_academicos`
--
-------------------------------------------------------
--
-- Estructura de tabla para la tabla `lugar_evento`
--

CREATE TABLE `lugar_evento` (
  `id_lugar_evento` smallint(6) NOT NULL AUTO_INCREMENT,
  `lugar_evento_sala` varchar(35) COLLATE utf8_bin NOT NULL,
  `lugar_evento_piso` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `lugar_evento_ubicacion` varchar(200) COLLATE utf8_bin NOT NULL,
  `lugar_evento_direccion` varchar(200) COLLATE utf8_bin DEFAULT NULL,
   PRIMARY KEY (`id_lugar_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `lugar_evento`
--

INSERT INTO `lugar_evento` (`id_lugar_evento`, `lugar_evento_sala`, `lugar_evento_piso`, `lugar_evento_ubicacion`, `lugar_evento_direccion`) VALUES
(1, 'Auditorio Mtro. Jesús Silva Herzog', 'PB', 'Facultad de Economía-UNAM, Edificio de Posgrado', 'Circuito Mario de la Cueva sin número, Zona Cultural, Ciudad Universitaria, México, D.F. C.P. 04510'),
(2, 'Aula 207', '2do piso', 'Facultad de Economía-UNAM, Edificio de Posgrado', 'Circuito Mario de la Cueva sin número, Zona Cultural, Ciudad Universitaria, México, D.F. C.P. 04510'),
(3, 'Aula 101', '1er piso', 'Facultad de Economía-UNAM, Edificio de Posgrado', 'Circuito Mario de la Cueva sin número, Zona Cultural, Ciudad Universitaria, México, D.F. C.P. 04510'),
(4, 'Aula Magna Jesús Silva Herzog', 'PB', 'Facultad de Economía-UNAM, Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(5, 'Auditorio Narciso Bassols', 'PB', 'Facultad de Economía-UNAM, Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(6, 'Armando Labra', '1er piso', 'Facultad de Economía-UNAM, Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(7, 'Alejandro Paz', '1er piso', 'Facultad de Economía-UNAM, Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(8, 'Sala AEFE', '1er piso', 'Facultad de Economía-UNAM, Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(9, 'Octavio Gudiño', '2do piso', 'Facultad de Economía-UNAM, Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(10, 'R. Torres Gaitán', '2do piso', 'Facultad de Economía-UNAM, Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(11, 'Horario Flores', '2do piso', 'Facultad de Economía-UNAM, Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(12, 'Octaviano Campos Salas', '2do piso', 'Facultad de Economía-UNAM, Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(13, 'Auditorio Ho Chi Minh', 'PB', 'Facultad de Economía-UNAM, Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(14, 'David Ibarra Muñoz', '3er piso', 'Facultad de Economía-UNAM, Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(15, 'Sala', '2do piso', 'Facultad de Economía-UNAM, Edificio de Posgrado', 'Circuito Mario de la Cueva sin número, Zona Cultural, Ciudad Universitaria, México, D.F. C.P. 04510'),
(16, '', '0', 'No Aplica', 'No Aplica'),
(18, '', '0', 'En otra institución (consultar el cartel)', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` smallint(6) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(25) COLLATE utf8_bin NOT NULL,
   PRIMARY KEY(`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol_nombre`) VALUES
(1, 'Autor'),
(2, 'Autora'),
(3, 'Comentarista'),
(4, 'Coordinador Académico'),
(5, 'Coordinadora Académica'),
(6, 'Expositor'),
(7, 'Expositora'),
(8, 'Moderador'),
(9, 'Moderadora'),
(10, 'Organizador'),
(11, 'Organizadora'),
(12, 'Participante'),
(13, 'Ponente'),
(14, 'Presentador'),
(15, 'Presentadora'),
(16, 'Profesor'),
(17, 'Profesora'),
(18, 'Traductor'),
(19, 'Traductora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE `participante` (
  `id_participante` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_rol` smallint(6) NOT NULL,
  `participante_nombre` varchar(80) COLLATE utf8_bin NOT NULL,
  `participante_apellidop` varchar(80) COLLATE utf8_bin NOT NULL,
  `participante_apellidom` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `participante_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `participante_cargo_inst` varchar(80) COLLATE utf8_bin DEFAULT NULL,
   PRIMARY KEY (`id_participante`),
   FOREIGN KEY(`id_rol`) REFERENCES rol(`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`id_participante`, `id_rol`, `participante_nombre`, `participante_apellidop`, `participante_apellidom`, `participante_email`, `participante_cargo_inst`) VALUES
(4, 8, 'Francisco', 'Martínez', 'Hernández', 'fcoher2802@gmail.com', 'Profesor'),
(5, 1, 'Oscar', 'Ugarteche', '-', 'difuiiec@unam.mx', 'Profesor'),
(6, 2, 'Ma. Teresa', 'S. López', '-', 'teresa@unam.mx', 'Profesora'),
(7, 1, 'Carlo', 'Panico', '-', 'panico@unam.mx', 'Profesor'),
(8, 1, 'César', 'Salazar', '-', 'salazar@unam.mx', 'Profesor'),
(9, 8, 'Dr. Alberto', 'Iñiguez', 'Montiel', 'iniguez@unam.mx', 'Profesor'),
(10, 8, 'Dr. Alan', 'Cibils', '-', 'seminariofinanciarizacion@gmail.com', 'Profesor'),
(11, 4, 'Dr. Michael', 'Roberts', '.', 'economarxsiglo21@gmail.com', 'Profesor'),
(12, 8, 'Patrick T.', 'T. Troester', '.', 'esphe@economia.unam.mx', 'Profesor'),
(13, 8, 'Dra. Sergio', 'Vega', 'Sandoval', 'soniaf@unam.mx', 'Profesor'),
(14, 1, 'Leticia', 'García', 'Sandoval', 'soniaf@unam.mx', 'Académico');



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_apoyo_evento`
--

CREATE TABLE `tipo_apoyo_evento` (
  `id_tipo_apoyo` smallint(6) NOT NULL AUTO_INCREMENT,
  `tipo_apoyo_nombre` varchar(80) COLLATE utf8_bin NOT NULL,
  `tipo_apoyo_siglas` char(8) COLLATE utf8_bin NOT NULL,
   PRIMARY KEY (`id_tipo_apoyo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_apoyo_evento`
--

INSERT INTO `tipo_apoyo_evento` (`id_tipo_apoyo`, `tipo_apoyo_nombre`, `tipo_apoyo_siglas`) VALUES
(1, 'Programa de Apoyo a Proyectos para Innovar y Mejorar la Educación', 'PAPIME'),
(2, 'Programa de Apoyo a Proyectos de Investigación e Innovación Tecnológica', 'PAPIIT'),
(3, 'Ninguno', 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_evento`
--

CREATE TABLE `tipo_evento` (
  `id_tevento` smallint(6) NOT NULL AUTO_INCREMENT,
  `tipo_evento_nombre` varchar(30) COLLATE utf8_bin NOT NULL,
   PRIMARY KEY (`id_tevento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_evento`
--

INSERT INTO `tipo_evento` (`id_tevento`, `tipo_evento_nombre`) VALUES
(1, 'Cátedra'),
(2, 'Coloquio'),
(3, 'Conferencia'),
(4, 'Conferencia Magistral'),
(5, 'Congreso'),
(6, 'Conversatorio'),
(7, 'Convocatoria'),
(8, 'Curso'),
(9, 'Diplomado'),
(10, 'Disertación'),
(11, 'Foro'),
(12, 'Mesa de análisis'),
(13, 'Mesa de debate'),
(14, 'Mesa de trabajo'),
(15, 'Mesa redonda'),
(16, 'Ponencia'),
(17, 'Presentación de libro'),
(18, 'Taller'),
(19, 'Seminario'),
(20, 'Seminario Internacional'),
(21, 'Seminario Virtual'),
(22, 'Simposio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_tipo_apoyo` smallint(6) NOT NULL,
  `id_tevento` smallint(6) NOT NULL,
  `id_lugar_evento` smallint(6) NOT NULL,
  `evento_registro` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `evento_nombre` varchar(500) COLLATE utf8_bin NOT NULL,
  `evento_fecha_inicio` date NOT NULL,
  `evento_fecha_fin` date NOT NULL,
  `evento_hora` time NOT NULL,
  `evento_descripcion` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `evento_informes` varchar(100) COLLATE utf8_bin NOT NULL,
  `evento_informes2` int(10) COLLATE utf8_bin  NULL,
  `evento_transmision` varchar(100) COLLATE utf8_bin NOT NULL,
  `evento_imagen` varchar(80) COLLATE utf8_bin NOT NULL,
  `evento_programa` varchar(80) COLLATE utf8_bin NOT NULL,
  `evento_modalidad` varchar(80) COLLATE utf8_bin NOT NULL,
   PRIMARY KEY (`id_evento`),
   FOREIGN KEY(`id_tipo_apoyo`) REFERENCES tipo_apoyo_evento(`id_tipo_apoyo`),
   FOREIGN KEY(`id_tevento`) REFERENCES tipo_evento(`id_tevento`),
   FOREIGN KEY(`id_lugar_evento`) REFERENCES lugar_evento(`id_lugar_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` ( `id_evento`, `id_tipo_apoyo`, `id_tevento`, `id_lugar_evento`, `evento_registro`, `evento_nombre`, `evento_fecha_inicio`, `evento_fecha_fin`, `evento_hora`, `evento_descripcion`, `evento_informes`, `evento_informes2`, `evento_transmision`, `evento_imagen`, `evento_programa`, `evento_modalidad`) VALUES
(52, 2, 8, 4, NULL, 'Tipo de cambio real, demanda efectiva, crecimiento económico y distribución del ingreso: Teoría y evidencia empírica para los países desarrollados y en desarrollo, 1960-201', '2018-02-07', '2018-02-07', '00:00:00', 'Pendiente', 'fcoher2802@gmail.com', NULL, 'otro', 'assets/img/logo_amep.gif', 'assets/archivos/SAT.pdf', 'Presencial'),
(53, 1, 15, 17, NULL, 'Arquitectura financiera internacional. Una genealogía (1850-2015)', '2018-09-18', '2018-09-20', '00:00:00', 'Actividad académica sin costo', 'iiec@unam.mx', NULL, 'otro', 'assets/img/presentacion-libro-OscarUgarteche_thumb.jpg', 'assets/archivos/acuseBuzon330202115447.pdf', 'Presencial'),
(54, 3, 17, 3, NULL, 'El impacto de la guerra contra el narcotráfico en el mercado laboral y el consumo de los hogares en México 2001 2012', '2018-01-16', '2018-01-16', '00:00:00', 'Pendiente', 'iniguez@e.u-tokyo.ac.jp', NULL, 'otro', 'assets/img/cartel_seminario-impacto-narco_thumb.jpg', 'assets/archivos/acuseBuzon330202115440.pdf', 'Presencial'),
(55,3, 3, 3, NULL, 'Financiarización en la periferia: Una mirada desde Argentina', '2018-02-21', '2018-02-22', '00:00:00', 'Pendiente', 'seminariofinanciarizacion@gmail.com', NULL, 'otro', 'assets/img/Conferencia-AlanCibils_thumb.jpg', 'assets/archivos/SAT.pdf', 'Presencial'),
(56, 3, 3, 3, NULL, 'Ciclo de conferencias a cargo del Dr. Michael Roberts', '2018-03-06', '2018-03-08', '00:00:00', 'Pendiente', 'economarxsiglo21@gmail.com', NULL, 'otro', 'assets/img/ciclo-conferencias-MichaelRoberts._thumb.png', 'assets/archivos/acuseBuzon330202115447.pdf', 'Presencial'),
(57, 3, 17, 3, 'http://www.depfe.unam.mx/actividades/registro.php', 'Retos históricos y actuales del norte de México y el suroeste de Estados Unidos: frontera, migración y economía', '2021-05-07', '2021-05-09', '00:00:00', 'Sesión 2  Guerra, género, y nacionalismo en la frontera México-Estados Unidos, siglo XIXI', 'esphe@economia.unam.mx', NULL, 'Facebook Live', 'assets/img/seminarioRetos-historicos-y-actuales-Mx-EU_thumb.jpg', 'assets/archivos/seminarioRetos-historicos-y-actuales-Mx-EU.pdf', 'En linea'),
(58, 3, 8, 16, NULL, 'Prueba 22 de Junio', '2021-06-22', '2021-06-24', '00:00:00', 'Hola', 'jesus.sosa@comunidad.unam.mx', NULL, 'Facebook Live', 'assets/img/economia-transparente.png', 'assets/archivos/SAT.pdf', 'El linea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_academico`
--

CREATE TABLE `evento_academico` (
  `id_evento` smallint(6) NOT NULL,
  `id_participante` smallint(6) NOT NULL,
  `id_rol` smallint(6) NOT NULL,
   FOREIGN KEY(`id_evento`) REFERENCES evento(`id_evento`),
  FOREIGN KEY(`id_participante`) REFERENCES participante(`id_participante`),
  FOREIGN KEY(`id_rol`) REFERENCES rol(`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `evento_academico`
--

INSERT INTO `evento_academico` (`id_evento`, `id_participante`, `id_rol`) VALUES
(52, 4, 8),
(53, 6, 2),
(53, 7, 2),
(53, 8, 2),
(54, 9, 8),
(55, 10, 8),
(56, 11, 4),
(57, 12, 8),
(58, 4, 8),
(58, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_organizadora`
--

CREATE TABLE `institucion_organizadora` (
  `id_inst_org` smallint(6) NOT NULL AUTO_INCREMENT,
  `inst_org_nombre` varchar(150) COLLATE utf8_bin NOT NULL UNIQUE,
  `inst_org_siglas` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `inst_org_sede` enum('interna','externa') COLLATE utf8_bin DEFAULT NULL,
   PRIMARY KEY(`id_inst_org`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `institucion_organizadora`
--

INSERT INTO `institucion_organizadora` (`id_inst_org`, `inst_org_nombre`, `inst_org_siglas`, `inst_org_sede`) VALUES
(1, 'Campo de Conocimiento de Desarrollo Económico', 'DE', 'interna'),
(2, 'Campo de Conocimiento de Economía de la Tecnología', 'ET', 'interna'),
(3, 'Campo de Conocimiento de Economía de los Recursos Naturales y Desarrollo Sustentable', 'ERNyDS', 'interna'),
(4, 'Campo de Conocimiento de Economía Financiera', 'EF', 'interna'),
(5, 'Campo de Conocimiento de Economía Internacional', 'EI', 'interna'),
(6, 'Campo de Conocimiento de Economía Política', 'EPol', 'interna'),
(7, 'Campo de Conocimiento de Economía Pública', 'Epub', 'interna'),
(8, 'Campo de Conocimiento de Economía Urbana y Regional', 'EUyR', 'interna'),
(9, 'Campo de Conocimiento de Historia Económica', 'HE', 'interna'),
(10, 'Campo de Conocimiento de Teoría y Método de la Economía', 'TyME', 'interna'),
(11, 'Especialización en Desarrollo Social', 'DS', 'interna'),
(12, 'Especialización en Econometría Aplicada', 'EA', 'interna'),
(13, 'Especialización en Economía Ambiental y Ecológica', 'EAE', 'interna'),
(14, 'Especialización en Economía Monetaria y Financiera', 'EMyF', 'interna'),
(15, 'Especialización en El Género en la Economía', 'GE', 'interna'),
(16, 'Especialización en Historia Económica', 'HE', 'interna'),
(17, 'Especialización en Historia del Pensamiento Económico', 'HPE', 'interna'),
(18, 'Especialización en Microfinanzas', 'MF', 'interna'),
(19, 'Especialización en Teoría Económica', 'TE', 'interna'),
(20, 'Centro de Estudios China-México de la Facultad de Economía-UNAM', 'CECHIMEX', 'interna'),
(21, 'División de Estudios Profesionales de la Facultad de Economía-UNAM', 'DEP', 'interna'),
(22, 'Universidad Autónoma de Coahuila', 'UAdeC', 'externa'),
(23, 'Facultad de Economía-UNAM', 'FE', 'interna'),
(24, 'División de Estudios de Posgrado de la Facultad de Economía-UNAM', 'DEPFE', 'interna'),
(25, 'Secretaría de Hacienda y Crédito Público', 'SHCP', 'externa'),
(26, 'Centro de Modelística y Pronósticos Económicos de la Facultad de Economía-UNAM (CEMPE)', 'CEMPE', 'interna'),
(27, 'Instituto de Investigaciones Económicas-UNAM', 'IIE', 'interna'),
(28, 'Revista Ola Financiera de la Facultad de Economía-UNAM', '', 'interna'),
(29, 'Red de Economía Fiscal, Financiera y Monetaria del IIEc-UNAM', 'REDEFFIM', 'externa'),
(30, 'Dirección General del Asuntos del Personal Académico', 'DGAPA', 'interna'),
(31, 'Secretaría de Desarrollo Institucional-UNAM', 'SDI', 'interna'),
(32, 'Pontificia Universidad Católica de Ecuador', 'PUCE', 'externa'),
(33, 'Instituto Nacional de Salud Pública', ' INSP', 'externa'),
(34, 'Unión de Universidades de América Latina y el Caribe', 'UDUAL', 'externa'),
(35, 'Red de Mujeres Sindicalistas', 'RMSCDMX', 'externa'),
(36, 'Soluciones para el Desarrollo Sostenible México', 'SDSN', 'externa'),
(37, 'Instituto de Energías Renovables-UNAM', 'IER', 'interna'),
(38, 'Coordinación de la Investigación Científica-UNAM', 'CIC', 'interna'),
(39, 'Secretaría de Investigación y Desarrollo-UNAM', 'SID', 'externa'),
(40, 'Seminario de Economía y Administración de la Ciencia y la Tecnología', 'SEACyT', 'externa'),
(41, 'Feria Internacional del Libro del Palacio de Mineria de la UNAM', 'FILPM', 'interna'),
(42, 'Programa Universitario de Estudios sobre Democracia, Justicia y Sociedad-UNAM', 'PUEDJS', 'interna'),
(43, 'Centro de Análisis de Coyuntura Económica, Política y Social', 'CACEPS', 'externa'),
(44, 'Coordinación de Humanidades-UNAM', 'CH', 'interna'),
(45, 'Instituto de Investigaciones Sociales-UNAM', 'IIS', 'interna'),
(46, 'Comisión Económica para América Latina y el Caribe', 'CEPAL', 'externa'),
(47, 'University of Pittsburgh', '', 'externa'),
(48, 'Red Académica de América Latina y el Caribe sobre China', 'Red ALC-China', 'externa'),
(49, 'Academia Mexicana de Economía Política A.C.', 'AMEP', 'interna'),
(50, 'Red de Macrouniversidades de América Latina y el caribe', 'REDMACRO', 'externa');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_organizadora_evento`
--

CREATE TABLE `institucion_organizadora_evento` (
  `id_inst_org` smallint(6) NOT NULL,
  `id_evento` smallint(6) NOT NULL,
   FOREIGN KEY(`id_inst_org`) REFERENCES institucion_organizadora(`id_inst_org`),
  FOREIGN KEY(`id_evento`) REFERENCES evento(`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `institucion_organizadora_evento`
--

INSERT INTO `institucion_organizadora_evento` (`id_inst_org`, `id_evento`) VALUES
(49, 52),
(27, 53),
(24, 54),
(24, 55),
(24, 56),
(16, 57),
(1, 58);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(200) COLLATE utf8_bin NOT NULL,
  `password` char(120) COLLATE utf8_bin NOT NULL,
  `estatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`, `estatus`) VALUES
(1, 'Leticia García Pérez', 'letiga@unam.mx', '$2y$10$qLtT.xQHFU/q.GgWap9ZkeNnyvevUVueDVkPtzml0VIKQXGR7ixDq', 1),
(5, 'Letiga', 'garciap.leticia@gmail.com', '$2y$10$M2LGbLncF6JJBCiAd0Xxe.5brsQ7ecP0UN1TZPHdrLsA4SfwOUGQS', 1);

