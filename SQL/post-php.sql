-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 02:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(5) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `created_at`) VALUES
(1, 'Admin', 'admin@admin.com', 'pass', '2024-06-06 09:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `org_id` int(6) NOT NULL,
  `org_name` varchar(50) NOT NULL,
  `org_address` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`org_id`, `org_name`, `org_address`, `created_at`) VALUES
(8, 'Airtel', 'Dhaka', '2024-06-05 17:25:52'),
(9, 'Banglalink', 'Dhaka', '2024-06-05 17:26:01'),
(10, 'Robi', 'Dhaka', '2024-06-05 17:26:09'),
(11, 'Grameenphone', 'Dhaka', '2024-06-05 17:26:18'),
(12, 'Teletalk', 'Dhaka', '2024-06-05 17:26:25'),
(13, 'Dnet', 'Dhaka', '2024-06-06 12:23:12'),
(14, 'Dne', 'Dhaka', '2024-06-10 13:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(6) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `post_details` varchar(255) NOT NULL,
  `post_by` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `post_status` int(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `project_name`, `post_details`, `post_by`, `created_at`, `post_status`) VALUES
(5, 'Airtel Post 1', 'Airtel Project 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 8, '2024-05-01 15:25:37', 0),
(6, 'Banglalink Post 1', 'Banglalink Project 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 9, '2024-05-15 15:28:25', 1),
(7, 'Airtel Post 2', 'Airtel Project 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 8, '2024-05-19 15:28:52', 1),
(9, 'Robi Post 1', 'Robi Project 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 10, '2024-06-01 15:11:20', 1),
(10, 'Robi Post 2', 'Robi Project 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 10, '2024-06-05 15:11:31', 1),
(11, 'Teletalk Post 1', 'Teletalk Project 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 12, '2024-06-07 15:12:01', 1),
(12, 'Teletalk Post 2', 'Teletalk Project 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 12, '2024-06-07 15:12:15', 1),
(22, 'Post with Files', 'Project #', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 8, '2024-06-09 11:52:43', 1),
(23, 'Post without Files', 'Project $', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h', 8, '2024-06-09 12:00:01', 1),
(24, 'Dummy', 'Dummy Project', 'sdfsdfasfafasdf', 9, '2024-06-09 16:28:45', 1),
(25, 'Airtel Post ', 'Airtel Project 1', '                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to', 8, '2024-06-10 13:12:07', 1),
(30, 'New Post', 'New Project With Media', 's', 8, '2024-06-10 17:24:19', 1),
(31, 'New Post', 'New Project With Media', 's', 8, '2024-06-10 17:57:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_files`
--

CREATE TABLE `post_files` (
  `post_files_id` int(6) NOT NULL,
  `post_files_names` varchar(255) NOT NULL,
  `post_id` int(6) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_files`
--

INSERT INTO `post_files` (`post_files_id`, `post_files_names`, `post_id`, `created_at`) VALUES
(9, 'Post with Files_6665432b16559_[JavaScript The Good Parts 1st Edition by Douglas Crockford - 2008].pdf', 22, '2024-06-09 11:52:43'),
(10, 'Post with Files_6665432b17007_majestic-mountain-peak-tranquil-winter-landscape-generated-by-ai.jpg', 22, '2024-06-09 11:52:43'),
(11, 'Dummy_666583dd20e70_[JavaScript The Good Parts 1st Edition by Douglas Crockford - 2008].pdf', 24, '2024-06-09 16:28:45'),
(12, 'Dummy_666583dd218b5_majestic-mountain-peak-tranquil-winter-landscape-generated-by-ai.jpg', 24, '2024-06-09 16:28:45'),
(13, 'New Post_6666e263d3f8d_majestic-mountain-peak-tranquil-winter-landscape-generated-by-ai.jpg', 30, '2024-06-10 17:24:19'),
(14, 'New Post_6666e263d49f5_[JavaScript The Good Parts 1st Edition by Douglas Crockford - 2008].pdf', 30, '2024-06-10 17:24:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_org` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_org`, `created_at`) VALUES
(14, 'User-Airtel', 'air@air.com', '$2y$10$fWl3TjaaoTy3wKvkKAF6sOfYg/vrotHU10LmI0WR64q8nwgjGA.8i', '8', '2024-06-06 12:35:17'),
(15, 'User-Banglalink', 'bl@bl.com', '$2y$10$kUJtfATPFN4KqPdte2jI8u3qz/Jf18llZp3Xk4QcYKG248C13.X5e', '9', '2024-06-06 12:35:45'),
(16, 'User-Robi', 'robi@robi.com', '$2y$10$wsZJq46jstoEArKCPv7W9eDOQX3kygsZvCHRM/yHGkBPVV/FE/7ze', '10', '2024-06-06 12:36:11'),
(17, 'User-Grameen', 'gp@gp.com', '$2y$10$fi0ExIiELrmrTF0uP4sPTOCrkSNeuZKU.4EQafNsNimZSCn5MOgwi', '11', '2024-06-06 12:36:34'),
(18, 'User-Teletalk', 'tel@tel.com', '$2y$10$nnAJgsiY5FdS85uI7Mztpen8I3rhQg.p.KKSTZJyIL4ILDPqkN5gm', '12', '2024-06-06 12:36:53'),
(19, 'Shihab', 'shihab@dnet.org', '$2y$10$R8zLHDMnPVGRry7Way/fieykxIzgvzuvOvTTCqhc8XMk/1SAiGJwO', '13', '2024-06-06 12:37:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_files`
--
ALTER TABLE `post_files`
  ADD PRIMARY KEY (`post_files_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `org_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `post_files`
--
ALTER TABLE `post_files`
  MODIFY `post_files_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
