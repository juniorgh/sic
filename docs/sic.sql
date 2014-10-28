-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Out-2014 às 15:15
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE IF NOT EXISTS `arquivo` (
`arquivoId` int(11) NOT NULL,
  `arquivoPostagemId` int(11) NOT NULL,
  `arquivoCaminho` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
`comentarioId` int(11) NOT NULL,
  `comentarioUsuarioId` int(11) NOT NULL,
  `comentarioPostagemId` int(11) NOT NULL,
  `comentarioDesc` varchar(600) NOT NULL,
  `comentarioStatus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
`cursoId` int(11) NOT NULL,
  `cursoNome` varchar(255) NOT NULL,
  `cursoBanner` varchar(700) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`cursoId`, `cursoNome`, `cursoBanner`) VALUES
(2, 'Ciências Biologicas- Licenciatura', ''),
(3, 'Biomedicina - Bacharelado', ''),
(4, 'Ciência da Computação - Bacharelado', ''),
(5, 'Ciências Contábeis - Bacharelado', ''),
(6, 'Design de Moda - Bacharelado', ''),
(7, 'Direito - Bacharelado', ''),
(8, 'Educação Física - Bacharelado', ''),
(9, 'Educação Física - Licenciatura', ''),
(10, 'Enfermagem - Bacharelado', ''),
(11, 'Engenharia de Produção- Bacharelado', ''),
(12, 'Engenharia Civil- Bacharelado', ''),
(13, 'Engenharia Ambiental- Bacharelado', ''),
(14, 'Engenharia Elétrica- Bacharelado', ''),
(15, 'Engenharia Mecânica- Bacharelado', ''),
(16, 'Engenharia de Controle e automação- Bacharelado', ''),
(17, 'Farmácia - Bacharelado', ''),
(18, 'Filosofia - Licenciatura', ''),
(19, 'Física - Licenciatura', ''),
(20, 'Fisioterapia - Bacharelado', ''),
(21, 'Geografia - Licenciatura', ''),
(22, 'História - Licenciatura', ''),
(23, 'Letras - Português/Inglês - Licenciatura', ''),
(24, 'Matemática - Licenciatura', ''),
(25, 'Nutrição - Bacharelado', ''),
(26, 'Pedagogia - Licenciatura', ''),
(27, 'Psicologia - Bacharelado', ''),
(28, 'Secretariado Executivo', ''),
(29, 'Publicidade e Propaganda', ''),
(30, 'Análise e Desenvolvimento de Sistemas', ''),
(31, 'Design de Interiores', ''),
(32, 'Estética e Cosmética', ''),
(33, 'Gestão de Recursos Humanos', ''),
(34, 'Gestão Financeira', ''),
(35, 'Gestão Ambiental', ''),
(36, 'Gestão de Empresas de Serviços', ''),
(37, 'Gestão Hospitalar', ''),
(38, 'Logística', ''),
(39, 'Marketing', ''),
(40, 'Segurança no Trabalho', ''),
(41, 'Administracao - Bacharelado', '1413892668.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtir`
--

CREATE TABLE IF NOT EXISTS `curtir` (
`curtirId` int(11) NOT NULL,
  `curtirUsuarioId` int(11) NOT NULL,
  `curtirPostagemId` int(11) NOT NULL,
  `curtirStatus` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe`
--

CREATE TABLE IF NOT EXISTS `equipe` (
`equipeId` int(11) NOT NULL,
  `equipeNome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
`grupoId` int(11) NOT NULL,
  `grupoNome` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`grupoId`, `grupoNome`) VALUES
(3, 'Aluno'),
(5, 'Coordenadores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`menuId` int(11) NOT NULL,
  `menuTitulo` varchar(255) DEFAULT NULL,
  `menuController` varchar(255) DEFAULT NULL,
  `menuAction` varchar(255) DEFAULT NULL,
  `menuIcone` varchar(255) DEFAULT NULL,
  `menuSuperior` varchar(255) DEFAULT NULL,
  `menuOrdem` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`menuId`, `menuTitulo`, `menuController`, `menuAction`, `menuIcone`, `menuSuperior`, `menuOrdem`) VALUES
(7, 'InÃ­cio', 'index', 'index', 'fa fa-home', '0', 1),
(8, 'Cursos', 'curso', 'index', 'fa fa-graduation-cap', '0', 2),
(9, 'UsuÃ¡rios', 'usuario', 'index', 'fa fa-user', '0', 3),
(10, 'Grupos', 'grupo', 'index', 'fa fa-users', '0', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE IF NOT EXISTS `postagem` (
`postagemId` int(11) NOT NULL,
  `postagemAutorUsuarioId` int(11) NOT NULL,
  `postagemTitulo` varchar(255) NOT NULL,
  `postagemData` date NOT NULL,
  `postagemDescricao` longtext NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`postagemId`, `postagemAutorUsuarioId`, `postagemTitulo`, `postagemData`, `postagemDescricao`) VALUES
(1, 1, 'titulo', '2014-05-05', 'Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ '),
(2, 2, 'titulo2', '2014-05-05', 'ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa '),
(3, 3, 'Isso e um teste', '0000-00-00', 'ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa '),
(4, 4, 'Outro Teste', '0000-00-00', 'ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`usuarioId` int(11) NOT NULL,
  `usuarioCursoId` int(11) NOT NULL,
  `usuarioNome` varchar(255) NOT NULL,
  `usuarioEmail` varchar(255) NOT NULL,
  `usuarioFone` varchar(45) DEFAULT NULL,
  `usuarioSenha` varchar(40) NOT NULL,
  `usuarioLogin` varchar(40) NOT NULL,
  `usuarioPeriodo` varchar(10) NOT NULL,
  `usuarioStatus` tinyint(1) DEFAULT '1',
  `usuarioFotoCaminho` varchar(600) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuarioId`, `usuarioCursoId`, `usuarioNome`, `usuarioEmail`, `usuarioFone`, `usuarioSenha`, `usuarioLogin`, `usuarioPeriodo`, `usuarioStatus`, `usuarioFotoCaminho`) VALUES
(1, 17, 'Gilson', 'jr_juk@hotmail.com', '882500jr_', '078f40fa23e0672777adc7c05d4773dd', 'super', '7', 1, '1413989741.jpg'),
(8, 2, 'Gonçalves', 'juninho8579@gmail.com', '88250055', '078f40fa23e0672777adc7c05d4773dd', 'tester', '9', 1, NULL),
(9, 2, 'junior', 'teste1@gmail.com', '88250055', '078f40fa23e0672777adc7c05d4773dd', 'tester1', '9', 1, '1414064954.jpg'),
(10, 2, 'Whalter', 'teste2@gmail.com', '88250055', '078f40fa23e0672777adc7c05d4773dd', 'tester2', '9', 1, NULL),
(11, 2, 'White', 'teste3@gmail.com', '88250055', '078f40fa23e0672777adc7c05d4773dd', 'tester3', '9', 1, '1413982799.'),
(12, 2, 'Gus Fring', 'teste4@gmail.com', '88250055', '078f40fa23e0672777adc7c05d4773dd', 'tester4', '9', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarioequipe`
--

CREATE TABLE IF NOT EXISTS `usuarioequipe` (
`usuarioEquipeId` int(11) NOT NULL,
  `usuarioEquipeUsuarioId` int(11) NOT NULL,
  `usuarioEquipeEquipeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariogrupo`
--

CREATE TABLE IF NOT EXISTS `usuariogrupo` (
`usuarioGrupoId` int(11) NOT NULL,
  `usuarioGrupoUsuarioId` int(11) NOT NULL,
  `usuarioGrupoGrupoId` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `usuariogrupo`
--

INSERT INTO `usuariogrupo` (`usuarioGrupoId`, `usuarioGrupoUsuarioId`, `usuarioGrupoGrupoId`) VALUES
(19, 1, 3),
(20, 8, 3),
(21, 9, 3),
(22, 10, 3),
(23, 11, 3),
(24, 12, 3),
(25, 1, 5),
(26, 8, 5),
(27, 12, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariomenu`
--

CREATE TABLE IF NOT EXISTS `usuariomenu` (
`usuarioMenuId` int(11) NOT NULL,
  `usuarioMenuUsuarioId` int(11) NOT NULL,
  `usuarioMenuMenuId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arquivo`
--
ALTER TABLE `arquivo`
 ADD PRIMARY KEY (`arquivoId`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
 ADD PRIMARY KEY (`comentarioId`), ADD KEY `fkComentarioUsuario` (`comentarioUsuarioId`), ADD KEY `fkComentarioPostagem` (`comentarioPostagemId`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
 ADD PRIMARY KEY (`cursoId`);

--
-- Indexes for table `curtir`
--
ALTER TABLE `curtir`
 ADD PRIMARY KEY (`curtirId`), ADD KEY `fkCurtirUsuario` (`curtirUsuarioId`), ADD KEY `fkCurtirPostagem` (`curtirPostagemId`);

--
-- Indexes for table `equipe`
--
ALTER TABLE `equipe`
 ADD PRIMARY KEY (`equipeId`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
 ADD PRIMARY KEY (`grupoId`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`menuId`);

--
-- Indexes for table `postagem`
--
ALTER TABLE `postagem`
 ADD PRIMARY KEY (`postagemId`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`usuarioId`), ADD KEY `fkUsuarioCurso` (`usuarioCursoId`);

--
-- Indexes for table `usuarioequipe`
--
ALTER TABLE `usuarioequipe`
 ADD PRIMARY KEY (`usuarioEquipeId`), ADD KEY `fkUsuarioEquipeUsuario` (`usuarioEquipeUsuarioId`), ADD KEY `fkUsuarioEquipeEquipe` (`usuarioEquipeEquipeId`);

--
-- Indexes for table `usuariogrupo`
--
ALTER TABLE `usuariogrupo`
 ADD PRIMARY KEY (`usuarioGrupoId`), ADD KEY `fkUsuarioGrupoUsuario` (`usuarioGrupoUsuarioId`), ADD KEY `fkUsuarioGrupoGrupoId` (`usuarioGrupoGrupoId`);

--
-- Indexes for table `usuariomenu`
--
ALTER TABLE `usuariomenu`
 ADD PRIMARY KEY (`usuarioMenuId`), ADD KEY `fkUsuarioMenuUsuario` (`usuarioMenuUsuarioId`), ADD KEY `fkUsuarioMenuMenu` (`usuarioMenuMenuId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arquivo`
--
ALTER TABLE `arquivo`
MODIFY `arquivoId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
MODIFY `comentarioId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
MODIFY `cursoId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `curtir`
--
ALTER TABLE `curtir`
MODIFY `curtirId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipe`
--
ALTER TABLE `equipe`
MODIFY `equipeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
MODIFY `grupoId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `menuId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `postagem`
--
ALTER TABLE `postagem`
MODIFY `postagemId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `usuarioId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `usuarioequipe`
--
ALTER TABLE `usuarioequipe`
MODIFY `usuarioEquipeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuariogrupo`
--
ALTER TABLE `usuariogrupo`
MODIFY `usuarioGrupoId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `usuariomenu`
--
ALTER TABLE `usuariomenu`
MODIFY `usuarioMenuId` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
ADD CONSTRAINT `fkComentarioPostagem` FOREIGN KEY (`comentarioPostagemId`) REFERENCES `postagem` (`postagemId`),
ADD CONSTRAINT `fkComentarioUsuario` FOREIGN KEY (`comentarioUsuarioId`) REFERENCES `usuario` (`usuarioId`);

--
-- Limitadores para a tabela `curtir`
--
ALTER TABLE `curtir`
ADD CONSTRAINT `fkCurtirPostagem` FOREIGN KEY (`curtirPostagemId`) REFERENCES `postagem` (`postagemId`),
ADD CONSTRAINT `fkCurtirUsuario` FOREIGN KEY (`curtirUsuarioId`) REFERENCES `usuario` (`usuarioId`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `fkUsuarioCurso` FOREIGN KEY (`usuarioCursoId`) REFERENCES `curso` (`cursoId`);

--
-- Limitadores para a tabela `usuarioequipe`
--
ALTER TABLE `usuarioequipe`
ADD CONSTRAINT `fkUsuarioEquipeEquipe` FOREIGN KEY (`usuarioEquipeEquipeId`) REFERENCES `equipe` (`equipeId`),
ADD CONSTRAINT `fkUsuarioEquipeUsuario` FOREIGN KEY (`usuarioEquipeUsuarioId`) REFERENCES `usuario` (`usuarioId`);

--
-- Limitadores para a tabela `usuariogrupo`
--
ALTER TABLE `usuariogrupo`
ADD CONSTRAINT `fkUsuarioGrupoGrupoId` FOREIGN KEY (`usuarioGrupoGrupoId`) REFERENCES `grupo` (`grupoId`),
ADD CONSTRAINT `fkUsuarioGrupoUsuario` FOREIGN KEY (`usuarioGrupoUsuarioId`) REFERENCES `usuario` (`usuarioId`);

--
-- Limitadores para a tabela `usuariomenu`
--
ALTER TABLE `usuariomenu`
ADD CONSTRAINT `fkUsuarioMenuMenu` FOREIGN KEY (`usuarioMenuMenuId`) REFERENCES `menu` (`menuId`),
ADD CONSTRAINT `fkUsuarioMenuUsuario` FOREIGN KEY (`usuarioMenuUsuarioId`) REFERENCES `usuario` (`usuarioId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
