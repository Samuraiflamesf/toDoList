-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Nov-2022 às 10:58
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
-- Banco de dados: `todolist`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id_status`, `nome`) VALUES
(1, 'Normal'),
(2, 'Moderado'),
(3, 'Alto'),
(4, 'Altissimo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `task` varchar(100) NOT NULL,
  `fk_status` int(11) NOT NULL,
  `fk_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `task`
--

INSERT INTO `task` (`id`, `task`, `fk_status`, `fk_tipo`) VALUES
(6, 'Procurar o resto das peças do raspberry - Cabo de Força', 2, 3),
(7, 'PROMOX/OMV6', 2, 3),
(8, 'Catalogar e destribuir arquivos no NAS', 1, 3),
(9, 'Impressora de pulseira zebra', 1, 3),
(10, 'Colocar Chama de senha nas TV', 1, 3),
(11, 'Raspberry nas TV', 3, 3),
(12, 'Servidor NAS', 2, 3),
(13, 'Cama', 1, 6),
(14, 'Armários', 1, 6),
(15, 'Closet', 1, 6),
(16, 'Iluminação', 1, 6),
(17, 'Mesa', 1, 6),
(18, 'Postar Diario de borda de filosofia e sociologia', 1, 4),
(19, 'Sociologia Artigo', 1, 4),
(20, 'Filosofia Atividade em trio', 1, 4),
(21, 'Fun. III - Lista de Atividades', 2, 4),
(22, 'Plano de aula - Avaliacao de apremdizagem', 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nome`) VALUES
(1, 'Cooking Code'),
(2, 'Quarto'),
(3, 'Trabalho'),
(4, 'IFBA'),
(5, 'Cursos'),
(6, 'Móveis');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices para tabela `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkTipo` (`fk_tipo`),
  ADD KEY `fk_status` (`fk_status`);

--
-- Índices para tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`fk_tipo`) REFERENCES `tipo` (`id_tipo`),
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`fk_status`) REFERENCES `status` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
