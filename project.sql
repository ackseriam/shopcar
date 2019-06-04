-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-06-2019 a las 03:07:52
-- Versión del servidor: 10.0.37-MariaDB-0+deb8u1
-- Versión de PHP: 5.6.39-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `project`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `balance`
--

CREATE TABLE IF NOT EXISTS `balance` (
`id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_amount` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `balance`
--

INSERT INTO `balance` (`id`, `id_user`, `total_amount`) VALUES
(41, 1, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `average_rating` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kind_product` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `average_rating`, `kind_product`) VALUES
(7, 'beer', '2', '1', 'each unit'),
(8, 'water', '1', '1', 'each unit'),
(9, 'apple', '0.3', '0', 'each unit'),
(10, 'cheese', '3.74', '0', 'each kg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
`id` int(11) NOT NULL,
  `id_shoppingcar` int(11) NOT NULL,
  `shipping_option` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `balance_purchase` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shoppingcar`
--

CREATE TABLE IF NOT EXISTS `shoppingcar` (
`id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `balance` float NOT NULL,
  `rating_user` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity_products` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_ci` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` int(200) NOT NULL,
  `phone` int(15) NOT NULL,
  `sex` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `rol` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `lastname`, `id_ci`, `address`, `phone`, `sex`, `password`, `email`, `rol`) VALUES
(1, 'Ericka', 'Simancas', '20637211', 1, 0, 'female', 'erickacondios', 'ericka.simanca@gmail.com', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `balance`
--
ALTER TABLE `balance`
 ADD PRIMARY KEY (`id`), ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `purchase`
--
ALTER TABLE `purchase`
 ADD PRIMARY KEY (`id`), ADD KEY `id_shoppingcar` (`id_shoppingcar`);

--
-- Indices de la tabla `shoppingcar`
--
ALTER TABLE `shoppingcar`
 ADD PRIMARY KEY (`id`), ADD KEY `id_product` (`id_product`,`id_user`), ADD KEY `id_product_2` (`id_product`), ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `balance`
--
ALTER TABLE `balance`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `purchase`
--
ALTER TABLE `purchase`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `shoppingcar`
--
ALTER TABLE `shoppingcar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `balance`
--
ALTER TABLE `balance`
ADD CONSTRAINT `balance_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `purchase`
--
ALTER TABLE `purchase`
ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`id_shoppingcar`) REFERENCES `shoppingcar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `shoppingcar`
--
ALTER TABLE `shoppingcar`
ADD CONSTRAINT `shoppingcar_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `shoppingcar_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
