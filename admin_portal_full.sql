-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 13, 2023 at 11:39 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `abroad_study`
--

DROP TABLE IF EXISTS `abroad_study`;
CREATE TABLE IF NOT EXISTS `abroad_study` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `father_name` varchar(500) NOT NULL,
  `enrollment_no` varchar(500) NOT NULL,
  `course` varchar(500) NOT NULL,
  `semester` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile_no` varchar(500) NOT NULL,
  `transcript` tinyint(1) NOT NULL DEFAULT '0',
  `transcript_price` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

DROP TABLE IF EXISTS `admin_info`;
CREATE TABLE IF NOT EXISTS `admin_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `password` varchar(45) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `type` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `password`, `name`, `email`, `type`) VALUES
(1, 'Deep', 'Deepak', 'deepakrawal@gmail.com', 'Head'),
(3, 'smit', 'smit', 'smitzaveri@gmail.com', 'Clerk'),
(14, 'Dhruv', 'Dhruv', 'dhruvpandya@gmail.com', 'Clerk'),
(17, 'Hemant', 'Hemant', 'daymahemant@gmail.com', 'Clerk');

-- --------------------------------------------------------

--
-- Table structure for table `admission_cancel`
--

DROP TABLE IF EXISTS `admission_cancel`;
CREATE TABLE IF NOT EXISTS `admission_cancel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `enrollment_no` varchar(5000) NOT NULL,
  `name` varchar(500) NOT NULL,
  `father_name` varchar(500) NOT NULL,
  `course` varchar(500) NOT NULL,
  `semester` varchar(500) NOT NULL,
  `mobile_no` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission_cancel`
--

