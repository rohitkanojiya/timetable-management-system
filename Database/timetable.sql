-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2019 at 12:14 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetable`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` char(3) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `sname` char(5) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `name`, `sname`) VALUES
('000', 'Select Department', ''),
('D01', 'Computer Engineering', 'CE'),
('D02', 'Civil Engineering', 'CVE'),
('D03', 'Electrical Engineering', 'EE'),
('D04', 'Electronics and Communication Engineering', 'EC'),
('D05', 'Mechanical Engineering', 'ME');

-- --------------------------------------------------------

--
-- Table structure for table `deptsub`
--

DROP TABLE IF EXISTS `deptsub`;
CREATE TABLE IF NOT EXISTS `deptsub` (
  `dept_id` char(3) NOT NULL,
  `scode` int(7) NOT NULL,
  PRIMARY KEY (`dept_id`,`scode`),
  KEY `scode` (`scode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

DROP TABLE IF EXISTS `division`;
CREATE TABLE IF NOT EXISTS `division` (
  `div_id` char(5) NOT NULL,
  `sem` int(2) DEFAULT NULL,
  `duration` varchar(25) NOT NULL,
  `term` char(4) NOT NULL,
  `entry` int(4) NOT NULL,
  `dept_id` char(3) NOT NULL,
  PRIMARY KEY (`div_id`,`dept_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`div_id`, `sem`, `duration`, `term`, `entry`, `dept_id`) VALUES
('000', 0, '', '', 0, '000'),
('div1', 2, '17/12/18 Onwards', 'even', 2016, 'D01'),
('div2', 4, '17/12/18 Onwards', 'even', 2016, 'D01'),
('div3', 6, '17/12/18 Onwards', 'even', 2016, 'D01'),
('div4', 1, '17/8/18 Onwards', 'odd', 2016, 'D01'),
('div5', 3, '17/8/18 Onwards', 'odd', 2016, 'D01'),
('div6', 5, '17/8/18 Onwards', 'odd', 2016, 'D01');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `fid` char(4) NOT NULL,
  `sname` char(10) NOT NULL,
  `fullname` varchar(40) DEFAULT NULL,
  `contact_no` bigint(20) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `joining_date` char(30) NOT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `total_load` int(2) NOT NULL,
  `avail_load` int(2) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `sname`, `fullname`, `contact_no`, `email_id`, `joining_date`, `designation`, `total_load`, `avail_load`) VALUES
