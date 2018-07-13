-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2018 at 11:41 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.2.4-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adoptunboss`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `name`) VALUES
(3, 'BTP'),
(2, 'Hotellerie'),
(1, 'Informatiques'),
(4, 'Restauration');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `offers_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `full_name` varchar(45) NOT NULL,
  `content` text NOT NULL,
  `title` varchar(45) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employments`
--

CREATE TABLE `employments` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `has_period` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Ex : CDI, CDD';

--
-- Dumping data for table `employments`
--

INSERT INTO `employments` (`id`, `name`, `has_period`) VALUES
(1, 'CDD', 1),
(2, 'CDI', 0),
(3, 'Intérim', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_content` text NOT NULL,
  `content` text NOT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `short_content`, `content`, `latitude`, `longitude`, `start_date`, `end_date`, `created_date`, `updated_date`) VALUES
(1, 'Montpellier Play Weeks', 'Lorem ipsum Lorem ipsumLorem ipsumLorem ipsum', 'Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum', '43.610769', '3.8767159999999876', '2018-07-11 00:00:00', '2018-07-13 00:00:00', '2018-07-12 16:08:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matchs`
--

CREATE TABLE `matchs` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `offers_id` int(11) NOT NULL,
  `indice` int(11) NOT NULL,
  `view` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`id`, `users_id`, `offers_id`, `indice`, `view`) VALUES
(3, 2, 2, 75, 1),
(4, 2, 3, 74, 1),
(6, 2, 4, 95, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `threads_id` int(11) NOT NULL,
  `skills_has_offers_skills_id` int(11) NOT NULL,
  `skills_has_offers_offers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_content` text NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `short_content`, `content`, `created_date`, `updated_date`) VALUES
(2, 'dhgjh', 'hgdjhdg', 'hgdjhgdj', '2018-07-12 15:58:49', NULL),
(3, 'hdgj', 'gdjd', 'hdgjhgj', '2018-07-12 15:59:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `unsubscribe` tinyint(1) DEFAULT '0',
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `unsubscribe`, `created_date`) VALUES
(1, 'clement.besse@gmail.com', 0, '2018-07-06 13:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` varchar(45) NOT NULL,
  `read_at` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `salary_min` int(11) DEFAULT NULL,
  `salary_max` int(11) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `closed` tinyint(1) DEFAULT '0',
  `period` int(11) DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `activities_id` int(11) NOT NULL,
  `employments_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `content`, `created_date`, `updated_date`, `salary_min`, `salary_max`, `experience`, `closed`, `period`, `latitude`, `longitude`, `place`, `users_id`, `activities_id`, `employments_id`) VALUES
(1, 'Cherche BTP Portugaise', 'Portugais bienvenue.', '2018-07-01 07:34:40', '2018-07-12 14:33:23', 25000, 34000, 2, 1, 1, '48.85661400000001', '2.3522219000000177', 'Paris, France', 1, 3, 3),
(2, 'Développeur Web Paris Intramunos', 'Hello From Darkness.', '2018-07-05 06:00:00', NULL, 35000, 40000, 4, 0, NULL, '48.85661400000001', '2.3522219000000177', 'Paris, France', 1, 1, 2),
(3, 'Webdesigneur Montpel', 'Caca.', '2018-07-07 06:20:38', NULL, 27000, 31000, 2, 0, NULL, '43.610769', '3.8767159999999876', 'Montpellier, France', 1, 1, 2),
(4, 'Dev web montpellier', 'Hello', '2018-07-04 10:22:00', NULL, 35000, 40000, 3, 0, NULL, '43.610769', '3.8767159999999876', 'Montpellier, France', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `offers_has_skills`
--

CREATE TABLE `offers_has_skills` (
  `offers_id` int(11) NOT NULL,
  `skills_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offers_has_skills`
--

INSERT INTO `offers_has_skills` (`offers_id`, `skills_id`) VALUES
(2, 5),
(4, 5),
(2, 6),
(4, 6),
(2, 7),
(4, 7),
(3, 8),
(3, 9),
(3, 10),
(2, 11),
(4, 11),
(1, 13),
(1, 14),
(1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `passwords_reset`
--

CREATE TABLE `passwords_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `token` varchar(45) DEFAULT NULL,
  `created_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `postulates`
--

CREATE TABLE `postulates` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `offers_id` int(11) NOT NULL,
  `accepted` tinyint(1) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `postulates`
--

INSERT INTO `postulates` (`id`, `users_id`, `offers_id`, `accepted`, `created_date`) VALUES
(3, 2, 4, 1, '2018-07-13 11:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `longitude` varchar(45) DEFAULT NULL,
  `latitude` varchar(45) DEFAULT NULL,
  `radius` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `period` int(11) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `activities_id` int(11) NOT NULL,
  `employments_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `longitude`, `latitude`, `radius`, `salary`, `experience`, `period`, `place`, `users_id`, `activities_id`, `employments_id`) VALUES
