-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
--
-- Host: localhost    Database: jeopardy
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `DJ` tinyint(1) DEFAULT NULL,
  `FJ` tinyint(1) DEFAULT NULL,
  `gameID` int(11) NOT NULL,
  PRIMARY KEY (`categoryID`),
  KEY `gameID` (`gameID`),
  CONSTRAINT `category_ibfk_1` FOREIGN KEY (`gameID`) REFERENCES `game` (`gameID`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Animal Kingdom',0,0,1),(2,'Space',0,0,1),(3,'Inventors',0,0,1),(4,'Geology',0,0,1),(5,'Human Body',0,0,1),(6,'Plant Kingdom',1,0,1),(7,'Disease',1,0,1),(8,'Geography',1,0,1),(9,'General Science',1,0,1),(10,'Mythology',1,0,1),(11,'Chemistry',0,1,1);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clue`
--

DROP TABLE IF EXISTS `clue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clue` (
  `clueID` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(300) DEFAULT NULL,
  `solution` varchar(300) DEFAULT NULL,
  `pointValue` int(11) DEFAULT NULL,
  `DJ` tinyint(1) DEFAULT NULL,
  `FJ` tinyint(1) DEFAULT NULL,
  `done` tinyint(1) DEFAULT NULL,
  `categoryID` int(11) NOT NULL,
  PRIMARY KEY (`clueID`),
  KEY `categoryID` (`categoryID`),
  CONSTRAINT `clue_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=9647 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clue`
--

LOCK TABLES `clue` WRITE;
/*!40000 ALTER TABLE `clue` DISABLE KEYS */;
INSERT INTO `clue` VALUES (1,'This animal is the tallest in the world.','What is a giraffe?',100,0,0,0,1),(2,'This animal is the fastest runner.','What is a cheetah?',200,0,0,0,1),(3,'The whale with a horn like a unicorn is known as this.','What is a narwhal?',300,0,0,0,1),(4,'This animal is a long-horned European member of the goat family.','What is an ibex?',400,0,0,0,1),(5,'The only venemous mammal, this animal also lays eggs.','What is a duck billed platypus?',500,0,0,0,1),(6,'The only planet not named after a mythological figure.','What is Earth?',100,0,0,0,2),(7,'This former planet is now classified as a dwarf planet.','What is Pluto?',200,0,0,0,2),(8,'She is the first american woman to walk in space.','Who is Kathryn Sullivan?',300,0,0,0,2),(9,'He is the man who famously golfed on the moon.','Who is Alan Shepard?',400,0,0,0,2),(10,'This planet has the moon Demos which represents fear and dread.','What is Mars?',500,0,0,0,2),(11,'This famous explorer of Asia is now the namesake for a childrens game.','Who is Marco Polo?',100,0,0,0,3),(12,'The discoverer of the New World.','Who is Christopher Columbus?',200,0,0,0,3),(13,'He was the first to set foot on US mainland (in Florida).','Who is Ponce de Leon?',300,0,0,0,3),(14,'This man was the first Englishman to sail around the world.','Who is Sir Francis Drake?',400,0,0,0,3),(15,'The Danish discoverer of Alaska and the strait now carrying his namesake.','Who is Vitus Bering?',500,0,0,0,3),(16,'This is the hardest mineral in the world.','What is diamond?',100,0,0,0,4),(17,'This is the name for purple quartz.','What is amethyst?',200,0,0,0,4),(18,'This is the birthstone of September.','What is sapphire?',300,0,0,0,4),(19,'This is the name for soft carbon that is commonly used in pencils.','What is graphite?',400,0,0,0,4),(20,'This type of rock is the most common and makes up the Earth\'s crust.','What is igneous?',500,0,0,0,4),(21,'Number of bones in the adult human body.','What is 206?',100,0,0,0,5),(22,'This bone located in the ear is the smallest in the body.','What is the stirrup (stapes)?',200,0,0,0,5),(23,'The blood type of a univeral donor.','What is o-negative?',300,0,0,0,5),(24,'Number of vertebrae in the spine.','What is 33?',400,0,0,0,5),(25,'This is the longest nerve in the body.','What is sciatic?',500,0,0,0,5),(26,'This type of tree is the tallest in the world.','What is the California Redwood?',200,1,0,0,6),(27,'This is the oldest living tree.','What is the Bristle Cone Pine?',400,1,0,0,6),(28,'The fruit of the banyan tree.','What is a fig?',600,1,0,0,6),(29,'The chick pea is also know as this.','What is garbanzo bean?',800,1,0,0,6),(30,'This man is the botanist who developed the spineless cactus.','Who is Luther Burbank?',1000,1,0,0,6),(31,'This ailment is commonly associated with surfacing divers.','What is the bends?',200,1,0,0,7),(32,'This is the common name for consumption.','What is the tuberculosis?',400,1,0,0,7),(33,'A person is said to be in this state when his or her iron level is low.','What is anemia?',600,1,0,0,7),(34,'This condition involves breif stopping of breathing during sleep.','What is sleep apnea?',800,1,0,0,7),(35,'A neoplasm is also known as this.','What is a tumor?',1000,1,0,0,7),(36,'The tallest mountain in the world.','What is Mount Everest?',200,1,0,0,8),(37,'This is the chain of mountains in California.','What is the Sierra Nevada?',400,1,0,0,8),(38,'This mountain is the biblical location of the delivery of the ten commandments.','What is Mount Sinai?',600,1,0,0,8),(39,'This volcano in Italy is known as the \'Lighthouse of the Mediterranian\'','What is Mount Stromboli?',800,1,0,0,8),(40,'The highest temperature ever recorded was in this desert in the US.','What is Death Valley?',1000,1,0,0,8),(41,'This is the science of sound.','What is genetics?',200,1,0,0,9),(42,'One particle of light is known as this.','What is a photon?',400,1,0,0,9),(43,'This is a general term for subatomic particles.','What is quark?',600,1,0,0,9),(44,'The science of heat and energy transfer.','What is thermodynamics?',800,1,0,0,9),(45,'The least amount of material needed for a nuclear reaction is known as this.','What is critical mass?',1000,1,0,0,9),(46,'He is the greek chief of the gods.','Who is Zeus?',200,1,0,0,10),(47,'The messenger of the gods.','Who is Hermes?',400,1,0,0,10),(48,'He is the greek warrior whose only vulnerability was his heel.','Who is Achilles?',600,1,0,0,10),(49,'She is the greek goddess of victory and also a brand of shoes.','Who is Nike?',800,1,0,0,10),(50,'This is the nine-headed monster slain by Hercules.','What is the Hydra?',1000,1,0,0,10),(51,'This natural phenomena produces 0-3 (ozone) which helps strenthen the ozone layer of the atmosphere.','What is a lightning strike?',0,0,1,0,11);
/*!40000 ALTER TABLE `clue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game` (
  `gameID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `contestants` varchar(100) DEFAULT NULL,
  `pointInit` int(11) DEFAULT NULL,
  `pointIncr` int(11) DEFAULT NULL,
  `userID` varchar(30) DEFAULT NULL,
  `dateTime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`gameID`),
  KEY `userID` (`userID`),
  CONSTRAINT `game_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game`
--

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game` VALUES (1,'Science','BRAD, BEN , PJ,',100,100,'Butch','10/22/16 01:00am');
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scoreboard`
--

DROP TABLE IF EXISTS `scoreboard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scoreboard` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scoreboard`
--

LOCK TABLES `scoreboard` WRITE;
/*!40000 ALTER TABLE `scoreboard` DISABLE KEYS */;
INSERT INTO `scoreboard` VALUES (1,'Team_1',7400),(2,'Team_2',0),(3,'Team_3',0),(4,'Team_4',0);
/*!40000 ALTER TABLE `scoreboard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('Butch','Butch123');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-02 11:04:30
