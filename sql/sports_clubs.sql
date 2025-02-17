-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2025 a las 14:41:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sports_clubs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `is_captain` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `players`
--

INSERT INTO `players` (`id`, `name`, `number`, `team_id`, `is_captain`) VALUES
(1, 'Pedro Sanchez', 10, 2, 1),
(2, 'Jugador Test', 10, 1, 1),
(3, 'Javier Gómez', 5, 2, 0),
(7, 'Alberto Revilla', 5, 3, 1),
(8, 'Edu Prieto', 8, 2, 0),
(9, 'David López', 16, 2, 0),
(10, 'Toni Delgado', 6, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `sport` enum('Futbol','Baloncesto','Volleyball','Otro') NOT NULL,
  `founded_date` date NOT NULL,
  `history` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `teams`
--

INSERT INTO `teams` (`id`, `name`, `city`, `sport`, `founded_date`, `history`) VALUES
(1, 'CB Xirivella', 'Xirivella', 'Baloncesto', '2015-02-05', 'Nullam eu magna nibh. Nullam sem dui, sodales nec elit vel, vulputate gravida ante. Suspendisse dictum diam convallis ipsum convallis, ac luctus sem faucibus. Aenean id felis tincidunt, lobortis tellus at, varius massa. Sed sed purus non turpis consectetur ullamcorper. In sit amet accumsan ante, in blandit ex. Donec nec gravida lectus, vel consequat augue. Nulla fringilla eleifend lacinia. Cras vel massa quis metus mollis blandit vitae eget massa. Praesent tincidunt a velit ut faucibus. Suspendisse sit amet fermentum diam. Etiam placerat dolor ut tellus auctor sagittis. Praesent quam nibh, ultrices ut mollis sit amet, placerat nec tortor. Curabitur laoreet congue nunc rutrum tempus. Nulla a est nec libero egestas scelerisque ut in magna. Suspendisse neque dui, sodales ac libero vel, faucibus vehicula sem.'),
(2, 'CB Alacuas', 'Alacuas', 'Baloncesto', '2017-02-23', 'Sed eros lectus, placerat vel dolor in, ultrices viverra enim. Vivamus eget risus nisl. In at malesuada lorem, sed faucibus metus. Cras elementum, leo a porta semper, dolor leo vehicula nulla, at iaculis ex eros nec est. Nunc laoreet imperdiet mi, id ultrices est accumsan quis. Sed tincidunt, lectus nec viverra gravida, augue erat sodales dolor, id mollis orci metus eu odio. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam commodo eleifend magna. Nam elementum lacinia mattis. Aenean consectetur mollis justo, at elementum est auctor ac. Fusce bibendum turpis justo, sed vehicula purus consequat sit amet. Nulla vitae efficitur eros. In molestie lobortis purus nec accumsan. Morbi quis lectus non arcu lacinia volutpat et vel ante. Donec in libero enim. Mauris tincidunt pulvinar porta.'),
(3, 'CB Mislata', 'Mislata', 'Baloncesto', '2018-02-23', 'Duis fermentum sagittis lectus, et tristique nulla egestas eget. Duis vehicula euismod auctor. Curabitur a turpis et mi rhoncus molestie. Nulla dictum, eros eu facilisis efficitur, lectus metus mattis tortor, quis commodo erat justo nec nunc. Praesent at nulla sed dolor efficitur vestibulum. Etiam tempus eget quam ac luctus. Donec lobortis purus ut metus dignissim, eget dignissim dui eleifend. Aliquam rhoncus lacus nec lectus pretium, vitae eleifend metus malesuada. Suspendisse mauris velit, tincidunt lobortis ligula sit amet, facilisis vehicula dui. Nunc mattis nunc vel dignissim sollicitudin. Duis nisl urna, auctor imperdiet libero a, tristique dapibus mauris. Donec mollis interdum augue ac dignissim. Quisque feugiat quam nec sagittis dapibus. Pellentesque mattis velit eu augue dignissim, at volutpat leo bibendum. Morbi lobortis eget nisi nec varius.\n\nDuis fermentum sagittis lectus, et tristique nulla egestas eget. Duis vehicula euismod auctor. Curabitur a turpis et mi rhoncus molestie. Nulla dictum, eros eu facilisis efficitur, lectus metus mattis tortor, quis commodo erat justo nec nunc. Praesent at nulla sed dolor efficitur vestibulum. Etiam tempus eget quam ac luctus. Donec lobortis purus ut metus dignissim, eget dignissim dui eleifend. Aliquam rhoncus lacus nec lectus pretium, vitae eleifend metus malesuada. Suspendisse mauris velit, tincidunt lobortis ligula sit amet, facilisis vehicula dui. Nunc mattis nunc vel dignissim sollicitudin. Duis nisl urna, auctor imperdiet libero a, tristique dapibus mauris. Donec mollis interdum augue ac dignissim. Quisque feugiat quam nec sagittis dapibus. Pellentesque mattis velit eu augue dignissim, at volutpat leo bibendum. Morbi lobortis eget nisi nec varius.\n\nDuis fermentum sagittis lectus, et tristique nulla egestas eget. Duis vehicula euismod auctor. Curabitur a turpis et mi rhoncus molestie. Nulla dictum, eros eu facilisis efficitur, lectus metus mattis tortor, quis commodo erat justo nec nunc. Praesent at nulla sed dolor efficitur vestibulum. Etiam tempus eget quam ac luctus. Donec lobortis purus ut metus dignissim, eget dignissim dui eleifend. Aliquam rhoncus lacus nec lectus pretium, vitae eleifend metus malesuada. Suspendisse mauris velit, tincidunt lobortis ligula sit amet, facilisis vehicula dui. Nunc mattis nunc vel dignissim sollicitudin. Duis nisl urna, auctor imperdiet libero a, tristique dapibus mauris. Donec mollis interdum augue ac dignissim. Quisque feugiat quam nec sagittis dapibus. Pellentesque mattis velit eu augue dignissim, at volutpat leo bibendum. Morbi lobortis eget nisi nec varius.\n\n'),
(4, 'FC Xirivella', 'Xirivella', 'Futbol', '2015-02-05', 'Praesent vitae posuere magna, et scelerisque lectus. Praesent hendrerit elementum libero sed tempus. Nam facilisis dignissim enim quis dignissim. Etiam ornare, nulla in blandit blandit, turpis ipsum commodo lacus, sit amet placerat nisi lorem luctus ex. Morbi eleifend laoreet libero, nec porttitor diam aliquet quis. Etiam lobortis tortor sit amet nisi accumsan pharetra. Phasellus luctus turpis et ipsum consequat posuere. Quisque ex lorem, elementum volutpat est volutpat, consectetur mattis arcu. Nunc lectus nisl, finibus tempor iaculis sit amet, ullamcorper quis nunc. Curabitur iaculis augue vel mi varius aliquam. Duis pretium dui nulla, vel posuere lacus aliquam ut. Nunc mattis facilisis justo, vitae pellentesque ipsum pellentesque vitae. Sed in euismod nulla.'),
(5, 'FC Mislata', 'Mislata', 'Futbol', '2018-02-23', 'Suspendisse aliquet purus ex. Etiam vel dictum ante, in hendrerit dolor. Duis ex lectus, consectetur eget rutrum et, tincidunt vel ex. Pellentesque vel orci in dolor mattis rutrum sit amet ac leo. Proin et iaculis massa, sit amet molestie dui. Etiam in nisi pretium, pulvinar ante sit amet, commodo enim. Curabitur interdum dapibus auctor. Sed a lectus vitae orci faucibus ullamcorper nec eu dui. Suspendisse rutrum, felis ut rutrum gravida, nisl ex tempor lacus, et mollis augue justo sed nunc. Quisque mauris dui, pulvinar at convallis nec, pharetra at orci. Proin commodo, augue vitae auctor molestie, eros justo aliquam orci, sed laoreet tellus nibh sed nunc. Cras quis lorem lacus. Sed dapibus ipsum nec efficitur hendrerit. Phasellus eu sollicitudin nisi. Ut elit enim, venenatis sit amet mi in, congue interdum magna.\n\n'),
(6, 'FC Torrent', 'Torrente', 'Baloncesto', '1994-01-31', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer tempor laoreet placerat. Fusce convallis dolor et nisl molestie cursus. Morbi blandit semper hendrerit. Duis cursus in lectus nec ultrices. Donec dapibus quis arcu in semper. Cras tortor turpis, congue finibus semper nec, mollis vel enim. Duis dictum, urna et pellentesque convallis, mi est efficitur nibh, vitae porttitor lectus erat eget arcu. Maecenas tempor eleifend pharetra. Mauris est elit, consequat non nisi sit amet, pellentesque fringilla augue. Donec id augue ultricies ante varius elementum eu sit amet nisi.\r\n\r\nNullam eu magna nibh. Nullam sem dui, sodales nec elit vel, vulputate gravida ante. Suspendisse dictum diam convallis ipsum convallis, ac luctus sem faucibus. Aenean id felis tincidunt, lobortis tellus at, varius massa. Sed sed purus non turpis consectetur ullamcorper. In sit amet accumsan ante, in blandit ex. Donec nec gravida lectus, vel consequat augue. Nulla fringilla eleifend lacinia. Cras vel massa quis metus mollis blandit vitae eget massa. Praesent tincidunt a velit ut faucibus. Suspendisse sit amet fermentum diam. Etiam placerat dolor ut tellus auctor sagittis. Praesent quam nibh, ultrices ut mollis sit amet, placerat nec tortor. Curabitur laoreet congue nunc rutrum tempus. Nulla a est nec libero egestas scelerisque ut in magna. Suspendisse neque dui, sodales ac libero vel, faucibus vehicula sem.\r\n\r\nSed eros lectus, placerat vel dolor in, ultrices viverra enim. Vivamus eget risus nisl. In at malesuada lorem, sed faucibus metus. Cras elementum, leo a porta semper, dolor leo vehicula nulla, at iaculis ex eros nec est. Nunc laoreet imperdiet mi, id ultrices est accumsan quis. Sed tincidunt, lectus nec viverra gravida, augue erat sodales dolor, id mollis orci metus eu odio. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam commodo eleifend magna. Nam elementum lacinia mattis. Aenean consectetur mollis justo, at elementum est auctor ac. Fusce bibendum turpis justo, sed vehicula purus consequat sit amet. Nulla vitae efficitur eros. In molestie lobortis purus nec accumsan. Morbi quis lectus non arcu lacinia volutpat et vel ante. Donec in libero enim. Mauris tincidunt pulvinar porta.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
