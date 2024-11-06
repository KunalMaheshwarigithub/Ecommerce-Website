-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 01:33 PM
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
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Adidas'),
(2, 'Rolex'),
(3, 'Turtle'),
(4, 'Boat'),
(5, 'Nike'),
(6, 'Blood'),
(7, 'Samsung'),
(8, 'HP'),
(9, 'Intel'),
(10, 'DELL'),
(11, 'The North Face'),
(12, 'Canada Goose'),
(13, 'DJI'),
(14, 'Parrot SA'),
(15, 'Panasonic'),
(16, 'Sony'),
(17, 'LG'),
(18, 'Tom Ford'),
(19, 'Hugo'),
(20, 'Brioni'),
(21, 'Milton'),
(22, 'Spaces'),
(23, 'Bombay Dyeing'),
(24, 'Nykaa_Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `Product_ID` int(11) NOT NULL,
  `IP_address` varchar(255) NOT NULL,
  `Quantity` int(100) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_ID` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_ID`, `category_title`) VALUES
(1, 'Jeans'),
(2, 'Shoes'),
(3, 'Headphone'),
(4, 'Shirt'),
(5, 'Watch'),
(6, 'Smartphone'),
(7, 'Laptop'),
(8, 'Jackets'),
(9, 'Drone'),
(10, 'Cameras'),
(11, 'Sony'),
(12, 'Televisions'),
(13, 'Shorts'),
(14, 'Suits'),
(15, 'Bottles'),
(16, 'Bed_Sheets'),
(17, 'Womens_kurtas'),
(18, 'Womens_Gowns'),
(19, 'Sandals');

-- --------------------------------------------------------

--
-- Table structure for table `order_pending`
--

