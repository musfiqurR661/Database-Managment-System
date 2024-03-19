CREATE TABLE `orderdetails` (
  `orderDetailId` varchar(20) NOT NULL,
  `productId` varchar(20) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `shippingDate` date NOT NULL,
  `orderDate` date NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `orderPrice` decimal(10,2) DEFAULT NULL,
  `discountedPrice` decimal(10,2) DEFAULT NULL,
  `custId` varchar(20) NOT NULL,
  `paymentId` varchar(20) NOT NULL,
  PRIMARY KEY (`orderDetailId`),
  KEY `ProductID` (`productId`),
  KEY `PaymentID` (`paymentId`),
  KEY `orderdetails_ibfk_4` (`custId`),
  CONSTRAINT `orderdetails_ibfk_4` FOREIGN KEY (`custId`) REFERENCES `customer` (`custId`)
) 