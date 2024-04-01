CREATE TABLE `orderdetails` (
  `orderDetailId` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `quantity` int DEFAULT NULL,
  `orderDate` date NOT NULL,
  `orderPrice` decimal(10,2) DEFAULT NULL,
  `custId` varchar(20) NOT NULL,
  `paymentId` varchar(20) NOT NULL,
  `tot_cost` decimal(10,5) NOT NULL,
  PRIMARY KEY (`orderDetailId`),
  KEY `custid_fk` (`custId`),
  KEY `payment_fk` (`paymentId`),
  KEY `prod_id_fk` (`product_id`),
  CONSTRAINT `prod_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
)