(1, '3.8767159999999876', '43.610769', 100, 34000, 3, NULL, 'Montpellier, France', 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `profiles_has_skills`
--

CREATE TABLE `profiles_has_skills` (
  `profiles_id` int(11) NOT NULL,
  `skills_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles_has_skills`
--

INSERT INTO `profiles_has_skills` (`profiles_id`, `skills_id`) VALUES
(1, 5),
(1, 6),
(1, 8),
(1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `activities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `activities_id`) VALUES
(1, 'Prendre une commande', 4),
(2, 'Faire la plonge', 4),
(3, 'Préparer des entrées', 4),
(4, 'Accueil des clients', 4),
(5, 'PHP', 1),
(6, 'Laravel', 1),
(7, 'Mysql', 1),
(8, 'Web Design', 1),
(9, 'Photoshop', 1),
(10, 'ReactJS', 1),
(11, 'VueJS', 1),
(12, 'Faire les lits', 2),
(13, 'Faire du ciment', 3),
(14, 'Casser des murs', 3),
(15, 'Faire des murs (Florian)', 3);

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `closed` tinyint(1) DEFAULT NULL,
  `from_users_id` int(11) NOT NULL,
  `to_users_id` int(11) NOT NULL,
  `offers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `is_premium` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_recruiter` tinyint(1) NOT NULL DEFAULT '0',
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `company` varchar(45) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `profil_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_premium`, `is_admin`, `is_recruiter`, `firstname`, `lastname`, `email`, `tel`, `password`, `company`, `created_date`, `updated_date`, `birthday`, `profil_picture`) VALUES
(1, 0, 1, 1, 'Admin', 'admin', 'admin@admin.com', NULL, '$2y$10$AlWa6ts2aG.S2EtcWZ5P4.tYmX25PYOAXCDoBtQsyuLX.cRPundW6', NULL, '2018-07-05 11:11:23', NULL, NULL, NULL),
(2, 0, 0, 0, 'Clément', 'Besse', 'clement.besse@gmail.com', NULL, '$2y$10$7xeY5Xaza6tB1R9hqKlYh.tIq/NtW8n0TffjKq1bbysB8OQCqe2DG', NULL, '2018-07-05 11:26:51', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`,`offers_id`,`users_id`),
  ADD KEY `fk_bookmarks_offers1_idx` (`offers_id`),
  ADD KEY `fk_bookmarks_users1_idx` (`users_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employments`
--
ALTER TABLE `employments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`id`,`users_id`,`offers_id`),
  ADD KEY `fk_matchs_users2_idx` (`users_id`),
  ADD KEY `fk_matchs_offers2_idx` (`offers_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`,`users_id`,`threads_id`,`skills_has_offers_skills_id`,`skills_has_offers_offers_id`),
  ADD KEY `fk_messages_users1_idx` (`users_id`),
  ADD KEY `fk_messages_threads1_idx` (`threads_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`,`users_id`,`activities_id`,`employments_id`),
  ADD KEY `fk_offers_users_idx` (`users_id`),
  ADD KEY `fk_offers_activities1_idx` (`activities_id`),
  ADD KEY `fk_offers_employments1_idx` (`employments_id`);

--
-- Indexes for table `offers_has_skills`
--
ALTER TABLE `offers_has_skills`
  ADD PRIMARY KEY (`offers_id`,`skills_id`),
  ADD KEY `fk_offers_has_skills_skills1_idx` (`skills_id`),
  ADD KEY `fk_offers_has_skills_offers1_idx` (`offers_id`);

--
-- Indexes for table `passwords_reset`
--
ALTER TABLE `passwords_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postulates`
--
ALTER TABLE `postulates`
  ADD PRIMARY KEY (`id`,`users_id`,`offers_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_matchs_users1_idx` (`users_id`),
  ADD KEY `fk_matchs_offers1_idx` (`offers_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`,`users_id`,`activities_id`,`employments_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_profiles_users1_idx` (`users_id`),
  ADD KEY `fk_profiles_activities1_idx` (`activities_id`),
  ADD KEY `fk_profiles_employments1_idx` (`employments_id`);

--
-- Indexes for table `profiles_has_skills`
--
ALTER TABLE `profiles_has_skills`
  ADD PRIMARY KEY (`profiles_id`,`skills_id`),
  ADD KEY `fk_profiles_has_skills_skills1_idx` (`skills_id`),
  ADD KEY `fk_profiles_has_skills_profiles1_idx` (`profiles_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`,`activities_id`),
  ADD KEY `fk_skills_activities1_idx` (`activities_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`,`from_users_id`,`to_users_id`,`offers_id`),
  ADD KEY `fk_threads_users1_idx` (`from_users_id`),
  ADD KEY `fk_threads_offers1_idx` (`offers_id`),
  ADD KEY `fk_threads_users2_idx` (`to_users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail_UNIQUE` (`email`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `tel_UNIQUE` (`tel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employments`
--
ALTER TABLE `employments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `passwords_reset`
--
ALTER TABLE `passwords_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `postulates`
--
ALTER TABLE `postulates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `fk_bookmarks_offers1` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bookmarks_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `fk_matchs_offers2` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matchs_users2` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_threads1` FOREIGN KEY (`threads_id`) REFERENCES `threads` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_messages_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `fk_offers_activities1` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_offers_employments1` FOREIGN KEY (`employments_id`) REFERENCES `employments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_offers_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `offers_has_skills`
--
ALTER TABLE `offers_has_skills`
  ADD CONSTRAINT `fk_offers_has_skills_offers1` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_offers_has_skills_skills1` FOREIGN KEY (`skills_id`) REFERENCES `skills` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `postulates`
--
ALTER TABLE `postulates`
  ADD CONSTRAINT `fk_matchs_offers1` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matchs_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `fk_profiles_activities1` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profiles_employments1` FOREIGN KEY (`employments_id`) REFERENCES `employments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profiles_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profiles_has_skills`
--
ALTER TABLE `profiles_has_skills`
  ADD CONSTRAINT `fk_profiles_has_skills_profiles1` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profiles_has_skills_skills1` FOREIGN KEY (`skills_id`) REFERENCES `skills` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `fk_skills_activities1` FOREIGN KEY (`activities_id`) REFERENCES `activities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `fk_threads_offers1` FOREIGN KEY (`offers_id`) REFERENCES `offers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_threads_users1` FOREIGN KEY (`from_users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_threads_users2` FOREIGN KEY (`to_users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
