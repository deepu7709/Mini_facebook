-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 07:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `from_` varchar(100) NOT NULL,
  `to_` varchar(100) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`from_`, `to_`, `msg`) VALUES
('avskaushik123@gmail.com', 'dharani@gmail.com', 'hello'),
('avskaushik123@gmail.com', 'dharani@gmail.com', 'There you go'),
('akhil@gmail.com', 'manasa@gmail.com', 'Hello manasa!'),
('akhil@gmail.com', 'avskaushik123@gmail.com', 'Great work Dude!'),
('akhil@gmail.com', 'deepu@gmail.com', 'Well played'),
('deepu@gmail.com', 'akhil@gmail.com', 'Thank you akhil'),
('deepu@gmail.com', 'avskaushik123@gmail.com', 'Nice design'),
('avskaushik123@gmail.com', 'akhil@gmail.com', 'Thanks Akhil'),
('avskaushik123@gmail.com', 'deepu@gmail.com', 'Well played'),
('akhil@gmail.com', 'avskaushik123@gmail.com', 'heyy');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `file` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comm` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`file`, `email`, `comm`) VALUES
('posts/animation.gif', 'avskaushik123@gmail.com', 'My best one'),
('posts/like.jpg', 'deepu@gmail.com', 'Good'),
('posts/like.jpg', 'deepu@gmail.com', 'Welcome'),
('posts/animation.gif', 'dharani@gmail.com', 'good animation'),
('posts/logo.png', 'avskaushik123@gmail.com', 'Good one'),
('posts/2.jpeg', 'avskaushik123@gmail.com', 'well deserved'),
('posts/like.jpg', 'akhil@gmail.com', 'Like'),
('posts/like.png', 'akhil@gmail.com', 'Wow!'),
('posts/chatii.png', 'avskaushik123@gmail.com', 'wow!');

-- --------------------------------------------------------

--
-- Table structure for table `faces`
--

CREATE TABLE `faces` (
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `psswd` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faces`
--

INSERT INTO `faces` (`fname`, `lname`, `email`, `psswd`, `dob`, `gender`) VALUES
('Kaushik', ' ', 'avskaushik123@gmail.com', '20092003', '2023-04-06', 'male'),
('Deepika', ' ', 'deepu@gmail.com', '20092003', '2023-04-06', 'female'),
('Dharani', ' ', 'dharani@gmail.com', '1234', '2023-04-06', 'male'),
('Manasa', ' ', 'manasa@gmail.com', '20092003', '2023-04-29', 'female'),
('Akhil', 'Venkat', 'akhil@gmail.com', '20092003', '2023-04-13', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgno` bigint(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgno`, `fname`, `email`) VALUES
(1, 'posts/animation.gif', 'avskaushik123@gmail.com'),
(2, 'posts/like.jpg', 'avskaushik123@gmail.com'),
(3, 'posts/chatii.png', 'deepu@gmail.com'),
(4, 'posts/logo.png', 'dharani@gmail.com'),
(5, 'posts/facebook.jpg', 'dharani@gmail.com'),
(6, 'posts/2.jpeg', 'avskaushik123@gmail.com'),
(7, 'posts/7.jpg', 'akhil@gmail.com'),
(8, 'posts/like.png', 'akhil@gmail.com'),
(9, 'posts/4.jpeg', 'akhil@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `like_main`
--

CREATE TABLE `like_main` (
  `file` varchar(100) NOT NULL,
  `likes` bigint(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `imageno` bigint(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like_main`
--

INSERT INTO `like_main` (`file`, `likes`, `user`, `imageno`) VALUES
('posts/animation.gif', 0, NULL, 1),
('posts/like.jpg', 0, NULL, 2),
('posts/chatii.png', 0, NULL, 3),
('posts/logo.png', 0, NULL, 4),
('posts/facebook.jpg', 0, NULL, 5),
('posts/logo.png', 1, 'avskaushik123@gmail.com', NULL),
('posts/2.jpeg', 0, NULL, 6),
('posts/like.jpg', 1, 'avskaushik123@gmail.com', NULL),
('posts/7.jpg', 0, NULL, 7),
('posts/like.png', 0, NULL, 8),
('posts/facebook.jpg', 1, 'akhil@gmail.com', NULL),
('posts/logo.png', 2, 'akhil@gmail.com', NULL),
('posts/like.png', 1, 'akhil@gmail.com', NULL),
('posts/7.jpg', 1, 'akhil@gmail.com', NULL),
('posts/animation.gif', 1, 'akhil@gmail.com', NULL),
('posts/logo.png', 3, 'deepu@gmail.com', NULL),
('posts/animation.gif', 2, 'deepu@gmail.com', NULL),
('posts/chatii.png', 1, 'deepu@gmail.com', NULL),
('posts/2.jpeg', 1, 'deepu@gmail.com', NULL),
('posts/like.png', 2, 'deepu@gmail.com', NULL),
('posts/7.jpg', 2, 'deepu@gmail.com', NULL),
('posts/like.png', 3, 'avskaushik123@gmail.com', NULL),
('posts/chatii.png', 2, 'avskaushik123@gmail.com', NULL),
('posts/4.jpeg', 0, NULL, 9);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
