CREATE TABLE `user` (
  `id` integer PRIMARY KEY AUTOINCREMENT NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
);

INSERT INTO `user` (`id`, `username`, `email`) VALUES (1, 'user', 'user@email.com');