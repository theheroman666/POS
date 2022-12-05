-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2022 a las 17:44:25
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurantes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `Id` int(255) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Imagen` varchar(255) NOT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`Id`, `Nombre`, `Imagen`, `FechaCreacion`) VALUES
(1, 'Masa', 'CC_Origal.jpg', '2022-12-05 11:05:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `Id` int(255) NOT NULL,
  `PedidoId` int(255) NOT NULL,
  `ProductoId` int(255) NOT NULL,
  `Unidades` int(11) NOT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`Id`, `PedidoId`, `ProductoId`, `Unidades`, `FechaCreacion`) VALUES
(17, 17, 1, 2, '2022-12-05 13:21:15'),
(18, 18, 1, 2, '2022-12-05 13:22:59'),
(19, 19, 1, 1, '2022-12-05 13:24:25'),
(20, 20, 1, 1, '2022-12-05 13:25:16'),
(21, 21, 1, 2, '2022-12-05 13:26:44'),
(22, 22, 1, 10, '2022-12-05 16:42:26'),
(23, 23, 1, 7, '2022-12-05 16:42:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordeninv`
--

CREATE TABLE `ordeninv` (
  `Id` int(11) NOT NULL,
  `PedidoInvId` int(11) NOT NULL,
  `ProductoInvId` int(11) NOT NULL,
  `Unidades` int(11) NOT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `Id` int(255) NOT NULL,
  `UsuarioId` int(255) NOT NULL,
  `Total` decimal(9,2) NOT NULL,
  `DineroRecibido` decimal(9,2) NOT NULL,
  `Factura` varchar(5) NOT NULL DEFAULT 'No',
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`Id`, `UsuarioId`, `Total`, `DineroRecibido`, `Factura`, `Fecha`) VALUES
(17, 1, '100.00', '100.00', 'Si', '2022-12-05 13:21:15'),
(18, 1, '100.00', '100.00', 'Si', '2022-12-05 13:22:59'),
(19, 1, '50.00', '50.00', 'Si', '2022-12-05 13:24:25'),
(20, 1, '50.00', '50.00', 'No', '2022-12-05 13:25:16'),
(21, 1, '100.00', '100.00', 'No', '2022-12-05 13:26:44'),
(22, 2, '500.00', '9999999.99', 'No', '2022-12-05 16:42:26'),
(23, 2, '350.00', '545.00', 'No', '2022-12-05 16:42:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidosinv`
--

CREATE TABLE `pedidosinv` (
  `Id` int(255) NOT NULL,
  `Total` int(255) NOT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id` int(255) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Precio` decimal(9,2) NOT NULL,
  `Imagen` varchar(400) NOT NULL,
  `Stock` int(255) NOT NULL,
  `FechaCrecion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id`, `Nombre`, `Precio`, `Imagen`, `Stock`, `FechaCrecion`) VALUES
(1, 'Coca cola', '50.00', 'CC_Origal.jpg', 10, '2022-12-04 20:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id` int(255) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id`, `Nombre`, `Fecha`) VALUES
(1, 'Admin', '2022-12-04 18:09:17'),
(2, 'Cajero', '2022-12-05 01:48:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(255) NOT NULL,
  `IdRol` int(255) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UsuarioCreacion` int(11) NOT NULL,
  `FechaCreacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `FechaModificacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `IdRol`, `Nombre`, `Password`, `UsuarioCreacion`, `FechaCreacion`, `FechaModificacion`) VALUES
(1, 1, 'Admin', '$2y$10$M9aaNEkryLpl7voOzqRXNOFeX.yD5sbFYPaXz1xn7rWfAyhhH00LK', 1, '2022-12-04 18:19:45', '2022-12-04 18:19:45'),
(2, 2, 'Cajero', '$2y$10$13KvWdpO0k3LUyHirmY/yummnEJK7vPVpw2ob7xNP4.U5tsBNfsuW', 1, '2022-12-05 01:47:55', '2022-12-05 01:48:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_PedidosId` (`PedidoId`),
  ADD KEY `fk_ProductosId` (`ProductoId`);

--
-- Indices de la tabla `ordeninv`
--
ALTER TABLE `ordeninv`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `PedidoInvId` (`PedidoInvId`),
  ADD KEY `ProductoInvId` (`ProductoInvId`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `UsuarioId` (`UsuarioId`);

--
-- Indices de la tabla `pedidosinv`
--
ALTER TABLE `pedidosinv`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdRol` (`IdRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ordeninv`
--
ALTER TABLE `ordeninv`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `pedidosinv`
--
ALTER TABLE `pedidosinv`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `fk_PedidosId` FOREIGN KEY (`PedidoId`) REFERENCES `pedidos` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ProductosId` FOREIGN KEY (`ProductoId`) REFERENCES `productos` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ordeninv`
--
ALTER TABLE `ordeninv`
  ADD CONSTRAINT `PedidoInvId` FOREIGN KEY (`PedidoInvId`) REFERENCES `pedidosinv` (`Id`),
  ADD CONSTRAINT `ProductoInvId` FOREIGN KEY (`ProductoInvId`) REFERENCES `inventario` (`Id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`UsuarioId`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`IdRol`) REFERENCES `roles` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
