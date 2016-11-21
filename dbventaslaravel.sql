-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2016 at 07:23 VM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbventaslaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `articulo`
--

CREATE TABLE `articulo` (
  `idarticulo` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(512) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `precio_venta` decimal(10,0) DEFAULT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `idmarca` int(11) DEFAULT NULL,
  `precio_compra` decimal(10,0) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articulo`
--

INSERT INTO `articulo` (`idarticulo`, `idcategoria`, `codigo`, `nombre`, `stock`, `descripcion`, `imagen`, `estado`, `precio_venta`, `stock_minimo`, `idmarca`, `precio_compra`) VALUES
(1, 138, '1234', 'articulo01', 8, 'descripcion01', 'no-foto.png', 'Inactivo', '851', 7, 2, '850'),
(2, 138, '12345', 'articulo02', 30, 'descripcionasddd', 'no-foto.png', 'Inactivo', '40', 20, 2, '20'),
(3, 138, '1234', 'aaaaaa', 12, 'dawd', 'no-foto.png', 'Inactivo', '2', 1, 1, '1'),
(4, 138, '12434', 'wdaw', 12, 'adw', 'no-foto.png', 'Inactivo', '123', 12, 2, '123'),
(5, 138, '1231', 'awf', 12, 'awd', 'no-foto.png', 'Inactivo', '12', 12, 2, '12'),
(6, 138, '123431', 'awfd', 12, 'awdf', 'no-foto.png', 'Inactivo', '13', 12, 1, '12'),
(7, 33, '14353', 'awd', 12, 'wada', 'no-foto.png', 'Inactivo', '12', 12, 2, '12'),
(8, 138, '341351', 'awdw', 12, 'awd', 'no-foto.png', 'Inactivo', '12', 12, 2, '12'),
(9, 138, '323', 'wadwa', 12, '122', 'no-foto.png', 'Inactivo', '12', 12, 2, '12'),
(10, 138, '323', 'wadwa', 12, '122', 'no-foto.png', 'Inactivo', '12', 12, 2, '12'),
(11, 147, '1234', 'Teclado Gamer', 12312, 'awd', 'no-foto.png', 'Activo', '12', 12, 2, '10'),
(12, 146, '124313', 'Microfono Estandar', 122, 'awdw', 'no-foto.png', 'Activo', '12', 12, 1, '12'),
(13, 148, '141414', 'Auriculares Gamer', 20000, 'aaaaaaaaaa', 'no-foto.png', 'Activo', '12312', 200, 2, '1122'),
(14, 147, '1212412', 'Teclado Gamer', 12, '12daw', 'no-foto.png', 'Activo', '12', 12, 2, '11'),
(15, 138, '1341', 'awdawd', 12, 'awdawd', 'no-foto.png', 'Inactivo', '12', 14, 2, '10'),
(16, 141, '1235413', 'dawdawd', 123, 'wadaw', 'no-foto.png', 'Inactivo', '1123', 12, 2, '123'),
(17, 148, '33423', 'Auricular Estandar', 50, 'dawfawf', 'no-foto.png', 'Activo', '34', 33, 2, '34'),
(18, 148, '34235', 'adawd', 213, 'awd', 'no-foto.png', 'Inactivo', '124', 12, 2, '12'),
(19, 148, '34235', 'adawd', 213, 'awd', 'no-foto.png', 'Inactivo', '124', 12, 2, '12'),
(20, 148, '34235', 'adawd', 213, 'awd', 'no-foto.png', 'Inactivo', '124', 12, 2, '12');

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `idcargo` int(11) NOT NULL,
  `nombrecargo` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cargo`
--

INSERT INTO `cargo` (`idcargo`, `nombrecargo`) VALUES
(1, 'Analista Programador'),
(2, 'Programador');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(256) DEFAULT NULL,
  `condicion` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `condicion`) VALUES
