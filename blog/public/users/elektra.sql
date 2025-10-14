-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2025 at 01:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elektra`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addCLIENTE` (IN `p_id` VARCHAR(10), IN `p_nombre` VARCHAR(25), IN `p_apellido` VARCHAR(50), IN `p_calle` VARCHAR(25), IN `p_colonia` VARCHAR(25), IN `p_numero` VARCHAR(5), IN `p_estatus_domicilio` VARCHAR(25), IN `p_telefono` VARCHAR(10), IN `p_capacidad_credico` INT, IN `p_estatus_credito` VARCHAR(10), IN `p_dias_pago` VARCHAR(15))   BEGIN
INSERT INTO cliente(id,nombre,apellido,calle,colonia,numero,estatus_domicilio,telefono,capacidad_credito,estatus_credito,dias_pago) VALUES (p_id,p_nombre,p_apellido,p_calle,p_colonia,p_numero,p_estatus_domicilio,p_telefono,p_capacidad_credito,p_estatus_credito,p_dias_pago);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarCliente` (IN `p_id` VARCHAR(10), IN `p_nombre` VARCHAR(25), IN `p_apellido` VARCHAR(50), IN `p_calle` VARCHAR(25), IN `p_colonia` VARCHAR(25), IN `p_numero` VARCHAR(5), IN `p_estatus_domicilio` VARCHAR(25), IN `p_telefono` VARCHAR(10), IN `p_capacidad_credito` INT(11), IN `p_estatus_credito` VARCHAR(10), IN `p_dias_pago` VARCHAR(15))   BEGIN
    
    INSERT INTO clientes (
        id, nombre, apellido, calle, colonia, 
        numero, estatus_domicilio, telefono, 
        capacidad_credito, estatus_credito, dias_pago
    )
    VALUES (
        p_id, p_nombre, p_apellido, p_calle, p_colonia, 
        p_numero, p_estatus_domicilio, p_telefono, 
        p_capacidad_credito, p_estatus_credito, p_dias_pago
    );
    
    
    SELECT CONCAT('Cliente con ID ', p_id, ' insertado correctamente.') AS Mensaje;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id` varchar(10) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `calle` varchar(25) DEFAULT NULL,
  `colonia` varchar(25) DEFAULT NULL,
  `numero` varchar(5) DEFAULT NULL,
  `estatus_domicilio` varchar(25) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `capacidad_credito` int(11) DEFAULT NULL,
  `estatus_credito` varchar(10) DEFAULT NULL,
  `dias_pago` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `empleado`
--

CREATE TABLE `empleado` (
  `id` varchar(10) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `ap` varchar(25) DEFAULT NULL,
  `am` varchar(25) DEFAULT NULL,
  `RFC` varchar(13) DEFAULT NULL,
  `CURP` varchar(18) DEFAULT NULL,
  `Fecha_ingreso` date DEFAULT NULL,
  `descuento_empleado` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prestamo`
--

CREATE TABLE `prestamo` (
  `id` varchar(10) NOT NULL,
  `fecha_compra` date DEFAULT NULL,
  `cant_abono` float DEFAULT NULL,
  `total_pagar` float DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL,
  `abonos_pagados` int(11) DEFAULT NULL,
  `cant_para_liquidar` float DEFAULT NULL,
  `fk_cliente` varchar(10) DEFAULT NULL,
  `atraso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id` varchar(10) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `costo_compra` float DEFAULT NULL,
  `costo_venta` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `fk_proveedor` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `id` varchar(10) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `marca` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `puesto`
--

CREATE TABLE `puesto` (
  `id` varchar(10) NOT NULL,
  `nombre_puesto` varchar(20) DEFAULT NULL,
  `sueldo` float DEFAULT NULL,
  `fk_empleado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` varchar(10) NOT NULL,
  `fk_empleado` varchar(10) DEFAULT NULL,
  `fk_cliente` varchar(10) DEFAULT NULL,
  `fk_producto` varchar(10) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Subtotal` float DEFAULT NULL,
  `Descuento` float DEFAULT NULL,
  `Total` float DEFAULT NULL,
  `fk_prestamo` varchar(10) DEFAULT NULL,
  `metodo_pago` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proveedor` (`fk_proveedor`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empleado` (`fk_empleado`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empleado` (`fk_empleado`),
  ADD KEY `fk_cliente` (`fk_cliente`),
  ADD KEY `fk_producto` (`fk_producto`),
  ADD KEY `fk_prestamo` (`fk_prestamo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id`);

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`fk_proveedor`) REFERENCES `proveedor` (`id`);

--
-- Constraints for table `puesto`
--
ALTER TABLE `puesto`
  ADD CONSTRAINT `puesto_ibfk_1` FOREIGN KEY (`fk_empleado`) REFERENCES `empleado` (`id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`fk_empleado`) REFERENCES `empleado` (`id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`fk_producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `ticket_ibfk_4` FOREIGN KEY (`fk_prestamo`) REFERENCES `prestamo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
