-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2023 a las 03:48:05
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `notanbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prendas`
--

CREATE TABLE `prendas` (
  `id` int(11) NOT NULL,
  `Tipo` varchar(200) NOT NULL,
  `Modelo` varchar(200) NOT NULL,
  `Talle` varchar(4) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Marca` varchar(200) NOT NULL,
  `Stock` int(200) NOT NULL,
  `Precio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`id`, `Tipo`, `Modelo`, `Talle`, `Color`, `Marca`, `Stock`, `Precio`) VALUES
(1, 'Remera', 'SUNDAY MORNING', 'M', 'Azul', 'CMMNTY', 10, '$12.000,00'),
(2, 'Zapatilla', 'AIR JORDAN 1 MID', '40', 'Blanco', 'NIKE', 5, '$124.000,00'),
(3, 'Zapatilla', 'ICÓNICA 574', '41', 'Azul', 'NEW BALANCE', 7, '$80.499,00'),
(4, 'Buzo', 'BUZO CANGURO', 'XL', 'Amarillo', 'ADIDAS', 15, '$58.999,00'),
(5, 'Bermuda', 'OVERSIZE TT', 'L', 'Negro', 'TUSSY', 4, '$19.000,00'),
(6, 'Gorra', 'SNAPBACK', 'M', 'Celeste', 'VANS', 23, '$19.000,00'),
(7, 'Rompeviento', 'TRACK JACKET', 'XXL', 'Gris', 'FRERES', 9, '$41.000,00'),
(8, 'Medias', 'CORE LOW CUT', 'S', 'Negro', 'UNDER ARMOUR', 50, '$6.800,00'),
(9, 'Short', 'ANTI HERO', 'L', 'Rojo', 'THRASHER ', 14, '$34.999,00'),
(10, 'Chomba', 'XNETFLIX', 'XL', 'Marrón', 'LACOSTE', 20, '$66.000,00'),
(11, 'Mochila', 'NG', '3', 'Verde', 'TOPPER', 6, '$27.999.00'),
(12, 'Botín', 'FUTURE ULTIMATE', '44', 'Bordo', 'PUMA', 19, '$140.000,00'),
(13, 'Jean\'s', '501\'54', '39', 'Azul Clásico ', 'LEVI\'S', 3, '$80.000,00'),
(14, 'Camisa', 'STIRPE SHIRT', 'M', 'Violeta', 'PENGUIN', 22, '$18.999,00'),
(15, 'Bandolera', 'COMMS POUCH', '1', 'Rosa', 'CONVERSE', 31, '$23.000,00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `Nombre.Empresa` varchar(200) NOT NULL,
  `Contacto` varchar(200) NOT NULL,
  `Productosofrecidos` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `Nombre.Empresa`, `Contacto`, `Productosofrecidos`) VALUES
(1, 'CMMNTY', '+54 011 6083-3971', 'REMERA SUNDAY MORNING \r\nREMERA DELICIOUS MIND\r\nBERMUDA JEAN\r\nBAGGY JEANS (AZUL)'),
(2, 'NIKE', '0810-555-6453', 'ZAPATILLAS\r\nAIR FORCE\r\nJORDAN\r\nAIR MAX\r\nDUNK\r\n\r\n'),
(3, 'ADIDAS', '0800-666-0206', 'BUZOS\r\nHOODIES\r\nCAMPERAS\r\nBUZOS CON CAPUCHA\r\n'),
(4, 'NEW BALANCE', '0810-999-0553', 'ZAPATILLAS\r\nRUNNING\r\nLIFESTYLE\r\nTRAINING\r\nTENIS'),
(6, 'TUSSY', '+54 11 7369-5533', 'BERMUDAS OVERSIZE TT\r\nREMERA OVERSIZE LUMINIAL\r\nBUZO CUELLO REDONDO GEON\r\nCAMISA OVERSIZE GEON'),
(7, 'VANS', '+54 11 5199-0537', 'GORRA\r\nRIÑONERA\r\nMOCHILAS\r\nBAGS\r\nBILLETERA\r\nGUANTES'),
(8, 'LACOSTE', '11-2040-0808', 'POLOS\r\nREMERAS\r\nPANTALONES\r\nBERMUDAS\r\nROPA INTERIOR\r\nMEDIAS'),
(9, 'PUMA', '(011) 5168-6056', 'SLIPSTREAM\r\nPUMAS 75\r\nWAE\r\nMAYZE\r\nRS\r\nFOREVER CLASSIC'),
(10, 'FRERES', '+54 9 11 3373-8442', 'REMERAS OVERSIZE\r\nHOODIES\r\nSNEAKERS\r\nCAMPERAS DE JEAN\r\nJACKET\r\nROMPEVIENTOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `email`, `contrasena`) VALUES
(1, 'pelotita', 'prueba@gmail.com', '123'),
(3, 'gonzalo727', 'gonzalo@hotmail.com', '123'),
(4, 'ezequiel14', 'ezequiel@gmail.com', '123'),
(5, 'mateo434', 'mateo@outlook.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `Nro` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Turno` varchar(10) NOT NULL,
  `Metodopago` varchar(100) NOT NULL,
  `Total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`Nro`, `Fecha`, `Turno`, `Metodopago`, `Total`) VALUES
(1, '2023-11-20', 'Mañana', 'Transferencia', '$20.000,00'),
(2, '2023-11-19', 'Tarde', 'Efectivo', '$120.000,00'),
(3, '2023-11-09', 'Tarde', 'Efectivo', '$10.000,00'),
(4, '2023-10-04', 'Mañana', 'Transferencia', '$90.000,00'),
(5, '2023-10-19', 'Tarde', 'Efectivo', '$25.000,00'),
(6, '2023-10-02', 'Mañana', 'Transferencia', '$32.000,00'),
(7, '2023-09-01', 'Mañana', 'Trasnferencia', '$39.000,00'),
(8, '2023-11-06', 'Mañana', 'Efectivo', '$7.500.00'),
(9, '2023-11-18', 'Tarde', 'Transferencia', '$57.000,00'),
(10, '2023-08-16', 'Tarde', 'Efectivo', '$43.700,00'),
(11, '2023-11-15', 'Mañana', 'Efectivo', '$10.000,00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Nro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `Nro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
