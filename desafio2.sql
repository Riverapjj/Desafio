-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-04-2022 a las 21:54:34
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desafio2`
--
CREATE DATABASE IF NOT EXISTS `desafio2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `desafio2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `codigo_categoria` char(6) NOT NULL,
  `nombre_categoria` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codigo_categoria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`codigo_categoria`, `nombre_categoria`) VALUES
('CAT001', 'Textil'),
('CAT002', 'Promocional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `codigo_producto` char(9) NOT NULL,
  `codigo_categoria` char(6) NOT NULL,
  `nombre_producto` varchar(500) DEFAULT NULL,
  `talla` varchar(4) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `imagen` varchar(13) DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  `existencias` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo_producto`, `codigo_categoria`, `nombre_producto`, `talla`, `descripcion`, `imagen`, `precio`, `existencias`) VALUES
('PROD00001', 'CAT001', 'Camiseta de algodón cuello redondo', 'M', 'Camiseta Mod. 1, elaborada en algodón de 200 grs. cuello redondo decorado, manga corta, costuras en cierres laterales.', 'PROD00001.jpg', '5.00', 500),
('PROD00002', 'CAT001', 'Camiseta de algodón cuello V', 'M', 'Camiseta Mod. 2, elaborada en algodón de 200 grs. cuello en V decorado, manga corta, costuras en cierres laterales.', 'PROD00002.jpg', '2.90', 462),
('PROD00003', 'CAT001', 'Sudadera de algodón', 'L', 'Sudadera para adulto en combinación de materiales algodón y poliéster de 280g/m2, cuello redondo, sin gorro.', 'PROD00003.jpg', '10.00', 4),
('PROD00004', 'CAT001', 'Sudadera con zipper', 'L', 'Sudadera para adulto con capucha y cierre de central de zipper. En combinación de materiales algodó;n y poliéster de 280g/m2. Con cordones a juego y 2 bolsas frontales. Material: 50% Algodón, 50% Poliéster', 'PROD00004.jpg', '13.00', 196),
('PROD00005', 'CAT001', 'Blusa tipo polo', 'S', 'Blusa Tipo Polo en Liquidación, diversa gama de colores con cuello y puño en contraste.', 'PROD00005.png', '5.00', 500),
('PROD00006', 'CAT001', 'Camisa tipo polo', 'XXL', 'Camisa Tipo Polo en Liquidación, diversa gama de colores con cuello y puño en contraste.', 'PROD00006.jpg', '5.00', 28),
('PROD00007', 'CAT001', 'Chaleco', 'XS', 'Chaleco en resistente combinación de materiales algodón y poliéster de vivos colores. Cierre de zipper principal, multitud de bolsillos frontales y laterales de gran capacidad con cierre de velcro y anilla metálica en el pecho.', 'PROD00007.jpg', '20.00', 15),
('PROD00008', 'CAT002', 'Squeeze', '', 'Squeeze con cuerpo de acabado en aluminio en vivos y variados colores. Con tapón de rosca, dosificados de seguridad y tapón de cierre. Presentado en caja individual.', 'PROD00008.jpg', '3.50', 210),
('PROD00009', 'CAT001', 'Mandil', '', 'Mandil pro de alta calidad en resistente material 100% algodón canvas de 340g/m2. De corte por debajo de la rodilla, con cintas de cuello y cintura en resistente polipiel con ajuste mediante hebilla y reforzado con remaches metálicos. Incluye multitud de bolsillos para los distintos utensilios, con las costuras reforzadas.', 'PROD00009.jpg', '12.00', 25),
('PROD00010', 'CAT001', 'Mandil', '', 'Mandil pro de alta calidad en resistente material 100% algodón canvas de 340g/m2. De corte por debajo de la rodilla, con cintas de cuello y cintura en resistente polipiel con ajuste mediante hebilla y reforzado con remaches metálicos. Incluye multitud de bolsillos para los distintos utensilios, con las costuras reforzadas.', 'PROD00010.jpg', '12.00', 25),
('PROD00011', 'CAT001', 'Taza', '', 'Taza de Línea Ecológica color Natural.', 'PROD00011.jpg', '1.30', 500),
('PROD00012', 'CAT001', 'Termo de sublimación', '', 'Termo de 500ml de capacidad en resistente acero inoxidable. Superficie exterior especialmente diseñada para sublimación. Con tapón de seguridad y presentado en atractiva caja individual de diseño.', 'PROD00012.jpg', '9.00', 0),
('PROD00013', 'CAT001', 'Gorro de algodón', 'S', 'Gorra sin impresión, importada, 100% algodón, 6 paneles con ojetes, cierre de hebilla, viñeta interior genérica bordada. Talla única de adulto.', 'PROD00013.png', '2.50', 500),
('PROD00014', 'CAT001', 'Gorra de poliéster', 'M', 'Gorra de 5 paneles con visera plana acolchada y parte trasera en redecilla a juego. Material 100% poliéster de suave acabado, con cierre ajustable de botones y en variada gama de vivos colores.', 'PROD00014.jpg', '2.75', 500),
('PROD00015', 'CAT002', 'Mochila', '', 'Mochila en acabado denim 600D, de diseño urbano, con acolchado total en todo el cuerpo y cintas de hombros. Bolsa exterior con cierre de zipper, asas de transporte y cintas de hombros reforzadas a juego y compartimento interior acolchado para portátil de hasta 15 pulgadas.', 'PROD00015.jpg', '2.75', 500),
('PROD00016', 'CAT002', 'Power Bank', '', 'Batería auxiliar externa de aluminio en llamativos colores de 2.200 mAh de capacidad de carga, con bot&#xF3;n y ledes indicadores de carga. Cable micro USB incluido y amplia superficie de marcaje, Presentada en atractiva caja de diseño. Las capacidades mostradas en todas nuestras baterías auxiliares externas son reales, incorporando todas ellas baterías de grado A y no recicladas, con una vida útil de al menos 500 ciclos de carga y según normativa CE.', 'PROD00016.jpg', '5.50', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

DROP TABLE IF EXISTS `tipo_usuarios`;
CREATE TABLE IF NOT EXISTS `tipo_usuarios` (
  `codigo_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`codigo_tipo_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`codigo_tipo_usuario`, `tipo_usuario`) VALUES
(1, 'Admin'),
(2, 'Usuario'),
(3, 'Cliente'),
(4, 'Test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_tipo_usuario` int(11) NOT NULL,
  `activo` int(11) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `nombre_usuario` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codigo_usuario`),
  KEY `codigo_tipo_usuario` (`codigo_tipo_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo_usuario`, `codigo_tipo_usuario`, `activo`, `password`, `nombre_usuario`) VALUES
(1, 1, 1, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Josue'),
(2, 2, 1, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Alexander'),
(3, 3, 1, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Pedro'),
(5, 3, 1, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'Luis'),
(6, 3, 1, '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'Carlos'),
(7, 1, 1, '123456', 'Karla');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
