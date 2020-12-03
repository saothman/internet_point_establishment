-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 08:11 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internet_point_establishment`
--
CREATE DATABASE IF NOT EXISTS `internet_point_establishment` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `internet_point_establishment`;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL COMMENT '1',
  `EMP_ID` int(10) NOT NULL,
  `EMP_NAME` varchar(30) NOT NULL,
  `ENTITY_ID` tinyint(4) NOT NULL,
  `EMP_OFFICE` varchar(6) NOT NULL,
  `EMP_TELE` int(6) NOT NULL,
  `EMP_EMAIL` varchar(30) NOT NULL,
  `TYPE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `EMP_ID`, `EMP_NAME`, `ENTITY_ID`, `EMP_OFFICE`, `EMP_TELE`, `EMP_EMAIL`, `TYPE`) VALUES
(1, 1234567890, 'نورة الدعيجي', 20, '20T24', 52821, 'n@gmail.com', 'مدير'),
(2, 1234567891, 'Sarah Alothman', 3, '20T26', 12345, 's@gmail.com', 'موظف مسؤول'),
(3, 1234567892, 'غيداء', 6, '20T44', 12344, 'g@gmail.com', 'موظف مسؤول');

-- --------------------------------------------------------

--
-- Table structure for table `entity`
--

CREATE TABLE `entity` (
  `ID` tinyint(4) NOT NULL,
  `ENTITY_NAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entity`
--

INSERT INTO `entity` (`ID`, `ENTITY_NAME`) VALUES
(1, 'كلية الآداب'),
(2, 'كلية التربية'),
(3, 'كلية إدارة الأعمال'),
(4, 'كلية اللغات والترجمة'),
(5, 'كلية العلوم'),
(6, 'كلية علوم الحاسب والمعلومات'),
(7, 'كلية الحقوق والعلوم السياسية'),
(8, 'كلية الصيدلة'),
(9, 'كلية الطب'),
(10, 'كلية طب الأسنان'),
(11, 'كلية العلوم الطبية التطبيقية'),
(12, 'كلية التمريض'),
(20, 'إدارة الجامعة'),
(21, 'عمادة الدراسات العليا'),
(22, 'عمادة القبول والتسجيل '),
(23, 'المكتبة المركزية'),
(25, 'مركز خدمات الطالبات'),
(26, 'مبنى'),
(27, 'A  وكالة عمادة شؤون الطلاب '),
(28, 'مبنى'),
(29, 'A'),
(30, 'B القاعات المشتركة'),
(31, 'القاعات المشتركة');

-- --------------------------------------------------------

--
-- Table structure for table `max_point`
--

CREATE TABLE `max_point` (
  `ENT_ID` tinyint(4) NOT NULL,
  `MAX_POINT` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `max_point`
--

INSERT INTO `max_point` (`ENT_ID`, `MAX_POINT`) VALUES
(3, 5),
(6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `new_order`
--

CREATE TABLE `new_order` (
  `DATE` date NOT NULL,
  `ORDER_ID` varchar(100) NOT NULL,
  `EMP_ID` int(10) NOT NULL,
  `ENT_ID` tinyint(4) NOT NULL,
  `FLOOR` varchar(3) NOT NULL,
  `ORDER_OFFICE` varchar(6) NOT NULL,
  `SERIAL_NO` varchar(6) NOT NULL,
  `POINT_NO` tinyint(2) NOT NULL,
  `NOTE` mediumtext NOT NULL,
  `OTHER_NAME` varchar(30) NOT NULL,
  `ORDER_TELE` int(6) NOT NULL,
  `STATUS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `new_order`
--

INSERT INTO `new_order` (`DATE`, `ORDER_ID`, `EMP_ID`, `ENT_ID`, `FLOOR`, `ORDER_OFFICE`, `SERIAL_NO`, `POINT_NO`, `NOTE`, `OTHER_NAME`, `ORDER_TELE`, `STATUS`) VALUES
('2020-05-18', '200518093215', 1234567891, 3, 'F-1', '20T24', 'S-4', 3, 'test	  	  ', 'غيداء', 111234, 'جاري الإنشاء'),
('2020-09-18', '200918035223', 1234567892, 6, 'F-1', '20T44', 'S-5', 3, '	  	  wde	  	  	  	  ', 'سارة', 123451, 'تحت الدراسة'),
('2020-09-18', '200918035403', 1234567892, 6, 'G-0', '20T26', 'D-6', 2, '	  	  	  	  addf	  	  	  	  	  	  ', 'سارة', 123451, 'جديد');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMP_OFFICE` (`EMP_OFFICE`),
  ADD UNIQUE KEY `EMP_TELE` (`EMP_TELE`),
  ADD UNIQUE KEY `EMAIL` (`EMP_EMAIL`),
  ADD UNIQUE KEY `EMP_ID` (`EMP_ID`),
  ADD KEY `ENTITY_ID` (`ENTITY_ID`);

--
-- Indexes for table `entity`
--
ALTER TABLE `entity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `max_point`
--
ALTER TABLE `max_point`
  ADD PRIMARY KEY (`ENT_ID`);

--
-- Indexes for table `new_order`
--
ALTER TABLE `new_order`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '1', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `entity`
--
ALTER TABLE `entity`
  MODIFY `ID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`ENTITY_ID`) REFERENCES `entity` (`ID`);

--
-- Constraints for table `max_point`
--
ALTER TABLE `max_point`
  ADD CONSTRAINT `max_point_ibfk_1` FOREIGN KEY (`ENT_ID`) REFERENCES `entity` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
