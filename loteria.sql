-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Ago-2021 às 00:00
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loteria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `apostadores_numeros`
--

DROP TABLE IF EXISTS `apostadores_numeros`;
CREATE TABLE IF NOT EXISTS `apostadores_numeros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apostador` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `numeros1` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `apostadores_numeros`
--

INSERT INTO `apostadores_numeros` (`id`, `apostador`, `data`, `numeros1`) VALUES
(3, 'ErickAbEEE', '2021-08-24', '5,14,19,53,68,75'),
(2, '1234567', '2021-08-23', '4, 36, 61, 63, 73, 80'),
(4, 'TESTEEEEEEE', '2021-08-24', '3,3,46,53,64,70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sorteios`
--

DROP TABLE IF EXISTS `sorteios`;
CREATE TABLE IF NOT EXISTS `sorteios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numeros_sorteado` varchar(255) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sorteios`
--

INSERT INTO `sorteios` (`id`, `numeros_sorteado`, `data`) VALUES
(14, '4, 49, 4, 17, 12, 77', '2021-08-23'),
(2, '1, 22, 55, 56, 61, 67', '2021-08-23'),
(3, '1, 8, 33, 64, 66, 68', '2021-08-23'),
(4, '2, 17, 31, 65, 67, 75', '2021-08-23'),
(5, '1, 3, 30, 39, 41, 66', '2021-08-23'),
(6, '3, 28, 37, 42, 3, 74', '2021-08-23'),
(7, '4, 48, 7, 12, 75, 66', '2021-08-23'),
(8, '4, 80, 44, 21, 64, 64', '2021-08-23'),
(9, '1, 19, 12, 10, 49, 71', '2021-08-23'),
(10, '5, 69, 60, 8, 15, 77', '2021-08-23'),
(11, '1, 31, 24, 24, 46, 73', '2021-08-23'),
(12, '1, 44, 46, 1, 36, 73', '2021-08-23'),
(13, '1, 72, 8, 78, 35, 78', '2021-08-23'),
(15, '5, 21, 27, 68, 32, 80', '2021-08-23'),
(16, '4, 68, 29, 78, 39, 61', '2021-08-23'),
(17, '2, 69, 20, 56, 1, 61', '2021-08-23'),
(18, '4, 47, 23, 68, 59, 77', '2021-08-23'),
(19, '2, 59, 68, 79, 55, 68', '2021-08-23'),
(20, '1, 66, 80, 68, 64, 68', '2021-08-23'),
(21, '2,21,52,15,10,66', '2021-08-23'),
(22, '2,58,19,58,59,71', '2021-08-23'),
(23, '5,2,20,21,23,74', '2021-08-23'),
(24, '3,29,48,46,38,74', '2021-08-23'),
(25, '5,66,39,22,54,73', '2021-08-23'),
(26, '3,1,72,10,45,62', '2021-08-23'),
(27, '2,40,59,79,50,66', '2021-08-23'),
(28, '4,38,8,20,65,61', '2021-08-23'),
(29, '5,5,52,68,5,71', '2021-08-23'),
(30, '2,42,50,2,3,61', '2021-08-24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
