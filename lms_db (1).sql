-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 05:53 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_bin NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`, `email`) VALUES
(1, 'admin', '1234', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` text COLLATE utf8mb4_bin NOT NULL,
  `course_desc` text COLLATE utf8mb4_bin NOT NULL,
  `course_author` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `course_img` text COLLATE utf8mb4_bin NOT NULL,
  `course_duration` int(11) NOT NULL,
  `course_price` int(11) NOT NULL,
  `course_org_price` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `end_time` date NOT NULL,
  `enroll_duration` int(11) NOT NULL,
  `total_seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_img`, `course_duration`, `course_price`, `course_org_price`, `create_time`, `end_time`, `enroll_duration`, `total_seat`) VALUES
(13, ' C programming for beginners', 'C is a powerful general-purpose programming language. It can be used to develop software like operating systems, databases, compilers, and so on.aaaaaaaaaaaaaaaaaaaaaaaa', 'ABCxxxxxxx', '../images/courseimg/', 14, 25, 30, '2021-06-12', '2021-10-11', 121, 30),
(14, 'Java Programming For beginners', 'Java is a powerful general-purpose programming language. It is used to develop desktop and mobile applications, big data processing, embedded systems, and so on', 'ASA', '../images/courseimg/maxresdefault.jpg', 10, 25, 40, '2021-06-13', '2021-08-12', 60, 30),
(19, ' C programming', 'C is a powerful general-purpose programming language. It can be used to develop software like operating systems, databases, compilers, and so on.ssssssssssssssssss', 'ABC', '', 13, 123, 40, '2021-06-13', '2021-07-13', 30, 30),
(21, 'Python', 'Create portfolio projects that showcase your new skills to help land your dream job. Take your skills to a new level and join millions of users that have learned Python.', 'ABC', '', 14, 400, 500, '2021-06-13', '2021-07-28', 45, 30),
(22, 'PHP', 'Easy Learning with \"PHP Tryit\". With our online \"PHP Tryit\" editor, you can edit the PHP code, and click on a button to view the result. ', 'ABC', '', 13, 12, 40, '2021-06-13', '2021-09-11', 90, 30),
(23, 'Angular JS', 'Master your language with lessons, quizzes, and projects designed for real-life scenarios. Create portfolio projects that showcase your new skills to help land your dream job.', 'AX', '', 20, 300, 500, '2021-06-13', '2021-08-02', 50, 30),
(24, 'sas', 'ssssss', 'ADS', '', 12, 12121, 12, '2021-06-13', '2021-07-23', 40, 23);

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `init_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`id`, `stu_id`, `course_id`, `init_date`, `end_date`) VALUES
(54, 65, 19, '2021-06-13', '2021-06-26'),
(55, 66, 19, '2021-06-13', '2021-06-26'),
(56, 62, 14, '2021-06-13', '2021-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `stu_email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `stu_pass` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `stu_occ` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `stu_img` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_email`, `stu_pass`, `stu_occ`, `stu_img`) VALUES
(62, 'Afrar Jahin', 'afrarjahin@gmail.com', '$2y$10$hrNe90sX62C.Yg6EDyEpjOhsiMat3vmBPewB9FuoNdBbyUChPlSuC', '', ''),
(63, 'Anna', 'abc@gmail.com', '$2y$10$ZtaDysPeIjrzPhtO8YStgOFcSMZB4Z5VAKJCXECd0Urg7FGUZcbZm', '', ''),
(64, 'Afrar Jahin', 'n@gmail.com', '$2y$10$1/fps2F4qofVFmAqqvB4zeradDNBTcztqWWl8mEW4OttElYN57OSu', '', ''),
(65, 'Afrar Jahin', 'a@gmail.com', '$2y$10$bviPhNM5Vu7iTTSza5l8ZuS7h6nM8JtbJPH5qA08sBGggDy7rDWEO', '', ''),
(66, 'Afrar Jahin', 'b@gmail.com', '$2y$10$NjLEcyPW07L.E6wM7tYsJOi7Av.swfkYbDT7sccaRpr/uzUdc6sfC', '', ''),
(67, 'Afrar Jahin', 'c@gmail.com', '$2y$10$ZgWUr0twNxX8ob1ZPR/SpOmSmJE2v5Ky35VdMX1moxCeOD2W11P6W', '', ''),
(68, 'Afrar Jahin', 'd@gmail.com', '$2y$10$V/QXei21RBWMd1RJhjbwSuVh5NyvQ8rM17QHfXJp4EA83CwNzmRa2', '', ''),
(69, 'Afrar Jahin', 'e@gmail.com', '$2y$10$lzPqxvc0bhk7uTsqDvYLu.t2IR1tQrV8DTTS.jxlucPCq9APy4FeS', '', ''),
(71, 'Afrar Jahin', 'f@gmail.com', '$2y$10$3dohuq5BS4.Q5GrUcoOmru0RQ2xaXJwR1cyzqP/Ix4N9NqZx5UHme', '', ''),
(72, 'Afrar Jahin', 'g@gmail.com', '$2y$10$4WS1iwM0XbmvULjYsQS5JOfHy6/.OIoRrbhq5xaAboCrv.QRw67ci', '', ''),
(73, 'Afrar Jahin', 'h@gmail.com', '$2y$10$VmR.hGrmJMD3oMmJkmvFl.saBsE0K/102kKv/Q0WGfaBbq9hOd5Dq', '', ''),
(78, 'Afrar Jahin', 'sjdskhdskd@gmail.com', '$2y$10$EKy/pWU9.JvlZk6Qrju1gOpIbtY5Akgv0QgUYr.l78lM4EiKp0ZHe', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `stu_id` (`stu_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
