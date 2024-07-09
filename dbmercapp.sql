-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2019 a las 15:56:51
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbmercapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbarea`
--

CREATE TABLE `tbarea` (
  `idArea` bigint(20) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbarea`
--

INSERT INTO `tbarea` (`idArea`, `nombre`) VALUES
(1, 'AGRICOLA'),
(2, 'PECUARIA'),
(3, 'AGROINDUSTRIA'),
(4, 'MECANIZACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcangeopunto`
--

CREATE TABLE `tbcangeopunto` (
  `idCangeoPunto` bigint(20) NOT NULL,
  `idCliente` bigint(20) NOT NULL,
  `idPremio` bigint(20) NOT NULL,
  `PuntosCangear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcategoria`
--

CREATE TABLE `tbcategoria` (
  `idCategoria` bigint(20) NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcategoria`
--

INSERT INTO `tbcategoria` (`idCategoria`, `nombre`) VALUES
(1, 'LACTEOS'),
(2, 'CARNICOS'),
(3, 'FRUVER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` bigint(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tipoCliente` varchar(30) NOT NULL,
  `totalPuntos` int(100) NOT NULL,
  `acomuladoPuntos` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbcliente`
--

INSERT INTO `tbcliente` (`idCliente`, `nombre`, `telefono`, `email`, `tipoCliente`, `totalPuntos`, `acomuladoPuntos`) VALUES
(2, 'Comprador', '31455455555', 'durand@gmail.com', 'Aprendiz', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbentrada`
--

CREATE TABLE `tbentrada` (
  `idEntrada` bigint(20) NOT NULL,
  `idLoteProducto` bigint(20) NOT NULL,
  `fecha` date NOT NULL,
  `responsableRcibir` varchar(30) NOT NULL,
  `horaEntrada` time NOT NULL,
  `cantidadEntrar` double NOT NULL,
  `valorTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbentrada`
--

INSERT INTO `tbentrada` (`idEntrada`, `idLoteProducto`, `fecha`, `responsableRcibir`, `horaEntrada`, `cantidadEntrar`, `valorTotal`) VALUES
(1, 1, '2019-02-26', 'CARLOS MARIO', '20:42:44', 34, 459000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblote`
--

CREATE TABLE `tblote` (
  `idLote` bigint(20) NOT NULL,
  `codigoLote` varchar(10) NOT NULL,
  `responsableProduccion` varchar(30) NOT NULL,
  `fechaProduccion` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblote`
--

INSERT INTO `tblote` (`idLote`, `codigoLote`, `responsableProduccion`, `fechaProduccion`) VALUES
(1, '3456-L04', 'CARLOS MARIO', '2019-02-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbloteproducto`
--

CREATE TABLE `tbloteproducto` (
  `idLoteProducto` bigint(20) NOT NULL,
  `idLote` bigint(20) NOT NULL,
  `idProducto` bigint(20) NOT NULL,
  `cantidad` double NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `valorUnitario` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbloteproducto`
--

INSERT INTO `tbloteproducto` (`idLoteProducto`, `idLote`, `idProducto`, `cantidad`, `fechaVencimiento`, `valorUnitario`) VALUES
(1, 1, 1, 34, '2019-02-21', 1200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpedido`
--

CREATE TABLE `tbpedido` (
  `idPedido` bigint(20) NOT NULL,
  `valorPedido` double NOT NULL,
  `fechaPedido` date NOT NULL,
  `horaPedido` time NOT NULL,
  `idCliente` bigint(20) NOT NULL,
  `indicador` varchar(2) NOT NULL,
  `tipoPedido` varchar(1) NOT NULL,
  `valorPedidoRealizado` double NOT NULL,
  `valorPedidoEntregado` double NOT NULL,
  `lugar` varchar(30) NOT NULL,
  `horaEntregaPedido` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpedido`
--

INSERT INTO `tbpedido` (`idPedido`, `valorPedido`, `fechaPedido`, `horaPedido`, `idCliente`, `indicador`, `tipoPedido`, `valorPedidoRealizado`, `valorPedidoEntregado`, `lugar`, `horaEntregaPedido`) VALUES
(1, 6000, '2019-02-21', '10:51:55', 2, '3', '', 3600, 0, 'jerr', '0000-00-00 00:00:00'),
(2, 4800, '2019-02-22', '08:42:46', 2, '3', '', 4800, 0, 'navegacion', '2019-02-22 05:34:00'),
(3, 16000, '2019-02-26', '20:53:29', 2, '3', '', 16000, 0, 'cabaÃ±a2-3', '2019-02-26 16:11:00'),
(4, 0, '2019-02-26', '21:08:49', 2, '3', '', 0, 0, '1', '2019-02-26 16:11:00'),
(5, 3900, '2019-02-26', '21:15:13', 2, '3', '', 3900, 0, 'cabaÃ±a2-3', '2019-02-26 16:11:00'),
(6, 636300, '2019-02-26', '21:25:55', 2, '3', '', 636300, 0, 'cabaÃ±a2-3', '2019-02-26 16:11:00'),
(7, 384300, '2019-02-26', '21:26:46', 2, '1', '', 384300, 0, 'cabaÃ±a2-3', '2019-02-26 16:11:00'),
(8, 309700, '2019-02-26', '21:27:27', 2, '1', '', 309700, 0, 'cabaÃ±a2-3', '2019-02-26 16:11:00'),
(9, 449800, '2019-02-26', '21:34:18', 2, '1', '', 282800, 0, 'cabaÃ±a2-3', '2019-02-26 16:11:00'),
(10, 6000, '2019-02-27', '07:55:23', 2, '1', '', 6000, 0, 'adsi', '2019-02-27 16:11:00'),
(11, 1200000, '2019-02-27', '08:32:33', 2, '1', '', 1200000, 0, 'navegacion', '2019-02-27 16:11:00'),
(12, 114000, '2019-02-27', '08:33:17', 2, '1', '', 114000, 0, 'navegacion', '2019-02-27 20:33:00'),
(13, 0, '0000-00-00', '00:00:00', 2, '0', '', 0, 0, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpedidoproducto`
--

CREATE TABLE `tbpedidoproducto` (
  `idPedidoProducto` bigint(20) NOT NULL,
  `idPedido` bigint(20) NOT NULL,
  `idProducto` bigint(20) NOT NULL,
  `cantidadPedida` double NOT NULL,
  `cantidadEntregada` double NOT NULL,
  `valorUnitario` double NOT NULL,
  `valorTotalEntregado` double NOT NULL,
  `cantidadPedido` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbpedidoproducto`
--

INSERT INTO `tbpedidoproducto` (`idPedidoProducto`, `idPedido`, `idProducto`, `cantidadPedida`, `cantidadEntregada`, `valorUnitario`, `valorTotalEntregado`, `cantidadPedido`) VALUES
(7, 1, 1, 5, 3, 1200, 3600, 0),
(8, 2, 2, 4, 4, 1200, 4800, 0),
(9, 3, 3, 4, 4, 4000, 16000, 0),
(10, 5, 1, 3, 3, 1300, 3900, 0),
(11, 6, 1, 6, 4, 1300, 5200, 0),
(12, 6, 2, 5, 4, 33400, 133600, 0),
(13, 6, 1, 4, 4, 1300, 5200, 0),
(14, 6, 2, 5, 4, 33400, 133600, 0),
(15, 6, 1, 4, 4, 1300, 5200, 0),
(16, 6, 2, 4, 4, 33400, 133600, 0),
(17, 6, 1, 4, 4, 1300, 5200, 0),
(18, 6, 2, 4, 4, 33400, 133600, 0),
(19, 6, 1, 5, 4, 1300, 5200, 0),
(20, 6, 1, 4, 4, 1300, 5200, 0),
(21, 7, 2, 11, 11, 33400, 367400, 0),
(22, 7, 1, 13, 13, 1300, 16900, 0),
(23, 8, 2, 9, 9, 33400, 300600, 0),
(24, 8, 1, 7, 7, 1300, 9100, 0),
(30, 9, 1, 12, 12, 1300, 15600, 0),
(31, 9, 2, 13, 8, 33400, 267200, 0),
(32, 10, 3, 5, 5, 1200, 6000, 0),
(33, 11, 3, 1000, 1000, 1200, 1200000, 0),
(34, 12, 3, 95, 95, 1200, 114000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpersona`
--

CREATE TABLE `tbpersona` (
  `idPersona` bigint(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `ocupacion` varchar(20) NOT NULL,
  `indicador` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpremio`
--

CREATE TABLE `tbpremio` (
  `idPremio` bigint(20) NOT NULL,
  `idProducto` bigint(20) NOT NULL,
  `puntosCangeo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproducto`
--

CREATE TABLE `tbproducto` (
  `idProducto` bigint(20) NOT NULL,
  `codigoBarras` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `idUnidadMedida` bigint(20) NOT NULL,
  `idCategoria` bigint(20) NOT NULL,
  `idUnidad` bigint(20) DEFAULT NULL,
  `presentacion` varchar(5) NOT NULL,
  `precioVenta` double NOT NULL,
  `existencia` double NOT NULL,
  `foto` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `elemento` varchar(100) NOT NULL,
  `indicador` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbproducto`
--

INSERT INTO `tbproducto` (`idProducto`, `codigoBarras`, `nombre`, `idUnidadMedida`, `idCategoria`, `idUnidad`, `presentacion`, `precioVenta`, `existencia`, `foto`, `elemento`, `indicador`) VALUES
(1, '1', 'CORTADO', 3, 1, 1, 'TARRO', 1200, 0, '2019-02-27.png', 'CORTADO DE LECHE DE VACA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpromocion`
--

CREATE TABLE `tbpromocion` (
  `idPromocion` bigint(20) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `idProducto` bigint(20) NOT NULL,
  `valorActual` double NOT NULL,
  `valorPromocion` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpunto`
--

CREATE TABLE `tbpunto` (
  `idPunto` bigint(20) NOT NULL,
  `idCliente` bigint(20) NOT NULL,
  `idPedido` bigint(20) NOT NULL,
  `fechaVencimientoPunto` date NOT NULL,
  `estadoPunto` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtraslado`
--

CREATE TABLE `tbtraslado` (
  `idTraslado` bigint(20) NOT NULL,
  `tipoCausa` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `idUnidad` bigint(20) NOT NULL,
  `causa` varchar(10) NOT NULL,
  `referencia` varchar(3) NOT NULL,
  `responsableRecepcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbtraslado`
--

INSERT INTO `tbtraslado` (`idTraslado`, `tipoCausa`, `fecha`, `idUnidad`, `causa`, `referencia`, `responsableRecepcion`) VALUES
(3, 'DEVOLUCION', '2019-02-27', 1, 'Envase rot', 'PT', 'ANDREY GRANADA'),
(4, 'DEVOLUCION', '2019-02-27', 1, 'Envase rot', 'PT', 'ANDREY GRANADA'),
(5, 'DEVOLUCION', '2019-02-27', 1, 'Envase rot', 'PT', 'ANDREY GRANADA'),
(6, 'DEVOLUCION', '2019-02-27', 1, 'Envase rot', 'PT', 'ANDREY GRANADA'),
(7, 'DEVOLUCION', '2019-02-27', 1, 'Envase rot', 'PT', 'ANDREY GRANADA'),
(8, 'DEVOLUCION', '2019-02-27', 1, 'Vencido', 'MP', 'JUAN DANIEL VERA'),
(9, 'DEVOLUCION', '2019-02-27', 1, 'Vencido', 'MP', 'JUAN DANIEL VERA'),
(10, 'DEVOLUCION', '2019-02-27', 1, 'Vencido', 'MP', 'JUAN DANIEL VERA'),
(11, 'DEVOLUCION', '2019-02-27', 1, 'Vencido', 'MP', 'JUAN DANIEL VERA'),
(12, 'DEVOLUCION', '2019-02-28', 2, 'Envase rot', 'IN', 'MARIO DIAZ'),
(13, 'DEVOLUCION', '2019-02-28', 2, 'Envase rot', 'IN', 'MARIO DIAZ'),
(14, 'DEVOLUCION', '2019-02-28', 2, 'Envase rot', 'IN', 'MARIO DIAZ'),
(15, 'DEVOLUCION', '2019-02-28', 2, 'Envase rot', 'IN', 'MARIO DIAZ'),
(16, 'DEVOLUCION', '2019-02-28', 2, 'Envase rot', 'IN', 'MARIO DIAZ'),
(17, 'DEVOLUCION', '2019-02-28', 2, 'Envase rot', 'IN', 'MARIO DIAZ'),
(18, 'DEVOLUCION', '2019-02-28', 2, 'Envase rot', 'IN', 'MARIO DIAZ'),
(19, 'DEVOLUCION', '2019-02-28', 2, 'Envase rot', 'IN', 'MARIO DIAZ'),
(20, 'DEVOLUCION', '2019-02-28', 2, 'Toxico', 'IN', 'CARLOS MARIO DIAZ'),
(21, 'DEVOLUCION', '2019-02-28', 2, 'Toxico', 'IN', 'CARLOS MARIO DIAZ'),
(22, 'DEVOLUCION', '2019-02-28', 2, 'Toxico', 'IN', 'CARLOS MARIO DIAZ'),
(23, 'DEVOLUCION', '2019-02-28', 2, 'Toxico', 'IN', 'CARLOS MARIO DIAZ'),
(24, 'DEVOLUCION', '2019-02-28', 2, 'Toxico', 'IN', 'CARLOS MARIO DIAZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtrasladoproducto`
--

CREATE TABLE `tbtrasladoproducto` (
  `idTrasladoProducto` bigint(20) NOT NULL,
  `idTranslado` bigint(20) NOT NULL,
  `idProducto` bigint(20) NOT NULL,
  `cantidad` double NOT NULL,
  `descripcionCausa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbunidad`
--

CREATE TABLE `tbunidad` (
  `idUnidad` bigint(20) NOT NULL,
  `nombre` varchar(18) CHARACTER SET utf16 COLLATE utf16_spanish2_ci NOT NULL,
  `idArea` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbunidad`
--

INSERT INTO `tbunidad` (`idUnidad`, `nombre`, `idArea`) VALUES
(1, 'LACTEOS', 3),
(2, 'PANIFICACION', 3),
(3, 'AGUAS', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbunidadmedida`
--

CREATE TABLE `tbunidadmedida` (
  `idUnidadMedida` bigint(20) NOT NULL,
  `unidadMedida` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbunidadmedida`
--

INSERT INTO `tbunidadmedida` (`idUnidadMedida`, `unidadMedida`) VALUES
(1, 'KG'),
(2, 'LIBRAS'),
(3, 'MILIGRAMOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idUsuario` bigint(20) NOT NULL,
  `cuenta` varchar(30) NOT NULL,
  `contrasena` varchar(60) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tipoUsuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbusuario`
--

INSERT INTO `tbusuario` (`idUsuario`, `cuenta`, `contrasena`, `email`, `tipoUsuario`) VALUES
(1, 'usuario', '81dc9bdb52d04dc20036dbd8313ed055', 'durand@gmail.com', 1),
(2, 'user', '81dc9bdb52d04dc20036dbd8313ed055', 'durand@gmail.com', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbarea`
--
ALTER TABLE `tbarea`
  ADD PRIMARY KEY (`idArea`),
  ADD KEY `idArea` (`idArea`);

--
-- Indices de la tabla `tbcangeopunto`
--
ALTER TABLE `tbcangeopunto`
  ADD PRIMARY KEY (`idCangeoPunto`),
  ADD KEY `idCliente` (`idCliente`,`idPremio`),
  ADD KEY `idPremio` (`idPremio`);

--
-- Indices de la tabla `tbcategoria`
--
ALTER TABLE `tbcategoria`
  ADD PRIMARY KEY (`idCategoria`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `tbentrada`
--
ALTER TABLE `tbentrada`
  ADD PRIMARY KEY (`idEntrada`),
  ADD KEY `idEntrada` (`idEntrada`),
  ADD KEY `idLoteProducto` (`idLoteProducto`);

--
-- Indices de la tabla `tblote`
--
ALTER TABLE `tblote`
  ADD PRIMARY KEY (`idLote`);

--
-- Indices de la tabla `tbloteproducto`
--
ALTER TABLE `tbloteproducto`
  ADD PRIMARY KEY (`idLoteProducto`),
  ADD KEY `idLoteProducto` (`idLoteProducto`),
  ADD KEY `idLote` (`idLote`,`idProducto`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `tbpedido`
--
ALTER TABLE `tbpedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idPedido` (`idPedido`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `tbpedidoproducto`
--
ALTER TABLE `tbpedidoproducto`
  ADD PRIMARY KEY (`idPedidoProducto`),
  ADD KEY `idPedido` (`idPedido`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `tbpersona`
--
ALTER TABLE `tbpersona`
  ADD PRIMARY KEY (`idPersona`),
  ADD KEY `idPersona` (`idPersona`);

--
-- Indices de la tabla `tbpremio`
--
ALTER TABLE `tbpremio`
  ADD PRIMARY KEY (`idPremio`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `tbproducto`
--
ALTER TABLE `tbproducto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idUnidad` (`idUnidad`),
  ADD KEY `idCategoria` (`idCategoria`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idElemento` (`elemento`),
  ADD KEY `idUnidadMedida` (`idUnidadMedida`);

--
-- Indices de la tabla `tbpromocion`
--
ALTER TABLE `tbpromocion`
  ADD PRIMARY KEY (`idPromocion`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `tbpunto`
--
ALTER TABLE `tbpunto`
  ADD PRIMARY KEY (`idPunto`),
  ADD KEY `idCliente` (`idCliente`,`idPedido`),
  ADD KEY `idPedido` (`idPedido`);

--
-- Indices de la tabla `tbtraslado`
--
ALTER TABLE `tbtraslado`
  ADD PRIMARY KEY (`idTraslado`),
  ADD KEY `idUnidad` (`idUnidad`);

--
-- Indices de la tabla `tbtrasladoproducto`
--
ALTER TABLE `tbtrasladoproducto`
  ADD PRIMARY KEY (`idTrasladoProducto`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idDevolucion` (`idTranslado`),
  ADD KEY `idTrasladoProducto` (`idTrasladoProducto`);

--
-- Indices de la tabla `tbunidad`
--
ALTER TABLE `tbunidad`
  ADD PRIMARY KEY (`idUnidad`),
  ADD KEY `idArea` (`idArea`),
  ADD KEY `idUnidad` (`idUnidad`);

--
-- Indices de la tabla `tbunidadmedida`
--
ALTER TABLE `tbunidadmedida`
  ADD PRIMARY KEY (`idUnidadMedida`);

--
-- Indices de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `tipoUsuario` (`tipoUsuario`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idTipoUsuario` (`tipoUsuario`),
  ADD KEY `idTipoUsuario_2` (`tipoUsuario`),
  ADD KEY `tipoUsuario_2` (`tipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbarea`
--
ALTER TABLE `tbarea`
  MODIFY `idArea` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbcangeopunto`
--
ALTER TABLE `tbcangeopunto`
  MODIFY `idCangeoPunto` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbentrada`
--
ALTER TABLE `tbentrada`
  MODIFY `idEntrada` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tblote`
--
ALTER TABLE `tblote`
  MODIFY `idLote` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbloteproducto`
--
ALTER TABLE `tbloteproducto`
  MODIFY `idLoteProducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbpedido`
--
ALTER TABLE `tbpedido`
  MODIFY `idPedido` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbpedidoproducto`
--
ALTER TABLE `tbpedidoproducto`
  MODIFY `idPedidoProducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `tbpersona`
--
ALTER TABLE `tbpersona`
  MODIFY `idPersona` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbtraslado`
--
ALTER TABLE `tbtraslado`
  MODIFY `idTraslado` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tbtrasladoproducto`
--
ALTER TABLE `tbtrasladoproducto`
  MODIFY `idTrasladoProducto` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbunidad`
--
ALTER TABLE `tbunidad`
  MODIFY `idUnidad` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbunidadmedida`
--
ALTER TABLE `tbunidadmedida`
  MODIFY `idUnidadMedida` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbcangeopunto`
--
ALTER TABLE `tbcangeopunto`
  ADD CONSTRAINT `tbcangeopunto_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbcangeopunto_ibfk_2` FOREIGN KEY (`idPremio`) REFERENCES `tbpremio` (`idPremio`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbentrada`
--
ALTER TABLE `tbentrada`
  ADD CONSTRAINT `tbentrada_ibfk_1` FOREIGN KEY (`idLoteProducto`) REFERENCES `tbloteproducto` (`idLoteProducto`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbloteproducto`
--
ALTER TABLE `tbloteproducto`
  ADD CONSTRAINT `tbloteproducto_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `tbproducto` (`idProducto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbloteproducto_ibfk_3` FOREIGN KEY (`idLote`) REFERENCES `tblote` (`idLote`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbpedido`
--
ALTER TABLE `tbpedido`
  ADD CONSTRAINT `tbpedido_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbpedidoproducto`
--
ALTER TABLE `tbpedidoproducto`
  ADD CONSTRAINT `tbpedidoproducto_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `tbproducto` (`idProducto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbpedidoproducto_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `tbpedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbpremio`
--
ALTER TABLE `tbpremio`
  ADD CONSTRAINT `tbpremio_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `tbproducto` (`idProducto`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbproducto`
--
ALTER TABLE `tbproducto`
  ADD CONSTRAINT `tbproducto_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `tbcategoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbproducto_ibfk_3` FOREIGN KEY (`idUnidadMedida`) REFERENCES `tbunidadmedida` (`idUnidadMedida`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbproducto_ibfk_4` FOREIGN KEY (`idUnidad`) REFERENCES `tbunidad` (`idUnidad`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbpromocion`
--
ALTER TABLE `tbpromocion`
  ADD CONSTRAINT `tbpromocion_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `tbproducto` (`idProducto`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbpunto`
--
ALTER TABLE `tbpunto`
  ADD CONSTRAINT `tbpunto_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `tbcliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tbpunto_ibfk_2` FOREIGN KEY (`idPedido`) REFERENCES `tbpedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbtraslado`
--
ALTER TABLE `tbtraslado`
  ADD CONSTRAINT `tbtraslado_ibfk_1` FOREIGN KEY (`idUnidad`) REFERENCES `tbunidad` (`idUnidad`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbtrasladoproducto`
--
ALTER TABLE `tbtrasladoproducto`
  ADD CONSTRAINT `tbtrasladoproducto_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `tbproducto` (`idProducto`),
  ADD CONSTRAINT `tbtrasladoproducto_ibfk_3` FOREIGN KEY (`idTranslado`) REFERENCES `tbtraslado` (`idTraslado`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbunidad`
--
ALTER TABLE `tbunidad`
  ADD CONSTRAINT `tbunidad_ibfk_1` FOREIGN KEY (`idArea`) REFERENCES `tbarea` (`idArea`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
