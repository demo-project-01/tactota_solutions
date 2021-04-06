

CREATE TABLE `admin` (
  `emp_id` varchar(30) NOT NULL,
  PRIMARY KEY (`emp_id`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `bill` (
  `bill_no` varchar(30) NOT NULL,
  `date_time` datetime NOT NULL,
  `amount` float NOT NULL,
  `payment_method` varchar(30) NOT NULL,
  `emp_id` varchar(30) NOT NULL,
  PRIMARY KEY (`bill_no`),
  KEY `bill_ibfk_1` (`emp_id`),
  CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO bill VALUES("B0001","2020-12-01 00:00:00","153600","cheque","EMP0044");
INSERT INTO bill VALUES("B0002","2020-12-01 00:00:00","153600","cheque","EMP0044");
INSERT INTO bill VALUES("B0003","2020-12-01 00:00:00","2000","cheque","EMP0044");
INSERT INTO bill VALUES("B0004","2020-12-02 00:00:00","2000","cheque","EMP0044");
INSERT INTO bill VALUES("B0005","2020-12-02 00:00:00","2000","cheque","EMP0044");
INSERT INTO bill VALUES("B0006","2020-12-03 00:00:00","20000","cheque","EMP0044");
INSERT INTO bill VALUES("B0007","2020-12-03 00:00:00","153600","cheque","EMP0044");
INSERT INTO bill VALUES("B0008","2020-12-01 00:00:00","153600","cheque","EMP0044");
INSERT INTO bill VALUES("B0009","2020-12-03 00:00:00","2000","cheque","EMP0044");
INSERT INTO bill VALUES("B0010","2020-12-02 00:00:00","1950","cheque","EMP0044");
INSERT INTO bill VALUES("B0011","2020-12-01 00:00:00","75000","cheque","EMP0044");
INSERT INTO bill VALUES("B0012","2020-12-02 00:00:00","250000","cheque","EMP0044");
INSERT INTO bill VALUES("B0013","2020-12-03 00:00:00","23000","cheque","EMP0044");
INSERT INTO bill VALUES("B0014","2020-07-29 00:00:00","82000","cheque","EMP0044");
INSERT INTO bill VALUES("B0015","2020-05-06 00:00:00","185000","cheque","EMP0044");



CREATE TABLE `cheque` (
  `bill_no` varchar(30) NOT NULL,
  `cheque_id` varchar(50) NOT NULL,
  `received_date` date NOT NULL,
  `due_date` date NOT NULL,
  `bank_name` varchar(30) NOT NULL,
  PRIMARY KEY (`bill_no`,`cheque_id`),
  CONSTRAINT `cheque_ibfk_1` FOREIGN KEY (`bill_no`) REFERENCES `bill` (`bill_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO cheque VALUES("B0010","4523","2020-12-01","2021-01-08","HSBC");
INSERT INTO cheque VALUES("B0011","2568","2020-12-01","2021-02-19","HSBC");
INSERT INTO cheque VALUES("B0012","52684","2020-12-01","2021-02-19","NDB");
INSERT INTO cheque VALUES("B0013","CH0021","2020-12-01","2021-10-21","NDB");
INSERT INTO cheque VALUES("B0014","CHA12","2020-08-01","2028-01-07","HSBC");
INSERT INTO cheque VALUES("B0015","CN002","2020-08-05","2024-06-29","BOC");



CREATE TABLE `clerk` (
  `emp_id` varchar(30) NOT NULL,
  PRIMARY KEY (`emp_id`),
  CONSTRAINT `clerk_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `cust_telephone` (
  `cust_id` varchar(30) NOT NULL,
  `telephone_no` varchar(10) NOT NULL,
  PRIMARY KEY (`cust_id`,`telephone_no`),
  CONSTRAINT `cust_telephone_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO cust_telephone VALUES("C0004","0714526369");
INSERT INTO cust_telephone VALUES("C0007","0714526369");
INSERT INTO cust_telephone VALUES("C0025","0778562369");
INSERT INTO cust_telephone VALUES("C0027","0715963245");



CREATE TABLE `customer` (
  `cust_id` varchar(30) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `email_address` varchar(30) NOT NULL,
  `cust_address` varchar(50) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO customer VALUES("C0001","nuwan sasanka deraniyagala","nuwansasanka1@gmail.com","homagama");
INSERT INTO customer VALUES("C0004","banuka","banu@gmail.com","mahargama");
INSERT INTO customer VALUES("C0007","banuka","banu@gmail.com","mahargama");
INSERT INTO customer VALUES("C0008","banuka","banu@gmail.com","mahargama");
INSERT INTO customer VALUES("C0009","reshani","reshani@gmail.com","matara");
INSERT INTO customer VALUES("C0012","banuka","banu@gmail.com","mahargama");
INSERT INTO customer VALUES("C0014","kusal","kusal@gmail.com","mahargama");
INSERT INTO customer VALUES("C0016","kusal","kusal@gmail.com","mahargama");
INSERT INTO customer VALUES("C0021","kusal","kusal@gmail.com","mahargama");
INSERT INTO customer VALUES("C0023","manjitha","manjth@gmail.com","Homagama");
INSERT INTO customer VALUES("C0024","pasan","pasan@gmail.com","Nugegoda");
INSERT INTO customer VALUES("C0025","janith","jani@yahoo.com","Padukka");
INSERT INTO customer VALUES("C0026","Damidu","daidu@yahoo.com","Maharagama");
INSERT INTO customer VALUES("C0027","nuwan","nuwansasanka1@gmail.com","homagama");
INSERT INTO customer VALUES("C0028","sanath","sanath@gmail.com","mahargama");
INSERT INTO customer VALUES("C0029","sasanka","sasanka@gmail.com","Kottawa");



CREATE TABLE `customer_return_item` (
  `cust_id` varchar(30) NOT NULL,
  `serial_no` varchar(50) NOT NULL,
  `returned_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`cust_id`,`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `emp_telephone` (
  `emp_id` varchar(30) NOT NULL,
  `telephone_no` int(10) NOT NULL,
  KEY `emp_id` (`emp_id`),
  CONSTRAINT `emp_telephone_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




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
  `dob` varchar(30) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO employee VALUES("EMP0004","nipuna","janith","rathnayaka","971160730V","212.fjak","WIN_20180620_10_55_00_Pro.jpg","Clerk","713559368","2013/131/1313");
INSERT INTO employee VALUES("EMP0025","nuwan","","sasanka","974525369v","gfvljshyudlgrw","","Shopkeeper","711112220","1994/10/20");
INSERT INTO employee VALUES("EMP0026","reshani","","dilhari","974440025v","adsfyfvg","","Clerk","714455221","1992/5/5");
INSERT INTO employee VALUES("EMP0029","reshani","","dilhari","974525369v","abcd","","Clerk","714455221","1995/02/02");
INSERT INTO employee VALUES("EMP0030","reshani","dilhari","vfdcwe","Clark.JPG"," vnbtoij","","Clerk","256349872","1992/5/5");
INSERT INTO employee VALUES("EMP0043","Michelle","","Fernando","","bambalapitiya, colombo 05","","Clerk","768757722","2005-12-08");
INSERT INTO employee VALUES("EMP0044","Michelle","","Fernando","","bambalapitiya, colombo 05","","Shopkeeper","768757722","2005-12-21");
INSERT INTO employee VALUES("EMP0045","Nipuna","Janith","Rathnayaka","","212,Mawathagama,Padukka","","Clerk","713559368","2005-12-13");
INSERT INTO employee VALUES("EMP0046","janith","afafa","affafa","971160730V","asfsaf","","Clerk","713456789","2005-12-08");
INSERT INTO employee VALUES("EMP0047","supun","","bandara","999060730V","212,Colombo2","","Shopkeeper","713567234","1999-07-29");
INSERT INTO employee VALUES("EMP0048","Nipuna","Janith","Rathnayaka","971160730V","212,Mawathagama,Padukka","","Admin","713559368","1997-04-25");
INSERT INTO employee VALUES("EMP0049","Nipuna","Janith","Rathnayaka","971160730V","212,Mawathagama,Padukka","","Clerk","771355936","1997-04-25");



CREATE TABLE `feedback` (
  `feedback_id` varchar(30) NOT NULL,
  `cust_id` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `cust_id` (`cust_id`),
  CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `item` (
  `serial_no` varchar(50) NOT NULL,
  `sales_price` float NOT NULL,
  `p_id` varchar(30) NOT NULL,
  `item_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`serial_no`),
  KEY `p_id` (`p_id`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO item VALUES("000000030@P0003","230000","P0003","1");
INSERT INTO item VALUES("000000031@P0003","230000","P0003","1");
INSERT INTO item VALUES("000000032@P0003","230000","P0003","1");
INSERT INTO item VALUES("0000001@P0002","75000","P0002","1");
INSERT INTO item VALUES("00000020@P0001","82000","P0001","1");
INSERT INTO item VALUES("00000021@P0001","82000","P0001","1");
INSERT INTO item VALUES("00000022@P0001","82000","P0001","1");
INSERT INTO item VALUES("00000023@P0001","82000","P0001","1");
INSERT INTO item VALUES("0000002@P0002","75000","P0002","1");
INSERT INTO item VALUES("0000003@P0002","75000","P0002","0");
INSERT INTO item VALUES("00000040@P0004","1950","P0004","1");
INSERT INTO item VALUES("00000041@P0004","1950","P0004","1");
INSERT INTO item VALUES("00000042@P0004","1950","P0004","1");
INSERT INTO item VALUES("00000043@P0004","1950","P0004","1");
INSERT INTO item VALUES("00000044@P0004","1950","P0004","1");
INSERT INTO item VALUES("00000045@P0004","1950","P0004","1");
INSERT INTO item VALUES("00000046@P0004","1950","P0004","1");
INSERT INTO item VALUES("00000047@P0004","1950","P0004","1");
INSERT INTO item VALUES("00000048@P0004","1950","P0004","1");
INSERT INTO item VALUES("00000049@P0004","1950","P0004","1");
INSERT INTO item VALUES("0000004@P0002","75000","P0002","1");
INSERT INTO item VALUES("00000050@P0005","18500","P0005","1");
INSERT INTO item VALUES("00000051@P0005","18500","P0005","1");
INSERT INTO item VALUES("00000052@P0005","18500","P0005","1");
INSERT INTO item VALUES("00000053@P0005","18500","P0005","1");
INSERT INTO item VALUES("00000054@P0005","18500","P0005","1");
INSERT INTO item VALUES("0000005@P0002","75000","P0002","1");
INSERT INTO item VALUES("00000060@P0006","1750","P0006","1");
INSERT INTO item VALUES("00000061@P0006","1750","P0006","1");
INSERT INTO item VALUES("00000062@P0006","1750","P0006","1");
INSERT INTO item VALUES("00000063@P0006","1750","P0006","1");
INSERT INTO item VALUES("00000064@P0006","1750","P0006","1");
INSERT INTO item VALUES("00000065@P0006","1750","P0006","1");
INSERT INTO item VALUES("00000066@P0006","1750","P0006","1");
INSERT INTO item VALUES("00000067@P0006","1750","P0006","1");
INSERT INTO item VALUES("0000006@P0002","75000","P0002","1");
INSERT INTO item VALUES("00000070@P0007","2490","P0007","1");
INSERT INTO item VALUES("00000071@P0007","2490","P0007","1");
INSERT INTO item VALUES("00000072@P0007","2490","P0007","1");
INSERT INTO item VALUES("00000073@P0007","2490","P0007","1");
INSERT INTO item VALUES("00000074@P0007","2490","P0007","1");
INSERT INTO item VALUES("00000075@P0007","2490","P0007","1");
INSERT INTO item VALUES("00000080@P0008","84200","P0008","1");
INSERT INTO item VALUES("00000081@P0008","84200","P0008","1");
INSERT INTO item VALUES("00000082@P0008","84200","P0008","1");
INSERT INTO item VALUES("00000083@P0008","84200","P0008","1");
INSERT INTO item VALUES("00000084@P0008","84200","P0008","1");
INSERT INTO item VALUES("00000090@P0009","1450","P0009","1");
INSERT INTO item VALUES("00000091@P0009","1450","P0009","1");
INSERT INTO item VALUES("00000092@P0009","1450","P0009","1");
INSERT INTO item VALUES("00000093@P0009","1450","P0009","1");
INSERT INTO item VALUES("00000094@P0009","1450","P0009","1");
INSERT INTO item VALUES("00000095@P0009","1450","P0009","1");
INSERT INTO item VALUES("00000096@P0009","1450","P0009","1");
INSERT INTO item VALUES("00000097@P0009","1450","P0009","1");
INSERT INTO item VALUES("00000098@P0009","1450","P0009","1");
INSERT INTO item VALUES("00000120@P0011","33500","P0011","1");
INSERT INTO item VALUES("00000121@P0011","33500","P0011","1");
INSERT INTO item VALUES("00000122@P0011","33500","P0011","1");
INSERT INTO item VALUES("00000123@P0011","33500","P0011","1");
INSERT INTO item VALUES("00000130@P0012","26700","P0012","1");
INSERT INTO item VALUES("00000132@P0012","26700","P0012","1");
INSERT INTO item VALUES("00000133@P0012","26700","P0012","1");
INSERT INTO item VALUES("00000140@P0013","200","P0013","1");
INSERT INTO item VALUES("00000141@P0013","200","P0013","1");
INSERT INTO item VALUES("00000142@P0013","200","P0013","1");
INSERT INTO item VALUES("00000143@P0013","200","P0013","1");
INSERT INTO item VALUES("00000144@P0013","200","P0013","1");
INSERT INTO item VALUES("00000145@P0013","200","P0013","1");
INSERT INTO item VALUES("00000150@P0014","2700","P0014","1");
INSERT INTO item VALUES("00000151@P0014","2700","P0014","1");
INSERT INTO item VALUES("00000152@P0014","2700","P0014","1");
INSERT INTO item VALUES("00000153@P0014","2700","P0014","1");
INSERT INTO item VALUES("00000160@P0015","185000","P0015","1");
INSERT INTO item VALUES("00000161@P0015","185000","P0015","1");
INSERT INTO item VALUES("00000162@P0015","185000","P0015","1");
INSERT INTO item VALUES("00000163@P0015","185000","P0015","1");
INSERT INTO item VALUES("0000110@P0010","153600","P0010","1");
INSERT INTO item VALUES("0000111@P0010","153600","P0010","1");
INSERT INTO item VALUES("0000112@P0010","153600","P0010","1");
INSERT INTO item VALUES("0000113@P0010","153600","P0010","1");
INSERT INTO item VALUES("0000114@P0010","153600","P0010","1");
INSERT INTO item VALUES("0000115@P0010","153600","P0010","1");
INSERT INTO item VALUES("124444213189@P0021","20000","P0021","1");
INSERT INTO item VALUES("1244442131@P0020","100030","P0020","1");
INSERT INTO item VALUES("1244442131@P0021","20000","P0021","1");
INSERT INTO item VALUES("1244442890@P0020","100030","P0020","1");
INSERT INTO item VALUES("1244442899@P0020","100030","P0020","1");



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
  `product_date` date NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO product VALUES("P0001","Laptop","75800","Lenovo","2","IdeaPad 310","1","18","1","2020-11-30");
INSERT INTO product VALUES("P0002","Laptop","64500","Asus","2","Vivobook X512","6","24","1","2020-11-30");
INSERT INTO product VALUES("P0003","Laptop","200000","HP","2","Envy20","3","24","1","2020-11-30");
INSERT INTO product VALUES("P0004","Wireless Mouse - USB","1500","Logitech","2","W56","10","6","1","2020-11-30");
INSERT INTO product VALUES("P0005","Head Phones","14000","AKG","2","Y50BT","5","12","1","2020-11-30");
INSERT INTO product VALUES("P0006","Multimedia office keyboard","1450","Fantech ","5","K210","8","3","1","2020-11-30");
INSERT INTO product VALUES("P0007","Keyboard - Gaming","2300","Fantech","3","k613","6","12","1","2020-11-30");
INSERT INTO product VALUES("P0008","Laptop","75000","Dell","1","Inspiron 532","5","24","1","2020-11-30");
INSERT INTO product VALUES("P0009","Keyboard - wireless slim","1200","K1000","5","78 chocolate","4","3","1","2020-11-30");
INSERT INTO product VALUES("P0010","Laptop","140000","Acer","2","Swift3","2","24","1","2020-11-30");
INSERT INTO product VALUES("P0011","Printers","30500","Cannon","2","LBP-611CN","4","12","1","2020-11-30");
INSERT INTO product VALUES("P0012","Printer","23650","Cannon","1","LBP-253X","3","12","1","2020-11-30");
INSERT INTO product VALUES("P0013","CMOS battery","130","Sony","2","CMOS 2032","6","1","1","2020-11-30");
INSERT INTO product VALUES("P0014","UPS battery","2100","CyberPower","1","HHL12v","4","6","1","2020-11-30");
INSERT INTO product VALUES("P0015","Laptop","170000","Asus","1","Zenbook 15","4","24","1","2020-11-30");
INSERT INTO product VALUES("P0016","Laptop","75800","ASUS","10","IdeaPad 310","1","18","5","2020-11-30");
INSERT INTO product VALUES("P0017","Laptop","75800","ACER","20","IdeaPad 310","15","18","12","2020-11-30");
INSERT INTO product VALUES("P0018","Laptop","75800","DEL","25","D310","10","18","5","2020-11-30");
INSERT INTO product VALUES("P0019","Laptop","85800","HP","20","IdeaPad 310","15","18","12","2020-11-30");
INSERT INTO product VALUES("P0020","laptop","100000","dell","1","0001","3","9","1","2020-12-01");
INSERT INTO product VALUES("P0021","dell","10000","dell","1","7797","2","9","1","2020-12-01");



CREATE TABLE `purchase` (
  `bill_no` varchar(30) NOT NULL,
  `serial_no` varchar(30) NOT NULL,
  `cust_id` varchar(30) NOT NULL,
  PRIMARY KEY (`bill_no`,`serial_no`,`cust_id`),
  KEY `cust_id` (`cust_id`),
  KEY `serial_no` (`serial_no`),
  CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`bill_no`) REFERENCES `bill` (`bill_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `purchase_ibfk_3` FOREIGN KEY (`serial_no`) REFERENCES `item` (`serial_no`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO purchase VALUES("B0001","00000043@P0004","C0001");
INSERT INTO purchase VALUES("B0011","0000001@P0002","C0025");
INSERT INTO purchase VALUES("B0012","000000032@P0003","C0026");
INSERT INTO purchase VALUES("B0013","00000020@P0001","C0027");
INSERT INTO purchase VALUES("B0014","00000020@P0001","C0028");
INSERT INTO purchase VALUES("B0015","00000040@P0004","C0029");



CREATE TABLE `shop_return_items` (
  `sup_id` varchar(30) NOT NULL,
  `serial_no` varchar(50) NOT NULL,
  `returned_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`sup_id`,`serial_no`),
  KEY `serial_no` (`serial_no`),
  CONSTRAINT `shop_return_items_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`),
  CONSTRAINT `shop_return_items_ibfk_2` FOREIGN KEY (`serial_no`) REFERENCES `item` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO shop_return_items VALUES("SUP0010","00000020@P0001","2020-11-30","Battery Issue");
INSERT INTO shop_return_items VALUES("SUP0010","00000021@P0001","2020-11-30","Monitor Issue");
INSERT INTO shop_return_items VALUES("SUP0010","00000022@P0001","2020-11-30","The battery won't charge");
INSERT INTO shop_return_items VALUES("SUP0011","000000030@P0003","2020-11-30","Laptop's fan is noisy");
INSERT INTO shop_return_items VALUES("SUP0012","00000040@P0004","2020-11-30","Blue screen of death");
INSERT INTO shop_return_items VALUES("SUP0012","00000042@P0004","2020-11-30","Laptop becomes hot to the touch");
INSERT INTO shop_return_items VALUES("SUP0015","0000003@P0002","2020-12-01","isuue");
INSERT INTO shop_return_items VALUES("SUP0015","0000004@P0002","2020-11-30","Keynoard Issue");
INSERT INTO shop_return_items VALUES("SUP0019","00000052@P0005","2020-11-30","Laptop attacked by virus or malware ");
INSERT INTO shop_return_items VALUES("SUP0019","00000123@P0011","2020-11-30","Blue Error");
INSERT INTO shop_return_items VALUES("SUP0019","00000132@P0012","2020-11-30","Keyboard Issue");
INSERT INTO shop_return_items VALUES("SUP0019","00000133@P0012","2020-11-30","Monitor issue");



CREATE TABLE `shopkeeper` (
  `emp_id` varchar(30) NOT NULL,
  PRIMARY KEY (`emp_id`),
  CONSTRAINT `shopkeeper_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `sup_address` (
  `sup_id` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`sup_id`),
  CONSTRAINT `sup_address_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO sup_address VALUES("SUP0010","Bambalapitiya,Galle Road,Colombo 05");
INSERT INTO sup_address VALUES("SUP0011","Galle Road, Colomo 04");
INSERT INTO sup_address VALUES("SUP0012","Wennapuwa");
INSERT INTO sup_address VALUES("SUP0013"," Puttalam - Colombo Rd, Katuneriya 61180");
INSERT INTO sup_address VALUES("SUP0014","No. 418, Galle Road, Colombo 03");
INSERT INTO sup_address VALUES("SUP0015","17 Lily Ave, Colombo");
INSERT INTO sup_address VALUES("SUP0016","401 Galle Rd, Colombo 00400");
INSERT INTO sup_address VALUES("SUP0017","No.112, havelock Road, Colombo5");
INSERT INTO sup_address VALUES("SUP0018","No 498 Galle Road,  Colombo 03,");
INSERT INTO sup_address VALUES("SUP0019"," NO 100/22, Mumtaz Mahal, 1st Cross Street, Colomb");
INSERT INTO sup_address VALUES("SUP0020","No.313, 1st Floor, Unity Plaza, Colombo 04");
INSERT INTO sup_address VALUES("SUP0021","235,colombo");



CREATE TABLE `sup_telephone` (
  `sup_id` varchar(30) NOT NULL,
  `telephone_no` varchar(10) NOT NULL,
  PRIMARY KEY (`sup_id`) USING BTREE,
  CONSTRAINT `sup_telephone_ibfk_1` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO sup_telephone VALUES("SUP0010","0117510519");
INSERT INTO sup_telephone VALUES("SUP0011","0114545443");
INSERT INTO sup_telephone VALUES("SUP0012","0775326399");
INSERT INTO sup_telephone VALUES("SUP0013","0764949649");
INSERT INTO sup_telephone VALUES("SUP0014","0114 622 1");
INSERT INTO sup_telephone VALUES("SUP0015","0112055835");
INSERT INTO sup_telephone VALUES("SUP0016","0773277277");
INSERT INTO sup_telephone VALUES("SUP0017","0115400400");
INSERT INTO sup_telephone VALUES("SUP0018","0112565265");
INSERT INTO sup_telephone VALUES("SUP0019","0777735516");
INSERT INTO sup_telephone VALUES("SUP0020","0772368024");
INSERT INTO sup_telephone VALUES("SUP0021","0713559368");



CREATE TABLE `supplier` (
  `sup_id` varchar(30) NOT NULL,
  `sup_name` varchar(30) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `active_status` varchar(5) NOT NULL,
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO supplier VALUES("SUP0010","Barclays computers","Barclays@gmail.com","1");
INSERT INTO supplier VALUES("SUP0011","Unity System","support@unitysystem.lk","");
INSERT INTO supplier VALUES("SUP0012","Upright Computers","Upright@gmail.com","");
INSERT INTO supplier VALUES("SUP0013","REVO COMPUTERS & SECURITY SOLU","info@revocomputers.lk","");
INSERT INTO supplier VALUES("SUP0014","Metropolitan Computers (Pvt) L","shamazh@metropolitan.lk","");
INSERT INTO supplier VALUES("SUP0015","Colombo Computer Technology (P","info@computertech.lk","");
INSERT INTO supplier VALUES("SUP0016","Laptop.lk","info@laptop.lk","");
INSERT INTO supplier VALUES("SUP0017","Singer PLC","callcenter@singersl.com","");
INSERT INTO supplier VALUES("SUP0018","Abans","buyabans@abansgroup.com","");
INSERT INTO supplier VALUES("SUP0019","Pettah Computers","info@pettahcomputers.com","");
INSERT INTO supplier VALUES("SUP0020","Winsoft Solutions","thanish@winsoft.lk","");
INSERT INTO supplier VALUES("SUP0021","dell","mnjrathnayaka97@yahoo.com","");



CREATE TABLE `supplier_product` (
  `sup_id` varchar(30) NOT NULL,
  `p_id` varchar(30) NOT NULL,
  PRIMARY KEY (`sup_id`,`p_id`),
  KEY `p_id` (`p_id`),
  CONSTRAINT `supplier_product_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `supplier_product_ibfk_2` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO supplier_product VALUES("SUP0010","P0001");
INSERT INTO supplier_product VALUES("SUP0011","P0003");
INSERT INTO supplier_product VALUES("SUP0011","P0020");
INSERT INTO supplier_product VALUES("SUP0011","P0021");
INSERT INTO supplier_product VALUES("SUP0012","P0004");
INSERT INTO supplier_product VALUES("SUP0014","P0007");
INSERT INTO supplier_product VALUES("SUP0015","P0002");
INSERT INTO supplier_product VALUES("SUP0017","P0008");
INSERT INTO supplier_product VALUES("SUP0018","P0010");
INSERT INTO supplier_product VALUES("SUP0019","P0005");
INSERT INTO supplier_product VALUES("SUP0019","P0011");
INSERT INTO supplier_product VALUES("SUP0019","P0012");
INSERT INTO supplier_product VALUES("SUP0020","P0006");
INSERT INTO supplier_product VALUES("SUP0020","P0009");



CREATE TABLE `user_account` (
  `emp_id` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(100) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `emp_id` (`emp_id`),
  CONSTRAINT `user_account_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO user_account VALUES("EMP0048","admin","827ccb0eea8a706c4c34a16891f84e7b","mnjrathnayaka197@gmail.com","1","6284f3edb49c9424056ba7c2f6ab021dda7534837968d9cb2718220ec10a47da1f02dcd0fb2ec1e7a486348b7d1aadf550f2");
INSERT INTO user_account VALUES("EMP0049","clerk","9f8c3b085d0781cfb795d2cffe8d19d5","mnjrathnayaka97@yahoo.com","1","4edc671609fb9684720d995effba574aa01cf7975adf5a0e304cc900cfb2a48e6cfa23449bf59404e8f7d27ba59f8c60ccb9");
INSERT INTO user_account VALUES("EMP0045","janith123","827ccb0eea8a706c4c34a16891f84e7b","mnjrathnayaka97@gmail.com","1","c892733b494685519705ace074e0e8ea7f107d2211a77fba84f3db22bb6750e3da6a1b2362a1572865fa0f1724100e58bcb0");
INSERT INTO user_account VALUES("EMP0030","miche","7068956236499d5241009a15c818fc69","mishelnvc@gmail.com","0","6a82f4834098a0d3cf0a47e04a362fd8e56c23c5903ce94cb027e30e870a50e9803d2ea37e1b95817a7a024dab33ee570b5b");
INSERT INTO user_account VALUES("EMP0043","mishclerk","7068956236499d5241009a15c818fc69","mufernando02@gmail.com","1","c933c78460fd2d106a3c7d89855bdf506f2baa21c84767e7b4a05410f4e16b44c8a494fe71b355af7278b1ae5d4eb9bf2d07");
INSERT INTO user_account VALUES("EMP0044","mishshop","7068956236499d5241009a15c818fc69","2018cs055@stu.ucsc.cmb.ac.lk","1","a22cdb15bc974f04fd2361766595738b82673b4d014585e087c89973fb6ccf21f4b5eae2ccf5405830fb5df6b61accfacb34");
INSERT INTO user_account VALUES("EMP0025","nuwan","4e2c0568628fd242d542b786c77b7a47","nuwa@123gmail.com","1","9871133a7e84364acf00182dd471ab1e633504af1fc1bbecaa9021065621bf6deda67e959363b52d7fcade687a6c04f5dbce");
INSERT INTO user_account VALUES("EMP0029","reshani","8949417e84d8e5cf663ab21a60badb20","reshanidilhari97@gmail.com","1","a03b21323936d0ef0dcfa2576efca9c75691bda5c8ac296b06aa6093545b91207efef49975fb3ba09096b32ea1e9c58b8ed8");
INSERT INTO user_account VALUES("EMP0047","shopkeeper","827ccb0eea8a706c4c34a16891f84e7b","mnjrathnayaka97@gmaial.com","1","24a05dc03b9be2ed2eadbaef40c2d397457aed3a37e85746524f8632cfd08da8fa662136cb5abeb37f2ab728b58a38f5d546");

