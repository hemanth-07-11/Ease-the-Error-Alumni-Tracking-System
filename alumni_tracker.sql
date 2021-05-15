-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 03:16 PM
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
-- Database: `alumni_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `user_id` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email_id` varchar(64) DEFAULT NULL,
  `github` varchar(64) DEFAULT NULL,
  `linkedin` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`user_id`, `phone`, `email_id`, `github`, `linkedin`) VALUES
(635241, '7584112654', 'hafna@gmail.com', NULL, NULL),
(784563, '7845632375', 'hemanth@gmail.com', 'https://github.com/hemanth-07-11', 'https://www.linkedin.com/in/hemanth-n-2001/'),
(152452, '9056234586', 'mithesh@gmail.com', 'https://github.com/Mithesh14', NULL),
(789621, '9080446325', 'yogee@gmail.com', 'https://github.com/yogeeswar2001', NULL),
(123036, '9585111654', 'abcd@gmail.com', 'https://github.com/abcd', 'http://linkedin.com/in/abcd'),
(352563, '9632558425', 'rubakpreyan@gmail.com', 'https://github.com/Rubakpreyan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE `interest` (
  `user_id` int(11) NOT NULL,
  `interest` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`user_id`, `interest`) VALUES
(123036, 'Database Design'),
(123036, 'Java'),
(152452, 'CSS'),
(152452, 'Data Mining'),
(352563, 'MERN'),
(352563, 'Tailwind'),
(635241, 'Javascript'),
(635241, 'Web Development'),
(784563, 'Competitive coding'),
(784563, 'Database Design'),
(784563, 'MERN'),
(789621, 'Automation'),
(789621, 'Competitive coding'),
(789621, 'Java');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `sender_id` int(11) NOT NULL,
  `reciver_id` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `sender_flag` int(11) DEFAULT 1,
  `reciver_flag` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`sender_id`, `reciver_id`, `msg`, `time`, `sender_flag`, `reciver_flag`) VALUES
(152452, 635241, 'Hi hafna', '2021-05-13 19:55:07', 1, 1),
(352563, 784563, 'Hi Hemanth', '2021-05-13 19:53:39', 1, 1),
(352563, 784563, 'Bye Hemanth', '2021-05-13 21:54:48', 1, 1),
(352563, 784563, 'ok', '2021-05-14 00:07:15', 1, 1),
(635241, 152452, 'Bye Mithesh', '2021-05-13 21:55:41', 1, 1),
(784563, 152452, 'Hi Sample text testing', '2021-05-13 21:07:30', 1, 1),
(784563, 352563, 'Hi rubak', '2021-05-13 18:58:40', 1, 1),
(784563, 352563, 'Bye rubak', '2021-05-13 20:54:28', 1, 1),
(784563, 352563, 'Okay', '2021-05-13 23:04:54', 1, 1),
(784563, 789621, 'Good Morning ', '2021-05-13 22:56:22', 1, 1),
(789621, 784563, 'Hi Hemanth', '2021-05-13 20:55:58', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `post`) VALUES
(10761, 784563, 'This is Hemanth.'),
(12925, 789621, 'Loading...'),
(13245, 352563, 'The future belongs to those who prepare for it today'),
(13562, 152452, 'Stupid is as stupid does.'),
(15625, 635241, 'Meh'),
(16212, 789621, 'Follow me on Github: https://github.com/yogeeswar2001');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `roll_no` int(11) DEFAULT NULL,
  `pwd` varchar(32) NOT NULL,
  `yop` int(11) DEFAULT NULL,
  `company` varchar(64) DEFAULT NULL,
  `designation` varchar(32) DEFAULT NULL,
  `location` varchar(64) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `Department` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `roll_no`, `pwd`, `yop`, `company`, `designation`, `location`, `is_active`, `Department`, `dob`) VALUES
(123036, 'ABCD', 101, 'ABCD', 2018, 'Amazon', 'Jnr SDE', 'Banglore', 0, 'CSE', '1996-06-01'),
(152452, 'mithesh', 100, 'mithesh', 2016, 'Facebook', 'Software Engineer', 'Mumbai', 1, 'IT', '1994-01-27'),
(173417, 'Hemanth', 144, 'Hemanth', 2021, 'SELF', 'SDE', 'Chennai', 0, 'CSE', '1996-06-01'),
(352563, 'rubak', 123, 'rubak', 2017, 'Google', 'SDE', 'Chennai', 0, 'ECE', '1995-08-23'),
(635241, 'hafna', 105, 'hafna', 2016, 'Facebook', 'Interface Designer', 'Chennai', 0, 'CSE', '1994-04-11'),
(784563, 'hems', 107, 'hems', 2023, NULL, NULL, NULL, 1, 'IT', '2001-11-07'),
(789621, 'yogee', 110, 'yogee', 2019, 'Amazon', 'Database Admin', 'Mumbai', 0, 'CSE', '1997-05-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD KEY `contact_details_ibfk_1` (`user_id`);

--
-- Indexes for table `interest`
--
ALTER TABLE `interest`
  ADD PRIMARY KEY (`user_id`,`interest`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`sender_id`,`reciver_id`,`time`,`msg`),
  ADD KEY `reciver_id` (`reciver_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16213;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD CONSTRAINT `contact_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `interest`
--
ALTER TABLE `interest`
  ADD CONSTRAINT `interest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`reciver_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
