-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 09:44 AM
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
-- Database: `isyn_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `branch_description` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `location` varchar(500) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `postal_code` varchar(5) NOT NULL,
  `branch_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `branch_description`, `contact_number`, `location`, `city`, `province`, `postal_code`, `branch_status`) VALUES
(1, 'Main Branch', '09123456789', 'Sample1', 'Lucena City', 'Quezon Province', '1234', 1),
(3, 'Lucena Branch', '09123456789', 'Brgy. Gulang-Gulang', 'Lucena City', 'Quezon Province', '4301', 1),
(4, 'Sariaya Branch', '09123456789', 'Sample 1', 'Lucena City', 'Quezon Province', '4301', 1);

-- --------------------------------------------------------

--
-- Table structure for table `branch_status`
--

CREATE TABLE `branch_status` (
  `status_id` int(11) NOT NULL,
  `status_description` varchar(100) NOT NULL,
  `remarks` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch_status`
--

INSERT INTO `branch_status` (`status_id`, `status_description`, `remarks`) VALUES
(1, 'Open', '...'),
(2, 'Closed', '...');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_description` varchar(500) NOT NULL,
  `remarks` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_description`, `remarks`) VALUES
(3, 'Storage Device', ' '),
(5, 'Gadget', ' '),
(8, 'Printer Ink', ' '),
(11, 'Laptop', ' '),
(12, 'Monitor', ' '),
(15, 'Smartphone', 'Brands'),
(16, 'Printer', 'Printer'),
(17, 'CCTV', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `type` enum('Electric','Water','Rent','Payroll','Miscellaneous') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL,
  `remarks` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `branch_id`, `type`, `amount`, `date`, `remarks`) VALUES
(1, 3, 'Payroll', 1000.00, '2023-04-13 18:34:04', 'No remarks here!'),
(3, 3, 'Rent', 2131.00, '2023-04-13 23:39:40', '21raw'),
(4, 1, 'Rent', 1000.00, '2023-04-15 19:52:33', '...'),
(5, 4, 'Water', 1000.00, '2023-04-16 12:03:29', '...');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `category_id`, `price`, `product_quantity`) VALUES
(8, 'Vivo Y28', 15, 9999.00, 5),
(27, 'Vivo Y27s', 15, 9999.00, 6),
(36, 'EPSON EchoTank L3210', 16, 9500.00, 4),
(37, 'KINGSTON 1TB NV2 PCIE NVME M.2', 3, 5999.00, 6),
(38, 'ASUS Vivobook 15 (X1502)', 11, 49999.00, 3),
(39, 'Samsung Galaxy Tab A9', 5, 10990.00, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `invoice_date` datetime NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal_amount` decimal(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`invoice_id`, `invoice_number`, `invoice_date`, `product_id`, `category_id`, `quantity`, `price`, `subtotal_amount`, `discount`, `user_id`, `branch_id`) VALUES
(42, 'INV-20250226081602-8502', '2025-02-26 00:00:00', 38, 11, 1, 49999.00, 49999.00, 0, 31, 3),
(43, 'INV-20250226081602-8502', '2025-02-26 00:00:00', 8, 15, 1, 9999.00, 9999.00, 0, 31, 3),
(44, 'INV-20250226081602-8502', '2025-02-26 00:00:00', 36, 16, 1, 9500.00, 9500.00, 0, 31, 3),
(45, 'INV-20250226081722-2377', '2025-02-26 00:00:00', 27, 15, 1, 9999.00, 9999.00, 0, 31, 3),
(46, 'INV-20250226081722-2377', '2025-02-26 00:00:00', 8, 15, 1, 9999.00, 9999.00, 0, 31, 3),
(47, 'INV-20250226081722-2377', '2025-02-26 00:00:00', 8, 15, 1, 9999.00, 9999.00, 0, 31, 3),
(48, 'INV-20250226090829-3119', '2025-02-26 00:00:00', 27, 15, 2, 9999.00, 19998.00, 0, 31, 3),
(49, 'INV-20250226093050-9225', '2025-02-26 00:00:00', 0, 0, 0, 0.00, 0.00, 0, 31, 3),
(50, 'INV-20250226093130-1572', '2025-02-26 00:00:00', 0, 0, 0, 0.00, 0.00, 0, 31, 3),
(51, 'INV-20250226093646-1959', '2025-02-26 00:00:00', 27, 15, 2, 9999.00, 19998.00, 0, 31, 3),
(52, 'INV-20250226093928-1397', '2025-02-26 00:00:00', 27, 15, 1, 9999.00, 9999.00, 0, 31, 3),
(53, 'INV-20250226094124-4066', '2025-02-26 00:00:00', 8, 15, 1, 9999.00, 9499.05, 5, 31, 3);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_description` varchar(100) NOT NULL,
  `remarks` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_description`, `remarks`) VALUES
