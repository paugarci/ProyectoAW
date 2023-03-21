


CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `products` (`id`, `img_name`, `title`, `description`, `category`) VALUES
(1, 'm4a1.jpg', 'Colt M4A1 5.56x45', 'La carabina Colt M4A1 es una variante completamente automática de la carabina M4 básica y fue diseñada principalmente para uso en operaciones especiales. Sin embargo, EE. UU. El Comando de Operaciones Especiales ( USSOCOM ) pronto adoptará el M4A1 para casi todas las unidades de operaciones especiales, seguido más tarde por la introducción general del M4A1 en servicio con los EE. UU. Ejército y Cuerpo de Marines.', 'Rifles de asalto'),
(2, 'ak74.png', 'Kalashnikov AK-74 5.45x39', 'El rifle de asalto Kalashnikov de 5,45 mm, desarrollado en 1970 por M. T. Kalashnikov, se convirtió en una nueva evolución de AKM debido a la adopción de la nueva munición 5,45x39 por parte de los militares.', 'Rifles de asalto');


CREATE TABLE `states` (
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `states` (`name`) VALUES
('Andalucía'),
('Aragón'),
('Asturias'),
('Baleares'),
('Canarias'),
('Cantabria'),
('Castilla y León'),
('Castilla-La Mancha'),
('Cataluña'),
('Ceuta'),
('Extremadura'),
('Galicia'),
('La Rioja'),
('Madrid'),
('Melilla'),
('Murcia'),
('Navarra'),
('País Vasco'),
('Valencia');

CREATE TABLE `users` (
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `privileged` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_preguntas`
--

CREATE TABLE `foro_preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(500) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_respuestas`
--

CREATE TABLE `foro_respuestas` (
  `id` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `respuesta` varchar(500) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Indices de la tabla `foro_preguntas`
--
ALTER TABLE `foro_preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `foro_respuestas`
--
ALTER TABLE `foro_respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_foreign` (`id_pregunta`);


ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `states`
  ADD PRIMARY KEY (`name`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`mail`);

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `foro_preguntas`
--
ALTER TABLE `foro_preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `foro_respuestas`
--
ALTER TABLE `foro_respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
  --
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `foro_respuestas`
--
ALTER TABLE `foro_respuestas`
  ADD CONSTRAINT `id_foreign` FOREIGN KEY (`id_pregunta`) REFERENCES `foro_preguntas` (`id`);
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `descripcion` varchar(512) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `nombre`, `descripcion`, `fecha`) VALUES
(1, 'Asalto al fortificado', 'Los reclutas se dividirán en dos equipos: un equipo ofensor y otro equipo defensor. El equipo defensor montará posiciones de defensa alrededor de un punto de interés, defendiendo una bandera. El equipo ofensor deberá obtener la bandera.', '2023-04-01'),
(2, 'Combate a muerte por equipos', 'Dos equipos. Cada eliminación vale 1 punto. Cuando se acabe la ronda por tiempo, gana el equipo con mayor puntuación. Si todo el equipo está eliminado, se añade 5 puntos. 10 rondas en total.', '2023-04-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `events_users`
--

CREATE TABLE `events_users` (
  `event_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events_users`
--

INSERT INTO `events_users` (`event_id`, `user`) VALUES
(1, 'vicenteesunputo@gmail.com'),
(2, 'alex.lopez.ve@gmail.com'),
(2, 'vicenteesunputo@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events_users`
--
ALTER TABLE `events_users`
  ADD PRIMARY KEY (`event_id`,`user`),
  ADD KEY `user` (`user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events_users`
--
ALTER TABLE `events_users`
  ADD CONSTRAINT `events_users_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `eventos` (`id`),
  ADD CONSTRAINT `events_users_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`mail`);
COMMIT;