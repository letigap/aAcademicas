-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2021 a las 05:59:28
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
-- Base de datos: `eventos_academicos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` smallint(6) NOT NULL,
  `id_tipo_apoyo` smallint(6) NOT NULL,
  `id_tevento` smallint(6) NOT NULL,
  `id_lugar_evento` smallint(6) NOT NULL,
  `evento_nombre` varchar(500) COLLATE utf8_bin NOT NULL,
  `evento_fecha` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `evento_descripcion` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `evento_informes` varchar(100) COLLATE utf8_bin NOT NULL,
  `evento_transmision` varchar(100) COLLATE utf8_bin NOT NULL,
  `evento_imagen` varchar(80) COLLATE utf8_bin NOT NULL,
  `evento_programa` varchar(80) COLLATE utf8_bin NOT NULL,
  `evento_modalidad` varchar(80) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `id_tipo_apoyo`, `id_tevento`, `id_lugar_evento`, `evento_nombre`, `evento_fecha`, `evento_descripcion`, `evento_informes`, `evento_transmision`, `evento_imagen`, `evento_programa`, `evento_modalidad`) VALUES
(52, 2, 8, 4, 'Tipo de cambio real, demanda efectiva, crecimiento económico y distribución del ingreso: Teoría y evidencia empírica para los países desarrollados y en desarrollo, 1960-201', 'miércoles 7 de febrero de 2018, 18:00 hrs', 'Pendiente', 'fcoher2802@gmail.com', 'otro', 'assets/img/logo_amep.gif', 'assets/archivos/SAT.pdf', 'Presencial'),
(53, 1, 15, 17, 'Arquitectura financiera internacional. Una genealogía (1850-2015)', 'martes 18 de septiembre de 2018, de 12:00 a 14:00 hrs.', 'Actividad académica sin costo', 'iiec@unam.mx', 'otro', 'assets/img/presentacion-libro-OscarUgarteche_thumb.jpg', 'assets/archivos/acuseBuzon330202115447.pdf', 'Presencial'),
(54, 3, 17, 3, 'El impacto de la guerra contra el narcotráfico en el mercado laboral y el consumo de los hogares en México 2001 2012', 'Martes 16 de enero de 2018, 11:00 hrs.', 'Pendiente', 'iniguez@e.u-tokyo.ac.jp', 'otro', 'assets/img/cartel_seminario-impacto-narco_thumb.jpg', 'assets/archivos/acuseBuzon330202115440.pdf', 'Presencial'),
(55, 3, 3, 3, 'Financiarización en la periferia: Una mirada desde Argentina', 'miércoles 21 de febrero de 2018, 12:00 horas', 'Pendiente', 'seminariofinanciarizacion@gmail.com', 'otro', 'assets/img/Conferencia-AlanCibils_thumb.jpg', 'assets/archivos/SAT.pdf', 'Presencial'),
(56, 3, 3, 3, 'Ciclo de conferencias a cargo del Dr. Michael Roberts', '6, 7 y 8 de marzo 2018, 12:00 hrs.', 'Pendiente', 'economarxsiglo21@gmail.com', 'otro', 'assets/img/ciclo-conferencias-MichaelRoberts._thumb.png', 'assets/archivos/acuseBuzon330202115447.pdf', 'Presencial'),
(57, 3, 17, 3, 'Retos históricos y actuales del norte de México y el suroeste de Estados Unidos: frontera, migración y economía', 'Viernes 7 de mayo de 2021', 'Sesión 2  Guerra, género, y nacionalismo en la frontera México-Estados Unidos, siglo XIXI', 'esphe@economia.unam.mx', 'Facebook Live', 'assets/img/seminarioRetos-historicos-y-actuales-Mx-EU_thumb.jpg', 'assets/archivos/seminarioRetos-historicos-y-actuales-Mx-EU.pdf', 'En linea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_academico`
--

CREATE TABLE `evento_academico` (
  `id_evento` smallint(6) NOT NULL,
  `id_participante` smallint(6) NOT NULL,
  `id_rol` smallint(6) NOT NULL
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
(57, 12, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_organizadora`
--

CREATE TABLE `institucion_organizadora` (
  `id_inst_org` smallint(6) NOT NULL,
  `inst_org_nombre` varchar(150) COLLATE utf8_bin NOT NULL,
  `inst_org_siglas` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `inst_org_sede` enum('interna','externa') COLLATE utf8_bin DEFAULT NULL
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
(15, 'Especialización en El Genero en la Economía', 'GE', 'interna'),
(16, 'Especialización en Historia Económica', 'HE', 'interna'),
(17, 'Especialización en Historia del Pensamiento Económico', 'HPE', 'interna'),
(18, 'Especialización en Microfinanzas', 'MF', 'interna'),
(19, 'Especialización en Teoría Económica', 'TE', 'interna'),
(20, 'Centro de Estudios China-México de la Facultad de Economía-UNAM', 'CECHIMEX', 'interna'),
(21, 'Área de Historia Económica-UNAM', '', 'interna'),
(22, 'Maestría en Historia del Noreste Mexicano y Texas-Universidad Autónoma de Coahuila', '', 'externa'),
(23, 'Facultad de Economía de la Universidad Nacional Autónoma de México', 'FE', 'interna'),
(24, 'División de Estudios de Posgrado de la Facultad de Economía-UNAM', 'DEPFE', 'interna'),
(25, 'Secretaría de Hacienda y Crédito Público', 'SHCP', 'externa'),
(26, 'Centro de Modelística y Pronósticos Económicos', 'CEMPE', 'interna'),
(27, 'Instituto de Investigaciones Económicas', 'IIE', 'interna'),
(28, 'Revista Ola Financiera', '', 'interna'),
(29, 'Red de Economía Fiscal, Financiera y Monetaria', 'REDEFFIM', 'externa'),
(30, 'Dirección General del Asuntos del Personal Académico', 'DGAPA', 'interna'),
(31, 'Secretaría de Desarrollo Institucional, Facultad de Economía-UNAM', 'SDI', 'interna'),
(32, 'Pontificia Universidad Católica de Ecuador', '', 'externa'),
(33, 'Instituto Nacional de Salud', 'INS', 'externa'),
(34, 'UDUAL y Red de Macro Universidades', '', 'externa'),
(35, 'Red de Mujeres Sindicalistas', 'RMS', 'externa'),
(36, 'SDSN Soluciones para el Desarrollo Sostenible México', 'SDSN', 'externa'),
(37, 'Instituto de Energías Renovables', 'IER', 'externa'),
(38, 'Coordinación de la Investigación Científica', 'CIC', 'externa'),
(39, 'Secretaría de Investigación y Desarrollo', 'SID', 'externa'),
(40, 'Seminario de Economía y Administración de la Ciencia y la Tecnología', 'SEyACT', 'externa'),
(41, 'Feria Internacional del Libro del Palacio de Mineria de la UNAM', 'FILPM', 'interna'),
(42, 'Programa Universitario de Estudios sobre Democracia, Justicia y Sociedad de la UNAM', '', 'interna'),
(43, 'Centro de Análisis de Coyuntura Económica, Política y Social', '(CACEPS)', 'externa'),
(44, 'Coordinación de Humanidades-UNAM', 'CH', 'interna'),
(45, 'Instituto de Investigaciones Sociales', 'IIS', 'interna'),
(46, 'Comisión Económica para América Latina y el Caribe', '(CEPAL)', 'externa'),
(47, 'Asian Studies Center at the University of Pittsburgh', '', 'externa'),
(48, 'Red Académica de América Latina y el Caribe sobre China', '(Red ALC-China)', 'externa'),
(49, 'Academia Mexicana de Economía Política A.C.', 'AMEP', 'interna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_organizadora_evento`
--

CREATE TABLE `institucion_organizadora_evento` (
  `id_inst_org` smallint(6) NOT NULL,
  `id_evento` smallint(6) NOT NULL
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
(16, 57);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar_evento`
--

CREATE TABLE `lugar_evento` (
  `id_lugar_evento` smallint(6) NOT NULL,
  `lugar_evento_sala` varchar(30) COLLATE utf8_bin NOT NULL,
  `lugar_evento_piso` char(3) COLLATE utf8_bin DEFAULT NULL,
  `lugar_evento_ubicacion` varchar(200) COLLATE utf8_bin NOT NULL,
  `lugar_evento_direccion` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `lugar_evento`
--

INSERT INTO `lugar_evento` (`id_lugar_evento`, `lugar_evento_sala`, `lugar_evento_piso`, `lugar_evento_ubicacion`, `lugar_evento_direccion`) VALUES
(1, 'Auditorio Mtro. Jesús Silva He', 'PB', 'División de Estudios de Posgrado de la Facultad de Economía de la UNAM', 'Circuito Mario de la Cueva sin número, Zona Cultural, Ciudad Universitaria, México, D.F. C.P. 04510'),
(2, 'Aula 207', '2do', 'División de Estudios de Posgrado de la Facultad de Economía de la UNAM', 'Circuito Mario de la Cueva sin número, Zona Cultural, Ciudad Universitaria, México, D.F. C.P. 04510'),
(3, 'Aula 101', '1er', 'División de Estudios de Posgrado de la Facultad de Economía de la UNAM', 'Circuito Mario de la Cueva sin número, Zona Cultural, Ciudad Universitaria, México, D.F. C.P. 04510'),
(4, 'Aula Magna Jesús Silva Herzog', 'PB', 'Facultad de Economía de la UNAM-Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(5, 'Auditorio Narciso Bassols', 'PB', 'Facultad de Economía de la UNAM-Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(6, 'Armando Labra', '1er', 'Facultad de Economía de la UNAM-Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(7, 'Alejandro Paz', '1er', 'Facultad de Economía de la UNAM-Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(8, 'Sala AEFE', '1er', 'Facultad de Economía de la UNAM-Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(9, 'Octavio Gudiño', '2do', 'Facultad de Economía de la UNAM-Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(10, 'R. Torres Gaitán', '2do', 'Facultad de Economía de la UNAM-Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(11, 'Horario Flores', '2do', 'Facultad de Economía de la UNAM-Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(12, 'Octaviano Campos Salas', '2do', 'Facultad de Economía de la UNAM-Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(13, 'Auditorio Ho Chi Minh', 'PB', 'Facultad de Economía de la UNAM-Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(14, 'David Ibarra Muñoz', '3er', 'Facultad de Economía de la UNAM-Edificio B', 'Circuito Interior sin número, Ciudad Universitaria, México, D.F. C.P. 04510'),
(15, 'Sala', '2do', 'División de Estudios de Profesionales UNAM', 'Circuito Mario de la Cueva sin número, Zona Cultural, Ciudad Universitaria, México, D.F. C.P. 04510'),
(16, 'Auditorio Edmundo Flores', '', 'Universidad Autónoma Chapingo', 'Km. 38.5 Carretera México-Texcoco, Chapingo, Estado de México'),
(17, 'Dr. Ángel Bassols Batalla,', '2do', 'IIEc ', 'Circuito Mario de la Cueva s/n. Ciudad Universitaria.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE `participante` (
  `id_participante` smallint(6) NOT NULL,
  `id_rol` smallint(6) NOT NULL,
  `participante_nombre` varchar(80) COLLATE utf8_bin NOT NULL,
  `participante_apellidop` varchar(80) COLLATE utf8_bin NOT NULL,
  `participante_apellidom` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `participante_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `participante_cargo_inst` varchar(80) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`id_participante`, `id_rol`, `participante_nombre`, `participante_apellidop`, `participante_apellidom`, `participante_email`, `participante_cargo_inst`) VALUES
(4, 8, 'Francisco', 'Martínez', 'Hernández', 'fcoher2802@gmail.com', 'Profesor'),
(5, 1, 'Oscar', 'Ugarteche', '-', 'difuiiec@unam.mx', 'Profesor'),
(6, 2, 'Ma. Teresa', 'S. López', '-', 'teresa@unam.mx', 'Profesor'),
(7, 2, 'Carlo', 'Panico', '-', 'panico@unam.mx', 'Profesor'),
(8, 2, 'César', 'Salazar', '-', 'salazar@unam.mx', 'Profesor'),
(9, 8, 'Dr. Alberto', 'Iñiguez', 'Montiel', 'iniguez@unam.mx', 'Profesor'),
(10, 8, 'Dr. Alan', 'Cibils', '-', 'seminariofinanciarizacion@gmail.com', 'Profesor'),
(11, 4, 'Dr. Michael', 'Roberts', '.', 'economarxsiglo21@gmail.com', 'Profesor'),
(12, 8, 'Patrick T.', 'T. Troester', '.', 'esphe@economia.unam.mx', 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` smallint(6) NOT NULL,
  `rol_nombre` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol_nombre`) VALUES
(1, 'Autor'),
(2, 'Comentarista'),
(3, 'Coordinador Académico'),
(4, 'Expositor'),
(5, 'Moderador'),
(6, 'Organizador'),
(7, 'Participante'),
(8, 'Ponente'),
(9, 'Presentador'),
(10, 'Profesor'),
(11, 'Traductor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_apoyo_evento`
--

CREATE TABLE `tipo_apoyo_evento` (
  `id_tipo_apoyo` smallint(6) NOT NULL,
  `tipo_apoyo_nombre` varchar(80) COLLATE utf8_bin NOT NULL,
  `tipo_apoyo_siglas` char(8) COLLATE utf8_bin NOT NULL
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
  `id_tevento` smallint(6) NOT NULL,
  `tipo_evento_nombre` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_evento`
--

INSERT INTO `tipo_evento` (`id_tevento`, `tipo_evento_nombre`) VALUES
(1, 'Catedra'),
(2, 'Coloquio'),
(3, 'Conferencia'),
(4, 'Conferencia Magistral'),
(5, 'Congreso'),
(6, 'Curso'),
(7, 'Diplomado'),
(8, 'Disertación'),
(9, 'Foro'),
(10, 'Mesa de análisis'),
(11, 'Mesa de debate'),
(12, 'Mesa de trabajo'),
(13, 'Mesa redonda'),
(14, 'Ponencia'),
(15, 'Presentación de libro'),
(16, 'Taller'),
(17, 'Seminario'),
(18, 'Simposio');

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
(2, 'Leticia García Pérez', 'garciap.leticia@gmail.com', '$2y$10$F9sV3AXgLY/2/32jGKrAPuBvLX5yqmHNlh14Iuq/KIKPWXW.ly0eu', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD UNIQUE KEY `evento_nombre` (`evento_nombre`),
  ADD KEY `id_tipo_apoyo` (`id_tipo_apoyo`),
  ADD KEY `id_tevento` (`id_tevento`),
  ADD KEY `id_lugar_evento` (`id_lugar_evento`);

--
-- Indices de la tabla `evento_academico`
--
ALTER TABLE `evento_academico`
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `id_participante` (`id_participante`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `institucion_organizadora`
--
ALTER TABLE `institucion_organizadora`
  ADD PRIMARY KEY (`id_inst_org`),
  ADD UNIQUE KEY `inst_org_nombre` (`inst_org_nombre`);

--
-- Indices de la tabla `institucion_organizadora_evento`
--
ALTER TABLE `institucion_organizadora_evento`
  ADD KEY `id_inst_org` (`id_inst_org`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Indices de la tabla `lugar_evento`
--
ALTER TABLE `lugar_evento`
  ADD PRIMARY KEY (`id_lugar_evento`);

--
-- Indices de la tabla `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`id_participante`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_apoyo_evento`
--
ALTER TABLE `tipo_apoyo_evento`
  ADD PRIMARY KEY (`id_tipo_apoyo`);

--
-- Indices de la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
  ADD PRIMARY KEY (`id_tevento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `institucion_organizadora`
--
ALTER TABLE `institucion_organizadora`
  MODIFY `id_inst_org` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `lugar_evento`
--
ALTER TABLE `lugar_evento`
  MODIFY `id_lugar_evento` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `participante`
--
ALTER TABLE `participante`
  MODIFY `id_participante` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_apoyo_evento`
--
ALTER TABLE `tipo_apoyo_evento`
  MODIFY `id_tipo_apoyo` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
  MODIFY `id_tevento` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_tipo_apoyo`) REFERENCES `tipo_apoyo_evento` (`id_tipo_apoyo`),
  ADD CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`id_tevento`) REFERENCES `tipo_evento` (`id_tevento`),
  ADD CONSTRAINT `evento_ibfk_3` FOREIGN KEY (`id_lugar_evento`) REFERENCES `lugar_evento` (`id_lugar_evento`);

--
-- Filtros para la tabla `evento_academico`
--
ALTER TABLE `evento_academico`
  ADD CONSTRAINT `evento_academico_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`),
  ADD CONSTRAINT `evento_academico_ibfk_2` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`),
  ADD CONSTRAINT `evento_academico_ibfk_3` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);

--
-- Filtros para la tabla `institucion_organizadora_evento`
--
ALTER TABLE `institucion_organizadora_evento`
  ADD CONSTRAINT `institucion_organizadora_evento_ibfk_1` FOREIGN KEY (`id_inst_org`) REFERENCES `institucion_organizadora` (`id_inst_org`),
  ADD CONSTRAINT `institucion_organizadora_evento_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`);

--
-- Filtros para la tabla `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `participante_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
