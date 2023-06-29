-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql25-farm10.kinghost.net
-- Tempo de geração: 29/06/2023 às 13:15
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Fazendo dump de dados para tabela `anuncios`
--

INSERT INTO `anuncios` (`id`, `id_usuario`, `titulo`, `descricao`, `preco`, `localizacao`, `cep`, `numero`, `quantidade_pessoas`, `criado_em`, `atualizado_em`, `autorizacao`) VALUES
(19, 2, 'O SalÃ£o das Estrelas', 'O SalÃ£o das Estrelas Ã© um espaÃ§o para eventos moderno e elegante, perfeito para ocasiÃµes especiais. Com sua decoraÃ§Ã£o sofisticada, iluminaÃ§Ã£o ambiente e pista de danÃ§a espaÃ§osa, o local oferece o cenÃ¡rio ideal para festas animadas e memorÃ¡veis. Com capacidade para atÃ© 150 pessoas, Ã© perfeito para casamentos, aniversÃ¡rios e eventos corporativos.', '2200.00', 'Campo Limpo', '44.555-052', 450, 130, '2023-05-31 02:29:53', '2023-06-29 02:22:53', 1),
(20, 2, 'O PalÃ¡cio dos Sonhos', 'O PalÃ¡cio dos Sonhos Ã© um espaÃ§o para eventos luxuoso e imponente, projetado para cativar seus convidados. Com seus grandes salÃµes ricamente decorados, lustres de cristal e mÃ³veis clÃ¡ssicos, o local proporciona uma atmosfera majestosa para ocasiÃµes especiais. Com capacidade para atÃ© 300 pessoas, Ã© ideal para casamentos elegantes, bailes de gala e eventos de grande porte.', '800.00', 'Sobradinho', '44.800-551', 540, 350, '2023-05-31 03:11:05', '2023-06-24 01:33:16', 1),
(21, 2, 'A Casa dos Encantos ', 'A Casa dos Encantos Ã© um espaÃ§o para eventos charmoso e aconchegante, perfeito para celebraÃ§Ãµes intimistas. Com sua arquitetura rÃºstica e detalhes encantadores, o local transmite uma sensaÃ§Ã£o acolhedora e familiar. Com capacidade para atÃ© 80 pessoas, Ã© ideal para chÃ¡s de bebÃª, festas de noivado e encontros sociais pequenos.', '1500.00', 'Tomba', '44.881-55', 801, 80, '2023-05-31 03:12:17', '2023-05-31 03:12:17', 1),
(22, 2, 'O SalÃ£o das Maravilhas', 'O SalÃ£o das Maravilhas Ã© um espaÃ§o para eventos versÃ¡til e contemporÃ¢neo, projetado para se adaptar a diferentes estilos de celebraÃ§Ã£o. Com sua decoraÃ§Ã£o minimalista e ambiente moderno, o local oferece um cenÃ¡rio elegante e sofisticado para casamentos, aniversÃ¡rios e eventos corporativos. Com capacidade para atÃ© 200 pessoas, Ã© ideal para eventos de mÃ©dio porte.', '350.00', 'Cidade Nova', '44.088-088', 150, 200, '2023-05-31 03:13:22', '2023-05-31 03:13:22', 1),
(23, 2, 'A MansÃ£o dos Sonhos', ' Ã© um espaÃ§o para eventos exclusivo e requintado, situado em um cenÃ¡rio deslumbrante. Com seus jardins paisagÃ­sticos, piscina de borda infinita e terraÃ§o com vista panorÃ¢mica, o local oferece um ambiente Ãºnico para casamentos, festas de aniversÃ¡rio e eventos de luxo. Com capacidade para atÃ© 250 pessoas, Ã© perfeito para aqueles que buscam uma experiÃªncia excepcional.', '650.00', 'Vila Nova', '55.055-05', 404, 250, '2023-05-31 03:14:24', '2023-05-31 03:14:24', 1),
(37, 23, 'SalÃ£o Primavera', 'O SalÃ£o Primavera Ã© o local perfeito para realizar seu evento dos sonhos. Com uma decoraÃ§Ã£o elegante e ambiente espaÃ§oso, oferecemos uma experiÃªncia Ãºnica para casamentos, festas de formatura e eventos corporativos.', '3500.00', 'Campo Limpo', '44.055-087', 150, 250, '2023-06-29 02:57:24', '2023-06-29 03:00:43', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens_de_anuncios`
--

CREATE TABLE IF NOT EXISTS `imagens_de_anuncios` (
  `id` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `data_upload` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

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
(93, 37, './imagens/649d1d44165db.jpg', '2023-06-29 02:57:24'),
(94, 37, './imagens/649d1d4416888.jpg', '2023-06-29 02:57:24'),
(95, 37, './imagens/649d1d4416b4e.jpg', '2023-06-29 02:57:24'),
(96, 37, './imagens/649d1d4416d9b.jpg', '2023-06-29 02:57:24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens_de_usuarios`
--

CREATE TABLE IF NOT EXISTS `imagens_de_usuarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `data_upload` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

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
(23, 2, './imagens/64815ee8e8b3c.png', '2023-06-08 01:54:01'),
(24, 10, './imagens/649288b16a39c.png', '2023-06-21 02:20:49'),
(25, 11, './imagens/6493aa904ede9.png', '2023-06-21 22:57:36'),
(26, 11, './imagens/6493b173453a2.png', '2023-06-21 23:26:59'),
(27, 13, './imagens/6496990e3cd98.png', '2023-06-24 04:19:42'),
(28, 13, './imagens/64969a64c2758.png', '2023-06-24 04:25:24'),
(29, 14, './imagens/64979e703380b.jfif', '2023-06-24 22:54:56'),
(30, 2, './imagens/649a5fbb83723.png', '2023-06-27 01:04:11'),
(31, 2, './imagens/649a61d2d7bb5.png', '2023-06-27 01:13:07'),
(32, 18, './imagens/649a3937d01ba.jpg', '2023-06-26 22:19:51'),
(33, 20, './imagens/649babe43488e.png', '2023-06-28 00:41:24'),
(34, 22, './imagens/649cda87712c5.jpg', '2023-06-28 22:12:39'),
(35, 23, './imagens/649d1c6ef10ec.jpg', '2023-06-29 02:53:51');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `tipo_de_conta`) VALUES
(1, 'Kelvin', 'kelvin@gmail.com', '$2y$10$ywk.pjQmkXTzBrL7mqqQy.1NcPOVyb10Dnl6BtBzKfaujmgJHS9oW', '(11) 11111-1111', 'adm'),
(2, 'Joabe Fonseca do Nascimento', 'joabe@gmail.com', '$2y$10$P4oBBUzcUx8qxiXAQwn79O69cwjPBvGQzVjJoXVbAnWbDDrj4DGV6', '(75) 99101-6263', 'adm'),
(3, 'Eduardo', 'edu@gmail.com', '$2y$10$JIoZZMWqUy0tDgrxw3gmLe9gicUWlLHqkEFV9LO85I2IZz0hLlSHi', '(75) 99999-9999', 'adm'),
(4, 'Maria', 'maria@gmail.com', '$2y$10$3jdGRHYrwLFmm28JF1JiReLwRtc5x1vBk.axgRCZwIuL1CSbrF24K', '(75) 99999-9991', 'usuario'),
(5, 'joabe fonseca do nascimento', 'joabe14ff@gmail.com', '$2y$10$pZgCOgfCRl.Mx/edbwK1Me8zc6b8HfQeGZ23pD1Z0fWjTzROr8C0.', '(75) 99101-5895', 'usuario'),
(6, 'Joabe Fonseca do Nascimento', 'joabeteste1@gmail.com', '$2y$10$Mxuic8utKW/n5rsuaWMF3OMNvcKN3zgavjt7LA24qmmgduLQkkdFS', '(75) 99101-6263', 'usuario'),
(7, 'joabe fonseca do nascimento', 'joabe1s4@gmail.com', '$2y$10$DIWgjl6AU8ExH.MlEzhyvOMfRlm4iguUB4Yi5FxrsikVzCQUcySIi', '(75) 99101-0526', 'usuario'),
(8, 'joabe', 'senai@gmail.com', '$2y$10$ssNEfRHoLPGQ9ULvfJcIQe0jVJu2G4OifneYSJvb931F2siIRjLPa', '(75) 99191-0263', 'usuario'),
(9, 'Teste', 'teste@gmail.com', '$2y$10$Slhu9o/y1M5BcBY6NZgiJuRnuo4YvffjL5N8CLqlvh3FAlaplz60q', '(75) 99105-2525', 'usuario'),
(10, 'Rockeatseat', 'rockeatseat@gmail.com', '$2y$10$dMZ2SNJpw7RnINltg/5Ly.51LUlFHZN83TgfZ4jN.VAa2dedjwClW', '(75) 99101-6545', 'usuario'),
(11, 'joabedd', 'joddddabe@gmail.com', '$2y$10$NJox1DQYv8o.7hOlBtVr/eeKo4Ak.NUVQoMUgUN2nxC7Ol1VEiU/2', '(75) 99151-5555', 'usuario'),
(12, 'Senai', 'senai1@gmail.com', '$2y$10$GXHj2VFyvXch8E0iPzskrOpUgNSXd93dYX/rZyjPeS51ooSMxRDE.', '(75) 99456-6556', 'usuario'),
(13, 'Senai Feira', 'senai15@gmail.com', '$2y$10$fwjhM2f9SqSU4ppMGxT2deztseDuYWNzf8UmO3ddtVHkIe2qgje3y', '(75) 91154-5488', 'usuario'),
(14, 'Lupita Amondi Nyong''o', 'lupita@gmail.com', '$2y$10$MZjjHP2nowIm.UPyu8gG8OM5PaSdkF5Fw3qnjwdiuQO3iDJtvn476', '(75) 99125-5212', 'usuario'),
(15, 'joabe fonseca do nascimento', 'joabe12@gmail.com', '$2y$10$ayvfT2UkuIu0N2FyqPB7BONI0Gz0WnDEkHRULtyw2PO4ciXEtmlgm', '(75) 99101-6263', 'usuario'),
(16, 'ddddddddddddddddd', 'joabe1ff4@gmail.com', '$2y$10$/rESr5TBsPikW6SOPWvwEumRAC6dNLcMHyBFFmOCXRk60lJwKYh6i', '', 'usuario'),
(17, 'joabe fonseca do nascimento', 'espace15@gmail.com', '$2y$10$PI/OiKwN3Sok0g2GWIG/4O9SeGYln1wROcBTEXQFK1DUmlmSKISZi', '(75) 99006-6808', 'usuario'),
(18, 'kelvin morais', 'kelvin@morais', '$2y$10$7Uclrp0P9RblhBp2iuUB8.spgVdbUXEVJq8IO0SMyXojLKoX6tduS', '(75) 95578-9666', 'usuario'),
(19, 'Paula Mendes', 'paulamendes@gmail.com', '$2y$10$dAP37/TGs8Dk3y4G.1VZ0O7H.zM4zvnalLDDdJ6xioZsgazGQE5xO', '(75) 99155-5448', 'usuario'),
(20, 'joabe fonseca do nascimento', 'joabe151@gmail.com', '$2y$10$0lh/rqcBzmzj46lxvoaiSuQeM2XPXbyNyqAiIomPz29lX8P.NAfVK', '(75) 99101-6263', 'usuario'),
(21, 'joabe fonseca do nascimento', 'joab55e@gmail.com', '$2y$10$bCVgpYDShzgnSQIHM7mJGOGek9y6/wz255.0qZ7OrYgIQlNme3wHm', '(75) 98176-3513', 'usuario'),
(22, 'Marcos Silva', 'marcossilva@gmail.com', '$2y$10$hOqQh88an/.M2sfODwZ41.VsfTupymaSzZylXzKAQgd9JgqTk2jwy', '(71) 99101-6263', 'usuario'),
(23, 'Fabiana Lima Silva', 'fabiana@gmail.com', '$2y$10$ehcCnAEbHTQ4WHUHc0mkZumkPIVr8UriYac5GJ7kfmHn27QlTaNQ2', '(75) 98128-7230', 'usuario');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de tabela `imagens_de_anuncios`
--
ALTER TABLE `imagens_de_anuncios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT de tabela `imagens_de_usuarios`
--
ALTER TABLE `imagens_de_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
