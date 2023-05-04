-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 01:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artrise`
--

-- --------------------------------------------------------

--
-- Table structure for table `critics`
--

CREATE TABLE `critics` (
  `critics_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `critic_type` varchar(20) DEFAULT NULL,
  `qualification` varchar(25) NOT NULL,
  `password` varchar(300) NOT NULL,
  `about` varchar(1000) DEFAULT 'User has not added this field'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `critics`
--

INSERT INTO `critics` (`critics_id`, `name`, `email`, `critic_type`, `qualification`, `password`, `about`) VALUES
(4, 'parth', 'parth@gmail.com', 'art', 'B-tech', '$2y$10$lgMbGiNYJWYNosXlpUXI8OgrjJ0nrjT0JmAWe9Jll3cfcgtpA3Zey', 'i am a disco dancer'),
(5, 'Dhairya', 'dhairya@gmail.com', 'art', 'B-Tech', '$2y$10$NFzs/5inMNVNaEi1k6/5m.kLM7BwV0k9m63by3cI5C5xfiWFcE5VC', 'User has not added this field'),
(6, 'Jinam Jain', 'jinam@gmail.com', 'art', 'B-Tech', '$2y$10$eNP0VAdqJcJhgNaAYNPh3O42Ink6ao6IHlVRdTqlTxYHLQEB6gI0e', 'User has not added this field'),
(7, 'pankti@gmail.com', 'pankti@gmail.com', 'art', 'B-Tech', '$2y$10$D1/9Y28wvkG.Zvkrev3exe9AC5m.vA9oGUI/yQ2sQ.No8tjyFfSeC', 'User has not added this field'),
(8, 'Ritesh', 'ritesh@gmail.com', 'writing', 'PhD', '$2y$10$Un9MvR10sPpJZqvdVretfeqvpl4qNc4Du5Yaf/My223YEJJcs8CUC', 'User has not added this field'),
(9, 'Kuber Jain', 'kuber@gmail.com', 'art', 'God Level Developer', '$2y$10$uFQtGSDp3wXmIQrv7VDeIeAkwueW9HID7hFjuDJQHJIo1xYu1Dh4y', 'User has not added this field');

-- --------------------------------------------------------

--
-- Table structure for table `critics_content`
--

CREATE TABLE `critics_content` (
  `content_id` int(11) NOT NULL,
  `content` mediumblob NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `critics_rated` int(11) NOT NULL DEFAULT 0,
  `file_type` varchar(50) NOT NULL,
  `art_type` varchar(50) NOT NULL,
  `upload_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `critics_content`
--

INSERT INTO `critics_content` (`content_id`, `content`, `user_id`, `name`, `description`, `rating`, `critics_rated`, `file_type`, `art_type`, `upload_date`) VALUES
(6, 0x363433663836613536653435332e6a7067, 8, '', 'drawing girl', 0, 0, 'image/jpeg', 'writing', '0000-00-00 00:00:00'),
(15, 0x363434663936393938393562312e6a706567, 9, '', 'an ER diagram of dbms project.', 4, 1, 'image/jpeg', 'art', '0000-00-00 00:00:00'),
(16, 0x363434663936636634386235632e6a706567, 10, '', 'Airline management system er diagram', 0, 0, 'image/jpeg', 'art', '0000-00-00 00:00:00'),
(17, 0x363434666135623839663062352e6a7067, 9, '', 'Sample artwork for test', 12, 3, 'image/jpeg', 'art', '0000-00-00 00:00:00'),
(18, 0x363434666135636365313737382e6a7067, 9, '', 'Sample artwork for test', 11, 3, 'image/jpeg', 'art', '0000-00-00 00:00:00'),
(19, 0x363435323036353462356331622e6a7067, 9, '', 'A test artwork ', 4, 1, 'image/jpeg', 'art', '0000-00-00 00:00:00'),
(20, 0x363435326234303761626635652e6a7067, 9, '', 'Please upvote', 0, 0, 'image/jpeg', 'visarts', '0000-00-00 00:00:00'),
(21, 0x363435326234316630396362382e6a7067, 9, '', 'Please upvote', 0, 0, 'image/jpeg', 'visarts', '0000-00-00 00:00:00'),
(22, 0x363435326234336163326366302e706e67, 9, '', 'Come to this show', 0, 0, 'image/png', 'writing', '0000-00-00 00:00:00'),
(23, 0x363435326234356134643466302e6d7034, 9, '', 'My holy earth', 0, 0, 'video/mp4', 'art', '0000-00-00 00:00:00'),
(24, 0x363435326234373633313239662e6a7067, 9, '', 'Drawing girl pic', 0, 0, 'image/jpeg', 'art', '0000-00-00 00:00:00'),
(25, 0x363435326234393032383838642e6a7067, 9, '', 'Event poster', 0, 0, 'image/jpeg', 'visarts', '0000-00-00 00:00:00'),
(26, 0x363435333930303038613836312e6a7067, 11, '', 'Avatar 3', 0, 0, 'image/jpeg', 'visarts', '0000-00-00 00:00:00'),
(27, 0x363435333930383731646361302e706e67, 11, '', 'Power', 0, 0, 'image/png', 'writing', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `critics_request`
--

CREATE TABLE `critics_request` (
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `critic_type` varchar(20) NOT NULL,
  `qualification` varchar(25) NOT NULL,
  `password` varchar(300) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`user_id`, `content_id`) VALUES
(9, 17),
(9, 18),
(11, 17);

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

CREATE TABLE `judges` (
  `critics_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`critics_id`, `content_id`, `rating`, `review`) VALUES
