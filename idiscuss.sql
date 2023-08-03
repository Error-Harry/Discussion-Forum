-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 06:00 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(9) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_description` varchar(500) NOT NULL,
  `c_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_name`, `c_description`, `c_created`) VALUES
(1, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation. Python is dynamically-typed and garbage-collected. It supports multiple programming paradigms, including structured, object-oriented and functional programming.', '2022-09-02 15:54:15'),
(2, 'Javascript', 'JavaScript, often abbreviated JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS. As of 2022, 98% of websites use JavaScript on the client side for webpage behavior, often incorporating third-party libraries.', '2022-09-02 15:55:12'),
(3, 'Django', 'Django is a free and open-source, Python-based web framework that follows the model_template_views architectural pattern. It is maintained by the Django Software Foundation, an independent organization established in the US as a 501 non-profit.', '2022-09-02 19:41:46'),
(4, 'Flask', 'Flask is a micro web framework written in Python. It is classified as a microframework because it does not require particular tools or libraries. It has no database abstraction layer, form validation, or any other components where pre-existing third-party libraries provide common functions.', '2022-09-02 19:41:46'),
(5, 'Java', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', '2022-09-05 14:21:07'),
(6, 'C++', 'C++ is a general-purpose programming language created by Danish computer scientist Bjarne Stroustrup as an extension of the C programming language, or \"C with Classes\".', '2022-09-05 14:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(9) NOT NULL,
  `c_content` text NOT NULL,
  `t_id` int(9) NOT NULL,
  `c_by` int(9) NOT NULL,
  `c_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `c_content`, `t_id`, `c_by`, `c_time`) VALUES
(1, 'this is comment', 1, 1, '2022-09-03 00:44:16'),
(2, 'xcfbnbdfgv', 1, 2, '2022-09-03 00:51:40'),
(3, 'cxvdfb', 2, 3, '2022-09-03 00:51:53'),
(4, 'This is peer to peer forum. Keep it friendly. Be courteous and respectful. Appreciate that others may have an opinion different from yours. Stay on topic. ... Share your knowledge. ... Refrain from demeaning, discriminatory, or harassing behaviour and speech.', 1, 4, '2022-09-03 00:57:46'),
(5, '', 0, 5, '2022-09-03 11:45:13'),
(6, '', 0, 6, '2022-09-03 11:45:21'),
(7, 'dsfgsdfgsdfg', 3, 0, '2022-09-04 00:14:15'),
(8, 'asfdas', 13, 1, '2022-09-04 00:22:48'),
(9, 'ssfsahfjshjshf', 18, 1, '2022-09-06 17:29:18'),
(10, 'Hi adinathdada you have to go on youtube and search for Code with harry channel and start watching his cpp playlist it will very useful for you', 20, 9, '2022-09-06 20:52:29'),
(11, 'fjaskfj;kas\r\n', 21, 13, '2023-05-20 23:36:16'),
(12, 'jkasfjasjfdk dfadoifuowjfsadkfsdkf;dasfsdfsdf', 22, 14, '2023-05-24 14:02:53'),
(13, 'wefifsfj;sa', 22, 14, '2023-05-24 14:03:21'),
(14, 'dfgzxfcbc b', 25, 15, '2023-05-24 17:05:11'),
(15, 'manage.py - A command-line utility that allows you to interact with your Django project\r\n__init__.py - An empty file that tells Python that the current directory should be considered as a Python package\r\nsettings.py - Comprises the configurations of the current project like DB connections.\r\nurls.py - All the URLs of the project are present here\r\nwsgi.py - This is an entry point for your application which is used by the web servers to serve the project you have created.', 26, 18, '2023-06-18 01:36:29'),
(16, 'A model in Django refers to a class that maps to a database table or database collection. Each attribute of the Django model class represents a database field. They are defined in app/models.py', 27, 12, '2023-06-18 01:38:47'),
(17, 'sfsdaf', 28, 13, '2023-07-03 00:40:52'),
(18, 'This is the solution as per my concern\r\n', 29, 12, '2023-07-03 21:57:41'),
(19, 'This is the solution for your problem', 30, 19, '2023-07-03 22:25:15'),
(20, 'This the solution for your problem', 31, 12, '2023-07-03 22:39:23'),
(21, 'solution', 32, 13, '2023-07-05 15:45:10'),
(22, 'solution 2', 32, 13, '2023-07-05 15:48:57');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `c_id` int(9) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_subject` text NOT NULL,
  `c_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_id`, `c_name`, `c_email`, `c_subject`, `c_message`) VALUES
(1, 'Harsh', 'nargideharsh@gmail.com', 'ABC', 'qwe rty uio pas dfg hjk lzx cvb nm.'),
(2, 'Harsh', 'nargideharsh@gmail.com', 'ABC', 'fasdfsafasf');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `t_id` int(9) NOT NULL,
  `t_title` varchar(255) NOT NULL,
  `t_desc` text NOT NULL,
  `t_cat_id` int(9) NOT NULL,
  `t_user_id` int(9) NOT NULL,
  `t_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`t_id`, `t_title`, `t_desc`, `t_cat_id`, `t_user_id`, `t_timestamp`) VALUES
