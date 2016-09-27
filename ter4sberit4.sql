/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.15-0ubuntu0.16.04.1 : Database - ter4sberit4
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ter4sberit4` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ter4sberit4`;

/*Table structure for table `bo_group` */

DROP TABLE IF EXISTS `bo_group`;

CREATE TABLE `bo_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_alias` varchar(255) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `isSupervisor` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bo_group` */

insert  into `bo_group`(`group_id`,`group_alias`,`isAdmin`,`isSupervisor`) values (1,'Administrator',1,1),(2,'Moderator',0,1);

/*Table structure for table `bo_logs` */

DROP TABLE IF EXISTS `bo_logs`;

CREATE TABLE `bo_logs` (
  `logs_id` int(11) NOT NULL AUTO_INCREMENT,
  `logs_action` varchar(50) DEFAULT NULL,
  `logs_desc` text,
  `user_id` int(11) DEFAULT NULL,
  `isSuccess` tinyint(1) DEFAULT NULL,
  `logs_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`logs_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `bo_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bo_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bo_logs` */

/*Table structure for table `bo_user` */

DROP TABLE IF EXISTS `bo_user`;

CREATE TABLE `bo_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password_old` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` char(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `bo_user_ibfk_1` (`group_id`),
  CONSTRAINT `bo_user_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `bo_group` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bo_user` */

insert  into `bo_user`(`id`,`username`,`password_old`,`password`,`full_name`,`email`,`group_id`,`date_create`) values (2,'theprogrammer','405e9bc94b09ffd77a7e26c1c9156c1f','405e9bc94b09ffd77a7e26c1c9156c1f','The Programmer','theprogrammer@gmail.com',1,'2016-09-14 13:43:51');

/*Table structure for table `fn_category` */

DROP TABLE IF EXISTS `fn_category`;

CREATE TABLE `fn_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_alias` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `category_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `fn_category` */

insert  into `fn_category`(`category_id`,`category_alias`,`is_active`,`category_timestamp`) values (1,'Teras Sukabumi',1,'2016-09-18 19:07:17'),(2,'Teras Nasional',1,'2016-09-18 19:07:18'),(3,'Teras Cianjur',1,'2016-09-18 19:07:19'),(4,'Teras News',1,'2016-09-18 19:07:26');

/*Table structure for table `fn_news` */

DROP TABLE IF EXISTS `fn_news`;

CREATE TABLE `fn_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_url` text,
  `news_title` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `news_desc` text,
  `news_thumb` text,
  `news_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `news_views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`news_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `fn_news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bo_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `fn_news` */

insert  into `fn_news`(`news_id`,`news_url`,`news_title`,`user_id`,`news_desc`,`news_thumb`,`news_timestamp`,`news_views`) values (1,'berita-anak-hilang','Beita anak hilang',2,'ini deskrisi',NULL,'2016-09-18 19:06:00',0);

/*Table structure for table `fn_news_breaking` */

DROP TABLE IF EXISTS `fn_news_breaking`;

CREATE TABLE `fn_news_breaking` (
  `breaking_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) DEFAULT NULL,
  `date_from` datetime DEFAULT NULL,
  `date_to` datetime DEFAULT NULL,
  `isActive` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`breaking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fn_news_breaking` */

/*Table structure for table `fn_news_comment` */

DROP TABLE IF EXISTS `fn_news_comment`;

CREATE TABLE `fn_news_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_text` text,
  `comment_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `news_id` int(11) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `news_id` (`news_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `fn_news_comment_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `fn_news` (`news_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fn_news_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `bo_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fn_news_comment` */

/*Table structure for table `fn_news_seens` */

DROP TABLE IF EXISTS `fn_news_seens`;

CREATE TABLE `fn_news_seens` (
  `seens_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) DEFAULT NULL,
  `seens_ip` varchar(50) DEFAULT NULL,
  `seens_comment` text,
  `seens_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isLogin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`seens_id`),
  KEY `fn_news_seens_ibfk_1` (`news_id`),
  CONSTRAINT `fn_news_seens_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `fn_news` (`news_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fn_news_seens` */

/*Table structure for table `fn_pages` */

DROP TABLE IF EXISTS `fn_pages`;

CREATE TABLE `fn_pages` (
  `pages_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT NULL,
  `pages_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pages_id`),
  KEY `news_id` (`news_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `fn_pages_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `fn_news` (`news_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fn_pages_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `fn_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `fn_pages` */

insert  into `fn_pages`(`pages_id`,`news_id`,`category_id`,`isActive`,`pages_timestamp`) values (1,1,4,1,'2016-09-18 19:08:18');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
