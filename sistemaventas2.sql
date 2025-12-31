-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2025 a las 19:28:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaventas2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_almacen`
--

CREATE TABLE `tb_almacen` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) NOT NULL,
  `stock_maximo` int(11) NOT NULL,
  `precio_compra` double NOT NULL,
  `precio_venta` double NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `imagen` text DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fyh_creacion` int(11) NOT NULL,
  `fyh_actualizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_almacen`
--

INSERT INTO `tb_almacen` (`id_producto`, `codigo`, `nombre`, `descripcion`, `stock`, `stock_minimo`, `stock_maximo`, `precio_compra`, `precio_venta`, `fecha_ingreso`, `imagen`, `id_usuario`, `id_categoria`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(9, 'p-00001', 'Curva de Luz 3/4 Plastisur', '', 898, 0, 0, 0.19, 0.7, '2025-10-13', 'default.jpg', 1, 1, 2025, 0),
(10, 'p-00002', 'Tubo de 1 Plastisur ', '', 7, 0, 0, 4.7, 7, '2025-10-13', 'default.jpg', 1, 1, 2025, 0),
(11, 'p-00003', 'Tubo de luz 3/4 Plastisur', '', 24, 0, 0, 2.81, 4, '2025-10-13', 'default.jpg', 1, 1, 2025, 0),
(12, 'p-00004', 'Pedestal blanco Italgrif', '\r\n', 71, 10, 0, 57.43, 75, '2025-10-13', '2025-10-15-02-42-24__default-image-icon-vector-missing-picture-page-website-design-mobile-app-no-photo-available-236105299.webp', 1, 1, 2025, 2025),
(13, 'p-00005', 'Cinta teflon amarillo 1/2', 'Es mas gruesa que el teflon rojo y tbm lo usan para el gas\r\n', 25, 0, 0, 0.726, 2.5, '2025-10-13', 'default.jpg', 1, 1, 2025, 2025);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carrito`
--

CREATE TABLE `tb_carrito` (
  `id_carrito` int(11) NOT NULL,
  `nro_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_carrito`
--

INSERT INTO `tb_carrito` (`id_carrito`, `nro_venta`, `id_producto`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(9, 1, 13, 5, '2025-10-26 19:22:48', '0000-00-00 00:00:00'),
(10, 1, 10, 10, '2025-10-26 19:22:53', '0000-00-00 00:00:00'),
(16, 2, 12, 10, '2025-10-26 20:54:38', '0000-00-00 00:00:00'),
(17, 3, 9, 20, '2025-10-27 15:52:17', '0000-00-00 00:00:00'),
(18, 3, 12, 10, '2025-10-27 15:52:28', '0000-00-00 00:00:00'),
(20, 3, 10, 10, '2025-10-27 15:53:04', '0000-00-00 00:00:00'),
(21, 4, 9, 10, '2025-10-27 15:56:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_categorias`
--

INSERT INTO `tb_categorias` (`id_categoria`, `nombre_categoria`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'liquidoss', '2025-06-24 12:04:51', '2025-09-23 11:10:18'),
(2, 'ELECTRONICOS', '2025-07-27 21:23:23', '2025-08-16 16:20:29'),
(3, 'comestibles', '2025-09-23 11:10:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `nit_ci_cliente` varchar(255) NOT NULL,
  `celular_cliente` varchar(50) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`id_cliente`, `nombre_cliente`, `nit_ci_cliente`, `celular_cliente`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'julian mendoza', '888541252', '955874521', '2025-09-18 19:16:14', '2025-09-18 19:16:14'),
(2, 'julia mamani', '2215236511', '954412548', '2025-09-18 19:16:14', '2025-09-18 19:16:14'),
(3, 'juan montes', '548741354', '954478422', '2025-09-18 15:23:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_compras`
--

CREATE TABLE `tb_compras` (
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nro_compra` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `comprobante` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `precio_compra` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_compras`
--

INSERT INTO `tb_compras` (`id_compra`, `id_producto`, `nro_compra`, `fecha_compra`, `id_proveedor`, `comprobante`, `id_usuario`, `precio_compra`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(10, 12, 1, '2025-10-13', 6, 'factura nro-501224', 1, '50', 10, '2025-10-13 20:06:44', '0000-00-00 00:00:00'),
(11, 12, 2, '2025-10-14', 6, 'boleta 522', 1, '57.43', 10, '2025-10-14 16:12:49', '0000-00-00 00:00:00'),
(12, 10, 3, '2025-10-15', 7, 'boleta 523', 1, '4.7', 10, '2025-10-15 15:12:19', '0000-00-00 00:00:00'),
(13, 10, 4, '2025-10-26', 4, 'boleta 528', 1, '4.7', 10, '2025-10-26 18:58:26', '0000-00-00 00:00:00'),
(14, 12, 5, '2025-10-26', 7, 'boleta 525', 1, '57.43', 20, '2025-10-26 20:42:50', '0000-00-00 00:00:00'),
(15, 13, 6, '2025-10-27', 6, 'boleta 529', 1, '0.726', 20, '2025-10-27 15:40:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proveedores`
--

CREATE TABLE `tb_proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(255) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_proveedores`
--

INSERT INTO `tb_proveedores` (`id_proveedor`, `nombre_proveedor`, `celular`, `telefono`, `descripcion`, `direccion`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(4, 'adrian ', '969716990', '9541220', '', 'av lomas 128', '2025-08-16 20:02:02', '2025-08-16 21:55:00'),
(6, 'Dafer', '12121', '12121', 'Por mayor se vende a 0.50-para techos u estuques', 'daferaaaa', '2025-10-13 19:19:58', '2025-10-15 14:40:54'),
(7, 'Femaco', '232', '123', 'Este tubo lo suelen comprar por unidades', 'asda', '2025-10-15 14:38:42', '2025-10-15 14:40:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`id_rol`, `rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'ADMINISTRADOR', '2025-01-22 18:55:39', '2025-01-22 18:55:39'),
(2, 'VENDEDOR', '2025-01-28 13:07:31', '2025-01-28 13:09:52'),
(3, 'MARKETING', '2025-07-27 21:42:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_user` text NOT NULL,
  `token` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `nombres`, `email`, `password_user`, `token`, `id_rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'adrianjesus', 'adrianjesus@gmail.com', '$2y$10$13xEA4XrgHd1koXPnpurlukG0egdkpiFDbD/aUgWidGODd2nXj7Xu', '', 1, '2025-06-23 19:14:26', '2025-06-23 19:14:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ventas`
--

CREATE TABLE `tb_ventas` (
  `id_venta` int(11) NOT NULL,
  `nro_venta` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `total_pagado` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_ventas`
--

INSERT INTO `tb_ventas` (`id_venta`, `nro_venta`, `id_cliente`, `total_pagado`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(2, 1, 1, 83, '2025-10-26 19:23:09', '0000-00-00 00:00:00'),
(8, 2, NULL, 750, '2025-10-26 20:54:56', '0000-00-00 00:00:00'),
(9, 3, NULL, 834, '2025-10-27 15:53:24', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `nro_venta` (`nro_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tb_proveedores`
--
ALTER TABLE `tb_proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `nro_venta` (`nro_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tb_proveedores`
--
ALTER TABLE `tb_proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD CONSTRAINT `tb_almacen_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categorias` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_almacen_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  ADD CONSTRAINT `tb_carrito_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tb_almacen` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD CONSTRAINT `tb_compras_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `tb_proveedores` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_compras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `tb_almacen` (`id_producto`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tb_roles` (`id_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  ADD CONSTRAINT `tb_ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tb_clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_ventas_ibfk_2` FOREIGN KEY (`nro_venta`) REFERENCES `tb_carrito` (`nro_venta`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
