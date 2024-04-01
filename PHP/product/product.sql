CREATE TABLE `product` (
  `product_id` int NOT NULL,
  `productName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `variant` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `productionDate` date DEFAULT NULL,
  `unitPrice` decimal(10,2) DEFAULT NULL,
  `expDate` date DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `unitPerStrips` int DEFAULT NULL,
  PRIMARY KEY (`product_id`)
)