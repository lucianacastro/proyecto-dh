-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 11-06-2017 a las 22:23:27
-- Versión del servidor: 5.6.35
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `teamUp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `team_name`, `dob`, `gender`) VALUES
(34, 'Mao', 'Bort', 'mao2@gmail.com', '123', 'Tigre', '2015-01-01', 'male'),
(36, 'Cosme', 'Fulanito', 'cosmefulanito@gmail.com', '$2y$10$9YYCNdAe8UTT3ujtbc9dOeqmSHou.qeGUWIeIqr46K.b848e6VSbu', 'Club Atlético Banfield', '0000-00-00', ''),
(39, '', '', '', '$2y$10$jD3zhW0jSMu/c1Qxk6XP4u7vyxbPWaF8P3o/0PMbJRZN8TMARimRa', '', '0000-00-00', ''),
(40, 'Cosme', 'Fulanito', 'cosme@gmail.com', '$2y$10$GH/4yF2AoAmrmkpWZHSUm.5w9uFl9WRJmq96tzZbE7w9y5/sG2mtu', 'Club Atlético Independiente', '0000-00-00', ''),
(41, 'Cosme', 'Fulanito', 'cosmef@gmail.com', '$2y$10$PGrM1Aj/IS5j44D0JiFZZupaKxpIDSvRbCDIjYtkfbQS9VSQkikJS', 'Club Atlético River Plate', '0000-00-00', ''),
(42, 'Cosme', 'Fulanito', 'cosmefu@gmail.com', '$2y$10$raM95FAjNh/vuj.qi0LrhO9poePah8yITcHzZN56VJqBNc65VF7xi', '-- Elegí tu club --', '0000-00-00', ''),
(43, 'Cosme', 'Fulanito', 'cosmeful@gmail.com', '$2y$10$426dMYTfNeBD7990FwqtqecQ8MylzY1I/0ZjHxP5XvYNsFW3SVc12', 'Club Atlético River Plate', '0000-00-00', ''),
(44, 'Cosme', 'Fulanito', 'cosmefula@gmail.com', '$2y$10$tp6Dj7.1VWAhGT1nHTKSKeW4zi/eDrPoKRmLWFC2V4rVmCNCNxi1q', 'Club Atlético River Plate', '0000-00-00', ''),
(45, 'mao', 'bort', 'mao@gmail.com', '$2y$10$k77cdy079y6IwXMlGemxA.42XtFbpvzUcIGtJkxyW635vXmfcCZni', 'Club Atlético Boca Junior', '0000-00-00', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;