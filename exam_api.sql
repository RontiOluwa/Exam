-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2018 at 03:59 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `cover_pics` text NOT NULL,
  `price` text NOT NULL,
  `description` text NOT NULL,
  `rating` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `cover_pics`, `price`, `description`, `rating`) VALUES
(1, 'Java Programming', 'Assets/Img/java_developer_1x.jpg', '? 0.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.', ''),
(2, 'Web Design & Development', 'Assets/Img/web-design.jpg', '? 0.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor .', ''),
(3, 'Digital Marketing', 'Assets/Img/SEO-Report-Image.jpg', '? 0.00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore .', '');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `exam_name` text NOT NULL,
  `exam_course` text NOT NULL,
  `user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `questions` text NOT NULL,
  `choices` text NOT NULL,
  `choice2` text NOT NULL,
  `choice3` text NOT NULL,
  `choice4` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `source_id`, `questions`, `choices`, `choice2`, `choice3`, `choice4`, `answer`) VALUES
(11, 6, '______ is not a feature of Java', 'Object Oriented', 'Platform Independent', 'Architecture-neutral', 'Static', '4'),
(12, 6, 'What will be  the output of this code\n\npublic class MyFirstJavaProgram {\n\n   /* This is my first java program.\n    * This will print ''Hello World'' as the output\n    */\n\n   public static void main(String []args) {\n      System.out.println("Hello World"); // prints Hello World\n   }\n}', 'Hello World', '"Hello World"', 'World', 'Hello', '1'),
(13, 6, 'What are the categories of modifiers', 'Access Modifiers and In-Access Modifiers', 'Access Modifiers and Accessible Modifiers', 'Access Modifiers and Non-access Modifiers', 'Acess and InAffect', '3');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `test_name` text NOT NULL,
  `test_course` text NOT NULL,
  `image_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test_name`, `test_course`, `image_link`) VALUES
(6, 'Java Programming', 'Java Programming', 'Assets/Img/java_developer_1x.jpg'),
(7, 'Web Design & Development', 'Web Design & Development', 'Assets/Img/web-design.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
