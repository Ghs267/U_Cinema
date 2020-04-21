-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2020 at 06:51 PM
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
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `email_employee` varchar(255) NOT NULL,
  `role` int(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`email_employee`, `role`, `password`) VALUES
('admin@yahoo.com', 1, '21232f297a57a5a743894a0e4a801fc3'),
('dewa@yahoo.com', 3, '4b6dbdb5b651b0d179be3f031edafdbe'),
('jennie@student.umn.ac.id', 1, '21232f297a57a5a743894a0e4a801fc3'),
('kasir@yahoo.com', 3, 'c7911af3adbd12a035b289556d96470a'),
('manajer@yahoo.com', 2, '69b731ea8f289cf16a192ce78a37b4f0');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `synopsis` varchar(1000) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `poster`, `title`, `synopsis`, `duration`, `genre`, `release_date`) VALUES
('1', 'test.png', 'Nilai PemwebKu', 'Bobby Chrismanto telah 			            belajar dengan keras siang dan malam merenungkan materi pemweb, tetapi apa daya ternyata saat Ujian .......', '3h 2m', 'thriller', '2020-02-03'),
('2', 'turkey.png', 'Winner Winner Chicken Dinner', 'dafa', '2h 35m', 'action, fantasy, comedy', '2020-03-24'),
('3', '707284.jpg', 'BIOS 2020', 'Acara terbesar HMIF UMN dengan puncak acara Hackathon, dimana peserta berlomba membuat aplikasi selama 24 jam!', '24h', 'action, sci-fi', '2020-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(255) NOT NULL,
  `nama_role` varchar(255) NOT NULL,
  `deskripsi_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `nama_role`, `deskripsi_role`) VALUES
(1, 'admin', 'bisa CRUD'),
(2, 'manajer', 'bisa Read dan Delete'),
(3, 'kasir', 'hanya bias READ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`email_employee`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
