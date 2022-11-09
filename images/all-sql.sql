-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 06:04 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--
CREATE DATABASE IF NOT EXISTS `db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db`;

-- --------------------------------------------------------

--
-- Table structure for table `accepted_form`
--

CREATE TABLE `accepted_form` (
  `id` int(20) NOT NULL,
  `profile_pic` varchar(300) NOT NULL,
  `cause_title` varchar(300) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `amount` int(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `eligible` varchar(100) NOT NULL,
  `cause_explain` varchar(1000) NOT NULL,
  `doc1` varchar(300) NOT NULL,
  `doc2` varchar(300) NOT NULL,
  `doc3` varchar(300) NOT NULL,
  `acc_name` varchar(30) NOT NULL,
  `acc_num` int(30) NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `ifsc` varchar(30) NOT NULL,
  `passbook` varchar(300) NOT NULL,
  `pan_num` int(30) NOT NULL,
  `pan_copy` varchar(300) NOT NULL,
  `adhaar_num` int(30) NOT NULL,
  `adhaar_copy` varchar(300) NOT NULL,
  `optional` varchar(300) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT 'Accepted',
  `date` varchar(20) NOT NULL,
  `cause_summary` varchar(200) NOT NULL,
  `person` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accepted_form`
--

INSERT INTO `accepted_form` (`id`, `profile_pic`, `cause_title`, `purpose`, `amount`, `location`, `eligible`, `cause_explain`, `doc1`, `doc2`, `doc3`, `acc_name`, `acc_num`, `bank_name`, `ifsc`, `passbook`, `pan_num`, `pan_copy`, `adhaar_num`, `adhaar_copy`, `optional`, `name`, `status`, `date`, `cause_summary`, `person`) VALUES
(2, 'Screenshot (10).png', 'Help mister to pay his btech fees', 'Health', 60000, 'Hyderabad', 'Yes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the ', 'Screenshot (16).png', '', '', 'Roshan', 2147483647, 'Andhra Bank', 'kjhgfdfgh9876567', 'Screenshot (15).png', 0, 'Screenshot (9).png', 2147483647, 'Screenshot (9).png', '', 'roshan', 'Accepted', '2022-02-20', '', NULL),
(3, 'Screenshot (10).png', 'Help Roshan to pay his btech fees', 'Health', 200000, 'Hyderabad', 'Yes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Screenshot (16).png', 'Screenshot (15).png', 'Screenshot (15).png', 'Roshan', 2147483647, 'Andhra Bank', 'kjhgfdfgh9876567', 'Screenshot (15).png', 0, 'Screenshot (9).png', 2147483647, 'Screenshot (9).png', '', 'roshan', 'Accepted', '2022-02-03', '', NULL),
(4, 'Screenshot (10).png', 'Help faisal to pay his btech fees', 'Health', 40000, 'Hyderabad', 'Yes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Screenshot (16).png', 'Screenshot (15).png', 'Screenshot (15).png', 'Roshan', 2147483647, 'Andhra Bank', 'kjhgfdfgh9876567', 'Screenshot (15).png', 0, 'Screenshot (9).png', 2147483647, 'Screenshot (9).png', '', 'faisal', 'Accepted', '2022-02-01', '', NULL),
(5, 'Windows-10-Wallpapers-21-3840-x-2160.jpg', 'edited form pdf', 'Education', 100000, 'AQ', 'Yes', '<p><strong>Hello this is explanation of cause</strong></p><p><i>&nbsp;jkjkjinjnkjnkjnjkn</i></p><figure class=\"table\"><table><tbody><tr><td>&nbsp;</td><td>kjb jk</td><td>&nbsp;hj</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>kjbjkjk</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table></figure>', 'manasa.pdf', 'Dua E Masura.pdf', '', 'Roshan', 12345, 'MKDH', 'AND12345000', 'youtube.jpeg', 0, 'sign-roshan.jpeg', 2147483647, 'Dua E Masura.pdf', '', 'faisal', 'Accepted', '', 'His is a summary', 'Self');

-- --------------------------------------------------------

--
-- Table structure for table `bank_pending`
--

CREATE TABLE `bank_pending` (
  `id` int(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `method` varchar(200) NOT NULL,
  `tran_date` varchar(20) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `tran_id` varchar(20) NOT NULL,
  `optional` varchar(200) NOT NULL,
  `checked` varchar(30) DEFAULT NULL,
  `raiseid` int(20) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `bank_pending`
--
DELIMITER $$
CREATE TRIGGER `date_trigger` BEFORE INSERT ON `bank_pending` FOR EACH ROW BEGIN
    IF new.date IS NULL THEN
        SET NEW.date = CURDATE();
        SET NEW.time = CURTIME();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bank_reject`
--

CREATE TABLE `bank_reject` (
  `id` int(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `method` varchar(200) NOT NULL,
  `tran_date` varchar(20) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `tran_id` varchar(20) NOT NULL,
  `optional` varchar(200) NOT NULL,
  `checked` varchar(30) DEFAULT NULL,
  `raiseid` int(20) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_reject`
--

INSERT INTO `bank_reject` (`id`, `type`, `amount`, `name`, `email`, `phone`, `city`, `country`, `comment`, `method`, `tran_date`, `bank_name`, `tran_id`, `optional`, `checked`, `raiseid`, `date`, `time`) VALUES
(1, 'Sadqua', 2000, 'admin', 'admin@admin.com', 2147483647, 'kdfnnf', '0', '', '1', '2022-02-02', 'ksk', '122143343', '', 'no', 4, '2022-02-19', '11:16:38'),
(2, 'Zakat', 20000, 'admin', 'admin@admin.com', 2147483647, 'mklkjkm', '0', '', '1', '2022-02-02', 'Andhra Bank', '100200303032300', '', 'no', 4, '2022-02-19', '11:18:38'),
(3, 'Select', 5000, 'admin', 'admin@admin.com', 2147483647, 'kfmggjj', '0', '', '1', '2022-02-03', 'Andhra Bank', '10020030303239', '', 'no', 4, '2022-02-19', '11:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `funds_form`
--

CREATE TABLE `funds_form` (
  `id` int(20) NOT NULL,
  `profile_pic` varchar(300) NOT NULL,
  `cause_title` varchar(300) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `amount` int(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `eligible` varchar(100) NOT NULL,
  `cause_explain` varchar(1000) NOT NULL,
  `doc1` varchar(300) NOT NULL,
  `doc2` varchar(300) NOT NULL,
  `doc3` varchar(300) NOT NULL,
  `acc_name` varchar(30) NOT NULL,
  `acc_num` int(30) NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `ifsc` varchar(30) NOT NULL,
  `passbook` varchar(300) NOT NULL,
  `pan_num` int(30) NOT NULL,
  `pan_copy` varchar(300) NOT NULL,
  `adhaar_num` int(30) NOT NULL,
  `adhaar_copy` varchar(300) NOT NULL,
  `optional` varchar(300) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` date DEFAULT NULL,
  `cause_summary` varchar(200) NOT NULL,
  `person` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `likeid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `raiseid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like`
--

INSERT INTO `like` (`likeid`, `username`, `raiseid`) VALUES
(70, 'faisal', 4),
(189, 'admin', 3),
(191, 'roshan', 4),
(196, '', 4),
(198, 'roshan', 2),
(202, 'admin', 2),
(206, 'roshan', 3),
(210, 'admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `method` varchar(200) NOT NULL,
  `tran_date` varchar(20) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `tran_id` varchar(20) NOT NULL,
  `optional` varchar(200) NOT NULL,
  `checked` varchar(30) DEFAULT NULL,
  `raiseid` int(20) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `type`, `amount`, `name`, `email`, `phone`, `city`, `country`, `comment`, `method`, `tran_date`, `bank_name`, `tran_id`, `optional`, `checked`, `raiseid`, `date`, `time`) VALUES
(5, 'Fitra', 909, 'roshan', 'mdroshan@gmail.com', 2147483647, 'ookokoko', '0', '', '1', '2009-09-09', 'Andhra Bank', '10020030303239', '', 'no', 3, '2022-02-17', '11:11:11'),
(6, 'Sadqua', 200000, 'roshan', 'roshan@gmail.com', 2147483647, 'delhi', '0', '', '1', '2022-02-01', 'BBBB', '10020030303231', '', 'no', 3, '2022-02-18', '11:11:23'),
(7, 'Kaffara', 1000, 'wjdksd', 'admin@admin.com', 2147483647, 'powpoe', '0', '', '1', '2022-02-01', 'BBBB', '1002000303239', '', 'no', 4, '2022-02-19', '11:11:25'),
(8, 'Sadqua', 3434, 'admin', 'admin@admin.com', 2147483647, 'dfdfdfdf', '0', '', '1', '2022-02-01', 'Andhra Bank', '10020030303434', '', 'no', 4, '2022-02-19', '11:22:22'),
(9, 'Fitra', 10000, 'admin', 'admin@admin.com', 2147483647, 'krkkeek', '0', '', '1', '2022-02-01', 'APB', '100030303239', '', 'no', 4, '2022-02-19', '11:23:28'),
(10, 'Sadqua', 100, 'admin', 'admin@admin.com', 2147483647, 'jkflrrm', '0', '', '1', '2022-02-01', 'Andhra Bank', '10020303239', '', 'no', 4, '2022-02-19', '11:28:22'),
(11, 'Fitra', 3000, 'admin', 'admin@admin.com', 2147483647, 'dmdkmdkme', '0', '', '1', '2022-02-01', 'Andhra Bank', '100200303049', '', 'no', 4, '2022-02-19', '11:34:54'),
(12, 'Zakat', 10200, 'admin', 'admin@admin.com', 2147483647, 'jfhtihj', 'Hyderabad', '', '1', '2022-01-20', 'ALDG', '9038479381', '', 'no', 4, '2022-02-19', '12:12:13'),
(15, 'Fitra', 1000, 'roshan', 'roshan@gmail.com', 2147483647, 'jkghnrj', 'Hyderabad', '', '1', '2022-02-19', 'MKDH', '904589', '', 'yes', 3, '2022-02-19', '22:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_form`
--

CREATE TABLE `rejected_form` (
  `id` int(20) NOT NULL,
  `profile_pic` varchar(300) NOT NULL,
  `cause_title` varchar(300) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `amount` int(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `eligible` varchar(100) NOT NULL,
  `cause_explain` varchar(1000) NOT NULL,
  `doc1` varchar(300) NOT NULL,
  `doc2` varchar(300) NOT NULL,
  `doc3` varchar(300) NOT NULL,
  `acc_name` varchar(30) NOT NULL,
  `acc_num` int(30) NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `ifsc` varchar(30) NOT NULL,
  `passbook` varchar(300) NOT NULL,
  `pan_num` int(30) NOT NULL,
  `pan_copy` varchar(300) NOT NULL,
  `adhaar_num` int(30) NOT NULL,
  `adhaar_copy` varchar(300) NOT NULL,
  `optional` varchar(300) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT 'Rejected',
  `date` varchar(20) NOT NULL,
  `cause_summary` varchar(200) NOT NULL,
  `person` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rejected_form`
--

INSERT INTO `rejected_form` (`id`, `profile_pic`, `cause_title`, `purpose`, `amount`, `location`, `eligible`, `cause_explain`, `doc1`, `doc2`, `doc3`, `acc_name`, `acc_num`, `bank_name`, `ifsc`, `passbook`, `pan_num`, `pan_copy`, `adhaar_num`, `adhaar_copy`, `optional`, `name`, `status`, `date`, `cause_summary`, `person`) VALUES
(1, 'Windows-10-Wallpapers-21-3840-x-2160.jpg', 'Help gopi to pay his btech fees', 'Health', 400003, '', 'Yes', '<figure class=\"table\"><table><tbody><tr><td>kjbjkbjk</td><td>b j, j,jn</td><td>kjbjkb</td></tr></tbody></table></figure><p>roshanroshan</p>', 'Screenshot (16).png', 'Screenshot (15).png', 'Screenshot (15).png', 'Roshan', 2147483647, 'Andhra Bank', 'kjhgfdfgh9876567', 'Screenshot (15).png', 0, 'Screenshot (9).png', 2147483647, 'Screenshot (9).png', '', 'roshan', 'Rejected', '2022-02-10', '', NULL),
(2, 'Screenshot (10).png', 'Help lll,l to pay his hospital bills', 'Health', 100000, 'Hyderabad', 'No', 'box-shadow: rgba(0, 0, 0, 0.2) 0px 12px 28px 0px, rgba(0, 0, 0, 0.1) 0px 2px 4px 0px, rgba(255, 255, 255, 0.05) 0px 0px 0px 1px inset;', 'Screenshot (9).png', 'Screenshot (15).png', 'Screenshot (8).png', 'll.ll', 2147483647, 'BBBB', 'SBI000029301', 'Screenshot (16).png', 0, 'Screenshot (15).png', 2147483647, 'Screenshot (33).png', 'OPTIONAL', 'roshan', 'Rejected', '2022-01-28', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(20) NOT NULL,
  `cause_title` varchar(200) NOT NULL,
  `raiseid` int(20) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `cause_title`, `raiseid`, `name`) VALUES
(20, 'Help Roshan to pay his btech fees', 3, 'roshan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL,
  `country` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `profile_pic` varchar(255) DEFAULT 'profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `PASSWORD`, `country`, `phone`, `profile_pic`) VALUES
(1, 'roshan', 'roshan@gmail.com', 'roshan', 'India', '935879780385', 'roshan photo (2).png'),
(2, 'faisal', 'faisal@gmail.com', 'faisal', 'India', '95867458594', 'profile.png'),
(3, 'admin', 'admin@admin.com', 'admin', 'Pakistan', '9585763055', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawl_pending`
--

CREATE TABLE `withdrawl_pending` (
  `id` int(20) NOT NULL,
  `raiseid` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `time` time DEFAULT current_timestamp(),
  `status` varchar(10) DEFAULT 'pending',
  `samount` int(20) DEFAULT NULL,
  `tran_id` int(20) DEFAULT NULL,
  `tran_date` varchar(20) DEFAULT NULL,
  `bank_name` int(20) DEFAULT NULL,
  `others` varchar(200) DEFAULT NULL,
  `wid` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawl_pending`
--

INSERT INTO `withdrawl_pending` (`id`, `raiseid`, `name`, `date`, `time`, `status`, `samount`, `tran_id`, `tran_date`, `bank_name`, `others`, `wid`) VALUES
(4, 2, 'roshan', '2022-03-02', '15:11:10', 'rejected', 1000, NULL, NULL, NULL, 'Needed for help', 4),
(5, 3, 'roshan', '2022-03-02', '18:14:56', 'accepted', 2000, 0, '', 0, 'Roshan\r\n', 5);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawl_request`
--

CREATE TABLE `withdrawl_request` (
  `raiseid` int(20) NOT NULL,
  `amount` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `time` time DEFAULT current_timestamp(),
  `status` varchar(10) DEFAULT 'pending',
  `optional` varchar(200) DEFAULT NULL,
  `wid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawl_request`
--

INSERT INTO `withdrawl_request` (`raiseid`, `amount`, `name`, `date`, `time`, `status`, `optional`, `wid`) VALUES
(3, 1000, 'roshan', '2022-03-02', '22:29:41', 'pending', '', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accepted_form`
--
ALTER TABLE `accepted_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `bank_pending`
--
ALTER TABLE `bank_pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_reject`
--
ALTER TABLE `bank_reject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funds_form`
--
ALTER TABLE `funds_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `likeid` (`likeid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejected_form`
--
ALTER TABLE `rejected_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `withdrawl_pending`
--
ALTER TABLE `withdrawl_pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawl_request`
--
ALTER TABLE `withdrawl_request`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accepted_form`
--
ALTER TABLE `accepted_form`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bank_pending`
--
ALTER TABLE `bank_pending`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bank_reject`
--
ALTER TABLE `bank_reject`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `funds_form`
--
ALTER TABLE `funds_form`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rejected_form`
--
ALTER TABLE `rejected_form`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `withdrawl_pending`
--
ALTER TABLE `withdrawl_pending`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `withdrawl_request`
--
ALTER TABLE `withdrawl_request`
  MODIFY `wid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

--
-- Dumping data for table `pma__navigationhiding`
--

INSERT INTO `pma__navigationhiding` (`username`, `item_name`, `item_type`, `db_name`, `table_name`) VALUES
('root', 'accepted_form', 'table', 'db', ''),
('root', 'bank_pending', 'table', 'db', ''),
('root', 'bank_reject', 'table', 'db', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"db\",\"table\":\"payments\"},{\"db\":\"db\",\"table\":\"accepted_form\"},{\"db\":\"db\",\"table\":\"withdrawl_pending\"},{\"db\":\"db\",\"table\":\"withdrawl_request\"},{\"db\":\"db\",\"table\":\"funds_form\"},{\"db\":\"db\",\"table\":\"rejected_form\"},{\"db\":\"db\",\"table\":\"files\"},{\"db\":\"db\",\"table\":\"users\"},{\"db\":\"db\",\"table\":\"like\"},{\"db\":\"db\",\"table\":\"bank_pending\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'db', 'payments', '{\"CREATE_TIME\":\"2022-02-18 00:08:21\"}', '2022-02-17 18:48:33'),
('root', 'db', 'withdrawl_request', '{\"CREATE_TIME\":\"2022-03-02 00:47:49\",\"col_order\":[7,0,1,2,3,4,5,6],\"col_visib\":[1,1,1,1,1,1,1,1]}', '2022-03-01 19:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2022-03-04 05:04:25', '{\"Console\\/Mode\":\"collapse\",\"NavigationWidth\":205}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
