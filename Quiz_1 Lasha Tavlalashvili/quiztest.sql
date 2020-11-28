-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2020 at 10:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiztest`
--

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `correct_ans` varchar(50) NOT NULL,
  `ans1` varchar(50) NOT NULL,
  `ans2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `question`, `correct_ans`, `ans1`, `ans2`) VALUES
(1, 'Which language do we need to be web developer? PHP or JS', 'all of them', 'JS', 'PHP'),
(2, 'What do we use to move cursor on desktop?', 'mouse', 'keyboard', 'webcam'),
(3, 'What do we need to see what PC is doing?', 'display monitor', 'Speakers', 'Keyboard'),
(4, 'What do we need to input text into PC?', 'keyboard', 'mouse', 'touchpad'),
(5, 'Which peripheral is needed to help others in the online meet see you?', 'webcam', 'speakers', 'microphone'),
(6, 'Which peripheral is needed to help others in the online meet hear you?', 'microphone', 'webcam', 'speakers'),
(7, 'What do we need to see in the dark?', 'light source', 'music', 'steak'),
(8, 'Which shape should object have so it can roll?', 'circle', 'rectangle', 'triangle'),
(9, 'What do we call main brain of computer?', 'CPU', 'RAM', 'HDD'),
(10, 'What do we call storage part of PC?', 'HDD', 'USB', 'Mouse');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
