-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 08:19 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `podcast_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `podcasts`
--

CREATE TABLE `podcasts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `language` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `audio_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `podcasts`
--

INSERT INTO `podcasts` (`id`, `title`, `language`, `description`, `image`, `audio_file`) VALUES
(4, 'Aladhin', 'English', 'hhhhhhhhhhhhhhhh', 'uploads/aladhin.jfif', 'uploads/ff-16b-2c-44100hz.mp3'),
(11, 'csz', 'fafaf', 'afdafd', 'uploads/www.png', 'uploads/ff-16b-2c-44100hz.mp3'),
(12, 'fdafd', 'adfadf', 'dsfaf', 'uploads/arrow2.png', 'uploads/ff-16b-2c-44100hz.mp3'),
(15, 'game', 'spanish', 'jkfakjfndkj bnfuiafk', 'uploads/Screenshot_2024-11-19-12-34-49.jpeg', 'uploads/ff-16b-2c-44100hz.mp3'),
(16, 'faf111', 'dfafd11', 'afadfddse11111', 'uploads/www.png', 'uploads/ff-16b-2c-44100hz.mp3'),
(18, 'jbnjkask', 'dsf', 'fasf', 'uploads/1.png', 'uploads/ff-16b-2c-44100hz.mp3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `podcasts`
--
ALTER TABLE `podcasts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `podcasts`
--
ALTER TABLE `podcasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
