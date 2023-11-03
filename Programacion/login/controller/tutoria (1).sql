-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2023 a las 23:37:07
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
  `id_tutoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `alumnos_tutoria`
--

INSERT INTO `alumnos_tutoria` (`id_alumno`, `id_tutoria`) VALUES
('52935928', 1);

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
(5, 'APT'),
(6, 'Sistemas Operativos I');

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
('52935928');

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
('22434446');

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
  `comentarios` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tutoria`
--

INSERT INTO `tutoria` (`id`, `id_profe`, `nombre`, `curso`, `periodo`, `fecha_inicio`, `fecha_fin`, `hora`, `comentarios`) VALUES
(1, '22434446', 'Primer Tutoria', 1, 1, '2023-08-13', '2023-08-20', '9:55', 'No hay comentarios');

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
('12295568', 'esoa@gmail.com', 'JOsefina', 'Guerra', '888', '2', 2),
('22334445', 'sadas@gmail.coom', 'Pepe', 'Gonzalez', '123', '2', 2),
('22434446', 'gkas@gmail.coom', 'Felipe', 'Guti', '555', '2', 2),
('26665554', 'oaosd@gmail.com', 'Maria', 'Nuñez', '444', '2', 2),
('52935928', 'exequielrodrigueztcm@gmail.com', 'Exequiel', 'Cabrera', 'eze123', '1', 3),
('55542223', 'sadpe@gmail.com', 'Brinda', 'Loste', '234', '2', 3),
('99984445', 'oosp@gmail.com', 'Karina', 'Nas', '823', '2', 3);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tutoria`
--
ALTER TABLE `tutoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