('000', '', 'Select', 0, '', '', NULL, 0, 0),
('001', '', NULL, 0, '', '', NULL, 0, 0),
('F01', 'RJP', 'Rajesh J Parmar', 9998134540, '', '', 'HOD', 17, 15),
('F02', 'BIP', 'Bhadresh I Patel', 9638553267, ' bipatel11@gmail.com', '', '', 17, 15),
('F03', 'JPP', 'Jiten P Parmar', 9638553268, 'jitenparmar2000@yahoo.com', '12/1/1999', '', 17, 15),
('F04', 'AMP', 'Amitkumar M Panchal', 9879586651, 'lectureratbbit@yahoo.com', '8/12/2002', '', 17, 15),
('F05', 'SSS', 'Sunil S Shah', 9879215012, 'sunil208@gmail.com', '4/1/2003', '', 17, 17),
('F06', 'KKM', ' Kaushal K Mistry', 9878982767, ' kaushal227@gmail.com', '', '', 17, 17),
('F07', 'BVC', 'Bharat V Chawda', 9978917637, 'bharat.bbit@gmail.com', '', '', 17, 17),
('F08', 'PMT', 'Paresh M Tank', 8866099086, 'pareshtank@gmail.com', '3/14/2005', '', 17, 17),
('F09', 'HAP', 'Hitesh A Patel', 9825672740, 'hiteshpatelbbit@gmail.com', '3/17/2005', '', 17, 17),
('F10', 'LAB', 'Lata A Bhavnani', 9925070424, 'agnanilata@gmail.com ', '', '', 17, 17),
('F11', 'HKP', 'Hardik K Patel', 9723404319, 'hardik404@gmail.com', '', '', 17, 17),
('f12', 'SK', 'Shyam Khambholiya', 9998134539, 'shyamkhambholiya@gmail.com', '03/1/2018', '', 5, 5),
('f13', 'HV', 'Heena Variya', 9912545278, 'Heenavariya@gmail.com', '03/1/2018', NULL, 4, 4),
('f14', 'NS', 'Nilesh Sir', 9998134778, 'nileshsir@gmail.com', '03/1/2018', NULL, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `rno` char(10) NOT NULL,
  `type` char(20) DEFAULT NULL,
  `floor` varchar(10) NOT NULL,
  `block` varchar(10) NOT NULL,
  PRIMARY KEY (`rno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`rno`, `type`, `floor`, `block`) VALUES
('208', 'lec', 'first', 'B'),
('220', 'lec', 'first', 'B'),
('221', 'lec', 'first', 'B'),
('lab 1', 'lab', 'ground', 'B'),
('lab 2', 'lab', 'ground', 'B'),
('lab 3', 'lab', 'ground', 'B'),
('NONE', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

DROP TABLE IF EXISTS `slot`;
CREATE TABLE IF NOT EXISTS `slot` (
  `sid` char(7) NOT NULL,
  `batch` char(4) NOT NULL,
  `scode` int(7) NOT NULL,
  `rno` char(10) NOT NULL,
  `div_id` char(5) NOT NULL,
  PRIMARY KEY (`sid`),
  KEY `scode` (`scode`),
  KEY `rno` (`rno`),
  KEY `div_id` (`div_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`sid`, `batch`, `scode`, `rno`, `div_id`) VALUES
('CE2001', 'AB', 3300005, 'lab 1', '000'),
('CE2002', 'CD', 3320702, 'lab 2', '000'),
('CE2010', 'ABCD', 0, 'NONE', '000'),
('CE2020', 'ABCD', 0, 'NONE', '000'),
('CE2030', 'ABCD', 0, 'NONE', '000'),
('CE2040', 'ABCD', 0, 'NONE', '000'),
('CE2050', 'ABCD', 0, 'NONE', '000'),
('CE2110', 'ABCD', 0, 'NONE', '000'),
('CE2120', 'ABCD', 0, 'NONE', '000'),
('CE2130', 'ABCD', 0, 'NONE', '000'),
('CE2140', 'ABCD', 0, 'NONE', '000'),
('CE2150', 'ABCD', 0, 'NONE', '000'),
('CE2200', 'ABCD', 0, 'NONE', '000'),
('CE2210', 'ABCD', 0, 'NONE', '000'),
('CE2220', 'ABCD', 0, 'NONE', '000'),
('CE2230', 'ABCD', 0, 'NONE', '000'),
('CE2240', 'ABCD', 0, 'NONE', '000'),
('CE2250', 'ABCD', 0, 'NONE', '000'),
('CE2300', 'ABCD', 0, 'NONE', '000'),
('CE2310', 'ABCD', 0, 'NONE', '000'),
('CE2320', 'ABCD', 0, 'NONE', '000'),
('CE2330', 'ABCD', 0, 'NONE', '000'),
('CE2340', 'ABCD', 0, 'NONE', '000'),
('CE2350', 'ABCD', 0, 'NONE', '000'),
('CE2400', 'ABCD', 0, 'NONE', '000'),
('CE2410', 'ABCD', 0, 'NONE', '000'),
('CE2420', 'ABCD', 0, 'NONE', '000'),
('CE2430', 'ABCD', 0, 'NONE', '000'),
('CE2440', 'ABCD', 0, 'NONE', '000'),
('CE2450', 'ABCD', 0, 'NONE', '000'),
('CE2501', 'ABCD', 0, 'NONE', '000'),
('CE2502', 'ABCD', 0, 'NONE', '000'),
('CE2510', 'ABCD', 0, 'NONE', '000'),
('CE2520', 'ABCD', 0, 'NONE', '000'),
('CE2530', 'ABCD', 0, 'NONE', '000'),
('CE2540', 'ABCD', 0, 'NONE', '000'),
('CE2550', 'ABCD', 0, 'NONE', '000'),
('CE2610', 'ABCD', 0, 'NONE', '000'),
('CE2620', 'ABCD', 0, 'NONE', '000'),
('CE2630', 'ABCD', 0, 'NONE', '000'),
('CE2640', 'ABCD', 0, 'NONE', '000'),
('CE2650', 'ABCD', 0, 'NONE', '000'),
('CE2700', 'ABCD', 0, 'NONE', '000'),
('CE2710', 'ABCD', 0, 'NONE', '000'),
('CE2720', 'ABCD', 0, 'NONE', '000'),
('CE2730', 'ABCD', 0, 'NONE', '000'),
('CE2740', 'ABCD', 0, 'NONE', '000'),
('CE2750', 'ABCD', 0, 'NONE', '000'),
('CE4000', 'ABCD', 0, 'NONE', '000'),
('CE4010', 'ABCD', 0, 'NONE', '000'),
('CE4020', 'ABCD', 0, 'NONE', '000'),
('CE4030', 'ABCD', 0, 'NONE', '000'),
('CE4040', 'ABCD', 0, 'NONE', '000'),
('CE4050', 'ABCD', 0, 'NONE', '000'),
('CE4100', 'ABCD', 0, 'NONE', '000'),
('CE4110', 'ABCD', 0, 'NONE', '000'),
('CE4120', 'ABCD', 0, 'NONE', '000'),
('CE4130', 'ABCD', 0, 'NONE', '000'),
('CE4140', 'ABCD', 0, 'NONE', '000'),
('CE4150', 'ABCD', 0, 'NONE', '000'),
('CE4200', 'ABCD', 0, 'NONE', '000'),
('CE4210', 'ABCD', 0, 'NONE', '000'),
('CE4220', 'ABCD', 0, 'NONE', '000'),
('CE4230', 'ABCD', 0, 'NONE', '000'),
('CE4240', 'ABCD', 0, 'NONE', '000'),
('CE4250', 'ABCD', 0, 'NONE', '000'),
('CE4300', 'ABCD', 0, 'NONE', '000'),
('CE4310', 'ABCD', 0, 'NONE', '000'),
('CE4320', 'ABCD', 0, 'NONE', '000'),
('CE4330', 'ABCD', 0, 'NONE', '000'),
('CE4340', 'ABCD', 0, 'NONE', '000'),
('CE4350', 'ABCD', 0, 'NONE', '000'),
('CE4400', 'ABCD', 0, 'NONE', '000'),
('CE4410', 'ABCD', 0, 'NONE', '000'),
('CE4420', 'ABCD', 0, 'NONE', '000'),
('CE4430', 'ABCD', 0, 'NONE', '000'),
('CE4440', 'ABCD', 0, 'NONE', '000'),
('CE4450', 'ABCD', 0, 'NONE', '000'),
('CE4500', 'ABCD', 0, 'NONE', '000'),
('CE4510', 'ABCD', 0, 'NONE', '000'),
('CE4520', 'ABCD', 0, 'NONE', '000'),
('CE4530', 'ABCD', 0, 'NONE', '000'),
('CE4540', 'ABCD', 0, 'NONE', '000'),
('CE4550', 'ABCD', 0, 'NONE', '000'),
('CE4600', 'ABCD', 0, 'NONE', '000'),
('CE4610', 'ABCD', 0, 'NONE', '000'),
('CE4620', 'ABCD', 0, 'NONE', '000'),
('CE4630', 'ABCD', 0, 'NONE', '000'),
('CE4640', 'ABCD', 0, 'NONE', '000'),
('CE4650', 'ABCD', 0, 'NONE', '000'),
('CE6000', 'ABCD', 0, 'NONE', '000'),
('CE6010', 'ABCD', 0, 'NONE', '000'),
('CE6020', 'ABCD', 0, 'NONE', '000'),
('CE6030', 'ABCD', 0, 'NONE', '000'),
('CE6040', 'ABCD', 0, 'NONE', '000'),
('CE6050', 'ABCD', 0, 'NONE', '000'),
('CE6100', 'ABCD', 0, 'NONE', '000'),
('CE6110', 'ABCD', 0, 'NONE', '000'),
('CE6120', 'ABCD', 0, 'NONE', '000'),
('CE6130', 'ABCD', 0, 'NONE', '000'),
('CE6140', 'ABCD', 0, 'NONE', '000'),
('CE6150', 'ABCD', 0, 'NONE', '000'),
('CE6200', 'ABCD', 0, 'NONE', '000'),
('CE6210', 'ABCD', 0, 'NONE', '000'),
('CE6220', 'ABCD', 0, 'NONE', '000'),
('CE6230', 'ABCD', 0, 'NONE', '000'),
('CE6240', 'ABCD', 0, 'NONE', '000'),
('CE6250', 'ABCD', 0, 'NONE', '000'),
('CE6300', 'ABCD', 0, 'NONE', '000'),
('CE6310', 'ABCD', 0, 'NONE', '000'),
('CE6320', 'ABCD', 0, 'NONE', '000'),
('CE6330', 'ABCD', 0, 'NONE', '000'),
('CE6340', 'ABCD', 0, 'NONE', '000'),
('CE6350', 'ABCD', 0, 'NONE', '000'),
('CE6400', 'ABCD', 0, 'NONE', '000'),
('CE6410', 'ABCD', 0, 'NONE', '000'),
('CE6420', 'ABCD', 0, 'NONE', '000'),
('CE6430', 'ABCD', 0, 'NONE', '000'),
('CE6440', 'ABCD', 0, 'NONE', '000'),
('CE6450', 'ABCD', 0, 'NONE', '000'),
('CE6500', 'ABCD', 0, 'NONE', '000'),
('CE6510', 'ABCD', 0, 'NONE', '000'),
('CE6520', 'ABCD', 0, 'NONE', '000'),
('CE6530', 'ABCD', 0, 'NONE', '000'),
('CE6540', 'ABCD', 0, 'NONE', '000'),
('CE6550', 'ABCD', 0, 'NONE', '000'),
('CE6600', 'ABCD', 0, 'NONE', '000'),
('CE6610', 'ABCD', 0, 'NONE', '000'),
('CE6620', 'ABCD', 0, 'NONE', '000'),
('CE6630', 'ABCD', 0, 'NONE', '000'),
('CE6640', 'ABCD', 0, 'NONE', '000'),
('CE6650', 'ABCD', 0, 'NONE', '000');

-- --------------------------------------------------------

--
-- Table structure for table `slotfac`
--

DROP TABLE IF EXISTS `slotfac`;
CREATE TABLE IF NOT EXISTS `slotfac` (
  `sid` char(7) NOT NULL,
  `fid` char(4) NOT NULL,
  PRIMARY KEY (`sid`,`fid`),
  KEY `slotfac_ibfk_1` (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slotfac`
--

INSERT INTO `slotfac` (`sid`, `fid`) VALUES
('CE2010', '000'),
('CE2020', '000'),
('CE2030', '000'),
('CE2040', '000'),
('CE2050', '000'),
('CE2110', '000'),
('CE2120', '000'),
('CE2130', '000'),
('CE2140', '000'),
('CE2150', '000'),
('CE2200', '000'),
('CE2210', '000'),
('CE2220', '000'),
('CE2230', '000'),
('CE2240', '000'),
('CE2250', '000'),
('CE2300', '000'),
('CE2310', '000'),
('CE2320', '000'),
('CE2330', '000'),
('CE2340', '000'),
('CE2350', '000'),
('CE2400', '000'),
('CE2410', '000'),
('CE2420', '000'),
('CE2430', '000'),
('CE2440', '000'),
('CE2450', '000'),
('CE2501', '000'),
('CE2502', '000'),
('CE2510', '000'),
('CE2520', '000'),
('CE2530', '000'),
('CE2540', '000'),
('CE2550', '000'),
('CE2610', '000'),
('CE2620', '000'),
('CE2630', '000'),
('CE2640', '000'),
('CE2650', '000'),
('CE2700', '000'),
('CE2710', '000'),
('CE2720', '000'),
('CE2730', '000'),
('CE2740', '000'),
('CE2750', '000'),
('CE4000', '000'),
('CE4010', '000'),
('CE4020', '000'),
('CE4030', '000'),
('CE4040', '000'),
('CE4050', '000'),
('CE4100', '000'),
('CE4110', '000'),
('CE4120', '000'),
('CE4130', '000'),
('CE4140', '000'),
('CE4150', '000'),
('CE4200', '000'),
('CE4210', '000'),
('CE4220', '000'),
('CE4230', '000'),
('CE4240', '000'),
('CE4250', '000'),
('CE4300', '000'),
('CE4310', '000'),
('CE4320', '000'),
('CE4330', '000'),
('CE4340', '000'),
('CE4350', '000'),
('CE4400', '000'),
('CE4410', '000'),
('CE4420', '000'),
('CE4430', '000'),
('CE4440', '000'),
('CE4450', '000'),
('CE4500', '000'),
('CE4510', '000'),
('CE4520', '000'),
('CE4530', '000'),
('CE4540', '000'),
('CE4550', '000'),
('CE4600', '000'),
('CE4610', '000'),
('CE4620', '000'),
('CE4630', '000'),
('CE4640', '000'),
('CE4650', '000'),
('CE6000', '000'),
('CE6010', '000'),
('CE6020', '000'),
('CE6030', '000'),
('CE6040', '000'),
('CE6050', '000'),
('CE6100', '000'),
('CE6110', '000'),
('CE6120', '000'),
('CE6130', '000'),
('CE6140', '000'),
('CE6150', '000'),
('CE6200', '000'),
('CE6210', '000'),
('CE6220', '000'),
('CE6230', '000'),
('CE6240', '000'),
('CE6250', '000'),
('CE6300', '000'),
('CE6310', '000'),
('CE6320', '000'),
('CE6330', '000'),
('CE6340', '000'),
('CE6350', '000'),
('CE6400', '000'),
('CE6410', '000'),
('CE6420', '000'),
('CE6430', '000'),
('CE6440', '000'),
('CE6450', '000'),
('CE6500', '000'),
('CE6510', '000'),
('CE6520', '000'),
('CE6530', '000'),
('CE6540', '000'),
('CE6550', '000'),
('CE6600', '000'),
('CE6610', '000'),
('CE6620', '000'),
('CE6630', '000'),
('CE6640', '000'),
('CE6650', '000'),
('CE2501', '001'),
('CE2502', '001'),
('CE2001', 'F01'),
('CE2001', 'F02'),
('CE2002', 'F03'),
('CE2002', 'F04');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `scode` int(7) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `sname` char(10) NOT NULL,
  `sem` int(11) NOT NULL,
  `credit` int(10) DEFAULT NULL,
  `h_lec` int(2) NOT NULL,
  `rl` int(2) NOT NULL,
  `h_lab` int(2) NOT NULL,
  `rp` int(2) NOT NULL,
  `fid` char(4) NOT NULL,
  PRIMARY KEY (`scode`),
  KEY `fid` (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`scode`, `name`, `sname`, `sem`, `credit`, `h_lec`, `rl`, `h_lab`, `rp`, `fid`) VALUES
(0, 'Select', '', 0, 0, 0, 0, 0, 0, '000'),
(3300005, 'BASIC PHYSICS(G-2)', 'PHYSICS-2', 2, 5, 3, 3, 2, 0, 'f12'),
(3310701, 'Maths 1', 'MATHS_1', 1, 5, 3, 3, 2, 2, 'F01'),
(3320001, 'CONTRIBUTOR PERSONALITY DEVELOPMENT', 'CPD', 2, 4, 4, 4, 0, 0, 'f13'),
(3320002, 'ADVANCE MATHEMATICS(G-1)', 'MATHS-1', 2, 4, 2, 2, 2, 2, 'f14'),
(3320701, 'BASIC ELECTRONICS', 'BE', 2, 5, 3, 3, 2, 2, 'f02'),
(3320702, 'ADVANCED COMPUTER PROGRAMMING', 'ACP', 2, 7, 3, 3, 4, 2, 'f10'),
(3320703, 'STATIC WEB PAGE DESIGNING', 'SWPD', 2, 4, 0, 0, 4, 4, 'f06'),
(3330001, 'Database Management System', 'DBMS', 3, 5, 3, 3, 2, 2, 'F11'),
(3340701, 'ADVANCE DATABASE MANAGEMENT SYSTEM', 'ADBMS', 4, 7, 3, 3, 4, 4, 'f09'),
(3340702, 'COMPUTER NETWORKING', 'CN', 4, 5, 3, 3, 2, 2, 'f05'),
(3340703, 'FNDAMENTALS OF SOFTWARE DEVELOPMENT', 'FOSD', 4, 5, 3, 3, 2, 2, 'f07'),
(3340704, '.NET PROGRAMMING', '.NET', 4, 7, 3, 3, 4, 4, 'f04'),
(3340705, 'COMPUTER ORGANIZATION & ARCHITECTURE', 'COA', 4, 3, 3, 3, 0, 0, 'f11'),
(3340706, 'WEB DEVELOPMENT TOOLS', 'WDT', 4, 4, 0, 0, 4, 4, 'f06'),
(3350702, 'Programming in Java', 'JAVA', 5, 7, 3, 3, 4, 4, 'F05'),
(3360701, 'ADVANCE JAVA PROGRAMING', 'AJP', 6, 7, 3, 3, 4, 4, 'f08'),
(3360702, 'PROFESSIONAL PRACTICES USING DATABASE', 'PPDB', 6, 4, 0, 0, 4, 4, 'f11'),
(3360703, 'NETWORK MANAGEMENT & ADMINISTRATION', 'NMA', 6, 7, 3, 3, 4, 4, 'f06'),
(3360704, 'MOBILE COMPUTING & APPLICATION DEVELOPMENT', 'MCAD', 6, 7, 3, 3, 4, 4, 'f03'),
(3360710, 'PROJECT-2', 'PROJ-2', 6, 6, 0, 0, 6, 6, 'f11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(10) NOT NULL,
  `userpass` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `userpass`) VALUES
('admin', 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deptsub`
--
ALTER TABLE `deptsub`
  ADD CONSTRAINT `deptsub_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `deptsub_ibfk_2` FOREIGN KEY (`scode`) REFERENCES `subject` (`scode`);

--
-- Constraints for table `division`
--
ALTER TABLE `division`
  ADD CONSTRAINT `division_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `slot`
--
ALTER TABLE `slot`
  ADD CONSTRAINT `slot_ibfk_1` FOREIGN KEY (`scode`) REFERENCES `subject` (`scode`),
  ADD CONSTRAINT `slot_ibfk_2` FOREIGN KEY (`div_id`) REFERENCES `division` (`div_id`),
  ADD CONSTRAINT `slot_ibfk_3` FOREIGN KEY (`rno`) REFERENCES `room` (`rno`);

--
-- Constraints for table `slotfac`
--
ALTER TABLE `slotfac`
  ADD CONSTRAINT `slotfac_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slotfac_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `slot` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
