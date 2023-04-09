-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2023 a las 12:03:18
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
-- Base de datos: `zeus_airsoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `imgName` varchar(256) NOT NULL,
  `price` double NOT NULL,
  `offer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `imgName`, `price`) VALUES
(1, 'Colt M4A1 5.56x45', 'La carabina Colt M4A1 es una variante completamente automática de la carabina M4 básica y fue diseñada principalmente para uso en operaciones especiales. Sin embargo, EE. UU. El Comando de Operaciones Especiales ( USSOCOM ) pronto adoptará el M4A1 para casi todas las unidades de operaciones especiales, seguido más tarde por la introducción general del M4A1 en servicio con los EE. UU. Ejército y Cuerpo de Marines.', 'm4a1.jpg', 668.11),
(2, 'Kalashnikov AK-74 5.45x39', 'El rifle de asalto Kalashnikov de 5,45 mm, desarrollado en 1970 por M. T. Kalashnikov, se convirtió en una nueva evolución de AKM debido a la adopción de la nueva munición 5,45x39 por parte de los militares.', 'ak74.png', 10),
(3, 'DSR-1 AMP de Ares', 'Es un auténtico modelo de coleccionista, salieron muy pocas unidades y es muy difícil conseguir uno, en ZEUS AirSoft tenemos uno y además nuevo. No deje escapar ésta oportunidad de hacerte con esta fiel copia del fusil de francotirador usado por el GEO de la Policía Nacional española, cualquier amante de éste gran grupo especial desearía tener algo así.', '91BWA.jpg', 0),
(5, 'M60 \"Vietnam\" de LCT ACERO', 'M60 VN\r\n· Cuerpo: Acero estampado\r\n· Longitud total: 1100mm\r\n· Peso: 10kg\r\n· Rodamientos: Rodamientos de 8mm\r\n· Motor: 22000rpm\r\n· Cañón interno: Latón 6.02 ± 0.01mm / 610mm\r\n· Cámara Hop Up: Aluminio CNC\r\n· Cargador: 3500 bolas\r\n· Velocidad: 100m/s\r\n· Blowback: No\r\n· Cableado: 18AWG\r\n· Cilindro: Latón cromado\r\n· Cabeza de cilindro: Aluminio CNC\r\n· Cabeza de pistón: Aluminio CNC\r\n· MOSFET: No\r\n· Guía de muelle: Acero con rodamientos', 'ametralladoraDef.jpg', 0),
(6, 'PISTOLA BLASTER-DL44 HAN SOLO', 'Recreación de la pistola BLASTER-DL44, o heavy blaster pistol usada por Han Solo en la saga de películas STAR WARS.\r\nUna fiel representación además de ser completamente funcional. Su cargador alimentado por gas puede contener hasta 10bb\'s + 1 en la recamara, con funcionamiento en semiautomático y automático, descarga sus 10 bb\'s a una velocidad alarmante con su increíble y seco blowback, con una potencia de salida ideal para el juego.', 'pistola.jpg', 0),
(7, 'ESCOPETA M870 Breacher de Tokyo Marui', 'Tokyo Marui M870 Breacher (Gas Powered Shotgun)\r\n-- Escala 1/1 \r\n-- Calidad de fabricación superior y acabado perfecto de Tokyo Marui.\r\n-- Cuerpo y cañón de metal\r\n-- Guardamanos y empuñadura con las misma dimensiones que el real\r\n-- Raíl superior de 20mm\r\n-- 3 Cañones internos\r\n-- Imitación de cartucho que puede almacenar hasta 30bbs\r\n-- Cada disparo puede proyectar 3 o 6 bolas\r\n-- El modo de \"fuego rápido\" te permite disparar una y otra vez manteniendo el gatillo apretado y amartillando\r\n-- Almacenamiento de cartuchos en compartimento del guardamanos.\r\n-- Contenedor de gas ubicado en la empuñadura.\r\n-- Puede disparar unas 50 veces con una sola carga de gas cuando se encuentra en modo 3 disparos (depende la temperatura ambiente).\r\n \r\nHemos inventado este novedoso sistema en el que puedes elegir disparar 3 o 6 bolas al mismo tiempo. La nueva M870 tiene 3 cañones internos, cada uno equipado con su respectivo Hop-up. Cada cartucho tiene capacidad para 30bbs. La escopeta solo puede tener en uso un cartucho al mismo tiempo. La M870 Breacher es la versión corta de la M870 con una empuñadura y un guardamanos diferente. No lleva culata y por lo tanto el contenedor del gas va ubicado en la empuñadura y es totalmente diferente.', 'escopeta.jpg', 0),
(8, 'Subfusil MP7 GBB', 'Características:\r\n* Mira trasera ajustable\r\n* Hop-Up ajustable\r\n* Cargador largo\r\n* Guardamanos RIS\r\n* Culata de 4 posiciones\r\n* Gas Blow Back\r\n \r\nEspecificaciones:\r\n* Tipo: GBB\r\n* Construcción: Metal y Nylon\r\n* Capacidad del cargador: 40bbs\r\n* Longitud: 380-590 mm\r\n* Longitud del cañón: 165 mm\r\n* Peso: 2.1 kg\r\n* Velocidad de salida: 360-380 FPS\r\n* Hop-Up: Sí, ajustable\r\n* Alimentación recomendada: Gas de Invierno\r\n\r\nEste modelo de la MP7 que fabrica es una brutalidad, el disparo es excepcional, la textura y el feeling, inigualables, si quieres hacerte con una primaria para CQB, éste es tú modelo sin lugar a dudas.', 'subfusil.jpg', 0),
(15, 'Hola', 'nuevaDesc', 'allahuakbar.png', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_categories`
--

CREATE TABLE `products_categories` (
  `productID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `creationDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions_answers`
--

CREATE TABLE `questions_answers` (
  `questionID` int(11) NOT NULL,
  `answerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roleName` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `roleName`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'guest');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `email` varchar(320) NOT NULL,
  `passwordHash` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `passwordHash`) VALUES
