-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           5.7.24 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para sisger
CREATE DATABASE IF NOT EXISTS `sisger` /*!40100 DEFAULT CHARACTER SET utf16 COLLATE utf16_bin */;
USE `sisger`;

-- Copiando estrutura para tabela sisger.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf16_bin NOT NULL,
  `telefone` varchar(20) COLLATE utf16_bin NOT NULL,
  `cpf` varchar(50) COLLATE utf16_bin NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE utf16_bin NOT NULL,
  `data_nascimento` date NOT NULL,
  `municipio_id` bigint(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- Copiando dados para a tabela sisger.cliente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id`, `nome`, `telefone`, `cpf`, `email`, `data_nascimento`, `municipio_id`) VALUES
	(4, 'Tatiana', '49 3433 -2230', '234.564.234-82', 'morgana@gmail.com', '2002-04-04', 9),
	(6, 'Felipe', '49 3433 - 8976', '474.238.924-12', 'felipe@gmail.com', '1900-12-17', 13);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando estrutura para tabela sisger.locacao
CREATE TABLE IF NOT EXISTS `locacao` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `hora_retirada` time NOT NULL,
  `hora_devolucao` time NOT NULL,
  `data_retirada` date NOT NULL,
  `data_devolucao` date NOT NULL,
  `cliente_id` bigint(100) NOT NULL,
  `veiculo_id` bigint(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `veiculo_id` (`veiculo_id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `FK_locacao_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `FK_locacao_veiculo` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- Copiando dados para a tabela sisger.locacao: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `locacao` DISABLE KEYS */;
INSERT INTO `locacao` (`id`, `hora_retirada`, `hora_devolucao`, `data_retirada`, `data_devolucao`, `cliente_id`, `veiculo_id`) VALUES
	(5, '14:00:00', '18:00:00', '2020-07-03', '2020-07-10', 6, 5),
	(6, '18:00:00', '12:00:00', '2011-12-12', '2012-01-13', 4, 3);
/*!40000 ALTER TABLE `locacao` ENABLE KEYS */;

-- Copiando estrutura para tabela sisger.multa
CREATE TABLE IF NOT EXISTS `multa` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hora_multa` time NOT NULL,
  `data_multa` date NOT NULL,
  `valor` int(11) NOT NULL,
  `cliente_id` bigint(20) NOT NULL,
  `veiculo_id` bigint(20) NOT NULL,
  `locacao_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `veiculo_id` (`veiculo_id`),
  KEY `locacao_id` (`locacao_id`),
  CONSTRAINT `FK__cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  CONSTRAINT `FK__locacao` FOREIGN KEY (`locacao_id`) REFERENCES `locacao` (`id`),
  CONSTRAINT `FK__veiculo` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- Copiando dados para a tabela sisger.multa: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `multa` DISABLE KEYS */;
INSERT INTO `multa` (`id`, `hora_multa`, `data_multa`, `valor`, `cliente_id`, `veiculo_id`, `locacao_id`) VALUES
	(4, '15:00:00', '2020-07-05', 300, 6, 5, 5),
	(5, '18:30:00', '2011-12-13', 654, 4, 3, 6);
/*!40000 ALTER TABLE `multa` ENABLE KEYS */;

-- Copiando estrutura para tabela sisger.municipio
CREATE TABLE IF NOT EXISTS `municipio` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf16_bin NOT NULL,
  `estado` varchar(50) COLLATE utf16_bin NOT NULL,
  `uf` varchar(2) COLLATE utf16_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- Copiando dados para a tabela sisger.municipio: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` (`id`, `nome`, `estado`, `uf`) VALUES
	(9, 'Xanxerê', 'Santa Catarina', 'SC'),
	(10, 'Chapecó', 'Santa Catarina', 'SC'),
	(11, 'Blumenau', 'Santa Catarina', 'SC'),
	(12, 'Curitiba', 'Paraná', 'PR'),
	(13, 'Santa Maria', 'Rio Grande do Sul', 'RS');
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;

-- Copiando estrutura para tabela sisger.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf16_bin NOT NULL,
  `login` varchar(50) COLLATE utf16_bin NOT NULL,
  `senha` varchar(50) COLLATE utf16_bin NOT NULL,
  `ativo` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- Copiando dados para a tabela sisger.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`, `ativo`) VALUES
	(4, 'Morgana Rodrigues', 'admin', '123', 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela sisger.veiculo
CREATE TABLE IF NOT EXISTS `veiculo` (
  `id` bigint(100) NOT NULL AUTO_INCREMENT,
  `placa` varchar(10) COLLATE utf16_bin NOT NULL,
  `tipo_veiculo` varchar(50) COLLATE utf16_bin NOT NULL,
  `fabricante` varchar(50) COLLATE utf16_bin NOT NULL,
  `modelo` varchar(50) COLLATE utf16_bin NOT NULL,
  `cliente_id` bigint(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `FK_veiculo_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

-- Copiando dados para a tabela sisger.veiculo: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `veiculo` DISABLE KEYS */;
INSERT INTO `veiculo` (`id`, `placa`, `tipo_veiculo`, `fabricante`, `modelo`, `cliente_id`) VALUES
	(3, 'MCS - 2344', 'Automóvel', 'Nissan', 'Versa', 4),
	(5, 'RER - 3875', 'Automóvel', 'Renault', 'Logan', 6);
/*!40000 ALTER TABLE `veiculo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
