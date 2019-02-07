-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2019 at 06:41 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `_london_tours`
--

-- --------------------------------------------------------

--
-- Table structure for table `_support_req_`
--

CREATE TABLE `_support_req_` (
  `_id_` int(11) NOT NULL,
  `_userID_` int(11) NOT NULL,
  `_phoneNumber_` int(20) DEFAULT NULL,
  `_subject_` varchar(144) DEFAULT NULL,
  `_message_` varchar(255) NOT NULL,
  `_date_` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_support_req_`
--

INSERT INTO `_support_req_` (`_id_`, `_userID_`, `_phoneNumber_`, `_subject_`, `_message_`, `_date_`) VALUES
(13, 4, 2147483647, 'dsa', 'fdsfsf', '2019-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `_users_`
--

CREATE TABLE `_users_` (
  `_user_id_` int(11) NOT NULL,
  `_user_first_name_` varchar(144) NOT NULL,
  `_user_last_name_` varchar(144) NOT NULL,
  `_user_email_` varchar(144) NOT NULL,
  `_user_phone_no_` varchar(56) NOT NULL,
  `_user_street_` varchar(255) NOT NULL,
  `_user_city_` varchar(56) NOT NULL,
  `_user_postcode_` varchar(56) NOT NULL,
  `_user_password_` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_users_`
--

INSERT INTO `_users_` (`_user_id_`, `_user_first_name_`, `_user_last_name_`, `_user_email_`, `_user_phone_no_`, `_user_street_`, `_user_city_`, `_user_postcode_`, `_user_password_`) VALUES
(3, ' Mihail', 'Tudos', 'mihairmcr7@gmail.com', '7491648162', '258 High Street North', 'Dunstable', 'LU6 1BE', '$2y$10$XpzAxj4AbkNtZry8YPOunOmil5vK6ZWtx/jcQUiHDYtlAyknspGhy'),
(4, ' Mihail', 'Tudos', 'mihairmcr8@gmail.com', '7491648162', '258 High Street North', 'Dunstable', 'LU6 1BE', '$2y$10$Oy7kaSt3FgA1MvGBdB0WqO/y1YuXsWuu7CTDfZQ1s71DONWzeolM.'),
(5, ' Mihail', 'Tudos', 'mihairmcr9@gmail.com', '7491648162', '258 High Street North', 'Dunstable', 'LU6 1BE', '$2y$10$NkmPYElUeemLIA0MYzy1XupDpmwTbmz22VDQDVG..YVdvgaynlr/.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `_support_req_`
--
ALTER TABLE `_support_req_`
  ADD PRIMARY KEY (`_id_`);

--
-- Indexes for table `_users_`
--
ALTER TABLE `_users_`
  ADD PRIMARY KEY (`_user_id_`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `_support_req_`
--
ALTER TABLE `_support_req_`
  MODIFY `_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `_users_`
--
ALTER TABLE `_users_`
  MODIFY `_user_id_` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
