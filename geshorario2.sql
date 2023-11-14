-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2023 a las 18:21:26
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `geshorario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL,
  `profesor_id` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `profesor_id`, `sede_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-10-10 04:08:11', '2023-10-10 04:08:11'),
(2, 1, 1, '2023-10-10 04:08:20', '2023-10-10 04:08:20'),
(3, 1, 1, '2023-10-17 00:00:03', '2023-10-17 00:00:03'),
(4, 1, 1, '2023-10-17 00:04:52', '2023-10-17 00:04:52'),
(5, 1, 1, '2023-10-17 00:06:38', '2023-10-17 00:06:38'),
(6, 8, 1, '2023-10-17 00:09:49', '2023-10-17 00:09:49'),
(7, 8, 1, '2023-10-17 00:15:58', '2023-10-17 00:15:58'),
(8, 1, 1, '2023-10-17 00:19:47', '2023-10-17 00:19:47'),
(9, 1, 1, '2023-10-17 00:19:55', '2023-10-17 00:19:55'),
(10, 1, 1, '2023-10-17 00:20:51', '2023-10-17 00:20:51');

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'P.Libres', '2023-10-16 20:11:33', '2023-10-16 20:11:33'),
(2, 'Yapeyu', '2023-10-16 20:11:33', '2023-10-16 20:11:33');

-- --------------------------------------------------------


--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`);


--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
