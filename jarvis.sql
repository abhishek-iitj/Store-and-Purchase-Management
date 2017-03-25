-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2017 at 12:36 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jarvis`
--

-- --------------------------------------------------------

--
-- Table structure for table `loan_register`
--

CREATE TABLE `loan_register` (
  `name` varchar(30) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_qty` varchar(4) NOT NULL,
  `item_price` varchar(10) NOT NULL,
  `amount_used` varchar(10) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_register`
--

INSERT INTO `loan_register` (`name`, `userid`, `item_name`, `item_qty`, `item_price`, `amount_used`, `date`) VALUES
('Abhishek Sah', 'sah.1', 'Bulb', '1', '150', '150', ''),
('Abhishek Sah', 'sah.1', 'Chalk', '2', '30', '60', ''),
('Abhishek Sah', 'sah.1', 'Chalk', '1', '30', '30', '28-02-2017'),
('', '60', '28-02-2017', 'Chal', '', '2', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Chalk', '2', '30', '60', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Duster', '3', '30', '90', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Chalk', '1', '30', '30', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Bulb', '1', '150', '150', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Duster', '2', '30', '60', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Duster', '1', '30', '30', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Chalk', '3', '30', '90', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Bulb', '1', '150', '150', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Duster', '4', '30', '120', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Bulb', '1', '150', '150', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Bulb', '1', '150', '150', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Remote', '10', '120', '1200', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Bulb', '1', '150', '150', '28-02-2017'),
('Vinit Joukani', 'joukani.1', 'Bulb', '20', '150', '3000', '28-02-2017'),
('Vinit Joukani', 'joukani.1', 'Remote', '9', '120', '1080', '28-02-2017'),
('Vinit Joukani', 'joukani.1', 'Duster', '5', '30', '150', '28-02-2017'),
('Vinit Joukani', 'joukani.1', 'Scanners', '9', '3800', '34200', '28-02-2017'),
('Vinit Joukani', 'joukani.1', 'Remote', '10', '120', '1200', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Remote', '1', '120', '120', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Remote', '2', '120', '240', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Bulb', '1', '150', '150', '28-02-2017'),
('Abhishek Sah', 'sah.1', 'Chalk', '2', '30', '60', '28-02-2017'),
('Vinit Joukani', 'joukani.1', 'Remote', '1', '120', '120', '28-02-2017'),
('Vinit Joukani', 'joukani.1', 'Remote', '1', '120', '120', '28-02-2017'),
('Vinit Joukani', 'joukani.1', 'Remote', '1', '120', '120', '28-02-2017'),
('Vinit Joukani', 'joukani.1', 'Remote', '2', '120', '240', '28-02-2017'),
('Rashi Sahu', 'sahu.3', 'Mouse', '2', '350', '700', '01-03-2017'),
('Rashi Sahu', 'sahu.3', 'Bulb', '1', '150', '150', '01-03-2017'),
('Rashi Sahu', 'sahu.3', 'Remote', '1', '120', '120', '01-03-2017'),
('Vinit Joukani', 'joukani.1', 'Mouse', '3', '350', '1050', '04-03-2017'),
('Vinit Joukani', 'joukani.1', 'Remote', '2', '120', '240', '04-03-2017'),
('Vinit Joukani', 'joukani.1', 'Remote', '5', '120', '600', '04-03-2017'),
('Abhishek Sah', 'sah.1', 'Duster', '3', '30', '90', '05-03-2017'),
('Abhishek Sah', 'sah.1', 'Remote', '4', '120', '480', '05-03-2017');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `userid` varchar(20) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_incoming_requests`
--

CREATE TABLE `store_incoming_requests` (
  `serial` int(11) NOT NULL,
  `item_name` varchar(20) DEFAULT NULL,
  `item_qty` varchar(20) DEFAULT NULL,
  `item_price` varchar(20) DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `processed` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_incoming_requests`
--

INSERT INTO `store_incoming_requests` (`serial`, `item_name`, `item_qty`, `item_price`, `userid`, `processed`) VALUES
(4, 'Remote', '1', '120', 'sah.1', '1'),
(5, 'Remote', '2', '240', 'sahu.3', '1'),
(6, 'Duster', '10', '300', 'sah.1', '1'),
(7, 'Remote', '2', '240', 'sahu.3', '1'),
(8, 'Duster', '5', '150', 'sah.1', '1'),
(9, 'Duster', '2', '60', 'sah.1', '1'),
(10, 'Chalk', '2', '60', 'sah.1', '1'),
(11, 'Chalk', '2', '60', 'sah.1', '1'),
(12, 'Duster', '3', '90', 'sah.1', '1'),
(13, 'Chalk', '1', '30', 'sah.1', '1'),
(14, 'Chalk', '3', '90', 'sah.1', '1'),
(15, 'Duster', '4', '120', 'sah.1', '1'),
(16, 'Remote', '10', '1200', 'sah.1', '1'),
(17, 'Bulb', '20', '3000', 'joukani.1', '1'),
(18, 'Remote', '9', '1080', 'joukani.1', '1'),
(19, 'Duster', '5', '150', 'joukani.1', '1'),
(20, 'Scanners', '9', '34200', 'joukani.1', '1'),
(21, 'Remote', '10', '1200', 'joukani.1', '1'),
(22, 'Remote', '1', '120', 'sah.1', '1'),
(23, 'Remote', '2', '240', 'sah.1', '1'),
(24, 'Remote', '1', '120', 'joukani.1', '1'),
(25, 'Remote', '1', '120', 'joukani.1', '1'),
(26, 'Remote', '1', '120', 'joukani.1', '1'),
(27, 'Remote', '2', '240', 'joukani.1', '1'),
(28, 'Remote', '1', '120', 'sahu.3', '1'),
(29, 'Remote', '2', '240', 'joukani.1', '1'),
(30, 'Remote', '5', '600', 'joukani.1', '1'),
(31, 'Remote', '4', '480', 'sah.1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

CREATE TABLE `store_items` (
  `item_name` varchar(50) NOT NULL,
  `item_price` varchar(50) NOT NULL,
  `item_qty` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`item_name`, `item_price`, `item_qty`, `description`) VALUES
('Laptop', '27000', '15', 'Dell Laptops, i3 RAM< %00 GB HDD< Win 10'),
('Printer', '3000', '10', 'HP Canon Laser Jet Printer'),
('Scanners', '3800', '6', 'HP Scanners,Optical Char Recog, MOdel HP13BH12'),
('Bulb', '150', '16', 'Philips 150 W White LED Bulbs'),
('Chalk', '30', '13', 'Camel Chalks'),
('Mouse', '350', '19', 'Dell Optical Mouses, Wireless'),
('Remote', '120', '0', 'Projector Remote Presenter - Logitech-R400'),
('Papers', '150', '5', 'A4 Sheet paper. Per Unit contains 300 papers'),
('Duster', '30', '4', 'Chalk Board Duster. No ink rubbing.'),
('Projector', '2700', '9', 'Sony HD Classroom Projector'),
('Tubelight', '200', '10', '70W Bajaj Tubelights');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `balance` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `name`, `type`, `balance`) VALUES
('sah.1', 'jarvis', 'Abhishek Sah', 'STUDENT', '99430'),
('pradhan.1', 'jarvis101', 'S. Pradhan', 'Admin', '100000'),
('joukani.1', 'vjbravo', 'Vinit Joukani', '1', '98110');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store_incoming_requests`
--
ALTER TABLE `store_incoming_requests`
  ADD PRIMARY KEY (`serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store_incoming_requests`
--
ALTER TABLE `store_incoming_requests`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
