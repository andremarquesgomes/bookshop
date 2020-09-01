-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 07:34 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livraria`
--
CREATE DATABASE IF NOT EXISTS `livraria` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `livraria`;

-- --------------------------------------------------------

--
-- Table structure for table `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(11) NOT NULL,
  `nome_autor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autores`
--

INSERT INTO `autores` (`id_autor`, `nome_autor`) VALUES
(1, 'José Saram'),
(3, 'Fernando Pessoa'),
(4, 'Paul Auter'),
(5, 'José Luis Peixoto'),
(6, 'Agustina Bessa Luís'),
(7, 'Douglas Adams');

-- --------------------------------------------------------

--
-- Table structure for table `autor_escreve_livro`
--

CREATE TABLE `autor_escreve_livro` (
  `fk_id_autor` int(11) NOT NULL,
  `fk_id_livro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autor_escreve_livro`
--

INSERT INTO `autor_escreve_livro` (`fk_id_autor`, `fk_id_livro`) VALUES
(1, 3),
(1, 5),
(1, 9),
(3, 9),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `carrinhos`
--

CREATE TABLE `carrinhos` (
  `id_carrinho` int(11) NOT NULL,
  `fk_id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carrinhos`
--

INSERT INTO `carrinhos` (`id_carrinho`, `fk_id_cliente`) VALUES
(11, 1),
(14, 1),
(12, 12),
(13, 12);

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(100) DEFAULT NULL,
  `fk_id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome_categoria`, `fk_id_categoria`) VALUES
(1, 'ficao cientifica', NULL),
(2, 'Romance', NULL),
(3, 'Comédia', NULL),
(4, 'Drama', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(100) DEFAULT NULL,
  `email_cliente` varchar(150) DEFAULT NULL,
  `password_cliente` varchar(70) DEFAULT NULL,
  `morada_cliente` varchar(200) DEFAULT NULL,
  `telefone_cliente` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome_cliente`, `email_cliente`, `password_cliente`, `morada_cliente`, `telefone_cliente`) VALUES
(1, 'João Silva', 'joao@mail.com', '202cb962ac59075b964b07152d234b70', 'Lisboa', '21456789'),
(2, 'Joana rodrigues', 'joana@mail.com', '202cb962ac59075b964b07152d234b70', 'Porto', '22456789'),
(3, 'Pedro Oliveira', 'pedro@mail.com', '202cb962ac59075b964b07152d234b70', 'Porto', '221569874'),
(4, 'Jorge Pereira', 'jorge@mail.com', '202cb962ac59075b964b07152d234b70', 'Coimbra', '239569874'),
(5, 'António Esteves', 'antonio@mail.com', '202cb962ac59075b964b07152d234b70', 'Aveiro', '234569874'),
(6, 'António Esteves', 'antonio@mail.com', '202cb962ac59075b964b07152d234b70', 'Aveiro', '234569874'),
(7, 'Hugo Oliveira', 'oliveira@mail.com', '68053af2923e00204c3ca7c6a3150cf7', 'Braga', '123456789'),
(8, 'Hugo Oliveira', 'oliveira@mail.com', '68053af2923e00204c3ca7c6a3150cf7', 'Braga', '123456789'),
(9, 'Maria Rodrigues', 'maria@mail.com', '68053af2923e00204c3ca7c6a3150cf7', 'Faro', '223366555'),
(10, 'Maria Rodrigues', 'maria@mail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Faro', '223366555'),
(11, 'Maria Rodrigues', 'maria@mail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Faro', '223366555'),
(12, 'Xico Cenas', 'xico@mail.com', '202cb962ac59075b964b07152d234b70', 'Coimrba', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `fk_id_meio_de_pagamento` int(11) NOT NULL,
  `fk_id_carrinho` int(11) NOT NULL,
  `data_compra` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`id_compra`, `fk_id_meio_de_pagamento`, `fk_id_carrinho`, `data_compra`) VALUES
(3, 1, 11, '2019-11-30 15:30:24'),
(4, 1, 12, '2019-11-30 15:33:44'),
(5, 1, 13, '2019-11-30 15:34:05'),
(6, 1, 14, '2019-11-30 15:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `editoras`
--

CREATE TABLE `editoras` (
  `id_editora` int(11) NOT NULL,
  `nome_editora` varchar(50) DEFAULT NULL,
  `morada_editora` varchar(100) DEFAULT NULL,
  `email_editora` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `editoras`
--

INSERT INTO `editoras` (`id_editora`, `nome_editora`, `morada_editora`, `email_editora`) VALUES
(1, 'Leya', 'Lisboa', 'leya@mail.com'),
(2, 'Porto Editora', 'Porto', 'ola@portoeditora.pt'),
(3, 'Caminho', 'Braga', 'ola@caminho.com');

-- --------------------------------------------------------

--
-- Table structure for table `livros`
--

CREATE TABLE `livros` (
  `id_livro` int(11) NOT NULL,
  `fk_id_editora` int(11) DEFAULT NULL,
  `titulo_livro` varchar(100) DEFAULT NULL,
  `sinopse_livro` text,
  `stock_livro` int(11) DEFAULT NULL,
  `preco_livro` decimal(6,2) DEFAULT NULL,
  `capa_livro` varchar(30) DEFAULT NULL,
  `ano_edicao_livro` year(4) DEFAULT NULL,
  `isbn_livro` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livros`
--

INSERT INTO `livros` (`id_livro`, `fk_id_editora`, `titulo_livro`, `sinopse_livro`, `stock_livro`, `preco_livro`, `capa_livro`, `ano_edicao_livro`, `isbn_livro`) VALUES
(3, 3, 'Levantado do tecto', 'Livro do Nobel da Literatura', 1100, '12.00', 'levantado.jpg', 1993, 'qqqq-qqq-qqq'),
(4, 1, 'A Boleia pela Galaxia', 'Livro de Comédia', 1500, '52.00', 'boleia.jpg', 2000, 'eee-rrr-999'),
(5, 2, 'Deus das Moscas', 'Livro sobre joves perdidos de um naufragio', 2000, '12.00', 'deus.jpg', 1965, 'ppp-ooo-888'),
(6, NULL, 'Corto Maltese na Siberia', 'avenutra do marinheiro maltes', 100, '20.36', 'corto.jpg', 1997, 'aaa-999-888'),
(7, 1, 'PHP para iniciados', 'Caros amigos, a execução dos pontos do programa nos obriga à análise das diversas correntes de pensamento. Por outro lado, a percepção das dificuldades assume importantes posições no estabelecimento dos métodos utilizados na avaliação de resultados. Do mesmo modo, o surgimento do comércio virtual cumpre um papel essencial na formulação dos relacionamentos verticais entre as hierarquias. Podemos já vislumbrar o modo pelo qual o julgamento imparcial das eventualidades não pode mais se dissociar do investimento em reciclagem técnica.', 50, '20.00', 'php.jpg', 2000, '777-qqq-999'),
(8, 2, 'Um novo titulo', 'Uma sinopse', 555, '10.23', '5de6c01d4cb14.png', 2019, 'qwerty'),
(9, 2, 'Um novo titulo', 'Uma sinopse', 555, '10.23', '5de6c6005fe40.png', 2019, 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `livro_esta_em_carrinho`
--

CREATE TABLE `livro_esta_em_carrinho` (
  `id_livro_esta_em_carrinho` int(11) NOT NULL,
  `fk_id_livro` int(11) NOT NULL,
  `fk_id_carrinho` int(11) NOT NULL,
  `quantidade` varchar(45) DEFAULT NULL,
  `preco_na_compra` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livro_esta_em_carrinho`
--

INSERT INTO `livro_esta_em_carrinho` (`id_livro_esta_em_carrinho`, `fk_id_livro`, `fk_id_carrinho`, `quantidade`, `preco_na_compra`) VALUES
(7, 3, 11, '1', '12.00'),
(8, 3, 11, '1', '12.00'),
(9, 3, 12, '5', '12.00'),
(10, 5, 12, '6', '12.00'),
(11, 7, 13, '10', '20.00'),
(12, 6, 13, '1', '20.36'),
(13, 3, 14, '100', '12.00'),
(14, 6, 14, '56', '20.36');

-- --------------------------------------------------------

--
-- Table structure for table `livro_tem_categoria`
--

CREATE TABLE `livro_tem_categoria` (
  `fk_id_livro` int(11) NOT NULL,
  `fk_id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `livro_tem_categoria`
--

INSERT INTO `livro_tem_categoria` (`fk_id_livro`, `fk_id_categoria`) VALUES
(3, 2),
(4, 1),
(4, 3),
(5, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `meios_de_pagamento`
--

CREATE TABLE `meios_de_pagamento` (
  `id_meio_de_pagamento` int(11) NOT NULL,
  `nome_meio_de_pagamento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meios_de_pagamento`
--

INSERT INTO `meios_de_pagamento` (`id_meio_de_pagamento`, `nome_meio_de_pagamento`) VALUES
(1, 'MBWay'),
(2, 'Cartao Credito'),
(3, 'Paypal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indexes for table `autor_escreve_livro`
--
ALTER TABLE `autor_escreve_livro`
  ADD PRIMARY KEY (`fk_id_autor`,`fk_id_livro`),
  ADD KEY `fk_autores_has_livros_livros1_idx` (`fk_id_livro`),
  ADD KEY `fk_autores_has_livros_autores1_idx` (`fk_id_autor`);

--
-- Indexes for table `carrinhos`
--
ALTER TABLE `carrinhos`
  ADD PRIMARY KEY (`id_carrinho`),
  ADD KEY `fk_carrinhos_clientes1_idx` (`fk_id_cliente`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `fk_categorias_categorias1_idx` (`fk_id_categoria`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `fk_compras_meios_de_pagamento1_idx` (`fk_id_meio_de_pagamento`),
  ADD KEY `fk_compras_carrinhos1_idx` (`fk_id_carrinho`);

--
-- Indexes for table `editoras`
--
ALTER TABLE `editoras`
  ADD PRIMARY KEY (`id_editora`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livro`),
  ADD KEY `fk_livros_editoras_idx` (`fk_id_editora`);

--
-- Indexes for table `livro_esta_em_carrinho`
--
ALTER TABLE `livro_esta_em_carrinho`
  ADD PRIMARY KEY (`id_livro_esta_em_carrinho`),
  ADD KEY `fk_livros_has_carrinhos_carrinhos1_idx` (`fk_id_carrinho`),
  ADD KEY `fk_livros_has_carrinhos_livros1_idx` (`fk_id_livro`);

--
-- Indexes for table `livro_tem_categoria`
--
ALTER TABLE `livro_tem_categoria`
  ADD PRIMARY KEY (`fk_id_livro`,`fk_id_categoria`),
  ADD KEY `fk_livros_has_categorias_categorias1_idx` (`fk_id_categoria`),
  ADD KEY `fk_livros_has_categorias_livros1_idx` (`fk_id_livro`);

--
-- Indexes for table `meios_de_pagamento`
--
ALTER TABLE `meios_de_pagamento`
  ADD PRIMARY KEY (`id_meio_de_pagamento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autores`
--
ALTER TABLE `autores`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carrinhos`
--
ALTER TABLE `carrinhos`
  MODIFY `id_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `editoras`
--
ALTER TABLE `editoras`
  MODIFY `id_editora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `livro_esta_em_carrinho`
--
ALTER TABLE `livro_esta_em_carrinho`
  MODIFY `id_livro_esta_em_carrinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `meios_de_pagamento`
--
ALTER TABLE `meios_de_pagamento`
  MODIFY `id_meio_de_pagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `autor_escreve_livro`
--
ALTER TABLE `autor_escreve_livro`
  ADD CONSTRAINT `fk_autores_has_livros_autores1` FOREIGN KEY (`fk_id_autor`) REFERENCES `autores` (`id_autor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_autores_has_livros_livros1` FOREIGN KEY (`fk_id_livro`) REFERENCES `livros` (`id_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `carrinhos`
--
ALTER TABLE `carrinhos`
  ADD CONSTRAINT `fk_carrinhos_clientes1` FOREIGN KEY (`fk_id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fk_categorias_categorias1` FOREIGN KEY (`fk_id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `fk_compras_carrinhos1` FOREIGN KEY (`fk_id_carrinho`) REFERENCES `carrinhos` (`id_carrinho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compras_meios_de_pagamento1` FOREIGN KEY (`fk_id_meio_de_pagamento`) REFERENCES `meios_de_pagamento` (`id_meio_de_pagamento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `fk_livros_editoras` FOREIGN KEY (`fk_id_editora`) REFERENCES `editoras` (`id_editora`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `livro_esta_em_carrinho`
--
ALTER TABLE `livro_esta_em_carrinho`
  ADD CONSTRAINT `fk_livros_has_carrinhos_carrinhos1` FOREIGN KEY (`fk_id_carrinho`) REFERENCES `carrinhos` (`id_carrinho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_livros_has_carrinhos_livros1` FOREIGN KEY (`fk_id_livro`) REFERENCES `livros` (`id_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `livro_tem_categoria`
--
ALTER TABLE `livro_tem_categoria`
  ADD CONSTRAINT `fk_livros_has_categorias_categorias1` FOREIGN KEY (`fk_id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_livros_has_categorias_livros1` FOREIGN KEY (`fk_id_livro`) REFERENCES `livros` (`id_livro`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
