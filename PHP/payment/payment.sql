CREATE TABLE `payment` (
  `paymentId` varchar(20) NOT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `due` decimal(10,2) DEFAULT NULL,
  `custId` varchar(20) NOT NULL,
  PRIMARY KEY (`paymentId`),
  KEY `custId` (`custId`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`custId`) REFERENCES `customer` (`custId`)
) 