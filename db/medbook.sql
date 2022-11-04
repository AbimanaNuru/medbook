-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 06:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `cons_id` int(11) NOT NULL,
  `consultation_user_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_weight` varchar(2000) NOT NULL,
  `patient_consultation_details` mediumtext NOT NULL,
  `treatment_process` varchar(2000) NOT NULL,
  `laboratory_status` varchar(200) NOT NULL,
  `decision` mediumtext NOT NULL,
  `date_and_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`cons_id`, `consultation_user_id`, `patient_id`, `patient_weight`, `patient_consultation_details`, `treatment_process`, `laboratory_status`, `decision`, `date_and_time`) VALUES
(1, 4, 4, '8', 'Arwaye Munda Nahandi HAntu Hacye Cyane', '', '', '', '2022-08-11 09:40:06'),
(2, 4, 4, '9', 'nnnn', '', '', '', '2022-08-11 17:36:30'),
(3, 4, 5, '20', 'afite ibibazo bitandukanye ariko ntabwo bize cyane baba', 'Laboratory Process', '', '', '2022-08-11 17:38:51'),
(4, 4, 6, '20', 'urarwye arko ndabona bidakaze cyane umuhungu ariko ufite kujya muri labo kbs kbs&nbsp;', 'Laboratory Process', 'Tested', 'Tukwandikiye&nbsp; Kwalitamu sha&nbsp;', '2022-08-11 23:01:11'),
(5, 4, 6, '30', 'Arwaye Munda', 'Laboratory Process', 'Tested', '', '2022-08-12 01:57:41'),
(6, 5, 8, '78', 'MALARIA POSITIVE', 'Laboratory Process', 'Tested', 'hwjsejssggg33kkk', '2022-08-12 08:00:58'),
(7, 4, 6, '20', 'Arwaye munda', 'Laboratory Process', 'Tested', '', '2022-08-12 11:34:17'),
(8, 6, 9, '34', 'umutwe', 'Laboratory Process', 'Tested', 'ufate placetamol', '2022-11-02 12:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_test`
--

