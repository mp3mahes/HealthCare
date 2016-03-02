-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: localhost    Database: Hospital
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.9-MariaDB

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
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointment` (
  `doctorid` varchar(45) NOT NULL,
  `patient_id` varchar(45) NOT NULL,
  `doctor_note` varchar(45) DEFAULT NULL,
  `prescription` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`doctorid`,`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointment`
--

LOCK TABLES `appointment` WRITE;
/*!40000 ALTER TABLE `appointment` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctor` (
  `doctorid` varchar(45) NOT NULL,
  `field` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  PRIMARY KEY (`doctorid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctor`
--

LOCK TABLES `doctor` WRITE;
/*!40000 ALTER TABLE `doctor` DISABLE KEYS */;
INSERT INTO `doctor` VALUES ('doctor1','Neuro','Preeza','Karmacharya','Female'),('mxp7628','general','Mahesh','Pandeya','male');
/*!40000 ALTER TABLE `doctor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `patient_id` varchar(45) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `age` varchar(10) NOT NULL,
  `blood` varchar(45) DEFAULT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(45) NOT NULL,
  `zipcode` varchar(45) NOT NULL,
  `maritial_status` varchar(45) DEFAULT NULL,
  `insurance` varchar(45) NOT NULL,
  `p_physician` varchar(45) DEFAULT NULL,
  `chief_complain` varchar(300) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` VALUES ('','','','','','','','','','','','',''),('1','fname','lname','','','blood','','','',NULL,'',NULL,''),('100','mahesh','pandeya','male','','b+','3711 w. northgate dr# 610','irving','75062','married','Blue cross','dr. Rhee','headache'),('2','fname','lname','','','blood','','','',NULL,'',NULL,''),('3','','fname','lname','','blood','','','',NULL,'',NULL,''),('4','mahaesh','pandeya','','','AB+','','','',NULL,'',NULL,''),('5','mahaesh','pandeya','Arlington','','AB+','','','',NULL,'',NULL,''),('6','max','oasdjao','ksnakdka','','b+','','','',NULL,'',NULL,''),('7','max','oasdjao','ksnakdka','','b+','','','',NULL,'',NULL,''),('8','preeza','karmacharya','irving','','b+','','','',NULL,'',NULL,''),('9','preeza','karmacharya','irving','','b+','','','',NULL,'',NULL,''),('gaurav','gaurav','dhungana','male','34','fasf','dsd','dasd','ada','sda','sda','asda','dad'),('gauravv','mahesh','pandeya','jdsadka','njlksan','nfsdkja','fnkds','fdnskdks','nadsjkd','ndsajka','ndsfjks','fnsdjfnk','fndsjkfsd'),('jhpant','jay','pandeya','male','66','b+','3711 w. northgate dr# 610','irving','75062','married','yes','dr.pant','kidney, headache'),('laddu1','laddu','prashad','male','32','b+','1611 s cooper st','arlington','76010','married','yes','yes','headache'),('mxp7628','Jay','Pant','Male','32','b+','1611 s cooper st','arlington','76010','married','yes','DR.Mahesh','Headache'),('orvil001','orvil','thapa','female','33','HIV+','1611 s cooper st','irving','75062','married','yes','','headache');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_pass` varchar(45) NOT NULL,
  `user_type` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email_UNIQUE` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'mp3.mahes','mp3@max.com','1234',''),(2,'mahesh','m@m.m','748162565b8159be094fd86f8fe46003',''),(3,'mp3.mahes','mp3.mahes@gmail.com','49bb197bec17b7d20b2df6b1f3c3434a',''),(4,'gaurav','gaurav@gaurav.com','49bb197bec17b7d20b2df6b1f3c3434a',''),(5,'saurav1','p@p.p','49bb197bec17b7d20b2df6b1f3c3434a',''),(6,'gaurav','gaurav@gaurav.comm','49bb197bec17b7d20b2df6b1f3c3434a',''),(7,'gaurav','gaurav@gauravjj.com','49bb197bec17b7d20b2df6b1f3c3434a',''),(9,'gaurav','gauravss@gaurav.com','49bb197bec17b7d20b2df6b1f3c3434a',''),(10,'doctor1','d@d.d','mahesh','doctor');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-29 20:12:08
