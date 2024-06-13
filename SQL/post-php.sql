-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 11:59 AM
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
(16, 'Airtel', 'Dhaka', '2024-06-12 15:51:09'),
(17, 'Banglalink', 'Dhaka', '2024-06-12 15:51:17'),
(18, 'Dnet', '4/8 Humayun Road, Block-B, Mohammadpur, Dhaka 1207', '2024-06-12 15:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(6) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `post_details` varchar(5000) NOT NULL,
  `post_by` int(5) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `post_status` int(6) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `project_name`, `post_details`, `post_by`, `created_at`, `post_status`) VALUES
(68, 'Post 1', 'Dummy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\n\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the re', 16, '2024-06-12 15:57:12', 1),
(69, 'Post 2', 'Test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 16, '2024-06-12 15:59:50', 1),
(70, 'Hidden File', 'Hidden', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 16, '2024-06-12 17:59:48', 1),
(71, 'Hidden FIles 2', 'Project 1', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 16, '2024-06-12 18:08:39', 1),
(72, 'Hide FIle 3', 'dfdf', 'dfdfds', 16, '2024-06-13 10:58:42', 1),
(73, 'Project 1', 'Project 1', 'Project 1Project 1Project 1Project 1Project 1', 16, '2024-06-13 11:01:40', 1),
(74, 'Project 2', 'Project 2', 'Project 1Project 1Project 1Project 1Project 1Project 1Project 1Project 1Project 1Project 1Project 1Project 1Project 1', 16, '2024-06-13 11:01:57', 1),
(75, 'Project 1', 'Project 1Project 1Project 1', 'Project 1Project 1Project 1Project 1', 17, '2024-06-13 11:02:39', 1),
(76, 'Project 2', 'Project 2', 'Project 1Project 1Project 1Project 1Project 1Project 1Project 1Project 1Project 1Project 1', 17, '2024-06-13 11:03:16', 1),
(77, 'Project 3', 'Project 3', 'Project 1Project 1Project 1Project 1Project 1Project 1Project 1Project 1Project 1', 17, '2024-06-13 11:05:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_files`
--

CREATE TABLE `post_files` (
  `post_files_id` int(6) NOT NULL,
  `post_files_names` varchar(255) NOT NULL,
  `post_id` int(6) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_files`
--

INSERT INTO `post_files` (`post_files_id`, `post_files_names`, `post_id`, `privacy`, `created_at`) VALUES
(68, 'Post 1_666970f802877_Screenshot 2024-04-22 093248.png', 68, 0, '2024-06-12 15:57:12'),
(69, 'Post 1_666970f804193_Resume-of-Saifur-Rahman-Shihab.pdf', 68, 0, '2024-06-12 15:57:12'),
(70, 'Hidden File_66698db409d23_Resume-of-Saifur-Rahman-Shihab.pdf', 70, 0, '2024-06-12 17:59:48'),
(71, 'Hidden File_66698db40bb56_Screenshot 2024-05-02 093055.png', 70, 1, '2024-06-12 17:59:48'),
(72, 'Hidden FIles 2_66698fc7b18f6_Resume-of-Saifur-Rahman-Shihab.pdf', 71, 0, '2024-06-12 18:08:39'),
(73, 'Hidden FIles 2_66698fc7b3202_Screenshot 2024-05-02 093055.png', 71, 0, '2024-06-12 18:08:39'),
(74, 'Hidden FIles 2_66698fc7b75c6_CV of Saifur Rahman Shihab.doc', 71, 1, '2024-06-12 18:08:39'),
(75, 'Hidden FIles 2_66698fc7b91a2_Screenshot 2024-04-22 093248.png', 71, 1, '2024-06-12 18:08:39'),
(76, 'Hide FIle 3_666a7c8268b62_Screenshot 2024-05-02 093055.png', 72, 0, '2024-06-13 10:58:42'),
(77, 'Hide FIle 3_666a7c82697b0_CV of Saifur Rahman Shihab.doc', 72, 1, '2024-06-13 10:58:42'),
(78, 'Hide FIle 3_666a7c826a196_Resume-of-Saifur-Rahman-Shihab.pdf', 72, 1, '2024-06-13 10:58:42'),
(79, 'Hide FIle 3_666a7c826aa2b_Screenshot 2024-04-22 093248.png', 72, 1, '2024-06-13 10:58:42'),
(80, 'Project 1_666a7d346aef5_CV of Saifur Rahman Shihab.doc', 73, 0, '2024-06-13 11:01:40'),
(81, 'Project 2_666a7d4543010_Screenshot 2024-05-02 093055.png', 74, 0, '2024-06-13 11:01:57'),
(82, 'Project 3_666a7e0124244_Screenshot 2024-04-22 093248.png', 77, 0, '2024-06-13 11:05:05'),
(83, 'Project 3_666a7e0125092_CV of Saifur Rahman Shihab.doc', 77, 0, '2024-06-13 11:05:05');

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
  `user_active` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_org`, `user_active`, `created_at`) VALUES
(35, 'Airtel', 'air@air.com', 'RpkdzCxrH1fpfq3hWRi9vw==', '16', 1, '2024-06-12 15:53:06'),
(36, 'Shihab', 'shihab@dnet.org', 'SuqRIUVjgCkoyFkxxd+Xmw==', '18', 1, '2024-06-12 15:53:20'),
(37, 'Banglalink', 'bl@bl.com', '2hsCBpzSySnAYtvjPLqk0A==', '17', 1, '2024-06-12 15:53:34');

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
  MODIFY `org_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `post_files`
--
ALTER TABLE `post_files`
  MODIFY `post_files_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
