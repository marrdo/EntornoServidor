-- phpMyAdmin SQL Dump
-- version 5.2.1deb1ubuntu0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-11-2023 a las 21:12:56
-- Versión del servidor: 8.0.35-0ubuntu0.23.04.1
-- Versión de PHP: 8.1.12-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `joyitas_andalucia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantantes`
--

CREATE TABLE `cantantes` (
  `id` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `precio_bolo` decimal(10,2) NOT NULL,
  `localidad_nacimiento` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cantantes`
--

INSERT INTO `cantantes` (`id`, `nombre`, `genero`, `fecha_nacimiento`, `precio_bolo`, `localidad_nacimiento`) VALUES
(1, 'Camaron', 'Flamenco', '1950-12-05', 20000.00, 'San Fernando'),
(3, 'El Pali', 'Sevillanas', '1928-05-28', 6000.00, 'Sevilla(Triana)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Conciertos`
--

CREATE TABLE `Conciertos` (
  `id` int NOT NULL,
  `artista` varchar(220) NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(220) NOT NULL,
  `aforo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cantantes`
--
ALTER TABLE `cantantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Conciertos`
--
ALTER TABLE `Conciertos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cantantes`
--
ALTER TABLE `cantantes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `Conciertos`
--
ALTER TABLE `Conciertos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