CREATE TABLE `laboratory_test` (
  `labo_test_id` int(11) NOT NULL,
  `laboratory_user_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `consultation_id` int(11) NOT NULL,
  `consultaant_user_id` int(11) NOT NULL,
  `laboratory_test_details` mediumtext NOT NULL,
  `test_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laboratory_test`
--

INSERT INTO `laboratory_test` (`labo_test_id`, `laboratory_user_id`, `patient_id`, `consultation_id`, `consultaant_user_id`, `laboratory_test_details`, `test_date_time`) VALUES
(1, 3, 5, 3, 4, '', '2022-08-11 18:34:30'),
(2, 3, 5, 3, 4, 'ok', '2022-08-11 18:35:26'),
(3, 3, 5, 3, 4, 'hhhh', '2022-08-11 18:38:58'),
(4, 3, 5, 3, 4, 'arwaye malariya umuhungu wanyu', '2022-08-11 18:41:10'),
(5, 3, 6, 4, 4, 'ego ndabona nta maralia arwaye kbs kbs&nbsp;', '2022-08-11 23:02:50'),
(6, 3, 6, 5, 4, 'Munda Hafite ikibazo&nbsp;', '2022-08-12 02:11:06'),
(7, 3, 8, 6, 5, 'hegejjrj', '2022-08-12 08:03:29'),
(8, 3, 6, 7, 4, 'Yego Cyane', '2022-08-12 11:38:30'),
(9, 7, 9, 8, 6, 'cured', '2022-11-02 12:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `p_id` int(11) NOT NULL,
  `consultant_id` int(11) NOT NULL,
  `p_cardnumber` varchar(2000) NOT NULL,
  `p_fullname` varchar(2000) NOT NULL,
  `p_email` varchar(2000) NOT NULL,
  `p_phonenumber` varchar(2000) NOT NULL,
  `p_idnumber` varchar(2000) NOT NULL,
  `p_ages` varchar(2000) NOT NULL,
  `p_insurance` varchar(2000) NOT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`p_id`, `consultant_id`, `p_cardnumber`, `p_fullname`, `p_email`, `p_phonenumber`, `p_idnumber`, `p_ages`, `p_insurance`, `registration_date`) VALUES
(1, 0, '4', 'nuru', 'nuru@gmail.com', '088', '9999999999999999', '9999999999', 'RSSB', '2022-08-10 18:28:08'),
(2, 4, '', 'hello', 'hello@gmail.com', '333', '2222222222222222', '2222222222', 'RSSB', '2022-08-10 18:30:10'),
(3, 4, 'EQCORA5F80', 'amafoto', 'hellcco@gmail.com', '222', '2222222222222222', '2222222222', 'MITUELE', '2022-08-10 18:31:23'),
(4, 4, 'KEL97SOICB', 'hello', 'hhkkkk@gmail.com', '3222222221', '1222222223333333', '2', 'PRIRME INSURANCE', '2022-08-10 18:32:56'),
(5, 4, 'J90N4ROSGZ', 'cyane', 'huru@gmail.com', '2321111111', '5555555444444443', '3', 'PRIRME INSURANCE', '2022-08-10 18:39:19'),
(6, 4, 'WK4H3LDEOT', 'buguzi', 'habayo@gmail.com', '9999994444', '2222200009999999', '3', 'MITUELE', '2022-08-10 22:48:41'),
(7, 4, 'IMOR4Z6UQV', 'ice', 'ice@gmail.com', '2333333344', '3423444444444444', '4', 'PRIRME INSURANCE', '2022-08-10 22:55:08'),
(8, 5, 'IB41MTP23R', 'nuru', '', '', '', '67', 'MITUELE', '2022-08-12 07:58:05'),
(9, 6, '7W6HK0SBQ9', 'patient1', 'patirnt1@gmail.com', '0789666666', '1111111111111111', '13', 'RAMA', '2022-11-02 12:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_full_name` mediumtext NOT NULL,
  `user_email` mediumtext NOT NULL,
  `user_phone_number` mediumtext NOT NULL,
  `idnumber` varchar(2000) NOT NULL,
  `user_type` mediumtext NOT NULL,
  `user_password` mediumtext NOT NULL,
  `user_regitration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_full_name`, `user_email`, `user_phone_number`, `idnumber`, `user_type`, `user_password`, `user_regitration_date`) VALUES
(1, 'Med Book', 'admin@medbook.com', '0789424104', '', 'Admin', '1234', '2022-08-07 23:41:11'),
(2, 'pharmacy', 'pharmacy@medbook.com', '0781232234', '', 'Admin', '1234', '2022-08-10 12:10:07'),
(3, 'Abimana Nuru', 'nuruabimana@gmail.com', '0daad82bde9918de8467bff7f7b2a3', '1222222222222222', 'Laboratory', '1234', '2022-08-10 12:47:18'),
(4, 'Med Book Consultant', 'cons@medbook.com', '0789433738', '1111111111111111', 'Consultant', '1234', '2022-08-10 16:58:49'),
(5, 'henriette', 'ikirezihn@gmail.com', '0788865378', '1999876543356699', 'Consultant', '1234', '2022-08-12 07:55:50'),
(6, 'is', 'is@gmail.com', '0789481817', '2222222222222222', 'Consultant', '1234', '2022-11-02 12:41:48'),
(7, 'turatsinze', 'tura@gmail.com', '0789481817', '3333333333333333', 'Laboratory', '1234', '2022-11-02 12:42:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`cons_id`);

--
-- Indexes for table `laboratory_test`
--
ALTER TABLE `laboratory_test`
  ADD PRIMARY KEY (`labo_test_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `cons_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `laboratory_test`
--
ALTER TABLE `laboratory_test`
  MODIFY `labo_test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
