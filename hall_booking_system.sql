-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 04:44 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hall_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `banquets`
--

CREATE TABLE `banquets` (
  `banquet_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `banquet_name` varchar(100) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `total_guest` int(11) DEFAULT NULL,
  `banquet_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banquets`
--

INSERT INTO `banquets` (`banquet_id`, `user_id`, `category_id`, `location_id`, `status_id`, `banquet_name`, `price`, `phone_number`, `address`, `total_guest`, `banquet_image`) VALUES
(1, 6, 1, 2, 5, 'Marina Hall Banquet', '500', '03043059147', 'This is the home address', 500, 'November-Fri-20211637342158.jpeg'),
(2, 7, 1, 3, 5, 'City Banquet', '100000', '03043123456', 'This is the home address ', 500, 'November-Sun-20211638084996.png');

-- --------------------------------------------------------

--
-- Table structure for table `banquet_images`
--

CREATE TABLE `banquet_images` (
  `banquet_image_id` int(11) NOT NULL,
  `banquet_id` int(11) DEFAULT NULL,
  `banquet_image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banquet_images`
--

INSERT INTO `banquet_images` (`banquet_image_id`, `banquet_id`, `banquet_image`) VALUES
(1, 1, 'November-Fri-20211637342158Array'),
(2, 1, 'November-Fri-20211637342158Array'),
(3, 1, 'November-Fri-20211637342158Array'),
(4, 2, 'Dashboard.PNG'),
(5, 2, 'Edit Profile.PNG'),
(6, 2, 'Forgot Password.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `banquet_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `from_date` varchar(50) DEFAULT NULL,
  `to_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `banquet_id`, `status_id`, `user_id`, `from_date`, `to_date`) VALUES
(1, NULL, 2, 5, '', '2021-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) DEFAULT NULL,
  `category_desc` text DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_desc`, `status_id`) VALUES
(1, 'Buffet', 'This is a popular banquet service, chosen in events with a large number of attendees. There is a buffet line of food choices, which the guests pass through and serve themselves. It is a convenient way', 5),
(2, 'Reception', ' It is a popular term known across countries involving a gathering where people mill around the room while eating and chatting. This is a special gathering of a varied number of people, came together for a special occasion.  ', 5),
(3, 'Food Stations', 'This is an event that comprises food stalls or stations offering various cuisines, courses and dishes to the guests. Many times, these stations are manned by chefs who prepare food in front of the guests. The most common food stations include pasta bars, sushi stations, desserts, etc.', 5),
(4, 'Cafeteria-Style', 'This is very similar to the buffet-style banquet service, with a difference that servers themselves serve the food. The practice is used to control the portion sizes', 5),
(5, 'Plated', 'In this service, the guests are seated, and servers bring food already portioned into the plates from the kitchen. This is believed to be one of the most efficient types of banquet service. The plated style is the most common one seen at formal events, seminars, conferences, and formal dinners.', 5),
(6, 'Pre-Set Service', 'If the food is already showing up on the table at the time of your arrival, it is known as a pre-set arrangement. This is applicable mostly with bread, desserts, salads, and beverages.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `enqueries`
--

CREATE TABLE `enqueries` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(50) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_name`, `status_id`) VALUES
(1, 'Jamshoro', 5),
(2, 'Karachi', 5),
(3, 'Hyderabad ', 5),
(4, 'Lahore', 5),
(5, 'Quetta', 5),
(6, 'Kotri', 5),
(7, 'Latifabad', 5),
(8, 'Rawalpindi', 5),
(9, 'Jamshoro Colony', 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_type`) VALUES
(1, 'Admin'),
(2, 'Client'),
(3, 'Owner');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_type` varchar(50) DEFAULT NULL,
  `action` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_type`, `action`) VALUES
(1, 'Pending', 1),
(2, 'Booked', 1),
(3, 'Cancelled', 1),
(4, 'Available', 1),
(5, 'Active', 1),
(6, 'Inactive', 1),
(7, 'Deleted', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `phone_no` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL,
  `delete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `phone_no`, `status`, `created_at`, `updated_at`, `delete`) VALUES
(1, 'Arsalan Ahmed', 'ahmedsolangi347@gmail.com', '12345678', NULL, 1, '2021-11-08', '2021-11-08', 0),
(5, 'Abdul Sami Updated', 'abdulsamiupdated@gmail.com', '12345678', '03162301343', 1, NULL, NULL, 0),
(6, 'Amjad Jamali', 'amjad@gmail.com', '12345678', '03003095664', 1, NULL, NULL, 0),
(7, 'Uroosha Memon', 'urooshamemon@gmail.com', '12345678', '03012121212', 1, NULL, NULL, 0),
(8, 'Maria Kanwal', 'mariakanwal@gmail.com', '12345678', '03043059147', 1, NULL, NULL, 0),
(9, 'Ayesha Memon', 'ayeshamemon@gmail.com', '12345678', '03012332435', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 5, 2),
(3, 6, 3),
(4, 7, 3),
(5, 8, 2),
(6, 9, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banquets`
--
ALTER TABLE `banquets`
  ADD PRIMARY KEY (`banquet_id`);

--
-- Indexes for table `banquet_images`
--
ALTER TABLE `banquet_images`
  ADD PRIMARY KEY (`banquet_image_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `enqueries`
--
ALTER TABLE `enqueries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banquets`
--
ALTER TABLE `banquets`
  MODIFY `banquet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banquet_images`
--
ALTER TABLE `banquet_images`
  MODIFY `banquet_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `enqueries`
--
ALTER TABLE `enqueries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
