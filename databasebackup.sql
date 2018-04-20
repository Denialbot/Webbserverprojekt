-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: example
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `blogposts`
--

DROP TABLE IF EXISTS `blogposts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogposts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(1000) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `HasImage` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1261 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogposts`
--

LOCK TABLES `blogposts` WRITE;
/*!40000 ALTER TABLE `blogposts` DISABLE KEYS */;
INSERT INTO `blogposts` VALUES (1256,'1.\r\nNÃ¤r en klient (webblÃ¤sare) frÃ¥gar efter tillgÃ¥ng till en webbsida\r\nsÃ¥ kommer servern fÃ¶rst att lokalisera filen,\r\nsedan kan servern ta vidare Ã¥tgÃ¤rder beroende pÃ¥ filtypen.\r\nNÃ¤r det gÃ¤ller PHP-filer (som denna hemsida anvÃ¤nder) sÃ¥ innehÃ¥ller filen\r\nskript, som servern utfÃ¶r.\r\nSedan skickas den fÃ¤rdiga filen till klienten, som lÃ¤ser in och visar upp hemsidan.',2,'Blogposten, del 1',1),(1258,'2.\r\nHemsidan utvecklades med programvaran VirtualBox, som lÃ¥ter anvÃ¤ndaren\r\nskapa en sÃ¥ kallad virtuell maskin, vilket kan liknas till en andra dator, dÃ¤r programvaran Apache sedan\r\ninstalleras, vilket skapar en webbserver som hanterar hemsidan. FÃ¶r att fÃ¶renkla processen att starta upp\r\nservern sÃ¥ anvÃ¤nds programmet Vagrant.\r\n\r\nNÃ¤r en klient (anvÃ¤ndare, oftast via en webblÃ¤sare) vill nÃ¥ en hemsida sÃ¥ skickas en\r\nfÃ¶rfrÃ¥gan till servern. FÃ¶r att skicka fÃ¶rfrÃ¥gan till rÃ¤tt plats sÃ¥\r\nanvÃ¤nds nÃ¤tverksprotokollet IP (Internet Protocol), dÃ¤r varje maskin med uppkoppling\r\ntill Internet Ã¤r/var menad att ha en unik adress/sifferkombination.',2,'Blogposten, del 2',1),(1259,'(FortsÃ¤ttning pÃ¥ punkt 2)\r\n\r\nNÃ¤r en fÃ¶rfrÃ¥gan skickats till servern sÃ¥ kommer servern fÃ¶rst att lokalisera filen\r\nsom ska skickas tillbaka. PÃ¥ servern sÃ¥ anvÃ¤nds skriptsprÃ¥ket PHP, som anvÃ¤nds\r\nfÃ¶r att skapa hemsidor som inte Ã¤r statiska (alla bloggpostar anvÃ¤nder exempelvis samma sida,\r\nmen olika vÃ¤rden har skickats frÃ¥n klienten fÃ¶r att ladda in olika sidor).\r\n\r\nSom del av skriptsprÃ¥kets process sÃ¥ interagerar servern Ã¤ven med en databas, dÃ¤r information om sÃ¥dant som anvÃ¤ndare, bloggpostar eller kommentarer\r\nsparas i separata tabeller. Som exempel sÃ¥ skickas en frÃ¥ga till databasen fÃ¶r att servern ska lÃ¤sa in denna bloggpost: bÃ¥de texten och titeln sparas i databasen.',2,'Blogposten, del 3',1),(1260,'3.\r\nDenna hemsida Ã¤r sÃ¥rbar mot fÃ¶ljande attacker:\r\n- Injektion: textinput som kopplas mot en databas kollar inte om texten Ã¤r skadlig (ett SQL-query eller statements som alltid Ã¤r sanna)\r\n- Svag inloggning: alla anvÃ¤ndare som registreras Ã¤r administratÃ¶rer, det nuvarande administratÃ¶rskontot har ett mycket svagt lÃ¶senord. Misslyckade inloggningsfÃ¶rsÃ¶k ger inte nÃ¥gra konsekvenser\r\n- KÃ¤nslig data krypteras inte pÃ¥ nÃ¥gon del av servern\r\n- Servern saknar sÃ¤kerhetsinstÃ¤llningar Ã¶verlag\r\n- Hemsidan har inget skydd mot XSS utÃ¶ver det som PHP ger per automatik\r\n- Serverns komponenter kan mÃ¶jligtvis vara (och kommer troligt att bli) utdaterade\r\n- Hemsidan skapar inte loggar',2,'Blogposten, del 4',1);
/*!40000 ALTER TABLE `blogposts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Comment` varchar(255) DEFAULT NULL,
  `Poster` varchar(40) DEFAULT NULL,
  `PostID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Hej','Jan',1242),(2,'Hej Igen','Jan',1242),(3,'hej','jan',1242),(4,'De olika problemen Ã¤r separerade med -.','Admin',1260);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `post_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (7,'Rad Drogo.jpg1524055477.image',1256),(9,'The Bearbarian.jpg1524056120.image',1258),(10,'UAq0OiMRZg4Q9ElW04dWN2liNg4yXtelT_bLCuX9Ssk.jpg1524056205.image',1259),(11,'yjCV4D85kwmU490zn_MLRoGNbOfO817qkKPxOF0GiPs.png1524056602.image',1260);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'jan','ost'),(2,'Admin','themostoverkillpasswordevercreated'),(3,'HashTest','$2y$10$3xQ0pytuaf6yn7ucpzhn0.xcHwQi3c1aV54TLxmY43HdAki5Xtoz.'),(4,'janne','$2y$10$88xkEsauJLdE6ofrB2aH6u6T5Q9p3YnYCs.zHOF.wka2d2mMDYWwS');
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

-- Dump completed on 2018-04-20  7:20:28
