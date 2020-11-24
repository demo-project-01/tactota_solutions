-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 06:56 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
('EMP0004', 'nipuna', 'janith', 'rathnayaka', '971160730V', '212.fjak', 'WIN_20180620_10_55_00_Pro.jpg', 'Clerk', 713559368, '2013/131/1313'),
('EMP0005', 'xddda', 'asdad', 'dasasd', '971160V', '212.fjak', '', 'Clerk', 723535, '1997/04.25'),
('EMP0006', 'jannith', 'jgjsfsdfjkhsdj', 'sdhfjshl', '798908989v', 'hdskdksjf', '', 'Shop Keeper', 9809898, '1998.2.4'),
('EMP0007', 'ben', 'tenistion', 'go', '971160730v', '1233fff', '', 'Shopkeeper', 713559368, '1997/04.25'),
('EMP0008', 'xxx', 'aaaa', 'ddddd', '933849283832', '212.fjak', '', 'Shopkeeper', 713559368, '1997/04.25'),
('EMP0009', 'ertyuio', 'awresdtfyguhijok', 'serdtfyguhijk', '96788V', '3456tghjk', '', 'Clerk', 567890, '1998.2.4'),
('EMP0010', 'van', 'bab', 'nav', '9711694V', '212,mafdfdsf', '', 'Admin', 713559368, '1997/04.25'),
('EMP0011', 'JaNith', 'nipun', 'esfdsfsd', '971160V', 'dfsdfdasf3', '', 'Clerk', 0, '1998.2.4'),
('EMP0012', 'sjfhsjfhjfdsf', 'fsdfsdf', 'sfddsds', '971160730V', '212.fjak', '', 'Clerk', 723535, '1998.2.4'),
('EMP0013', 'fhjgjhj', 'fjhgjhj', 'fghfhjgjkhjk', '099908080', 'gfghgj', '', 'Clerk', 0, '1997/04.25'),
('EMP0014', 'fdgdgdfhd', 'sdgshgsd', 'sdggsdsg', 'sgdgsgsg', 'sdgsdgsd', '', 'Clerk', 713559368, '1998.2.4'),
('EMP0015', 'ccddff', 'sadafa', 'affafas', 'asffafsa', 'fafafa', '', 'Shopkeeper', 0, 'afsafsffas'),
('EMP0016', 'fghjkl;', 'sdfghjkl', 'iujkkl', '098765', 'ruyghujkl;', '', 'Shopkeeper', 4567890, '1997/04.25'),
('EMP0017', 'hdflhalf', 'afafa', 'affafa', '32425f', 'asfsaf', '', 'Clerk', 2147483647, '12233'),
('EMP0018', 'dsfsfs', 'fdsgsg', 'sdfsdfs', '2342fd', 'dsfsfs', '', 'Clerk', 32525, '12233'),
('EMP0019', 'fdfsdfds', 'dsfsdfds', 'sdfsdfsdf', '3424f', 'erwtwe', '', 'Clerk', 452252, '1232ff'),
('EMP0020', 'xzczcz', 'cxzczc', 'zxczc', '32432ffd', 'cxzxcz', '', 'Clerk', 324234, '12233'),
('EMP0021', 'ewrw', 'wqreq', 'wqrewqr', '43533546', '232dsfsd', '', 'Clerk', 876776, '1234'),
('EMP0022', 'ewrw', 'wqreq', 'wqrewqr', '43533546', '232dsfsd', '', 'Clerk', 876776, '1234'),
('EMP0023', 'ewrw', 'wqreq', 'wqrewqr', '43533546', '232dsfsd', '', 'Clerk', 876776, '1234'),
('EMP0024', 'reshani', 'sdfg', 'dilhari', '974440025v', 'rgfueg', '', 'Clerk', 714455221, '1995/02/02'),
('EMP0025', 'nuwan', '', 'sasanka', '974525369v', 'gfvljshyudlgrw', '', 'Shopkeeper', 711112220, '1994/10/20'),
('EMP0026', 'reshani', '', 'dilhari', '974440025v', 'adsfyfvg', '', 'Clerk', 714455221, '1992/5/5'),
('EMP0027', 'rehani', '', 'dilhari', '974440025v', 'adsfyfvg', '', 'Clerk', 714455221, '1992/5/5'),
('EMP0028', 'Ashika', '', 'abeysuriya', '974525369v', 'hfbvkjfdvb', '', 'Shopkeeper', 711112220, '1997/5/8'),
('EMP0029', 'reshani', '', 'dilhari', '974525369v', 'abcd', '', 'Clerk', 714455221, '1995/02/02');

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
  `item_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`serial_no`, `sales_price`, `p_id`, `item_status`) VALUES
('12#P0027', 100000, 'P0027', '1'),
('12#P0028', 60000, 'P0028', '1'),
('1999', 0, 'P0001', ''),
('32', 10000, 'P0024', 'active'),
('56', 500, 'P0025', 'active'),
('dfsd', 0, 'P0022', 'active');

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
('P0001', 'sssss', 1999, 'dsfdsfs', 4, 'sdfds', 0, 2, '', '0000-00-00'),
('P0002', 'dssf', 1999, 'dsfdsfs', 4, 'sdfds', 0, 2, '', '0000-00-00'),
('P0003', 'dssf', 1999, 'dsfdsfs', 4, 'sdfds', 0, 2, '', '0000-00-00'),
('P0004', 'dssf', 1999, 'dsfdsfs', 4, 'sdfds', 0, 2, '', '0000-00-00'),
('P0005', 'dssf', 1999, 'dsfdsfs', 4, 'sdfds', 0, 2, 'SUP0002', '0000-00-00'),
('P0006', 'dssf', 1999, 'dsfdsfs', 4, 'sdfds', 0, 2, 'SUP0002', '0000-00-00'),
('P0007', 'chorem', 200, 'dsadadas', 4, 'dfafa', 0, 12, 'SUP0002', '0000-00-00'),
('P0008', 'chorem', 200, 'dsadadas', 4, 'dfafa', 0, 12, 'SUP0002', '0000-00-00'),
('P0009', 'choremd', 200, 'dsadadasd', 4, 'dfafad', 0, 121, '200', '0000-00-00'),
('P0010', 'choremd', 200, 'dsadadasd', 4, 'dfafad', 0, 121, '200', '0000-00-00'),
('P0011', 'choremd', 200, 'dsadadasd', 4, 'dfafad', 121, 4, 'active', '2020-10-30'),
('P0012', 'dssf', 300, 'dsadadasd', 4, 'sdfds', 121, 9, 'active', '2020-10-30'),
('P0013', 'dssf', 300, 'dsadadasd', 4, 'sdfds', 1212, 9, 'active', '2020-10-30'),
('P0014', 'dssf', 300, 'dsadadasd', 4, 'sdfds', 1212, 9, 'active', '2020-10-30'),
('P0015', 'dssf', 300, 'dsadadasd', 4, 'sdfds', 1212, 9, 'active', '2020-10-30'),
('P0016', 'dssf', 300, 'dsadadasd', 4, 'sdfds', 1212, 9, 'active', '2020-10-30'),
('P0017', 'dssf', 300, 'dsadadasd', 4, 'sdfds', 1212, 9, 'active', '2020-10-30'),
('P0018', 'dssf', 1232, 'dsfdsfs', 4, 'dfafad', 2, 9, 'active', '2020-10-30'),
('P0019', 'dssf', 1232, 'dsfdsfs', 4, 'dfafad', 2, 9, 'active', '2020-10-30'),
('P0020', 'dssf', 1232, 'dsfdsfs', 4, 'dfafad', 2, 9, 'active', '2020-10-30'),
('P0021', 'dssf', 300, 'dsfdsfs', 4, 'dfafad', 121, 9, 'active', '2020-10-30'),
('P0022', 'dssf', 0, 'dsfdsfs', 4, 'sdfds', 2, 9, 'active', '2020-10-30'),
('P0023', 'dssf', 300, 'dsfdsfs', 4, 'dfafad', 2, 9, 'active', '2020-10-30'),
('P0024', 'laptop', 50000, 'asus', 0, '1234', 5, 3, 'active', '2020-11-09'),
('P0025', 'mouse', 10000, 'rtyjy', 20, '0112563958', 5, 5, 'active', '2020-11-09'),
('P0026', 'mouse', 10000, 'rtyjy', 20, '0112563958', 5, 5, 'active', '2020-11-09'),
('P0027', 'laptop', 85000, 'hp', 2, '123', 5, 3, '1', '2020-11-15'),
('P0028', 'laptop', 50000, 'lenavo', 2, '12345', 1, 5, '1', '2020-11-15');

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
('', '', '', '1'),
('SUP0001', 'ghgjkj', 'tosee497@gmail.com', '0'),
('SUP0002', 'vinu', 'mnjrathnayaka97@yahoo.com', '0'),
('SUP0003', 'van', '2018cs133@stu.ucsc.cmb.ac.lk', '0'),
('SUP0004', 'janith affafa', 'tose7@gmail.com', '0'),
('SUP0005', 'abc', 'era123@gmail.com', '0'),
('SUP0006', 'fxf', 'ridmi@gmail.com', '0'),
('SUP0007', 'reshani', 'resh123@gmail.com', '0'),
('SUP0008', 'eranga', 'abc@gmail.com', '1');

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
('SUP0002', 'P0024'),
('SUP0003', 'P0023'),
('SUP0005', 'P0025'),
('SUP0005', 'P0026'),
('SUP0008', 'P0027'),
('SUP0008', 'P0028');

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
('SUP0001', '2123dd'),
('SUP0002', 'van'),
('SUP0003', '2344dfsfs'),
('SUP0004', 'asfsaf'),
('SUP0005', 'jglujgh'),
('SUP0006', 'fgcfhc'),
('SUP0007', 'FVFHDFVBIS'),
('SUP0008', 'abcd,colombo 10');

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
('SUP0001', '07835327'),
('SUP0002', 'adff'),
('SUP0003', '07832451'),
('SUP0004', '9907297221'),
('SUP0005', '0412255663'),
('SUP0006', '0714455221'),
('SUP0007', '0714455221'),
('SUP0008', '0742563981');

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
('EMP0008', 'admin', '9927404cdb6613495aef0ea69b8f9b23', 'mnjrathnayaka97@gmail.com', 0, ''),
('EMP0015', 'admin1234', '827ccb0eea8a706c4c34a16891f84e7b', 'xxdsdx@gmail.com', 0, ''),
('EMP0028', 'Ashika', '07c5152932a3c8aead3a2e83174cea34', 'ashikaabeysuriya456@gmail.com', 0, '11de70e86edd7a0c17a3407eac46777314c574fd0b4519ab6fa9f0d6ac3b0af813f841a1eb9133b01c7e4ae92c9a11b9499d'),
('EMP0007', 'ben', '9927404cdb6613495aef0ea69b8f9b23', '2018cs133@stu.ucsc.cmb.ac.lk', 0, ''),
('EMP0012', 'bus', '827ccb0eea8a706c4c34a16891f84e7b', 'qqq@yahoo.com', 0, ''),
('EMP0005', 'ccc', '202cb962ac59075b964b07152d234b70', 'ccdd@gmail.comm', 0, ''),
('EMP0009', 'clerk', '827ccb0eea8a706c4c34a16891f84e7b', 'vvvv@gmail.com', 0, ''),
('EMP0014', 'clerk1', '827ccb0eea8a706c4c34a16891f84e7b', 'bnm@gmail.com', 0, ''),
('EMP0021', 'dc', '827ccb0eea8a706c4c34a16891f84e7b', 'ghy@gmail.com', 0, '25ba446914d13b1c059d65b5bd3e9b15ca3a21de27498ef53b8c8991a25a234f43feaa5e0b2d9d252d4e7e1ba794d4380a3b'),
('EMP0022', 'dc1', '827ccb0eea8a706c4c34a16891f84e7b', 'ghy1@gmail.com', 0, 'bcc4ff816f693614b3bb0af60c98d9b2c3957239e43388fa4e2ecea6268641620ae0067b9d846fcd233f971e10cb8094c174'),
('EMP0023', 'dc1e', '827ccb0eea8a706c4c34a16891f84e7b', 'ghye1@gmail.com', 0, '5d9448dd2180208d14db6b1265e5b13cb28768c1a2c478b4099b6bd67443e797fbc7fc09f9c5414b4eb11dc6a53d40a8a1d6'),
('EMP0019', 'eye', '827ccb0eea8a706c4c34a16891f84e7b', 'vb@gmail.com', 0, '54bc87d63eba4d2ae438cee163c6df2e2268abc03c9f5a98e6d78e1d3039a50fbfc0480192694ba4eee5b04324e0d37e753d'),
('EMP0018', 'fdfdf', '827ccb0eea8a706c4c34a16891f84e7b', 'toseev@gmail.com', 0, ''),
('EMP0016', 'good', '827ccb0eea8a706c4c34a16891f84e7b', 'cdda@gmail.com', 0, ''),
('EMP0011', 'hi', '827ccb0eea8a706c4c34a16891f84e7b', 'van@gmail.com', 0, ''),
('EMP0025', 'nuwan', '4e2c0568628fd242d542b786c77b7a47', 'nuwa@123gmail.com', 0, '9871133a7e84364acf00182dd471ab1e633504af1fc1bbecaa9021065621bf6deda67e959363b52d7fcade687a6c04f5dbce'),
('EMP0020', 'qwe', '827ccb0eea8a706c4c34a16891f84e7b', 'gggh@gmail.com', 0, 'e4254deafb647c16e06f1bc203155ecf9f5c6baf1a177fb03e89748287bbd66c5132f2dc4ce3c6a82fa436e9be1c23a64403'),
('EMP0027', 'rehani', '28d71acde09e62d35419c1fb42d6758d', 'rehanidilhari@gmail.com', 0, 'cbf1440233da4d4f0c80b05c4b8d6d64aad3224a113d63b9eb2570586babd6e324048ab24e8c3337f8bf3003405f094bc9a0'),
('EMP0029', 'reshani', '4c1736c9542990fcd28bc169602120e8', 'reshanidilhari97@gmail.com', 1, '6171664e80fbf79ed3701db030726baadf6d7c4e9739d95ac864bd9c87c4985fabe01e150953fb1391ada913bb9fd18ea546'),
('EMP0013', 'son', '827ccb0eea8a706c4c34a16891f84e7b', 'mnjrathnak11a@gmail.com', 0, ''),
('EMP0010', 'tosee', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@gmail.com', 0, ''),
('EMP0006', 'unguardable', '81dc9bdb52d04dc20036dbd8313ed055', 'mnjrathnaka@gmail.com', 0, ''),
('EMP0017', 'xxxx', '827ccb0eea8a706c4c34a16891f84e7b', 'tose7@gmail.com', 0, '');

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
-- Constraints for table `customer_return_item`
--
ALTER TABLE `customer_return_item`
  ADD CONSTRAINT `customer_return_item_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
