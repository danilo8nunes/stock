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

-- Copiando estrutura para tabela stock.appetizer
CREATE TABLE IF NOT EXISTS `appetizer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) unsigned NOT NULL,
  `price_p` decimal(10,2) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_appetizer_products` (`id_prod`),
  CONSTRAINT `FK_appetizer_products` FOREIGN KEY (`id_prod`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela stock.appetizer: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `appetizer` DISABLE KEYS */;
INSERT INTO `appetizer` (`id`, `id_prod`, `price_p`, `amount`, `date`) VALUES
	(1, 29, 800.25, 10, '2020-05-27'),
	(2, 29, 756.56, 20, '2020-05-27'),
	(3, 30, 500.00, 5, '2020-05-27');
/*!40000 ALTER TABLE `appetizer` ENABLE KEYS */;

-- Copiando estrutura para tabela stock.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(110) NOT NULL,
  `amount` int(11) DEFAULT 0,
  `sale_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `purchase_price` decimal(10,2) DEFAULT 0.00,
  UNIQUE KEY `name` (`name`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela stock.products: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `amount`, `sale_price`, `purchase_price`) VALUES
	(31, 'Galaxy S10', 0, 5000.00, 0.00),
	(33, 'Iphone X', 0, 8000.00, 0.00),
	(30, 'Moto G6', 0, 849.00, 0.00),
	(29, 'Moto G8 Plus', 0, 1200.00, 0.00);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
