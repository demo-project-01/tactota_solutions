-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 08:04 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_no` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL,
  `amount` float NOT NULL,
  `payment_method` varchar(30) NOT NULL,
  `emp_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_no`, `date_time`, `amount`, `payment_method`, `emp_id`) VALUES
('B0036', '2021-03-21 00:00:00', 220150, 'cheque', 'EMP0046'),
('B0037', '2021-03-21 00:00:00', 186300, 'cash', 'EMP0046'),
('B0038', '2021-03-11 00:00:00', 157800, 'cheque', 'EMP0046'),
('B0039', '2021-03-21 00:00:00', 178500, 'cheque', 'EMP0046'),
('B0040', '2021-03-22 00:00:00', 12800, 'cheque', 'EMP0046');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(30) NOT NULL,
  `brand_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Lenovo'),
(2, 'Asus'),
(3, 'Sony'),
(4, 'HP'),
(5, 'Canon'),
(6, 'Epson');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(30) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Laptop'),
(2, 'CMOS Battery'),
(3, 'Canon toner'),
(4, 'Printer');

-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

CREATE TABLE `cheque` (
  `bill_no` varchar(30) NOT NULL,
  `cheque_id` varchar(50) NOT NULL,
  `received_date` date NOT NULL,
  `due_date` date NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  `cheque_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cheque`
--

INSERT INTO `cheque` (`bill_no`, `cheque_id`, `received_date`, `due_date`, `bank_name`, `cheque_status`) VALUES
('B0036', '1203456', '2021-03-21', '2021-11-25', 'NSB', 1),
('B0038', '956320', '2021-03-11', '2021-10-20', 'Seylan', 1),
('B0039', '45873', '2021-03-21', '2021-10-14', 'HSBC', 1),
('B0040', '202045', '2021-03-22', '2021-06-17', 'ndb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clerk`
--

CREATE TABLE `clerk` (
  `emp_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` varchar(30) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `cust_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `email_address`, `cust_address`) VALUES
('C0039', 'Nuwan sasanka', 'nuwansasanka1@gmail.com', '120/A,Shanthi,Diyagama'),
('C0040', 'gayan', 'gyana@gmail.com', 'Homagama'),
('C0041', 'sanath', 'nuwansasanka1@gmail.com', '120/A,Shanthi,Diyagama'),
('C0042', 'gayan', 'nuwansasanka1@gmail.com', '120/A,Shanthi,Diyagama'),
('C0043', 'Reshani', 'reshani@gmail.com', '120/A,Shanthi,Diyagama'),
('C0044', 'bathigama gamacharige reshani dilhari', 'dilhari1@gmail.com', 'Galwadu gedara,'),
('C0045', 'University of Colombo school of computing', 'reshanidilhari97@gmail.com', 'Galwadu gedara,'),
('C0046', 'heshan ', 'hesh1@gmail.com', '120/A,Shanthi,Diyagama'),
('C0047', 'Nuwan sasanka', 'nuwansasanka1@gmail.com', '120/A,Shanthi,Diyagama'),
('C0048', 'Nuwan sasanka', 'nuwansasanka1@gmail.com', '120/A,Shanthi,Diyagama'),
('C0049', 'Nuwan sasanka', 'nuwansasanka1@gmail.com', '120/A,Shanthi,Diyagama'),
('C0050', 'Sanath', 'sanath85@gmail.com', '120/B,darley road,Colombo5'),
('C0051', 'Dilshan', 'dilsh98@yahoo.com', '23/B,arawwala,Maharagama'),
('C0052', 'Reshani', 'reshanidilhari97@gmail.com', 'Galwadu gedara,Bathigama west,wenappuwa'),
('C0053', 'mahela', 'mahela78@yahoo.com', 'No 20, pipe road, colombo5'),
('C0054', 'michelle', 'michelle125@gmail.com', '12/C, marawila, wennappuwa');

-- --------------------------------------------------------

--
-- Table structure for table `customer_return_item`
--

CREATE TABLE `customer_return_item` (
  `cust_id` varchar(30) NOT NULL,
  `returned_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cust_telephone`
--

CREATE TABLE `cust_telephone` (
  `cust_id` varchar(30) NOT NULL,
  `telephone_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cust_telephone`
--

INSERT INTO `cust_telephone` (`cust_id`, `telephone_no`) VALUES
('C0050', '0781234567'),
('C0051', '0772135647'),
('C0052', '0718361207'),
('C0053', '0782352466'),
('C0054', '0782596321');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `address` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL,
  `mobile_no` int(15) NOT NULL,
  `dob` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `first_name`, `middle_name`, `last_name`, `nic`, `address`, `image`, `position`, `mobile_no`, `dob`) VALUES
('EMP0001', 'Michelle', '', 'Fernando', '986370730V', 'wennappuwa', '', 'Admin', 768757722, '16/05/1998'),
('EMP0004', 'nipuna', 'janith', 'rathnayaka', '971160730V', '212.fjak', 'WIN_20180620_10_55_00_Pro.jpg', 'Clerk', 713559368, '2013/131/1313'),
('EMP0025', 'nuwan', '', 'sasanka', '974525369v', 'gfvljshyudlgrw', '', 'Shopkeeper', 711112220, '1994/10/20'),
('EMP0026', 'reshani', '', 'dilhari', '974440025v', 'adsfyfvg', '', 'Clerk', 714455221, '1992/5/5'),
('EMP0029', 'reshani', '', 'dilhari', '974525369v', 'abcd', '', 'Clerk', 714455221, '1995/02/02'),
('EMP0043', 'Michelle', '', 'Fernando', '', 'bambalapitiya, colombo 05', '', 'Clerk', 768757722, '2005-12-08'),
('EMP0044', 'Michelle', '', 'Fernando', '', 'bambalapitiya, colombo 05', '', 'Shopkeeper', 768757722, '2005-12-21'),
('EMP0045', 'michelle', '', 'Fernando', '', 'Dummaladeniya', '', 'Clerk', 768757722, '2005-12-15'),
('EMP0046', 'Nuwan', '', 'sasanka', '', '120/A,Shanthi,Diyagama', '', 'Shopkeeper', 719180168, '1997-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` varchar(30) NOT NULL,
  `cust_id` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(30) NOT NULL,
  `item_status` tinyint(1) NOT NULL,
  `serial_no` varchar(30) NOT NULL,
  `p_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_status`, `serial_no`, `p_id`) VALUES
(1, 0, '24ML6N0CV07535874C', 1),
(2, 0, '24NL6N0CV00035824D', 1),
(3, 1, '24KB6T0CV085358456R', 1),
(4, 0, '5ES85EA', 2),
(5, 1, '9RS85NB', 2),
(6, 0, '6NMS85MA', 2),
(7, 1, '9HS35NA', 2),
(8, 0, 'PA0N35UV', 3),
(9, 1, 'BV0N95RN', 3),
(10, 0, 'CB4325-GH459807', 4),
(11, 0, 'AR4325-NN459807', 4),
(12, 1, 'VF4359-OT468807', 4),
(13, 1, 'CC5620-RR409800', 4),
(14, 0, 'RR0N45ER', 5),
(15, 0, 'RC0N95MB', 5),
(16, 0, 'RM0N35AA', 5),
(17, 1, 'NC0N25VV', 5),
(18, 1, 'RG0N35KK', 5),
(19, 0, 'BA6N22MB', 5),
(20, 0, 'AN1256RL', 6),
(21, 1, 'BN1256RR', 6),
(22, 1, 'AM1956RL', 6),
(23, 0, 'AZ1656ML', 6),
(24, 1, 'NB1006RK', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `model_id` int(30) NOT NULL,
  `model_name` varchar(30) NOT NULL,
  `total_quantity` int(30) NOT NULL,
  `specification` varchar(255) NOT NULL,
  `reorder_level` int(30) NOT NULL,
  `sales_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`model_id`, `model_name`, `total_quantity`, `specification`, `reorder_level`, `sales_price`) VALUES
(1, 'IdeaPad310', 1, 'The new standard for PC performance has arrived with up to 7th Gen Intel® Core™ i7 processor.', 10, 110000),
(2, 'Vivobook 15 X512', 2, 'VivoBook 15 ,latest Intel® Core™ i7 processor with discrete NVIDIA® graphics and dual storage drives ,8GB ,256SSD,8th Gen', 15, 150000),
(3, 'CMOS 2032', 1, 'Technology Lithium, Voltage 3V,Diameter 20 mm,Weight3,1 g', 10, 150),
(4, 'Envy20', 2, '8th Gen, intel core i7,NVIDIA GEFORCE,1TB HDD,8GB RAM', 10, 145000),
(5, 'Canon 045', 2, 'Canon 045 magenta Toner', 12, 12800),
(6, 'Inkjer L130', 3, 'High-yield ink bottles: 4000 Prints at only Rs.320 per Black Ink Bottle (70ml)\r\nPrint speed up to 8.5ipm\r\nCompact Size', 10, 28500);

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `p_id` int(30) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `category_id` int(30) NOT NULL,
  `model_id` int(30) NOT NULL,
  `brand_id` int(30) NOT NULL,
  `warrenty` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`p_id`, `product_status`, `category_id`, `model_id`, `brand_id`, `warrenty`) VALUES
(1, 1, 1, 1, 1, 24),
(2, 1, 1, 2, 2, 12),
(3, 1, 2, 3, 3, 6),
(4, 1, 1, 4, 4, 24),
(5, 1, 3, 5, 5, 12),
(6, 1, 4, 6, 6, 30);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `bill_no` varchar(30) NOT NULL,
  `item_id` int(30) NOT NULL,
  `cust_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`bill_no`, `item_id`, `cust_id`) VALUES
('B0036', 1, 'C0050'),
('B0036', 2, 'C0050'),
('B0036', 8, 'C0050'),
('B0037', 10, 'C0051'),
('B0037', 16, 'C0051'),
('B0037', 20, 'C0051'),
('B0038', 11, 'C0052'),
('B0038', 14, 'C0052'),
('B0039', 6, 'C0053'),
('B0039', 23, 'C0053'),
('B0040', 15, 'C0054');

-- --------------------------------------------------------

--
-- Table structure for table `shop_return_items`
--

CREATE TABLE `shop_return_items` (
  `sup_id` varchar(30) NOT NULL,
  `returned_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `item_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_return_items`
--

INSERT INTO `shop_return_items` (`sup_id`, `returned_date`, `description`, `item_id`) VALUES
('SUP0002', '2021-03-21', 'battery issue', 4),
('SUP0005', '2021-03-21', 'not working', 19);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` varchar(30) NOT NULL,
  `sup_name` varchar(30) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `active_status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `email_address`, `active_status`) VALUES
('SUP0001', 'Barclays computers', 'Barclays@gmail.com', '1'),
('SUP0002', 'Unity System', 'support@unitysystem.lk', '1'),
('SUP0003', 'Upright Computers', 'Upright@gmail.com', '1'),
('SUP0004', 'Laptop.lk', 'info@laptop.lk', '1'),
('SUP0005', 'WINSOFT', 'thanish@winsoft.lk', '1'),
('SUP0006', 'URBAN', 'urbaninfo@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_product`
--

CREATE TABLE `supplier_product` (
  `sup_id` varchar(30) NOT NULL,
  `p_id` int(30) NOT NULL,
  `date` date NOT NULL,
  `unit_price` float DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_product`
--

INSERT INTO `supplier_product` (`sup_id`, `p_id`, `date`, `unit_price`, `quantity`) VALUES
('SUP0001', 1, '2020-04-09', 90000, 3),
('SUP0002', 2, '2019-06-06', 120000, 4),
('SUP0003', 3, '2020-04-24', 100, 2),
('SUP0004', 4, '2021-01-01', 120000, 4),
('SUP0005', 5, '2020-11-07', 10000, 6),
('SUP0006', 6, '2020-04-10', 23000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `sup_address`
--

CREATE TABLE `sup_address` (
  `sup_id` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sup_address`
--

INSERT INTO `sup_address` (`sup_id`, `address`) VALUES
('SUP0001', 'Bambalapitiya,Galle Road,Colombo 04'),
('SUP0002', 'Galle Road, Colomo 04'),
('SUP0003', 'Puttalam - Colombo Rd, Katuneriya 61180'),
('SUP0004', 'No.313, 1st Floor, Unity Plaza, Colombo 04'),
('SUP0005', 'No. 418, Galle Road, Colombo 03'),
('SUP0006', 'No 1/231 Broadway road, Colombo 10');

-- --------------------------------------------------------

--
-- Table structure for table `sup_telephone`
--

CREATE TABLE `sup_telephone` (
  `sup_id` varchar(30) NOT NULL,
  `telephone_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sup_telephone`
--

INSERT INTO `sup_telephone` (`sup_id`, `telephone_no`) VALUES
('SUP0001', '0719180166'),
('SUP0002', '0734568126'),
('SUP0003', '0718456784'),
('SUP0004', '0777254758'),
('SUP0005', '0772561324'),
('SUP0006', '0112753984');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `emp_id` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`emp_id`, `username`, `password`, `email`, `verified`, `token`) VALUES
('EMP0001', 'mishAdmin', '7068956236499d5241009a15c818fc69', 'mishelnvc@gmail.com', 1, ''),
('EMP0045', 'mishclerk', 'ad4ac7fa40b0af2bae7374c57173f26c', 'mufernando02@gmail.com', 1, '88849b34deca26ae9636b484350182610dfce7170f2d505c2ac5a506fc1a1cfd874f1ab487f9aea10dfe15c1507340cf5887'),
('EMP0044', 'mishshop', '7068956236499d5241009a15c818fc69', '2018cs055@stu.ucsc.cmb.ac.lk', 1, 'a22cdb15bc974f04fd2361766595738b82673b4d014585e087c89973fb6ccf21f4b5eae2ccf5405830fb5df6b61accfacb34'),
('EMP0025', 'nuwan', '4e2c0568628fd242d542b786c77b7a47', 'nuwa@123gmail.com', 1, '9871133a7e84364acf00182dd471ab1e633504af1fc1bbecaa9021065621bf6deda67e959363b52d7fcade687a6c04f5dbce'),
('EMP0046', 'nuwan97', '124bd1296bec0d9d93c7b52a71ad8d5b', 'nuwansasanka1@gmail.com', 1, 'cb6cb831edd2ac7a36ed5932f04563eb207ac57c34e6338cc11d0662355ab74f6a9d817e556a05aa4c1e667a56e0019c3a3e'),
('EMP0029', 'reshani', '8949417e84d8e5cf663ab21a60badb20', 'reshanidilhari97@gmail.com', 1, 'a03b21323936d0ef0dcfa2576efca9c75691bda5c8ac296b06aa6093545b91207efef49975fb3ba09096b32ea1e9c58b8ed8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_no`),
  ADD KEY `bill_ibfk_1` (`emp_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`bill_no`,`cheque_id`);

--
-- Indexes for table `clerk`
--
ALTER TABLE `clerk`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `customer_return_item`
--
ALTER TABLE `customer_return_item`
  ADD PRIMARY KEY (`cust_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `cust_telephone`
--
ALTER TABLE `cust_telephone`
  ADD PRIMARY KEY (`cust_id`,`telephone_no`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `product_list_ibfk_1` (`brand_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `model_id` (`model_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`bill_no`,`cust_id`,`item_id`) USING BTREE,
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `shop_return_items`
--
ALTER TABLE `shop_return_items`
  ADD PRIMARY KEY (`sup_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD PRIMARY KEY (`sup_id`,`p_id`,`date`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `sup_address`
--
ALTER TABLE `sup_address`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `sup_telephone`
--
ALTER TABLE `sup_telephone`
  ADD PRIMARY KEY (`sup_id`) USING BTREE;

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`username`),
  ADD KEY `emp_id` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `p_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cheque`
--
ALTER TABLE `cheque`
  ADD CONSTRAINT `cheque_ibfk_1` FOREIGN KEY (`bill_no`) REFERENCES `bill` (`bill_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clerk`
--
ALTER TABLE `clerk`
  ADD CONSTRAINT `clerk_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_return_item`
--
ALTER TABLE `customer_return_item`
  ADD CONSTRAINT `customer_return_item_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);

--
-- Constraints for table `cust_telephone`
--
ALTER TABLE `cust_telephone`
  ADD CONSTRAINT `cust_telephone_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product_list` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_list`
--
ALTER TABLE `product_list`
  ADD CONSTRAINT `product_list_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_list_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_list_ibfk_3` FOREIGN KEY (`model_id`) REFERENCES `model` (`model_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`bill_no`) REFERENCES `bill` (`bill_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shop_return_items`
--
ALTER TABLE `shop_return_items`
  ADD CONSTRAINT `shop_return_items_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`),
  ADD CONSTRAINT `shop_return_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`);

--
-- Constraints for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD CONSTRAINT `supplier_product_ibfk_2` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_product_ibfk_3` FOREIGN KEY (`p_id`) REFERENCES `product_list` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sup_address`
--
ALTER TABLE `sup_address`
  ADD CONSTRAINT `sup_address_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sup_telephone`
--
ALTER TABLE `sup_telephone`
  ADD CONSTRAINT `sup_telephone_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_account`
--
ALTER TABLE `user_account`
  ADD CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