(4, 15, 0, 'Nice ER diagram'),
(4, 17, 0, 'Nice ER diagram'),
(4, 19, 0, 'Nice'),
(4, 18, 0, 'Cute ullu'),
(5, 17, 0, 'All hail Gandalf the grey'),
(5, 18, 0, 'Send him back to hogwarts'),
(6, 18, 0, 'Where is my letter?'),
(6, 17, 0, 'Nice scene of khazad-dum');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`user_id`, `content_id`) VALUES
(9, 17),
(11, 17);

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `content_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `content` mediumblob NOT NULL,
  `seller` varchar(25) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `art_type` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `market`
--

INSERT INTO `market` (`content_id`, `seller_id`, `content`, `seller`, `file_type`, `description`, `art_type`, `cost`) VALUES
(23, 0, 0x363435326234356134643466302e6d7034, 'Ritesh', 'video/mp4', 'My holy earth', 'art', 100000),
(24, 0, 0x363435326234373633313239662e6a7067, 'Ritesh', 'image/jpeg', 'Drawing girl pic', 'art', 2),
(27, 0, 0x363435333930383731646361302e706e67, 'Ritesh K G', 'image/png', 'Power', 'writing', 50);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `msg`) VALUES
(4, 11, 'Your Content with id = 25 has been sold.');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `content_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`content_id`, `user_id`) VALUES
(19, 9),
(20, 9),
(21, 9),
(22, 9),
(23, 9),
(24, 9),
(25, 9),
(26, 11),
(27, 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(300) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `contact`, `age`, `password`, `verification_code`, `is_verified`) VALUES
(8, 'jinam', 'jinam@gmail.com', '1234457887', 69, '$2y$10$wDku1uQwRDu9mXvydSX7qerDtTFY38Isxn/R40UKTmXPKodaM.WmC', '', 0),
(9, 'Ritesh', 'r@g.com', '123', 10, '$2y$10$TPScjiCd5rAt1cKMI0iS5ueQMzv1RmAMEHXP9R14MWobPjhq105nS', '', 0),
(10, 'parth', 'parth@gmail.com', '123445321', 19, '$2y$10$g/4Ac5hFfvuSKoE.5LbVieH22uzm/WOCoSyoBmhdf3eCE/BpzrEM2', '', 0),
(11, 'Ritesh K G', 'ritesh.kumargupta.7549@gmail.com', '7903653934', 20, '$2y$10$.NhNdm7vWDj/jLcEdxSwYuk2jPoXac.n1V63qdD0znyf6X2MS3rle', 'e8b0d244ae3527c19f3e5d6dd48fdf25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_content`
--

CREATE TABLE `users_content` (
  `content_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `content` mediumblob NOT NULL,
  `description` varchar(1000) NOT NULL,
  `ratings` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `art_type` varchar(50) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `upload_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_content`
--

INSERT INTO `users_content` (`content_id`, `creator_id`, `content`, `description`, `ratings`, `likes`, `art_type`, `file_type`, `upload_date`) VALUES
(17, 9, 0x363434666135623839663062352e6a7067, 'Sample artwork for test', 12, 2, 'art', 'image/jpeg', '0000-00-00 00:00:00'),
(18, 9, 0x363434666135636365313737382e6a7067, 'Sample artwork for test', 11, 0, 'art', 'image/jpeg', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `critics`
--
ALTER TABLE `critics`
  ADD PRIMARY KEY (`critics_id`);

--
-- Indexes for table `critics_content`
--
ALTER TABLE `critics_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `critics_request`
--
ALTER TABLE `critics_request`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD KEY `fav_user_id` (`user_id`),
  ADD KEY `fav_content_id` (`content_id`);

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
  ADD KEY `judges_critics_id` (`critics_id`),
  ADD KEY `judges_content_id` (`content_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD KEY `likes_user` (`user_id`),
  ADD KEY `likes_content` (`content_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ntf_usr` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `reviews_user_id` (`user_id`),
  ADD KEY `reviews_content_id` (`content_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD KEY `uploads_user_id` (`user_id`),
  ADD KEY `uploads_content_id` (`content_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_content`
--
ALTER TABLE `users_content`
  ADD PRIMARY KEY (`content_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `critics`
--
ALTER TABLE `critics`
  MODIFY `critics_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `critics_content`
--
ALTER TABLE `critics_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_content`
--
ALTER TABLE `users_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `fav_content_id` FOREIGN KEY (`content_id`) REFERENCES `users_content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fav_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `judges`
--
ALTER TABLE `judges`
  ADD CONSTRAINT `judges_content_id` FOREIGN KEY (`content_id`) REFERENCES `critics_content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `judges_critics_id` FOREIGN KEY (`critics_id`) REFERENCES `critics` (`critics_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_content` FOREIGN KEY (`content_id`) REFERENCES `users_content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `ntf_usr` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_content_id` FOREIGN KEY (`content_id`) REFERENCES `users_content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_content_id` FOREIGN KEY (`content_id`) REFERENCES `critics_content` (`content_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uploads_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
