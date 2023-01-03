-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para cms_bd
CREATE DATABASE IF NOT EXISTS `cms_bd` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cms_bd`;

-- Volcando estructura para tabla cms_bd.noticias
CREATE TABLE IF NOT EXISTS `noticias` (
  `codin` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `descripcio` varchar(255) NOT NULL,
  `article` TEXT NOT NULL,
  PRIMARY KEY (`codin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Noticias publicadas a la web';



-- Volcando estructura para tabla cms_bd.users
CREATE TABLE IF NOT EXISTS `users` (
  `nick` varchar(25) NOT NULL,
  `nomcognom` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `edat` int(3) NOT NULL DEFAULT 0,
  `nivell` varchar(10) NOT NULL DEFAULT '0' COMMENT 'Nivel de permisos',
  PRIMARY KEY (`nick`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 CHECKSUM=1 COMMENT='Tabla que contiene los usuarios del cms.';

-- Volcando datos para la tabla cms_bd.users: ~0 rows (aproximadamente)
DELETE FROM `users`;


-- Volcando datos para la tabla cms_bd.noticias: ~0 rows (aproximadamente)
DELETE FROM `noticias`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
