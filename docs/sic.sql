CREATE DATABASE  IF NOT EXISTS `sic` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sic`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sic
-- ------------------------------------------------------
-- Server version	5.6.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `arquivo`
--

DROP TABLE IF EXISTS `arquivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arquivo` (
  `arquivoId` int(11) NOT NULL AUTO_INCREMENT,
  `arquivoPostagemId` int(11) NOT NULL,
  `arquivoCaminho` varchar(600) NOT NULL,
  PRIMARY KEY (`arquivoId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arquivo`
--

LOCK TABLES `arquivo` WRITE;
/*!40000 ALTER TABLE `arquivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `arquivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `comentarioId` int(11) NOT NULL AUTO_INCREMENT,
  `comentarioUsuarioId` int(11) NOT NULL,
  `comentarioPostagemId` int(11) NOT NULL,
  `comentarioDesc` varchar(600) NOT NULL,
  `comentarioStatus` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comentarioId`),
  KEY `fkComentarioUsuario` (`comentarioUsuarioId`),
  KEY `fkComentarioPostagem` (`comentarioPostagemId`),
  CONSTRAINT `fkComentarioPostagem` FOREIGN KEY (`comentarioPostagemId`) REFERENCES `postagem` (`postagemId`),
  CONSTRAINT `fkComentarioUsuario` FOREIGN KEY (`comentarioUsuarioId`) REFERENCES `usuario` (`usuarioId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `cursoId` int(11) NOT NULL AUTO_INCREMENT,
  `cursoNome` varchar(255) NOT NULL,
  PRIMARY KEY (`cursoId`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,'Administração - Bacharelado'),(2,'Ciências Biologicas- Licenciatura'),(3,'Biomedicina - Bacharelado'),(4,'Ciência da Computação - Bacharelado'),(5,'Ciências Contábeis - Bacharelado'),(6,'Design de Moda - Bacharelado'),(7,'Direito - Bacharelado'),(8,'Educação Física - Bacharelado'),(9,'Educação Física - Licenciatura'),(10,'Enfermagem - Bacharelado'),(11,'Engenharia de Produção- Bacharelado'),(12,'Engenharia Civil- Bacharelado'),(13,'Engenharia Ambiental- Bacharelado'),(14,'Engenharia Elétrica- Bacharelado'),(15,'Engenharia Mecânica- Bacharelado'),(16,'Engenharia de Controle e automação- Bacharelado'),(17,'Farmácia - Bacharelado'),(18,'Filosofia - Licenciatura'),(19,'Física - Licenciatura'),(20,'Fisioterapia - Bacharelado'),(21,'Geografia - Licenciatura'),(22,'História - Licenciatura'),(23,'Letras - Português/Inglês - Licenciatura'),(24,'Matemática - Licenciatura'),(25,'Nutrição - Bacharelado'),(26,'Pedagogia - Licenciatura'),(27,'Psicologia - Bacharelado'),(28,'Secretariado Executivo'),(29,'Publicidade e Propaganda'),(30,'Análise e Desenvolvimento de Sistemas'),(31,'Design de Interiores'),(32,'Estética e Cosmética'),(33,'Gestão de Recursos Humanos'),(34,'Gestão Financeira'),(35,'Gestão Ambiental'),(36,'Gestão de Empresas de Serviços'),(37,'Gestão Hospitalar'),(38,'Logística'),(39,'Marketing'),(40,'Segurança no Trabalho');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curtir`
--

DROP TABLE IF EXISTS `curtir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curtir` (
  `curtirId` int(11) NOT NULL AUTO_INCREMENT,
  `curtirUsuarioId` int(11) NOT NULL,
  `curtirPostagemId` int(11) NOT NULL,
  `curtirStatus` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`curtirId`),
  KEY `fkCurtirUsuario` (`curtirUsuarioId`),
  KEY `fkCurtirPostagem` (`curtirPostagemId`),
  CONSTRAINT `fkCurtirPostagem` FOREIGN KEY (`curtirPostagemId`) REFERENCES `postagem` (`postagemId`),
  CONSTRAINT `fkCurtirUsuario` FOREIGN KEY (`curtirUsuarioId`) REFERENCES `usuario` (`usuarioId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curtir`
--

LOCK TABLES `curtir` WRITE;
/*!40000 ALTER TABLE `curtir` DISABLE KEYS */;
/*!40000 ALTER TABLE `curtir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `grupoId` int(11) NOT NULL AUTO_INCREMENT,
  `grupoNome` varchar(50) NOT NULL,
  PRIMARY KEY (`grupoId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES (1,'Administrador'),(2,'Coordenação'),(3,'Aluno'),(4,'Visitante');
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagem`
--

DROP TABLE IF EXISTS `imagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagem` (
  `imagemId` int(11) NOT NULL AUTO_INCREMENT,
  `imagemCaminho` varchar(600) NOT NULL,
  `imagemPostagemId` int(11) NOT NULL,
  PRIMARY KEY (`imagemId`),
  KEY `fkImagemPostagemId` (`imagemPostagemId`),
  CONSTRAINT `fkImagemPostagemId` FOREIGN KEY (`imagemPostagemId`) REFERENCES `postagem` (`postagemId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagem`
--

LOCK TABLES `imagem` WRITE;
/*!40000 ALTER TABLE `imagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `integrante`
--

DROP TABLE IF EXISTS `integrante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `integrante` (
  `integranteId` int(11) NOT NULL AUTO_INCREMENT,
  `integranteUsuarioId` int(11) NOT NULL,
  `integrantePostagemId` int(11) NOT NULL,
  PRIMARY KEY (`integranteId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `integrante`
--

LOCK TABLES `integrante` WRITE;
/*!40000 ALTER TABLE `integrante` DISABLE KEYS */;
/*!40000 ALTER TABLE `integrante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `menuId` int(11) NOT NULL AUTO_INCREMENT,
  `menuTitulo` varchar(255) DEFAULT NULL,
  `menuController` varchar(255) DEFAULT NULL,
  `menuAction` varchar(255) DEFAULT NULL,
  `menuIcone` varchar(255) DEFAULT NULL,
  `menuSuperior` varchar(255) DEFAULT NULL,
  `menuOrdem` int(11) DEFAULT NULL,
  PRIMARY KEY (`menuId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (7,'InÃ­cio','index','index','fa fa-home','0',1),(8,'Cursos','curso','index','fa fa-graduation-cap','0',2),(9,'UsuÃ¡rios','usuario','index','fa fa-user','0',3),(10,'Grupos','grupo','index','fa fa-users','0',4);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissao`
--

DROP TABLE IF EXISTS `permissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissao` (
  `permissaoId` int(11) NOT NULL AUTO_INCREMENT,
  `permissaoGrupoId` int(11) NOT NULL,
  `permissaoUsuarioId` int(11) NOT NULL,
  `permissaoUrlId` int(11) NOT NULL,
  PRIMARY KEY (`permissaoId`),
  KEY `fkPermissaoGrupo` (`permissaoGrupoId`),
  KEY `fkPermissaoUsuario` (`permissaoUsuarioId`),
  KEY `fkPermissaoUrl` (`permissaoUrlId`),
  CONSTRAINT `fkPermissaoGrupo` FOREIGN KEY (`permissaoGrupoId`) REFERENCES `grupo` (`grupoId`),
  CONSTRAINT `fkPermissaoUrl` FOREIGN KEY (`permissaoUrlId`) REFERENCES `url` (`urlId`),
  CONSTRAINT `fkPermissaoUsuario` FOREIGN KEY (`permissaoUsuarioId`) REFERENCES `usuario` (`usuarioId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissao`
--

LOCK TABLES `permissao` WRITE;
/*!40000 ALTER TABLE `permissao` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postagem`
--

DROP TABLE IF EXISTS `postagem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postagem` (
  `postagemId` int(11) NOT NULL AUTO_INCREMENT,
  `postagemAutorUsuarioId` int(11) NOT NULL,
  `postagemTitulo` varchar(255) NOT NULL,
  `postagemData` date NOT NULL,
  `postagemDescricao` longtext NOT NULL,
  PRIMARY KEY (`postagemId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postagem`
--

LOCK TABLES `postagem` WRITE;
/*!40000 ALTER TABLE `postagem` DISABLE KEYS */;
INSERT INTO `postagem` VALUES (1,1,'titulo','2014-05-05','Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ Este é um teste para descrição da postagem, testando acentos ãçaáçaãÂ '),(2,2,'titulo2','2014-05-05','ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa '),(3,3,'Isso e um teste','0000-00-00','ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa '),(4,4,'Outro Teste','0000-00-00','ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ááaããççaaaaa ');
/*!40000 ALTER TABLE `postagem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `url`
--

DROP TABLE IF EXISTS `url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `url` (
  `urlId` int(11) NOT NULL AUTO_INCREMENT,
  `urlDesc` varchar(600) NOT NULL,
  `grupoId` varchar(255) NOT NULL,
  PRIMARY KEY (`urlId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `url`
--

LOCK TABLES `url` WRITE;
/*!40000 ALTER TABLE `url` DISABLE KEYS */;
INSERT INTO `url` VALUES (5,'adm.php','1');
/*!40000 ALTER TABLE `url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `usuarioId` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioCursoId` int(11) NOT NULL,
  `usuarioNome` varchar(255) NOT NULL,
  `usuarioEmail` varchar(255) NOT NULL,
  `usuarioFone` varchar(45) DEFAULT NULL,
  `usuarioSenha` varchar(40) NOT NULL,
  `usuarioLogin` varchar(40) NOT NULL,
  `usuarioPeriodo` varchar(10) NOT NULL,
  `usuarioStatus` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`usuarioId`),
  KEY `fkUsuarioCurso` (`usuarioCursoId`),
  CONSTRAINT `fkUsuarioCurso` FOREIGN KEY (`usuarioCursoId`) REFERENCES `curso` (`cursoId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (4,1,'Gilson Junior','jr_juk@hotmail.com','(41)3265-2409','deploy','super','4',1),(5,2,'William Davis Urbano','williamurbano93@gmail.com',NULL,'4297f44b13955235245b2497399d7a93','williamurbano','',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-18 17:44:06
