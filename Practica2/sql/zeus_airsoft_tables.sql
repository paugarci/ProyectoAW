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

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `states`
  ADD PRIMARY KEY (`name`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`mail`);

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
