-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.16 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para landing-projects
DROP DATABASE IF EXISTS `landing-projects`;
CREATE DATABASE IF NOT EXISTS `landing-projects` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `landing-projects`;

-- Volcando estructura para tabla landing-projects.items
DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items`
(
    `id`         int(10) unsigned                                              NOT NULL AUTO_INCREMENT,
    `name`       varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci  NOT NULL,
    `url`        varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `proyect_id` int(10) unsigned                                              NOT NULL,
    PRIMARY KEY (`id`),
    KEY `FK_items_projects` (`proyect_id`),
    CONSTRAINT `FK_items_projects` FOREIGN KEY (`proyect_id`) REFERENCES `projects` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 6
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- Volcando datos para la tabla landing-projects.items: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `items`
    DISABLE KEYS */;
INSERT INTO `items` (`id`, `name`, `url`, `proyect_id`)
VALUES (1, 'GitHub', 'github.co1m', 1),
       (2, 'GitHub', 'github.com', 1),
       (3, 'GitHub', 'github.com', 1),
       (4, 'GitHub', 'github.com', 1);
/*!40000 ALTER TABLE `items`
    ENABLE KEYS */;

-- Volcando estructura para tabla landing-projects.modules
DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules`
(
    `id`       int(10) unsigned                                             NOT NULL AUTO_INCREMENT,
    `name`     varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `state_id` int(10) unsigned                                             NOT NULL,
    PRIMARY KEY (`id`),
    KEY `FK_moduls_states` (`state_id`),
    CONSTRAINT `FK_moduls_states` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 10
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- Volcando datos para la tabla landing-projects.modules: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `modules`
    DISABLE KEYS */;
INSERT INTO `modules` (`id`, `name`, `state_id`)
VALUES (1, 'modulo 1', 1),
       (2, 'modulo 1', 1),
       (3, 'modulo 1', 1),
       (4, 'modulo 1', 1),
       (5, 'modulo 1', 1),
       (6, 'modulo 1', 1),
       (7, 'modulo 1', 1),
       (8, 'modulo 1', 1);
/*!40000 ALTER TABLE `modules`
    ENABLE KEYS */;

-- Volcando estructura para tabla landing-projects.projects
DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects`
(
    `id`          int(10) unsigned                                             NOT NULL AUTO_INCREMENT,
    `name`        varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `type`        varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `image`       varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `state_id`    int(10) unsigned                                             NOT NULL,
    PRIMARY KEY (`id`),
    KEY `FK_projects_states` (`state_id`),
    CONSTRAINT `FK_projects_states` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- Volcando datos para la tabla landing-projects.projects: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `projects`
    DISABLE KEYS */;
INSERT INTO `projects` (`id`, `name`, `type`, `image`, `description`, `state_id`)
VALUES (1, 'SILUB', 'Sistema de información', 'imagen', 'Sistema de información apra la famiempresa Jovita', 1);
/*!40000 ALTER TABLE `projects`
    ENABLE KEYS */;

-- Volcando estructura para tabla landing-projects.states
DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states`
(
    `id`          int(10) unsigned                                             NOT NULL AUTO_INCREMENT,
    `name`        varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci        NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;

-- Volcando datos para la tabla landing-projects.states: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `states`
    DISABLE KEYS */;
INSERT INTO `states` (`id`, `name`, `description`)
VALUES (1, 'Desarrollo', 'En desarrollo y no se a publicado ninguna version del mismo');
/*!40000 ALTER TABLE `states`
    ENABLE KEYS */;

/*!40101 SET SQL_MODE = IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS = IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
