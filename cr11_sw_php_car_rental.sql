-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 01:02 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_sw_php_car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_data`
--

CREATE TABLE `booking_data` (
  `booking_id` int(11) NOT NULL,
  `pick_date` date DEFAULT NULL,
  `ret_date` date DEFAULT NULL,
  `fk_car_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_loc_id` int(11) NOT NULL,
  `fk_ins_type` enum('basic','advanced','complete') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_data`
--

INSERT INTO `booking_data` (`booking_id`, `pick_date`, `ret_date`, `fk_car_id`, `fk_user_id`, `fk_loc_id`, `fk_ins_type`) VALUES
(1, '2017-12-16', '2018-04-24', 0, 0, 0, 'advanced'),
(2, '2017-09-25', '2018-04-14', 0, 0, 0, 'basic'),
(3, '2017-06-30', '2018-06-22', 0, 0, 0, 'complete'),
(4, '2017-07-04', '2018-03-11', 0, 0, 0, 'complete'),
(5, '2017-09-28', '2018-06-08', 0, 0, 0, 'basic'),
(6, '2017-11-01', '2018-03-06', 0, 0, 0, 'complete'),
(7, '2017-08-19', '2018-04-11', 0, 0, 0, 'basic'),
(8, '2017-10-22', '2018-06-22', 0, 0, 0, 'complete'),
(9, '2017-09-16', '2018-04-20', 0, 0, 0, 'basic'),
(10, '2017-12-12', '2018-05-30', 0, 0, 0, 'advanced'),
(11, '2017-11-10', '2018-03-27', 0, 0, 0, 'complete'),
(12, '2017-12-10', '2018-03-18', 0, 0, 0, 'basic'),
(13, '2017-08-01', '2018-02-05', 0, 0, 0, 'complete'),
(14, '2017-08-27', '2018-02-12', 0, 0, 0, 'basic'),
(15, '2017-12-19', '2018-01-01', 0, 0, 0, 'complete'),
(16, '2017-06-29', '2018-03-18', 0, 0, 0, 'basic'),
(17, '2017-10-18', '2018-01-28', 0, 0, 0, 'basic'),
(18, '2017-08-03', '2018-01-05', 0, 0, 0, 'advanced'),
(19, '2017-10-12', '2018-05-29', 0, 0, 0, 'basic'),
(20, '2017-11-08', '2018-02-04', 0, 0, 0, 'advanced'),
(21, '2017-08-21', '2018-04-07', 0, 0, 0, 'basic'),
(22, '2017-10-21', '2018-02-14', 0, 0, 0, 'advanced'),
(23, '2017-08-07', '2018-03-07', 0, 0, 0, 'advanced'),
(24, '2017-08-25', '2018-06-07', 0, 0, 0, 'basic'),
(25, '2017-09-22', '2018-06-18', 0, 0, 0, 'advanced'),
(26, '2017-11-18', '2018-04-25', 0, 0, 0, 'basic'),
(27, '2017-06-27', '2018-06-17', 0, 0, 0, 'basic'),
(28, '2017-11-01', '2018-03-05', 0, 0, 0, 'basic'),
(29, '2017-12-07', '2018-01-01', 0, 0, 0, 'basic'),
(30, '2017-10-15', '2018-05-29', 0, 0, 0, 'basic');

-- --------------------------------------------------------

--
-- Table structure for table `car_data`
--

