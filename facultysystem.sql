-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 08:57 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facultysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `doj` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `salary` bigint(10) NOT NULL,
  `married` char(10) NOT NULL,
  `working_since` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`name`, `email`, `phone`, `gender`, `dob`, `doj`, `address`, `role`, `dept`, `degree`, `salary`, `married`, `working_since`) VALUES
('G.S.N.Murthy', 'gsnmurthy@gmail.com', '9523146621', 'Male', '8/3/1974', '2007-04-12', 'Srikakulam', 'Professor', 'CSE', 'P.hD', 100000, 'Yes', 11),
('N.Preethi', 'preethi@gmail.com', '9874563217', 'Female', '6/7/1984', '2010-05-22', 'Srikakulam', 'Asst Prof', 'CSE', 'M.Tech', 30000, 'Yes', 8),
('sri', 'sri@gmail.com', '9014679579', 'Male', '15/7/1983', '2006-06-15', 'tekkali', 'Asst Prof', 'CSE', 'M.Tech', 35000, 'No', 12);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_login`
--

CREATE TABLE `faculty_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_login`
--

INSERT INTO `faculty_login` (`id`, `username`, `password`) VALUES
(16, 'preethi@gmail.com', 'preethi'),
(17, 'gsnmurthy@gmail.com', 'gsnmurthy'),
(21, 'sri@gmail.com', 'sri'),
(22, 'raju@gmail.com', 'raju');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `journal` varchar(50) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `impact` float NOT NULL,
  `ci` varchar(10) NOT NULL,
  `doi` varchar(10) NOT NULL,
  `month` varchar(5) NOT NULL,
  `year` int(5) NOT NULL,
  `other` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `email`, `author`, `dept`, `title`, `journal`, `issue`, `isbn`, `impact`, `ci`, `doi`, `month`, `year`, `other`) VALUES
(6, 'preethi@gmail.com', 'Preethi', 'CSE', 'Scheeming Various Architectural Designs to improve Efficiency Scalability and Fault Tolerant in Dist', 'IJMETMR&IJMETMR', 'Vol 3,Issue 4,pp.103-108', '2348-4845', 0, '', '', 'Jan', 2016, 'Peer Reviewed'),
(7, 'gsnmurthy@gmail.com', 'G.S.N.Murthy', 'CSE', 'Learning Fraud Rating for Mobiles using Aggrigation Appliance', 'IJST', 'Vol 9,Issue 22', '0974-6846', 0, '', '10.17485', '', 2016, 'Peer Reviewed'),
(9, 'sri@gmail.com', 'sri', 'CSE', 'robustnes of networks', 'ijcsr,sri@gmail.com', '4,5,120-124', '2348-2349', 2.5, '', '', '8', 2015, ''),
(10, 'sri@gmail.com', 'sri', 'CSE', 'congestion in netwroks', 'ijert,sri@gmail.com', '4,6,125-130', '3451-3458', 3.5, '', '', '7', 2017, 'online');

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE `workshops` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `workshop` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `start` date NOT NULL,
  `endd` date NOT NULL,
  `days` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`id`, `email`, `workshop`, `venue`, `start`, `endd`, `days`) VALUES
(9, 'preethi@gmail.com', 'python', 'Vishakapatnam', '2018-04-08', '2018-04-11', '4'),
(10, 'preethi@gmail.com', 'Web zion', 'Tekkali', '2017-03-03', '2017-03-05', '3'),
(11, 'gsnmurthy@gmail.com', 'python', 'Vishakapatnam', '2017-04-08', '2017-04-11', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `faculty_login`
--
ALTER TABLE `faculty_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faculty_login`
--
ALTER TABLE `faculty_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `workshops`
--
ALTER TABLE `workshops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
