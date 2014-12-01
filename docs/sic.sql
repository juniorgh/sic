-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Dez-2014 às 22:48
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
-- Estrutura da tabela `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
`comentarioId` int(11) NOT NULL,
  `comentarioUsuarioId` int(11) NOT NULL,
  `comentarioDesc` varchar(600) NOT NULL,
  `comentarioEquipePostagemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
`cursoId` int(11) NOT NULL,
  `cursoNome` varchar(255) NOT NULL,
  `cursoBanner` varchar(700) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`cursoId`, `cursoNome`, `cursoBanner`) VALUES
(17, 'Farmácia - Bacharelado', ''),
(21, 'Geografia - Licenciatura', '1415902259.jpg'),
(23, 'Letras - Português/Inglês - Licenciatura', ''),
(25, 'Nutrição - Bacharelado', ''),
(26, 'Pedagogia - Licenciatura', ''),
(27, 'Psicologia - Bacharelado', ''),
(29, 'Publicidade e Propaganda', ''),
(34, 'Gestão Financeira', ''),
(36, 'Gestão de Empresas de Serviços', ''),
(37, 'Gestão Hospitalar', ''),
(38, 'Logística', ''),
(39, 'Marketing', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `equipe`
--

INSERT INTO `equipe` (`equipeId`, `equipeNome`) VALUES
(22, 'Semana de IniciaÃ§Ã£o CiÃªntifica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipepostagem`
--

CREATE TABLE IF NOT EXISTS `equipepostagem` (
`equipePostagemId` int(11) NOT NULL,
  `equipePostagemTitulo` varchar(100) NOT NULL,
  `equipePostagemData` date NOT NULL,
  `equipePostagemDescricao` varchar(1000) NOT NULL,
  `equipePostagemEquipeId` int(11) NOT NULL,
  `equipePostagemBanner` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `equipepostagem`
--

INSERT INTO `equipepostagem` (`equipePostagemId`, `equipePostagemTitulo`, `equipePostagemData`, `equipePostagemDescricao`, `equipePostagemEquipeId`, `equipePostagemBanner`) VALUES
(1, 'Semana de Iniciacao Cientifica TCC', '2014-11-24', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 22, '1417459779.jpg'),
(2, 'Lorem Ipsus', '2014-11-24', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 22, '1417459814.jpg'),
(3, 'Lorem Ipsus', '2014-11-24', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 22, '1417459880.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipeupload`
--

CREATE TABLE IF NOT EXISTS `equipeupload` (
`equipeUploadId` int(11) NOT NULL,
  `equipeUploadCaminho` varchar(1000) NOT NULL,
  `equipeUploadEquipePostagemId` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `equipeupload`
--

INSERT INTO `equipeupload` (`equipeUploadId`, `equipeUploadCaminho`, `equipeUploadEquipePostagemId`) VALUES
(1, '11416509384.jpg', 1),
(2, '14165093842.jpg', 1),
(3, '14165093843.jpg', 1),
(4, '11416513612.jpg', 2),
(5, '14165136122.jpg', 2),
(6, '11416513612.jpg', 2),
(7, '11417455051.jpg', 3),
(8, '14174550512.jpg', 3),
(9, '11417455051.jpg', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
`grupoId` int(11) NOT NULL,
  `grupoNome` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`grupoId`, `grupoNome`) VALUES
(20, 'desenvolvedor'),
(21, 'estudantes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupomenu`
--

CREATE TABLE IF NOT EXISTS `grupomenu` (
`grupoMenuId` int(11) NOT NULL,
  `grupoMenuGrupoId` int(11) NOT NULL,
  `grupoMenuMenuId` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Extraindo dados da tabela `grupomenu`
--

INSERT INTO `grupomenu` (`grupoMenuId`, `grupoMenuGrupoId`, `grupoMenuMenuId`) VALUES
(74, 21, 12),
(75, 21, 13),
(81, 20, 8),
(82, 20, 11),
(83, 20, 10),
(84, 20, 12),
(85, 20, 13),
(86, 20, 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`menuId`, `menuTitulo`, `menuController`, `menuAction`, `menuIcone`, `menuSuperior`, `menuOrdem`) VALUES
(8, 'Cursos', 'curso', 'index', 'fa fa-graduation-cap', '0', 1),
(9, 'UsuÃ¡rio', 'usuario', 'index', 'fa fa-user', '9', 2),
(10, 'Grupos', 'grupo', 'index', 'fa fa-users', '0', 3),
(11, 'Equipe', 'equipe', 'index', 'fa fa-suitcase', '0', 4),
(12, 'meus projetos', 'equipePostagem', 'index', 'fa fa-book', '12', 5),
(13, 'Minha conta', 'usuarioAluno', 'index', 'fa fa-user', '0', 6);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuarioId`, `usuarioCursoId`, `usuarioNome`, `usuarioEmail`, `usuarioFone`, `usuarioSenha`, `usuarioLogin`, `usuarioPeriodo`, `usuarioStatus`, `usuarioFotoCaminho`) VALUES
(1, 17, 'Junior', 'jr_juk@hotmail.com', '(41) 9788-1329', '698dc19d489c4e4db73e28a713eab07b', 'super', '7', 1, '1416316238.jpg'),
(2, 36, 'user tester', '123', '321321', '202cb962ac59075b964b07152d234b70', 'aaa', '3', 1, '1416512056.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarioequipe`
--

CREATE TABLE IF NOT EXISTS `usuarioequipe` (
`usuarioEquipeId` int(11) NOT NULL,
  `usuarioEquipeUsuarioId` int(11) NOT NULL,
  `usuarioEquipeEquipeId` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Extraindo dados da tabela `usuarioequipe`
--

INSERT INTO `usuarioequipe` (`usuarioEquipeId`, `usuarioEquipeUsuarioId`, `usuarioEquipeEquipeId`) VALUES
(31, 1, 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariogrupo`
--

CREATE TABLE IF NOT EXISTS `usuariogrupo` (
`usuarioGrupoId` int(11) NOT NULL,
  `usuarioGrupoUsuarioId` int(11) NOT NULL,
  `usuarioGrupoGrupoId` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `usuariogrupo`
--

INSERT INTO `usuariogrupo` (`usuarioGrupoId`, `usuarioGrupoUsuarioId`, `usuarioGrupoGrupoId`) VALUES
(15, 2, 20),
(20, 1, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
 ADD PRIMARY KEY (`comentarioId`), ADD KEY `fkComentarioUsuario` (`comentarioUsuarioId`), ADD KEY `fkComentarioEquipePostagem` (`comentarioEquipePostagemId`);

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
-- Indexes for table `equipepostagem`
--
ALTER TABLE `equipepostagem`
 ADD PRIMARY KEY (`equipePostagemId`), ADD KEY `fkEquipePostagemEquipe` (`equipePostagemEquipeId`);

--
-- Indexes for table `equipeupload`
--
ALTER TABLE `equipeupload`
 ADD PRIMARY KEY (`equipeUploadId`);

--
-- Indexes for table `grupo`
--
ALTER TABLE `grupo`
 ADD PRIMARY KEY (`grupoId`);

--
-- Indexes for table `grupomenu`
--
ALTER TABLE `grupomenu`
 ADD PRIMARY KEY (`grupoMenuId`), ADD KEY `fkGrupoMenuGrupo` (`grupoMenuGrupoId`), ADD KEY `fkGrupoMenuMenu` (`grupoMenuMenuId`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`menuId`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
MODIFY `comentarioId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
MODIFY `cursoId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `curtir`
--
ALTER TABLE `curtir`
MODIFY `curtirId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipe`
--
ALTER TABLE `equipe`
MODIFY `equipeId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `equipepostagem`
--
ALTER TABLE `equipepostagem`
MODIFY `equipePostagemId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `equipeupload`
--
ALTER TABLE `equipeupload`
MODIFY `equipeUploadId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
MODIFY `grupoId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `grupomenu`
--
ALTER TABLE `grupomenu`
MODIFY `grupoMenuId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `menuId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `usuarioId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarioequipe`
--
ALTER TABLE `usuarioequipe`
MODIFY `usuarioEquipeId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `usuariogrupo`
--
ALTER TABLE `usuariogrupo`
MODIFY `usuarioGrupoId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
ADD CONSTRAINT `fkComentarioEquipePostagem` FOREIGN KEY (`comentarioEquipePostagemId`) REFERENCES `equipepostagem` (`equipePostagemId`),
ADD CONSTRAINT `fkComentarioUsuario` FOREIGN KEY (`comentarioUsuarioId`) REFERENCES `usuario` (`usuarioId`);

--
-- Limitadores para a tabela `curtir`
--
ALTER TABLE `curtir`
ADD CONSTRAINT `fkCurtirUsuario` FOREIGN KEY (`curtirUsuarioId`) REFERENCES `usuario` (`usuarioId`);

--
-- Limitadores para a tabela `equipepostagem`
--
ALTER TABLE `equipepostagem`
ADD CONSTRAINT `fkEquipePostagemEquipe` FOREIGN KEY (`equipePostagemEquipeId`) REFERENCES `equipe` (`equipeId`);

--
-- Limitadores para a tabela `grupomenu`
--
ALTER TABLE `grupomenu`
ADD CONSTRAINT `fkGrupoMenuGrupo` FOREIGN KEY (`grupoMenuGrupoId`) REFERENCES `grupo` (`grupoId`),
ADD CONSTRAINT `fkGrupoMenuMenu` FOREIGN KEY (`grupoMenuMenuId`) REFERENCES `menu` (`menuId`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
