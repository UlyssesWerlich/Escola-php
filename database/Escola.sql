CREATE DATABASE  IF NOT EXISTS `escola` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `escola`;
-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: escola
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `aluno` (
  `matricula` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `turma` varchar(20) NOT NULL,
  `turno` varchar(1) NOT NULL,
  `dataNascimento` date NOT NULL,
  PRIMARY KEY (`matricula`),
  UNIQUE KEY `matricula_UNIQUE` (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
INSERT INTO `aluno` VALUES (4,'Ulysses Werlich','Rua das Orquídeas, 2010','ADS','N','1996-06-25'),(5,'Priscila Schlemper Werlich','Rua das Orquídeas 2010, Bela Vista','Pedagogia','N','1999-06-07'),(6,'Luciano Santos','Rua das Figueiras','ADS','V','1985-11-12'),(8,'Mateus dos Santos Prado','Rua 25 de Dezembro','Administração','N','1995-05-01'),(9,'Willan Goes','Rua dos Lirios','ADS','N','1988-11-11'),(11,'Vitor João','Rua Macedônia','Pedagogia','V','1998-12-30'),(14,'Samuel Schlemper','Rua Ivo Reis Montenegro, 126','ADS','M','2006-04-28'),(15,'Willan Goes','Rua Marco Polo, 323','ADS','M','1992-11-12'),(16,'Michelle Duarte da Silva Schlemper','Rua Ivo Reis Montenegro, 126','Pedagogia','M','1985-03-10'),(18,'Leonardo Sousa','Rua Almirante Tamandaré, 83','ADS','N','1984-12-02'),(20,'Marcos Antonio Pereira','Rua Presidente Getúlio, 84','Pedagogia','M','1985-02-01');
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aula`
--

DROP TABLE IF EXISTS `aula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `aula` (
  `idAula` int(11) NOT NULL AUTO_INCREMENT,
  `materia` varchar(45) NOT NULL,
  `turno` varchar(1) NOT NULL,
  `cargaHoraria` int(3) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `idProfessor` int(11) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataTermino` date NOT NULL,
  `diaSemana` varchar(3) NOT NULL,
  `horaInicio` int(2) NOT NULL,
  `horaTermino` int(2) NOT NULL,
  PRIMARY KEY (`idAula`),
  UNIQUE KEY `idAula_UNIQUE` (`idAula`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aula`
--

LOCK TABLES `aula` WRITE;
/*!40000 ALTER TABLE `aula` DISABLE KEYS */;
INSERT INTO `aula` VALUES (2,'Linguagem de Programação 1','N',80,'ADS',5,'2020-02-25','2020-07-25','qua',18,22),(5,'Didática','N',80,'Pedagogia',2,'2020-02-28','2020-06-28','qui',20,22),(6,'Algoritmos','V',40,'ADS',1,'2020-02-14','2020-12-18','sex',18,22),(7,'Mídias e tecnologia na Educação','N',80,'Pedagogia',5,'2020-02-14','2020-07-14','qua',18,20),(8,'Projeto Integrador 1','N',80,'ADS',1,'2020-04-28','2020-06-24','seg',18,22);
/*!40000 ALTER TABLE `aula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `professor` (
  `idProfessor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `dataNascimento` date NOT NULL,
  `formacao` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`idProfessor`),
  UNIQUE KEY `idProfessor_UNIQUE` (`idProfessor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,'Ulysses Werlich Borges','Rua das Orquideas, 2010','08926004970','48 996120819','M','1996-06-25',''),(2,'Priscila Schlemper','Rua Ivo Reis Montenegro','089.684.684-77','48 999131280','F','1999-06-07','Pedagogia'),(5,'Marcos Andre Valério','Rua das Hortências, 154','549.354.489-01','48 996120518','M','1974-04-01','Professor de ciências contâbeis');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `turma` (
  `idTurma` int(11) NOT NULL AUTO_INCREMENT,
  `idAula` int(11) NOT NULL,
  `matricula` int(11) NOT NULL,
  PRIMARY KEY (`idTurma`),
  UNIQUE KEY `idAulaAluno_UNIQUE` (`idTurma`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` VALUES (7,7,5),(8,7,6),(14,2,4),(15,2,5),(18,6,8),(19,6,4),(20,6,5),(21,8,5);
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-05 10:39:27
