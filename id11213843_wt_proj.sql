-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2020 at 06:23 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id11213843_wt_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `fac`
--

CREATE TABLE `fac` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fac`
--

INSERT INTO `fac` (`id`, `username`, `password`, `created_at`) VALUES
(12, '779833', '$2y$10$EKBPlnLdh/F15U7JvYMXsevL5CzMwxIwvQ0GBG5lBzaHptAaCeLo.', '2019-10-30 11:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `personal_data`
--

CREATE TABLE `personal_data` (
  `intership` varchar(30) NOT NULL,
  `activity` varchar(30) NOT NULL,
  `certificate` varchar(50) DEFAULT NULL,
  `student_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_data`
--

INSERT INTO `personal_data` (`intership`, `activity`, `certificate`, `student_id`) VALUES
('Vesit', 'Snake and ladder', 'Ghar kam', 7),
('IBM', 'Brain Games', 'Microsoft', 175333),
('Tesla', 'Codeo', 'Udacity', 175333),
('GOOGLE', 'Sherlock and Watson', 'NPTEL', 175333),
('vghv', 'chgv', 'vhgvh', 175336),
('taaaa', 'haaaa', 'josh', 175339);

-- --------------------------------------------------------

--
-- Table structure for table `stu_att`
--

CREATE TABLE `stu_att` (
  `student_id` int(7) NOT NULL,
  `percentage` int(3) NOT NULL,
  `month` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_att`
--

INSERT INTO `stu_att` (`student_id`, `percentage`, `month`) VALUES
(175333, 87, 'Janaury'),
(175333, 98, 'February'),
(175333, 87, 'March'),
(175333, 67, 'April'),
(175333, 96, 'May'),
(175333, 78, 'May'),
(175333, 65, 'June'),
(175335, 67, 'Janaury'),
(175335, 98, 'February'),
(175335, 78, 'March'),
(175315, 97, 'Janaury'),
(175333, 87, 'August'),
(175333, 76, 'July'),
(175339, 90, 'October'),
(175339, 90, 'October');

-- --------------------------------------------------------

--
-- Table structure for table `stu_data`
--

CREATE TABLE `stu_data` (
  `mobile` int(15) DEFAULT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `student_id` int(10) NOT NULL,
  `department_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_data`
--

INSERT INTO `stu_data` (`mobile`, `fname`, `lname`, `email`, `student_id`, `department_id`) VALUES
(2147483647, 'Manav', 'Motwani', 'manav9m@gmail.com', 175333, 12),
(1451451451, 'Sahil', 'Motwani', '2017.sahil.motwani@ves.ac.in', 175335, 12);

-- --------------------------------------------------------

--
-- Table structure for table `stu_grade`
--

CREATE TABLE `stu_grade` (
  `student_id` int(7) NOT NULL,
  `pointer` double NOT NULL,
  `sem` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_grade`
--

INSERT INTO `stu_grade` (`student_id`, `pointer`, `sem`) VALUES
(175333, 7.64, 'SEM I'),
(175333, 7.71, 'SEM II'),
(175333, 9.33, 'SEM III'),
(175333, 9.56, 'SEM IV'),
(175335, 9.56, 'SEM I');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'jayesh@gmail.com', 'jay123', '2019-10-12 23:29:46'),
(2, 'sahil@gmail.com', 'sallubaji123', '2019-10-12 23:49:19'),
(3, 'sahil@gmail.com', 'sallubaji123', '2019-10-12 23:49:50'),
(4, 'jamnabai@manav.com', 'jalebi123', '2019-10-12 23:50:08'),
(5, 'jamnabai@manav.com', 'jalebi123', '2019-10-13 10:50:30'),
(6, 'jhrana@google.com', '$2y$10$QOt7dxNe16tagoC4HtaJ3eKz7AXmrlomxsyDQQ9eG9G3qPD/5Zr0C', '2019-10-13 11:13:35'),
(7, 'malibu@gmail.com', '$2y$10$rrh7SbPWt6Q3RlV.pCKplOXsn5QSqLE8LVjUJAjvc29GdImEUloNS', '2019-10-13 11:18:38'),
(8, 'samvad@thulla.com', '$2y$10$K/k1CySvGyGvq67qcUI52Oy.wtos3Wi/eRmRPKh/naSGKdtgBjrbW', '2019-10-13 13:24:23'),
(9, '175335', '$2y$10$cDz16fb.CfNaB5QoV.96serLDHLLu7J0fHnDqLYBFzV3IZBiG4bBu', '2019-10-13 13:32:31'),
(10, 'reha', '$2y$10$kJRRxBgfA12eTqlspc/ZW.bXnN4Nt9Kihc4Ioz/.E8vvbT9fRxWiO', '2019-10-13 15:57:19'),
(11, 'resham', '$2y$10$6W4Mqqkv..Kamx7KdQ4LCuQzQ4QQKO6NF2q6MDHHxgMQkjigGANm.', '2019-10-13 17:37:36'),
(12, '175333', '$2y$10$uPL1jVl4FSEsm1vqgWPXoearX7q7b05gMZ.OlQcv532Ye0Dh1H.PO', '2019-10-13 22:28:08'),
(13, '175315', '$2y$10$ut4G2CTHlQbEU4irpi8BWO/38uF/OiJ5hiUmFEYch7fFatnYTCvm6', '2019-10-14 01:19:39'),
(14, 'naresh', '$2y$10$CgTQJ5ibtiXEWVDe5ameb.588mL.7aP7DJrZMLaNocYbR90mN.OES', '2019-10-28 13:25:25'),
(16, 'Sahil', '$2y$10$qzkVk3qjdLzaGL73jAKJFeB9QtewuY8xSB96L.UVLxHYrzq4fTqrm', '2019-11-17 14:49:15'),
(17, '121212', '$2y$10$tIENiRilGJGa8/j9RlAp.eVqduYJI7.0q1A6yePtlwJjZBhD0m/cK', '2020-01-14 16:15:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fac`
--
ALTER TABLE `fac`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_data`
--
ALTER TABLE `personal_data`
  ADD PRIMARY KEY (`student_id`,`activity`);

--
-- Indexes for table `stu_data`
--
ALTER TABLE `stu_data`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fac`
--
ALTER TABLE `fac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