(1, 'Open', ''),
(2, 'Paid', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role` enum('superadmin','admin','cashier','accountant') NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `birthdate` date NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `street_address` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` varchar(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `staff_role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role`, `first_name`, `middle_name`, `last_name`, `sex`, `birthdate`, `phone_number`, `street_address`, `barangay`, `city`, `province`, `country`, `zipcode`, `username`, `email`, `password`, `branch_id`, `staff_role`) VALUES
(7, 'accountant', 'Admin', 'A', 'Staff', 'male', '2023-03-01', '09123456789', 'Metro Gaisano-Pacific Mall Compound, ML Tagarao St.', '3', 'Lucena City', 'Quezon Province', 'Philippines', '4301', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, NULL),
(14, 'superadmin', 'Santy', 'Palma', 'Balmores', 'male', '2023-03-01', '09123456789', 'Metro Gaisano-Pacific Mall Compound, ML Tagarao St.', '3', 'Lucena City', 'Quezon Province', 'Philippines', '4301', 'superadmin', 'user@gmail.com', '17c4520f6cfd1ab53d8745e84681eb49', 1, NULL),
(26, 'accountant', 'Account', 'A', 'Staff', 'female', '2023-04-13', '09123456789', 'sample', 'sample', 'Lucena City', 'Quezon Province', 'sample', '1234', 'accountant', 'accountant@gmail.com', '56f97f482ef25e2f440df4a424e2ab1e', 1, NULL),
(31, 'cashier', 'Cashier', 'A', 'Staff', 'female', '2023-04-14', '09123456789', 'Manila', 'Sample', 'Lucena City', 'Quezon Province', 'Philippines', '1005', 'cashier', 'cashier@gmail.com', '6ac2470ed8ccf204fd5ff89b32a355cf', 3, NULL),
(32, 'admin', 'Lucena', 'A', 'Branch', 'male', '1998-11-21', '09123456789', 'Frank St.', 'Gulang-Gulang', 'Lucena City', 'Quezon Province', 'Philippines', '4301', 'lucenabranch', 'lucena.branch@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 3, NULL),
(33, 'admin', 'Sariaya', 'A', 'Admin', 'female', '2001-08-25', '09123456789', 'Habito St.', 'Isabang', 'Lucena City', 'Quezon Province', 'Philippines', '4301', 'sariayaadmin', 'sariaya.branch@gmail.com', '916dc1810f8bba8f111ca86b70817dde', 4, NULL),
(34, 'cashier', 'Sariaya', 'B', 'Cashier', 'male', '2000-12-12', '09123456789', 'Manila', 'Barangay 10', 'Lucena City', 'Quezon Province', 'Philippines', '1005', 'sariayacashier', 'sariaya.cashier@gmail.com', '17c4520f6cfd1ab53d8745e84681eb49', 4, NULL),
(35, 'cashier', 'Carl', 'Octoman', 'Rallos', 'male', '2001-06-05', '09123456789', 'Bagong Silang', 'Sta. Veronica', 'Guimba', 'Nueva Ecija', 'Philippines', '3115', 'charl', 'carlrallos@gmail.com', '6ac2470ed8ccf204fd5ff89b32a355cf', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `branch_status`
--
ALTER TABLE `branch_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`invoice_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branch_status`
--
ALTER TABLE `branch_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
