-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Nov-2023 às 00:55
-- Versão do servidor: 8.0.32
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `dataEstreia` date NOT NULL,
  `genero` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `classificacao` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `duracao` int DEFAULT NULL,
  `elenco` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sinopse` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avaliacao` float DEFAULT NULL,
  `produtora` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paisOrigem` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idioma` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `titulo`, `dataEstreia`, `genero`, `classificacao`, `duracao`, `elenco`, `sinopse`, `avaliacao`, `produtora`, `paisOrigem`, `idioma`) VALUES
(5, 'Teste', '2022-03-03', 'Teste', '14', 2, 'Teste', 'TesteTesteTesteTesteTesteTesteTesteTeste', 3.9, 'Teste', 'Teste', 'Teste'),
(6, 'The Batman', '2022-03-03', 'Drama/Ação', '14', 2, 'Robert Pattinson, Zoë Kravitz, Paul Dano, Colin Farrell, Jeffrey Wright, Andy Serkis', 'Após dois anos espreitando as ruas como Batman, Bruce Wayne se encontra nas profundezas mais sombrias de Gotham City. Com poucos aliados confiáveis, o vigilante solitário se estabelece como a personificação da vingança para a população.', 3.9, 'DC e Warner Bros.', 'Reino Unido', 'Inglês');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

CREATE TABLE `fotos` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `caminho` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tamanho` int NOT NULL,
  `id_anuncio` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `papel` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `telefone`, `status`, `papel`) VALUES
(12, 'Atumalaca', 'atumalaca@gmail.com', '$2y$10$th4o8uCWCZH1MwU19w0BJOvPEdonO8RwpXlyrGxf61RVVEW22My8y', '64875985', 1, 'Comum');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `fotos`
--
ALTER TABLE `fotos`
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
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
