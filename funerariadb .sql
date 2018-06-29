-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2018 a las 22:26:30
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `funerariadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblclientes`
--

CREATE TABLE `tblclientes` (
  `idcliente` int(11) NOT NULL,
  `nombre_cliente` varchar(45) COLLATE utf8_bin NOT NULL,
  `apellidos_cliente` varchar(45) COLLATE utf8_bin NOT NULL,
  `direccion_cliente` varchar(100) COLLATE utf8_bin NOT NULL,
  `tel_cliente` varchar(10) COLLATE utf8_bin NOT NULL,
  `fecha_ingreso_cliente` date NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tblclientes`
--

INSERT INTO `tblclientes` (`idcliente`, `nombre_cliente`, `apellidos_cliente`, `direccion_cliente`, `tel_cliente`, `fecha_ingreso_cliente`, `idusuario`) VALUES
(1, 'Yolani Maribel', 'Méndez Rodríguez', 'Canton Llano de Santiago, El Divisadero, Morazan', '7777-8888', '2018-06-17', 2),
(2, 'Duglas', 'Barahona', 'Ciudad Pacifica, San Miguel', '7890-7890', '2018-06-26', 1),
(3, 'yanci', 'Martinez', 'San francisco Gotera, Morazan', '7272-7373', '2018-06-26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcompra`
--

CREATE TABLE `tblcompra` (
  `idcompra` int(11) NOT NULL,
  `idfactura` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `costo_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfacturas`
--

CREATE TABLE `tblfacturas` (
  `idfactura` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha_factura` date NOT NULL,
  `total_venta` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductos`
--

CREATE TABLE `tblproductos` (
  `idproducto` int(11) NOT NULL,
  `nombre_producto` varchar(45) COLLATE utf8_bin NOT NULL,
  `precio_compra` double NOT NULL,
  `precio_venta` double NOT NULL,
  `descripcion` varchar(45) COLLATE utf8_bin NOT NULL,
  `foto` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `fecha_ingreso` date NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `idproveedor` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tblproductos`
--

INSERT INTO `tblproductos` (`idproducto`, `nombre_producto`, `precio_compra`, `precio_venta`, `descripcion`, `foto`, `fecha_ingreso`, `cantidad_producto`, `idproveedor`, `idusuario`) VALUES
(1, 'producto D', 400, 1000, 'Descripcion del producto D', '', '2018-06-28', 16, 3, 1),
(2, 'Europea blanca', 129, 3000, 'Solo para europeos', '../../img/inventario/2_Europea blanca.jpg', '2018-06-24', 0, 3, 1),
(3, 'Producto B', 120, 500, 'Descripcion del producto B', NULL, '2018-06-23', 0, 4, 1),
(4, 'Colombiana blanca', 120, 500, 'Descripcion del producto A', '../../img/inventario/4_Colombiana blanca.jpg', '2018-06-24', 0, 3, 1),
(5, 'Colombiana Morada', 10, 15, 'Servicio funeral para colombianos', '', '2018-06-28', 10, 3, 1),
(6, 'Presidente Gris', 200, 500, 'Caja para presidentes', '../../img/inventario/6_Presidente Gris.jpg', '2018-06-24', 0, 3, 1),
(7, 'Economica', 100, 200, 'Servicio para pobres', '../../img/inventario/7_Economica.jpg', '2018-06-24', 0, 3, 1),
(8, 'Servivio sin foto', 10, 20, 'a', '', '2018-06-24', 0, 3, 1),
(9, 'Nuevo producto', 10000, 3000, 'Es muy buen producto', '../../img/inventario/9_Nuevo producto.jpg', '2018-06-25', 0, 4, 1),
(10, 'Caja Nueva', 700, 1000, 'Descripcion de la caja nueva', '', '2018-06-28', 13, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproveedores`
--

CREATE TABLE `tblproveedores` (
  `idproveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(45) COLLATE utf8_bin NOT NULL,
  `direccion_proveedor` varchar(200) COLLATE utf8_bin NOT NULL,
  `telefono_proveedor` varchar(10) COLLATE utf8_bin NOT NULL,
  `correo_proveedor` varchar(45) COLLATE utf8_bin NOT NULL,
  `descripcion_proveedor` varchar(80) COLLATE utf8_bin NOT NULL,
  `fecha_registroprov` date NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tblproveedores`
--

INSERT INTO `tblproveedores` (`idproveedor`, `nombre_proveedor`, `direccion_proveedor`, `telefono_proveedor`, `correo_proveedor`, `descripcion_proveedor`, `fecha_registroprov`, `idusuario`) VALUES
(3, 'proveedor A', 'direccion proveedor A', '7777-7777', 'correo@proveedorA.com', 'Descripción Proveedor A', '2018-06-10', 1),
(4, 'Nombre proveedor B', 'Direccion proveedor B', '7272-7373', 'correo@proveedorB.com', 'Descripcion Proveedor B', '2018-06-23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `idusuario` int(11) NOT NULL,
  `nombreusuario` varchar(45) COLLATE utf8_bin NOT NULL,
  `apellidousuario` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `telefonousuario` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `direccionusuario` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `generousuario` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `correousuario` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `tipousuario` int(11) DEFAULT NULL,
  `username` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tblusuarios`
--

INSERT INTO `tblusuarios` (`idusuario`, `nombreusuario`, `apellidousuario`, `fechanacimiento`, `telefonousuario`, `direccionusuario`, `generousuario`, `correousuario`, `tipousuario`, `username`, `password`) VALUES
(1, 'Luis', 'Hernandez', '1990-04-19', '8888-8888', 'San Miguel', 'Hombre', 'fercastle@gmail.com', 2, 'fercastle', '123456'),
(2, 'Wilber', 'Mendez', '1994-01-30', '7777-777', 'Morazan', 'Hombre', 'mendezwilber94@gmail.com', 2, 'tmsh', '1234'),
(3, 'Maria', 'Martinez', '2000-02-29', '7777-7777', 'Gotera', 'Mujer', 'maria', 1, 'maria', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblclientes`
--
ALTER TABLE `tblclientes`
  ADD PRIMARY KEY (`idcliente`),
  ADD KEY `fk_clientes_usuario_idx` (`idusuario`);

--
-- Indices de la tabla `tblcompra`
--
ALTER TABLE `tblcompra`
  ADD PRIMARY KEY (`idcompra`),
  ADD KEY `fk_compra_facturas_idx` (`idfactura`),
  ADD KEY `fk_compra_producto_idx` (`idproducto`);

--
-- Indices de la tabla `tblfacturas`
--
ALTER TABLE `tblfacturas`
  ADD PRIMARY KEY (`idfactura`),
  ADD KEY `fk_facturas_cliente_idx` (`idcliente`),
  ADD KEY `fk_facturas_usuario_idx` (`idusuario`);

--
-- Indices de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `fk_productos_usuario_idx` (`idusuario`),
  ADD KEY `fk_productos_proveedor_idx` (`idproveedor`);

--
-- Indices de la tabla `tblproveedores`
--
ALTER TABLE `tblproveedores`
  ADD PRIMARY KEY (`idproveedor`),
  ADD KEY `fk_proveedor_usuario_idx` (`idusuario`);

--
-- Indices de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblclientes`
--
ALTER TABLE `tblclientes`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblcompra`
--
ALTER TABLE `tblcompra`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblfacturas`
--
ALTER TABLE `tblfacturas`
  MODIFY `idfactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tblproveedores`
--
ALTER TABLE `tblproveedores`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblclientes`
--
ALTER TABLE `tblclientes`
  ADD CONSTRAINT `fk_clientes_usuario` FOREIGN KEY (`idusuario`) REFERENCES `tblusuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblcompra`
--
ALTER TABLE `tblcompra`
  ADD CONSTRAINT `fk_compra_facturas` FOREIGN KEY (`idfactura`) REFERENCES `tblfacturas` (`idfactura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_producto` FOREIGN KEY (`idproducto`) REFERENCES `tblproductos` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblfacturas`
--
ALTER TABLE `tblfacturas`
  ADD CONSTRAINT `fk_facturas_cliente` FOREIGN KEY (`idcliente`) REFERENCES `tblclientes` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_facturas_usuario` FOREIGN KEY (`idusuario`) REFERENCES `tblusuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD CONSTRAINT `fk_productos_proveedor` FOREIGN KEY (`idproveedor`) REFERENCES `tblproveedores` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_usuario` FOREIGN KEY (`idusuario`) REFERENCES `tblusuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblproveedores`
--
ALTER TABLE `tblproveedores`
  ADD CONSTRAINT `fk_proveedor_usuario` FOREIGN KEY (`idusuario`) REFERENCES `tblusuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
