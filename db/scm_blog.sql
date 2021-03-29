-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 08:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scm_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `body`, `created_date_time`, `updated_date_time`) VALUES
(1, 1, 5, 'good idea', '2021-03-24 05:59:47', '2021-03-24 06:05:36'),
(2, 2, 2, 'great', '2021-03-24 06:02:57', '2021-03-24 06:02:57'),
(3, 2, 5, 'beautiful city', '2021-03-24 06:05:17', '2021-03-24 06:05:17'),
(4, 1, 4, 'hiiii', '2021-03-24 06:23:54', '2021-03-24 07:59:26'),
(5, 2, 4, 'great', '2021-03-24 06:24:16', '2021-03-24 06:24:16'),
(6, 1, 4, 'OMG', '2021-03-24 06:24:45', '2021-03-24 07:59:30'),
(8, 1, 4, 'nice', '2021-03-24 06:25:59', '2021-03-24 07:59:21'),
(10, 2, 4, 'wanna go there tgt', '2021-03-24 07:23:24', '2021-03-24 07:58:59'),
(11, 1, 4, 'amazing', '2021-03-24 07:23:33', '2021-03-24 07:59:09'),
(13, 4, 1, 'wow', '2021-03-24 09:36:07', '2021-03-24 09:36:07'),
(16, 5, 7, 'amazing', '2021-03-28 20:13:37', '2021-03-28 20:13:37'),
(17, 5, 1, 'wow', '2021-03-29 07:49:43', '2021-03-29 07:49:43'),
(18, 5, 1, 'gorgeous', '2021-03-29 07:58:15', '2021-03-29 07:58:15'),
(19, 4, 1, 'amazing', '2021-03-29 07:58:24', '2021-03-29 07:58:24'),
(20, 1, 1, 'WOW', '2021-03-29 07:58:36', '2021-03-29 07:58:36'),
(21, 2, 1, 'great', '2021-03-29 07:59:03', '2021-03-29 07:59:03'),
(22, 5, 1, 'beautiful', '2021-03-29 13:56:44', '2021-03-29 13:56:44'),
(23, 7, 3, 'wow', '2021-03-29 17:49:47', '2021-03-29 17:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `image`, `created_date_time`, `updated_date_time`) VALUES
(1, 'Why I Love Italy', 'I love Italy, it’s become my favorite country to visit over the years and while travel has been on hold I’ve been waiting out for when we can return to Italy again. The food, the art, the architecture, the nature, the people – the reasons I’ve fallen in .', 6, '605abde921931_Italy.jpeg', '2021-03-24 02:55:57', '2021-03-29 15:43:29'),
(2, ' HIGHLIGHTS OF MY HOME COUNTRY - Ghent, BELGIUM', 'If you ended up in Ghent as a tourist 20 years ago, you’d probably taken a wrong turn somewhere halfway between Brussels and Bruges, or gotten off the train at the wrong station. But today, Ghent is THE place to be in Belgium, and easily my favorite city!', 6, '605aaad8d65cc_Ghent, Belgium.jpg', '2021-03-24 02:58:32', '2021-03-24 04:19:24'),
(4, '7 Days Samoa Island Itinerary', 'Samoa has been on my bucketlist for quite some time now, and I’m beyond fulfilled after finally traveling there! Chances are if you’re reading this you already know where it is and what’s mostly there, but for generality, I’ll start from the top! For star', 5, '605af2bb633ae_Samoa Island Itinerary.jfif', '2021-03-24 08:05:15', '2021-03-24 09:25:41'),
(5, 'My Next Chapter and the Power of Letting Go', 'Last week I sent an email to over 10,000 people titled, “You might want to unsubscribe. I’ve changed.” \r\n\r\nDramatic, much? LOL. In typical Aries fashion, I wanted to make a bold statement letting people know that in the last 7 years that I’ve had this blo', 7, '6060e3600e389_jisoo.jpg', '2021-03-28 20:13:20', '2021-03-29 13:22:52'),
(6, 'BLOG', 'THis is blog', 1, '6061d49c01217_Italy.jpeg', '2021-03-29 13:22:36', '2021-03-29 13:22:36'),
(7, 'BLOG', 'THIS IS BLOG', 3, '6062132f448c8_Lake Manyara National Park.jpg', '2021-03-29 17:49:35', '2021-03-29 17:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_date_time`, `updated_date_time`) VALUES
(1, 'admin', '2021-03-22 13:59:19', '2021-03-22 13:59:19'),
(2, 'author', '2021-03-22 13:59:19', '2021-03-22 13:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `password`, `image`, `created_date_time`, `updated_date_time`) VALUES
(1, 'yoon', 1, 'yoon@gmail.com', 'yoon', '6059e3545625b_admin.jpg', '2021-03-23 04:12:51', '2021-03-23 12:47:16'),
(3, 'Kaung Kaung', 1, 'kmt@gmail.com', 'kmt', '6061e6d396b9f_Chris-Hemsworth.jpg', '2021-03-23 05:02:35', '2021-03-29 14:40:19'),
(4, 'Grace', 1, 'gg@gmail.com', 'gg', 'clearing.png', '2021-03-23 05:11:09', '2021-03-29 18:15:45'),
(5, 'Rose', 2, 'rose@gmail.com', 'rose', '605a35fabf6ef_rose.jpg', '2021-03-23 06:44:48', '2021-03-25 03:33:09'),
(6, 'Jennie', 2, 'jennie@gmail.com', 'jennie', '605a35e25c7d2_jennie.jpg', '2021-03-23 18:39:30', '2021-03-29 18:15:53'),
(7, 'Mr. John', 2, 'john@gmail.com', 'john', '605cdc2f5a3b8_daniel.jpg', '2021-03-25 18:44:31', '2021-03-25 18:53:35'),
(9, 'Alex', 2, 'alex@gmail.com', 'alex', '6061e776ccf49_actor.jfif', '2021-03-25 18:48:40', '2021-03-29 14:43:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
