-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.11-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para stock
CREATE DATABASE IF NOT EXISTS `stock` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `stock`;

-- Copiando estrutura para tabela stock.entries
CREATE TABLE IF NOT EXISTS `entries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) unsigned NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_appetizer_products` (`id_prod`),
  CONSTRAINT `FK_appetizer_products` FOREIGN KEY (`id_prod`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela stock.entries: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `entries` DISABLE KEYS */;
INSERT INTO `entries` (`id`, `id_prod`, `purchase_price`, `quantity`, `date`) VALUES
	(8, 38, 4000.00, 2, '2020-05-29'),
	(9, 29, 899.00, 3, '2020-05-29'),
	(10, 38, 3850.00, 10, '2020-05-29'),
	(11, 31, 4000.00, 5, '2020-05-28');
/*!40000 ALTER TABLE `entries` ENABLE KEYS */;

-- Copiando estrutura para tabela stock.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(110) NOT NULL,
  `quantity` int(11) DEFAULT 0,
  `sale_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela stock.products: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `quantity`, `sale_price`) VALUES
	(31, 'Galaxy S10', 5, 5000.00),
	(38, 'Ipad X', 12, 5000.00),
	(37, 'Iphone 6', 0, 1600.00),
	(36, 'Iphone 8', 0, 3500.00),
	(30, 'Moto G6', 0, 849.00),
	(29, 'Moto G8 Plus', 3, 1200.00);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
