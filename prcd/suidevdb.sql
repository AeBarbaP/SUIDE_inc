-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 08:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suidevdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alergia_descripcion`
--

CREATE TABLE `alergia_descripcion` (
  `id` int(11) NOT NULL,
  `id_documentos` int(11) NOT NULL COMMENT 'Se relaciona con el id de la tabla documentos',
  `descripcion` varchar(150) NOT NULL,
  `id_alergia_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `alergia_tipo`
--

CREATE TABLE `alergia_tipo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alergia_tipo`
--

INSERT INTO `alergia_tipo` (`id`, `tipo`) VALUES
(1, 'Ambiental'),
(2, 'Alimentaria'),
(3, 'Intradérmica'),
(4, 'Por contacto'),
(5, 'Farmacológica');

-- --------------------------------------------------------

--
-- Table structure for table `datos_generales`
--

CREATE TABLE `datos_generales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ap_paterno` varchar(50) NOT NULL,
  `ap_materno` varchar(50) DEFAULT NULL,
  `tipo_discapacidad` int(11) NOT NULL,
  `curp` varchar(16) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `localidad` int(11) NOT NULL,
  `municipio` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `cp` int(11) NOT NULL,
  `tipo_sangre` int(2) NOT NULL,
  `tipo_alergia` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `id_ext` varchar(50) NOT NULL,
  `concatenado_id` varchar(50) NOT NULL,
  `qr_cred` varchar(100) NOT NULL,
  `qr_tarjeton` varchar(100) NOT NULL,
  `entregado_c` int(10) NOT NULL,
  `fecha_c` date DEFAULT NULL,
  `entregado_t` int(10) DEFAULT NULL,
  `fecha_t` date DEFAULT NULL,
  `vigencia_cred` date DEFAULT NULL,
  `vigencia_tarjeton` date DEFAULT NULL,
  `id_users` int(15) NOT NULL,
  `recibe` varchar(50) NOT NULL,
  `folio_cred` int(10) DEFAULT NULL,
  `folio_tarj` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documentos`
--

INSERT INTO `documentos` (`id`, `id_ext`, `concatenado_id`, `qr_cred`, `qr_tarjeton`, `entregado_c`, `fecha_c`, `entregado_t`, `fecha_t`, `vigencia_cred`, `vigencia_tarjeton`, `id_users`, `recibe`, `folio_cred`, `folio_tarj`) VALUES
(1, 'C-4940-44790', '', '', '', 1, '2022-07-06', 0, '0000-00-00', '2023-07-06', '0000-00-00', 1, '', 0, 0),
(2, 'C-4940-44790', 'C-4940-44790-1', '-', '-', 1, '2022-08-31', 1, '2022-08-31', '2023-08-31', '2023-08-31', 1, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `log_entregas`
--

CREATE TABLE `log_entregas` (
  `id` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `tipo_doc` int(10) NOT NULL,
  `id_users` int(10) NOT NULL,
  `id_documentos` varchar(10) NOT NULL,
  `tipo_entrega` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `log_usrlogin`
--

CREATE TABLE `log_usrlogin` (
  `id` int(11) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `fecha_iniciosesion` datetime DEFAULT NULL,
  `fecha_cierresesion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_usrlogin`
--

INSERT INTO `log_usrlogin` (`id`, `id_usr`, `fecha_iniciosesion`, `fecha_cierresesion`) VALUES
(1, 1, '2022-09-20 22:27:24', '2022-09-20 22:27:24'),
(2, 2, '2022-09-21 21:27:57', '2022-09-21 21:27:57'),
(3, 3, '2022-09-27 09:58:40', NULL),
(4, 7, '2022-09-27 10:01:24', NULL),
(5, 7, NULL, '2022-09-27 10:12:27'),
(6, 1, '2022-09-27 10:12:41', NULL),
(7, 1, NULL, '2022-09-27 10:18:14'),
(8, 1, '2022-09-27 10:18:25', NULL),
(9, 1, NULL, '2022-09-27 10:18:30'),
(10, 0, '2022-09-27 10:18:55', NULL),
(11, 0, '2022-09-27 10:21:38', NULL),
(12, 4, '2022-09-27 10:21:53', NULL),
(13, 4, NULL, '2022-09-27 10:21:55'),
(14, 0, '2022-09-27 10:22:36', NULL),
(15, 0, '2022-09-27 10:23:55', NULL),
(16, 4, '2022-09-27 10:29:57', NULL),
(17, 4, NULL, '2022-09-27 10:30:01'),
(18, 1, '2022-09-27 12:11:54', NULL),
(19, 1, '2022-09-28 09:52:02', NULL),
(20, 1, NULL, '2022-09-28 12:30:20'),
(21, 1, '2022-09-28 12:31:01', NULL),
(22, 1, '2022-10-03 14:04:15', NULL),
(23, 1, '2022-10-04 11:41:36', NULL),
(24, 1, '2022-11-29 12:25:57', NULL),
(25, 1, '2022-12-05 09:45:42', NULL),
(26, 1, '2022-12-06 12:13:35', NULL),
(27, 0, NULL, '2022-12-06 12:35:02'),
(28, 1, '2022-12-07 08:33:41', NULL),
(29, 1, NULL, '2022-12-07 12:55:40'),
(30, 1, '2022-12-07 12:56:39', NULL),
(31, 1, '2022-12-08 10:30:21', NULL),
(32, 0, NULL, '2022-12-08 11:19:31'),
(33, 1, '2022-12-13 09:03:35', NULL),
(34, 1, '2022-12-14 08:42:12', NULL),
(35, 1, NULL, '2022-12-14 08:50:08'),
(36, 1, '2022-12-14 08:51:37', NULL),
(37, 1, NULL, '2022-12-14 08:54:04'),
(38, 1, '2022-12-14 08:55:47', NULL),
(39, 1, NULL, '2022-12-14 08:56:32'),
(40, 1, '2022-12-14 10:38:35', NULL),
(41, 1, NULL, '2022-12-14 15:28:32'),
(42, 1, '2022-12-15 08:22:53', NULL),
(43, 1, NULL, '2022-12-15 14:53:10'),
(44, 1, '2022-12-16 10:36:39', NULL),
(45, 1, '2022-12-19 13:02:34', NULL),
(46, 1, '2022-12-19 13:03:23', NULL),
(47, 1, '2023-01-05 11:40:25', NULL),
(48, 1, NULL, '2023-01-05 13:15:26'),
(49, 1, '2023-01-05 13:27:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perfiles_usr`
--