(6, 'Alexander', 'López Vega', 'alex.lopez.ve@gmail.com', '$2y$10$bOVt7M3p2mQtvQTkStsNj.x3Rw9rKmvvHrqTt.RF7z46bJONYM2AG'),
(12, 'Hugo', 'Silva', 'hsilva@ucm.es', '$2y$10$J.hO7gzo7cEjUbkH4oy6nuBV80raqlHCo6h41t2vt5vqwwwXFm8Qy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_answers`
--

CREATE TABLE `users_answers` (
  `userID` int(11) NOT NULL,
  `answerID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_questions`
--

CREATE TABLE `users_questions` (
  `userID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_roles`
--

CREATE TABLE `users_roles` (
  `userID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users_roles`
--

INSERT INTO `users_roles` (`userID`, `roleID`) VALUES
(6, 1),
(12, 1),
(6, 2),
(12, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`productID`,`categoryID`);

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `questions_answers`
--
ALTER TABLE `questions_answers`
  ADD PRIMARY KEY (`questionID`,`answerID`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_answers`
--
ALTER TABLE `users_answers`
  ADD PRIMARY KEY (`userID`,`answerID`,`questionID`),
  ADD KEY `questionID` (`questionID`),
  ADD KEY `answerID` (`answerID`);

--
-- Indices de la tabla `users_questions`
--
ALTER TABLE `users_questions`
  ADD KEY `userID` (`userID`),
  ADD KEY `questionID` (`questionID`);

--
-- Indices de la tabla `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`roleID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users_answers`
--
ALTER TABLE `users_answers`
  ADD CONSTRAINT `users_answers_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_answers_ibfk_2` FOREIGN KEY (`questionID`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_answers_ibfk_3` FOREIGN KEY (`answerID`) REFERENCES `answers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users_questions`
--
ALTER TABLE `users_questions`
  ADD CONSTRAINT `users_questions_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_questions_ibfk_2` FOREIGN KEY (`questionID`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `users_roles_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_roles_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
