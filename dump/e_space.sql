-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Maio-2023 às 23:06
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `e_space`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `cep` varchar(20) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `quantidade_pessoas` int(11) DEFAULT NULL,
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL,
  `autorizacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `anuncios`
--

INSERT INTO `anuncios` (`id`, `id_usuario`, `titulo`, `descricao`, `preco`, `localizacao`, `cep`, `numero`, `quantidade_pessoas`, `criado_em`, `atualizado_em`, `autorizacao`) VALUES
(1, 2, 'Villa dos Sonhos', 'A Villa dos Sonhos é uma elegante mansão colonial, cercada por jardins exuberantes e uma piscina deslumbrante. Com espaçosos salões de festas, um terraço coberto e um gazebo ao ar livre, é o local perfeito para casamentos, festas de aniversário e eventos corporativos de prestígio', '540.00', 'Cidade Nova', '44.033-087', 254, 300, '2023-05-16 01:43:35', '2023-05-16 01:43:35', 1),
(2, 2, 'Loft Urbano', 'Descrição: Localizado no coração da cidade, o Loft Urbano é um espaço industrial chique, com paredes de tijolos expostos, piso de concreto polido e uma decoração moderna. É o local ideal para eventos descolados, como lançamentos de produtos, exposições de arte e festas temáticas. Acomoda até 150 pessoas e oferece uma atmosfera urbana única.', '880.00', 'Sobradinho', '55.055-05', 448, 150, '2023-05-16 01:49:25', '2023-05-16 01:49:25', 1),
(4, 2, 'Salão Praia Dourada', 'Com vista para as areias douradas e o mar azul-turquesa, o Salão Praia Dourada é um espaço elegante em um resort beira-mar. Com interiores sofisticados, um terraço com vista para o oceano e acesso direto à praia, é o local perfeito para casamentos na praia, festas de fim de ano e eventos corporativos exclusivos. Acomoda até 250 pessoas e oferece uma experiência tropical.', '700.00', 'Aviário', '05.495-466', 668, 250, '2023-05-16 01:56:29', '2023-05-16 01:56:29', 1),
(5, 2, 'Mansão Jardim Encantado', 'Descrição: A Mansão Jardim Encantado é um local deslumbrante com jardins exuberantes, fontes e uma arquitetura clássica. Com salões espaçosos, um pátio ao ar livre e uma sala de baile elegante, é perfeito para casamentos glamorosos, recepções de gala e eventos corporativos requintados. Acomoda até 400 pessoas e oferece um ambiente encantador e romântico.', '1500.00', 'George Américo', '44.055-078', 275, 400, '2023-05-16 01:59:48', '2023-05-16 01:59:48', 1),
(7, 2, 'Avelanida', 'Avelanida oferece um amplo salão principal com uma capacidade flexível, permitindo acomodar desde pequenas reuniões íntimas até grandes celebrações. Seu design elegante e moderno, combinado com uma iluminação cuidadosamente planejada, cria uma atmosfera envolvente e agradável para seus convidados.', '1800.00', 'Terra Nova', '44.085-000', 455, 150, '2023-05-16 15:41:10', '2023-05-16 15:41:10', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens_de_anuncios`
--

CREATE TABLE `imagens_de_anuncios` (
  `id` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `data_upload` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagens_de_anuncios`
--

INSERT INTO `imagens_de_anuncios` (`id`, `id_anuncio`, `path`, `data_upload`) VALUES
(1, 1, './imagens/646309f7ac8bc.jfif', '2023-05-16 01:43:35'),
(2, 1, './imagens/646309f7acef8.jpg', '2023-05-16 01:43:35'),
(3, 1, './imagens/646309f7ad187.jfif', '2023-05-16 01:43:35'),
(4, 2, './imagens/64630b5526a18.jpg', '2023-05-16 01:49:25'),
(5, 2, './imagens/64630b5526c18.jpg', '2023-05-16 01:49:25'),
(6, 2, './imagens/64630b5526dac.jfif', '2023-05-16 01:49:25'),
(10, 4, './imagens/64630cfd57399.jfif', '2023-05-16 01:56:29'),
(11, 4, './imagens/64630cfd575d6.jpg', '2023-05-16 01:56:29'),
(12, 4, './imagens/64630cfd5787d.jfif', '2023-05-16 01:56:29'),
(13, 5, './imagens/64630dc46c875.jfif', '2023-05-16 01:59:48'),
(14, 5, './imagens/64630dc46ca72.jfif', '2023-05-16 01:59:48'),
(15, 5, './imagens/64630dc46cc8d.png', '2023-05-16 01:59:48'),
(17, 7, './imagens/6463ce4637f7f.jfif', '2023-05-16 15:41:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens_de_usuarios`
--

CREATE TABLE `imagens_de_usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `data_upload` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imagens_de_usuarios`
--

INSERT INTO `imagens_de_usuarios` (`id`, `id_usuario`, `path`, `data_upload`) VALUES
(1, 2, './imagens/6462fc88dd02e.png', '2023-05-16 00:46:16'),
(2, 2, './imagens/6463078980efa.png', '2023-05-16 01:33:13'),
(3, 2, './imagens/6463eb2291f0e.png', '2023-05-16 17:44:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `tipo_de_conta` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `tipo_de_conta`) VALUES
(1, 'Kelvin', 'kelvin@gmail.com', '$2y$10$ywk.pjQmkXTzBrL7mqqQy.1NcPOVyb10Dnl6BtBzKfaujmgJHS9oW', '(11) 11111-1111', 'adm'),
(2, 'Joabe', 'joabe@gmail.com', '$2y$10$P4oBBUzcUx8qxiXAQwn79O69cwjPBvGQzVjJoXVbAnWbDDrj4DGV6', '(11) 11111-1111', 'adm'),
(3, 'Eduardo Santos', 'edu@gmail.com', '$2y$10$JIoZZMWqUy0tDgrxw3gmLe9gicUWlLHqkEFV9LO85I2IZz0hLlSHi', '(11) 11111-1111', 'adm'),
(4, 'Maria', 'maria@gmail.com', '$2y$10$3jdGRHYrwLFmm28JF1JiReLwRtc5x1vBk.axgRCZwIuL1CSbrF24K', '(75) 99999-9991', 'usuario');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `imagens_de_anuncios`
--
ALTER TABLE `imagens_de_anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `imagens_de_usuarios`
--
ALTER TABLE `imagens_de_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `imagens_de_anuncios`
--
ALTER TABLE `imagens_de_anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `imagens_de_usuarios`
--
ALTER TABLE `imagens_de_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
