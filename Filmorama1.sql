-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/11/2023 às 07:09
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `filmorama`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `dataEstreia` date NOT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `classificacao` varchar(10) DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL,
  `elenco` varchar(255) DEFAULT NULL,
  `sinopse` varchar(255) DEFAULT NULL,
  `avaliacao` float DEFAULT NULL,
  `produtora` varchar(255) DEFAULT NULL,
  `paisOrigem` varchar(50) DEFAULT NULL,
  `idioma` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `dataEstreia`, `genero`, `classificacao`, `duracao`, `elenco`, `sinopse`, `avaliacao`, `produtora`, `paisOrigem`, `idioma`) VALUES
(4, 'The Batman', '2022-03-03', 'Drama/Ação', '14 anos', 2, 'Robert Pattinson, Zoë Kravitz, Paul Dano, Colin Farrell, Jeffrey Wright, Andy Serkis', 'Após dois anos espreitando as ruas como Batman, Bruce Wayne se encontra nas profundezas mais sombrias de Gotham City. Com poucos aliados confiáveis, o vigilante solitário se estabelece como a personificação da vingança para a população.', 3.9, 'DC e Warner Bros.', 'Reino Unido', 'Inglês');

-- --------------------------------------------------------

--
-- Estrutura para tabela `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `tamanho` int(11) NOT NULL,
  `id_anuncio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `status`) VALUES
(3, 'Carlos', 'caca@gmail.com', '$2y$10$6xK/0U1Jaas2RLvfObtLOO0X1kyMMaCOTeEvG2y/eKSjX1jvX/432', '123456', 1),
(4, 'Paulo', 'papa@gmail.com', '$2y$10$en.qOtrEQ4Uy9HAa.XpYgejB7X1FWNF2GsPyM3wHIpZhMPXJ9l8rW', '45764', 1),
(5, 'Flora', 'floraoliveirafranca@gmail.com', '$2y$10$X6W/jjkfwn799txW6Mchpe90Jn7cY3R9riIKiUJEtIKpbjoHEbgn6', '(68) 98205-4704', 1),
(6, 'Atumalaca', 'atumalaca@gmail.com', '$2y$10$BFJ1PyXu.LNDhV4a3O5xgOOknYQxEmTu0rT.iKiv0HFzDgdwO7TC.', '(68) 98105-2583', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_anuncio` (`id_anuncio`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;