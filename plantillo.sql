-- MySQL dump 10.13  Distrib 5.7.15, for Linux (x86_64)
--
-- Host: localhost    Database: imgur
-- ------------------------------------------------------
-- Server version	5.7.15-0ubuntu0.16.04.1

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
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imgname` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(120) DEFAULT NULL,
  `description` text,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachments`
--

LOCK TABLES `attachments` WRITE;
/*!40000 ALTER TABLE `attachments` DISABLE KEYS */;
INSERT INTO `attachments` VALUES (9,'xnbeqj3wz6o','files/xnbeqj3wz6o.jpg',NULL,'<p>This is Image Description.<br><span class=\"wysiwyg-color-maroon\">These</span> are Black Color, <span class=\"wysiwyg-color-red\">Red</span> , <span class=\"wysiwyg-color-blue\">Blue</span> <span class=\"wysiwyg-color-green\">and</span> <span class=\"wysiwyg-color-orange\">Other<br></span>This is All <span class=\"wysiwyg-color-red\">Done</span>.</p>',1,6,2,NULL,'2016-09-22 09:11:39','2016-09-22 13:30:47'),(10,'dga6qlzwz5j','files/dga6qlzwz5j.jpg',NULL,'<p>This is Image Description.<br><span class=\"wysiwyg-color-maroon\">These</span> are Black Color, <span class=\"wysiwyg-color-red\">Red</span> , <span class=\"wysiwyg-color-blue\">Blue</span> <span class=\"wysiwyg-color-green\">and</span> <span class=\"wysiwyg-color-orange\">Other<br></span>This is All <span class=\"wysiwyg-color-red\">Done</span>.</p>',1,6,2,NULL,'2016-09-22 09:11:40','2016-09-22 13:02:15'),(11,'xkovwv5q4jm','files/xkovwv5q4jm.jpg',NULL,NULL,1,6,2,NULL,'2016-09-22 09:11:40','2016-09-22 09:11:40'),(13,'mydg24v27np','files/mydg24v27np.gif',NULL,'<p>Cool Halloween everywhere.</p>',1,8,2,NULL,'2016-09-22 13:55:58','2016-09-22 13:56:35'),(14,'jyo3wmzqazk','files/jyo3wmzqazk.jpg',NULL,NULL,1,9,2,NULL,'2016-09-22 14:05:21','2016-09-22 14:05:21'),(15,'83m425aqz9n','files/83m425aqz9n.jpg',NULL,NULL,1,10,2,NULL,'2016-09-22 15:14:09','2016-09-22 15:14:09'),(16,'ylvnq6y2d75','files/ylvnq6y2d75.jpg',NULL,NULL,1,10,2,NULL,'2016-09-22 15:14:09','2016-09-22 15:14:09'),(17,'4l8r2xpw3ox','files/4l8r2xpw3ox.jpg',NULL,NULL,1,11,2,NULL,'2016-09-22 15:15:21','2016-09-22 15:15:22'),(18,'5royw9b2m3k','files/5royw9b2m3k.jpg',NULL,NULL,1,11,2,NULL,'2016-09-22 15:15:22','2016-09-22 15:15:22'),(19,'kxm3wnbweda','files/kxm3wnbweda.jpg',NULL,NULL,1,11,2,NULL,'2016-09-22 15:15:22','2016-09-22 15:15:22'),(20,'d3e9qbywnjm','files/d3e9qbywnjm.jpg',NULL,NULL,1,12,2,NULL,'2016-09-22 15:16:43','2016-09-22 15:16:44'),(21,'e8ryqpz2l5d','files/e8ryqpz2l5d.jpg',NULL,NULL,1,12,2,NULL,'2016-09-22 15:16:44','2016-09-22 15:16:44'),(22,'apgkqoa2x7o','files/apgkqoa2x7o.jpg',NULL,NULL,1,12,2,NULL,'2016-09-22 15:16:44','2016-09-22 15:16:44'),(23,'mdgoqkzq7yn','files/mdgoqkzq7yn.jpg',NULL,NULL,1,12,2,NULL,'2016-09-22 15:16:44','2016-09-22 15:16:44'),(24,'onxqak5276p','files/onxqak5276p.jpg',NULL,NULL,1,12,2,NULL,'2016-09-22 15:16:44','2016-09-22 15:16:45'),(25,'kzpwe66qby5','files/kzpwe66qby5.jpg',NULL,NULL,1,12,2,NULL,'2016-09-22 15:16:45','2016-09-22 15:16:45'),(26,'3gr23bpqadb','files/3gr23bpqadb.jpg',NULL,NULL,1,12,2,NULL,'2016-09-22 15:16:45','2016-09-22 15:16:45'),(27,'d5xwr8a2l63','files/d5xwr8a2l63.jpg',NULL,NULL,1,12,2,NULL,'2016-09-22 15:16:45','2016-09-22 15:16:45'),(28,'7p42ga62vn5','files/7p42ga62vn5.gif',NULL,NULL,1,13,2,NULL,'2016-09-22 15:18:35','2016-09-22 15:18:35'),(29,'dlkq87zwypg','files/dlkq87zwypg.gif',NULL,NULL,1,14,2,NULL,'2016-09-22 15:19:45','2016-09-22 15:19:45'),(30,'nygqymkq5lo','files/nygqymkq5lo.jpg',NULL,NULL,1,15,2,NULL,'2016-09-22 15:57:18','2016-09-22 15:57:19'),(31,'5nbwz4n26xg','files/5nbwz4n26xg.png',NULL,NULL,1,15,2,NULL,'2016-09-22 15:57:19','2016-09-22 15:57:19'),(32,'lk9wd5yq6dz','files/lk9wd5yq6dz.jpg','Daughter of Donald Trump',NULL,1,16,2,NULL,'2016-09-22 16:01:27','2016-09-23 23:52:28'),(33,'nbeqjj3qz6o','files/nbeqjj3qz6o.jpg','Ladies and Gentleman - Ivanka Trump',NULL,1,16,2,NULL,'2016-09-22 16:01:28','2016-09-23 23:52:02'),(61,'ydg244v27np','files/ydg244v27np.jpg',NULL,NULL,1,26,2,NULL,'2016-09-22 18:29:42','2016-09-22 18:29:42'),(62,'yo3wm6z2azk','files/yo3wm6z2azk.jpg',NULL,NULL,1,26,2,NULL,'2016-09-22 18:29:42','2016-09-22 18:29:43'),(63,'3m425xawz9n','files/3m425xawz9n.gif',NULL,NULL,1,26,2,NULL,'2016-09-22 18:29:43','2016-09-22 18:29:43'),(64,'lvnq6kywd75','files/lvnq6kywd75.jpg',NULL,NULL,1,27,2,NULL,'2016-09-23 23:43:12','2016-09-23 23:43:12'),(66,'royw9eb2m3k','files/royw9eb2m3k.jpg',NULL,NULL,1,29,2,NULL,'2016-09-24 23:48:15','2016-09-24 23:48:15'),(67,'xm3wnvb2eda','files/xm3wnvb2eda.jpg',NULL,NULL,1,30,2,NULL,'2016-09-24 23:50:10','2016-09-24 23:50:10'),(68,'3e9qb5yqnjm','files/3e9qb5yqnjm.png',NULL,NULL,1,31,2,NULL,'2016-09-24 23:52:23','2016-09-24 23:52:23'),(69,'8ryqp8z2l5d','files/8ryqp8z2l5d.jpg',NULL,NULL,1,32,2,NULL,'2016-09-24 23:56:20','2016-09-24 23:56:21');
/*!40000 ALTER TABLE `attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Funny','Funny',NULL,NULL),(2,'Science & Tech','Science & Tech',NULL,NULL),(3,'Politics','All about Politics & Politicians','2016-09-24 21:58:42','2016-09-24 21:59:05');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `report` tinyint(4) DEFAULT NULL,
  `posts_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (2,'how about this ?',1,3,1,'2016-09-21 17:01:24','2016-09-21 22:12:58'),(5,'Ok! Looks All good',1,3,1,'2016-09-21 22:12:32','2016-09-21 22:14:35'),(7,'Sean Preston!  - The Scream is so Real - Check out her instagram.',1,NULL,26,'2016-09-24 03:38:48','2016-09-24 03:38:48'),(9,'Ivanka - Marry me for your money.',1,NULL,16,'2016-09-24 17:49:06','2016-09-24 17:49:06'),(10,'Donald - How can you bankrupt 4 companies.',1,NULL,16,'2016-09-24 17:50:01','2016-09-24 17:50:01'),(11,'Hello Cock - Bang Cock',1,NULL,27,'2016-09-25 00:14:51','2016-09-25 00:14:51'),(12,'Hello Introvert.',1,NULL,6,'2016-09-25 04:17:25','2016-09-25 04:17:25');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `report` tinyint(4) DEFAULT NULL,
  `admin_post` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_url` varchar(250) DEFAULT NULL,
  `views` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (6,'Introvert Pain','<p>How do you feel being introvert ?</p>',1,1,1,1,NULL,'2016-09-22 09:11:39','2016-09-23 14:47:56','knygqyk25lo',5),(8,'Are Halloween Cool ?',NULL,1,1,1,1,NULL,'2016-09-22 13:55:57','2016-09-23 06:30:24','mlk9wdyw6dz',1),(9,'Mickey is a Mouse ?','<p>I always wanted to know, if mickey is mouse ?</p>',1,1,1,1,NULL,'2016-09-22 14:05:21','2016-09-22 14:06:15','xnbeqj3wz6o',NULL),(10,'Are you Introvert ?','<p>I m deep introvert.</p>',1,1,1,1,NULL,'2016-09-22 15:14:08','2016-09-22 15:14:56','dga6qlzwz5j',NULL),(11,'Dare Devil - Man climbs sky scraper','<p>can you dare ?</p>',1,1,1,1,NULL,'2016-09-22 15:15:21','2016-09-23 21:21:42','xkovwv5q4jm',3),(12,'Healthy Food for Healthy People','<p>This is all about Amazing Foods.</p>',1,1,1,1,NULL,'2016-09-22 15:16:43','2016-09-22 15:18:15','7bpoq7owx4z',NULL),(13,'Day when your Crush Marry :(','<p>My crush is getting married - What should i do ?</p>',1,1,1,1,NULL,'2016-09-22 15:18:34','2016-09-22 15:19:26','mydg24v27np',NULL),(14,'My crush - You Gotta problem ?','<p>How my crush reacts - when other gets a problem ~ Bruh Bruh - No</p>',1,1,1,1,NULL,'2016-09-22 15:19:45','2016-09-22 15:20:41','jyo3wmzqazk',NULL),(15,'McDonald Secret Item','<p>And I am still alive.</p>',1,1,1,1,NULL,'2016-09-22 15:57:18','2016-09-22 15:59:48','83m425aqz9n',NULL),(16,'When Hot makes business Hotter','<p>Are you feeling Heat too ?</p>',1,1,1,1,NULL,'2016-09-22 16:01:27','2016-09-24 11:31:23','ylvnq6y2d75',2),(26,'Britney was just nailed','<p>Sean - You make the internet goes on zoom - pause zoom zoom today.</p>',1,1,1,1,NULL,'2016-09-22 18:29:42','2016-09-24 03:40:40','3gr23bpqadb',2),(27,'That\'s my Farm Cock','<p>Do you do farming ? Do you have hen - My Farm cock can make you hen lay egg ! Interested ? Comment down below.</p>',1,1,2,1,NULL,'2016-09-23 23:43:12','2016-09-25 06:53:20','d5xwr8a2l63',3),(29,'Is this equality ?','<p>Do you call this equality ?</p>',1,1,3,1,NULL,'2016-09-24 23:48:14','2016-09-24 23:49:11','dlkq87zwypg',NULL),(30,'Alcohol Weekend','<p>What is Alcohol like ?</p>',1,1,1,1,NULL,'2016-09-24 23:50:09','2016-09-24 23:51:08','nygqymkq5lo',NULL),(31,'Relationship Goals','<p>Be Naked, when i come home.</p>',1,1,1,1,NULL,'2016-09-24 23:52:23','2016-09-24 23:52:55','5nbwz4n26xg',NULL),(32,'Weight Loss Initiaitve','<p>Any one can loose weight within first week ad so.</p>',1,1,1,3,NULL,'2016-09-24 23:56:20','2016-09-25 03:42:55','lk9wd5yq6dz',NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `replies` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `report` tinyint(4) DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (3,'Check this shit out.',1,1,12,'2016-09-25 04:18:06','2016-09-25 04:18:06'),(4,'Thailand - Bang-a-loru',1,1,11,'2016-09-25 06:59:20','2016-09-25 06:59:20');
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `title` varchar(120) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `header` text,
  `footer` text,
  `is_maintenance` tinyint(4) DEFAULT NULL,
  `maintenance` text,
  `disable_form_registration` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `themes` int(11) DEFAULT NULL,
  `user_theme` tinyint(4) DEFAULT NULL,
  `home_layout` varchar(250) DEFAULT 'welcome',
  `wysiwyg_user` tinyint(4) DEFAULT NULL,
  `wysiwyg_admin` tinyint(4) DEFAULT NULL,
  `allow_html` tinyint(4) DEFAULT '1',
  `allow_html_admin` tinyint(4) DEFAULT '1',
  `comments` tinyint(4) DEFAULT '1',
  `disqus_code` text,
  `fb_embed` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES ('Img-Social - The Best Image - Story Sharing Network','Img-Social','Imgur - The Best Image sharing Network on Internet','<style>textarea:focus, input:focus{outline: none !important;border: 1px solid #4a4848 !important;border-color: #4a4848 !important; -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(93, 93, 93, 0.6) !important;box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(93, 93, 93, 0.6) !important;}.form-control {color: #9e9e9e;background-color: #3e3e3e;}.dropzone{background:#4a4848 !important;}</style>',NULL,2,'Site under maintenance',2,'2016-09-18 19:54:28','2016-09-25 08:39:37',1,4,1,NULL,2,1,1,1,1,NULL,NULL);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_accounts` (
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_accounts`
--

LOCK TABLES `social_accounts` WRITE;
/*!40000 ALTER TABLE `social_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` tinyint(4) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `themes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `username_3` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator',NULL,1,'ifreelanceasia@gmail.com','$2y$10$GZCMuBjbFIKtoE2lMLnwC.PFl6hFGaTxyUNxmL0DwHw512qDuI1T.','Om1cJakTuFKEuBd47brNWdz7DJ4vSm3aeyKyS3rpkyhzqDwFnhV83TKgsB9K','2016-09-17 16:25:12','2016-09-25 21:26:29','files/lkzpwe6qby5_avatar.png',4),(2,'SecondUser','seconduser@mailinator.com',9,'seconduser@mailinator.com','$2y$10$YNqEBjKeYr.IU4fqUDsU4uBkbUN/A/BOM0yjvFNBL..o.FZp3kKaq',NULL,'2016-09-23 14:44:02','2016-09-25 08:06:31','http://www.gravatar.com/avatar/33ac143d04eeb5026ac3ab1585466c1c.jpg?s=80&d=mm&r=g',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voters`
--

DROP TABLE IF EXISTS `voters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voters` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) DEFAULT NULL,
  `vote_up` tinyint(4) DEFAULT NULL,
  `vote_down` tinyint(4) DEFAULT NULL,
  `heart` tinyint(4) DEFAULT NULL,
  `broken` tinyint(4) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_id` bigint(20) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voters`
--

LOCK TABLES `voters` WRITE;
/*!40000 ALTER TABLE `voters` DISABLE KEYS */;
INSERT INTO `voters` VALUES (2,6,NULL,NULL,1,NULL,1,NULL,1,'2016-09-22 09:18:02','2016-09-22 09:18:04'),(3,13,NULL,NULL,NULL,1,1,NULL,1,'2016-09-22 15:21:42','2016-09-22 15:21:42'),(4,8,1,NULL,NULL,NULL,1,NULL,1,'2016-09-22 15:21:48','2016-09-22 15:21:48'),(5,26,NULL,NULL,1,NULL,1,NULL,1,'2016-09-22 22:16:29','2016-09-24 03:39:43'),(6,11,NULL,NULL,NULL,1,1,NULL,1,'2016-09-23 11:52:42','2016-09-24 11:31:38'),(7,26,1,NULL,NULL,NULL,2,NULL,1,'2016-09-23 14:49:01','2016-09-23 14:49:01'),(8,16,NULL,NULL,1,NULL,1,NULL,1,'2016-09-23 23:54:00','2016-09-24 17:49:25'),(9,15,NULL,NULL,1,NULL,1,NULL,1,'2016-09-24 05:03:43','2016-09-24 05:03:43'),(10,27,NULL,1,NULL,NULL,1,NULL,2,'2016-09-25 00:25:31','2016-09-25 00:25:31');
/*!40000 ALTER TABLE `voters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widgets`
--

DROP TABLE IF EXISTS `widgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `content` text,
  `position` int(11) DEFAULT NULL,
  `page` tinyint(4) DEFAULT NULL,
  `location` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widgets`
--

LOCK TABLES `widgets` WRITE;
/*!40000 ALTER TABLE `widgets` DISABLE KEYS */;
/*!40000 ALTER TABLE `widgets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-26  9:08:55
