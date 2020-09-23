-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: listatarefas
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Pendente'),(2,'Realizado');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarefas`
--

DROP TABLE IF EXISTS `tarefas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarefas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_status` int NOT NULL DEFAULT '1',
  `titulo` varchar(50) NOT NULL,
  `data_real` date NOT NULL,
  `descricao` mediumtext,
  PRIMARY KEY (`id`),
  KEY `id_status` (`id_status`),
  CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarefas`
--

LOCK TABLES `tarefas` WRITE;
/*!40000 ALTER TABLE `tarefas` DISABLE KEYS */;
INSERT INTO `tarefas` VALUES (1,2,'Lavar o carro','2020-08-20','Levar o carro para lava no posto'),(2,1,'Estudar programação web','2020-09-13','Estudar manipulação de datas utilizando PHP'),(3,2,'Comprar Coca','2020-09-14','Ir ao mercado comprar coca'),(4,2,'Estudar banco de dados','2020-09-15','Estudar indices, hash,arvore B e B+'),(5,2,'Teste','2001-09-20','lorem ipsum dolor akit amet'),(6,1,'Testando1234','2020-08-20','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac pellentesque nulla. Vestibulum fringilla enim vel rhoncus ultrices. Vestibulum semper sem neque, nec congue erat finibus sed. Integer id ante in velit bibendum interdum quis sit amet massa. Integer a quam aliquet, dictum arcu posuere, commodo sapien. Integer finibus, elit eu fermentum elementum, felis lorem condimentum sem, a interdum ante justo vitae tortor. Proin vestibulum nunc id lacus egestas iaculis. Vestibulum bibendum aliquam viverra. Maecenas nunc nisl, interdum sed placerat vitae, auctor ac nisi. Pellentesque ante neque, aliquet quis dapibus a, tempor sit amet diam. Cras euismod est sit amet arcu lacinia scelerisque in ornare erat.\r\n\r\nMaecenas auctor dolor orci, ut ornare lorem mattis ac. Vestibulum accumsan, mi in pretium pellentesque, ligula nisi lacinia nunc, a semper quam lorem sed arcu. Maecenas nec diam mi. Phasellus congue dui sapien, id rhoncus augue elementum a. Phasellus pretium dignissim eleifend. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed nec suscipit dui, ut sodales leo. Suspendisse ultricies tempor enim, sit amet scelerisque magna efficitur eget. Proin neque erat, placerat sit amet viverra ut, consectetur in velit. Quisque commodo porta tincidunt. In hac habitasse platea dictumst. Suspendisse ac mi magna. Suspendisse potenti. Nam placerat risus a augue hendrerit vestibulum. In id dui vitae arcu ullamcorper vestibulum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'),(22,1,'Estudar calculo 2','2020-09-16','Estudar integral por partes,integrais trigonométricas e revolução dos sólidos'),(26,1,'Apresentar trabalho LPG2','2020-09-18','Apresentar trabalho de LPG2'),(27,1,'','2020-09-16','Teste'),(28,1,'','2020-09-17','');
/*!40000 ALTER TABLE `tarefas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Icaro','icaroico333@gmail.com','$2y$10$ttWP94hl5wji4vxizk48zuGauWsP9AiX2Aq7Du/ux16MyBXqOv/be');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'listatarefas'
--

--
-- Dumping routines for database 'listatarefas'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-19 11:49:05
