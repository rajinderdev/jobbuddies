-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 05:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job-buddies-new1`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kid_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `date` date NOT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=>Absent,1=>Present,2=>Half Day,3=>Late',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `kid_id`, `user_id`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '2023-06-06', NULL, '2023-06-06 01:43:52', '2023-06-06 01:43:52'),
(2, 1, 3, '2023-06-06', NULL, '2023-06-06 01:43:52', '2023-06-06 01:43:52'),
(3, 3, 3, '2023-06-06', 0, '2023-06-06 01:43:52', '2023-06-06 01:43:52'),
(4, 4, 3, '2023-06-06', 1, '2023-06-06 01:43:52', '2023-06-06 01:43:52'),
(21, 2, 3, '2023-06-05', 0, '2023-06-06 01:49:28', '2023-06-06 01:49:28'),
(22, 1, 3, '2023-06-05', 0, '2023-06-06 01:49:28', '2023-06-06 01:49:28'),
(23, 3, 3, '2023-06-05', 1, '2023-06-06 01:49:28', '2023-06-06 01:49:28'),
(24, 4, 3, '2023-06-05', 1, '2023-06-06 01:49:28', '2023-06-06 01:49:28'),
(25, 2, 3, '2023-06-04', 1, '2023-06-06 01:50:27', '2023-06-06 01:50:27'),
(26, 1, 3, '2023-06-04', 0, '2023-06-06 01:50:27', '2023-06-06 01:50:27'),
(27, 3, 3, '2023-06-04', 1, '2023-06-06 01:50:27', '2023-06-06 01:50:27'),
(28, 4, 3, '2023-06-04', 1, '2023-06-06 01:50:27', '2023-06-06 01:50:27'),
(29, 2, 3, '2023-06-01', 1, '2023-06-06 05:51:41', '2023-06-06 05:51:41'),
(30, 1, 3, '2023-06-01', 1, '2023-06-06 05:51:41', '2023-06-06 05:51:41'),
(31, 3, 3, '2023-06-01', 1, '2023-06-06 05:51:41', '2023-06-06 05:51:41'),
(32, 4, 3, '2023-06-01', 1, '2023-06-06 05:51:41', '2023-06-06 05:51:41'),
(33, 2, 3, '2023-06-02', 1, '2023-06-06 05:52:00', '2023-06-06 05:52:00'),
(34, 1, 3, '2023-06-02', 1, '2023-06-06 05:52:00', '2023-06-06 05:52:00'),
(35, 3, 3, '2023-06-02', 1, '2023-06-06 05:52:00', '2023-06-06 05:52:00'),
(36, 4, 3, '2023-06-02', 1, '2023-06-06 05:52:00', '2023-06-06 05:52:00'),
(37, 2, 3, '2023-06-03', 1, '2023-06-06 05:52:32', '2023-06-06 05:52:32'),
(38, 1, 3, '2023-06-03', 1, '2023-06-06 05:52:32', '2023-06-06 05:52:32'),
(39, 3, 3, '2023-06-03', 1, '2023-06-06 05:52:32', '2023-06-06 05:52:32'),
(40, 4, 3, '2023-06-03', 1, '2023-06-06 05:52:32', '2023-06-06 05:52:32'),
(41, 6, 3, '2023-06-09', 1, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(42, 9, 3, '2023-06-09', NULL, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(43, 8, 3, '2023-06-09', 0, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(44, 5, 3, '2023-06-09', 1, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(45, 15, 3, '2023-06-09', NULL, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(46, 12, 3, '2023-06-09', NULL, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(47, 7, 3, '2023-06-09', NULL, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(48, 2, 3, '2023-06-09', NULL, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(49, 1, 3, '2023-06-09', NULL, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(50, 10, 3, '2023-06-09', NULL, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(51, 11, 3, '2023-06-09', NULL, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(52, 14, 3, '2023-06-09', NULL, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(53, 3, 3, '2023-06-09', NULL, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(54, 4, 3, '2023-06-09', NULL, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(55, 13, 3, '2023-06-09', NULL, '2023-06-09 01:34:24', '2023-06-09 01:34:24'),
(56, 6, 32, '2023-06-12', 1, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(57, 9, 32, '2023-06-12', 1, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(58, 8, 32, '2023-06-12', 1, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(59, 5, 32, '2023-06-12', 1, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(60, 15, 32, '2023-06-12', 0, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(61, 12, 32, '2023-06-12', 1, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(62, 7, 32, '2023-06-12', 1, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(63, 2, 32, '2023-06-12', 1, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(64, 1, 32, '2023-06-12', 0, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(65, 10, 32, '2023-06-12', 1, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(66, 11, 32, '2023-06-12', 1, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(67, 14, 32, '2023-06-12', NULL, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(68, 3, 32, '2023-06-12', NULL, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(69, 4, 32, '2023-06-12', NULL, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(70, 13, 32, '2023-06-12', NULL, '2023-06-12 07:15:42', '2023-06-12 23:54:05'),
(71, 6, 32, '2023-06-13', 1, '2023-06-12 23:22:21', '2023-06-12 23:22:21'),
(72, 9, 32, '2023-06-13', NULL, '2023-06-12 23:22:21', '2023-06-12 23:22:21'),
(73, 8, 32, '2023-06-13', 0, '2023-06-12 23:22:21', '2023-06-12 23:22:21'),
(74, 5, 32, '2023-06-13', 1, '2023-06-12 23:22:21', '2023-06-12 23:22:21'),
(75, 15, 32, '2023-06-13', NULL, '2023-06-12 23:22:21', '2023-06-12 23:22:21'),
(76, 12, 32, '2023-06-13', 0, '2023-06-12 23:22:21', '2023-06-12 23:22:21'),
(77, 7, 32, '2023-06-13', 0, '2023-06-12 23:22:21', '2023-06-12 23:22:21'),
(78, 2, 32, '2023-06-13', NULL, '2023-06-12 23:22:21', '2023-06-12 23:22:21'),
(79, 1, 32, '2023-06-13', NULL, '2023-06-12 23:22:21', '2023-06-12 23:22:21'),
(80, 10, 32, '2023-06-13', NULL, '2023-06-12 23:22:21', '2023-06-12 23:22:21'),
(81, 11, 32, '2023-06-13', NULL, '2023-06-12 23:22:21', '2023-06-12 23:22:21'),
(82, 14, 32, '2023-06-13', NULL, '2023-06-12 23:22:21', '2023-06-12 23:22:21'),
(83, 3, 32, '2023-06-13', NULL, '2023-06-12 23:22:21', '2023-06-12 23:22:21'),
(84, 4, 32, '2023-06-13', NULL, '2023-06-12 23:22:21', '2023-06-12 23:22:21'),
(85, 13, 32, '2023-06-13', NULL, '2023-06-12 23:22:21', '2023-06-12 23:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `camp_registrations`
--

CREATE TABLE `camp_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kid_id` bigint(20) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_dob` date DEFAULT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `sessions` int(11) DEFAULT NULL,
  `tshirt` int(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `parent_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `best_way_to_contact` varchar(255) DEFAULT NULL,
  `emergency_contact_name1` varchar(255) DEFAULT NULL,
  `emergency_relationship1` varchar(255) DEFAULT NULL,
  `emergency_phone1` varchar(255) DEFAULT NULL,
  `emergency_contact_name2` varchar(255) DEFAULT NULL,
  `emergency_relationship2` varchar(255) DEFAULT NULL,
  `emergency_phone2` varchar(255) DEFAULT NULL,
  `safety_info` text DEFAULT NULL,
  `medical_conditions` text DEFAULT NULL,
  `regular_medications` text DEFAULT NULL,
  `behavioral_or_emotional` text DEFAULT NULL,
  `sensory_aversions` text DEFAULT NULL,
  `child_reinforcers` text DEFAULT NULL,
  `special_diet` text DEFAULT NULL,
  `goals_description` text DEFAULT NULL,
  `about_super_student` text DEFAULT NULL,
  `sunscreen` text DEFAULT NULL,
  `photograph_release` int(11) DEFAULT NULL COMMENT '0=>No,1=>Yes',
  `important_name` varchar(255) DEFAULT NULL,
  `important_date` date DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1=>Summer',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Deactivate',
  `payment_status` varchar(255) NOT NULL DEFAULT 'Un-Paid',
  `amount` double(10,2) DEFAULT NULL,
  `stripe_charge_id` varchar(255) DEFAULT NULL,
  `all_detail` text DEFAULT NULL,
  `goal_1` varchar(255) DEFAULT NULL,
  `goal_2` varchar(255) DEFAULT NULL,
  `goal_3` varchar(255) DEFAULT NULL,
  `goal_4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `tell_us_about_experience` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `email`, `phone`, `position`, `job_id`, `tell_us_about_experience`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'test@gmail.com', 12584963, 'sdsdsd', 3, 'dssdss', 1, '2023-09-05 12:50:23', '2023-09-05 12:50:26', NULL),
