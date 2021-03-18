-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 04:05 AM
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
-- Database: `blog`
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
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `body`, `created_date_time`) VALUES
(1, 1, 2, '          Good idea.', '2021-03-17 10:42:16'),
(2, 1, 2, '          DFSDFDSFF', '2021-03-17 11:13:45'),
(3, 3, 1, '          DFSDFDSFF', '2021-03-17 11:17:27'),
(4, 2, 2, '          DFSDFDSFF', '2021-03-17 11:19:05'),
(5, 1, 2, '          DFSDFDSFF', '2021-03-17 11:21:21'),
(6, 1, 2, '          DFSDFDSFF', '2021-03-17 11:48:34'),
(7, 3, 1, '          the best of the best', '2021-03-17 13:03:46'),
(8, 3, 1, '          the best of the best', '2021-03-17 13:06:45'),
(9, 3, 1, '          the best of the best', '2021-03-17 13:06:48'),
(11, 1, 1, '         abc', '2021-03-17 13:44:25'),
(12, 1, 1, '          def', '2021-03-17 13:49:17'),
(13, 1, 1, '         aaa', '2021-03-17 13:50:30'),
(14, 1, 1, '         bb', '2021-03-17 13:50:47'),
(15, 1, 1, '          ', '2021-03-17 13:51:56'),
(16, 2, 1, '      aa', '2021-03-17 14:18:52'),
(17, 2, 1, '      aa', '2021-03-17 14:20:15'),
(18, 2, 1, '      aa', '2021-03-17 14:31:42'),
(19, 2, 1, '      aa', '2021-03-17 14:34:00'),
(20, 3, 1, 'abc', '2021-03-17 14:49:48'),
(21, 3, 1, 'abc', '2021-03-17 14:50:11'),
(22, 3, 1, 'aabb', '2021-03-17 14:57:06'),
(23, 3, 1, 'aabb', '2021-03-17 14:57:21'),
(24, 3, 1, 'aabb', '2021-03-17 16:25:05'),
(25, 3, 1, 'aabb', '2021-03-17 16:26:04'),
(26, 3, 1, 'aabb', '2021-03-17 16:26:23'),
(27, 3, 1, 'aabb', '2021-03-17 16:27:39'),
(28, 3, 1, 'aabb', '2021-03-17 16:29:56'),
(29, 3, 1, 'aabb', '2021-03-17 16:30:21'),
(30, 3, 1, 'aabb', '2021-03-17 16:31:33'),
(31, 3, 1, 'aabb', '2021-03-17 16:33:50'),
(32, 3, 1, 'aabb', '2021-03-17 16:34:22'),
(33, 3, 1, 'aabb', '2021-03-17 16:34:38'),
(34, 3, 1, 'aabb', '2021-03-17 16:36:47'),
(35, 3, 1, 'aabb', '2021-03-17 16:37:30'),
(36, 3, 1, 'aabb', '2021-03-17 16:38:01'),
(37, 3, 1, 'aabb', '2021-03-17 16:38:56'),
(38, 3, 1, 'aabb', '2021-03-17 16:40:15'),
(39, 3, 1, 'aabb', '2021-03-17 16:40:54'),
(40, 3, 1, 'aabb', '2021-03-17 16:41:16'),
(41, 3, 1, 'aabb', '2021-03-17 16:41:35'),
(42, 3, 1, 'aabb', '2021-03-17 16:44:23'),
(43, 3, 1, 'aabb', '2021-03-17 16:44:42'),
(44, 3, 1, 'aabb', '2021-03-17 16:45:13'),
(45, 3, 1, 'aabb', '2021-03-17 16:46:00'),
(46, 3, 1, 'aabb', '2021-03-17 16:46:00'),
(47, 3, 1, 'aabb', '2021-03-17 16:46:01'),
(48, 3, 1, 'aabb', '2021-03-17 16:46:35'),
(49, 3, 1, 'aabb', '2021-03-17 16:46:50'),
(50, 3, 1, 'aabb', '2021-03-17 16:46:52'),
(51, 3, 1, 'aabb', '2021-03-17 16:46:52'),
(52, 1, 6, '', '2021-03-17 17:20:29'),
(53, 1, 6, '', '2021-03-17 17:26:26'),
(54, 1, 1, '', '2021-03-17 17:50:23'),
(55, 1, 1, '', '2021-03-17 17:54:49'),
(56, 8, 1, 'nice idea', '2021-03-18 02:50:43'),
(57, 8, 1, 'nice idea', '2021-03-18 02:51:27'),
(58, 8, 1, 'nice idea', '2021-03-18 02:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_date_time`, `user_id`) VALUES
(1, 'This is the first Blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis nisi. Sed ac orci quis tortor imp', '2021-03-17 05:25:32', 1),
(2, 'This is second blog.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis dolor, in sagittis nisi. Sed ac orci quis tortor imp', '2021-03-17 05:28:49', 2),
(3, '3b', 'sdfdsfdsfsdfdfdfdssdfdsfdsfsdfdfdfdssdfdsfdsfsdfdfdfdssdfdsfdsfsdfdfdfdssdfdsfdsfsdfdfdfdssdfdsfdsfsdfdfdfdssdfdsfdsfsdfdfdfdssdfdsfdsfsdfdfdfds', '2021-03-17 07:46:33', 2),
(4, 'B-4', 'this is blog. this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is', '2021-03-17 17:35:39', 6),
(5, 'B-5', 'this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.this is blog.    this is blog.this is blog.this is blog.this is blog.this is blog.this', '2021-03-17 17:36:26', 6),
(6, 'B-6', 'sfsdfsdfsdfdsfdsfsdfsdf', '2021-03-17 17:36:56', 6),
(7, 'B-7', 'abcdsfojsdfjosjdfpjsdfpjspdfjpsjdfpjsfpjspofojposjfposdfpjspfjpof\r\nabcdsfojsdfjosjdfpjsdfpjspdfjpsjdfpjsfpjspofojposjfposdfpjspfjpofabcdsfojsdfjosjdfpjsdfpjspdfjpsjdfpjsfpjspofojposjfposdfpjspfjpof\r\nabcdsfojsdfjosjdfpjsdfpjspdfjpsjdfpjsfpjspofojposjfposdf', '2021-03-17 17:39:25', 6),
(8, 'Blog-8', 'This is blog 8 and have fun. Thanks. This is blog 8 and have fun. Thanks.This is blog 8 and have fun. Thanks. This is blog 8 and have fun. Thanks. This is blog 8 and have fun. Thanks. This is blog 8 and have fun. Thanks.', '2021-03-18 02:50:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_date_time`, `updated_date_time`) VALUES
(1, 'yoon', 'yoon@gmail.com', 'yoon', '2021-03-15 10:03:08', '2021-03-15 10:03:08'),
(2, 'kmt1', 'kmt@gmail.com', 'kmt', '2021-03-15 10:03:16', '2021-03-15 10:03:16'),
(6, 'gg1', 'gg@gmail.com', 'gg', '2021-03-16 09:44:20', '2021-03-16 09:44:20'),
(9, 'yy1', 'yy@gmail.com', 'yy', '2021-03-16 09:50:55', '2021-03-16 09:50:55'),
(11, 'jennie', 'jennie@gmail.com', 'jennie', '2021-03-17 17:55:33', '2021-03-17 17:55:33');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
