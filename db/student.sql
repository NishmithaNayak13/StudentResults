-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 08:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', 'password', '2023-07-02 07:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `MentorId` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`MentorId`, `Name`, `Department`, `Designation`, `Email`, `Password`, `Status`) VALUES
(4, 'Dr. Mangala Shetty', 'MCA', 'Associate Professor', 'mangalapshetty@nitte', 'mg@12', 'Active'),
(5, 'Dr. Mamatha Balipa', 'MCA', 'Associate Professor', 'mamathabalipa@nitte.edu', 'MamathaB@123', 'Active'),
(6, 'Dr. Pallavi Shetty', 'MCA', 'Associate Professor', 'pallavirjsh@nitte.edu', 'PallaviS@123', 'Active'),
(7, 'Dr. Spoorthi P Shetty', 'MCA', 'Assistant Professor Gd-III', 'sshetty.07@nitte.edu', 'Sshetty@123', 'Active'),
(8, 'Mr. Anantha Murthy', 'MCA', 'Assistant Professor Gd-II', 'anantham2004@nitte.e', 'Am@123', 'Active'),
(9, 'MS. Saritha Shetty', 'MCA', 'Assistant Professor Gd-II', 'shettysaritha1@nitte', 'SarithaS@123', 'Active'),
(10, 'Mr. Balachandra', 'MCA', 'Assistant Professor, Gd-II', 'balachandra22@nitte.', 'BalachandraR@123', 'Active'),
(11, 'Ms. Harshitha G M', 'MCA', 'Assistant Professor Gd-II', 'harshitha.gm@nitte.e', 'HarshithaG@123', 'Active'),
(12, 'Mr. Arhath', 'MCA', 'Assistant Professor Gd-I', 'arhathkumar@nitte.ed', 'ArharthK@123', 'Active'),
(13, 'Mr. Keerthi Shetty', 'MCA', 'Assistant Professor Gd-I', 'keerthi.shetty@nitte', 'Keerthi@123', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `stdid` int(11) NOT NULL,
  `USN` varchar(20) NOT NULL,
  `Subject` varchar(20) NOT NULL,
  `MSE1` int(5) NOT NULL,
  `MSE2` int(5) NOT NULL,
  `Task1` int(5) NOT NULL,
  `Task2` int(5) NOT NULL,
  `CIE` int(5) NOT NULL,
  `SEE` int(5) NOT NULL,
  `SGPA` decimal(5,2) NOT NULL,
  `CGPA` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`stdid`, `USN`, `Subject`, `MSE1`, `MSE2`, `Task1`, `Task2`, `CIE`, `SEE`, `SGPA`, `CGPA`) VALUES