CREATE TABLE `car_data` (
  `car_id` int(11) NOT NULL,
  `car_manufacturer` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_model` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_mod_year` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_reg_year` date DEFAULT NULL,
  `car_price` int(11) DEFAULT NULL,
  `car_passenger` int(11) DEFAULT NULL,
  `car_km` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_loc_id` int(11) NOT NULL,
  `fk_ins_type` enum('basic','advanced','complete') COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_status` enum('available','unavailable') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_data`
--

INSERT INTO `car_data` (`car_id`, `car_manufacturer`, `car_model`, `car_mod_year`, `car_reg_year`, `car_price`, `car_passenger`, `car_km`, `img`, `fk_loc_id`, `fk_ins_type`, `car_status`) VALUES
(1, 'Lotus', 'Esprit', '1986', '2010-12-25', 131, 6, 91770, 'https://is.gd/zeWdGU', 14, 'basic', 'unavailable'),
(2, 'Infiniti', 'J', '1995', '2017-07-29', 58, 4, 114889, 'https://is.gd/kzppO9', 16, 'advanced', 'available'),
(3, 'Ford', 'Escort', '1990', '2016-08-23', 102, 6, 381523, 'https://is.gd/uLDAP9', 11, 'complete', 'unavailable'),
(4, 'Dodge', 'Dakota Club', '1997', '2013-12-18', 117, 2, 167821, 'https://is.gd/yzyf1q', 12, 'basic', 'available'),
(5, 'Chrysler', 'Town & Country', '2000', '2011-01-04', 134, 5, 263501, 'https://is.gd/CYlNbZ', 13, 'advanced', 'unavailable'),
(6, 'Ford', 'Contour', '2000', '2011-02-12', 80, 2, 276510, 'https://is.gd/24NkfI', 17, 'complete', 'available'),
(7, 'Ford', 'Club Wagon', '1992', '2012-03-02', 101, 3, 127059, 'https://is.gd/ZbmIEA', 13, 'basic', 'unavailable'),
(8, 'GMC', 'Suburban 2500', '1994', '2012-12-04', 73, 6, 144976, 'https://is.gd/My7Y1B', 12, 'advanced', 'available'),
(9, 'Dodge', 'Ram 1500', '2001', '2012-01-17', 116, 4, 191140, 'https://is.gd/bvZp8C', 17, 'complete', 'unavailable'),
(10, 'GMC', '3500 Club Coupe', '1992', '2016-12-05', 68, 2, 117859, 'https://is.gd/MvsmrX', 14, 'basic', 'available'),
(11, 'Toyota', 'Avalon', '2010', '2014-09-27', 95, 5, 43187, 'https://is.gd/zsz0Kr', 15, 'advanced', 'unavailable'),
(12, 'Ford', 'Taurus X', '2008', '2012-09-07', 28, 6, 328061, 'https://is.gd/fC7AEz', 11, 'complete', 'available'),
(13, 'Suzuki', 'Swift', '1988', '2014-04-04', 129, 2, 29210, 'https://is.gd/JJX2Z9', 17, 'basic', 'unavailable'),
(14, 'Nissan', 'Sentra', '2008', '2014-10-21', 53, 3, 336707, 'https://is.gd/gUNGfo', 15, 'advanced', 'available'),
(15, 'Honda', 'Pilot', '2005', '2013-01-28', 149, 4, 51392, 'https://is.gd/RlS3Bk', 14, 'complete', 'unavailable'),
(16, 'GMC', 'Sierra', '2008', '2018-02-01', 63, 2, 296940, 'https://is.gd/VKPniC', 12, 'basic', 'available'),
(17, 'Pontiac', 'Grand Prix', '1974', '2013-06-26', 100, 3, 83763, 'https://is.gd/Ts2c1X', 12, 'advanced', 'unavailable'),
(18, 'Ford', 'E150', '2008', '2011-06-08', 99, 2, 24386, 'https://is.gd/omjcBi', 15, 'complete', 'available'),
(19, 'Mercury', 'Marauder', '2004', '2012-05-12', 73, 3, 316182, 'https://is.gd/kXeC4b', 12, 'basic', 'unavailable'),
(20, 'Volvo', 'XC70', '2009', '2017-12-01', 75, 4, 75999, 'https://is.gd/6ZQoZC', 14, 'advanced', 'available'),
(21, 'Dodge', 'Intrepid', '2003', '2010-11-30', 70, 3, 217690, 'https://is.gd/sIxhJ5', 17, 'complete', 'unavailable'),
(22, 'Infiniti', 'G35', '2004', '2014-04-11', 88, 3, 152039, 'https://is.gd/zwYs8N', 12, 'basic', 'available'),
(23, 'Chevrolet', 'Cavalier', '1995', '2016-08-12', 61, 2, 57684, 'https://is.gd/82ayPN', 13, 'advanced', 'unavailable'),
(24, 'Mazda', 'RX-7', '1993', '2013-06-20', 130, 2, 366244, 'https://is.gd/BaVbgI', 15, 'complete', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `ins_data`
--

CREATE TABLE `ins_data` (
  `ins_type` enum('basic','advanced','complete') COLLATE utf8_unicode_ci NOT NULL,
  `ins_price` int(11) DEFAULT NULL,
  `ins_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ins_data`
--

INSERT INTO `ins_data` (`ins_type`, `ins_price`, `ins_id`) VALUES
('basic', 10, 1),
('advanced', 20, 2),
('complete', 30, 3);

-- --------------------------------------------------------

--
-- Table structure for table `loc_data`
--

CREATE TABLE `loc_data` (
  `loc_id` int(11) NOT NULL,
  `loc_name` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loc_lati` decimal(20,6) DEFAULT NULL,
  `loc_long` decimal(20,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loc_data`
--

INSERT INTO `loc_data` (`loc_id`, `loc_name`, `loc_lati`, `loc_long`) VALUES
(11, '22th district', '48.238952', '16.461739'),
(12, '14th district', '48.207358', '16.270696'),
(13, 'Vienna Airport', '48.116142', '16.566010'),
(14, '10th district', '48.158482', '16.394691'),
(15, '23th district', '48.159582', '16.284142'),
(16, '11th District', '48.149868', '16.387635'),
(17, '1st District', '48.204421', '16.374607'),
(18, '21st District', '48.271368', '16.413731'),
(19, '2nd District', '48.210751', '16.418482'),
(20, '4th District', '48.189870', '16.370377');

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fk_loc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`office_id`, `office_name`, `fk_loc_id`) VALUES
(1, 'Wien 10', 14),
(2, 'Wien 21', 18),
(3, 'Wien 1', 17),
(4, 'Airport', 13),
(5, 'Wien 2', 19),
(6, 'Wien 4', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userEmail` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userPass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `first_name`, `last_name`) VALUES
(1, 'test user', 'test@user.com', 'ae5deb822e0d71992900471a7199d0d95b8e7c9d05c40a8245a281fd2c1d6684', NULL, NULL),
(2, 'test abc', 'test@user1.com', 'f153683d3b1aafadd5ecb6bfb96fa0d6557dddc87529d1db5e2057da173d07a4', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_data`
--
ALTER TABLE `booking_data`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `fk_ins_type` (`fk_ins_type`);

--
-- Indexes for table `car_data`
--
ALTER TABLE `car_data`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_loc_id` (`fk_loc_id`),
  ADD KEY `fk_ins_type` (`fk_ins_type`);

--
-- Indexes for table `ins_data`
--
ALTER TABLE `ins_data`
  ADD PRIMARY KEY (`ins_type`);

--
-- Indexes for table `loc_data`
--
ALTER TABLE `loc_data`
  ADD PRIMARY KEY (`loc_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`office_id`),
  ADD KEY `fk_loc_id` (`fk_loc_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_data`
--
ALTER TABLE `booking_data`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `car_data`
--
ALTER TABLE `car_data`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `loc_data`
--
ALTER TABLE `loc_data`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_data`
--
ALTER TABLE `booking_data`
  ADD CONSTRAINT `booking_data_ibfk_1` FOREIGN KEY (`fk_ins_type`) REFERENCES `ins_data` (`ins_type`);

--
-- Constraints for table `car_data`
--
ALTER TABLE `car_data`
  ADD CONSTRAINT `car_data_ibfk_1` FOREIGN KEY (`fk_loc_id`) REFERENCES `loc_data` (`loc_id`),
  ADD CONSTRAINT `car_data_ibfk_2` FOREIGN KEY (`fk_ins_type`) REFERENCES `ins_data` (`ins_type`);

--
-- Constraints for table `offices`
--
ALTER TABLE `offices`
  ADD CONSTRAINT `offices_ibfk_1` FOREIGN KEY (`fk_loc_id`) REFERENCES `loc_data` (`loc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
