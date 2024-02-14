-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 09:28 AM
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
-- Database: `e-commercet`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'Breakfast'),
(2, 'Launch'),
(3, 'Dinner');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `description`, `price`, `image`, `user_id`, `category_id`) VALUES
(1, 'Pancakes ', 'psum ipsum clita erat amet dolor justo diam                                                                                                                                                                                                                                                                        ', 32.00, 'Pancakes.jpg_24.02.02.jpg', 1, 1),
(2, 'Waffles', 'psum ipsum clita erat amet dolor justo diam                                                ', 32.00, 'Waffles.jpg_24.01.31.jpg', 1, 1),
(3, 'Omelette', 'psum ipsum clita erat amet dolor justo diam                                                ', 32.00, 'Omelette.jpg_24.01.31.jpg', 1, 1),
(4, 'Scrambled Eggs', 'psum ipsum clita erat amet dolor justo diam                                                ', 26.00, 'Scrambled Eggs.jpg_24.01.31.jpg', 1, 1),
(5, 'Bacon', 'psum ipsum clita erat amet dolor justo diam                                                ', 32.00, 'Bacon.jpg_24.01.31.jpg', 1, 1),
(6, 'Sausages', 'psum ipsum clita erat amet dolor justo diam                                                                        ', 42.00, 'Sausages.png_24.01.31.png', 1, 1),
(7, 'Toast', 'psum ipsum clita erat amet dolor justo diam                                                ', 32.00, 'Toast.jpg_24.01.31.jpg', 1, 1),
(8, 'Bagels', 'psum ipsum clita erat amet dolor justo diam                                                ', 32.00, 'Bagels.jpg_24.01.31.jpg', 1, 1),
(9, 'Croissants', 'psum ipsum clita erat amet dolor justo diam                                                ', 32.00, 'Croissants.jpg_24.01.31.jpg', 1, 1),
(10, 'French Toast', 'psum ipsum clita erat amet dolor justo diam                                                ', 32.00, 'French Toast.jpg_24.01.31.jpg', 1, 1),
(11, 'Cereal', 'psum ipsum clita erat amet dolor justo diam                                                ', 32.00, 'Cereal.jpg_24.01.31.jpg', 1, 1),
(12, 'Granola ', 'psum ipsum clita erat amet dolor justo diam                                                                        ', 23.00, 'Granola.jpg_24.01.31.jpg', 1, 1),
(13, 'Yogurt Parfait', 'psum ipsum clita erat amet dolor justo diam                                                ', 32.00, 'Yogurt Parfait.jpg_24.01.31.jpg', 1, 1),
(14, 'Fruit Salad', 'psum ipsum clita erat amet dolor justo diam                                                ', 32.00, 'Fruit Salad.jpg_24.01.31.jpg', 1, 1),
(15, 'Pancakes ', 'psum ipsum clita erat amet dolor justo diam                                                ', 44.00, 'Breakfast Burrito.jpg_24.01.31.jpg', 1, 1),
(16, 'Sandwiches', 'psum ipsum clita erat amet dolor justo diam  ', 32.00, 'Sandwiches.jpg_24.02.02.jpg', 1, 2),
(17, 'salads', 'psum ipsum clita erat amet dolor justo diam  ', 32.00, 'Salads.jpg_24.02.02.jpg', 1, 2),
(18, 'Burgers', 'psum ipsum clita erat amet dolor justo diam  ', 12.00, 'Burgers.jpg_24.02.02.jpg', 1, 2),
(19, 'burritos', 'psum ipsum clita erat amet dolor justo diam  ', 18.00, 'Burritos.avif_24.02.02.avif', 1, 2),
(20, 'Tacos', 'psum ipsum clita erat amet dolor justo diam  ', 15.00, 'Tacos.jpg_24.02.02.jpg', 1, 2),
(21, 'sushi', 'psum ipsum clita erat amet dolor justo diam  ', 45.00, 'Sushi.jpg_24.02.02.jpg', 1, 2),
(22, 'fried rice', 'psum ipsum clita erat amet dolor justo diam  ', 50.00, 'Fried Rice.jpg_24.02.02.jpg', 1, 2),
(23, 'chicken quesadilla', 'psum ipsum clita erat amet dolor justo diam  ', 99.00, 'Chicken Quesadilla.jpg_24.02.02.jpg', 1, 2),
(24, 'grill cheese sandwich', 'psum ipsum clita erat amet dolor justo diam  ', 56.00, 'Grilled Cheese Sandwich.jpg_24.02.02.jpg', 1, 2),
(25, 'chicken salad', 'psum ipsum clita erat amet dolor justo diam  ', 43.00, 'Chicken Salad.jpg_24.02.02.jpg', 1, 2),
(26, 'soup', 'psum ipsum clita erat amet dolor justo diam  ', 20.00, 'Soup.jpg_24.02.02.jpg', 1, 2),
(27, 'quiche', 'psum ipsum clita erat amet dolor justo diam  ', 98.00, 'Quiche.jpg_24.02.02.jpg', 1, 2),
(28, 'pasta', 'psum ipsum clita erat amet dolor justo diam  ', 52.00, 'Pasta.jpg_24.02.02.jpg', 1, 2),
(29, 'Pizza', 'psum ipsum clita erat amet dolor justo diam  ', 36.00, 'Pizza.jpg_24.02.02.jpg', 1, 2),
(30, 'wraps', 'psum ipsum clita erat amet dolor justo diam  ', 225.00, 'Wraps.jpg_24.02.02.jpg', 1, 2),
(31, 'grilled chicken', 'psum ipsum clita erat amet dolor justo diam  ', 49.00, 'Grilled Chicken.jpg_24.02.02.jpg', 1, 3),
(32, 'Roast beef', 'psum ipsum clita erat amet dolor justo diam  ', 66.00, 'Roast Beef.jpg_24.02.02.jpg', 1, 3),
(33, 'baked salmon', 'psum ipsum clita erat amet dolor justo diam  ', 299.00, 'Baked Salmon.jpg_24.02.02.jpg', 1, 3),
(34, 'Spaghetti Bolognese', 'psum ipsum clita erat amet dolor justo diam  ', 25.00, 'Spaghetti Bolognese.jfif_24.02.02.jfif', 1, 3),
(35, 'chicken alfredo', 'psum ipsum clita erat amet dolor justo diam  ', 50.00, 'Chicken Alfredo.jpg_24.02.02.jpg', 1, 3),
(36, 'steak', 'psum ipsum clita erat amet dolor justo diam  ', 50.00, 'Steak.jpg_24.02.02.jpg', 1, 3),
(37, 'BBQ Ribs', 'psum ipsum clita erat amet dolor justo diam  ', 50.00, 'BBQ Ribs.jpg_24.02.02.jpg', 1, 3),
(38, 'chicken parmesan', 'psum ipsum clita erat amet dolor justo diam  ', 60.00, 'Chicken Parmesan.jpg_24.02.02.jpg', 1, 3),
(39, 'shirmp scampi', 'psum ipsum clita erat amet dolor justo diam  ', 60.00, 'Shrimp Scampi.jpg_24.02.02.jpg', 1, 3),
(40, 'tofu stir-fry', 'psum ipsum clita erat amet dolor justo diam  ', 60.00, 'Tofu Stir-Fry.jpg_24.02.02.jpg', 1, 3),
(41, 'lasagna', 'psum ipsum clita erat amet dolor justo diam  ', 51.00, 'Lasagna.jpg_24.02.02.jpg', 1, 3),
(42, 'teriyaki chicken', 'psum ipsum clita erat amet dolor justo diam  ', 150.00, 'Teriyaki Chicken.jpg_24.02.02.jpg', 1, 3),
(43, 'Fish tacos', 'psum ipsum clita erat amet dolor justo diam  ', 500.00, 'Fish Tacos.jpeg_24.02.02.jpeg', 1, 3),
(44, 'meatloaf', 'psum ipsum clita erat amet dolor justo diam  ', 199.00, 'Meatloaf.jpg_24.02.02.jpg', 1, 3),
(45, 'chicken Marsala', 'psum ipsum clita erat amet dolor justo diam  ', 195.00, 'Chicken Marsala.jpg_24.02.02.jpg', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_items_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_items_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`c_id`),
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