CREATE TABLE `order_pending` (
  `Order_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Invoice_Number` int(255) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Qunatity` int(255) NOT NULL,
  `Order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_pending`
--

INSERT INTO `order_pending` (`Order_ID`, `User_ID`, `Invoice_Number`, `Product_ID`, `Qunatity`, `Order_status`) VALUES
(1, 1, 1705645316, 5, 1, 'pending'),
(2, 1, 1551203028, 4, 1, 'pending'),
(3, 1, 1225606702, 2, 1, 'pending'),
(4, 2, 582137389, 3, 1, 'pending'),
(5, 2, 601433804, 11, 1, 'pending'),
(6, 2, 758876418, 18, 1, 'pending'),
(7, 2, 1022980389, 7, 1, 'pending'),
(8, 2, 1332156884, 6, 1, 'pending'),
(9, 2, 1064808012, 9, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(11) NOT NULL,
  `Product_Title` varchar(100) NOT NULL,
  `Product_Description` varchar(255) NOT NULL,
  `Product_Keywords` varchar(255) NOT NULL,
  `category_ID` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_img_1` varchar(255) NOT NULL,
  `product_img_2` varchar(255) NOT NULL,
  `product_img_3` varchar(255) NOT NULL,
  `Product_Price` varchar(100) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Product_Title`, `Product_Description`, `Product_Keywords`, `category_ID`, `brand_id`, `product_img_1`, `product_img_2`, `product_img_3`, `Product_Price`, `Date`, `Status`) VALUES
(1, 'Watch', 'Powered by a reliable quartz movement, experience accurate timekeeping you can depend on.', 'watch', 5, 2, 'watch.jpg', 'watch1.jpg', 'watch2.jpg', '850', '2024-11-02 04:22:41', 'true'),
(2, 'Smartphone', 'Experience the speed of the future with lightning-fast 5G connectivity. Stream, download, and connect like never before.', 'phone', 6, 7, 'smartphone.jpg', 'smartphone1.jpg', 'smartphone2.jpg', '8500', '2024-11-02 04:26:39', 'true'),
(3, 'Shoes', ' Featuring a cushioned insole and breathable mesh upper, StridePro Sneakers provide all-day comfort and support for your feet, making every step feel like walking on clouds.', 'shoe', 2, 5, 'shoe.jpg', 'shoes1.avif', 'shoes2.webp', '1500', '2024-11-02 04:28:32', 'true'),
(4, 'Jeans', 'With a classic straight-leg design and versatile wash options, these jeans offer a timeless look that pairs seamlessly with any top, from casual tees to elegant blouses.', 'jeans', 1, 6, 'jeans.webp', 'jeans.jpg', 'jeans2.jpg', '999', '2024-11-02 04:30:06', 'true'),
(5, 'Shirts', 'Our commitment to sustainability means you can wear this shirt with pride, knowing it was produced with environmentally friendly methods.', 'shirt', 4, 1, 'shirt.jpg', 'shirt1.jpg', 'shirt2.jpg', '650', '2024-11-02 04:31:29', 'true'),
(6, 'Headphone', 'Equipped with advanced drivers, the SonicWave Pro headphones produce deep bass, vibrant mids, and crisp highs, ensuring every note and nuance is heard clearly.', 'headphone', 3, 4, 'headphone.jpg', 'headphone1.jpg', 'headphone3.jpg', '5000', '2024-11-02 04:33:59', 'true'),
(7, 'Suits', 'From luxurious wool to sleek silk blends, each fabric is chosen for its durability and refined look.', 'NavyBlueSuits', 14, 18, 'suitnavy.jpg', 'suitsnavy1.jpg', 'suitsnavy2.jpg', '6500', '2024-11-05 13:59:52', 'true'),
(8, 'Suits', ' Our suits are meticulously tailored to ensure a fit that flatters your frame and complements your personal style.', 'BlackSuits', 14, 19, 'blacksuit.jpg', 'blacksuit1.webp', 'blacksuit2.jpg', '7500', '2024-11-05 14:04:22', 'true'),
(9, 'Televisions', 'Experience breathtaking clarity with 4K and 8K resolution, HDR technology, and vibrant color reproduction that brings every scene to life.', 'Television', 12, 17, 'tv3.avif', 'tv.jpg', 'tv1.webp', '20000', '2024-11-05 14:09:30', 'true'),
(10, 'Televisions', 'Seamlessly stream your favorite content with built-in apps, voice control, and smart home compatibility.', 'TV', 12, 16, 'tv2.jpg', 'tv4.avif', 'tv5.avif', '22000', '2024-11-05 14:11:05', 'true'),
(11, 'Laptop', 'Powered by the latest processors and high-speed SSD storage, experience lightning-fast boot times, seamless multitasking, and smooth performance for all your tasks.', 'Laptop', 7, 8, 'laptop.jpg', 'laptop1.jpg', 'laptop2.avif', '55000', '2024-11-05 14:18:18', 'true'),
(12, 'Laptop', ' Immerse yourself in vibrant colors and razor-sharp details with our high-definition Retina or OLED display – perfect for work, creativity, and entertainment.', 'Laptop', 7, 9, 'laptop3.jpg', 'laptop4.jpg', 'laptop5.jpg', '50000', '2024-11-05 14:19:41', 'true'),
(13, 'Jacket', 'Water-resistant, windproof, and insulated – our jackets are engineered to keep you cozy and dry, rain or shine.', 'Jackets', 8, 11, 'jacket.jpg', 'jacket1.jpg', 'jacket2.jpg', '4500', '2024-11-05 14:23:39', 'true'),
(14, 'Jackets', ' Crafted from high-quality fabrics that are both durable and lightweight, designed to stand up to the elements without compromising comfort.', 'Jackets', 8, 12, 'jacket3.jpg', 'jacket4.jpg', 'jacket5.jpg', '3500', '2024-11-05 14:24:47', 'true'),
(15, 'Drone', 'Capture stunning 4K video, ultra-sharp images, and breathtaking views with our advanced camera technology and stabilization systems.', 'Drones', 9, 14, 'drone.jpg', 'drone1.png', 'drone2.jpg', '4500', '2024-11-05 14:28:32', 'true'),
(16, 'Drone', 'Stay in the air longer with our high-performance batteries, giving you extended flight times for more exploration and creativity.', 'Drone', 9, 13, 'drone4.jpg', 'drone5.jpg', 'drone3.jpg', '6000', '2024-11-05 14:30:24', 'true'),
(17, 'Bottle', 'Keep your drinks hot for up to 12 hours or cold for 24—whether it’s a hot coffee in the morning or ice-cold water during your workout.', 'Bottle', 15, 21, 'bottle.jpg', 'bottle1.jpg', 'bottle2.jpg', '650', '2024-11-05 14:33:50', 'true'),
(18, 'Camera', 'Easy-to-use controls and seamless connectivity make sharing your shots or streaming live effortless. Plus, with Wi-Fi and Bluetooth, you can upload, edit, and share in real time.', 'Camera', 10, 15, 'camera.jpg', 'camera1.jpg', 'camera2.jpg', '7500', '2024-11-05 14:40:55', 'true'),
(19, 'Shorts', 'Crafted from lightweight, breathable fabrics, our shorts are perfect for keeping you cool in the hottest weather—ideal for warm days, active adventures, and laid-back weekends.', 'Shorts', 13, 22, 'shorts.jpg', 'shorts1.jpg', 'short2.jpg', '450', '2024-11-05 14:44:40', 'true'),
(20, 'BedSheets', 'Machine washable and wrinkle-resistant, our sheets are designed to stay looking fresh and crisp with minimal effort on your part.', 'BedSheets', 16, 23, 'bedsheets1.jpg', 'bedsheets.jpg', 'bedsheets2.jpg', '500', '2024-11-05 14:48:02', 'true'),
(21, 'Sandals', 'Engineered with cushioned footbeds and arch support, our sandals provide superior comfort, making them ideal for long walks, travel, or casual outings.', 'Sandals', 19, 24, 'sandal.jpg', 'sandal1.jpg', 'sandal2.jpg', '350', '2024-11-05 15:00:17', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `Order_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Amount_Due` int(255) NOT NULL,
  `Invoice_Number` int(255) NOT NULL,
  `Total_Products` int(255) NOT NULL,
  `Order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_orders`
--

INSERT INTO `users_orders` (`Order_ID`, `User_ID`, `Amount_Due`, `Invoice_Number`, `Total_Products`, `Order_date`, `Order_status`) VALUES
(1, 1, 650, 1705645316, 1, '2024-11-04 16:19:42', 'complete'),
(2, 1, 999, 1551203028, 1, '2024-11-04 16:11:48', 'complete'),
(3, 1, 8500, 1225606702, 1, '2024-11-04 16:25:13', 'pending'),
(4, 2, 2350, 582137389, 2, '2024-11-04 16:50:51', 'complete'),
(5, 2, 75000, 601433804, 2, '2024-11-05 15:04:31', 'complete'),
(6, 2, 7500, 758876418, 1, '2024-11-05 15:07:20', 'complete'),
(7, 2, 6500, 1022980389, 1, '2024-11-05 15:33:37', 'complete'),
(8, 2, 5000, 1332156884, 1, '2024-11-05 15:39:32', 'complete'),
(9, 2, 20000, 1064808012, 1, '2024-11-05 15:47:50', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `payment_id` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Invoice_Number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`payment_id`, `Order_ID`, `Invoice_Number`, `amount`, `payment_mode`, `date`) VALUES
(1, 2, 1551203028, 999, 'Phonepe', '2024-11-04 16:11:48'),
(2, 2, 1551203028, 999, 'Phonepe', '2024-11-04 16:18:37'),
(3, 1, 1705645316, 650, 'NetBanking', '2024-11-04 16:19:42'),
(4, 2, 1551203028, 999, 'NetBanking', '2024-11-04 16:23:36'),
(5, 2, 1551203028, 999, 'Select Payment Mode', '2024-11-04 16:23:39'),
(6, 4, 582137389, 2350, 'Cash on Delivery', '2024-11-04 16:50:51'),
(7, 5, 601433804, 75000, 'Cash on Delivery', '2024-11-05 15:04:31'),
(8, 6, 758876418, 7500, 'Cash on Delivery', '2024-11-05 15:07:20'),
(9, 7, 1022980389, 6500, 'Cash on Delivery', '2024-11-05 15:33:37'),
(10, 8, 1332156884, 5000, 'Select Payment Mode', '2024-11-05 15:39:32'),
(11, 9, 1064808012, 20000, 'Phonepe', '2024-11-05 15:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `User_ID` int(11) NOT NULL,
  `User_Name` varchar(255) NOT NULL,
  `User_Email` varchar(255) NOT NULL,
  `User_Password` varchar(255) NOT NULL,
  `User_Image` varchar(255) NOT NULL,
  `User_IP` varchar(255) NOT NULL,
  `User_Address` varchar(255) NOT NULL,
  `Phone_Number` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`User_ID`, `User_Name`, `User_Email`, `User_Password`, `User_Image`, `User_IP`, `User_Address`, `Phone_Number`) VALUES
(2, 'Maheshwari', 'maheshwari@gmail.com', '$2y$10$s8BiqEHggZdPjeNPrppM0.o1UY5INrkUNuEP3CLkU2pe1uPrxczaS', 'face.jpg', '::1', 'Howrah', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `order_pending`
--
ALTER TABLE `order_pending`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
