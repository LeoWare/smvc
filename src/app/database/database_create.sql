CREATE DATABASE `project`;
USE `project`;

-- DROP TABLE `users`;
CREATE TABLE `users`
(
    `id` int(10) UNSIGNED NOT NULL,
    `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `access_level` int(11) NOT NULL,
    `created_on` datetime NOT NULL,
    `modified_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `active` int(10) UNSIGNED NOT NULL,
    `deleted` int(10) UNSIGNED NOT NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- DROP TABLE `blog_post`;
CREATE TABLE `blog_post`
(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `author` VARCHAR(100) NOT NULL,
    `title` VARCHAR(200) NOT NULL,
    `created` DATETIME NOT NULL,
    `published` DATETIME NOT NULL,
    `stub` VARCHAR(100) NOT NULL,
    `text` TEXT NOT NULL,
    `modified` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL
        DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
)
ENGINE = InnoDB
CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;
