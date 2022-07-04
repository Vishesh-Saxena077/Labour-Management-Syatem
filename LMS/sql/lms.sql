-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 02:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `registrationnumber` varchar(255) DEFAULT NULL,
  `userid` varchar(255) NOT NULL,
  `attandance` varchar(255) DEFAULT NULL,
  `adate` date DEFAULT NULL,
  `leavedate` date DEFAULT NULL,
  `numberofleaves` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`registrationnumber`, `userid`, `attandance`, `adate`, `leavedate`, `numberofleaves`) VALUES
('31/26077/74604357', 'AxuCDL128126', NULL, NULL, NULL, NULL),
('89/37301/57895655', 'IdMGhh946419', NULL, NULL, NULL, NULL),
(NULL, 'SXkGck608415', NULL, NULL, NULL, NULL),
(NULL, 'zJrswQ227294', NULL, NULL, NULL, NULL),
('31/72429/53660020', 'zTqk098922', NULL, NULL, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_details_table`
--

CREATE TABLE `bank_details_table` (
  `registrationnumber` varchar(255) DEFAULT NULL,
  `userid` varchar(255) NOT NULL,
  `accountnumber` varchar(255) DEFAULT NULL,
  `isfccode` varchar(255) DEFAULT NULL,
  `upiid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_details_table`
--

INSERT INTO `bank_details_table` (`registrationnumber`, `userid`, `accountnumber`, `isfccode`, `upiid`) VALUES
('31/26077/74604357', 'AxuCDL128126', '9784465495412321', 'PNB8794312', 'isds7355@ybl'),
('89/37301/57895655', 'IdMGhh946419', '984541264584515', 'SBI87821221455', ''),
(NULL, 'SXkGck608415', '65210641232133', 'PNB815222121', 'kishor98@ybl'),
(NULL, 'zJrswQ227294', '478945622132', 'PNB7632', ''),
('31/72429/53660020', 'zTqk098922', '78945612325', 'IB54870020021', 'vedika@ybl');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `registrationnumber` varchar(255) DEFAULT NULL,
  `userid` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `cpass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`registrationnumber`, `userid`, `pass`, `cpass`) VALUES
(NULL, 'ADMIN#123', '$2y$10$miD5VC/vHSzBUpbqjK0liucyQ7TZl.lywGkvCkX.Uqt6VaV/mv7Wy', '$2y$10$9AX0IoOhZdNIIW7P.xiImOB5ceq9pdwSLkryTc.j5QOWf.IcWHlDC'),
('31/26077/74604357', 'AxuCDL128126', '$2y$10$8.3DeC7QWueIZ/B3d4fSnOonxIb3VnqLQ3XoEq.Uove.0lII1lIR.', '$2y$10$8H3fig6dFk8DveDUBuuSOucvDY.ZiQtlNuCcxViiVPNJXa.jhvjim'),
('89/37301/57895655', 'IdMGhh946419', '$2y$10$6.e5LoDJrg51AJLyL9j4u.Wx4rE71VO.sSE0bHez1atU5tl/w/gtO', '$2y$10$XRIeDbzvf8gitAgWOoQHa.fL8kLRL7u9fQhMCCNa3gBR0cyz3zA8a'),
(NULL, 'SXkGck608415', '$2y$10$YrSq5wRiyFJPus7UJkF.xODO3UeyWuTX7Tso7tHLwHwEU10GN1vi.', '$2y$10$WcghRWElT4nKA/jSfjJD/uUKEi8lyGenHrGaQvRk5e4wkm.OFUsOS'),
(NULL, 'zJrswQ227294', '$2y$10$/Q352joEe/bvPhjQHpezaesHYDDReKVhpe2vKcYHVCOvMbpuTkxHq', '$2y$10$ZMYebhYFouCa/00SYDF9K.3BNNjVjtp9K2FEvB97j7QyqyJgPo.46'),
('31/72429/53660020', 'zTqk098922', '$2y$10$VVWr4/scib5OibkLdx9tZuzfSsY6TrnLyc5p1lDatqrPGVrq9syJi', '$2y$10$xTEzXHK5hXXQGWgX3p2V/O1VyaHb5wImqFX2HsDmQnt2TSAMp.JCa');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `registrationnumber` varchar(255) DEFAULT NULL,
  `userid` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `s_tate` varchar(50) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `housenumber` varchar(30) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`registrationnumber`, `userid`, `username`, `designation`, `dob`, `age`, `gender`, `phonenumber`, `email`, `s_tate`, `district`, `housenumber`, `pincode`) VALUES
