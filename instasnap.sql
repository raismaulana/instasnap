-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 10:33 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instasnap`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_post`
--

CREATE TABLE `comment_post` (
  `user_iduser` int(11) NOT NULL,
  `post_idpost` int(11) NOT NULL,
  `comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `like_post`
--

CREATE TABLE `like_post` (
  `user_iduser` int(11) NOT NULL,
  `post_idpost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `caption` text DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `date` datetime DEFAULT NULL,
  `user_iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idpost`, `caption`, `picture`, `date`, `user_iduser`) VALUES
(4, 'eee', 'data/7/dbad47dc7e2087b3cc1b40ed1d9d14e5.jpg', '2021-04-11 10:14:00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `name`, `username`, `email`, `password`) VALUES
(1, 'koko', 'koko123', 'koko@gmail.com', '$2y$10$UlUPvn8qXkhnQpdSyIGoxeN3mFg4C9SPWpZLOsY1evmAQ27gu13Qa'),
(2, 'Tole', 'tole123', 'tole@gmail.com', '$2y$10$eWzpRG8iuDDWVdArpkJ4y.36NyYsExhbspYH2w.RcAS2ee65C/ZIO'),
(3, 'eren', 'eren123', 'eren@gmail.com', '$2y$10$Eq5oQesY7jMqTPFBShlD7ec0KTYSWst54Jifte3dZLCV/CJNpEL9C'),
(4, 'mikasa', 'mikasa123', 'mikasa@gmail.ccom', '$2y$10$q.KTwJmjgPgLF3.8Krpz4.VAHbg.eWVF5IfK9snRF9TgGfQoDutR6'),
(5, 'windah', 'windah123', 'windah@gmail.com', '$2y$10$KeAvvRGeL3eCAFcAH15jF.eakkfKD9bmrVWhL.8uaik2PPCVol6aW'),
(6, 'Loki', 'loki123', 'loki@gmail.com', '$2y$10$dNjdQUjBCscJk5jB9eIe7.6lbo8ASizKSrGArhVyFaLG2vilejN9K'),
(7, 'ymir', 'ymir123', 'ymir@gmail.com', '$2y$10$bSaoDme3Ty6zEUX0l5A5q.lOF9a092zAKIC0hmq0u0EHlfouKijla'),
(8, 'tryit', 'tryit123', 'tryit@gmail.com', '$2y$10$v337mDRVmUjAIpcCFDoRkee2gc6P.YfTVYpKs25KuDM0e21vOGb76');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_post`
--
ALTER TABLE `comment_post`
  ADD PRIMARY KEY (`user_iduser`,`post_idpost`),
  ADD KEY `fk_user_has_post_post2_idx` (`post_idpost`),
  ADD KEY `fk_user_has_post_user2_idx` (`user_iduser`);

--
-- Indexes for table `like_post`
--
ALTER TABLE `like_post`
  ADD PRIMARY KEY (`user_iduser`,`post_idpost`),
  ADD KEY `fk_user_has_post_post1_idx` (`post_idpost`),
  ADD KEY `fk_user_has_post_user1_idx` (`user_iduser`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`),
  ADD KEY `fk_post_user_idx` (`user_iduser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_post`
--
ALTER TABLE `comment_post`
  ADD CONSTRAINT `fk_user_has_post_post2` FOREIGN KEY (`post_idpost`) REFERENCES `post` (`idpost`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_post_user2` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `like_post`
--
ALTER TABLE `like_post`
  ADD CONSTRAINT `fk_user_has_post_post1` FOREIGN KEY (`post_idpost`) REFERENCES `post` (`idpost`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_post_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_user` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
