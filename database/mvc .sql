-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2021 at 08:00 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

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
('B0001', '2020-12-01 00:00:00', 153600, 'cheque', 'EMP0044'),
('B0002', '2020-12-01 00:00:00', 153600, 'cheque', 'EMP0044'),
('B0003', '2020-12-01 00:00:00', 2000, 'cheque', 'EMP0044'),
('B0004', '2020-12-02 00:00:00', 2000, 'cheque', 'EMP0044'),
('B0005', '2020-12-02 00:00:00', 2000, 'cheque', 'EMP0044'),
('B0006', '2020-12-03 00:00:00', 20000, 'cheque', 'EMP0044'),
('B0007', '2020-12-03 00:00:00', 153600, 'cheque', 'EMP0044'),
('B0008', '2020-12-01 00:00:00', 153600, 'cheque', 'EMP0044'),
('B0009', '2020-12-03 00:00:00', 2000, 'cheque', 'EMP0044'),
('B0010', '2020-12-02 00:00:00', 1950, 'cheque', 'EMP0044'),
('B0011', '2020-12-01 00:00:00', 75000, 'cheque', 'EMP0044'),
('B0012', '2020-12-02 00:00:00', 250000, 'cheque', 'EMP0044'),
('B0013', '2020-12-03 00:00:00', 23000, 'cheque', 'EMP0044'),
('B0014', '2020-07-29 00:00:00', 82000, 'cheque', 'EMP0044'),
('B0015', '2020-05-06 00:00:00', 185000, 'cheque', 'EMP0044');

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
(2, 'HP'),
(3, 'Asus'),
(4, 'AKG'),
(5, 'Sony');

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
(2, 'Head Phones'),
(3, 'CMOS Battery'),
(4, 'Mouse'),
(5, 'Keyboard-Gaming');

-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