(NULL, 'ADMIN#123', 'Vishesh Saxena', 'Admin', '2001-01-10', '21', 'male', '7355288989', 'adminlms@gmail.com', 'UttarPradesh', 'Jhansi', '546', '284001'),
('31/26077/74604357', 'AxuCDL128126', 'Isshan Gupta', 'Contrator', '1997-09-06', NULL, 'male', '9875462586', 'ishangup@gmail.com', 'Uttar Pradesh', 'meerut', '56F8', '213565'),
('89/37301/57895655', 'IdMGhh946419', 'raju', 'Contact Labour', '1999-02-09', NULL, 'male', '9546555568', 'rajubhagwant@gmail.com', 'Uttar Pradesh', 'aligarh', '5F/875', '254685'),
(NULL, 'SXkGck608415', 'Vishesh Saxena', 'tailor', '2000-06-10', NULL, 'male', '9546216545', 'kishor23@gmail.com', 'Uttar Pradesh', 'noida', '646', '201545'),
(NULL, 'zJrswQ227294', 'raju', 'labour', '1999-02-03', NULL, 'male', '7355288989', 'vishesh', 'Uttar Pradesh', 'meerut', '4567', '284001'),
('31/72429/53660020', 'zTqk098922', 'vedika', 'textile labour', '2000-08-11', '20', 'female', '6324598745', 'vedikasaxna@gmail.com', 'Uttar Pradesh', 'gorakhpur', '544/3D', '284001');

-- --------------------------------------------------------

--
-- Table structure for table `salary_table`
--

CREATE TABLE `salary_table` (
  `registrationnumber` varchar(255) DEFAULT NULL,
  `userid` varchar(255) NOT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `salarystatus` varchar(50) DEFAULT NULL,
  `salarydate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_table`
--

INSERT INTO `salary_table` (`registrationnumber`, `userid`, `salary`, `salarystatus`, `salarydate`) VALUES
('31/26077/74604357', 'AxuCDL128126', '30000', 'PAID', '2022-07-03'),
('89/37301/57895655', 'IdMGhh946419', '', '', '0000-00-00'),
(NULL, 'SXkGck608415', NULL, NULL, NULL),
(NULL, 'zJrswQ227294', NULL, NULL, NULL),
('31/72429/53660020', 'zTqk098922', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `verification_table`
--

CREATE TABLE `verification_table` (
  `registrationnumber` varchar(255) DEFAULT NULL,
  `userid` varchar(255) NOT NULL,
  `userimage` varchar(255) DEFAULT NULL,
  `applicationnumber` varchar(255) DEFAULT NULL,
  `registrationfee` varchar(100) DEFAULT NULL,
  `applicationstatus` varchar(100) NOT NULL,
  `applicationdate` date DEFAULT NULL,
  `aadhaarnumber` varchar(255) DEFAULT NULL,
  `ID_proof_name` varchar(255) DEFAULT NULL,
  `ID_proof` varchar(255) DEFAULT NULL,
  `licence_number` varchar(255) DEFAULT NULL,
  `licenceissueddate` date DEFAULT NULL,
  `licencevalidupto` date DEFAULT NULL,
  `stamppingplace` varchar(50) DEFAULT NULL,
  `works_under` varchar(50) NOT NULL,
  `name_organization` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verification_table`
--

INSERT INTO `verification_table` (`registrationnumber`, `userid`, `userimage`, `applicationnumber`, `registrationfee`, `applicationstatus`, `applicationdate`, `aadhaarnumber`, `ID_proof_name`, `ID_proof`, `licence_number`, `licenceissueddate`, `licencevalidupto`, `stamppingplace`, `works_under`, `name_organization`) VALUES
('31/26077/74604357', 'AxuCDL128126', 'userimg/stock-photo-smiling-worker-sitting-at-his-desk-in-the-warehouse-1242875086.jpg', 'UP/93/157KMNI6/607074/6237', '', 'APPROVED', '2022-07-03', '89764513284651', 'Voter Id', 'VOTE963210', 'UPrvI5142051', '0000-00-00', '0000-00-00', 'online', 'government', ''),
('89/37301/57895655', 'IdMGhh946419', 'userimg/ezgif.com-gif-maker.jpg', 'UP/93/HRCQGFY6/449295/3935', 'PAID', 'APPROVED', '2022-07-03', '79955122652556', 'DL', 'UP93852198', 'UPVgo2262166', '2022-07-03', '2023-07-03', 'online', 'government', 'Construct &Company'),
(NULL, 'SXkGck608415', 'userimg/314784.jpg', 'UP/93/0PTN0KBK/415639/5617', NULL, '', NULL, '8964532165421', 'Ration Card', 'RA484851', NULL, NULL, NULL, NULL, 'private', 'chloting'),
(NULL, 'zJrswQ227294', 'userimg/314827.jpg', 'UP/93/YX314NI5/225188/4303', NULL, '', '2022-07-03', '45678945628', 'Voter Id', 'va45555', NULL, NULL, NULL, NULL, 'government', ''),
('31/72429/53660020', 'zTqk098922', NULL, 'UP/93/YT1QMLH1/509405/8500', 'PENDING', 'APPROVED', '2022-06-29', '456789789754', 'Ration Card', 'RATION7894562', 'UPSDi7918515', '2022-07-02', '2023-07-02', 'office', 'government', 'independent worker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `registrationnumber` (`registrationnumber`);

--
-- Indexes for table `bank_details_table`
--
ALTER TABLE `bank_details_table`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `registrationnumber` (`registrationnumber`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `registrationnumber` (`registrationnumber`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `registrationnumber` (`registrationnumber`);

--
-- Indexes for table `salary_table`
--
ALTER TABLE `salary_table`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `registrationnumber` (`registrationnumber`);

--
-- Indexes for table `verification_table`
--
ALTER TABLE `verification_table`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `registrationnumber` (`registrationnumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
