-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2023 a las 06:32:13
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
  `idsede` int(11) DEFAULT NULL,
  `idzona` int(11) DEFAULT NULL,
  `idmaquina` int(11) DEFAULT NULL,
  `idfecha` int(11) DEFAULT NULL,
  `idturno` int(11) DEFAULT NULL,
  `idhora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas`
--

CREATE TABLE `fechas` (
  `id` int(11) NOT NULL,
  `fecha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fechas`
--

INSERT INTO `fechas` (`id`, `fecha`) VALUES
(1, '24 de mayo'),
(2, '25 de mayo'),
(3, '26 de mayo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `hora` varchar(50) DEFAULT NULL,
  `idturno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `hora`, `idturno`) VALUES
(1, '07:00:00', 1),
(2, '07:30:00', 1),
(3, '08:00:00', 1),
(4, '08:30:00', 1),
(5, '09:00:00', 1),
(6, '09:30:00', 1),
(7, '10:00:00', 1),
(8, '10:30:00', 1),
(9, '11:00:00', 1),
(10, '11:30:00', 1),
(11, '12:00:00', 2),
(12, '12:30:00', 2),
(13, '13:00:00', 2),
(14, '13:30:00', 2),
(15, '14:00:00', 2),
(16, '14:30:00', 2),
(17, '15:00:00', 2),
(18, '15:30:00', 2),
(19, '16:00:00', 2),
(20, '16:30:00', 2),
(21, '17:00:00', 2),
(22, '17:30:00', 2),
(23, '18:00:00', 2),
(24, '18:30:00', 2),
(25, '19:00:00', 3),
(26, '19:30:00', 3),
(27, '20:00:00', 3),
(28, '20:30:00', 3),
(29, '21:00:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinas`
--

CREATE TABLE `maquinas` (
  `id` int(11) NOT NULL,
  `maquina` varchar(50) DEFAULT NULL,
  `idzona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maquinas`
--

INSERT INTO `maquinas` (`id`, `maquina`, `idzona`) VALUES
(1, 'caminadora', 1),
(2, 'escaladora', 1),
(3, 'bicicletas', 1),
(4, 'remadoras(Maquina de remo)', 1),
(5, 'escaleras infinitas', 1),
(6, 'rack funcional', 2),
(7, 'bolsas salm', 2),
(8, 'barras olimpicas', 2),
(9, 'kettlebells', 2),
(10, 'placas de parachoques', 2),
(11, 'hack squat', 3),
(12, 'empuje de cadera', 3),
(13, 'jersey', 3),
(14, 'pres de banca', 3),
(15, 'prensa', 3),
(16, 'remo de barra', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `id_zona` int(11) NOT NULL,
  `id_maq` int(11) NOT NULL,
  `id_fecha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Real Plaza Huancayo'),
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
  `id_sedes` int(11) DEFAULT NULL,
  `id_zona_entrenamiento` int(11) DEFAULT NULL,
  `id_fecha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seleccion`
--

INSERT INTO `seleccion` (`id`, `id_sedes`, `id_zona_entrenamiento`, `id_fecha`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL,
  `turno` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `turno`) VALUES
(1, 'mañana'),
(2, 'tarde'),
(3, 'noche');

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
-- Estructura de tabla para la tabla `zona_entrenamiento`
--

CREATE TABLE `zona_entrenamiento` (
  `id` int(11) NOT NULL,
  `entrenamiento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zona_entrenamiento`
--

INSERT INTO `zona_entrenamiento` (`id`, `entrenamiento`) VALUES
(1, 'cardio'),
(2, 'funcional'),
(3, 'fuerza');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsede` (`idsede`),
  ADD KEY `idzona` (`idzona`),
  ADD KEY `idmaquina` (`idmaquina`),
  ADD KEY `idfecha` (`idfecha`),
  ADD KEY `idturno` (`idturno`),
  ADD KEY `idhora` (`idhora`);

--
-- Indices de la tabla `fechas`
--
ALTER TABLE `fechas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idturno` (`idturno`);

--
-- Indices de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idzona` (`idzona`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_zona` (`id_zona`),
  ADD UNIQUE KEY `id_sede` (`id_sede`),
  ADD UNIQUE KEY `id_maq` (`id_maq`),
  ADD UNIQUE KEY `fecha` (`id_fecha`);

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
  ADD UNIQUE KEY `id_fecha` (`id_fecha`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `zona_entrenamiento`
--
ALTER TABLE `zona_entrenamiento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fechas`
--
ALTER TABLE `fechas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `maquinas`
--
ALTER TABLE `maquinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `seleccion`
--
ALTER TABLE `seleccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `zona_entrenamiento`
--
ALTER TABLE `zona_entrenamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`idsede`) REFERENCES `sedes` (`id`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`idzona`) REFERENCES `zona_entrenamiento` (`id`),
  ADD CONSTRAINT `carrito_ibfk_3` FOREIGN KEY (`idmaquina`) REFERENCES `maquinas` (`id`),
  ADD CONSTRAINT `carrito_ibfk_4` FOREIGN KEY (`idfecha`) REFERENCES `fechas` (`id`),
  ADD CONSTRAINT `carrito_ibfk_5` FOREIGN KEY (`idturno`) REFERENCES `turnos` (`id`),
  ADD CONSTRAINT `carrito_ibfk_6` FOREIGN KEY (`idhora`) REFERENCES `horarios` (`id`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`idturno`) REFERENCES `turnos` (`id`);

--
-- Filtros para la tabla `maquinas`
--
ALTER TABLE `maquinas`
  ADD CONSTRAINT `maquinas_ibfk_1` FOREIGN KEY (`idzona`) REFERENCES `zona_entrenamiento` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