(1, 'Unable to install pyaudio', 'I am not able to install pyaudio on windows', 1, 2, '2022-09-02 21:52:55'),
(2, 'Not able to use python', 'Please help me', 1, 3, '2022-09-02 22:10:22'),
(3, 'Python showing error', 'The error is blah blah blahh.....', 1, 4, '2022-09-03 00:02:31'),
(11, 'sdg', 'sdgf', 1, 5, '2022-09-03 00:30:11'),
(12, 'asf', 'asf', 1, 6, '2022-09-03 00:30:38'),
(13, 'ergfwrtg', 'sgvsdfg', 2, 1, '2022-09-03 00:31:36'),
(14, 'sdfsa', 'sf', 2, 0, '2022-09-04 00:23:15'),
(15, 'xvg', 'gsdsfg', 2, 0, '2022-09-04 00:25:29'),
(16, 'dfg', 'asf', 2, 1, '2022-09-04 00:27:19'),
(17, 'sf', 'asf', 4, 2, '2022-09-04 00:42:25'),
(18, 'unable to usrwee..', 'fakshfasofjsad', 1, 1, '2022-09-06 17:28:57'),
(19, 'unable to usrwee..', 'fakshfasofjsad', 1, 1, '2022-09-06 17:29:52'),
(20, 'Im little bit confused about how to start my cpp journy', 'Pls help me guys share you expireance with me how you have started when you were beginer plsssssssssss helpppppppppppppppp i need it\r\n', 6, 10, '2022-09-06 20:48:13'),
(21, 'Hafaalkjf', 'ajfadsiofo', 5, 13, '2023-05-20 23:36:07'),
(22, 'jakfoadsipisaf', 'ojwojopijoerrjtkejojtojer;lmebjbgkwmlkg', 5, 13, '2023-05-24 14:01:47'),
(23, 'asd', '', 2, 15, '2023-05-24 14:57:32'),
(24, 'hfmgfh', 'assdfggh', 2, 15, '2023-05-24 14:57:44'),
(25, 'ssgxfvxzcv', 'xdtynxfghntzrstgfx', 1, 16, '2023-05-24 17:04:15'),
(26, 'Explain the django project directory structure?', 'Please explain if any one knows the ans related to my quetion.', 3, 17, '2023-06-18 01:31:36'),
(27, 'What are models in Django?', 'Can i get the breif answer about models in Django....', 3, 17, '2023-06-18 01:32:36'),
(28, 'harsh', 'sgwerg', 2, 13, '2023-07-03 00:40:42'),
(29, 'Problem Title ', 'Ellaborate your concern', 5, 19, '2023-07-03 21:56:51'),
(30, 'Problem Title', 'Ellaborate Your Concern', 4, 21, '2023-07-03 22:24:17'),
(31, 'Problem Title', 'Ellaborate Your Concern', 6, 22, '2023-07-03 22:38:26'),
(32, 'i have this issue', 'hj', 5, 12, '2023-07-05 15:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(9) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_email`, `u_pass`, `u_timestamp`) VALUES
(1, 'a@g.com', 'c4ca4238a0b923820dcc509a6f75849b', '2022-09-03 18:55:14'),
(2, 'b@g.com', 'c4ca4238a0b923820dcc509a6f75849b', '2022-09-03 23:56:13'),
(3, 'c@g.com', 'c4ca4238a0b923820dcc509a6f75849b', '2022-09-03 23:56:22'),
(4, 'd@g.com', 'c4ca4238a0b923820dcc509a6f75849b', '2022-09-03 23:56:30'),
(5, 'e@g.com', 'c4ca4238a0b923820dcc509a6f75849b', '2022-09-03 23:56:43'),
(6, 'f@g.com', 'c4ca4238a0b923820dcc509a6f75849b', '2022-09-03 23:56:54'),
(7, 'harshrnargide', 'd41d8cd98f00b204e9800998ecf8427e', '2022-09-04 12:21:29'),
(8, 'nargideharsh@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '2022-09-04 12:22:16'),
(9, 'Harsh', 'c4ca4238a0b923820dcc509a6f75849b', '2022-09-04 12:22:59'),
(10, 'adinathdada', '202cb962ac59075b964b07152d234b70', '2022-09-06 20:46:29'),
(11, 'a@e.com', '202cb962ac59075b964b07152d234b70', '2022-11-06 21:37:55'),
(12, 'h@h.com', '202cb962ac59075b964b07152d234b70', '2022-11-06 21:38:45'),
(13, 'x@x.com', '202cb962ac59075b964b07152d234b70', '2023-05-20 23:35:40'),
(14, 'abc@abc.com', '202cb962ac59075b964b07152d234b70', '2023-05-24 14:02:23'),
(15, 'abcd', '202cb962ac59075b964b07152d234b70', '2023-05-24 14:56:52'),
(16, 'qwer', '202cb962ac59075b964b07152d234b70', '2023-05-24 17:03:48'),
(17, 'User@123', '202cb962ac59075b964b07152d234b70', '2023-06-18 01:27:13'),
(18, 'User@456', '202cb962ac59075b964b07152d234b70', '2023-06-18 01:34:33'),
(19, 'ha@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-07-03 21:56:01'),
(20, 'Customer', '202cb962ac59075b964b07152d234b70', '2023-07-03 22:21:10'),
(21, 'user@g.com', '202cb962ac59075b964b07152d234b70', '2023-07-03 22:23:34'),
(22, 'na@g.com', '202cb962ac59075b964b07152d234b70', '2023-07-03 22:37:40'),
(23, 'v@g.com', '202cb962ac59075b964b07152d234b70', '2023-07-05 15:43:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `c_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `t_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
