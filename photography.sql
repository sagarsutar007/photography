-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 06:35 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photography`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `about` text NOT NULL,
  `exercept` text DEFAULT NULL,
  `background` text NOT NULL,
  `favourite` int(1) NOT NULL DEFAULT 0,
  `status` enum('draft','published') NOT NULL DEFAULT 'draft',
  `categoryId` int(11) NOT NULL DEFAULT 1,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `about`, `exercept`, `background`, `favourite`, `status`, `categoryId`, `createdAt`) VALUES
(1, 'Nature', '', NULL, 'nature-bg.jpg', 1, 'published', 1, '2022-04-06 19:04:16'),
(2, 'Automobile', '', NULL, '', 0, 'draft', 1, '2022-04-06 19:04:16'),
(3, 'Outdoor', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:14:42'),
(4, 'Fashion', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:14:42'),
(5, 'Potraits', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:14:42'),
(6, 'Wildlife', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:14:42'),
(7, 'Underwater', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:14:42'),
(8, 'Space', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:14:42'),
(9, 'Creative', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:14:42'),
(10, 'Office', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:14:42'),
(11, 'Landscape', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:14:42'),
(12, 'Food', '', NULL, 'food-bg.jpg', 1, 'published', 1, '2022-04-07 17:14:42'),
(13, 'Night Life', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:14:42'),
(14, 'People', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:19:09'),
(15, 'Lifestyle', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:19:09'),
(16, 'Animals', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:19:09'),
(17, 'Culture', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:19:09'),
(18, 'Monuments', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:20:30'),
(19, 'Forest', '', NULL, '', 0, 'draft', 1, '2022-04-07 17:20:30'),
(20, 'GYM', '', NULL, 'gym-bg.jpg', 1, 'published', 1, '2022-04-07 17:21:37'),
(21, 'Temples', '', NULL, '', 0, 'draft', 1, '2022-04-10 07:42:09'),
(22, 'Sports', '&lt;p&gt;Hey &lt;b&gt;Bro&lt;/b&gt;&lt;/p&gt;', 'exercept', 'sports-bg.jpg', 1, 'published', 1, '2022-04-18 06:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `picture` text NOT NULL,
  `url` text NOT NULL,
  `exercept` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `status` enum('published','draft') NOT NULL DEFAULT 'draft',
  `categoryId` int(11) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `picture`, `url`, `exercept`, `text`, `status`, `categoryId`, `createdAt`) VALUES
(1, 'How to set green background for video editing', 'IMG_20201225_163618-1.jpg', '', 'Lorem ipsum gypsum dolor amet sit', '&lt;p&gt;&lt;b&gt;Bold&lt;/b&gt; &lt;i&gt;italic&lt;/i&gt;&lt;/p&gt;', 'published', 2, '2022-04-17 18:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `picture` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `picture`, `createdAt`) VALUES
(1, 'Unknown', '', '2022-04-17 22:19:53'),
(2, 'Nature', '', '2022-04-17 22:19:53'),
(3, 'City', '', '2022-04-18 20:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT 'Unknown',
  `text` text NOT NULL,
  `type` enum('blog','album') DEFAULT NULL,
  `relatedId` int(11) NOT NULL,
  `status` enum('pending','approved','discarded') NOT NULL DEFAULT 'pending',
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `albumid` int(11) NOT NULL,
  `picture` text NOT NULL,
  `title` text NOT NULL,
  `about` text NOT NULL,
  `useAbout` int(1) NOT NULL DEFAULT 0,
  `useWork` int(1) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `albumid`, `picture`, `title`, `about`, `useAbout`, `useWork`, `createdAt`) VALUES
(26, 22, 'album-22-625c5b308fc3c.jpg', 'Unknown', 'qwertyuiop', 0, 0, '2022-04-17 08:23:44'),
(27, 22, 'album-22-625c5b408ab22.jpg', 'Unknown', '', 0, 0, '2022-04-17 08:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` text NOT NULL,
  `companyName` text NOT NULL,
  `shortName` text NOT NULL,
  `photo` text NOT NULL,
  `about` text NOT NULL,
  `work` text NOT NULL,
  `designation` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `behance` varchar(100) NOT NULL,
  `dribble` varchar(100) NOT NULL,
  `type` enum('superadmin','guest') DEFAULT NULL,
  `last_logged` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_logged_ip` varchar(60) NOT NULL,
  `authtoken` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `password`, `name`, `companyName`, `shortName`, `photo`, `about`, `work`, `designation`, `facebook`, `twitter`, `instagram`, `behance`, `dribble`, `type`, `last_logged`, `last_logged_ip`, `authtoken`) VALUES
(1, 'administrator', '1sagarsutar@gmail.com', '8339042376', '9bc34549d565d9505b287de0cd20ac77be1d3f2c', 'Sagar Kumar Sutar', 'Todquest', '&lt;strong&gt;T&lt;/strong&gt;Q', 'sagarsutar.jpg', '', '', 'Photographer ', '', '', '', '', '', 'superadmin', '2022-04-03 07:38:57', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
