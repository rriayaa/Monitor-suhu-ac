/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.4.32-MariaDB-log : Database - ac_system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ac_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `ac_system`;

/*Table structure for table `ac_data` */

DROP TABLE IF EXISTS `ac_data`;

CREATE TABLE `ac_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `temperature` float NOT NULL,
  `humidity` float NOT NULL,
  `workload` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ac_data` */

insert  into `ac_data`(`id`,`temperature`,`humidity`,`workload`,`created_at`) values 
(1,16,20,'Ringan','2024-10-01 17:55:29'),
(2,0,0,'Ringan','2024-10-01 17:58:06'),
(3,78,90,'Berat','2024-10-01 17:59:58'),
(4,78,90,'Berat','2024-10-01 18:07:06'),
(5,34,20,'Berat','2024-10-01 18:19:16'),
(6,50,30,'Berat','2024-10-01 18:19:30'),
(7,30,40,'Berat','2024-10-01 18:21:24'),
(8,70,30,'Berat','2024-10-01 18:23:51'),
(9,50,40,'Berat','2024-10-01 18:27:20'),
(10,67,89,'Berat','2024-10-01 18:31:02'),
(11,30,30,'Berat','2024-10-01 18:33:04'),
(12,16,30,'Ringan','2024-10-01 18:34:36'),
(13,30,12,'Berat','2024-10-01 18:36:36'),
(14,16,20,'AC Mati','2024-10-01 19:00:51'),
(15,30,30,'AC Menyala','2024-10-01 19:05:11'),
(16,19,99,'AC Mati','2024-10-01 19:18:08'),
(17,80,80,'AC Menyala','2024-10-01 19:20:50'),
(18,20,50,'AC Menyala','2024-10-01 19:41:23'),
(19,24,30,'AC Menyala','2024-10-01 19:43:41'),
(20,20,30,'AC Menyala','2024-10-01 19:46:19'),
(21,20,30,'','2024-10-01 20:34:54'),
(22,20,30,'','2024-10-01 20:35:27'),
(23,20,30,'AC Menyala','2024-10-01 20:38:13'),
(24,20,30,'AC Menyala','2024-10-01 20:43:44'),
(25,20,30,'AC Menyala','2024-10-01 20:52:33'),
(26,20,30,'AC Menyala','2024-10-01 20:58:33'),
(27,20,30,'AC Menyala','2024-10-01 21:00:50'),
(28,17,25,'AC Mati','2024-10-01 21:04:01'),
(29,23,25,'AC Menyala','2024-10-01 21:04:12'),
(30,25,30,'AC Menyala','2024-10-01 21:06:07'),
(31,23,30,'AC Menyala','2024-10-01 21:10:39'),
(32,23,30,'AC Menyala','2024-10-01 21:13:37'),
(33,23,30,'AC Menyala','2024-10-01 21:17:35'),
(34,23,30,'AC Menyala','2024-10-01 21:22:16'),
(35,23,30,'AC Menyala','2024-10-01 21:26:21'),
(36,23,30,'AC Menyala','2024-10-01 21:33:12'),
(37,16,20,'AC Mati','2024-10-01 21:45:04'),
(38,20,30,'AC Menyala','2024-10-01 21:45:18'),
(39,20,30,'AC Menyala','2024-10-01 21:45:33');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
