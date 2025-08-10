-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2025 at 10:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citytaxi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bid` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `pickup_location` varchar(255) DEFAULT NULL,
  `dropoff_location` varchar(255) DEFAULT NULL,
  `pickup_time` datetime DEFAULT NULL,
  `dropoff_time` datetime DEFAULT NULL,
  `distance_km` decimal(10,2) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `status` enum('Pending','Confirmed','Ongoing','Completed','Cancelled','Dropped') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bid`, `passenger_id`, `vehicle_id`, `pickup_location`, `dropoff_location`, `pickup_time`, `dropoff_time`, `distance_km`, `cost`, `status`, `created_at`, `updated_at`) VALUES
(8, 78, 11, 'Slave Island', 'Colombo 04', '2024-10-03 20:45:26', NULL, 6.46, 32.30, 'Dropped', '2024-10-03 18:45:26', '2024-10-04 05:44:16'),
(9, 78, 13, 'Colombo', 'Hambantota', '2024-10-03 20:50:39', NULL, 258.64, 1293.20, 'Dropped', '2024-10-03 18:50:39', '2024-10-03 19:06:30'),
(10, 78, 13, 'Slave Island', 'Colombo 03', '2024-10-03 21:06:26', NULL, 5.26, 26.30, 'Dropped', '2024-10-03 19:06:26', '2024-10-04 05:44:17'),
(11, 80, 14, 'Slave Island', 'Colombo 03', '2024-10-03 21:08:02', NULL, 5.26, 26.30, 'Dropped', '2024-10-03 19:08:02', '2024-10-04 05:51:11'),
(12, 78, 16, 'Slave Island', 'Colombo 03', '2024-10-04 07:45:34', NULL, 5.26, 26.30, '', '2024-10-04 05:45:34', '2024-10-05 12:39:04'),
(13, 78, 16, 'Slave Island', 'Colombo 04', '2024-10-04 08:03:38', NULL, 6.46, 32.30, '', '2024-10-04 06:03:38', '2024-10-05 12:38:56'),
(14, 78, 15, 'Colombo 04', 'Colombo 03', '2024-10-05 14:01:43', NULL, 1.97, 9.85, '', '2024-10-05 12:01:43', '2024-10-05 12:39:01'),
(15, 78, 14, 'Slave Island', 'Maharagama', '2024-10-05 14:27:44', NULL, 13.86, 69.30, '', '2024-10-05 12:27:44', '2024-10-05 12:37:55'),
(16, 78, 16, 'Kohilawatta', 'Wellampitiya', '2024-10-05 14:28:13', NULL, 2.22, 11.10, '', '2024-10-05 12:28:13', '2024-10-05 12:28:41'),
(17, 78, 15, 'Slave Island', 'Colombo 04', '2024-10-05 14:40:22', NULL, 6.46, 32.30, 'Pending', '2024-10-05 12:40:22', '2024-10-05 12:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `review` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `driver` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taxi_rates`
--

CREATE TABLE `taxi_rates` (
  `id` int(11) NOT NULL,
  `kmRate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taxi_rates`
--

INSERT INTO `taxi_rates` (`id`, `kmRate`) VALUES
(1, 80.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ContactNO` int(11) DEFAULT NULL,
  `user_type` enum('P','D','O','A') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `ContactNO`, `user_type`) VALUES
(78, 'bakeerahamed42@gmail.com', 'bakeerahamed', '$2y$10$8jui6hkKHBlOWrPYcCzgMulFDgPza5YkXmRs0AldllE38OubmIzF2', 2147483647, 'P'),
(80, 'bakeerahamed27@gmail.com', 'bakeer', '$2y$10$rdYiiysSH069VA8X45wDiOxa/B9J66.emZ5.CntLdj.Zj5BCffEt.', 0, 'D'),
(83, 'xeonwatches@gmail.com', 'Admin', '$2y$10$AEJt//5mZ27GwElGDeNhJOEAbmbEdpHUX.0d4tSFIRIhRyss90qg.', NULL, 'A'),
(84, 'sajani.gunawardhane2000@gmail.com', 'sajani', '$2y$10$P9TE9qzZww23YV2IGP0Sx.HKp108uOnUN4I8QqZlhmlWBuXBPq3sG', NULL, 'O'),
(85, 'yalindi519@gmail.com', 'yalindi', '$2y$10$GrU7CeNqDkZZmsVUi8..1eECt9i2HQdzRba.2SwO3W1L3Fz/MD9Qe', 0, 'D'),
(86, 'rsshahama.se2233@gmail.com', 'shahama', '$2y$10$umNa4p96RdfAncGBLFfDvOipSpb13zimGPKIoZln33a.Ykx9zuNPa', 0, 'D'),
(88, 'mhd.aadhil019@gmail.com', 'Aadhil', '$2y$10$mMaBTRBml4Mw4b4j.BDo2uKg.tPmPVQWYG/cfT/9WGP8VjBDH8DmO', 766528965, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `Driver` int(11) NOT NULL,
  `vehicle_model` varchar(255) NOT NULL,
  `vehicle_plate_no` varchar(100) NOT NULL,
  `No_of_Seat` int(11) NOT NULL,
  `vehicle_Status` varchar(100) NOT NULL,
  `vehicle_availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `Driver`, `vehicle_model`, `vehicle_plate_no`, `No_of_Seat`, `vehicle_Status`, `vehicle_availability`) VALUES
(14, 80, 'Mercedez Benz', 'CBS 7555', 4, 'Available', 1),
(15, 85, 'BMW', 'CBS 7777', 4, 'Available', 1),
(16, 86, 'Volks Wogen', 'CBS 1111', 6, 'Available', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taxi_rates`
--
ALTER TABLE `taxi_rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxi_rates`
--
ALTER TABLE `taxi_rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