CREATE TABLE `perfiles_usr` (
  `id` int(11) NOT NULL,
  `perfil` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perfiles_usr`
--

INSERT INTO `perfiles_usr` (`id`, `perfil`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `prestamo`
--

CREATE TABLE `prestamo` (
  `id` int(11) NOT NULL,
  `apellido_p` varchar(15) NOT NULL,
  `apellido_m` varchar(15) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `calle_num` varchar(35) NOT NULL,
  `colonia` varchar(20) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `municipio` varchar(20) NOT NULL,
  `codigo_postal` varchar(30) NOT NULL,
  `telefono` int(10) NOT NULL,
  `contacto` int(10) DEFAULT NULL,
  `folio_tarj` int(10) NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  `vigencia` datetime NOT NULL,
  `id_users` int(11) NOT NULL,
  `qr_prestamo` varchar(100) NOT NULL,
  `entregado` int(1) NOT NULL COMMENT '1 Beneficiario\r\n2 Familiar\r\n3 Enlace Municipal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `perfil` int(2) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `perfil`, `nombre`, `fecha_creacion`, `estatus`) VALUES
(1, 'annaeliza', '12345', 1, 'Ana Elisa Barba Pinedo', '0000-00-00 00:00:00', 1),
(2, 'jrodolfo', '12345678', 1, 'Jesús Rodolfo Leaños Villegas', '2022-09-21 14:23:40', 1),
(4, 'juanjo', '12345678', 2, 'Juan José Quiroz Nava', '2022-09-21 14:34:03', 1),
(5, 'grisgalvan', '789456123', 2, 'Griselda Galván Galván', '2022-09-21 15:08:58', 2),
(6, 'amparoi', '654213', 2, 'Amparo Iturriaga Araiza', '2022-09-22 12:56:45', 1),
(7, 'hecmendoza', '123456789', 2, 'Héctor Mario Mendoza Bañuelos', '2022-09-22 14:04:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `id_prestamo` int(10) DEFAULT NULL,
  `id_documentos` int(11) DEFAULT NULL,
  `modelo` varchar(50) NOT NULL,
  `marca` varchar(15) NOT NULL,
  `annio` int(4) NOT NULL,
  `no_placas` varchar(10) NOT NULL,
  `chofer` varchar(100) NOT NULL,
  `no_serie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alergia_descripcion`
--
ALTER TABLE `alergia_descripcion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alergia_tipo`
--
ALTER TABLE `alergia_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datos_generales`
--
ALTER TABLE `datos_generales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_entregas`
--
ALTER TABLE `log_entregas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_usrlogin`
--
ALTER TABLE `log_usrlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfiles_usr`
--
ALTER TABLE `perfiles_usr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alergia_descripcion`
--
ALTER TABLE `alergia_descripcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alergia_tipo`
--
ALTER TABLE `alergia_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `datos_generales`
--
ALTER TABLE `datos_generales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log_entregas`
--
ALTER TABLE `log_entregas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log_usrlogin`
--
ALTER TABLE `log_usrlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `perfiles_usr`
--
ALTER TABLE `perfiles_usr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