INSERT INTO `admission_cancel` (`id`, `enrollment_no`, `name`, `father_name`, `course`, `semester`, `mobile_no`, `email`) VALUES
(1, '20020201458', 'Pandya Dhruv Lalit', 'Lalit Pandya', 'BCA', '6th Semester', '9909137648', 'dhruvpandya2002@gmail.com'),
(2, '20020201458', 'Pandya Dhruv Lalit', 'Lalit Pandya', 'BCA', '6th Semester', '9909137648', 'dhruvpandya2002@gmail.com'),
(3, '20020201458', 'Pandya Dhruv Lalit', 'Lalit Pandya', 'BCA', '6th Semester', '9909137648', 'dhruvpandya2002@gmail.com'),
(4, '20020201458', 'Pandya Dhruv Lalit', 'Lalit Pandya', 'BCA', '6th Semester', '9909137648', 'dhruvpandya2002@gmail.com'),
(5, '20020201458', 'Pandya Dhruv Lalit', 'Lalit Pandya', 'BCA', '6th Semester', '9909137648', 'dhruvpandya2002@gmail.com'),
(6, '20020201458', 'Pandya Dhruv Lalit', 'Lalit Pandya', 'BCA', '6th Semester', '9909137648', 'dhruvpandya2002@gmail.com'),
(7, '20020201458', 'Pandya Dhruv Lalit', 'Lalit Pandya', 'BCA', '6th Semester', '9909137648', 'dhruvpandya2002@gmail.com'),
(8, '20020201458', 'Pandya Dhruv Lalit', 'Lalit Pandya', 'BCA', '6th Semester', '9909137648', 'dhruvpandya2002@gmail.com'),
(9, '20020201458', 'Pandya Dhruv Lalit', 'Lalit Pandya', 'BCA', '6th Semester', '9909137648', 'dhruvpandya2002@gmail.com'),
(10, '20020201458', 'Pandya Dhruv Lalit', 'Lalit Pandya', 'BCA', '6th Semester', '9909137648', 'dhruvpandya2002@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bonafide`
--

DROP TABLE IF EXISTS `bonafide`;
CREATE TABLE IF NOT EXISTS `bonafide` (
  `id` int NOT NULL AUTO_INCREMENT,
  `enrollment_no` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `father_name` varchar(500) NOT NULL,
  `course` varchar(500) NOT NULL,
  `semester` varchar(500) NOT NULL,
  `mobile_no` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `fee_recipt` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `remark` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `verify_flag` tinyint(1) NOT NULL DEFAULT '0',
  `verify_by` varchar(500) NOT NULL,
  `approve_flag` tinyint(1) NOT NULL DEFAULT '0',
  `approve_by` varchar(500) NOT NULL,
  `delever_flag` tinyint(1) NOT NULL DEFAULT '0',
  `print_flag` tinyint(1) NOT NULL DEFAULT '0',
  `apply_date` date NOT NULL,
  `pickup_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bonafide`
--

INSERT INTO `bonafide` (`id`, `enrollment_no`, `name`, `father_name`, `course`, `semester`, `mobile_no`, `email`, `purpose`, `fee_recipt`, `remark`, `status`, `verify_flag`, `verify_by`, `approve_flag`, `approve_by`, `delever_flag`, `print_flag`, `apply_date`, `pickup_date`) VALUES
(1, '20020201458', 'Pandya Dhruv Lalit', 'Lalit Pandya', 'BCA', '6', '9909137648', 'dhruvpandya2002@gmail.com', 'Driving License', '20020201458_6_20020201458_17_11_2022.pdf', '', '', 1, 'Hemant', 1, 'Deepak', 1, 1, '2023-06-27', '2023-07-03'),
(2, '20020201533', 'Rawal Deepak Kumar Kailash Kumar', 'Kailash Kumar Rawal', 'BCA', '6', '9979920290', 'deepakrawal3736@gmail.com', 'Education Loan', '20020201533_6_20020201533_17_11_2022.pdf', '', '', 1, 'Hemant', 1, 'Deepak', 1, 1, '2023-06-27', '2023-06-29'),
(3, '20020201099', 'singh yuvraj ranjeet', 'ranjeet singh', '', '6', '1234567890', 'demorwl3055@gmail.com', 'Passport and Visa', '20020201099_6_java.png', 'course is not available', '', 0, '', 0, '', 0, 0, '2023-06-30', '0000-00-00'),
(4, '20020201099', 'singh yuvraj ranjeet', 'ranjeet singh', 'BCA', '6', '1234567890', 'demorwl3055@gmail.com', 'Passport and Visa', '20020201099_6_3d-render-code-testing-functional-test-usability.jpg', '', '', 1, 'Hemant', 1, 'Deepak', 1, 1, '2023-06-30', '2023-06-30'),
(5, '20020201533', 'Rawal Deepak Kumar Kailash Kumar', 'Kailash Kumar Rawal', 'BCA', '6', '9979920290', 'deepakrawal3736@gmail.com', 'pasport and visa', '20020201533_6_ai.jpg', '', '', 1, 'Hemant', 1, 'Deepak', 1, 1, '2023-07-02', '2023-07-02'),
(6, '20020201751', 'Zaveri Smit Suahskumar', 'Suhaskumar', 'BCA', '6', '7043635077', 'smitzaveri1003@gmail.com', 'BRTS Pass', '20020201751_6_Screenshot 2023-04-03 230400.png', '', '', 1, 'smit', 1, 'Deepak', 1, 1, '2023-07-03', '2023-07-03'),
(7, '20020201751', 'Zaveri Smit Suahskumar', 'Suhaskumar', 'BCA', '6', '7043635077', 'smitzaveri1003@gmail.com', 'Digital India', '20020201751_6_Screenshot 2023-04-03 230400.png', '', '', 1, 'Hemant', 1, 'Deepak', 0, 0, '2023-07-03', '0000-00-00'),
(8, '20020201533', 'Rawal Deepak Kumar Kailash Kumar', 'Kailash Kumar Rawal', 'BCA', '6', '9979920290', 'deepakrawal3736@gmail.com', 'BRTS Pass', '20020201533_6_1.png', 'wrong', '', 0, '', 0, '', 0, 0, '0000-00-00', '0000-00-00'),
(9, '20020201533', 'Rawal Deepak Kumar Kailash Kumar', 'Kailash Kumar Rawal', 'BCA', '6', '9979920290', 'deepakrawal3736@gmail.com', 'BRTS Pass', '20020201533_6_1.png', '', '', 0, '', 0, '', 0, 0, '0000-00-00', '0000-00-00'),
(10, '20020201533', 'Rawal Deepak Kumar Kailash Kumar', 'Kailash Kumar Rawal', 'BCA', '6th Semester', '9979920290', 'deepakrawal3736@gmail.com', 'Digital India', '20020201533_6th Semester_Campus Brochure JECRC-150223.pdf', '', '', 0, '', 0, '', 0, 0, '2023-07-24', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int NOT NULL AUTO_INCREMENT,
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `no_of_semester` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_name`, `no_of_semester`) VALUES
(9, 'BCA', 'Bachelor\'s of Computer Applications', '6'),
(10, 'MCA', 'Master\'s of Computer Applications', '4'),
(12, 'BTech', 'Bachelor\'s of Engineering Information Technology', '8'),
(13, 'MTech', 'Master\'s of Engineering Information Technology', '4'),
(37, 'BScCD', 'Bachelor s of science in data science', '6'),
(46, 'MSCIT', 'Master\'s of scinece information technology', '4'),
(47, 'BScIT', 'Bachelor\'s of scinece information technology', '6');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `id` int NOT NULL AUTO_INCREMENT,
  `enrollment_no` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `father_name` varchar(500) NOT NULL,
  `course` varchar(500) NOT NULL,
  `semester` varchar(500) NOT NULL,
  `mobile_no` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `purpose` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `document10th` tinyint(1) NOT NULL DEFAULT '0',
  `document12th` tinyint(1) NOT NULL DEFAULT '0',
  `leaving_certificate` tinyint(1) NOT NULL DEFAULT '0',
  `fee_recipt` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `remark` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `verify_flag` tinyint(1) NOT NULL DEFAULT '0',
  `verify_by` varchar(500) NOT NULL,
  `approve_flag` tinyint(1) NOT NULL DEFAULT '0',
  `approve_by` varchar(500) NOT NULL,
  `delever_flag` tinyint(1) NOT NULL DEFAULT '0',
  `return_flag` tinyint(1) NOT NULL DEFAULT '0',
  `pickup_date` date NOT NULL,
  `apply_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `enrollment_no`, `name`, `father_name`, `course`, `semester`, `mobile_no`, `email`, `purpose`, `date`, `document10th`, `document12th`, `leaving_certificate`, `fee_recipt`, `remark`, `status`, `verify_flag`, `verify_by`, `approve_flag`, `approve_by`, `delever_flag`, `return_flag`, `pickup_date`, `apply_date`) VALUES
(1, '20020201533', 'Rawal Deepak Kumar Kailash Kumar', 'Kailash Kumar Rawal', 'BCA', '6', '9979920290', 'deepakrawal3736@gmail.com', 'BRTS Pass', '2023-07-21', 1, 1, 0, '20020201533_6_1.png', '', '', 1, 'Hemant', 1, 'Deepak', 1, 1, '2023-07-22', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(500) NOT NULL,
  `middle_name` varchar(500) NOT NULL,
  `last_name` varchar(500) NOT NULL,
  `father_name` varchar(500) NOT NULL,
  `course` varchar(500) NOT NULL,
  `enrollment_no` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `Authority` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `middle_name`, `last_name`, `father_name`, `course`, `enrollment_no`, `email`, `mobile`, `password`, `Authority`) VALUES
(1, 'Deepak Kumar', 'Kailash Kumar', 'Rawal', 'Kailash Kumar Rawal', 'BCA', '20020201533', 'deepakrawal3736@gmail.com', '9979920290', 'Deep', 1),
(2, 'Dhruv', 'Lalit', 'Pandya', 'Lalit Pandya', 'BCA', '20020201458', 'dhruvpandya2002@gmail.com', '9909137648', 'Dhruv', 1),
(3, 'smit', 'suhasbhai', 'zaveri', 'suhasbhai zaveri', 'BCA', '32132321112', 'smitzaveri123@gmail.com', '1234567890', 'smit', 1),
(4, 'yuvraj', 'ranjeet', 'singh', 'ranjeet singh', 'BCA', '20020201099', 'demorwl3055@gmail.com', '1234567890', 'yuvraj', 1),
(5, 'Khush', 'Kailashji', 'rawal', 'kailashji rawal', 'BCA', '20020201534', 'rwlkhush@gmail.com', '9979920290', 'khush', 1),
(10, 'Smit', 'Suahskumar', 'Zaveri', 'Suhaskumar', 'BCA', '20020201751', 'smitzaveri1003@gmail.com', '7043635077', 'smit5364', 1),
(11, 'Smit', 'Suahskumar', 'Zaveri', 'Suhaskumar Zaveri', 'BPharm', 'smitzaveri1003@gmail.com', 'smitzaveri1003@gmail.com', '7990188015', 'smit5364', 0),
(14, 'Hariom', 'Puranbhai', 'rawal', 'Puranbhai Rawal', 'BTech', '20020201463', 'test@gmail.com', '9979920290', 'Hariom', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