(62, '4NM21MC001', '21MCA102', 15, 15, 10, 10, 50, 45, 0.00, 0.00),
(63, '4NM21MC002', '21MCA102', 12, 12, 8, 7, 37, 39, 0.00, 0.00),
(64, '4NM21MC003', '21MCA102', 15, 14, 10, 10, 49, 50, 0.00, 0.00),
(65, '4NM21MC004', '21MCA102', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(66, '4NM21MC005', '21MCA102', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(67, '4NM21MC006', '21MCA102', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(68, '4NM21MC007', '21MCA102', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(69, '4NM21MC008', '21MCA102', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(70, '4NM21MC010', '21MCA102', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(71, '4NM21MC011', '21MCA102', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(72, '4NM21MC012', '21MCA102', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(73, '4NM21MC001', '21MCA103', 12, 12, 8, 8, 40, 42, 0.00, 0.00),
(74, '4NM21MC002', '21MCA103', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(75, '4NM21MC003', '21MCA103', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(76, '4NM21MC004', '21MCA103', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(77, '4NM21MC005', '21MCA103', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(78, '4NM21MC006', '21MCA103', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(79, '4NM21MC007', '21MCA103', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(80, '4NM21MC008', '21MCA103', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(81, '4NM21MC010', '21MCA103', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(82, '4NM21MC011', '21MCA103', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(83, '4NM21MC012', '21MCA103', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(84, '4NM21MC001', '21mca101', 11, 12, 9, 10, 42, 40, 0.00, 0.00),
(85, '4NM21MC002', '21mca101', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(86, '4NM21MC003', '21mca101', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(87, '4NM21MC004', '21mca101', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(88, '4NM21MC005', '21mca101', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(89, '4NM21MC006', '21mca101', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(90, '4NM21MC007', '21mca101', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(91, '4NM21MC008', '21mca101', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(92, '4NM21MC010', '21mca101', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(93, '4NM21MC011', '21mca101', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(94, '4NM21MC012', '21mca101', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(95, '4NM21MC001', '21mca104', 15, 15, 10, 10, 50, 50, 0.00, 0.00),
(96, '4NM21MC002', '21mca104', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(97, '4NM21MC003', '21mca104', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(98, '4NM21MC004', '21mca104', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(99, '4NM21MC005', '21mca104', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(100, '4NM21MC006', '21mca104', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(101, '4NM21MC007', '21mca104', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(102, '4NM21MC008', '21mca104', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(103, '4NM21MC010', '21mca104', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(104, '4NM21MC011', '21mca104', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(105, '4NM21MC012', '21mca104', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(106, '4NM21MC001', '21mca105', 10, 10, 8, 7, 35, 39, 0.00, 0.00),
(107, '4NM21MC002', '21mca105', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(108, '4NM21MC003', '21mca105', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(109, '4NM21MC004', '21mca105', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(110, '4NM21MC005', '21mca105', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(111, '4NM21MC006', '21mca105', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(112, '4NM21MC007', '21mca105', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(113, '4NM21MC008', '21mca105', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(114, '4NM21MC010', '21mca105', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(115, '4NM21MC011', '21mca105', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(116, '4NM21MC012', '21mca105', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(117, '4NM21MC001', '21mca106', 14, 12, 9, 8, 43, 41, 0.00, 0.00),
(118, '4NM21MC002', '21mca106', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(119, '4NM21MC003', '21mca106', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(120, '4NM21MC004', '21mca106', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(121, '4NM21MC005', '21mca106', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(122, '4NM21MC006', '21mca106', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(123, '4NM21MC007', '21mca106', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(124, '4NM21MC008', '21mca106', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(125, '4NM21MC010', '21mca106', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(126, '4NM21MC011', '21mca106', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(127, '4NM21MC012', '21mca106', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(128, '4NM21MC001', '21mca107', 14, 11, 9, 7, 41, 40, 8.97, 8.97),
(129, '4NM21MC002', '21mca107', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(130, '4NM21MC003', '21mca107', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(131, '4NM21MC004', '21mca107', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(132, '4NM21MC005', '21mca107', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(133, '4NM21MC006', '21mca107', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(134, '4NM21MC007', '21mca107', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(135, '4NM21MC008', '21mca107', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(136, '4NM21MC010', '21mca107', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(137, '4NM21MC011', '21mca107', 0, 0, 0, 0, 0, 0, 0.00, 0.00),
(138, '4NM21MC012', '21mca107', 0, 0, 0, 0, 0, 0, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `Batch` int(4) NOT NULL,
  `Semester` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `Batch`, `Semester`) VALUES
(7, 2024, '1'),
(8, 2023, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `StudentId` int(11) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `USN` varchar(100) NOT NULL,
  `Batch` int(4) NOT NULL,
  `Section` varchar(5) NOT NULL,
  `Mentor` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`StudentId`, `StudentName`, `USN`, `Batch`, `Section`, `Mentor`, `Status`) VALUES
(18, 'ABHISHEK GOWDA R. M.', '4NM21MC001', 2023, 'A', 'Dr. Mamatha Balipa', 'Active'),
(19, 'ADIT U. SHETTY', '4NM21MC002', 2023, 'A', 'Dr. Mamatha Balipa', 'Active'),
(20, 'ADITHYA', '4NM21MC003', 2023, 'A', 'Dr. Mamatha Balipa', 'Active'),
(21, 'AFEEFA FARHATH', '4NM21MC004', 2023, 'A', 'Dr. Mamatha Balipa', 'Active'),
(22, 'AJAY S NAYAK', '4NM21MC005', 2023, 'A', 'Dr. Mamatha Balipa', 'Active'),
(23, 'AKASH', '4NM21MC006', 2023, 'A', 'Dr. Mamatha Balipa', 'Active'),
(24, 'ALISTER PRINSON CARDOZA', '4NM21MC007', 2023, 'A', 'Dr. Mamatha Balipa', 'Active'),
(25, 'AMISHA', '4NM21MC008', 2023, 'A', 'Dr. Mamatha Balipa', 'Active'),
(26, 'ASHTON CASTALINO', '4NM21MC010', 2023, 'A', 'Dr. Mamatha Balipa', 'Active'),
(27, 'ASHWITHA', '4NM21MC011', 2023, 'A', 'Dr. Mamatha Balipa', 'Active'),
(28, 'ASHWITHA A', '4NM21MC012', 2023, 'A', 'Dr. Mamatha Balipa', 'Active'),
(29, 'BASITTY ANJALI POLICEPATRO', '4NM21MC013', 2023, 'A', 'Dr. Pallavi Shetty', 'Active'),
(30, 'C. SWATHI KAMATH', '4NM21MC014', 2023, 'A', 'Dr. Pallavi Shetty', 'Active'),
(31, 'CHAITHRA C.K.', '4NM21MC015', 2023, 'A', 'Dr. Pallavi Shetty', 'Active'),
(32, 'CHINMAY BHANDARKAR', '4NM21MC016', 2023, 'A', 'Dr. Pallavi Shetty', 'Active'),
(33, 'CHRISTIN BABU', '4NM21MC017', 2023, 'A', 'Dr. Pallavi Shetty', 'Active'),
(34, 'DEEKSHITHA', '4NM21MC018', 2023, 'A', 'Dr. Pallavi Shetty', 'Active'),
(35, 'DEEPA NARAYANA MUKRI', '4NM21MC019', 2023, 'A', 'Dr. Pallavi Shetty', 'Active'),
(36, 'DEEPTHI', '4NM21MC020', 2023, 'A', 'Dr. Pallavi Shetty', 'Active'),
(37, 'DHANUSH', '4NM21MC021', 2023, 'A', 'Dr. Pallavi Shetty', 'Active'),
(38, 'DHANUSH N PRASAD', '4NM21MC022', 2023, 'A', 'Dr. Pallavi Shetty', 'Active'),
(39, 'DILEEP K. M.', '4NM21MC023', 2023, 'A', 'Dr. Pallavi Shetty', 'Active'),
(40, 'LIKHITHA S', '4NM21MC041', 2023, 'A', 'Dr. Pallavi Shetty', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `Semester` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `Semester` int(2) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `Semester`, `SubjectName`, `SubjectCode`) VALUES
(1, 1, 'DBS', '21MCA102'),
(2, 1, 'COA', '21MCA103'),
(6, 1, 'Data Structures', '21mca101'),
(7, 1, 'Mathematical Foundation for Computer Applications', '21mca104'),
(8, 1, 'Software Engineering and Testing', '21mca105'),
(9, 1, 'DS Lab', '21mca106'),
(10, 1, 'DBS Lab', '21mca107');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`MentorId`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`stdid`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Batch` (`Batch`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
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
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `MentorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `stdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
