-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 12:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `emp_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_no` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL,
  `amount` float NOT NULL,
  `payment_method` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `emp_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

CREATE TABLE `cheque` (
  `bill_no` varchar(30) NOT NULL,
  `cheque_id` varchar(50) NOT NULL,
  `received date` date NOT NULL,
  `due_date` date NOT NULL,
  `bank_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `email_address`, `address`) VALUES
('CUST0001', 'shubangi', 'shubangi123@gmail.com', 'rgfueg'),
('CUST0002', 'reshani', 'reshani123@gmail.com', 'rgfueg'),
('CUST0003', 'Michelle', 'michelle123@gmail.com', 'jglujgh'),
('CUST0004', 'Danu', 'danu123@gmail.com', 'hripue[ihncv');

-- --------------------------------------------------------

--
-- Table structure for table `customer_return_item`
--

CREATE TABLE `customer_return_item` (
  `cust_id` varchar(30) NOT NULL,
  `serial_no` varchar(30) NOT NULL,
  `returned_date` date NOT NULL,
  `description` varchar(200) NOT NULL
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
('CUST0001', '0714526369'),
('CUST0002', '0714526369'),
('CUST0003', '0778562369'),
('CUST0004', '0715963245');

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
('EMP0044', 'Michelle', '', 'Fernando', '', 'bambalapitiya, colombo 05', '', 'Shopkeeper', 768757722, '2005-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `emp_telephone`
--

CREATE TABLE `emp_telephone` (
  `emp_id` varchar(30) NOT NULL,
  `telephone_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `serial_no` varchar(50) NOT NULL,
  `sales_price` float NOT NULL,
  `p_id` varchar(30) NOT NULL,
  `item_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`serial_no`, `sales_price`, `p_id`, `item_status`) VALUES
('000000030@P0003', 230000, 'P0003', 1),
('000000031@P0003', 230000, 'P0003', 1),
('000000032@P0003', 230000, 'P0003', 1),
('0000001@P0002', 75000, 'P0002', 1),
('00000020@P0001', 82000, 'P0001', 1),
('00000021@P0001', 82000, 'P0001', 1),
('00000022@P0001', 82000, 'P0001', 1),
('00000023@P0001', 82000, 'P0001', 1),
('0000002@P0002', 75000, 'P0002', 1),
('0000003@P0002', 75000, 'P0002', 1),
('00000040@P0004', 1950, 'P0004', 1),
('00000041@P0004', 1950, 'P0004', 1),
('00000042@P0004', 1950, 'P0004', 1),
('00000043@P0004', 1950, 'P0004', 1),
('00000044@P0004', 1950, 'P0004', 1),
('00000045@P0004', 1950, 'P0004', 1),
('00000046@P0004', 1950, 'P0004', 1),
('00000047@P0004', 1950, 'P0004', 1),
('00000048@P0004', 1950, 'P0004', 1),
('00000049@P0004', 1950, 'P0004', 1),
('0000004@P0002', 75000, 'P0002', 1),
('00000050@P0005', 18500, 'P0005', 1),
('00000051@P0005', 18500, 'P0005', 1),
('00000052@P0005', 18500, 'P0005', 1),
('00000053@P0005', 18500, 'P0005', 1),
('00000054@P0005', 18500, 'P0005', 1),
('0000005@P0002', 75000, 'P0002', 1),
('00000060@P0006', 1750, 'P0006', 1),
('00000061@P0006', 1750, 'P0006', 1),
('00000062@P0006', 1750, 'P0006', 1),
('00000063@P0006', 1750, 'P0006', 1),
('00000064@P0006', 1750, 'P0006', 1),
('00000065@P0006', 1750, 'P0006', 1),
('00000066@P0006', 1750, 'P0006', 1),
('00000067@P0006', 1750, 'P0006', 1),
('0000006@P0002', 75000, 'P0002', 1),
('00000070@P0007', 2490, 'P0007', 1),
('00000071@P0007', 2490, 'P0007', 1),
('00000072@P0007', 2490, 'P0007', 1),
('00000073@P0007', 2490, 'P0007', 1),
('00000074@P0007', 2490, 'P0007', 1),
('00000075@P0007', 2490, 'P0007', 1),
('00000080@P0008', 84200, 'P0008', 1),
('00000081@P0008', 84200, 'P0008', 1),
('00000082@P0008', 84200, 'P0008', 1),
('00000083@P0008', 84200, 'P0008', 1),
('00000084@P0008', 84200, 'P0008', 1),
('00000090@P0009', 1450, 'P0009', 1),
('00000091@P0009', 1450, 'P0009', 1),
('00000092@P0009', 1450, 'P0009', 1),
('00000093@P0009', 1450, 'P0009', 1),
('00000094@P0009', 1450, 'P0009', 1),
('00000095@P0009', 1450, 'P0009', 1),
('00000096@P0009', 1450, 'P0009', 1),
('00000097@P0009', 1450, 'P0009', 1),
('00000098@P0009', 1450, 'P0009', 1),
('00000120@P0011', 33500, 'P0011', 1),
('00000121@P0011', 33500, 'P0011', 1),
('00000122@P0011', 33500, 'P0011', 1),
('00000123@P0011', 33500, 'P0011', 1),
('00000130@P0012', 26700, 'P0012', 1),
('00000132@P0012', 26700, 'P0012', 1),
('00000133@P0012', 26700, 'P0012', 1),
('00000140@P0013', 200, 'P0013', 1),
('00000141@P0013', 200, 'P0013', 1),
('00000142@P0013', 200, 'P0013', 1),
('00000143@P0013', 200, 'P0013', 1),
('00000144@P0013', 200, 'P0013', 1),
('00000145@P0013', 200, 'P0013', 1),
('00000150@P0014', 2700, 'P0014', 1),
('00000151@P0014', 2700, 'P0014', 1),
('00000152@P0014', 2700, 'P0014', 1),
('00000153@P0014', 2700, 'P0014', 1),
('00000160@P0015', 185000, 'P0015', 1),
('00000161@P0015', 185000, 'P0015', 1),
('00000162@P0015', 185000, 'P0015', 1),
('00000163@P0015', 185000, 'P0015', 1),
('0000110@P0010', 153600, 'P0010', 1),
('0000111@P0010', 153600, 'P0010', 1),
('0000112@P0010', 153600, 'P0010', 1),
('0000113@P0010', 153600, 'P0010', 1),
('0000114@P0010', 153600, 'P0010', 1),
('0000115@P0010', 153600, 'P0010', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` varchar(30) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_cost` int(10) NOT NULL,
  `brand_name` varchar(30) NOT NULL,
  `reorder_level` int(10) NOT NULL,
  `model_no` varchar(30) NOT NULL,
  `quantity` int(10) NOT NULL,
  `warranty` int(10) NOT NULL,
  `product_status` varchar(15) NOT NULL,
  `product_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_cost`, `brand_name`, `reorder_level`, `model_no`, `quantity`, `warranty`, `product_status`, `product_date`) VALUES
('P0001', 'Laptop', 75800, 'Lenovo', 2, 'IdeaPad 310', 1, 18, '1', '2020-11-30'),
('P0002', 'Laptop', 64500, 'Asus', 2, 'Vivobook X512', 6, 24, '1', '2020-11-30'),
('P0003', 'Laptop', 200000, 'HP', 1, 'Envy20', 3, 24, '1', '2020-11-30'),
('P0004', 'Wireless Mouse - USB', 1500, 'Logitech', 2, 'W56', 10, 6, '1', '2020-11-30'),
('P0005', 'Head Phones', 14000, 'AKG', 2, 'Y50BT', 5, 12, '1', '2020-11-30'),
('P0006', 'Multimedia office keyboard', 1450, 'Fantech ', 5, 'K210', 8, 3, '1', '2020-11-30'),
('P0007', 'Keyboard - Gaming', 2300, 'Fantech', 3, 'k613', 6, 12, '1', '2020-11-30'),
('P0008', 'Laptop', 75000, 'Dell', 1, 'Inspiron 532', 5, 24, '1', '2020-11-30'),
('P0009', 'Keyboard - wireless slim', 1200, 'K1000', 5, '78 chocolate', 4, 3, '1', '2020-11-30'),
('P0010', 'Laptop', 140000, 'Acer', 2, 'Swift3', 2, 24, '1', '2020-11-30'),
('P0011', 'Printers', 30500, 'Cannon', 2, 'LBP-611CN', 4, 12, '1', '2020-11-30'),
('P0012', 'Printer', 23650, 'Cannon', 1, 'LBP-253X', 3, 12, '1', '2020-11-30'),
('P0013', 'CMOS battery', 130, 'Sony', 2, 'CMOS 2032', 6, 1, '1', '2020-11-30'),
('P0014', 'UPS battery', 2100, 'CyberPower', 1, 'HHL12v', 4, 6, '1', '2020-11-30'),
('P0015', 'Laptop', 170000, 'Asus', 1, 'Zenbook 15', 4, 24, '1', '2020-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `bill_no` varchar(30) NOT NULL,
  `serial_no` varchar(30) NOT NULL,
  `cust_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shopkeeper`
--

CREATE TABLE `shopkeeper` (
  `emp_id` varchar(30) NOT NULL
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
('SUP0011', 'Unity System', 'support@unitysystem.lk', ''),
('SUP0012', 'Upright Computers', 'Upright@gmail.com', ''),
('SUP0013', 'REVO COMPUTERS & SECURITY SOLU', 'info@revocomputers.lk', ''),
('SUP0014', 'Metropolitan Computers (Pvt) L', 'shamazh@metropolitan.lk', ''),
('SUP0015', 'Colombo Computer Technology (P', 'info@computertech.lk', ''),
('SUP0016', 'Laptop.lk', 'info@laptop.lk', ''),
('SUP0017', 'Singer PLC', 'callcenter@singersl.com', ''),
('SUP0018', 'Abans', 'buyabans@abansgroup.com', ''),
('SUP0019', 'Pettah Computers', 'info@pettahcomputers.com', ''),
('SUP0020', 'Winsoft Solutions', 'thanish@winsoft.lk', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_product`
--

CREATE TABLE `supplier_product` (
  `sup_id` varchar(30) NOT NULL,
  `p_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier_product`
--

INSERT INTO `supplier_product` (`sup_id`, `p_id`) VALUES
('SUP0010', 'P0001'),
('SUP0011', 'P0003'),
('SUP0012', 'P0004'),
('SUP0012', 'P0013'),
('SUP0012', 'P0014'),
('SUP0014', 'P0007'),
('SUP0014', 'P0015'),
('SUP0015', 'P0002'),
('SUP0017', 'P0008'),
('SUP0018', 'P0010'),
('SUP0019', 'P0005'),
('SUP0019', 'P0011'),
('SUP0019', 'P0012'),
('SUP0020', 'P0006'),
('SUP0020', 'P0009');

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
('SUP0020', 'No.313, 1st Floor, Unity Plaza, Colombo 04');

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
('SUP0020', '0772368024');

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
('EMP0043', 'mishclerk', '7068956236499d5241009a15c818fc69', 'mufernando02@gmail.com', 1, 'c933c78460fd2d106a3c7d89855bdf506f2baa21c84767e7b4a05410f4e16b44c8a494fe71b355af7278b1ae5d4eb9bf2d07'),
('EMP0044', 'mishshop', '7068956236499d5241009a15c818fc69', '2018cs055@stu.ucsc.cmb.ac.lk', 1, 'a22cdb15bc974f04fd2361766595738b82673b4d014585e087c89973fb6ccf21f4b5eae2ccf5405830fb5df6b61accfacb34'),
('EMP0025', 'nuwan', '4e2c0568628fd242d542b786c77b7a47', 'nuwa@123gmail.com', 1, '9871133a7e84364acf00182dd471ab1e633504af1fc1bbecaa9021065621bf6deda67e959363b52d7fcade687a6c04f5dbce'),
('EMP0029', 'reshani', '8949417e84d8e5cf663ab21a60badb20', 'reshanidilhari97@gmail.com', 0, 'a03b21323936d0ef0dcfa2576efca9c75691bda5c8ac296b06aa6093545b91207efef49975fb3ba09096b32ea1e9c58b8ed8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_no`),
  ADD KEY `bill_ibfk_1` (`emp_id`);

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
  ADD PRIMARY KEY (`cust_id`,`serial_no`);

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
-- Indexes for table `emp_telephone`
--
ALTER TABLE `emp_telephone`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`serial_no`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`bill_no`,`serial_no`,`cust_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `serial_no` (`serial_no`);

--
-- Indexes for table `shopkeeper`
--
ALTER TABLE `shopkeeper`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD PRIMARY KEY (`sup_id`,`p_id`),
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
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `cust_telephone`
--
ALTER TABLE `cust_telephone`
  ADD CONSTRAINT `cust_telephone_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emp_telephone`
--
ALTER TABLE `emp_telephone`
  ADD CONSTRAINT `emp_telephone_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`bill_no`) REFERENCES `bill` (`bill_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_ibfk_3` FOREIGN KEY (`serial_no`) REFERENCES `item` (`serial_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopkeeper`
--
ALTER TABLE `shopkeeper`
  ADD CONSTRAINT `shopkeeper_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier_product`
--
ALTER TABLE `supplier_product`
  ADD CONSTRAINT `supplier_product_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_product_ibfk_2` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
