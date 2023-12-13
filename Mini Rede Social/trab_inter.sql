-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Dez-2023 às 14:18
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `trab_inter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentariospostagem`
--

CREATE TABLE `comentariospostagem` (
  `idComentario` int(11) NOT NULL,
  `id_postagem` int(11) NOT NULL,
  `textoComentario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comentariospostagem`
--

INSERT INTO `comentariospostagem` (`idComentario`, `id_postagem`, `textoComentario`) VALUES
(34, 1, 'usuario1-->Olá, eu sou o usuário 1 e eu fiz mais um comentário'),
(35, 20, 'usuario3-->Comentário'),
(36, 16, 'usuario3-->Coment´');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `idPerf` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idPerf`, `userName`, `senha`) VALUES
(1, 'usuario1', 'b59c67bf196a4758191e42f76670ceba'),
(2, 'usuario2', '934b535800b1cba8f96a5d72f72f1611'),
(3, 'usuario3', '2be9bd7a3434f7038ca27d1918de58bd'),
(4, 'Empresa1', 'b59c67bf196a4758191e42f76670ceba'),
(5, 'Empresa2', '934b535800b1cba8f96a5d72f72f1611'),
(6, 'Empresa3', '2be9bd7a3434f7038ca27d1918de58bd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoal`
--

CREATE TABLE `pessoal` (
  `idPerfPfk` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `aniversario` varchar(12) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoal`
--

INSERT INTO `pessoal` (`idPerfPfk`, `nome`, `aniversario`, `descricao`) VALUES
(1, 'Usuario numero 1', '11/11', 'Olá, eu sou o usuário número 1!'),
(2, 'Usuario numero 2', '22/12', 'Olá, eu sou o usuário número 2!!'),
(3, 'Usuario numero 3', '23/03', 'Olá, eu sou o usuário número 3!!!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `id_postagem` int(11) NOT NULL,
  `conteudo` varchar(1000) NOT NULL,
  `curtidas` int(11) NOT NULL,
  `idPerfFk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id_postagem`, `conteudo`, `curtidas`, `idPerfFk`) VALUES
(1, 'Olá, eu sou o usuário 1 e realizei uma postagem', 2, 1),
(4, 'Eu fiz uma postagem (:', 1, 1),
(5, 'Eu sou uma postagem de teste (:', 5, 2),
(6, 'Eu sou uma postagem de teste (:', 7, 2),
(7, 'Eu sou uma postagem de teste (:', 21, 2),
(8, 'Eu sou uma postagem de teste (:', 11, 2),
(9, 'Eu sou uma postagem de teste (:', 5, 2),
(10, 'Eu sou uma postagem de teste (:', 7, 2),
(11, 'Eu sou uma postagem de teste (:', 21, 2),
(12, 'Eu sou uma postagem de teste (:', 11, 2),
(13, 'Eu sou uma postagem de teste (:', 2, 6),
(14, 'Eu sou uma postagem de teste (:', 3, 6),
(16, 'Eu sou uma postagem de teste (:', 3, 6),
(19, 'Post pra pesquisa - uhuuuuuu', 6, 3),
(20, 'Postaggem pra pesquisa - leão', 0, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissional`
--

CREATE TABLE `profissional` (
  `idPerfPfk` int(11) NOT NULL,
  `nomeFantasia` varchar(255) NOT NULL,
  `dataCriacao` varchar(12) NOT NULL,
  `contato` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `profissional`
--

INSERT INTO `profissional` (`idPerfPfk`, `nomeFantasia`, `dataCriacao`, `contato`) VALUES
(4, 'Empresa número 1', '01/01/2001', 'empresa1@email.com'),
(5, 'Empresa número 2', '02/02/2002', 'empresa2@gmail.com'),
(6, 'Empresa número 3', '03/03/2003', 'empresa3@email.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentariospostagem`
--
ALTER TABLE `comentariospostagem`
  ADD PRIMARY KEY (`idComentario`),
  ADD KEY `id_postagem` (`id_postagem`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerf`);

--
-- Índices para tabela `pessoal`
--
ALTER TABLE `pessoal`
  ADD PRIMARY KEY (`idPerfPfk`);

--
-- Índices para tabela `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id_postagem`),
  ADD KEY `idPerfFk` (`idPerfFk`);

--
-- Índices para tabela `profissional`
--
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`idPerfPfk`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentariospostagem`
--
ALTER TABLE `comentariospostagem`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id_postagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `comentariospostagem`
--
ALTER TABLE `comentariospostagem`
  ADD CONSTRAINT `comentariospostagem_ibfk_1` FOREIGN KEY (`id_postagem`) REFERENCES `postagem` (`id_postagem`);

--
-- Limitadores para a tabela `pessoal`
--
ALTER TABLE `pessoal`
  ADD CONSTRAINT `pessoal_ibfk_1` FOREIGN KEY (`idPerfPfk`) REFERENCES `perfil` (`idPerf`);

--
-- Limitadores para a tabela `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `postagem_ibfk_1` FOREIGN KEY (`idPerfFk`) REFERENCES `perfil` (`idPerf`);

--
-- Limitadores para a tabela `profissional`
--
ALTER TABLE `profissional`
  ADD CONSTRAINT `profissional_ibfk_1` FOREIGN KEY (`idPerfPfk`) REFERENCES `perfil` (`idPerf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
