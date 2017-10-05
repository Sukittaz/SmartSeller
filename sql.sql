-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: smartseller
-- ------------------------------------------------------
-- Server version	5.7.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bunch`
--

DROP TABLE IF EXISTS `bunch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bunch` (
  `BunchID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `BunchName` varchar(45) NOT NULL,
  PRIMARY KEY (`BunchID`),
  KEY `BunchCompanyID_idx` (`CompanyID`),
  CONSTRAINT `BunchCompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bunch`
--

LOCK TABLES `bunch` WRITE;
/*!40000 ALTER TABLE `bunch` DISABLE KEYS */;
INSERT INTO `bunch` VALUES (6,1,'Admin'),(7,1,'Funcionário'),(10,1,'Teste'),(11,2,'teste');
/*!40000 ALTER TABLE `bunch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bunch_permissions`
--

DROP TABLE IF EXISTS `bunch_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bunch_permissions` (
  `BunchPermissionsID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `BunchID` int(11) NOT NULL,
  `PermissionID` int(11) NOT NULL,
  PRIMARY KEY (`BunchPermissionsID`),
  KEY `BunchPermissionsCompanyID_idx` (`CompanyID`),
  KEY `BunchPermissionsBunchID_idx` (`BunchID`),
  KEY `BunchPermissionsPermissionID_idx` (`PermissionID`),
  CONSTRAINT `BunchPermissionsBunchID` FOREIGN KEY (`BunchID`) REFERENCES `bunch` (`BunchID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `BunchPermissionsCompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `BunchPermissionsPermissionID` FOREIGN KEY (`PermissionID`) REFERENCES `permission` (`PermissionID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=284 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bunch_permissions`
--

LOCK TABLES `bunch_permissions` WRITE;
/*!40000 ALTER TABLE `bunch_permissions` DISABLE KEYS */;
INSERT INTO `bunch_permissions` VALUES (170,1,7,1),(171,1,7,2),(253,2,11,1),(254,2,11,2),(255,2,11,3),(256,2,11,4),(257,2,11,5),(258,2,11,6),(259,2,11,7),(260,2,11,8),(261,2,11,9),(262,2,11,10),(274,1,6,1),(275,1,6,2),(276,1,6,3),(277,1,6,4),(278,1,6,5),(279,1,6,6),(280,1,6,7),(281,1,6,8),(282,1,6,9),(283,1,6,10);
/*!40000 ALTER TABLE `bunch_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `CategoryName` varchar(45) NOT NULL,
  PRIMARY KEY (`CategoryID`),
  KEY `CategoryCompanyID_idx` (`CompanyID`),
  CONSTRAINT `CategoryCompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (3,1,'Refrigerantes'),(4,1,'Pizzas'),(5,1,'Panificação'),(6,1,'ãçã');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `CompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(45) DEFAULT NULL,
  `CompanyCNPJ` varchar(20) DEFAULT NULL,
  `CompanyAddres` varchar(45) DEFAULT NULL,
  `CompanyAddresNumber` varchar(45) DEFAULT NULL,
  `CompanyComplement` varchar(45) DEFAULT NULL,
  `CompanyNeigh` varchar(45) DEFAULT NULL,
  `CompanyCity` varchar(45) DEFAULT NULL,
  `CompanyUF` varchar(2) DEFAULT NULL,
  `CompanyCep` varchar(20) DEFAULT NULL,
  `CompanyPhone` varchar(45) DEFAULT NULL,
  `CompanySocialName` varchar(45) DEFAULT NULL,
  `CompanyIE` varchar(45) DEFAULT NULL,
  `CompanyIEST` varchar(45) DEFAULT NULL,
  `CompanyIM` varchar(45) DEFAULT NULL,
  `CompanyCNAE` varchar(45) DEFAULT NULL,
  `CompanyImage` text,
  PRIMARY KEY (`CompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'Born Dev\'s','547678524000133','Av. Rio de Janeiro','s/n','Qd. 38 Lt. 4,5 e 34','Jardim Pinheiros I','Águas Lindas de Goiás','GO','72910000','6239324097','Born Dev\'s','999999','999999','999999','7220-6/00','uploads/company/1/boxer-1294352_640.png'),(2,'Deluxe Dev\'s',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `costumer`
--

DROP TABLE IF EXISTS `costumer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `costumer` (
  `CostumerID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `CostumerName` varchar(45) NOT NULL,
  `CostumerCPF` varchar(20) DEFAULT NULL,
  `CostumerCNPJ` varchar(20) DEFAULT NULL,
  `CostumerEmail` varchar(45) DEFAULT NULL,
  `CostumerPhone` varchar(45) DEFAULT NULL,
  `CostumerCEP` int(20) NOT NULL,
  `CostumerAddres` varchar(45) NOT NULL,
  `CostumerAddresNumber` int(11) NOT NULL,
  `CostumerNeigh` varchar(45) NOT NULL,
  `CostumerCity` varchar(45) NOT NULL,
  `CostumerCountry` varchar(45) DEFAULT NULL,
  `CostumerUF` varchar(2) DEFAULT NULL,
  `CostumerDetail` text,
  PRIMARY KEY (`CostumerID`),
  KEY `CostumerCompanyID_idx` (`CompanyID`),
  CONSTRAINT `CostumerCompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `costumer`
--

LOCK TABLES `costumer` WRITE;
/*!40000 ALTER TABLE `costumer` DISABLE KEYS */;
INSERT INTO `costumer` VALUES (1,1,'José roque do nascimento','42312994801',NULL,'sukittaz@gmail.com','41995121159',83010350,'Rua Laura Lopes Latuf',570,'Cruzeiro','SÃ£o JosÃ© dos Pinhais',NULL,NULL,'<p>Cliente Bom</p>'),(2,1,'Juliana','42312994801',NULL,'ju@hotmail.com','41995121159',83010350,'Rua Laura Lopes Latuf',570,'Cruzeiro','Bujari','Brasil','AC','<p>sss</p>'),(3,1,'Pedro','42312998',NULL,'pedro@hotmail.com','4231954',11703330,'Rua PajÃ©',541,'Tupi','Praia Grande','Brasil','SP','<p>Opreeee</p>'),(4,1,'João','42312994801',NULL,'ju@hotmail.com','41995121159',11703320,'Rua CaiapÃ³s',500,'Tupi','Praia Grande','Brasil','SP','<p>opa</p>');
/*!40000 ALTER TABLE `costumer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense` (
  `ExpenseID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `ExpenseDate` datetime NOT NULL,
  `ExpenseRef` varchar(45) NOT NULL,
  `ExpenseValue` decimal(15,2) NOT NULL,
  `ExpenseAttach` varchar(100) DEFAULT NULL,
  `ExpenseDetail` text,
  PRIMARY KEY (`ExpenseID`),
  KEY `ExpenseCompanyID_idx` (`CompanyID`),
  CONSTRAINT `ExpenseCompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense`
--

LOCK TABLES `expense` WRITE;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
INSERT INTO `expense` VALUES (1,1,'2017-09-06 15:00:00','REF001',200.00,'uploads/expense/1/','<p>aaaa</p>');
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission`
--

DROP TABLE IF EXISTS `permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission` (
  `PermissionID` int(11) NOT NULL AUTO_INCREMENT,
  `PermissionName` varchar(45) NOT NULL,
  PRIMARY KEY (`PermissionID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission`
--

LOCK TABLES `permission` WRITE;
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` VALUES (1,'DashBoard'),(2,'Caixa'),(3,'Produtos'),(4,'Categorias'),(5,'Vendas'),(6,'Compras'),(7,'Despesas'),(8,'Pessoas'),(9,'Relátorios'),(10,'Configurações');
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `ProductName` varchar(45) NOT NULL,
  `ProductCode` varchar(45) DEFAULT NULL,
  `ProductCost` decimal(15,2) NOT NULL,
  `ProductPrice` decimal(15,2) NOT NULL,
  `ProductQtd` int(11) DEFAULT NULL,
  `ProductAlert` int(11) DEFAULT NULL,
  `ProductDetail` text,
  `ProductTypeCalc` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ProductID`),
  KEY `ProductCompanyID_idx` (`CompanyID`),
  KEY `ProductCategoryID_idx` (`CategoryID`),
  CONSTRAINT `ProductCategoryID` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ProductCompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,1,3,'Coca-Cola','COD001',3.00,4.00,100,108,'<p>Refrigerante Coca-Cola</p>','Quantidade'),(2,1,4,'Pizza Frango Catupiry','COD002',10.00,30.00,30,30,'<p>Pizza de Frango com Catupiry</p>','Quantidade'),(3,1,4,'Pizza Mussarela','COD 003',12.00,30.00,6,6,'<p>Pizza de Mussarela</p>','Quantidade'),(4,1,3,'Fanta','COD004',5.00,5.00,14,2,'<p>Fanta</p>','Quantidade'),(5,1,3,'Pão','0001',4.00,10.56,-1600,54,'<p>uehded</p>','Peso'),(6,1,3,'TESTE','00002',215.00,2151.00,151,2,'','Quantidade');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase` (
  `PurchaseID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `SupplierID` int(11) NOT NULL,
  `PurchaseData` datetime NOT NULL,
  `PurchaseRef` varchar(45) NOT NULL,
  `PurchaseStatus` int(11) DEFAULT NULL,
  `PurchaseAttach` varchar(200) DEFAULT NULL,
  `PurchaseDetail` text,
  `PurchaseTotal` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`PurchaseID`),
  KEY `PurchaseCompanyID_idx` (`CompanyID`),
  KEY `PurchaseSupplierID_idx` (`SupplierID`),
  CONSTRAINT `PurchaseCompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `PurchaseSupplierID` FOREIGN KEY (`SupplierID`) REFERENCES `supplier` (`SupplierID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (39,1,1,'2017-08-24 16:05:00','REF001',0,'uploads/purchase/1/','<p>ddd</p>',30.00),(40,1,1,'2017-09-04 21:52:00','REF002',1,'uploads/purchase/1/','',25.00),(41,1,2,'2017-09-26 15:52:00','REF002',0,'uploads/purchase/1/','',6.00),(42,1,1,'2017-09-26 16:37:00','REF005',1,'uploads/purchase/1/','',36.00),(43,1,1,'2017-10-05 14:53:00','',1,'uploads/purchase/1/','',26.00);
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_products`
--

DROP TABLE IF EXISTS `purchase_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_products` (
  `PurchaseProductsID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `PurchaseID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `PurchaseProductQtd` int(11) NOT NULL,
  `PurchaseProductCost` decimal(15,2) NOT NULL,
  PRIMARY KEY (`PurchaseProductsID`),
  KEY `PurchaseProductsCompanyID_idx` (`CompanyID`),
  KEY `PurchaseProductsPurchaseID_idx` (`PurchaseID`),
  KEY `PurchaseProductsProductID_idx` (`ProductID`),
  CONSTRAINT `PurchaseProductsCompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `PurchaseProductsProductID` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `PurchaseProductsPurchaseID` FOREIGN KEY (`PurchaseID`) REFERENCES `purchase` (`PurchaseID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_products`
--

LOCK TABLES `purchase_products` WRITE;
/*!40000 ALTER TABLE `purchase_products` DISABLE KEYS */;
INSERT INTO `purchase_products` VALUES (37,1,39,1,10,3.00),(38,1,40,4,3,5.00),(39,1,40,2,1,10.00),(40,1,41,1,2,3.00),(41,1,42,3,3,12.00),(42,1,43,1,2,3.00),(43,1,43,4,4,5.00);
/*!40000 ALTER TABLE `purchase_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale` (
  `SaleID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `CostumerID` int(11) DEFAULT NULL,
  `SaleDate` datetime NOT NULL,
  `SaleQtd` int(11) DEFAULT NULL,
  `SaleTotal` decimal(15,2) DEFAULT NULL,
  `SaleTotalPaid` decimal(15,2) DEFAULT NULL,
  `SaleRest` decimal(15,2) DEFAULT NULL,
  `SaleProfit` decimal(15,2) DEFAULT NULL,
  `SalePayment` varchar(1) DEFAULT NULL,
  `SaleDetail` text,
  `SaleStatus` int(11) DEFAULT NULL,
  `SaleRefWait` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`SaleID`),
  KEY `SaleCompanyID_idx` (`CompanyID`),
  KEY `SaleCostumerID_idx` (`CostumerID`),
  CONSTRAINT `SaleCompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `SaleCostumerID` FOREIGN KEY (`CostumerID`) REFERENCES `costumer` (`CostumerID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=332 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale`
--

LOCK TABLES `sale` WRITE;
/*!40000 ALTER TABLE `sale` DISABLE KEYS */;
INSERT INTO `sale` VALUES (330,1,NULL,'2017-10-05 14:06:00',0,103.28,110.00,6.72,3336.00,'D',NULL,1,NULL),(331,1,NULL,'2017-10-05 14:35:00',2,79.39,80.00,0.61,4631.00,'D',NULL,1,NULL);
/*!40000 ALTER TABLE `sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale_products`
--

DROP TABLE IF EXISTS `sale_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale_products` (
  `SaleProductsID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `SaleID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `SaleProductQtd` int(11) DEFAULT NULL,
  `SaleProductPrice` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`SaleProductsID`),
  KEY `SaleProductsComapnyID_idx` (`CompanyID`),
  KEY `SaleProductsProductID_idx` (`ProductID`),
  KEY `SaleProductsSaleID_idx` (`SaleID`),
  CONSTRAINT `SaleProductsCompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `SaleProductsProductID` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `SaleProductsSaleID` FOREIGN KEY (`SaleID`) REFERENCES `sale` (`SaleID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=579 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_products`
--

LOCK TABLES `sale_products` WRITE;
/*!40000 ALTER TABLE `sale_products` DISABLE KEYS */;
INSERT INTO `sale_products` VALUES (571,1,330,5,500,10.56),(572,1,330,1,2,4.00),(573,1,330,3,3,30.00),(576,1,331,5,700,10.56),(577,1,331,1,3,4.00),(578,1,331,3,2,30.00);
/*!40000 ALTER TABLE `sale_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `SupplierID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `SupplierName` varchar(45) NOT NULL,
  `SupplierEmail` varchar(45) DEFAULT NULL,
  `SupplierPhone` varchar(45) DEFAULT NULL,
  `SupplierCNPJ` int(20) DEFAULT NULL,
  `SupplierDetail` text,
  PRIMARY KEY (`SupplierID`),
  KEY `SupplierCompanyID_idx` (`CompanyID`),
  CONSTRAINT `SupplierCompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,1,'Massas LTDA','massas@hotmail.com','41995121158',11254885,'<p>Vendedor de massas</p>'),(2,1,'Refrigerantes LTDA','refri@hotmail.com','41995121158',1254875,'<p>Vendedor de refrigerantes</p>');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `BunchID` int(11) DEFAULT NULL,
  `UserName` varchar(45) DEFAULT NULL,
  `UserLogin` varchar(45) NOT NULL,
  `UserEmail` varchar(45) DEFAULT NULL,
  `UserPass` varchar(32) DEFAULT NULL,
  `UserStatus` int(11) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  KEY `UserCompanyID_idx` (`CompanyID`),
  KEY `UserBunchID_idx` (`BunchID`),
  CONSTRAINT `UserBunchID` FOREIGN KEY (`BunchID`) REFERENCES `bunch` (`BunchID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `UserCompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `company` (`CompanyID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,1,6,'Willian Nascimento','willZ','will@hot.com','202cb962ac59075b964b07152d234b70',1),(2,2,11,'José Roque do Nascimento','','jose@hot.com','202cb962ac59075b964b07152d234b70',1),(3,1,7,'Pedro Neves Junior','Pedro','pedro@hot.com','10995ae0629573e659687d0b694d86bd',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-05 18:12:22
