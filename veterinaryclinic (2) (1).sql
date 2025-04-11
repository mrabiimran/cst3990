-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 01:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veterinaryclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$SsXpkWr/OH0tP6bCmaim5.klDXeSYXBLZA1KR.L6rBoMl9OfshUOq'),
(2, 'admin', '$2y$10$Dq41cD0ddS5VURyTZ19kA.Bj2.WVsMRLc4RrGTi2vxKQnNij0gqlq'),
(3, 'rabi', '$2y$10$9N88Rtw86WDsnP7381FYj.OQAn5y.fsL.qomhLqwcG34wDOl4mChu');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_type` enum('user','bot','admin') NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_name`, `sender_type`, `message`, `timestamp`) VALUES
(20, 'Support Agent', 'bot', 'Hey Subhan, how’s your day? How can I help you?', '2025-04-07 00:49:21'),
(21, 'Support Agent', 'bot', 'Hey Subhan, how’s your day? How can I help you?', '2025-04-07 00:51:00'),
(23, 'Support Agent', 'bot', 'Hey admin, how’s your day? How can I help you?', '2025-04-07 01:09:49'),
(24, 'Support Agent', 'bot', 'Hey admin, how’s your day? How can I help you?', '2025-04-07 01:10:03'),
(25, 'Support Agent', 'bot', 'Hey admin, how’s your day? How can I help you?', '2025-04-07 01:11:03'),
(26, 'Support Agent', 'bot', 'Hey admin, how’s your day? How can I help you?', '2025-04-07 01:11:17'),
(27, 'Support Agent', 'bot', 'Hey Dr Ali, how’s your day? How can I help you?', '2025-04-07 01:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(2, 'newbie22', 'newbie@example.com', 'newbie', 'newbie'),
(3, 'Ariyan', 'new@example.com', 'dfdsa.fkbgdasnfbdas,nfvds,hfjdvasfdsfgdsfgdfsgdfsgdfs', 'sf,masd,n f,jbdvfdasbfmndas fn,dasfdaef');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `drname` varchar(200) NOT NULL,
  `dremail` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `drname`, `dremail`, `password`) VALUES
(9, 'Dr Ali', 'nn@gmail.com', '$2y$10$nnlJmWr2tMuXiBD9JnMkzOb0nDg4dfaoL8N4kRUCxPi4.idearIrm');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `drname` int(11) NOT NULL,
  `servicesname` int(11) NOT NULL,
  `petdetail` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `contact` int(11) NOT NULL,
  `message` varchar(11) NOT NULL,
  `useremail` varchar(200) NOT NULL,
  `uername` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `drname`, `servicesname`, `petdetail`, `location`, `contact`, `message`, `useremail`, `uername`) VALUES
(8, 9, 8, 'sdfusdgflsdkgfsdfsdf', '234iedfbfjkjsvlisdvfsfdsdfsdf', 2147483647, 'dafsfdsgdsf', 'new@gmail.com', 'Subhan'),
(9, 9, 10, 'sdfusdgflsdkgfsdfsdf', '234iedfbfjkjsvlisdvfsfdsdfsdf', 2147483647, 'kudhjvasjhd', 'new@gmail.com', 'Subhan');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `drname` varchar(200) NOT NULL,
  `servicesname` int(11) NOT NULL,
  `record` varchar(200) NOT NULL,
  `bill` varchar(200) NOT NULL,
  `prescription` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `petdetail` varchar(200) NOT NULL,
  `useremail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `username`, `drname`, `servicesname`, `record`, `bill`, `prescription`, `location`, `contact`, `petdetail`, `useremail`) VALUES
(2, 'Noobda42343243434', 'Dr Ali', 10, 'dsfssdf', '23434', 'sadfsdsffd', 'lhjdvgdkljsbaldkjsbalsifvasdff', '2525252525252', 'dsfdsffdsfsdfasd', 'sdafasdfdsfdasf@gmail.com'),
(3, 'LEGENDSAADZI', 'Dr Ali', 6, 'dssdfsdfdsaf', 'fsadfdasfdasfdasf', 'dasfasdfasdfdasfdasdfdasfdasf', 'lhjdvgdkljsbaldkjsbalsifvasdff', '2525252525252', 'dsfdsffdsfsdfasd', 'safasfdasdfasdfdasfdasfdasfdasf');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `servicename` varchar(200) NOT NULL,
  `servicedesc` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `servicename`, `servicedesc`, `img`) VALUES
(8, 'Wildlife Healthcare', 'We intend to offer professional veterinary attention to wild and unusual species with our wildlife healthcare programs. Rescue, recovery, or preventive medicine—our staff is ready to meet the particul', 'vet-examining-dog-cat-puppy-600nw-1479238910.webp'),
(9, 'Pet Grooming and Spa', 'Pamper your pet with our professional grooming and spa services! We offer a relaxing and hygienic experience that includes bathing, fur trimming, nail clipping, ear cleaning, and skin treatments. Our ', 'bigstock-Wash-The-Dogs-50155319.webp'),
(10, 'Routine Checkup', 'Regular health checkups are essential to ensure your pet stays happy and healthy. Our routine checkup service includes a thorough physical examination, weight monitoring, dental assessment, and early ', 'pet-routine-checkup.jpg'),
(12, 'X-ray and Ultrasound', 'X-rays and ultrasounds are essential diagnostic tools in veterinary medicine, helping to assess animal health. *X-rays* provide clear images of bones, joints, and dense tissues, making them useful for', 'images.jpg'),
(13, 'Operation & Emergency', 'Pets can face sudden health emergencies, and our clinic is fully equipped to handle critical situations with expert care. We offer 24/7 emergency services for accidents, injuries, poisoning, and other', 'images (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `contact`) VALUES
(3, 'Subhan', 'new@gmail.com', '$2y$10$aC1z9Zs.IOGps.O6HLQvw.xwBSJR0wNgMP58h9YKIYIHNF0zmTpvK', '2525252525252'),
(5, 'ali', 'ali@gmail.com', '$2y$10$1MLDoXTXyuPyBaSwHaUZjeLhZP3HUR1vtR8mt4.Km6Zhjnqhb9Tz2', '2936429674242'),
(6, 'shaikh', 'shaikh@gmail.com', '$2y$10$CCepUlr6NKKo6EDz0YUskO/gxqihyCg2zT9/DkXVdlC3rAJ4labL2', '8923647896');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drrname` (`drname`),
  ADD KEY `servicessname` (`servicesname`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicesname` (`servicesname`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
