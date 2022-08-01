-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2022 a las 03:54:01
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pnfhslt4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE `accesos` (
  `id_accesos` bigint(20) UNSIGNED NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `id_permiso` int(11) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `accesos`
--

INSERT INTO `accesos` (`id_accesos`, `id_rol`, `id_modulo`, `id_permiso`, `estatus`) VALUES
(26, 4, 1, 1, 1),
(27, 4, 1, 2, 1),
(28, 4, 1, 3, 1),
(29, 4, 2, 1, 1),
(30, 4, 2, 2, 1),
(31, 4, 2, 3, 1),
(32, 4, 3, 1, 1),
(33, 4, 3, 2, 1),
(34, 4, 3, 3, 1),
(35, 4, 4, 1, 1),
(36, 4, 4, 2, 1),
(37, 4, 4, 3, 1),
(38, 4, 5, 1, 1),
(39, 4, 5, 2, 1),
(40, 4, 5, 3, 1),
(41, 4, 6, 1, 1),
(42, 4, 6, 2, 1),
(43, 4, 6, 3, 1),
(44, 4, 7, 1, 1),
(45, 4, 7, 2, 1),
(46, 4, 7, 3, 1),
(47, 4, 8, 1, 1),
(48, 4, 8, 2, 1),
(49, 4, 8, 3, 1),
(50, 4, 8, 4, 1),
(51, 4, 9, 1, 1),
(52, 4, 9, 2, 1),
(53, 4, 9, 3, 1),
(54, 4, 9, 4, 1),
(219, 6, 1, 1, 1),
(220, 6, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `cedula_alumno` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_alumno` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido_alumno` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo_alumno` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_alumno` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trayecto_alumno` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`cedula_alumno`, `nombre_alumno`, `apellido_alumno`, `correo_alumno`, `telefono_alumno`, `trayecto_alumno`, `estatus`) VALUES
('26290778', 'Maria', 'Gelvez', 'gelvezmaria@gmail.com', '04142562254', NULL, 1),
('26290779', 'Moises', 'Gelvez', 'gelvezmoi@gmail.com', '04145555466', NULL, 1),
('26398488', 'Josmar', 'Rodriguez', 'josrod.2112@gmail.com', '04120225089', '4', 1),
('27736916', 'Samuel', 'Torrealba', 'samueljtorrealbar@gmail.com', '04120558045', NULL, 1),
('27737749', 'Yosneidy', 'Carreño', 'yosneandrea@gmail.com', '04162511104', NULL, 1),
('27828164', 'Lynneth', 'Pereira', 'lynnethpereira12@gmail.com', '04125114494', NULL, 1),
('29778944', 'Yan', 'Quero', 'yanquero@gmail.com', '04161595066', NULL, 1),
('30258145', 'Anderson', 'Segura', 'seguraander@gmail.com', '04123528946', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id_bitacora` bigint(20) UNSIGNED NOT NULL,
  `cedula_usuario` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modulo_bitacora` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accion_bitacora` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_bitacora` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_bitacora` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id_clase` bigint(20) UNSIGNED NOT NULL,
  `id_SC` int(11) DEFAULT NULL,
  `cod_seccion` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cedula_profesor` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `visto_profesor` int(11) DEFAULT NULL,
  `visto_tutor` int(11) DEFAULT NULL,
  `visto_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id_clase`, `id_SC`, `cod_seccion`, `cedula_profesor`, `estatus`, `visto_profesor`, `visto_tutor`, `visto_admin`) VALUES
(1, 2, 'HG12SL', '27736916', 1, NULL, NULL, NULL),
(2, 1, 'HG13SL', '27736916', 1, 0, 0, 0),
(3, 1, 'HG12SL', '18262221', 1, NULL, NULL, NULL),
(4, 1, 'T2P1S1', '18262221', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `cod_grupo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_SA` int(11) DEFAULT NULL,
  `cod_proyecto` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`cod_grupo`, `id_SA`, `cod_proyecto`, `estatus`) VALUES
('PT2ST2P1S1P1G1', 136, 'T2ST2P1S1P1', 1),
('PT2ST2P1S1P1G2', 137, 'T2ST2P1S1P1', 1),
('PT2ST2P1S1P1G3', 138, 'T2ST2P1S1P1', 1),
('PT2ST2P1S1P1G4', 139, 'T2ST2P1S1P1', 1),
('PT3ST3P1S1P1G1', 147, 'T3ST3P1S1P1', 1),
('PT3ST3P1S1P1G2', 148, 'T3ST3P1S1P1', 1),
('PT3ST3P1S1P1G3', 149, 'T3ST3P1S1P1', 1),
('PT3ST3P1S1P1G4', 150, 'T3ST3P1S1P1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` bigint(20) UNSIGNED NOT NULL,
  `nombre_modulo` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `nombre_modulo`, `estatus`) VALUES
(1, 'Alumnos', 1),
(2, 'Profesores', 1),
(3, 'Proyectos', 1),
(4, 'Clases', 1),
(5, 'Periodos', 1),
(6, 'Secciones', 1),
(7, 'Saberes', 1),
(8, 'Notas', 1),
(9, 'Usuarios', 1),
(10, 'Mantenimiento', 1),
(11, 'Bitácora', 1),
(12, 'Módulos', 1),
(13, 'Permisos', 1),
(14, 'Roles', 1),
(15, 'Reportes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_nota` bigint(20) UNSIGNED NOT NULL,
  `id_clase` int(11) DEFAULT NULL,
  `id_SA` int(11) DEFAULT NULL,
  `nota` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nota` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_nota` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visto_alumno` int(11) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_nota`, `id_clase`, `id_SA`, `nota`, `fecha_nota`, `hora_nota`, `visto_alumno`, `estatus`) VALUES
(2, 1, 112, '0.2', '2022-05-25', '11:58 am', NULL, 1),
(3, 1, 123, '0.4', '2022-05-25', '11:58 am', NULL, 1),
(7, 2, 112, '1', '2022-05-25', '04:13 pm', NULL, 1),
(8, 2, 123, '0.9', '2022-05-25', '04:13 pm', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `id_periodo` bigint(20) UNSIGNED NOT NULL,
  `nombre_periodo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_periodo` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_apertura` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_cierre` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`id_periodo`, `nombre_periodo`, `year_periodo`, `fecha_apertura`, `fecha_cierre`, `estatus`) VALUES
(1, 'I', '2024', '2022-05-26', '2022-06-16', 1),
(2, 'II', '2022', '2022-07-25', '2022-12-12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` bigint(20) UNSIGNED NOT NULL,
  `nombre_permiso` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `nombre_permiso`, `estatus`) VALUES
(1, 'Agregar', 1),
(2, 'Consultar', 1),
(3, 'Modificar', 1),
(4, 'Eliminar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `cedula_profesor` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_profesor` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido_profesor` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo_profesor` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_profesor` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`cedula_profesor`, `nombre_profesor`, `apellido_profesor`, `correo_profesor`, `telefono_profesor`, `estatus`) VALUES
('18262221', 'Joan', 'Perez', 'joanperez864@gmail.com', '04145144866', 1),
('27736916', 'Samuel', 'Torrealba', 'samuelt@gmail.com', '05501234455', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `cod_proyecto` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_proyecto` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trayecto_proyecto` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`cod_proyecto`, `titulo_proyecto`, `trayecto_proyecto`, `estatus`) VALUES
('T2ST2P1S1P1', 'PNF1', '2', 1),
('T3ST3P1S1P1', 'PNFH3LG', '3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` bigint(20) UNSIGNED NOT NULL,
  `nombre_rol` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `estatus`) VALUES
(2, 'Estandar', 0),
(3, 'Medios', 0),
(4, 'Otro', 0),
(5, 'Estandaritos', 0),
(6, 'Kasmnd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saberes`
--

CREATE TABLE `saberes` (
  `id_SC` bigint(20) UNSIGNED NOT NULL,
  `nombreSC` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trayecto_SC` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fase_SC` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `saberes`
--

INSERT INTO `saberes` (`id_SC`, `nombreSC`, `trayecto_SC`, `fase_SC`, `estatus`) VALUES
(1, 'Metodología I', '1', '1', 1),
(2, 'Metodología II', '2', '1', 1),
(3, 'Modelo', '1', '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `cod_seccion` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_periodo` int(11) DEFAULT NULL,
  `nombre_seccion` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trayecto_seccion` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`cod_seccion`, `id_periodo`, `nombre_seccion`, `trayecto_seccion`, `estatus`) VALUES
('T2P1S1', 1, 'IN2101', '2', 1),
('T3P1S1', 1, 'IN3101', '3', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion_alumno`
--

CREATE TABLE `seccion_alumno` (
  `id_SA` bigint(20) UNSIGNED NOT NULL,
  `cod_seccion` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cedula_alumno` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seccion_alumno`
--

INSERT INTO `seccion_alumno` (`id_SA`, `cod_seccion`, `cedula_alumno`, `estatus`) VALUES
(147, 'T3P1S1', '26398488', 1),
(148, 'T3P1S1', '27736916', 1),
(149, 'T3P1S1', '27737749', 1),
(150, 'T3P1S1', '27828164', 1),
(151, 'T2P1S1', '26290778', 1),
(152, 'T2P1S1', '26290779', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cedula_usuario` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_usuario` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula_usuario`, `id_rol`, `nombre_usuario`, `password_usuario`, `estatus`) VALUES
('27828164', 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`id_accesos`),
  ADD UNIQUE KEY `id_accesos` (`id_accesos`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`cedula_alumno`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD UNIQUE KEY `id_bitacora` (`id_bitacora`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id_clase`),
  ADD UNIQUE KEY `id_clase` (`id_clase`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`cod_grupo`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`),
  ADD UNIQUE KEY `id_modulo` (`id_modulo`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`),
  ADD UNIQUE KEY `id_nota` (`id_nota`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id_periodo`),
  ADD UNIQUE KEY `id_periodo` (`id_periodo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD UNIQUE KEY `id_permiso` (`id_permiso`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`cedula_profesor`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`cod_proyecto`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `saberes`
--
ALTER TABLE `saberes`
  ADD PRIMARY KEY (`id_SC`),
  ADD UNIQUE KEY `id_SC` (`id_SC`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`cod_seccion`);

--
-- Indices de la tabla `seccion_alumno`
--
ALTER TABLE `seccion_alumno`
  ADD PRIMARY KEY (`id_SA`),
  ADD UNIQUE KEY `id_SA` (`id_SA`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesos`
--
ALTER TABLE `accesos`
  MODIFY `id_accesos` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_bitacora` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id_clase` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id_periodo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `saberes`
--
ALTER TABLE `saberes`
  MODIFY `id_SC` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `seccion_alumno`
--
ALTER TABLE `seccion_alumno`
  MODIFY `id_SA` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
