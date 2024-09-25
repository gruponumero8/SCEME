-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Ago-2024 às 19:47
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
create database `sceme`;
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `IdFornecedor` int(11) NOT NULL,
  `FornecedorNome` varchar(50) NOT NULL,
  `Contacto` varchar(50) NOT NULL,
  `Endereco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `material`
--

CREATE TABLE `material` (
  `IdMaterial` int(11) NOT NULL,
  `MaterialNome` varchar(50) NOT NULL,
  `QtdMaterial` int(11) NOT NULL,
  `fkIdFornecedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacaoestoque`
--

CREATE TABLE `movimentacaoestoque` (
  `IdMovimentacao` int(11) NOT NULL,
  `Tipo` varchar(50) NOT NULL,
  `QtdMovimentacao` int(11) NOT NULL,
  `DataMovimentacao` date NOT NULL,
  `fkIdUsuario` int(11) NOT NULL,
  `fkIdMaterial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------



-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `UsuarioNome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Senha` varchar(50) NOT NULL,
  `Permissao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`IdFornecedor`);

--
-- Índices para tabela `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`IdMaterial`),
  ADD KEY `fkIdFornecedor` (`fkIdFornecedor`);

--
-- Índices para tabela `movimentacaoestoque`
--
ALTER TABLE `movimentacaoestoque`
  ADD PRIMARY KEY (`IdMovimentacao`),
  ADD KEY `fkIdUsuario` (`fkIdUsuario`),
  ADD KEY `fkIdMaterial` (`fkIdMaterial`);



--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `IdFornecedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `material`
--
ALTER TABLE `material`
  MODIFY `IdMaterial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `movimentacaoestoque`
--
ALTER TABLE `movimentacaoestoque`
  MODIFY `IdMovimentacao` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`fkIdFornecedor`) REFERENCES `fornecedor` (`IdFornecedor`);

--
-- Limitadores para a tabela `movimentacaoestoque`
--
ALTER TABLE `movimentacaoestoque`
  ADD CONSTRAINT `movimentacaoestoque_ibfk_1` FOREIGN KEY (`fkIdUsuario`) REFERENCES `usuario` (`IdUsuario`),
  ADD CONSTRAINT `movimentacaoestoque_ibfk_2` FOREIGN KEY (`fkIdMaterial`) REFERENCES `material` (`IdMaterial`);



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
