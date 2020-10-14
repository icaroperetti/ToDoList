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


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ;

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


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarefas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_status` int NOT NULL DEFAULT '1',
  `titulo` varchar(50) NOT NULL,
  `data_real` date NOT NULL,
  `descricao` mediumtext,
  `userid` int NOT NULL,
  PRIMARY KEY (`id`,`userid`),
  KEY `id_status` (`id_status`),
  CONSTRAINT `tarefas_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`)
);

--
-- Dumping data for table `tarefas`
--

LOCK TABLES `tarefas` WRITE;
/*!40000 ALTER TABLE `tarefas` DISABLE KEYS */;
INSERT INTO `tarefas` VALUES (2,1,'Teste userid','2020-10-11','1234',1),(4,1,'Teste3','9999-09-20','2I22',6),(5,1,'teste4','2020-10-11','18:26',6);
/*!40000 ALTER TABLE `tarefas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--


/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Icaro Peretti Baseggio','icaroico333@gmail.com','$2y$10$ttWP94hl5wji4vxizk48zuGauWsP9AiX2Aq7Du/ux16MyBXqOv/be'),(2,'Caroline','carol@gmail.com','$2y$10$WfzZdbwlflkddYgFWUB1EeW5P4gUUCFKHv1FsaHmWRANgDbfi0uAi'),(3,'Silvia','silvia@gmail.com','$2y$10$EB3eEAvqXyjJumfVKaQdYO.87N9m0M6d.sRQj0ywq/WAQXrvI0d5.'),(4,'Jose Junior','jose123@gmail.com','$2y$10$LJxw4Kmx7MGnZFlXzDEZSuXUvFMdgVsoOSLj4opbFgAuu39mT47FO'),(5,'Mirosvaldo','miro@gmail.com','$2y$10$9xeIEeQfJdLrqU1kHswFhuLJqMBipYCb1WIBXQTcLvph6e/qlI2uK'),(6,'Marinho','marinho@gmail.com','$2y$10$WvcIKETaWJyynnZHKx87b.Y5fmB5Fjtq.Re1hMakszbXPdSVst0ja');
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

-- Dump completed on 2020-10-11 21:04:46
