CREATE TABLE IF NOT EXISTS `admins`(
    `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(250) NOT NULL UNIQUE KEY COLLATE utf8_persian_ci,
    `password` VARCHAR(250) NOT NULL COLLATE utf8_persian_ci,
    `create_time` DATETIME DEFAULT now(),
    `update_time` DATETIME
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_persian_ci;

CREATE TABLE IF NOT EXISTS `articles`(
    `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(250) NOT NULL COLLATE utf8_persian_ci,
    `body` TEXT NOT NULL COLLATE utf8_persian_ci,
    `image` TEXT NOT NULL COLLATE utf8_persian_ci,
    `create_time` DATETIME DEFAULT now(),
    `update_time` DATETIME
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_persian_ci;

CREATE TABLE IF NOT EXISTS `menus`(
    `id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(250) NOT NULL COLLATE utf8_persian_ci,
    `link` TEXT NOT NULL COLLATE utf8_persian_ci,
    `create_time` DATETIME DEFAULT now(),
    `update_time` DATETIME
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_persian_ci;

CREATE TABLE IF NOT EXISTS `setting`(
    `id` INT DEFAULT 0,
    `title` TEXT NOT NULL COLLATE utf8_persian_ci,
    `description` TEXT NOT NULL COLLATE utf8_persian_ci,
    `email` TEXT NOT NULL COLLATE utf8_persian_ci,
    `create_time` DATETIME DEFAULT now(),
    `update_time` DATETIME
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_persian_ci;