(2, 'rrr', 'rrr@hh.com', 4552222222222, '44444dfd', 3, 'fdfdfd', 1, '2023-09-08 00:38:08', '2023-09-08 00:38:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `candidates_new`
--

CREATE TABLE `candidates_new` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `admission_number` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `place_of_birth` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1=> Active, 0=> Inactive',
  `disease` int(11) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `guardian_relationship` varchar(255) DEFAULT NULL,
  `guardian_phone_number` varchar(150) DEFAULT NULL,
  `guardian_address` varchar(255) DEFAULT NULL,
  `guardian_email` varchar(255) DEFAULT NULL,
  `em_parent_name` varchar(255) DEFAULT NULL,
  `em_relationship` varchar(255) DEFAULT NULL,
  `em_phone_number` varchar(150) DEFAULT NULL,
  `em_email` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `image` varchar(150) NOT NULL,
  `assigned_teacher` int(11) DEFAULT NULL,
  `form_status` varchar(255) NOT NULL DEFAULT '0' COMMENT '1=> Completed, 0=> Partially Filled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `education_mode` varchar(255) DEFAULT NULL,
  `allergies` varchar(255) DEFAULT NULL,
  `food_cond` varchar(255) DEFAULT NULL,
  `food_cond_desc` varchar(255) DEFAULT NULL,
  `medication` varchar(255) DEFAULT NULL,
  `ditary_rest` varchar(255) DEFAULT NULL,
  `kid_dis` varchar(255) DEFAULT NULL,
  `kid_dis_desc` varchar(255) DEFAULT NULL,
  `disability` varchar(255) DEFAULT NULL,
  `disability_desc` varchar(255) DEFAULT NULL,
  `behaviour` varchar(255) DEFAULT NULL,
  `behaviour_desc` varchar(255) DEFAULT NULL,
  `accomodation` varchar(255) DEFAULT NULL,
  `accomodation_desc` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `added_by` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates_new`
--

INSERT INTO `candidates_new` (`id`, `user_id`, `name`, `admission_number`, `dob`, `gender`, `place_of_birth`, `address`, `street`, `city`, `country`, `state`, `postcode`, `status`, `disease`, `joining_date`, `guardian_name`, `guardian_relationship`, `guardian_phone_number`, `guardian_address`, `guardian_email`, `em_parent_name`, `em_relationship`, `em_phone_number`, `em_email`, `age`, `image`, `assigned_teacher`, `form_status`, `created_at`, `updated_at`, `grade`, `education_mode`, `allergies`, `food_cond`, `food_cond_desc`, `medication`, `ditary_rest`, `kid_dis`, `kid_dis_desc`, `disability`, `disability_desc`, `behaviour`, `behaviour_desc`, `accomodation`, `accomodation_desc`, `summary`, `deleted_at`, `added_by`) VALUES
(1, '20', 'Mark', '#ss123456', '2023-05-26', 'Male', 'pb', 'ad', 'st', 'ci', 'co', 'st', '123445', 1, 1, '2023-05-26', 'p1', 'Father', '1231321213', 'a1', 'p1@yopmail.com', 'p2', 'Mother', '2454564564', 'p2@yopmail.com', NULL, 'pt-1.png', 5, '0', '2023-05-26 02:10:52', '2023-06-08 06:03:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', NULL, NULL),
(2, '21', 'John Doe', '#ss123452', '2023-05-26', 'Male', 'test', '#123/2', 'Abc Street', 'Brampton', 'Canada', 'Toronto', '136118', 1, 4, '2023-05-26', 'p1', 'Mother', '1231321321', 'r1', 'e1@yopmail.com', 'p2', 'Father', '2454564564', 'p2@yopmail.com', NULL, 'pt-1.png', 3, '0', '2023-05-26 05:25:17', '2023-06-08 05:05:35', 'A', 'G', 'No', 'Good', NULL, 'Yes', 'No', 'No', NULL, NULL, NULL, 'Yes', NULL, 'Yes', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL),
(3, '22', 'Test Business', '#123', '2023-05-29', 'Female', 'PB', 'test street', 'xf', 'kkr', 'Germany', 'Baden-Württemberg', '136118', 1, 2, '2023-05-29', 'xfg', 'Mother', '8945612312', 'xg', 'fgh@dsg.fgh', 'P2', 'Brother', '2454564564', 'testteam11@yopmail.com', NULL, 'pt-1.png', 3, '0', '2023-05-29 07:29:23', '2023-05-29 07:29:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '23', 'Test team', '#ss123452', '2023-05-30', 'Male', 'Test', 'test street', 'dsg', 'kkr', 'Germany', 'Baden-Württemberg', '136118', 1, 4, '2023-05-29', 'p1', 'Mother', '1234658790', 'szf', 'sf@dfgf.cgfj', 'fgh', 'Brother', '6547575686', 'testteam11@yopmail.com', NULL, '', 3, '0', '2023-05-29 07:32:09', '2023-05-29 08:50:15', '', 'Part Time', 'al', 'No', '', 'rm', 'dr', 'No', '', '', '', 'No', '', 'No', '', NULL, NULL, NULL),
(5, '24', 'abcfre', '321554', '2023-05-29', 'Other', 'hrtr', 'trtr', 'Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, 1, '2023-06-06', 'rgtrt', 'Father', '8506802351', 'CM-30', 'marketing@creativebuffer.com', 'trrtr', 'Mother', '8506802351', 'marketing@creativebuffer.com', NULL, '', 3, '0', '2023-06-06 07:08:05', '2023-06-06 07:08:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '24', 'abc', '321554', '2023-05-29', 'Other', 'hrtr', 'trtr', 'Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, 1, '2023-06-06', 'rgtrt', 'Father', '8506802351', 'CM-30', 'marketing@creativebuffer.com', 'trrtr', 'Mother', '8506802351', 'marketing@creativebuffer.com', NULL, '', 3, '0', '2023-06-06 07:08:05', '2023-06-06 07:08:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '24', 'dfref', '321554', '2023-05-29', 'Other', 'hrtr', 'trtr', 'Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, 1, '2023-06-06', 'rgtrt', 'Father', '8506802351', 'CM-30', 'marketing@creativebuffer.com', 'trrtr', 'Mother', '8506802351', 'marketing@creativebuffer.com', NULL, '', 3, '0', '2023-06-06 07:08:05', '2023-06-06 07:08:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '24', 'abcefefe', '321554', '2023-05-29', 'Other', 'hrtr', 'trtr', 'Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, 1, '2023-06-06', 'rgtrt', 'Father', '8506802351', 'CM-30', 'marketing@creativebuffer.com', 'trrtr', 'Mother', '8506802351', 'marketing@creativebuffer.com', NULL, '', 3, '0', '2023-06-06 07:08:05', '2023-06-06 07:08:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '25', 'abc', '321554', '2023-07-05', 'Male', 'hrtr', 'CM-30', 'Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, 2, '2023-07-05', 'test1', 'Father', '(850) 680-2351', 'ddad', 'marketing@creativebuffer.com', 'trrtr', 'Mother', '(850) 680-2351', 'marketing@creativebuffer.com', NULL, 'dummy-postcard (1).jpg', 3, '0', '2023-06-07 06:48:16', '2023-07-05 00:56:49', '', 'Full Time', '', 'No', '', '', '', '', '', 'No', '', 'No', '', 'No', '', NULL, NULL, NULL),
(10, '26', 'sarab', '321554', '2023-05-28', 'Female', 'hrtr', 'CM-30', 'Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, 3, '2023-06-07', 'test1', 'Father', '8506802351', 'CM-30', 'marketing@creativebuffer.com', 'trrtr', 'Mother', '8506802351', 'marketing@creativebuffer.com', NULL, 'book.jpg', 3, '0', '2023-06-07 06:51:19', '2023-06-07 06:51:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '27', 'sarab', '321554', '2023-05-28', 'Female', 'hrtr', 'CM-30', 'Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, 3, '2023-06-07', 'test1', 'Father', '8506802351', 'CM-30', 'marketing@creativebuffer.com', 'trrtr', 'Mother', '8506802351', 'marketing@creativebuffer.com', NULL, 'book.jpg', 3, '0', '2023-06-07 06:52:40', '2023-06-07 06:52:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '28', 'collabo', '321554', '2023-05-29', 'Male', 'hrtr', 'CM-30', 'Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, 1, '2023-06-07', 'test1', 'Mother', '8506802351', 'CM-30', 'marketing@creativebuffer.com', 'trrtr', 'Father', '8506802351', 'marketing@creativebuffer.com', NULL, 'research.png', 3, '0', '2023-06-07 06:53:22', '2023-06-07 06:53:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '29', 'test4567', '321554', '2023-06-05', 'Male', 'hrtr', 'CM-30', 'Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, 1, '2023-06-30', 'test1', 'Father', '8506802351', 'CM-30', 'marketing@creativebuffer.com', 'trrtr', 'Mother', '8506802351', 'marketing@creativebuffer.com', NULL, 'dummy-postcard (1).jpg', 3, '1', '2023-06-07 08:22:06', '2023-06-30 07:43:28', 'fgdf', 'Full Time', 'ddfdf', 'Yes', 'fdgrwrew', 'rferfed', 'rfrferfsefg', '', '', 'Yes', 'hijhikj', 'Yes', 'freferf', 'Yes', 'ferfgregt', NULL, NULL, NULL),
(14, '30', 'sarab', 'ffsf', '2023-06-06', 'Male', 'hrtr', 'CM-30', 'Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, 2, '2023-06-09', 'test1', 'Mother', '8506802351', 'CM-30', 'marketing@creativebuffer.com', 'trrtr', 'Father', '8506802351', 'marketing@creativebuffer.com', NULL, 'user_upload_1677134350.png', 3, '0', '2023-06-08 00:57:44', '2023-06-09 01:26:54', '', 'Full Time', '', 'No', '', '', '', '', '', 'No', '', 'No', '', 'No', '', NULL, NULL, NULL),
(15, '33', 'admin', 'efef', '2023-06-05', 'Male', 'hrtr', 'CM-30', 'Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, 1, '2023-09-22', 'rgtrt', 'Father', '(850) 680-2351', 'CM-30', 'marketing@creativebuffer.com', 'trrtr', 'Mother', '(850) 680-2351', 'marketing@creativebuffer.com', NULL, 'logo.png', 2, '0', '2023-06-09 01:27:29', '2023-09-22 07:58:47', '', 'Full Time', '', 'No', '', '', '', '', '', 'No', '', 'No', '', 'No', '', 'vfdvgfdvgvg', NULL, NULL),
(16, '91', 'abc', '321554', '2023-07-11', 'Male', 'hrtr', 'CM-30', 'Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, 1, '2023-09-22', 'test1', 'Sister', '(850) 680-2351', 'CM-30', 'marketing@creativebuffer.com', 'trrtr', 'Father', '(850) 680-2351', 'marketing@creativebuffer.com', NULL, 'child.jpg', 2, '0', '2023-07-04 04:35:03', '2023-09-22 07:59:07', '', 'Full Time', '', 'No', '', '', '', '', '', 'No', '', 'No', '', 'No', '', NULL, NULL, NULL),
(17, '92', '', '321554', '2023-06-25', 'Male', 'hrtr', 'CM-30', 'Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, 2, '2023-09-22', 'test1', 'Mother', '(085) 068-0235', 'CM-30', 'marketing@creativebuffer.com', 'dddwqq', '', '(085) 068-0235', 'marketing@creativebuffer.com', NULL, 'login-profile.png', 1, '0', '2023-07-04 06:25:53', '2023-09-22 07:51:16', '', 'Full Time', '', 'No', '', '', '', '', '', 'No', '', 'No', '', 'No', '', NULL, NULL, NULL),
(18, '100', 'teacher', '321554', '2023-09-13', 'Female', 'hrtr', 'CM-30Khanjarpur Near Parthala Road near Easyday Sector 122', 'dd', 'Noida', 'India', 'Uttar Prades', '201301', 1, 2, '2023-09-22', 'rgtrt', 'Father', '(085) 068-0235', 'New Jersey Turnpike', 'marketing@creativebuffer.com', 'teacher', 'Mother', '(085) 068-0235', 'teacher1234@creativebuffer.com', NULL, 'Orangeherm logo.png', 2, '0', '2023-09-22 06:51:54', '2023-09-22 06:51:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '101', 'teacher', '321554', '2023-08-29', 'Female', 'hrtr', 'CM-30Khanjarpur Near Parthala Road near Easyday Sector 122', 'dd', 'Noida', 'India', 'Uttar Prades', '201301', 1, 1, '2023-09-22', 'test', 'Mother', '(085) 068-0235', 'CM-30', 'marketing@creativebuffer.com', 'teacher', 'Father', '(085) 068-0235', 'teacher1234@creativebuffer.com', NULL, 'pines.png', 2, '0', '2023-09-22 06:59:06', '2023-09-22 06:59:06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '102', 'teacher', '321554', '2023-09-13', 'Male', 'hrtr', 'CM-30Khanjarpur Near Parthala Road near Easyday Sector 122', 'Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, 1, '2023-09-22', 'jhh', 'Mother', '(085) 068-0235', 'CM-30Khanjarpur Near Parthala Road near Easyday Sector 122', 'teacher1234@creativebuffer.com', 'teacher', 'Father', '(085) 068-0235', 'teacher1234@creativebuffer.com', NULL, 'Orangeherm logo.png', 1, '0', '2023-09-22 07:04:13', '2023-09-22 07:04:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `amount` double(9,2) DEFAULT NULL,
  `donate_type` varchar(255) DEFAULT NULL,
  `dedicatees_name` varchar(255) DEFAULT NULL,
  `recipient_email` varchar(255) DEFAULT NULL,
  `donation_status` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dedicatees_email` varchar(255) DEFAULT NULL,
  `receipt_url` text DEFAULT NULL,
  `stripe_charge_id` text DEFAULT NULL,
  `transection_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `user_id`, `amount`, `donate_type`, `dedicatees_name`, `recipient_email`, `donation_status`, `payment_type`, `status`, `created_at`, `updated_at`, `dedicatees_email`, `receipt_url`, `stripe_charge_id`, `transection_id`) VALUES
(1, 1, 100.00, 'In Honor of', 'Test', 'sarabrr@gmail.com', 'Public', 'One Time', 1, '2023-07-07 08:21:50', '2023-07-07 08:22:07', 'sarabrr@gmail.com', NULL, NULL, NULL),
(3, NULL, 100.00, 'In Memory Of', 'ddce', 'testdonationrec@creativebuffer.com', 'Public', 'One Time', 1, '2023-07-10 06:20:59', '2023-07-10 06:20:59', 'testdonation@creativebuffer.com', NULL, NULL, NULL),
(4, NULL, 250.00, 'In Honor Of', 'sarab', 'sss@gmail.com', 'Public', 'One Time', 1, '2023-07-12 00:46:30', '2023-07-12 00:46:30', 'ss@gmail.com', NULL, NULL, NULL),
(5, NULL, 250.00, 'In Honor Of', 'ddce', 'dwewe@creativebuffer.com', 'Public', 'One Time', 1, '2023-07-12 01:06:25', '2023-07-12 01:06:25', 'ew@creativebuffer.com', NULL, NULL, NULL),
(6, NULL, 250.00, 'In Honor Of', 'ddce', 'wedw@creativebuffer.com', 'Public', 'One Time', 1, '2023-07-12 01:07:28', '2023-07-12 01:07:28', 'marketing@creativebuffer.com', NULL, NULL, NULL),
(7, NULL, 1.00, NULL, NULL, NULL, 'Public', 'One Time', 1, '2023-07-14 06:42:22', '2023-07-14 06:42:22', NULL, NULL, NULL, NULL),
(8, NULL, 1.00, NULL, NULL, NULL, 'Public', 'One Time', 1, '2023-07-14 07:01:25', '2023-07-14 07:01:25', NULL, NULL, NULL, NULL),
(9, NULL, 1.00, NULL, NULL, NULL, 'Public', 'One Time', 1, '2023-07-14 07:18:40', '2023-07-14 07:18:40', NULL, 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTk9Jc3pDelBOcG5Mc2VqKKiIxaUGMga01JVRj5I6LBbGVlQ1i53pRjjIC1L5rqkmU9-f2UKBcgIXgxoQOzDF-SlrUf6ZoS3tH0Dt', 'ch_3NTlQKCzPNpnLsej12GKbWez', 'txn_3NTlQKCzPNpnLsej1X0NLMEN'),
(10, NULL, 1.00, NULL, NULL, NULL, 'Public', 'One Time', 1, '2023-07-14 07:19:48', '2023-07-14 07:19:48', NULL, 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTk9Jc3pDelBOcG5Mc2VqKOyIxaUGMgY57AXcXpA6LBahahX30_MvZJ-2KPsmVJ_0hX1qLXxUo6MBVSU_mRTYCepszemmfBJO4Ae7', 'ch_3NTlRQCzPNpnLsej1OhFaMnK', 'txn_3NTlRQCzPNpnLsej1vIBQM9k'),
(11, NULL, 1.00, NULL, NULL, NULL, 'Public', 'One Time', 1, '2023-07-14 07:38:33', '2023-07-14 07:38:33', NULL, 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTk9Jc3pDelBOcG5Mc2VqKNKRxaUGMgZ6FoJUoi86LBZAc96jI2-WbyluUj6ra9chIn0E9hbylpw8rzbmQ5iPd0lANF7sRZHjSQeK', 'ch_3NTljZCzPNpnLsej1DTnTZ2w', 'txn_3NTljZCzPNpnLsej1xD8ItOr'),
(12, NULL, 250.00, 'In Honor Of', 'sarab', 'dfwe@erfre.erferf', 'Private', 'One Time', 1, '2023-07-14 07:43:50', '2023-07-14 07:43:50', 'harry@gmail.com', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTk9Jc3pDelBOcG5Mc2VqKI-UxaUGMgZJw-cgAOA6LBZXmiv13jpIyfj2oFm7BUl4wTZIfd5InX_sB4D-_OXEun4lbcNaXbNO2AuF', NULL, NULL),
(13, NULL, 2000.00, 'In Memory Of', 'sarab', 'sad@ere.err', 'Private', 'One Time', 1, '2023-07-14 07:49:22', '2023-07-14 07:49:22', 'harry@gmail.com', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTk9Jc3pDelBOcG5Mc2VqKNuWxaUGMgaxn_K-dQE6LBaJhXzI0-LLyRxukPLjuKbCdFdCMqNKTVGzbOJWnKi-8wL1kYRAhZFkNRiK', 'ch_3NTlu2CzPNpnLsej0yXfYQ1I', 'txn_3NTlu2CzPNpnLsej0pLY86ZH'),
(14, NULL, 25.00, 'In Honor Of', 'dss', 'sdsd@dg.dfd', 'Private', 'One Time', 1, '2023-07-17 04:05:31', '2023-07-17 04:05:31', 'sarab@creativebuffer.com', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTk9Jc3pDelBOcG5Mc2VqKOOW1KUGMgbF0MJznU86LBaIoYzsWzFSgp5BTUqZR8Y5xYOBiUzTzfdCh7_6NASfED_kT3vUUq973gg1', 'ch_3NUnq3CzPNpnLsej0vfm3ZqI', 'txn_3NUnq3CzPNpnLsej05dwyNrB'),
(15, NULL, 25.00, 'In Honor Of', 'sarab', NULL, 'Private', 'One Time', 1, '2023-07-17 04:23:25', '2023-07-17 04:23:25', 'sarab@creativebuffer.com', 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTk9Jc3pDelBOcG5Mc2VqKJWf1KUGMgZWbtypEuU6LBZa-xE3dQb8jD5nR2ZgDgya8Hk9DUFCNqIp9Ff2a3OhCbGmFti2oODYuIpo', 'ch_3NUo7NCzPNpnLsej067MLRjg', 'txn_3NUo7NCzPNpnLsej0ILChJAt'),
(16, NULL, 20.00, NULL, NULL, NULL, 'Public', 'One Time', 1, '2023-11-06 23:44:57', '2023-11-06 23:44:57', NULL, 'https://pay.stripe.com/receipts/payment/CAcaFwoVYWNjdF8xTk9Jc3pDelBOcG5Mc2VqKNGPp6oGMgbxTdEXfBE6LBYIHe7pp6y3gybwxMzDATEb9Iv2M5KzYnbTgGoJcqokSGC_eQbXX0m6EXvR', 'ch_3O9hcqCzPNpnLsej1rqS2GnM', 'txn_3O9hcqCzPNpnLsej1SsPYWoc');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Deactivate',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Casino Night', 0, '2023-12-18 07:10:05', '2023-12-18 07:10:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fundraising_orders`
--

CREATE TABLE `fundraising_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `totalAmount` double(9,2) DEFAULT NULL,
  `transection_id` text DEFAULT NULL,
  `stripe_charge_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fundraising_orders`
--

INSERT INTO `fundraising_orders` (`id`, `user_id`, `totalAmount`, `transection_id`, `stripe_charge_id`, `created_at`, `updated_at`) VALUES
(19, 108, 1.00, 'txn_3NVDHZAjYUUMCBp41apfLFYn', 'ch_3NVDHZAjYUUMCBp412rmn7qi', '2023-07-18 12:45:38', '2023-07-18 12:45:38'),
(26, 109, 100.00, 'txn_3Ne00gAjYUUMCBp401oc30R5', 'ch_3Ne00gAjYUUMCBp40FxxsXzO', '2023-08-11 18:24:31', '2023-08-11 18:24:31'),
(50, 123, 100.00, 'txn_3Nk9XfAjYUUMCBp41JEN4qSX', 'ch_3Nk9XfAjYUUMCBp41QUcV4AF', '2023-08-28 17:48:00', '2023-08-28 17:48:00'),
(51, 137, 3000.00, 'txn_3NnpnFAjYUUMCBp413p8HowR', 'ch_3NnpnFAjYUUMCBp41YqmnUVm', '2023-09-07 21:31:18', '2023-09-07 21:31:18'),
(52, 138, 1500.00, 'txn_3NnqZNAjYUUMCBp408v929Aw', 'ch_3NnqZNAjYUUMCBp40mtvhxzn', '2023-09-07 22:21:03', '2023-09-07 22:21:03'),
(61, 141, 300.00, 'txn_3NrnmbAjYUUMCBp40KOGGQSo', 'ch_3NrnmbAjYUUMCBp40zEcBjYY', '2023-09-18 20:11:02', '2023-09-18 20:11:02'),
(62, 142, 100.00, 'txn_3Ns50lAjYUUMCBp40UTYe636', 'ch_3Ns50lAjYUUMCBp40bfjEmN3', '2023-09-19 14:34:48', '2023-09-19 14:34:48'),
(71, 146, 100.00, 'txn_3NtESLAjYUUMCBp41fug8pHo', 'ch_3NtESLAjYUUMCBp41vtvFKaH', '2023-09-22 18:52:03', '2023-09-22 18:52:03'),
(72, 147, 100.00, 'txn_3NtJpnAjYUUMCBp40YbEYuvd', 'ch_3NtJpnAjYUUMCBp40qfI0vn0', '2023-09-23 00:36:37', '2023-09-23 00:36:37'),
(73, 153, 200.00, 'txn_3NviEjAjYUUMCBp400TJ8p0H', 'ch_3NviEjAjYUUMCBp40Xgu78ij', '2023-09-29 15:04:15', '2023-09-29 15:04:15'),
(74, 154, 100.00, 'txn_3Nx8NsAjYUUMCBp40YXa0qj1', 'ch_3Nx8NsAjYUUMCBp40avJz36F', '2023-10-03 13:11:33', '2023-10-03 13:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `fundraising_order_items`
--

CREATE TABLE `fundraising_order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `fundraising_order_id` bigint(20) NOT NULL,
  `price` double(9,2) DEFAULT NULL,
  `totalAmount` double(9,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sponsorship_id` bigint(20) DEFAULT NULL,
  `ticket_id` bigint(20) DEFAULT NULL,
  `ticket_code` varchar(255) DEFAULT NULL,
  `bar_code` int(11) DEFAULT NULL,
  `order_type` varchar(255) DEFAULT NULL,
  `sold_as` varchar(255) DEFAULT NULL COMMENT 'Use for this column tickets sold with sponsorship or directly purchase tickets option , if sold with sponsorship then price is showing 0 on frontend',
  `ticket_verified` varchar(200) NOT NULL DEFAULT 'Un-Verified',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fundraising_order_items`
--

INSERT INTO `fundraising_order_items` (`id`, `user_id`, `fundraising_order_id`, `price`, `totalAmount`, `quantity`, `sponsorship_id`, `ticket_id`, `ticket_code`, `bar_code`, `order_type`, `sold_as`, `ticket_verified`, `created_at`, `updated_at`) VALUES
(31, 108, 19, 1.00, 1.00, 1, NULL, 1, '301073530', 98037117, 'Tickets', 'Tickets', 'Verified', '2023-07-18 12:45:38', '2023-07-21 13:31:47'),
(38, 109, 26, 100.00, 100.00, 1, NULL, 1, '296382121', 97946168, 'Tickets', 'Tickets', 'Un-Verified', '2023-08-11 18:24:31', '2023-08-11 18:24:31'),
(67, 123, 50, 100.00, 100.00, 1, NULL, 1, '190541514', 1039324017, 'Tickets', 'Tickets', 'Un-Verified', '2023-08-28 17:48:00', '2023-08-28 17:48:00'),
(68, 137, 51, 3000.00, 3000.00, 1, 4, NULL, '165379083', 286228922, 'Sponsorship', NULL, 'Un-Verified', '2023-09-07 21:31:18', '2023-09-07 21:31:18'),
(69, 137, 51, 100.00, 400.00, 4, NULL, 1, '1219816319', 560900500, 'Tickets', 'Sponsorship', 'Un-Verified', '2023-09-07 21:31:18', '2023-09-07 21:31:18'),
(70, 138, 52, 1500.00, 1500.00, 1, 6, NULL, '751994667', 1179527267, 'Sponsorship', NULL, 'Un-Verified', '2023-09-07 22:21:03', '2023-09-07 22:21:03'),
(71, 138, 52, 100.00, 200.00, 2, NULL, 1, '301838806', 657884594, 'Tickets', 'Sponsorship', 'Un-Verified', '2023-09-07 22:21:03', '2023-09-07 22:21:03'),
(92, 141, 61, 100.00, 300.00, 3, NULL, 1, '513725824', 905070395, 'Tickets', 'Tickets', 'Un-Verified', '2023-09-18 20:11:02', '2023-09-18 20:11:02'),
(93, 142, 62, 100.00, 100.00, 1, NULL, 1, '439564039', 386450638, 'Tickets', 'Tickets', 'Un-Verified', '2023-09-19 14:34:48', '2023-09-19 14:34:48'),
(104, 146, 71, 100.00, 100.00, 1, NULL, 1, '631021365', 24106807, 'Tickets', 'Tickets', 'Un-Verified', '2023-09-22 18:52:03', '2023-09-22 18:52:03'),
(105, 147, 72, 100.00, 100.00, 1, NULL, 1, '948584503', 424911056, 'Tickets', 'Tickets', 'Un-Verified', '2023-09-23 00:36:37', '2023-09-23 00:36:37'),
(106, 153, 73, 100.00, 200.00, 2, NULL, 1, '76944190', 284676340, 'Tickets', 'Tickets', 'Un-Verified', '2023-09-29 15:04:15', '2023-09-29 15:04:15'),
(107, 154, 74, 100.00, 100.00, 1, NULL, 1, '495914654', 27224139, 'Tickets', 'Tickets', 'Un-Verified', '2023-10-03 13:11:33', '2023-10-03 13:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `gift_cards`
--

CREATE TABLE `gift_cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `variety` varchar(150) NOT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1=> Active, 0=> Inactive',
  `image` varchar(150) DEFAULT NULL,
  `price` double(9,2) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gift_cards`
--

INSERT INTO `gift_cards` (`id`, `name`, `type`, `variety`, `status`, `image`, `price`, `discount`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Donate shoe', 'eGift Card', 'Donate Shoe', 1, 'kxwus_512.jpg', 100.00, 10, NULL, NULL, NULL),
(2, 'Water bottle', 'eGift Card', 'Pledge Gift Cards', 1, 'Pink_218262bb-28da-413b-ab9a-6bf083fc89ac_2000x.webp', 120.00, 50, NULL, NULL, NULL),
(5, 'Glasses donate', 'eGift Card', 'Donate Shoe', 1, 'glases.jpg', 65.00, 10, NULL, NULL, NULL),
(7, 'Children gifts', 'eGift Card', 'Donate Shoe', 1, 'gifts.jpg', 98.00, 25, NULL, NULL, NULL),
(10, 'Gifts for teenager', 'eGift Card', 'Donate Shoe', 1, 'gifts.jpg', 25.00, 32, NULL, NULL, NULL),
(14, 'Shoes', 'eGift Card', 'Donate Shoe', 1, 'shoes.jpg', 60.00, 20, NULL, NULL, NULL),
(15, 'Milton Hector 1000 Pet Water Bottle,', 'eGift Card', 'Pledge Gift Cards', 1, '3126i3EqA1L._SX300_SY300_QL70_FMwebp_.webp', 35.00, 50, 'This bottle makes it perfect for carrying with you on any day-trip or anywhere you go. It can be used at home, gym, work-related function, birthday party, or even just a brunch you’re hosting amongst friends, indoor and outdoor entertaining, etc.\r\nNo matter where you go, you will never have to worry about carrying your water in a safe and secure manner \r\nThis bottle is easy to clean and maintain, use a mild detergent or dish wash liquid and clean on the inside with a bottle brush.\r\nIt is BPA Free, Food Grade, Reusable and Recyclable. Convenient size fits in the side pocket of bags which you can carry for school, Picnic, car bottle holder etc.', NULL, NULL),
(16, 'Shoes for needed child and donate shoe', 'eGift Card', 'Donate Shoe', 1, 'shoes.jpg', 25.00, 10, NULL, NULL, NULL),
(17, 'Demo Gift Card - Robert', 'eGift Card', 'Pledge Gift Cards', 1, 'shopping-gift-card-vector-illustration-260nw-1879476985.webp', 100.00, 25, 'This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. \r\n\r\nThis is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard.', NULL, NULL),
(18, 'Demo Gift Card - Donate Shoe- Robert', 'eGift Card', 'Donate Shoe', 1, 'shopping-gift-card-vector-illustration-260nw-1879476985.webp', 100.00, 20, 'This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard. This is the dummy description of the giftcard.', NULL, NULL),
(21, 'Children gifts', 'eGift Card', 'Pledge Gift Cards', 1, 'birthday.jpg', 2.00, 10, NULL, NULL, NULL),
(22, 'Build up confidence in advance for motivate the childrens', 'eGift Card', 'Donate Shoe', 1, 'birthday.jpg', 25.00, 10, NULL, NULL, NULL),
(24, 'Gifts for greek', 'eGift Card', 'Donate Shoe', 1, 'file_example_JPG_500kB.jpg', 50.00, 10, 'Gifts for greek', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interviewers`
--

CREATE TABLE `interviewers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `interviewer_id` varchar(150) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `disease` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `assign_class` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1 COMMENT '1=> Active, 0=> Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interviewers`
--

INSERT INTO `interviewers` (`id`, `user_id`, `interviewer_id`, `name`, `disease`, `image`, `assign_class`, `gender`, `dob`, `phone`, `joining_date`, `qualification`, `department`, `designation`, `experience`, `address`, `city`, `country`, `state`, `zipcode`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 34, 'admin@gmail.com', 'test', 2, 'logo.png', 'trtrt', 'Male', '2023-06-13', '8456971230', '2023-06-13', 'reer', 'IT', 'erer', '4', 'CM-30\r\nKhanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, '2023-06-12 00:08:14', '2023-06-12 00:08:14', NULL),
(2, 36, 'admin@gmail.com', 'test', 3, 'logo.png', 'trtrt', 'Female', '2023-06-19', '8506802351', '2023-06-13', 'reer', 'd', 'erer', '4', 'CM-30\r\nKhanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, '2023-06-12 00:10:15', '2023-06-12 00:10:15', NULL),
(3, 37, '12345', 'sarab', 1, '1652807916.png', 'trtrt', 'Male', '2023-06-19', '9234567890', '2023-06-07', 'reer', 'None', 'erer', '4', 'CM-30\r\nKhanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, '2023-06-12 00:12:53', '2023-06-12 04:38:37', NULL),
(4, 3, 'admin@gmail.com', 'Teacher John', 1, 'logo.png', 'trtrt', 'Male', '2023-06-13', '(123) 456-7890', '2023-06-13', 'reer', 'IT', 'erer', '4', 'CM-30Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201302', 1, '2023-06-12 00:08:14', '2023-07-04 06:03:42', NULL),
(5, 89, 'test123@gmail.com', 'test', 1, '', 'trtrt', 'Male', '2023-06-05', '(850) 680-2351', '2023-06-20', 'reer', 'dfv', 'erer', '3', 'CM-30Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, '2023-06-30 05:56:11', '2024-05-19 10:19:16', '2024-05-19 10:19:16'),
(6, 90, '12', 'teacher', 1, '', 'trtrt', 'Male', '2023-06-26', '(850) 680-2351', '2023-06-29', 'reer', 'd', 'Test desi', '3', 'CM-30Khanjarpur Near Parthala Road near Easyday Sector 122', 'Noida', 'India', 'Uttar Prades', '201301', 1, '2023-06-30 06:04:25', '2024-05-19 10:18:39', '2024-05-19 10:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `contract` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `job_icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `location`, `contract`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`, `job_icon`) VALUES
(1, 'Frontend', 'Plantation, FL', '1 year', '', 1, '2024-06-03 07:54:02', '2024-06-04 05:11:57', '2024-06-04 05:11:57', 'frontend.png'),
(2, 'Frontend', 'Plantation, FL', '1 year', '', 1, '2024-06-04 05:12:20', '2024-06-04 05:22:12', '2024-06-04 05:22:12', 'frontend.png'),
(3, 'Frontend', 'Plantation, FL', '1 year', '', 1, '2024-06-04 05:23:12', '2024-06-04 05:27:39', '2024-06-04 05:27:39', 'frontend.png'),
(4, 'Frontend', 'Plantation, FL', '1 year', '', 1, '2024-06-04 05:28:13', '2024-06-04 05:28:13', NULL, 'frontend.png'),
(5, 'Backend', 'Plantation, FL', '1 year', '', 1, '2024-06-04 05:32:57', '2024-06-04 05:32:57', NULL, 'backend.jpg'),
(6, 'Andriod', 'Plantation, FL', '1 year', '', 1, '2024-06-04 05:33:34', '2024-06-04 05:33:34', NULL, 'andriod.png'),
(7, 'IOS', 'Plantation, FL', '1 year', '', 1, '2024-06-04 05:39:20', '2024-06-04 05:39:20', NULL, 'ios.png'),
(8, 'Full Stack', 'Plantation, FL', '1 year', '', 1, '2024-06-04 05:39:47', '2024-06-04 05:39:47', NULL, 'full-stack-developer-line-icon-vector.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_skills`
--

CREATE TABLE `job_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `skill` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_skills`
--

INSERT INTO `job_skills` (`id`, `job_id`, `skill`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Java', 'java.png', '2024-06-03 09:36:32', '2024-06-03 09:36:32'),
(2, 1, 'vue', '', '2024-06-03 09:38:01', '2024-06-03 09:38:01'),
(3, 1, 'React', '', '2024-06-03 09:38:39', '2024-06-03 09:38:39'),
(4, 4, 'Javascript', '', '2024-06-04 07:40:05', '2024-06-04 07:40:05'),
(5, 4, 'React js', 'react-native.png', '2024-06-04 07:42:04', '2024-06-04 07:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `kids_assesments_trials`
--

CREATE TABLE `kids_assesments_trials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) DEFAULT NULL,
  `kids_assessments_id` bigint(20) DEFAULT NULL,
  `assessments` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `assessment_marks` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kids_assesments_trials`
--

INSERT INTO `kids_assesments_trials` (`id`, `candidate_id`, `kids_assessments_id`, `assessments`, `remarks`, `assessment_marks`, `created_at`, `updated_at`) VALUES
(32, 16, 44, 'IND', 'test1', 100, NULL, NULL),
(33, 16, 44, 'GP', 'Test2', 80, NULL, NULL),
(34, 16, 44, 'VP', 'Test3', 60, NULL, NULL),
(35, 11, 45, 'VP', 'test8', 60, NULL, '2023-10-30 07:09:45'),
(36, 4, 46, 'VP', 'Test6', 60, NULL, NULL),
(37, 4, 46, 'GP', 'test9', 80, NULL, '2023-10-30 07:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `kids_assessments`
--

CREATE TABLE `kids_assessments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidates_id` bigint(20) DEFAULT NULL,
  `task_id` bigint(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `assessments` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kids_assessments`
--

INSERT INTO `kids_assessments` (`id`, `candidates_id`, `task_id`, `user_id`, `assessments`, `remarks`, `created_at`, `updated_at`) VALUES
(4, 1, 3, 3, 'IND', 'test', '2023-06-05 06:24:10', '2023-06-05 06:24:10'),
(5, 1, 3, 3, 'IND', 'sdfsf', '2023-06-05 06:24:10', '2023-06-05 06:24:10'),
(6, 3, 4, 3, 'IND', 'test', '2023-06-05 07:35:30', '2023-06-05 07:35:30'),
(44, 16, 8, 32, 'IND', 'test1', '2023-10-30 07:09:45', '2023-10-30 07:09:45'),
(45, 11, 8, 32, 'VP', 'Test4', '2023-10-30 07:09:45', '2023-10-30 07:09:45'),
(46, 4, 8, 32, 'VP', 'Test6', '2023-10-30 07:09:45', '2023-10-30 07:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `kid_second_parents`
--

CREATE TABLE `kid_second_parents` (
  `id` int(10) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kid_second_parents`
--

INSERT INTO `kid_second_parents` (`id`, `candidate_id`, `name`, `relationship`, `phone_number`, `address`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'teacher', NULL, NULL, 'CM-30Khanjarpur Near Parthala Road near Easyday Sector 122', NULL, 1, '2023-09-22 06:59:06', '2023-09-22 06:59:06'),
(2, 20, 'ghhu', 'Mother', '(085) 068-0235', 'New Jersey Turnpike', 'teacher1234@creativebuffer.com', 1, '2023-09-22 07:04:13', '2023-09-22 07:04:13'),
(3, 17, 'ttt', 'Sister', '(545) 454-5544', 'CM-30Khanjarpur Near Parthala Road near Easyday Sector 122', 'teacher1234@creativebuffer.com', 1, '2023-09-22 07:51:16', '2023-09-22 07:51:16'),
(4, 16, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-22 07:55:42', '2023-09-22 07:59:07'),
(5, 15, NULL, NULL, NULL, NULL, NULL, 1, '2023-09-22 07:58:47', '2023-09-22 07:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `kid_task`
--

CREATE TABLE `kid_task` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kid_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kid_task`
--

INSERT INTO `kid_task` (`id`, `kid_id`, `task_id`, `created_at`, `updated_at`) VALUES
(1, 4, 2, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 3, 2, NULL, NULL),
(6, 1, 3, NULL, NULL),
(8, 3, 3, NULL, NULL),
(9, 4, 3, NULL, NULL),
(10, 1, 4, NULL, NULL),
(11, 1, 5, NULL, NULL),
(12, 2, 5, NULL, NULL),
(13, 3, 5, NULL, NULL),
(14, 4, 5, NULL, NULL),
(15, 12, 6, NULL, NULL),
(16, 15, 7, NULL, NULL),
(17, 16, 8, NULL, NULL),
(18, 11, 8, NULL, NULL),
(19, 4, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2023_03_09_111650_add_type_to_users_table', 2),
(14, '2023_03_10_051703_create_gift_cards_table', 3),
(15, '2023_03_20_075000_create_kids_table', 4),
(16, '2023_03_21_134428_create_orders_table', 5),
(17, '2023_03_22_054700_add_phone_to_users_table', 6),
(18, '2023_03_22_104739_add_column_to_orders_table', 7),
(19, '2023_03_22_112212_add_name_to_orders_table', 8),
(20, '2023_03_22_113548_add_card_id_to_orders_table', 9),
(21, '2023_03_24_113959_add_image_to_users_table', 10),
(26, '2023_03_29_122540_update_admin_password_to_users_table', 11),
(27, '2023_04_10_051852_add_image_to_kids_table', 12),
(28, '2023_04_12_055544_add_variety_to_gift_cards_table', 13),
(29, '2023_04_12_114236_add_variety_to_orders_table', 14),
(30, '2023_04_21_073440_add_email_to_orders_table', 15),
(32, '2023_05_24_050303_add_role_to_users_table', 16),
(33, '2023_05_25_082549_add_column_to_kids_table', 17),
(35, '2023_05_25_121800_add_form_status_to_kids_table', 18),
(37, '2023_05_26_050546_change_users_table_email_column_type', 19),
(38, '2023_05_26_052503_change_kids_table_name_column_type', 20),
(39, '2023_05_29_052202_add_medical_columns_to_kids_table', 21),
(40, '2023_05_30_055413_create_skills_table', 22),
(41, '2023_06_01_061527_create_tasks_table', 23),
(42, '2023_06_01_071515_create_kid_task_table', 24),
(43, '2023_06_01_124253_create_kids_assessments_table', 25),
(44, '2023_06_05_134147_create_attendances_table', 26),
(45, '2023_06_08_095731_add_summary_to_kids_table', 27),
(46, '2023_06_09_054756_update_role_column_comment_in_users_table', 28),
(47, '2023_06_09_101023_create_teacher_table', 29),
(48, '2023_06_26_130223_create_tickets_table', 30),
(49, '2023_06_26_131038_create_sponsorships_table', 31),
(50, '2023_06_26_131244_create_sponsorship_benefits_table', 31),
(51, '2023_06_28_060625_insert_data_in_sponsorships_table', 32),
(52, '2023_06_28_120922_add_column_stripe_id_in_users_table', 33),
(53, '2023_06_28_135919_create_orders_table', 34),
(54, '2023_06_28_140207_create_orders_items_table', 34),
(55, '2023_06_29_053228_create_fundraising_orders_table', 35),
(56, '2023_06_29_053313_create_fundraising_order_items_table', 35),
(57, '2023_07_04_112840_alter_column_phone_teachers_table', 36),
(58, '2023_07_07_074403_create_donations_table', 37),
(60, '2023_07_10_112247_add_column_dedicatees_email_in_donations_table', 38),
(61, '2023_07_10_115706_alter_column_tickets_quantity_in_sponsorships_table', 39),
(62, '2023_07_14_095716_create_transection_table', 40),
(63, '2023_07_20_112032_add_verified_ticket_to_fundraising_order_items_table', 41),
(64, '2023_09_04_112708_create_jobs_table', 42),
(66, '2023_09_05_121503_create_candidates_table', 43),
(67, '2023_09_22_114155_create_kid_second_parents_table', 44),
(68, '2023_10_04_062305_add_type_to_sponsorships_table', 45),
(71, '2023_10_11_095824_create_sponsorships_logos_table', 46),
(73, '2023_10_27_112900_create_kids_assesments_trials_table', 47),
(74, '2023_12_18_065023_create_events_table', 48),
(75, '2023_12_22_053255_create_sponsored_by_event_images_table', 49),
(76, '2024_01_11_073838_create_camp_registrations_table', 50),
(77, '2024_05_19_133858_add_deleted_at_into_all_tables', 51),
(78, '2023_06_09_101023_create_interviewer_table', 52),
(79, '2024_05_20_023906_create_plans_table', 52),
(80, '2024_05_20_031835_create_plan_features_table', 53),
(81, '2019_05_03_000001_create_customer_columns', 54),
(82, '2019_05_03_000002_create_subscriptions_table', 54),
(83, '2019_05_03_000003_create_subscription_items_table', 54),
(84, '2024_05_21_025317_create_subscriptions_table', 55),
(85, '2024_05_21_034720_add_cashier_columns_to_users_table', 56),
(86, '2024_05_25_155954_create_zoom_meetings_table', 57),
(87, '2024_05_26_125418_add_url_to_zoom_meetings_table', 58),
(88, '2024_06_03_115859_add_job_icon_to_jobs_table', 59),
(89, '2024_06_03_131948_create_job_skills_table', 60);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `gift_card_id` varchar(255) DEFAULT NULL,
  `pledge_id` varchar(255) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `price` double(9,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `card_name` varchar(255) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `child_name` varchar(255) DEFAULT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `card_status` varchar(255) DEFAULT NULL,
  `pledge_type` varchar(255) DEFAULT NULL,
  `variety` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_option` varchar(255) DEFAULT NULL,
  `delivery_mode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `gift_card_id`, `pledge_id`, `user_id`, `price`, `quantity`, `card_name`, `discount`, `name`, `child_name`, `phone_number`, `email`, `card_status`, `pledge_type`, `variety`, `created_at`, `updated_at`, `delivery_option`, `delivery_mode`) VALUES
(1, '3', '#GMSPJ583373', 3, 100.00, 1, 'Dominos', 5, NULL, NULL, NULL, NULL, 'Received', 'Not Paid', '', '2023-03-22 06:40:17', '2023-03-22 06:40:17', 'send-as-gift', NULL),
(2, '3', '#GMSPJ305126', 3, 10000.00, 1, 'Wall mart', 15, 'Test', NULL, 132654888, NULL, 'Received', 'Not Paid', '', '2023-03-22 06:44:38', '2023-03-22 06:44:38', 'buy-for-self', NULL),
(3, '3', '#GMSPJ635725', 3, 100.00, 1, 'Test', 12, 'Test', NULL, 132654888, NULL, 'Received', 'Not Paid', '', '2023-03-22 06:46:09', '2023-03-22 06:46:09', 'send-as-gift', NULL),
(4, '2', '#GMSPJ443392', 3, 100.00, 1, 'Dominos', 5, 'Test123', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-24 07:21:42', '2023-03-24 07:21:42', 'send-as-gift', 'email'),
(5, '5', '#GMSPJ637326', 3, 100.00, 1, 'Applebee\'s', 10, 'Test123', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-24 07:24:22', '2023-03-24 07:24:22', 'buy-for-self', 'sms'),
(6, '5', '#GMSPJ155342', 3, 100.00, 1, 'Applebee\'s', 10, 'Test123', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-24 07:28:48', '2023-03-24 07:28:48', 'send-as-gift', 'email'),
(7, '5', '#GMSPJ454372', 3, 100.00, 1, 'Applebee\'s', 10, 'Test123', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-24 07:29:03', '2023-03-24 07:29:03', 'send-as-gift', 'email'),
(8, '9', '#GMSPJ116034', 3, 100.00, 1, 'Test', 12, 'Test123', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-24 07:30:08', '2023-03-24 07:30:08', 'send-as-gift', 'both'),
(9, '8', '#GMSPJ529712', 3, 10000.00, 1, 'Home Goods', 15, 'Test123', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-24 07:35:09', '2023-03-24 07:35:09', 'buy-for-self', 'email'),
(10, '5', '#GMSPJ272290', 3, 100.00, 1, 'Applebee\'s', 10, 'Test123', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-24 07:41:04', '2023-03-24 07:41:04', 'buy-for-self', 'email'),
(11, '8', '#GMSPJ280625', 3, 10000.00, 1, 'Home Goods', 15, 'Test123', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-24 07:45:07', '2023-03-24 07:45:07', 'buy-for-self', 'sms'),
(12, '2', '#GMSPJ910681', 3, 100.00, 1, 'Dominos', 5, 'Test123', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-27 05:38:36', '2023-03-27 05:38:36', 'send-as-gift', 'email'),
(13, '5', '#GMSPJ299446', 3, 10.00, 4, 'Applebee\'s', 10, 'Test123', NULL, 1234567890, NULL, 'Received', 'Paid', '', '2023-03-28 04:49:11', '2023-04-05 07:24:54', 'send-as-gift', 'email'),
(14, '2', '#GMSPJ219832', 3, 100.00, 1, 'Dominos', 5, 'Test Business', NULL, 1234567890, NULL, 'Received', 'Paid', '', '2023-03-28 06:38:30', '2023-04-05 07:41:08', 'send-as-gift', 'email'),
(15, '2', '#GMSPJ948430', 3, 95.00, 1, 'Dominos', 5, 'Test Business', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-28 06:42:40', '2023-03-28 06:42:40', 'send-as-gift', 'email'),
(16, '5', '#GMSPJ484753', 3, 90.00, 1, 'Applebee\'s', 10, 'Test Business', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-28 06:59:33', '2023-03-28 06:59:33', 'buy-for-self', 'sms'),
(17, '5', '#GMSPJ404391', 3, 90.00, 1, 'Applebee\'s', 10, 'Test Business', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-28 07:01:36', '2023-03-28 07:01:36', 'send-as-gift', 'email'),
(18, '2', '#GMSPJ285007', 3, 100.00, 1, 'Dominos', 5, 'Test Business', NULL, 1234567890, NULL, 'Received', 'Paid', '', '2023-03-28 07:03:42', '2023-04-05 07:22:37', 'send-as-gift', 'email'),
(19, '3', '#GMSPJ197836', 3, 8500.00, 1, 'Wall mart', 15, 'Test Business', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-28 07:05:04', '2023-03-28 07:05:04', 'send-as-gift', 'email'),
(20, '8', '#GMSPJ708897', 3, 8500.00, 1, 'Home Goods', 15, 'Test Business', NULL, 1234567890, NULL, 'Received', 'Paid', '', '2023-03-28 07:17:50', '2023-03-28 07:17:50', 'send-as-gift', 'email'),
(21, '3', '#GMSPJ221514', 3, 8500.00, 1, 'Wall mart', 15, 'Test Business', NULL, 1234567890, NULL, 'Received', 'Paid', '', '2023-03-28 07:18:18', '2023-03-28 07:18:18', 'buy-for-self', 'both'),
(22, '13', '#GMSPJ482871', 3, 9000.00, 1, 'Kohl\'s', 10, 'Test Business', NULL, 1234567890, NULL, 'Received', 'Paid', '', '2023-03-28 07:20:02', '2023-03-28 07:20:02', 'send-as-gift', 'email'),
(23, '5', '#GMSPJ378134', 3, 90.00, 1, 'Applebee\'s', 10, 'Test Business', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-29 08:53:41', '2023-03-29 08:53:41', 'send-as-gift', 'email'),
(24, '9', '#GMSPJ829515', 6, 88.00, 1, 'Test', 12, 'Monika', NULL, 1234567890, NULL, 'Received', 'Not Paid', '', '2023-03-31 04:53:11', '2023-03-31 04:53:11', 'send-as-gift', 'email'),
(25, '8', '#GMSPJ679769', 6, 8500.00, 1, 'Home Goods', 15, 'Monika', NULL, 1234567890, NULL, 'Received', 'Paid', '', '2023-03-31 04:54:51', '2023-03-31 04:54:51', 'send-as-gift', 'email'),
(26, '9', '#GMSPJ934853', 1, 100.00, 1, 'Test', 12, 'Admin User', NULL, NULL, NULL, 'Received', 'Paid', 'Donate Shoe', '2023-04-06 08:25:16', '2023-04-11 01:30:24', 'send-as-gift', 'email'),
(27, '8', '#GMSPJ590182', 6, 8500.00, 1, 'Home Goods', 15, 'Monika', NULL, 1234567890, NULL, 'Received', 'Not Paid', 'Pledge Gift Cards', '2023-04-06 04:30:20', '2023-04-06 04:30:20', 'buy-for-self', 'email'),
(28, '9', '#GMSPJ205147', 1, 88.00, 1, 'Puma', 12, 'Admin User', NULL, NULL, NULL, 'Received', 'Not Paid', 'Donate Shoe', '2023-04-12 06:35:16', '2023-04-12 06:35:16', 'buy-for-self', 'email'),
(29, '38', '#GMSPJ233399', 3, 88.00, 1, 'Nike', 12, 'Test Business', NULL, 1234567890, NULL, 'Received', 'Not Paid', 'Donate Shoe', '2023-04-12 07:37:17', '2023-04-12 07:37:17', 'send-as-gift', 'email'),
(30, '46', '#GMSPJ121255', 1, 176.00, 2, 'Jack Rogers', 12, 'Admin User', NULL, NULL, NULL, 'Received', 'Not Paid', 'Donate Shoe', '2023-04-13 04:53:52', '2023-04-13 04:53:52', 'send-as-gift', 'email'),
(31, '42', '#GMSPJ655857', 3, 70.00, 1, 'Western Chief', 30, 'Test Business', NULL, 1234567890, NULL, 'Received', 'Paid', 'Donate Shoe', '2023-04-19 01:42:37', '2023-04-20 23:50:21', 'send-as-gift', 'email'),
(32, '42', '#GMSPJ223138', 1, 210.00, 3, 'Western Chief', 30, 'Test Business 11', NULL, 1234658790, NULL, 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 04:02:08', '2023-04-21 04:02:08', 'send-as-gift', 'email'),
(33, '46', '#GMSPJ144940', 3, 88.00, 1, 'Jack Rogers Jack Rogers Jack Rogers Jack Rogers Jack Rogers Jack Rogers', 12, NULL, NULL, NULL, NULL, 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 04:05:14', '2023-04-21 04:05:14', 'send-as-gift', 'email'),
(34, '38', '#GMSPJ570961', 3, 100.00, 1, 'Nike', 20, 'Test 11', '7', 1234658790, 'test@gmail.com', 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 04:10:22', '2023-04-21 04:10:22', 'send-as-gift', 'email'),
(35, '46', '#GMSPJ408476', 3, 88.00, 1, 'Jack Rogers Jack Rogers Jack Rogers Jack Rogers Jack Rogers Jack Rogers', 12, NULL, NULL, NULL, NULL, 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 06:20:24', '2023-04-21 06:20:24', 'send-as-gift', 'email'),
(36, '40', '#GMSPJ569607', 3, 42.75, 1, 'Tom', 5, 'ert', NULL, 2353467587, NULL, 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 07:11:12', '2023-04-21 07:11:12', 'send-as-gift', 'both'),
(37, '40', '#GMSPJ616070', 3, 42.75, 1, 'Tom', 5, NULL, NULL, NULL, NULL, 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 07:16:47', '2023-04-21 07:16:47', 'send-as-gift', 'both'),
(38, '44', '#GMSPJ530386', 3, 100.00, 1, 'Skechers', 30, 'Mark', '8', 4564654654, NULL, 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 07:24:22', '2023-04-21 07:24:22', 'send-as-gift', 'both'),
(39, '9', '#GMSPJ623859', 3, 40.00, 1, 'Puma', 60, 'Moni', '9', 7879887987, NULL, 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 07:27:46', '2023-04-21 07:27:46', 'send-as-gift', 'both'),
(40, '45', '#GMSPJ721833', 3, 48.00, 1, 'Keds', 60, 'Sara', '8', 5655655656, 'test@gh.g', 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 07:32:00', '2023-04-21 07:32:00', 'send-as-gift', 'both'),
(41, '43', '#GMSPJ267094', 3, 75.00, 1, 'Elephantito', 50, 'Test Business1111', '8', 1321321321, 'testbusiness1111@gmail.com', 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 07:35:12', '2023-04-21 07:35:12', 'send-as-gift', 'both'),
(42, '43', '#GMSPJ779305', 3, 75.00, 1, 'Elephantito', 50, 'Test Business1123124', '4', 2142353465, 'testbusiness24235346@gmail.com', 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 07:38:28', '2023-04-21 07:38:28', 'send-as-gift', 'both'),
(43, '43', '#GMSPJ410979', 3, 75.00, 1, 'Elephantito', 50, 'Test Data', '9', 7987446545, 'Test@ghdsf.dfh', 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 07:40:06', '2023-04-21 07:40:06', 'send-as-gift', 'both'),
(44, '6', '#GMSPJ909447', 3, 9000.00, 1, 'Target', 10, 'dgh', '9', 5658679870, 'cxb@dh.rtgd', 'Received', 'Not Paid', 'Pledge Gift Cards', '2023-04-21 07:42:11', '2023-04-21 07:42:11', 'send-as-gift', 'both'),
(45, '9', '#GMSPJ253988', 3, 40.00, 1, 'Puma', 60, 'gdf', '4', 436457658, 'fds@fg.fc', 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 07:45:27', '2023-04-21 07:45:27', 'send-as-gift', 'both'),
(46, '45', '#GMSPJ777540', 3, 48.00, 1, 'Keds', 60, 'sdgh', '6', 6548670978, 'dg@g.fg', 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 07:46:59', '2023-04-21 07:46:59', 'send-as-gift', 'both'),
(47, '9', '#GMSPJ885886', 3, 100.00, 1, 'Puma', 60, 'Test', '7', 5476586759, 'dfg@fh.dfsh', 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 07:49:46', '2023-04-21 07:49:46', 'send-as-gift', 'both'),
(48, '43', '#GMSPJ336003', 3, 75.00, 1, 'Elephantito', 50, 'Test Business', '6', 3657687698, 'testbusiness@gmail.com', 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 08:07:05', '2023-04-21 08:07:05', 'send-as-gift', 'both'),
(49, '10', '#GMSPJ348403', 3, 8000.00, 1, 'Panera', 20, 'eryre', '4', 3465476897, 'ds@rgh.tfsu', 'Received', 'Not Paid', 'Pledge Gift Cards', '2023-04-21 08:11:46', '2023-04-21 08:11:46', 'send-as-gift', 'both'),
(50, '9', '#GMSPJ353485', 3, 40.00, 1, 'Puma', 60, 'rhgd', '8', 4365586798, 'df@df.dfdgs', 'Received', 'Not Paid', 'Donate Shoe', '2023-04-21 08:12:32', '2023-04-21 08:12:32', 'send-as-gift', 'both'),
(51, '39', '#GMSPJ828051', 6, 1200.00, 1, 'FOCO', 0, 'Test Business', '4', 1234658790, 'testbusiness@gmail.com', 'Received', 'Not Paid', 'Donate Shoe', '2023-04-26 06:19:37', '2023-04-26 06:19:37', 'send-as-gift', 'both'),
(52, '46', '#GMSPJ987655', 6, 88.00, 1, 'Jack Rogers Jack Rogers Jack Rogers Jack Rogers Jack Rogers Jack Rogers', 12, 'Test Data', '4', 1231654654, 'testdata@gmail.com', 'Received', 'Not Paid', 'Donate Shoe', '2023-04-26 06:40:29', '2023-04-26 06:40:29', 'send-as-gift', 'both'),
(53, '38', '#GMSPJ332104', 6, 200.00, 2, 'Nike', 0, 'Test', '7', 1234658790, 'testbusiness@gmail.com', 'Received', 'Not Paid', 'Donate Shoe', '2023-04-26 06:48:46', '2023-04-26 06:48:46', 'send-as-gift', 'both'),
(54, '46', '#GMSPJ999971', 6, 96.80, 1, 'Jack Rogers Jack Rogers Jack Rogers Jack Rogers Jack Rogers Jack Rogers', 12, 'Test Business', '6', 1234658790, 'testbusiness@gmail.com', 'Received', 'Not Paid', 'Donate Shoe', '2023-04-26 07:55:48', '2023-04-26 23:56:13', 'send-as-gift', 'both'),
(55, '9', '#GMSPJ921899', 6, 220.00, 2, 'Puma', 0, 'Test Business', '7', 1234658790, 'testbusiness@gmail.com', 'Received', 'Paid', 'Donate Shoe', '2023-04-26 07:58:51', '2023-04-26 23:56:05', 'send-as-gift', 'both');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test1@yopmail.com', 'y4mCHRADNY6j5TtCSx36ShXJm2nprRwBbCNhdvHldV854UzdtSnSqM3zyEFQh1K6', '2023-04-11 05:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'passport_token', 'd29483cddb37e5657fadc5e3dd7ae731c8dbc0e4bbbb7a583c5369505ad365ec', '[\"*\"]', NULL, '2023-03-06 06:24:13', '2023-03-06 06:24:13'),
(2, 'App\\Models\\User', 1, 'passport_token', 'e39f1a45938da9ba2c9e3f2343c4851f19cb5a3a285053a2e16d4eb7a6b74ef8', '[\"*\"]', NULL, '2023-03-09 04:38:27', '2023-03-09 04:38:27'),
(3, 'App\\Models\\User', 1, 'passport_token', '6bf61685afa5e6ef67666c163f73b8ebf1ff0e702fe4f1f875354ae6c499cd0c', '[\"*\"]', NULL, '2023-03-09 04:59:35', '2023-03-09 04:59:35'),
(4, 'App\\Models\\User', 1, 'passport_token', '6ceae7965d1c2f5a2a478eb86c100abe95e8f7078a9a84b9956add3aecf86d00', '[\"*\"]', NULL, '2023-03-09 05:12:12', '2023-03-09 05:12:12'),
(5, 'App\\Models\\User', 1, 'passport_token', 'c6e4308595ea2fdac87f6ee5fb5a8ea4498894387db1d595e36a4c0e08ba99e6', '[\"*\"]', NULL, '2023-03-09 05:15:59', '2023-03-09 05:15:59'),
(6, 'App\\Models\\User', 1, 'passport_token', 'cbfece8deda4321a3960e796e0064276c5de9b52dcb9a19ed6a4e2d4baf0771e', '[\"*\"]', NULL, '2023-03-09 05:16:48', '2023-03-09 05:16:48'),
(7, 'App\\Models\\User', 1, 'passport_token', '1231d8d44751d2c2b374734f2af750271293255287bd1ad50b008ce2b749dc37', '[\"*\"]', NULL, '2023-03-09 05:19:04', '2023-03-09 05:19:04'),
(8, 'App\\Models\\User', 1, 'passport_token', 'e993af77d5569a97d87c2c906641468896111b58b5a91f4f8c094a48f4cafc2c', '[\"*\"]', NULL, '2023-03-09 05:21:01', '2023-03-09 05:21:01'),
(9, 'App\\Models\\User', 1, 'passport_token', '1b8ac9946337a3583d5a84c4f6aa3769761aa0e80e8749f451c409fe145945ab', '[\"*\"]', NULL, '2023-03-09 05:25:09', '2023-03-09 05:25:09'),
(10, 'App\\Models\\User', 1, 'passport_token', 'ebae822a426f2c9240a27024b59acff12a9c2206be4d2031131c4aacfb53b398', '[\"*\"]', NULL, '2023-03-09 05:25:40', '2023-03-09 05:25:40'),
(11, 'App\\Models\\User', 1, 'passport_token', 'bdc9d0878eed14d9e1c58d47e40d0fd56bc382e4a1ba96dfc747f2b4e1c0e463', '[\"*\"]', NULL, '2023-03-09 05:43:20', '2023-03-09 05:43:20'),
(12, 'App\\Models\\User', 1, 'passport_token', 'fb819015d72b30726772ab7721d797da2aeb28a2a6f3c50c6fc50754506710c0', '[\"*\"]', NULL, '2023-03-09 05:43:28', '2023-03-09 05:43:28'),
(13, 'App\\Models\\User', 1, 'passport_token', '1136d6ca5780e3c0dcdc3c485a0a9e15a9745d439e9607eeae965941b871f190', '[\"*\"]', NULL, '2023-03-09 05:53:28', '2023-03-09 05:53:28'),
(14, 'App\\Models\\User', 1, 'passport_token', '03a965b3a198b06566d941f835910d092e111cf747b37f0e91e07159765bbf85', '[\"*\"]', NULL, '2023-03-09 05:54:12', '2023-03-09 05:54:12'),
(15, 'App\\Models\\User', 1, 'passport_token', 'b1a03807dcedcd701e6db4a74bde84ce2e3b12d323b0d401e55f5d617c071106', '[\"*\"]', NULL, '2023-03-09 05:54:37', '2023-03-09 05:54:37'),
(16, 'App\\Models\\User', 1, 'passport_token', '23647594a99d42018de87094bd760478b4f5e4a116ee30578435a8ef8ca1690c', '[\"*\"]', NULL, '2023-03-09 06:01:25', '2023-03-09 06:01:25'),
(17, 'App\\Models\\User', 1, 'passport_token', '0c2e2cc597f4136708d9a4614e746cfbd30e5524c8bc16e34c69b2ba721d615c', '[\"*\"]', NULL, '2023-03-09 06:02:23', '2023-03-09 06:02:23'),
(18, 'App\\Models\\User', 2, 'MyApp', '66171ac157d81eb87ee836971c43101082bf1314de8f718350bdbf0c39d4b0e4', '[\"*\"]', NULL, '2023-03-09 06:12:19', '2023-03-09 06:12:19'),
(19, 'App\\Models\\User', 4, 'MyApp', '1a17e8ae86f759c06413bff220fd20c304a36f83e680a2176915693e68f8f4a5', '[\"*\"]', NULL, '2023-03-09 06:15:36', '2023-03-09 06:15:36'),
(20, 'App\\Models\\User', 5, 'SuperSchool', '11f75d87dabc4769487e26f76fce25394a2392650c7f9c731361d5b82be97ce3', '[\"*\"]', NULL, '2023-03-09 06:17:15', '2023-03-09 06:17:15'),
(21, 'App\\Models\\User', 6, 'SuperSchool', 'cb60d40462d52875c77a5bb95df7479ea74c5effe9dad773ffd5037830cf09bc', '[\"*\"]', NULL, '2023-03-09 06:18:08', '2023-03-09 06:18:08'),
(22, 'App\\Models\\User', 1, 'SuperSchool', '2a2f2534994f6d7f18851f46ab83fccd0a309a4d3f70aa9a9f4e5a791a857bad', '[\"*\"]', NULL, '2023-03-09 06:20:29', '2023-03-09 06:20:29'),
(23, 'App\\Models\\User', 1, 'SuperSchool', '9847c982376e3e06132b381b79c3300567727ce49fc61c89d481eb0c3573a0f5', '[\"*\"]', NULL, '2023-03-09 06:21:27', '2023-03-09 06:21:27'),
(24, 'App\\Models\\User', 1, 'SuperSchool', 'af7ae855e691452307ae51a4fd8eab9f867ba22de3ed54cc91ce3697366d9a9c', '[\"*\"]', NULL, '2023-03-09 06:25:36', '2023-03-09 06:25:36'),
(25, 'App\\Models\\User', 1, 'SuperSchool', 'f8d9ae53bfb164b13c21e756847785155115d09f534c41d0eaa7d20230c4d30d', '[\"*\"]', NULL, '2023-03-09 06:25:39', '2023-03-09 06:25:39'),
(26, 'App\\Models\\User', 1, 'SuperSchool', '2a207503180777928453367459521cd461f4c5f6248690dd5469f7beed73948b', '[\"*\"]', NULL, '2023-03-09 06:27:02', '2023-03-09 06:27:02'),
(27, 'App\\Models\\User', 1, 'SuperSchool', '4fde1378e2ea1a0a3a21ae187ff8443b9efde8366eb63d3d3ba9b5b98d004a80', '[\"*\"]', NULL, '2023-03-09 06:28:58', '2023-03-09 06:28:58'),
(28, 'App\\Models\\User', 1, 'SuperSchool', '30b2a774575eb12dd4674bd0e5c77107c498dba2f1ed7ecb08c51fb7faa01e92', '[\"*\"]', NULL, '2023-03-09 06:29:48', '2023-03-09 06:29:48'),
(29, 'App\\Models\\User', 1, 'SuperSchool', '1379be6ad1d23e81a042e1cf43efb32040a6e77d12be4a1e0a4fc3eeaa54610d', '[\"*\"]', NULL, '2023-03-09 06:31:13', '2023-03-09 06:31:13'),
(30, 'App\\Models\\User', 1, 'SuperSchool', 'e65a258bea93f5b36e6f7330d050b1851565499ea29c4d9da91946729512c396', '[\"*\"]', NULL, '2023-03-09 06:34:50', '2023-03-09 06:34:50'),
(31, 'App\\Models\\User', 1, 'SuperSchool', 'f26af18890403081d01ab000f0b81bd026ef0f77d80c7cd904144453950f01e0', '[\"*\"]', NULL, '2023-03-09 06:36:26', '2023-03-09 06:36:26'),
(32, 'App\\Models\\User', 1, 'SuperSchool', '25cf43f452f2f2035b5ef76ebdb8a903506ddf453afba535c17f7d90ae307911', '[\"*\"]', NULL, '2023-03-09 06:37:43', '2023-03-09 06:37:43'),
(33, 'App\\Models\\User', 1, 'SuperSchool', 'e10ba63aaeca8c2bde176511fd826ec9da3b44d01671d449324baafd7d031eb5', '[\"*\"]', NULL, '2023-03-09 06:40:20', '2023-03-09 06:40:20'),
(34, 'App\\Models\\User', 1, 'SuperSchool', '7dea9728af37228aca66ee452b6c3e91bef4b09013838e64f78493314e94042f', '[\"*\"]', NULL, '2023-03-09 06:46:08', '2023-03-09 06:46:08'),
(35, 'App\\Models\\User', 1, 'SuperSchool', '7e13eca3d0b6476d0177c1b1df1a5356efe6142012a3bde371710556d80f5674', '[\"*\"]', NULL, '2023-03-09 06:49:17', '2023-03-09 06:49:17'),
(36, 'App\\Models\\User', 1, 'SuperSchool', '65ba8fef5cd6a8a5d931105ec34cf956502a20e4a3f9dd59cc09c01169c495e4', '[\"*\"]', NULL, '2023-03-09 06:49:31', '2023-03-09 06:49:31'),
(37, 'App\\Models\\User', 1, 'SuperSchool', '3fe56279b69c45f4455b60fa3ea8625b1419760ec76d8b4772c49b6a137e7b20', '[\"*\"]', NULL, '2023-03-09 06:52:41', '2023-03-09 06:52:41'),
(38, 'App\\Models\\User', 1, 'SuperSchool', '975cbedb0bb2ea07af0bded1c7f8a9d0194870cc364475d5425a13daafe0617a', '[\"*\"]', NULL, '2023-03-09 06:53:15', '2023-03-09 06:53:15'),
(39, 'App\\Models\\User', 1, 'SuperSchool', '6831255dc42abb5f1cb960346080fc24f92704d5d30e106dcccc213c4ca5345a', '[\"*\"]', NULL, '2023-03-09 07:01:22', '2023-03-09 07:01:22'),
(40, 'App\\Models\\User', 1, 'SuperSchool', 'c06223ca4d91eafda9839ccd1c3aaf3403b5b1ce59e052b0c39e755f38ba505e', '[\"*\"]', NULL, '2023-03-09 07:14:07', '2023-03-09 07:14:07'),
(41, 'App\\Models\\User', 1, 'SuperSchool', '488e6eb8f71fb98b6fd81b73cd69453ea698dae9eeddc2204ebed89e09384917', '[\"*\"]', NULL, '2023-03-09 07:14:35', '2023-03-09 07:14:35'),
(42, 'App\\Models\\User', 1, 'SuperSchool', '766c51b1c17d8994c49ce5486bbfedca2bad46588974c387b92d96d76ef56e9e', '[\"*\"]', NULL, '2023-03-09 07:15:58', '2023-03-09 07:15:58'),
(43, 'App\\Models\\User', 1, 'SuperSchool', 'c5eebcffe4e6b5975ba0f1f48cd85e97ad3e3339bc3faea97d9adbdd66b0862f', '[\"*\"]', NULL, '2023-03-09 07:23:08', '2023-03-09 07:23:08'),
(44, 'App\\Models\\User', 1, 'SuperSchool', '33ea698d0d523fd6db964624fd79c96df396dc4960caab668020339d00b37458', '[\"*\"]', NULL, '2023-03-09 07:23:44', '2023-03-09 07:23:44'),
(45, 'App\\Models\\User', 1, 'SuperSchool', '4aa9d527f0cd0fa9c829672eca474e6f42c54be5823bf0a36b58e97170340825', '[\"*\"]', NULL, '2023-03-09 07:24:12', '2023-03-09 07:24:12'),
(46, 'App\\Models\\User', 1, 'SuperSchool', '88fc9908f6618b863f5563ea6db9d5a9cb722e5a5f33c64100a4fde1c19f1f25', '[\"*\"]', NULL, '2023-03-09 07:24:32', '2023-03-09 07:24:32'),
(47, 'App\\Models\\User', 1, 'SuperSchool', '9f2d19e866c326b35f4be9b028ae293e01bb2a6497bf8269fd95b6e217841a29', '[\"*\"]', NULL, '2023-03-09 07:26:26', '2023-03-09 07:26:26'),
(48, 'App\\Models\\User', 1, 'SuperSchool', 'f8b47cc9d8d133ceb40ea5ee6bcf5e8bebfa9beecd9e2c53af0411236e9f61dd', '[\"*\"]', NULL, '2023-03-09 07:26:47', '2023-03-09 07:26:47'),
(49, 'App\\Models\\User', 1, 'SuperSchool', '6b500fb1ab0c3ff0ac43dbc64880312142fd75f7ba43f502d8d14cd21f3bef2d', '[\"*\"]', NULL, '2023-03-09 07:31:29', '2023-03-09 07:31:29'),
(50, 'App\\Models\\User', 1, 'SuperSchool', '604f9985699e12931e02b89dc15c350c6573215641615212beb9655245b74b3d', '[\"*\"]', NULL, '2023-03-09 07:32:58', '2023-03-09 07:32:58'),
(51, 'App\\Models\\User', 1, 'SuperSchool', '5ae18e4b400b975782f90091ebc4072fd6cb46bb21d3f092bafa8afd4590531b', '[\"*\"]', NULL, '2023-03-09 07:34:07', '2023-03-09 07:34:07'),
(52, 'App\\Models\\User', 1, 'SuperSchool', '30cdda81936739cbab102e1e99a62929906c334ea79d7792c01ab4df0237a18d', '[\"*\"]', NULL, '2023-03-09 07:36:36', '2023-03-09 07:36:36'),
(53, 'App\\Models\\User', 1, 'SuperSchool', 'b71a2107247a129cf218e1d61e0bf00dc997ab08657b5bb69fc59e0d7b04c216', '[\"*\"]', NULL, '2023-03-09 07:37:11', '2023-03-09 07:37:11'),
(54, 'App\\Models\\User', 1, 'SuperSchool', '02a65c30a2d20145b12e04d2d2441debab6a24e0ee81c92b4e270603c9969a0f', '[\"*\"]', NULL, '2023-03-09 07:37:46', '2023-03-09 07:37:46'),
(55, 'App\\Models\\User', 1, 'SuperSchool', 'b76eeae09f7bdc6dd1568fd4f4be7ecacb152e229c42783b76d55389ae254add', '[\"*\"]', NULL, '2023-03-09 07:38:37', '2023-03-09 07:38:37'),
(56, 'App\\Models\\User', 1, 'SuperSchool', 'fb04682c1a6508c1d6b5f8e276f0242eee8abc544e68138b982ca832d80ebeeb', '[\"*\"]', NULL, '2023-03-09 07:46:52', '2023-03-09 07:46:52'),
(57, 'App\\Models\\User', 1, 'SuperSchool', 'c4df08a314282fe4713323106cde4acfdba154b84fca97efe8091139fb0b03a5', '[\"*\"]', NULL, '2023-03-09 07:48:36', '2023-03-09 07:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `plan_type` varchar(50) NOT NULL DEFAULT 'month',
  `interviews` int(11) NOT NULL,
  `stripe_plan_id` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `description`, `price`, `duration`, `plan_type`, `interviews`, `stripe_plan_id`, `isActive`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Basic Plan', NULL, 99.00, 1, 'month', 1, 'plan_Q8zkJdU6w8rojx', 1, '2024-05-20 20:14:52', '2024-05-20 20:14:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plan_features`
--

CREATE TABLE `plan_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_features`
--

INSERT INTO `plan_features` (`id`, `plan_id`, `name`, `created_at`, `updated_at`) VALUES
(6, 4, '1 Interview', '2024-05-20 20:14:52', '2024-05-20 20:14:52'),
(7, 4, 'HR or Technical Interviews', '2024-05-20 20:14:52', '2024-05-20 20:14:52'),
(8, 4, 'Interview as per job description', '2024-05-20 20:14:52', '2024-05-20 20:14:52'),
(9, 4, '30 minutes Interview Duration Time', '2024-05-20 20:14:52', '2024-05-20 20:14:52'),
(10, 4, 'View the recordings of conducted interviews', '2024-05-20 20:14:52', '2024-05-20 20:14:52'),
(11, 4, 'Other benefits of a plan is access to interview questions', '2024-05-20 20:14:52', '2024-05-20 20:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `permissions` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skill_name` varchar(255) DEFAULT NULL,
  `associated_task` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `associated_task`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test Skill', '', '2023-05-31 07:51:14', '2023-05-31 07:51:14', NULL),
(2, 'sgrg', '', '2023-05-31 07:51:37', '2023-05-31 07:51:37', NULL),
(3, 'sgrg', '', '2023-05-31 07:51:42', '2023-05-31 07:51:42', NULL),
(4, 'rgteg', '', '2023-05-31 07:52:02', '2023-05-31 07:52:02', NULL),
(5, 'rgtegfghfghf', '', '2023-05-31 07:52:09', '2023-05-31 07:52:09', NULL),
(6, 'rgtegfghfghf', '', '2023-05-31 07:52:10', '2023-05-31 07:52:10', NULL),
(7, 'Test Skill', '', '2023-05-31 07:53:34', '2023-05-31 07:53:34', NULL),
(8, 'Test Skill', '', '2023-05-31 07:53:49', '2023-05-31 07:53:49', NULL),
(9, 'fgdgd', '', '2023-05-31 07:57:00', '2023-05-31 07:57:00', NULL),
(10, 'dfdf', '', '2023-05-31 07:58:44', '2023-05-31 07:58:44', NULL),
(11, 'sadsad', '', '2023-05-31 08:10:31', '2023-05-31 08:10:31', NULL),
(12, 'ffrge', '', '2023-05-31 23:40:14', '2023-05-31 23:40:14', NULL),
(13, 'wfwfdfvfdvd', '', '2023-05-31 23:43:12', '2023-06-01 00:14:40', NULL),
(14, 'ffsdcsdcs', '', '2023-05-31 23:44:08', '2023-06-01 00:15:21', NULL),
(15, 'gggg', NULL, '2023-06-01 00:16:55', '2023-06-01 00:17:09', NULL),
(16, 'rrrr', NULL, '2023-06-01 00:17:17', '2023-06-01 00:17:17', NULL),
(17, 'Test Skill', NULL, '2023-06-07 08:21:31', '2023-06-07 08:21:31', NULL),
(18, 'test23456678', NULL, '2023-06-09 01:28:30', '2023-06-09 01:29:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsored_by_event_images`
--

CREATE TABLE `sponsored_by_event_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>Active, 0=>Deactivate',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsorships`
--

CREATE TABLE `sponsorships` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `price` double(9,2) DEFAULT NULL,
  `tickets_quantity` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1=>Sponsorship, 2=>Casino Game'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsorships`
--

INSERT INTO `sponsorships` (`id`, `name`, `image`, `price`, `tickets_quantity`, `status`, `created_at`, `updated_at`, `type`) VALUES
(1, 'SUPER High Roller Sponsor', 'super.jpg', 10000.00, 10, 1, '2023-06-28 01:04:22', '2023-06-28 01:04:22', 1),
(2, 'Jackpot Sponsor', 'jack.jpg', 7500.00, 8, 1, '2023-06-28 01:04:22', '2023-06-28 01:04:22', 1),
(3, 'HERO Sponsor', 'hero.png', 5000.00, 6, 1, '2023-06-28 01:04:22', '2023-10-06 05:51:08', 1),
(4, 'Royal Flush Sponsor', 'royal.jpg', 3000.00, 4, 1, '2023-06-28 01:04:22', '2023-06-28 01:04:22', 1),
(5, 'Full House Sponsor', 'house.jpg', 2500.00, 4, 1, '2023-06-28 01:04:22', '2023-10-06 05:34:43', 1),
(6, 'Valet Sponsor', 'valet.png', 1500.00, 2, 1, '2023-06-28 01:04:22', '2023-07-17 06:45:43', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sponsorships_logos`
--

CREATE TABLE `sponsorships_logos` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sponsorship_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sponsorship_benefits`
--

CREATE TABLE `sponsorship_benefits` (
  `id` int(10) UNSIGNED NOT NULL,
  `benefit` text NOT NULL,
  `sponsorship_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sponsorship_benefits`
--

INSERT INTO `sponsorship_benefits` (`id`, `benefit`, `sponsorship_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Logo on digital marketing material as Super High Roller Sponsor', 1, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(2, 'Ten tickets to the Event on November 11, 2023 at Illuminate Ballroom', 1, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(3, 'Company recognition as Super High Roller Sponsor on social media and press releases', 1, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(4, 'Visual and Verbal recognition at the event', 1, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(5, 'Speaking Opportunity at event', 1, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(6, 'Logo on digital Invitation as Silent Auction Sponsor', 2, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(7, 'Logo on digital marketing materials as Silent Auction Sponsor', 2, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(8, 'Eight tickets to the Event on November 11, 2023 at Illuminate Ballroom', 2, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(9, 'Special Signage/Logo at the Silent Auction', 2, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(10, 'Visual and Verbal recognition at the event', 2, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(15, 'Logo on digital Invitation as Beverage Sponsor', 4, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(16, 'Logo on digital marketing materials as Beverage Sponsor', 4, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(17, 'Four tickets to the Event on November 11, 2023 at Illuminate Ballroom', 4, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(18, 'Visual and Verbal recognition at the event', 4, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(19, 'Special signage at Bars as Beverage Sponsor', 4, '2023-06-28 01:04:22', '2023-06-28 01:04:22', NULL),
(36, 'test2', 9, '2023-07-07 01:21:05', '2023-07-07 01:21:05', NULL),
(37, 'test3', 9, '2023-07-07 01:21:05', '2023-07-07 01:21:05', NULL),
(38, 'test4', 9, '2023-07-07 01:21:05', '2023-07-07 01:21:05', NULL),
(39, 'test', 10, '2023-07-07 01:41:06', '2023-07-07 01:41:06', NULL),
(40, 'test3', 10, '2023-07-07 01:41:06', '2023-07-07 01:41:06', NULL),
(49, 'test', 11, '2023-07-10 01:08:15', '2023-07-10 01:08:15', NULL),
(54, 'Logo on digital Invitation as Valet Sponsor', 6, '2023-07-17 06:45:43', '2023-07-17 06:45:43', NULL),
(55, 'Logo on digital marketing materials as Valet Sponsor', 6, '2023-07-17 06:45:43', '2023-07-17 06:45:43', NULL),
(56, 'Two tickets to the Event on November 11, 2023 at Illuminate Ballroom', 6, '2023-07-17 06:45:43', '2023-07-17 06:45:43', NULL),
(57, 'Visual and Verbal recognition at the event plus Special signage at Valet as Sponsor', 6, '2023-07-17 06:45:43', '2023-07-17 06:45:43', NULL),
(59, 'test', 12, '2023-10-04 01:29:56', '2023-10-04 01:29:56', NULL),
(60, 'dsdsd', 12, '2023-10-04 01:29:56', '2023-10-04 01:29:56', NULL),
(61, 'Test Casino Game', 28, '2023-10-04 02:04:30', '2023-10-04 02:04:30', NULL),
(62, 'Test Casino Game 1', 28, '2023-10-04 02:04:30', '2023-10-04 02:04:30', NULL),
(63, 'Test Casino Game', 29, '2023-10-04 02:19:46', '2023-10-04 02:19:46', NULL),
(64, 'Test Casino Game 1', 29, '2023-10-04 02:19:46', '2023-10-04 02:19:46', NULL),
(69, 'Test Casino Gamefd', 30, '2023-10-04 02:28:20', '2023-10-04 02:28:20', NULL),
(70, 'Test Casino Game2', 30, '2023-10-04 02:28:20', '2023-10-04 02:28:20', NULL),
(71, 'dfdfd', 30, '2023-10-04 02:28:20', '2023-10-04 02:28:20', NULL),
(72, 'Test Casino Game', 31, '2023-10-04 02:41:22', '2023-10-04 02:41:22', NULL),
(73, 'Test Casino Game2', 31, '2023-10-04 02:41:22', '2023-10-04 02:41:22', NULL),
(74, 'Test Casino Game', 32, '2023-10-04 02:42:08', '2023-10-04 02:42:08', NULL),
(75, 'Test Casino Game 1', 32, '2023-10-04 02:42:08', '2023-10-04 02:42:08', NULL),
(76, 'Logo on digital Invitation as HERO Sponsor', 3, '2023-10-06 05:51:08', '2023-10-06 05:51:08', NULL),
(77, 'Logo on digital marketing materials as HERO Sponsor', 3, '2023-10-06 05:51:08', '2023-10-06 05:51:08', NULL),
(78, 'Six tickets to the Event on November 11, 2023 at Illuminate Ballroom', 3, '2023-10-06 05:51:08', '2023-10-06 05:51:08', NULL),
(79, 'Visual and Verbal recogn', 3, '2023-10-06 05:51:08', '2023-10-06 05:51:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_status` varchar(255) NOT NULL,
  `stripe_price` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `stripe_product` varchar(255) NOT NULL,
  `stripe_price` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) DEFAULT NULL,
  `task_name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `skill_id`, `task_name`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 14, 'sasa', 3, '2023-07-01 04:41:10', '2023-06-01 06:23:37', NULL),
(3, 12, 'sa', 3, '2023-06-02 04:31:00', '2023-06-02 04:31:00', NULL),
(4, 12, 'dsdf', 3, '2023-06-02 04:31:17', '2023-06-02 04:31:17', NULL),
(5, 15, 'pending', 3, '2023-06-06 07:00:25', '2023-06-06 07:00:25', NULL),
(6, 18, 'pending task', 3, '2023-06-08 23:22:50', '2023-06-09 01:31:43', NULL),
(7, 1, 'test', 3, '2023-06-09 01:30:46', '2023-06-09 01:30:46', NULL),
(8, 17, 'pending task', 32, '2023-10-30 00:47:20', '2023-10-30 00:47:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) NOT NULL,
  `ip` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double(9,2) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `image`, `quantity`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'General Admission Ticket', 'ticket.png', 1000, 150.00, 1, '2023-06-29 06:06:46', '2023-07-17 06:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `transections`
--

CREATE TABLE `transections` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `stripe_charge_id` text DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `object` varchar(255) DEFAULT NULL,
  `amount_captured` int(11) DEFAULT NULL,
  `amount_refunded` int(11) DEFAULT NULL,
  `application` varchar(255) DEFAULT NULL,
  `application_fee` varchar(255) DEFAULT NULL,
  `application_fee_amount` varchar(255) DEFAULT NULL,
  `balance_transaction` text DEFAULT NULL,
  `billing_details` text DEFAULT NULL,
  `calculated_statement_descriptor` varchar(255) DEFAULT NULL,
  `captured` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `customer` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `destination` text DEFAULT NULL,
  `dispute` varchar(255) DEFAULT NULL,
  `disputed` varchar(255) DEFAULT NULL,
  `failure_balance_transaction` varchar(255) DEFAULT NULL,
  `failure_code` varchar(255) DEFAULT NULL,
  `failure_message` varchar(255) DEFAULT NULL,
  `fraud_details` text DEFAULT NULL,
  `livemode` varchar(255) DEFAULT NULL,
  `metadata` text DEFAULT NULL,
  `on_behalf_of` text DEFAULT NULL,
  `order` varchar(255) DEFAULT NULL,
  `outcome` text DEFAULT NULL,
  `paid` varchar(255) DEFAULT NULL,
  `payment_intent` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_method_details` text DEFAULT NULL,
  `receipt_email` varchar(255) DEFAULT NULL,
  `receipt_number` bigint(20) DEFAULT NULL,
  `receipt_url` text DEFAULT NULL,
  `refunded` varchar(255) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `shipping` varchar(255) DEFAULT NULL,
  `source` text DEFAULT NULL,
  `source_transfer` varchar(255) DEFAULT NULL,
  `statement_descriptor` varchar(255) DEFAULT NULL,
  `statement_descriptor_suffix` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `transfer_data` varchar(255) DEFAULT NULL,
  `transfer_group` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transections`
--

INSERT INTO `transections` (`id`, `user_id`, `stripe_charge_id`, `amount`, `object`, `amount_captured`, `amount_refunded`, `application`, `application_fee`, `application_fee_amount`, `balance_transaction`, `billing_details`, `calculated_statement_descriptor`, `captured`, `currency`, `customer`, `description`, `destination`, `dispute`, `disputed`, `failure_balance_transaction`, `failure_code`, `failure_message`, `fraud_details`, `livemode`, `metadata`, `on_behalf_of`, `order`, `outcome`, `paid`, `payment_intent`, `payment_method`, `payment_method_details`, `receipt_email`, `receipt_number`, `receipt_url`, `refunded`, `review`, `shipping`, `source`, `source_transfer`, `statement_descriptor`, `statement_descriptor_suffix`, `status`, `transfer_data`, `transfer_group`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 100, 'charge', NULL, NULL, NULL, NULL, NULL, 'txn_3NVDHZAjYUUMCBp41apfLFYn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'card_1NVDHXAjYUUMCBp454CQXNKo', NULL, NULL, NULL, 'https://pay.stripe.com/receipts/payment/CAcQARoXChVhY2N0XzFNVFdNMkFqWVVVTUNCcDQo8pLapQYyBmsQE8-vtDosFujxTF95HgZbo9wUjwRf-OEu703kAy5_H7D-ebSK-TvHMFCPkK_DdhE1cug', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'succeeded', NULL, NULL, '2023-07-18 12:45:38', '2023-07-18 12:45:38'),
(27, NULL, NULL, 10000, 'charge', NULL, NULL, NULL, NULL, NULL, 'txn_3Ne00gAjYUUMCBp401oc30R5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'card_1Ne00dAjYUUMCBp4Sp36vTxQ', NULL, NULL, NULL, 'https://pay.stripe.com/receipts/payment/CAcQARoXChVhY2N0XzFNVFdNMkFqWVVVTUNCcDQo3_nZpgYyBtSyXhVTwjosFoNUzuVzCghG8g6F014ZAJs2YzenpO5uDX0C1hg590HTMawjSS9gcWL56h4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'succeeded', NULL, NULL, '2023-08-11 18:24:31', '2023-08-11 18:24:31'),
(51, NULL, NULL, 10000, 'charge', NULL, NULL, NULL, NULL, NULL, 'txn_3Nk9XfAjYUUMCBp41JEN4qSX', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'card_1Nk9XcAjYUUMCBp4VsfjwuXp', NULL, NULL, NULL, 'https://pay.stripe.com/receipts/payment/CAcQARoXChVhY2N0XzFNVFdNMkFqWVVVTUNCcDQo0LuzpwYyBgI1Rm07MDosFgnEZ6HIsgAkryPEpI3HNfh_-KIazQcwW2Rcr_1_r7wIpcu57NOnga1qENk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'succeeded', NULL, NULL, '2023-08-28 17:48:00', '2023-08-28 17:48:00'),
(52, NULL, NULL, 300000, 'charge', NULL, NULL, NULL, NULL, NULL, 'txn_3NnpnFAjYUUMCBp413p8HowR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'card_1NnpnAAjYUUMCBp4ZXLCha95', NULL, NULL, NULL, 'https://pay.stripe.com/receipts/payment/CAcQARoXChVhY2N0XzFNVFdNMkFqWVVVTUNCcDQopoLppwYyBrj2F7wF1TosFvFJ__zxW2PGi3amFrIv2ba_VuJrjpRjHsOF-chL331OAnt-H0ZqLOP35V8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'succeeded', NULL, NULL, '2023-09-07 21:31:18', '2023-09-07 21:31:18'),
(53, NULL, NULL, 150000, 'charge', NULL, NULL, NULL, NULL, NULL, 'txn_3NnqZNAjYUUMCBp408v929Aw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'card_1NnqZ4AjYUUMCBp4G1vzwfbH', NULL, NULL, NULL, 'https://pay.stripe.com/receipts/payment/CAcQARoXChVhY2N0XzFNVFdNMkFqWVVVTUNCcDQoz5nppwYyBpQf-DntOTosFt4-rDNJcefipK51jy-sIWmSWi4CDCGd5x3rN6k-UyNVcI8dZa_337FkzS8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'succeeded', NULL, NULL, '2023-09-07 22:21:03', '2023-09-07 22:21:03'),
(60, NULL, NULL, 30000, 'charge', NULL, NULL, NULL, NULL, NULL, 'txn_3NrnmbAjYUUMCBp40KOGGQSo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'card_1NrnmZAjYUUMCBp4r0MiYcWq', NULL, NULL, NULL, 'https://pay.stripe.com/receipts/payment/CAcQARoXChVhY2N0XzFNVFdNMkFqWVVVTUNCcDQo1t2iqAYyBkJeskl-gTosFhr-QHw3CDRnBuRCZ-rN-Nih9TgMA4osmCwePZScZPjGgfVpBgej9W6bnv0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'succeeded', NULL, NULL, '2023-09-18 20:11:02', '2023-09-18 20:11:02'),
(61, NULL, NULL, 10000, 'charge', NULL, NULL, NULL, NULL, NULL, 'txn_3Ns50lAjYUUMCBp40UTYe636', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'card_1Ns50iAjYUUMCBp41sAVB5SD', NULL, NULL, NULL, 'https://pay.stripe.com/receipts/payment/CAcQARoXChVhY2N0XzFNVFdNMkFqWVVVTUNCcDQoiOOmqAYyBvFRXDvx8TosFvV7deGIUFy3SfUbZHGniciaXJzDFrDXuZR1uPv_yU611TauoSlPQKswfk8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'succeeded', NULL, NULL, '2023-09-19 14:34:48', '2023-09-19 14:34:48'),
(70, NULL, NULL, 10000, 'charge', NULL, NULL, NULL, NULL, NULL, 'txn_3NtESLAjYUUMCBp41fug8pHo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'card_1NtESJAjYUUMCBp4QTncMwP6', NULL, NULL, NULL, 'https://pay.stripe.com/receipts/payment/CAcQARoXChVhY2N0XzFNVFdNMkFqWVVVTUNCcDQo0sS3qAYyBvdAK6RyRzosFus9eB0pJZR2dMyxFsZFDtk84DvoOcXtBZhLsFbYIrWzMs210ihn2yT2HuA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'succeeded', NULL, NULL, '2023-09-22 18:52:03', '2023-09-22 18:52:03'),
(71, NULL, NULL, 10000, 'charge', NULL, NULL, NULL, NULL, NULL, 'txn_3NtJpnAjYUUMCBp40YbEYuvd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'card_1NtJpkAjYUUMCBp4g3fFK2kG', NULL, NULL, NULL, 'https://pay.stripe.com/receipts/payment/CAcQARoXChVhY2N0XzFNVFdNMkFqWVVVTUNCcDQolOa4qAYyBkOq-HornzosFppriDoki1fUdnVa63AN2J2kYcSq02Sf0KaExwcCetGnl0Ng8mQe7ap0ofA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'succeeded', NULL, NULL, '2023-09-23 00:36:37', '2023-09-23 00:36:37'),
(72, NULL, NULL, 20000, 'charge', NULL, NULL, NULL, NULL, NULL, 'txn_3NviEjAjYUUMCBp400TJ8p0H', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'card_1NviEhAjYUUMCBp4RrfSS7tO', NULL, NULL, NULL, 'https://pay.stripe.com/receipts/payment/CAcQARoXChVhY2N0XzFNVFdNMkFqWVVVTUNCcDQo787bqAYyBmi2wTq9ijosFg7dcyCUi1vhd-NQU4QR91UsDwburpsmccL-1EGs_Bg2ELLwJ_qT2ckR_Fw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'succeeded', NULL, NULL, '2023-09-29 15:04:15', '2023-09-29 15:04:15'),
(73, NULL, NULL, 10000, 'charge', NULL, NULL, NULL, NULL, NULL, 'txn_3Nx8NsAjYUUMCBp40YXa0qj1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'card_1Nx8NqAjYUUMCBp4DfKYedzx', NULL, NULL, NULL, 'https://pay.stripe.com/receipts/payment/CAcQARoXChVhY2N0XzFNVFdNMkFqWVVVTUNCcDQohabwqAYyBlVWjuo3LDosFgG3Y2Rr4IVTOpHvYm4BDgDf9kmgOHUyQDh9wlyiYz8mSI8JA4ZB0I84iGY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'succeeded', NULL, NULL, '2023-10-03 13:11:33', '2023-10-03 13:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` int(11) DEFAULT NULL COMMENT '1=>Admin, 2=>Teacher, 3=>Kid, 4=Frontend User, 5=School Admin, 6=>Fundraising',
  `email` varchar(255) DEFAULT NULL,
  `linked_teacher` int(11) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `stripe_id` varchar(255) DEFAULT NULL,
  `pm_type` varchar(255) DEFAULT NULL,
  `pm_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `linked_teacher`, `phone`, `image`, `type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 'Admin User', 1, 'superadmin@gmail.com', NULL, NULL, NULL, 'admin', NULL, '$2y$10$vmya1wikUowFc0BRAhf6MuvnHIB8..CpjQYZ3LS66KCwq.RF7lLMq', NULL, '2023-03-09 06:20:29', '2023-03-29 07:11:59', NULL, NULL, NULL, NULL, NULL),
(3, 'Teacher John', 2, 'teacher@yopmail.com', NULL, '1234567890', 'logo.png', 'user', NULL, '$2y$10$cosy/ayClSNteGGjhPB6EenjAFu55kr8ux7LXuhxbrSYW6ljlEA02', NULL, '2023-03-28 05:50:23', '2023-07-04 06:03:42', NULL, NULL, NULL, NULL, NULL),
(20, 'Mark', 3, 'mark@gmail.com', 3, NULL, NULL, 'user', NULL, '$2y$10$cosy/ayClSNteGGjhPB6EenjAFu55kr8ux7LXuhxbrSYW6ljlEA02', NULL, '2023-05-26 02:10:52', '2023-05-26 02:10:52', NULL, NULL, NULL, NULL, NULL),
(21, 'John Doe', 4, 'testmonika2@yopmail.com', 3, NULL, 'pt-1.png', 'user', NULL, '$2y$10$vmya1wikUowFc0BRAhf6MuvnHIB8..CpjQYZ3LS66KCwq.RF7lLMq', NULL, '2023-05-26 05:25:17', '2023-05-26 05:25:17', NULL, NULL, NULL, NULL, NULL),
(22, 'Test Business', 3, '', 3, NULL, '', 'user', NULL, '0', NULL, '2023-05-29 07:29:23', '2023-05-29 07:29:23', NULL, NULL, NULL, NULL, NULL),
(23, 'Test team', 3, '', 3, NULL, '', 'user', NULL, '0', NULL, '2023-05-29 07:32:09', '2023-05-29 07:32:09', NULL, NULL, NULL, NULL, NULL),
(24, 'abc', 3, '', 3, NULL, '', 'user', NULL, '0', NULL, '2023-06-06 07:08:05', '2023-06-06 07:08:05', NULL, NULL, NULL, NULL, NULL),
(25, 'abc', 3, '', 3, NULL, 'dummy-postcard (1).jpg', 'user', NULL, '0', NULL, '2023-06-07 06:48:16', '2023-06-07 06:48:16', NULL, NULL, NULL, NULL, NULL),
(26, 'sarab', 3, '', 3, NULL, 'book.jpg', 'user', NULL, '0', NULL, '2023-06-07 06:51:19', '2023-06-07 06:51:19', NULL, NULL, NULL, NULL, NULL),
(27, 'sarab', 3, '', 3, NULL, 'book.jpg', 'user', NULL, '0', NULL, '2023-06-07 06:52:40', '2023-06-07 06:52:40', NULL, NULL, NULL, NULL, NULL),
(28, 'collabo', 3, '', 3, NULL, 'research.png', 'user', NULL, '0', NULL, '2023-06-07 06:53:22', '2023-06-07 06:53:22', NULL, NULL, NULL, NULL, NULL),
(29, 'test45', 3, '', 3, NULL, 'istockphoto-868381044-612x612.jpg', 'user', NULL, '0', NULL, '2023-06-07 08:22:06', '2023-06-07 08:22:06', NULL, NULL, NULL, NULL, NULL),
(30, 'sarab', 3, '', 3, NULL, 'user_upload_1677134350.png', 'user', NULL, '0', NULL, '2023-06-08 00:57:44', '2023-06-08 00:57:44', NULL, NULL, NULL, NULL, NULL),
(32, 'Admin', 5, 'mainadmin@gmail.com', NULL, '9888525847', '1652805691.png', 'user', NULL, '$2y$10$vmya1wikUowFc0BRAhf6MuvnHIB8..CpjQYZ3LS66KCwq.RF7lLMq', NULL, '2023-06-09 00:17:09', '2024-05-19 08:59:07', NULL, NULL, NULL, NULL, NULL),
(33, 'admin', 3, '', 3, NULL, 'logo.png', 'user', NULL, '0', NULL, '2023-06-09 01:27:29', '2023-06-09 01:27:29', NULL, NULL, NULL, NULL, NULL),
(34, 'test45', 5, 'admi1n@gmail.com', NULL, NULL, 'logo.png', 'user', NULL, '$2y$10$g59oIwQuxbe2R.MPB6F4OexWaZLkjLT66cHCinDPo4dUBi.clI2by', NULL, '2023-06-12 00:05:50', '2023-06-12 00:05:50', NULL, NULL, NULL, NULL, NULL),
(52, 'sarab', 6, 'qqq@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$YDRf7OzroDpm3C3FlWfDWeFLpv3QdWm7GbrJ27Jqbz5cj/85kCIu6', NULL, '2023-06-28 08:07:36', '2023-06-28 08:07:36', NULL, NULL, NULL, NULL, NULL),
(53, 'sarab', 6, 'sarab@creativebuffer.com', NULL, '(147) 852-3690', '', 'user', NULL, '$2y$10$XKOl.7gG6jSsAkFk80aNyuTuQKR0/0CDIlDW/jWlURoSombKWRyAi', NULL, '2023-06-28 08:09:33', '2023-07-19 02:18:41', NULL, NULL, NULL, NULL, NULL),
(58, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$cCgYc1oKWTAO53PHmgYFBej5npoUeRqtaWtV9vwJpPVpI.lFuEMai', NULL, '2023-06-29 01:27:53', '2023-06-29 01:27:53', NULL, NULL, NULL, NULL, NULL),
(59, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$cOYH9TVoOrxK5pUNnDTXj.hk/YX6DRsBHVkzNBEeSRaW3JZUD8e9C', NULL, '2023-06-29 01:30:42', '2023-06-29 01:30:42', NULL, NULL, NULL, NULL, NULL),
(60, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$EW7saMn2oLphM1u9Ne4IReVjlhdu3.1Pk1jgRVyLN7cj5TiLGkyAW', NULL, '2023-06-29 01:36:41', '2023-06-29 01:36:41', NULL, NULL, NULL, NULL, NULL),
(61, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$dFmoN/ZQFqMyJhiVeFBp6eBOl3bi/cWQ0wWnMqdv8wFi1mGGb4n9y', NULL, '2023-06-29 01:37:43', '2023-06-29 01:37:43', NULL, NULL, NULL, NULL, NULL),
(62, 'admin', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$CtXpt/6mg.1Ibc7t90Ek4.N1vmaSe9ZwBGfq2B/k6ppi6O.aH47bW', NULL, '2023-06-29 01:41:28', '2023-06-29 01:41:28', NULL, NULL, NULL, NULL, NULL),
(63, 'admin', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$YXSjssOTByq0PIn0A/4E..DlP9heGdsm0fXPg435BqAX6DXTz0lOO', NULL, '2023-06-29 01:42:09', '2023-06-29 01:42:09', NULL, NULL, NULL, NULL, NULL),
(64, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$AW0lTbOHCNOkQTiAiTCkIevHPOi4P6HZVDa46uiJjRoxuRewTRh5S', NULL, '2023-06-29 01:47:06', '2023-06-29 01:47:06', NULL, NULL, NULL, NULL, NULL),
(65, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$0xA0G2AiqOu1Uwv925or/eN0QOkWCbaLAxhgNepp/o.E5lSvUWaHK', NULL, '2023-06-29 02:56:20', '2023-06-29 02:56:20', NULL, NULL, NULL, NULL, NULL),
(66, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$eBayLteB8PVq5f0mLzn3nuvYxX/sSrOKAJi6zm7efI54.QfcvPrLi', NULL, '2023-06-29 02:57:16', '2023-06-29 02:57:16', NULL, NULL, NULL, NULL, NULL),
(67, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$V6t.GmmSt1mt6wVjczYcheoH8nNFSu8xuA/GjyUfyz482FjERCaSO', NULL, '2023-06-29 02:58:18', '2023-06-29 02:58:18', NULL, NULL, NULL, NULL, NULL),
(68, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$4pcjoE08X9W0M9UeFoWereWfccFPWUU/e/KXLvcIoOiS9zvMQnAKS', NULL, '2023-06-29 02:59:02', '2023-06-29 02:59:02', NULL, NULL, NULL, NULL, NULL),
(69, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$PwM4qB2C6UYGxFUkLmohTOtFgvmGQMzeiLmYTM64ToUc/WLbTHxbi', NULL, '2023-06-29 03:00:40', '2023-06-29 03:00:40', NULL, NULL, NULL, NULL, NULL),
(70, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$VR3g5pE1U.f/V/bSznd6bucit8EA1E2N3h272p1pHm9wdSGOiTOgm', NULL, '2023-06-29 04:13:31', '2023-06-29 04:13:31', NULL, NULL, NULL, NULL, NULL),
(71, '', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$qhkyjTS6nTyHmadQW.365u6YlJcAKVlPEBm5eAaYGsSLM/LyEC1X6', NULL, '2023-06-29 04:21:01', '2023-06-29 04:21:01', NULL, NULL, NULL, NULL, NULL),
(72, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$rIuRhemsMBe9YLjWyE3C8OLvfZYa05AaQMxvl759twmlIcjYhKRau', NULL, '2023-06-29 04:21:53', '2023-06-29 04:21:53', NULL, NULL, NULL, NULL, NULL),
(73, 'abc', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$NTnhKkKq6HjRtvhtNj/nAe.UDQsVTqSlRmNzBjuy1AId7CRKPu9g2', NULL, '2023-06-29 04:30:33', '2023-06-29 04:30:33', NULL, NULL, NULL, NULL, NULL),
(74, 'abc', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$2nCQBhtO0rAfjOvw/gVW/.hpi4acVNncsqFVtxmsTPe76yZVa974m', NULL, '2023-06-29 04:32:31', '2023-06-29 04:32:31', NULL, NULL, NULL, NULL, NULL),
(75, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$2C7A7z/73a2AFviTApx5Ne9LbEOLb9ib23WWglC6LTsw2b/sZNVRq', NULL, '2023-06-29 04:33:15', '2023-06-29 04:33:15', NULL, NULL, NULL, NULL, NULL),
(76, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$QsvWZnchzl57Qi9dZzFgzeAgvrY3OBfLh1ykNYX6aCtkqHBNRgPMq', NULL, '2023-06-29 05:17:51', '2023-06-29 05:17:51', NULL, NULL, NULL, NULL, NULL),
(77, 'dssc', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$qCalDe5XNcTnCnveV.Qjae4r1luiR7La.j14pB6JAP5teARY5dAyG', NULL, '2023-06-29 05:19:50', '2023-06-29 05:19:50', NULL, NULL, NULL, NULL, NULL),
(78, 'abc', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$GYIyzb4rCGy6A.xcGudByegNsFIQPfTYFTx8D4KL6PljW4W5Oz1Jy', NULL, '2023-06-29 05:29:09', '2023-06-29 05:29:09', NULL, NULL, NULL, NULL, NULL),
(79, 'dds', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$KmYi8sEE/iKtdhsvE1FAtO67sqannOmSbXurLy0gQ7j6JaM99fyWG', NULL, '2023-06-29 05:31:37', '2023-06-29 05:31:37', NULL, NULL, NULL, NULL, NULL),
(80, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$4wCNxZnJB2Z2g4DZT6zA1..HMnhUutr2q8gqJZiMUZtIrZZWNYLlS', NULL, '2023-06-29 05:32:17', '2023-06-29 05:32:17', NULL, NULL, NULL, NULL, NULL),
(81, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$IoD5jbBGaCiR55kO46mFJugHfzMP2BQpf286xm1QdXaGKE5.oe1SW', NULL, '2023-06-29 05:34:38', '2023-06-29 05:34:38', NULL, NULL, NULL, NULL, NULL),
(82, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$O8BMUQ6usTM6VEUL0q55NefmbVrFjomaDvVEhz4cdXBfFqQFkUSka', NULL, '2023-06-29 05:38:48', '2023-06-29 05:38:48', NULL, NULL, NULL, NULL, NULL),
(83, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$c0xd3cCozCCdI8C3UH1MiOhmZYWpHEhfOjqPXiiEDP8ei9oTlBRvq', NULL, '2023-06-29 05:40:06', '2023-06-29 05:40:06', NULL, NULL, NULL, NULL, NULL),
(84, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$Hr87g/0LN2NJo3Caos7J2OKSM1q5tUtmrTptxuKc/l5EQAfy4nvym', NULL, '2023-06-29 05:41:42', '2023-06-29 05:41:42', NULL, NULL, NULL, NULL, NULL),
(85, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$ywT0TTij6OPigkCTLsnD3eNu/sK6ZRjWLZlx9qTOkz6v6OJOKM48.', NULL, '2023-06-29 05:50:36', '2023-06-29 05:50:36', NULL, NULL, NULL, NULL, NULL),
(86, 'sarab', 6, 'sarabjeet@creativebuffer.com', NULL, NULL, NULL, 'user', NULL, '$2y$10$jNb9M..3BNGHZA/Obz7p2OqoD9vx.DWK96HMucP4qqGea3ZQ16o8S', NULL, '2023-06-29 05:52:11', '2023-06-29 05:52:11', NULL, NULL, NULL, NULL, NULL),
(87, 'Pawan Panwar', 6, 'pawanpanwar264@gmail.com', NULL, '9988337743', '', 'user', NULL, '$2y$10$Srilo6bUEcWIhqj6ybIZJ.iwz9ny6nEVHngD9Qlxv5KNtuOZ0RS0a', NULL, '2023-06-29 23:57:59', '2023-06-30 00:29:14', NULL, NULL, NULL, NULL, NULL),
(88, 'sarab', 6, 'pawan@creativebuffer.com', NULL, '8506802351', NULL, 'user', NULL, '$2y$10$W55oS6TduzbqyxPNLnL2V.tm8ZvLqtL7daBzuemg18ITA4nV1J7VW', NULL, '2023-06-30 02:45:18', '2023-06-30 02:45:18', NULL, NULL, NULL, NULL, NULL),
(90, 'teacher', 2, 'teacher1234@creativebuffer.com', NULL, NULL, '', 'user', NULL, '$2y$10$RKQ8oTxMoSPhNKYu.VcehuVAZ6Q0qGjv3pbIdJfSevEsBfRmLXO7K', NULL, '2023-06-30 06:04:25', '2024-05-19 10:18:39', '2024-05-19 15:48:39', NULL, NULL, NULL, NULL),
(91, 'abc', 3, '', 32, NULL, 'child.jpg', 'user', NULL, '0', NULL, '2023-07-04 04:35:03', '2023-07-04 04:35:03', NULL, NULL, NULL, NULL, NULL),
(92, 'dd', 3, '', 32, NULL, 'login-profile.png', 'user', NULL, '0', NULL, '2023-07-04 06:25:53', '2023-07-04 06:25:53', NULL, NULL, NULL, NULL, NULL),
(93, 'deds', 6, 'wsedw@erf.rtftr', NULL, '8506802351', NULL, 'user', NULL, '$2y$10$oMUzCEu2eaigYwSDohHsRuVXMH/0RgQs6s15b.q9oB4CTZFB5MKUi', NULL, '2023-07-07 08:40:13', '2023-07-07 08:40:13', NULL, NULL, NULL, NULL, NULL),
(94, 'User Test', 6, 'user@gmail.com', NULL, '8506802351', 'avatar.jpg', 'user', NULL, '$2y$10$2g.kdVUQNzCQ/PHEK7Fho.DxMDYDtHeDQpEoerLfukcv3c1hnHvJm', NULL, '2023-07-07 08:43:52', '2023-07-07 08:44:16', NULL, NULL, NULL, NULL, NULL),
(96, 'teacher', 6, 'admin@gmail.com', NULL, '8506802351', '', 'user', NULL, '$2y$10$51Jw.Ev5gUI/cQINXVqsF.oXIxaoDLvoxgZGSqimadT1E2OecVrGe', NULL, '2023-07-12 00:43:27', '2023-07-12 01:10:01', NULL, NULL, NULL, NULL, NULL),
(97, 'teacher', 6, 'htyh@gmail.com', NULL, '8506802351', NULL, 'user', NULL, '$2y$10$bRuYYM./X8u3uaxzhPHlduEUqbWM9TNz7s7RImibXNK7dNC.B470W', NULL, '2023-07-12 00:44:20', '2023-07-12 00:44:20', NULL, NULL, NULL, NULL, NULL),
(99, 'teacher', 6, 'harry@gmail.com', NULL, '(085) 068-0245', '', 'user', NULL, '$2y$10$O1iVv2/s/ryHVZtQr9zVqOEyoFB7bKLVkEJ53KZbD4mfXHFJSju3K', NULL, '2023-07-14 07:32:32', '2023-07-14 07:36:58', NULL, NULL, NULL, NULL, NULL),
(100, 'teacher', 3, '', 32, NULL, 'Orangeherm logo.png', 'user', NULL, '0', NULL, '2023-09-22 06:51:54', '2023-09-22 06:51:54', NULL, NULL, NULL, NULL, NULL),
(101, 'teacher', 3, '', 32, NULL, 'pines.png', 'user', NULL, '0', NULL, '2023-09-22 06:59:06', '2023-09-22 06:59:06', NULL, NULL, NULL, NULL, NULL),
(102, 'teacher', 3, '', 32, NULL, 'Orangeherm logo.png', 'user', NULL, '0', NULL, '2023-09-22 07:04:13', '2023-09-22 07:04:13', NULL, NULL, NULL, NULL, NULL),
(137, 'User Test1', 6, 'usertest@gmail.com', NULL, '8506802351', 'avatar.jpg', 'user', NULL, '$2y$10$8X.yR/YSP/xapi9SB/V9SOtrMBs7fEO8yveoLWHnVxi71SCHAWSVG', NULL, '2023-07-07 08:51:39', '2023-07-07 08:51:49', NULL, NULL, NULL, NULL, NULL),
(138, 'teacher', 6, 'sarabrr@gmail.com', NULL, '(085) 068-0235', NULL, 'user', NULL, '$2y$10$MFc6xVVvlYxIV.uHc/MY8umnk0J0sxdcU/fgXycVdCgB1jm3be/Si', NULL, '2023-07-14 01:18:41', '2023-07-14 01:18:41', NULL, NULL, NULL, NULL, NULL),
(140, 'sarab', NULL, 'sarabdevo@yopmail.com', NULL, '1234567891234', NULL, 'candidate', NULL, '$2y$10$TAWoKks8EGEdY.Fqn0sL.u6JrXQWu3aMVwp/8YogMPaAye7mcZciu', NULL, '2024-05-21 11:05:05', '2024-05-21 11:34:18', NULL, 'cus_Q9EZWmxEwAkFO4', NULL, NULL, NULL),
(141, 'Chelsea Owen', NULL, 'kiliwuvoc@mailinator.com', NULL, '1453556585311', NULL, 'candidate', NULL, '$2y$10$gh2U8ldj3XmGCLHxTYnggOXP6JmvElT4pPok3LqcjLjDrqCEsVj0y', NULL, '2024-05-21 19:27:00', '2024-05-21 19:27:00', NULL, NULL, NULL, NULL, NULL),
(142, 'Mallory Carlson', NULL, 'holytolehy@mailinator.com', NULL, '1386146880733', NULL, 'candidate', NULL, '$2y$10$ubzW5y4m6kfr.Sw2xzqXeOwl1HTkWpMuzS.ko4UYUyB8hDbxFNwha', NULL, '2024-05-21 19:45:55', '2024-05-21 19:52:10', NULL, 'cus_Q9MbCkEOlGD3ap', NULL, NULL, NULL),
(143, 'Ivy Dominguez', NULL, 'konyre@mailinator.com', NULL, '1176553609633', NULL, 'candidate', NULL, '$2y$10$P9SUS/CVgDpKczIFRkIRzOAir1GzNSxQpNCXOeRnOTjiO8I21a/Mm', NULL, '2024-05-21 20:31:02', '2024-05-21 20:31:02', NULL, NULL, NULL, NULL, NULL),
(144, 'Amber Kinney', NULL, 'qugedyvam@mailinator.com', NULL, '1661554265522', NULL, 'candidate', NULL, '$2y$10$ncqH2X.IuVPmTim4kCodWOpkAS4KgaFTRLKktxtpArLvQ/A/xQUoG', NULL, '2024-05-21 20:32:06', '2024-05-21 20:37:11', NULL, 'cus_Q9NGjHiBv2Yapu', 'visa', '1111', NULL),
(145, 'Zephania Barron', NULL, 'kuqyzozoze@mailinator.com', NULL, '1584853210844', NULL, 'candidate', NULL, '$2y$10$9VaRXIcbAvZErmq6bkcvFOU5yzxBdpqtAEyUlmhBeHIAB5aMbPKdK', NULL, '2024-05-21 20:44:59', '2024-05-21 20:45:10', NULL, 'cus_Q9NSWLoiIENVn8', NULL, NULL, NULL),
(146, 'sarabdeeee', NULL, 'buddies@yopmail.com', NULL, '1234567891234', NULL, 'candidate', NULL, '$2y$10$EvXTU2xy4i.xYJa6wIVm.uRrmgPvqzjCWJs7IgOA7OxENhMIpySym', NULL, '2024-05-21 21:13:34', '2024-05-21 21:13:34', NULL, NULL, NULL, NULL, NULL),
(147, 'sarabdeeeer', NULL, 'buddiesr@yopmail.com', NULL, '1234567891234', NULL, 'candidate', NULL, '$2y$10$SusNewnJO/TnpfXkI3GUNujBQMAy6hga4eCq1rYhwMPOAT1aDkyjG', NULL, '2024-05-21 21:29:45', '2024-05-21 21:29:45', NULL, NULL, NULL, NULL, NULL),
(148, 'sarabdeer', NULL, 'buddiewr@yopmail.com', NULL, '1234567891234', NULL, 'candidate', NULL, '$2y$10$6a5d1QXig.pH2c28r.oUpeee2ZsxUu89TLBCGD6kbfq9hMtQKjQry', NULL, '2024-05-21 21:30:29', '2024-05-21 21:30:29', NULL, NULL, NULL, NULL, NULL),
(149, 'Uriel Coleman', NULL, 'pufitub@mailinator.com', NULL, '18824773007346', NULL, 'candidate', NULL, '$2y$10$b1tmi52EyMY40I8QxzIyJOIGHB2lWWmUdd0aWHaWZrpbETqKml5ze', NULL, '2024-06-03 06:10:42', '2024-06-03 06:10:42', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zoom_meetings`
--

CREATE TABLE `zoom_meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `zoom_meeting_id` int(11) DEFAULT NULL,
  `interviewer_id` int(11) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `agenda` varchar(255) DEFAULT NULL,
  `host_video` varchar(255) DEFAULT NULL,
  `participant_video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` text DEFAULT NULL,
  `endtime` datetime DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `camp_registrations`
--
ALTER TABLE `camp_registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates_new`
--
ALTER TABLE `candidates_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fundraising_orders`
--
ALTER TABLE `fundraising_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundraising_order_items`
--
ALTER TABLE `fundraising_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gift_cards`
--
ALTER TABLE `gift_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interviewers`
--
ALTER TABLE `interviewers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_skills`
--
ALTER TABLE `job_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kids_assesments_trials`
--
ALTER TABLE `kids_assesments_trials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kids_assessments`
--
ALTER TABLE `kids_assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kid_second_parents`
--
ALTER TABLE `kid_second_parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kid_task`
--
ALTER TABLE `kid_task`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_features`
--
ALTER TABLE `plan_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_features_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsored_by_event_images`
--
ALTER TABLE `sponsored_by_event_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsorships`
--
ALTER TABLE `sponsorships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsorships_logos`
--
ALTER TABLE `sponsorships_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsorship_benefits`
--
ALTER TABLE `sponsorship_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transections`
--
ALTER TABLE `transections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indexes for table `zoom_meetings`
--
ALTER TABLE `zoom_meetings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `camp_registrations`
--
ALTER TABLE `camp_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidates_new`
--
ALTER TABLE `candidates_new`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fundraising_orders`
--
ALTER TABLE `fundraising_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `fundraising_order_items`
--
ALTER TABLE `fundraising_order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `gift_cards`
--
ALTER TABLE `gift_cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `interviewers`
--
ALTER TABLE `interviewers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_skills`
--
ALTER TABLE `job_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kids_assesments_trials`
--
ALTER TABLE `kids_assesments_trials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `kids_assessments`
--
ALTER TABLE `kids_assessments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `kid_second_parents`
--
ALTER TABLE `kid_second_parents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kid_task`
--
ALTER TABLE `kid_task`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `plan_features`
--
ALTER TABLE `plan_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sponsored_by_event_images`
--
ALTER TABLE `sponsored_by_event_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsorships`
--
ALTER TABLE `sponsorships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `sponsorships_logos`
--
ALTER TABLE `sponsorships_logos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsorship_benefits`
--
ALTER TABLE `sponsorship_benefits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transections`
--
ALTER TABLE `transections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `zoom_meetings`
--
ALTER TABLE `zoom_meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `plan_features`
--
ALTER TABLE `plan_features`
  ADD CONSTRAINT `plan_features_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
