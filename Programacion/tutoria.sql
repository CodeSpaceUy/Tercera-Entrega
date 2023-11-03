-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2023 a las 17:29:52
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tutoria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_tutoria`
--

CREATE TABLE `alumnos_tutoria` (
  `id_alumno` varchar(9) NOT NULL,
  `id_tutoria` int(11) NOT NULL,
  `diaTutoria` date NOT NULL,
  `observaciones` varchar(255) NOT NULL,
  `horaTutoria` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alumnos_tutoria`
--

INSERT INTO `alumnos_tutoria` (`id_alumno`, `id_tutoria`, `diaTutoria`, `observaciones`, `horaTutoria`) VALUES
('99984445', 5, '0000-00-00', 'sasdn', 'sasn'),
('99984445', 5, '0000-00-00', 'sasdn', 'sasn');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `ci` int(9) NOT NULL,
  `tutoria_id` int(11) NOT NULL,
  `asistencia` int(11) NOT NULL,
  `inastencias_justificadas` int(11) NOT NULL,
  `inastencias_ijustificadas` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`ci`, `tutoria_id`, `asistencia`, `inastencias_justificadas`, `inastencias_ijustificadas`, `fecha`) VALUES
(99984445, 5, 1, 0, 0, '2023-10-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Admin'),
(2, 'Profesor'),
(3, 'Estudiante'),
(4, 'NA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`) VALUES
(1, 'Matematica'),
(2, 'Fisica'),
(3, 'Programacion'),
(4, 'Base de Datos'),
(5, 'APT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_est` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_est`) VALUES
('99984445');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`id`, `nombre`) VALUES
(1, 'Diciembre'),
(2, 'Febrero'),
(3, 'Julio'),
(4, 'Abril');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id_profesor` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_profesor`) VALUES
('12345678'),
('52935929');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudtutoria`
--

CREATE TABLE `solicitudtutoria` (
  `idSolicitud` int(11) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `CI` varchar(9) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `periodo` varchar(255) NOT NULL,
  `comentarios` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `solicitudtutoria`
--

INSERT INTO `solicitudtutoria` (`idSolicitud`, `asunto`, `CI`, `curso`, `periodo`, `comentarios`) VALUES
(1, 'Necesito una tutoria', '99984445', '2', '2', 'Es para rendir un examen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutoria`
--

CREATE TABLE `tutoria` (
  `id` int(11) NOT NULL,
  `id_profe` varchar(9) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `curso` int(11) NOT NULL,
  `periodo` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora` varchar(255) NOT NULL,
  `comentarios` varchar(255) NOT NULL,
  `activa` int(2) NOT NULL,
  `archivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tutoria`
--

INSERT INTO `tutoria` (`id`, `id_profe`, `nombre`, `curso`, `periodo`, `fecha_inicio`, `fecha_fin`, `hora`, `comentarios`, `activa`, `archivo`) VALUES
(5, '52935929', 'Primer Tutoria', 1, 2, '2023-10-18', '2023-10-26', '9:55', 'Llegar en hora', 1, ''),
(6, '12345678', 'Prueba', 3, 3, '2023-10-28', '2023-10-31', '9:55', 'pasar lista', 1, 'files/Presentación ARIEL.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ci` varchar(9) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `verificacion` varchar(10) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ci`, `correo`, `name`, `surname`, `password`, `verificacion`, `id_cargo`) VALUES
('12345678', '12345678@gmail.com', 'Profesor', 'Prof', '123', '2', 2),
('45566545', 'fedeins@gmail.com', 'Federico', 'Jau', '$2y$10$pjWznZ1t0mhMcE.SDlhb3ehqbrOhAI86sZathW', '1', 4),
('52847655', 'ariel@gmail.com', 'Ariel', 'Vique', '123', '2', 3),
('52935922', 'exequielrodrigueztcm@gmail.com', 'Exequiel', 'Cabrera', '123', '2', 1),
('52935928', 'jose@gmail.com', 'Exequiel', 'Cabrera', '123', '2', 1),
('52935929', 'oosp@gmail.com', 'Karina', 'Perez', '123', '2', 2),
('99984445', 'jose@gmail.com', 'Jose', 'Gonzalez', '444', '2', 3);

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `CrearEstudianteDespuesInsert` AFTER INSERT ON `usuarios` FOR EACH ROW BEGIN
  IF NEW.id_cargo = 3 THEN  -- Supongamos que 3 representa Estudiante
    INSERT INTO estudiante (id_est) VALUES (NEW.ci);
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `CrearProfesorDespuesInsert` AFTER INSERT ON `usuarios` FOR EACH ROW BEGIN
  IF NEW.id_cargo = 2 THEN  -- Supongamos que 2 representa Profesor
    INSERT INTO profesor (id_profesor) VALUES (NEW.ci);
  END IF;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos_tutoria`
--
ALTER TABLE `alumnos_tutoria`
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_tutoria` (`id_tutoria`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`ci`),
  ADD KEY `tutoria_id` (`tutoria_id`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD KEY `id_est_2` (`id_est`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD KEY `id_profesor` (`id_profesor`);

--
-- Indices de la tabla `solicitudtutoria`
--
ALTER TABLE `solicitudtutoria`
  ADD PRIMARY KEY (`idSolicitud`);

--
-- Indices de la tabla `tutoria`
--
ALTER TABLE `tutoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_profe` (`id_profe`),
  ADD KEY `curso` (`curso`),
  ADD KEY `periodo` (`periodo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ci`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `solicitudtutoria`
--
ALTER TABLE `solicitudtutoria`
  MODIFY `idSolicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tutoria`
--
ALTER TABLE `tutoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_tutoria`
--
ALTER TABLE `alumnos_tutoria`
  ADD CONSTRAINT `alumnos_tutoria_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `estudiante` (`id_est`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_tutoria_ibfk_3` FOREIGN KEY (`id_tutoria`) REFERENCES `tutoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`tutoria_id`) REFERENCES `tutoria` (`id`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`id_est`) REFERENCES `usuarios` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `usuarios` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tutoria`
--
ALTER TABLE `tutoria`
  ADD CONSTRAINT `tutoria_ibfk_1` FOREIGN KEY (`id_profe`) REFERENCES `profesor` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tutoria_ibfk_2` FOREIGN KEY (`curso`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tutoria_ibfk_3` FOREIGN KEY (`periodo`) REFERENCES `periodo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tutoria_ibfk_4` FOREIGN KEY (`id_profe`) REFERENCES `profesor` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
