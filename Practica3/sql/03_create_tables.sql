--  Users
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(320) NOT NULL,
  `passwordHash` char(60) NOT NULL
);
ALTER TABLE `users` ADD PRIMARY KEY (`id`);
ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--  Roles
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roleName` varchar(32) NOT NULL
);
ALTER TABLE `roles` ADD PRIMARY KEY (`id`);
ALTER TABLE `roles` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--  User-Roles
CREATE TABLE `user_roles` (
  `userID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL
);
ALTER TABLE `user_roles` ADD PRIMARY KEY (`userID`,`roleID`), ADD KEY `userID` (`userID`);
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;