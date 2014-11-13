-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Nov-2014 às 20:46
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
(14, 'Engenharia Elétrica- Bacharelado', ''),
(17, 'Farmácia - Bacharelado', ''),
(20, 'Fisioterapia - Bacharelado', ''),
(21, 'Geografia - Licenciatura', '1415902259.jpg'),
(22, 'História - Licenciatura', ''),
(23, 'Letras - Português/Inglês - Licenciatura', ''),
(25, 'Nutrição - Bacharelado', ''),
(26, 'Pedagogia - Licenciatura', ''),
(27, 'Psicologia - Bacharelado', ''),
(28, 'Secretariado Executivo', ''),
(29, 'Publicidade e Propaganda', ''),
(32, 'Estética e Cosmética', ''),
(34, 'Gestão Financeira', ''),
(35, 'GestÃ£o Ambiental', '1415902204.jpg'),
(36, 'Gestão de Empresas de Serviços', ''),
(37, 'Gestão Hospitalar', ''),
(38, 'Logística', ''),
(39, 'Marketing', ''),
(40, 'Segurança no Trabalho', ''),
(41, 'teste', '1415902280.jpg');

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
(22, 'abacate');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipepostagem`
--

CREATE TABLE IF NOT EXISTS `equipepostagem` (
`equipePostagemId` int(11) NOT NULL,
  `equipePostagemTitulo` varchar(100) NOT NULL,
  `equipePostagemData` date NOT NULL,
  `equipePostagemDescricao` varchar(1000) NOT NULL,
  `equipePostagemEquipeId` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `equipepostagem`
--

INSERT INTO `equipepostagem` (`equipePostagemId`, `equipePostagemTitulo`, `equipePostagemData`, `equipePostagemDescricao`, `equipePostagemEquipeId`) VALUES
(1, 'teste', '0000-00-00', 'teste ', 22),
(2, 'teste', '0000-00-00', 'teste ', 22),
(3, 'teste', '0000-00-00', 'teste ', 22),
(4, 'teste', '0000-00-00', 'teste ', 22),
(5, 'teste', '0000-00-00', 'teste ', 22),
(6, 'asda', '0000-00-00', 'asdasd', 22),
(7, 'asda', '0000-00-00', 'asdasd', 22),
(8, 'teste', '0000-00-00', 'teste', 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipeupload`
--

CREATE TABLE IF NOT EXISTS `equipeupload` (
`equipeUploadId` int(11) NOT NULL,
  `equipeUploadEquipeId` int(11) NOT NULL,
  `equipeUploadCaminho` varchar(1000) NOT NULL,
  `equipeUploadEquipePostagemId` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `equipeupload`
--

INSERT INTO `equipeupload` (`equipeUploadId`, `equipeUploadEquipeId`, `equipeUploadCaminho`, `equipeUploadEquipePostagemId`) VALUES
(1, 22, '1415649787.jpg', 0),
(2, 22, '21415649787.jpg', 0),
(3, 22, '31415649787.jpg', 0),
(4, 22, '1415897981.jpg', 0),
(5, 22, '21415897981.jpg', 0),
(6, 22, '31415897981.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
`grupoId` int(11) NOT NULL,
  `grupoNome` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`grupoId`, `grupoNome`) VALUES
(9, 'desenvolvedor'),
(10, 'alunos'),
(11, 'Coordenadores');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupomenu`
--

CREATE TABLE IF NOT EXISTS `grupomenu` (
`grupoMenuId` int(11) NOT NULL,
  `grupoMenuGrupoId` int(11) NOT NULL,
  `grupoMenuMenuId` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Extraindo dados da tabela `grupomenu`
--

INSERT INTO `grupomenu` (`grupoMenuId`, `grupoMenuGrupoId`, `grupoMenuMenuId`) VALUES
(25, 11, 8),
(26, 11, 11),
(27, 11, 10),
(28, 11, 9),
(29, 9, 8),
(30, 9, 11),
(31, 9, 10),
(32, 9, 12),
(33, 9, 13),
(34, 9, 9);

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
(12, 'meus projetos', 'equipeUpload', 'index', 'fa fa-book', '12', 5),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuarioId`, `usuarioCursoId`, `usuarioNome`, `usuarioEmail`, `usuarioFone`, `usuarioSenha`, `usuarioLogin`, `usuarioPeriodo`, `usuarioStatus`, `usuarioFotoCaminho`) VALUES
(1, 17, 'Gilson', 'jr_juk@hotmail.com', '(41) 9788-1329', '078f40fa23e0672777adc7c05d4773dd', 'super', '7', 1, '1415387293.jpg'),
(21, 17, 'Junior', 'juninhoInst@hotmail.com', '(41) 8825 - 0055', '078f40fa23e0672777adc7c05d4773dd', 'tester1', '7', 1, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `usuariogrupo`
--

INSERT INTO `usuariogrupo` (`usuarioGrupoId`, `usuarioGrupoUsuarioId`, `usuarioGrupoGrupoId`) VALUES
(24, 1, 9);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `equipepostagem`
--
ALTER TABLE `equipepostagem`
 ADD PRIMARY KEY (`equipePostagemId`), ADD KEY `fkEquipePostagemEquipe` (`equipePostagemEquipeId`);

--
-- Indexes for table `equipeupload`
--
ALTER TABLE `equipeupload`
 ADD PRIMARY KEY (`equipeUploadId`), ADD KEY `fkEquipeUploadEquipe` (`equipeUploadEquipeId`);

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
MODIFY `equipeId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `equipepostagem`
--
ALTER TABLE `equipepostagem`
MODIFY `equipePostagemId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `equipeupload`
--
ALTER TABLE `equipeupload`
MODIFY `equipeUploadId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `grupo`
--
ALTER TABLE `grupo`
MODIFY `grupoId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `grupomenu`
--
ALTER TABLE `grupomenu`
MODIFY `grupoMenuId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `menuId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `usuarioId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `usuarioequipe`
--
ALTER TABLE `usuarioequipe`
MODIFY `usuarioEquipeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuariogrupo`
--
ALTER TABLE `usuariogrupo`
MODIFY `usuarioGrupoId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
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
-- Limitadores para a tabela `equipeupload`
--
ALTER TABLE `equipeupload`
ADD CONSTRAINT `fkEquipeUploadEquipe` FOREIGN KEY (`equipeUploadEquipeId`) REFERENCES `equipe` (`equipeId`);

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
