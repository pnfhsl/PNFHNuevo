-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-09-2022 a las 01:02:55
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
(111, 3, 7, 5, 1),
(288, 1, 1, 1, 1),
(289, 1, 1, 2, 1),
(290, 1, 1, 4, 1),
(291, 1, 1, 5, 1),
(292, 1, 2, 1, 1),
(293, 1, 2, 2, 1),
(294, 1, 2, 4, 1),
(295, 1, 2, 5, 1),
(296, 1, 3, 1, 1),
(297, 1, 3, 2, 1),
(298, 1, 3, 4, 1),
(299, 1, 3, 5, 1),
(300, 1, 4, 1, 1),
(301, 1, 4, 2, 1),
(302, 1, 4, 4, 1),
(303, 1, 4, 5, 1),
(304, 1, 5, 1, 1),
(305, 1, 5, 2, 1),
(306, 1, 5, 4, 1),
(307, 1, 5, 5, 1),
(308, 1, 6, 1, 1),
(309, 1, 6, 2, 1),
(310, 1, 6, 4, 1),
(311, 1, 6, 5, 1),
(312, 1, 7, 1, 1),
(313, 1, 7, 2, 1),
(314, 1, 7, 4, 1),
(315, 1, 7, 5, 1),
(316, 1, 8, 1, 1),
(317, 1, 8, 2, 1),
(318, 1, 8, 4, 1),
(319, 1, 8, 5, 1),
(320, 1, 9, 1, 1),
(321, 1, 9, 2, 1),
(322, 1, 9, 4, 1),
(323, 1, 9, 5, 1),
(324, 1, 10, 1, 1),
(325, 1, 10, 2, 1),
(326, 1, 10, 4, 1),
(327, 1, 10, 5, 1),
(328, 1, 11, 1, 1),
(329, 1, 11, 2, 1),
(330, 1, 11, 4, 1),
(331, 1, 11, 5, 1),
(332, 1, 12, 1, 1),
(333, 1, 12, 2, 1),
(334, 1, 12, 4, 1),
(335, 1, 12, 5, 1),
(336, 1, 13, 1, 1),
(337, 1, 13, 2, 1),
(338, 1, 13, 4, 1),
(339, 1, 13, 5, 1),
(340, 1, 14, 1, 1),
(341, 1, 14, 2, 1),
(342, 1, 14, 4, 1),
(343, 1, 14, 5, 1),
(344, 1, 15, 1, 1),
(345, 1, 15, 2, 1),
(346, 1, 15, 4, 1),
(347, 1, 15, 5, 1),
(348, 1, 17, 1, 1),
(349, 1, 17, 2, 1),
(350, 1, 17, 4, 1),
(351, 1, 17, 5, 1),
(416, 4, 1, 1, 1),
(417, 4, 1, 2, 1),
(418, 4, 1, 4, 1),
(419, 4, 1, 5, 1),
(420, 4, 2, 1, 1),
(421, 4, 2, 2, 1),
(422, 4, 2, 4, 1),
(423, 4, 2, 5, 1),
(424, 4, 3, 1, 1),
(425, 4, 3, 2, 1),
(426, 4, 3, 4, 1),
(427, 4, 3, 5, 1),
(428, 4, 4, 1, 1),
(429, 4, 4, 2, 1),
(430, 4, 4, 4, 1),
(431, 4, 4, 5, 1),
(432, 4, 5, 1, 1),
(433, 4, 5, 2, 1),
(434, 4, 5, 4, 1),
(435, 4, 5, 5, 1),
(436, 4, 6, 1, 1),
(437, 4, 6, 2, 1),
(438, 4, 6, 4, 1),
(439, 4, 6, 5, 1),
(440, 4, 7, 1, 1),
(441, 4, 7, 2, 1),
(442, 4, 7, 4, 1),
(443, 4, 7, 5, 1),
(444, 4, 8, 1, 1),
(445, 4, 8, 2, 1),
(446, 4, 8, 4, 1),
(447, 4, 8, 5, 1),
(448, 4, 9, 1, 1),
(449, 4, 9, 2, 1),
(450, 4, 9, 4, 1),
(451, 4, 9, 5, 1),
(452, 4, 10, 1, 1),
(453, 4, 10, 2, 1),
(454, 4, 10, 4, 1),
(455, 4, 10, 5, 1),
(456, 4, 11, 1, 1),
(457, 4, 11, 2, 1),
(458, 4, 11, 4, 1),
(459, 4, 11, 5, 1),
(460, 4, 12, 1, 1),
(461, 4, 12, 2, 1),
(462, 4, 12, 4, 1),
(463, 4, 12, 5, 1),
(464, 4, 13, 1, 1),
(465, 4, 13, 2, 1),
(466, 4, 13, 4, 1),
(467, 4, 13, 5, 1),
(468, 4, 14, 1, 1),
(469, 4, 14, 2, 1),
(470, 4, 14, 4, 1),
(471, 4, 14, 5, 1),
(472, 4, 15, 1, 1),
(473, 4, 15, 2, 1),
(474, 4, 15, 4, 1),
(475, 4, 15, 5, 1);

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
('07326555', 'Pastoraaaaa', 'Carreño', '04145142614', '2', 1),
('09559044', 'Qwertyui', 'Asdfghjk', '12345678990', '1', 0),
('09635831', 'Jose', 'Rodriguez', '04125166545', '4', 1),
('12243087', 'Lennys', 'Ramos', '04120225089', '2', 1),
('12345657', 'Qwerty', 'Asdf', '12345678879', '1', 0),
('15432854', 'Luke', 'Howland', '36575466677', '2', 1),
('26290778', 'Maria', 'Gelvez', '04142562254', '2', 1),
('26290779', 'Moises', 'Gelvez', '04145555466', '2', 1),
('26398488', 'Josmar', 'Rodriguez', '04120225089', '3', 1),
('27736916', 'Samuel', 'Torrealba', '04120558045', '3', 1),
('27737749', 'Yosneidy', 'Carreño', '04162511104', '3', 1),
('27828164', 'Lynneth', 'Pereira', '04125114494', '3', 1),
('29778944', 'Yan', 'Quero', '04161595066', '2', 1),
('30010891', 'Marialis', 'Queralez', '04162511104', '1', 1),
('30258145', 'Anderson', 'Segura', '04123528946', '2', 1),
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
(7, 1, 'T1P1S1', '11543285', 1, 0, 0, 0),
(8, 2, 'T2P1S1', '15432287', 1, 0, 0, 0),
(9, 5, 'T3P1S1', '18906888', 1, 0, 0, 0),
(10, 6, 'T4P1S1', '18567547', 1, 0, 0, 0),
(11, 8, 'T1P1S1', '20765282', 1, NULL, NULL, NULL);

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
('PT2ST2P1S1P1G1', 8, 'T2ST2P1S1P1', 1),
('PT2ST2P1S1P1G2', 9, 'T2ST2P1S1P1', 1),
('PT2ST2P1S1P1G3', 10, 'T2ST2P1S1P1', 1),
('PT2ST2P1S1P1G4', 11, 'T2ST2P1S1P1', 1),
('PT3ST3P1S1P1G1', 16, 'T3ST3P1S1P1', 1),
('PT3ST3P1S1P1G2', 17, 'T3ST3P1S1P1', 1),
('PT3ST3P1S1P1G3', 18, 'T3ST3P1S1P1', 1),
('PT3ST3P1S1P1G4', 19, 'T3ST3P1S1P1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llaves`
--

CREATE TABLE `llaves` (
  `id_key` bigint(20) UNSIGNED NOT NULL,
  `public_key` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `private_key` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firma_digital` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `llaves`
--

INSERT INTO `llaves` (`id_key`, `public_key`, `private_key`, `firma_digital`, `estatus`) VALUES
(1, '-----BEGIN PUBLIC KEY-----\nMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAvz3z1Rs77Cz8AUVaj8RK\n+IyAjIU7O+tsQvM5xFvZ9sEbAgnNaM/V0gdfBIklbBzTl4lidkD96ucCZFUYANxl\n5mLfir8pQi6kqDlQmkDoPdMFUCIys1DL75Vk3zV7Y2D+JaqczbFyI+rpj/CNTTsZ\nXLxUXjAFC11688PNEOPISPtqQMvJLPnHuI1HtkmV8TiTXfZ3MvLEdCVcTIBHh0H/\n2419auLW/Vg32NpeujvyFYl+4I6TNMCBtUQYT9bxgOmzPDt0hPXyt++bcv4Ux4SM\nuFBebsbR2slbJp/6KCV5A1I/flGXhjSR3kIxwpyTKrAu+KVLYA4RNKkCZQOXlF6O\nCwIDAQAB\n-----END PUBLIC KEY-----\n', '-----BEGIN PRIVATE KEY-----\nMIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQC/PfPVGzvsLPwB\nRVqPxEr4jICMhTs762xC8znEW9n2wRsCCc1oz9XSB18EiSVsHNOXiWJ2QP3q5wJk\nVRgA3GXmYt+KvylCLqSoOVCaQOg90wVQIjKzUMvvlWTfNXtjYP4lqpzNsXIj6umP\n8I1NOxlcvFReMAULXXrzw80Q48hI+2pAy8ks+ce4jUe2SZXxOJNd9ncy8sR0JVxM\ngEeHQf/bjX1q4tb9WDfY2l66O/IViX7gjpM0wIG1RBhP1vGA6bM8O3SE9fK375ty\n/hTHhIy4UF5uxtHayVsmn/ooJXkDUj9+UZeGNJHeQjHCnJMqsC74pUtgDhE0qQJl\nA5eUXo4LAgMBAAECggEAeuaQfaKr5sKeDR8J7RyD5ak9r5CrmX1ZLMlslWFF+Qru\nlWfBRxtR2VD9YkfU8d6wqFEVItPvmndtFReOfnclUWK3ME5bcHnTPXzf7NHLrnef\nkXj4xj4lYUnL8ppHOn2JtqEndhUUOjrscKFx3XEegndRbNpFU6F2s5NghPstqqAy\n7eawYbwWfdVcsjw91OwKfgjOhIIEzsJrJ6rQw14eLIpXMI3yN0yOovWfxKb69HZx\nt/6VprauJtKUur1zVWsy0c7RltqnPdKGrnF1aQzcknRKeDTsM9oLQW41BrbSvVkh\n5wskXh1/yfhfMwpxem/9mCZ8/ZPrnDeK6LiwLWVxQQKBgQDtyn/qXaSkVtPwDN9K\ncgVZ1BCfTgqzoqiOhxVbeel0dHg2cOXuWNzfzYMUDjgAbJkdJJ3y+bNEg0QOGDNH\nAY/Fd2qQ1lOcks24cw/w0IZhgG7pUHOzFYw79QxdT8StfOVk2EAFXlV7suzutdFh\n6w69C95gYVNWLmPDTXQxFCpvoQKBgQDN4u+t0PDCe1tqz5ZculYyYlBno1rUCV69\nsxkLcHvYE5URtoSVgg5AOfKmFPcHrD/OTulaMdKlHn8agVgAuBIf0tjOl6mpCDHp\ngoDofEnXBpexD0dLn6e0TDV8wiHmaI0V+M5nNHLA5/EgeuqjbJbKIFhJLZA0od/K\n7YyiqEMOKwKBgQCc90ga7/enl71NP2ICJWQM2OSkFAMSczPq6ZaajM4jVmKoJTxS\naoxam7GEAqLK/OTRjQNKibPhbPj2iNkIbSp3gg1xUFlfCLUNpb6HC085e2s7TiUh\nuP6Z8XdY/TfqAYD3YZxZLt0ky4aFSLXPejd/aR9A5d36DKNEH5OsdhBRIQKBgQCQ\nedBhM77PassCz/sexO+Z2Z28rEgfhRfDnLtVaLCvN0ajMGYnmCUx8rgQzaNv8fKw\nbnWYAmBj2FuvGNbNYl3tkQLtLkYzRHnp99dHzXfveUPXTvZj3fxMLDJYgs5RJkrj\nAT6t84MXVWvCtB6VYa0K19m8OEn6dSFbAIlw1wx/EwKBgHnz5j+L3HRsTvOgkx53\njkUIfvHzGe8Yhhn9ilQMjyo3j2P0XWOQiljMg7g8g/eIZ2+On12Pyy2GycYRoFbF\n/7VUMsvPE3vV5i1o2S6Col5r/+jiPRiGlFE+otRndS8Jyg65mfpGgD3k8w6ET1cn\nFxVS48KdJzUQvdsDSwxXPpu5\n-----END PRIVATE KEY-----\n', 'JAJAJa', 1);

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
(3, 'Periodos', 1),
(4, 'Saberes', 1),
(5, 'Secciones', 1),
(6, 'Clases', 1),
(7, 'Proyectos', 1),
(8, 'Notas', 1),
(9, 'Usuarios', 1),
(10, 'Reportes', 1),
(11, 'Bitácora', 1),
(12, 'Usuario Bloqueado', 1),
(13, 'Modulos', 1),
(14, 'Permisos', 1),
(15, 'Roles', 1),
(17, 'Mantenimiento', 1);

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
(9, 10, 21, '1', '2022-08-16', '04:44 pm', NULL, 1),
(10, 10, 22, '0.8', '2022-08-16', '04:44 pm', NULL, 1),
(23, 7, 5, '0', '2022-08-16', '07:28 pm', NULL, 0),
(24, 7, 6, '0', '2022-08-16', '07:28 pm', NULL, 0),
(25, 7, 7, '0', '2022-08-16', '07:28 pm', NULL, 0),
(26, 7, 5, '0.7', '2022-08-16', '07:55 pm', NULL, 1),
(27, 7, 6, '0.7', '2022-08-16', '07:55 pm', NULL, 1),
(28, 7, 7, '0.9', '2022-08-16', '07:55 pm', NULL, 1);

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
(1, 'I', '2024', '2022-05-26', '2022-06-23', 1),
(2, 'II', '2022', '2022-08-17', '2022-09-13', 1),
(3, 'I', '2021', '2021-11-18', '2021-12-22', 1),
(4, 'I', '2020', '2020-05-12', '2020-10-14', 1),
(5, 'I', '2022', '2022-04-12', '2022-09-15', 1),
(6, 'II', '2021', '2021-09-06', '2021-09-24', 1),
(7, 'I', '2019', '2019-04-10', '2019-04-24', 1),
(8, 'II', '2016', '2016-05-11', '2016-08-16', 1),
(9, 'I', '2015', '2015-06-16', '2015-07-22', 1),
(10, 'II', '2015', '2015-08-12', '2015-10-14', 1),
(11, 'I', '2016', '2016-04-12', '2016-08-10', 1);

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
(3, 'Eliminaaar', 0),
(4, 'Modificar', 1),
(5, 'Eliminar', 1);

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
('09243485', 'Ines', 'Ramirez', '04245121844', 1),
('09635831', 'Jose', 'Rodriguez', '04125166545', 1),
('11543285', 'Parrish', 'Howland', '04123657545', 1),
('14788456', 'Juan', 'Peroza', '04241114573', 1),
('15432287', 'Williannnnnn', 'Butchess', '04248765423', 1),
('18567547', 'Martin', 'Valverde', '04123457875', 1),
('18906888', 'Carlos', 'Perez', '04164656711', 1),
('20765282', 'Aegan', 'Cash', '04147654323', 1),
('21862547', 'Ernesto', 'Hidago', '04147642341', 1),
('22554789', 'Andrea', 'Briceño', '04145554656', 1),
('22741852', 'Karla', 'Martines', '04164567893', 1);

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
  `id_respuesta` bigint(20) UNSIGNED NOT NULL,
  `cedula_usuario` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pregunta` int(10) NOT NULL,
  `respuesta` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id_respuesta`, `cedula_usuario`, `id_pregunta`, `respuesta`, `estatus`) VALUES
(46, '15432287', 1, '1967', 1),
(47, '15432287', 3, 'heidy', 1),
(48, '15432287', 4, 'boulevard', 1),
(49, '09243485', 1, '1967', 0),
(50, '09243485', 2, 'mancha', 0),
(51, '09243485', 3, 'heidy', 0),
(52, '11543285', 3, 'tony', 1),
(53, '11543285', 4, 'biblia', 1),
(54, '11543285', 5, 'ford', 1),
(55, '07326555', 4, 'hushush', 0),
(56, '07326555', 3, 'carlos', 0),
(57, '07326555', 2, 'cache', 0);

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
(2, 'Alumnos', 1),
(3, 'Profesores', 1),
(4, 'Administrador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rsa`
--

CREATE TABLE `rsa` (
  `id_rsa` bigint(20) UNSIGNED NOT NULL,
  `cedula_usuario` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llave_publica` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `llave_privada` varchar(4000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firma_digital` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_desbloqueo` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rsa`
--

INSERT INTO `rsa` (`id_rsa`, `cedula_usuario`, `llave_publica`, `llave_privada`, `firma_digital`, `codigo_desbloqueo`, `estatus`) VALUES
(6, '15432287', 'UXozZHJNM3ZxdGdZWkV2d213YnZFODhiZzVGTE00dVFIdVFaVTBqbFdJOVdCRzZ4a25SUGRxQ2RhZFdFbHVSYkRnMVNBU3orT0tWcmxTZFFDaHVjMFllcVY5dDZ5aHNaMWMwWnN1VTZPbHhSUGZmK2crVExMODJCdmRZRml6TVZnUVpzakN4YzVtUUlwc2c2RXRZczVyM0dQZHpCMGRGOW4yQXpONmxiTm92a25Ic3c2eTdwalpSbTVzNUVtUjRsQ093OEttemIya01kM0hac29BaVBrMDROY3VvZFlpSGQ4QTRFR0k4Z3dzclBkdmZGZ1FJUmg3YWluYXRBWEEyMWMyS1B4ZjgvdzQxcE9MbWZ5U2Q2eDJmWkhKYWtlL0wxd2pkZFA3M2puNGk0MDk1THM5VzVrdndBRXM4SmlBb0hSa1hDdEp6UFpldUJuM01EN2RxczRveWJoc3lLU0t4c0lLUElHZ3ZmWkxvZHRHdENtY05IRk94MENDV2cxY3ZEZHdLTFdwaU1tT2FWeHBuWFpteHpkTm9vTzhVcDAwNzI3NW5BczlQMzVEL2lqOUREbVNOVDZkOUpoaXBBSXd3RVE1THBZdXJNWFpZbmE2aWxNN25MSXlFME1NZWhKNit1VElEcmtmWVI5MkJlcTUvd2h5eGNMb2htQkdaWTZtb244RENMSHFDbnQ1Rkx0WmZxdlEwN1pFcjF0WThXUUc2cGhEMktGR1d3TjdlNFE4NUdhT1ByWEppankrSGllM2xYWE1HYVhYVGpPcGlSa1FHQlBrazJZeGdsMi9TWm5rYU5SV3NJd0UxbkhuWT0=', 'MHlIV2JkbWM1eHpieVhNMkR1L3F3MnJ3a3kzcnNma3lheTlaK0RNeEdNdGZqUGo5SlQvM1lTSGovUlVPY0tzL2NWV0x5V0NWZHM1THlZNUZrM0RaTzNWUUJ6RmE5N0tZNGN4bjl2V0I0N0djMkNQaFFMdm93aDdSaVFQSWFNVjVEcHVHRlAxem5JL2J5QnBuSGdVemdlclFQaDJ5NnFuSVgydEZzaG1rVStNdXFkdWVHNWwvY0dpY0dQNW5Ba3lCR2xhNzN2TzhBREVZWHdCcHNKOEZDVHdLdUx1eEpJS3ZKUXdPTTlHYTZFRDA5VldBUmhxSkVkdW1SQUFKRFlCbGtrbjRCMTNCUWZhbUt5N2FjekNpZWtVa0FrSkhhdWtKYkRZRGFFZWVPQlhLUVd6aVlIbTZBSFZNQkttbjlqby9pZCtNanJzQWtrUVZVWkZKd0E0MDhyQWRaZHdyQXdLQXloWFR5Y1gxZ3ZTa1MvdHhsMEZIckRkRkJ3bzFJS0RuZHh1bC9xaGNpZ1lCd2dWVjY0YUR1aXU4dGhSRUt3RGZaV09KSUFWVlh6aEdydHJCQnpESzVQKzNCZ1ZYL3MzL2FUOFdKRFNUTVZHbDhhMWJDNjdqeGNXbGdDbHlsYmEybThETXIvL096N0l0UHFKbFRhNWlRcXhSSEFMcDJVT3pGalpJdGsvcEhLR2pVNDFOZ3JIM0oxekRDV0JuL2ZPODl3d2ZiT1BpOFF5dTcvTXJTMTY1UitjU1FpV2gyL2lDUVpIMUk1SDhkcWFSaitBZTZzOFcrb090SGVHMkRqWVBCZ2s1UkYrWUZOWDNFT0c5cC9Gc0psY3JIdkNOOWl3SGRGajRsK3dGU2JwU1Nxb1hOcFBjYmZVaVUrSXFIeHlNR3YyMmd5WVJ1MUV4anQ0RWZ5anJqc3htSCsySWNtS2QwNFhLaHdyTEJnVzFkQTB3eHJubUxKb1N0YWVsS0hqbDZvRWMva2NPVnlSOHlPMmsxOWI5U1ZtRnFNaGgrcVBNMzc3K05QZGoxcHd0MXZ1aXpLMFN4aC90ODgxVWxyWEJJSm1GUjJRUVh6NngyRXM2YjdoT05wYUltVVFKbWlPaFJrUzhGVTZyNUk1OThITkw0eHNKQXo1MFh6MjZqOUYxak01TFZHR2lBSmZvcmVJcHhRbThldCt4ZmVmbVFLb2RSU0Y1YlhvWCs5bVVUQnpGYWRYa2x6aDhTblBWYTJFWk04M3RrdGtRdjVYcWk4dWNiQ290TGJWYllwTkpHUWJmRUpHS0h5Tmg3bEdkYVVpaXdVN0Iwck9JK1lkcitNNWNDQnlweTVDU0NLTnpUTWNoSzZUcnUrNFZIVnJzbGVqM1l2bk1Ta2pjVXVVRXRmY2NDdXJJd21kQ2lKRDZNaDArUGY0djFHSHo1QkI2RFYvQlR6YzY5aTVGWjhZaXBVU255d0xpZ01rZUlkL1FhNkwxY0xSSm5ZWGhKS0xSQ3k5SlcyUE9zZ0RBMFhtNDhadlJCUXFCNVhGS2JXamo0cWdrU210WEcxVzF6NnFxTXhINlBYV1ZCc3JMN2pTK3p5N0V0bExnV3hvbXRteUQvN3lqUzZ0K1JxOXZsR0hsRzlwREc5SXRqOTlidnVyOFNwWTQvMEVKelhNVlR0Z3c3MlB3dlN0eFNhZ0NrNTVzTGRYN0tET3dvYTE0ajJyWm5ZaVc3eUd3Y0pKVXBXYjM4Y2xiVVBBbmxXS3czRGxhM0Y3ekVhdENxZG9wOG95Z1JXR0hDQ25CK3JnNU5QbDhYSE0rTlFKZFVMdjJkYW51L3dXVEhCdVJWY3dBSVhNNGRqaUI3elhlV1gvZDhweVZHbGhqMjlmVFFCR0FLczJSWU5jcTc2RXc3TDZPTUpYY01zbHBNYXdLZnZiWnFwZURPUkYzaUpXakFNRlhrUTdJNTMwWFlnVURvcVdrOTJmUFViRmJ3akhEZ0swVWQzdDFRNjVuWUJxZU5XQVEyT29WSTU1UEpjNjJodVlOTVExZEtvcFFPVTllSVZaelNDRUM3cXJNRWxDdWdOcEVyamZTR1NVT3hKenpYSU1uK0hTa2xETUZ1dkllTU42TnV1QTQyaXBmRDNmWTNXL0dLUG0wN2FMd0lhTERNMHhkWTUyVUFKeGgyTUhPVHNDUWRra2RaTlhnRUdSV0dXaVJsRHNRdXpZKzhuejFkYzN2Z2gvQkJUdVYyVng0QU9qKzdoclRGcUQzelBGc3RxSktVL3gzQkJFcVhTd1JtMCtkbFRvMUFhWHlDdUh6aStKenNyS1UyZG1hY091NFhUVDgzY2E1YW1nTmljVkxyOGV1aENTWUlpQW50K280L3h2Z3pRVW5pdkowcFgwYWRpeDVRV0c0dnJmb25uaXV5ZWUybDFOTXJNZ2hOQXlrYU41SVVzWWprczB4K1dSNEpUdWpSV3hQanVodVB3Qi9KWG9HWkhVaVUyOERxMHVZNkJxRjVzYmU2SWRPUUJ1dmtGbjBhVHI2YlpobkxHQkQ4d1FoVndmWndLQlRLUDM4ekd3dmtNTVRuSFhCLzF4dWtoWitxemNXK3lhc08zS2NNbXU2b3phQzRERWpVclU1ODhIS1ZRa3ZMMkozWlJYN25xMjBrazZQU1NzS0h5QVZuSW40eTY0WFlYdFBNTXJjL2VPa2NEMnc5VUpmUDJCOEwzTmJjR3A1ZHhhMkZyMktZL3h5Z1JudUJWYTl3Y2NqQzlWODE3L1Jod1Z6OGVNdHdXM21YaHhVMkVNTzhnV282aW50aFB0dU4vZDAvd0NEYy9MM3JqeW54V0lYN2NyRkN0UEsvNnpOajBYK3A3Qnc2MFRGdTlMMXFab2ptbkREcUx3RUM5a2p2ZDdjQzJFcVN5MHBrM016eE8yVDFKd0xpSHl5TldTWEVLSmFMSGVVSTRHL2Z1eWhNaHJKQ3hnUmU2Q3BPR0dCeUwwQUJydFh3bmdXVW1tUEE5UTJCM3ZEVDRJd3Y0U0lHQk5XTG1udUQyODJYdXVSNTZHSEtpOFpUUVh6dytJPQ==', 'cDg0SnJBMTU4YW4zSU1HbnluanJ0dz09', 'HdrjVj+WnMbxSVFMHERr8G0anKHNx+76ywUmcz/YKRyb1HrG862QKF/SMsjTa2eQPsnF8NjcYvNDjE3v5fx8rYmogF6wErw/+TkqPw9keh+b686b2mtGCsHMc5VC1bczrl4ucd/iFxvPJX+OznSsQROurYWoOoyYMaau+BCikMdzQ+cUMkb6WPiW/1btPf/g0OC90OhGmx+QY1G0wJNoxrArZfWKpVCCiw7VGJaYIZvumDoGA8bLNRnjECEVk6ija/n72hLsrrqA8SVL8Qg6zB+fMOi0dBIwA+eDLDn5zHL6BbHF5CrV3/pw4EQIcdPPCvV16+ALJ1QyI6QERgHzRQ==', 1),
(7, '09243485', 'UXozZHJNM3ZxdGdZWkV2d213YnZFODhiZzVGTE00dVFIdVFaVTBqbFdJOVdCRzZ4a25SUGRxQ2RhZFdFbHVSYkRnMVNBU3orT0tWcmxTZFFDaHVjMFNORVRaMlRFQkt0NDNvQy9BV3VzYS9NZWZiSHdqN1p0VDV5ZW1XRHdkQ1ppaTdLVUZ4K0R0alBCRXdOU2U5M0ZWWFlqbW1pT1cxQmw0eW43V0FaVTlQRSs0dFhWdUNXWDdWN1hXa0dHRytUQm5WUzZqMnAvVVhMTHpaQ1pJRDFEVWVpVmgxQVQvc29SZTNiSEtUSDdwTEYvWjFReitkMUVPeVR3R2crOWlYM1lmL1Buc0JCbUZkTk95UDhONzNEVDhDbmFDeVNadlFDZWdiR0pxRlVQTXdKNFB0MWNsU3Y4Yy93MGExWStpT3FmclpBUDNPWFZVRVRPQmJyQmJLNmMzZW4zNXMycWhHQnhKRm5CM0FXMElsTGxxNWs4RnBNNnF3SDhPYS90azFDTXRiQUNlLzJ4RGFmL20yTzIyZExFbU5ncjZGUUEyYUVia1FXbWVHV2xaRmFENnJ6dXkvQ2UxbVVSRmh1bEF0RVVXWW1NZk55Rm9kb1NqM1I1SjBPTXFQUmU5Q1BjS01RQ2NIN3kvcmYyNHlXQzN5cDBQR1JwNkMzZHpzclo1Syt4bFA3YlRvYUFWaVZsd0RzU0RDRytpc1Q4aE5YYy9qKzFvRDFxQkhGdG13aTZ5N25PQ3RxZ2g4eFBCdjBJdHZ0SUtuZlFSb1VFUU5lWEdYTmt1aTJiT3U5c3U0YWFKZHBhRjRkUmxOd2JSVT0=', 'MHlIV2JkbWM1eHpieVhNMkR1L3F3MnJ3a3kzcnNma3lheTlaK0RNeEdNdUdXem9xaG41VGNXYUdIZG9SVmtnZkxaT1BENXZLTHM0cm5WTlNvM3JBUytyNDlZRFVSZTQzYnFCbWR2K1hSOHRjVS96TjEwZFdyakgralk3NEhEVE16UC80WkRXSm0xL1U5c2h0UFpmdzR2eE1Wa1dRS1k2RDI1MnBnbmNFSlBvRUphUE5ESEJsdG13ejBlR3U5KzVJQTRYR2FTQ1NVY0EwOGNIbTdvRStrTDh1QmY4RjQrb29DanUvUVZvNGM0cHVOcUdMRUR3SUtCUW93cTN4RUg4NFVUT2FlSGlZUk41ZEdEbU1zT2FYK3o1UHJPWGtWeHBENnN2aWhZZXJpMHZMUmRpam9kVTVVRUZCL1JNbndZdlpHTTVSdXExWGFCVmJ3ZkYrVEhKWjdoMUpvTTJTQXlEQXhKR2VRb0hlK0o0djQySWhDckg2NFQ5MzhGd1JCMnY5ZXd0ajh6VDVXZTJIajc0cW1vSlpjYk1ObE8rZ08zZktRU3dxMFpjVnNiQTNYYlR2d0V6MDdGZEFvTjhPWEplaklmY1ZDTkUvMUJqTDhlTGJCQVI2VTJSSklrS2FDV0FQek8rRno1T1pkKzBvWEZGcm9EeS92enZUaHltYzZ6TkgwbG5zdks3UlZ0MWpWckJONy9JSklab1dMSENveHlhanIzWFlYampMeVk2NmV6Q2xYNjBkTHFTSDcwTnZacVBFNHY5VHFreSt2SXExTytqd3Y2L29oRFBIcTlVOUcxeStOT0ttSVZOWE9adWJvcWc1OGVMazEvSjlDa2w5SW80c210OUNlMUJoajZ2RXBRVUxsSXpKRFZ4K2lCeG4wK0dBZkM5WW1DVTlUaGVQZm9pYmdlemlFRTlYRmM2T29pSUFRTEFmLzUvdU1oL1dwMjE2VEJ2ejRONGhiTGZ2enpiZ0dGSWhyU2FIb1FtbUZvZGNwUWlHcHErZldac0ZHUUd1SkpabFBvTEd4Ujk0eUVCVjVOek9CbDBoN0pncXFsbFhMMTNOQ05tTWtEWjdUcGFFbkVhckkzOUpZMi94ZnNPd0dTbi9PSGtITWhnUnVsM1NrNXZiZUx4VUNDRVVTYW9FYkdrMjdjUXUwVVVySVpwSDhoeDN3d0IySnhIaHVRcUhuci8xcWc3YUFRUzkyZFdOMUhWb3RscWdJVCtUVWJ3K2tPaFEwRE5kcHFNOHJneitJS01HcWdBcmlUYWhiV3pQWE90QTByRENNWXhhdktHa3Jka1cwRXVFWUIySjJjM2lXd3ZLSTBMdHoxRVFLNENvMkE2ZUpzK0p2c3lkd1dGTXVFczVnT0hVeWswM1pUSkdGOUVibUxVNzB4a1p2d295WDdWVlRId0pFek45Y29mVlhHaTRtSGo4VUJHUUFqTmtyMkZEQ0pUVGhrUEVxUnd2dDVRR0pvSE84c3ZMang2TTNpM1RabXRVb3VmaVBWcGFjK2NYdjZIdnRSWHkxVVRHRkpaS0FtUEhxTWtKa0xybFh2Q1VaK2lXdE9aeUIzeXFXVVU3TUlsTW0rRGJRc1BoeUs3S055TGwvaUtTZWJDTEhHMU1FenYvVmpvMXY3a09xNExzTVo4a2JFTEpOS1FTSlJXNTN1SVVvSVhadkNZekJvdWtVRDlxTElLVXB0cTkzUldzUzJ0OHlCSitWREhPSmt1amlZZHBKeGFyeFNCWEJoUm9uenBRMmJaKy8vQTJVVGxVdFJESGI5UHR2a3V3UXIxbEtMVTNJTXZ3U0E3ZVNiNVRtdjhaTFZzL082elpoM01mRzIzVnpqSndycWQyY2UvR1A4eWM2M3JKM1ZRUys3WGs0am9xWnpDYzlVdnExaXNCRmxDM2UxVk4vc1N4Q1plQU5hOVdubTY1MnVYSUh3dmJZMERiNFRwQ3cydWdqRUxyVmNhY3RKTUYxc2srOVhiTTVCazV0S1NKVWs4ZmhhdkZVWTRtS3pkQWI1U29RNU9IWDAxYnFKRWxNcTNTbVFibWFkVjVzMFVYa1Y3RGNxMjdOcmFxMFpnTjFwMkdtUm4vUVlCSElNZ3c4NytaS3U2eWI3Q09qdEsxbktSSG5kUVEzWFl3am1oNzVMblhmY0hmZTdkSVFJNndidXhHRzJwcWFvVmdEMjZBUnd3a3dkQmxZNi9LSEJTWG9tQ21JL0N6WnNSQWdvSGlwTTIyMU9wZFY3eDlOU1pKOFRyNnhkRGFkcFN2WWhqcU9YSHB2dHNhRjEyb1BjSWVmUWt2V3ZLSlZGZVJtZlBYaTRKVkxqTmJ6dEZFVTZDY1BQbExDdThBUGI3TmVwTHN2bGp0NEI5cWMva0Q2akZXN3YzcS81T28xODJ5Vk9IUjR2Y3VIT3JFb2FDYjhpNHZWQTBJazk5QUxTbEtqT2MzelhETWswS1hZSFV4VDVLemVldlNpUlVFM25PajdTM0MyaTZqcFdrSG10R25leTl3VkUrdU5vbngwN0NCaWw5eWxFNlZwejdGYkJ2SjEwNzdJalM3Z3FPeVFpdVI2cFV4REpvakkyQkZjZjJhRmhxejVCRyt6MGFHWEVYK201eHRwcldsVWxRKzVyTlZnU2hGbTZHcnZ2b2hERUxHQW9VTVBIQXVCSm5BQjd2eUgvTEZVZ09IbDRubGxDVWNiK1ZyZWpjellmTkRXUzQ4bExib3daNHVuRlNQSERNUDVRT3RjV1JQSnp5ekIzVm4rMGpkL0dGYnNJNFBPeEk0Q0ZaVWlGMVQrUDJUKzNCNVJub1JKd1hpRXJVRXdPV2plNEY3Mm5DZG4zd1hTbG9yRmN4M2NwL29na0QwV0tpaW9GclZXZG9meCtBbTQzY2RSYi9LYVc2a1M2MExPeDZIV2NSSnZQOWFJeDZveEtzNlVtbUM4OXh0dlZDMEtiOHhGWmsydGp0VkJwbjFxOXQvUjBDc2pzdXF3dGJTOGJOVEcraHVoa0JPc1JuRTVxeStZbTE4U3NlcDFGT1BuUTRHaG84PQ==', 'TVVvc1lOSnovZi9EWmJ2dFJsMS95UT09', 'D0uhjrf/3r/wU7FawdjhHbMAiEF2OcWK4wmHdY4OSxwpgC317hW+G5ZMJeeMU/+1LdmzbyAsoMHnnvR2/+62dePDXpfCRl85JvwWktZr/V3Ju4XZiRzw8zkpY6vTyaPkR9FeRDarfnnyOtf4Khlzr/vGnvAf3ie2KYPX6n9f/4V/uyHMxn2eSB8YiF7mIeR9dm+A6vfY0l3Tku/FHYKacehi875kUi8EGLw5DrKVzoseehSvjhsJALi3OEOhI/F8CO4GCCmxP2VGyI4TbfzkCVdYn3+of9pZ/ZNuO7wD3YS7n1wdXiwx4Qayanp7xCg0Y87NRjGwxEqU4ZxiDESmLw==', 1),
(8, '11543285', 'UXozZHJNM3ZxdGdZWkV2d213YnZFODhiZzVGTE00dVFIdVFaVTBqbFdJOVdCRzZ4a25SUGRxQ2RhZFdFbHVSYkRnMVNBU3orT0tWcmxTZFFDaHVjMFNRYkpYWjhyVWJNZVMybFlOeVlEczZlcGJkbHRxOFc5SDR1WVl2aWs0M0ZWdUZOYnpGWnV5bkt4R3FpcktvRGM1RGdvNkM1RkJDQjFGSnpMdXFxaWZlTDV2MW5ydUlUR3RPemRuRmgyeUk2TnZDWldRRjYyK3B6c29WQjdVaWhYS3cvQTJDcmFIZURtMWxoUnJuQS9TbWI1YlZPOEwvMmVNYkszMnU1d2E2cFZaV1BmTW9DWkRxQnZiU1Z3V0luZEZmcm12VSt0a3FMRkQ4ZlMyeXd2Mk5DV2E1VjJxRURIRE5RcVpRQmdUK0hick5EMnZhQVJFRGxTRVRVMlNLcitzT2ZTNEVPRmJzUDlUQzFLaS9CZ2llMFRYUzVJZitpb2VOWTF3NTBGbnZNaFQ1azZyY0xVQStVZzVEeDNkQzBRbFFCY3lVWDVYMENqT3FTQWtPTkduNm1MYjBQbDVtM054dVJJY0NIRVZ4UEtXSFdGM1RzUzdCWUIwMFp1akE0bVlqd2FJWWFEalNtM3VVeFpUbE5zc2h1M0NoSzdMTmVaMjg1bzgwYjFOYkM0M1FITWQyNDZmeTEvWUdxK2xIVzJWMExiTlh4OFZNUDF5NUJQMFo2TWtMZGhXcm1KQlJVMHFNUDc2N1RzNXFkeWFWWjRvZnZ4WnNoYjBHT09jendUY2I4YTJFSFNuWXZlZ3FGeWgyKy81Zz0=', 'MHlIV2JkbWM1eHpieVhNMkR1L3F3MnJ3a3kzcnNma3lheTlaK0RNeEdNdGZqUGo5SlQvM1lTSGovUlVPY0tzL2NWV0x5V0NWZHM1THlZNUZrM0RaTzRFd1pXaVJnaHhkdmtHVHBOZEVKaHMzVlJjNi94NkVoTHdBR1p2TURWcXl0a1phYkVXN2VZNGlXMndaYXJoOUlHKzk1aTJWSlJKbVQyTWFJc1psT3BnWnBUbitTaG5maXJDM0hudXE4a0NSUUo4dlF6K1BMNkpnL1VzanZxcXQ1bUkwZ0xtRFF4eFVxRDFKN1MxY3AzK21GbW9GUlNnVHc4TlVqUFFXbHpaOXptcktLaWlBYkxUZFJRMWVaMkprUG91dmJmbEcrYlZWZzJaNmtMdkhTRmNBVHFsL2tuY2NEVDF4Ry9WckN5bTF3eGJlbU5IUnhkOGE0bmpmVVZFTk8zNmxJNGdiNmNkQ25aZzdaZzFKd0d6REZheTl3cGQxeG9iS1VPeVQydkVtenlLUDNtTGoxdEcwTG5HWkhlNWlCTGIwa2kvdCtpV3ZSTlBZZjFuQmE5eUdpaGZibmJBOFdaN3pjV1dyUnlzUCtBTW5ZK3gzaU4yMFY2UExBRm1qRkNpWS91dDB0ZzQ1K3NoYVZ2NzhsMXpjSVJnV2tWMHNvZmNvQy9aYnd1cGNFeDNXelRuVFVpbVcvZ2xXR2xnMjJkclk4WmFybzdXZTNqNkZvdTdSRHVPaFNGeWg4N0lQWUdGTDRydkdZVjJodTJ4WDllNXJYMmo3SUw4clhkS1QzOGNjMFl2MDE3K09NZ2xzdVVUanZ3OWhvZEJQQm1WdlBTMTg1dVNEa3pKNHhVUEV0RWhiZmlIbDJLVWxLSEJ4VEI0RWx6aURONlNrZ0hNRW0rRGVBakt1bmZNQTNOMlZQSEM0eDRWNUpreURTOUltVTNvOXdCZitRaUFVL0RDaG9xV3JHTnMzM09FWGo0ZEdUWnNXUUo4Vm4rNlR5YWpyRExwM3dlQllNTXNmazhJQkhQbW5kU1Y3SnFoMUZpU202RzdxVnJIODdEVU5Lc0l5Z3ZONHVYYjBNNk5aaTAyWDVDVmpHM2VuZnYycTNkZjk5NklZSnhERTZSdjI4WC9ucjFqOHo2Y29MUVU5cTIyNi8xS3V4ZzB1eFI3TW4wYTBsUWVSODBTYUUrOHlCa0xEeWZ3dlFpYSt1c25YOWNwSVVjT3F0WktISVovbHhaNlNHSml1QVlwK0F2VjNzQ01HSmVDZjVGTVpMZ3JMdlVVYlR2OUxmejBNYzNQc0ZyRTI3dFd4Nk1IT2dSSjdkT1RnM0RxOTFRdHJSTi9vRXFobkQxblRMS2Q2dVRIbWtwK0FJZG1YUHdZS0dDQkFBQUpYUzNhL1QxaVdIZy9rcDY2T1didzhrMGhwc3UrUTN4R2paNmd0QXRYQnRJY2M0VGN5Rk1XaUYraVhIREdqNTFGNEIzWTVpMXU2czZVemtrMXNjRHBhNjFiM1VaNnFQU3R5L1l3MTdoY3dlM2xHbnFmakZKN1NpOFIreUp6SXk0ZWxnejJ4K1ExcDRvTXJwTWd3NWdsTmJMd21hL0tTVFA4NUxQT2J1a0JwdHUzNGlYdmovVnNma0t6Z3A5YnQ0RDk2c3hYQkduRjJNTks4bmM4YkU0VitRMFZMK3BvMVNaaURuc3JCZDJTdENkZ0pLYmU3R0xxSHRxQWRIZGFkMG5lbEx1Z2tsaktIQ1VGOGkzNFFEVm1zenhPOHlJTkxnYkF4dktSaUk5VkIxSXhMV25XOWZBSTYzK0NEclBYZmJkR1lSVnBsV0NYS2U1ZktjdGlrL2ZLRVhaMmJ6UWhXWFRmOGNuL21mb0gyYS9zQWllZUNHWXllSHFKWldVRW11TkxFc1BPaHZDdUkvaUxHNk9xRmFMT1A4R1FibDdKL0hmbGVScUMwWUNJdlBaSjRLNXRKQnNNaHgvQklES1g5YUhzQmcwajE1Ym5ZeEIzeGg1VGczamIxbDlOdWpGMy9TTW1BRmFveTFnY21ZaXBlckNTNHBDcFl2M3RrUy9nVzUrSGJGNk9JUlNKT0NkeWQ0dWREdzRFMXE1SHVSUitDUG5QRHBud2o2bDI0dXQyQlhwc29rL25TMmpXTzlaaTZlTHFUUDhzWis2OGNPd3BIKzFubCtPZmUwWG5zcStUUVBrZGY0UFJYWDhDaCtURjdrMU9zTHdpUVNQbitGTzlSMVo0SG5neGRGZXNzTEVadEhySXVuRXBYRWZvOElOWFRyV0ZuL0pSM2dVbHBvc3VDY3k1U01xMVV4NGVvRERmblhLNllXSE9TWE5rd2lkNFNWdDJjN2ZmYkl5Mll1NHc3SEx5SkE5YkZlMkQySnZHQlJTQnhxMUVQYThuVVZRby9DTTlWa1ZEbUpFUEtHbWFpZElxZjhkamRaUFViVGpkaTcxaWFtMVF5YXJvR2FETTRLdXlORGYvN2ZLZGExWC9lZUdsMTdEenhSamhZVCtJd2k1WW94eUxpbm1mN21FVXhZNVRjU0pBKzZTeDVlU1ZRZkoyTFBPOHFsS0RRREhsUlhGYmphK0hTMlBnUHNKb1l0NGR4RkZjb0J2WW5ITU05MHo4ZmIzcS93Zk1leDI5Q25HS1RmSHUxaytsUEZJMkgvYjNDQ0tudDNFQjBMZU5YTVk4d2ltMEppOGJkUkZueFlmYnNiUWxxeGtUc1h3ZG93aFNLU2ZORS84VWlJSU1UUHlYQ2xQRE96eEF4TnlocDIwc3F6WURhck02bTgzZVNIWHphQU9CRkEzakVZbmZpeUZ0QU1BeVhkL3p4aFdXc2F1N0crSFl4MlFJSHVqOWRtT25YdjdhRGJvVFBKV0w3Q1JIa29zOE1zYVNRTEJRQWllZE9La2RTKzM0a1kxTlR6bUVtQmkvZ3BPTUh2MzVLdWVZeFBERGI4S1RKLzVybUZQOExMem5FeS9KeURkRVFQZFBQWnowV2MwcWFMVXpoaGhmVGpwRlRtdjJldForYyt4N3E1N2xkekd3PQ==', 'YksxNndGenEvTldaYml0QmNlMURldz09', 'NQWpliuFmDwQX/QqEpkYpuggZ3MZGCZK5wx4DBtqoxOi1fbphdczp/D7yhvTcIpYKrYIx2JH/lKsqcn9V8kRhujFNdTn3x6TnA9jk7/R0NDxVNGYK78q0psaS4O0pvtQK5vNuZAGGoEn6Av7wY5ahieKnnnOZRu0KLwjIX4yJp1Em3tTkWex78jeBnpwEkG4JEha4RW3A5JKGHaVr5eW0ZQ0gPz9cT2la/u2xqpqSRSybAb468Zut80Msyg1w51yaF47c8PudxRSNxZ6CxF3Mxa+5PuA8s6MShDEiR8++/je9r97DaCdUrIk865gK870VkLpyxPAanMj4QNzB5I8qg==', 1),
(9, '07326555', 'UXozZHJNM3ZxdGdZWkV2d213YnZFODhiZzVGTE00dVFIdVFaVTBqbFdJOVdCRzZ4a25SUGRxQ2RhZFdFbHVSYkRnMVNBU3orT0tWcmxTZFFDaHVjMFU3MFhwKzFpTlFkMFNvZ1BjajZhSGQ4STN0akpuRWZ5UU9uVkNrOHVJRCt1eURmQ2s3YWRtOXpBdmRobzdzcWIxdi9LYSsvQW1FZ3pKS3ZmWEw3TEYxcmhlYUV3c2Q1a2t0d1hadUh6MXl1ZnpINHNlczJkR1QrSC9KVFVLQXJSOExPZHY1OGpBR2dFa3R6TktFZUU0cXF5Q1VTTDJVc2gyUTFwalJWVXViTG81Y2lKSjdNay82N091S1dFNnhUYndwRlUyZjVxNnNlNkQ3NXQrVW1sRXdmTU4zSGNBUDZxY2E5OW50TDhvalJoNVptS2VqRHRSR0VnZ3o1Rm1EMGpMNmNjTkdNTzl4SU02NnBBTmhnK0ZGTmN5Szd1SGxrSnlSREkvYVI0Rit5cnVCUVAxL0ZBd0h3SWdhVEdwaXdHWTJ4R3FmdVdFd1NVa2wyNE85UTJabEdqWjVkNyt4U3FyTkNDWjMyUW0wbVU2eDZqekJqNDBmTUFOdkpzR1Axa2pUckt5bWZvVHVlV3BjekpCYmZXVEw3dVR1ZHViZHZNRk01eUtkYXJoUE5TVTl3Q3VHM1JMaEpoY1dLOEFxSUszT25HM21pYmE2eU42bnBjbzkxYnBVRmZQVkV0TDQvK2I1VDNEcVNDR0xmV2FrZVB2Q2g5UEljZFBhMldPcEpoYzZnNWErS0tOcFIvSDB1NHhWQkpKND0=', 'MHlIV2JkbWM1eHpieVhNMkR1L3F3MnJ3a3kzcnNma3lheTlaK0RNeEdNdW1hWmhCY294SS9iVmJTUEZkWGRnVzE2Q1lSNnpmV2t4ZS9PQVBNcFlWNDAyYjl0OEtJNzJHNVk4aS85YVhqYUJ3ZVZ6aGlrQkVEU3pNdm5YNVREV2hScFdqUVI2ZVhyeDBuaGZTWlA2NFJlQjJodHpTUmE1Y2I3eFE3TitaVmt0M1V6SWR0VVVOOGFpUDA4aWpKbXp4YXA3d3dpQ01hUllZSklXc1FwY1Y2aUk2SVZsWTFLWVg4d0kyV01yUXhId05HdWtJOEF3c2h3VGRmRjdDSXlmZ0ozMTR2WmtXbTNGTHJwbVhka2YzQkJJbEJQK3FTSzBwdnNNZ1FUdkhpYnZHNGZ0R2NDM3pSS1JEbURyV2dnMVI4OTdDTFRyd01NUVhpbXlEMDRCb2U4bFd0aXBjcUl6eklJdVo0WEZOSVNrUElYaVFHNFFSZkt5SWZsN0tTK282WHdhNThHbmFRQ1ZOR1MzV0gwRDNlOG9CQWV3UTg3MWtKbDAwOElxNzlpYlJydDJOTjE5TG0zMGViRk11VXdOb1RJZWhKMnhwUmYxOFRPYkF2QThJY2lmdWdmMXR5Tm1IeDNNbk8vUjkyOTljbVZ6OWVkU2xWSnVEOXUwbEVYMjNuTW9oSkI5R3FnTEJQaU8zdW9Tc2ovUEtCY2hsaTN6MFozaE9BUUVzNmUwdHgwRWEwc2RzeVFxR1B5Zk1XU3AzanY5Y0UxcndtcXB4czFqTjZlY1I2eFVRYkdtOGxya3JTc2REMFc3SFdmZmJFdTBRSHM0cDJSaGx4RDlOWXkrRXBWdERNMDREc0pVU0t3NmF1aXB1SEdadHQ5ZS9nZy9oTFlNaWZNYVpjZXd0SXBZVVRHdmFMdmRaUHozdGhiUm9EaW0zczhIbnczeFU0UFZMYlh4alhFQTVrUS9XWStKOVhCV3BvSnIwSVZsMlA1WHNVdVBmTFBJYWk1WjM3M0RLMC80cnpvUEN2MG56OW9ZU2tmTXBqV24vKy80NXJMVjcvNWRwR1pLUXBEdEU3elowMGdFN3lTTE1XUE1mNStCc2J6YXZ6b01mZVl5SzFnMmMrQ3RFZFJMWjN6VGJ5SXRnMit0RXI2MkpWSXRKVVpqb3JLaVJ2cW0wZ2Ryek0wNGF0SnUzSE9kSTltQ0ZzdmluWWZNWGNBektwMzZKaWFjQlEwL2JNSVVVOExlTXo0enRLbVN0RzhqSG1zUVBXcXBzT2s1TTQ1RzlCVEVlWmJtVVl2NHZpNUpUM1R1amU0R3FZbjVDSWtTSGpqK2hxRmpWNVhzaHNacnN1d05pMmZVdmlaQzVtRkhMM1M1WnRpVHlBRVpER3N4VlRvdmNPTVlKSXFFNzRPNjIxS1RKbTNXczZJNFNHK042WjJqZit2N0kxQ2p5T1F4L0xVL1dGVUlWNW5oclpxZ2xsR0JlQm1LVnY1cWlkVmc4L1FWU1BTL0xvKys5bHh0SVd1M0krY3FMMHZMcWtLKy9UbFdwNUJ6b3lwNDN3QUZ1Tjh5cWxEOFZCVW1XbXNsSDJvZXdXVVN3eGZPdHNzSjhwWjNUbW1kVG9WblYzcjZyTkRsT20yWlowdXRoMHdoaVlUTEo0eWpqelcwUGxPWk5EY3g4K3JRYzc1T0ZuWU5OSmEwTi8rVDBQbHNCRm15MnJpdm4zamdqczJkVVFDUnB2Z1dYNU9ydzZHaFhkcWQxNkdTUk9zQmY5ZTBra2x4UGdCNW0rTGJOdjJtQTJ0NTZGSGFhSGhZYnhhQ3ZPcitWYktVb2dzODlNNkVVM1FjTXhmNGh3RzZtN3dDcG0xa1o3c3NyVHF6S3RDM2E3bFkxREt2NnZ4VmVCTEt2NmhuU3Rkdy90UEd1QkxRdE5OVHNJMlhDK0hSenNsRUQrWmlDUXhqUzJBM3Vwb3dwd2w4QmpDMTlrUFdKSDZIZkR6R2NpaG4vL053b3NaZDg0OWphRlFIWDByK05vOGJaKzlraVA5MHNQLzNyek1PRytNNU80VmpTV0hWS3g4S3ZKdzNFUkZhU0NsVkdLTW0vU0F6ZXBxZC9vWnlLcjVpOGhqYUo1Q2tDTzBFamx1ODQ1K01xdUhaWnJTYTNOSFFNUmhSbmM5Vk5nNHRnSTlqR0pBYkJUOU9NU01HVFJXWnFYTTJTVjZIVmJ1enFZWWhrWlJSbTVEQ242MVNGaTVWUUNzdGJFcFd6TDVIeGc4Zm5YRG1ES3dDcDZTdEtudkVBMVF6YUU1QXRSSXk5VkFwbEtSamNGK0diWCt0MDNXK2VuZUJWWGlMVFlPUXgyNmNlSnlINUN5YnkzRVV2VkQwTDdOSmI2WG1kU1k3cUNMdmszS25LYVVRTncwZjNIRWR4UmVvNnJDRm8vY2wxbmorNURNWUptRFRYWEpoaVQ4cGFWU1FQZUlqcytMakcydlJ1NkNESUxtYXU5V0dzQzUycjE3VkNmOXNGZFpvVXdtRG5IUHQ3WG8vQnV4NCtKbTZpN1labUFXUkRNYSsxVUJackcwMXdXeVlzNGtsNUhkRVZOQ09lUllWM1pudkV4bW9DNU0xcHZGUGtyQnhLeFZheHgzQis2SXdqVnFrOS9FOEF4V05VOVFnQSsyR25leU5qN1o4STBKUVBSOWdhTmY4aGpQL3JlOGQ3Y1JEWlh4ZEFCZVZhL2ZMMXl6QnYrR24xQ2JLT0RrZVBtejBMUVdQaFEwWFZFVU1MeU5vZDZLY3FjUUFPc1J2NnZreEk0Zm96Qnp1WllqaWtiWkF1MnlSV2hjbDV6QlhzOFdRc0lLdFpkMnN4NnF2eFFBOXE5YTN2WG1XVnN1cHNyQWVXZEFSUEZ4UDJiSWlHVjBJelZmSjJ0U0U0QjlseVkwdkYrYnFtcENnQm5OMnR2VlJrOHdvbHlCVThjOUVUMjV2SGN6eERRcGl4bE9FUnZTcnAvUWozM0ZjazBiMkxPQXJ2dTBXd1o5Z2tBbGZETUd1dTJ3ZHBaTDE1UU1RPQ==', 'Q0Q4QytqL3NXV2RVV3Q5Y1NBR0Fydz09', 'Fmtwn0obi9CRNrraKhWnmp+ee8R5sjNk08lICMs05M7/BOw0aaUEpyimsMGDf2epvg/2Ffnytql1Xvk0QFM/OCdatbPqQph7EVLjUFWWED9hqJMpQ6CExzZfFd0id169gkcmQJXoxdxVAKXuYDVJGfI7r3ACd0i0rjzxNX1sWONqJ6+FPNoWCeiLbK4B5ewcqrOWCkkOqHHyPF5uPHQT9rnNykKm2x/wGG6qaV0POTqGh/HjMB2OlK6RCFngkG/WZx4YsDrFy6UX5uUgEL4b88uDsT/q5JeaMXE6wPP/1ViwKr3Nbx/4IiOjb79zHgL7srDO1hFjCE4KT4upcClmEQ==', 1);

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
(3, 'Modelo', '2', '2', 1),
(4, 'Arquitectura', '1', '2', 1),
(5, 'Estructura I', '3', '1', 1),
(6, 'Estructura Ii', '4', '1', 1),
(7, 'Devmot I', '3', '2', 1),
(8, 'Ingreso I', '1', '1', 1);

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
('T1P1S1', 1, 'SH1101', '1', 1),
('T2P1S1', 1, 'SH2101', '2', 1),
('T3P1S1', 1, 'HS3101', '3', 1),
('T4P1S1', 1, 'HS4101', '4', 1);

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
(5, 'T1P1S1', '30010891', 1),
(6, 'T1P1S1', '5432287', 1),
(7, 'T1P1S1', '765282', 1),
(8, 'T2P1S1', '12243087', 1),
(9, 'T2P1S1', '15432854', 1),
(10, 'T2P1S1', '26290778', 1),
(11, 'T2P1S1', '26290779', 1),
(12, 'T2P1S1', '29778944', 1),
(13, 'T2P1S1', '30258145', 1),
(14, 'T2P1S1', '862547', 1),
(15, 'T3P1S1', '07326555', 1),
(16, 'T3P1S1', '26398488', 1),
(17, 'T3P1S1', '27736916', 1),
(18, 'T3P1S1', '27737749', 1),
(19, 'T3P1S1', '27828164', 1),
(20, 'T3P1S1', '789068', 1),
(21, 'T4P1S1', '09635831', 1),
(22, 'T4P1S1', '567542', 1);

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
('00000000', 1, 'superadmin', 'elNZQ1NnWUtiODdJaXhCa2VXeHhEUT09', 'pnfhsl10@gmail.com', 0, 0),
('07326555', 2, '7326555', 'ZXRlSml1a1p0akNsbTYwL2hnNEF2UT09', 'pastora@gmail.com', 1, 0),
('09243485', 3, 'ines', 'ZXRlSml1a1p0akNsbTYwL2hnNEF2UT09', 'ines@gmail.com', 3, 3),
('11543285', 4, 'howland', 'ZXRlSml1a1p0akNsbTYwL2hnNEF2UT09', NULL, 1, 0),
('15432287', 1, 'will', 'ZXRlSml1a1p0akNsbTYwL2hnNEF2UT09', 'williamtraynor@gmail.com', 1, 0);

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
-- Indices de la tabla `llaves`
--
ALTER TABLE `llaves`
  ADD PRIMARY KEY (`id_key`),
  ADD UNIQUE KEY `id_key` (`id_key`);

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
  ADD PRIMARY KEY (`id_respuesta`),
  ADD UNIQUE KEY `id_respuesta` (`id_respuesta`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `rsa`
--
ALTER TABLE `rsa`
  ADD PRIMARY KEY (`id_rsa`),
  ADD UNIQUE KEY `id_rsa` (`id_rsa`);

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
  MODIFY `id_accesos` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=476;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_bitacora` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id_clase` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `llaves`
--
ALTER TABLE `llaves`
  MODIFY `id_key` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id_periodo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id_respuesta` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rsa`
--
ALTER TABLE `rsa`
  MODIFY `id_rsa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `saberes`
--
ALTER TABLE `saberes`
  MODIFY `id_SC` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `seccion_alumno`
--
ALTER TABLE `seccion_alumno`
  MODIFY `id_SA` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
