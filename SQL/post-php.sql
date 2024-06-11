-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 01:57 PM
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
(13, 'Dnet', 'Dhaka', '2024-06-06 12:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(6) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `post_details` varchar(1000) NOT NULL,
  `post_by` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `post_status` int(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `project_name`, `post_details`, `post_by`, `created_at`, `post_status`) VALUES
(44, 'New Post', 'Project 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, obcaecati voluptates vero, qui nesciunt aspernatur fuga animi accusantium maiores explicabo aut omnis reprehenderit minima saepe ducimus expedita itaque quibusdam sint!\nLorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, obcaecati voluptates vero, qui nesciunt aspernatur fuga animi accusantium maiores explicabo aut omnis reprehenderit minima saepe ducimus expedita itaque quibusdam sint!. Lorem ipsum dolor\n\nLorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, obcaecati voluptates vero, qui nesciunt aspernatur fuga animi accusantium maiores explicabo aut omnis reprehenderit minima saepe ducimus expedita itaque quibusdam sint!. Lorem ipsum dolor', 8, '2024-06-11 16:48:12', 0),
(46, 'Dnet Post 2', 'test project', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, obcaecati voluptates vero, qui nesciunt aspernatur fuga animi accusantium maiores explicabo aut omnis reprehenderit minima saepe ducimus expedita itaque quibusdam sint!\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, obcaecati voluptates vero, qui nesciunt aspernatur fuga animi accusantium maiores explicabo aut omnis reprehenderit minima saepe ducimus expedita itaque quibusdam sint!. Lorem ipsum dolor\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, obcaecati voluptates vero, qui nesciunt aspernatur fuga animi accusantium maiores explicabo aut omnis reprehenderit minima saepe ducimus expedita itaque quibusdam sint!. Lorem ipsum dolor', 13, '2024-06-11 16:56:10', 0);

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
(38, 'Post Title 1_66682a07e4303_CV of Saifur Rahman Shihab.doc', 42, '2024-06-11 16:42:15'),
(39, 'Post Title 1_66682a07e80cd_Resume-of-Saifur-Rahman-Shihab.pdf', 42, '2024-06-11 16:42:15'),
(40, 'Post Title 1_66682a07e9a42_Screenshot 2024-04-22 093248.png', 42, '2024-06-11 16:42:15'),
(41, 'Post Title 1_66682a07ec2b6_Screenshot 2024-05-02 093055.png', 42, '2024-06-11 16:42:15'),
(42, 'New Post_66682b6c2030f_Screenshot 2024-04-22 093248.png', 44, '2024-06-11 16:48:12'),
(43, 'New Post_66682b6c23009_CV of Saifur Rahman Shihab.doc', 44, '2024-06-11 16:48:12'),
(44, 'Dnet Post_66682c14338c1_Resume-of-Saifur-Rahman-Shihab.pdf', 45, '2024-06-11 16:51:00');

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
(26, 'Shihab', 'shihab@dnet.org', 'SuqRIUVjgCkoyFkxxd+Xmw==', '13', '2024-06-11 16:32:06'),
(27, 'User-Airtel', 'air@air.com', 'RpkdzCxrH1fpfq3hWRi9vw==', '8', '2024-06-11 16:38:26');

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
  MODIFY `org_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `post_files`
--
ALTER TABLE `post_files`
  MODIFY `post_files_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
