/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 5.5.59 : Database - oroqscholarshipdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`oroqscholarshipdb` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `oroqscholarshipdb`;

/*Table structure for table `auth_groups_users` */

DROP TABLE IF EXISTS `auth_groups_users`;

CREATE TABLE `auth_groups_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

/*Table structure for table `auth_identities` */

DROP TABLE IF EXISTS `auth_identities`;

CREATE TABLE `auth_identities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text,
  `force_reset` tinyint(1) NOT NULL DEFAULT '0',
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_secret` (`type`,`secret`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

/*Table structure for table `auth_logins` */

DROP TABLE IF EXISTS `auth_logins`;

CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_identifier` (`id_type`,`identifier`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

/*Table structure for table `auth_permissions_users` */

DROP TABLE IF EXISTS `auth_permissions_users`;

CREATE TABLE `auth_permissions_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_permissions_users_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `auth_remember_tokens` */

DROP TABLE IF EXISTS `auth_remember_tokens`;

CREATE TABLE `auth_remember_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`),
  KEY `auth_remember_tokens_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `auth_token_logins` */

DROP TABLE IF EXISTS `auth_token_logins`;

CREATE TABLE `auth_token_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_identifier` (`id_type`,`identifier`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `sys_sequence` */

DROP TABLE IF EXISTS `sys_sequence`;

CREATE TABLE `sys_sequence` (
  `Sys_ID` int(50) NOT NULL AUTO_INCREMENT,
  `seq_name` varchar(50) NOT NULL,
  `seq_year` int(50) NOT NULL,
  `seq_sem` int(50) NOT NULL,
  `seq_appno` int(50) NOT NULL,
  PRIMARY KEY (`Sys_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `table_colcourse` */

DROP TABLE IF EXISTS `table_colcourse`;

CREATE TABLE `table_colcourse` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `colCourse` varchar(50) NOT NULL,
  `colManager` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

/*Table structure for table `table_collegeapp` */

DROP TABLE IF EXISTS `table_collegeapp`;

CREATE TABLE `table_collegeapp` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `colAppNoYear` int(10) NOT NULL,
  `colAppNoID` int(10) NOT NULL,
  `colAppNoSem` int(10) NOT NULL,
  `colAppStat` varchar(50) NOT NULL,
  `colFirstName` varchar(50) DEFAULT NULL,
  `colLastName` varchar(50) NOT NULL,
  `colMI` varchar(50) DEFAULT NULL,
  `colSuffix` varchar(50) DEFAULT NULL,
  `colAddress` varchar(200) NOT NULL,
  `colDOB` varchar(50) NOT NULL,
  `colAge` varchar(50) NOT NULL,
  `colCivilStat` varchar(50) NOT NULL,
  `colGender` varchar(50) NOT NULL,
  `colContactNo` varchar(50) NOT NULL,
  `colCTC` varchar(50) NOT NULL,
  `colEmailAdd` varchar(50) DEFAULT NULL,
  `colAvailment` varchar(50) NOT NULL,
  `colSchool` varchar(200) NOT NULL,
  `colSchoolAddress` varchar(200) DEFAULT NULL,
  `colCourse` varchar(200) NOT NULL,
  `colYearLevel` varchar(50) NOT NULL,
  `colSem` varchar(50) NOT NULL,
  `colSY` varchar(50) NOT NULL,
  `colFathersName` varchar(50) NOT NULL,
  `colFatherOccu` varchar(50) NOT NULL,
  `colMothersName` varchar(50) NOT NULL,
  `colMotherOccu` varchar(50) NOT NULL,
  `colManager` varchar(50) NOT NULL,
  `colUnits` varchar(50) NOT NULL,
  `colImage` longblob,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5985 DEFAULT CHARSET=utf8;

/*Table structure for table `table_colonlineapplication` */

DROP TABLE IF EXISTS `table_colonlineapplication`;

CREATE TABLE `table_colonlineapplication` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `TimeStamp` varchar(50) NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `Availment` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `Barangay` varchar(50) NOT NULL,
  `Purok` varchar(50) DEFAULT NULL,
  `Street` varchar(50) DEFAULT NULL,
  `DateOfBirth` varchar(50) NOT NULL,
  `ContactNumber` varchar(50) NOT NULL,
  `CivilStatus` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `NameOfSchool` varchar(100) NOT NULL,
  `Semester` varchar(50) NOT NULL,
  `SchoolYear` varchar(50) NOT NULL,
  `SchoolAddress` varchar(100) NOT NULL,
  `YearLevel` varchar(50) NOT NULL,
  `Course` varchar(100) NOT NULL,
  `Units` varchar(50) NOT NULL,
  `FathersName` varchar(50) NOT NULL,
  `FathersOccupation` varchar(50) NOT NULL,
  `MothersName` varchar(50) NOT NULL,
  `MothersOccupation` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2962 DEFAULT CHARSET=utf8;

/*Table structure for table `table_colschool` */

DROP TABLE IF EXISTS `table_colschool`;

CREATE TABLE `table_colschool` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `colSchoolName` varchar(50) NOT NULL,
  `colManager` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

/*Table structure for table `table_login` */

DROP TABLE IF EXISTS `table_login`;

CREATE TABLE `table_login` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MidIn` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `ConfirmPassword` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Table structure for table `table_scholarregistration` */

DROP TABLE IF EXISTS `table_scholarregistration`;

CREATE TABLE `table_scholarregistration` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `AppNoYear` int(4) DEFAULT NULL,
  `AppNoID` int(50) DEFAULT NULL,
  `AppNoSem` int(2) DEFAULT NULL,
  `AppStatus` varchar(50) NOT NULL,
  `AppFirstName` varchar(50) DEFAULT NULL,
  `AppMidIn` varchar(50) DEFAULT NULL,
  `AppLastName` varchar(50) DEFAULT NULL,
  `AppSuffix` varchar(50) DEFAULT NULL,
  `AppAddress` varchar(100) DEFAULT NULL,
  `AppDOB` varchar(50) DEFAULT NULL,
  `AppAge` int(5) DEFAULT NULL,
  `AppCivilStat` varchar(50) DEFAULT NULL,
  `AppGender` varchar(50) DEFAULT NULL,
  `AppContact` varchar(50) DEFAULT NULL,
  `AppCTC` varchar(50) DEFAULT NULL,
  `AppEmailAdd` varchar(50) DEFAULT NULL,
  `AppAvailment` int(5) DEFAULT NULL,
  `AppSchool` varchar(100) DEFAULT NULL,
  `AppCourse` varchar(50) DEFAULT NULL,
  `AppYear` varchar(50) DEFAULT NULL,
  `AppSem` varchar(10) DEFAULT NULL,
  `AppSY` varchar(50) DEFAULT NULL,
  `AppFather` varchar(50) DEFAULT NULL,
  `AppFatherOccu` varchar(50) DEFAULT NULL,
  `AppMother` varchar(50) DEFAULT NULL,
  `AppMotherOccu` varchar(50) DEFAULT NULL,
  `AppManager` varchar(50) DEFAULT NULL,
  `AppImage` longblob,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5364 DEFAULT CHARSET=utf8;

/*Table structure for table `table_schoolname` */

DROP TABLE IF EXISTS `table_schoolname`;

CREATE TABLE `table_schoolname` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `SchoolName` varchar(50) NOT NULL,
  `Manager` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

/*Table structure for table `table_strand` */

DROP TABLE IF EXISTS `table_strand`;

CREATE TABLE `table_strand` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `Strand` varchar(50) NOT NULL,
  `Manager` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Table structure for table `table_tvet` */

DROP TABLE IF EXISTS `table_tvet`;

CREATE TABLE `table_tvet` (
  `ID` int(50) NOT NULL AUTO_INCREMENT,
  `colAppNoYear` int(10) NOT NULL,
  `colAppNoID` int(10) NOT NULL,
  `colAppNoSem` int(10) NOT NULL,
  `colAppStat` varchar(50) NOT NULL,
  `colFirstName` varchar(100) NOT NULL,
  `colLastName` varchar(100) NOT NULL,
  `colMI` varchar(100) NOT NULL,
  `colSuffix` varchar(50) NOT NULL,
  `colAddress` varchar(200) NOT NULL,
  `colDOB` varchar(50) NOT NULL,
  `colAge` varchar(50) NOT NULL,
  `colCivilStat` varchar(50) NOT NULL,
  `colGender` varchar(50) NOT NULL,
  `colContactNo` varchar(50) NOT NULL,
  `colCTC` varchar(50) NOT NULL,
  `colEmailAdd` varchar(50) NOT NULL,
  `colAvailment` varchar(50) NOT NULL,
  `colSchool` varchar(200) NOT NULL,
  `colSchoolAddress` varchar(200) NOT NULL,
  `colCourse` varchar(200) NOT NULL,
  `colYearLevel` varchar(50) NOT NULL,
  `colSem` varchar(50) NOT NULL,
  `colSY` varchar(50) NOT NULL,
  `colFathersName` varchar(500) NOT NULL,
  `colFatherOccu` varchar(500) NOT NULL,
  `colMothersName` varchar(500) NOT NULL,
  `colMotherOccu` varchar(500) NOT NULL,
  `colManager` varchar(50) NOT NULL,
  `colUnits` varchar(50) NOT NULL,
  `colImage` longblob,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
