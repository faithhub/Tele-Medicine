-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 12:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalxpay`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(100) NOT NULL,
  `unique_id` varchar(200) NOT NULL,
  `userId` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `amount` int(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `symbol` varchar(5) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `interval` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `share_link` text NOT NULL,
  `redirect_link` text NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `customer_paid` int(50) NOT NULL,
  `amount_paid` int(50) NOT NULL,
  `btc` varchar(50) NOT NULL DEFAULT '0.0000000',
  `eth` varchar(50) NOT NULL DEFAULT '0.0000000',
  `ltc` varchar(50) NOT NULL DEFAULT '0.0000000',
  `xemx` varchar(50) NOT NULL DEFAULT '0.0000000',
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `unique_id`, `userId`, `name`, `amount`, `currency`, `symbol`, `plan`, `interval`, `description`, `share_link`, `redirect_link`, `created_at`, `customer_paid`, `amount_paid`, `btc`, `eth`, `ltc`, `xemx`, `status`) VALUES
(26, '82fbf736f168736ed94ba99aecd695e7', 6, 'My first Payment link 2346', 1000, 'USD', '$', 'recurring', '2', 'skjvjh sav savgh567', '82fbf736f168736ed94ba99aecd695e7', '', '2020-08-26 00:09:23', 5, 0, '11.38931', '10', '0.0000000', '0.0000000', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
