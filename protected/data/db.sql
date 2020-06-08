-- MySQL dump 10.13  Distrib 5.5.32, for Linux (x86_64)
--
-- Host: localhost    Database: podelimo_languages
-- ------------------------------------------------------
-- Server version	5.5.32-cll-lve

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
-- Table structure for table `authassignment`
--

DROP TABLE IF EXISTS `authassignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authassignment` (
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `userid` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authassignment`
--

LOCK TABLES `authassignment` WRITE;
/*!40000 ALTER TABLE `authassignment` DISABLE KEYS */;
INSERT INTO `authassignment` VALUES ('Admin','2',NULL,'N;'),('Moderator','3',NULL,'N;');
/*!40000 ALTER TABLE `authassignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authitem`
--

DROP TABLE IF EXISTS `authitem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authitem` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `bizrule` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authitem`
--

LOCK TABLES `authitem` WRITE;
/*!40000 ALTER TABLE `authitem` DISABLE KEYS */;
INSERT INTO `authitem` VALUES ('Admin',2,'Admin role',NULL,'N;'),('Foods.*',1,NULL,NULL,'N;'),('Foods.Admin',0,NULL,NULL,'N;'),('Foods.Create',0,NULL,NULL,'N;'),('Foods.Delete',0,NULL,NULL,'N;'),('Foods.Index',0,NULL,NULL,'N;'),('Foods.Update',0,NULL,NULL,'N;'),('Foods.View',0,NULL,NULL,'N;'),('Generic.*',1,NULL,NULL,'N;'),('Generic.FlashNotification',0,NULL,NULL,'N;'),('Generic.RefreshFlashAlert',0,NULL,NULL,'N;'),('Moderator',2,'Moderator role',NULL,'N;'),('Site.*',1,NULL,NULL,'N;'),('Site.Error',0,NULL,NULL,'N;'),('Site.Index',0,NULL,NULL,'N;'),('Site.Login',0,NULL,NULL,'N;'),('Site.Logout',0,NULL,NULL,'N;'),('UserPosts.*',1,NULL,NULL,'N;'),('Users.*',1,NULL,NULL,'N;'),('Users.Admin',0,NULL,NULL,'N;'),('Users.AssignRole',0,NULL,NULL,'N;'),('Users.Create',0,NULL,NULL,'N;'),('Users.Delete',0,NULL,NULL,'N;'),('Users.Index',0,NULL,NULL,'N;'),('Users.ReloadRoles',0,NULL,NULL,'N;'),('Users.RevokeRole',0,NULL,NULL,'N;'),('Users.Update',0,NULL,NULL,'N;'),('Users.UpdatePassword',0,NULL,NULL,'N;'),('Users.View',0,NULL,NULL,'N;');
/*!40000 ALTER TABLE `authitem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authitemchild`
--

DROP TABLE IF EXISTS `authitemchild`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `authitemchild` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authitemchild`
--

LOCK TABLES `authitemchild` WRITE;
/*!40000 ALTER TABLE `authitemchild` DISABLE KEYS */;
/*!40000 ALTER TABLE `authitemchild` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `backend_user`
--

DROP TABLE IF EXISTS `backend_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backend_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backend_user`
--

LOCK TABLES `backend_user` WRITE;
/*!40000 ALTER TABLE `backend_user` DISABLE KEYS */;
INSERT INTO `backend_user` VALUES (2,'nikola','Nikola','Ristivojevic','0642468237','nikolaristivojevic@gmail.com','9365ea12b2d910e1aceaac190fbc97a5',1),(3,'test','','','','','9365ea12b2d910e1aceaac190fbc97a5',0);
/*!40000 ALTER TABLE `backend_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `code` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'English','en');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rights`
--

DROP TABLE IF EXISTS `rights`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rights` (
  `itemname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rights`
--

LOCK TABLES `rights` WRITE;
/*!40000 ALTER TABLE `rights` DISABLE KEYS */;
/*!40000 ALTER TABLE `rights` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translation`
--

DROP TABLE IF EXISTS `translation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` text NOT NULL,
  `translation` text NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `word_type_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `word_type_id` (`word_type_id`),
  KEY `language_id` (`language_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `translation_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `backend_user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `translation_ibfk_1` FOREIGN KEY (`word_type_id`) REFERENCES `word_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `translation_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translation`
--

LOCK TABLES `translation` WRITE;
/*!40000 ALTER TABLE `translation` DISABLE KEYS */;
INSERT INTO `translation` VALUES (4,'test','test',1,1,2),(5,'test','test',1,1,2),(6,'test','test',1,1,2);
/*!40000 ALTER TABLE `translation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `word_types`
--

DROP TABLE IF EXISTS `word_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `word_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `word_types`
--

LOCK TABLES `word_types` WRITE;
/*!40000 ALTER TABLE `word_types` DISABLE KEYS */;
INSERT INTO `word_types` VALUES (1,'Verb','A verb is a word that relays what a particular subject is or does. It is a descriptive word. Some examples of verbs include run, sing, and plays. The verb is considered the “king” of English grammar because it can be used to make a single-word sentence such as “Run!” No other type of word (such as a noun or adjective) can produce a one-word sentence.'),(2,'Noun','A noun is a person, place, or thing. For example, a writer, library, and novel are all nouns.'),(3,'Adjective','An adjective compliments the noun in a sentence. It does so by telling us more about the noun. Note this rule is also applicable to noun phrases and pronouns. Essentially the adjective modifies the noun. For example, in the sentence “I ride a small horse,” the adjective is small.'),(4,'Adverb','Much like an adjective, an adverb also tells us more about a word. This time, the rule applies to verbs. An example of an adverb in action can be found the sentence “I type fast.” Fast is the adverb in the sentence as it modifies the verb, type.'),(5,'Pronoun','Pronouns are simply short words that replace a noun. Pronouns can be used in lieu of nouns. Each, some, themselves, you, she, are all examples of pronouns.'),(6,'Preposition','The preposition generally precedes a noun or pronoun. It is used to express a relation to another element or word. Before is the preposition in the following sentence: “He arrived after breakfast.”'),(7,'Conjunction','Conjunctions are used to join two parts of a sentence. Common conjunctions include and, or, nor, for, but, since, unless, and although.'),(8,'Interjection','Interjections are also small words. They are essentially short exclamations such as Hi!, Ah!, Um or Ugh! as in Schoolwork Ugh!.');
/*!40000 ALTER TABLE `word_types` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-21 19:41:41
