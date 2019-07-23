-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2019 at 10:50 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10137600_lor`
--
CREATE DATABASE IF NOT EXISTS `id10137600_lor` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id10137600_lor`;

-- --------------------------------------------------------

--
-- Table structure for table `applied_student`
--

CREATE TABLE `applied_student` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `uni_name` varchar(50) NOT NULL,
  `dep_name` varchar(50) NOT NULL,
  `prof_email` varchar(50) NOT NULL,
  `time` int(11) NOT NULL,
  `status` varchar(9) NOT NULL,
  `code` varchar(50) NOT NULL,
  `desc` varchar(10000) NOT NULL COMMENT 'description',
  `last_notified` int(11) DEFAULT NULL,
  `created` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied_student`
--

INSERT INTO `applied_student` (`id`, `student_id`, `student_name`, `uni_name`, `dep_name`, `prof_email`, `time`, `status`, `code`, `desc`, `last_notified`, `created`) VALUES
(19, 201812005, 'Sarthak Trivedi', 'harvard', 'CS', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1560079197, 'accepted', 'd3cc25cc18848a3a5e59a543dbb5dc90', '', 1561552517, 1),
(20, 201812005, 'Sarthak Trivedi', 'harvard', 'CS', 'Vishvam Bhatt<201812116@daiict.ac.in>', 1560151346, 'pending', '92a4878f8ff62dfbd59f49e07cd7241d', 'Internship we have done', 1561542516, 0),
(21, 201812005, 'Sarthak Trivedi', 'harvard', 'CS', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1560151353, 'accepted', '2684b586ce9e2044f2a5474620bf36d8', 'Internship we have done', 1561542492, 0),
(22, 201812005, 'Sarthak Trivedi', 'harvard', 'CS', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1560158870, 'accepted', 'b5b4868494705136d96f08b7f4057f62', 'description123', 1561542498, 0),
(23, 201812005, 'Sarthak Trivedi', 'harvard', 'CS', 'Vatsal Dave<201812048@daiict.ac.in>', 1560158878, 'pending', '5be9145fb1a91106dcbfc2b334a51766', 'description123', 1561542523, 0),
(24, 201812005, 'Sarthak Trivedi', 'harvard', 'CS', 'Krut Rupera<201812015@daiict.ac.in>', 1560158885, 'pending', '8bb0df5ff28afc64590dbcac17f0ffb7', 'description123', 1561542528, 0),
(25, 201812005, 'Sarthak Trivedi', 'harvard', 'CS', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1560835038, 'rejected', '44679d7df754003eb65dba53a5f471cd', 'desc', NULL, 0),
(26, 201812005, 'Sarthak Trivedi', 'harvard', 'CS', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1560842757, 'accepted', 'bb7b08a07dca1b2248fc88a2ae31b21a', 'desc', 1561542504, 0),
(27, 201812005, 'Sarthak Trivedi', 'harvard', 'CS', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562576615, 'pending', '5a8983b7c051e1aed209ece21ae32131', 'hello', NULL, 0),
(28, 201812005, 'Sarthak Trivedi', 'harvard', 'CS', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562576712, 'pending', 'e5839f512bd29dcc5b8eb8a0d3240124', 'email', NULL, 0),
(29, 201812048, 'Vatsal Dave ', 'Oxford ', 'Cs', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562576894, 'accepted', '4497cdaaa594b82c2243748458a851ad', 'Temp', NULL, 0),
(30, 201812048, 'Vatsal Dave ', 'Xyz', 'Cs', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562577055, 'pending', 'a591c45ebccfa57bf9cb99d3ed500e19', 'Abcd', NULL, 0),
(31, 201812048, 'Vatsal Dave ', 'Xyz', 'Cs', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562577128, 'pending', 'c8a926a6b3cc57a47588ed8da153a625', 'Abcd', NULL, 0),
(32, 201812048, 'Vatsal Dave ', 'Xyz', 'Cs', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562577221, 'pending', '73c95bdb1c3924b569c258d3033ae688', 'aabcd', NULL, 0),
(33, 201812048, 'Vatsal Dave ', 'Xys', 'Cs', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562577289, 'pending', 'ed3365f72e3cdb076d5dabc866dba22a', 'abcd', NULL, 0),
(34, 201812116, 'Vishvam Bhatt', 'Oxford', 'Computer Science', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562578136, 'pending', '8639f8b0d5863ff09fe32ee61b1e13e9', '', NULL, 0),
(35, 201812116, 'Vishvam Bhatt', 'Oxford', 'Computer Science', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562578261, 'pending', 'e936b64566b85cd4ddaee06d183c63c5', '', NULL, 0),
(36, 201812048, 'Vatsal Dave ', 'Harvard ', 'Computer science ', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562578635, 'pending', '8af3fd3d78a9657971e6212f515a16f0', 'Aapi deje', NULL, 0),
(37, 201812116, 'Vishvam Bhatt', 'Oxford', 'Computer Science', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562578695, 'pending', '4ab0c1fc1678ce0b4e77643bcdd9ea5e', '', NULL, 0),
(38, 201812116, 'adaadadaad', 'aada', 'aadadadadada', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562578755, 'pending', '6fba923042fafcc22b41216af9aff606', '', NULL, 0),
(39, 201812048, 'Vatsal Dave ', 'Xyz', 'Gujarat', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562578785, 'pending', '25c39aac618d34156845fffe59732720', 'Abcd', NULL, 0),
(40, 201812048, 'Vatsal Dave ', 'Xyz', 'Gujarat', 'Vatsal Dave<201812048@daiict.ac.in>', 1562578867, 'pending', '29c8fe075e682e37b87ee511975ee5e1', 'Temp', NULL, 0),
(41, 201812005, 'Sarthak Trivedi', 'harvard', 'CS', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562578880, 'pending', '9361e00cbb93089e4ecf135962c6bd58', 'asd', NULL, 0),
(42, 201812005, 'Sarthak Trivedi', 'harvard', 'CS', 'Vatsal Dave<201812048@daiict.ac.in>', 1562578945, 'pending', '0b930b7135f586f6afca12fdb17c2a75', '', NULL, 0),
(43, 201812116, 'Vishvam Bhatt', 'Oxford', 'Computer Science', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562579203, 'accepted', '3bca7741e42e2640dab4f70ca30c2907', 'Please Email me the LOR as soon as possible', NULL, 0),
(44, 201812015, 'Krut Rupera', 'Oxford', 'Computer Science', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562579521, 'accepted', '76d7d91c9ec307f399188cca00214015', 'This is the description...', NULL, 0),
(45, 201812116, 'Vishvam Bhatt', 'Oxford', 'Computer Science', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1562731705, 'accepted', '1b4144915095e7f3a61f82d630165037', '', NULL, 0),
(46, 201812116, 'ishvam', 'aaa', 'computer science', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1563340367, 'accepted', '95bf9da8a813a96abfef3f9194c60476', '', NULL, 0),
(47, 201812116, 'ishvam', 'aaa', 'computer science', 'Vatsal Dave<201812048@daiict.ac.in>', 1563340367, 'rejected', '8848e8a96d068bc298e5492bf76daf17', '', NULL, 0),
(48, 201812005, 'Sarthak Trivedi', 'harvard', 'CS', 'Sarthak Trivedi<201812005@daiict.ac.in>', 1563460375, 'pending', '9dd83ca1f4a813f0fd0e519aa32b88a9', 'asdasd', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `email` varchar(50) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`email`, `name`) VALUES
('201812005@daiict.ac.in', 'Sarthak Trivedi'),
('201812048@daiict.ac.in', 'Vatsal Dave');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied_student`
--
ALTER TABLE `applied_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applied_student`
--
ALTER TABLE `applied_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
