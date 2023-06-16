-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2023 at 11:27 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `com_id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `comment_author`, `date`) VALUES
(3, 25, 29, 'asdf', 'arinc_sener_731235', '2023-06-04 21:29:39'),
(4, 28, 29, 'hi friend', 'serkan_genc_724064', '2023-06-04 22:55:45'),
(5, 35, 30, 'hello serkan', 'ahmet_mehmet_752021', '2023-06-04 22:56:53'),
(6, 37, 31, 'hello', 'arinc_sener_731235', '2023-06-04 23:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `topic_id` int NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `topic_id`, `post_content`, `upload_image`, `post_date`) VALUES
(25, 29, 0, 'hello editing', '', '2023-06-04 21:29:31'),
(28, 29, 0, 'another one', '', '2023-06-04 22:45:34'),
(29, 30, 0, '1', '', '2023-06-04 22:56:05'),
(30, 30, 0, '2', '', '2023-06-04 22:56:09'),
(31, 30, 0, '3', '', '2023-06-04 22:56:13'),
(32, 30, 0, '4', '', '2023-06-04 22:56:16'),
(33, 30, 0, '5', '', '2023-06-04 22:56:20'),
(34, 30, 0, '6', '', '2023-06-04 22:56:24'),
(35, 30, 0, 'No', 'search-icon.png.24', '2023-06-04 22:56:29'),
(36, 31, 0, 'asd', '', '2023-06-04 22:57:22'),
(37, 31, 0, 'fds', '', '2023-06-04 22:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `user_name` text NOT NULL,
  `describe_user` varchar(255) NOT NULL,
  `Relationship` text NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birthday` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_cover` varchar(255) NOT NULL,
  `user_reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` text NOT NULL,
  `posts` text NOT NULL,
  `recovery_account` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `user_name`, `describe_user`, `Relationship`, `user_pass`, `user_email`, `user_country`, `user_gender`, `user_birthday`, `user_image`, `user_cover`, `user_reg_date`, `status`, `posts`, `recovery_account`) VALUES
(29, 'arinc', 'sener', 'arinc_sener_731235', 'Testing the description part.....', '', '123456', 'senerar-nc@windowslive.com', 'Turkey', 'Male', '2023-06-10', 'world.jpg.13', 'scenery.jpeg.47', '2023-06-04 21:28:24', 'verified', 'yes', '2025'),
(30, 'serkan', 'genc', 'serkan_genc_724064', 'Hello Instagram.This is my default status.', '........', '123456', 'serkan@gmail.com', 'Turkey', 'Male', '2023-06-08', 'head_turqoise.png', 'default_cover.jpg', '2023-06-04 21:34:05', 'verified', 'yes', 'bunasonrabakacagiz'),
(31, 'ahmet', 'mehmet', 'ahmet_mehmet_752021', 'Hello Instagram.This is my default status.', '........', '123456', 'ahmet@gmail.com', 'United States of America', 'Female', '2023-06-09', 'head_turqoise.png', 'default_cover.jpg', '2023-06-04 22:15:29', 'verified', 'yes', 'bunasonrabakacagiz');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

DROP TABLE IF EXISTS `user_messages`;
CREATE TABLE IF NOT EXISTS `user_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_to` int NOT NULL,
  `user_from` int NOT NULL,
  `msg_body` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msg_seen` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
