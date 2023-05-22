-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2023 a las 07:32:29
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
-- Base de datos: `smart_fit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_seleccion` int(11) NOT NULL,
  `id_turno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `id` int(11) NOT NULL,
  `fechas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario-mañana`
--

CREATE TABLE `horario-mañana` (
  `id` int(11) NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario-mañana`
--

INSERT INTO `horario-mañana` (`id`, `hora`) VALUES
(1, '07:00:00'),
(2, '07:30:00'),
(3, '08:00:00'),
(4, '08:30:00'),
(5, '09:00:00'),
(6, '09:30:00'),
(7, '10:00:00'),
(8, '10:30:00'),
(9, '11:00:00'),
(10, '11:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario-noche`
--

CREATE TABLE `horario-noche` (
  `id` int(11) NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario-noche`
--

INSERT INTO `horario-noche` (`id`, `hora`) VALUES
(1, '19:00:00'),
(2, '19:30:00'),
(3, '20:00:00'),
(4, '20:30:00'),
(5, '21:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario-tarde`
--

CREATE TABLE `horario-tarde` (
  `id` int(11) NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horario-tarde`
--

INSERT INTO `horario-tarde` (`id`, `hora`) VALUES
(1, '12:00:00'),
(2, '12:30:00'),
(3, '13:00:00'),
(4, '13:30:00'),
(5, '14:00:00'),
(6, '14:30:00'),
(7, '15:00:00'),
(8, '15:30:00'),
(9, '16:00:00'),
(10, '16:30:00'),
(11, '17:00:00'),
(12, '17:30:00'),
(13, '18:00:00'),
(14, '18:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` int(50) NOT NULL,
  `sede` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `sede`) VALUES
(1, 'Real-Plaza-Huancayo'),
(2, 'Open Plaza Huancayo'),
(3, 'La Fontana'),
(4, 'Mall Aventura Santa Anita'),
(5, 'Real Plaza Puruchuco'),
(6, 'Alameda Plaza SJL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seleccion`
--

CREATE TABLE `seleccion` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_sedes` int(11) NOT NULL,
  `id_zona_entrenamiento` int(11) NOT NULL,
  `id_fecha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `turno` varchar(50) DEFAULT NULL,
  `id_mañana` int(11) DEFAULT NULL,
  `id_tarde` int(11) DEFAULT NULL,
  `id_noche` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `turno`, `id_mañana`, `id_tarde`, `id_noche`) VALUES
(1, NULL, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombres`, `apellidos`, `email`, `contraseña`) VALUES
(1, 'angelo', 'pizarro', 'angelo_enero@hotmail.com', '123'),
(2, 'harold', 'pizarro', 'harold@gmail.com', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_cardio`
--

CREATE TABLE `zona_cardio` (
  `id_zona_cardio` int(11) NOT NULL,
  `maquina` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zona_cardio`
--

INSERT INTO `zona_cardio` (`id_zona_cardio`, `maquina`) VALUES
(1, 'caminadora'),
(2, 'escaladora'),
(3, 'bicicletas'),
(4, 'remadoras'),
(5, 'escaleras infinitas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_entrenamiento`
--

CREATE TABLE `zona_entrenamiento` (
  `id` int(11) NOT NULL,
  `entrenamiento` varchar(50) NOT NULL,
  `id_zona_cardio` int(11) DEFAULT NULL,
  `id_zona_funcional` int(11) DEFAULT NULL,
  `id_zona_fuerza` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zona_entrenamiento`
--

INSERT INTO `zona_entrenamiento` (`id`, `entrenamiento`, `id_zona_cardio`, `id_zona_funcional`, `id_zona_fuerza`) VALUES
(1, 'cardio', 1, NULL, NULL),
(2, 'funcional', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_fuerza`
--

CREATE TABLE `zona_fuerza` (
  `id_zona_fuerza` int(11) NOT NULL,
  `maquina` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zona_fuerza`
--

INSERT INTO `zona_fuerza` (`id_zona_fuerza`, `maquina`) VALUES
(1, 'hack squat'),
(2, 'empuje de cadera'),
(3, 'jersey'),
(4, 'pres de banca'),
(5, 'prensa'),
(6, 'remo de barra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_funcional`
--

CREATE TABLE `zona_funcional` (
  `id_zona_funcional` int(11) NOT NULL,
  `maquina` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zona_funcional`
--

INSERT INTO `zona_funcional` (`id_zona_funcional`, `maquina`) VALUES
(1, 'rack funcional'),
(2, 'bolsas salm'),
(3, 'barras olimpicas'),
(4, 'kettlebells'),
(5, 'placas de parachoques');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_seleccion` (`id_seleccion`),
  ADD UNIQUE KEY `id_turno` (`id_turno`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario-mañana`
--
ALTER TABLE `horario-mañana`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario-noche`
--
ALTER TABLE `horario-noche`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario-tarde`
--
ALTER TABLE `horario-tarde`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seleccion`
--
ALTER TABLE `seleccion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_sedes` (`id_sedes`),
  ADD UNIQUE KEY `id_zona_entrenamiento` (`id_zona_entrenamiento`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`),
  ADD UNIQUE KEY `id_fecha` (`id_fecha`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_mañana` (`id_mañana`),
  ADD UNIQUE KEY `id_tarde` (`id_tarde`),
  ADD UNIQUE KEY `id_noche` (`id_noche`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zona_cardio`
--
ALTER TABLE `zona_cardio`
  ADD PRIMARY KEY (`id_zona_cardio`);

--
-- Indices de la tabla `zona_entrenamiento`
--
ALTER TABLE `zona_entrenamiento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_zona_fuerza` (`id_zona_fuerza`),
  ADD UNIQUE KEY `id_zona_cardio` (`id_zona_cardio`),
  ADD UNIQUE KEY `id_zona_funcional` (`id_zona_funcional`);

--
-- Indices de la tabla `zona_fuerza`
--
ALTER TABLE `zona_fuerza`
  ADD PRIMARY KEY (`id_zona_fuerza`);

--
-- Indices de la tabla `zona_funcional`
--
ALTER TABLE `zona_funcional`
  ADD PRIMARY KEY (`id_zona_funcional`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fecha`
--
ALTER TABLE `fecha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario-mañana`
--
ALTER TABLE `horario-mañana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `horario-noche`
--
ALTER TABLE `horario-noche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `horario-tarde`
--
ALTER TABLE `horario-tarde`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `seleccion`
--
ALTER TABLE `seleccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `zona_cardio`
--
ALTER TABLE `zona_cardio`
  MODIFY `id_zona_cardio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `zona_entrenamiento`
--
ALTER TABLE `zona_entrenamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `zona_fuerza`
--
ALTER TABLE `zona_fuerza`
  MODIFY `id_zona_fuerza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `zona_funcional`
--
ALTER TABLE `zona_funcional`
  MODIFY `id_zona_funcional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `seleccion`
--
ALTER TABLE `seleccion`
  ADD CONSTRAINT `seleccion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seleccion_ibfk_2` FOREIGN KEY (`id_sedes`) REFERENCES `sedes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seleccion_ibfk_3` FOREIGN KEY (`id_zona_entrenamiento`) REFERENCES `zona_entrenamiento` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `seleccion_ibfk_6` FOREIGN KEY (`id_fecha`) REFERENCES `fecha` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`id_mañana`) REFERENCES `horario-mañana` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `turnos_ibfk_2` FOREIGN KEY (`id_tarde`) REFERENCES `horario-tarde` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `turnos_ibfk_3` FOREIGN KEY (`id_noche`) REFERENCES `horario-noche` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `zona_entrenamiento`
--
ALTER TABLE `zona_entrenamiento`
  ADD CONSTRAINT `zona_entrenamiento_ibfk_1` FOREIGN KEY (`id_zona_cardio`) REFERENCES `zona_cardio` (`id_zona_cardio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `zona_entrenamiento_ibfk_2` FOREIGN KEY (`id_zona_fuerza`) REFERENCES `zona_fuerza` (`id_zona_fuerza`) ON UPDATE CASCADE,
  ADD CONSTRAINT `zona_entrenamiento_ibfk_3` FOREIGN KEY (`id_zona_funcional`) REFERENCES `zona_funcional` (`id_zona_funcional`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
