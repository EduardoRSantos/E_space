-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql25-farm10.kinghost.net
-- Tempo de geração: 08/06/2023 às 22:39
-- Versão do servidor: 10.6.11-MariaDB-log
-- Versão do PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `espace`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `anuncios`
--

CREATE TABLE IF NOT EXISTS `anuncios` (
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Fazendo dump de dados para tabela `anuncios`
--

INSERT INTO `anuncios` (`id`, `id_usuario`, `titulo`, `descricao`, `preco`, `localizacao`, `cep`, `numero`, `quantidade_pessoas`, `criado_em`, `atualizado_em`, `autorizacao`) VALUES
(19, 2, 'O SalÃ£o das Estrelas', 'O SalÃ£o das Estrelas Ã© um espaÃ§o para eventos moderno e elegante, perfeito para ocasiÃµes especiais. Com sua decoraÃ§Ã£o sofisticada, iluminaÃ§Ã£o ambiente e pista de danÃ§a espaÃ§osa, o local oferece o cenÃ¡rio ideal para festas animadas e memorÃ¡veis. Com capacidade para atÃ© 150 pessoas, Ã© perfeito para casamentos, aniversÃ¡rios e eventos corporativos.', '800.00', 'Campo Limpo', '44.555-058', 280, 2023, '2023-05-31 02:29:53', '2023-06-08 02:51:41', 1),
(20, 2, 'O PalÃ¡cio dos Sonhos', 'O PalÃ¡cio dos Sonhos Ã© um espaÃ§o para eventos luxuoso e imponente, projetado para cativar seus convidados. Com seus grandes salÃµes ricamente decorados, lustres de cristal e mÃ³veis clÃ¡ssicos, o local proporciona uma atmosfera majestosa para ocasiÃµes especiais. Com capacidade para atÃ© 300 pessoas, Ã© ideal para casamentos elegantes, bailes de gala e eventos de grande porte.', '800.00', 'Sobradinho', '44.800-551', 540, 300, '2023-05-31 03:11:05', '2023-05-31 03:11:05', 1),
(21, 2, 'A Casa dos Encantos ', 'A Casa dos Encantos Ã© um espaÃ§o para eventos charmoso e aconchegante, perfeito para celebraÃ§Ãµes intimistas. Com sua arquitetura rÃºstica e detalhes encantadores, o local transmite uma sensaÃ§Ã£o acolhedora e familiar. Com capacidade para atÃ© 80 pessoas, Ã© ideal para chÃ¡s de bebÃª, festas de noivado e encontros sociais pequenos.', '1500.00', 'Tomba', '44.881-55', 801, 80, '2023-05-31 03:12:17', '2023-05-31 03:12:17', 1),
(22, 2, 'O SalÃ£o das Maravilhas', 'O SalÃ£o das Maravilhas Ã© um espaÃ§o para eventos versÃ¡til e contemporÃ¢neo, projetado para se adaptar a diferentes estilos de celebraÃ§Ã£o. Com sua decoraÃ§Ã£o minimalista e ambiente moderno, o local oferece um cenÃ¡rio elegante e sofisticado para casamentos, aniversÃ¡rios e eventos corporativos. Com capacidade para atÃ© 200 pessoas, Ã© ideal para eventos de mÃ©dio porte.', '350.00', 'Cidade Nova', '44.088-088', 150, 200, '2023-05-31 03:13:22', '2023-05-31 03:13:22', 1),
(23, 2, 'A MansÃ£o dos Sonhos', ' Ã© um espaÃ§o para eventos exclusivo e requintado, situado em um cenÃ¡rio deslumbrante. Com seus jardins paisagÃ­sticos, piscina de borda infinita e terraÃ§o com vista panorÃ¢mica, o local oferece um ambiente Ãºnico para casamentos, festas de aniversÃ¡rio e eventos de luxo. Com capacidade para atÃ© 250 pessoas, Ã© perfeito para aqueles que buscam uma experiÃªncia excepcional.', '650.00', 'Vila Nova', '55.055-05', 404, 250, '2023-05-31 03:14:24', '2023-05-31 03:14:24', 1),
(24, 2, 'O SalÃ£o das Flores', 'O SalÃ£o das Flores Ã© um espaÃ§o para eventos romÃ¢ntico e encantador, cercado por um jardim exuberante e perfumado. Com sua decoraÃ§Ã£o floral e ambiente sereno, o local transmite uma atmosfera delicada e serena. Com capacidade para atÃ© 100 pessoas, Ã© perfeito para casamentos ao ar livre, batizados e eventos Ã­ntimos em meio Ã  natureza.', '400.00', 'Cidade Nova', '44.033-087', 350, 2023, '2023-05-31 03:15:41', '2023-06-08 02:44:08', 1),
(26, 2, 'Street Space', 'O SalÃ£o das Estrelas Ã© um espaÃ§o para eventos moderno e elegante, perfeito para ocasiÃµes especiais. Com sua decoraÃ§Ã£o sofisticada, iluminaÃ§Ã£o ambiente e pista de danÃ§a espaÃ§osa, o local oferece o cenÃ¡rio ideal para festas animadas e memorÃ¡veis. Com capacidade para atÃ© 150 pessoas, Ã© perfeito para casamentos, aniversÃ¡rios e eventos corporativos.', '350.00', 'Terra Nova', '44.033-087', 245, 150, '2023-06-06 02:48:08', '2023-06-06 02:48:08', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens_de_anuncios`
--

CREATE TABLE IF NOT EXISTS `imagens_de_anuncios` (
  `id` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `data_upload` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Fazendo dump de dados para tabela `imagens_de_anuncios`
--

INSERT INTO `imagens_de_anuncios` (`id`, `id_anuncio`, `path`, `data_upload`) VALUES
(49, 19, './imagens/6476db518b465.jfif', '2023-05-31 02:29:53'),
(50, 19, './imagens/6476db518b68e.jfif', '2023-05-31 02:29:53'),
(51, 19, './imagens/6476db518b7ef.jfif', '2023-05-31 02:29:53'),
(52, 20, './imagens/6476e4f9b5586.jpg', '2023-05-31 03:11:05'),
(53, 20, './imagens/6476e4f9b578a.jpg', '2023-05-31 03:11:05'),
(54, 20, './imagens/6476e4f9b594e.jpg', '2023-05-31 03:11:05'),
(55, 21, './imagens/6476e5410659b.jfif', '2023-05-31 03:12:17'),
(56, 21, './imagens/6476e541067ab.jpg', '2023-05-31 03:12:17'),
(57, 21, './imagens/6476e5410691f.jpg', '2023-05-31 03:12:17'),
(58, 22, './imagens/6476e58257e0e.jfif', '2023-05-31 03:13:22'),
(59, 22, './imagens/6476e582581c4.jpg', '2023-05-31 03:13:22'),
(60, 22, './imagens/6476e5825ac47.jfif', '2023-05-31 03:13:22'),
(61, 23, './imagens/6476e5c09c8b0.png', '2023-05-31 03:14:24'),
(62, 23, './imagens/6476e5c09caf1.jfif', '2023-05-31 03:14:24'),
(63, 23, './imagens/6476e5c09cd4f.jfif', '2023-05-31 03:14:24'),
(64, 23, './imagens/6476e5c09cfd1.jfif', '2023-05-31 03:14:24'),
(65, 24, './imagens/6476e60d19dd3.jfif', '2023-05-31 03:15:41'),
(66, 24, './imagens/6476e60d19fde.jfif', '2023-05-31 03:15:41'),
(67, 24, './imagens/6476e60d1c9d7.jfif', '2023-05-31 03:15:41'),
(69, 26, './imagens/647ec89830689.jpg', '2023-06-06 02:48:08'),
(70, 26, './imagens/647ec89830f36.jpg', '2023-06-06 02:48:08'),
(71, 26, './imagens/647ec898311af.jpg', '2023-06-06 02:48:08');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens_de_usuarios`
--

CREATE TABLE IF NOT EXISTS `imagens_de_usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `data_upload` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Fazendo dump de dados para tabela `imagens_de_usuarios`
--

INSERT INTO `imagens_de_usuarios` (`id`, `id_usuario`, `path`, `data_upload`) VALUES
(5, 2, './imagens/6470217b238df.png', '2023-05-26 00:03:23'),
(6, 3, './imagens/64711b3046280.jpeg', '2023-05-26 17:48:48'),
(7, 3, './imagens/64726f72a2943.jpg', '2023-05-27 18:00:34'),
(8, 2, './imagens/647794b31081c.png', '2023-05-31 15:40:51'),
(9, 2, './imagens/64795ba9e5562.png', '2023-06-02 00:02:02'),
(10, 2, './imagens/64796b08d6603.png', '2023-06-02 01:07:37'),
(11, 2, './imagens/647ab4c7d856e.jfif', '2023-06-03 00:34:32'),
(12, 2, './imagens/647ab4db7027c.png', '2023-06-03 00:34:51'),
(13, 2, './imagens/647ab56b08b71.png', '2023-06-03 00:37:15'),
(14, 2, './imagens/647ab5a1131ed.png', '2023-06-03 00:38:09'),
(15, 2, './imagens/647ab5f2be3f3.png', '2023-06-03 00:39:30'),
(16, 2, './imagens/647ab639a8d16.png', '2023-06-03 00:40:41'),
(17, 9, './imagens/648131642fc18.png', '2023-06-07 22:39:48'),
(18, 2, './imagens/64814a31e89a8.png', '2023-06-08 00:25:38'),
(19, 2, './imagens/64814a3c4acdf.png', '2023-06-08 00:25:48'),
(20, 2, './imagens/64814b1e39723.png', '2023-06-08 00:29:34'),
(21, 2, './imagens/64814bb154923.png', '2023-06-08 00:32:01'),
(22, 2, './imagens/64815ed94f708.png', '2023-06-08 01:53:45'),
(23, 2, './imagens/64815ee8e8b3c.png', '2023-06-08 01:54:01');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `tipo_de_conta` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `tipo_de_conta`) VALUES
(1, 'Kelvin', 'kelvin@gmail.com', '$2y$10$ywk.pjQmkXTzBrL7mqqQy.1NcPOVyb10Dnl6BtBzKfaujmgJHS9oW', '(11) 11111-1111', 'adm'),
(2, 'Joabe Fonseca do Nascimento', 'joabe@gmail.com', '$2y$10$P4oBBUzcUx8qxiXAQwn79O69cwjPBvGQzVjJoXVbAnWbDDrj4DGV6', '(75) 99101-6263', 'adm'),
(3, 'Eduardo Santos', 'edu@gmail.com', '$2y$10$JIoZZMWqUy0tDgrxw3gmLe9gicUWlLHqkEFV9LO85I2IZz0hLlSHi', '(99) 99999-9999', 'adm'),
(4, 'Maria', 'maria@gmail.com', '$2y$10$3jdGRHYrwLFmm28JF1JiReLwRtc5x1vBk.axgRCZwIuL1CSbrF24K', '(75) 99999-9991', 'usuario'),
(5, 'joabe fonseca do nascimento', 'joabe14ff@gmail.com', '$2y$10$pZgCOgfCRl.Mx/edbwK1Me8zc6b8HfQeGZ23pD1Z0fWjTzROr8C0.', '(75) 99101-5895', 'usuario'),
(6, 'Joabe Fonseca do Nascimento', 'joabeteste1@gmail.com', '$2y$10$Mxuic8utKW/n5rsuaWMF3OMNvcKN3zgavjt7LA24qmmgduLQkkdFS', '(75) 99101-6263', 'usuario'),
(7, 'joabe fonseca do nascimento', 'joabe1s4@gmail.com', '$2y$10$DIWgjl6AU8ExH.MlEzhyvOMfRlm4iguUB4Yi5FxrsikVzCQUcySIi', '(75) 99101-0526', 'usuario'),
(8, 'joabe', 'senai@gmail.com', '$2y$10$ssNEfRHoLPGQ9ULvfJcIQe0jVJu2G4OifneYSJvb931F2siIRjLPa', '(75) 99191-0263', 'usuario'),
(9, 'Teste', 'teste@gmail.com', '$2y$10$Slhu9o/y1M5BcBY6NZgiJuRnuo4YvffjL5N8CLqlvh3FAlaplz60q', '(75) 99105-2525', 'usuario');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `imagens_de_anuncios`
--
ALTER TABLE `imagens_de_anuncios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `imagens_de_usuarios`
--
ALTER TABLE `imagens_de_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `anuncios`
--
ALTER TABLE `anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de tabela `imagens_de_anuncios`
--
ALTER TABLE `imagens_de_anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT de tabela `imagens_de_usuarios`
--
ALTER TABLE `imagens_de_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