CREATE TABLE `cheque` (
  `bill_no` varchar(30) NOT NULL,
  `cheque_id` varchar(50) NOT NULL,
  `received_date` date NOT NULL,
  `due_date` date NOT NULL,
  `bank_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cheque`
--

INSERT INTO `cheque` (`bill_no`, `cheque_id`, `received_date`, `due_date`, `bank_name`) VALUES
('B0010', '4523', '2020-12-01', '2021-01-08', 'HSBC'),
('B0011', '2568', '2020-12-01', '2021-02-19', 'HSBC'),
('B0012', '52684', '2020-12-01', '2021-02-19', 'NDB'),
('B0013', 'CH0021', '2020-12-01', '2021-10-21', 'NDB'),
('B0014', 'CHA12', '2020-08-01', '2028-01-07', 'HSBC'),
('B0015', 'CN002', '2020-08-05', '2024-06-29', 'BOC');

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
('C0001', 'nuwan sasanka deraniyagala', 'nuwansasanka1@gmail.com', 'homagama'),
('C0004', 'banuka', 'banu@gmail.com', 'mahargama'),
('C0007', 'banuka', 'banu@gmail.com', 'mahargama'),
('C0008', 'banuka', 'banu@gmail.com', 'mahargama'),
('C0009', 'reshani', 'reshani@gmail.com', 'matara'),
('C0012', 'banuka', 'banu@gmail.com', 'mahargama'),
('C0014', 'kusal', 'kusal@gmail.com', 'mahargama'),
('C0016', 'kusal', 'kusal@gmail.com', 'mahargama'),
('C0021', 'kusal', 'kusal@gmail.com', 'mahargama'),
('C0023', 'manjitha', 'manjth@gmail.com', 'Homagama'),
('C0024', 'pasan', 'pasan@gmail.com', 'Nugegoda'),
('C0025', 'janith', 'jani@yahoo.com', 'Padukka'),
('C0026', 'Damidu', 'daidu@yahoo.com', 'Maharagama'),
('C0027', 'nuwan', 'nuwansasanka1@gmail.com', 'homagama'),
('C0028', 'sanath', 'sanath@gmail.com', 'mahargama'),
('C0029', 'sasanka', 'sasanka@gmail.com', 'Kottawa');

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
('C0004', '0714526369'),
('C0007', '0714526369'),
('C0025', '0778562369'),
('C0027', '0715963245');

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
('EMP0030', 'reshani', 'dilhari', 'vfdcwe', 'Clark.JPG', ' vnbtoij', '', 'Clerk', 256349872, '1992/5/5'),
('EMP0042', 'admin2', 'sbdhbc', 'smcdkc', '978542201v', '', '', 'Admin', 0, ''),
('EMP0043', 'Michelle', '', 'Fernando', '', 'bambalapitiya, colombo 05', '', 'Clerk', 768757722, '2005-12-08'),
('EMP0044', 'Michelle', '', 'Fernando', '', 'bambalapitiya, colombo 05', '', 'Shopkeeper', 768757722, '2005-12-21'),
('EMP0045', 'michelle', '', 'Fernando', '', 'Dummaladeniya', '', 'Clerk', 768757722, '2005-12-15');

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
(1, 1, '24ML6N0CV08535824C', 3),
(2, 1, '24ML6N0CV08553684C', 3),
(3, 1, '24ML6N0CV45236987C', 3),
(4, 1, '24ML6N0CV63598742C', 3),
(5, 1, '24ML6N0CV78562349D', 3),
(6, 1, '5ES85EA', 2),
(7, 1, '5AB98AB', 2),
(8, 1, '5RN20RN', 2),
(9, 1, 'AB0123-CF567432', 4),
(10, 1, 'CB4325-GH459807', 4),
(11, 1, 'TY4325-KH659874', 4),
(12, 1, 'PA0N35UV', 1),
(13, 1, 'TY0N45ER', 1),
(14, 1, '56734890R', 5),
(15, 1, '27984531M', 5),
(16, 1, '56879034', 5),
(17, 1, '67098345', 5);

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
(1, 'IdeaPad310', 0, 'The new standard for PC performance has arrived with up to 7th Gen Intel® Core™ i7 processor.', 2, 165000),
(2, 'Envy20', 0, '8th Gen, intel core i7,NVIDIA GEFORCE,1TB HDD,8GB RAM', 2, 155000),
(3, 'Vivobook 15 X512', 0, 'VivoBook 15 ,latest Intel® Core™ i7 processor with discrete NVIDIA® graphics and dual storage drives ,8GB ,256SSD,8th Gen', 3, 185000),
(4, 'Y50BT', 0, 'Bluetooth headphones, Frequency range20-20kHz,MAX input power50mW,Impedance32ohms,Cable length1.2m detachable audio cable, Connection Jack 3.5mm, Sensitivity113dB SPL/V', 5, 1500),
(5, 'CMOS 2032', 0, 'Technology Lithium, Voltage 3V,Diameter 20 mm,Weight3,1 g', 6, 100);

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
(2, 1, 1, 2, 2, 18),
(3, 1, 1, 3, 3, 36),
(4, 1, 2, 4, 4, 12),
(5, 1, 3, 5, 5, 3);

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
('B0001', 1, 'C0001'),
('B0002', 2, 'C0004'),
('B0003', 3, 'C0008'),
('B0007', 3, 'C0016'),
('B0005', 4, 'C0023'),
('B0010', 5, 'C0014'),
('B0011', 15, 'C0025');

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
('SUP0010', 'Barclays computers', 'Barclays@gmail.com', '1'),
('SUP0011', 'Unity System', 'support@unitysystem.lk', '1'),
('SUP0012', 'Upright Computers', 'Upright@gmail.com', '1'),
('SUP0013', 'REVO COMPUTERS & SECURITY SOLU', 'info@revocomputers.lk', '1'),
('SUP0014', 'Metropolitan Computers (Pvt) L', 'shamazh@metropolitan.lk', '1'),
('SUP0015', 'Colombo Computer Technology (P', 'info@computertech.lk', '1'),
('SUP0016', 'Laptop.lk', 'info@laptop.lk', '1'),
('SUP0017', 'Singer PLC', 'callcenter@singersl.com', '1'),
('SUP0018', 'Abans', 'buyabans@abansgroup.com', '1'),
('SUP0019', 'Pettah Computers', 'info@pettahcomputers.com', '1'),
('SUP0020', 'Winsoft Solutions', 'thanish@winsoft.lk', '1'),
('SUP0021', 'michelle', 'mufernando02@gmail.com', '1');

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
('SUP0010', 1, '2020-09-09', 150000, 10),
('SUP0011', 1, '2020-10-15', 152000, 12),
('SUP0012', 4, '2020-11-12', 1000, 50),
('SUP0012', 5, '2020-12-30', 70, 10),
('SUP0014', 2, '2020-09-23', 150000, 15),
('SUP0014', 4, '2020-12-10', 1200, 20),
('SUP0016', 2, '2020-10-17', 152000, 8),
('SUP0017', 4, '2020-12-31', 1100, 15),
('SUP0018', 3, '2020-10-22', 180000, 18),
('SUP0019', 2, '2020-11-24', 153000, 15),
('SUP0020', 5, '2020-12-18', 80, 8),
('SUP0021', 3, '2020-11-26', 182000, 13);

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
('SUP0010', 'Bambalapitiya,Galle Road,Colombo 04'),
('SUP0011', 'Galle Road, Colomo 04'),
('SUP0012', 'Wennapuwa'),
('SUP0013', ' Puttalam - Colombo Rd, Katuneriya 61180'),
('SUP0014', 'No. 418, Galle Road, Colombo 03'),
('SUP0015', '17 Lily Ave, Colombo'),
('SUP0016', '401 Galle Rd, Colombo 00400'),
('SUP0017', 'No.112, havelock Road, Colombo5'),
('SUP0018', 'No 498 Galle Road,  Colombo 03,'),
('SUP0019', ' NO 100/22, Mumtaz Mahal, 1st Cross Street, Colomb'),
('SUP0020', 'No.313, 1st Floor, Unity Plaza, Colombo 04'),
('SUP0021', 'Dummaladeniya');

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
('SUP0010', '0117510510'),
('SUP0011', '0114545443'),
('SUP0012', '0775326399'),
('SUP0013', '0764949649'),
('SUP0014', '0114 622 1'),
('SUP0015', '0112055835'),
('SUP0016', '0773277277'),
('SUP0017', '0115400400'),
('SUP0018', '0112565265'),
('SUP0019', '0777735516'),
('SUP0020', '0772368024'),
('SUP0021', '0768757722');

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
('EMP0042', 'admin2', '4e2c0568628fd242d542b786c77b7a47', 'nuwansasanka1@gmail.com', 0, ''),
('EMP0030', 'miche', '7068956236499d5241009a15c818fc69', 'mishelnvc@gmail.com', 0, '6a82f4834098a0d3cf0a47e04a362fd8e56c23c5903ce94cb027e30e870a50e9803d2ea37e1b95817a7a024dab33ee570b5b'),
('EMP0001', 'mishAdmin', '7068956236499d5241009a15c818fc69', 'mishelnvc@gmail.com', 1, ''),
('EMP0045', 'mishclerk', 'ad4ac7fa40b0af2bae7374c57173f26c', 'mufernando02@gmail.com', 1, '88849b34deca26ae9636b484350182610dfce7170f2d505c2ac5a506fc1a1cfd874f1ab487f9aea10dfe15c1507340cf5887'),
('EMP0044', 'mishshop', '7068956236499d5241009a15c818fc69', '2018cs055@stu.ucsc.cmb.ac.lk', 1, 'a22cdb15bc974f04fd2361766595738b82673b4d014585e087c89973fb6ccf21f4b5eae2ccf5405830fb5df6b61accfacb34'),
('EMP0025', 'nuwan', '4e2c0568628fd242d542b786c77b7a47', 'nuwa@123gmail.com', 1, '9871133a7e84364acf00182dd471ab1e633504af1fc1bbecaa9021065621bf6deda67e959363b52d7fcade687a6c04f5dbce'),
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
  ADD PRIMARY KEY (`bill_no`,`cust_id`),
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
  MODIFY `brand_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `model_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `p_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
