-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2019 at 01:56 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `issueLimitDays` int(11) NOT NULL DEFAULT '0',
  `fineAmt` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`, `issueLimitDays`, `fineAmt`) VALUES
(1, 'vikas pawar', 'vikas@gmail.com', 'admin', 'admin', '2019-01-02 17:43:53', 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblauthors`
--

CREATE TABLE `tblauthors` (
  `id` int(11) NOT NULL,
  `AuthorName` varchar(159) DEFAULT NULL,
  `Use_status` int(11) NOT NULL DEFAULT '0',
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblauthors`
--

INSERT INTO `tblauthors` (`id`, `AuthorName`, `Use_status`, `creationDate`, `UpdationDate`) VALUES
(9, 'Jotsana sharma', 1, '2018-08-29 07:32:47', '2018-12-27 11:30:47'),
(13, 'Amir Khan', 0, '2018-08-30 15:55:45', NULL),
(14, 'Sonam Kapoor', 2, '2018-08-30 15:56:02', NULL),
(15, 'Sonali shah', 1, '2018-10-03 08:22:53', '2019-06-09 09:35:52'),
(16, 'Seema Pawar', 0, '2018-12-27 10:27:43', NULL),
(17, 'Ravi Shastri', 1, '2019-06-09 09:45:18', '2019-06-12 11:11:51'),
(18, 'Roshan Rakesh', 0, '2019-06-09 10:22:38', '2019-06-09 10:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) DEFAULT NULL,
  `Category` int(11) DEFAULT NULL,
  `Author` int(11) DEFAULT NULL,
  `ISBNNumber` varchar(100) DEFAULT NULL,
  `total_qty` int(11) NOT NULL DEFAULT '0',
  `qty` int(11) DEFAULT '0',
  `Lost_Count` int(11) NOT NULL DEFAULT '0',
  `publisher` varchar(100) DEFAULT NULL,
  `ReleasedDate` varchar(20) DEFAULT NULL,
  `Edition` varchar(100) DEFAULT NULL,
  `BookPrice` int(11) DEFAULT NULL,
  `BookDescription` varchar(255) DEFAULT NULL,
  `BookImage` varchar(20) DEFAULT NULL,
  `BookPosterBarcode` varchar(100) NOT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `Category`, `Author`, `ISBNNumber`, `total_qty`, `qty`, `Lost_Count`, `publisher`, `ReleasedDate`, `Edition`, `BookPrice`, `BookDescription`, `BookImage`, `BookPosterBarcode`, `RegDate`, `UpdationDate`) VALUES
(7, 'PHP', 9, 9, 'BI-345ST', 20, 16, 0, 'Vision', '12/19/2018', '1st', 100, 'Personal Home Page ', 'bookimage11', '', '2018-12-27 18:46:14', '2019-06-12 11:33:37'),
(8, 'C++', 12, 14, 'S-G45432', 10, 9, 0, 'Nirali', '01/16/2019', '1', 200, 'Practical and Therotical. ', 'bookimage', '', '2019-01-03 15:50:43', '2019-06-12 10:17:10'),
(9, 'StoryBook2', 15, 15, 'IB-5698', 10, 9, 0, 'vision', '06/12/2001', '2', 200, '', 'bookimage', '', '2019-06-09 08:54:38', '2019-06-12 05:44:42'),
(13, 'Algebra ', 10, 14, '', 10, 10, 0, '', '', '', 250, '', 'bookimage', '', '2019-06-09 09:18:11', NULL),
(15, 'shivaji Bhosale', 12, 17, '', 6, 6, 0, '', '', '', 500, '', 'bookimage', '', '2019-06-12 11:11:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT '0',
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Status`, `CreationDate`, `UpdationDate`) VALUES
(9, 'Computer', 1, '2018-08-29 07:31:55', '2019-06-12 11:03:58'),
(10, 'Mathematics', 1, '2018-08-29 07:32:16', '2019-06-09 09:18:11'),
(12, 'History Books', 2, '2018-08-30 15:53:26', '2019-06-12 11:11:51'),
(13, 'Marathi Books', 0, '2018-08-30 15:53:59', '2019-06-09 10:32:09'),
(14, 'Physics', 0, '2018-12-23 12:16:56', '2018-12-27 11:20:08'),
(15, 'General', 1, '2019-06-09 08:52:34', '2019-06-09 09:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `tblguest`
--

CREATE TABLE `tblguest` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `guestname` varchar(50) NOT NULL,
  `guestcontact` varchar(12) NOT NULL,
  `guestaddress` text NOT NULL,
  `IssuesDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ReturnDate` timestamp NULL DEFAULT NULL,
  `RetrunStatus` int(1) NOT NULL,
  `remarks` varchar(50) NOT NULL DEFAULT 'ISSUED',
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblguest`
--

INSERT INTO `tblguest` (`id`, `BookId`, `guestname`, `guestcontact`, `guestaddress`, `IssuesDate`, `ReturnDate`, `RetrunStatus`, `remarks`, `fine`) VALUES
(10, 1, 'amit', 'fdhh', '9987678987', '2018-09-05 08:03:13', NULL, 1, 'ACCEPTED', 0),
(12, 1, 'yogesh', '9923394656', 'yiyooo', '2018-09-05 08:06:54', NULL, 1, 'BOOK LOST', 0),
(13, 2, '6777', '9976543459', '677', '2018-09-05 08:20:19', NULL, 0, 'ISSUED', 0),
(14, 2, 'sonali', '9623065678', '', '2018-09-07 06:54:55', NULL, 1, 'BOOK LOST', 0),
(15, 3, 'amol', '9898989898', '', '2018-09-07 09:36:53', NULL, 1, 'ACCEPTED', 0),
(16, 4, 'anuja', '9898989898', '', '2018-09-07 09:37:45', NULL, 1, 'ACCEPTED', 0),
(17, 5, 'Amit pathare', '8645897634', 'pimpari,pune', '2018-12-27 08:29:22', NULL, 1, 'ACCEPTED', 0),
(18, 6, 'amol palekar', '9923395643', 'Mumbai', '2018-12-27 08:41:20', NULL, 1, 'ACCEPTED', 0),
(19, 6, 'sumit ware', '9923441067', 'Mumbai', '2018-12-27 12:19:50', NULL, 1, 'BOOK LOST', 0),
(29, 7, 'vikas', '8765676545', 'yes', '2018-12-28 08:52:30', NULL, 1, 'ACCEPTED', 0),
(30, 7, 'simaa pawar', '9876543456', 'karvenagar', '2018-12-28 09:21:41', NULL, 1, 'ACCEPTED', 0),
(31, 7, 'arjun', '8765434567', 'aundh,07,pune', '2019-06-12 11:33:37', NULL, 0, 'ISSUED', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblissuedbookdetails`
--

CREATE TABLE `tblissuedbookdetails` (
  `id` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `StudentID` varchar(150) DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `RetrunStatus` int(1) NOT NULL,
  `remarks` varchar(200) DEFAULT 'ISSUED',
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblissuedbookdetails`
--

INSERT INTO `tblissuedbookdetails` (`id`, `BookId`, `StudentID`, `IssuesDate`, `ReturnDate`, `RetrunStatus`, `remarks`, `fine`) VALUES
(1, 2, '1', '2018-09-07 05:45:54', '2018-09-07 06:21:52', 1, 'BOOK LOST', 0),
(2, 1, '2', '2018-09-07 05:46:21', '2018-09-07 06:21:42', 1, 'BOOK LOST', 0),
(3, 2, '2', '2018-09-07 06:54:03', '2018-09-07 09:34:54', 1, 'ACCEPTED', 0),
(4, 2, '2', '2018-09-07 06:54:20', '2018-09-07 09:35:00', 1, 'ACCEPTED', 0),
(5, 3, '2', '2018-09-07 09:37:05', '2018-12-23 11:43:54', 1, 'ACCEPTED', 0),
(6, 4, '3', '2018-09-07 09:37:18', '2018-12-23 11:44:31', 1, 'ACCEPTED', 0),
(7, 3, '2', '2018-12-23 11:43:31', '2018-12-23 11:46:03', 1, 'ACCEPTED', 0),
(8, 3, '2', '2018-12-23 11:46:19', '2018-12-23 11:46:24', 1, 'BOOK LOST', 0),
(9, 3, '2', '2018-12-23 11:53:38', '2018-12-23 11:53:53', 1, 'ACCEPTED', 0),
(11, 5, '2', '2018-12-27 08:30:50', '2018-12-27 08:31:58', 1, 'ACCEPTED', 0),
(12, 6, '2', '2018-12-27 08:39:57', '2018-12-27 08:40:33', 1, 'ACCEPTED', 0),
(13, 6, '6B98', '2018-12-27 08:46:38', '2018-12-27 10:05:28', 1, 'ACCEPTED', 0),
(14, 6, '3', '2018-12-27 09:45:12', '2018-12-27 10:02:00', 1, 'ACCEPTED', 0),
(15, 6, '3', '2018-12-27 10:04:09', '2018-12-27 10:04:41', 1, 'ACCEPTED', 0),
(16, 6, '3', '2018-12-27 10:06:28', '2018-12-27 12:26:11', 1, 'ACCEPTED', 0),
(17, 6, '6B98', '2018-12-27 10:06:43', '2018-12-27 12:26:22', 1, 'ACCEPTED', 0),
(18, 6, '3', '2018-12-27 12:28:31', '2018-12-27 12:31:22', 1, 'ACCEPTED', 0),
(19, 6, '3', '2018-12-27 17:31:18', '2018-12-27 18:44:01', 1, 'ACCEPTED', 0),
(30, 7, '10', '2018-12-29 16:22:07', '2018-12-30 06:30:33', 1, 'ACCEPTED', 0),
(31, 7, '10', '2018-12-29 16:22:22', '2018-12-30 06:30:17', 1, 'ACCEPTED', 0),
(32, 7, '10', '2018-12-29 16:46:32', '2018-12-30 06:27:41', 1, 'ACCEPTED', 0),
(33, 7, '6a22', '2018-12-29 16:48:40', '2019-01-01 07:34:00', 1, 'ACCEPTED', 0),
(34, 7, '25', '2019-01-02 19:08:04', NULL, 0, 'ISSUED', 0),
(35, 8, '7A23', '2019-01-22 07:11:41', '2019-06-12 10:17:10', 1, 'ACCEPTED', 0),
(36, 8, '26', '2019-06-09 10:40:25', NULL, 0, 'ISSUED', 0),
(37, 9, '27', '2019-06-09 10:48:28', '2019-06-09 10:50:43', 1, 'ACCEPTED', 0),
(38, 8, '6a2', '2019-06-11 05:46:40', '2019-06-11 05:47:27', 1, 'ACCEPTED', 0),
(39, 8, '6a22', '2019-06-12 05:43:09', '2019-06-12 05:46:07', 1, 'ACCEPTED', 0),
(40, 7, '6a22', '2019-06-12 05:43:58', NULL, 0, 'ISSUED', 0),
(41, 9, '6a22', '2019-06-12 05:44:42', NULL, 0, 'ISSUED', 0),
(42, 7, '7A26', '2019-06-12 09:12:35', NULL, 0, 'ISSUED', 0),
(43, 8, '7A23', '2019-06-12 10:02:57', '2019-06-12 10:16:42', 1, 'ACCEPTED', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `id` int(11) NOT NULL,
  `StudentId` varchar(100) DEFAULT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `class` varchar(20) DEFAULT NULL,
  `section` varchar(20) DEFAULT NULL,
  `rollno` varchar(20) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`id`, `StudentId`, `FullName`, `MobileNumber`, `class`, `section`, `rollno`, `Status`, `address`, `RegDate`, `UpdationDate`) VALUES
(3, '7A23', 'Amol Pawar', '9989898989', '7', 'A', '23', 0, 'navi peth karvenagar,pune', '2018-08-30 09:53:09', '2019-06-12 10:17:10'),
(4, '7A26', 'Manoj Madhukar Bhagwat', '8856888218', '7', 'A', '26', 1, 'karvenagar,hingane home coloney', '2018-08-30 15:51:20', '2019-06-12 09:12:35'),
(5, '6A22', 'avneet  Bhargava', '9923394525', '6', 'A', '22', 2, 'karvenagar,five garden society', '2018-12-26 18:24:36', '2019-06-12 09:16:08'),
(10, '6A2', 'abhijeet bhagwat', '9923394525', '6', 'A', '2', 0, 'imaan nagar,shreemaan society,pune', '2018-12-26 18:29:45', '2019-06-11 05:47:27'),
(11, '5A22', 'sushant Raj', '9923394567', '5', 'A', '22', 0, 'Balaji nagar,dhankavdi,katraj road,pune', '2018-12-27 05:25:53', NULL),
(13, '5A200', 'kunal', '8208504868', '5', 'A', '200', 0, 'Welworth Regency Pune 411005 Shiwajinagar', '2019-01-01 07:29:29', '2019-01-01 07:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `teachername` varchar(50) NOT NULL,
  `mobilenumber` varchar(12) NOT NULL,
  `address` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `teachername`, `mobilenumber`, `address`, `status`, `Created_at`, `Updated_at`) VALUES
(10, 'geetanjali Kokate', '9923394567', 'junawane recidancy,flat - 102,aundh.', 0, '2018-12-26 14:25:32', '2018-12-30 06:27:41'),
(25, 'anuja ware', '9923345644', 'kapil mhalar ,near hotel kokana ,baner', 1, '2018-12-29 11:20:46', '2019-01-02 19:08:04'),
(26, 'ankush pathak', '9923455667', 'alaji nagar,katraj', 1, '2018-12-29 11:21:25', '2019-06-09 10:40:25'),
(27, 'anuja chande', '8856888218', 'warje malwadi,block 7,near Copta house,pune', 0, '2018-12-30 06:18:46', '2019-06-09 10:50:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblauthors`
--
ALTER TABLE `tblauthors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Category` (`Category`) USING BTREE,
  ADD KEY `Author` (`Author`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblguest`
--
ALTER TABLE `tblguest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `BookId` (`BookId`),
  ADD KEY `StudentID` (`StudentID`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`StudentId`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblauthors`
--
ALTER TABLE `tblauthors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblguest`
--
ALTER TABLE `tblguest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tblissuedbookdetails`
--
ALTER TABLE `tblissuedbookdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
