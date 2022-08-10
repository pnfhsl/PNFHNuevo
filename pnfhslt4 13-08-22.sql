-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2022 a las 03:57:38
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
(43, 1, 1, 1, 1),
(44, 1, 1, 2, 1),
(45, 1, 1, 4, 1),
(46, 1, 1, 5, 1),
(47, 1, 2, 1, 1),
(48, 1, 2, 2, 1),
(49, 1, 2, 4, 1),
(50, 1, 2, 5, 1),
(51, 1, 4, 1, 1),
(52, 1, 4, 2, 1),
(53, 1, 4, 4, 1),
(54, 1, 4, 5, 1),
(55, 1, 5, 1, 1),
(56, 1, 5, 2, 1),
(57, 1, 5, 4, 1),
(58, 1, 5, 5, 1),
(59, 1, 6, 1, 1),
(60, 1, 6, 2, 1),
(61, 1, 6, 4, 1),
(62, 1, 6, 5, 1),
(63, 1, 7, 1, 1),
(64, 1, 7, 2, 1),
(65, 1, 7, 4, 1),
(66, 1, 7, 5, 1),
(67, 1, 8, 1, 1),
(68, 1, 8, 2, 1),
(69, 1, 8, 4, 1),
(70, 1, 8, 5, 1),
(71, 1, 9, 1, 1),
(72, 1, 9, 2, 1),
(73, 1, 9, 4, 1),
(74, 1, 9, 5, 1),
(75, 1, 10, 1, 1),
(76, 1, 10, 2, 1),
(77, 1, 10, 4, 1),
(78, 1, 10, 5, 1),
(79, 1, 11, 1, 1),
(80, 1, 11, 2, 1),
(81, 1, 11, 4, 1),
(82, 1, 11, 5, 1),
(83, 1, 12, 1, 1),
(84, 1, 12, 2, 1),
(85, 1, 12, 4, 1),
(86, 1, 12, 5, 1),
(87, 1, 13, 1, 1),
(88, 1, 13, 2, 1),
(89, 1, 13, 4, 1),
(90, 1, 13, 5, 1),
(91, 1, 14, 1, 1),
(92, 1, 14, 2, 1),
(93, 1, 14, 4, 1),
(94, 1, 14, 5, 1),
(95, 1, 15, 1, 1),
(96, 1, 15, 2, 1),
(97, 1, 15, 4, 1),
(98, 1, 15, 5, 1),
(99, 2, 2, 5, 1),
(100, 3, 2, 1, 1),
(101, 3, 2, 2, 1),
(102, 3, 2, 4, 1),
(103, 3, 2, 5, 1),
(104, 3, 6, 1, 1),
(105, 3, 6, 2, 1),
(106, 3, 6, 4, 1),
(107, 3, 6, 5, 1),
(108, 3, 7, 1, 1),
(109, 3, 7, 2, 1),
(110, 3, 7, 4, 1),
(111, 3, 7, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `cedula_alumno` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_alumno` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido_alumno` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_alumno` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trayecto_alumno` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`cedula_alumno`, `nombre_alumno`, `apellido_alumno`, `telefono_alumno`, `trayecto_alumno`, `estatus`) VALUES
('07326555', 'Pastora', 'Carreño', '04145142614', '3', 1),
('09559044', 'Qwertyui', 'Asdfghjk', '12345678990', '1', 0),
('12243087', 'Lennys', 'Ramos', '04120225089', '2', 1),
('12345657', 'Qwerty', 'Asdf', '12345678879', '1', 0),
('15432854', 'Luke', 'Howland', '36575466677', '2', 1),
('26290778', 'Maria', 'Gelvez', '04142562254', NULL, 1),
('26290779', 'Moises', 'Gelvez', '04145555466', NULL, 1),
('26398488', 'Josmar', 'Rodriguez', '04120225089', '4', 1),
('27736916', 'Samuel', 'Torrealba', '04120558045', NULL, 1),
('27737749', 'Yosneidy', 'Carreño', '04162511104', NULL, 1),
('27828164', 'Lynneth', 'Pereira', '04125114494', NULL, 1),
('29778944', 'Yan', 'Quero', '04161595066', NULL, 1),
('30010891', 'Marialis', 'Queralez', '04162511104', '1', 1),
('30258145', 'Anderson', 'Segura', '04123528946', NULL, 1),
('5432287', 'Will', 'Traynor', '8765423', '1', 1),
('567542', 'Patch', 'Cipriano', '12345', '4', 1),
('765282', 'Aegan', 'Cash', '7654323', '1', 1),
('789068', 'Saul ', 'Perez', '456', '3', 1),
('862547', 'Ares', 'Hidago', '764234', '2', 1);

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

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id_bitacora`, `cedula_usuario`, `modulo_bitacora`, `accion_bitacora`, `fecha_bitacora`, `hora_bitacora`, `estatus`) VALUES
(1, '09559044', 'Alumnos', 'Registrar', '2022-07-05', '06:43 pm', 1),
(2, '09559044', 'Alumnos', 'Eliminar', '2022-07-12', '06:11 pm', 1),
(3, '12345678', 'Alumnos', 'Registrar', '2022-07-12', '06:12 pm', 1),
(4, '12345657', 'Alumnos', 'Eliminar', '2022-07-12', '07:47 pm', 1);

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
(4, 2, 'T2P1S1', '18262221', 1, NULL, NULL, NULL),
(5, 2, 'T2P1S1', '154328', 1, NULL, NULL, NULL),
(6, 1, 'T3P1S1', '567542', 1, NULL, NULL, NULL);

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
('PT2ST2P1S1P1G1', 151, 'T2ST2P1S1P1', 1),
('PT2ST2P1S1P1G2', 152, 'T2ST2P1S1P1', 1),
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
(1, 'Usuarios', 1),
(2, 'Notas', 1),
(4, 'Mantenimiento', 1),
(5, 'Bitácora', 1),
(6, 'Alumnos', 1),
(7, 'Proyectos', 1),
(8, 'Profesores', 1),
(9, 'Módulos', 1),
(10, 'Permisos', 1),
(11, 'Roles', 1),
(12, 'Secciones', 1),
(13, 'Clases', 1),
(14, 'Periodos', 1),
(15, 'Saberes', 1);

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
(8, 2, 123, '0.9', '2022-05-25', '04:13 pm', NULL, 1),
(9, 2, 147, '5', '2022-06-16', '10:15 pm', NULL, 1),
(10, 2, 148, '6', '2022-06-16', '10:15 pm', NULL, 1),
(11, 2, 149, '0', '2022-06-16', '10:15 pm', NULL, 1),
(12, 2, 150, '0', '2022-06-16', '10:15 pm', NULL, 1),
(13, 2, 151, '0', '2022-06-16', '10:15 pm', NULL, 1),
(14, 2, 152, '0', '2022-06-16', '10:15 pm', NULL, 1);

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
(1, '2000-i', '2024', '2022-05-26', '2022-06-23', 1);

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
(2, 'Modificar', 1),
(3, 'Eliminaaar', 0),
(4, 'Eliminar', 1),
(5, 'Consultar', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(15) NOT NULL,
  `pregunta` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `status`) VALUES
(1, '¿Cuál es el año de nacimiento de su padre?', 1),
(2, '¿Cuál es el nombre de su primera mascota?', 1),
(3, '¿Cuál es el nombre de su hermano/a?', 1),
(4, '¿Cuál es su libro favorito?', 1),
(5, '¿Cuál es la marca de su primer carro?', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `cedula_profesor` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_profesor` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido_profesor` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_profesor` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`cedula_profesor`, `nombre_profesor`, `apellido_profesor`, `telefono_profesor`, `estatus`) VALUES
('154328', 'Luke', 'Howland', '365754', 1),
('5432287', 'Will', 'Traynor', '8765423', 1),
('567542', 'Patch', 'Cipriano', '12345', 1),
('765282', 'Aegan', 'Cash', '7654323', 1),
('78906876', 'Saul ', 'Perez', '45664446567', 1),
('862547', 'Ares', 'Hidago', '764234', 1);

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
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id_respuesta` int(10) NOT NULL,
  `cedula_usuario` int(15) NOT NULL,
  `id_pregunta` int(10) NOT NULL,
  `respuesta` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `llaves` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id_respuesta`, `cedula_usuario`, `id_pregunta`, `respuesta`, `llaves`) VALUES
(1, 27737749, 1, 'hola', 'public');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resuestas`
--

CREATE TABLE `resuestas` (
  `cedula` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `respuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Superusuario', 1),
(2, 'Alumno', 1),
(3, 'Profesor', 1);

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
  `correo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `intentos` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula_usuario`, `id_rol`, `nombre_usuario`, `password_usuario`, `correo`, `estatus`, `intentos`) VALUES
('27736916', 1, 'churroman22', 'e10adc3949ba59abbe56e057f20f883e', 'lynnethpereira12@gmail.com', 1, 1),
('27737749', 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'yosneandrea@gmail.com', 1, 0),
('27828164', 1, 'qwerty2', '4d186321c1a7f0f354b297e8914ab240', 'samueljtorrealbar@gmail.com', 1, 2),
('9559044', 1, 'usbaldo', '21232f297a57a5a743894a0e4a801fc3', 'usbaldo2@gmail.com', 1, 0);

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
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id_respuesta`);

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
  MODIFY `id_accesos` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_bitacora` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id_clase` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id_periodo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
