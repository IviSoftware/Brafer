-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localHost    Database: muebles
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acredores`
--

DROP TABLE IF EXISTS `acredores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acredores` (
  `idacredor` int NOT NULL AUTO_INCREMENT,
  `adeudo` decimal(10,2) NOT NULL,
  `clientes_idCliente` int NOT NULL,
  `fechaCapturas` varchar(45) NOT NULL,
  PRIMARY KEY (`idacredor`),
  KEY `fk_acredores_clientes1_idx` (`clientes_idCliente`),
  CONSTRAINT `fk_acredores_clientes1` FOREIGN KEY (`clientes_idCliente`) REFERENCES `clientes` (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acredores`
--

LOCK TABLES `acredores` WRITE;
/*!40000 ALTER TABLE `acredores` DISABLE KEYS */;
INSERT INTO `acredores` VALUES (1,2500.00,3,'2021-01-15 05:30:39');
/*!40000 ALTER TABLE `acredores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `idCategoria` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Comedor');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `idCliente` int NOT NULL AUTO_INCREMENT,
  `nombreCliente` varchar(45) NOT NULL,
  `apellidosCliente` varchar(80) NOT NULL,
  `direccionCliente` varchar(90) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `CURP` varchar(18) NOT NULL,
  `tipo` varchar(6) NOT NULL,
  `FechaCaptura` datetime NOT NULL,
  `Estado_idEstado` int NOT NULL,
  `Municipio_idMunicipio` int NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `fk_clientes_Estado1_idx` (`Estado_idEstado`),
  KEY `fk_clientes_Municipio1_idx` (`Municipio_idMunicipio`),
  CONSTRAINT `fk_clientes_Estado1` FOREIGN KEY (`Estado_idEstado`) REFERENCES `estado` (`idEstado`),
  CONSTRAINT `fk_clientes_Municipio1` FOREIGN KEY (`Municipio_idMunicipio`) REFERENCES `municipio` (`idMunicipio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Juano','Baez solis','8 sur D 1474-2','1995-07-24','2424242424','rochi@gmail.com','AAAAAAAAAAAAAAAAAA','normal','2021-01-14 18:55:16',1,1),(3,'Richi','Ramirez','8 sur D 174-4','1995-07-24','24242422728','rochi@gmail.com','AAAAAAAAAAAAAAAAAB','socio','2021-01-15 05:07:35',7,8);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras` (
  `idCompra` int NOT NULL AUTO_INCREMENT,
  `fechaCompra` datetime NOT NULL,
  `precioCompra` decimal(10,2) NOT NULL,
  `cantidadCompra` int NOT NULL,
  `totalCompra` decimal(10,2) NOT NULL,
  `Material_idMaterial` int NOT NULL,
  `Proveedores_idProveedor` int NOT NULL,
  PRIMARY KEY (`idCompra`),
  KEY `fk_Compras_Material1_idx` (`Material_idMaterial`),
  KEY `fk_Compras_Proveedores1_idx` (`Proveedores_idProveedor`),
  CONSTRAINT `fk_Compras_Material1` FOREIGN KEY (`Material_idMaterial`) REFERENCES `material` (`idMaterial`),
  CONSTRAINT `fk_Compras_Proveedores1` FOREIGN KEY (`Proveedores_idProveedor`) REFERENCES `proveedores` (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (1,'2021-01-15 03:30:22',0.00,1,0.00,1,1),(2,'2021-01-15 03:36:41',0.00,1,0.00,1,1),(3,'2021-01-15 03:38:34',10.00,2,20.00,1,1);
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleados` (
  `idEmpleado` int NOT NULL AUTO_INCREMENT,
  `nombreEmpleado` varchar(45) NOT NULL,
  `apellidosEmpleado` varchar(80) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `RFC` varchar(13) NOT NULL,
  `puesto` varchar(45) NOT NULL,
  `horasTrabajo` int NOT NULL,
  `sueldo` decimal(10,2) NOT NULL,
  `fechaCaptura` datetime NOT NULL,
  PRIMARY KEY (`idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'Luis','Sanchez Ampuero','1997-11-20','SADDSA','administrador',8,2000.00,'2021-01-15 03:54:55'),(2,'Omar','Ampuero Rodriguez','1996-09-27','DSASASSA','Gestor',8,1800.00,'2021-01-15 06:00:38'),(3,'Fernanda','Gomez Cristo','1992-01-14','DSASASDC','Recepcionista',8,1800.00,'2021-01-15 06:01:37');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `idEstado` int NOT NULL AUTO_INCREMENT,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Puebla'),(2,'Puebla'),(3,'Puebla'),(4,'Puebla'),(5,'Puebla'),(6,''),(7,'Mexico');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `material` (
  `idMaterial` int NOT NULL AUTO_INCREMENT,
  `material` varchar(25) NOT NULL,
  PRIMARY KEY (`idMaterial`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'Mdf');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `municipio` (
  `idMunicipio` int NOT NULL AUTO_INCREMENT,
  `Municipio` varchar(45) NOT NULL,
  `Estado_idEstado` int NOT NULL,
  PRIMARY KEY (`idMunicipio`),
  KEY `fk_Municipio_Estado1_idx` (`Estado_idEstado`),
  CONSTRAINT `fk_Municipio_Estado1` FOREIGN KEY (`Estado_idEstado`) REFERENCES `estado` (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'Puebla',1),(2,'Puebla',2),(3,'Puebla',3),(4,'Puebla',4),(5,'Atlixco',1),(6,'Cholula',5),(7,'',6),(8,'Chigna',7);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `idProducto` int NOT NULL AUTO_INCREMENT,
  `nombreProducto` varchar(45) NOT NULL,
  `codigoBarras` varchar(12) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `existencias` int NOT NULL,
  `Categorias_idCategoria` int NOT NULL,
  `Material_idMaterial` int NOT NULL,
  `fechaCaptura` datetime NOT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `fk_productos_Categorias1_idx` (`Categorias_idCategoria`),
  KEY `fk_productos_Material1_idx` (`Material_idMaterial`),
  CONSTRAINT `fk_productos_Categorias1` FOREIGN KEY (`Categorias_idCategoria`) REFERENCES `categorias` (`idCategoria`),
  CONSTRAINT `fk_productos_Material1` FOREIGN KEY (`Material_idMaterial`) REFERENCES `material` (`idMaterial`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Silla','123456789123','silla de color rojo',54.00,2,1,1,'2021-01-14 19:30:57'),(4,'Mesa','123456987784','Mesa para comer circular',150.00,1,1,1,'2021-01-15 02:54:15');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedores` (
  `idProveedor` int NOT NULL AUTO_INCREMENT,
  `proveedor` varchar(45) NOT NULL,
  `direccionPro` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `fechaCaptura` datetime NOT NULL,
  `Material_idMaterial` int NOT NULL,
  `Estado_idEstado` int NOT NULL,
  `Municipio_idMunicipio` int NOT NULL,
  `precioMaterial` decimal(10,2) NOT NULL,
  PRIMARY KEY (`idProveedor`),
  KEY `fk_Proveedores_Material1_idx` (`Material_idMaterial`),
  KEY `fk_Proveedores_Estado1_idx` (`Estado_idEstado`),
  KEY `fk_Proveedores_Municipio1_idx` (`Municipio_idMunicipio`),
  CONSTRAINT `fk_Proveedores_Estado1` FOREIGN KEY (`Estado_idEstado`) REFERENCES `estado` (`idEstado`),
  CONSTRAINT `fk_Proveedores_Material1` FOREIGN KEY (`Material_idMaterial`) REFERENCES `material` (`idMaterial`),
  CONSTRAINT `fk_Proveedores_Municipio1` FOREIGN KEY (`Municipio_idMunicipio`) REFERENCES `municipio` (`idMunicipio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,'maderamax','11 sur 1024-3','2213457890','2021-01-15 00:44:15',1,1,5,10.00);
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(10) NOT NULL,
  `passwor` varchar(10) NOT NULL,
  `rol` varchar(10) NOT NULL,
  `Empleados_idEmpleado` int NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_Usuarios_Empleados1_idx` (`Empleados_idEmpleado`),
  CONSTRAINT `fk_Usuarios_Empleados1` FOREIGN KEY (`Empleados_idEmpleado`) REFERENCES `empleados` (`idEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Admin','1234abcd','Admin',1),(2,'Receptor','789qwe','Receptor',3),(3,'Gestor','456zxc','Gestor',2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `idVenta` int NOT NULL AUTO_INCREMENT,
  `fechaVenta` datetime NOT NULL,
  `precioV` decimal(10,2) NOT NULL,
  `cantidad` int NOT NULL,
  `totalVenta` decimal(10,2) NOT NULL,
  `clientes_idCliente` int NOT NULL,
  `productos_idProducto` int NOT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `fk_Ventas_clientes1_idx` (`clientes_idCliente`),
  KEY `fk_Ventas_productos1_idx` (`productos_idProducto`),
  CONSTRAINT `fk_Ventas_clientes1` FOREIGN KEY (`clientes_idCliente`) REFERENCES `clientes` (`idCliente`),
  CONSTRAINT `fk_Ventas_productos1` FOREIGN KEY (`productos_idProducto`) REFERENCES `productos` (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,'2021-01-14 23:39:50',54.00,1,55.00,1,1),(2,'2021-01-15 00:11:47',54.00,2,108.00,1,1),(3,'2021-01-15 02:41:05',54.00,2,108.00,1,1);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-15  6:25:45
