-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 12:10 PM
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
(20, 'new_6667d4ec6c0ae_Saifur Rahman Shihab -gonitro.docx', 34, '2024-06-11 10:39:08'),
(21, 'new_6667d4ec6ff66_Resume-of-Saifur-Rahman-Shihab.pdf', 34, '2024-06-11 10:39:08'),
(28, 'Update_6667d8551bff7_Saifur Rahman Shihab - Frontend Developer - CV.pdf', 37, '2024-06-11 10:53:41'),
(29, 'Update_6667df321dea7_Saifur Rahman Shihab -sym.docx', 37, '2024-06-11 11:22:58'),
(30, 'Update_6667df3ef0af2_Resume-of-Saifur-Rahman-Shihab.pdf', 37, '2024-06-11 11:23:10'),
(31, 'Update_6667dfdd0cd12_Saifur Rahman Shihab - Frontend Developer - CV.pdf', 37, '2024-06-11 11:25:49'),
(33, 'Newest Post_6667e14354b83_Saifur Rahman Shihab -gonitro.docx', 38, '2024-06-11 11:31:47'),
(34, 'Newest Post_6667e1578834f_Resume-of-Saifur-Rahman-Shihab.pdf', 38, '2024-06-11 11:32:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post_files`
--
ALTER TABLE `post_files`
  ADD PRIMARY KEY (`post_files_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post_files`
--
ALTER TABLE `post_files`
  MODIFY `post_files_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