(1, 'categoria02aa', 'excelente2', 0),
(4, 'categoria4', 'ddff', 0),
(5, 'categoria5', 'dd1', 0),
(6, 'categoria6', 'dd', 0),
(8, 'wad', 'awdaw', 0),
(9, 'geg23', 'hrhr', 0),
(10, 'geg', 'hrhr', 0),
(11, 'a2', 'fefegaaa', 0),
(12, 'aaa', 'ffefe', 0),
(13, 'efeg', 'gege', 0),
(29, 'fafa', 'wfawf', 0),
(30, 'fafa', 'wfawf', 0),
(31, 'fafa31', 'wfawf', 0),
(32, 'fafa', 'wfawf', 0),
(33, 'fafaddd', 'wfawf', 0),
(34, 'fafa34', 'wfawf', 0),
(35, 'fafaa35', 'wfawf', 0),
(40, 'fafa', 'wfawf', 0),
(41, 'fafa', 'wfawf', 0),
(42, 'aaaa', 'bbbbb', 0),
(43, 'gaegeg', 'wfawf', 0),
(44, 'fafa', 'wfawf', 0),
(45, 'dawdawd', 'dawd', 0),
(46, 'fafa', 'wfawf', 0),
(47, 'fafa', 'wfawf', 0),
(48, 'fafa', 'wfawf', 0),
(49, 'fafa', 'wfawf', 0),
(50, 'fafa', 'wfawf', 0),
(51, 'fafa', 'wfawf', 0),
(52, 'fafa', 'wfawf', 0),
(53, 'fafa', 'wfawf', 0),
(54, 'fafa', 'wfawf', 0),
(55, 'fafa', 'wfawf', 0),
(56, 'fafa', 'wfawf', 0),
(57, 'fafa', 'wfawf', 0),
(58, 'fafa', 'wfawf', 0),
(59, 'fafa', 'wfawf', 0),
(60, 'fafa', 'wfawf', 0),
(61, 'fafa', 'wfawf', 0),
(62, 'fafa', 'wfawf', 0),
(63, 'fafa', 'wfawf', 0),
(64, 'fafa', 'wfawf', 0),
(65, 'fafa', 'wfawf', 0),
(66, 'fafa', 'wfawf', 0),
(67, 'fafa', 'wfawf', 0),
(68, 'fafa', 'wfawf', 0),
(69, 'fafa', 'wfawf', 0),
(70, 'fafa', 'wfawf', 0),
(71, 'fafa', 'wfawf', 0),
(72, 'fafa', 'wfawf', 0),
(73, 'fafa', 'wfawf', 0),
(74, 'fafa', 'wfawf', 0),
(75, 'faf', 'wfawf', 0),
(76, 'fafa', 'wfawf', 0),
(77, 'fafa', 'wfawf', 0),
(78, 'fafa', 'wfawf', 0),
(79, 'fafa', 'wfawf', 0),
(80, 'fafa', 'wfawf', 0),
(81, 'fafa', 'wfawf', 0),
(82, 'fafa', 'wfawf', 0),
(83, 'fagg', 'faw', 0),
(84, 'fagg', 'faw', 0),
(85, 'fagg', 'faw', 0),
(86, 'fagg', 'faw', 0),
(87, 'fagg', 'faw', 0),
(88, 'fagg', 'faw', 0),
(89, 'fagg', 'faw', 0),
(90, 'fagg', 'faw', 0),
(91, 'fagg', 'faw', 0),
(92, 'fagg', 'faw', 0),
(93, 'fagg', 'faw', 0),
(94, 'fagg', 'faw', 0),
(95, 'fagg', 'faw', 0),
(96, 'fagg', 'faw', 0),
(97, 'fagg', 'faw', 0),
(98, 'fagg', 'faw', 0),
(99, 'fagg', 'faw', 0),
(100, 'fagg', 'faw', 0),
(101, 'fagg', 'faw', 0),
(102, 'fagg', 'faw', 0),
(103, 'fagg', 'faw', 0),
(104, 'fagg', 'faw', 0),
(105, 'fagg', 'faw', 0),
(106, 'fagg', 'faw', 0),
(107, 'fagg', 'faw', 0),
(108, 'fagg', 'faw', 0),
(109, 'fagg', 'faw', 0),
(110, 'fagg', 'faw', 0),
(111, 'fagg', 'faw', 0),
(112, 'fagg', 'faw', 0),
(113, 'awd', 'awf', 0),
(114, 'awdaaa', 'awf', 0),
(115, 'gawgw', 'efef', 0),
(116, 'afawf', 'awfw', 0),
(117, 'gggg', 'aaaaa', 0),
(137, 'categoriatest   dwadw', 'dawddddddddddddddddddddddddddddddddd', 0),
(138, 'gbbbbb', 'dffff', 0),
(139, 'dawd', 'awdaw', 0),
(140, 'awf', 'awfwf', 0),
(141, 'fawf', 'awfwagg', 0),
(142, 'awf', 'dawf', 0),
(143, 'awf', 'awf', 0),
(144, 'fawf', 'awf', 0),
(145, 'Mouse', 'Soy un Mouse', 1),
(146, 'Microfono de Escritorio', 'Soy un Microfono ', 1),
(147, 'Teclados', 'Soy un teclado.', 1),
(148, 'Audifonos', 'Soy un Audifono', 1),
(149, 'awdaw', 'awdaw', 0),
(150, 'awd', 'awf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comprobante`
--

CREATE TABLE `comprobante` (
  `serie` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `comprobante`
--

INSERT INTO `comprobante` (`serie`, `tipo`) VALUES
('BO01', 'BOLETA'),
('FA01', 'FACTURA');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_ingreso`
--

CREATE TABLE `detalle_ingreso` (
  `iddetalle_ingreso` int(11) NOT NULL,
  `idingreso` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_compra` decimal(11,2) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_ingreso`
--

INSERT INTO `detalle_ingreso` (`iddetalle_ingreso`, `idingreso`, `idarticulo`, `cantidad`, `precio_compra`, `precio_venta`) VALUES
(1, 1, 1, 20, '30.00', '50.00'),
(2, 1, 2, 10, '20.00', '40.00'),
(3, 1, 1, 11, '12.00', '20.00');

--
-- Triggers `detalle_ingreso`
--
DELIMITER $$
CREATE TRIGGER `tri_act_articulo` AFTER INSERT ON `detalle_ingreso` FOR EACH ROW BEGIN
 
UPDATE articulo
SET articulo.stock = articulo.stock + NEW.cantidad
WHERE articulo.idarticulo = NEW.idarticulo;

  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalle_venta` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `idempleado` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `dni` char(8) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `fecha_contrato` date NOT NULL,
  `email` varchar(70) NOT NULL,
  `idcargo` int(11) DEFAULT NULL,
  `salario` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`idempleado`, `nombres`, `apellidos`, `dni`, `telefono`, `fecha_contrato`, `email`, `idcargo`, `salario`) VALUES
(1, 'mariano', 'poma santos', '76934496', '986845313', '2016-09-08', 'geral_367@hotmail.com', 2, '1200'),
(2, 'poma', 'poma santos', '76934497', '986845314', '2016-09-27', 'geral_368@hotmail.com', 2, '1500');

-- --------------------------------------------------------

--
-- Table structure for table `ingreso`
--

CREATE TABLE `ingreso` (
  `idingreso` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idcomprobante` char(5) NOT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingreso`
--

INSERT INTO `ingreso` (`idingreso`, `idproveedor`, `idcomprobante`, `num_comprobante`, `fecha_hora`, `impuesto`, `estado`) VALUES
(1, 1, 'FA01', '00001', '2016-09-15 00:00:00', '8.00', 'Activo'),
(2, 2, 'BO01', '00001', '0000-00-00 00:00:00', '8.00', 'Cancelado');

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE `marca` (
  `idmarca` int(11) NOT NULL,
  `nombre_marca` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`idmarca`, `nombre_marca`) VALUES
(1, 'micronics'),
(2, 'genius');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL,
  `tipo_persona` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_documento` varchar(20) DEFAULT NULL,
  `num_documento` varchar(15) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`idpersona`, `tipo_persona`, `nombre`, `tipo_documento`, `num_documento`, `direccion`, `telefono`, `email`) VALUES
(1, 'proveedor', 'nameProveedor01', 'DNI', '76934496', 'San Luis', '3243889', 'geral_366@hotmail.com'),
(2, 'proveedor', 'nameProveedor02', 'DNI', '76934497', 'San Luis', '3243889', 'geral_367@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `estado` varchar(20) DEFAULT 'Activo',
  `tipo` varchar(20) DEFAULT 'usuario',
  `keyreg` varchar(100) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `contrasena`, `email`, `estado`, `tipo`, `keyreg`) VALUES
(1, 'geral', '65402f90ef3ceb04c9a50fe3b5aa895d', 'geralpomasantosmariano@gmail.com', 'Activo', 'Administrador', ''),
(3, 'geral2', '65402f90ef3ceb04c9a50fe3b5aa895d', 'geralpomasantosmariano2@gmail.com', 'Activo', 'Usuario', ''),
(4, 'geral3', '65402f90ef3ceb04c9a50fe3b5aa895d', 'geralpomas@gmail.com', 'Activo', 'Usuario', '');

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `tipo_comprobante` varchar(20) NOT NULL,
  `serie_comprobante` varchar(7) NOT NULL,
  `num_comprobante` varchar(10) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `impuesto` decimal(4,2) NOT NULL,
  `total_venta` decimal(11,2) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idarticulo`),
  ADD KEY `fk_articulo_categoria_idx` (`idcategoria`),
  ADD KEY `idmarca` (`idmarca`);

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indexes for table `comprobante`
--
ALTER TABLE `comprobante`
  ADD PRIMARY KEY (`serie`);

--
-- Indexes for table `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  ADD PRIMARY KEY (`iddetalle_ingreso`),
  ADD KEY `fk_detalle_ingreso_idx` (`idingreso`),
  ADD KEY `fk_detalle_ingreso_articulo_idx` (`idarticulo`);

--
-- Indexes for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalle_venta`),
  ADD KEY `fk_detalle_venta_articulo_idx` (`idarticulo`),
  ADD KEY `fk_detalle_venta_idx` (`idventa`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`idempleado`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `employees_ibfk_1` (`idcargo`);

--
-- Indexes for table `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`idingreso`),
  ADD KEY `fk_ingreso_persona_idx` (`idproveedor`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idmarca`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD UNIQUE KEY `num_documento` (`num_documento`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `fk_venta_cliente_idx` (`idcliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
--
-- AUTO_INCREMENT for table `detalle_ingreso`
--
ALTER TABLE `detalle_ingreso`
  MODIFY `iddetalle_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalle_venta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `idingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `venta`
--
ALTER TABLE `venta`
  MODIFY `idventa` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
