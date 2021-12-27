CREATE TABLE `account` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `balance` double NOT NULL,
  `description` text NOT NULL
);

CREATE TABLE `coba_tr` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `views` int NOT NULL,
  `created_at` timestamp NOT NULL
);